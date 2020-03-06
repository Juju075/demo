<?php       
    if(isset($_POST['mot_de_passe'], $_POST['utilisateur']) AND !empty($_POST['mot_de_passe'] AND $_POST['utilisateur'])){ 
        
        //Verification login et pass identique 
        $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $req = $bdd->prepare('SELECT mot_de_passe FROM banksters WHERE utilisateur = ?');
        $req->execute(array($_POST['utilisateur']));
        $resultat = $req->fetch();


        //Debugging
        var_dump($resultat);
        echo $_POST['utilisateur'];
        echo $_POST['mot_de_passe'];
        echo $resultat['mot_de_passe'];
        //-----------------------------
        
        // vérifier la correspondance  Parametres: pass saisi vs pass stocke
        $Verif_pass= password_verify($_POST['mot_de_passe'], $resultat['mot_de_passe']);
        $verif_activation;
       
        
        if ($Verif_pass == FALSE) {
            header('location: http://extranet.gbaf.freeprofy.com/?connexion=false');
            
        }    // A faire aussi verification cpt utilisateur activé
        elseif ($Verif_pass == TRUE) {
            session_start();

               //set cookie 
               $login = $_POST['utilisateur'];
               $pass = $resultat['mot_de_passe'];
               setcookie('login', $login, time() * 365*24*3600, null,null,false,true);
               setcookie('pass_hache', $pass, time() * 365*24*3600, null,null,false,true);



                $req_name = $bdd->prepare('SELECT prenom, nom, id_user FROM banksters WHERE utilisateur = ? ');
                $req_name->execute(array($_POST['utilisateur']));
                $name = $req_name->fetchall();
                var_dump($name);

                //Debugging
                var_dump($_SESSION['prenom']);
                echo $prenom[0];
                echo $nomfamille[0];

                $_SESSION['utilisateur'] = $_POST['utilisateur'];
                $_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];
                $_SESSION['prenom'] = $name[0]['prenom'];
                $_SESSION['nom_de_famille'] = $name[0]['nom'];
                $_SESSION['id_user'] = $name[0]['id_user'];

                echo $_SESSION['id_user'];
              
                //Enregistre date de connexion (pour bdd derniere date de connexion.)
                $req_date = $bdd->prepare('UPDATE banksters SET last_connexion = ? WHERE id_user = ?');
                $req_date->execute(array(time(), $name[0]['id_user']));

                header('location: http://extranet.gbaf.freeprofy.com/dashboard.php');
                exit();
        }      
    }//Fin isset 
        echo 'Fin de script';    
?>

