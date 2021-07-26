<!doctype html>
<!--[if lt IE 7]> <html class='ie6 oldie'> <![endif]-->
<!--[if IE 7]>    <html class='ie7 oldie'> <![endif]-->
<!--[if IE 8]>    <html class='ie8 oldie'> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title></title>
<link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/espacios.css" rel="stylesheet" type="text/css">
<link href="css/texto.css" rel="stylesheet" type="text/css">
<link href="css/botones.css" rel="stylesheet" type="text/css" >
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css'/>
<link href="css/forms.css" rel="stylesheet" type="text/css" >
<link href="css/footer.css" rel="stylesheet" type="text/css">
<!--Css para los fondos -->
<link href="css/background.css" rel="stylesheet" type="text/css">
<!--Css para los forms-->
<link href="css/validador.css" rel="stylesheet" type="text/css">
</head>
<style media="screen">
  #contenido{background-color: #e4e4e4;}
	#cabezera{width: 201px; padding: 13px; text-align: center; color: #FFF;}
	.wrapper{display: flex;flex-wrap: wrap; justify-content: space-around; }
	.wrapper input{width: 98%; }
	.noventaplus{width: 98%; }
	.wrapper label{font-weight: 600; }
  .destacado{font-size: 1.2em; font-weight: bold; color: darkred;}
  input[type=password], input[type=text], input[type=email], input[type=number], textarea, select {
  	color: #4c4c4c;
    font-weight: 600;
  }
</style>
<body>
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

	$datos = $_GET['id'];
  list($Ide, $IdEmpleado) = explode(":", $datos);
	$estatus =1;
 $sql = "SELECT encuesta_sociometria.IdEncuesta, encuesta_sociometria.IdEmpresa, encuesta_sociometria.Titulo, encuesta_sociometria.act_formacion1, encuesta_sociometria.act_formacion2, encuesta_sociometria.Act_Ascendencia, encuesta_sociometria.Act_Afinidad,	encuesta_sociometria.Act_Trabajo3, encuesta_sociometria.Act_Popularidad, encuesta_sociometria.Act_sociales2, encuesta_sociometria.Act_sociales3, encuesta_sociometria.Act_sociales4,encuesta_sociometria.papeleria,encuesta_sociometria.estatusId,
 personal_sociometria.IdPersonal, personal_sociometria.NumNomina, personal_sociometria.Nombre, personal_sociometria.Departamento, personal_sociometria.Turno,
 resencuesta_sociometria.TRNombre_ascendencia1,resencuesta_sociometria.TRNombre_ascendencia2,resencuesta_sociometria.TRNombre_ascendencia3,resencuesta_sociometria.TRNombre_afinidad1,resencuesta_sociometria.TRNombre_afinidad2,resencuesta_sociometria.TRNombre_afinidad3,resencuesta_sociometria.TRNombre_popularidad1,resencuesta_sociometria.TRNombre_popularidad2,resencuesta_sociometria.TRNombre_popularidad3,resencuesta_sociometria.act_formacionA,resencuesta_sociometria.act_formacionB,
 resencuesta_sociometria.act_formacionC,resencuesta_sociometria.act_formacionR2,resencuesta_sociometria.Act_TrabajoSN,resencuesta_sociometria.Act_TrabajoR3,resencuesta_sociometria.Act_socialesR2,resencuesta_sociometria.Act_socialesR3,resencuesta_sociometria.Act_socialesR4
 FROM encuesta_sociometria
 INNER JOIN personal_sociometria ON encuesta_sociometria.IdEmpresa=personal_sociometria.IdEmpresa
 INNER JOIN resencuesta_sociometria ON encuesta_sociometria.IdEmpresa=resencuesta_sociometria.IdEmpresa AND personal_sociometria.IdPersonal = resencuesta_sociometria.IdPersonal
 where encuesta_sociometria.IdEmpresa = $Ide And encuesta_sociometria.estatusId = $estatus And personal_sociometria.IdPersonal = $IdEmpleado";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$IdEncuesta = $row['IdEncuesta'];
					$IdEmpresa = $row['IdEmpresa'];
					$Titulo = $row['Titulo'];
					$Titulo= strtoupper($Titulo);
					$act_formacion1 = $row['act_formacion1'];
					$act_formacion2 = $row['act_formacion2'];
					$Act_Ascendencia = $row['Act_Ascendencia'];
					$Act_Afinidad = $row['Act_Afinidad'];
					$Act_Trabajo3 = $row['Act_Trabajo3'];
					$Act_Popularidad = $row['Act_Popularidad'];
					$Act_sociales2 = $row['Act_sociales2'];
					$Act_sociales3 = $row['Act_sociales3'];
					$Act_sociales4 = $row['Act_sociales4'];
					$IdPersonal = $row['IdPersonal'];
					$NumNomina= $row['NumNomina'];
					$Nombre = $row['Nombre'];
					$Departamento = $row['Departamento'];
					$Turno = $row['Turno'];
					$TRNombre_ascendencia1 = $row['TRNombre_ascendencia1'];
					$TRNombre_ascendencia2 = $row['TRNombre_ascendencia2'];
					$TRNombre_ascendencia3 = $row['TRNombre_ascendencia3'];
					$TRNombre_afinidad1 = $row['TRNombre_afinidad1'];
					$TRNombre_afinidad2 = $row['TRNombre_afinidad2'];
					$TRNombre_afinidad3 = $row['TRNombre_afinidad3'];
					$TRNombre_popularidad1 = $row['TRNombre_popularidad1'];
					$TRNombre_popularidad2 = $row['TRNombre_popularidad2'];
					$TRNombre_popularidad3 = $row['TRNombre_popularidad3'];
					$act_formacionA = $row['act_formacionA'];
					$act_formacionB = $row['act_formacionB'];
					$act_formacionC = $row['act_formacionC'];
					$act_formacionR2 = $row['act_formacionR2'];
					$Act_TrabajoSN = $row['Act_TrabajoSN'];
					$Act_TrabajoR3 = $row['Act_TrabajoR3'];
					$Act_socialesR2 = $row['Act_socialesR2'];
					$Act_socialesR3 = $row['Act_socialesR3'];
					$Act_socialesR4 = $row['Act_socialesR4'];
					$estatusId = $row['estatusId'];
?>
<div style="height: 270px; background-image: url('img/blueline.jpg'); background-repeat: no-repeat;background-size: cover; background-position: center;">
	<div id="cabezera" >
		<img src="img/logoMatchpeople.png" alt="logo matchpeople consultoria"> <br>
		<span></span>
	</div>
	<div style="text-align: center; font-size: 2.5em; font-weight: 600; padding:1em; background-color: #f0f8ff96;">
		<?php echo"$Titulo"; ?>
	</div>
</div>
<div id='contenido' style="padding:2em 0;">
	<form enctype="multipart/form-data" action="editar_sociometria.php?id=<?php echo"$IdPersonal"; ?>"  method="post">
	<div class='wrapper'>
		<div class='veinte '>
			<label># NOMINA</label>
      <div class="destacado"><?php echo"$NumNomina";?></div>
      <input type="hidden" name="NumNomina" value="<?php echo"$NumNomina";?>" >
		</div>
		<div class='cuarenta'>
			<label>NOMBRE COMPLETO</label>
      <div class="destacado"><?php echo"$Nombre"; ?></div>
			<input type="hidden" name="Nombre" value="<?php echo"$Nombre"; ?>">
		</div>
		<div class='treinta'>
			<label>ÁREA</label>
      <div class="destacado"><?php echo"$Departamento"; ?></div>
			<input type="hidden" name="Departamento" value="<?php echo"$Departamento"; ?>">
		</div>
		<div class='cien gap1'>
			<h2>I. ACTIVIDADES DE FORMACIÓN</h2>
		</div>
		<div class='cien gap3'>
			<label><?php echo"$act_formacion1"; ?></label>
			<input type="text" name="act_formacionA" value="<?php echo"$act_formacionA"; ?>" >
			<input type="text" name="act_formacionB" value="<?php echo"$act_formacionB"; ?>" class='gap1'>
			<input type="text" name="act_formacionC" value="<?php echo"$act_formacionC"; ?>" >
		</div>
		<div class='cien'>
			<label><?php echo"$act_formacion2"; ?></label>
			<input type="text" name="act_formacion2" value="<?php echo"$act_formacionR2"; ?>">
		</div>
		<div class='cien gap1'>
			<h2>II. ACTIVIDADES DE TRABAJO</h2>
		</div>
		<div class='cien gap3'>
			<label><?php echo"$Act_Ascendencia"; ?></label>
      <input list="TRNombre_ascendencia1" type="text" name="TRNombre_ascendencia1" value="<?php echo"$TRNombre_ascendencia1"; ?>">
			<datalist id="TRNombre_ascendencia1">
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
				 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_ascendencia1 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
			   }} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>

      <input list="TRNombre_ascendencia2" type="text" name="TRNombre_ascendencia2" value="<?php echo"$TRNombre_ascendencia2"; ?>" class='gap1'>
			<datalist id="TRNombre_ascendencia2" >
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
			 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_ascendencia2 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
			 }} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>

      <input list="TRNombre_ascendencia3" type="text" name="TRNombre_ascendencia3" value="<?php echo"$TRNombre_ascendencia3"; ?>">
			<datalist id="TRNombre_ascendencia3">
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
								 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_ascendencia3 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
				  			 }} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>
		</div>
		<div class='cien gap3'>
			<label><?php echo"$Act_Afinidad"; ?></label>
      <input list="TRNombre_afinidad1" type="text" name="TRNombre_afinidad1" value="<?php echo"$TRNombre_afinidad1"; ?>">
			<datalist id="TRNombre_afinidad1" class='noventaplus'>
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
								 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_afinidad1 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
				 				}} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>

      <input list="TRNombre_afinidad2" type="text" name="TRNombre_afinidad2" value="<?php echo"$TRNombre_afinidad2"; ?>"  class='gap1'>
			<datalist id="TRNombre_afinidad2">
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
								 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_afinidad2 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
				 			 }} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>

      <input list="TRNombre_afinidad3" type="text" name="TRNombre_afinidad3" value="<?php echo"$TRNombre_afinidad3"; ?>">
      <datalist id="TRNombre_afinidad3">
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
								 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_afinidad3 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
				 			 }} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>
		</div>
		<div class='cien'>
			<label><?php echo"$Act_Trabajo3"; ?></label>
			<select class='diez' name="Act_TrabajoSN" id="Act_TrabajoSN">
				<option value="">-</option>
			  <option value="Si" <?php if( $Act_TrabajoSN == 'Si') { echo"selected";}?>>Si</option>
			  <option value="No" <?php if( $Act_TrabajoSN == 'No') { echo"selected";}?>>No</option>
			</select>
			<input type="text" name="$Act_TrabajoR3" value="<?php echo"$Act_TrabajoR3";?>" placeholder="Comenta por favor:">
		</div>
		<div class='cien gap1'>
			<h2>III. ACTIVIDADES FORMATIVAS</h2>
		</div>
		<div class='cien gap3'>
			<label><?php echo"$Act_Popularidad"; ?></label>
      <input list="TRNombre_popularidad1" type="text" name="TRNombre_popularidad1" value="<?php echo"$TRNombre_popularidad1"; ?>">
      <datalist id="TRNombre_popularidad1" class='noventaplus'>
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
								 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_popularidad1 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
				 			 }} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>

      <input list="TRNombre_popularidad2" type="text" name="TRNombre_popularidad2" value="<?php echo"$TRNombre_popularidad2"; ?>" class='gap1'>
			<datalist id="TRNombre_popularidad2">
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
								 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_popularidad2 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
				 			}} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>

      <input list="TRNombre_popularidad3" type="text" name="TRNombre_popularidad3" value="<?php echo"$TRNombre_popularidad3"; ?>">
			<datalist id="TRNombre_popularidad3" class='noventaplus'>
				<?php $consulta = "SELECT * FROM personal_sociometria where IdEmpresa  = $IdEmpresa;";
						 $resultV = mysqli_query($con, $consulta);
						 if (mysqli_num_rows($resultV) > 0) {
							 // output data of each row
							 while($rowV = mysqli_fetch_assoc($resultV)) {
								 $IdPersonal_Ascendencia =  $rowV['IdPersonal'];
								 $Nombre_Ascendencia =  $rowV['Nombre'];
								 $Departamento_Ascendencia =  $rowV['Departamento'];
								 $Turno_Ascendencia =  $rowV['Turno'];
								 echo"<option value='$Nombre_Ascendencia'"; if( $TRNombre_popularidad3 == $Nombre_Ascendencia ) { echo"selected";} echo "> $Nombre_Ascendencia | $Departamento_Ascendencia | $Turno_Ascendencia </option>";
				 			}} else { echo "<option value=''>No Hay Resultados</option>"; } ?>
			</datalist>
		</div>
		<div class='cien gap3'>
			<label><?php echo"$Act_sociales2"; ?></label>
			<select class='diez' name="Act_socialesR2" id="Act_sociales2">
				<option value="">-</option>
			  <option value="Bien" <?php if( $Act_socialesR2 == 'Bien' ) { echo"selected";}?>>Bien</option>
			  <option value="Mal" <?php if( $Act_socialesR2 == 'Mal' ) { echo"selected";}?>>Mal</option>
			</select>
		</div>
		<div class='cien gap3'>
			<label><?php echo"$Act_sociales3"; ?></label>
			<input type="text" name="Act_socialesR3" value="<?php echo"$Act_socialesR3"; ?>">
		</div>
		<div class='cien gap3'>
			<label><?php echo"$Act_sociales4"; ?></label>
			<select class='diez' name="Act_socialesR4" id="Act_socialesR4">
				<option value="">-</option>
			  <option value="Si" <?php if( $Act_socialesR4 == 'Si') { echo"selected";}?>>Si</option>
			  <option value="No" <?php if( $Act_socialesR4 == 'No') { echo"selected";}?>>No</option>
			</select>
		</div>
		<input type="hidden" name="IdEmpresa" value="<?php echo"$IdEmpresa"; ?>" />
		<input type="hidden" name="IdEmpleado" value="<?php echo"$IdEmpleado"; ?>" />
		<input type="hidden" name="IdEncuesta" value="<?php echo "$IdEncuesta"; ?>" />
		<input type="submit" class="btn_Enviar btn-default" name='btn_submit' value="Terminar y Enviar">
		<?php if($estatusId == "1"){ echo "<input type='submit' class='btnborrador btn-default' name='btn_submit' value='Guardar'>";}?>
	</div>
	</form>
</div>
<?php }	} else { echo "<h3>No Hay Resultados</h3>"; } mysqli_close($con); ?>
<!--java scrips para validar formularios -->
<script type="text/javascript" src="js/validador.js"></script>
</body>
</html>
