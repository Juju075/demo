<!DOCTYPE html>
<html lang="fr">
<head>
<title>Mot de passe perdu</title>
<meta charset="utf-8"/>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="container_inscription_lost">
        <h1>Mot de passe perdu.</h1>
        <form method="post" action="php/lost_password.php"> 
            <label for="email">email :</label><br>
            <input type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required/><br><br>           
            <label for="selection_questions">Répondez à la bonne question:</label>
            <br><br>
            <select name="question" id="selection_questions" size="1">
                <option value="">--- Selectionner votre question. ---</option>
                <option value="couleur">Quel est votre couleur préfère?</option>
                <option value="animal">Quel est le nom de votre première animal?</option>
                <option value="chiffre">Quel est votre chiffre préfère?</option>
            </select> 
            <br><br>
            <label for="reponse">Réponse :</label>
            <input type="text" name="reponse" id="reponse" minlength=2 required/>
            <br><br>
            <input type= "submit" value=" Valider"/> 
        </form>
        <p class="center"><a href="index.php"> Je ne souhaite pas envoyer.</a>
        </p>
    </div>
</body>
</html>
