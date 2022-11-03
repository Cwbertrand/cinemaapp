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
                <?php foreach ($requete->fetchAll() as $acteur) { ?>
                    <tr>
                        <td><?= $acteur['nom'] ?></td>
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