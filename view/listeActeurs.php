<?php ob_start(); ?>

<p> Il y a <?php echo $requete->rowCount()
            ?> acteurs </p>

<h2>Liste des Acteurs</h2>
<table>
    <thread>
        <tr>
            <th>Acteur</th>
        </tr>
    </thread>
    <tbody>
        <?php
        foreach ($requete->fetchAll() as $acteur) {
        ?>
            <tr>
                <td><img src="<?= $acteur["photo"] ?>" name="acteur">
                <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["act"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<p>Ajouter un nouvel acteur : </p>

<form action=index.php?action=addActeur method="post">
    <input type="text" name="nom" maxlength="50" placeholder="Nom">
    <input type="text" name="prenom" maxlength="50" placeholder="Prenom">
    <input type="text" name="sexe" maxlength="5" placeholder="Genre">
    <input type="date" name="date_naissance">
    <div class="formInput">
        <label for="photo" name="photo" id="photo">Photo </label>
            <input type="url" name="photo" id="photo" accept="image/png, image/jpeg">
    </div>
    <input type="submit" name="submit" value="Ajouter">


    <?php

    $titre = "Liste des acteurs";
    $titre_secondaire = "Liste des acteurs";
    $contenu = ob_get_clean();
    require "view/template.php";
