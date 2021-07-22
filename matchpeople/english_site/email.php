<?php include("header.php");?>
<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/contacto.png" class="noventa" > </div>
  </div>
  <div class="text gap1">
    <h1  class="Titulosec">E-mail of Ethics</h1>
    <div class="textInfo">
      <div id="error">
        <?php if( !empty($enviado) && $enviado) {
          if($enviado && $errores !== null ){echo '<ul><li>' . implode('</li><li>', $errores) . '</li></ul>';}
			     }else {} ?>
      </div>
      <form action="sendEmail.php" class="datos" method="post" name="form1" id="form_buzon">
        <fieldset>
          <div  class="notaform" id="validate">
            <ul class="red">
            </ul>
          </div>
          <div class="notaform" data-helper="Casue of the complaint">
            <label for="Asunto"><strong>Subject</strong></label>
            <input type="text" name="DenunciaElectronica" placeholder="Subject" id="asunto" class="required" title="Subject">
          </div>
          <div class="notaform" data-helper="Enter your comment" >
            <label for="email"><strong>Message</strong>:</label>
            <textarea name="mensaje" id="mensaje" placeholder="Message"  class="required" rows="5" title="Message"></textarea>
          </div >
          <div class="notaform" data-helper="Antispam code">
            <label for="codigo">code ... <span id="secret"></span> (<a href="#" class="refresh">change</a>)</label>
            <input type="text" name="codigo" id="codigo" class="required antispam" maxlength="6" minlength="6" title="Insert antispam code">
          </div>
          <div>
            <label for="filtro" class="oculto">¡Si ves esto, no llenes el siguiente campo!</label>
            <input type="text" name="filtro" class="oculto">
          </div>
          <div class="submit notaform">
            <input type="submit" name="enviar" value="Submit" class="btn2">
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <!--servicos-nav -->
  <?php include("serices_menu.php");?>
  <!-- fin de servicios-nav -->
</div>
<?php include("footer.php");?>
