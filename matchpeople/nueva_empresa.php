<?php
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:login_vacante.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Nueva Empresa</title>
<?php include("header.php");?>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
<div class="titulosec" >
  Crear nueva empresa
</div>

<form action="Admin_vacantes/saveEmpresa.php" enctype="multipart/form-data" class="box" method="post" onSubmit="return validacion();">
  <div class="gap3 cincuenta100">
	  <span class='bold'>Nombre</span><br>
		<input type="text" name="nomempresa" id="vacante" required >
  </div>
  <input type="submit" class="btn_Enviar btn-default" name='btn_submit' value="Publicar">
</form>
</div>
<?php include ("footer.php");?>
