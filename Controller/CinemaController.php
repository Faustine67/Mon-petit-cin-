<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    /**
     * Lister les films
     */
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT titre, synopsis, duree, note, date_sortie FROM film
            ");
            require "view/listFilms.php";
    }   
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom, prenom, sexe, date_naissance FROM acteur
            ");
        require "view/listActeurs.php";
    }
    public function listRealisateurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom, prenom FROM realisateur
        ");
        require "view/listRealisateur.php";
    }
    public function listRoles() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom FROM role
        ");
        require "view/listRoles.php";
    }

    public function listGenres() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT libelle FROM genre
        ");
        require "view/listGenres.php";
    }
}