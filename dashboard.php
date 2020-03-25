<?php
session_start();

if(isset($_SESSION['id_user']) AND !empty ($_SESSION['id_user'])){

    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req_prenom = $bdd->prepare('SELECT prenom FROM banksters WHERE id_user = ? ');
    $req_prenom->execute(array($_SESSION['id_user']));
    $prenom = $req_prenom->fetch();

    $req_nom_de_famille = $bdd->prepare('SELECT nom FROM banksters WHERE id_user = ? ');
    $req_nom_de_famille->execute(array($_SESSION['id_user']));
    $nomfamille = $req_nom_de_famille->fetch();


    $likes = null;

    $req_info = $bdd->prepare('SELECT avatar FROM banksters WHERE id_user = ?');
    $req_info->execute(array($_SESSION['id_user']));
    $userData = $req_info->fetch();
    
    //insert tableaux
    $req_list = $bdd->query('SELECT nom, descriptif, dir_logo, compteur_likes, compteur_dislikes FROM etablissements');

}else{
    header('location: /index.php?c=non_connecte');
}

?>
 

<!DOCTYPE html>
<html lang="fr">
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/dashboard_redesign_1.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
<style>
</style>
</head>
<body>

<div id="main_container"><!-- Main container -->

    <?php include("header_redesign.php"); ?> <!-- ouverture et fermeture section -->

    <div class="row_container space-around">
      <div class="item item-1"><a href="dashboard.php">Accueil</a></div>
      <div class="item item-2"><a href="/profile.php">Profil</a></div>
      <div class="item item-3"><a href="notation.php">Partennaires</a></div>
      <div class="item item-4"><a href="add_etablissement.php">Ajout établissement</a></div>
    </div>

 <div class="row"><!-- Content 1000 px  1 col-->
    <article class="justify">
        <h5>La GBAF promeut l’activité bancaire et financière sur les marchés français, européens et internationaux, et définit les positions et propositions de la profession vis-à-vis des pouvoirs publics et des autorités du domaine économique et financier. Elle diffuse également des normes, bonnes pratiques et recommandations professionnelles et met son expérience à la disposition de ses membres. La GBAF  a aussi pour mission d’informer les banques adhérentes de toute question relative à leurs activités.</h5>
    </article>
</div>

    <?php include("footer.php"); ?> <!-- ouverture et fermeture section -->
    
   
</div> 
<!--  -->
</body>
</html>