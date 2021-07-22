<?php
session_start();
if(empty( $_SESSION ['user'])){ header('Location:login_vacante.php');}

	//Conexion a la db
	include("clavesbd.php");
	$con = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");
	// Checa que la conexión se haya establecido correctamente
	if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}

	$ide = $_GET['id'];
	$accion = $_POST["btn_submit"];
	if ($accion == "Borrar"){
		echo "Papelería";
		$uno = 1;
		$sqlD = "UPDATE empresas_sociometria SET papeleria = '$uno' WHERE IdEmpresa = $ide";
// Checa que la conexión se haya establecido correctamente
		if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La encuesta esta en papelería ";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'catalogo_empresas.php';
			</script>
	<?php }
	else if ($accion == "Cargar personal"){
	?>

	<?php }
	else if ($accion == "Restaurar"){
		$cero = 0;
		$sqlD = "UPDATE empresas_sociometria SET papeleria = '$cero' WHERE IdEmpresa = $ide";
	  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
		else{ $msg = "La encuesta se restauro";}
		?>
		<meta charset='utf-8'>
			<script type='text/javascript'>
				alert("<?php echo $msg; ?>");
				window.location.href = 'catalogo_empresas.php';
			</script>
	<?php }
	else{
	//Se obtiene la información de todas las vacantes en base de datos.
	$consulta = "SELECT * FROM empresas_sociometria where IdEmpresa = $ide;";
			 $resultV = mysqli_query($con, $consulta);
			 if (mysqli_num_rows($resultV) > 0) {
				 // output data of each row
				 while($rowV = mysqli_fetch_assoc($resultV)) {
					 $Nombre =  $rowV['Nombre'];
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Editar Empresas</title>
<?php include("header.php");?>
<div id="contenido">
	<?php include("menus/menu_vacantes.php");?>
	<div class="titulosec">Editar Empresas</div>
		<div class="box" >
			<form <?php echo "action='Admin_vacantes/updateEmpresas.php?id=".$rowV['IdEmpresa']."'";?> enctype="multipart/form-data" method="post" onSubmit="return validacion();" class="border-bottom">
				<div style="display: inline-block;  width: 100%;">
					<div class="gap3 cincuenta100">
					  <span class='bold'>Título</span><br>
						<input type="text" name="nombre" id="vacante" value="<?php echo"$Nombre"; ?>" >
				  </div>
				</div>
				<div style="display: inline-block;  width: 100%;">
			  	<input type="submit" class="btn_Enviar btn-default" name='btn_submit' value="Actualizar / Publicar">
					<input type='submit' class='btn_Eliminar btn-default' name='btn_submit' value='cancelar'>
				</div>
			</form>
		</div>
</div>
<?php
}	} else { echo "<h3>No Hay Resultados</h3>"; } mysqli_close($con);
include ("footer.php");}
?>
