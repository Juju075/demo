<?php
session_start();
echo 'ID User:'; 
echo '<pre>';
echo $_SESSION['id_user'];
echo '<pre>';


// Avatar 
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   echo 'Uploaded temp file:';
   echo '<pre>';
   echo $_FILES['avatar']['name'];
   echo '<pre>';

   if($_FILES['avatar']['size'] <= $tailleMax){ // fichier dans le serveur tem^p
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      echo $extensionUpload; // ok jpg
      echo '<pre>';
      print_r($_FILES);
   
      if(in_array($extensionUpload, $extensionsValides)){

         //Changer le fichier de nom et lui indique la direction
         $path = "/images/avatar/" . $_SESSION['id_user'] . "." . $extensionUpload;
         echo 'Dossier de destination:'; 
         echo '<pre>';
         echo $path;
         echo '<pre>';
         $test_Upload = copy($_FILES['avatar']['tmp_name'], $path);
         //au dessus ok verfie
        echo 'Retour bool move_uploaded_file:'; 
        echo '<pre>'; 
        var_dump($test_Upload);
        echo '<pre>';
         if($test_Upload){

            echo "Le fichier est valide, et a été téléchargé
            avec succès. Voici plus d'informations :\n";
       
            $updateAvatar = $bdd->prepare('UPDATE banksters SET avatar = :avatar WHERE id_user = :id_user');
            $updateAvatar->execute(array(
               //id_user.jpg
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id_user' => $_SESSION['id_user']));
               header('Location: profile.php');
         }else{
            $msg = "Erreur durant l'importation de votre photo de profil";
            echo $msg;
         }
      }else{
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
         echo $msg;
      }
   }else{
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
      echo $msg;
   }

echo 'Fin du script';
 }
?>