<?php ob_start(); ?>

<p class="uk-label uk-label-warning"> Il y a <?= $requete->rowCount() ?> castings </p>

table class= "uk-table uk-table-striped">
    <thread>
        <tr>
            <th>Liste des Castings></th>
            <th>Film</th>
            <th>Acteur</th>
            <th>Role</th>
        </tr>
     </thread>

     <tbody>
        <?php
            foreach ($requete->fetchAll() as $casting){ ?>
            <tr>
                <td><?= $casting["film_id"] ?></td>
                <td><?= $casting["acteur_id"] ?></td>
                <td><?= $casting["role_id"] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des castings";
    $titre_secondaire= "Liste des castings";
    $contenu = ob_get_clean();
    require "view/template.php";