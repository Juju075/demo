<?php
//connexion
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// si like et etablissement existe et non null > alors affectation des variables

if(isset($_GET['t'],$_GET['nom']) AND !empty($_GET['t']) AND !empty($_GET['nom'])){

   $getnom = $_GET['nom']; // etablissement
   $gett = (int) $_GET['t']; // like or dislike
   $sessionnom = 5;  // ne pas voter plusieur fois

   $id_user = 5; // int id de session utilisateur 
   $like = 1;
   $reset = 0;

   echo $getnom;
   echo $gett; 

//Requete 1:  Est ce que l'etablissement existe ?
$check = $bdd->prepare('SELECT nom FROM etablissements WHERE nom = ?');
$check->execute(array($getnom));
//manque fetch

if($check->rowCount() == 1){
   echo 'on server l\'etablissement existe.';

   if($gett == 1){
      echo 'Button like a ete clique.';
     
      //DETROMPEUR -----------------------
      // recuperation du tableau des likes user
   
         $check_likes = $bdd->prepare('SELECT likes FROM reviews  WHERE id_user = ? AND nom_etablissemnt = ?');        
         $check_likes->execute(array($id_user, $getnom));

         $tab_likes_user = $check_likes->fetchall();




         var_dump($tab_likes_user);

         echo 'jusqu\'ici tout vas bien ';
         
         // aditionner la somme des likes (norm 0 ou 1)
 
         $nbrs_likes = count($tab_likes_user);



         if (emtpy($nbrs_likes)) {
            //add like
            $ins = $bdd->prepare('INSERT INTO reviews(likes, nom_etablissement, id_user) VALUES (?, ?, ?)');
            $ins->execute(array($like, $getnom, $id_user));

         }elseif ($nbrs_likes == 1) {
            # update deja like en 0
            $req_updt_likes = $bdd->prepare('UPDATE reviews SET likes=? WHERE id_user=? AND nom=?');
            $req_updt_likes->execute(array($reset,$id_user,$getnom));

         }
//Fin detrompeur likes --------------------    


 /* add simple
    // Direct vote sans filtre Insert like ok fonctionne
      
      $ins = $bdd->prepare('INSERT INTO reviews(likes, nom_etablissement, id_user) VALUES (?, ?, ?)');
      $ins->execute(array($like, $getnom, $id_user));
*/  


//*********** 
// COMPTEUR de likes de l'établissement.   
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
        

//*********** 
         echo 'jusqu\'ici tout vas bien ';
         header('location: http://extranet.gbaf.freeprofy.com/notation.php');
  // ---------------------------------------------------------
 }//Fin like  > copy past modif Dislike

   elseif ($gett == 2) {
      echo 'Button dislike a ete clique.';

      $votes = 1;  

      // Ajoute 1 dislike $insertion
      $ins = $bdd->prepare('INSERT INTO reviews(dislikes, nom_etablissement, id_user) VALUES (?, ?, ?)');
      $ins->execute(array($votes, $getnom, $id_user));
  // ---------------------------------------------------------

//*********** 
// COMPTEUR de dislikes de l'établissement.   
         //Requete 3: Recuperer la liste de tous les likes filtre par nom et les aditonner.
         
         $req_dislikes = $bdd->prepare('SELECT dislikes FROM reviews WHERE dislikes AND nom_etablissement = ?');
         $req_dislikes->execute(array($getnom));
         $compteur_dislikes= $req_dislikes->fetchall();

         var_dump($compteur_dislikes);
         // Somme des valeurs retournees. 
         $total = count($compteur_dislikes);
      
         echo 'le total de dislikes est de:' . $total;

         // Stocker le compteur dans etablissement.
         $ins_total = $bdd->prepare('UPDATE etablissements SET compteur_dislikes=? WHERE nom=?');
         $ins_total->execute(array($total,$getnom));

//*********** 
         
         header('location: http://extranet.gbaf.freeprofy.com/notation.php');
  // ---------------------------------------------------------

   }//Fin dislike




















   } // Fin requete 1 
} // Fin isset debut
echo 'C la fin du script.'
?>