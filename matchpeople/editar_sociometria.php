<?php
session_start();
if(empty( $_SESSION ['user'])){header('Location:login_vacante.php');}
	//Conexion a la db
	include("clavesbd.php");
	$con = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");
	// Checa que la conexión se haya establecido correctamente
	if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}

	$ide = $_GET['id'];
	$accion = $_POST["btn_submit"];
	if ($accion == "Papelería"){
		$uno = 1;
		$sqlD = "UPDATE encuesta_sociometria SET papeleria = '$uno' WHERE IdEncuesta  = $ide";
		// Checa que la conexión se haya establecido correctamente
		if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "El estudio esta en papelería ";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'admin_sociometria.php';
			</script>
	<?php }
	else if ($accion == "Eliminar"){
		$tres = 3;
		$sqlD = "UPDATE encuesta_sociometria SET estatusId = '$tres' WHERE IdEncuesta  = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "El estudio esta eliminado ";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'papeleria_sociometria.php';
			</script>
	<?php }
	else if ($accion == "Detener estudio"){
		$cuatro = 4;
		$sqlD = "UPDATE encuesta_sociometria SET estatusId = '$cuatro' WHERE IdEncuesta  = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "El estudio esta terminado";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'papeleria_sociometria.php';
			</script>
	<?php }
	else if ($accion == "Terminar y Enviar" || $accion == "Guardar"){
		$IdEmpresa = $_POST["IdEmpresa"];
		$IdEncuesta = $_POST["IdEncuesta"];
		$IdEmpleado = $_POST["IdEmpleado"];
		$act_formacionA = $_POST["act_formacionA"];
		$act_formacionB = $_POST["act_formacionB"];
		$act_formacionC = $_POST["act_formacionC"];
		$act_formacion2 = $_POST["act_formacion2"];
		$TRNombre_ascendencia1 = $_POST["TRNombre_ascendencia1"];
		$TRNombre_ascendencia2 = $_POST["TRNombre_ascendencia2"];
		$TRNombre_ascendencia3 = $_POST["TRNombre_ascendencia3"];
		$TRNombre_afinidad1 = $_POST["TRNombre_afinidad1"];
		$TRNombre_afinidad2 = $_POST["TRNombre_afinidad2"];
		$TRNombre_afinidad3 = $_POST["TRNombre_afinidad3"];
		$Act_TrabajoSN = $_POST["Act_TrabajoSN"];
		$Act_TrabajoR3 = $_POST["Act_TrabajoR3"];
		$TRNombre_popularidad1 = $_POST["TRNombre_popularidad1"];
		$TRNombre_popularidad2 = $_POST["TRNombre_popularidad2"];
		$TRNombre_popularidad3 = $_POST["TRNombre_popularidad3"];
		$Act_socialesR2 = $_POST["Act_socialesR2"];
		$Act_socialesR3 = $_POST["Act_socialesR3"];
		$Act_socialesR4 = $_POST["Act_socialesR4"];
		if($accion == "Terminar y Enviar") {
			$IdEstatus = 3;
		} else {
			$IdEstatus = 2;
		}
		 echo "<script>console.log(".$Act_TrabajoR3.")</script>";
		//IdResEncuesta = '',
		//Act_TrabajoR3 = '$Act_TrabajoR3',
		$sqlD = "UPDATE resencuesta_sociometria SET IdEstatus = '$IdEstatus',
		 TRNombre_ascendencia1 = '$TRNombre_ascendencia1',
		 TRNombre_ascendencia2 = '$TRNombre_ascendencia2',
		 TRNombre_ascendencia3 = '$TRNombre_ascendencia3',
		 TRNombre_afinidad1 = '$TRNombre_afinidad1',
		 TRNombre_afinidad2 = '$TRNombre_afinidad2',
		 TRNombre_afinidad3 = '$TRNombre_afinidad3',
		 TRNombre_popularidad1 = '$TRNombre_popularidad1',
		 TRNombre_popularidad2 = '$TRNombre_popularidad2',
		 TRNombre_popularidad3 = '$TRNombre_popularidad3',
		 act_formacionA = '$act_formacionA',
		 act_formacionB = '$act_formacionB',
		 act_formacionC = '$act_formacionC',
		 act_formacionR2 = '$act_formacion2',
		 Act_TrabajoSN = '$Act_TrabajoSN',
		 Act_TrabajoR3 = '$Act_TrabajoR3',
		 Act_socialesR2 = '$Act_socialesR2',
		 Act_socialesR3 = '$Act_socialesR3',
		 Act_socialesR4 = '$Act_socialesR4' WHERE IdEmpresa = '$IdEmpresa' AND IdPersonal = '$IdEmpleado'";
		//echo "<script>console.log("'.$sqlD.'")</script>";
		if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "El estudio esta terminado";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'index.php';
			</script>
	<?php }
	else if ($accion == "ver encuestas"){	?>
		<!-- muestro los empleados y si ya contestaron o no la encuesta -->
		<!doctype html>
		<html>
		<head>
		<meta charset="UTF-8">
		<title>Matchpeople - Intranet Estudio de sociometría</title>
		<style media="screen">
		#customers td, #customers th { border: 1px solid #dddddd; text-align: left; padding: 8px;}
		.adon {border-radius: 4px; text-decoration: none; padding: 5px; font-size: 14px; color: #FFF;}
		</style>
		<?php include("header.php");?>
		<div id="contenido">
			<?php include("menus/menu_vacantes.php");?>
			<div class="titulosec" style="width: 95%;">
				Listado de participantes
				<div class="alinearderecha ">
				  <a href="sendEncuestaSociometria.php?id=1" class="btn5 ">Enviar Recordatorio</a>
				  <a href="papeleria_sociometria.php" class="btn5 ">Papelería</a>
				</div>
			</div>
			<table style="width:95%; margin:0 auto;" id="customers">
			  <tr>
			    <th>Nomina</th>
			    <th>Nombre</th>
					<th>Puesto</th>
			    <th>Departamento</th>
					<th>Planta</th>
					<th>Estatus</th>
					<th>acciones</th>
			  </tr>
			<?php $consulta = "SELECT personal_sociometria.IdPersonal, personal_sociometria.IdEmpresa, personal_sociometria.NumNomina,personal_sociometria.Nombre,
			 personal_sociometria.Departamento, personal_sociometria.Puesto, personal_sociometria.Planta, personal_sociometria.Email, resencuesta_sociometria.IdEstatus
			FROM personal_sociometria
		   JOIN resencuesta_sociometria ON personal_sociometria.IdPersonal = resencuesta_sociometria.IdResEncuesta
			where personal_sociometria.IdEmpresa = $ide";

				 $resultV = mysqli_query($con, $consulta);
				 if (mysqli_num_rows($resultV) > 0) {
					 // output data of each row
					 while($rowV = mysqli_fetch_assoc($resultV)) {
						 $IdPersonal = $rowV['IdPersonal'];
						 $IdEmpresa = $rowV['IdEmpresa'];
						 $NumNomina = $rowV['NumNomina'];
						 $Nombre = $rowV['Nombre'];
						 $Departamento = $rowV['Departamento'];
						 $Puesto = $rowV['Puesto'];
						 $Planta = $rowV['Planta'];
						 $Email= $rowV['Email'];
						 $IdEstatus = $rowV['IdEstatus'];
			?>
			<tr>
				<td><label><?php echo "$NumNomina";?></label></td>
		    <td><label><?php echo "$Nombre";?></label></td>
				<td><label><?php echo "$Puesto";?></label></td>
		    <td><label><?php echo "$Departamento";?></label></td>
				<td><label><?php echo "$Planta";?></label></td>
				<td><label><?php switch ($IdEstatus) {
					    case 1:
					        echo "Sin responder";
					        break;
					    case 2:
					        echo "En progresso";
					        break;
					    case 3:
					        echo "Terminada";
					        break;}?>
				</label></td>
				<td>
					<form action="editar_Personal.php?id=<?php echo "$IdPersonal";?>" enctype="multipart/form-data" method="post" onSubmit="return validacion();">
						<a class="btn2 adon" href="estudio_sociometria.php?id=<?php echo "$IdEmpresa:$IdPersonal";?>" target="_blank"> Ver encuesta</a>
						<input type='submit' class='btn2' name='btn_submit' value='Editar'>
						<input type='submit' class='btn3' name='btn_submit' value='Eliminar'>
					</form>
				</td>
			</tr>
		<?php }	} else { echo "<h3 style='text-align: center;'>No Hay Resultados</h3>"; } mysqli_close($con);?>
  	</table>
	</div>
  <?php
	include ("footer.php");}
	else if ($accion == "Restaurar"){
		$cero = 0;
		$sqlD = "UPDATE encuesta_sociometria SET papeleria = '$cero' WHERE IdEncuesta  = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "El estudio se restauro";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'papeleria_sociometria.php';
			</script>
	<?php }
	else{
	//Se obtiene la información de todas las vacantes en base de datos.
	$consulta = "SELECT * FROM encuesta_sociometria where IdEncuesta  = $ide;";
			 $resultV = mysqli_query($con, $consulta);
			 if (mysqli_num_rows($resultV) > 0) {
				 // output data of each row
				 while($rowV = mysqli_fetch_assoc($resultV)) {
					 $estatusId =  $rowV['estatusId'];
					 $Titulo =  $rowV['Titulo'];
					 $act_formacion1 =  $rowV['act_formacion1'];
					 $act_formacion2 =  $rowV['act_formacion2'];
					 $Act_Ascendencia =  $rowV['Act_Ascendencia'];
					 $Act_Afinidad =  $rowV['Act_Afinidad'];
					 $Act_Trabajo3 =  $rowV['Act_Trabajo3'];
					 $Act_Popularidad =  $rowV['Act_Popularidad'];
					 $Act_sociales2 =  $rowV['Act_sociales2'];
					 $Act_sociales3 =  $rowV['Act_sociales3'];
					 $Act_sociales4 =  $rowV['Act_sociales4'];
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Editar estudio</title>
<?php include("header.php");?>
<div id="contenido">
	<?php include("menus/menu_vacantes.php");?>
	<div class="titulosec">Editar Encuesta</div>
		<div class="box" >
			<form <?php echo "action='Admin_vacantes/updateSociometria.php?id=".$rowV['IdEncuesta']."'";?> enctype="multipart/form-data" method="post" onSubmit="return validacion();" class="border-bottom">
				<div class="gap3 cien">
					<span class='bold'>Nombre del estudio: </span>
					<input type="text" name="Titulo" value="<?php echo"$Titulo";?>">
				</div>
				<div style="display: inline-block;  width: 100%;">
				  <div class="gap3 cien">
				  	<span class='bold'>I. ACTIVIDADES DE FORMACIÓN</span><br>
				  	<textarea name="act_formacion1" id="act_formacion1" required maxlength="400" > <?php echo"$act_formacion1"; ?></textarea>
				  </div>
					<div class="gap3 cien">
				  	<textarea name="act_formacion2" id="act_formacion2" required maxlength="400" > <?php echo"$act_formacion2"; ?></textarea>
				  </div>
				</div>
				<div style="display: inline-block;  width: 100%;">
				  <div class="gap3 cien">
				  	<span class='bold'>II. ACTIVIDADES DE TRABAJO</span><br>
				  	<textarea name="Act_Ascendencia" id="Act_Ascendencia" required maxlength="400" > <?php echo"$Act_Ascendencia"; ?></textarea>
				  </div>
					<div class="gap3 cien">
				  	<textarea name="Act_Afinidad" id="Act_Afinidad" required maxlength="400" > <?php echo"$Act_Afinidad"; ?></textarea>
				  </div>
					<div class="gap3 cien">
				  	<textarea name="Act_Trabajo3" id="Act_Trabajo3" required maxlength="400" > <?php echo"$Act_Trabajo3"; ?></textarea>
				  </div>
				</div>
				<div style="display: inline-block;  width: 100%;">
				  <div class="gap3 cien">
				  	<span class='bold'>III. ACTIVIDADES SOCIALES</span><br>
				  	<textarea name="Act_Popularidad" id="Act_Popularidad" required maxlength="400" > <?php echo"$Act_Popularidad"; ?></textarea>
				  </div>
					<div class="gap3 cien">
				  	<textarea name="Act_sociales2" id="Act_sociales2" required maxlength="400" > <?php echo"$Act_sociales2"; ?></textarea>
				  </div>
					<div class="gap3 cien">
				  	<textarea name="Act_sociales3" id="Act_sociales3" required maxlength="400" > <?php echo"$Act_sociales3"; ?></textarea>
				  </div>
					<div class="gap3 cien">
				  	<textarea name="Act_sociales4" id="Act_sociales4" required maxlength="400" > <?php echo"$Act_sociales4"; ?></textarea>
				  </div>
				</div>
				<div style="display: inline-block;  width: 100%;">
			  	<input type="submit" class="btn_Enviar btn-default" name='btn_submit' value="Actualizar / Publicar">
					<?php if($estatusId != "1" ){ echo "<input type='submit' class='btnborrador btn-default' name='btn_submit' value='Guardar como borrador'>";}?>
					<input type='submit' class='btn_Eliminar btn-default' name='btn_submit' value='Papelería'>
				</div>
			</form>
		</div>
</div>
<?php
}	} else { echo "<h3>No Hay Resultados</h3>"; } mysqli_close($con);
include ("footer.php");}
?>
