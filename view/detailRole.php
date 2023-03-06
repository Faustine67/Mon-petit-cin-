<?php 
    ob_start();
    $role = $requete->fetch(); 
?>

<h1><?=$role["nom"]?></h1>

<h2> Film ayant ce role</h2>
<table>
    <tr> 
        <th>Film</th>
    <tr>
        
<?php
    foreach ($filmrole->fetchAll() as $rolefilm){ ?>
        <tr>
            <td><?= $rolefilm["titre"] ?></td>
        </tr>
<?php }?>
</table>

<?php

$titre = "Details des roles";
$titre_secondaire= "Details des roles";
$contenu = ob_get_clean();
require "view/template.php";