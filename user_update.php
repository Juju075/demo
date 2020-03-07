<?php
session_start();
if(isset($_FILES['avatar']) AND !empty ($_FILES['avatar']['name'])){
    $tailleMax = 2097152; // restriction taille fichier
    $extentionValides = array('jpg','jpeg','png'); // extension autorise

    if ($_FILES['avatar']['size']<= $tailleMax) {
        //recuperer l'extension du fichier 3 fonctions: mettre tout en minuscule recuperer string a partir de . 
        // soustraire le . du resultat
        $CheckExtension = strtolower(substr(strchr($_FILES['avatar']['name'], '.'),1)); 

        //verification avec les extensions accepter
        if (in_array($CheckExtension, $extentionValides)) {
        //Creer le chemin du dossier cible avec le rename du fichier 
        $path = "images/avatar/" . $_SESSION['id_user'] . '.' . $CheckExtension;  

        //transferer le fichier temporaire dans le dossier cible
        $upload = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
         
            //Si fichier bien transferer dans le dossier cible - on ajoute le link img dans banksters.
            if ($upload) {
            
            $req_avatar = $bdd->prepare('UPDATE banksters SET avatar = :avatar  WHERE id_user = :id_user');
            $req_avatar->execute(array(
            'avatar' => $_SESSION['id_user'] . '.' . $CheckExtension,
            'id_user'=> $_SESSION['id_user']));

            header('location: profile.php');
            }else{
                $msg = 'Probleme lors du transfert'; 
            }
        }else{
            $msg = 'Votre image doit etre en jpg jpeg ou png'; 
        }   
    }else{
        //erreur
        $msg = 'Taille de l\'image trop grande 2 Mo';
    }
}//Fin de script
?>