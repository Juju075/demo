<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req_multi= $bdd->prepare('SELECT adresse, telephone FROM banksters WHERE utilisateur = ? ');
$req_multi->execute(array($_SESSION['utilisateur']));
$reponse = $req_multi->fetch();

$adresse = $reponse['adresse'];
$telephone = $reponse['telephone'];
/*
//Debugging
var_dump($reponse);

//--------------------
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
<h1>Modifier mon profile.</h1>
<br>
<p><strong>Prenom:</strong>  <?php echo $_SESSION['prenom'] ; ?></p><br>
<p><strong>Nom:</strong>  <?php echo $_SESSION['nom_de_famille'] ; ?></p><br>
<p><strong>Telephone:</strong>  <?php echo $telephone; ?></p><br>
<p><strong>Adresse:</strong>  <?php echo $adresse; ?></p><br>

telecharger avatar<br>
<p>Changer mot de password</p><br>
<a href="dashboard.php">retour accueil</a>
<br>
<img src="images/profile.jpg">





</body>
</html>