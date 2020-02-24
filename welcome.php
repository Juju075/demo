<?
session_start();
$email= $_GET['email'];

$message = "Bonjour prenom nom. \r\Apres verification de votre appartenence à letablissement x votre compte sera active \r\ Votre login est\: \r\Votre mot de passe est\: \r\  ";
$message = wordwrap($message, 70, "\r\n");
mail($email, 'Votre inscription à Extranet GBAF, $message');

?>

<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset= » utf-8» />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
    <div class="container">
            
            
            <h1>Un email à étè envoyé à <?php echo $_GET['email'] ?>.</h1><br>
            <h4>Vous devez activer votre compte utilisateur avant de pouvoir 
            utiliser ce service.</h4>
           
    <!-- BEGIN: GeoIPView.com IP Locator -->
    <script type="text/javascript" src="https://api.geoipview.com/api.php?t=0&amp;lang=fr&amp;w=280&amp;h=152&amp;bg=ECDDC0&amp;bd=8DADCC&amp;tx=222222&amp;lk=006699"></script><br>
    <noscript><a href="https://fr.geoipview.com" title="Localiser une adresse IP">https://fr.geoipview.com</a></noscript>
    <!-- END: GeoIPView.com IP Locator -->
           
                    <p><a href="index.php"> Page login.</a></p>
            
        </div>
</center>
<body>
</html>