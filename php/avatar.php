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

   //Crop image si taille superieur hauteur ou largeur
   //imagecrop($_FILES['avatar']['tmp_name'], array());


   if($_FILES['avatar']['size'] <= $tailleMax){ // fichier dans le serveur temp
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      echo $extensionUpload; // ok jpg
      echo '<pre>';
      print_r($_FILES);
   
      if(in_array($extensionUpload, $extensionsValides)){
   
         //Changer le fichier de nom et lui indique la direction
         $path = $_SERVER['DOCUMENT_ROOT'] . "/images/avatar/" . $_SESSION['id_user'] . "." . $extensionUpload;
         $temporaire = $_FILES['avatar']['tmp_name'];
         echo 'Dossier de destination:'; 
         echo '<pre>';
         echo $path;
         echo '<pre>';

         $test_Upload = move_uploaded_file($temporaire, $path);
         //au dessus ok verfie
         echo 'Retour bool move_uploaded_file:'; 
         echo '<pre>'; 
         var_dump($test_Upload);
         echo '<pre>';

         if($test_Upload){ // Fichier transfere

            echo "Le fichier est valide, et a été téléchargé
            avec succès. Voici plus d'informations :\n";
            $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $updateAvatar = $bdd->prepare('UPDATE banksters SET avatar = :avatar WHERE id_user = :id_user');
            $updateAvatar->execute(array(
               //id_user.jpg
               'avatar' => $_SESSION['id_user'].".".$extensionUpload,
               'id_user' => $_SESSION['id_user']));
               header('Location: /profile.php');
         }else{
            header('Location: /profile.php?error=import');
         }
      }else{
         header('Location: /profile.php?error=extension');
      }
   }else{
      header('Location: /profile.php?error=size');
   }

echo 'Fin du script';
 }
?>