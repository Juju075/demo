<!-- Debut inclusion inclusion_notation.php-->
<!-- parametre Fade -->
         <div class="bloc_notation" id="div3">






                <table id="position_1">
                        <tr>
                            <p>Classement automatique par likes. Limite caracteres 22 nom 307 desc - Lire la suite page.php genere</p>  
                            <th><img src="<?php echo $tab_fiches[0]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[0]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2" >
                             
                            <p><?php echo $tab_fiches[0]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                            <td><button type="button" onclick="toggle_div(this,'test-1');" title="Afficher la suite">+</button>
                            <a href="template_details.php?etablissement=<?= $tab_fiches[0]['nom'];?>">Lire la suite</a></td>
                            <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[0]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[0]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[0]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[0]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>





                <table id="position_2">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[1]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[1]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[1]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[1]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[1]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[1]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[1]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_3">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[2]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[2]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[2]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[2]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[2]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[2]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[2]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_4">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[3]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[3]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[3]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[3]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[3]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[3]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[3]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_5">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[4]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[4]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[4]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[4]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[4]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[4]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[4]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_6">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[5]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[5]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[5]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[5]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[5]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[5]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[5]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_7">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[6]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[6]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[6]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[6]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[6]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[6]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[6]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_8">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[7]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[7]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[7]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[7]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[7]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[7]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[7]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_9">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[8]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[8]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[8]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[8]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[8]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[8]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[8]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>
                <table id="position_10">
                        <tr>
                            <th><img src="<?php echo $tab_fiches[9]['dir_logo'];?>"/></th>
                            <th><h1><?php echo $tab_fiches[9]['nom']; ?></h1></th>
                        </tr>
                        <tr>
                            <td colspan="2"><p><?php echo $tab_fiches[9]['descriptif']; ?></p></td>
                        </tr> 
                        <tr>
                        <td><a href="php/vote.php?t=1&nom=<?= $tab_fiches[9]['nom']; ?>"> J'aime: </a><?php echo '<p>('. $tab_fiches[9]['compteur_likes'] .')</p>'?> - 
                            <a href="php/vote.php?t=2&nom=<?= $tab_fiches[9]['nom']; ?>">Je n'aime pas:</a><?php echo '<p>('. $tab_fiches[9]['compteur_dislikes'] .')</p>'?></td>
                        </tr>   
                </table>

                
        </div>     
         <!-- Fin inclusion -->
