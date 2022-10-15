<?php include(VIEWS.'_partials/header.php'); ?>


<form action="<?=  BASE_PATH.'utilisateur/updateTirelire' ; ?>" method="post" class="w-50 mx-auto border border-primary rounded p-5 mt-5">

    <div >
        <label for="inputEmail4" class="form-label">Cagnotte</label>
        <input name="tirelire" value="" type="number" placeholder="Montant souhaité" class="form-control" id="inputEmail4">

    </div>

    <button class="mt-4 btn btn-info" type="submit">Cagnotter</button>

</form>



















<?php include(VIEWS.'_partials/footer.php'); ?>
