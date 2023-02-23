<?php ob_start(); ?>

<p class="uk-label uk-label-warning"> Il y a <?= $requete->rowCount() ?> realisateurs </p>

table class= "uk-table uk-table-striped">
    <thread>
        <tr>
            <th>Liste des réalisateurs></th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
     </thread>

     <tbody>
        <?php
            foreach ($requete->fetchAll() as $acteur){ ?>
            <tr>
                <td><?= $realisateur["nom"] ?></td>
                <td><?= $realisateur["prenom"] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des acteurs";
    $titre_secondaire= "Liste des acteurs";
    $contenu = ob_get_clean();
    require "view/template.php";