<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    <title><?=$titre?></title>
</head>
<body>
<header>
        <h1> Mon petit ciné </h1>
        <div class= "information">
        <button class="accueil" type="button">Accueil</button>
        <button class="compte" type="button">Mon compte</button>
        </div>
        <nav>
            <ul class="horizontal-list">
                <li><a href="index.php?action=listFilms">Les films</a></li>
                <li><a href="index.php?action=listActeurs">Les acteurs</a></li>
                <li><a href="index.php?action=listRealisateurs">Les realisateurs</a></li>
                <li><a href="index.php?action=listGenres">Les Genres</a></li>
            </ul>
        </nav>
</header>
        <main>
      <?= $contenu?>      
        </main>
<main>
</body>
</html>