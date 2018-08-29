<?php
	drupal_add_css(drupal_get_path('module', 'simple_gmap') .'/simple_gmap.css');
	drupal_add_js('https://maps.googleapis.com/maps/api/js?sensor=false');
	drupal_add_js(drupal_get_path('module', 'simple_gmap') .'/simple_gmap.js');
?>
<div id="content_simple_gmap_border" 
	 style="height: <?php echo $height ?>px; width: <?php echo $width ?>px;"
>
	<div id="content_simple_gmap" 
		 lat="<?php echo $latitude; ?>" 
		 lon="<?php echo $longitude; ?>"
		 zoom="<?php echo $zoom; ?>"  
		 style="height: <?php echo $height ?>px; width: <?php echo $width ?>px;"
	>
	</div>
</div>