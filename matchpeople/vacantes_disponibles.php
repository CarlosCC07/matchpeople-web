<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*RESUMEN
Nombre:         Vacantes_disponibles
Tipo:           Interfaz
Descripción:    Esta pagina trae el resultado de la busqueda de vacantes, en caso de que no exista una busqueda
				llama todas las vacantes existentes

*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Crea la conexión
include("clavesbd.php");

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");
// Check connection
if (!$con) { die("Connection failed: " . mysqli_connect_error()); }

 ?>

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
 <meta name="keywords" content=" Vacantes disponibles, vacantes laborales" />
 <title>Match People - Vacantes disponibles</title>
<?php include ("header.php");?>
<div id="contenido">
<div id="ciudad_bg" >
<div id="chica_busqueda_img">
<div class="Box_Busqueda_Vacante">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype='multipart/form-data' method="post" >
<div>
<h1>Vacantes disponibles</h1>
<p>Descubre nuestras vacantes</p>
</div>
<input type="text" class="ochenta" style="margin:5px auto; height: 25px;" name="Buscar_Vacante"/>
<input type="submit" value="Buscar" class="btn5 setenta" >
</form>
</div>

</div>
</div>
<div id="menu_filtro">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype='multipart/form-data' method="post">
<p class="display_block">
<input type="text" class="inline-block " name="Buscar_Vacante" id="Buscar_Vacante" style="visibility:hidden"/>
<input type="submit" value="Limpiar busqueda" class="btn5 diez alinearderecha margin_right">
</p>
</form>
</div>

   <div class="Contenedor_vacantes">
    <!-- Socios Estratégicos -->
    <div id="SociosEstrategicos" class="alinearIzquierda Contenedor_vacantes1">
    <h3>Socios Estratégicos</h3>
    <div class="gap1 boxLogoCliente" >
		<?php
		// llama de base de datos todos los socios Estrategicos
  		$sqlLC = "SELECT logo FROM logocliente";
  		$resultLC = mysqli_query($con, $sqlLC);
  		if (mysqli_num_rows($resultLC) > 0) {
  		// output data of each row
  		while($rowLC = mysqli_fetch_assoc($resultLC)) {
  		echo "
   		<div class='logosclientes'>
   		<img src='img/logosclientes/".$rowLC['logo']."' />
   		</div>";
   		} } else { echo "0 results";}; ?>
    </div>

    </div>
    <!-- Vacantes Disponibles -->
    <div class="Contenedor_vacantes2 alinearIzquierda">
    	<h3 style="color:#333">Resultados de búsqueda</h3>
  		<?php
		// llama de base de datos las vacantes disponibles
		$busqueda = $_POST['Buscar_Vacante'];
		//Obtenemos los resultados de busqueda
		if(isset($_POST['Buscar_Vacante'])){
		$sql ="SELECT id, vacante, ciudad, fecha, des_corta FROM listavacantes WHERE estatusId = 1 AND ( papeleria != 1  AND
    (vacante LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR GiroEmpresa LIKE '%$busqueda%' OR area_funcion LIKE '%$busqueda%'))
    ";
		$result = mysqli_query($con, $sql);
  			if (mysqli_num_rows($result) > 0) {
  				// output data of each row
  				while($row = mysqli_fetch_assoc($result)) {
  				echo "
   				<form class='box_vacante' action='update.php?id=".$row['id']."' enctype='multipart/form-data' method='POST'>
   				<div class='col1 setenta'>"
   				."<strong>Vacante:</strong> <span class='h2'>".$row["vacante"]."</span><br><strong>"
   				.$row["fecha"]."</strong> <strong class='izquierdo'>Ciudad: </strong>".$row["ciudad"]."<br>"
          .$row["des_corta"].
				"</div>
				<div class='col2'>
   				<a class='btn5 alignCenter'  href='vacante.php?id=".$row['id']."' role='button'>Ver más</a>
   				</div>
   				</form>";
   			}
   			} else {	echo "<h3>No Hay Resultados</h3>";}
			mysqli_close($con);
		}
    else{
      $sql = "SELECT id, vacante, ciudad, fecha, Nombre_empresa, des_corta, estatusId FROM listavacantes where  estatusId = 1 AND papeleria != 1";
     		$result = mysqli_query($con, $sql);
  			if (mysqli_num_rows($result) > 0) {
  				// output data of each row
  				while($row = mysqli_fetch_assoc($result)) {
  				echo "
   				<form class='box_vacante' action='update.php?id=".$row['id']."' enctype='multipart/form-data' method='POST'>
   				<div class='col1 setenta'>"
   				."<strong>Vacante:</strong> <span class='h2'>".$row["vacante"]."</span><br><strong>"
   				.$row["fecha"]."</strong> <strong class='izquierdo'>Ciudad: </strong>".$row["ciudad"]."<br>"
                .$row["des_corta"].
				"</div>
				<div class='col2'>
   				<a class='btn5 alignCenter'  href='vacante.php?id=".$row['id']."' role='button'>Ver más</a>
   				</div>
   				</form>";
   			}} else {echo "<h3>No Hay Resultados</h3>";}	mysqli_close($con);
      }
  		?>
   	</div>
   </div>
  </div></div>
<?php include ("footer.php");?>
