<?php
ob_start();
$realisateur = $requete->fetch();
?>

<h1><?= $realisateur["prenom"] ?> <?= $realisateur["nom"] ?></h1>
<img src="<?= $realisateur["photo"] ?>">


<h2> Filmographie </h2>
<table>
    <tr>
        <th>Film</th>
        <th>Synopsis</th>
        <th>Genre </th>
        <th>Date de sortie </th>
    <tr>

        <?php
        foreach ($realisation->fetchAll() as $real) { ?>
    <tr>
        <td><?= $real["titre"] ?></td>
        <td><?= $real["synopsis"] ?></td>
        <td><?= $real["libelle"] ?></td>
        <td><?= $real["date_sortie"] ?></td>
    </tr>
<?php } ?>
</table>

<?php

$titre = "Details des realisateurs";
$titre_secondaire = "Details des realisateurs";
$contenu = ob_get_clean();
require "view/template.php";
