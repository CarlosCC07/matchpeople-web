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
$msg;
//dependiendo del boton presionado realiza la tarea
if($accion == "Actualizar / Publicar"){
	$estatusId= 1;
	$Nombre = $_POST["nombre"];
		$sql = "UPDATE empresas_sociometria SET	Nombre = '$Nombre' WHERE	IdEmpresa = $ide";
		echo "se actualizo la encuesta";
		if(!mysqli_query($con, $sql)){ die("Error: " . mysqli_error($con));} else{ $msg = "Información actualizada";}
}
else if($accion == "cancelar"){
header('Location:../catalogo_empresas.php');
}

?>
	<meta charset='utf-8'>
	<script type='text/javascript'>
		alert("<?php echo $msg; ?>");
		window.location.href = '../catalogo_empresas.php';
	</script>
<?php mysqli_close($con); ?>
