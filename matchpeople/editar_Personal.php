<?php
session_start();
if(empty( $_SESSION ['user'])){ header('Location:login_vacante.php');}
//Conexion a la db
include("clavesbd.php");

//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
header('Content-Type: text/html; charset=utf-8');
ob_start();

// Crea la conexión
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");
// Checa que la conexión se haya establecido correctamente
if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}

?>
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
<title>Matchpeople - Editar personal</title>
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
<style >
  body{background-color: #e4e4e4;}
	#cabezera{width: 201px; padding: 13px; text-align: center; color: #FFF;}
	.wrapper{display: flex;flex-wrap: wrap; justify-content: space-around; }
	.wrapper input{width: 90%; }
	.noventaplus{width: 98%; }
	.wrapper label{font-weight: 600; }
</style>
<body>
  <?php include("header.php");?>
  <div id='contenido'>
    <?php include("menus/menu_vacantes.php");?>
    <div class="titulosec" style="width: 95%;">
      Editar de empleado
    </div>
	<?php
  $ide = $_GET['id'];
  $sql = "SELECT  NumNomina, Nombre, FechaIngreso, Departamento, Clave, Puesto,Planta,Segmento,Turno,FechaNacimiento,Email from personal_sociometria where IdPersonal = $ide";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$NumNomina= $row['NumNomina'];
					$Nombre = $row['Nombre'];
          $FechaIngreso = $row['FechaIngreso'];
          $Departamento = $row['Departamento'];
          $Clave = $row['Clave'];
					$Puesto = $row['Puesto'];
          $Planta = $row['Planta'];
          $Segmento = $row['Segmento'];
					$Turno = $row['Turno'];
          $FechaNacimiento = $row['FechaNacimiento'];
          $Email = $row['Email'];
?>
<form style="padding:20px" enctype="multipart/form-data" action="Admin_vacantes/updatePersonal.php?id=<?php echo"$ide";?>"  method="post" onSubmit="return validacion();">
  <div class="wrapper">

    <div class='veinte '>
      <label>PLANTA</label>
      <input type="number" name="Planta" value="<?php echo"$Planta";?>">
    </div>
    <div class='veinte '>
      <label># NOMINA</label>
      <input type="number" name="NumNomina" value="<?php echo"$NumNomina";?>">
    </div>
    <div class='veinte'>
      <label>NOMBRE COMPLETO</label>
      <input type="text" name="Nombre" value="<?php echo"$Nombre"; ?>" >
    </div>
    <div class='veinte'>
      <label>Puesto</label>
      <input type="text" name="Puesto" value="<?php echo"$Puesto"; ?>">
    </div>
    <div class='veinte'>
      <label>Departamento</label>
      <input type="text" name="Departamento" value="<?php echo"$Departamento"; ?>">
    </div>
    <div class='veinte'>
      <label>Segmento</label>
      <input type="text" name="Segmento" value="<?php echo"$Segmento"; ?>">
    </div>
    <div class='veinte'>
      <label>Turno</label>
      <input type="text" name="Turno" value="<?php echo"$Turno"; ?>">
    </div>
    <div class='veinte'>
      <label>Clave</label>
      <input type="text" name="Clave" value="<?php echo"$Clave"; ?>">
    </div>
    <div class='veinte'>
      <label>Fecha de Ingreso</label>
      <input type="text" name="FechaIngreso" value="<?php echo"$FechaIngreso"; ?>">
    </div>
    <div class='veinte'>
      <label>Fecha de Nacimiento</label>
      <input type="text" name="FechaNacimiento" value="<?php echo"$FechaNacimiento"; ?>">
    </div>
    <div class='veinte'>
      <label>Email</label>
      <input type="text" name="Email" value="<?php echo"$Email"; ?>">
    </div>
    		<input type="submit" class="btn2" name='btn_submit' value="Guardar">
    		<input type="submit" class="btn3" name='btn_submit' value="Cancelar">
  </div>
</form>
</div>
<?php }	} else { echo "<h3>No Hay Resultados</h3>"; } mysqli_close($con); ?>
</div>
<?php include ("footer.php"); ?>
