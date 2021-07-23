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
         $nombre = $rowV['Nombre'];
         $Email2= $rowV['Email'];

$email_to =   $Email2; //the address to which the email will be sent
$name     =   'Matchpeople';
$email    =   'non_replay@matchpeople.com';
$subject  =   'ENCUESTA SEGURIDAD Y SALUD OCUPACIONAL';
$message ="
					<html>
					<head>
					<meta charset='utf-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
					<title>Nuevo correo formulario web Appetizer</title>
					</head>
					<body>
					<p><strong>Name:</strong> $nombre</p>
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

$headers  = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset='UTF-8'\n";
if(mail($email_to, $subject, $message, $headers)){
		echo 'sent'; // we are sending this text to the ajax request telling it that the mail is sent..
}else{
		echo 'failed';// ... or this one to tell it that it wasn't sent
}
	}}
header('Location: admin_sociometria.php');

?>
