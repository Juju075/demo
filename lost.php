<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset= » utf-8» />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
            <center>
            <h1>Mot de passe perdu.</h1>
           
                <form method="post" action="php/lost_password.php"> 
                    <label for="champ">email :</label><br>
                    <input type="text" name="email" id="id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required/><br><br>
                    <label for="question">Répondez à la bonne question:</label><br><br>
                    <select name="question" size="1"  >
                    <option>Quel est votre couleur préfère?
                    <option>Quel est le nom de votre première animal?
                    <option>Quel est votre chiffre préfère?
                    </select> 
                    <br><br>
                    <label for="reponse">Réponse :</label>
                    <input type="text" name="reponse" id="reponse" minlength=2 required/>
                    <br><br>
                    <input type= "submit" value=" Valider"/> 
                    </form>


                    <p><a href="index.php"> Je ne souhaite pas envoyer.</a></p>
            </center>
        </div>
<body>
</html>
