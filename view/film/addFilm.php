<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container py-5">
        
            <form method="post" action="index.php?action=addFilm">
                <label for="exampleDataList" class="form-label">Titre</label>
                <input type="text" class="form-control" list="datalistOptions" id="exampleDataList" name="titre_film">

                <label class="my-1 mr-2 pt-3" for="inlineFormCustomSelectPref">Realisateur</label><br>
                <select class="form-select" aria-label="Default select example" id="realisateur" name="realisateur">
                        <option selected>Select</option>
                    <?php foreach ($requete_realisateur->fetchAll() as $realisateur) {?>
                        <option value="<?= $realisateur['id_realisateur'];?>"><?= $realisateur['nom'].' '.$realisateur['prenom']  ?></option>
                    <?php } ?>  
                </select> <br>

                <label for="exampleDataList" class="form-label pt-3">Duree de film</label>
                <input type="time" class="form-control" list="datalistOptions" id="exampleDataList" name="duree_film">

                <label for="exampleDataList" class="form-label">Date de sortie</label>
                <input type="date" class="form-control" list="datalistOptions" id="exampleDataList" name="date_sortie">

                <label for="exampleDataList" class="form-label">Pays</label>
                <input type="text" class="form-control" list="datalistOptions" id="exampleDataList" name="pays_sortie">

                <label for="exampleDataList" class="form-label">Rating</label>
                <input type="number" class="form-control" list="datalistOptions" id="exampleDataList" name="rating" min="1" max="5">

                <div class="d-flex flex-column">
                    <label for="exampleDataList" class="form-label">Description</label>
                    <textarea name="description_film"></textarea>
                </div>
                
                <button type="submit" name="submit" href="index.php?action=listFilms" class="btn btn-primary my-3">Submit</button>
            </form>
        </div>
                

<?php 
    $titre = "ajoute un film";
    $titre_secondaire = "Ajouter le film";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>