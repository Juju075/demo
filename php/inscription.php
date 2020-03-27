<!DOCTYPE html>
<html lang="fr">
<head>
<title>Inscription</title>
<meta charset="utf-8"/>
<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
        <div id="container_inscription_lost">
                <h1>Inscription.</h1>   
                        <form method="post" action="php/add_user.php">
                                <label for="prenom">Prénom :</label><br>
                                <input type="text" name="prenom" id="prenom" minlength=3 required/>
                                <br><br>
                                <label for="nom">Nom :</label><br>
                                <input type="text" name="nom" id="nom" minlength=3 required/>
                                <br><br>
                                <label for="utilisateur">Choisissez votre login :</label><br>
                                <input type="text" name="utilisateur" id="utilisateur" minlength=6 required/>
                                <br><br>
                                <label for="mot_de_passe">Mot de passe :</label><br>
                                <input type="password" name="mot_de_passe" id="mot_de_passe" required/><br>
                                <input type="password" name="mot_de_passe_verif" id="mot_de_passe_verif" placeholder="Ressaisissez le mot de passe" required/>
                                <br>
                                <label for="email">email:</label><br>
                                <input type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required/>
                                <br><br>
                                <hr>
                                <br>
                                <p class="center">Veuillez saisir une réponse à l'une<br> des 3 questions de votre choix.</p>
                                <label for="selection_questions">Question secrète (mot de passe perdue.) :</label><br><br>
                                <select name="question" id="selection_questions" size="1">
                                        <option value="">--- Selectionner une question. ---</option>
                                        <option value="couleur">Quel est votre couleur préfère?</option>
                                        <option value="animal">Quel est le nom de votre premier animal?</option>
                                        <option value="chiffre">Quel est votre chiffre préfère?</option>
                                </select> 
                                <br><br>
                                <label for="reponse">Réponse :</label>
                                <input type="text" name="reponse" id="reponse" minlength=2 required/>
                                <br><br>
                                <input type= "submit" value=" Valider"/> 
                        </form>
                <p class="center"><a href="/index.php"> Je ne souhaite pas m'inscrire</a>
                </p>     
        </div>
</body>
</html>
