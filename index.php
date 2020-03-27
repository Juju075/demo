<?php
if(isset($_COOKIE['user_id'])){
    echo 'Votre ID de session est le ' .$_COOKIE['user_id'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Page index</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Extranet GBAF ">
<meta name="author" content="Bempime Kheve">
<link rel="icon" href="favicon.ico">
<link href="css/index.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
</head>
    <body>
        <div id ="container">
            <div class ="elements"><!-- elements 1-->
                <img src="images/cadre.jpg" alt="image_de_couverture" height="500">
            </div><!-- Fin elements 1 -->
            <div class="bloc_elements"><!-- elements 2-->
                <div class="item"><img src="images/gbaf_logo.jpg" alt="logo_federation_gbaf" height="130"></div><!-- Fin item-1 -->
                <div class="item"><p>BIENVENUE<br>
                        sur la page d'identification de votre Extranet<br> (espace réservé aux adhérents GBAF).<br>
                        En vous connectant sur ce site,vous acceptez <br> l'utilisation decookies à des fins de mesure d'audience.<br> <strong><a href="https://www.cnil.fr/professionnel" target="_blank">En savoir plus</a></strong></p>
                </div><!-- Fin item-2 -->
                <div class="item">
                    <form method="post" action="php/execution.php">
                            <input  type="text" name="utilisateur" placeholder="Login" required>
                            <input type= "password" name= "mot_de_passe" placeholder="Votre mot de passe" required/><br>
                            <br><input class="envoyer" type= "submit" value=" Valider"/>
                    </form>
                </div><!-- Fin item-3 -->
                <div class="item">
                    <nav>
                        <ul>
                            <li><a href="php/inscription.php" >S'inscrire.</a></li>
                            <li><a href="lost.php" >Mot de passe oublié?.</a></li>
                        </ul>
                    </nav>
                </div><!-- Fin item-4 -->
                <p class="erreur"><?php if ($_GET['passe'] == 'non_valide') {
                    echo 'Vous avez rentré une mauvaise<br> combinaison login et mot de passe<br> ou votre cpt n\'est pas activé.';
                }elseif ($_GET['c'] == 'non_connecte') {
                    echo 'Vous n\'êtes pas connecté' ;
                }elseif ($_GET['c'] == 'confirmed') {
                    echo "Votre compte est déjà activé<br>Veuillez saisir votre identifiant !";
                } ?></p>
            </div><!-- Fin elements 2-->
        </div><!-- Fin main wrap -->
        <div id="footer_container">
            <footer class="item">
                <h5>Le Groupement Banque Assurance Français - CONFIDENTIEL SAUF MENTION CONTRAIRE. -</h5><a href="mentions_legales.php">Mentions légales</a>
            </footer>   
        </div><!-- Fin container 2-->                       
    </body>
</html>
