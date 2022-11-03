<?php ob_start(); //The ob_start() function creates an output buffer?> 

    <div class="container py-5">
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col">Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requete->fetchAll() as $genre) { ?>
                    <tr>
                        <td><?= $genre["film"] ?></td> 
                    </tr>
                <?php } ?>
                <h3><?= $genre["nom_genre"] ;?></h3>
            </tbody>
        </table>
    </div>
                

<?php 
    $titre = "detaille d'un genre";
    $titre_secondaire = "Detaille d'un Genre";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>