<?php
$utilisateur = $_POST['utilisateur'];

$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$resultat = $bdd->prepare('SELECT isemailconfirmed FROM  banksters WHERE utilisateur like :utilisateur');

if($resultat->execute(array(':utilisateur' => $utilisateur))  && $statut = $stmt->fetch())
    {
        $isemailconfirmed = $statut['isemailconfirmed']; // $isemailconfirmedcontiendra alors 0 ou 1
    }
 
 
// Il ne nous reste plus qu'à tester la valeur du champ 'actif' pour
// autoriser ou non le membre à se connecter
 
if($isemailconfirmed == '1') // Si $isemailconfirmedest égal à 1, on autorise la connexion
  {
   //...
   // On autorise la connexion...
   //...
  }else // Sinon la connexion est refusé...
  {
   //...
   // On refuse la connexion et/ou on prévient que ce compte n'est pas activé
   //...
  }


?>