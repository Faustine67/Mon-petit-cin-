<?php

namespace Controller;

use Model\Connect;

class CinemaController
{

    /**
     * Lister les films
     */
    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, synopsis, duree, note, date_sortie,libelle
            FROM film
            INNER JOIN genre ON film.genre_id = genre.id_genre
            ");

        $requeteRealisateur = $pdo->query("
            SELECT id_realisateur,nom, prenom 
            FROM realisateur
            ");
        $requeteGenre =$pdo->query("
            SELECT id_genre,libelle
            FROM libelle
            ");

        require "view/listeFilms.php";
    }

    public function detailFilm($id)
    {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT f.titre AS titre, f.synopsis, f.duree, f.note,r.nom,r.prenom,g.libelle,date_sortie
            FROM film f
            INNER JOIN realisateur r on f.realisateur_id=r.id_realisateur
            INNER JOIN genre g on f.genre_id=g.id_genre
            WHERE f.id_film = :id_film
        ");
        $requete->execute(["id_film" => $id]);

        $casting = $pdo->prepare("
        SELECT a.nom as acteurNom, a.prenom as acteurPrenom,r.nom as roleNom
        FROM casting c
        INNER JOIN film f ON c.film_id=f.id_film
        INNER JOIN acteur a ON c.acteur_id=a.id_acteur
        INNER JOIN role r ON c.role_id=r.id_role
        WHERE f.id_film = :id_film
        ");
        $casting->execute(["id_film" => $id]);

        require "view/detailFilm.php";
    }
    public function addFilm()
    {
        if (isset($_POST['submit'])) {
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_sortie = filter_input(INPUT_POST, "date_sortie", FILTER_SANITIZE_NUMBER_INT);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT);


            if ($titre && $date_sortie && $synopsis && $duree && $note) {
                $pdo = Connect::seConnecter();
                $sqlQuery =  "INSERT INTO film (titre,date_sortie,synopsis,duree,note)
                VALUES (:titre,:date_sortie,:synopsis,:duree,:note)";

                $requete = $pdo->prepare($sqlQuery);
                $requete->execute([
                    'titre' => $titre,
                    'date_sortie' => $date_sortie,
                    'synopsis' => $synopsis,
                    'duree' => $duree,
                    'note' => $note
                ]);
            }
        }

        self::listFilms();
    }


    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_acteur ,CONCAT(nom , ' ', prenom) AS act, sexe, date_naissance 
            FROM acteur
            ");
        require "view/listeActeurs.php";
    }

    public function detailActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT a.nom as acteurNom, a.prenom as acteurPrenom, a.sexe, a.date_naissance
        FROM acteur a
        WHERE a.id_acteur = :id_acteur
        ");
        $requete->execute(["id_acteur" => $id]);

        $filmographie = $pdo->prepare("
        SELECT r.nom as roleNom, f.titre
        FROM casting c
        INNER JOIN film f ON c.film_id=f.id_film
        INNER JOIN acteur a ON c.acteur_id=a.id_acteur
        INNER JOIN role r ON c.role_id=r.id_role
        WHERE a.id_acteur = :id_acteur
        ");
        $filmographie->execute(["id_acteur" => $id]);

        require "view/detailActeur.php";
    }

    public function addActeur()
    {
        if (isset($_POST['submit'])) {

            $nom_acteur = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom_acteur = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe_acteur = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_NUMBER_INT);


            if ($nom_acteur && $prenom_acteur && $sexe_acteur && $date_naissance) {

                $pdo = Connect::seConnecter();
                $sqlQuery =  "INSERT INTO acteur (nom,prenom,sexe,date_naissance)
                VALUES (:nom,:prenom,:sexe,:date_naissance)";

                $requete = $pdo->prepare($sqlQuery);
                $requete->execute(['nom' => $nom_acteur, 'prenom' => $prenom_acteur, 'sexe' => $sexe_acteur, 'date_naissance' => $date_naissance]);
            }
        }

        self::listActeurs();
    }

    public function listRealisateurs()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_realisateur,nom, prenom 
        FROM realisateur
        ");
        require "view/listeRealisateurs.php";
    }

    public function detailRealisateur($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT r.nom, r.prenom
        FROM realisateur r
        WHERE r.id_realisateur = :id_realisateur
        ");
        $requete->execute(["id_realisateur" => $id]);

        $realisation = $pdo->prepare("
        SELECT r.id_realisateur, f.titre, f.synopsis, f.duree, f.note,g.libelle,f.date_sortie
            FROM film f
            INNER JOIN realisateur r on f.realisateur_id=r.id_realisateur
            INNER JOIN genre g on f.genre_id=g.id_genre
            WHERE r.id_realisateur = :id_realisateur
        ");
        $realisation->execute(["id_realisateur" => $id]);

        require "view/detailRealisateur.php";
    }

    public function addRealisateur()
    {
        if (isset($_POST['submit'])) {

            $nom_realisateur = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom_realisateur = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            if ($nom_realisateur && $prenom_realisateur) {

                $pdo = Connect::seConnecter();
                $sqlQuery =  "INSERT INTO realisateur (nom,prenom)
                VALUES (:nom,:prenom)";

                $requete = $pdo->prepare($sqlQuery);
                $requete->execute(['nom' => $nom_realisateur, 'prenom' => $prenom_realisateur]);
            }
        }

        self::listRealisateurs();
    }


    public function listGenres()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_genre,libelle 
        FROM genre
        ");
        require "view/listeGenres.php";
    }

    public function detailGenre($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT libelle 
        FROM genre g
        WHERE g.id_genre= :id_genre
        ");
        $requete->execute(["id_genre" => $id]);

        $filmgenre = $pdo->prepare("
       SELECT g.id_genre,f.titre ,f.synopsis,f.note,f.date_sortie
            FROM film f
            INNER JOIN genre g on f.genre_id=g.id_genre
            WHERE g.id_genre = :id_genre
        ");

        $filmgenre->execute(["id_genre" => $id]);

        require "view/detailGenre.php";
    }

    public function addGenre()
    {

        if (isset($_POST['submit'])) {

            $nom_libelle = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($nom_libelle) {


                $pdo = Connect::seConnecter();
                $sqlQuery =  "INSERT INTO genre (libelle)
                VALUES (:libelle)";

                $requete = $pdo->prepare($sqlQuery);
                $requete->execute(['libelle' => $nom_libelle]);
            }
        }

        self::listGenres();
    }

    public function listRoles()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
         SELECT id_role,nom
        FROM role
        ");
        require "view/listeRoles.php";
    }

    public function detailRole($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT nom 
        FROM role r
        WHERE r.id_role= :id_role
        ");
        $requete->execute(["id_role" => $id]);

        $filmrole = $pdo->prepare("
       SELECT c.film_id, f.titre, r.nom
        FROM casting c
        INNER JOIN film f ON c.film_id=f.id_film
        INNER JOIN role r ON c.role_id=r.id_role
        WHERE r.id_role = :id_role
        ");

        $filmrole->execute(["id_role" => $id]);

        require "view/detailRole.php";
    }

    public function addRole()
    {

        if (isset($_POST['submit'])) {

            $nom_role = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($nom_role) {

                $pdo = Connect::seConnecter();
                $sqlQuery =  "INSERT INTO role (nom)
                VALUES (:nom)";
                $requete = $pdo->prepare($sqlQuery);
                $requete->execute(["nom" => $nom_role]);
            }
        }

        self::listRoles();
    }

    public function listCastings()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT f.titre, a.nom as acteurNom, a.prenom as acteurPrenom, r.nom as roleNom
        FROM casting c
        INNER JOIN film f ON c.film_id=f.id_film
        INNER JOIN acteur a ON c.acteur_id=a.id_acteur
        INNER JOIN role r ON c.role_id=r.id_role
        ");
        require "view/listeCastings.php";
    }
}
