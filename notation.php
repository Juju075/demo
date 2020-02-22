<?php

session_start();
$likes = null;

$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//Template sans marqueurs

// Requete titres
$req_etablissements = $bdd->prepare('SELECT nom, descriptif, dir_logo , link_url, compteur_likes, compteur_dislikes FROM etablissements');
$req_etablissements->execute(); 
$tab_fiches = $req_etablissements->fetchall();


/*
//Classement 

par default

1 user
2 likes
3 dislikes
4 most comments


*/
 
?>

<!DOCTYPE html/>
<html>
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/dashboard.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
<script>
$(document).ready(function(){
    $("#div3").fadeIn(900);
});
</script>
</head>
<body>
    <div class="container">
        <section><!-- Section 1 - 2 rows  - header & Profile -->

        <?php include("header.php"); ?>

        <section><!-- Section 2 -2 rows -  Sidebar  Article bgimg Big pic-->

            <div class="row">
                <div class="col-lg-2"><!-- Sidebar 1 col 2 -->
                    <nav class="sidebar">
                    <ul>
                    Search bar here
                    <br>
                        <li><a href="dashboard.php">Accueil</a></li>
                        <li>Messagerie</li>
                        <li><a href="newsfeed.php">Newsfeed</a></li>
                        <li><a href="https://fr.global-rates.com/taux-de-interets/libor/euro-europeen/euro-europeen.aspx" target="_blank"> Taux interbancaire Libord</a></li>
                        <li>Ventes regional</li>
                        <li><a href="notation.php">Notation</a></li> 
                        <br>
                    </ul>
                    </nav>
                </div><!-- Fin 1/2 column  -->

                <div class="col-lg-10">    
                   <div id="bgimg">
                        <div id="image"><img src="images/conseiller.jpg"></div>
                        <div id="texte">BIENVENUE SUR VOTRE EXTRANET GBAF.</div>
                    </div>
                </div>

            </div><!-- Fin row  -->


        </section><!-- Fin section menu big pic  -->

 
            <div class="row"><!-- Content 1000 px  1 col-->
                <article class="col-lg-12">

                <?php include("inclusion_notation.php"); ?>

                <!--    <?php include("  x  ");?>
                        <?php include("x");?>
                        <?php include("x");?>
                        <?php include("x");?>
                        <?php include("x");?>
                        <?php include("x");?>
                        <?php include("x");?>
                        <?php include("x");?>
                        <?php include("x");?>
                        <?php include("x");?>


                <!-- Order by  -->

                </article>
            </div>
         
            // insert footer
            <?php include("footer.php"); ?>

    </div><!--Fin de container -->
</body>
</html>