<?php

    namespace controller;

    use model\Connect;

    class CinemaController{
        /**
         * Liser le films
        */
        public function listFilms(){

            $pdo = Connect::Connection();
            $requete = $pdo->query("SELECT titre_film, createAt_film FROM film");

            require './view/film/listFilms.php';

        }

        /**
         * la fonction qui afficher la liste des acteurs
        */
        public function listActeurs(){
            $pdo = Connect::Connection();
            $requete = $pdo->query('SELECT p.nom, p.prenom
                                    FROM acteur a
                                    INNER JOIN personne p ON p.id_personne = a.id_personne');

            require './view/acteur/listActeurs.php';
        }

        /**
         * la fonction qui afficher la liste des acteurs
        */
        public function listRealisateurs(){
            $pdo = Connect::Connection();
            $requete = $pdo->query('SELECT p.nom, p.prenom
                                    FROM realisateur r
                                    INNER JOIN personne p ON p.id_personne = r.id_personne');

            require './view/realisateur/listRealisateurs.php';
        }

        /**
         * la fonction qui afficher la liste des Genres
        */
        public function listGenres(){
            $pdo = Connect::Connection();
            $requete = $pdo->query("SELECT * FROM genre");

            require './view/genre/listGenres.php';
        }

        /**
         * la fonction qui afficher la liste des Personnage
        */
        public function listPersonnages(){
            $pdo = Connect::Connection();
            $requete = $pdo->query("SELECT * FROM personnage");

            require './view/personnage/listPersonnages.php';
        }

        /**
         * la fonction qui afficher le détail d'un film (infos + acteurs / rôles dans ce film)
        */
        public function detailleFilm($id){
            $pdo = Connect::Connection();
            $requete = $pdo->prepare("SELECT titre_film, DATE_FORMAT(createAt_film, '%Y'), 
                                    TIME_FORMAT(duree_film * 60, '%H:%i'), rating, 
                                    p.nom, p.prenom
                                    FROM film f
                                    INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
                                    INNER JOIN personne p ON p.id_personne = r.id_personne
                                    WHERE id_film = :id");
            $requete->execute(['id' => $id]);
            require './view/film/detailleFilm.php';
            
        }
        /**
         * la fonction qui afficher le détail d'un acteur (infos + liste de ses films / rôles)
        */
        public function detailleActeur($id){
            $pdo = Connect::Connection();
            $requete = $pdo->prepare("SELECT p.nom, p.prenom, titre_film, nom_personnage
                                    FROM casting c
                                    INNER JOIN film f ON f.id_film = c.id_film
                                    INNER JOIN personnage pe ON pe.id_personnage = c.id_personnage
                                    INNER JOIN personne p ON p.id_personne = c.id_acteur
                                    WHERE id_acteur = :id");
            $requete->execute(['id' => $id]);
            require './view/acteur/detailleActeur.php';
            
        }

        /**
         * la fonction qui afficher le détail d'un réalisateur (infos + liste de ses films)
        */
        public function detailleRealisateur($id){
            $pdo = Connect::Connection();
            $requete = $pdo->prepare("SELECT titre_film, p.nom, p.prenom
                                    FROM realisateur r
                                    INNER JOIN film f ON r.id_realisateur = f.id_realisateur
                                    INNER JOIN personne p ON p.id_personne = r.id_personne
                                    WHERE f.id_realisateur = :id");
            $requete->execute(['id' => $id]);
            require './view/realisateur/detailleRealisateur.php';
            
        }

        /**
         * la fonction qui afficher le détail d'un genre
        */
        public function detailleGenre($id){
            $pdo = Connect::Connection();
            $requete = $pdo->prepare("SELECT g.nom_genre, titre_film AS film
                                    FROM genre g
                                    INNER JOIN asso_genre ag ON ag.id_genre = g.id_genre
                                    INNER JOIN film f ON f.id_film = ag.id_film
                                    WHERE ag.id_genre = :id");
            $requete->execute(['id' => $id]);
            require './view/genre/detailleGenre.php';
            
        }

        /**
         * la fonction qui afficher le détail d'un rôle
        */
        public function detaillePersonnage($id){
            $pdo = Connect::Connection();
            $requete = $pdo->prepare("SELECT p.nom, p.prenom, titre_film, nom_personnage
                                        FROM casting c
                                        INNER JOIN film f ON f.id_film = c.id_film
                                        INNER JOIN personnage pe ON pe.id_personnage = c.id_personnage
                                        INNER JOIN personne p ON p.id_personne = c.id_acteur
                                        WHERE pe.id_personnage = :id");
            $requete->execute(['id' => $id]);
            require './view/personnage/detaillePersonnage.php';
            
        }

        
    }