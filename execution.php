<?php
        
    if(isset($_POST['mot_de_passe'], $_POST['utilisateur']) AND !empty($_POST['mot_de_passe'] AND $_POST['utilisateur'])){ 
        
        //Verification login et pass identique 
        $bdd = new PDO('mysql:host=localhost;dbname=mon_projet', 'root' ,'connect', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $req = $bdd->prepare('SELECT mot_de_passe FROM banksters WHERE utilisateur = ?');
        $req->execute(array($_POST['utilisateur']));
        $resultat = $req->fetch();

        var_dump($resultat);
        echo $_POST['utilisateur'];
        echo $_POST['mot_de_passe'];
        echo $resultat['mot_de_passe'];
        
        // vérifier la correspondance  Parametres: pass saisi vs pass stocke
        $Verif_pass= password_verify($_POST['mot_de_passe'], $resultat['mot_de_passe']);
       

        if ($Verif_pass == FALSE) {
            echo 'Mauvais identifiant ou mot de passe !'; 
        }elseif ($Verif_pass == TRUE) {
            session_start();
                $_SESSION['utilisateur'] = $_POST['utilisateur'];
                $_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];
                header('location: dashboard.php');
        }
        
    }//Fin isset 
    echo 'Fin de script'; 
        ?>

