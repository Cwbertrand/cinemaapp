<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container d-flex justify-content-between">
            <h4>Il y a: <b><?php echo $requete->rowCount(); ?></b> </h4>
            <a href="index.php?action=addActeur" class="btn btn-primary">Ajouter le Acteur</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requete->fetchAll() as $acteur) { ?>
                    <tr>
                        <td><a href="index.php?action=detailleActeur&id=<?= $acteur['id_acteur'];?>"><?= $acteur['nom'] ?></a></td>
                        <td><?= $acteur['prenom'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php 
    $titre = "Liste des acteurs";
    $titre_secondaire = "Liste des Acteurs";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>