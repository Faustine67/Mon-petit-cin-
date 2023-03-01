<?php ob_start(); ?>
<p> Il y a <?= $requete->rowCount() ?> films </p>
<table>
    <thread>
        <tr>
            <th>Titre</th>
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
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                <td><?= $film["date_sortie"] ?></td>
                <td><?=$film["duree"]?></td>
                <td><?=$film["libelle"]?></td>
                <td><?=$film["synopsis"]?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des films";
    $titre_secondaire= "Liste des films";
    $contenu = ob_get_clean();
    require "view/template.php";