<header class="section_header center"><!-- Section header -->

    <div class="row_container space-around"> <!-- 1 ROW -->

        <div class="item auto four">
            <img src="images/dashboard_logo1.jpg" alt="image_logo">
        </div>  
        <div class="item display"><!-- A faire disparaitre en mobile -->
            <img src="images/dashboard_logo2.jpg" alt="image_logo">
        </div>

        <div class="item none display1">
            <nav>
                <ul>
                <li><a href="log_out.php">Deconnexion</a><li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row_container center"> <!-- 1 ROW -->

        <div class="item none display4">
            <img src="images/avatar/<?php echo $userData['avatar'];?>" class="avatar" alt="image_avatar"/>
        </div>

        <div class="item  four">
            <p class="font_size_1">Bonjour, <?php echo ucfirst($_SESSION['prenom']) . ' ' . ucfirst($_SESSION['nom_de_famille']); ?></p>
            <p class="font_size_2">Dernière date de connexion:<br>
            <? 
                $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $req_connexion = $bdd->prepare('SELECT last_connexion FROM banksters WHERE id_user = ?');
                $req_connexion->execute(array($_SESSION['id_user']));
                $last_connexion = $req_connexion->fetch();
                echo $last_connexion['last_connexion'];
            ?>
            </p>
        </div>

    </div><!-- Fin section header-->

</header>  <!-- Fin section header--> 