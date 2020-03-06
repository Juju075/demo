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

    //var_dump($details_etablissement);

 
    //Requete comments rajouter condition comment non null
    $req_comments = $bdd->prepare('SELECT id_user, comments, date_added FROM reviews  WHERE nom_etablissement = ? AND comments IS NOT NULL');
    $req_comments->execute(array($nom));
    //$list_comments = $req_comments->fetch();

    //var_dump($list_comments);
    
    //echo 'jusquici tout vas bien';


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
<link href="css/test_template.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="container">

        <div class="bloc_elements"> 
            <div class="elements">
                <div><h1><?php echo $details_etablissement[0]['nom']; ?></h1></div>
                <div><img src="<?php echo 'images/'. $details_etablissement[0]['dir_ph_headquarter'];?>"/></div>
                <p><?php echo $details_etablissement[0]['descriptif']; ?></p>

                <div class="vote"> <!-- 1 row -->         
                    <div><!-- Likes -->
                    <a href="php/vote.php?t=1&nom=<?= $details_etablissement[0]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $details_etablissement[0]['compteur_likes'] .')</p>'?> - 
                    </div>

                    <div><!-- Dislikes -->
                    <a href="php/vote.php?t=2&nom=<?= $details_etablissement[0]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $details_etablissement[0]['compteur_dislikes'] .')</p>'?> 
                    </div>
                </div>
                
        </div> 

            <section class="elements">    
                

     

                <div> 
                    <a href="add_etablissement.php" ><button class="button">Ajouter un etablissement</button></a><br>
                    <a href="dashboard.php">Retour à l'accueil.</a><br>
                </div>
                <img src="images/comment.png"/>
                
                </table>

                <div><!--Bloc avatar prenom et comment genere -->  
                    <?php
                        if(isset($_GET['etablissement']) AND !empty($_GET['etablissement'])){
                            while ($list_comments = $req_comments->fetch()) {

                                //Ajouter condition si comment non null

                                //var_dump($list_comments);
                                //Return id_user actuel + comment
                                $id_bankster = $list_comments['id_user'];
                                //echo  $id_bankster;    
                                //echo 'nouvelle ligne';
                                //Requete  prenom et avatar
                                $req_info = $bdd->prepare('SELECT prenom, avatar FROM banksters WHERE id_user = ?');
                                $req_info->execute(array($id_bankster));
                                $userData = $req_info->fetch();
                                //var_dump($userData);   
                                ?>  <!-- Fin commentaire -->
                                
                                <TABLE>
                                    <TR>
                                        <TD  rowspan=2><img src="images/comment_1.png"/></TD>
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
        

                    <form method="post" action="php/add_comment.php?etablissement=<?php echo $nom;?>">
                        <label for="">Ajouter un commentaire ?:</label><br>
                        <textarea type="text" name="comment" rows="5" cols="33" id=""  maxlength="800" required></textarea ><br>
                        <input type="submit" value="Envoyer le commentaire."><!-- submit button --></input>
                    </form>
                </div>
            </section>
        </div>
    </div>

</body>
</html>