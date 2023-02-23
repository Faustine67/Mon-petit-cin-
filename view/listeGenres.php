<?php ob_start(); ?>
<p > Il y a <?= $requete->rowCount() ?> genres </p>

<table>
    <thread>
        <tr>
            <th>Liste des Genre</th>
            <th>Genre</th>
        </tr>
     </thread>

     <tbody>
        <?php
        $i=0;
            foreach ($requete->fetchAll() as $genre){ ?>
            <tr>
                <td> <?=$i++?></td>
                <td><?= $genre["libelle"] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des genre";
    $titre_secondaire= "Liste des genres";
    $contenu = ob_get_clean();
    require "view/template.php";