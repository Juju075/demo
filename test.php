<?php

$login = 'marcparis';
 
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req_name = $bdd->prepare('SELECT prenom, nom, id_user FROM banksters WHERE utilisateur = ? ');
$req_name->execute(array($login));
$name = $req_name->fetch();

var_dump($name);
echo '<pre>';

?>