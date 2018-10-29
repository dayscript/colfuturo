<?php

function WriteLog1( $info ){
  $date = date('y-m-d');
  $hour = date('h:m:s');
  $ip = ($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']:'0.0.0.0';
  $text = $hour.' '.$ip.' '.$info ;
  file_put_contents('logs/Web Services '.$date.'.log', $text.PHP_EOL,FILE_APPEND | LOCK_EX);
}

function _accionesUsuario($type){
        if(isset($type)){
            if($type != ""){
                return $type;
            }
        }
}

function _accionesUsuarioWebServices($type){
    WriteLog1('_accionesUsuarioWebServices  '.$type .' preparando usuario');  
    if( !doAuthenticate() ){
        return 'Error de valiación';
    }else{
      $response ="";
      $users = str_replace("|",'"',$type);
      watchdog('potentials',$users);
      $users = json_decode($users);
      watchdog('potentials',$users);

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
            $str = $users->data->$fields[$i];
            if($fields[$i] == "field__rea_de_inter"){
              $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                      return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
                     },$str);
            }
            if($fields[$i] == "field_idiomas_de_inter_s"){
              foreach ($str as $key => $value) {
                  switch ($value) {
                    case 'Franc\\u00E9s':
                       $str[$key] = 'frances';
                      break;
                    case 'Ingl\\u00E9s':
                       $str[$key] = 'ingles';
                      break;
                  }
              }
            }
            $UserData->$fields[$i] = $str;
            $response .= 'En campo '.$fields[$i].' se almaceno '. $users->data->$fields[$i] .' correctamente --- ';
          }catch(Exception $e){
            $response .= 'Error al almacenar el campo '.$fields[$i] .'el Valor : '.$users->data->$fields[$i].' --- '.$e.'--- ';
          }
        }else{
            $response .= $fields[$i]."--- ";
        }
      } 
      $UserData->save();
      $account = user_load_by_name($users->data->name);
      WriteLog1('Respuesta del servidor  '.$response);
      return $response;  
    }
}

function _consultarDatosUsuarios($type){
  if( !doAuthenticate()){
        WriteLog1('_consultarDatosUsuarios '.$type .' error de valiación');
        return 'Error de valiación';
    }else{
      WriteLog1('_consultarDatosUsuarios '.$type .' preparando Usuario');
      $user = user_load_by_name($type); 
      $ciudad = $user->field_ciudad_de_residencia['und'][0]['data'];
      $ciudad = explode('{',$ciudad); 
      $ciudad = explode(';',$ciudad[1]);
      $ciudad = explode('"',$ciudad[7]);
      foreach ($user->field_interes['und'] as $key => $value) {
        $intereses .= $user->field_interes['und'][$key]['value'].','; 
      }
      foreach ($user->field__rea_de_inter['und'] as $key => $value) {
        $Areaintereses .= $user->field__rea_de_inter['und'][$key]['value'].','; 
      }foreach ($user->field_idiomas_de_inter_s['und'] as $key => $value) {
        $Idiomaintereses .= $user->field_idiomas_de_inter_s['und'][$key]['value'].','; 
      }
      $object = array(
                       'numeroDocumento' => $user->name,
                       'nombre' => $user->field_nombres['und'][0]['value'], 
                       'apellido' => $user->field_apellidos['und'][0]['value'], 
                       'email' => $user->init,
                       'fechaNacimiento'=>' ',
                       'ciudadResidencia' => $ciudad[1], 
                       'genero' => ($user->field_genero['und'][0]['value'] == 'Femenino') ? 'F':'M', 
                       'celular' => ' ',
                       'intereses' => explode(',',substr ($intereses, 0, strlen($intereses) - 1)),
                       'listaInteresAreaEstudio' => explode(',',substr ($Areaintereses, 0, strlen($Areaintereses) - 1)), 
                       'listaInteresIdioma' => explode(',',substr ($Idiomaintereses, 0, strlen($Idiomaintereses) - 1)),  
        );
       WriteLog1('_consultarDatosUsuarios  '.$type .' respondiendo solicitud');
       WriteLog1('_consultarDatosUsuarios  '.$type .' proceso completo');
       return json_encode($object);
    }
}


function doAuthenticate(){    
   WriteLog1('Verificar permisos para: ');  
  if(isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW']) ) {
      WriteLog1('PHP_AUTH_USER : '.$_SERVER['PHP_AUTH_USER'].'- PHP_AUTH_PW :'.$_SERVER['PHP_AUTH_PW']); 
      $strString = $_SERVER['PHP_AUTH_USER']; 
      $llave = $_SERVER['PHP_AUTH_PW'];
      $var1 = date ("sHdi");
      $var2 = sqrt ($var1 . strrev($strString));
      $var3 = false;
      try{
          WriteLog1('Conecion a la base de datos ');   
          $link = odbc_connect ("ColfuturoPCB", "pcb", "%Titan1900bene$");
          $sql = "SELECT sesion FROM PCB.SESIONES WHERE login = '" . $strString . "'" ;
          $result = odbc_exec ($link, $sql);
          $row = odbc_fetch_array ($result);
         } 
      catch(Exception $e){
        WriteLog1('Error inesperado'.$e->getMessage());
      }
      if ($row['sesion']==$llave) {
        odbc_close ($link);
        //$link = odbc_connect ("ColfuturoPCB", "pcb", "%Titan1900bene$");
        $link = odbc_connect ("ColfuturoPCB_potenciales", "pcb", "cOLOMBIA2011");
        
        $strSQL = "UPDATE PCB.SESIONES SET sesion = '$var2'  WHERE login = '$strString'";
        if(!isset($_SESSION)){
        session_start();
        }
        $_SESSION['llave'] = $_SESSION['llave'] != $var2 ? $var2 : $_SESSION['llave'];
        $result2 = odbc_exec ($link, $strSQL)  ;
        $var3 = true;
      }
      odbc_close ($link);
      return $var3;
  }
  WriteLog1('No se recibieron las credenciales');   
  return  false;
}