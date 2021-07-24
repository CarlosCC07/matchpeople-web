<?php
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:login_vacante.php');
	}

	//Conexion a la db
	include("clavesbd.php");
	$con = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");
	// Checa que la conexión se haya establecido correctamente
	if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$ide = $_GET['id'];
	/// carga del personal
	if(!empty( $_SESSION["ClaveTiempo"]) &&  $_SESSION['ClaveTiempo']){
		$ClaveTiempo = $_SESSION["ClaveTiempo"];
	}else {
		$_SESSION["ClaveTiempo"] = time();
		$ClaveTiempo = $_SESSION["ClaveTiempo"];
	}
	?>
	<!doctype html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Matchpeople - Editar Encuesta</title>
	<?php include("header.php");?>
	<style>
	.titulosec{width: 90%;}
	.alert-danger {color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;}
	 .alert { position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;}
		.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}
		#customers td, #customers th { border: 1px solid #dddddd; text-align: left; padding: 8px;}
	</style>
	<div id="contenido">
		<?php include("menus/menu_vacantes.php");?>
		<div class="titulosec">Cargar archivo
			<div class="alinearderecha ">
				<span style="color:red;">Importante</span>: El archivo debe de estar en formato CSV, Delimitado por comas,
				Puedes descargar <a href="Ejemplos_de_carga.rar" target="_blank" style="color:red;"><strong>aqui</strong></a> el archivo ejemplo.
			</div>
		</div>
		<div class="noventa" style="margin:20px auto;">
			<form action="importar.php?id=<?php echo "$ide";?>" method="post" accept-charset="UTF-8" enctype='multipart/form-data' id="import_form">
				<p >
					<input type="file" name="file"  id="file-1" multiple style="height: auto; width: auto;  opacity: 1;" accept=".csv"/>
					<br><br>
				</p>
				<p>
					<input  class="btn2" type="submit" name="import_data" value="Importar" style="padding: 6px;"> </input>
					<input  class="btn" type="submit" name="Cleen" value="Limpiar Registros"> </input>
				</p>
			</form>
		</div>
		<div class="noventa" style="margin:20px auto;">
				<div class="panel-body">
					<?php
					if(!empty($_GET['import_status']) && $_GET['import_status'] ){
						$i = $_GET['import_status'];
						switch ($i) {
								case "success":
										echo "<div class='alert alert-success'>La carga ha sido exitosa.</div>";
										break;
								case "error":
										echo "<div class='alert alert-danger'>Error: La carga no tuvo un error</div>";
										break;
								case "invalid_file":
										echo "<div class='alert alert-danger'>Error: Favor de cargar un archivo CSV.</div>";
										break;
						}
					}else {
					}
					//echo "$ClaveTiempo";
					?>
					<div class="row">
						<table  id="customers"style="background: rgba(255,255,255,.60); width:100%;">
							<thead>
								<tr>
									<th>Numero de Nomina</th>
									<th>Nombre</th>
									<th>Puesto</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT NumNomina , Nombre, Puesto FROM personal_sociometria WHERE ClaveTiempo = $ClaveTiempo";
								$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($conn));
								if(mysqli_num_rows($resultset)) {
									while( $rows = mysqli_fetch_assoc($resultset) ) {
								?>
								<tr>
									<td><?php echo $rows['NumNomina']; ?></td>
									<td><?php echo $rows['Nombre']; ?></td>
									<td><?php echo $rows['Puesto']; ?></td>
								</tr>
							<?php } } else { ?>
								<tr><td colspan="3" style="t">No records to display.....</td></tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
	<?php include ("footer.php");?>
