<?
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:terminos.php');
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
<meta name="keywords" content="" />
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

<!--Css para los validar campos de formulario -->
<link rel="stylesheet" type="text/css" href="css/validador.css">
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

<!--script para formato de  chaptcha google-->
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean',
	 custom_theme_widget: 'recaptcha_widget'
 };
 </script>

</head>
<body>
<div id="logo">
  <img src="img/recomienda-un-amigo.jpg" alt="recomienda un amigo"/>
</div>

<div id="box2">
  <div  class="notaform" id="validate">
    <ul class="red">
    </ul>
  </div>
  <div class="Titulosec">Para participar contesta el siguiente formulario. <i>(Los campos con un asterisco son requeridos.)</i>
  </div>

  <form action="send_CV.php" class="datos" method="post" name="form1" id="form_buzon" enctype="multipart/form-data" >

      <fieldset class="derecha">
        <div>
          <h4>Datos del Recomendador</h4>
        </div>
        <div class="notaform" data-helper="Introduce tu nombre">
          <label for="Name"><strong class="red">*</strong><strong>Nombre del Recomendador:</strong></label>
          <input  type="text" name="nombre" id="nombre" value="" title="Introduce tu nombre Completo" placeholder="Tu Nombre" class="required">
        </div>
        <div class="notaform" data-helper="Introduce tu Teléfono">
          <label ><strong>Teléfono del Recomendador:</strong></label>
          <input type="text" name="telefono" id="telefono" value="" title="Introduce tu Teléfono" placeholder="(81) 83891500" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;"/>
        </div>
        <div class="notaform" data-helper="Introduce tu Celular">
          <label ><strong class="red">*</strong><strong>Introduce tu Celular:</strong></label>
          <input type="text" name="celular" id="celular" value="" title="Introduce Numero Celular" placeholder="(81) 83891500" class="required" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;"/>
        </div>
        <div class="notaform" data-helper="Introduce tu E-mail">
          <label for="email"><strong class="red">*</strong><strong>Introduce tu E-mail:</strong></label>
          <input type="email" name="email" id="email" class="required email" title="Introduce tu e-mail electrónico" placeholder="ejemplo@matchpeople.com.mx" >
        </div>
      </fieldset>

      <fieldset class="izquierda" style="margin-bottom:10px">
        <div>
          <h4> Datos del Candidato</h4>
        </div>
        <div class="notaform" data-helper="Nombre del Candidato">
          <label for="Name"><strong class="red">*</strong><strong>Nombre del Candidato:</strong></label>
          <input type="text" name="nombreCandidato" id="nombreCandidato" value="" title="Introduce el nombre del candidato" placeholder="Tu Nombre" class="required">
        </div>
        <div class="notaform" data-helper="Teléfono del Candidato">
          <label ><strong>Teléfono del Candidato:</strong></label>
          <input type="text" name="telefonoCandidato" id="telefonoCandidato" value="" title="Introduce el Teléfono del Candidato" placeholder="(81) 83891500"  onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;"/>
        </div>
        <div class="notaform" data-helper="Celular del Candidato">
          <label ><strong class="red">*</strong><strong>Celular del Candidato:</strong></label>
          <input type="text" name="celularCandidato" id="celularCandidato" value="" title="Introduce Numero Celular" placeholder="(81) 83891500" class="required" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;"/>
        </div>
        <div class="notaform" data-helper="E-mail del Candidato">
          <label for="email"><strong class="red">*</strong><strong>E-mail del Candidato:</strong></label>
          <input type="email" name="emailCandiato" id="emailCandato" class="required email" title="Introduce el e-mail del Candidato" placeholder="ejemplo@matchpeople.com.mx">
        </div>
        <div class="notaform" data-helper="Selecciona una Vacante">
          <label ><strong class="red">*</strong><strong>Vacante a la que aplica el Candidato:</strong></label>
          <select class="required" name="vacante" id="vacante">
          <?php
					include("../clavesbd.php");
					/*
					$servername = "localhost";
					//$username = "dbu761266";
					//$password = "#M4tch-2013!bd";
					//$dbname = "dbs431888";
					$username = "root";
					$password = "";
					$dbname = "matchpeo_vacantesBD";
					*/
					// Create connection
					$con = mysqli_connect($servername, $username, $password, $dbname);
					mysqli_set_charset($con,"utf8");
					// Check connection
					if (!$con) {
					    die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT vacante FROM ListaVacantes";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
					   echo "
					   <option value='". $row["vacante"]."'>". $row["vacante"]. "</option>";
					    }
					} else {
					    echo "0 results";
					}

					mysqli_close($con);
					?>
          </select>
        </div>
        <!--<div class="notaform" data-helper="Pruebas de los hechos">
          <label ><strong>C.V.</strong></label>
          <input name="archivo1" type="file">
        </div>-->
      </fieldset>

    <!--codigo para captcha de google -->
    <div style="display: inline-block">
      <?php
          require_once('recaptchalib.php');
          $publickey = "6Lckd_wSAAAAAE09Hp_ilqSL0mI-7AA7TYqFbhHj"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
   </div>
    <div class="submit center">
      <input type="submit" name="enviar" value="Enviar" class="btn2">
    </div>
  </form>
</div>
<div id="footerlegal" style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:12px; color:#6F6F6F; border-top:medium solid #6F6B6B; width:80%; margin:0 auto;">
	<ul id="enlaces" style="margin:0; padding:5px 0 5px 0; display:inline-block;">
		<li style="list-style:none; float:left; padding:0 5px 0 0;">
        	<a href="http://www.facebook.com/pages/Matchpeople/138678919477097" style="color:#900">Facebook</a>
        </li>
        <li  style="list-style:none; float:left; padding:0 5px; border-left: #8F8F8F medium solid">
        	<a href="https://twitter.com/MatchPeople" style="color:#900">Twitter</a>
        </li>
        <li style="list-style:none; float:left; padding:0 5px; border-left: #8F8F8F medium solid">
        	<a href="http://www.linkedin.com/company/match-people" style="color:#900">Linkedin</a>
        </li>
        <li style="list-style:none; float:left; padding:0 5px; border-left: #8F8F8F medium solid">
        	<a href="http://www.matchpeople.com.mx/" style="color:#900">Matchpeople</a>
        </li>
        <li style="list-style:none; padding:0 5px; border-left: #8F8F8F medium solid; float:left" >
        <a href="#" style="color:#6F6F6F; text-decoration:none">© 2014 Grupo Match People.Todos los derechos reservados.Ninguna parte de este sitio puede ser copiado, distribuido o reproducido sin el permiso previo y por escrito.</a>
        </li>
	</ul>
</div>

<!--java script general-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<!--java scrips para validar formularios -->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
<script type="text/javascript" src="js/validador.js"></script>

<?php include_once("analyticstracking.php") ?>
</body>
</html>
