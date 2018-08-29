<?php
    /*echo "<div class='info_header_description'>
          <p>Registrarse en nuestra p&aacute;gina es un proceso gratuito y seguro. Al hacerlo usted podr&aacute; diligenciar los formularios de aplicaci&oacute;n en l&iacute;nea y tendra acceso a m&aacute;s informaci&oacute;n de inter&eacute;s sobre educaci&oacute;n internacional.</p>
          <p>Si tiene alguna duda con respecto a la informaci&oacute;n para diligenciar, ubiquese sobre la interrogaci&oacute;n.</p>
          <p>Todos los campos son obligatorios</p></div>";*/
?>
<?php 
  print render($form['form_id']);
  print render($form['form_build_id']);
  print render($form['account']);
  print render($form['field_nombres']);
  print render($form['field_apellidos']);
  print render($form['field_genero']);
  print render($form['field_interes']);
  print render($form['field_area_de_interes']);
?>
<p>&nbsp;</p>
<h4 style="float:left; width:100%;">Autorización para el tratamiento de datos personales</h4>
<div style="float: left;
            height: 120px;
            overflow-y: auto;
            width: 100%;
            font-size:12px;
">
    
    Al hacer uso de este sitio, realizando el proceso de inscripción para convocatorias y conferencias, registrando sus datos personales en los campos establecidos para ello, usted otorga su consentimiento previo, expreso e informado a FUNDACIÓN PARA EL FUTURO DE COLOMBIA – COLFUTURO, fundación constituida y existente bajo las leyes de la República de Colombia, con NIT 800145400-8 y domiciliada en la Carrera 15 No 37-15 (“COLFUTURO”), para que, directamente o a través de sus empleados, consultores, asesores, contratistas o proveedores, realice operaciones de recolección, almacenamiento, uso, circulación, supresión, transferencia, transmisión, cotejo y búsqueda (el “Tratamiento”), sobre información que pueda ser asociada directa o indirectamente a usted, incluidos datos personales, de contacto, información sobre interés educativo y áreas de interés, información profesional y laboral (los “Datos Personales”) a los que COLFUTURO tenga acceso a través de los formularios de inscripción en línea y cualquier otro medio. El Tratamiento que usted autoriza al ingresar al sitio e inscribir sus datos será necesario para las actividades de financiación de estudios de posgrado en el exterior y de promoción e información de las oportunidades disponibles. Para lograrlo, COLFUTURO someterá a Tratamiento todos los Datos Personales registrados en este sitio, para las siguientes finalidades: (i) inscripción como posible candidato; (ii) inscripción al boletín de información; (iii) presentar y comunicar información sobre posibilidades disponibles de estudio de posgrados en el exterior y de cursos de inglés; (iv) enviar información complementaria de los servicios que ofrece COLFUTURO; (v) realizar un estudio demográfico con el fin de establecer los distintos grupos de edad, de profesión y de género relevantes para las actividades de COLFUTURO; (vi) obtener información estadística sobre las personas interesadas en estudios en el exterior, (vii) enviar las modificaciones a la Política de Tratamiento de la Información de COLFUTURO (la “Política”); (viii) enviar solicitudes para nuevas autorizaciones de Tratamiento; (ix) gestionar las solicitudes, quejas y reclamos sobre Datos Personales; (x) crear y alimentar la base de datos de COLFUTURO; (xi) realizar encuestas de satisfacción, y (xii) informar sobre las convocatorias disponibles para procesos de financiación.
    Con el registro de sus Datos Personales a través del proceso de inscripción a este sitio y la aceptación de este documento, Usted autoriza de manera previa, expresa e informada a COLFUTURO para transferir, transmitir, trasladar, compartir, entregar, y/o divulgar sus Datos Personales a terceros a nivel nacional e internacional, para el cumplimiento de las finalidades indicadas arriba y establecidas en la Política. Registrando sus datos y aceptando este documento usted declara, garantiza y representa que: (i) conoce y entiende la Política, la cual consultó y estudió detenidamente; (ii) conoce y entiende que COLFUTURO es el responsable del Tratamiento; (iii) conoce y entiende los procedimientos para el ejercicio de los derechos que le asisten sobre sus Datos Personales, a conocer, actualizar, rectificar, suprimir o solicitar la revocación de esta autorización, a solicitar prueba de la autorización, a ser informado sobre el Tratamiento, a acceder a sus Datos Personales Tratados y a solicitar información sobre la transmisión y transferencia de sus Datos Personales; (iv) conoce y entiende que cualquier solicitud, reclamo, consulta o inquietud debe dirigirse a la Dirección Administrativa y correo electrónico politicadeinformacion@colfuturo.org, con arreglo a los términos y formas señalados en la Política; (v) ha sido informado del carácter facultativo de las respuestas a las preguntas sobre datos sensibles o sobre datos de niñas, niños y adolescentes; (vi) existen circunstancias inherentes al Tratamiento que expondrá sus Datos Personales a ciertos riesgos, lo cual incluye pero no se limita a riesgos de seguridad, caídas del servicios, ataques a la red, entre otros.
</div>

<?php  
  print render($form['field_autorizacion']);
  print drupal_render($form['actions']); 
?>
