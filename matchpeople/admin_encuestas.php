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
		<?php include("menus/menu_encuestas.php");?>
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

		 $sql = "SELECT * FROM encuesta where papeleria != 1 AND estatusId != 3";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
							$TituloEncuesta =  $row['nomencuesta'];
							$balaso = $row['balaso'];
							$newDate = $row['fecha'];
							$autor = $row['autor'];
							$idiomaId = $row['idiomaId'];
							$estatusId = $row['estatusId'];
							$destacado = $row['destacado'];
							$Fecha = date("d/m/Y", strtotime($newDate));
							$TituloEncuesta = strtoupper($TituloEncuesta);

						echo "<form class='box_vacante' action='editar_encuesta.php?id=".$row['id']."' enctype='multipart/form-data' method='POST'>";?>
						<div class='col1 ochenta'>
							<strong>Artículo:</strong> <span class='h2'><?php echo"$TituloEncuesta"; ?></span>
							<br><strong><?php echo"$Fecha"; ?></strong>
							<strong class='izquierdo'> Autor: </strong>
							<?php echo"$autor"; ?>
						 	<strong class='izquierdo'>idioma: </strong>
						 	<?php if ($idiomaId != "1") { $idioma =" Ingles";} else {$idioma ="Español";}  echo"$idioma"; ?>
						 	<strong class='izquierdo'>Estado: </strong>
						 	<?php if ($estatusId != "1") { $estatus ="Borrador";} else {$estatus ="Publicado";} echo"$estatus"; ?>
						 	<strong class='izquierdo'>Articulo destacado: </strong>
						 	<?php if ($destacado != "1") { $destacado2 ="No";} else {$destacado2 ="Si";} echo"$destacado2"; ?>
						 	<br><?php echo"$balaso"; ?>
					 	</div>
						<div class='col2'>
							<input class='btn2 alignCenter' type='submit' value='Editar' name='btn_submit' style='width: 120px;'>
							<input class='btn3 alignCenter' type='submit' value='Papelería' name='btn_submit' style='width: 120px;'>
						</div>
						</form>
				<?php	}	} else { echo "<h3>No Hay Resultados</h3>"; }mysqli_close($con); ?>
  </div>
</div>
<?php include ("footer.php");?>
