<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="">
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

      <div id="box" class="fluid ">
       <h4 class="terminos">Términos de uso</h4>
        <form name="form1" method="post" action="checkbox.php" id="form_buzon" >
        <fieldset>
          <article class=" info_legal" >
            <ol>
              <li>La persona recomendada debe tener interés en participar en el proyecto.</li>
              <li>La persona recomendada no debe haber sido contactado previamente por mP. </li>
              <li>Si la persona es recomendada por dos recomendadores, se considerará al primero. </li>
              <li>La persona recomendada no debe estar o haber estado en los últimos 4 años en proceso con el cliente. </li>
              <li>El recomendador recibirá su beneficio 2 semanas después de que el candidato entre a trabajar. </li>
              <li>La calidad de las recomendaciones será evaluada en un ranking de credibilidad para futuras referencias. </li>
              <li>El recomendador recibirá una llamada por parte de Match People para justificar su recomendación. </li>
              <li>Si el recomendador hace más de una recomendación acertada en un periodo de un año, cada recomendación siguiente debe ser gratificada con un bono, 5% adicional al monto correspondiente. </li>
              <li>No se discriminará por el tipo de relación con el recomendado: (amigo, familiar, pareja, miembro algún comité, director de carrera, profesor, ex jefe o colaborador, etc.). </li>
              <li>Si se propone para una vacante y queda en otra, de cualquier forma se respeta la gratificación del recomendador, siempre y cuando no pase un periodo mayor a seis meses.</li>
            </ol>
          </article>
        </fieldset>
        <fieldset>
        <input type="checkbox" id="checkbox" name="checkbox" value="1"  >
          <label for="checkbox" style="font-size:14px">He leído y comprendo los términos y condiciones legales </label>
         </fieldset>
          <div class="submit center">
          <input class="btn" type="submit" name="submit" id="submit" value="Acepto">
          </div>
        </form>

      </div>

  <div id="footerlegal" class="fluid"  style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:12px; color:#6F6F6F; border-top:medium solid #6F6B6B">
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
        <li style="list-style:none; float:left; padding:0 5px; border-left: #8F8F8F medium solid">
        	<a href="descargas.php" style="color:#900">Descargar BD</a>
        </li>
        <li style="list-style:none; padding:0 5px; border-left: #8F8F8F medium solid; float:left" >
        <a href="#" style="color:#6F6F6F; text-decoration:none">© 2014 Grupo Match People.Todos los derechos reservados.Ninguna parte de este sitio puede ser copiado, distribuido o reproducido sin el permiso previo y por escrito.</a>
        </li>
	</ul>
</div>
<?php include_once("analyticstracking.php") ?>
</body>
</html>
