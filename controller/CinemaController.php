<?php

    namespace controller;

    use model\Connect;

    class CinemaController{

        //// THIS HAVE BEEN ABOUT SELECTING ITEMS FROM THE DATABASE /////
        /**
         * Liser le films
        */
        public function listFilms(){

            $pdo = Connect::Connection();
            $requete = $pdo->query("SELECT id_film, titre_film, createAt_film FROM film");
            require './view/film/listFilms.php';
        }

        /**
         * la fonction qui afficher la liste des acteurs
        */
        public function listActeurs(){
            $pdo = Connect::Connection();
            $requete = $pdo->query('SELECT id_acteur, p.nom, p.prenom
                                    FROM acteur a
                                    INNER JOIN personne p ON p.id_personne = a.id_personne');

            require './view/acteur/listActeurs.php';
        }

        /**
         * la fonction qui afficher la liste des realisateur
        */
        public function listRealisateurs(){
            $pdo = Connect::Connection();
            $requete = $pdo->query('SELECT id_realisateur, p.nom, p.prenom
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
            // You perform 2 queries. first to show the description and realisateur and the other the casting

            //the film date, title, producter
            $requete = $pdo->prepare("SELECT titre_film, DATE_FORMAT(createAt_film, '%Y'), 
                                    TIME_FORMAT(duree_film, '%H:%i') AS duree, rating, 
                                    p.nom, p.prenom
                                    FROM film f
                                    INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
                                    INNER JOIN personne p ON p.id_personne = r.id_personne
                                    WHERE id_film = :id");
            $requete->execute(['id' => $id]);

            //the film casting
            $casting = $pdo->prepare("SELECT p.nom, p.prenom, p.sexe, titre_film, nom_personnage
                                    FROM casting c
                                    INNER JOIN film f ON f.id_film = c.id_film
                                    INNER JOIN personnage pe ON pe.id_personnage = c.id_personnage
                                    INNER JOIN personne p ON p.id_personne = c.id_acteur
                                    WHERE c.id_film = :id");
                $casting->execute(['id' => $id]);

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
         * la fonction qui afficher le détail d'un personnage
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
        

        ///// INSERTING INFOS INTO THE DATABASE /////
        /**
         * la fonction qui ajoute les realisateurs
        */
        public function addRealisateur(){
            if (isset($_POST['submit'])) {

                $nomreal = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $prenomreal = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $dateNaissance = filter_input(INPUT_POST, 'dateNaissance', FILTER_DEFAULT);
                $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($nomreal && $prenomreal){
                    $pdo = Connect::Connection();
                    $requete = $pdo->prepare("INSERT INTO personne (nom, prenom, date_naissance, sexe) 
                                    VALUES (:nom, :prenom, :date_naissance, :sexe)");
                    $requete->execute(['nom' => $nomreal,
                                        'prenom' => $prenomreal,
                                        'date_naissance' => $dateNaissance,
                                        'sexe' => $sexe]);

                    $realisateur = $pdo->lastInsertId();
                    $personne = $pdo->prepare("INSERT INTO realisateur (id_personne)
                                VALUES (:id_personne)");
                    $personne->execute(['id_personne' => $realisateur]);

                    header('Location: index.php?action=listRealisateurs');
                }
            }
            require './view/realisateur/addRealisateur.php';
        }

        /**
         * la fonction qui ajoute les Acteur
        */
        public function addActeur(){
            if (isset($_POST['submit'])) {

                $nomreal = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $prenomreal = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $dateNaissance = filter_input(INPUT_POST, 'dateNaissance', FILTER_DEFAULT);
                $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($nomreal && $prenomreal && $dateNaissance && $sexe){
                    $pdo = Connect::Connection();
                    $requete = $pdo->prepare("INSERT INTO personne (nom, prenom, date_naissance, sexe) 
                                    VALUES (:nom, :prenom, :date_naissance, :sexe)");
                    $requete->execute(['nom' => $nomreal,
                                        'prenom' => $prenomreal,
                                        'date_naissance' => $dateNaissance,
                                        'sexe' => $sexe]);

                    $acteur = $pdo->lastInsertId();
                    $personne = $pdo->prepare("INSERT INTO acteur (id_personne)
                                VALUES (:id_personne)");
                    $personne->execute(['id_personne' => $acteur]);

                    header('Location: index.php?action=listActeurs');
                }
            }
            require './view/acteur/addActeur.php';
        }

        /**
         * la fonction qui ajoute les personnages
        */
        public function addPersonnage(){

            if(isset($_POST['submit'])){
                $nomPersonnage = filter_input(INPUT_POST, 'nom_personnage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($nomPersonnage) {
                    $pdo = Connect::Connection();
                    $requete = $pdo->prepare("INSERT INTO personnage (nom_personnage) 
                                        VALUES (:nom_personnage)");
                    $requete->execute(['nom_personnage' => $nomPersonnage]);
                }
            }
            
            require './view/personnage/addPersonnage.php';
        }

        /**
         * la fonction qui ajoute les film
        */
        public function addFilm(){
            
            $pdo = Connect::Connection();
            $requete_realisateur = $pdo->query('SELECT id_realisateur, p.nom, p.prenom
                                    FROM realisateur r
                                    INNER JOIN personne p ON p.id_personne = r.id_personne');

            if(isset($_POST['submit'])){
                $titreFilm = filter_input(INPUT_POST, 'titre_film', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $paysortie = filter_input(INPUT_POST, 'pays_sortie', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $realisateur = filter_input(INPUT_POST, 'realisateur', FILTER_DEFAULT);
                $dureeFilm = filter_input(INPUT_POST, 'duree_film', FILTER_DEFAULT);
                $dateSortie = filter_input(INPUT_POST, 'date_sortie', FILTER_DEFAULT);
                $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_NUMBER_INT);
                $description = filter_input(INPUT_POST, 'description_film', FILTER_DEFAULT);

                if($titreFilm && $paysortie && $realisateur && $dureeFilm && $dateSortie && $rating && $description){
                    $pdo=Connect::Connection();
                    $requete=$pdo->prepare("INSERT INTO film (titre_film, id_realisateur, lieu_film, duree_film, createAt_film, rating, description_film)
                                            VALUES (:titre_film, :realisateur, :paysortie, :duree_film, :createAt_film, :rating, :descriptions)"); 
                        $requete->execute([
                            "titre_film" => $titreFilm,
                            "realisateur" => $realisateur,
                            "paysortie" => $paysortie,
                            "duree_film" => $dureeFilm,
                            "createAt_film" => $dateSortie,                   
                            "rating" => $rating,
                            "descriptions" => $description
                        ]);

                    header('Location: index.php?action=listFilms');

                }
            }
            
            require './view/film/addFilm.php';
        }
        
        /**
         * la fonction qui ajoute les Genre
        */
        public function addGenre(){
            if(isset($_POST['submit'])){
                $nomgenre = filter_input(INPUT_POST, 'nom_genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($nomgenre) {
                    $pdo = Connect::Connection();
                    $requete = $pdo->prepare("INSERT INTO genre (nom_genre) 
                                        VALUES (:nom_genre)");
                    $requete->execute(['nom_genre' => $nomgenre]);
                    header("Location: index.php?action=listGenres");
                }
            }
            
            require './view/genre/addGenre.php';
        } 
    }