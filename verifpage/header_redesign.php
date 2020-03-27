<section class="section_header"><!-- Section header -->

    <div class="row_container space-around"> <!-- 1 ROW -->

        <div class="item auto four">
            <img src="images/dashboard_logo1.jpg" alt="image_logo">
        </div>  

        <div class="item auto">
            <img src="images/dashboard_logo2.jpg" alt="image_logo">
        </div>

        <div class="item none">
            <nav>
                <ul>
                    <li><a href="log_out.php">Deconnexion</a><li>
                </ul>
            </nav>
        </div>

    </div><!-- Fin container row -->



    <div class="row_container center">
        <div class="item none">
            <img src="images/avatar/<?php echo $userData['avatar'];?>" class="avatar" alt="image_avatar"/>
        </div>
        
        
        <div class="item  four">
        <p>Bonjour, <?php echo ucfirst($_SESSION['prenom']) . ' ' . ucfirst($_SESSION['nom_de_famille']); ?></p>
            <p>Dernière date de connexion:<br><? 
                    $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    $req_connexion = $bdd->prepare('SELECT last_connexion FROM banksters WHERE id_user = ?');
                    $req_connexion->execute(array($_SESSION['id_user']));
                    $last_connexion = $req_connexion->fetch();
                    echo $last_connexion['last_connexion'];
            ?></p>
        </div><!-- Fin section header-->
    </div>

</section>  <!-- Fin section header--> 
 