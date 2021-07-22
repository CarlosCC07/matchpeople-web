<?php
//Conexion a la db
include("../clavesbd.php");
//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
header('Content-Type: text/html; charset=utf-8');
ob_start();

// Crea la conexión
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");

// Checa que la conexión se haya establecido correctamente
if (mysqli_connect_errno()) {echo "Failed to connect to MySQL: " . mysqli_connect_error();}

//Se recupera la información de los cuadros de texto en empresas_glb
$ide = $_GET['id'];
$vacante = $_POST['e_vacante'];
$ciudad =  $_POST['e_ciudad'];
$GiroEmpresa = $_POST['e_GiroEmpresa'];
$area_funcion =  $_POST['e_area_funcion'];
$descripcion =  $_POST['e_descripcion'];
$des_corta = $_POST['e_des_corta'];
$fecha =  date("d-m-Y");
$afinidad = $_POST['e_afinidad'];
$Perfil_Academico = $_POST['e_Perfil_Academico'];
$experiencia_profecional =  $_POST['e_experiencia_profecional'];
$edad = $_POST['e_edad'];
$genero = $_POST['e_genero'];
$competencias = $_POST['e_competencias'];
$disponibilidad_viaje = $_POST['e_disponibilidad_viaje'];
$Nombre_empresa = $_POST['e_Nombre_empresa'];
$idoma = $_POST['e_ingles'];
$residencia =  $_POST['e_residencia'];
$accion = $_POST['btn_submit'];

//La acción cambia dependiendo del boton
if  ($accion == "Papelería"){
  $uno = 1;
  $sqlD = "UPDATE listavacantes SET papeleria = '$uno' WHERE id = $ide";
  if(!mysqli_query($con, $sqlD)){ die("Error: " . mysqli_error($con));}
  else{ $msg = "La vacante se envio a la papelería ";}
}else if($accion == "Actualizar / Publicar"){
  $estatusId= 1;
    $sql = "UPDATE listavacantes
            SET vacante = '$vacante',
                ciudad = '$ciudad',
        				GiroEmpresa = '$GiroEmpresa',
        				area_funcion ='$area_funcion',
                descripcion = '$descripcion',
        				des_corta ='$des_corta',
                fecha = '$fecha',
        				afinidad = '$afinidad',
                Perfil_Academico = '$Perfil_Academico',
                experiencia_profecional = '$experiencia_profecional',
        				edad = '$edad',
                genero = '$genero',
                competencias = '$competencias',
        				disponibilidad_viaje = '$disponibilidad_viaje',
                Nombre_empresa = '$Nombre_empresa',
                ingles = '$idoma',
        				vacante = '$vacante',
                residencia = '$residencia',
                estatusId = '$estatusId'
            WHERE id = $ide";

    //Se verifica si hay errores en la transacción
    if(!mysqli_query($con, $sql)){ die('Error: ' . mysqli_error($con)); }else{ $msg = "Información actualizada y publicada";}
}else{
  $estatusId =2;
  $sql = "UPDATE listavacantes
          SET vacante = '$vacante',
              ciudad = '$ciudad',
              GiroEmpresa = '$GiroEmpresa',
              area_funcion ='$area_funcion',
              descripcion = '$descripcion',
              des_corta ='$des_corta',
              fecha = '$fecha',
              afinidad = '$afinidad',
              Perfil_Academico = '$Perfil_Academico',
              experiencia_profecional = '$experiencia_profecional',
              edad = '$edad',
              genero = '$genero',
              competencias = '$competencias',
              disponibilidad_viaje = '$disponibilidad_viaje',
              Nombre_empresa = '$Nombre_empresa',
              ingles = '$idoma',
              vacante = '$vacante',
              residencia = '$residencia',
              estatusId = '$estatusId'
          WHERE id = $ide";
          //Se verifica si hay errores en la transacción
          if(!mysqli_query($con, $sql)){ die('Error: ' . mysqli_error($con)); }else{ $msg = "Información actualizada y guardado como borrador";}
}
?>

	<meta charset='utf-8'>
	<script type='text/javascript'>
	alert("<?php echo $msg; ?>");
	window.location.href = '../paneldecontrol.php';
	</script>

<?php mysqli_close($con); ?>
