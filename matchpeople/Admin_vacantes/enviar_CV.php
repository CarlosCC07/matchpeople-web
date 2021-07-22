<?php
    // Your code here to handle a successful verification
	$nombre_archivo = $_FILES['archivo1']['name'];
	$tipo_archivo = $_FILES['archivo1']['type'];
	$tamano_archivo = $_FILES['archivo1']['size'];
	$temporal = $_FILES['archivo1']['tmp_name'];


	$MESSAGE_BODY  = "
	<h3 style='color:#990000'>Datos Peronales</h3><br />
	<strong>Nombre:</strong> ".$_POST["nombre"]."<br />";
	$MESSAGE_BODY .= " <strong>Celular:</strong> ".$_POST["celular"]."<br />";
	$MESSAGE_BODY .= " <strong>E-mail :</strong> ".$_POST['email']."<br /><br />";
	$MESSAGE_BODY .= " <strong>Vacante a la que aplica:</strong> ".$_POST['vacante']."<br />";
	$MESSAGE_BODY .= " <strong>Carta invitación:</strong> ".$_POST['carta_presentacion']."<br />";

	$email      = "vinculacion@matchpeople.onmicrosoft.com";

	$asunto     = "Nuevo candidato a ". utf8_decode($_POST['vacante']);
	$mensaje    = utf8_decode($MESSAGE_BODY);
	$nombref    = $_FILES["archivo1"]["name"];

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
	$body_top .= "Content-type: text/html; charset='UTF-8'\n";
	$body_top .= "Content-transfer-encoding: 7BIT\n";
	$body_top .= "Content-description: Mail message body\n\n";
	$cuerpo = $body_top.$mensaje;

	if($tamano_archivo>0)
	{
	//Leo el fichero
   	$oFichero = fopen($_FILES["archivo1"]["tmp_name"], 'r');
   	$sContenido = fread($oFichero, filesize($_FILES["archivo1"]["tmp_name"]));
   	$sAdjuntos .= chunk_split(base64_encode($sContenido));
   	fclose($oFichero);
   	//Adjunto el fichero
   	$cuerpo .= "\n\n--Message-Boundary\n";
   	$cuerpo .= "Content-type: Binary; name=\"$nombref\"\n";
   	$cuerpo .= "Content-Transfer-Encoding: BASE64\n";
   	$cuerpo .= "Content-disposition: attachment; filename=\"$nombref\"\n\n";
   	$cuerpo .= "$sAdjuntos\n";
   	$cuerpo .= "\n\n--Message-Boundary\n";
	}
	//Envío el correo
	mail($email, $asunto, $cuerpo, $cabeceras);
?>


<?php
//Envío el correo a cliente
	$MESSAGE_CLIENT.="
	<div id='header'  style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262 '>
	<div id='logo' style='float:left; padding-left:5%;' >
    <img src='http://m.c.lnkd.licdn.com/media/p/8/000/24b/31f/04aa5f8.png' width='100' height='60'/>
    </div>
    <div style='float:right; padding-right:5%; padding-top:25px;'>
    ".$_POST["nombre"].", tu solicitud se ha completado.
    </div>
    <div id='estado' style='background-color:#900; color:#FFFFFF; display:inline-block;  width:100%; text-align:center'>
    	<h2>Tu solicitud para la vacante:</h2>
		<h2>".$_POST['vacante']."</h2>
        <h3>ha sido enviada. </h3>
    </diV>
</div>
<div id='contenido' style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262' >
<p>Hola ".$_POST["nombre"].",</p>
<p>¡Enhorabuena! has aplicado para la siguiente vacante:</p>
<p>".$_POST['vacante']."</p>
<p>Un representante se pondrá en contacto con usted para brindarle más información y continuar con el proceso.</p>

<p>No es necesario que respondas a este correo electrónico. Sin embargo, si crees que este recomendación puede haberse efectuado por error o fraudulentamente, contáctanos en un plazo de 5 días al  01 (81) 8389-1500.</p>
</div>
<div id='footer' style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; margin:0 auto; width:80%; font-size:12px; color:#6F6F6F; border-top:medium solid #6F6B6B'>
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
</div>
	";
	$email      = "vinculacion@matchpeople.onmicrosoft.com";

	$from_Cliente = $email; // sender
	$subject_Cliente = "Tu solicitud ha sido enviada";
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
	$body_top_Cliente .= "Content-type: text/html; charset='UTF-8'\n";
	$body_top_Cliente .= "Content-transfer-encoding: 7BIT\n";
	$body_top_Cliente .= "Content-description: Mail message body\n\n";
	$cuerpo_Cliente = $body_top_Cliente.$mensaje_Cliente;

    // send mail
    mail($_POST["email"],$subject_Cliente,$cuerpo_Cliente, $cabeceras_Cliente);

	$msg = "Información Enviada";
?>

<meta charset='utf-8'>
	<script type='text/javascript'>
	alert("<?php echo $msg; ?>");
	window.location.href = '../vacantes_disponibles.php';
	</script>
