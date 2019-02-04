<?php
module_load_include('inc', 'user', 'user.pages');
/**************************************************/
/*  Consulta para extraer el nombre               */
/**************************************************/
  global $user;
  $UserCC = $user->name;
  $UserRol = $user->roles;
  foreach ($user->roles as $key => $value) {
    if($value =="administrator" ){
    $rol = $value;
    break;
  }
  }
  $path="sites/all/themes/colfuturo_atsubtheme/src/";
  $link = odbc_connect ("ColcienciasPDBC", "pdbc", "%Pajuil1800bene$");
  $linkError = odbc_error( $link );
  $linkErrorMSG = odbc_errormsg( $link );
  if($link){
  }else{
    dpm($linkError);
    dpm($linkErrorMSG);
  }
  $link = odbc_connect ("ColcienciasPDBC", "pdbc", "%Pajuil1800bene$");
  $strSQL = " SELECT     pat.PGP_PAT_NOMBRE, l.PGP_CLAFE_SKIN AS skin,
                      CASE l.PGP_CLAFE_SKIN WHEN 'emeraldTown' THEN '#005000' WHEN 'blueSky' THEN '#BED6F8' WHEN 'wine' THEN '#5D7343' WHEN 'japanCherry' THEN '#E8BDBD'
                       WHEN 'ruby' THEN '#900000' WHEN 'classic' THEN '#4A75B5' WHEN 'deepMarine' THEN '#008894' ELSE '#008894' END AS color,
                      l.PGP_CLAFE_URL_LOGO_APLICACION, PDBC.PERSONA.PER_NUMERO_DOCUMENTO, PDBC.PGP_PROMOCION.PGP_PROM_NOMBRE_CORTO
FROM         PDBC.PGP_PROMOCION INNER JOIN
                      PDBC.PGP_PATROCINADOR AS pat INNER JOIN
                      PDBC.PGP_PROGRAMA ON pat.PGP_PAT_CODIGO = PDBC.PGP_PROGRAMA.PGP_PAT_CODIGO ON
                      PDBC.PGP_PROMOCION.PGP_PROG_CODIGO = PDBC.PGP_PROGRAMA.PGP_PROG_CODIGO INNER JOIN
                      PDBC.PERSONA INNER JOIN
                      PDBC.CONV_SOLICITUD ON PDBC.PERSONA.PER_CODIGO = PDBC.CONV_SOLICITUD.PER_CODIGO ON
                      PDBC.PGP_PROMOCION.PGP_PROM_CODIGO = PDBC.CONV_SOLICITUD.PGP_PROM_CODIGO LEFT OUTER JOIN
                      PDBC.PGP_CONF_LOOK_AND_FEEL AS l ON pat.PGP_PAT_CODIGO = l.PGP_PAT_CODIGO
WHERE     (PDBC.PERSONA.PER_NUMERO_DOCUMENTO = '" . $UserCC . "' ) ";
$rs_access = odbc_exec ($link, $strSQL);
  $fila = odbc_fetch_object($rs_access);
  $Patrocinador = $fila->PGP_PAT_NOMBRE;
  $Patrocinador = utf8_encode($Patrocinador);
  $UrlImagen = $fila->PGP_CLAFE_URL_LOGO_APLICACION;
  $NumeroDocumento = $fila->PER_NUMERO_DOCUMENTO;
  $PromNombreCorto=$fila->PGP_PROM_NOMBRE_CORTO;
  $Skin=$fila->skin;
  $Color=$fila->color;
  if( $UrlImagen == "" || $UrlImagen == " " ){
    $UrlImagen ="sites/all/themes/colfuturo_atsubtheme/src/images/default-header.jpg";
  }
odbc_close ($link);

/********************************************/
/* FIN DE LA CONSULTA                       */
/********************************************/

/*foreach ($user->roles as $value) {

if($value == "administrator"){
  drupal_goto('http://www.colfuturo.org');
  }
}*/

//Verifica si el usuario esta logeado
if($user->uid >0){
 if($Patrocinador == "COLCIENCIAS" || $user->name == "20202020" || $user->name == "30303030" || $user->name == "40404040" || $user->name == "50505050"){// if n0001
 //if($user->name == "20202020" || $user->name == "30303030" || $user->name == "40404040" || $user->name == "50505050" ){
      drupal_add_library('system', 'ui.accordion');
      ?>
            <div id="page-wrapper">
             <div id="page" class="<?php print $classes; ?>">
                  <?php if($page['leaderboard']): ?>
                    <div id="leaderboard-wrapper">
                      <div class="container clearfix">
                        <?php print render($page['leaderboard']); ?>
                      </div>
                    </div>
                  <?php endif; ?>

                  <div id="header-wrapper">
                    <div class="container clearfix">
                      <header<?php print $header_attributes; ?>>

                      <?php if ($site_logo || $site_name || $site_slogan): ?>
                      <!-- start: Branding -->
                      <div<?php print $branding_attributes; ?>>

                      <?php if ($site_logo): ?>
                      <div id="logo">
                        <?php print $site_logo; ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($site_name || $site_slogan): ?>
                    <!-- start: Site name and Slogan hgroup -->
                    <hgroup<?php print $hgroup_attributes; ?>>

                    <?php if ($site_name): ?>
                    <h1<?php print $site_name_attributes; ?>><?php print $site_name; ?></h1>
                  <?php endif; ?>

                  <?php if ($site_slogan): ?>
                  <h2<?php print $site_slogan_attributes; ?>><?php print $site_slogan; ?></h2>
                <?php endif; ?>

                </hgroup>
                <?php endif; ?>


                </div>
                <?php endif; ?>

                <?php print render($page['header']); ?>

                </header>
                </div>
                </div>

                <?php if ($page['menu_bar'] || $primary_navigation || $secondary_navigation): ?>
                  <div id="nav-wrapper">
                    <div class="container clearfix">
                      <?php print render($page['menu_bar']); ?>
                      <?php if ($primary_navigation): print $primary_navigation; endif; ?>
                      <?php if ($secondary_navigation): print $secondary_navigation; endif; ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($breadcrumb): ?>
                  <div id="breadcrumb-wrapper">
                    <div class="container clearfix">
                      <?php print $breadcrumb; ?>

                      <?php
                      $meses = array('1' => 'Enero',
                       '2' => 'Febrero',
                       '3' => 'Marzo',
                       '4' => 'Abril',
                       '5' => 'Mayo',
                       '6' => 'Junio',
                       '7' => 'Julio',
                       '8' => 'Agosto',
                       '9' => 'Septiembre',
                       '10' => 'Octubre',
                       '11' => 'Noviembre',
                       '12' => 'Diciembre');
                       ?>
                       <div class="current_date">
                        <?php
                        echo isset($meses[date ('n')]) ? $meses[date ('n')] : date ('n');
                        echo ' '.date ('d');
                        ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($messages || $page['help']): ?>
                  <div id="messages-help-wrapper">
                    <div class="container clearfix">
                      <?php print $messages; ?>
                      <?php print render($page['help']); ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($page['secondary_content']): ?>
                  <div id="secondary-content-wrapper">
                    <div class="container clearfix">
                      <?php print render($page['secondary_content']); ?>
                    </div>
                  </div>
                <?php endif; ?>

                <div id="content-wrapper"><div class="container">
                  <div id="columns"><div class="columns-inner clearfix">
                    <div id="content-column"><div class="content-inner">

                      <?php print render($page['highlighted']); ?>

                      <<?php print $tag; ?> id="main-content">

                      <?php print render($title_prefix); ?>

                      <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
                      <header<?php print $content_header_attributes; ?>>

                      <?php if ($title): ?>
                      <h1 id="page-title"><?php print $title; ?></h1>
                    <?php endif; ?>

                    <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                    <div id="tasks">

                      <?php if ($primary_local_tasks): ?>
                      <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($secondary_local_tasks): ?>
                    <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                  <?php endif; ?>

                  <?php if ($action_links = render($action_links)): ?>
                  <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                <?php endif; ?>

                </div>
                <?php endif; ?>

                </header>
                <?php endif; ?>

                <?php if ($content = render($page['content'])): ?>
                  <div id="content">
                    <?php print $content; ?>
                  </div>
                <?php endif; ?>

                <?php print $feed_icons; ?>

                <?php print render($title_suffix); ?>

                </<?php print $tag; ?>>

                <?php print render($page['content_aside']); ?>

                </div></div>

                <?php print render($page['sidebar_first']); ?>
                <?php print render($page['sidebar_second']); ?>

                </div></div>
                </div></div>

                <?php if ($page['tertiary_content']): ?>
                  <div id="tertiary-content-wrapper">
                    <div class="container clearfix">
                      <?php print render($page['tertiary_content']); ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($page['footer']): ?>
                  <div id="footer-wrapper">
                    <div class="container clearfix">
                      <footer<?php print $footer_attributes; ?>>
                      <?php print render($page['footer']); ?>
                    </footer>
                  </div>
                </div>
                <?php endif; ?>

                </div>
                </div>



      <?php }// end id n0001

/*************************************************/
/*    Muestra contenido para departamentos
/*************************************************/
elseif( $Patrocinador  =="Departamento del Atlántico" ||
        $Patrocinador  =="Departamento del Cesár"     ||
        $Patrocinador  =="Departamento del Chocó"     ||
        $Patrocinador  =="Departamento del Huila"     ||
        $Patrocinador  =="Departamento del Magdalena" ||
        $Patrocinador  =="Departamento del Sucre"     ||
        $Patrocinador  =="Universidad del Cauca" || $UserCC ="aacevedo"){
                  ?>
                 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                  <html xmlns="http://www.w3.org/1999/xhtml">
                  <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <LINK href="sites/all/themes/colfuturo_atsubtheme/src/src/login.css" rel="stylesheet" type="text/css">
<style type="text/css">
.page-node-44 div#block-block-103 {
  background: <?php echo $Color; ?>
}
.page-node-44 div#block-block-109 {
  background: <?php echo $Color; ?>
}
.page-node-44 div#block-block-110 {
  background: <?php echo $Color; ?>
}

.page-node-44 div#block-block-111 {
  background: <?php echo $Color; ?>
}
.page-node-44 div#block-block-112 {
  background: <?php echo $Color; ?>
}

</style>
                    <title>GESTIÓN DE BECAS EXTERNAS</title>
                  </head>
                  <body >
                  <div id="main" class="externo">
                    <div class="departamentos-header">
                      <!--<div class="logo-departamento" style="border-bottom: 4px solid <?php print $fila->color;?>;
                                                            background:url(<?php print $UrlImagen; ?>) no-repeat;">
                      </div>-->
                      <div class="logo-departamento" style="border-bottom: 4px solid <?php print $fila->color;?>;">
                        <img src="<?php print $UrlImagen;?>">
                      </div>
                      <div class="header-login">
                        <div class="menu-user">
                          <div class="cedula"><?php print $user->name; print $Patrocinador1; ?></div>
                          <div class="update-data"><a href="user/<?php print $user->uid?>/edit">Actualizar datos</a></div>
                          <div class="password"><a href="user/<?php print $user->uid?>/edit">Cambiar clave</a></div>
                          <div class="icon"><a href="user/logout"><img src="sites/all/themes/colfuturo_atsubtheme/src/images/logout.png"></a></div>
                        </div>
                      </div>
                      <div class="text-departamento">
                        <p> Esta plataforma le servirá para contactarse con el equipo administrativo, descargar documentos y
                          consultar las fechas de los giros que se
                          programen según su convocatoria.</p>
                        </div>
                        <div class="departamento-footer">
                        </div>
                      </div>
                      <hr class="hr-head" style="width: 100%; background:<?php print $fila->color;?>">

                      

                      <!--Scolciencias-Después-->
                      <div class="departamentos-content">
                          <!--Caja mayor-->
                          <div class="caja-mayor">

                              <!--Caja-uno-->
                              <div class="caja-uno" >

                                  <!--top-->
                                  <div class="top" >
                                      <?php
                                          print views_embed_view('slide_principal', 'block_9', $arg1);
                                      ?>
                                  </div>
                                  <!--top-->

                                  <!--bottom-->
                                  <div class="bottom">
                                      <div class="c1">
                                          <!--Columna 1-->
                                          <div class="departamentos-fechas columnas fondo-columnas">
                                              <h3 class="titulohr" style="color:<?php print $fila->color;?>">FECHAS A TENER EN CUENTA</h3>
                                              <?php
                                              switch ($Patrocinador) {
                                              case 'Departamento del Atlántico':
                                                  $block = block_load('block','116');
                                                  print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  # code...
                                                  break;
                                              case 'Departamento del Cesár':
                                              $block = block_load('block','119');
                                                  print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  # code...
                                                  break;
                                              case 'Departamento del Chocó':
                                                  $block = block_load('block','120');
                                                  print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  # code...
                                                  break;
                                              case 'Departamento del Huila':
                                              $block = block_load('block','121');
                                                  print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  # code...
                                                  break;
                                              case 'Departamento del Magdalena':
                                                  $block = block_load('block','118');
                                                  print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  # code...
                                                  break;
                                              case 'Departamento del Sucre':
                                                  $block = block_load('block','122');
                                                  print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  # code...
                                                  break;
                                              case 'Universidad del Cauca':
                                                  $block = block_load('block','130');
                                                  print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  break;

                                              default:
                                                  //$block = block_load('block','130');
                                                  //print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                  break;
                                              }?>
                                          </div>
                                          <!--Columna 1-->
                                      </div>

                                      <div class="c2">
                                          <!--Columna 2-->
                                          <div class="departamentos-documentos columnas fondo-columnas">
                                              <h3 class="titulohr" style="color:<?php print $fila->color;?>">DOCUMENTOS DISPONIBLES</h3>
                                              <?php
                                                  switch ($Patrocinador) {
                                                  case 'Departamento del Atlántico':
                                                  $block = block_load('block','115');
                                                      print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      # code...
                                                      break;
                                                  case 'Departamento del Cesár':
                                                      $block = block_load('block','123');
                                                      print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      # code...
                                                      break;
                                                  case 'Departamento del Chocó':
                                                  $block = block_load('block','124');
                                                      print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      # code...
                                                      break;
                                                  case 'Departamento del Huila':
                                                  $block = block_load('block','125');
                                                      print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      # code...
                                                      break;
                                                  case 'Departamento del Magdalena':
                                                  $block = block_load('block','126');
                                                      print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      # code...
                                                      break;
                                                  case 'Departamento del Sucre':
                                                      $block = block_load('block','127');
                                                      print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      # code...
                                                      break;
                                                  case 'Universidad del Cauca':
                                                      $block = block_load('block','131');
                                                      print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      break;

                                                  default:
                                                      //$block = block_load('block','131');
                                                      //print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                                      break;
                                                  }
                                              ?>
                                          </div>
                                          <!--Columna 2-->
                                      </div>          
                                  </div>
                                  <!--bottom-->
                              </div>
                              <!--Caja uno-->

                              <!--Caja dos-->
                              <div class="caja-dos" >
                                  <div class="departamentos-contacto columnas" style="text-align" >
                                      <?php
                                      /*
                                      Bloques ID
                                      colciencias = 103
                                      colcienciasBeneficiario = 110 109
                                      pcbColci = 112 111
                                      */
                                      print render($page['sidebar_second']);
                                      ?>

                                      <h3 class="titulohr" style="color:<?php print $fila->color;?>">CONTÁCTENOS</h3>
                                      <?php

                                      switch ($Patrocinador) {
                                          default:
                                          $block = block_load('block','117');
                                          print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                                          break;
                                          }
                                      ?>
                                  </div>
                              </div>
                              <!--Caja dos-->
                          </div>
                          <!--Caja mayor-->
                      </div>
                      <!--Scolciencias-Después-->


                     

                      <div class="pie-departamentos">
                        <p> Gestión de Becas Externas es administrado por COLFUTURO</p>
                        <div>
                        </div>

                      </body>

                      </html>
<?php }else{

 drupal_goto('http://www.colfuturo.org');

}?>



<?php
/*************************************************/
/*    Muestra contenido para usuarios no logeados
/*************************************************/

}elseif(!$user->uid){ ?>

<?php $path="sites/all/themes/colfuturo_atsubtheme/src/"; ?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>GESTIÓN DE BECAS EXTERNAS</title>
  <meta charset="utf-8" />
  <style>
  form#user-login-form ul {
      display: none;
  }
</style>

<link href='https://fonts.googleapis.com/css?family=Puritan:400,700,400italic,700italic|BenchNine:300,400,700' rel='stylesheet' type='text/css'>
<LINK href="sites/all/themes/colfuturo_atsubtheme/src/src/home.css" rel="stylesheet" type="text/css">
</head>
<script src="//cdn.jsdelivr.net/jquery.geocomplete/1.6.4/jquery.geocomplete.min.js"></script>
<body>
  <?php if($messages):?>

    <?php  $messages = str_replace('¿Olvidó su contraseña?', '', $messages); ?>

    <div class="container-messages">
      <?php print $messages; ?>
    </div>
  <?php endif; ?>
  <div class="container">
    <img src="<?php echo $path?>images/titulo_gbe.png" width="340px" height="50px">
    <div class="container_dentro">
      <?php if(!$user->uid) { ?>      
        <?php if(isset($_GET['reset'])):?>
          <div class="scolciencias-form-reset">
            <h2>Recupera tu cuenta</h2>
            <div style="line-height: 16px;">Escriba abajo su número de cédula y le enviaremos un enlace a su email para reestablecer su contraseña.<br><br>
              Si no puede restablecer la contraseña u olvidó el email, escríbanos a: <a href="mailto:soporte@colfuturo.org" style="color: #DFBD68;">soporte@colfuturo.org</a>
            </div>
              <!--<div style="line-height: 16px;"><?php echo arg(1)  ?> Escribe abajo tu dirección de correo electrónico y te enviaremos un enlace para que puedas restablecer tu contraseña.<br><br>
                Asegúrate de que escribes la dirección de correo electrónico asignada a tu cuenta.</div>-->
            <?php //print render(drupal_get_form('user_pass'));?>
            <?php print _user_pass();?>
            <?php elseif(isset($_GET['register'])):?>
            <div class="scolciencias-form-register">
              <h2>Registrate</h2>
              <div style="line-height: 16px;"></div>
              <?php print _user_register();?>
              <?php //print render(drupal_get_form('user_register_form'));?>
            <?php else: ?>
            <div class="scolciencias-form-login">
            <h1>Bienvenido!!</h1>
            <div style="line-height: 16px;">Desde el 2012, COLFUTURO administra diferentes programas académicos nacionales y del exterior. Si usted es candidato o beneficiario deberá registrarse para acceder a todos los servicios.
            </div>
            <?php //print _user_login();?>
            <?php print render(drupal_get_form('user_login_block'));?>
               <div class="item-list">
                  <div>Si olvidó su contraseña, haga <a href="/scolciencias?reset" style="color: #DFBD68;">clic aquí:</a>
                  </div>
                  <div><a href="/scolciencias?register" style="color: #DFBD68;">Regístrese</a>
                  </div>
<!--                     <ul style="display:inline-block">
                      <li class="even first">
                        <a href="/user/register" title="Crear una nueva cuenta de usuario.">Registrarme</a>
                        <a href="http://www.colfuturo.org/scolciencias?register" title="Solicitar una contraseña nueva por correo electrónico.">Regístrese</a>
                      </li>
                      <li class="odd last">
                        <a href="http://www.colfuturo.org/scolciencias?reset" title="Solicitar una contraseña nueva por correo electrónico.">¿Olvidó su clave?</a>
                      </li>
                    </ul> -->
                </div>
            <?php endif;?>
            </div>
      <?php }
      else{
        global $user;
        $user_data = user_load($user->uid);?>
        <?php if( $user_data->uid > 0 ): ?>
        <a class="link_login_edit" href="/user/<?php echo $user_data->uid; ?>/edit">Edite sus datos</a>
        <a class="link_login_out" href="/user/logout">CERRAR SESIÓN</a>
        <?php endif;
      } ?>
  </div>
</div>
<script src="<?php echo $path?>libs/jquery/jquery.js"></script>
<script src="<?php echo $path?>src/jquery.backstretch.js"></script>
<script>
var path="sites/all/themes/colfuturo_atsubtheme/src/";
$.backstretch([
  path+"images/gbe_2.jpg",
  path+"images/gbe_3.jpg",
  path+"images/gbe_1.jpg"
  ], {
    fade: 750,
    duration: 4000
  });
</script>
</body>
</html>
<?php }
function _user_pass() {
    $form = render(drupal_get_form('user_pass'));
    return theme_status_messages().$form;
}
function _user_login() {
    $form = render(drupal_get_form('user_login'));
    return theme_status_messages().$form;
}
function _user_register(){
  $form = render(drupal_get_form('user_register_form'));
  return theme_status_messages().$form;
}
?>
