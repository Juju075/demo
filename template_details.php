<?php
session_start();

//Debut scipt dashboard
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
if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
    //Affectation
    $nom = $_GET['etablissement'];
    $test= 'ce variable est ok';

    //Requete fiche 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $req_details = $bdd->prepare('SELECT * FROM etablissements  WHERE nom = ?');
    $req_details->execute(array($nom));
    $details_etablissement = $req_details->fetchall();
    //Requete comments rajouter condition comment non null
    $req_comments = $bdd->prepare('SELECT id_user, comments, date_added FROM reviews  WHERE nom_etablissement = ? AND comments IS NOT NULL');
    $req_comments->execute(array($nom));
    //$list_comments = $req_comments->fetch();

    //Requete compteur likes
    $req_likes = $bdd->prepare('SELECT id FROM likes WHERE nom = ?');
    $req_likes->execute(array($nom));
    $compteur_likes = $req_likes->rowCount();

    //var_dump($compteur_likes);

    //Requete compteur likes
    $req_dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE nom = ?');
    $req_dislikes->execute(array($nom));
    $compteur_dislikes = $req_dislikes->rowCount();
}// Fin script 2
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/style_mobile_first.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
<style>
</style>
</head>
<body>
<div id="main_container"> 
        <?php include("header_redesign.php"); ?>  
        <?php include("navigation.php"); ?> 
    <div class="row"><!-- Content 1000 px  1 col-->

    <article>
        <div class="row_container space-around">

            <div class="item auto">
            <h1><?php echo $details_etablissement[0]['nom']; ?></h1>
            </div>

            <div class="item auto">
            <img src="<?php echo 'images/'. $details_etablissement[0]['dir_ph_headquarter'];?>" alt="image_logo"/>
            </div>

            <div class="item auto">
            <p><?php echo $details_etablissement[0]['descriptif']; ?></p>
            </div>

            <div class="ligne">

                <div>
                <a href="php/vote.php?t=1&nom=<?= $details_etablissement[0]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $compteur_likes .')</p>'?>
                <a href="php/vote.php?t=2&nom=<?= $details_etablissement[0]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $compteur_dislikes .')</p>'?>
                </div>

                <div>  
                    <?php
                        if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
                            while ($list_comments = $req_comments->fetch()) {
                            $id_bankster = $list_comments['id_user'];
                            $req_info = $bdd->prepare('SELECT prenom, avatar FROM banksters WHERE id_user = ?');
                            $req_info->execute(array($id_bankster));
                            $userData = $req_info->fetch();
                    ?>
                            <TABLE>
                                <TR>
                                    <TD rowspan=2><img src="images/comment_1.png" alt="image_avatar"/></TD>
                                    <TD rowspan=2><img src="images/avatar/<?php echo $userData['avatar'];?>" class="avatar" alt="image_avatar"/></TD>
                                    <TD ><p><?php echo $userData['prenom'];?></p></TD>
                                    </TR>
                                    <TR>
                                    <TD><?php echo $list_comments['comments'];?><?php echo $list_comments['date_added'];?></TD>
                                </TR>
                            </TABLE>
                    <?php    
                            }
                        } 
                    ?><!--Fin boucle --> 
                </div>

                <div>
                    <form method="post" action="php/add_comment.php?etablissement=<?php echo $nom;?>">
                        <label for="commentaire">Ajouter un commentaire ?:</label><br>
                        <textarea name="comment" rows="5" cols="33" id="commentaire"  maxlength="800" required></textarea ><br>
                        <button type="submit">Envoyer le commentaire</button>
                    </form>
                </div>     
                    
            </div> 

        </div>   
    </article>

    </div>
        <?php include("footer.php"); ?> <!-- ouverture et fermeture section -->
    </div> 
</body>
</html>