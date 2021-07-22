<?php
session_start();
if(empty( $_SESSION ['user'])){ header('Location:index.php');}
//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
header('Content-Type: text/html; charset=utf-8');
ob_start();
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Matchpeople - Catologo de empresas</title>
<?php include("header.php");?>
<style>.titulosec {width: 88%;}</style>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
  <div class="titulosec" >
  Catalogo de empresas
	<?php include("menus/menu_catalogo_empresas.php");?>
  </div>
  <div class="centar" style="width: 90% !important;">
    <?php
		//Conexion a la db
		include("clavesbd.php");
		// Crea la conexión
		$con = mysqli_connect($servername, $username, $password, $dbname);
		mysqli_set_charset($con,"utf8");

		// Checa que la conexión se haya establecido correctamente
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

	 $sql = "SELECT * FROM empresas_sociometria where papeleria != 1";
  			$result = mysqli_query($con, $sql);
  			if (mysqli_num_rows($result) > 0) {
  				// output data of each row
  				while($row = mysqli_fetch_assoc($result)) {
						$Nombre = $row['Nombre'];
  				echo "<form class='box_vacante' action='editar_empresa.php?id=".$row['IdEmpresa']."' enctype='multipart/form-data' method='POST'>";?>
	   				<div class='col1 setenta'>
		   				<strong>Empresa:</strong> <span class='h2'><?php echo"$Nombre"; ?></span><br>
						</div>
						<div class='col2' style="width: 27% !important;">
							<input class='btn2' style="background: #006400;"  type='submit' value='Cargar personal' name='btn_submit' >
							<input class='btn2' type='submit' value='Editar' name='btn_submit' >
							<input class='btn3' type='submit' value='Borrar' name='btn_submit'>
		   			</div>
   				</form>
					<?php } } else {	echo "<h3>No Hay Resultados</h3>";}	mysqli_close($con); ?>
  </div>
</div>
<?php include ("footer.php");?>
