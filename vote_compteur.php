    <? 
    $getnom = $_GET['etablissement'];

    //Comptabilise tous les dislikes de l'etablissemnt > Maj Compteur. 
    $req_dislikes = $bdd->prepare('SELECT dislikes FROM reviews WHERE dislikes AND nom_etablissement = ?');
    $req_dislikes->execute(array($getnom));
    $compteur_dislikes= $req_dislikes->fetchall();

    var_dump($compteur_dislikes);
  
// Somme des valeurs retournees. 
    $total_dislikes = count($compteur_dislikes);

    echo 'le total de dislikes est de:' . $total_dislikes;
    echo '<pre>';
  
    //Comptabilise tous les likes de l'etablissemnt > Maj Compteur.
    $req_likes = $bdd->prepare('SELECT likes FROM reviews WHERE likes AND nom_etablissement = ?');
    $req_likes->execute(array($getnom));
    $compteur_likes= $req_likes->fetchall();

    var_dump($compteur_likes);
    echo '<pre>';
    
// Somme des valeurs retournees. 
    $total_likes = count($compteur_likes);

    echo 'le total de likes est de:' . $total_likes;
    echo '<pre>';
    ?>