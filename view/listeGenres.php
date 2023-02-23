<?php ob_start(); ?>

<p class="uk-label uk-label-warning"> Il y a <?= $requete->rowCount() ?> genres </p>

table class= "uk-table uk-table-striped">
    <thread>
        <tr>
            <th>Liste des Genre></th>
            <th>Genre</th>
        </tr>
     </thread>

     <tbody>
        <?php
            foreach ($requete->fetchAll() as $genre){ ?>
            <tr>
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