<?php
		// Crea la conexión
		include("clavesbd.php");
		//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
		ob_start();

		// Crea la conexión
		$con = mysqli_connect($servername, $username, $password, $dbname);
		mysqli_set_charset($con,"utf8");

		// Checa que la conexión se haya establecido correctamente
		if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$ide = $_GET['id'];

		//Se obtiene la información de todas las vacantes en base de datos.
	 	$consulta = mysqli_query($con,"SELECT * FROM listavacantes WHERE id = $ide;");
		if (mysqli_num_rows($consulta) > 0) {

		 $row = mysqli_fetch_assoc($consulta);

		$vacante = $row['vacante'];
		$img =  $row['img'];
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
<meta property="og:description"  content=" resultados de vacante" />
<meta name="keywords" content="headhunting,reclutamiento " />
<meta property="og:url"   content="http://www.matchpeople.com.mx/vacante.php?id=<?php echo "$ide" ?>" />
<meta property="og:type"  content="website" />
<meta property="og:title" content="Vacante: <?php echo $vacante ?>" />
<meta property="og:image" content="http://www.matchpeople.com.mx/img/imgVacantes/<?php echo $img ?>" />
<title>Match People - Resultados Vacante:<?php echo $vacante ?></title>
<?php include("header.php");?>
<div id="contenido">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<?php
		  echo"
		    <div class='titulosec'>
			<span class=''>Vacante Activa: ". $row['vacante'] . "</span>
			<div class='alinearderecha'>
				<a href='http://www.matchpeople.com.mx/recomiendaunamigo/index.php' target='new' class='btn5'>recomienda un amigo</a>
				<a href='form_enviar_CV.php' class='btn5'>Mandar C.V.</a>
			</div>
			</div>
		    <div class='ochenta centar' style='display:flex'>
				<div class='col-vacante1'>
					<div class='h2 borderdown gap3'>
			 			Datos Generales
			 		</div>
			 		<div class='gap3 inline-block'>
						<span class='bold'>Fecha de Publicación: </span>
						". $row['fecha'] . "</br>
						<span class='bold'>Ubicación: </span></br>
			    		". $row['ciudad'] ."</br>
						<span class='bold'>Giro de la empresa: </span></br>
			    		" .$row['GiroEmpresa'] ."</br>
						<span class='bold'>Área: </span></br>
			    		" .$row['area_funcion'] ."</br>
						<span class='bold'>Carreras afines: </span></br>
			 			". $row['afinidad'] ."</br>
						<span class='bold'>Disponibilidad de viaje: </span>
			 			" .$row['disponibilidad_viaje'] ."</br>
						<span class='bold'>Cambio de residencia: </span>
			 			" .$row['residencia'] ."</br>
						<span class='bold'>Nivel Académico: </span>
			 			" .$row['Perfil_Academico'] ."</br>
						<span class='bold'>Años de experiencia: </span>
			 			" .$row['experiencia_profecional'] ."</br>
			 			<span class='bold'>Dominio de idioma: </span>
			 			" .$row['ingles'] ."
			 		</div>
				</div>
				<div class='col-vacante2'>
					<div class='h2 borderdown gap3'>
						Descripción
			 		</div>
			 		<div class='gap3'>
			 			" . $row['descripcion'] . "
			 		</div>
			 		<div class='h2 borderdown gap3'>
			 			Competencias
			 		</div>
			 		<div class='gap3'>
			 			" . $row['competencias'] . "
			 		</div>
				</div>
         	</div>
		<div class='centar bordertop'>
		<div class='fb-like' data-href='http://www.matchpeople.com.mx/vacante.php?id=$ide' data-layout='button_count' data-action='recommend' data-show-faces='true' data-share='true'></div>
		<div style='padding-top:2px'>
		<script src='//platform.linkedin.com/in.js' type='text/javascript'> lang: en_US</script>
		<script type='IN/Share' data-url='http://www.matchpeople.com.mx/vacante.php?id=$ide' data-counter='right'></script>
		</div>
		</div>
	";}
	?>
</div>
<?php include ("footer.php");?>
