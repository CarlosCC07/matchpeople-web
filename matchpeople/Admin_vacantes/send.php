<?php
  session_start();
  if(empty( $_SESSION ['user'])){ header('Location:login_vacante.php');}

  //Conexion a la db
  include("../clavesbd.php");

  $con = mysqli_connect($servername, $username, $password, $dbname);
  if ($con->connect_error) { die("Connection failed: " . $con->connect_error);}

  $accion = $_POST['btn_submit'];
  if($accion == "Publicar"){ $estatusId= 1;}
  else if ($accion == "Guardar como borrador"){ $estatusId =2;}
  $autor = $_SESSION["user"];
  $imagen = "dafault.jpg";
  $papeleria ="0";

	$sql = "INSERT INTO listavacantes (
    autor,vacante,ciudad,
  	GiroEmpresa,descripcion,
  	fecha,afinidad,Perfil_Academico,
    experiencia_profecional,edad,
  	genero,competencias,
  	disponibilidad_viaje,Nombre_empresa,
  	ingles,residencia,
  	img, des_corta, area_funcion,
    estatusId,papeleria
  	) VALUES (
      '$autor',
  		'".$_POST['vacante']."',
  		'".$_POST['ciudad']."',
  		'".$_POST['GiroEmpresa']."',
  		'".$_POST['descripcion']."',
  		CURRENT_DATE,
  		'".$_POST['afinidad']."',
  		'".$_POST['Perfil_Academico']."',
  		'".$_POST['experiencia_profecional']."',
  		'".$_POST['edad']."',
  		'".$_POST['genero']."',
  		'".$_POST['competencias']."',
  		'".$_POST['disponibilidad_viaje']."',
  		'".$_POST['Nombre_empresa']."',
  		'".$_POST['ingles']."',
  		'".$_POST['residencia']."',
  		'$imagen',
  		'".$_POST['des_corta']."',
  		'".$_POST['area_funcion']."',
      '$estatusId','$papeleria'
  		)";

    if ($con->query($sql) === TRUE) { echo "New record created successfully";}
    else {  echo "Error: " . $sql . "<br>" . $con->error;}
    $con->close();
     header('Location:../paneldecontrol.php')
 ?>
