<?php
/**
 * @file
 * Callbacks de administración del módulo simple_gmap
 */

/**
 * Definir el formulario de opciones de configuración
 */
function simple_gmap_configuracion() {  
  $form['latitude_simple_gmap'] = array(
    '#title' => 'Latitude',  
    '#type' => 'textfield',
    '#default_value' => variable_get('latitude_simple_gmap', '4.25'),
    '#required' => TRUE,  
  );
  $form['longitude_simple_gmap'] = array(
    '#title' => 'Longitude',  
    '#type' => 'textfield',
    '#default_value' => variable_get('longitude_simple_gmap', '-74.1833333'),
    '#required' => TRUE,    
  );
  $form['width_simple_gmap'] = array(
    '#title' => 'Ancho',  
    '#type' => 'textfield',
    '#default_value' => variable_get('width_simple_gmap', '500'),
    '#required' => TRUE,    
  );
  $form['height_simple_gmap'] = array(
    '#title' => 'Alto',  
    '#type' => 'textfield',
    '#default_value' => variable_get('height_simple_gmap', '530'),
    '#required' => TRUE,    
  );
  $form['zoom_simple_gmap'] = array(
    '#title' => 'Zoom',  
    '#type' => 'textfield',
    '#default_value' => variable_get('zoom_simple_gmap', '8'),
    '#required' => TRUE, 
  );

  /*$form['markup1_simple_gmap'] = array(
    '#markup' => '<strong>Textos opcionales</strong>',
  );*/

  /*$form['fieldset1_simple_gmap'] = array(
    '#type' => 'fieldset',
    '#title' => t('Header y Footer'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE
  );

  $form['fieldset1_simple_gmap']['header_simple_gmap'] = array(
    '#title' => 'Header',  
    '#type' => 'text_format',
    '#default_value' => variable_get('header_simple_gmap', '')    
  );
  $form['fieldset1_simple_gmap']['fotter_simple_gmap'] = array(
    '#title' => 'Footer',  
    '#type' => 'text_format',
    '#default_value' => variable_get('fotter_simple_gmap', '')    
  );*/
  return system_settings_form($form);
}