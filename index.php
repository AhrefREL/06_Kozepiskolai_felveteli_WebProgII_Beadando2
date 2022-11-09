<?php

//Alkalmazas gyoker konyvtar a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/06_Kozepiskolai_felveteli_WebProgII_Beadando2/');

//URL cim az alkalmazas gyokerehez
define('SITE_ROOT', 'http://localhost/06_Kozepiskolai_felveteli_WebProgII_Beadando2/');
require_once(SERVER_ROOT.'controllers/'.'router.php');


?>