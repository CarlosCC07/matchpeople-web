<?php
$nombre_archivo = $_FILES['archivo1']['name'];
$tipo_archivo = $_FILES['archivo1']['type'];
$tamano_archivo = $_FILES['archivo1']['size'];
$temporal = $_FILES['archivo1']['tmp_name'];

$MESSAGE_BODY  = " <strong>Nombre:</strong> ".$_POST["nombre"]."<br />";
$MESSAGE_BODY .= " <strong>Email</strong>: ".$_POST["email"]."<br />";
$MESSAGE_BODY .= " <strong>Telefono:</strong> ".$_POST["telefono"]."<br />";
$MESSAGE_BODY .= " <strong>Empresa:</strong> ".$_POST['empresa']."<br />";
$MESSAGE_BODY .= " <strong>¿Qué norma de ética se infringió?</strong> ".$_POST['infracion']."<br />";
$MESSAGE_BODY .= " <strong>¿Dónde ocurrieron los hechos?</strong> ".$_POST['hechos']."<br />";
$MESSAGE_BODY .= " <strong>¿Cuándo ocurrieron los hechos?</strong> ".$_POST['cuandoOcurrieron']."<br />";
$MESSAGE_BODY .= " <strong>¿Quiénes intervinieron en los hechos?</strong> ".$_POST['quienesIntervinieron']."<br />";
$MESSAGE_BODY .= " <strong>¿Cómo ocurrieron los hechos?</strong> ".$_POST['comoOcurrieron']."<br />";
$MESSAGE_BODY .= " <strong>¿Existen pruebas de los hechos?</strong> ".$_POST['textoPreubas']."<br />";
$MESSAGE_BODY .= " <strong>Comentarios o Recomendaciones</strong> ".$_POST['ComentariosRecomendaciones']."<br />";

$email        = "administrator@matchpeople.onmicrosoft.com;

$asunto     = utf8_decode("Correo de Buzón de Trasparencia");
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
<meta name="keywords" content=" " />
<title>Match People </title>
<link rel="alternate" hreflang="es-mx" href="http://www.matchpeople.com/consultoria.php" />
<link rel="alternate" hreflang="en-us" href="http://www.matchpeople.com/english_site/consulting.php" />

<?php include("header.php");?>

<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/buzon.png" class="noventa" > </div>
  </div>
  <div class="text gap1">
    <h1  class="Titulosec">Buzón de Trasparencia</h1>
    <div class="textInfo">
      <h3>Gracias por su confianza</h3>
      <br>
      <h4>La información ha sido enviada </h4>
    </div>
  </div>

  <!--servicos-nav -->
  <?php include("menus/servicios_principales.php");?>
  <!-- fin de servicios-nav -->
  </div>

<?php include("footer.php");?>
