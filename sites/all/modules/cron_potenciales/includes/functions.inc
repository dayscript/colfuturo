<?php



function get_users_id($timestamp){
/*  $uid = array( 242074 );
  $query = new EntityFieldQuery();
  $query->entityCondition('entity_type', 'user')
  ->propertyCondition('created', $timestamp, '>')
  ->propertyCondition('uid', $uid);
  $results = $query->execute();*/
  $query = new EntityFieldQuery();
  $query->entityCondition('entity_type', 'user')
    ->propertyCondition('created', $timestamp, '>')
    ->fieldCondition('field_manage_potencial_exist','value',0,'=');
  $results = $query->execute();

  if(isset($results['user']) )
    return $results['user'];

  return false;

}

function create_json($user){
  watchdog('cron', json_encode($user));
  $genero = $user->field_genero['und'][0]['value'];
  if($genero != "" || $genero != " "){
    switch ($genero) {
      case 'Masculino':
        $genero = "M";
        break;

      case 'Femenino':
        $genero = "F";
        break;
    }
  }

  if(isset($user->field__rea_de_inter['und'])){
    foreach($user->field__rea_de_inter['und'] as $key => $value){
      $areas[] = $value['value'];
    }
  }
  if(isset($user->field_idiomas_de_inter_s['und'])){
    foreach($user->field_idiomas_de_inter_s['und'] as $key => $value){
      $idiomas[] = $value['value'];
    }
  }

  $areas = (isset($areas)) ? json_encode($areas): json_encode([]);
  $idiomas = (isset($idiomas)) ? json_encode($idiomas): json_encode([]);

  $string = "{\"numeroDocumento\":\"".$user->name."\",
            \"nombre\":\"".mb_convert_encoding($user->field_nombres['und'][0]['value'],"ISO-8859-1", "UTF-8")."\",
            \"apellido\":\"".mb_convert_encoding($user->field_apellidos['und'][0]['value'],"ISO-8859-1", "UTF-8")."\",
            \"email\":\"".$user->mail."\",
            \"fechaNacimiento\":\"".date("d-m-Y", time())."\",
            \"ciudadResidencia\":\"".unserialize($user->field_ciudad_de_residencia['und'][0]['data'])['formatted_address']."\",
            \"genero\":\"".$genero."\",
            \"celular\":\"\",
            \"listaInteresAreaEstudio\":".$areas.",
            \"listaInteresIdioma\":".$idiomas."}";

  drupal_set_message($string);
  return $string;
}


?>
