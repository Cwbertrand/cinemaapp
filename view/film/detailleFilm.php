<?php ob_start(); //The ob_start() function creates an output buffer?> 


        <div class="card">
            <?php foreach ($requete->fetchAll() as $film) { ?>
                <div class="card-header">
                    <h2 class="h1"><?= $film['titre_film'] ?></h2>
                </div>
                <div class="card-body">
                    <p class="card-text">Realisateur: <span class="h5"><?= $film['nom'] .' '. $film['prenom']?></span></p>
                    <p class="card-text">Duée: <span class="h5"><?= $film["TIME_FORMAT(duree_film * 60, '%H:%i')"] ?></span></p>
                    <p class="card-text">Date de sortie: <span class="h5"><?= $film["DATE_FORMAT(createAt_film, '%Y')"] ?></span></p>
                    <p class="card-text">Note: <span class="h5"><?= $film['rating'] ?></span></p>
                    
                </div>
            <?php } ?>
        </div>
                

<?php 
    $titre = "film detaille";
    $titre_secondaire = "Film detaille";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>