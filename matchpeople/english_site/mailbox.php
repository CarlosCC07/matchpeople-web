<?php include("header.php");?>

<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/buzon.png" class="noventa" > </div>
  </div>
  <div class="text gap1">
    <h1  class="Titulosec">Transparency Mailbox</h1>
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
          <div class="notaform" data-helper="Insert your name">
            <label for="Name:"><strong>Name:</strong></label>
            <input type="text" name="nombre" id="nombre" value="" title="Insert your name" placeholder="Name">
          </div>
          <div class="notaform" data-helper="Insert your telephone">
            <label ><strong>Telephone:</strong></label>
            <input type="text" name="telefono" id="telefono" value="" title="Insert your telephone" placeholder="(81) 83891500"/>
          </div>
          <div class="notaform" data-helper="Insert your email">
            <label for="email"><strong>E-mail:</strong></label>
            <input type="email" name="email" id="email" class="required email" title="Insert your email" placeholder="email@matchpeople.com">
          </div>
          <div class="notaform" data-helper="Select a company">
          <label><strong>From what company is your comment?</strong></label>
           <select name="empresa" lang="es" class="required ">
              <option value="matchpeople">Matchpeople</option>
              <option value="voxxcenter">Voxxpeople</option>
           </select>
          </div>
          <div class="notaform" data-helper="Select ethics that was violated">
          <label ><strong>Which ethic rule was broken?</strong></label>
          <select name="infracion" lang="es" class="required ">
           	 <option value="conflictoDeInteres">Conflict interest</option>
             <option value="protecciónDeActivos">Information Management</option>
             <option value="regalosyAtenciones">Special Atention</option>
             <option value="relaciónClientesProvedores">Dealing with customers and supplierss</option>
             <option value="protecciónActivos">Asset Protection</option>
             <option value="relaciónesAutoridadesComunidad">Relations with authorities and community</option>
             <option value="respectoPersona">Personal Aspect</option>
             <option value="otros">others</option>
          </select>
          </div>
          <hr class="gap2">
          <div>
          	<h3 class="gap1">Description of your complaint</h3>
          </div>
          <div class="notaform" data-helper="The Event Place">
          <label ><strong>Where did the event take place?</strong></label>
          <textarea name="hechos" cols="" rows="5" class="required" placeholder="In the morning, at the offices of the company "></textarea>
          </div>
          <div class="notaform" data-helper="Day and date on which the facts">
          <label ><strong>When did the event take place?</strong></label>
          <textarea name="cuandoOcurrieron" cols="" rows="4" class="required" placeholder="On Monday morning "></textarea>
          </div>
          <div class="notaform" data-helper="Persons who participated">
          <label ><strong>Who participated in the event?</strong></label>
          <textarea name="quienesIntervinieron" cols="" rows="4" class="required" placeholder=" Managers "></textarea>
          </div>
          <div class="notaform" data-helper="Describe the facts">
          <label ><strong>How did the event take place?</strong></label>
          <textarea name="comoOcurrieron" cols="" rows="4" class="required" placeholder="They happened at the end of the board …"></textarea>
          </div>
          <div class="notaform">
          <h4>File:</h4>
          </div>
          <div class="notaform" data-helper="Facts">
           <label ><strong>Do you have witnesses to the event?</strong></label>
            <input name="archivo1" type="file">
            <textarea name="textoPreubas" cols="" rows="4" class="required" placeholder=""></textarea>
          </div>
          <div class="notaform" data-helper="Enter your comment">
          <label ><strong>Comments or Recommendations</strong></label>
           <textarea name="ComentariosRecomendaciones" cols="" rows="4" placeholder="Enter your comments "></textarea>
           </div>
          <div class="notaform" data-helper="Antispam code">
            <label for="codigo">Antispam code... <span id="secret"></span> (<a href="#" class="refresh">change</a>)</label>
            <input type="text" name="codigo" id="codigo" class="required antispam" maxlength="6" minlength="6" title="Insert antispam code">
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
