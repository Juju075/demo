<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset= » utf-8» />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container" >
            <center>
            <h1>Inscription.</h1>   
           <form method="post" action="add_user.php">
                    <label for="champ">Prénom :</label><br>
                    <input type="text" name="prenom" id="prenom" minlength=3 required/>
                    <br><br>
                    <label for="champ">Nom :</label><br>
                    <input type="text" name="nom" id="nom" minlength=3 required/>
                    <br><br>
                    <label for="champ">Choisissez votre login :</label><br>
                    <input type="text" name="utilisateur" id="utilisateur" minlength=6 required/>
                    <br><br>

                    <label for="champ">Mot de passe :</label><br>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" required/>
                    <input type="password" name="mot_de_passe_verif" id="mot_de_passe_verif" placeholder="Ressaisissez le mot de passe" required/>
                    <br>
                    <label for="champ">email:</label><br>
                    <input type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required/>
                    <br><br>
                    <hr><br>

                    <p>Veuillez saisir une réponse à l'une<br> des 3 questions de votre choix.</p>
                    <label for="question">Question secrete (mot de passe perdue.) :</label><br><br>
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
                    <p><a href="index.php"> Je ne souhaite pas m'inscrire</a></p>     
            </center>
            <script>  
        function mymail() {  
            var em = document.getElementById("email").pattern; 
            document.getElementById("GFG").innerHTML = em;  
        }  
    </script> 
            <!-- Click verification si les deux pass sont didentique si non message -->
        </div>
        <br>

<body>
</html>
