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

//Fin script 1


if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
    //Affectation
    $nom = $_GET['etablissement'];
    $test= 'ce variable est ok';

    //Requete fiche 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $req_details = $bdd->prepare('SELECT * FROM etablissements  WHERE nom = ?');
    $req_details->execute(array($nom));
    $details_etablissement = $req_details->fetchall();

    //var_dump($details_etablissement);

 
    //Requete comments rajouter condition comment non null
    $req_comments = $bdd->prepare('SELECT id_user, comments, date_added FROM reviews  WHERE nom_etablissement = ? AND comments IS NOT NULL');
    $req_comments->execute(array($nom));
    //$list_comments = $req_comments->fetch();

    //var_dump($list_comments);
    
    //echo 'jusquici tout vas bien';


}// Fin script 2
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
        <div class="item item-1"><a href="dashboard.php">Accueil</a></div>
        <div class="item item-2"><a href="/profile.php">Profil</a></div>
        <div class="item item-3"><a href="notation.php">Partennaires</a></div>
        <div class="item item-4"><a href="add_etablissement.php">Ajout établissement</a></div>
    </div>

 <div class="row"><!-- Content 1000 px  1 col-->
    <article>
       <div class="row_container">

            <div class="item">
                <h1><?php echo $details_etablissement[0]['nom']; ?></h1>
            </div>

            <div class="item">
            <img src="<?php echo 'images/'. $details_etablissement[0]['dir_ph_headquarter'];?>"/>
            </div>

            <div class="item">
                <p><?php echo $details_etablissement[0]['descriptif']; ?></p>
            </div>

            <div class="item">
                <div>
                    <a href="php/vote.php?t=1&nom=<?= $details_etablissement[0]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $details_etablissement[0]['compteur_likes'] .')</p>'?>
                </div>
                
                <div>
                    <a href="php/vote.php?t=2&nom=<?= $details_etablissement[0]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $details_etablissement[0]['compteur_dislikes'] .')</p>'?>
                </div>
            </div>

            <div> <!-- Comments -->
                        
                        <div class="item">
                            <img src="images/comment.png"/>
                        </div>
                            <?php
                            if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
                                while ($list_comments = $req_comments->fetch()) {

                                    $id_bankster = $list_comments['id_user'];

                                    $req_info = $bdd->prepare('SELECT prenom, avatar FROM banksters WHERE id_user = ?');
                                    $req_info->execute(array($id_bankster));
                                    $userData = $req_info->fetch();
                                    //var_dump($userData);   
                                    ?>  <!-- Fin commentaire -->
                                    
                                    <TABLE>
                                        <TR>
                                            <TD rowspan=2><img src="images/comment_1.png"/></TD>
                                            <TD rowspan=2><img src="images/avatar/<?php echo $userData['avatar'];?>" class="avatar"/></TD>
                                            <TD ><p><?php echo $userData['prenom'];?></p></TD>
                                        </TR>
                                        <TR>
                                            <TD><?php echo $list_comments['comments'];?><?php echo $list_comments['date_added'];?></TD>
                            
                                        </TR>
                                    </TABLE>
                                    
                                    <!-- Add comment-->
                                    <?php    
                                    }
                                } 
                            ?><!--Fin boucle --> 
                            
                    <div>
                    <form method="post" action="php/add_comment.php?etablissement=<?php echo $nom;?>">
                        <label for="">Ajouter un commentaire ?:</label><br>
                        <textarea type="text" name="comment" rows="5" cols="33" id=""  maxlength="800" required></textarea ><br>
                        <input type="submit" value="Envoyer le commentaire."><!-- submit button --></input>
                    </form>
                    </div>        


                        </div>
       </div>  <!-- Fin container -->      
    </article>
</div>

    <?php include("footer.php"); ?> <!-- ouverture et fermeture section -->
    
   
</div> 
<!--  -->
</body>
</html>