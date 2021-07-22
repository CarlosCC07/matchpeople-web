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
<title>Matchpeople - admin Nuevo Socios</title>
<?php include("header.php");?>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
<div class="titulosec" >
 Socios Estratégicos
 <div class="alinearderecha "><a href="sociosEstrategicos.php" class="btn_Eliminar btn-default ">Cancelar</a></div>
</div>

<form action="Admin_vacantes/upload_Socio.php" class="box centar" enctype='multipart/form-data' method='POST' onSubmit="return validacion();">
  <div class="gap3">
    <span class='bold'>Empresa</span>
	<input type="text" name="empresa" required >
  </div>

  <div class="gap3">
  <span class='bold'>Subir Archivo</span>
  <input type="file" name="upload_img">
  </div>

  <input type="submit" class="btn_Enviar btn-default" value="Enviar">
</form>
</div>
<?php include ("footer.php");?>
