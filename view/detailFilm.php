<?php 
    ob_start();
    $film = $requete->fetch(); 
?>

<h1><?= $film["titre"] ?></h1>


<?php

$titre = "Details des films";
$titre_secondaire= "Details des films";
$contenu = ob_get_clean();
require "view/template.php";