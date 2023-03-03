<?php

use Controller\CinemaController;

spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

$id= (isset($_GET["id"]))? $_GET["id"]: null;
//$type= (isset($_GET["type"]))? $_GET["type"]: null;

if(isset ($_GET["action"])){
    switch($_GET["action"]){

        case "listFilms": $ctrlCinema->listFilms(); break;
        case "listActeurs": $ctrlCinema->listActeurs(); break;
        case "listGenres": $ctrlCinema->listGenres(); break;
        case "listRealisateurs": $ctrlCinema->listRealisateurs(); break;
        case "listRoles": $ctrlCinema->listRoles(); break;
        case "listCastings": $ctrlCinema->listCastings(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "detailActeur" : $ctrlCinema->detailActeur($id); break;
        case "detailRealisateur" : $ctrlCinema->detailRealisateur($id);break;
        case "detailGenre": $ctrlCinema->detailGenre($id);break;
    }
}

else{
    $ctrlCinema->listActeurs();
}

?>