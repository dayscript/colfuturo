<?php

global $user;
if($user->uid != 0):
	$users = user_load($user->uid);

?>

	<div class="col-xs-11 col-xs-offset-1 BarraProgreso">
		<div>
			<p class="usuario"><?php print $users->field_nombres['und'][0]['value'].' '.$users->field_apellidos['und'][0]['value'];  ?></p>
		</div>
		<div class="boxProgreso">
			<div class="prog">
				<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style=" width:<?php print $data.'%'?> ">
					<span class="sr-only"></span>
				</div>
				</div>
				<span class="porcentajeProgress"><?php print $data.'%'; ?></span>
				<div class="msj">
					<img class="image-msj"src="//www.colfuturo.org/sites/default/files/mensaje.png" alt="">
					<span class="notificacion">0</span>
					<div class="oculto list-notification box-notification"></div>
				</div>
			</div>
		</div>
		<div class="accionesUsuario">
			<a href="/user_iframe" class="cambiarClave"><span class="glyphicon-pencil" aria-hidden="true"></span> Editar datos</a>
			<a href="/user/<?php print $user->uid;?>/change-password" class="cambiarClave"><span class="glyphicon-lock" aria-hidden="true"></span> Cambiar clave</a>
			<a href="/user/logout" class="closeSesion"><span class="glyphicon-off" aria-hidden="true"></span> Cerrar sesión</a>
		</div>
	</div>

<?php else:?>
	<div class="col-xs-11 col-xs-offset-1 BarraProgreso">
		<div class="accionesUsuario">
			<a href="/user" class="cambiarClave ingresar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ingresar</a>
		</div>
	</div>
<?php endif?>
