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

            require './view/listFilms.php';

        }

        /**
         * Donne detaille d'acteur
        */
        public function detActeur($id){
            $pdo = Connect::Connection();
            $requete = $pdo->prepare('SELECT * FROM actuer WHERE id_acteur = :id');
            $requete->execute(['id' => $id]);

            require './view/acteur/detailActeur.php';
        }
    }