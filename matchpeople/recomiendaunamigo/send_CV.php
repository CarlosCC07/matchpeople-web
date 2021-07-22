<?
session_start();
if(empty( $_SESSION ['$user'])){
	header('Location:terminos.php');
	}

?>

<!--verify captcha-->
<?php
  require_once('recaptchalib.php');
  $privatekey = "6Lckd_wSAAAAAIeumcHXeM5QJpM5nMW17-fbnZip";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    echo"<script type=\"text/javascript\">window.alert('El Captcha es incorrecto.');window.location.href = 'recomienda.php';</script>";

  } else {
    // Your code here to handle a successful verification
	$nombre_archivo = $_FILES['archivo1']['name'];
	$tipo_archivo = $_FILES['archivo1']['type'];
	$tamano_archivo = $_FILES['archivo1']['size'];
	$temporal = $_FILES['archivo1']['tmp_name'];


	$MESSAGE_BODY  = "
	<h3 style='color:#990000'>Datos del Recomendador</h3>
	<strong>Nombre del Recomendador:</strong> ".$_POST["nombre"]."<br />";
	$MESSAGE_BODY .= " <strong>Teléfono del Recomendado:</strong> ".$_POST["telefono"]."<br />";
	$MESSAGE_BODY .= " <strong>Celular del Recomendador:</strong> ".$_POST["celular"]."<br />";
	$MESSAGE_BODY .= " <strong>E-mail del Recomendador:</strong> ".$_POST['email']."<br /><br />";
	$MESSAGE_BODY .= " <h3 style='color:#990000'>Datos del Candidato</h3>";
	$MESSAGE_BODY .= " <strong>Nombre del Candidato:</strong> ".$_POST['nombreCandidato']."<br />";
	$MESSAGE_BODY .= " <strong>Teléfono del Candidato:</strong> ".$_POST['telefonoCandidato']."<br />";
	$MESSAGE_BODY .= " <strong>Celular del Candidato:</strong> ".$_POST['celularCandidato']."<br />";
	$MESSAGE_BODY .= " <strong>E-mail del Candidato:</strong> ".$_POST['emailCandiato']."<br />";
	$MESSAGE_BODY .= " <strong>Vacante a la que aplica el candidato:</strong> ".$_POST['vacante']."<br />";


	$email      = "ra@matchpeople.onmicrosoft.com";

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
  	}

?>


<?php
//Envío el correo a cliente
	$MESSAGE_CLIENT.="
	<div id='header'  style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262 '>
	<div id='logo' style='float:left; padding-left:5%;' >
    <img src='http://m.c.lnkd.licdn.com/media/p/8/000/24b/31f/04aa5f8.png' width='100' height='60'/>
    </div>
    <div style='float:right; padding-right:5%; padding-top:25px;'>
    ".$_POST["nombre"].", tu recomendación se ha completado.
    </div>
    <div id='estado' style='background-color:#900; color:#FFFFFF; display:inline-block;  width:100%; text-align:center'>
    	<h2>Tu solicitud para la vacante:</h2>
		<h2>".$_POST['vacante']."</h2>
        <h3>ha sido enviada. </h3>
    </diV>
</div>
<div id='contenido' style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262' >
<p>Hola ".$_POST["nombre"].",</p>
<p>¡Enhorabuena! Hemos completado tu recomendación para la siguiente vacante:</p>
<p>".$_POST['vacante']."</p>
<p>Un representante se pondrá en contacto con usted para brindarle más información y continuar con el proceso.</p>

<div id='DatosRecomendacion' style='background-color:#6F6B6B; color:#FFFFFF; display:inline-block; width:100%;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;'>

    <ul style='padding-left:25px; border-left: 15px solid #C0C0C0; height:160px;'>
    <h3 style='padding-left:0; margin-left:0'>Datos del Recomendador</h3>
    <li><strong>Nombre:</strong> ".$_POST["nombre"]."</li>
    <li><strong>Celular:</strong> ".$_POST["celular"]."</li>
    <li><strong>Teléfono:</strong> ".$_POST["telefono"]."</li>
    <li><strong>E-mail:</strong> ".$_POST['email']." </li>
    </ul>

    <ul style='padding-left:25px; border-left: 15px solid #C0C0C0;height:160px;'>
    <h3 style='padding-left:0; margin-left:0'>Datos del Candidato</h3>
    <li><strong>Nombre:</strong> ".$_POST['nombreCandidato']."</li>
    <li><strong>Celular:</strong> ".$_POST['celularCandidato']."</li>
    <li><strong>Teléfono:</strong> ".$_POST['telefonoCandidato']."</li>
    <li><strong>E-mail:</strong>  ".$_POST['emailCandiato']."</li>
    <li><strong>Vacante a la que aplica el candidato:</strong> ".$_POST['vacante']."</li>
    </ul>
</div>

<p>
Es importante que verifiques si tu información de contacto está completa y actualizada. Si tus datos de contacto no son los correctos, se podría llegar a cancelar tu recomendación.</p>
<p>No es necesario que respondas a este correo electrónico. Sin embargo, si crees que este recomendación puede haberse efectuado por error o fraudulentamente, contáctanos en un plazo de 5 días al 01-800 4015276.</p>
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
	$email      = "ra@matchpeople.onmicrosoft.com";

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

?>


<?php
//Envío el correo al Candidato

	$MESSAGE_CANDIDATO.="
	<div id='header'  style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262 '>
	<div id='logo' style='float:left; padding-left:5%;' >
    <img src='http://m.c.lnkd.licdn.com/media/p/8/000/24b/31f/04aa5f8.png' width='100' height='60'/>
    </div>
    <div style='float:right; padding-right:5%; padding-top:25px;'>
    ".$_POST['nombreCandidato'].",te han recomendado.
    </div>
    <div id='estado' style='background-color:#900; color:#FFFFFF; display:inline-block;  width:100%; text-align:center'>
    	<h2>Te han recomendado para la vacante de:</h2>
        <h3>".$_POST['vacante']."</h3>
    </diV>
</div>
<div id='contenido' style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:80%; margin: 0 auto; color:#626262' >
<p>Hola ".$_POST['nombreCandidato']."</p>
<p>¡Enhorabuena! Te ha recomendado ".$_POST["nombre"]." para la siguiente vacante:</p>
<p>".$_POST['vacante']."</p>
<p>Un representante se pondrá en contacto con usted para brindarle más información y solicitarle su información si es que desea continuar con el proceso.</p>

<div id='DatosRecomendacion' style='background-color:#6F6B6B; color:#FFFFFF; display:inline-block; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; width:100%;'>

    <ul style='padding-left:25px; border-left: 15px solid #C0C0C0; height:160px;'>
    <h3 style='padding-left:0; margin-left:0'>Datos del Recomendador</h3>
    <li><strong>Nombre:</strong> ".$_POST["nombre"]."</li>
    <li><strong>Celular:</strong> ".$_POST["celular"]."</li>
    <li><strong>Teléfono:</strong> ".$_POST["telefono"]."</li>
    <li><strong>E-mail:</strong> ".$_POST['email']." </li>
    </ul>

    <ul style='padding-left:25px; border-left: 15px solid #C0C0C0;height:160px;'>
    <h3 style='padding-left:0; margin-left:0'>Datos del Candidato</h3>
    <li><strong>Nombre:</strong> ".$_POST['nombreCandidato']."</li>
    <li><strong>Celular:</strong> ".$_POST['celularCandidato']."</li>
    <li><strong>Teléfono:</strong> ".$_POST['telefonoCandidato']."</li>
    <li><strong>E-mail:</strong>  ".$_POST['emailCandiato']."</li>
    <li><strong>Vacante a la que aplica el candidato:</strong> ".$_POST['vacante']."</li>
    </ul>
</div>

<p>
Es importante que verifiques si tu información de contacto está completa y actualizada. Si tus datos de contacto no son los correctos, se podría llegar a cancelar su recomendación.</p>
<p>No es necesario que respondas a este correo electrónico. Sin embargo, si crees que este recomendación puede haberse efectuado por error o fraudulentamente, contáctanos en un plazo de 5 días al 01-800 4015276.</p>
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
	$email   = "ra@matchpeople.onmicrosoft.com";

	$from_Candidato = $email; // sender
	$subject_Candidato = "Ha sido recomendado para ". utf8_decode($_POST['vacante']);
	$mensaje_Candidato = utf8_decode($MESSAGE_CANDIDATO);

    // Cabeceras necesarias para enviar el mail
	$cabeceras_Candidato  = "From: ".$email."\n";
	$cabeceras_Candidato .= "Reply-To: ".$email."\n";
	$cabeceras_Candidato .= "MIME-version: 1.0\n";
	$cabeceras_Candidato .= "Content-type: multipart/mixed; ";
	$cabeceras_Candidato .= "boundary=\"Message-Boundary\"\n";
	$cabeceras_Candidato .= "Content-transfer-encoding: 7BIT\n";

    // Adjuntar el cuerpo
	$body_top_Candidato  = "\n\n--Message-Boundary\n";
	$body_top_Candidato .= "Content-type: text/html; charset='UTF-8'\n";
	$body_top_Candidato .= "Content-transfer-encoding: 7BIT\n";
	$body_top_Candidato .= "Content-description: Mail message body\n\n";
	$cuerpo_Candidato = $body_top_Candidato.$mensaje_Candidato;

    // send mail
    mail($_POST["emailCandiato"],$subject_Candidato,$cuerpo_Candidato, $cabeceras_Candidato);

?>

<?php

//CONEXIÓN
//$bd = mysql_connect("localhost", "matchpeo_matchpeople","Match2013") or die('Could not connect to MySql');
$bd = mysql_connect("localhost",'root','') or die ("no me conecto a la base de datos");
mysql_select_db("matchpeo_vacantesBD");

	$sql = "insert into candidatos (
	nombre,
	celular,
	telefono,
	email,
	nombreCandidato,
	celularCandidato,
	telefonoCandidato,
	emailCandiato,
	vacante
	 )
	value (	'".utf8_decode($_POST['nombre'])."',
		'".utf8_decode($_POST['celular'])."',
		'".utf8_decode($_POST['telefono'])."',
		'".utf8_decode($_POST['email'])."',
		'".utf8_decode($_POST['nombreCandidato'])."',
		'".utf8_decode($_POST['celularCandidato'])."',
		'".utf8_decode($_POST['telefonoCandidato'])."',
		'".utf8_decode($_POST['emailCandiato'])."',
		'".utf8_decode($_POST['vacante'])."')";
	$res = mysql_query($sql,$bd) or  die (mysql_error());
?>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header("Location: index.php");
?>
