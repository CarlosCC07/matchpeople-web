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
<title>Matchpeople - Admin Encuestas de interes</title>
<?php include("header.php");?>
<div id="contenido">
	<?php include("menus/menu_vacantes.php");?>
  <div class="titulosec" >
	  Encuestas de interes activas
		<?php include("menus/menu_catalogo_empresas.php");?>
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

		 $sql = "SELECT * FROM empresas_sociometria where papeleria = 1";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
							$Nombre =  $row['Nombre'];
						echo "<form class='box_vacante' action='editar_empresa.php?id=".$row['IdEmpresa']."' enctype='multipart/form-data' method='POST'>";?>
						<div class='col1 ochenta'>
							<strong>Nombre:</strong> <span class='h2'><?php echo"$Nombre"; ?></span>
					 	</div>
						<div class='col2'>
							<input class='btn2 alignCenter' type='submit' value='Restaurar' name='btn_submit' style='width: 120px;'>
						</div>
						</form>
				<?php	}	} else { echo "<h3>No hay resultados en la papeleria</h3>"; }mysqli_close($con); ?>
  </div>
</div>
<?php include ("footer.php");?>
