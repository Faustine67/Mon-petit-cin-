<?php 
    ob_start();
    $acteur = $requete->fetch(); 
?>

<h1><?=$acteur["prenom"]?> <?$acteur["nom"]?></h1>
    <p>Photos <p> 
    <p>Genre:<?=$acteur["sexe"]?></p>
    <p>Date de naissance: <?=$acteur["date_naissance"]?></p>

<h2> Filmographie </h2>
<table>
    <tr> 
        <th>Film</th>
        <th>Role</th>
    <tr>
        
<?php
    foreach ($filmographie->fetchAll() as $filmographie){ ?>
        <tr>
            <td><?= $fimographie["titre"] ?></td>
            <td><?= $casting["roleNom"] ?></td>
        </tr>
<?php }?>
</table>

<?php

$titre = "Details des acteurs";
$titre_secondaire= "Details des acteurs";
$contenu = ob_get_clean();
require "view/template.php";