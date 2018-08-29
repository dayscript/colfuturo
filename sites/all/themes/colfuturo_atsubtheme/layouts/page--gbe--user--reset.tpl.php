<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://www.colfuturo.org/sites/all/themes/colfuturo_atsubtheme/src/src/login.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Puritan:400,700,400italic,700italic|BenchNine:300,400,700' rel='stylesheet' type='text/css'>
    <link href="sites/all/themes/colfuturo_atsubtheme/src/src/home.css" rel="stylesheet" type="text/css">
    <title>Restablecer la contraseña</title>
  </head>
  <body>
    <div class="header-login" style="max-width: 100%;">
      <div style="width: 100%; float: left;">
        <span style="margin-left: 10px;display: block;margin: 0 auto;width: 100px;">
        <?php 
        global $user;
        $name_user = user_load(arg(2))->name;
        print $name_user;
        ?>
        </span>
      </div>
    </div>
    <div class="text-departamento">
      <h1>Restablecer la contraseña</h1>
    </div>
    <div class="container">
      <div class="container_dentro">
        <div class="scolciencias-form-edit-profile">
      <?php module_load_include('inc', 'change_pwd_page');
        global $user;
        $account = user_load($user->uid);
        ?>
        <?php if ($content = render($page['content'])): ?>
          <div id="content">
            <?php print $content; ?>
          </div>
        <?php endif; ?>
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