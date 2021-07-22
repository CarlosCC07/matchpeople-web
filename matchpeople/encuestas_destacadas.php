<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*RESUMEN
Nombre:         Resultados de encuestas
Tipo:           Interfaz
Descripción:    Esta pagina trae el resultado de la busqueda las encuestas.
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
 ?>

<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=" " />
<meta name="keywords" content="consultoría, clima organizacional, compensacion salarial, coba, reclutamiento, capital humano, seleccion, estudios nicho, estudios de pilotos, sennsing, desarrollo humano, " />
<title>Encuestas de interes - matchpeople</title>
<link rel="alternate" hreflang="es-mx" href="http://www.matchpeople.com/inico.php" />
<link rel="alternate" hreflang="en-us" href="http://www.matchpeople.com/english_site/inicio.php" />
<?php include("header.php");?>

<div id="contenido">
  <!--Carrusel ei-slider ultimas 3 encuestas -->
  <div id="ei-slider" class="ei-slider"  style="height: 400px;">
    <?php
    // llama a la ultima encuesta
      $sql = "SELECT file, nomencuesta, imagen, alt, fecha FROM encuesta where idiomaId = 1 AND estatusId = 1 order by id desc limit 1";

      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $file = $row['file'];
    		$TituloEncuesta =  $row['nomencuesta'];
        $img =  $row['imagen'];
        $alt =  $row['alt'];
        $Fecha = $row['fecha'];
      ?>
    <ul class="ei-slider-large">
      <li>
        <div class="ei" >
          <h4 class="gap3">Nueva Encuesta</h4>
          <h2>
            <a href="<?php echo"$file.php"; ?>"><?php echo"$TituloEncuesta"; ?></a>
          </h2>
        </div>
        <img src="img/encuestas/<?php echo"$img"; ?>" alt="<?php echo"$alt"; ?>" />
      </li>
    </ul>
    <?php } } else { echo "0 results";}; ?>
  </div>
  <div class="wrapper gap1">
    <h1 class="gap3">Encuestas Destacadas</h1>
    <?php
    // llama a la encuesta destacada
      $sql = "SELECT file, nomencuesta, imagen, alt, balaso FROM encuesta where idiomaId = 1 AND destacado = 1 AND estatusId = 1 order by id desc limit 1";
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $file = $row['file'];
        $TituloEncuesta = $row['nomencuesta'];
        $img =  $row['imagen'];
        $alt =  $row['alt'];
        $balaso = $row['balaso'];
      ?>
    <hr>
    <diV class="gap1" style="width: 100%; display: inline-block;">
      <!-- <h4 class="gap3">Encuestas de interés</h4>-->
      <div class="item" style="width: 100%; display: inline-block; padding: 0px; margin: 0px;">
        <div class="imageDes">
          <a href="<?php echo"$file.php"; ?>" >
            <img src="img/encuestas/<?php echo"$img"; ?>" alt="<?php echo"$alt"; ?>" />
          </a>
        </div>
        <div class="text-wrapperDes" >
          <a href="<?php echo"$file.php"; ?>"><h3 class="headline"><?php echo"$TituloEncuesta"; ?></h3></a>
          <div class="descriptionDes ">
            <?php echo"$balaso"; ?>
          </div>
        </div>
      </div>
    </div>
  <?php } }; ?>
    <hr style=" margin-bottom: 20px;">

      <div class="block-list text-s">
        <?php
        $consulta_noticias = mysqli_query($con, "SELECT * FROM encuesta where estatusId ='1' AND papeleria != '1' AND idiomaId ='1' ") or die(mysql_error());
        $num_total_registros = mysqli_num_rows($consulta_noticias);
        //Limito la busqueda
        $TAMANO_PAGINA = 8;
        //examino la página a mostrar y el inicio del registro a mostrar
        $pagina = @$_GET["pagina"];

        if (empty($pagina)) {

            $inicio = 0;
            $pagina = 1;
        } else {
            $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
        //calculo el total de páginas
        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

        // llama a la encuesta destacada
        $query = mysqli_query($con, "SELECT file, nomencuesta, imagen, alt, fecha, balaso FROM encuesta where estatusId ='1' AND papeleria != '1' AND idiomaId ='1' ORDER BY id DESC limit " . $inicio . "," . $TAMANO_PAGINA) or die(mysql_error());
          //$sql = "SELECT file, nomencuesta, imagen, alt, fecha, balaso  FROM encuesta where estatusId = 1";
          //$result = mysqli_query($con, $sql);
          //if (mysqli_num_rows($result) > 0) {
          //while($row = mysqli_fetch_assoc($result)) {
          while ($row = mysqli_fetch_array($query)) {
          // output data of each row
            $file = $row['file'];
        		$TituloEncuesta =  $row['nomencuesta'];
            $img =  $row['imagen'];
            $alt =  $row['alt'];
            $balaso = $row['balaso'];
            $Fecha = $row['fecha'];
            $newDate = date("d/m/Y", strtotime($Fecha));
          ?>
        <div class="item">
            <div class="image">
                <a href="<?php echo"$file.php"; ?>" tabindex="-1" aria-hidden="true">
                <img src="img/encuestas/<?php echo"$img"; ?>" alt="<?php echo"$alt"; ?>">
                </a>
            </div>
            <div class="text-wrapper">
                <span class="eyebrow">Article</span>
                    <a href="<?php echo"$file.php"; ?>" class="item-title-link">
                        <h3 class="headline "><?php echo"$TituloEncuesta"; ?></h3>
                    </a>
                <div class="description">
                    <time><?php echo"$newDate"; ?></time> –
                    <?php echo"$balaso"; ?>
                </div>
            </div>
        </div>
        <?php }  //} } else { echo "0 results";}; ?>
        <div class="shop_pagination" >
            <ul>
        <?php
        $url = "encuestas_de_interes.php?";
        if ($total_paginas > 1) {
            if ($pagina != 1) {
               echo '<a href="' . $url . 'pagina=' . ($pagina - 1) . '"></a>';
            }
            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($pagina == $i) {
                    //si muestro el índice de la página actual, no coloco enlace
                    echo '<li class="current"> ' . $pagina . '</li>';
                } else {
                    echo '  <li><a href="' . $url . 'pagina=' . $i . '">' . $i . '</a></li>  ';
                }
            }
            if ($pagina != $total_paginas) {
                echo '<a href="' . $url . 'pagina=' . ($pagina + 1) . '"></a>';
            }
        }
        ?>
            </ul>
        </div>
      </div>
  </div>
</div>

<?php include("footer.php");?>
