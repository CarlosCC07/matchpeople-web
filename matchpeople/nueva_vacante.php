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
<title>Matchpeople - admin nueva vacante</title>
<?php include("header.php");?>
<div id="contenido">
<?php include("menus/menu_vacantes.php");?>
<div class="titulosec">Nueva Vacante</div>

<form action="Admin_vacantes/send.php" enctype="multipart/form-data" class="box" method="post" onSubmit="return validacion();">
  <div class="gap3 cincuenta100">
    <span class='bold'>Título</span><br>
		<input type="text" name="vacante" id="vacante" required >
  </div>
	<div class="gap3 cincuenta100">
	   <span class='bold'>Descripción Corta</span><br>
	   <input name="des_corta" type="text" placeholder="Breve descripción de la vacante no mayor a 200 caracteres" maxlength="200" >
	 </div>
	<div style="display: inline-block; width: 100%;">
	  <div class="gap3 cincuenta100">
	  	<span class='bold'>Descripción</span><br>
	  	<textarea name="descripcion" id="descripcion" ></textarea>
	  </div>
		<div class="gap3 cincuenta100">
	  	<span class='bold'>Competencias</span><br>
	  	<textarea name="competencias" id="competencias" required placeholder="Liderazgo. Trabajo en equipo."></textarea>
	  </div>
	</div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Ciudad</span><br>
    <input type="text" name="ciudad" id="ciudad" required placeholder="Monterrey" >
  </div>

  <div class="gap3 cincuenta100">
    <span class='bold'>Nombre de la Empresa</span><br>
    <input type="text" name="Nombre_empresa" placeholder="Empresa">
  </div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Giro de la Empresa</span><br>
    <select id="GiroEmpresa" name="GiroEmpresa">
			<?php
			include("clavesbd.php");
			// Crea la conexión
			$con = mysqli_connect($servername, $username, $password, $dbname);
			mysqli_set_charset($con,"utf8");
			// Checa que la conexión se haya establecido correctamente
			if (mysqli_connect_errno()) {	echo "Failed to connect to MySQL: " . mysqli_connect_error();	}

			$sql = "SELECT * FROM giro ORDER BY texto ";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($rowG = mysqli_fetch_assoc($result)) {
				$textoG= $rowG['texto'];
				echo"<option value='$textoG' "; if( "-" == $textoG ) { echo"selected";} echo ">". $textoG ."</option>";
				}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
		</select>
  </div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Área / función</span><br>
    <select id="area_funcion" name="area_funcion">
			<?php
			$sql = "SELECT * FROM area ORDER BY texto ";
			$result = mysqli_query($con , $sql);
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($rowG = mysqli_fetch_assoc($result)) {
				$textoG= $rowG['texto'];
				echo"<option value='$textoG' "; if( "-" == $textoG ) { echo"selected";} echo ">". $textoG ."</option>";
			}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
    </select>
  </div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Carreras afines</span><br>
    <input type="text" name="afinidad" id="afinidad" placeholder="Ing. Civil, Ing Biomedico">
  </div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Nivel académico</span><br>
    <select id="Perfil_Academico" name="Perfil_Academico">
			<?php
			$sql = "SELECT * FROM academico ORDER BY texto";
			$result = mysqli_query($con , $sql);
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($rowG = mysqli_fetch_assoc($result)) {
				$textoG= $rowG['texto'];
				echo"<option value='$textoG' "; if( "-" == $textoG ) { echo"selected";} echo ">". $textoG ."</option>";
			}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
    </select>
  </div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Años de experiencia</span><br>
    <input type="text" name="experiencia_profecional" id="experiencia_profecional" required placeholder="26 - 30 años" >
  </div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Edad</span><br>
    <input type="text" name="edad" id="edad" placeholder="26 - 30 años" >
  </div>
	<div class="gap3 cincuenta100">
    <span class='bold'>Género</span><br>
    <select id="genero" name="genero">
			<?php
			$sql = "SELECT * FROM genero ORDER BY texto";
				$result = mysqli_query($con , $sql);
				if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($rowG = mysqli_fetch_assoc($result)) {
					$textoG= $rowG['texto'];
					echo"<option value='$textoG' "; if( "-" == $textoG ) { echo"selected";} echo ">". $textoG ."</option>";
				}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
    </select>
  </div>
  <div class="gap3 cincuenta100">
    <span class='bold'>Disponibilidad de viaje</span><br>
    <select id="disponibilidad_viaje" name="disponibilidad_viaje">
			<?php
			$sql = "SELECT * FROM si_no ORDER BY id DESC";
			$result = mysqli_query($con , $sql);
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($rowG = mysqli_fetch_assoc($result)) {
				$textoG= $rowG['texto'];
				echo"<option value='$textoG' "; if( "-" == $textoG ) { echo"selected";} echo ">". $textoG ."</option>";
			}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
    </select>
  </div>
	<div style="display: inline-block; width: 100%;">
	  <div class="gap3 cincuenta100">
	    <span class='bold'>Cambio de residencia</span><br>
	    <select id="residencia" name="residencia">
				<?php
				$sql = "SELECT * FROM si_no ORDER BY id DESC";
				$result = mysqli_query($con , $sql);
				if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($rowG = mysqli_fetch_assoc($result)) {
					$textoG= $rowG['texto'];
					echo"<option value='$textoG' "; if( "-" == $textoG ) { echo"selected";} echo ">". $textoG ."</option>";
				}} else { echo "<h3>No Hay Resultados</h3>"; } ?>
	    </select>
	  </div>
	  <div class="gap3 cincuenta100">
	     <span class='bold'>Dominio de idioma</span><br>
	     <input type="text" name="ingles" id="ingles" required  placeholder="Ingles: Avanzado, Aleman: Intermedio">
	  </div>
	</div>
	<input type="submit" class="btn_Enviar btn-default" name='btn_submit' value="Publicar">
	<input type="submit" class="btnborrador btn-default" name='btn_submit' value="Guardar como borrador">
</form>
</div>
<?php include ("footer.php");?>
