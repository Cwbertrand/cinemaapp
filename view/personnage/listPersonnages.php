<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <h4>Il y a: <b><?php echo $requete->rowCount(); ?></b> </h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Personnages</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requete->fetchAll() as $personnage) { 
                    if (!$personnage['id_personnage']) {
                        echo 'aucune information';
                    }    
                ?>
                    <tr>
                        <td><a href="index.php?action=detaillePersonnage&id=<?= $personnage['id_personnage'];?>"><?= $personnage['id_personnage'] ?></a></td>
                        <td><?= $personnage['nom_personnage'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php 
    $titre = "Liste des personnages";
    $titre_secondaire = "Liste des Personnages";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>