
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
    $('g.svg-menu__path__seleccion__backgroundB.Bp').toggleClass("mercadoE");
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
