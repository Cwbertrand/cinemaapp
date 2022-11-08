<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container py-5">
        
        <form method="post" action="index.php?action=addRealisateur">
            <label for="exampleDataList" class="form-label">Nom Realisateur</label>
            <input type="text" class="form-control" list="datalistOptions" id="exampleDataList" name="nom">

            <label for="exampleDataList" class="form-label">Prenom Realisateur</label>
            <input type="text" class="form-control" list="datalistOptions" id="exampleDataList" name="prenom">

            <label for="exampleDataList" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" list="datalistOptions" id="exampleDataList" name="dateNaissance">

            <label for="exampleDataList" class="form-label">Sexe</label>
            <select class="form-select" aria-label="Default select example" id="sexe" name="sexe">
                <option selected>Select</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select> <br>

            <button type="submit" name="submit" href="index.php?action=listRealisateurs" class="btn btn-primary my-3">Submit</button>
            </div>
        </form>
        </div>
                

<?php 
    $titre = "ajoute un realisateur";
    $titre_secondaire = "Ajouter le Realisateur";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>