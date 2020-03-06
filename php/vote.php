<?php
session_start();

//connexion
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// si like et etablissement existe et non null > alors affectation des variables

if(isset($_GET['t'],$_GET['nom']) AND !empty($_GET['t']) AND !empty($_GET['nom'])){

   $getnom = $_GET['nom']; // etablissement
   $gett = (int) $_GET['t']; // like or dislike
   $sessionnom = 5;  // ne pas voter plusieur fois

   //$id_user = $_SESSION['id_user']; // int id de session utilisateur 
   $id_user = $_SESSION['id_user'];

   echo $id_user;
   echo $getnom;
   echo $gett; 

   //Requete 1:  Est ce que l'etablissement existe ?
   
   $check = $bdd->prepare('SELECT nom FROM etablissements WHERE nom = ?');
   $check->execute(array($getnom));
   //manque fetch

   if($check->rowCount() == 1){
   echo 'l\'etablissement existe.';

 
      if($gett == 1){
      echo 'Button like a ete clique.';

      //Requete : Est ce qu'une ligne existe pour le duo  user & etablissement.
      $check_likes = $bdd->prepare('SELECT id FROM reviews WHERE id_user = ? AND nom_etablissement = ? ');        
      $check_likes->execute(array($id_user,$getnom));

      $variable = $check_likes->fetchall();
      var_dump($variable);
      // array(0) { } si inexistant

      //
      //DETROMPEUR ----------------------- erreur si n'existe pas


      // Nouveau ok teste
      $req_likes = $bdd->prepare('SELECT likes FROM reviews WHERE id_user = ? AND nom_etablissement = ?');
      $req_likes->execute(array($id_user, $getnom)); 
      $likes = $req_likes->fetchall();
      var_dump($likes); 


         //Nouveau modifier &&
         if ($check_likes->rowCount() == 1 && $likes == 1 ) { 
         echo 'deja vote pour cet etalissement';
         echo $id_user;



               //Requete : ok nbr de like de l'utilisateur.
               $check_votes = $bdd->prepare('SELECT likes FROM reviews WHERE id_user = ? AND nom_etablissement = ? ');        
               $check_votes->execute(array($id_user,$getnom));
               $variable2 = $check_votes->fetchall();
               var_dump($variable2);

               echo "le nombre de like est de:" . $variable2[0]['likes'];
               
               $resultat = $variable2[0]['likes'];
               echo $resultat;
               
               //Si like = 0  +1like alors sinon si like =1 alors update 0
               if ($resultat == 0) {
                  $req_upt_likes = $bdd->prepare('UPDATE reviews SET likes = 1 WHERE nom_etablissement = ? AND id_user = ? ');
                  $req_upt_likes->execute(array($getnom,$id_user));

               }elseif ($resultat == 1) {
                  $req_upt_likes = $bdd->prepare('UPDATE reviews SET likes = 0 WHERE nom_etablissement = ? AND id_user = ? ');
                  $req_upt_likes->execute(array($getnom,$id_user));
               }

         } //Fin vote like bascule 1 ou 0



         //Nouveau adapter $likes ==0
         if ($check_likes->rowCount() == null || $likes == null ) {
            echo 'j\'amais voter pour cet etablissement';
            echo $id_user;
            //ajouter id user et etablissement
            //$likes = 1;
            $ins = $bdd->prepare('INSERT INTO reviews(likes, id_user, nom_etablissement) VALUES (? ,?, ?)');
            $ins->execute(array($likes,$id_user,$getnom));
         }






         // COMPTEUR de likes de l'établissement.  ok fonctionne 
         //Requete 3: Recuperer la liste de tous les likes filtre par nom et les aditonner.

         $req_likes = $bdd->prepare('SELECT likes FROM reviews WHERE likes AND nom_etablissement = ?');
         $req_likes->execute(array($getnom));
         $compteur_likes= $req_likes->fetchall();

         var_dump($compteur_likes);
         // Somme des valeurs retournees. 
         $total = count($compteur_likes);

         echo 'le total de likes est de:' . $total;

         // Stocker le compteur dans etablissement.
         $upt_total = $bdd->prepare('UPDATE etablissements SET compteur_likes=? WHERE nom=?');
         $upt_total->execute(array($total,$getnom));

         echo 'jusqu\'ici tout vas bien ';
         //retour a la derniere page consulte
         header('location: http://extranet.gbaf.freeprofy.com/notation.php?etablissement='. $getnom);
         //header('location: http://extranet.gbaf.freeprofy.com/notation.php');

      }  //Fin Bouton like
//-----------------------------------------------
   if($gett == 2){
         echo 'Button dislike a ete clique.';

         //Requete : Est ce qu'une ligne existe pour le duo  user & etablissement (donc existe dislikes ou disdislikes).
         $check_dislikes = $bdd->prepare('SELECT id FROM reviews WHERE id_user = ? AND nom_etablissement = ? ');        
         $check_dislikes->execute(array($id_user,$getnom));

         $variable = $check_dislikes->fetchall();
         var_dump($variable);
         // array(0) { } si inexistant

         //
         //DETROMPEUR ----------------------- erreur si n'existe pas
         
         // Nouveau ok teste
            $req_dislikes = $bdd->prepare('SELECT likes FROM reviews WHERE id_user = ? AND nom_etablissement = ?');
            $req_dislikes->execute(array($id_user, $getnom)); 
            $dislikes = $req_dislikes->fetchall();
            var_dump($dislikes); 
         
            if ($check_dislikes->rowCount() == 1) { 
            echo 'deja vote pour cet etalissement';

                  //Requete : ok nbr de like de l'utilisateur.
                  $check_votes = $bdd->prepare('SELECT dislikes FROM reviews WHERE id_user = ? AND nom_etablissement = ? ');        
                  $check_votes->execute(array($id_user,$getnom));
                  $variable2 = $check_votes->fetchall();
                  var_dump($variable2);

                  echo "le nombre de dislike est de:" . $variable2[0]['dislikes'];
                  
                  $resultat = $variable2[0]['dislikes'];
                  echo $resultat;
                  
                  //Si like = 0  +1dislike alors sinon si like =1 alors update 0
                  if ($resultat == 0) {
                     $req_upt_dislikes = $bdd->prepare('UPDATE reviews SET dislikes = 1 WHERE nom_etablissement = ? AND id_user = ? ');
                     $req_upt_dislikes->execute(array($getnom,$id_user));

                  }elseif ($resultat == 1) {
                     $req_upt_dislikes = $bdd->prepare('UPDATE reviews SET dislikes = 0 WHERE nom_etablissement = ? AND id_user = ? ');
                     $req_upt_dislikes->execute(array($getnom,$id_user));
                  }

            } //Fin vote dislike bascule 1 ou 0

            if ($check_dislikes->rowCount() == null || $dislikes == null) {
               echo 'j\'amais voter pour cet etablissement';

            //$dislikes = 1;
            $ins = $bdd->prepare('INSERT INTO reviews(dislikes, id_user, nom_etablissement) VALUES (? ,?, ?)');
            $ins->execute(array($dislikes,$id_user,$getnom));
            }


            // COMPTEUR de dislikes de l'établissement.  ok fonctionne 
            //Requete 3: Recuperer la liste de tous les dislikes filtre par nom et les aditonner.

            $req_dislikes = $bdd->prepare('SELECT dislikes FROM reviews WHERE dislikes AND nom_etablissement = ?');
            $req_dislikes->execute(array($getnom));
            $compteur_dislikes= $req_dislikes->fetchall();

            var_dump($compteur_dislikes);
            // Somme des valeurs retournees. 
            $total = count($compteur_dislikes);

            echo 'le total de dislikes est de:' . $total;

            // Stocker le compteur dans etablissement.
            $upt_total = $bdd->prepare('UPDATE etablissements SET compteur_dislikes=? WHERE nom=?');
            $upt_total->execute(array($total,$getnom));

            echo 'jusqu\'ici tout vas bien ';
            //retour a la derniere page consulte
            header('location: http://extranet.gbaf.freeprofy.com/notation.php?etablissement='. $getnom);
            //header('location: http://extranet.gbaf.freeprofy.com/notation.php');

         }  //Fin Bouton dislike
   }  //Fin if 1
}  //Fin de script 
echo 'C la fin du script.';
?>