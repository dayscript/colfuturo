<!--
CAMPOS DISPONIBLES

	field_nombres
	field_field_apellidos
	field_genero
	field_area_de_interes
	field_interes
	field_autorizacion 
	mail
	name
	status 
	field_idiomas_de_inter_s
	field__rea_de_inter
	field_ciudad_de_residencia
	return_url
 -->
<?php
   if(count($_GET) > 0){
		foreach ($_GET as $key => $value) {
		echo $key.' : '.$value.'<br>';
		}
   }
	$json=array('data'=>array(
							'name' => 'aacevedo', 			// Este campo le dice a drupal que usuario debe actualizar
							'field_nombres'=>'Ariel',
							'field_apellidos'=>'Acevedo',
							'field_interes'=>array( 0 =>'Programa de Idiomas',	
													1 =>'Estudios de posgrado en el exteriors'),// este campo es esencial que se envie de esta manera porque es de multiples opciones de seleccion, si es solo una opcion se enviaria array( 0 =>'Programa de Idiomas') si son dos array( 0 =>'Programa de Idiomas',1 =>'Estudios de posgrado en el exteriors') y asi sucesivamente.
							'field_genero'=>'Masculino',
							'mail'=>'aacevedasdasdasao@dayscript.com',
							'status' =>'1',
							'field_idiomas_de_inter_s' => 'Ingles',
							'field__rea_de_inter' => 'Administración y Negocios',
							'field_ciudad_de_residencia' => '',
							'return_url' => 'http://portal5.colfuturo.org/webservices/index.php',// la url a donde debe retornar el webservices
							'return_usssssrl' => 'http://portal5.colfuturo.org/webservices/index.php'// la url a donde debe retornar el webservices
							//Se pueden agregar mas campos siN problema, si el campo no existe drupal lo omite
							)
				);
	$json = json_encode($json);
?>
<html>
	<body>
		<form action="http://portal5.colfuturo.org/potenciales/update" method="post">
			<textarea id ="datos_usuario" name ="datos_usuario" class="datos_usuario" style="margin: 0px; width: 748px; height: 163px;">
				<?php print $json;?>
			</textarea>
		<input type="submit"  value="Enviar" />
		</form>
	</body>
<html>