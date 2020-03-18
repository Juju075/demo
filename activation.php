<?php
session_start();
echo $_GET['log'];
echo '<pre>';
echo $_GET['token'];
echo '<pre>';

if(isset($_GET['log'],$_GET['token']) AND !empty($_GET['log']) AND !empty($_GET['token'])) {

  $utilisateur = htmlspecialchars($_GET['log']);
  $token = htmlspecialchars($_GET['token']);
  
  // Recupere le token bdd pour comparaison.
  $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->prepare('SELECT token, isemailconfirmed FROM banksters WHERE utilisateur = ? ');

    if($req->execute(array($utilisateur)) && $row = $req->fetch()){ // Si la requete fonctionne donc existe
      $isemailconfirmed = $row['isemailconfirmed'];
      $tokenbdd = $row['token']; 

        // On verifie si deja valide 1 ou non 0
        if($isemailconfirmed == '1'){ // cpt deja active 1
          header('location: index.php?c=confirmed'); // cpt deja valide

        }elseif ($isemailconfirmed == 0) {// ok non valide 
            //Verifie le match token

            if($token == $tokenbdd){ // Token identique change statut de cpt de 0 a 1.
              $req = $bdd->prepare('UPDATE banksters SET isemailconfirmed = 1 WHERE utilisateur = ? ');
              $req->execute(array($utilisateur));

              session_start();

              echo 'session start';
              session_start();
              echo '<pre>';


               //set cookie 
               $pass = $_GET['mot_de_passe'];
               setcookie('login', $utilisateur, time() * 365*24*3600, null,null,false,true);
               setcookie('pass_hache', $pass, time() * 365*24*3600, null,null,false,true);

               echo 'jusqu\'ici tout vas bien pre requete';
               echo '<pre>';

               $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
               $req_name = $bdd->prepare('SELECT prenom, nom, id_user FROM banksters WHERE utilisateur = ? ');
               $req_name->execute(array($utilisateur));
               $name = $req_name->fetch();
               var_dump($name);
               echo '<pre>';


                $_SESSION['utilisateur'] = $utilisateur;
                $_SESSION['prenom'] = $name['prenom'];
                $_SESSION['nom_de_famille'] = $name['nom'];
                $_SESSION['id_user'] = $name['id_user'];

                 //Debugging 
                 /*
                echo $_SESSION['utilisateur'];
                echo '<pre>';
                echo $_SESSION['prenom'];
                echo '<pre>';
                echo $_SESSION['nom_de_famille'];
                echo '<pre>';
                echo $_SESSION['id_user'];
                echo '<pre>';
                */


                //enregister la date de connexion
                date_default_timezone_set('Europe/Paris');
                setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
                $last_connexion = ucfirst(strftime('%A %d %B %Y à: %X'));
                var_dump($last_connexion);
                echo '<pre>';

                $req_last_connexion = $bdd->prepare('UPDATE banksters SET last_connexion = ? WHERE utilisateur = ? ');
                $req_last_connexion->execute(array($last_connexion, $_SESSION['utilisateur']));
  
                echo 'Fin de script';
                echo '<pre>';
                header('location: /dashboard.php?m=welcome');

              }// le token ne correspond pas
          }// cpt deja valide
    }//le requete ne fonctionne pas utilisateur 
exit();
}
header('location: index.php?activation=erreur1');
?>