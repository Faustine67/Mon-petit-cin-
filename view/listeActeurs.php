<?php ob_start(); ?>
<p> Il y a <?php echo $requete->rowCount() ?> acteurs </p>

<h2>Liste des Acteurs</h2>
<table>
    <thread>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
     </thread>
     <tbody>
         <?php
            foreach ($requete->fetchAll() as $acteur){   
            ?>
            <tr>
                <td><a href= "index.php?action=detailActeur&id=<?=$acteur["id_acteur"]?>"><?=$acteur["prenom"]?></a></td>
                <td><a href= "index.php?action=detailActeur&id=<?=$acteur["id_acteur"]?>"><?=$acteur["nom"]?></a></td> 
            </tr>
     <?php }?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire= "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
