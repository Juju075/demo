<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset= » utf-8» />
<link href="css/template.css" rel="stylesheet" type="text/css">
</head>
<body>
    <center>
        <div id="container_etablissement">
            <div class="formulaire">
                <h2>Ajouter un etablissement</h2>
                 <form for="" method="post" action="php/new_ins_etablissement.php">
                         <label for=""></label>
                         <input type="text" name="etablissement" id="" value="ins_etablissement" placeholder="Nom de l'établissement." required/><br><br>
                         <label for=""></label>
                         <textarea type="text" name="ins_descriptif" rows="8" cols="55" id="" placeholder="Saissisez le descriptif de l'etablissement." maxlength="255" required></textarea ><br><br>
                         <label for="">Ajouter une image.</label>
                         <input type="file" id="" name="logo"/>
                         <input type="submit" value="Envoyer le formulaire">
                 </form>
                 <a href="dashboard.php">Retour à l'accueil</a>
            </div>
    </center>
<body>
</html>