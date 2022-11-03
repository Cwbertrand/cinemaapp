<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container py-5">
            <table class="table my-5">
                <thead>
                    <tr>
                        <th scope="col">Nom & Prenom</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($requete->fetchAll() as $personnage) { ?>
                        <tr>
                            <td><?= $personnage['nom'] .' '. $personnage['prenom'] ?></td>
                        </tr>
                    <?php } ?>
                    <h3><?= $personnage['nom_personnage']?></h3>
                </tbody>
            </table>
        </div>
                

<?php 
    $titre = "detaille d'un personnage";
    $titre_secondaire = "Detaille d'un Personnage";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>