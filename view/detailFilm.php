<?php
ob_start();
$film = $requete->fetch();
?>

<h1><?= $film["titre"] ?></h1>
<img src="<?= $film["affiche"] ?>" alt="affiche">
<p>Réalisateur: <?= $film["nom"] ?> <?= $film["prenom"] ?></p>
<p>Durée:<?= $film["duree"] ?></p>
<p>Date de sortie: <?= $film["date_sortie"] ?></p>
<p>Note:

    <?php
    for ($i = 1; $i <= $film["note"]; $i++) {
        echo "<i class='fa-solid fa-star'></i>";
    }
    for ($a = 1; $a <= 5 - $film["note"]; $a++) {
        echo "<i class='fa-regular fa-star'></i>";
    }
    ?>
<h2>Casting</h2>
<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Role</th>
    </tr>

    <?php
    foreach ($casting->fetchAll() as $casting) { ?>
        <tr>
            <td><?= $casting["acteurNom"] ?></td>
            <td><?= $casting["acteurPrenom"] ?></td>
            <td><?= $casting["roleNom"] ?></td>
        </tr>
    <?php } ?>
</table>

<?php

$titre = "Details des films";
$titre_secondaire = "Details des films";
$contenu = ob_get_clean();
require "view/template.php";
