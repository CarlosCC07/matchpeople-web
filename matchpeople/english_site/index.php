<?php include("header.php");?>
<style>
#linkCovid a { text-decoration: none; color:rgba(92,92, 92 );}
#linkCovid a:hover{ color:rgba(92, 92, 92);}
.Box_encuesta {
  display: none;
}
.opacidad{ width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.60); border-radius: 8px;  }
.pc3{font-size:1em; color:rgba(255, 253, 253, 0.90);}
.pc1{font-size:2em;}
.pc2{font-size:1em;}
@media (min-width: 380px) {
  .Box_encuesta {
      background-image: url("img/large/Business-strategies-against-coronavirus.png");
      background-color: #424242;
      border-radius: 8px;
      display: block;
      width: 80%;
      text-align: center;
      color: #FFFFFF;
      z-index: 2;
      margin: 4% 4%;
  }
}
@media (min-width: 768px) {
  .Box_encuesta {
      background-image: url("img/large/Business-strategies-against-coronavirus.png");
      background-color: #424242;
      border-radius: 8px;
      display: block;
      width: 35%;
      text-align: center;
      color: #FFFFFF;
      z-index: 2;
      margin: 4% 4%;
  }

  .pc3{font-size:1.2em; color:rgba(255, 253, 253, 0.90);}
  .pc1{font-size:3.5em;}
  .pc2{font-size:1.5em;}
  #linkCovid a { text-decoration: none; color:rgba(255, 253, 253, 0.40);}
  #linkCovid a:hover{ text-decoration: none; color:rgba(255, 253, 253, 0.90);}

}
</style>

<!--This is the content for Layout Div Tag "contenido"-->
<div id="contenido">
  <!--<div class="Box_encuesta positionAbsolute">
    <div class="opacidad">
       <br>
      <h3 style="font-size:1.2em; color:rgba(255, 253, 253, 0.90);">
        Compensation practices in times of
      </h3>
      <h1 style="font-size:3.5em;"><strong>COVID</strong>-19</h1>
      <p style="font-size:1.5em;">Find out the results of our survey</p>
      <br>
      <a class="btn5 setenta " href="https://matchpeople.com/descargas/mP-Compensación-en-tiempos-del-Covid19.pdf" hreflang="en" target="_blank">Results</a>
      <br><br>
    </div>
  </div>-->

  <!--Carrusel  ei-slider -->
  <div id="ei-slider" class="ei-slider" >
    <!-- ei-slider-large -->
    <ul class="ei-slider-large">
      <li> <img src="img/large/1.jpg" alt="image01" />
        <div class="ei-title">
          <h2>I believe in attitude of commitment.</h2>
        </div>
      </li>
      <li> <img src="img/large/2.jpg" alt="image02" />
        <div class="ei-title">
          <h2>I believe in the future of our decisions.</h2>
        </div>
      </li>
      <li> <img src="img/large/3.jpg" alt="image04"/>
        <div class="ei-title">
          <h2>I believe in the dreams of my team.</h2>
        </div>
      </li>
    </ul>
    <!-- ei-slider-large -->
    <ul class="ei-slider-thumbs">
      <!-- ei-slider-thumbs -->
      <li class="ei-slider-element">Current</li>
      <li></li>
      <li></li>
      <li></li>
      <!-- ei-slider-thumbs -->
    </ul>
  </div>
  <!--servicos-nav -->
  <?php include("serices_menu.php");?>
  <!-- fin de servicios-nav -->

  <!--carrusel de estudios-->
  <div id="ca-container" class="ca-container">
    <div class="ca-wrapper">
      <div class="ca-item ca-item-4">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h3>Sociometry</h3>
          <h4>Method to measure or know the inter-relational structure of a group, the individual with their group membership and intergroup relations.</h4>
          <a href="https://sociometria.matchpeople.com/sociometria/" class="ca-more2">read more</a>
        </div>
      </div>
      <div class="ca-item ca-item-2">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h3>Monterrey 100</h3>
          <h4>Compare your competitiveness in salaries and benefits vs the market in Monterrey. </h4>
          <a href="mtyEN.php" class="ca-more2">read more</a> </div>
      </div>
      <div class="ca-item ca-item-3">
        <div class="ca-item-main">
          <div class="ca-icon"></div>
          <h3>Organizational Sensing</h3>
          <h4>Identity, strengthen and reorient the variables that govern the culture and environment in the company.</h4>
          <a href="sensing.php"  class="ca-more2">read more</a>
        </div>
      </div>
       <!--hay clases hasta el item 5-->
    </div>
  </div>

  <!--carrusel secundario solo para movil-->
  <div class="estudissecundarios" id="estudissecundarios"> <a class="displayEstudios">Niche research</a>
    <ul class="estudios-movil-ul">
      <li>
        <div>
          <h3>Sociometry</h3>
          <div class="boxEstudios"> <span class="ca-content-img"><img src="img/pilotos.png"  alt=""/></span>
            <h4>Method to measure or know the inter-relational structure of a group, the individual with their group membership and intergroup relations. </h4>
          </div>
          <a href="https://sociometria.matchpeople.com/sociometria/" class="ca-more2">reed more</a> </div>
      </li>
      <li>
        <div>
          <h3>Monterrey 100</h3>
          <div class="boxEstudios"> <span class="ca-content-img"> <img src="img/Mty100.png"  alt=""/></span>
            <h4>Compare your competitiveness in salaries and benefits vs the market in Monterrey. </h4>
          </div>
          <a href="mtyEN.php" class="ca-more2">reed more</a> </div>
      </li>
      <li>
        <div>
          <h3>Organizational Sensing</h3>
          <div class="boxEstudios"> <span class="ca-content-img"><img src="img/Sensing.png"  alt=""/></span>
            <h4>Identity, strengthen and reorient the variables that govern the culture and environment in the company.</h4>
          </div>
          <a href="sensing.php" class="ca-more2">reed more</a> </div>
      </li>
       <!--hay clases hasta el item 5-->
    </ul>
  </div>
  <!--carrusel de estudios-->
</div>
<?php include("footer.php");?>
