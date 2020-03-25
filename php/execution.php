<?php       
if(isset($_POST['mot_de_passe'], $_POST['utilisateur']) AND !empty($_POST['mot_de_passe'] AND $_POST['utilisateur'])){ 
    

  
    //Verification login et pass identique 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  
    $req = $bdd->prepare('SELECT mot_de_passe, isemailconfirmed  FROM banksters WHERE utilisateur = ?');
    $req->execute(array($_POST['utilisateur']));
    $resultat = $req->fetch();
    
    echo '<pre>';
    var_dump($resultat);
    
    $Verif_pass = password_verify(htmlspecialchars($_POST['mot_de_passe']), $resultat['mot_de_passe']);

    echo $resultat['isemailconfirmed'];
    echo '<pre>';

    if ($Verif_pass == TRUE && $resultat['isemailconfirmed'] == 1) { // vérifier la correspondance  pass saisi et pass bdd.
        echo '<pre>';
    
        session_start();

               //set cookie 
               $login = htmlspecialchars($_POST['utilisateur']);
               $pass = $_POST['mot_de_passe'];
               setcookie('login', $login, time() * 365*24*3600, null,null,false,true);
               setcookie('pass_hache', $pass, time() * 365*24*3600, null,null,false,true);

                $req_name = $bdd->prepare('SELECT prenom, nom, id_user FROM banksters WHERE utilisateur = ? ');
                $req_name->execute(array($login));
                $name = $req_name->fetchall();
                var_dump($name);

                //Debugging
                var_dump($_SESSION['prenom']);

                echo '<pre>';

                $_SESSION['utilisateur'] = $login;
                $_SESSION['mot_de_passe'] = $pass;
                $_SESSION['prenom'] = $name[0]['prenom'];
                $_SESSION['nom_de_famille'] = $name[0]['nom'];
                $_SESSION['id_user'] = $name[0]['id_user'];



                //enregister la date de connexion
                date_default_timezone_set('Europe/Paris');
                setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
                $last_connexion = ucfirst(strftime('%A %d %B %Y à: %X'));
                var_dump($last_connexion);

                $req_last_connexion = $bdd->prepare('UPDATE banksters SET last_connexion = ? WHERE utilisateur = ? ');
                $req_last_connexion->execute(array($last_connexion, $_SESSION['utilisateur']));
                echo 'jusquici tout vas bien 1';

                echo $_SESSION['utilisateur'];
                header('location: /dashboard.php');
                
      
    }else{
        $smg = 'Mauvais mot de pass ou login ou cpt non valide.';
        header('location: /index.php?passe=non_valide');
    }
} //Fin isset 
echo 'Fin de script'; 
?>

