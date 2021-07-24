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

$NumNomina = $_POST["NumNomina"];
$Nombre = $_POST["Nombre"];
$FechaIngreso = $_POST["FechaIngreso"];
$Departamento = $_POST["Departamento"];
$Clave = $_POST["Clave"];
$Puesto = $_POST["Puesto"];
$Planta = $_POST['Planta'];
$Segmento = $_POST['Segmento'];
$Turno = $_POST["Turno"];
$FechaNacimiento = $_POST["FechaNacimiento"];
$Email = $_POST["Email"];
$accion = $_POST["btn_submit"];
$ide = $_GET['id'];

if($accion == "Guardar"){

	//Valida si la encuesta es destacada y modifica en BD el estatus de la ultima encuesta destacada.
			$sql = "UPDATE personal_sociometria
							SET
							NumNomina = '$NumNomina',
							Nombre = '$Nombre',
							FechaIngreso = '$FechaIngreso',
							Departamento = '$Departamento',
							Clave = '$Clave',
							Puesto = '$Puesto',
							Planta = '$Planta',
							Segmento = '$Segmento',
							Turno = '$Turno',
							FechaNacimiento = '$FechaNacimiento',
							Email = '$Email'
							WHERE IdPersonal = $ide";
							echo "se actualizo la encuesta";
		if(!mysqli_query($con, $sql)){ die("Error: " . mysqli_error($con));} else{ $msg = "Información actualizada";}
    ?>
    	<meta charset='utf-8'>
    	<script type='text/javascript'>
    		alert("<?php echo $msg; ?>");
    		window.location.href = '../admin_sociometria.php';
    	</script>
    <?php mysqli_close($con);
}else {
header('Location:../admin_sociometria.php');
}
?>
