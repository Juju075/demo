<?php
session_start();

if(isset($_POST['comment'], $_GET['etablissement']) AND !empty($_POST['comment']) AND !empty($_GET['etablissement'])){

    
    $get_nom = htmlspecialchars($_GET['etablissement']);
    $get_comment = htmlspecialchars($_POST['comment']);

    //Check if comment already exist

    $id_user = $_SESSION['id_user'];

    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $check_comment = $bdd->prepare('SELECT id FROM reviews WHERE id_user = ? AND nom_etablissement = ? ');
    $check_comment->execute(array($id_user, $getnom));
     

        if ($check_comment->rowCount() == 1) {// Already in update this one
            echo 'le comment existe déjà';
            $req_add_comment = $bdd->prepare('UPDATE reviews SET comments = ? WHERE id_user = ? AND nom_etablissement = ? ');
            $req_add_comment->execute(array($get_comment, $id_user, $get_nom));

            //header('location: template_details.php?etablissement='.$get_nom);
        
        }elseif ($check_comment->rowCount() == null) { //comment doesnt alr exist put new one
            echo 'le comment n\'existe pas deja';
            $req_add_comment = $bdd->prepare('INSERT INTO reviews(id_user,nom_etablissement, comments) VALUES (?, ?, ?)');
            $req_add_comment->execute(array($id_user, $get_nom, $get_comment));

            header('location: /template_details.php?etablissement='.$get_nom);
        }
}// Fin script

?>  