<?php ob_start(); ?>

<p class="uk-label uk-label-warning"> Il y a <?= $requete->rowCount() ?> films </p>

table class= "uk-table uk-table-striped">
    <thread>
        <tr>
            <th>Titre></th>
            <th>Année de Sortie</th>
            <th> Durée</th>
            <th>Genre</th>
            <th> Synopsis</th>
        </tr>
     </thread>
     <tbody>
        <?php
            foreach ($requete->fetchAll() as $film){ ?>
            <tr>
                <td><?= $film["titre"] ?></td>
                <td><?= $film["annee_sortie"] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des films";
    $titre_secondaire= "Liste des films";
    $contenu = ob_get_clean();
    require "view/template.php";