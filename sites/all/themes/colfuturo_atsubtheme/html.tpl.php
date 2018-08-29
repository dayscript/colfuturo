<?php
/**
 * @file
 * Adaptivetheme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Adaptivetheme Variables:
 * - $html_attributes: structure attributes, includes the lang and dir attributes
 *   by default, use $vars['html_attributes_array'] to add attributes in preprcess
 * - $polyfills: prints IE conditional polyfill scripts enabled via theme
 *   settings.
 * - $skip_link_target: prints an ID for the skip navigation target, set in
 *   theme settings.
 * - $is_mobile: Bool, requires the Browscap module to return TRUE for mobile
 *   devices. Use to test for a mobile context.
 *
 * Available Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 * @see adaptivetheme_preprocess_html()
 * @see adaptivetheme_process_html()
 */
?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"<?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"<?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"<?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9"<?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html<?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&amp;subset=latin,latin-ext">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700&amp;subset=latin,latin-ext"><?php print $styles; ?>
<script>
  //if( document.location.href.indexOf('https') == 0 )
    //document.location.href = 'http' + document.location.href.substr(5);
</script>
<?php print $scripts; ?>
<?php print $polyfills; ?>
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div id="skip-link">
    <a href="<?php print $skip_link_target; ?>" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php if( request_uri() != "/scolciencias"  && request_uri() !='/scolciencias?register' && request_uri()!='/scolciencias?reset'): ?>
  <div class="eventos_fixed" href="#">
        <div class="eventos_fixed_izquierda">
            <h3 class="h3-h4-h5"><?php print date('d') ?></h3>
        </div>
        <div class="eventos_fixed_derecha">
            <h3><?php print date('d') ?></h3>
            <a href="/calendario/mes">Eventos <?print"20";print date('y'); ?></a>
        </div>
  </div>
  <?php endif; ?>

<script src="//cdn.jsdelivr.net/jquery.geocomplete/1.6.4/jquery.geocomplete.min.js"></script>
</body>
</html>
