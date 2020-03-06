<?php
session_start();
if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
    //Affectation
    $nom = $_GET['etablissement'];
    $test= 'ce variable est ok';

    //Requete fiche 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $req_details = $bdd->prepare('SELECT * FROM etablissements  WHERE nom = ?');
    $req_details->execute(array($nom));
    $details_etablissement = $req_details->fetchall();

    var_dump($details_etablissement);

 
    //Requete comments
    $req_comments = $bdd->prepare('SELECT comments FROM reviews  WHERE nom_etablissement = ?');
    $req_comments->execute(array($nom));
    //$list_comments = $req_comments->fetch();

    var_dump($list_comments);
    

}// Fin if
?>
<!DOCTYPE html />
<html>
<head>
<title><?php  ?></title>
<meta charset="utf-8"/>
<meta name="description" content="Extranet GBAF ">
<meta name="author" content="Bempime Kheve">
<link rel="icon" href="favicon.ico">
<link href="css/template.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
    <div><!-- Title -->
        <p><?php echo $details_etablissement[0]['nom']; ?></p>
    </div>
    <div>
    ici logo<!-- Big logo -->
    </div>

    <section><!-- Contenu -->
        <div><!-- Descriptif -->
            <p><?php echo $details_etablissement[0]['descriptif']; ?></p>
        </div>
        <div class="vote"> <!-- 1 row -->
            <div><!-- Likes -->
            <a href="php/vote.php?t=1&nom=<?= $details_etablissement[0]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $details_etablissement[0]['compteur_likes'] .')</p>'?> - 
            </div>

            <div><!-- Dislikes -->
             <a href="php/vote.php?t=2&nom=<?= $details_etablissement[0]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $details_etablissement[0]['compteur_dislikes'] .')</p>'?> 
            </div>
        </div>
    </section>
    <section>
        <div><!-- Add button -->
            <a href="add_etablissement.php" ><button class="button">Ajouter un etablissement</button></a><br>
            <a href="dashboard.php">Retour à l'accueil.</a><br>
        </div>
    </section>
<!-- //////////////////////////////////////////////// -->
    <div><!--While list Comments -->  
     <p>jusqu ici tout vas bien.</p>
        <?php  
            while ($list_comments = $req_comments->fetch()) {
                //Requete interne prenom et avatar
                $id_user = $list_comments[0]['id_user'];
                $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $req_user = $bdd->query('SELECT prenom, avatar FROM reviews WHERE id_user = ?');
                $user_comment = $req_user->execute(array($id_user))
          
        ?>   
       <!-- partie html -->
                    <img/><!-- id_user (avatar) -->
                    <p><?php  echo $user_comment[0]['prenom']; ?></p></p><!-- id_user (prenom) -->
                    <p><?php  echo $list_comments[0]['comments']; ?></p><!-- comment -->
                    <br><br>
        <?php
        }
        //$req_x->closureCursor();
        ?> 
        <br>
        
    </div>
<!-- //////////////////////////////////////////////// -->    
    <div>
        <form method="post" action="php/add_comment.php?etablissement=<?php echo $nom;?>">
            <label for="">Ajouter un commentaire ?:</label><br>
            <textarea type="text" name="etablissement" rows="5" cols="33" id=""  maxlength=""></textarea ><br>
            <input type="submit" value="Envoyer le commentaire."><!-- submit button --></input>
        </form>
    </div>
</div><!-- End of container -->
</body>
</html>

