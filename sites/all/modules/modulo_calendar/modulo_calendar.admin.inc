<?php
/**
 * @file
 * Callbacks de administracion del modulo simple_gmap
 */

/**
 * Definir el formulario de opciones de configuración
 */
function modulo_calendar_configuracion() {  
  
  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Importar Eventos',
      'access callback' => TRUE, 
      
  );
  $form['#submit'][] = 'modulo_calendar_configuracion_submit';  
  return $form;
}

function modulo_calendar_configuracion_submit($form, $form_state) {
    import_google_calendar();

} 

