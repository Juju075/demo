<header class="row">
                <div class="col-lg-8"><!-- Logo -->
                    <a name="haut"></a>
                    <img src="images/dashboard_01.jpg">
                </div>
                <div class="col-lg-4"><!-- Connexion membre -->
                    <nav>
                        <ul>
                            <li><a href="profile.php">Mon profile</a>&nbsp;<a href="">Deconnexion</a><li>
                        </ul>
                    </nav>
                   
                </div><!-- Fin row -->
 </header>
 <div class="row">
                <div class="col-lg-6"><!-- Profile picture -->
                    <img src="images/profile_01.png" width="70px" height="70px"/>
                    <p>Bonjour, <?php echo $_SESSION['prenom'] . ' ' .$_SESSION['nom_de_famille']; ?></p>
                    <p>Derniere date de connexion:<? echo $mess_user; ?></p>
                    <p>Message(s) non lu:<? echo $mess_user_pending; ?></p>   
                </div>
                
            <section>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="?rank=comments"><img src="images/icon_01.png"></a></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="?rank=desc"><img src="images/icon_02.png"></a></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="?rank=insc"><img src="images/icon_03.png"></a></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="#"><img src="images/icon_04.png"></a></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1"><a href="#"><img src="images/icon_05.png"></a></div>
            </section>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    </div>
</div>         
                
            </div><!-- Fin row -->