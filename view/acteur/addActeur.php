<?php ob_start(); //The ob_start() function creates an output buffer?> 

        <div class="container py-5">
        
        <form method="post" action="index.php?action=addActeur">
            <label for="exampleDataList" class="form-label">Nom Acteur</label>
            <input type="text" class="form-control" list="datalistOptions" id="exampleDataList" name="nom">

            <label for="exampleDataList" class="form-label">Prenom Acteur</label>
            <input type="text" class="form-control" list="datalistOptions" id="exampleDataList" name="prenom">

            <label for="exampleDataList" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" list="datalistOptions" id="exampleDataList" name="dateNaissance">

            <label for="exampleDataList" class="form-label">Sexe</label>
            <select class="form-select" aria-label="Default select example" id="sexe" name="sexe">
                <option selected>Select</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select> <br>

            <button type="submit" name="submit" href="index.php?action=listActeurs" class="btn btn-primary my-3">Submit</button>
            </div>
        </form>
        </div>
                

<?php 
    $titre = "Ajouter les Acteurs";
    $titre_secondaire = "Ajouter les Acteurs";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>