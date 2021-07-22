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
<meta name="keywords" content="consultoría, clima organizacional, compensacion salarial, coba, reclutamiento, capital humano, seleccion, estudios nicho, estudios de pilotos, sennsing, desarrollo humano, " />
<title>Match People consultoría de recursos humanos en Monterrey</title>
<link rel="alternate" hreflang="es-mx" href="http://www.matchpeople.com/inico.php" />
<link rel="alternate" hreflang="en-us" href="http://www.matchpeople.com/english_site/inicio.php" />
<?php include("header.php");?>
<div id="contenido">
<?php
include("clavesbd.php");
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");
// Check connection
if (!$con) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "SELECT file, nomencuesta, imagen, alt, fecha FROM encuesta where idiomaId = 1 AND estatusId = 1 order by id desc limit 1";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
  $file = $row['file'];
  $TituloEncuesta =  $row['nomencuesta'];
  $img =  $row['imagen'];
  $alt =  $row['alt'];
?>

  <style>
  #linkCovid a { text-decoration: none; color:rgba(92,92, 92 );}
  #linkCovid a:hover{ color:rgba(92, 92, 92);}
  .Box_encuesta { display: none;}
  .opacidad{ width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.50); border-radius: 8px; padding: 20px 0; }
  .pc3{font-size:1em; color:rgba(255, 253, 253, 0.90);}
  .pc1{font-size:2em;}
  .pc2{font-size:1em;}

  @media (min-width: 380px) {
    .Box_encuesta {
        background-image: url("img/encuestas/<?php echo"$img"; ?>");
        background-color: #424242;
        border-radius: 8px;
        display: block;
        width: 80%;
        text-align: center;
        color: #FFFFFF;
        z-index: 2;
        margin: 4% 4%;
    }
  }
  @media (min-width: 768px) {
    .Box_encuesta {
        background-image: url("img/encuestas/<?php echo"$img"; ?>");
        background-color: #424242;
        background-size: cover;
        border-radius: 8px;
        display: block;
        width: 35%;
        text-align: center;
        color: #FFFFFF;
        z-index: 2;
        margin: 4% 4%;
    }
    .pc3{font-size:1.2em; color:rgba(255, 253, 253, 0.90);}
    .pc1{font-size:3.5em;}
    .pc2{font-size:1.2em;}
    #linkCovid a { text-decoration: none; color: #5C5C5C;  padding-left: 15px;}
    #linkCovid a:hover{ text-decoration: none; color: #5C5C5C;}
  }
  </style>
 <div class="Box_encuesta positionAbsolute">
   <div class="opacidad">
     <h1>
       <span style="font-size: 21px; text-transform: uppercase;"><?php echo"$TituloEncuesta"; ?></span>
    </h1>
     <p  class="pc2" >Conoce los resultados actualizados de nuestra encuesta</p>
     <br>
     <a class="btn5 setenta " href="<?php echo"$file.php"; ?>" hreflang="es-mx" target="_blank">leer mas</a>
     <br> <br>
   </div>
 </div>
<?php } } else { };  ?>

  <!--Carrusel ei-slider -->
  <div id="ei-slider" class="ei-slider" >
    <?php
    include("clavesbd.php");
    $con = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($con,"utf8");
    // Check connection
    if (!$con) { die("Connection failed: " . mysqli_connect_error()); }

    $sql = "SELECT file, nomencuesta, imagen, alt, fecha FROM encuesta where idiomaId = 1 AND estatusId = 1 order by id desc limit 1";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $file = $row['file'];
      $TituloEncuesta =  $row['nomencuesta'];
      $img =  $row['imagen'];
      $alt =  $row['alt'];
    ?>
    <!-- ei-slider-large -->
    <ul class="ei-slider-large">
      <li> <img src="img/encuestas/<?php echo"$img"; ?>" alt="<?php echo"$alt"; ?>" />
        <div class="ei-title" id="linkCovid">
          <h2><a href="<?php echo"$file.php"; ?>"><?php echo"$TituloEncuesta"; ?></a></h2>
        </div>
      </li>
      <?php } } else { echo "0 results";};  ?>

      <li> <img src="img/large/3.jpg" alt="image03"/>
        <div class="ei-title">
          <h2>Creo en los sueños de mi equipo.</h2>
        </div>
      </li>
      <li> <img src="img/large/4.jpg"/>
        <div class="ei-title">
          <h2>Creo en la oportunidad y en la buena noticia.</h2>
        </div>
      </li>
    </ul>
    <!-- ei-slider-large -->
    <ul class="ei-slider-thumbs">
      <!-- ei-slider-thumbs -->
      <li class="ei-slider-element">Current</li>
      <li></li>
      <li></li>
      <li></li>
      <!-- ei-slider-thumbs -->
    </ul>
  </div>
  <!--servicos-nav -->
  <?php include("menus/servicios_principales.php");?>
  <!-- fin de servicios-nav -->

  <!--carrusel de estudios-->
  <div id="ca-container" class="ca-container">
    <div class="ca-wrapper">
      <div class="ca-item ca-item-4">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h3>Sociometría</h3>
          <h4>
            Método para medir o conocer la estructura interrelacional
            de un grupo, del individuo con sus grupos de pertenencia y de las relaciones entre grupos.
          </h4>
          <a href="https://sociometria.matchpeople.com/sociometria/" hreflang="es-mx" target="_blank" class="ca-more2">más info.</a> </div>
      </div>
      <div class="ca-item ca-item-2">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h3>Monterrey 100</h3>
          <h4>
          Estudio de Salarios y Prestaciones laborales de puestos operativos (sindicalizados, técnicos y no sindicalizados).
          </h4>
          <a href="mtycien.php" target="_self" hreflang="es-mx" class="ca-more2">más info.</a> </div>
      </div>
      <div class="ca-item ca-item-3">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h3>Clima Organizacional</h3>
          <h4>
          Mide de manera efectiva las expectativas generadas, así como las motivaciones organizacionales claves en la empresa.
          </h4>
          <a href="clima.php" hreflang="es-mx" target="_self" class="ca-more2">más info.</a> </div>
      </div>
    </div>
  </div>

  <!--carrusel secundario solo para movil-->
  <div class="estudissecundarios" id="estudissecundarios"> <a class="displayEstudios">Estudios Matchpeople</a>
    <ul class="estudios-movil-ul">
      <li>
        <div>
          <h3>Sociometría</h3>
          <div class="boxEstudios">
            <span class="ca-content-img"><img src="img/sociometria.png" alt="sociometria"/></span>
            <h4>
              Método para medir o conocer la estructura interrelacional de un grupo, del individuo con sus grupos de pertenencia y de las relaciones entre grupos.
            </h4>
          </div>
          <a href="https://sociometria.matchpeople.com/sociometria/" target="_self" hreflang="es-mx" class="ca-more2">Ver estudio</a> </div>
      </li>
      <li>
        <div>
          <h3>Monterrey 100</h3>
          <div class="boxEstudios">
            <span class="ca-content-img"><img src="img/Mty100.png"  alt="monterrey 100 estudio"/></span>
            <h4>
              Ofrece a tu empresa un Diagnóstico con elementos precisos, confiables y oportunos para la toma de decisiones en Personal Operativo.
            </h4>
          </div>
          <a href="mtycien.php" target="_self" hreflang="es-mx" class="ca-more2">Ver estudio</a> </div>
      </li>
      <li>
        <div>
          <h3>Clima Organizacional</h3>
          <div class="boxEstudios">
            <span class="ca-content-img"><img src="img/climaorg.png" alt="clima organizacional"/></span>
            <h4>
              Mide de manera efectiva las expectativas generadas, así como las motivaciones organizacionales claves en la empresa.
            </h4>
          </div>
          <a href="clima.php" target="_self" hreflang="es-mx" class="ca-more2">Ir a sitio</a> </div>
      </li>
    </ul>
  </div>

</div>
<?php include("footer.php");?>
