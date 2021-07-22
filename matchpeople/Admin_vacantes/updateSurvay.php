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
if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$ide = $_GET['id'];
$accion = $_POST["btn_submit"];
$fileBD = $_POST["file"];
$nomencuesta = $_POST["nomencuesta"];
$balaso = $_POST["balaso"];
$descripcion = $_POST["descripcion"];
$imagen = $_POST['imagen'];
$pdf = $_POST['documento'];
$alt = $_POST["alt"];
$Keywords = $_POST["Keywords"];
$idiomaId = $_POST["idiomaId"];
$msg;
$Fecha= date("d-m-Y");
if ($idiomaId != "1") { $hreflang ="en-us";} else {$hreflang ="es-mx";}

//dependiendo del boton presionado realiza la tarea
if($accion == "Actualizar / Publicar"){
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
		}
			$sql = "UPDATE encuesta
							SET
							nomencuesta = '$nomencuesta',
							balaso = '$balaso',
							descripcion = '$descripcion',
							keywords = '$Keywords',
							idiomaId = '$idiomaId',
							destacado = '$Encuesta_destacada',
							estatusId = '$estatusId',
							fecha = CURRENT_DATE
							WHERE id = $ide";
							echo "se actualizo la encuesta";
		if(!mysqli_query($con, $sql)){ die("Error: " . mysqli_error($con));} else{ $msg = "Información actualizada";}
		include("editar_archivo.php");
}
else if ($accion == "Guardar como borrador"){
	echo "Borrador";
	$estatusId =2;
	$Encuesta_destacada =2;
	$sql = "UPDATE encuesta
					SET
					nomencuesta = '$nomencuesta',
					balaso = '$balaso',
					descripcion = '$descripcion',
					keywords = '$Keywords',
					idiomaId = '$idiomaId',
					destacado = '$Encuesta_destacada',
					estatusId = '$estatusId',
					fecha = CURRENT_DATE
					WHERE id = $ide";
	if(!mysqli_query($con, $sql)){ die("Error: " . mysqli_error($con));} else{ $msg = "Información actualizada";}
	include("editar_archivo.php");
}
else if ($accion == "Papelería"){
	echo "Papelería";
	$uno = 1;
	$sqlD = "UPDATE encuesta SET papeleria = '$uno' WHERE id = $ide";
	if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
	else{ $msg = "La encuesta esta en papelería ";}
}
else if ($accion == "Modificar Imagen"){
	echo "Modificar Imagen";
	$imagen;
	if($_FILES["imagen"]["name"]){
	    if(!$_FILES["imagen"]["error"]){
	        $imagen = $_FILES["imagen"]["name"];
					$imagen = str_replace(" ", "_", $imagen);
	        if(pathinfo($imagen, PATHINFO_EXTENSION)=="png" || pathinfo($imagen, PATHINFO_EXTENSION)=="jpg"){
						$sql = "UPDATE encuesta SET imagen = '$imagen', alt = '$alt' WHERE id = $ide";
	            if(!mysqli_query($con, $sql)){ die('Error: ' . mysqli_error($con));}else{
								//Si todo se realizó correctamente se sube los archivos al servidor.
								$msg ="La imagen se ha actualizado";
					 			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/encuestas/".$imagen);
							}
					}else{$msg = "ERROR: La imagen no está en un formato válido debe ser un jpg o png";}
			}else{ $msg = "ERROR: No se pudo subir La imagen.";}
	}else{ $msg = "ERROR: No se ha seleccionado una imagen.";}
	include("editar_archivo.php");
}
else if ($accion == "Modificar PDF"){
	echo "Modificar PDF";
	if($_FILES["documento"]["name"]){
		if(!$_FILES["documento"]["error"]){
			$pdf= $_FILES["documento"]["name"];
			$pdf = str_replace(" ", "_", $pdf);
			if(pathinfo($pdf, PATHINFO_EXTENSION)=="pdf"){
				$sql = "UPDATE encuesta SET documento = '$pdf' WHERE id = $ide";
					if(!mysqli_query($con, $sql)){ die('Error: ' . mysqli_error($con));}else{
						//Si todo se realizó correctamente se sube los archivos al servidor.
						$msg ="El documento se ha actualizado";
						move_uploaded_file($_FILES["documento"]["tmp_name"], "../descargas/".$pdf);
					}
			}else{$msg = "ERROR: El archivo no está en un formato válido debe ser un pdf";}
		}else{ $msg = "ERROR: No se pudo subir el archivo.";}
	}else{ $msg = "ERROR: No se ha seleccionado un archivo.";}
	include("editar_archivo.php");
}

?>
<meta charset='utf-8'>
	<script type='text/javascript'>
		alert("<?php echo $msg; ?>");
		window.location.href = '../admin_encuestas.php';
	</script>
<?php mysqli_close($con); ?>
