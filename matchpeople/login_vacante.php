<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=" " />
<meta name="keywords" content=" " />
<title>Match People - Loging</title>
<?php include("header.php");?>
<div class="not-fullscreen background" style="background-image: url(img/fondos/codigo.jpg);" data-img-width="1600" data-img-height="1064">
  <div class="content-a">
    <div class="content-b">
      <div class="imgproduct">
        <div id="imgBox">
          <img src="img/spacer.png" class="noventaMain" >
          <img src="img/fondos/codigo.jpg" alt="" width="1px" height="1px">
        </div>
      </div>
      <div class="text fondoblanco">
        <h1  class="Titulosec">Bienvenidos</h1>
        <div class="textInfo ">
          <form action="Admin_vacantes/validarUsuario.php" method="post" enctype="multipart/form-data">
            <p class="gap3" style="color: #820403; font-weight: bold;">
            Ingrese usuario y contraseña
            </p>
            <br>
            <p class="gap3"><input type="text" name="user" style="width: 200px;"/></p>
            <p class="gap3"><input type="password" name="password"  style="width: 200px;"/></p>
            <br>
            <p class="gap2"><input type="submit" name="login" class="btn5"  style=" margin-bottom:20px; width: 212px;" value="Acceder" /></p>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include ("footer.php");?>
