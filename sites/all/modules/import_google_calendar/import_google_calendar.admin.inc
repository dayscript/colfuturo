<?php
/**
 * @file
 * Callbacks de administracion del modulo simple_gmap
 */

/**
 * Definir el formulario de opciones de configuración
 */
function import_google_calendar_configuracion() {  
  
  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Importar Eventos',
  );
  $form['#submit'][] = 'import_google_calendar_configuracion_submit';  
  return $form;
}

function import_google_calendar_configuracion_submit($form, $form_state) {
    import_google_calendar_request_calendar( 'manual' );
}