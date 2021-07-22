<?php
$autor = $_SESSION["user"];
?>
<div id="menu_vinculacion">
<div style="position: absolute; right: 3%;"><strong> Hola <?php echo "$autor";?> </strong></div>
<ul>
<li><a href="paneldecontrol.php" rel="nofollow" hreflang="es-mx">Panel de Control</a></li>
<li>I</li>
<li><a href="admin_encuestas.php" rel="nofollow" hreflang="es-mx">Encuestas Destacadas</a></li>
<li>I</li>
<li><a href="admin_sociometria.php" rel="nofollow" hreflang="es-mx">Estudios de Sociometría</a></li>
<li>I</li>
<li><a href="admin_vacantes.php" rel="nofollow" hreflang="es-mx">Vacantes</a></li>
<li>I</li>
<li><a href="sociosEstrategicos.php" rel="nofollow" hreflang="es-mx">Socios Estratégicos</a></li>
</ul>
</div>
<div class="gap3" style=" text-align:right; margin:10px 3% 10px 0px;">
  <a href="sessiondestroy.php" rel="nofollow" hreflang="es-mx" style="color:rgba(211,0,3,1.00);"><strong>cerrar session</strong></a>
</div>
