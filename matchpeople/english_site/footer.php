
<div id="pie">
  <div id="subNav">
    <h5 class="tituloSubnav">Menu</h5>
    <ul class="colOne" >
      <li><a href="services.php">Services</a></li>
      <li><a href="contactUs.php" target="_self">Contact Us</a></li>
      <li ><a href="ethics.php">Ethics Code</a></li>
      <li><a href="Aviso.pdf" target="_new">Privacy policy</a></li>
    </ul>
    <ul class="colTwo">
    <li ><a href="#">Midas</a></li>
      <li><a href="https://www.matchpeople.com/recomiendaunamigo/" target="_blank">Recomienda un Amigo</a></li>
      <li><a href="intranet.php" rel="nofollow" target="_self">Intranet</a></li>
      <li><a href="download.php" target="_self">Download</a></li>

    </ul>
  </div>
  <div id="RedesSociales">
    <h5 class="tituloSubnav">Social Network</h5>
    <ul class="colOne">
      <li>
        <div id="facebook"><a href="http://www.facebook.com/pages/Matchpeople/138678919477097" target="_new">Facebook</a></div>
      </li>
      <li>
        <div id="twitter"><a href="https://twitter.com/MatchPeople" target="_new">Twitter</a></div>
      </li>
      <li>
        <div id="linkedin"><a href="http://www.linkedin.com/company/match-people" target="_new">Linkedin</a></div>
      </li>
    </ul>
  </div>
  <div id="newsletter">
  <!--<form action="news.php"  method="post" name="form-news" >
	<div class="notaform" >
    <input type="email" name="email_news" id="email" class="required email" title="Introduce tu correo electrónico" placeholder="your@email.com">
    </div>
    <div class="submit notaform" >
      <input type="submit"  class="btn2" value="Submit">  </div>

    </form>-->
  </div>
  <div id="idioma">
    <h5 class="tituloSubnav">language</h5>
    <ul class="colOne">
      <li>
        <div id="espanol"><a href="../inicio.php" target="_self">Español</a></div>
      </li>
      <li>
        <div id="ingles"><a href="#" target="_self">English</a></div>
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
    $(".estudios-movil-ul").toggleClass("display");
  });
});
</script>
<!--Fin java script despliega la sec de estudios en version movil -->

<!-- java scrip del formulario superior -->
<script>
$(document).ready(function(){
  $("button").click(function(){
    $('.formulario').toggleClass('display');
  });
});
</script>
<!--Fin de java scrip del formulario superior -->

<!-- java scrip del mercado de referencia -->
<script>
$(document).ready(function(){
  $(".btn_mercadoReferencia").click(function(){
    $('.lista_mercadoReferencia').toggle('display');
  });
});
</script>

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
