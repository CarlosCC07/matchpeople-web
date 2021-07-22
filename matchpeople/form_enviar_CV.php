<?php include("header.php");?>
<div id="contenido">
<div class='titulosec'>
 <span class=''>Enviar C.V.</span>
</div>

  <div class="box">
    <form action="Admin_vacantes/enviar_CV.php" method="post" id="box" enctype="multipart/form-data">
      <div class='col-vacante1'>
        <ul>
          <li>
            <label class='bold'>Nombre Completo</label>
          </li>
          <li>
            <input type="text" id="nombre" name="nombre" class="cien" placeholder="Carlos Alfredo">
          </li>
          <li>
            <label class='bold'>Teléfono de contacto </label>
          </li>
          <li>
            <input type="text" id="celular" name="celular" class="cien" placeholder="83891500">
          </li>
          <li>
            <label class='bold'>Email </label>
          </li>
          <li>
            <input type="text" id="email" name="email" class="cien" placeholder="correo@matchpeople.com">
          </li>
          <li>
            <label class='bold'>Interesado en:</label>
          </li>
          <li>
          	<select class="required cien" name="vacante" id="vacante" >
        	<?php

        //Conexion a la db
        include("clavesbd.php");
				// Create connection
				$con = mysqli_connect($servername, $username, $password, $dbname);
				mysqli_set_charset($con,"utf8");
				// Check connection
				if (!$con) {
    				die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT vacante FROM listavacantes";
				$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {
  		 		echo "
   				<option value='". $row["vacante"]."'>". $row["vacante"]. "</option>";
    			}
				} else {
   		 			echo "0 results";
				}
				mysqli_close($con);
			?>
            </select>
          </li>
        </ul>
      </div>
      <div class='col-vacante2'>
        <ul>
          <li>
            <label class='bold'>Subir C.V.</label>
          </li>
          <li>
            <input name="archivo1" type="file" class="cien">
          </li>
          <li>
            <label class='bold'>Carta presentación:</label>
          </li>
          <li>
            <textarea name="carta_presentacion" style="margin:0 !important" class="cien" placeholder="Explica por que eres el candidato ideal para la vacante"></textarea>
          </li>
          <li>
          <input type="submit" class="btn5" value="Enviar">
          </li>
        </ul>
      </div>
    </form>
  </div>
</div>
<?php include("footer.php");?>
