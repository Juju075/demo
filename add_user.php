<?php
session_start();

if(!empty($_POST['email'])){
	$email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // verif si 2 pass correspondent
            if ($_POST["mot_de_passe"] == $_POST["mot_de_passe_verif"] ) {
				echo 'mot de passe identique:';
				
				// Hachage du mot de passe
				$pass_hache = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
				$prenom = ucfirst($_POST['prenom']);
				$nom =ucfirst($_POST['nom']);
			 

				$_SESSION['prenom'] = $_POST['prenom'];
				$_SESSION['nom_de_famille'] = $_POST['nom'];
				$_SESSION['id_user'] = substr(md5($prenom . $nom),-10);
				
				//Generation du token
				$token = md5(microtime(TRUE)*100000);	
				$login = $_POST['login'];
				$utilisateur = $_POST['utilisateur'];
				$isemailconfirmed = 0;
				echo $id_user;
				

				//ajouter avatar link
				$default_avatar = '01.jpg';

				// Insertion 1 ligne user
				$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				$req = $bdd->prepare('INSERT INTO banksters(prenom, nom, utilisateur, mot_de_passe, id_user, email, avatar, question, reponse, token, isemailconfirmed) VALUES(:prenom, :nom, :utilisateur, :mot_de_passe, :id_user, :email, :avatar, :question, :reponse, :token, :isemailconfirmed)');
				$req->execute(array(
					'prenom' => $_POST['prenom'],
					'nom' => $_POST['nom'],
					'utilisateur' => $_POST['utilisateur'],
					'mot_de_passe' => $pass_hache,
					'id_user' => $_SESSION['id_user'],
					'email' => $_POST['email'],
					'avatar' => $default_avatar,
					'question' => $_POST['question'],	
					'reponse' => $_POST['reponse'],		
					'token' => $token,
					'isemailconfirmed' => $isemailconfirmed));

					echo 'jusquici tous vas bien';
				// Préparation du mail contenant le lien d'activation
				$destinataire = $email;
				$sujet = "Extranet CBAF - Activation - no reply" ;
				$entete = "From: http://extranet.gbaf.freeprofy.com" ;
				
				// Le lien d'activation est composé du login(log) et de la clé(cle)
				$message = $nom . ' ' . $prenom . ' ' . 'vous venez de vous inscrire à l\'extranet de la fédération 
				des banques française.
				Pour activer votre compte veuillez cliquer sur le lien ci-dessous:
				ou le copier/coller dans votre navigateur Internet.
				
				http://extranet.gbaf.freeprofy.com/activation.php?log=' . urlencode($utilisateur) .'&token='.urlencode($token) . '
				
				---------------
				
				Cet email est à conserver, il vous permet de vous connecter
				à votre espace adherent et vous permet de recevoir les newsletters selon vos critères.

				Ceci est un email automatique, Merci de ne pas y répondre.
				Si vous avez reçu cet email par erreur veuillez contacter le support technique 
				au 01 45 89 25 15.'
;
				
                echo $message;
				 
				mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail


				//si insertion ok envoyer à la email verificion

				header('location: welcome.php?email='.$email);
				exit();

            }else {
            header('location: inscription.php?pass=error');
            }
    } else {
        header('location: inscription.php?email=error');
    }  
} echo 'fin de script';

?>
