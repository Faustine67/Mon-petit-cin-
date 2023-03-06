<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> roles </p>

<h2>Liste des Roles</h2>
<table>
    <thread>
        <tr>
            <th>Roles</th>
        </tr>
     </thread>
     <tbody>
        <?php

            foreach ($requete->fetchAll() as $role){ ?>
            <tr>
            <td><a href="index.php?action=detailRole&id=<?=$role["id_role"]?>"><?=$role["nom"] ?></a></td>

        <?php }?>
        </tbody>
    </table>
<!--<p>Ajouter un nouveau role : </p> -->

<!-- <form action=index.php?action=addRole method="post">
    <input type="text" name = "nom" maxlength="50">
    <input type="submit" name = "submit" value="Ajouter"> -->

    <?php

    $titre = "Liste des roles";
    $titre_secondaire= "Liste des roles";
    $contenu = ob_get_clean();
    require "view/template.php";