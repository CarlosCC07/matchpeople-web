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
	<title>Matchpeople - Estudios de sociometría</title>
<?php include("header.php");?>
<style>.titulosec {width: 88%;}</style>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
  <div class="titulosec" >
  Estudios de sociometría
	<?php include("menus/menu_sociometria.php");?>
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

	 $preSql = "SELECT COUNT(IdResEncuesta) AS totalEnc FROM resencuesta_sociometria WHERE IdEmpresa = 2;";
	 $posSql = "SELECT COUNT(IdResEncuesta) AS finishedEnc FROM resencuesta_sociometria WHERE IdEmpresa = 2 AND IdEstatus = 3;";
	 $res1 = mysqli_query($con, $preSql);
	 if (mysqli_num_rows($res1) > 0) {
		while($row = mysqli_fetch_assoc($res1)) {
			$totalEnc = $row['totalEnc'];
		}
	 }

	 $res2 = mysqli_query($con, $posSql);
	 if (mysqli_num_rows($res2) > 0) {
		while($row = mysqli_fetch_assoc($res2)) {
			$finishedEnc = $row['finishedEnc'];
		}
	 }

	 echo '<script>console.log('.$totalEnc.')</script>';
	 echo '<script>console.log('.$finishedEnc.')</script>';

	 if($finishedEnc == 0) {
	 	$percent = 0;
	 } else {
	 	$percent = floor(($finishedEnc * 100)/$totalEnc);
	 }

	 $sql = "SELECT encuesta_sociometria.IdEncuesta, empresas_sociometria.Nombre, encuesta_sociometria.Titulo,
	 encuesta_sociometria.Fecha,encuesta_sociometria.porcentaje, encuesta_sociometria.IdEmpresa, encuesta_sociometria.papeleria, encuesta_sociometria.estatusId
	 FROM encuesta_sociometria
	 INNER JOIN empresas_sociometria ON encuesta_sociometria.IdEmpresa=empresas_sociometria.IdEmpresa where encuesta_sociometria.estatusId != 3 AND encuesta_sociometria.papeleria != 1 ";
  			$result = mysqli_query($con, $sql);
  			if (mysqli_num_rows($result) > 0) {
  				// output data of each row
  				while($row = mysqli_fetch_assoc($result)) {
  						$IdEmpresa = $row['IdEmpresa'];
						$Titulo = $row['Titulo'];
						$Titulo= strtoupper($Titulo);
						$Fecha = $row['Fecha'];
						$newDate = date("Y", strtotime($Fecha));
						$Empresa = $row["Nombre"];
						$Porcentaje = $row["porcentaje"];
						$estatusId = $row['estatusId'];
  				echo "<form class='box_vacante' action='editar_sociometria.php?id=".$row['IdEncuesta']."' enctype='multipart/form-data' method='POST'>";?>
	   				<div class='col1 setenta'>
		   				<strong>Nombre de estudio:</strong> <span class='h2'><?php echo"$Titulo"; ?></span><br>
							<strong>Año:</strong> <?php echo"$newDate "; ?>
							<strong class='izquierdo'>Empresa: </strong><?php echo"$Empresa"; ?>
							<strong class='izquierdo'>Estatus: </strong><?php if($IdEmpresa == 2) {echo"$percent %";} else {echo"$Porcentaje %";} ?>
							<strong class='izquierdo'>Estado: </strong>
						 	<?php if ($estatusId == "2") { $estatus ="Borrador";} else if($estatusId == "1"){$estatus ="Activa";} else{$estatus ="Terminado";} echo"$estatus"; ?>
						</div>
						<div class='col2' style="width: 27% !important;">
							<input class='btn2' type='submit' value='ver encuestas' name='btn_submit' >
							<input class='btn2' type='submit' value='Editar' name='btn_submit' >
							<input class='btn2' style="background: #d27a01;" type='submit' value='Detener estudio' name='btn_submit' >
							<input class='btn3' type='submit' value='Papelería' name='btn_submit'>
		   			</div>
   				</form>
					<?php } } else {	echo "<h3>No Hay Resultados</h3>";}	mysqli_close($con); ?>
  </div>
</div>
<?php include ("footer.php");?>
