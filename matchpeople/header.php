<link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/espacios.css" rel="stylesheet" type="text/css">
<link href="css/texto.css" rel="stylesheet" type="text/css">
<link href="css/iconos.css" rel="stylesheet" type="text/css">
<link href="css/menuPrincipal.css" rel="stylesheet" type="text/css">
<link href="css/carrusel.css" rel="stylesheet" type="text/css">
<!--Css para el carrucel de esutuios-->
<link href="css/aaestudios.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.jscrollpane.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/vacante.css" rel="stylesheet" type="text/css" >
<link href="css/botones.css" rel="stylesheet" type="text/css" >
<link href="css/carruselClientes.css" rel="stylesheet" type="text/css" >
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css'/>

<!--Css para los tabs -->
<link href="css/easy-responsive-tabs.css" type="text/css" rel="stylesheet"  />
<link href="css/forms.css" rel="stylesheet" type="text/css" >
<link href="css/footer.css" rel="stylesheet" type="text/css">
<!--Css para los fondos -->
<link href="css/background.css" rel="stylesheet" type="text/css">
<!--Css para los forms-->
<link href="css/validador.css" rel="stylesheet" type="text/css">
<!--Css para el scrollbar amedida-->
<link href="css/CustomScrollbar.css" rel="stylesheet" >
<!--java para tabs de esutuios -->
<script type="text/javascript" src="js/modernizr.custom.04022.js"></script>
<!-- para el carrucel de esutuios -->
<script src="js/respond.min.js"></script>
<!-- Valida los campos obligatorios al crear una vacante-->
<script src="js/validar_vacante.js"></script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '1498589330438384');
fbq('track', "PageView");
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-K9W54DTVCP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K9W54DTVCP');
</script>


<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1498589330438384&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>

<body>
  <header id="cabezera">
    <div class="formulario" id="formularioSuperior">
      <h3 style="margin-left:15px">Contáctanos</h3>
      <div id="leyendaInfo"> Rellene el formulario de la derecha y un representante se pondrá en contacto con usted para brindarle más información. </div>
  <?php include("forms/formgenerico.php");?>
    </div>
    <div class="Btn_contacto">
      <button id="btn4">Solicite Información</button>
    </div>
    <div id="logo">
      <ul>
        <li>
          <div id="icono"><a href="inicio.php" hreflang="es-mx" target="_self"><img src="img/icono.png" alt="mp"></a></div>
        </li>
        <li>
          <div id="logomatch"><a href="inicio.php" hreflang="es-mx" target="_self"><img src="img/logoMatchpeople.png" alt="logo matchpeople consultoria"></a></div>
        </li>
      </ul>
    </div>
    <nav id="nav" class="nav">
      <ul class="nav-list">
        <li class="nav-item"><a href="inicio.php" hreflang="es-mx">Inicio</a></li>
        <li class="nav-item"><a href="encuestas_destacadas.php" hreflang="es-mx">Encuestas Destacadas</a></li>

        <li class="nav-item"><a href="servicios.php" hreflang="es-mx">Servicios</a>
          <ul class="nav-submenu">
            <li class="nav-submenu-item"><a href="portafolio.php" hreflang="es-mx">Portafolio</a>
              <ul class="nav-lastmenu" >
                <li class="nav-lastmenu-item"><a href="consultoria.php" hreflang="es-mx">Consultoría Estratégica en Capital Humano</a></li>
                <li class="nav-lastmenu-item"><a href="compensaciones.php" hreflang="es-mx">Organización y Compensaciones</a></li>
                <li class="nav-lastmenu-item"><a href="desarrollo_humano.php" hreflang="es-mx">Desarrollo Humano</a></li>
                <li class="nav-lastmenu-item"><a href="9block.php" hreflang="es-mx">9 Block Competencias y Resultados</a></li>
                <li class="nav-lastmenu-item"><a href="multiperceptual.php" hreflang="es-mx">Multiperceptual 360º</a></li>
                <li class="nav-lastmenu-item"><a href="clima.php" hreflang="es-mx">Clima Organizacional</a></li>
                <li class="nav-lastmenu-item"><a href="balance.php" hreflang="es-mx">Balance y Equidad Organizacional</a></li>
                <li class="nav-lastmenu-item"><a href="vinculacion.php" hreflang="es-mx">Vinculación de Talento</a></li>
              </ul>
            </li>
            <li class="nav-submenu-item"><a  href="suiterh.php" hreflang="es-mx">Suite RH</a>
              <ul class="nav-lastmenu">
                <li class="nav-lastmenu-item"><a href="sensing/bienvenida.php" hreflang="es-mx" target="_new">Sociometría</a> </li>
              <!--<li class="nav-lastmenu-item"><a href="http://192.241.154.208/portal_midas/main.php" hreflang="es-mx">Midas</a></li>-->
              </ul>
            </li>
            <li class="nav-submenu-item"><a href="vacantes_disponibles.php" hreflang="es-mx">Vacantes Disponibles</a></li>
          </ul>
        </li>
        <li  class="nav-item"><a href="estudios_nicho.php" hreflang="es-mx">Estudios Nicho</a>
          <ul class="nav-submenu">
            <li class="nav-submenu-item"><a href="mtycien.php" hreflang="es-mx">Monterrey 100</a>
            	  <ul class="nav-lastmenu">
                <li class="nav-lastmenu-item"><a href="que_es_mtycien.php" hreflang="es-mx">¿Que es monterrey 100?</a></li>
                <li class="nav-lastmenu-item"><a href="mercadoreferencia_mty100.php" hreflang="es-mx">Mercado de Referencia </a></li>
                <li class="nav-lastmenu-item"><a href="mty_ejemplos.php" hreflang="es-mx">Ejemplos</a></li>
                </ul>
            </li>
            <li class="nav-submenu-item"><a href="pilotos.php" hreflang="es-mx">Estudio de Pilotos</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="quienessomos.php" hreflang="es-mx">Quiénes Somos</a>
          <ul class="nav-submenu">
            <li class="nav-submenu-item"><a href="filosofia.php" hreflang="es-mx">Filosofía</a></li>
          </ul>
        </li>
        <li  class="nav-item"><a href="codigo.php" hreflang="es-mx">Código de Ética</a>
          <ul class="nav-submenu">
            <li class="nav-submenu-item"><a href="correoelectronico.php" hreflang="es-mx">Correo Electrónico</a></li>
            <li class="nav-submenu-item"><a href="buzon.php" hreflang="es-mx">Buzón de Transparencia</a></li>
          </ul>
        </li>
        <li  class="nav-item"><a href="contactanos.php" hreflang="es-mx">Contáctanos</a></li>
      </ul>
    </nav>
  </header>
