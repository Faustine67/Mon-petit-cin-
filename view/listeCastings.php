<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> castings </p>

<table>
    <thread>
        <tr>
            <th>Film</th>
            <th> Prenom de l'acteur</th>
            <th> Nom de l'acteur</th>
            <th>Role</th>
        </tr>
     </thread>

     <tbody>
        <?php
            foreach ($requete->fetchAll() as $casting){ ?>
            <tr>
                <td><?= $casting["titre"] ?></td>
                <td><?= $casting["acteurNom"] ?></td>
                <td><?= $casting["acteurPrenom"] ?></td>
                <td><?= $casting["roleNom"] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des castings";
    $titre_secondaire= "Liste des castings";
    $contenu = ob_get_clean();
    require "view/template.php";