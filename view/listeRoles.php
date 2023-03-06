<?php ob_start(); ?>

<p class="uk-label uk-label-warning"> Il y a <?= $requete->rowCount() ?> roles </p>

<table>
    <thread>
        <tr>
            <th>Liste des Roles</th>
            <th>roles</th>
        </tr>
     </thread>

     <tbody>
        <?php

            foreach ($requete->fetchAll() as $role){ ?>
            <tr>
            <td><a href="index.php?action=detailRoles&id=<?=$role["id_role"]?>"><?=$genre["nom"] ?></a></td>

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