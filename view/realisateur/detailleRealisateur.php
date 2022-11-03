<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container py-5">
            <table class="table my-5">
                <thead>
                    <tr>
                        <th scope="col">Film</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($requete->fetchAll() as $realisateur) { ?>
                        <tr>
                            <td><?= $realisateur['titre_film'] ?></td>
                        </tr>
                    <?php } ?>
                    <h3><?= $realisateur['nom'].' '. $realisateur['prenom']?></h3>
                </tbody>
            </table>
        </div>
                

<?php 
    $titre = "detaille d'un realisateur";
    $titre_secondaire = "Detaille d'un Realisateur";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>