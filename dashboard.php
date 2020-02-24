
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

//Template sans marqueurs

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

?>
 

<!DOCTYPE html />
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


<? 
$user = "cookie";
$img =  "images/profile_ . $user . \.png"; //  Avatar
$img_alt = 'photo de profile';
$mess_user_date = "";    //  Derniere date de connexion
$mess_user_pending = ""; //  non lu
?>

</head>
<body>
    <div class="container">
        <section><!-- Section 1 - 2 rows  - header & Profile -->

        <!-- include header -->
        <?php include("header.php"); ?>
        </section><!-- Fin section header --> 

        <!-- include midle section -->
        <?php include("midle_section.php"); ?>
            <div class="row"><!-- Content 1000 px  1 col-->
                <article class="col-lg-12">
                </article>
            </div>

            <!-- include footer -->   
        <?php include("footer.php"); ?>
    </div><!--Fin de container -->
</body>
</html>