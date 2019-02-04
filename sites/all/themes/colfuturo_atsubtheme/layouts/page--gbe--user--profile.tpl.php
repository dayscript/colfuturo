<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://www.colfuturo.org/sites/all/themes/colfuturo_atsubtheme/src/src/login.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Puritan:400,700,400italic,700italic|BenchNine:300,400,700' rel='stylesheet' type='text/css'>
    <link href="sites/all/themes/colfuturo_atsubtheme/src/src/home.css" rel="stylesheet" type="text/css">
    <title>Actualizar datos</title>
  </head>
  <body>
    <div class="header-login" style="max-width: 100%;">
      <div style="width: 65%; float: left;">
        <span style="margin-left: 10px;display: block;margin: 0 auto;width: 100px;">
        <?php print $user->name;?>
        </span>
      </div>
      <span style="width: 15%; display: block; float: left; text-align: center;">
      <a href="/user/<?php print $user->uid?>/edit">Actualizar datos</a>
      </span>
      <span style="width: 15%; display: block; float: left; text-align: center;">
      <a href="/user/<?php print $user->uid?>/change-password">Cambiar clave</a>
      </span>
      <span style="margin: 3px 0px 0px 0px; display: block;">
      <a href="/user/logout"><img src="https://www.colfuturo.org/sites/all/themes/colfuturo_atsubtheme/src/images/logout.png"></a>
      </span>
    </div>
    <div class="text-departamento">
      <h1>Actualizar Datos</h1>
      <p>Esta plataforma le servirá para contactarse con el equipo administrativo, descargar documentos y consultar las fechas de los giros que se programen según su convocatoria.</p>
    </div>
    <div class="container">
      <img src="/sites/all/themes/colfuturo_atsubtheme/src/images/titulo_gbe.png" width="340px" height="50px">
      <?php if($messages):?>
        <div class="container-messages">
          <?php print $messages; ?>
        </div>
      <?php endif; ?>
      <div class="container_dentro">
        <div class="scolciencias-form-edit-profile">
          <?php
          global $user;
          $account = user_load($user->uid);
          print drupal_render(drupal_get_form('user_profile_form', $account));
          ?>
        </div>
      </div>
      <div class="pie-departamentos">
        <p> Gestión de Becas Externas es administrado por COLFUTURO</p>
      </div>
    </div>
    <?php $path="sites/all/themes/colfuturo_atsubtheme/src/"; ?>
    <script src="/sites/all/themes/colfuturo_atsubtheme/src/libs/jquery/jquery.js"></script>
    <script src="/sites/all/themes/colfuturo_atsubtheme/src/src/jquery.backstretch.js"></script>
    <script>
      var path="/sites/all/themes/colfuturo_atsubtheme/src/";
      $.backstretch([
        path+"images/gbe_2.jpg",
        path+"images/gbe_3.jpg",
        path+"images/gbe_1.jpg"
        ],{
          fade: 750,
          duration: 4000
        });
    </script>
  </body>
</html>