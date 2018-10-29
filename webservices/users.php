<?php

define('DRUPAL_ROOT', '../');


require_once DRUPAL_ROOT."includes/bootstrap.inc";
require_once "functions.php";


drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
$server = new soap_server();
$server->configureWSDL("_accionesUsuarioWebServices", "http://www.colfuturo.org/_accionesUsuarioWebServices");
$server->register("_accionesUsuarioWebServices",
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://www.colfuturo.org/_accionesUsuarioWebServices",
    "http://www.colfuturo.org/foodservice#getFood",
    "rpc",
    "encoded", 
    "Get food by type");
$server->register("_consultarDatosUsuarios",
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://www.colfuturo.org/_accionesUsuarioWebServices",
    "http://www.colfuturo.org/foodservice#getFood",
    "rpc",
    "encoded",
    "Get food by type");

@$server->service($HTTP_RAW_POST_DATA);
