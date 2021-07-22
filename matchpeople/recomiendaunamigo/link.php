<?php
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:descargas.php');
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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Matchpeople | Recomienda un Amigo</title>
<meta name="description" content="consultoría de recursos humanos " />
<meta name="keywords" content=" " />
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<!--
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build
-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/respond.min.js"></script>
</head>
<body>
<div id="logo">
  <img src="img/recomienda-un-amigo.jpg" alt="recomienda un amigo"/>
</div>
<div class="gridContainer clearfix">
  <div id="box3">
  <h4 class="terminos2">Presiona el botón de descarga para obtener la base de datos</h4><br>
      <form  id="form_buzon" method="post">
       <a href="DescargarBD.php" class="btn2" style=" margin-bottom:20px; color:#FFF; text-decoration:none; display:inline-block" > Descarga BD</a>
      </form>
  </div>
</div>
</body>
</html>
