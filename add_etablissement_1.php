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
 

<!DOCTYPE html />
<html>
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
      <div class="item item-1"><a href="dashboard_redesign_1.php">Accueil</a></div>
      <div class="item item-2"><a href="/profile_redesign.php">Profil</a></div>
      <div class="item item-3"><a href="notation_redesign_1.php">Partennaires</a></div>
      <div class="item item-4"><a href="add_etablissement_1.ph">Ajout établissement</a></div>
    </div>

 <div class="row"><!-- Content 1000 px  1 col-->
                <article class="row_container center"> 
                    <div class="etab_container">
                        <div class="item">
                            <h2>Ajouter un établissement</h2>
                        </div>
                        <div class="item">
                                <form method="post" action="php/new_ins_etablissement.php" enctype="multipart/form-data">
                                    <label for="ins_etablissement"></label>
                                    <input type="text" name="etablissement" id=""  placeholder="Nom de l'établissement." required/><br><br>
                                    <label for="descriptif"></label>
                                    <textarea type="text" name="descriptif" rows="8" cols="55" id="" placeholder="Saissisez le descriptif de l'etablissement." required></textarea ><br><br>
                                    <label for="">Ajouter une image.</label>
                                    <input type="hidden" name="size" value="20000">
                                    <input type="file" id="" name="image"/>
                                    <input type="submit" value="Envoyer le formulaire">
                                </form>
                        </div>

                    </div> 
                </article>
</div>

    <?php include("footer.php"); ?> <!-- ouverture et fermeture section -->
    
   
</div> 
<!--  -->
</body>
</html>