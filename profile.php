<?php
session_start();
$id_user = $_SESSION['id_user'];

$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req_avatar = $bdd->prepare('SELECT avatar FROM banksters WHERE id_user = ?');
$req_avatar->execute(array($id_user));
$user_avatar = $req_avatar->fetch();

//var_dump($user_avatar);
?>



<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/profile.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="link">
    <center><a href="dashboard.php">Retour à l'accueil.</a></center>
  </div>

  <div id="container">

  <div class="bloc_elements">

    <div class="elements">
        <div><h1>Modifier mon profile.</h1><br>
        </div>

        <div>

            <div class="sous_elements">
              <h3><?php echo ucfirst($_SESSION['prenom']); ?></h3>
              <h3><?php echo ucfirst($_SESSION['nom_de_famille']); ?></h3>
            </div>
            <div class="sous_elements"><img src="images/avatar/<?php echo $user_avatar['avatar']; ?>"/></div>

        </div> 
    </div>
      <!--   -->
  </div>

    <div class="bloc_elements">

      <div class="elements">
          <h3>Modifier le mot de passe</h3><br>

          <form method="post" action="user_update.php">
            <label for="nouveau_mt_passe">Nouveau mot de passe:</label>
            <input type="text" name="nouveau_mt_passe" id="" minlength=3 required><br>
            <label for="nouveau_mt_passe">Confirmer le nouveau mot de passe:</label>
            <input type="text" name="confirmation_passe" id="" minlength=3 required><br>
            <input type="submit" value="Envoyer">
          </form>

      </div>

      <div class="elements">
          <h3>Modifier l'avatar.</h3><br>
          <!-- Si avatar est default alors on affiche  -->
          <img src="images/profile.jpg"/><br><br>
          <form method="post" action="php/avatar.php" enctype="multipart/form-data">
            <label>Nom du fichier:</label>
            <input type="hidden" name="size" value="20000">
            <input type="file" name="avatar" id="image"> 
            <input type="submit" value="Telecharger l'image">
          </form>
      </div>
    </div><!-- Fin container  -->
  </div>
<!--  -->
</body>
</html>