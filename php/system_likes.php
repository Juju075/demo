	<?php
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(isset($_GET['t'],$_GET['nom']) AND !empty($_GET['t']) AND !empty($_GET['nom'])) {
  
      $getnom = $_GET['nom'];
      $gett = (int) $_GET['t'];

      $id_user = $_SESSION['id_user'];

      //Est ce que l'etablissement existe
      $check = $bdd->prepare('SELECT id FROM etablissements WHERE id_user = ?');
      $check->execute(array($getnom));

      if($check->rowCount() == 1) { // Like

         if($gett == 1) { // On a cliqué sur like

            //est ce qu'on a deja like ? 
            $check_like = $bdd->prepare('SELECT id FROM likes WHERE nom = ? AND id_user = ?');
            $check_like->execute(array($getnom,$id_user));
            $del = $bdd->prepare('DELETE FROM dislikes WHERE nom = ? AND id_user = ?');
            $del->execute(array($getnom,$id_user));

            if($check_like->rowCount() == 1) { // on a deja like donc on efface le like
               $del = $bdd->prepare('DELETE FROM likes WHERE nom = ? AND id_user = ?');
               $del->execute(array($getnom,$id_user));
            } else { // on a jamais like donc on ajoute le like
               $ins = $bdd->prepare('INSERT INTO likes (nom, id_user) VALUES (?, ?)');
               $ins->execute(array($getnom, $id_user));
            }
            
         } elseif($gett == 2) { //Dislike

            $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE nom = ? AND id_user = ?');
            $check_like->execute(array($getnom,$id_user));
            $del = $bdd->prepare('DELETE FROM likes WHERE nom = ? AND id_user = ?');
            $del->execute(array($getnom,$id_user));
            
            if($check_like->rowCount() == 1) {
               $del = $bdd->prepare('DELETE FROM dislikes WHERE nom = ? AND id_user = ?');
               $del->execute(array($getnom,$id_user));
            } else {
               $ins = $bdd->prepare('INSERT INTO dislikes (nom, id_user) VALUES (?, ?)');
               $ins->execute(array($getnom, $id_user));
            }
         }
         header('location: /template_details.php?etablissement='. $getnom);
      } else {
         echo 'erreur';
      }
   } else {
      exit('Erreur fatale. <a href="http://127.0.0.1/Tutos_PHP/Articles/">Revenir à l\'accueil</a>');
}
?>
