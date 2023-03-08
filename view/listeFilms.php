<?php ob_start(); ?>

<p> Il y a <?php echo $requete->rowCount()
            ?> films </p>
<table>
    <thread>
        <tr>
            <th>Titre</th>
        </tr>
    </thread>
    <tbody>
        <?php
        foreach ($requete->fetchAll() as $film) { ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<p>Ajouter un nouveau film</p>

<form action=index.php?action=addFilm method="post">
    <input type="text" name="titre" maxlength="50">
    <input type="date" name="date_sortie">
    <input type="text" name="synopsis" maxlength="255">
    <input type="integer" name="duree">
    <input type="number" name="note">


    <input type="submit" name="submit" value="Ajouter">


    <?php


    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    $contenu = ob_get_clean();
    require "view/template.php";
