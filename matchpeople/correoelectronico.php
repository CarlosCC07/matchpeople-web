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
<meta name="keywords" content="Correo Electrónico" />
<title>Match People - Correo Electrónico </title>
<link rel="alternate" hreflang="es-mx" href="https://matchpeople.com/correoelectronico.php" />
<link rel="alternate" hreflang="en-us" href="https://matchpeople.com/english_site/email.php" />
<?php include("header.php");?>
<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/contacto.png" alt="Correo Electrónico" class="noventa" > </div>
  </div>
  <div class="text gap1">
    <h1  class="Titulosec">Correo Electrónico</h1>
    <div class="textInfo">
       <div id="error">
       <?php if( !empty($enviado) && $enviado) {
        if( $enviado && $errores !== null ) { echo '<ul><li>' . implode('</li><li>', $errores) . '</li></ul>';
			  }}else {  }?>
      </div>
      <form action="sendEmail.php" class="datos" method="post" name="form1" id="form_buzon">
        <fieldset>
          <div  class="notaform" id="validate">
            <ul class="red">
            </ul>
          </div>
          <div class="notaform" data-helper="Casua de la denuncia">
            <label for="Asunto"><strong>Asunto</strong></label>
            <input type="text" name="DenunciaElectronica" placeholder="Asunto" id="asunto" class="required" title="Motivo de denuncia">
          </div>
          <div class="notaform" data-helper="Introduce tu comentario" >
            <label for="email"><strong>Mensaje</strong>:</label>
            <textarea name="mensaje" id="mensaje" placeholder="Causa de la denuncia"  class="required sesenta" rows="5" title="Escriba el mensaje"></textarea>
          </div >
          <div class="notaform" data-helper="código antispan">
            <label for="codigo">El c&oacute;digo ... <span id="secret"></span> (<a href="#" class="refresh">cambiar</a>)</label>
            <input type="text" name="codigo" id="codigo" class="required antispam" maxlength="6" minlength="6" title="Ingresa el c&oacute;digo antispam">
          </div>
          <div class="submit notaform">
            <input type="submit" name="enviar" value="Enviar" class="btn2">
          </div>
        </fieldset>
      </form>
    </div>
  </div>

  <!--servicos-nav -->
  <?php include("menus/servicios_principales.php");?>
  <!-- fin de servicios-nav -->
  </div>

<?php include("footer.php");?>
