<?php
use controller\CinemaController;

//autoload tous les classe comme(import class)
spl_autoload_register(function ($class_name){
    include $class_name . '.php';
});

// Creating the object class Cinemacontroller
$ctrlCinema = new CinemaController();

//The $id has to be declared out of the switch statement because In a switch..case, onl
// so a declared variable inside won't be read (analysed)

$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if(isset($_GET['action'])) {
    switch ($_GET['action']){

        //// FILM /////
        //Liste tous le film et date sortie
        case 'listFilms': 
            $ctrlCinema->listFilms();
        break;
        //le détail d'un film (infos + acteurs / rôles dans ce film)
        case 'detailleFilm': 
            $ctrlCinema->detailleFilm($id);
        break;
        //Ajouter un realisateur
        case 'addFilm': 
            $ctrlCinema->addFilm();
        break;
        
        //// ACTEUR /////
        //la liste des acteurs
        case 'listActeurs': 
            $ctrlCinema->listActeurs();
        break;
        //le détail d'un acteur (infos + liste de ses films / rôles)
        case 'detailleActeur': 
            $ctrlCinema->detailleActeur($id);
        break;
        //Ajouter un realisateur
        case 'addActeur': 
            $ctrlCinema->addActeur();
        break;

        //// Realisateur ////
        //la liste des Realisateurs
        case 'listRealisateurs': 
            $ctrlCinema->listRealisateurs();
        break;
        //le détail d'un réalisateur (infos + liste de ses films)
        case 'detailleRealisateur': 
            $ctrlCinema->detailleRealisateur($id);
        break;
        //Ajouter un realisateur
        case 'addRealisateur': 
            $ctrlCinema->addRealisateur();
        break;

        //// Genres ////
        //la liste des Genres
        case 'listGenres': 
            $ctrlCinema->listGenres();
        break;
        //le détail d'un genre (liste des films d'un genre précis. ex : tous les films de science fiction, etc)
        case 'detailleGenre': 
            $ctrlCinema->detailleGenre($id);
        break;
        //Ajouter un Personnage
        case 'addGenre': 
            $ctrlCinema->addGenre();
        break;
        
        //// Personnage ////
        //la liste des Personnages
        case 'listPersonnages': 
            $ctrlCinema->listPersonnages();
        break;
        // le détail d'un rôle (liste des acteurs qui ont joué un rôle précis : Batman, James Bond, etc)
        case 'detaillePersonnage': 
            $ctrlCinema->detaillePersonnage($id);
        break;
        //Ajouter un Personnage
        case 'addPersonnage': 
            $ctrlCinema->addPersonnage();
        break;
    }
}


