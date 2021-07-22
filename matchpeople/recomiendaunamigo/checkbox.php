<?php
	//Si el checkbox condiciones tiene valor y es igual a 1
	if (isset($_POST['checkbox']) && $_POST['checkbox'] == '1'){
		header('location: condiciones.php');}
 	else{
		echo "<script type=\"text/javascript\">window.alert('Para participar debes de aceptar las condiciones de uso.');window.location.href = 'terminos.php';</script>"; 

	}
?>
