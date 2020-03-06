<!-- Debut inclusion inclusion_notation.php-->
<!-- parametre Fade -->
         <div class="bloc_notation" id="div3">
         <?php
$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=UTF8', 'dev06' ,'_cxeK9Dt)hkA', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req_list = $bdd->query('SELECT nom, descriptif, dir_logo FROM etablissements');
//$tab_fiches = $req_list->fetch();

while($tab_fiches = $req_list->fetch()){ 
?>    
    <table>
        <tr>
            <p>Classement automatique par likes. Limite caracteres 22 nom 307 desc - Lire la suite page.php genere</p>  
            <th><img src="<?php echo $tab_fiches['dir_logo'];?>"/></th>
            <th><h1><?php echo $tab_fiches['nom']; ?></h1></th>
        </tr>
        <tr>
            <td colspan="2" >                           
            <p><?php echo $tab_fiches['descriptif']; ?></p></td>
        </tr> 
        <tr>
            <td><button type="button" onclick="toggle_div(this,'test-1');" title="Afficher la suite">+</button>
            <a href="template_details.php?etablissement=<?= $tab_fiches['nom'];?>">Lire la suite</a></td>
            <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches['compteur_likes'] .')</p>'?> - 
            <a href="php/vote.php?t=2&nom=<?= $tab_fiches['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches['compteur_dislikes'] .')</p>'?></td>
        </tr>   
    </table>
<?php
} // Fin de boucle
$req_list->closureCursor();
?>           
        </div>     
         <!-- Fin inclusion -->
