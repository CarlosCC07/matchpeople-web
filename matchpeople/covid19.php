<?php include("header.php");?>
<style>

.embed-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 100%;
    overflow: hidden;
}
.embed-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}

/* CSS general */
.mi-iframe {
  width: 100px;
  height: 50px;
}
#pie{margin-top: 0px !important;}

/* CSS pantallas de 320px o superior */
@media (min-width: 320px) {

  .mi-iframe {
    width: 200px;
    height: 150px;
  }
#pie{margin-top: 150px;}

}

/* CSS pantalla 768px o superior */
@media (min-width: 768px) {
  .mi-iframe {
    width: 500px;
    height: 350px;
  }
  .embed-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
}

</style>
<div class="embed-container" >
      <iframe src="https://es.surveymonkey.com/results/SM-J2KT997X7/" frameborder="0" allowfullscreen></iframe>
</div>
<?php include("footer.php");?>
