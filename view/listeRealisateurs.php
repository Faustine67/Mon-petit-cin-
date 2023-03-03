<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> realisateurs </p>

<h2> Liste des Realisateurs</h2>
<table>
    <thread>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
     </thread>
     <tbody>
        <?php
            foreach ($requete->fetchAll() as $realisateur){ 
     ?>
            <tr>
            <td><a href= "index.php?action=detailRealisateur&id=<?=$realisateur["id_realisateur"]?>"><?=$realisateur["prenom"]?></a></td>
            <td><a href= "index.php?action=detailRealisateur&id=<?=$realisateur["id_realisateur"]?>"><?=$realisateur["nom"]?></a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des realisateurs";
    $titre_secondaire= "Liste des realisateurs";
    $contenu = ob_get_clean();
    require "view/template.php";