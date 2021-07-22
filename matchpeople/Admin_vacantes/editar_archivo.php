<?php
$ar = fopen("../$fileBD.php","w")or die("Error al crear archivo.php");
fwrite($ar,"
<!doctype html>
<!--[if lt IE 7]> <html class='ie6 oldie'> <![endif]-->
<!--[if IE 7]>    <html class='ie7 oldie'> <![endif]-->
<!--[if IE 8]>    <html class='ie8 oldie'> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta name='description' content='$balaso' />
<meta name='keywords' content='$Keywords' />
<title>$nomencuesta</title>
<?php include('header.php');?>
<div id='contenido'>
	<div class='wrapper'>
		<diV class='gap1' stylewidth: 100%; display: inline-block;'>
			<div style='width: 100%; display: inline-block; padding: 0px; margin: 0px;'>
				<div class='imageDes'><img src='img/encuestas/$imagen' alt='$alt' /></div>
					<div class='text-wrapperDes'>
						<h1>$nomencuesta</h1>
							<div class='eyebrow'>$Fecha</div>
							<div class='descriptionDes'>$balaso</div>
						  <div style='margin: 15px 0px;'>$descripcion</div>
							<div><a class='btn5 setenta' href='descargas/$pdf' hreflang='$hreflang' target='_blank'>Descargar Resultados</a>
	</div></div></div></div></div></div>
<?php include('footer.php');?>");
fwrite($ar,"\n");
fclose($ar);
?>
