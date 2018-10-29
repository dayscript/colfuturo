<?php
require_once "lib/nusoap.php";
require_once "../includes/bootstrap.inc";

$account = user_load_by_name('aacevedo');

var_dump($account);

 
$server = new soap_server();
$server->configureWSDL("_accionesUsuario", "http://www.greenacorn-websolutions.com/_accionesUsuario");
$server->register("_accionesUsuario",
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://www.greenacorn-websolutions.com/_accionesUsuario",
    "http://www.greenacorn-websolutions.com/foodservice#getFood",
    "rpc",
    "encoded",
    "Get food by type");
 
@$server->service($HTTP_RAW_POST_DATA);



function _accionesUsuario($type){
        if(isset($type)){
            if($type != ""){
                return $type;
            }
        }
}