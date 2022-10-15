<?php include(VIEWS.'_partials/header.php');


?>


<form action="<?php if (isset($categorie)): echo BASE_PATH.'categorie/modification'; else: echo BASE_PATH.'categorie/ajout' ; endif; ?>" method="post" class="w-50 mx-auto border border-primary rounded p-5 mt-5">

    <div >
        <label for="inputEmail4" class="form-label">Titre</label>
        <input name="titre" value="<?=  $categorie['titre'] ?? '' ; ?>" type="text" placeholder="titre de la catégorie" class="form-control" id="inputEmail4">
        <small class="text-danger"><?=  $error['titre'] ?? '' ; ?></small>
    </div>
    <input type="hidden" name="id" value="<?=  $categorie['id'] ; ?>">

    <button class="mt-4 btn btn-info" type="submit">Enregistrer</button>

</form>
















<?php include(VIEWS.'_partials/footer.php');  ?>
