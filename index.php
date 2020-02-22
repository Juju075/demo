
<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Extranet GBAF ">
<meta name="author" content="Bempime Kheve">
<link rel="icon" href="favicon.ico">
<link href="css/style1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


</head>
<body>

<div class="container">

  <div class="row"><!-- 1 Row -->
    <section><!-- Section 2 Bloc gauche-->
            <div class="col-xs-12 col-sm-6 col-lg-6"><!-- Picture 1-->
            <img src="images/cadre.jpg" alt="image" height="500px">
            </div>
    </section> 


    <section><!-- Section 2 Bloc droit-->
        <div class="col-xs-12 col-sm-6 col-lg-6"><!-- Picture 2 -->
        <img src="images/cadre2.jpg" alt="image" height="130px">
        </div>

        <div class="col-xs-12 col-sm-6 col-lg-6"><!-- Lorem -->
        <p>BIENVENUE<br>
                sur la page d'identification de votre Extranet<br> (espace réservé aux adhérents GBAF).<br>
                En vous connectant sur ce site,vous acceptez l'utilisation de cookies à des fins de mesure d'audience.<br> <strong><a href="details.php">En savoir plus</a></strong></p>
        </div>

        <div class="col-xs-12 col-sm-6 col-lg-6"><!-- Form & rester connecté-->
            <form method="post" action="php/execution.php">
                <input  type="text" name="utilisateur" placeholder="Login ou email" required>
                <input type= "password" name= "mot_de_passe" placeholder="Votre mot de passe" minlenght= ="6"  required/><br>
                <input type="checkbox" name="connexion" id="connexion"><p>Rester connecté.</p>
                <!-- <?php if ($error = 'false') {
                     echo '<p font style="color:red;">Mauvais identifiant ou mot de passe !</p>';
                }else{} 
                ?> -->
                <br><input class="envoyer" type= "submit" value=" Valider"/>
            </form>  <br>

        </div>

        <div class="col-xs-12 col-sm-6 col-lg-6"><!-- Nav Links -->
            <nav>
                 <ul>
                    <li><a href="inscription.php" >S'inscrire.</a></li>
                    <li><a href="lost.php" >Mot de passe oublié?.</a></li>
                 </ul>
            </nav>

        </div>

    </section><!-- Fin Section 2 -->

   

  </div><!-- Fin row -->


</div> <!-- Fin de container -->

<div class="container2"> <!-- Container 2 -->
    <div class="footer"><!--  Row 1-->
        <section><!-- Section  Footer -->
                <div class="col-xs-12 col-sm-12 col-lg-12"><!--  -->
                <footer>
                            <p1>Féderation des banques française - CONFIDENTIEL SAUF MENTION CONTRAIRE.Données personnelles - <a href"">Mentions légales</a>
                            <br>elgatodesign@2020</p1><br>
                            <img class="img1" src="images/banque_01.png" height="60px"><img class="img1"src="images/banque_02.png" height="50px"/><img class="img1" src="images/banque_03.png" height="60px"/><img class="img1" src="images/banque_04.png" height="60px"/><img src="images/banque_05.png" height="60px"/><img src="images/banque_07.png" height="60px"/>
                            <!-- Barre defilant avec logo -->
                            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                            <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                            <script type="text/javascript" src="slick/slick.min.js"></script>
                                    
                            <script type="text/javascript">
                            $(document).ready(function(){
                            $('.your-class').slick({
                            setting-name: setting-value
                            });
                            });
                            </script>    
                </footer>
                </div>
         </section>
    </div> 
</div>       
<body>
</html>
