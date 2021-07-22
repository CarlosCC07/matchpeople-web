
<div id="pie">
  <div id="subNav">
    <h5 class="tituloSubnav">Menú</h5>
    <ul class="colOne" >
      <li><a href="servicios.php" hreflang="es-mx" target="_self">Servicios</a></li>
      <li><a href="contactanos.php" hreflang="es-mx" target="_self">Contáctanos</a></li>
      <li ><a href="codigo.php" hreflang="es-mx"  target="_self">Código de Ética</a></li>
      <li><a href="descargas/Aviso.pdf"hreflang="es-mx" target="_new">Privacidad</a></li>
    </ul>
    <ul class="colTwo">
      <li><a href="recomiendaunamigo/index.php" hreflang="es-mx" target="_blank">Recomienda un Amigo</a></li>
      <li><a href="intranet.php" rel="nofollow" hreflang="es-mx" target="_self">Intranet</a></li>
      <li><a href="descargas.php" hreflang="es-mx" target="_self">Descargas</a></li>
    </ul>
  </div>
  <div id="RedesSociales">
    <h5 class="tituloSubnav">Redes Sociales</h5>
    <ul class="colOne">
      <li>
        <div id="facebook">
        <a href="https://www.facebook.com/pages/Matchpeople/138678919477097" hreflang="es-mx" target="_new">Facebook</a></div>
      </li>
      <li>
        <div id="twitter">
        <a href="https://twitter.com/MatchPeople" hreflang="es-mx" target="_new">Twitter</a></div>
      </li>
      <li>
        <div id="linkedin">
        <a href="https://www.linkedin.com/company/match-people" hreflang="es-mx" target="_new">Linkedin</a>
        </div>
      </li>
    </ul>
  </div>
  <div id="newsletter">

  </div>
  <div id="idioma">
    <h5 class="tituloSubnav">Idioma</h5>
    <ul class="colOne">
      <li>
        <div id="ingles"><a href="english_site/index.php" hreflang="es-us" target="_self">English</a></div>
      </li>
    </ul>
  </div>
</div>
<!--java script general-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<!--java script para fondo de imagenes-->
<script src="js/background.js"></script>

<!-- java scrip del carrucuel -->
<script type="text/javascript" src="js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
            $(function() {
                $('#ei-slider').eislideshow({
					animation			: 'center',
					autoplay			: true,
					slideshow_interval	: 5000,
					titlesFactor		: 0,

                });
            });
        </script>
<!--Fin de java scrip del carrucuel -->

<!--java script del menu-->
<script type="text/javascript" src="js/flaunt.js"></script>
<!-- Fin de java script del menu-->

<!--java carrucel de los estudios-->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<script type="text/javascript">
			$('#ca-container').contentcarousel();
</script>
<!-- Fin carrucel de los estudios-->

<!--java script despliega los serviciso principales -->
<script>
$(document).ready(function(){
  // despliega la nav-rapida(servicos principales)
  $(".displayTitle").click(function(){
	  // despliega los elemenos con la clase displaytext
    $(".displaytext").toggleClass('displaytext-line');
  });
});
</script>
<!-- Fin java script despliega los serviciso principales -->

<!--java script despliega la sec de estudios en version movil -->
<script>
$(document).ready(function(){
  // despliega los estudios en version movil
  $(".displayEstudios").click(function(){
	  // despliega los elemenos con la clase estudios-movil-ul
    $(".estudios-movil-ul").toggle();
  });
});
</script>
<!--Fin java script despliega la sec de estudios en version movil -->

<!-- java scrip del formulario superior -->
<script>
$(document).ready(function(){
  $("button").click(function(){
    $('.formulario').toggleClass('inline-block');
  });
});
</script>
<!--Fin de java scrip del formulario superior -->

<!--java scrips para los tabs de los estudios permite adaptavilidad en movil -->
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });
    });
</script>
<!--Fin de java scrips para los tabs de los estudios permite adaptavilidad en movil -->

<!--java scrips para validar formularios -->
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
<script type="text/javascript" src="js/validador.js"></script>

<!-- java scrip para poner el footer al fondo / calcula las dimenciones de la pagina -->
<script type="text/javascript">//<![CDATA[
$(window).load(function(){
$('#pie').css('margin-top',$(document).height() - ($('#cabezera').height() + $('#contenido').height() + $('.background').height() ) - $('#pie').height());
});//]]>
</script>
</body>
</html>
