<?php
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:index.php');
	}
//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
header('Content-Type: text/html; charset=utf-8');
ob_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Papeleria Vacantes</title>
<?php include("header.php");?>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
  <div class="titulosec" >
  Papeleria Vacantes
	<?php include("menus/menu_secuV.php");?>
  </div>
  <div class="ochenta centar" >
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

	 $sql = "SELECT id, vacante, ciudad, fecha, Nombre_empresa, des_corta, estatusId FROM listavacantes where papeleria = 1 AND estatusId != 3";
  			$result = mysqli_query($con, $sql);
  			if (mysqli_num_rows($result) > 0) {
  				// output data of each row
  				while($row = mysqli_fetch_assoc($result)) {
						$Titulo = $row['vacante'];
						$Titulo= strtoupper($Titulo);
						$Fecha = $row['fecha'];
						$newDate = date("d/m/Y", strtotime($Fecha));
						$Empresa = $row["Nombre_empresa"];
						$Ciudad = $row["ciudad"];
						$estatusId = $row['estatusId'];
						$balaso = $row["des_corta"];
					echo "<form class='box_vacante' action='editar_vacante.php?id=".$row['id']."' enctype='multipart/form-data' method='POST'>";?>
						<div class='col1 ochenta'>
							<strong>Vacante:</strong> <span class='h2'><?php echo"$Titulo"; ?></span><br>
							<strong><?php echo"$newDate "; ?></strong>
							<strong class='izquierdo'>Empresa: </strong><?php echo"$Empresa"; ?>
							<strong class='izquierdo'>Ciudad: </strong><?php echo"$Ciudad"; ?>
							<strong class='izquierdo'>Estatus: </strong>
							<?php if ($estatusId != "1") { $estatus ="Borrador";} else {$estatus ="Publicado";} echo"$estatus"; ?>
							<br><?php echo"$balaso"; ?>
						</div>
						<div class='col2'>
							<input class='btn2 alignCenter' type='submit' value='Restaurar' name='btn_submit' style='width: 120px;'>
							<input class='btn3 alignCenter' type='submit' value='Eliminar' name='btn_submit' style='width: 120px;'>
		   			</div>
   				</form>
					<?php } } else {	echo "<h3>No hay vacantes en papelería</h3>";}	mysqli_close($con); ?>
  </div>
</div>
<?php include ("footer.php");?>
