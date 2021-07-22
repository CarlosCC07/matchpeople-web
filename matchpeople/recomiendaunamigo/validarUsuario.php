<?php
session_start();

//Conexion a la db
include("../clavesbd.php");

// Crea la conexión
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");
// Checa que la conexión se haya establecido correctamente
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = "adminVin";
$pass =$_POST["password"];
//$pass = "match";

//Concexion con la base de datos
if ($user&&$pass){
	// llama de base de datos todos los socios Estrategicos
		$sql = "SELECT * FROM  login  WHERE user='$user'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$dbuser = $row['user'];
			$dbpassword = $row['pass'];
		if ($user==$dbuser&&$pass==$dbpassword){
			header('location:../paneldecontrol.php');
			$_SESSION['$user'] = $dbuser;
		}
		else
		echo "<script type=\"text/javascript\">window.alert('La contrasña es incorrecta.');window.location.href = '../login_vacante.php';</script>";
	}
}}
else echo("<script type=\"text/javascript\">window.alert('Inserte la contraseña.');window.location.href = '../login_vacante.php';</script>");

?>
