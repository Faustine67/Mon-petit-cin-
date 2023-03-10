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
                <td><img src="<?= $film["affiche"] ?>">
                </td>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<p>Ajouter un nouveau film</p>

<form action=index.php?action=addFilm method="post">
    <input type="text" name="titre" maxlength="50" placeholder="Titre" required>
    <input type="number" name="date_sortie" placeholder="Date de Sortie">
    <textarea type="text" name="synopsis" maxlength="255" placeholder="Synopsis"> </textarea>
    <input type="number" name="duree" placeholder="duree">
    <input type="number" name="note" placeholder="note">
    <select name="realisateur" id="nom">
        <?php
        foreach ($requeteRealisateur->fetchAll() as $realisateur) { ?>
            <option value="<?= $realisateur["id_realisateur"] ?>">
                <a href="index.php?action=listFilm&id=<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["nom"] ?> <?= $realisateur["prenom"] ?></a>
            </option>
        <?php } ?>
    </select>

    <select name="genre" id="libelle">
        <?php
        foreach ($requeteGenre->fetchAll() as $genre) { ?>
            <option value="<?= $genre["id_genre"] ?>">
                <a href="index.php?action=listFilm&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle"] ?> </a>
            </option>
        <?php } ?>
    </select>
    <div class="formInput">
        <label for="affiche" name="affiche" id="affiche">Affiche: </label>
            <input type="url" name="affiche" id="affiche" accept="image/png, image/jpeg">
    </div>

    <input type="submit" name="submit" value="Ajouter">


    <?php


    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    $contenu = ob_get_clean();
    require "view/template.php";
