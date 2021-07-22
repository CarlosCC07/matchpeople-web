<?php
session_start();
if(empty( $_SESSION ['user'])){ header('Location:login_vacante.php');}
	//Conexion a la db
	include("../clavesbd.php");

//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
header('Content-Type: text/html; charset=utf-8');
ob_start();

// Crea la conexión
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");

// Checa que la conexión se haya establecido correctamente
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$autor = $_SESSION["user"];
$file = $_POST["nomencuesta"];
$file = strtolower($file);
$file = str_replace(" ", "_", $file);
$file = str_replace(":", "", $file);
$accion = $_POST["btn_submit"];
$nomencuesta = $_POST["nomencuesta"];
$balaso = $_POST["balaso"];
$descripcion = $_POST["descripcion"];
$alt = $_POST["alt"];
$Keywords = $_POST["Keywords"];
$idiomaId = $_POST["idiomaId"];
$msg;
$imagen;
$pdf = "demo";

if($accion == "Publicar"){
	$estatusId= 1;
	$Encuesta_destacada = $_POST["Encuesta_destacada"];
	//Valida si la encuesta es destacada y modifica en BD el estatus de la ultima encuesta destacada.
	if( $Encuesta_destacada =="1"){
		$uno= 1;
		$dos= 2;
		$sqlD = "UPDATE encuesta
						SET destacado = '$dos'
						WHERE destacado = $uno";
		if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "Información actualizada";}
		echo "Publicado <br>";
		echo "$Encuesta_destacada <br>";
	}
}else if ($accion == "Guardar como borrador"){
	$estatusId =2;
	$Encuesta_destacada=2;
	echo "Borrador <br>";
}

//Se verifica que se haya escogido un archivo.
if($_FILES["imagen"]["name"]){
	if($_FILES["documento"]["name"]){
    //Si no hay errores al subir el archivo.
    if(!$_FILES["imagen"]["error"]){
			if(!$_FILES["documento"]["error"]){
        $imagen = $_FILES["imagen"]["name"];
				$imagen = str_replace(" ", "_", $imagen);
	    	$pdf= $_FILES["documento"]["name"];
				$pdf = str_replace(" ", "_", $pdf);
        //El formato de la imagen debe de ser png o jpg.
        if(pathinfo($imagen, PATHINFO_EXTENSION)=="png" || pathinfo($imagen, PATHINFO_EXTENSION)=="jpg"){
					if(pathinfo($pdf, PATHINFO_EXTENSION)=="pdf"){
						$sql = "INSERT INTO encuesta (
								nomencuesta,balaso,
								descripcion,documento,
								imagen,alt,
								keywords,file,
								autor,idiomaId,estatusId,
								destacado, fecha
								) VALUES (
									'$nomencuesta','$balaso',
									'$descripcion','$pdf',
							    '$imagen','$alt',
							    '$Keywords','$file',
									'$autor','$idiomaId',
									'$estatusId','$Encuesta_destacada',
									CURRENT_DATE
							)";
						//Si hay un error en la transacción.
            if(!mysqli_query($con, $sql)){ die('Error: ' . mysqli_error($con));}else{
							//Si todo se realizó correctamente se sube los archivos al servidor.
							$msg ="New record created successfully";
				 			move_uploaded_file($_FILES["documento"]["tmp_name"], "../descargas/".$pdf);
				 			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/encuestas/".$imagen);
						}
			 		}else{$msg = "ERROR: El archivo no está en un formato válido debe ser un pdf";}
				}else{$msg = "ERROR: La Imagen no está en un formato válido debe ser un jpg o png";}
			}else{ $msg = "ERROR: No se pudo subir el archivo.";}
		}else{ $msg = "ERROR: No se pudo subir La Imagen.";}
	}else{ $msg = "ERROR: No se ha seleccionado un archivo.";}
}else{ $msg = "ERROR: No se ha seleccionado una Imagen.";}

 if ($idiomaId != "1") { $hreflang ="en-us";} else {$hreflang ="es-mx";}
 $Fecha= date("d-m-Y");

//Creamos el archivo.php
$ar = fopen("../$file.php","a")or die("Error al crear archivo.php");
fwrite($ar,"<!doctype html>
						<!--[if lt IE 7]> <html class='ie6 oldie'> <![endif]-->
						<!--[if IE 7]>    <html class='ie7 oldie'> <![endif]-->
						<!--[if IE 8]>    <html class='ie8 oldie'> <![endif]-->
						<!--[if gt IE 8]><!-->
						<html>
						<!--<![endif]-->
						<head>
						<meta charset='utf-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
						<meta name='viewport' content='width=device-width, initial-scale=1'>
						<meta name='description' content='$balaso' />
						<meta name='keywords' content='$Keywords' />
						<title>$nomencuesta</title>
						<?php include('header.php');?>
						<div id='contenido'>
						  <div class='wrapper'>
						    <diV class='gap1' stylewidth: 100%; display: inline-block;'>
						      <div style='width: 100%; display: inline-block; padding: 0px; margin: 0px;'>
						        <div class='imageDes'><img src='img/encuestas/$imagen' alt='$alt' /></div>
						        <div class='text-wrapperDes'>
						          <h1>$nomencuesta</h1>
						          <div class='eyebrow'>$Fecha</div>
						          <div class='descriptionDes'>$balaso</div>
						          <div style='margin: 15px 0px;'>$descripcion</div>
						        <div><a class='btn5 setenta' href='descargas/$pdf' hreflang='$hreflang' target='_blank'>Descargar Resultados</a>
								</div></div></div></div></div></div>
						<?php include('footer.php');?>");
fwrite($ar,"\n");?>
<meta charset='utf-8'>
	<script type='text/javascript'>
		alert("<?php echo $msg; ?>");
		window.location.href = '../admin_encuestas.php';
	</script>
<?php mysqli_close($con); ?>
