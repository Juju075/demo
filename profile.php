<?php
session_start();
if(isset($_SESSION['id_user']) AND !empty ($_SESSION['id_user'])){

    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req_prenom = $bdd->prepare('SELECT prenom FROM banksters WHERE id_user = ? ');
    $req_prenom->execute(array($_SESSION['id_user']));
    $prenom = $req_prenom->fetch();

    $req_nom_de_famille = $bdd->prepare('SELECT nom FROM banksters WHERE id_user = ? ');
    $req_nom_de_famille->execute(array($_SESSION['id_user']));
    $nomfamille = $req_nom_de_famille->fetch();

    $likes = null;

    $req_info = $bdd->prepare('SELECT avatar FROM banksters WHERE id_user = ?');
    $req_info->execute(array($_SESSION['id_user']));
    $userData = $req_info->fetch();

}else{
    header('location: /index.php?c=non_connecte');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/dashboard_redesign_1.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
<style>
</style>
</head>
<body>
    <div id="main_container"> <!-- Main container -->
            <?php include("header_redesign.php"); ?> <!-- ouverture et fermeture section -->
            <?php include("navigation.php"); ?> 
                <div class="row"><!-- Content 1000 px  1 col-->
                    <article>
                        <div class="container">
                            <div class="row_container center"> <!-- 1 Row -->
                                <div class="item">
                                    <h1>Modifier mon profile.</h1>
                                </div>
                            </div> <!-- Fin row -->
                            <div class="row_container space-around"> <!-- 1 Row -->
                                <div class="item"> 
                                        <h3><?php echo ucfirst($_SESSION['prenom']); ?></h3>
                                        <h3><?php echo ucfirst($_SESSION['nom_de_famille']); ?></h3><br>
                                        <p class="erreur"><?php if ($_GET['error'] == 'size') {
                                            echo 'Votre photo de profil ne doit pas dépasser 2Mo.';
                                        }elseif ($_GET['error'] == 'extension') {
                                            echo 'Votre photo de profil doit être au format jpg, jpeg, gif ou png' ;
                                        }elseif ($_GET['error'] == 'import') {
                                            echo "Erreur durant l'importation de votre photo de profil";
                                        }elseif ($_GET['u'] == 'identique') {
                                            echo 'Veuillez saisir de mots de passe identique';
                                        }
                                        ?></p>
                                        <p class="good"><?php if ($_GET['u'] == 'updated'){
                                            echo 'Votre mot de passe à étè modifié';
                                        } ?></p>
                                </div>
                                <div class="item">
                                    <img src="images/avatar/<?php echo $userData['avatar']; ?>" alt="image_avatar" height="120"/>
                                </div>
                            </div> <!-- Fin row -->
                            <div class="row_container space-around"> <!-- 1 Row -->
                                <div class="item"> 
                                    <h3>Modifier le mot de passe</h3><br>
                                        <form method="post" action="php/update_password.php">
                                        <label for="nouveau_mt_passe">Nouveau mot de passe:</label>
                                        <input class="box_limit" type="password" name="nouveau_mt_passe" id="nouveau_mt_passe" minlength=3 required><br>
                                        <label for="nouveau_mt_passe">Confirmer le nouveau mot de passe:</label>
                                        <input class="box_limit" type="password" name="confirmation_passe" id="confirmation_passe" minlength=3 required><br>
                                        <input type="submit" value="Envoyer">
                                        </form><br>
                                        <p class="erreur"><?php if ($_GET['smg'] == 'updated') {
                                        echo 'Votre mot de passe à étè mofifié.';
                                        }elseif ($_GET['smg'] == error) {
                                            echo 'Mots de passe non identique.' ;
                                        }else{} ?></p>
                                </div>
                                <div class="item">
                                        <h3>Modifier l'avatar.</h3><br>
                                        <!-- Si avatar est default alors on affiche  -->
                                        <img src="images/profile.jpg" alt="image_avatar_2"/><br><br>
                                            <form method="post" action="php/avatar.php" enctype="multipart/form-data">
                                                <input type="hidden" name="size" value="20000">
                                                <label for="image">Nom du fichier:</label>
                                                <input type="file" name="avatar" id="image" required/> 
                                                <input type="submit" name="submit" value="Telecharger l'image">
                                            </form>
                                </div>
                            </div> <!-- Fin row --> 
                        </div>
                    </article>
                </div>
            <?php include("footer.php"); ?>
    </div> <!-- rajouter pour erreur w3 validator unclosed div --> 
</body>
</html>