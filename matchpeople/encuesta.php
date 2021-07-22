
<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*RESUMEN
Nombre:         Resultados de encuesta
Tipo:           Interfaz
Descripción:    Esta pagina trae el resultado de la encuesta seleccionada
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Crea la conexión
include("clavesbd.php");
//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
ob_start();
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");
// Check connection
if (!$con) { die("Connection failed: " . mysqli_connect_error()); }
  $sql = "SELECT * FROM encuesta where idiomaId = 1 AND estatusId = 1 AND id = 1";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $TituloEncuesta =  $row['nomencuesta'];
    $img =  $row['imagen'];
    $alt =  $row['alt'];
    $Fecha = $row['fecha'];
    $keywords = $row['keywords'];
    $balaso = $row['balaso'];
    $descripcion = $row['descripcion'];
    $documento = $row['documento'];
    $idiomaId = $row['idiomaId'];
    $Fecha = $row['fecha'];
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
<meta name="description" content="<?php echo"$balaso"; ?>" />
<meta name="keywords" content="<?php echo"$keywords"; ?>" />
<title> <?php echo"$TituloEncuesta"; ?></title>
<link rel="alternate" hreflang="es-mx" href="http://www.matchpeople.com/inico.php" />
<link rel="alternate" hreflang="en-us" href="http://www.matchpeople.com/english_site/inicio.php" />

<?php include("header.php");?>

<div id="contenido">
  <div class="wrapper ">
    <diV class="gap1" style="width: 100%; display: inline-block;">
      <div style="width: 100%; display: inline-block; padding: 0px; margin: 0px;">
        <div class="imageDes">
            <img src="img/encuestas/<?php echo"$img"; ?>" alt="<?php echo"$alt"; ?>" />
        </div>
        <div class="text-wrapperDes" >
          <h1><?php echo"$TituloEncuesta"; ?></h1>
          <div class="eyebrow">
            <?php echo"$Fecha"; ?>
          </div>
          <div class="descriptionDes">
            <?php echo"$balaso"; ?>
          </div>
          <div style=" margin: 15px 0px;">
            <?php echo"$descripcion"; ?>
          </div>
        <div class="">
          <a class="btn5 setenta " href="descargas/<?php echo"$documento"; ?>" hreflang="<?php
          if ($idiomaId != "1") { $hreflang ="en-us";} else {$hreflang ="es-mx";}
          echo"$hreflang"; ?>" target="_blank">Resultados</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php } } else { echo "0 results";}; ?>
</div>

<?php include("footer.php");?>
