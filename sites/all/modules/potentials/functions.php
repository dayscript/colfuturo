<?php
function _accionesUsuario($type){
  watchdog('potentials', 'Respuesta: entro' );
  $response =array();
    $users =  json_decode($type);
    
    //dpm($users->data);
    $fields= array();
    foreach ($users->data as $key => $value) {
       $fields[$key] = $key;
    }
    $account = user_load_by_name($users->data->name);
    $UserData = entity_metadata_wrapper('user',$account->uid);
    $fields = array_keys($fields);
    dpm($UserData->getPropertyInfo());
    for($i = 0 ; $i <= count($fields) ; $i++ ){     
      if(array_key_exists($fields[$i],$UserData->getPropertyInfo()) && $fields[$i] != 'name'){
        try{
          $UserData->$fields[$i] = $users->data->$fields[$i];
          $response[$fields[$i]] = 'En campo '.$fields[$i].' se almaceno '. $users->data->$fields[$i] .' correctamente';
          
        }catch(Exception $e){
          $response[$fields[$i]] = '<span style="color:red">Error al almacenar el campo '.$fields[$i] .'el Valor : '.$users->data->$fields[$i]."<br>".$e.'</span>';
        }
      }else{
        $response[$fields[$i]] = "<span style='color:orange'>Este campo no existe en drupal</span>";
      }
    }
    $response['return_url'] = $users->data->return_url;
    $UserData->save();
    $account = user_load_by_name($users->data->name);
    //return $type;
    //dpm($account);
   return theme('custom_output' , array('response' => $type));
}
