
<?php
setlocale(LC_TIME, 'fr');
$date = ucfirst(strftime('%A, le %d %B %Y'));

var_dump($date);
$last_connexion = date('l d F Y', $timestamp = time());
var_dump($last_connexion)

?>