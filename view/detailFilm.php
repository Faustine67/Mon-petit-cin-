<?php 
    ob_start();
    $film = $requete->fetch(); 
?>

<h1><?= $film["titre"] ?></h1>

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

$titre = "Details des films";
$titre_secondaire= "Details des films";
$contenu = ob_get_clean();
require "view/template.php";