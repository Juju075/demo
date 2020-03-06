<?php
session_start();
if(isset($_POST['mot_de_passe'], $_POST['nouveau_mt_passe']) AND !empty($_POST['mot_de_passe'] AND $_POST['nouveau_mt_passe'])){ 

    $password = $_POST['mot_de_passe'];
    $newpass = $_POST['confirmation_passe'];

    //Verification login et pass identique 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet', 'root' ,'connect', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->prepare('SELECT mot_de_passe FROM banksters WHERE utilisateur = ?');
    $req->execute(array($_SESSION['utilisateur']));
    $resultat = $req->fetch();

    // vérifier la correspondance  Ancien mot de passe : pass saisi vs pass stocke
    $Verif_pass= password_verify($_POST['mot_de_passe'], $resultat['mot_de_passe']);
     
    

    if ($Verif_pass == TRUE && $password == $newpass ) {

    //hass nouveau pass et insertion
    $pass_hache = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $req_newpass = $bdd->prepare('UPDATE banksters SET mot_de_passe = ? ');
    $req_newpass->execute(arrary($pass_hache)); 

    $smg = 'Votre mot de passe à ete modifié';

    }else{
        header('location: ');
        $smg = 'erreur de saisie mot de pass non vérifie';
    }


?>