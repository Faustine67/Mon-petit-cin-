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
        $i=0;
            foreach ($requete->fetchAll() as $role){ ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $role["nom"] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <?php

    $titre = "Liste des roles";
    $titre_secondaire= "Liste des roles";
    $contenu = ob_get_clean();
    require "view/template.php";