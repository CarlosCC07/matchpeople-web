<?php
if ($_POST['filtro'] == ""){
$to = "administrator@matchpeople.onmicrosoft.com;
	$subject = utf8_decode($_POST['DenunciaElectronica']);
	$message = utf8_decode($_POST['mensaje']);
	$from = "anonimo@matchpeople.com.mx";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	}

	else{
    	if ($_POST['filtro'] != ""){
    		// Es un SPAMbot
    		exit();
		}

	}
  	?>
		<!doctype html>
		<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
		<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
		<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
		<!--[if gt IE 8]><!-->
		<html class="">
		<!--<![endif]-->
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content=" " />
		<meta name="keywords" content=" " />
		<title>Match People</title>
<?php include("header.php");?>
<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/contacto.png" class="noventa" > </div>
  </div>
  <div class="text gap1">
    <h1  class="Titulosec">Correo Electrónico</h1>
    <div class="textInfo">
      <h3>Gracias por su confianza</h3>
      <br>
      <h4>La información ha sido enviada </h4>
    </div>
  </div>

  <!--servicos-nav -->
  <?php include("menus/servicios_principales.php");?>
  <!-- fin de servicios-nav -->
  </div>

<?php include("footer.php");?>
