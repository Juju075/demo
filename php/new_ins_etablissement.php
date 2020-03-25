<?php
session_start();
echo $_FILES['image']['name'];
echo '<pre>';

if(isset($_POST['etablissement'],$_POST['descriptif'],$_FILES['image']) AND !empty ($_POST['etablissement']) AND !empty ($_POST['descriptif'] AND !empty($_FILES['image']['name']))){

    $get_nom = htmlspecialchars($_POST['etablissement']);
    echo '<pre>';
    $get_descriptif = htmlspecialchars($_POST['descriptif']);

    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $check_etablissement = $bdd->prepare('SELECT id FROM etablissements WHERE nom = ?');
    $check_etablissement->execute(array($get_nom));

    echo $get_nom;

    //verifier si l'etablissement existe deja
    if ($check_etablissement->rowCount() == 1) {// Etablissement existe deja ne rien faire
        echo 'l\'etablissement existe déjà';
        $req_add_descriptif = $bdd->prepare('UPDATE etablissements SET descriptifs = ? WHERE  nom_etablissement = ? ');
        $req_add_descriptif->execute(array($get_descriptif, $get_nom));

        //header('location: /template_details.php?etablissement='.$get_nom);
    
    }elseif ($check_etablissement->rowCount() == null) { //l'etablissement n'existe pas
        echo 'l\'etablissement  n\'existe pas deja';  
        echo 'jusqu\'ici tous vas bien 2';
        echo '<pre>';
    
            //Traitement image
            $tailleMax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
            echo 'Uploaded temp file:';
            echo '<pre>';
            echo $_FILES['image']['name'];
            echo '<pre>';
        
                if($_FILES['image']['size'] <= $tailleMax){ // fichier dans le serveur temp
                    $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));

                    echo $extensionUpload; // ok jpg
                    echo '<pre>';
                    print_r($_FILES);
                    echo 'jusqu\'ici tous vas bien image temporaire';
                    echo '<pre>';
                
                    if(in_array($extensionUpload, $extensionsValides)){
                    echo 'ok extension valide';
                    echo '<pre>';
                        //Changer le fichier de nom et lui indique la direction

                        $rename = $get_nom . "_" . $_SESSION['id_user'];
                        
                        echo  $rename;
                        echo '<pre>';
                    
                        $path = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $rename . "." . $extensionUpload;
                        $temporaire = $_FILES['image']['tmp_name'];
                        echo 'Dossier de destination:'; 
                        echo '<pre>';
                        echo $path;
                        echo '<pre>';
                        echo 'jusqu\'ici tous vas bien 1';
                        
                        $test_Upload = move_uploaded_file($temporaire, $path);
                        //au dessus ok verfie
                        echo 'Retour bool move_uploaded_file:'; 
                        echo '<pre>'; 
                        var_dump($test_Upload);
                        echo '<pre>'; 
                        //ok telechargement path ok

                   
                        if($test_Upload){ // Fichier transfere
                        
                            echo "Le fichier est valide, et a été téléchargé
                            avec succès. Voici plus d'informations :\n";
                        
                            $def_rename = $rename . "." . $extensionUpload;
                            echo $def_rename;
                            echo '<pre>'; 
                        
                            $add_etab = $bdd->prepare('INSERT INTO etablissements(nom, descriptif, dir_ph_headquarter) VALUES (?, ?, ?)');
                            $add_etab->execute(array($get_nom, $get_descriptif, $def_rename));

                            header('location: /template_details.php?etablissement='.$get_nom);
                       
                            }else{// erreur importation fichier 
                                header('Location: /add_etablissement.php?error=import');
                            }

                    }else{ // erreur extension non supporte
                        header('Location: /add_etablissement.php?error=support');
                    }   

                }else{ // erreur taille trop grand
                    header('Location: /add_etablissement.php?error=size');
                } 
    }
echo 'Fin du script';
}//Fin script
?>