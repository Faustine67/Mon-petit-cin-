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
                <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["act"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<p>Ajouter un nouvel acteur : </p>

<form action=index.php?action=addActeur method="post">
    <input type="text" name="nom" maxlength="50">
    <input type="text" name="prenom" maxlength="50">
    <input type="text" name="sexe" maxlength="5">
    <input type="date" name="date_naissance">


    <input type="submit" name="submit" value="Ajouter">


    <?php

    $titre = "Liste des acteurs";
    $titre_secondaire = "Liste des acteurs";
    $contenu = ob_get_clean();
    require "view/template.php";
