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
            SELECT titre, synopsis, duree, note, date_sortie,libelle
            FROM film
            INNER JOIN genre ON film.genre_id = genre.id_genre
            ");
            require "view/listeFilms.php";
    }   
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT nom, prenom, sexe, date_naissance 
            FROM acteur
            ");
        require "view/listeActeurs.php";
    }
    public function listRealisateurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom, prenom 
        FROM realisateur
        ");
        require "view/listeRealisateurs.php";
    }
    public function listRoles() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom 
        FROM role
        ");
        require "view/listeRoles.php";
    }

    public function listGenres() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT libelle 
        FROM genre
        ");
        require "view/listeGenres.php";
    }
    public function listCastings() {
        $pdo = Connect::seConnecter();
        $requete= $pdo->query("
        SELECT f.titre, a.nom as acteurNom, a.prenom as acteurPrenom, r.nom as roleNom
        FROM casting c
        INNER JOIN film f ON c.film_id=f.id_film
        INNER JOIN acteur a ON c.acteur_id=a.id_acteur
        INNER JOIN role r ON c.role_id=r.id_role
        ");
        require "view/listeCastings.php";
    }
}