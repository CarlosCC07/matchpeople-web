<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
      <ul>
         <h5 class="tituloSubnav">Newsletter</h5>
        <li>
          <input type="email" name="emailnews"placeholder="tu-email@email.com" >
        </li>
       
      </ul>
      <label for="filtro" class="oculto">¡Si ves esto, no llenes el siguiente campo!</label>
  	  <input type="text" name="filtro" class="oculto">
      <input type="submit" class="btn" value="Send" >
</form>
<?php 
if (!isset($_POST["submit"])) { 

	if ($_POST['emailnews'] == ""){

	}
	else{
    	if ($_POST['filtro'] != ""){		
    		// Es un SPAMbot
    		exit();
		}
		else{

			$MESSAGE_BODY .= " <strong>Email</strong>: ".$_POST["emailnews"]."<br />";

			$email  = "news@matchpeople.com.mx";
			
			$from = $_POST["email_form"]; // sender
			$subject = $_POST["emailnews"]." is intested in Newsletters";
			$mensaje = utf8_decode($MESSAGE_BODY);
			// Cabeceras necesarias para enviar el mail
			$cabeceras  = "From: ".$_POST["email_form"]."\n";
			$cabeceras .= "Reply-To: ".$_POST["email_form"]."\n";
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
    		echo "Thank you for sending, your information";}
			}
}
?>


