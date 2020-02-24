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
       

        if ($Verif_pass == FALSE) {
            header('location: http://extranet.gbaf.freeprofy.com/?connexion=false');
            
        }elseif ($Verif_pass == TRUE) {
            session_start();
                /*$_SESSION['utilisateur'] = $_POST['utilisateur'];
                $_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];*/


                
                $req_prenom = $bdd->prepare('SELECT prenom FROM banksters WHERE utilisateur = ? ');
                $req_prenom->execute(array($_SESSION['utilisateur']));
                $prenom = $req_prenom->fetch();
                
                
                
                $req_nom_de_famille = $bdd->prepare('SELECT nom FROM banksters WHERE utilisateur = ? ');
                $req_nom_de_famille->execute(array($_SESSION['utilisateur']));
                $nomfamille = $req_nom_de_famille->fetch();
                
                //Debuging
                var_dump($_SESSION['prenom']);
                echo $prenom[0];
                echo $nomfamille[0];

                $_SESSION['utilisateur'] = $_POST['utilisateur'];
                $_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];
                $_SESSION['prenom'] = $prenom[0];
                $_SESSION['nom_de_famille'] = $nomfamille[0];

                //Enregistre date de connexion (pour bdd derniere date de connexion.)












                header('location: http://extranet.gbaf.freeprofy.com/dashboard.php');
                exit;
        }
        
    }//Fin isset 
        echo 'Fin de script ok php file'; 
    
        ?>

