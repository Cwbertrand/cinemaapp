<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <h4>Il y a: <b><?php echo $requete->rowCount(); ?></b> </h4>
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
                        <td><?= $genre['id_genre'] ?></td>
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