<?php
/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 * 
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "colfuturo_atsubtheme" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "colfuturo_atsubtheme".
 * 2. Uncomment the required function to use.
 */

/**
 * Preprocess variables for the html template.
 */
/* -- Delete this line to enable.
function colfuturo_atsubtheme_preprocess_html(&$vars) {
  global $theme_key;

  // Two examples of adding custom classes to the body.
  
  // Add a body class for the active theme name.
  // $vars['classes_array'][] = drupal_html_class($theme_key);

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  // $vars['classes_array'][] = css_browser_selector();

}
// */

/**
 * Process variables for the html template.
 */
/* -- Delete this line if you want to use this function
function colfuturo_atsubtheme_process_html(&$vars) {
}
// */

/**
 * Override or insert variables for the page templates.
 */
function colfuturo_atsubtheme_preprocess_page(&$vars) {
  $body_classes = array($vars['classes_array']);
  if ($vars['user']) {
    foreach($vars['user']->roles as $key => $role){
      $role_class = 'role-' . drupal_html_class($role);
      $vars['classes_array'][] = $role_class;
    }
  }
}
function colfuturo_atsubtheme_process_page(&$variables) {
  global $user;
  $has_role = array_intersect(array('colciencias', 'colcienciasBeneficiario'), array_values($user->roles));
  if (empty($has_role) ? FALSE : TRUE) {
    if ( arg(0) == 'user' and is_numeric(arg(1)) and arg(2) == 'edit' || arg(0) == 'user_iframe') {
      $variables['theme_hook_suggestions'][] = 'page__gbe__user__profile';
      drupal_add_css(drupal_get_path('theme', 'colfuturo_atsubtheme') . "/css/gbe.css");
    }
    if ( arg(0) == 'user' and is_numeric(arg(1)) and arg(2) == 'change-password' ) {
      $variables['theme_hook_suggestions'][] = 'page__gbe__change__password';
      drupal_add_css(drupal_get_path('theme', 'colfuturo_atsubtheme') . "/css/gbe.css");
    }
  }
  if ( arg(0) == 'user' and arg(1) == 'reset' and is_numeric(arg(2)) || arg(0) == 'user_iframe' ) {
    $ui_user = user_load(arg(2));
    $roles = array_intersect(array('colciencias', 'colcienciasBeneficiario'), array_values($ui_user->roles));
    if (empty($roles) ? FALSE : TRUE) {
      $variables['theme_hook_suggestions'][] = 'page__gbe__user__reset';
      drupal_add_css(drupal_get_path('theme', 'colfuturo_atsubtheme') . "/css/gbe.css");
    }
  }
}

/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function colfuturo_atsubtheme_preprocess_node(&$vars) {
}
function colfuturo_atsubtheme_process_node(&$vars) {
}
// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function colfuturo_atsubtheme_preprocess_comment(&$vars) {
}
function colfuturo_atsubtheme_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function colfuturo_atsubtheme_preprocess_block(&$vars) {
}
function colfuturo_atsubtheme_process_block(&$vars) {
}
// */
/*function colfuturo_atsubtheme_theme($existing, $type, $theme, $path){
  $hooks['user_register_form']=array(
    'render element'=>'form',
    'template' =>'layouts/user-register',
  );
return $hooks;
}
function colfuturo_atsubtheme_preprocess_user_register(&$variables) {
  $variables['form'] = drupal_build_form('user_register_form', user_register_form(array()));
}*/