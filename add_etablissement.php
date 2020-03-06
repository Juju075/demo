<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset= » utf-8» />
<link href="css/template.css" rel="stylesheet" type="text/css">
</head>
<body>
    <center>
        <div>
            <div class="formulaire">
                <h2>Ajouter un etablissement</h2>
                 <form for="" method="post" action="php/new_ins_etablissement.php">
                         <label for="ins_etablissement"></label>
                         <input type="text" name="etablissement" id=""  placeholder="Nom de l'établissement." required/><br><br>
                         <label for="descriptif"></label>
                         <textarea type="text" name="descriptif" rows="8" cols="55" id="" placeholder="Saissisez le descriptif de l'etablissement." required></textarea ><br><br>
                         <label for="">Ajouter une image.</label>
                         <input type="hidden" name="size" value="20000">
                         <input type="file" id="" name="logo"/>
                         <input type="submit" value="Envoyer le formulaire">
                 </form>
                 <a href="dashboard.php">Retour à l'accueil</a>
            </div>
    </center>
<body>
</html>