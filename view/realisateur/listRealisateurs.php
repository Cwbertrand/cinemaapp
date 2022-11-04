<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <h4>Il y a: <b><?php echo $requete->rowCount(); ?></b> </h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requete->fetchAll() as $realisateur) { ?>
                    <tr>
                        <td><a href="index.php?action=detailleRealisateur&id=<?= $realisateur['id_realisateur'];?>"><?= $realisateur['nom'] ?></a></td>
                        <td><?= $realisateur['prenom'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php 
    $titre = "Liste des realisateurs";
    $titre_secondaire = "Liste des Realisateurs";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>