<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> realisateurs </p>

<table>
    <thread>
        <tr>
            <th>Liste des réalisateurs</th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
     </thread>

     <tbody>
        <?php 
        $i=0;
            foreach ($requete->fetchAll() as $realisateur){ ?>
            <tr>
                <td> <?= $i++?></td>
                <td><?= $realisateur["nom"] ?></td>
                <td><?= $realisateur["prenom"] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des realisateurs";
    $titre_secondaire= "Liste des realisateurs";
    $contenu = ob_get_clean();
    require "view/template.php";