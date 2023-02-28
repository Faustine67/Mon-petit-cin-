<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title><?=$titre?></title>
</head>
<body>
<header>
        <h1> Mon petit ciné </h1>
        <nav>
            <ul>
                <li><a href="index.php?action=listFilms">Les films</a></li>
                <li><a href="index.php?action=listActeurs">Les acteurs</a></li>
                <li><a href="index.php?action=listRealisateurs">Les realisateurs</a></li>
                <li><a href="index.php?action=listCastings">Les castings</a></li>
                <li><a href="index.php?action=listGenres">Les Genres</a></li>
                <li><a href="index.php?action=listRoles">Les Roles</a></li>
            </ul>
        </nav>
    </header>
    <?= $contenu?>
</body>
</html>