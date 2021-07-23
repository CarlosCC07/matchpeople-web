<?php
session_start();
if(empty( $_SESSION ['user'])){ header('Location:login_vacante.php');}

	//Conexion a la db
	include("clavesbd.php");
	$con = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");
	// Checa que la conexión se haya establecido correctamente
	if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error();}

//declaramos sessiones
$ide = $_GET['id'];
$ClaveTiempo = $_SESSION["ClaveTiempo"];
$IdEstatus = 1;
$IdEncuesta = 1;
$hoy = getdate();
if(isset($_POST['import_data'])){
    // validate to check uploaded file is a valid csv file
 $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
      if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
          $csv_file = fopen($_FILES['file']['tmp_name'], 'r');
          //fgetcsv($csv_file);
          // get data records from csv file
            while(($emp_record = fgetcsv($csv_file)) !== FALSE){
            // Check if employee already exists with same ID
            $sql_query = "SELECT IdPersonal, Nombre, Puesto, IdEmpresa  FROM personal_sociometria WHERE NumNomina = '".$emp_record[1]."'";
            $resultset = mysqli_query($con, $sql_query) or die("database error:". mysqli_error($con));
            // if employee already exist then update details otherwise insert new record
            if(mysqli_num_rows($resultset)) {
              $sql_update = "UPDATE personal_sociometria set
              Nombre ='".utf8_decode ($emp_record[2])."',
              FechaIngreso ='".utf8_decode ($emp_record[3])."',
              Departamento ='".utf8_decode ($emp_record[4])."',
              Clave ='".utf8_decode ($emp_record[5])."',
              Puesto ='".utf8_decode ($emp_record[6])."',
              Planta ='".utf8_decode ($emp_record[7])."',
              Segmento ='".utf8_decode ($emp_record[8])."',
              Turno ='".utf8_decode ($emp_record[9])."',
              FechaNacimiento ='".utf8_decode ($emp_record[10])."',
              Grupo ='".utf8_decode ($emp_record[11])."',
              Email ='".utf8_decode ($emp_record[12])."'
              WHERE NumNomina = '".$emp_record[1]."'";
              mysqli_query($con, $sql_update) or die("database error:". mysqli_error($con));
            } else{
              $mysql_insert = "INSERT INTO personal_sociometria
              (IdEmpresa, NumNomina,
              Nombre, FechaIngreso,
              Departamento, Clave,
              Puesto, Planta,
              Segmento, Turno,
              FechaNacimiento, Grupo,
              Email, Contraseña,
              ClaveTiempo)
              VALUES
              ( '$ide'
                '".utf8_decode($emp_record[1])."',
                '".utf8_decode($emp_record[2])."',
                '".utf8_decode($emp_record[3])."',
                '".utf8_decode($emp_record[4])."',
                '".utf8_decode($emp_record[5])."',
                '".utf8_decode($emp_record[6])."',
                '".utf8_decode($emp_record[7])."',
                '".utf8_decode($emp_record[8])."',
                '".utf8_decode($emp_record[9])."',
                '".utf8_decode($emp_record[10])."',
                '".utf8_decode($emp_record[11])."',
                '".utf8_decode($emp_record[12])."',
                '$ClaveTiempo')";

                $mysql_insert = "INSERT INTO resencuesta_sociometria
                (IdEmpresa, IdPersonal,
                IdEncuesta, IdEstatus ,
                Fecha, NumNomina,
                Nombre, Departamento)
                VALUES
                ( '$ide'
                  '$IdPersonal',
                  '$IdEncuesta',
                  '$IdEstatus',
                  '$hoy',
                  '".utf8_decode($emp_record[1])."',
                  '".utf8_decode($emp_record[2])."',
                  '".utf8_decode($emp_record[4])."')";
              mysqli_query($con, $mysql_insert) or die("database error:". mysqli_error($con));
            }
          }
    fclose($csv_file);
    $import_status = '?import_status=success';
    } else { $import_status = '?import_status=error';}
    } else { $import_status = '?import_status=invalid_file';}
  }else{
    // Limpiamos bd de flujos
    //$sql="TRUNCATE TABLE flujos";
    $sql="DELETE from personal_sociometria WHERE ClaveTiempo = $ClaveTiempo";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
  }
  header("Location:editar_empresa.php?id=$ide".$import_status);
  ?>
