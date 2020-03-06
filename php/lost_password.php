<?php

if(isset($_POST['email'], $_POST['reponse']) AND !empty ($_POST['email']) AND !empty ($_POST['reponse'])){
   
    $email = htmlspecialchars ($_POST['email']);
    $question = htmlspecialchars ($_POST['question']);
    $reponse = htmlspecialchars ($_POST['reponse']);


    echo $email, $question, $reponse;
    echo '<pre>';
    //verifier si utilisateur match avec email 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    
    $req_reponse = $bdd->prepare('SELECT ID, prenom, nom, id_user  FROM banksters WHERE email = ? AND question = ? AND reponse = ?');
    $req_reponse->execute(array($email, $question, $reponse));
    
    echo 'jusqu\'ici tout vas bien 1';
    echo '<pre>';
        if ($req_reponse->rowCount() == 1) {

            //page debut de session
            echo 'jusqu\'ici tout vas bien 2';
            echo '<pre>';
                $check_validite = $req_reponse->fetch();
                var_dump($check_validite);
                echo '<pre>';

                session_start();    
                $_SESSION['id_user'] = $check_validite['id_user'];
                $_SESSION['prenom'] =  $check_validite['prenom'];
                $_SESSION['nom_de_famille'] =  $check_validite['nom'];

              

                header('location: /profile.php?smg=update');
                $smg = 'Changer votre mot de passe';


        }else{
            $error ='Aucun utilisateur ';
        }

 

} echo 'Fin de script';
?>