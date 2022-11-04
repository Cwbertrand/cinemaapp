<?php ob_start(); //The ob_start() function creates an output buffer?> 


        <div class="card">
            <?php foreach ($requete->fetchAll() as $film) { ?>
                <div class="card-header">
                    <?= var_dump($film) ?>
                    <h2 class="h1"><?= $film['titre_film'] ?></h2>
                </div>
                <div class="card-body">
                    <p class="card-text">Realisateur: <span class="h5"><?= $film['nom'] .' '. $film['prenom']?></span></p>
                    <p class="card-text">Duée: <span class="h5"><?= $film["duree"] ?></span></p>
                    <p class="card-text">Date de sortie: <span class="h5"><?= $film["DATE_FORMAT(createAt_film, '%Y')"] ?></span></p>
                    <p class="card-text">Note: <span class="h5"><?= $film['rating'] ?></span></p>
                    
                </div>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">Sexe</th>
                        <th scope="col">Nom de Personnage</th>
                    </tr>
                </thead>
                <tbody>
                    <h3>Cast</h3>
                    <?php foreach ($casting->fetchAll() as $casting) { ?>
                        <tr>
                            <td><?= $casting['nom'] .' '. $casting['prenom'] ?></td>
                            <td><?= $casting ["sexe"] ?></td>
                            <td><?= $casting ["nom_personnage"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
                

<?php 
    $titre = "film detaille";
    $titre_secondaire = "Film detaille";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>