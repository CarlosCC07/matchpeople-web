<?php
//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:index.php');
	}

ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Vacantes PanelControl</title>
<?php include("header.php");?>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
  <div class="titulosec">Ultimas 4 vacantes activas
	<?php include("menus/menu_secuV.php");?>
	</div>
  <div class="ochenta centar" >
    <?php
		//Conexion a la db
		include("clavesbd.php");
		// Crea la conexión
		$con = mysqli_connect($servername, $username, $password, $dbname); mysqli_set_charset($con,"utf8");
		// Checa que la conexión se haya establecido correctamente
		if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	 	$sql = "SELECT * FROM listavacantes where estatusId = 1 AND papeleria != 1 order by id desc limit 4";
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
					<input class='btn2 alignCenter' type='submit' value='Editar' name='btn_submit' style='width: 120px;'>
					<input class='btn3 alignCenter' type='submit' value='Papelería' name='btn_submit' style='width: 120px;'>
	   		</div>
   		</form>
			<?php	}	} else { echo "<h3>No Hay Resultados</h3>"; }mysqli_close($con); ?>
  </div>
	<div class="titulosec">Ultimas 4 Encuestas de destacadas activas
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

		 $sql = "SELECT * FROM encuesta where estatusId != 3 order by id desc limit 4";
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

	  				echo "<form class='box_vacante' action='editar_encuesta.php?id=".$row['id']."' enctype='multipart/form-data' method='POST'>";
						?>
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
							 	<br>
							 	<?php echo"$balaso"; ?>
						 </div>
						 <input class='btn2 alignCenter' type='submit' value='Editar' name='btn_submit' style='width: 120px;'>
						 <input class='btn3 alignCenter' type='submit' value='Papelería' name='btn_submit' style='width: 120px;'>
		   		</form>
	   		<?php	}	} else { echo "<h3>No Hay Resultados</h3>"; }mysqli_close($con); ?>
  </div>
</div>
<?php include ("footer.php");?>
