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

$consulta = "SELECT personal_sociometria.IdPersonal, personal_sociometria.IdEmpresa, personal_sociometria.Nombre, personal_sociometria.Email, resencuesta_sociometria.IdEstatus
FROM personal_sociometria
JOIN resencuesta_sociometria ON personal_sociometria.IdPersonal = resencuesta_sociometria.IdResEncuesta
where personal_sociometria.IdEmpresa = $ide AND resencuesta_sociometria.IdEstatus != 3 AND personal_sociometria.Email !='' ";
     $resultV = mysqli_query($con, $consulta);
     if (mysqli_num_rows($resultV) > 0) {
       // output data of each row
       while($rowV = mysqli_fetch_assoc($resultV)) {
         $IdPersonal = $rowV['IdPersonal'];
         $IdEmpresa = $rowV['IdEmpresa'];
         $nombre = $rowV['Nombre'];
         $Email2= $rowV['Email'];

$email_to =   $Email2; //the address to which the email will be sent
$name     =   'Matchpeople';
$email    =   'non_replay@matchpeople.com';
$subject  =   'ENCUESTA SEGURIDAD Y SALUD OCUPACIONAL';
$MESSAGE_BODY ="
					<!doctype html>
					<html>
					<head>
					<meta charset='utf-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
					<title></title>
					<link href='https://matchpeople.com/css/boilerplate.css' rel='stylesheet' type='text/css'>
					<link href='https://matchpeople.com/css/main.css' rel='stylesheet' type='text/css'>
					<link href='https://matchpeople.com/css/texto.css' rel='stylesheet' type='text/css'>
					<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
					<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css'/>
					</head>
					<style media='screen'>
						#cabezera{width: 201px; padding: 13px; text-align: center; color: #FFF;}
						.wrapper{display: flex;flex-wrap: wrap; justify-content: space-around; }
						.wrapper input{width: 98%; }
						.noventaplus{width: 98%; }
						.wrapper label{font-weight: 600; }
					  .destacado{font-weight: bold; color: darkred;}
					  input[type=password], input[type=text], input[type=email], input[type=number], textarea, select {
					  	color: #4c4c4c;
					    font-weight: 600;
					  }
					  .bgcarta{height: 270px;}
						.bgcarta img{width: 100%;}
					  p{font-size: 1.2em;}
					</style>
					<body>
					<div class='bgcarta'>
						<img src='https://matchpeople.com/img/cartainvita.png' alt=''>
					</div>
					<div id='contenido' style='padding:3em 0;'>
					  <div class='wrapper'>
					  		<div class='noventaplus'>
					        <p>
					        	Estimado <span class='destacado'>$nombre,</span>
					        </p>
					        <p>
						        En uno más de sus esfuerzos por construir un gran lugar para trabajar, retador y promotor de la mejora y bienestar de nuestros trabajadores, SCANPAINT emprende hoy la realización de una Encuesta de Opinión en Seguridad y Salud Ocupacional. La encuesta tiene la intención de fortalecer y mejorar la campaña de Seguridad y Salud en nuestra Empresa así como el de crear conciencia en la prevención en accidentes y contagios por el COVID-19, en donde tu punto de vista es un elemento valioso para desarrollar algunas de las actividades de prevención.
									</p><br>
					        <p>
										Match People, empresa de consultoría de Capital Humano procesará las encuestas y nos hará más sencilla la realización del ejercicio, su interpretación y presentación.
										Al final de este mensaje te enviaremos una liga para que accedas a la encuesta en la plataforma de Match People a fin de que compartas tu opinión.<br>
										Con la finalidad de procesar oportunamente la información, te pedimos que respondas antes del <span style='color:darkred; font-weight: bold;'>31 de Julio 2021</span>.
					        </p><br>
									<p>
					        	<span style='font-weight: bold;'> Para acceder al sistema, continúa con las siguientes instrucciones:</span>
					        </p>
					        <ol>
					          <li>Da clic en la siguiente liga: <a href='http://demo.matchpeople.com/estudio_sociometria.php?id=$IdEmpresa:$IdPersonal' target='_blank' ><strong>Ir a encuesta</strong> </a></li>
					          <li>Enseguida aparecerá un mensaje de bienvenida y las instrucciones para completar el cuestionario que te han sido asignado.</li>
					          <li>Al terminar la evaluación, oprime el botón <strong>TERMINAR Y ENVIAR</strong> para concluir la evaluación.</li>
					        </ol>
					        <p>
					        	Si por alguna razón necesitas interrumpir la evaluación, puedes oprimir el botón <strong>GUARDAR</strong> para salvar temporalmente la información y continuar en una próxima sesión. <br>
										<strong>Sin embargo, toma en cuenta que el sistema no la registrará como terminada hasta que envíes el cuestionario.</strong>
					        </p>
					        <p>
						        Si tienes alguna duda respecto a este proceso, contacta vía correo a: <a href='mailto:ema@matchpeople.com' target='_blank'>ema@matchpeople.com</a><br>
						        Quedamos atentos.
					        </p>
					  		</div>
					    </div>
					</div>
					</body>
					</html>
					";
$message  = utf8_decode($MESSAGE_BODY);
$headers  = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset='UTF-8'\n";
if(mail($email_to, $subject, $message, $headers)){
		echo 'sent'; // we are sending this text to the ajax request telling it that the mail is sent..
}else{
		echo 'failed';// ... or this one to tell it that it wasn't sent
}
	}}?>
	<!doctype html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Matchpeople - Intranet Estudio de sociometría</title>
	<style media="screen">
	#customers td, #customers th { border: 1px solid #dddddd; text-align: left; padding: 8px;}
	.adon {border-radius: 4px; text-decoration: none; padding: 5px; font-size: 14px; color: #FFF;}
	</style>
	<?php include("header.php");?>
	<div id="contenido">
		<?php include("menus/menu_vacantes.php");?>
		<div class="titulosec" style="width: 95%;">
			Listado de participantes
			<div class="alinearderecha ">
				<a href="sendEncuestaSociometria.php?id=1" class="btn5 ">Enviar Recordatorio</a>
				<a href="papeleria_sociometria.php" class="btn5 ">Papelería</a>
			</div>
		</div>
		<table style="width:95%; margin:0 auto;" id="customers">
			<tr>
				<th>Nomina</th>
				<th>Nombre</th>
				<th>Puesto</th>
				<th>Departamento</th>
				<th>Planta</th>
				<th>Estatus</th>
				<th>acciones</th>
			</tr>
		<?php $consulta = "SELECT personal_sociometria.IdPersonal, personal_sociometria.IdEmpresa, personal_sociometria.NumNomina,personal_sociometria.Nombre,
		 personal_sociometria.Departamento, personal_sociometria.Puesto, personal_sociometria.Planta, personal_sociometria.Email, resencuesta_sociometria.IdEstatus
		FROM personal_sociometria
		 JOIN resencuesta_sociometria ON personal_sociometria.IdPersonal = resencuesta_sociometria.IdResEncuesta
		where personal_sociometria.IdEmpresa = $ide";

			 $resultV = mysqli_query($con, $consulta);
			 if (mysqli_num_rows($resultV) > 0) {
				 // output data of each row
				 while($rowV = mysqli_fetch_assoc($resultV)) {
					 $IdPersonal = $rowV['IdPersonal'];
					 $IdEmpresa = $rowV['IdEmpresa'];
					 $NumNomina = $rowV['NumNomina'];
					 $Nombre = $rowV['Nombre'];
					 $Departamento = $rowV['Departamento'];
					 $Puesto = $rowV['Puesto'];
					 $Planta = $rowV['Planta'];
					 $Email= $rowV['Email'];
					 $IdEstatus = $rowV['IdEstatus'];
		?>
		<tr>
			<td><label><?php echo "$NumNomina";?></label></td>
			<td><label><?php echo "$Nombre";?></label></td>
			<td><label><?php echo "$Puesto";?></label></td>
			<td><label><?php echo "$Departamento";?></label></td>
			<td><label><?php echo "$Planta";?></label></td>
			<td><label><?php switch ($IdEstatus) {
						case 1:
								echo "Sin responder";
								break;
						case 2:
								echo "En progresso";
								break;
						case 3:
								echo "Terminada";
								break;}?>
			</label></td>
			<td>
				<form action="editar_Personal.php?id=<?php echo "$IdPersonal";?>" enctype="multipart/form-data" method="post" onSubmit="return validacion();">
					<a class="btn2 adon" href="estudio_sociometria.php?id=<?php echo "$IdEmpresa:$IdPersonal";?>" target="_blank"> Ver encuesta</a>
					<input type='submit' class='btn2' name='btn_submit' value='Editar'>
					<input type='submit' class='btn3' name='btn_submit' value='Eliminar'>
				</form>
			</td>
		</tr>
	<?php }	} else { echo "<h3 style='text-align: center;'>No Hay Resultados</h3>"; } mysqli_close($con);?>
	</table>
	</div>
	<?php
	include ("footer.php");
?>
