<?php
$utilisateur = $_GET['log'];
$token = $_GET['token'];

 
// Recupere le token bdd et 1 ou 0 de la validation pour cet utilisateur.
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('SELECT token, isemailconfirmed FROM banksters WHERE utilisateur = ? ');

/*
$req->execute(array($utilisateur));
$resultat = $req->fetch();
var_dump($resultat);
*/



if($req->execute(array($utilisateur)) && $row = $req->fetch())
  {
    $tokenbdd = $row['token'];    // Récupération de la clé
    $isemailconfirmed = $row['isemailconfirmed']; // $isemailconfirmed contiendra alors 0 ou 1
  }
 
 
// On teste la valeur de la variable $isemailconfirmed récupérée dans la BDD
if($isemailconfirmed == '1'){
     echo "Votre compte est déjà isemailconfirmed !";
  }else{
     if($token == $tokenbdd) 
       {
          echo "Votre compte a bien été activé !";
 
          $req = $bdd->prepare('UPDATE banksters SET isemailconfirmed = 1 WHERE utilisateur = ? ');
          $req->execute(array($utilisateur));
          
          session_start();
          $_SESSION['utilisateur'] = $utilisateur;

          header('location: dashboard.php');
          
       }else{ // erreur
          echo "Erreur ! Votre compte ne peut être activé...";
          header('location: index.php?activation=erreur');
       }
  }

?>