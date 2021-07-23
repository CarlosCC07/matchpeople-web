<?php
session_start();
if(empty( $_SESSION ['user'])){ header('Location:login_vacante.php');}
  //Conexion a la db
	include("clavesbd.php");
	$con = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");
	// Checa que la conexión se haya establecido correctamente
	if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$ide = $_GET['id'];

$consulta = "SELECT personal_sociometria.IdPersonal, personal_sociometria.IdEmpresa, personal_sociometria.Nombre, personal_sociometria.Email, resencuesta_sociometria.IdEstatus
FROM personal_sociometria
JOIN resencuesta_sociometria ON personal_sociometria.IdPersonal = resencuesta_sociometria.IdResEncuesta
where personal_sociometria.IdEmpresa = $ide AND resencuesta_sociometria.IdEstatus != 3";
     $resultV = mysqli_query($con, $consulta);
     if (mysqli_num_rows($resultV) > 0) {
       // output data of each row
       while($rowV = mysqli_fetch_assoc($resultV)) {
         $IdPersonal = $rowV['IdPersonal'];
         $IdEmpresa = $rowV['IdEmpresa'];
         $nombreEmp = $rowV['Nombre'];
         $email = $rowV['Email'];
				 $message ="
						<html>
						<head>
						<title>Nuevo correo formulario web Appetizer</title>
						</head>
						<body>
						<p><strong>Name:</strong> $nombreEmp</p>
						<p><strong>Email:</strong> $Email2</p>
						<p><strong>Message:</strong></p>
						<p>
						Favor de terminar la encuesta
						enlace:<a href='estudio_sociometria.php?id=$IdEmpresa:$IdPersonal' target='_blank' >Terminar enecuesta</a>
						</p>
						<table>
						<tr>
						<td></td>
						</tr>
						<td>
						<tr>
						<p>
						“Este mensaje y, en su caso, archivos anexos son de carácter Confidencial o Privilegiada, especialmente en lo que respecta a los datos personales, y se dirigen exclusivamente al destinatario referenciado. Si usted no lo es y lo ha recibido por error, le rogamos que nos lo comunique por este medio y proceda a destruirlo o borrarlo, y que en todo caso se abstenga de utilizar, reproducir, alterar, archivar o comunicar a terceros el presente mensaje y archivos anexos, todo ello bajo pena de incurrir en responsabilidades legales. Las opiniones contenidas en este mensaje y en los archivos adjuntos, pertenecen exclusivamente a su remitente y no representan la opinión de la empresa salvo que se diga expresamente y el remitente esté autorizado para ello. El emisor no garantiza la integridad, ni se responsabiliza de posibles perjuicios derivados de la captura, incorporaciones de virus o manipulaciones efectuadas por terceros.”
						</p>
						</td>
						</tr>
						</table>
						</body>
						</html>";

$nombre ="Matchpeople";
$asunto = "ENCUESTA SEGURIDAD Y SALUD OCUPACIONAL";
function envio_email($email, $nombre, $asunto, $message) {
    require 'mail/class.phpmailer.php';
    try {
        $mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas

      $mail->IsSMTP();                 // Usamos el metodo SMTP de la clase PHPMailer
      $mail->SMTPAuth = true;           // habilitado SMTP autentificación
      $mail->SMTPSecure = "TLS";
      $mail->Timeout = 30;             // habilitado SMTP autentificación
      $mail->Port = 587;                // puerto del server SMTP
      $mail->Host = "smtp.office365.com";  // SMTP server
      $mail->Username = "non_replay@matchpeople.com";  // SMTP server Usuario
      $mail->Password = "ba0bkGH61T";            // SMTP server password
      $mail->From = "non_replay@matchpeople.com"; //Remitente de Correo
      $mail->FromName = $nombre; //Nombre del remitente
      $to = $email; //Para quien se le va enviar
    $mail->AddAddress($to);
    $mail->Subject  = "Nuevo email del Sito Web"; //Asunto del correo
		$mail->MsgHTML($message);
		$mail->IsHTML(true); // Enviar como HTML
		$mail->Send();//Enviar
		// echo 'El Mensaje a sido enviado.';
	} catch (phpmailerException $e) {
		echo $e->errorMessage();//Mensaje de error si se produciera.
	}
	 $mail->ClearAddresses();
}
envio_email($email,$nombre, $asunto, $message);
	}}

?>
