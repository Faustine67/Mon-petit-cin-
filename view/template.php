<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titre?></title>
</head>
<body>
<header>
        <h1> Mon petit ciné </h1>
        <nav>
            <ul>
                <li><a href="view/listeFilms.php">Les films</a></li>
                <li><a href="view/listeActeurs.php">Les acteurs</a></li>
                <li><a href="view/listeRealisateurs.php">Les realisateurs</a></li>
                <li><a href="view/listeCastings.php">Les castings</a></li>
                <li><a href="view/listeGenres.php">Les Genres</a></li>
                <li><a href="view/listeRoles.php">Les Roles</a></li>
            </ul>
        </nav>
    </header>
    <?= $contenu?>
</body>
</html>