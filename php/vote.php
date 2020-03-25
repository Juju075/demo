<?php
session_start();
echo $_SESSION['id_user'];
echo '<pre>';
echo $_GET['nom'];
echo '<pre>';
echo $_GET['t'];
echo '<pre>';

if(isset($_GET['t'], $_GET['nom']) AND !empty($_GET['t']) AND !empty($_GET['nom'])){ 
   $getnom = $_GET['nom'];
   $id_user = $_SESSION['id_user'];
   $gett = (int) $_GET['t'];
   
   //Est ce que l'etablissement existe
   $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   $check = $bdd->prepare('SELECT id FROM etablissements WHERE nom = ?');
   $check->execute(array($getnom));

   if($check->rowCount() == 1) { // Like
   
      echo 'l\'etablissement existe';
      echo '<pre>';
      
      echo '<pre>';

      if($gett == 1) { // On a cliqué sur like verif si deja like ajoute ou delet like
         echo 'bouton like a ete clique';
         echo '<pre>';

         //verifie si deja like cet etablissement.
         $check_like = $bdd->prepare('SELECT id FROM likes WHERE nom = ? AND id_user = ?');
         $check_like->execute(array($getnom, $id_user));
         //Auto - Compensation delete dislike
         $del = $bdd->prepare('DELETE FROM dislikes WHERE nom = ? AND id_user = ?');
         $del->execute(array($getnom, $id_user));

            if($check_like->rowCount() == 1) { // Double clic - on a deja like donc on efface le like
               $del = $bdd->prepare('DELETE FROM likes WHERE nom = ? AND id_user = ?');
               $del->execute(array($getnom, $id_user));   
            }else{ // on a jamais like donc on ajoute le like
               $ins = $bdd->prepare('INSERT INTO likes (nom, id_user) VALUES (?, ?)');
               $ins->execute(array($getnom, $id_user));
            }
            header('location: /template_details.php?etablissement='. $getnom);

      }elseif($gett == 2){ // On a cliqué sur dislike
         echo 'bouton dislike a ete clique';
         echo '<pre>';

         //Verifie si deja dislike cet etablissement.
         $check_dislike = $bdd->prepare('SELECT id FROM dislikes WHERE nom = ? AND id_user = ?');
         $check_dislike->execute(array($getnom,$id_user));
         // Auto - Compensation delete like
         $del = $bdd->prepare('DELETE FROM likes WHERE nom = ? AND id_user = ?');
         $del->execute(array($getnom,$id_user));

            if($check_dislike->rowCount() == 1) { // Double clic - on a deja dislike donc on efface le dislike

               $del = $bdd->prepare('DELETE FROM dislikes WHERE nom = ? AND id_user = ?');
               $del->execute(array($getnom,$id_user));
            }else{
               $ins = $bdd->prepare('INSERT INTO dislikes (nom, id_user) VALUES (?, ?)');
               $ins->execute(array($getnom, $id_user));
            }
            header('location: /template_details.php?etablissement='. $getnom);
         } else {
            echo 'erreur';    
      } 
   }else{
      echo 'l\'etablissement n\'existe pas';
      //impossible erreur lien
      exit('Erreur fatale. <a href="http://127.0.0.1/Tutos_PHP/Articles/">Revenir à l\'accueil</a>');
   }
   echo 'Fin de script';
}
?>