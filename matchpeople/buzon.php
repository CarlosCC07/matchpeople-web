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
<meta name="keywords" content="Buzón de Transparencia" />
<title>Match People -Buzón de Transparencia </title>
<link rel="alternate" hreflang="es-mx" href="https://matchpeople.com/english_site/mailbox.php" />
<link rel="alternate" hreflang="en-us" href="https://matchpeople.com/english_site/mailbox.php" />

<?php include("header.php");?>
<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/buzon.png" alt="Buzon de Transparencia" class="noventa"> </div>
  </div>
  <div class="text gap1">
    <h1  class="Titulosec">Buzón de Transparencia</h1>
    <div class="textInfo">
    <div id="error">
      <?php if( !empty($enviado) && $enviado) {
      if( $enviado && $errores !== null ) {
				echo '<ul><li>' . implode('</li><li>', $errores) . '</li></ul>';
			}} ?></div>
      <form action="sendbuzon.php" class="datos" method="post" name="form1" id="form_buzon" enctype="multipart/form-data">
        <fieldset>
          <div  class="notaform" id="validate">
            <ul class="red">
            </ul>
          </div>
          <div class="notaform" data-helper="Introduce tu nombre">
            <label for="Name"><strong>Nombre:</strong></label>
            <input type="text" name="nombre" id="nombre" value="" title="Introduce tu nombre" placeholder="Tu Nombre">
          </div>
          <div class="notaform" data-helper="Introduce tu telefono">
            <label ><strong>Teléfono:</strong></label>
            <input type="text" name="telefono" id="telefono" value="" title="Introduce tu teléfono" placeholder="(81) 83891500"/>
          </div>
          <div class="notaform" data-helper="Introduce tu correo electronico">
            <label for="email"><strong>E-mail:</strong></label>
            <input type="email" name="email" id="email" class="required email" title="Introduce tu correo electrónico" placeholder="ejemplo@matchpeople.com">
          </div>
          <div class="notaform" data-helper="Selecciona una empresa">
          <label><strong>¿Sobre qué empresa es el comentario?</strong></label>
           <select name="empresa" lang="es" class="required ">
              <option value="matchpeople">Matchpeople</option>
           </select>
          </div>
          <div class="notaform" data-helper="Selecciona la ética que se infringió  ">
          <label ><strong>¿Qué norma de ética se infringió?</strong></label>
          <select name="infracion" lang="es" class="required ">
              <option value="conflictoDeInteres">Conflicto de Intereses</option>
              <option value="protecciónDeActivos">Protección de activos</option>
              <option value="regalosyAtenciones">Regalos y Atenciones</option>
              <option value="relaciónClientesProvedores">Relación con clientes y provedores</option>
              <option value="protecciónActivos">Protección de activos</option>
              <option value="relaciónesAutoridadesComunidad">Relaciónes con autoridades y comunidad</option>
              <option value="respectoPersona">Respecto de la persona</option>
              <option value="otros">Otros</option>
            </select>
          </div>
          <hr class="gap2">
          <div>
          	<h3 class="gap1">Narración de los Hechos</h3>
          </div>
          <div class="notaform" data-helper="¿Dónde ocurrieron los hechos?">
          <label ><strong>¿Dónde ocurrieron los hechos?</strong></label>
          <textarea name="hechos" cols="" rows="5" class="required" placeholder="Por la mañana, en las oficinas de la empresa "></textarea>
          </div>
          <div class="notaform" data-helper="Día y fecha en que ocurrieron los hechos">
          <label ><strong>¿Cuándo ocurrieron los hechos?</strong></label>
          <textarea name="cuandoOcurrieron" cols="" rows="4" class="required" placeholder="El pasado lunes, por la mañana "></textarea>
          </div>
          <div class="notaform" data-helper="Personas que participaron">
          <label ><strong>¿Quiénes intervinieron en los hechos?</strong></label>
          <textarea name="quienesIntervinieron" cols="" rows="4" class="required" placeholder="Los directivos "></textarea>
          </div>
          <div class="notaform" data-helper="Describe los hechos">
          <label ><strong>¿Cómo ocurrieron los hechos?</strong></label>
          <textarea name="comoOcurrieron" cols="" rows="4" class="required" placeholder="Sucedieron al terminar la junta …"></textarea>
          </div>
          <div class="notaform">
          <h4>Archivo:</h4>
          </div>
          <div class="notaform" data-helper="Pruebas de los hechos">
           <label ><strong>¿Existen pruebas de los hechos?</strong></label>
            <input name="archivo1" type="file">
            <textarea name="textoPreubas" cols="" rows="4" class="required" placeholder="si, los archivos que adjunto"></textarea>
          </div>
          <div class="notaform" data-helper="Si tienes alguna recomendación puedes ponerla aquí">
          <label ><strong>Comentarios o Recomendaciones</strong></label>
           <textarea name="ComentariosRecomendaciones" cols="" rows="4" placeholder="Si tienes alguna recomendación puedes ponerla aquí "></textarea>
           </div>
          <div class="notaform" data-helper="Ingresa el código antispam">
            <label for="codigo">Y el código antispam... <span id="secret"></span> (<a href="#" class="refresh">cambiar</a>)</label>
            <input type="text" name="codigo" id="codigo" class="required antispam" maxlength="6" minlength="6" title="Ingresa el código antispam">
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
