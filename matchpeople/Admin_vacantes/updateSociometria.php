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
$Titulo = $_POST["Titulo"];
$act_formacion1 = $_POST["act_formacion1"];
$act_formacion2 = $_POST["act_formacion2"];
$Act_Ascendencia = $_POST["Act_Ascendencia"];
$Act_Afinidad = $_POST["Act_Afinidad"];
$Act_Trabajo3 = $_POST['Act_Trabajo3'];
$Act_Popularidad = $_POST['Act_Popularidad'];
$Act_sociales2 = $_POST["Act_sociales2"];
$Act_sociales3 = $_POST["Act_sociales3"];
$Act_sociales4 = $_POST["Act_sociales4"];

//dependiendo del boton presionado realiza la tarea
if($accion == "Actualizar / Publicar"){
	$estatusId= 1;
	//Valida si la encuesta es destacada y modifica en BD el estatus de la ultima encuesta destacada.
			$sql = "UPDATE encuesta_sociometria
							SET
							Titulo = '$Titulo',
							act_formacion1 = '$act_formacion1',
							act_formacion2 = '$act_formacion2',
							Act_Ascendencia = '$Act_Ascendencia',
							Act_Afinidad = '$Act_Afinidad',
							Act_Trabajo3 = '$Act_Trabajo3',
							Act_Popularidad = '$Act_Popularidad',
							Act_sociales2 = '$Act_sociales2',
							Act_sociales3 = '$Act_sociales3',
							Act_sociales4 = '$Act_sociales4',
							estatusId = '$estatusId'
							WHERE IdEncuesta = $ide";
							echo "se actualizo la encuesta";
		if(!mysqli_query($con, $sql)){ die("Error: " . mysqli_error($con));} else{ $msg = "Información actualizada";}
}
else if ($accion == "Guardar como borrador"){
	echo "Borrador";
	$estatusId =2;
	$sql = "UPDATE encuesta_sociometria
					SET
					Titulo = '$Titulo',
					act_formacion2 = '$act_formacion2',
					Act_Ascendencia = '$Act_Ascendencia',
					Act_Afinidad = '$Act_Afinidad',
					Act_Trabajo3 = '$Act_Trabajo3',
					Act_Popularidad = '$Act_Popularidad',
					Act_sociales2 = '$Act_sociales2',
					Act_sociales3 = '$Act_sociales3',
					Act_sociales4 = '$Act_sociales4',
					estatusId = '$estatusId'
					WHERE IdEncuesta = $ide";
	if(!mysqli_query($con, $sql)){ die("Error: " . mysqli_error($con));} else{ $msg = "Información actualizada";}
}
else if ($accion == "Papelería"){
	$uno = 1;
	$sqlD = "UPDATE encuesta_sociometria SET papeleria = '$uno' WHERE IdEncuesta = $ide";
	if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
	else{ $msg = "La encuesta esta en papelería ";}
}

?>
<meta charset='utf-8'>
	<script type='text/javascript'>
		alert("<?php echo $msg; ?>");
		window.location.href = '../admin_sociometria.php';
	</script>
<?php mysqli_close($con); ?>
