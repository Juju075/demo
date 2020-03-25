<?php
session_start();

if(isset($_SESSION['id_user']) AND !empty ($_SESSION['id_user'])){
 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req_info = $bdd->prepare('SELECT avatar FROM banksters WHERE id_user = ?');
    $req_info->execute(array($_SESSION['id_user']));
    $userData = $req_info->fetch();

}else{
    header('location: /index.php?c=non_connecte');
}
?>

<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/dashboard.css" rel="stylesheet" type="text/css">
 
<style>
@import url('https://fonts.googleapis.com/css?family=Dosis&display=swap');
</style>
</head>

<body>
<div id="main_container"><!-- Main container -->
        <?php include("header.php"); ?>
        <?php include("middle_section.php"); ?>

            <div class="row"> <!-- Content 1000 px  1 col-->
                <article>
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
                </article>
            </div>

        <?php include("footer.php"); ?>
</body>
</html>