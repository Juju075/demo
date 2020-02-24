
<?php
session_start();

if (isset($_POST['field']) && !empty($_POST['field']) && !is_null($_POST['field'])) {
	
}

function checkField($name) {
	if (isset($_POST[$name]) && !empty($_POST[$name]) && !is_null($_POST[$name])) {
		return true;
	}
	return false;
}

if (checkField('field')) {
	// OK
}

// Hachage du mot de passe
$pass_hache = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);


$prenom = $_POST['prenom'];
$nom = $_POST['nom'];

$_SESSION['prenom'] = $_POST['prenom'];
$_SESSION['nom_de_famille'] = $_POST['nom'];
$_SESSION['id_user'] = substr(md5($prenom . $nom),-10);
 
echo $id_user;

 

// Insertion 1 ligne user
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('INSERT INTO banksters(prenom, nom, utilisateur, mot_de_passe, id_user, email, adresse, telephone, societe, fonction) VALUES(:prenom, :nom, :utilisateur, :mot_de_passe, :id_user, :email, :adresse, :telephone, :societe, :fonction)');


// array() creation d'un tableau associatif   cle => valeur
$req->execute(array(
	'prenom' => $_POST['prenom'],
	'nom' => $_POST['nom'],
	'utilisateur' => $_POST['utilisateur'],
	'mot_de_passe' => $pass_hache,
	'id_user' => $_SESSION['id_user'],
	'email' => $_POST['email'],
	'adresse' => $_POST['adresse'],
	'telephone' => $_POST['telephone'],
	'societe' => $_POST['societe'],
	'fonction' => $_POST['fonction']));

	echo 'jusqu ici tout vas bien';

	//si insertion ok envoyer a la email verificion
	$email = $_POST['email'];
	header('location: welcome.php?email='.$email);
	exit();

	echo 'fin de script';
?>
