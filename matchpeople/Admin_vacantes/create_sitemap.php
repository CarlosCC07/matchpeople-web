<?php
//Creamos el archivo.php
$sms = fopen("../sitemap_survay.xml","a")or die("Error al crear archivo.php");
fwrite($sms,"<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9' xmlns:xhtml='http://www.w3.org/1999/xhtml'>
<url>
  <loc>http://www.matchpeople.com/$file.php</loc>
  <lastmod>20-08-27T00:00:00+00:00</lastmod>
  <changefreq>monthly</changefreq>
  <xhtml:link rel='canonical' hreflang='es' href='http://www.matchpeople.com/$file.php' />
</url>
</urlset>");

fwrite($sms,"\n");
?>
