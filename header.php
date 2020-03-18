<section><!-- Section header -->

        <div class="header"><!-- 1 row --> 

            <div><!-- 1 item - logo st -->
                <img src="images/dashboard_logo.jpg" alt="image_logo">
            </div>

            <div><!-- 2 nd item - Profile Deconnexion -->
                <nav>
                    <ul>
                        <li><a href="log_out.php">Deconnexion</a><li>
                    </ul>
                </nav>
            </div> 

        </div>
        <div class="profile">    <!-- 1 row --> 

                    <div>
                        <img src="images/avatar/<?php echo $userData['avatar'];?>" class="avatar" alt="image_avatar"/>
                    </div>

            <div>
                <p>Bonjour, <?php echo ucfirst($_SESSION['prenom']) . ' ' . ucfirst($_SESSION['nom_de_famille']); ?></p>
                <p>Dernière date de connexion:<br><? 
                $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $req_connexion = $bdd->prepare('SELECT last_connexion FROM banksters WHERE id_user = ?');
                $req_connexion->execute(array($_SESSION['id_user']));
                $last_connexion = $req_connexion->fetch();
                echo $last_connexion['last_connexion'];
                ?></p>
            </div>

            <div class="icones"><!-- Icones quieries-->
                <a href="profile.php" title="page_profil"><img src="images/icon_01.png" width="62px" height="80px" alt="icone_profil"/></a>
                <a href="notation.php?sort=ASC" title="page_etablissements_decroissant"><img src="images/icon_02.png" width="62px" height="80px" alt="icone_classement_ascendant"/></a>
                <a href="notation.php?sort=DESC"title="page_etablissements_croissant"><img src="images/icon_03.png" width="62px" height="80px" alt="icone_classement_descendant"/></a>
                
                <a href="#"><img src="images/icon_04.png" width="62px" height="80px" alt="icone_defaut"/></a>
                <a href="#"><img src="images/icon_05.png"width="62px" height="80px" alt="icone_messagerie"/></a>  
            </div>
            <div class="icones1">
                <nav>
                    <ul>
                        <li><a href="#" title="page_profil">Profil.</a></li>
                        <li><a href="#" title="page_etablissements_decroissant">Croissant</a></li>
                        <li><a href="#" title="page_etablissements_croissant">Decroissant</a></li>
                        <li><a href="#"title="page_etablissements_stats">Fromage</a></li>
                        <li><a href="#" title="page_messagerie">Dossier</a></li>
                    </ul>
                </nav>
            </div>
        </div> 
        <hr class="icones1" size="2" width="90%" color="red">
    </section>  <!-- Fin section header--> 
