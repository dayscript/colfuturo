<?

	header( 'Content-Type: text/html; charset=UTF-8' );
	
	$node = ( isset( $_REQUEST['node'] ) && trim( $_REQUEST['node'], '/' ) ? trim( $_REQUEST['node'], '/' ) : '' );
	
	$URL = 'http://www.banrepcultural.org/' . $node;
	
	$content = '';
	$xml = new DOMDocument( );
	$xml->preserveWhiteSpace = false;
	$xml->formatOutput = true;
	$xml->loadHTMLFile( $URL );
	$xpath = new DOMXpath( $xml );
	$elements = $xpath->query( "//div[@class='cab']/*/div[@class='node-inner']/div[@class='content']" );
	
	foreach ( $elements as $child )	{
		$content .= $child->ownerDocument->saveXML( $child );
	}
	
	$content = strip_tags( $content, '<p><b><strong><div><a>' )
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
<head>
	<title>Detalle de publicaci&oacute;n</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/sites/all/themes/colfuturo_atsubtheme/js/publicaciones/jquery-1.7.2.min.js"></script>
	<!-- <link type="text/css" rel="stylesheet" media="all" href="/site/include/styles.css" /> -->
	<style type="text/css">
	html, body	{
		margin:0;
		padding:0;
		background-color:#FFF;
	}
	.publicaciones *	{
		font-family:Verdana;
		font-size:11px;
	}
	.publicaciones .field-titulo-superior .field-items	{
		margin:10px 0px;
		font-size:16px;
		font-weight:bold;
	}
	.publicaciones .autor	{
		margin:0px;
		font-size:12px;
		font-weight:bold;
		color:#999;
	}
	.publicaciones .ficha	{
		margin:10px 0px;
	}
	.publicaciones .ficha p	{
		margin:5px;
	}
	.publicaciones .field-items strong,
	.publicaciones .field-items b	{
		margin:3px 0px;
		display: block;
		clear:both;
	}
	.publicaciones .field-items p	{
		margin: 0;
	}
	.publicaciones .book-attachment	{
		margin:0px;
		font-size:11px;
		font-weight:bold;
		color:#333;
	}
	.publicaciones a,
	.publicaciones a:hover,
	.publicaciones a:visited	{
		font-size:11px;
		color:#A30102;
	}
	.publicaciones a:hover	{
		color:#CB0000;
	}
		
	</style>
	<script type="text/javascript">
	$( function( )	{
		$( 'a' ).each( function( index, obj )	{
			if( $(obj).attr( 'href' ).indexOf( '/files/' ) >= 0 || $(obj).attr( 'href' ).indexOf( '/autores' ) >= 0 )	{
				if( $(obj).attr( 'href' ).indexOf( '://' ) == -1 )
					$(obj).attr( 'href', 'http://www.banrepcultural.org' + $(obj).attr( 'href' ) );
				$(obj).attr( 'target', 'banrep' );
			}
			else	{
				$(obj).replaceWith( $(obj).text( ) );
			}
		});
	});
	</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="640">
<tr>
<td>
	<div><img src="/sites/all/themes/colfuturo_atsubtheme/images/publicaciones/publicaciones_title.jpg" /></div>
	<div class="publicaciones">
<?
	if ( $content )	{
		echo $content;
	}
	else	{
?>
		<div class="content">
			<div class="field field-type-text field-titulo-superior">
				<div class="field-items">
				No es posible mostrar el contenido actual
				</div>
			</div>
		</div>
<?

	}
?>
	<br />
	<br />
	<br />
	<div style="clear:both;"></div>
	</div>
</td>
</tr>
</table>
</body>
</html>
