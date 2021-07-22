<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if($lang =="es"){ echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=inicio.php\">"; }
elseif ($lang =="en") {
  echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=english_site/index.php\">";
}else { echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=english_site/index.php\">";}
?>
