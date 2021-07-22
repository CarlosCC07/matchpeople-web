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
if (mysqli_connect_errno()) {  echo "Failed to connect to MySQL: " . mysqli_connect_error();}

$autor = $_SESSION["user"];
$nomempresa = $_POST["nomempresa"];
$estatusId=1;
$sql = "INSERT INTO empresas_sociometria ( Nombre,estatusId ) VALUES ('$nomempresa',1)";
if ($con->query($sql) === TRUE) { echo "New record created successfully";}
else {  echo "Error: " . $sql . "<br>" . $con->error;}
$con->close();
 header('Location:../catalogo_empresas.php');
