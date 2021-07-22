<?php include("header.php");?>

<div id="contenido">
  <div class="imgproduct gap2">
    <div id="imgBox"> <img src="img/estudios/comercial.png" class="noventa" > </div>
  </div>
  <div class="text gap2" > 
    <!--Horizontal Tab-->
    <div id="horizontalTab">
      <ul class="resp-tabs-list">
       <li>Objective</li>
       <!-- <li>Demo</li>-->
        <li>Request information</li>
      </ul>
      <div class="resp-tabs-container">
        <div id="objetivos">
          <p> 
          Gauge the performance of current practices within the business area of the organization, 
          identifying their strengths, areas of opportunity and industry positioning.
          Rate various elements against the market to establish key factors for improving work systems: 
          organizational structure, strategic positioning, administrative and technological infrastructure,
           indicators of effectiveness, compensation parameters 
          fixed and variable profile and human capital strategies in commercial area among others.
          </p>
        </div>
        <!--<div id="demo">
        
        </div>-->
        <div id="informes">
        <?php include ("forms/form_studys.php");?>
        </div>
      </div>
    </div>
  </div>
  <!--servicos-nav -->
  <?php include("serices_menu.php");?>
  <!-- fin de servicios-nav --> 
  </div>

<?php include("footer.php");?>