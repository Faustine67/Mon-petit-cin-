<?php 
    ob_start();
    $genre = $requete->fetch(); 
?>

<h1><?=$genre["libelle"]?></h1>
    
<h2> Films de ce genre </h2>
<table>
    <tr> 
        <th>Film</th>
       <th>Synopsis </th>
       <th>Note </th>
       <th>Date de sortie </th>
    <tr>
        
<?php
    foreach ($filmgenre->fetchAll() as $genrefilm){ ?>
        <tr>
            <td><?= $genrefilm["titre"] ?></td>
            <td><?= $genrefilm["synopsis"] ?></td>
            <td><?= $genrefilm["note"] ?></td>
            <td><?= $genrefilm["date_sortie"] ?></td>


        </tr>
<?php }?>
</table>

<?php

$titre = "Details des genres";
$titre_secondaire= "Details des genre";
$contenu = ob_get_clean();
require "view/template.php";