<?php
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:index.php');
	}
	//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
	header('Content-Type: text/html; charset=utf-8');
	ob_start();

	// Crea la conexión
	include("clavesbd.php");
	$con = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");
// Checa que la conexión se haya establecido correctamente
	if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
	$ide = $_GET['id'];
	$accion = $_POST["btn_submit"];

	if ($accion == "Papelería"){
		echo "Papelería";
		$uno = 1;
		$sqlD = "UPDATE listavacantes SET papeleria = '$uno' WHERE id = $ide";
// Checa que la conexión se haya establecido correctamente
		if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La vacante esta en papelería ";}?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'admin_vacantes.php';
			</script>
	<?php }
	else if ($accion == "Eliminar"){
		$tres = 3;
		$sqlD = "UPDATE listavacantes SET estatusId = '$tres' WHERE id = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La vacante esta en papelería ";}?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'papeleria_vacante.php';
			</script>
	<?php }
	else if ($accion == "Restaurar"){
		$cero = 0;
		$sqlD = "UPDATE listavacantes SET papeleria = '$cero' WHERE id = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La vacante se restauro";}?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'papeleria_vacante.php';
			</script><?php } else{?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople-  admin editar vacante</title>
<?php include("header.php"); ?>
<div id="contenido">
	<?php include("menus/menu_vacantes.php"); ?>
  <div class="titulosec" > Vacantes Activas </div>
	<div>
	<?php
		//Se obtiene la información de todas las vacantes en base de datos.
		$consulta = mysqli_query($con,"SELECT * FROM listavacantes WHERE id = $ide;");
		if (mysqli_num_rows($consulta) > 0) {
					$row = mysqli_fetch_assoc($consulta);
					$vacante = $row['vacante'];;
					$autor= $row['autor'];
					$Empresa = $row["Nombre_empresa"];
					$Ciudad = $row["ciudad"];
					$GiroEmpresa = $row['GiroEmpresa'];
					$area_funcion = $row['area_funcion'];
					$des_corta = $row['des_corta'];
					$descripcion = $row['descripcion'];
					$afinidad = $row['afinidad'];
					$Perfil_Academico = $row['Perfil_Academico'];
					$experiencia_profecional=$row['experiencia_profecional'];
					$estatusId = $row['estatusId'];
					$edad=$row['edad'];
					$genero = $row['genero'];
					$disponibilidad_viaje =$row['disponibilidad_viaje'];
					$residencia =$row['residencia'];
					$ingles =$row['ingles'];
					$competencias =$row['competencias'];
					$img = $row['img'];
					$Fecha = $row['fecha'];
					$newDate = date("d/m/Y", strtotime($Fecha));
		?>
    	<div class='box'>
				<div class='gap3 '>
					<div><span class='bold'>Autor: </span><?php echo"$autor"; ?></div>
				<div><span class='bold'>Última mod.: </span><?php echo"$newDate"; ?></div>
				</div>
	      <form <?php echo "action='Admin_vacantes/update_vacante.php?id=".$row['id']."'";?> enctype='multipart/form-data' method='POST' class='border-bottom'>
						 <div class='gap3 cincuenta100'>
							 	<span class='bold'>Titulo de Vacante:</span><br>
							 	<input type='text' name='e_vacante' value='<?php echo"$vacante"; ?>'>
						 </div>
						 <div class='gap3 cincuenta100'>
						  	<span class='bold'>Descripción corta:</span><br>
						 		<input type='text' name='e_des_corta'  maxlength='200' value='<?php echo"$des_corta"; ?>'>
						 </div>
						 <div style="display: inline-block; width: 100%;">
							 <div class='gap3 cincuenta100'>
							  	<span class='bold'>Descripción:</span><br>
							 		<textarea type='text' name='e_descripcion' value=''/><?php echo"$descripcion"; ?> </textarea>
							 </div>
							 <div class='gap3 cincuenta100'>
							 		<span class='bold'>Competencias:</span><br>
							 		<textarea type='text' name='e_competencias' value=''><?php echo"$competencias"; ?></textarea>
							 </div>
						 </div>
						 <div class='gap3 cincuenta100'>
							 	<span class='bold'>Ciudad:</span><br>
							 	<input type='text' name='e_ciudad' value='<?php echo"$Ciudad"; ?>'>
						 </div>
						 <div class='gap3 cincuenta100'>
						 		<span class='bold'>Nombre de la Empresa:</span><br>
						 		<input type='text' name='e_Nombre_empresa' value='<?php echo"$Empresa"; ?>'>
						 </div>
						 <div class='gap3 cincuenta100'>
							 	<span class='bold'>Giro de la Empresa:</span><br>
								<select id="GiroEmpresa" name='e_GiroEmpresa' >
									<?php
									$sql = "SELECT * FROM giro";
									$result = mysqli_query($con, $sql);
									if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($rowG = mysqli_fetch_assoc($result)) {
										$textoG= $rowG['texto'];
										echo"<option value='$textoG' "; if( $rowG['texto'] == $GiroEmpresa ) { echo"selected";} echo ">". $textoG ."</option>";
										}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
						    </select>
						 </div>
						 <div class='gap3 cincuenta100'>
							 	<span class='bold'>Área / Función:</span><br>
								<select id="area_funcion" name="e_area_funcion">
									<?php
									$sql = "SELECT * FROM area ORDER BY texto ";
									$result = mysqli_query($con , $sql);
									if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($rowG = mysqli_fetch_assoc($result)) {
										$textoG= $rowG['texto'];
										echo"<option value='$textoG' "; if( $rowG['texto'] == $area_funcion ) { echo"selected";} echo ">". $textoG ."</option>";
									}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
						    </select>
						 </div>
						 <div class='gap3 cincuenta100'>
						 		<span class='bold'>Carreras afines:</span><br>
						 		<input type='text' name='e_afinidad' value='<?php echo"$afinidad"; ?>'>
						 </div>
						 <div class='gap3 cincuenta100'>
						  	<span class='bold'>Nivel académico:</span><br>
								<select id="Perfil_Academico" name="e_Perfil_Academico">
									<?php
									$sql = "SELECT * FROM academico ORDER BY texto";
									$result = mysqli_query($con , $sql);
									if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($rowG = mysqli_fetch_assoc($result)) {
										$textoG= $rowG['texto'];
										echo"<option value='$textoG' "; if( $rowG['texto'] == $Perfil_Academico ) { echo"selected";} echo ">". $textoG ."</option>";
									}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
						    </select>
						 </div>
						 <div class='gap3 cincuenta100'>
						  	<span class='bold'>Años de Experiencia:</span><br>
						 		<input type='text' name='e_experiencia_profecional' value='<?php echo"$experiencia_profecional"; ?>'>
						 </div>
						 <div class='gap3 cincuenta100'>
						 		<span class='bold'>Edad:</span><br>
						 		<input type='text' name='e_edad' value='<?php echo"$edad"; ?>'>
						 </div>
						 <div class='gap3 cincuenta100'>
						 		<span class='bold'>Género:</span><br>
						 		<select id="genero" name="e_genero">
									<?php
									$sql = "SELECT * FROM genero ORDER BY texto";
										$result = mysqli_query($con , $sql);
										if (mysqli_num_rows($result) > 0) {
										// output data of each row
										while($rowG = mysqli_fetch_assoc($result)) {
											$textoG= $rowG['texto'];
											echo"<option value='$textoG' "; if( $rowG['texto'] == $genero ) { echo"selected";} echo ">". $textoG ."</option>";
										}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
						    </select>
						 </div>
						 <div class='gap3 cincuenta100'>
						 		<span class='bold'>Disponibilidad de viaje:</span><br>
								<select id="disponibilidad_viaje" name="e_disponibilidad_viaje">
									<?php
									$sql = "SELECT * FROM si_no ORDER BY id DESC";
									$result = mysqli_query($con , $sql);
									if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($rowG = mysqli_fetch_assoc($result)) {
										$textoG= $rowG['texto'];
										echo"<option value='$textoG' "; if( $rowG['texto'] == $disponibilidad_viaje ) { echo"selected";} echo ">". $textoG ."</option>";
									}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
						    </select>
						 </div>
						 <div style="display: inline-block; width: 100%;">
							 <div class='gap3 cincuenta100'>
							 		<span class='bold'>Cambio de residencia:</span><br>
							 		<select id="residencia" name="e_residencia">
										<?php
										$sql = "SELECT * FROM si_no ORDER BY id DESC";
										$result = mysqli_query($con , $sql);
										if (mysqli_num_rows($result) > 0) {
										// output data of each row
										while($rowG = mysqli_fetch_assoc($result)) {
											$textoG= $rowG['texto'];
											echo"<option value='$textoG' "; if( $rowG['texto'] == $residencia ) { echo"selected";} echo ">". $textoG ."</option>";
										}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
							    </select>
							 </div>
							 <div class='gap3 cincuenta100'>
							  	<span class='bold'>Dominio de idioma:</span><br>
							 		<input type='text' name='e_ingles' value='<?php echo"$ingles"; ?>'>
							 </div></div>
						 <div>
						 		<input type='submit' class='btn_Actualizar btn-default' name='btn_submit' value='Actualizar / Publicar'>
								<?php if($estatusId != "1" ){ echo "<input type='submit' class='btnborrador btn-default' name='btn_submit' value='Guardar como borrador'>";}?>
								<input type='submit' class='btn_Eliminar btn-default' name='btn_submit' value='Papelería'>
						 </div>
	        </form>
					<form <?php echo "action='Admin_vacantes/upload_imagen.php?id=".$row['id']."'";?> enctype='multipart/form-data' method='POST' class='centar'>
			      	<div class='gap3'><span class='bold'>Cambiar Imagen</span><br></div>
							<div> <img src='img/imgVacantes/<?php echo"$img"; ?>' height='90px'/></div>
							<input type='file' text='Cambiar Archivo' name='upload_ar'>
							<input type='submit'class='btn5' value='Agregar imagen' name='submit'>
			     </form>
      </div> <?php } else { echo "<h3>No Hay Resultados</h3>"; } mysqli_close($con);?>
  </div>
</div>
<?php include ("footer.php");}?>
