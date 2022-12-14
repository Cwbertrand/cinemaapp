<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container d-flex justify-content-between">
            <h4>Il y a: <b><?php echo $requete->rowCount(); ?></b> </h4>
            <a href="index.php?action=addGenre" class="btn btn-primary">Ajouter le Genre</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requete->fetchAll() as $genre) { ?>
                    <tr>
                        <td><a href="index.php?action=detailleGenre&id=<?= $genre['id_genre'];?>"><?= $genre['id_genre'] ?></a></td>
                        <td><?= $genre['nom_genre'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php 
    $titre = "Liste des genres";
    $titre_secondaire = "Liste des Genres";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>