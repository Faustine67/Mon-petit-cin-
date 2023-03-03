<?php ob_start(); ?>
<p> Il y a <?= $requete->rowCount() ?> films </p>
<table>
    <thread>
        <tr>
            <th>Titre</th>
        </tr>
     </thread>
     <tbody>
        <?php
            foreach ($requete->fetchAll() as $film){ ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"]?>"><?=$film["titre"] ?></a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des films";
    $titre_secondaire= "Liste des films";
    $contenu = ob_get_clean();
    require "view/template.php";