<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*RESUMEN
Nombre:         upload_imagen
Tipo:           Transacción
Descripción:    Operación donde se actualiza el logo de la empresa

Dependencia:    sociosEstrategicos.php
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
session_start();
if(empty( $_SESSION ['user'])){ header('Location:login_vacante.php');}
	//Conexion a la db
	include("../clavesbd.php");

//Se inicializa la sesión, y a su vez se preparan el buffer y la conexión con la base de datos
header('Content-Type: text/html; charset=utf-8');
ob_start();

// Crea la conexión
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");

// Checa que la conexión se haya establecido correctamente
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$ide = $_GET['ide'];
$accion = $_POST['btn_submit'];
$msg;
$archivo;

//La acción cambia dependiendo si se hizo clic en Actualizar o en Eliminar
if($accion == "Actualizar"){
	//Se verifica que se haya escogido un archivo.
	if($_FILES['upload_ar']['name']){
    //Si no hay errores al subir el archivo.
    if(!$_FILES['upload_ar']['error']){
        $archivo = $_FILES['upload_ar']['name'];
        //El formato de la imagen debe de ser png o gif.
        if(pathinfo($archivo, PATHINFO_EXTENSION)=="png" || pathinfo($archivo, PATHINFO_EXTENSION)=="jpg"){
            $sql = "UPDATE logocliente SET  logo = '$archivo' WHERE id = $ide";
            //Si hay un error en la transacción.
            if(!mysqli_query($con, $sql)){  die('Error: ' . mysqli_error($con));
            //Si todo se realizó correctamente se sube el archivo al servidor.
            }else{
                move_uploaded_file($_FILES['upload_ar']['tmp_name'], '../img/logosClientes/'.$archivo);
                $msg = "La imagen ha sido cambiado";}
        }else{ $msg = "ERROR: El archivo no está en un formato válido";}
    }else{ $msg = "ERROR: No se pudo subir el archivo.";}
}else{ $msg = "ERROR: No se ha seleccionado un archivo."; }
}else if ($accion == "Eliminar"){
    $sql = "DELETE FROM logocliente WHERE id ='$ide'";
     //Se verifica si hay errores en la transacción
    if(!mysqli_query($con, $sql)){ $msg = mysqli_error($con); }else{ $msg = "Registro eliminado de la Base de Datos";}
}
	?>

	<meta charset='utf-8'>
	<script type='text/javascript'>
	alert("<?php echo $msg; ?>");
	window.location.href = '../sociosEstrategicos.php';
	</script>

<?php mysqli_close($con); ?>
