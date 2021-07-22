<?php
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:login_vacante.php');
	}
	header('Content-Type: text/html; charset=utf-8');
	ob_start();

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Admin socios estrategicos</title>
<?php include("header.php");?>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
  <div class="titulosec" >
  Socios Estratégicos
  <div class="alinearderecha ">
		<a href="nuevo_socio.php" class="btn5 ">Nuevo Socio</a></div>
  </div>
  <div class="" >
  <?php
	// Crea la conexión
	include("clavesbd.php");
	// Crea la conexión
	$con = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");

	// Checa que la conexión se haya establecido correctamente
	if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}

	 //Se obtiene la información de los logos en base de datos.
	 $emp_data = mysqli_query($con,"SELECT * FROM logocliente");
	 //Se despliega la información actual de las empresas. El ddl de Estado aparecerá con estado correspondiente seleccionado.
	while($row = mysqli_fetch_array($emp_data)) {
	echo "
    	<div class='ochenta centar'>
			<form action='Admin_vacantes/update_socio.php?ide=".$row['id']."' enctype='multipart/form-data' method='POST' class='box_vacante'>
			<div class='col-vacante1'>
			<img src='img/logosClientes/".$row['logo']."' height='70px'>
			</div>
			<div class='col-vacante2' style='text-align:right'>
			<input type='file' text='Cambiar Archivo' name='upload_ar'><br>
			<div>
			<input type='submit' class='btn_Img btn-default' value='Actualizar' name='btn_submit'>
			<input type='submit' class='btn_Eliminar btn-default' name='btn_submit' value='Eliminar'>
			</div>
			</div>
			</form>
    	</div>
	";}
	?>
  </div>
</div>
<?php include ("footer.php");?>
