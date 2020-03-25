<?php
        //Verification login et pass identique 
        $bdd = new PDO('mysql:host=localhost;dbname=test', 'root' ,'connect', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $req = $bdd->prepare('SELECT utilisateur, mot_de_passe FROM banksters WHERE utilisateur = :utilisateur');
        $req->execute(array(
            'utilisateur' => $_POST['utilisateur']));

        // Fetch Recupere le resultat de l'execution.
        $resultat = $req->fetch();


        var_dump($resultat);


        /*
        // vérifier la correspondance  Parametres: pass saisi vs pass stocke
        $Verif_pass= password_verify($_POST['mot_de_passe'], $resultat['mot_de_passe']);


         
        // si le login ne correspont a rien erreur sinon si le hass correspont 
        if (!$resultat)
        {
            //echo 'Mauvais identifiant ou mot de passe !';    
            $connexion = 'Mauvais identifiant ou mot de passe !';

            //Passe la var dans cookie de 10sec et retour a index
            setcookie(connexion, $connexion,time()+ 10, "/" );
            // header('location: index.php');
        }else
        {   //on autorise la connexion et on peut créer les variables de session.
            if ($Verif_pass) {
                session_start();
                $_SESSION['utilisateur'] = $_POST['utilisateur'];
                $_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];
                // header('location: dashboard.php');
            }
            else {
                //echo 'Mauvais identifiant ou mot de passe !';
                $connexion = 'Mauvais identifiant ou mot de passe !';

            }
        }

        */
        ?>

<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Extranet GBAF ">
<meta name="author" content="Bempime Kheve">
<link rel="icon" href="favicon.ico">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>
    <body>

    <!-- renvoyer sur la page index et afficher grace a un cokies duree de vie 10sec -->
        <?php echo "<p>" . $connexion . "</p>";?>
    </body>
</html>

