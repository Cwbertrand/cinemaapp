<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container d-flex justify-content-between">
            <h4>Il y a: <b><?php echo $requete->rowCount(); ?></b> </h4>
            <a href="index.php?action=addFilm" class="btn btn-primary">Ajouter le film</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">TITRE</th>
                    <th scope="col">ANNE SORTEE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requete->fetchAll() as $film) { ?>
                    <tr>
                        <td><a href="index.php?action=detailleFilm&id=<?= $film['id_film'];?>"> <?= $film['titre_film'] ?></a></td>
                        <td><?= $film['createAt_film'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php 
    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>