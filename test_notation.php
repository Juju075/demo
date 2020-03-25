
 <?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req_prenom = $bdd->prepare('SELECT prenom FROM banksters WHERE utilisateur = ? ');
$req_prenom->execute(array($_SESSION['utilisateur']));
$prenom = $req_prenom->fetch();

$req_nom_de_famille = $bdd->prepare('SELECT nom FROM banksters WHERE utilisateur = ? ');
$req_nom_de_famille->execute(array($_SESSION['utilisateur']));
$nomfamille = $req_nom_de_famille->fetch();

/*
//Debuging
var_dump($_SESSION['prenom']);
echo $prenom[0];
echo $nomfamille[0];
//------------------------------
*/ 

$likes = null;


/*
// Requete tab 
$req_etablissements = $bdd->prepare('SELECT nom, descriptif FROM etablissements');
$req_etablissements->execute();
$tabfinals = $req_etablissements->fetchall();

 
// Requete tab
$req_likes = $bdd->prepare('SELECT compteur_likes FROM etablissements');
$req_likes->execute();
$tab_cp_likes = $req_likes->fetchall();

/*
//Debuging
var_dump($tab_cp_likes);
*/ 



//insert tableaux
$req_list = $bdd->query('SELECT nom, descriptif, dir_logo, compteur_likes, compteur_dislikes FROM etablissements');




?>
 

<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/dashboard.css" rel="stylesheet" type="text/css">
<style>
@import url('https://fonts.googleapis.com/css?family=Dosis&display=swap');
</style>
</head>

<script>
<script>
$(document).ready(function(){
    $("#div3").fadeIn(900);
});
</script>


<? 
$user = "cookie";
$img =  "images/profile_ . $user . \.png"; //  Avatar
$img_alt = 'photo de profile';
$mess_user_date = "";    //  Derniere date de connexion
$mess_user_pending = ""; //  non lu
?>

<body>
<div id="main_container"><!-- Main container -->
    <section><!-- Section 1 - 2 rows  - header & Profile -->

        <?php include("header.php"); ?>
        <?php include("middle_section.php"); ?>

            <div class="row"><!-- Content 1000 px  1 col-->
                <article>

                <div class="row"><!-- Content 1000 px  1 col-->
                <article>
                    <div class="bloc_notation">
                        <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                            $req_list = $bdd->query('SELECT nom, descriptif, dir_logo, compteur_likes, compteur_dislikes FROM etablissements ORDER BY compteur_likes ASC');
                            while($tab_fiches = $req_list->fetch()){ 
                        ?>    
                            <table>
                                <tr>
                                    <th><img src="<?php echo $tab_fiches['dir_logo'];?>"/></th>
                                    <th><h1><?php echo $tab_fiches['nom']; ?></h1></th>
                                </tr>
                                <tr>
                                    <td colspan="2" >                           
                                    <p><?php echo $tab_fiches['descriptif']; ?></p></td>
                                </tr> 
                                <tr>
                                    <td><button type="button" onclick="toggle_div(this,'test-1');" title="Afficher la suite">+</button>
                                    <a href="template_details.php?etablissement=<?= $tab_fiches['nom'];?>">Lire la suite</a></td>
                                </tr>   
                            </table>
                        <?php
                            } // Fin de boucle
                            $req_list->closureCursor();
                            exit()
                        ?>           
                    </div>     
                </article>
            </div>
                </article>
            </div>

        <?php include("footer.php"); ?>

</body>
</html>