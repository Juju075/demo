<?php
session_start();

//Debut scipt dashboard
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
    
    //insert tableaux
    $req_list = $bdd->query('SELECT nom, descriptif, dir_logo, compteur_likes, compteur_dislikes FROM etablissements');

}else{
    header('location: /index.php?c=non_connecte');
}

//Fin script 1


if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
    //Affectation
    $nom = $_GET['etablissement'];
    $test= 'ce variable est ok';

    //Requete fiche 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $req_details = $bdd->prepare('SELECT * FROM etablissements  WHERE nom = ?');
    $req_details->execute(array($nom));
    $details_etablissement = $req_details->fetchall();

    //var_dump($details_etablissement);

 
    //Requete comments rajouter condition comment non null
    $req_comments = $bdd->prepare('SELECT id_user, comments, date_added FROM reviews  WHERE nom_etablissement = ? AND comments IS NOT NULL');
    $req_comments->execute(array($nom));
    //$list_comments = $req_comments->fetch();

    //var_dump($list_comments);
    
    //echo 'jusquici tout vas bien';


}// Fin script 2
?>


<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=articles;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $id = $article['id'];
      $titre = $article['titre'];
      $contenu = $article['contenu'];
      $likes = $bdd->prepare('SELECT id FROM likes WHERE id_article = ?');
      $likes->execute(array($id));
      $likes = $likes->rowCount();
      $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ?');
      $dislikes->execute(array($id));
      $dislikes = $dislikes->rowCount();
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Erreur');
}
?>

<!DOCTYPE html />
<html>
<head>
<title><?php  ?></title>
<meta charset="utf-8"/>
<meta name="description" content="Extranet GBAF ">
<meta name="author" content="Bempime Kheve">
<link rel="icon" href="favicon.ico">
<link href="css/dashboard.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main_container"><!-- Main container -->
        <?php include("header.php");?>
        <?php include("middle_section.php");?>

            <div> <!-- Content 1000 px  1 col-->
                <article>

                    <div id="grid_container_details">

                        <div>
                            <h1><?php echo $details_etablissement[0]['nom']; ?></h1>
                        </div>

                        <div>
                            <img src="<?php echo 'images/'. $details_etablissement[0]['dir_ph_headquarter'];?>"/>
                        </div>
                        
                        <div>
                            <p><?php echo $details_etablissement[0]['descriptif']; ?></p>
                        </div>
                        
                        <div>
                            <div><!-- Likes -->
                            <a href="php/vote.php?t=1&nom=<?= $details_etablissement[0]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $details_etablissement[0]['compteur_likes'] .')</p>'?> - 
                            </div>

                            <div><!-- Dislikes -->
                            <a href="php/vote.php?t=2&nom=<?= $details_etablissement[0]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $details_etablissement[0]['compteur_dislikes'] .')</p>'?> 
                            </div>
                        </div>

                        <div> <!-- Comments -->
                        
                        <div>
                            <img src="images/comment.png"/>
                        </div>
                            <?php
                            if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
                                while ($list_comments = $req_comments->fetch()) {

                                    $id_bankster = $list_comments['id_user'];

                                    $req_info = $bdd->prepare('SELECT prenom, avatar FROM banksters WHERE id_user = ?');
                                    $req_info->execute(array($id_bankster));
                                    $userData = $req_info->fetch();
                                    //var_dump($userData);   
                                    ?>  <!-- Fin commentaire -->
                                    
                                    <TABLE>
                                        <TR>
                                            <TD rowspan=2><img src="images/comment_1.png"/></TD>
                                            <TD rowspan=2><img src="images/avatar/<?php echo $userData['avatar'];?>" class="avatar"/></TD>
                                            <TD ><p><?php echo $userData['prenom'];?></p></TD>
                                        </TR>
                                        <TR>
                                            <TD><?php echo $list_comments['comments'];?><?php echo $list_comments['date_added'];?></TD>
                            
                                        </TR>
                                    </TABLE>
                                    
                                    <!-- Add comment-->
                                    <?php    
                                    }
                                } 
                            ?><!--Fin boucle --> 
                        </div>

                    <div>
                    <form method="post" action="php/add_comment.php?etablissement=<?php echo $nom;?>">
                        <label for="">Ajouter un commentaire ?:</label><br>
                        <textarea type="text" name="comment" rows="5" cols="33" id=""  maxlength="800" required></textarea ><br>
                        <input type="submit" value="Envoyer le commentaire."><!-- submit button --></input>
                    </form>
                    </div>

                    </div>
                </article>
            </div>  <!-- End of row -->
        <?php include("footer.php");?>
</body>
</html>
