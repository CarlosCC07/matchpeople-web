<form id="form_estudios" style="margin-left:0; " method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
  <fieldset>
    <ul style=" float:left; width:45%;">
      <li> <strong>Nombre:</strong>
        <input type="text" placeholder="Nombre" name="nombre">
      </li>
      <li> <strong>Empresa:</strong>
        <input type="text" placeholder="empresa" name="empresa">
      </li>
    </ul>
    <ul style="float:left; width:45%; padding-left:5%">
      <li> <strong>e-mail:</strong>
        <input type="email" placeholder="E-mail" name="email">
      </li>
      <li> <strong>Teléfono:</strong>
        <input type="number" placeholder="Telefono" name="telefono">
      </li>
    </ul>
    <br>
    <ul style="float:none;">
      <li> <strong style="display:inline-block">Estudio de interés:</strong>
        <select name="interes">
          <option value="Estudio de Pilotos">Estudio de Pilotos</option>
          <option value="Monterrey 100">Monterrey 100</option>
          <!--<option value="Centros de Investigación">Centros de Investigación</option>
          <option value="Industria Energética">Industria Energética</option>
          <option value="Comercial">Comercial</option>-->
        </select>
      </li>
      <li><strong>Comentarios</strong>
        <textarea name="comentarios" rows="5"></textarea>
      </li>
    </ul>
    <ul >
      <li>
        <label for="filtro" class="oculto">¡Si ves esto, no llenes el siguiente campo!</label>
        <input type="text" name="filtro" class="oculto">
        <input type="submit" class="btn3" value="Enviar" name="sendform" >
      </li>
    </ul>
  </fieldset>
</form>
<?php
if( !empty($_POST["submit"]) && $_POST["submit"]){
	if ($_POST['nombre'] == ""){

	}
	else{
    	if ($_POST['filtro'] != ""){
    		// Es un SPAMbot
    		exit();
		}
		else{
			$MESSAGE_BODY  = " <strong>Nombre:</strong> ".$_POST["nombre"]."<br />";
			$MESSAGE_BODY .= " <strong>Email</strong>: ".$_POST["email"]."<br />";
			$MESSAGE_BODY .= " <strong>Telefono:</strong> ".$_POST["telefono"]."<br />";
			$MESSAGE_BODY .= " <strong>Empresa:</strong> ".$_POST['empresa']."<br />";
			$MESSAGE_BODY .= " <strong>Interes:</strong> ".$_POST['interes']."<br />";
			$MESSAGE_BODY .= " <strong>comentarios:</strong> ".$_POST['comentarios']."<br />";
			$email  = "et@matchpeople.onmicrosoft.com";

			$from = $_POST["email"]; // sender
			$subject = utf8_decode($_POST["empresa"])." esta interesada en ".utf8_decode($_POST['interes']);
			$mensaje = utf8_decode($MESSAGE_BODY);
			// Cabeceras necesarias para enviar el mail
			$cabeceras  = "From: ".$_POST["email"]."\n";
			$cabeceras .= "Reply-To: ".$_POST["email"]."\n";
			$cabeceras .= "MIME-version: 1.0\n";
			$cabeceras .= "Content-type: multipart/mixed; ";
			$cabeceras .= "boundary=\"Message-Boundary\"\n";
			$cabeceras .= "Content-transfer-encoding: 7BIT\n";
			$cabeceras .= "X-attachments: $nombref";

    		// Adjuntar el cuerpo
			$body_top  = "\n\n--Message-Boundary\n";
			$body_top .= "Content-type: text/html; charset=US-ASCII\n";
			$body_top .= "Content-transfer-encoding: 7BIT\n";
			$body_top .= "Content-description: Mail message body\n\n";
			$cuerpo = $body_top.$mensaje;

    		// send mail
    		mail($email,$subject,$cuerpo, $cabeceras);
			//Envío el correo
    		echo "Thank you for sending us feedback";}
			}
}
?>
<?php
if( !empty($_POST["submit"]) && $_POST["submit"]){
	if ($_POST['nombre_form'] == ""){

	}
	else{
    	if ($_POST['filtro'] != ""){
    		// Es un SPAMbot
    		exit();
		}
		else{
			//Envío el correo a cliente
			$email  = "et@matchpeople.onmicrosoft.com";
			$MESSAGE_CLIENT.="
			<div id='header'  style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262 '>
	<div id='logo' style='float:left; padding-left:5%; ' >
    <img src='http://m.c.lnkd.licdn.com/media/p/8/000/24b/31f/04aa5f8.png' width='100' height='60' alt=''/>
    </div>
    <div style='float:right; padding-right:5%; padding-top:25px;'>
    ".$_POST["nombre"].", tu solicitud se ha completado.
    </div>
    <div id='estado' style='background-color:#900; color:#FFFFFF; display:inline-block;  width:100%; text-align:center'>
    	<h2>Tu solicitud para ".$_POST['interes'].":</h2>
        <h3>ha sido enviada. </h3>
    </diV>
</div>
			<div id='contenido' style='font-family:Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262'>
<p>Hola ".$_POST["nombre"].",</p>
<p>¡Enhorabuena! tu Solicitud para:</p>
<p> ".$_POST['interes']." se envio con éxisto</p>
<p>Un representante se pondrá en contacto con usted para brindarle más información y continuar con el proceso.</p>

<p>No es necesario que respondas a este correo electrónico. Sin embargo, si crees que este solicitud pudo haberse efectuado por error o fraudulentamente, contáctanos en un plazo de 5 días al 01-800 4015276. </p>
</div>
<div id='footer' style='font-family: Helvetica, Arial, sans-serif; margin:0 auto; width:80%; font-size:12px; color:#6F6F6F; border-top:medium solid #6F6B6B'>
	<ul id='enlaces' style='margin:0; padding:5px 0 5px 0; display:inline-block;'>
		<li style='list-style:none; float:left; padding:0 5px 0 0;'>
        	<a href='http://www.facebook.com/pages/Matchpeople/138678919477097' style='color:#900'>Facebook</a>
        </li>
        <li  style='list-style:none; float:left; padding:0 5px; border-left: #8F8F8F medium solid'>
        	<a href='https://twitter.com/MatchPeople' style='color:#900'>Twitter</a>
        </li>
        <li style='list-style:none; float:left; padding:0 5px; border-left: #8F8F8F medium solid'>
        	<a href='http://www.linkedin.com/company/match-people' style='color:#900'>Linkedin</a>
        </li>
        <li style='list-style:none; float:left; padding:0 5px; border-left: #8F8F8F medium solid'>
        	<a href='www.matchpeople.com' style='color:#900'>Matchpeople</a>
        </li>
        <li style='list-style:none; padding:0 5px; border-left: #8F8F8F medium solid; float:left' >
        <a href='#' style='color:#6F6F6F; text-decoration:none'>© 2014 Grupo Match People.Todos los derechos reservados.</a>
        </li>
	</ul>
</div>";

			$from_Cliente = $email; // sender
			$subject_Cliente = "Información recibida";
			$mensaje_Cliente = utf8_decode($MESSAGE_CLIENT);

    		// Cabeceras necesarias para enviar el mail
			$cabeceras_Cliente  = "From: ".$email."\n";
			$cabeceras_Cliente .= "Reply-To: ".$email."\n";
			$cabeceras_Cliente .= "MIME-version: 1.0\n";
			$cabeceras_Cliente .= "Content-type: multipart/mixed; ";
			$cabeceras_Cliente .= "boundary=\"Message-Boundary\"\n";
			$cabeceras_Cliente .= "Content-transfer-encoding: 7BIT\n";

    		// Adjuntar el cuerpo
			$body_top_Cliente  = "\n\n--Message-Boundary\n";
			$body_top_Cliente .= "Content-type: text/html; charset=US-ASCII\n";
			$body_top_Cliente .= "Content-transfer-encoding: 7BIT\n";
			$body_top_Cliente .= "Content-description: Mail message body\n\n";
			$cuerpo_Cliente = $body_top_Cliente.$mensaje_Cliente;

    		// send mail
    		mail($_POST["email"],$subject_Cliente,$cuerpo_Cliente, $cabeceras_Cliente);


		}
	}
}
?>
