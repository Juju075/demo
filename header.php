<section><!-- Section header -->

        <div class="header"><!-- 1 row --> 

            <div><!-- 1 item - logo st -->
                <img src="images/dashboard_logo.jpg">
            </div>

            <div><!-- 2 nd item - Profile Deconnexion -->
                <nav>
                    <ul>
                        <li><a href="profile.php">Mon profile</a>&nbsp;<a href="log_out.php">Deconnexion</a><li>
                    </ul>
                </nav>
            </div> 

        </div>
        <div class="profile">    <!-- 1 row --> 

                    <div class="">
                        <img src="images/avatar/<?php echo $userData['avatar'];?>" class="avatar"/>
                    </div>

            <div>
                <p>Bonjour, <?php echo ucfirst($_SESSION['prenom']) . ' ' . ucfirst($_SESSION['nom_de_famille']); ?></p>
                <p>Dernière date de connexion:<? echo $mess_user; ?></p>
                <p>Message(s) non lu:<? echo $mess_user_pending; ?></p>    
            </div>

            <div class="icones"><!-- Icones quieries-->
                <a href="profile.php"><img src="images/icon_01.png" width="60px" height="60px"/></a>
                <a href="notation.php?rank=ASC"><img src="images/icon_02.png" width="60px" height="60px"/></a>
                <a href="notation.php?rank=DESC"><img src="images/icon_03.png" width="60px" height="60px"/></a>
                
                <a href="#"><img src="images/icon_04.png" width="60px" height="60px"/></a>
                <a href="#"><img src="images/icon_05.png"width="60px" height="60px"/></a>  
            </div>
            <div class="icones1">
                <nav>
                    <ul>
                        <li><a href="#">Meilleurs commentaire.</a></li>
                        <li><a href="#">Croissant</a></li>
                        <li><a href="#">Decroissant</a></li>
                        <li><a href="#">Fromage</a></li>
                        <li><a href="#">Dossier</a></li>
                    </ul>
                </nav>
            </div>
        </div> 
        <hr class="icones1" size="2" width="90%" color="red">
    </section>  <!-- Fin section header--> 
