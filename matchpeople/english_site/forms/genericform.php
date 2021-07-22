<form id="form1" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
      <ul>
       	<li>
       	<input type="text" placeholder="Name" name="nombre_form">
       	</li>
       	<li>
       	<input type="text" placeholder="Company" name="empresa_form">
       	</li>
       	<li>
       	<input type="email" placeholder="E-mail" name="email_form">
       	</li>
       	<li>
        <input type="number" placeholder="Phone" name="telefono_form">
        </li>
        <li>
          <select name="interes_form">
            <option value="Strategic Human Capital Consulting">Strategic Human Capital Consulting</option>
            <option value="Benefits">Benefits</option>
            <option value="Human Development">Human Development</option>
            <option value="9 Block Competences and Results">9 Block Competences and Results</option>
            <option value="360 Multiperceptual">360° Multiperceptual</option>
            <option value="Organizational Sensing">Organizational Sensing</option>
            <option value="Organizational Assessment and Equity">Organizational Assessment and Equityl</option>
            <option value="Linking and Talent Management">Linking and Talent Management</option>
            <option value="Assessment Center">Assessment Center</option>
            <option value="APP's">APP's</option>
            <option value="FeedBack">FeedBack</option>
            <option value="Sociometry">sociometry</option>
            <option value="Pilot Study">Pilot Study</option>
            <option value="Monterrey 100">Monterrey 100</option>
            <option value="Research Centers">Research Centers</option>
            <option value="Energy Industry">Energy Industry</option>
            <option value="Market Research">Market Research</option>
          </select>
        </li>
      </ul>
      <br>
      <label for="filtro" class="oculto">¡Si ves esto, no llenes el siguiente campo!</label>
  	  <input type="text" name="filtro" class="oculto">
      <input type="submit" class="btn3" value="Submit">
</form>
<?php
if (!empty($_POST["submit"]) && $_POST["submit"]) {
			$MESSAGE_BODY  = " <strong>Nombre:</strong> ".$_POST["nombre_form"]."<br />";
			$MESSAGE_BODY .= " <strong>Email</strong>: ".$_POST["email_form"]."<br />";
			$MESSAGE_BODY .= " <strong>Telefono:</strong> ".$_POST["telefono_form"]."<br />";
			$MESSAGE_BODY .= " <strong>Empresa:</strong> ".$_POST['empresa_form']."<br />";
			$MESSAGE_BODY .= " <strong>Interes:</strong> ".$_POST['interes_form']."<br />";

			$interes= $_POST["interes_form"];
			switch ($interes) {
   				case "Strategic Human Capital Consulting":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Benefits":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Human Development":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
				case "9 Block Competences and Results":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "360 Multiperceptual":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "Organizational Sensing":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
				case "Organizational Assessment and Equity":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Linking and Talent Management":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "Assessment Center":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
				case "APP's":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "FeedBack":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "Sociometry":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
				case "Pilot Study":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Monterrey 100":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Research Centers":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
				case "Energy Industry":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				default:
     				$email  = "et@matchpeople.onmicrosoft.com";
			}
			$from = $_POST["email_form"]; // sender
			$subject = $_POST["empresa_form"]." esta interesada en ".utf8_decode($_POST['interes_form']);
			$mensaje = utf8_decode($MESSAGE_BODY);
			// Cabeceras necesarias para enviar el mail
			$cabeceras  = "From: ".$_POST["email_form"]."\n";
			$cabeceras .= "Reply-To: ".$_POST["email_form"]."\n";
			$cabeceras .= "MIME-version: 1.0\n";
			$cabeceras .= "Content-type: multipart/mixed; ";
			$cabeceras .= "boundary=\"Message-Boundary\"\n";
			$cabeceras .= "Content-transfer-encoding: 7BIT\n";

    		// Adjuntar el cuerpo
			$body_top  = "\n\n--Message-Boundary\n";
			$body_top .= "Content-type: text/html; charset='UTF-8'\n";
			$body_top .= "Content-transfer-encoding: 7BIT\n";
			$body_top .= "Content-description: Mail message body\n\n";
			$cuerpo = $body_top.$mensaje;

    		// send mail
    		mail($email,$subject,$cuerpo, $cabeceras);
}
?>

<?php
if (!empty($_POST["submit"]) && $_POST["submit"]) {
			$interes= $_POST["interes_form"];
			switch ($interes) {
   				case "Strategic Human Capital Consulting":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Benefits":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Human Development":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
				case "9 Block Competences and Results":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "360 Multiperceptual":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "Organizational Sensing":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
				case "Organizational Assessment and Equity":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Linking and Talent Management":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "Assessment Center":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
				case "APP's":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "FeedBack":
     				$email  = "dh@matchpeople.onmicrosoft.com";
     				break;
   				case "Sociometry":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
				case "Pilot Study":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Monterrey 100":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				case "Research Centers":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
				case "Energy Industry":
     				$email  = "et@matchpeople.onmicrosoft.com";
     				break;
   				default:
     				$email  = "et@matchpeople.onmicrosoft.com";
			}

			//Envío el correo a cliente

			$MESSAGE_CLIENT.="
			<div id='header'  style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262 '>
	<div id='logo' style='float:left; padding-left:5%; ' >
    <img src='http://m.c.lnkd.licdn.com/media/p/8/000/24b/31f/04aa5f8.png' width='100' height='60' alt=''/>
    </div>
    <div style='float:right; padding-right:5%; padding-top:25px;'>
    ".$_POST["nombre_form"].", your request has been completed.
    </div>
    <div id='estado' style='background-color:#900; color:#FFFFFF; display:inline-block;  width:100%; text-align:center'>
    	<h2>Your Application</h2>
        <h3>has been sent</h3>
    </diV>
</div>
			<div id='contenido' style='font-family:Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262'>
<p>Hi ".$_POST["nombre_form"].",</p>
<p>Congrats!</p>
<p>your request for ".$_POST['interes_form']." has been sent</p>
<p>A representative will contact you with more information and continue the process.</p>

<p>No need to reply to this mail. However, if you believe this request in error or fraudulently , contact us ​​within 5 days  at 01-800 4015276.</p>
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
			$subject_Cliente = "Information received";
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
    		mail($_POST["email_form"],$subject_Cliente,$cuerpo_Cliente, $cabeceras_Cliente);


		}
?>
