<?php ob_start(); //The ob_start() function creates an output buffer?> 

    <form action="./index.php?action=listFilms" method="get">
        <p>Il y a <?php $requete->rowCount(); ?></p>
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
                        <td><?= $film['titre_film'] ?></td>
                        <td><?= $film['createAt_film'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>

<?php 
    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    $buffer = ob_get_clean();
    require "view/template.php";
?>