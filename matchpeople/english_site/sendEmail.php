<?php
if ($_POST['filtro'] == ""){
    $to = "administrator@matchpeople.onmicrosoft.com".", emorales@matchpeople.onmicrosoft.com";
	$subject = utf8_decode($_POST['DenunciaElectronica']);
	$message = utf8_decode($_POST['mensaje']);
	$from = "anonimo@karaoke.com.mx";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	}
    
	else{
    	if ($_POST['filtro'] != ""){		
    		// Es un SPAMbot
    		exit();
		}
		
	}
	?>
<?php include("header.php");?>

<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/contacto.png" class="noventa" > </div>
  </div>
  <div class="text gap1">
    <h1  class="Titulosec">E-mail of Ethics</h1>
    <div class="textInfo">
      <h3> Thank you for your confidence </h3>
      <br>
      <h4> information has been sent </h4>
    </div>
  </div>

  <!--servicos-nav -->
  <?php include("serices_menu.php");?>
  <!-- fin de servicios-nav -->
</div>

<?php include("footer.php");?>