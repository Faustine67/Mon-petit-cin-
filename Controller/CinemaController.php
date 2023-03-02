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
            SELECT id_film, titre, synopsis, duree, note, date_sortie,libelle
            FROM film
            INNER JOIN genre ON film.genre_id = genre.id_genre
            ");
            require "view/listeFilms.php";
    }   
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_acteur ,nom as nomActeur, prenom, sexe, date_naissance 
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

    public function detailFilm($id) {

        $pdo = Connect::seConnecter();
        $requete= $pdo->prepare("
            SELECT f.titre AS titre, f.synopsis, f.duree, f.note,r.nom,r.prenom,g.libelle,date_sortie
            FROM film f
            INNER JOIN realisateur r on f.realisateur_id=r.id_realisateur
            INNER JOIN genre g on f.genre_id=g.id_genre
            WHERE f.id_film = :id_film
        ");
        $requete->execute(["id_film" => $id]);

        $casting=$pdo->prepare("
        SELECT a.nom as acteurNom, a.prenom as acteurPrenom,r.nom as roleNom
        FROM casting c
        INNER JOIN film f ON c.film_id=f.id_film
        INNER JOIN acteur a ON c.acteur_id=a.id_acteur
        INNER JOIN role r ON c.role_id=r.id_role
        WHERE f.id_film = :id_film
        ");
        $casting->execute(["id_film"=> $id]);

        require "view/detailFilm.php";
    }

    public function detailActeur($id){

    $pdo = Connect::seConnecter();
        $requete= $pdo->prepare("
        SELECT a.nom as acteurNom, a.prenom as acteurPrenom, a.sexe, a.date_naissance
        FROM acteur a
        WHERE a.id_acteur = :id_acteur
        ");
        $requete->execute(["id_acteur"=> $id]);
    
        $filmographie=$pdo->prepare("
        SELECT r.nom as roleNom, f.titre
        FROM casting c
        INNER JOIN film f ON c.film_id=f.id_film
        INNER JOIN acteur a ON c.acteur_id=a.id_acteur
        INNER JOIN role r ON c.role_id=r.id_role
        WHERE a.id_acteur = :id_acteur
        ");
        $filmographie->execute(["id_acteur"=> $id]);

        require "view/detailActeur.php";
    }



}