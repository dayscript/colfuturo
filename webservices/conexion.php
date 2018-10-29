<?php
require 'lib/nusoap.php';


if(isset($_GET['type']) && $_GET['type'] == 'porcentaje'){
  $url="http://jboss2.colfuturo.org/Formulario-Interno/ServicioIntegracionPotencial?wsdl";
  $client = new nusoap_client($url, true);
  $usuario = $_GET['name'];
  $token = get_token($usuario);
  $client->setCredentials($usuario,$token);
  $result = $client->call("consultarPorcentajeFormularioPotencial", array("numeroDocumento" => $usuario));
  $error = $client->getError();
  if ($error) {
    var_dump($error);
  }else{
    echo json_encode($result);
  }
}



function get_token($strString) {
    $var1 = date ("sHdi");
    $var2 = sqrt ($var1 . strrev($strString));
    $link = odbc_connect ("ColfuturoPCB", "pcb", "%Titan1900bene$");
    $strSQL = "DELETE FROM PCB.SESIONES WHERE login = '" . $strString . "'";
    odbc_exec ($link, $strSQL);
    $strSQL = "INSERT INTO PCB.SESIONES (login, sesion) values ( '" . $strString . "', '" . $var2 . "')";
    odbc_exec ($link, $strSQL);
    odbc_close ($link);
    return $var2;
 }

?>
