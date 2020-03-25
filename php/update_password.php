<?php
session_start();

if (isset($_POST['nouveau_mt_passe']) AND !empty($_POST['nouveau_mt_passe'])) {
    if ($_POST['nouveau_mt_passe'] == $_POST['confirmation_passe']) {
        //creer le nouveau hass
        $pass_hache = password_hash($_POST['nouveau_mt_passe'], PASSWORD_DEFAULT);
        
        // Update hass 
        $bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $upd_pass = $bdd->prepare('UPDATE banksters SET mot_de_passe = ?  WHERE id_user = ?');
        $upd_pass->execute(array($pass_hache, $_SESSION['id_user']));

        header('location: /profile.php?u=updated');
        

    }else{
        // mot de passe ne corresponde pas
        header('location: /profile.php?u=identique');
    } 
}
?>