<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> acteurs </p>

<table>
    <thread>
        <tr>
            <th>Liste des Acteurs</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Genre</th>
            <th>Date de Naissance</th>
        </tr>
     </thread>

     <tbody>
        <?php
            foreach ($requete->fetchAll() as $acteur){ ?>
            <tr>
                <td><a href= "index.php?action=detailActeur&id=<?=$acteur["id_acteur"]?>"<?=$acteur["acteurNom"]?></a></td>
            </tr>
     <?php }?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire= "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
