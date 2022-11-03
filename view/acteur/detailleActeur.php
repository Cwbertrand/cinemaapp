<?php ob_start(); //The ob_start() function creates an output buffer?> 


        <div class="container py-5">
            <table class="table my-5">
                <thead>
                    <tr>
                        <th scope="col">Film</th>
                        <th scope="col">Personnage</th>
                    </tr>
                </thead>
                <tbody class="my-5">
                    <?php foreach ($requete->fetchAll() as $acteur) { ?>
                        <tr>
                            <td><?= $acteur['titre_film'] ?></td>
                            <td><?= $acteur['nom_personnage'] ?></td>
                        </tr>
                    <?php } ?>
                    <h3><?= $acteur['nom'].' '. $acteur['prenom']?></h3>
                </tbody>
            </table>
        </div>
                

<?php 
    $titre = "detaille d'un acteur";
    $titre_secondaire = "Detaille d'un Acteur";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>