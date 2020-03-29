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
<title>Accueil</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/style_mobile_first.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
</head>
<body>
    <div id="main_container"> 
        <?php include("header_redesign.php"); ?> 
        <?php include("navigation.php"); ?> 

        <div class="row"><!-- Ligne contenu -->
            <article class="justify">
                <h5>La GBAF promeut l’activité bancaire et financière sur les marchés français, européens et internationaux, et définit les positions et propositions de la profession vis-à-vis des pouvoirs publics et des autorités du domaine économique et financier. Elle diffuse également des normes, bonnes pratiques et recommandations professionnelles et met son expérience à la disposition de ses membres. La GBAF  a aussi pour mission d’informer les banques adhérentes de toute question relative à leurs activités.</h5>
            </article>
        </div>
        
        <?php include("footer.php"); ?> 
    </div> 
</body>
</html>