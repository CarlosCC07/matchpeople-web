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
	$accion = $_POST["btn_submit"];
	if ($accion == "Papelería"){
		echo "Papelería";
		$uno = 1;
		$sqlD = "UPDATE encuesta SET papeleria = '$uno' WHERE id = $ide";
// Checa que la conexión se haya establecido correctamente
		if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La encuesta esta en papelería ";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'admin_encuestas.php';
			</script>
	<?php }
	else if ($accion == "Eliminar"){
		$tres = 3;
		$sqlD = "UPDATE encuesta SET estatusId = '$tres' WHERE id = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La encuesta esta en papelería ";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'papeleria_encuesta.php';
			</script>
	<?php }
	else if ($accion == "Restaurar"){
		$cero = 0;
		$sqlD = "UPDATE encuesta SET papeleria = '$cero' WHERE id = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La encuesta se restauro";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'papeleria_encuesta.php';
			</script>
	<?php }
	else{
	//Se obtiene la información de todas las vacantes en base de datos.
	$consulta = "SELECT * FROM encuesta where id = $ide;";
			 $resultV = mysqli_query($con, $consulta);
			 if (mysqli_num_rows($resultV) > 0) {
				 // output data of each row
				 while($rowV = mysqli_fetch_assoc($resultV)) {
					 $TituloEncuesta =  $rowV['nomencuesta'];
					 $balaso = $rowV['balaso'];
					 $descripcion = $rowV['descripcion'];
					 $imagen = $rowV['imagen'];
					 $alt = $rowV['alt'];
					 $keywords= $rowV['keywords'];
					 $documento= $rowV['documento'];
					 $file = $rowV['file'];
					 $autor= $rowV['autor'];
					 $idiomaIdE = $rowV['idiomaId'];
					 $estatusId = $rowV['estatusId'];
					 $destacado = $rowV['destacado'];
					 $Fecha = $rowV['fecha'];
					 $newDate = date("d/m/Y", strtotime($Fecha));
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Editar Encuesta</title>
<?php include("header.php");?>
<div id="contenido">
	<?php include("menus/menu_vacantes.php");?>
	<div class="titulosec">Editar Encuesta</div>
		<div class="box" >
			<div class="gap3 ">
				<div><span class='bold'>Autor: </span><?php echo" $autor"; ?></div>
				<div><span class='bold'>Última mod.: </span><?php echo" $newDate"; ?></div>
			</div>
			<form <?php echo "action='Admin_vacantes/updateSurvay.php?id=".$rowV['id']."'";?> enctype="multipart/form-data" method="post" onSubmit="return validacion();" class="border-bottom">
				<div style="display: inline-block;  width: 100%;">
					<div class="gap3 cincuenta100">
					  <span class='bold'>Título</span><br>
						<input type="text" name="nomencuesta" id="vacante" value="<?php echo"$TituloEncuesta"; ?>" >
						<input type="hidden" name="file" value="<?php echo"$file"; ?>">
						<input type="hidden" name="imagen" value="<?php echo"$imagen"; ?>">
						<input type="hidden" name="documento" value="<?php echo"$documento"; ?>">
						<input type="hidden" name="alt" value="<?php echo"$alt"; ?>">
				  </div>
				  <div class="gap3 cincuenta100">
				    <span class='bold'>Descripción Corta</span><br>
				    <input name="balaso" type="text" required placeholder="Breve descripción de la vacante no mayor a 200 caracteres" maxlength="200" value="<?php echo"$balaso"; ?>" >
				  </div>
			</div>
			<div style="display: inline-block;  width: 100%;">
				  <div class="gap3 cincuenta100">
				  	<span class='bold'>Descripción</span><br>
				  		<textarea name="descripcion" id="descripcion" required maxlength="400" > <?php echo"$descripcion"; ?></textarea>
				  </div>
					<div class="gap3 cincuenta100">
						<span class='bold'>Keywords</span><br>
						<textarea name="Keywords" id="competencias" required placeholder="Liderazgo, Trabajo en equipo," ><?php echo"$keywords"; ?></textarea>
					</div>
			</div>
			<div style="display: inline-block;  width: 100%;">
				  <div class="gap3 cincuenta100">
				    <span class='bold'>Idioma</span><br>
				    <select id="GiroEmpresa" name="idiomaId">
							<?php
							$sql = "SELECT idiomaId, idioma FROM idioma";
										 $result = mysqli_query($con, $sql);
										 if (mysqli_num_rows($result) > 0) {
											 // output data of each row
											while($row = mysqli_fetch_assoc($result)) {
												 $idiomaId= $row['idiomaId'];
												 $idioma = $row['idioma'];
												 echo"<option value='".$idiomaId."' ";
														 if( $rowV['idiomaId'] == $idiomaId ) {
														 echo"selected";} echo ">". $idioma ."</option>";
												  }} else { echo "<h3>No Hay Resultados</h3>"; } ?>
				    </select>
				  </div>
				  <div class="gap3 cincuenta100">
				    <span class='bold'>Articulo destacado</span><br>
				    <select id="area_funcion" name="Encuesta_destacada">
						<?php
							$sqlD = "SELECT destacadoId, texto FROM destacado ORDER BY destacadoId DESC";
									 $resultD = mysqli_query($con, $sqlD);
									 if (mysqli_num_rows($resultD) > 0) {
										 // output data of each row
										 while($rowD = mysqli_fetch_assoc($resultD)) {
											 $destacadoId= $rowD['destacadoId'];
											 $texto= $rowD['texto'];
											 echo"<option value='".$destacadoId."' ";
													 if( $rowV['destacado'] == $destacadoId ) {
													 echo"selected";} echo ">". $texto ."</option>";
												}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
				    </select>
				  </div>
				</div>
				<div style="display: inline-block;  width: 100%;">
			  	<input type="submit" class="btn_Enviar btn-default" name='btn_submit' value="Actualizar / Publicar">
					<?php if($estatusId != "1" ){ echo "<input type='submit' class='btnborrador btn-default' name='btn_submit' value='Guardar como borrador'>";}?>
					<input type='submit' class='btn_Eliminar btn-default' name='btn_submit' value='Papelería'>
				</div>
			</form>
			<form <?php echo "action='Admin_vacantes/updateSurvay.php?id=".$rowV['id']."'";?> enctype='multipart/form-data' method='POST' class='gap3 cincuenta100'>
				<!-- Enviamos informacion para crear el archivo pho-->
				<input type="hidden" name="nomencuesta" value="<?php echo"$TituloEncuesta"; ?>">
				<input type="hidden" name="balaso" value="<?php echo"$balaso"; ?>">
				<input type="hidden" name="descripcion" value="<?php echo"$descripcion"; ?>">
				<input type="hidden" name="documento" value="<?php echo"$documento"; ?>">
				<input type="hidden" name="Keywords" value="<?php echo"$keywords"; ?>">
				<input type="hidden" name="file" value="<?php echo"$file"; ?>">
				<input type="hidden" name="idiomaId" value="<?php echo"$idiomaIdE"; ?>">
				<input type="hidden" name="imagen" value="<?php echo"$imagen"; ?>">

				<div class='gap1'><span class='bold'>Cambiar Imagen</span></div>
				<div class='gap3' style="text-align: center;"> <img src='img/encuestas/<?php echo"$imagen"; ?>' height='120px'></div>
				<input type="file" accept="image/x-png,image/jpeg" value="<?php echo"$imagen"; ?>" text="Imagen" name="imagen">
				<div class="gap3">
					<span class='bold'>Alt de imagen</span><br>
					<input type="text" name="alt"  maxlength="200" value="<?php echo"$alt"; ?>" placeholder="descripcion de la imagen" >
				</div>
				<input type='submit' class='btn5' value='Modificar Imagen'style=" width: 92%;" name='btn_submit'>
			</form>
			<form <?php echo "action='Admin_vacantes/updateSurvay.php?id=".$rowV['id']."'";?> enctype='multipart/form-data' method='POST' class='gap3 cincuenta100'>
				<!-- Enviamos informacion para crear el archivo pho-->
				<input type="hidden" name="nomencuesta" value="<?php echo"$TituloEncuesta"; ?>">
				<input type="hidden" name="balaso" value="<?php echo"$balaso"; ?>">
				<input type="hidden" name="descripcion" value="<?php echo"$descripcion"; ?>">
				<input type="hidden" name="documento" value="<?php echo"$documento"; ?>">
				<input type="hidden" name="Keywords" value="<?php echo"$keywords"; ?>">
				<input type="hidden" name="file" value="<?php echo"$file"; ?>">
				<input type="hidden" name="idiomaId" value="<?php echo"$idiomaIdE"; ?>">
				<input type="hidden" name="imagen" value="<?php echo"$imagen"; ?>">
				<input type="hidden" name="alt" value="<?php echo"$alt"; ?>">

					<div class='gap1'><span class='bold'>Cambiar Documento</span></div>
					<div class='gap3' style="text-align: center;"><img src='img/pdf_icon.png' height='120px'></div>
					<input type="file" accept="application/pdf" text="Cambiar Archivo" name="documento">
					<div class="gap3">
					<span class='bold'>Nombre del documento</span><br>
					<input type="text" name="documento" maxlength="200" value="<?php echo"$documento"; ?>" disabled >
					</div>
					<input type='submit' class='btn5' value='Modificar PDF' style=" width: 92%;" name='btn_submit'>
			</form>
		</div>
</div>
<?php
}	} else { echo "<h3>No Hay Resultados</h3>"; } mysqli_close($con);
include ("footer.php");}
?>
