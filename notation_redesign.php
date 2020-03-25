<?php
session_start();

if(isset($_SESSION['id_user']) AND !empty ($_SESSION['id_user'])){
 
    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req_info = $bdd->prepare('SELECT avatar FROM banksters WHERE id_user = ?');
    $req_info->execute(array($_SESSION['id_user']));
    $userData = $req_info->fetch();

    //ajout code
    if (isset($_GET['sort']) AND !empty($_GET['sort'])) {
        $sort = $_GET['sort'];
    }else{
        $sort = 'ASC';
    }

    // echo $sort;


}else{
    header('location: /index.php?c=non_connecte');
}
?>

<!DOCTYPE html/>
<html>
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link rel="icon" href="favicon.ico">
<link href="css/dashboard.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet"> 
<script>
<script>
$(document).ready(function(){
    $("#div3").fadeIn(900);
});
</script>
</head>
<body>
    <div id="main_container"><!-- Main container -->
            <section><!-- Section 1 - 2 rows  - header & Profile -->
            <?php include("header.php"); ?>
            <?php include("middle_section.php"); ?>

                <div><!-- Content 1000 px  1 col-->
                    <article>
                        <div class="bloc_notation">
                            <?php
                                $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                $req_list = $bdd->query('SELECT nom, descriptif, dir_ph_headquarter, compteur_likes, compteur_dislikes FROM etablissements ORDER BY compteur_likes');
                                                              
                                while($tab_fiches = $req_list->fetch()){ 
                            ?>    
                                <table>
                                    <tr>
                                        <th><img src="<?php echo 'images/'. $tab_fiches['dir_ph_headquarter'];?>" width="197px" height="100px" alt="logo_etablissement"/></th>
                                        <th><h1><?php echo $tab_fiches['nom']; ?></h1></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" >                           
                                        <p><?php echo $tab_fiches['descriptif']; ?></p></td>
                                    </tr> 
                                    <tr>
                                        <td><button type="button" onclick="toggle_div(this,'test-1');" title="Afficher la suite">+</button>
                                        <a href="template_details.php?etablissement=<?= $tab_fiches['nom'];?>">Lire la suite</a></td>
                                    </tr>   
                                </table>
                            <?php
                                } // Fin de boucle
                            ?>           
                        </div>    

                    </article>
                </div>

            <?php include("footer.php"); ?>
          
</body>
</html>