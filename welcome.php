<!DOCTYPE html>
<html lang="fr">
<head>
<title>ma page</title>
<meta charset="utf-8"/>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
                <div id="container_inscription_lost">
                        <h1>Un email à étè envoyé à</h1> 
                        <h3><?php echo $_GET['email'] ?></h3><br>
                        <h4>Vous devez activer votre compte utilisateur avant de pouvoir 
                        utiliser ce service.
                        </h4>
                                <!-- BEGIN: GeoIPView.com IP Locator -->
                                <script  src="https://api.geoipview.com/api.php?t=0&amp;lang=fr&amp;w=280&amp;h=152&amp;bg=ECDDC0&amp;bd=8DADCC&amp;tx=222222&amp;lk=006699"></script><br>
                                <noscript><a href="https://fr.geoipview.com" title="Localiser une adresse IP">https://fr.geoipview.com</a></noscript>
                                <!-- END: GeoIPView.com IP Locator -->
                        <br>
                        <h3><em>Ps: 2min max constaté...</em></h3>
                        <p><a href="index.php"> Page login.</a></p>
                </div>
</body>
</html>