
<div id="pie">
  <div id="subNav">
    <h5 class="tituloSubnav">Menú</h5>
    <ul class="colOne" >
      <li><a href="servicios.php" hreflang="es-mx" target="_self">Servicios</a></li>
      <li><a href="contactanos.php" hreflang="es-mx" target="_self">Contáctanos</a></li>
      <li ><a href="codigo.php" hreflang="es-mx"  target="_self">Código de Ética</a></li>
      <li><a href="descargas/Aviso.pdf" hreflang="es-mx" target="_new">Privacidad</a></li>
    </ul>
    <ul class="colTwo">
      <li><a href="https://www.matchpeople.com/recomiendaunamigo/" hreflang="es-mx" target="_blank">Recomienda un Amigo</a></li>
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
        <div id="ingles"><a href="english_site/index.php" hreflang="es-mx" target="_self">English</a></div>
      </li>
    </ul>
  </div>
</div>
<!--java script general-->

<!--java script para fondo de imagenes-->
<script src="js/background.js"></script>
<!--java script del menu--><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#monterrey_map").click(function(){
    $('#Monterrey_lista').toggle();
    $('g.svg-menu__path__seleccion__background.Am').toggleClass("mercadoA");
  });
  $("#San_nicolas_map").click(function(){
    $('#San_Nicolas_lista').toggle();
    $('g.svg-menu__path__seleccion__background.An').toggleClass("mercadoA");
  });
  $("#Sanpedro_map").click(function(){
    $('#San_Paedro_lista').toggle();
    $('g.svg-menu__path__seleccion__background.Ap').toggleClass("mercadoA");
  });

  $("#Apodaca_map").click(function(){
    $('#apodaca_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundB.Ba').toggleClass("mercadoB");
  });
  $("#Guadalupe_map").click(function(){
    $('#guadalupe_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundB.Bg').toggleClass("mercadoB");
  });
  $("#Pesqueria_map").click(function(){
    $('#pesqueria_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundB.Bp').toggleClass("mercadoB");
  });
  $("#Santa_catarina_map").click(function(){
    $('#Santa_catarina_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundC.Cs').toggleClass("mercadoC");
  });
  $("#Garcia_map").click(function(){
    $('#garcia_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundC.Cg').toggleClass("mercadoC");
  });
  $("#Escobedo_map").click(function(){
    $('#escobedo_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundD.De').toggleClass("mercadoD");
  });
  $("#Carmen_map").click(function(){
    $('#carmen_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundD.Dec').toggleClass("mercadoD");
  });
  $("#Salinas_Victoria_map").click(function(){
    $('#salinasvictoria_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundD.Ds').toggleClass("mercadoD");
  });
  $("#Cienega_de_Flores_map").click(function(){
    $('#cienga_de_flores_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundD.Dc').toggleClass("mercadoD");
  });
  $("#Saltillosy_ramos").click(function(){
    $('#saltillo_lista').toggle();
    $('g.svg-menu__path__seleccion__backgroundE').toggleClass("mercadoE");
  });
  // despliega la nav-rapida(servicos principales)
  $(".displayTitle").click(function(){
    // despliega los elemenos con la clase displaytext
    $(".displaytext").toggleClass('displaytext-line');
  });
//java scrip del formulario superior
  $("button").click(function(){
    $('.formulario').toggleClass('inline-block');
  });
});
</script>
<script type="text/javascript" src="js/flaunt.js"></script>
</body>
</html>
