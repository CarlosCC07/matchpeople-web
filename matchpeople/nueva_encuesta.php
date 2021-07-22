<?php
session_start();
if(empty( $_SESSION ['user'])){
	header('Location:login_vacante.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Matchpeople - Nueva Encuesta</title>
<?php include("header.php");?>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
<div class="titulosec" >
  Nueva Encuesta de Interes
</div>

<form action="Admin_vacantes/saveSurvay.php" enctype="multipart/form-data" class="box" method="post" onSubmit="return validacion();">
  <div class="gap3 cincuenta100">
	  <span class='bold'>Título</span><br>
		<input type="text" name="nomencuesta" id="vacante" required >
  </div>
  <div class="gap3 cincuenta100">
     <span class='bold'>Descripción Corta</span><br>
    <input name="balaso" type="text" required placeholder="Breve descripción de la vacante no mayor a 200 caracteres" maxlength="200" >
  </div>
  <div class="gap3 cincuenta100">
  	<span class='bold'>Descripción</span><br>
  		<textarea name="descripcion" id="descripcion" required maxlength="400"></textarea>
  </div>

  <div class="gap3 cincuenta100">
    <span class='bold'>Idioma</span><br>
    <select id="GiroEmpresa" name="idiomaId">
			<?php
				//Conexion a la db
				include("clavesbd.php");
				// Crea la conexión
				$con = mysqli_connect($servername, $username, $password, $dbname);
				mysqli_set_charset($con,"utf8");
				// Checa que la conexión se haya establecido correctamente
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$sql = "SELECT idiomaId, idioma FROM idioma";
						 $result = mysqli_query($con, $sql);
						 if (mysqli_num_rows($result) > 0) {
							 // output data of each row
							 while($row = mysqli_fetch_assoc($result)) {
								 $idiomaId= $row['idiomaId'];
								 $idioma = $row['idioma'];
			?>
      <option value="<?php echo "$idiomaId";?>"><?php echo "$idioma";?></option>
      <?php	}	} else { echo "<h3>No Hay Resultados</h3>"; } ?>
    </select>
  </div>

  <div class="gap3 cincuenta100">
    <span class='bold'>Articulo destacado</span><br>
    <select id="area_funcion" name="Encuesta_destacada">
		<?php
			$sqlD = "SELECT destacadoId, texto FROM destacado ORDER BY destacadoId DESC";
					 $resultD = mysqli_query($con, $sqlD);
					 if (mysqli_num_rows($resultD) > 0) {
						 // output data of each row
						 while($rowD = mysqli_fetch_assoc($resultD)) {
							 $destacadoId= $rowD['destacadoId'];
							 $texto= $rowD['texto'];
		?>
			<option value="<?php echo "$destacadoId";?>"><?php echo "$texto";?></option>
	 <?php	}	} else { echo "<h3>No Hay Resultados</h3>"; } mysqli_close($con); ?>
    </select>
  </div>

  <div class="gap3 cincuenta100">
    <span class='bold'>Alt de imagen</span><br>
    <input type="text" name="alt" id="experiencia_profecional"  maxlength="200"  placeholder="descripcion de la imagen" >
  </div>
	<div class="gap3 cincuenta100">
		<span class='bold'>Imagen</span><br>
		<input type="file" accept="image/x-png,image/jpeg" text="Imagen" name="imagen">
	</div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Presentacion PDF</span><br>
    <input type="file" accept="application/pdf" text="Archivo" name="documento">
  </div>
  <div class="gap3 cincuenta100">
	  <span class='bold'>Keywords</span><br>
	  <textarea name="Keywords" id="competencias" required placeholder="Liderazgo, Trabajo en equipo,"></textarea>
  </div>
  <input type="submit" class="btn_Enviar btn-default" name='btn_submit' value="Publicar">
	<input type="submit" class="btnborrador btn-default" name='btn_submit' value="Guardar como borrador">
</form>
</div>
<?php include ("footer.php");?>
