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
    

}else{
    header('location: /index.php?c=non_connecte');
}
?>
<!DOCTYPE html >
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
    <article>

        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $req_list = $bdd->query('SELECT nom, descriptif, dir_ph_headquarter FROM etablissements');
            while($tab_fiches = $req_list->fetch()){ 
            ?>  

            <div class="row_container space-around">
                <div>
                    <div class="item item2"><h1><?php echo $tab_fiches['nom']; ?></h1></div>
                    <div class="item item1"><img src="<?php echo 'images/'. $tab_fiches['dir_ph_headquarter'];?>" width="197" height="100" alt="logo_etablissement"/></div> 
                </div>
                <div>    
                    <div class="item item3"><p><?php echo $tab_fiches['descriptif']; ?></p></div>
                </div>    
                <div>
                    <div class="item item4"><a href="template_details.php?etablissement=<?= $tab_fiches['nom'];?>">Lire la suite</a></div>
                </div>
            </div>
        <?php
        } // Fin de boucle
        ?> 
    </article>
</div>

    <?php include("footer.php"); ?> <!-- ouverture et fermeture section -->
</div> 
<!--  -->
</body>
</html>