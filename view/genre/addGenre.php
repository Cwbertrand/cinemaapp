<?php ob_start(); //The ob_start() function creates an output buffer?> 


    <form method="post" action="index.php?action=addGenre">
        <div class="container py-5">
            <label for="exampleDataList" class="form-label">Nom de Genre</label>
            <input type="text" class="form-control" list="datalistOptions" id="exampleDataList" name="nom_genre">

            <button type="submit" name="submit" href="index.php?action=listGenre" class="btn btn-primary my-3">Submit</button>
        </div>
    </form>
        
<?php 
    $titre = "detaille d'un genre";
    $titre_secondaire = "Detaille d'un Genre";
    $buffer = ob_get_clean();
    require "./view/template.php";
?>