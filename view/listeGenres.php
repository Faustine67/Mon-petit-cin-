<?php ob_start(); ?>
<p > Il y a <?= $requete->rowCount() ?> genres </p>

<h2> Liste des Genres </h2>
<table>
    <thread>
        <tr>
            <th>Genres</th>
        </tr>
     </thread>
     <tbody>
        <?php
            foreach ($requete->fetchAll() as $genre){
        ?>
            <tr>
            <td><a href="index.php?action=detailGenre&id=<?=$genre["id_genre"]?>"><?=$genre["libelle"] ?></a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <p>Ajouter un nouveau genre : </p>

<form action=index.php?action=addGenre method="post">
    <input type="text" name = "libelle" maxlength="50">
    <input type="submit" name = "submit" value="Ajouter">

    <?php

    $titre = "Liste des genre";
    $titre_secondaire= "Liste des genres";
    $contenu = ob_get_clean();
    require "view/template.php";