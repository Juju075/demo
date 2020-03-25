<?php
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$getnom = 'HSBC';
$getid_user = 5 ;

//test update ok fonctionne
$req_upt_likes = $bdd->prepare('UPDATE tests SET likes = 0 WHERE nom_etablissement = ? AND id_user = ? ');
$req_upt_likes->execute(array($getnom,$getid_user));



?>