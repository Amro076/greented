<?php include(VIEWS.'_partials/header.php'); ?>


<form action="<?=  BASE_PATH.'utilisateur/connexion' ; ?>" method="post" class="w-50 mx-auto border border-primary rounded p-5 mt-5">
  <h4 class="text-center"> Connexion</h4>

<div >
    <label for="inputEmail4" class="form-label">Email</label>
    <input name="email" value="<?=  $_POST['email'] ?? '' ; ?>" type="text" placeholder="@mail" class="form-control" id="inputEmail4">
    <small class="text-danger"><?=  $error['email'] ?? '' ; ?></small>
</div>
<div >
    <label for="inputPassword4" class="form-label">Mot de passe</label>
    <input name="mdp" value="<?=  $_POST['mdp'] ?? '' ; ?>" type="password" placeholder="Mot de passe" class="form-control" id="inputPassword4">
    <small class="text-danger"><?=  $error['mdp'] ?? '' ; ?></small>
</div>

    <button class="mt-4 btn btn-info" type="submit">Se connecter</button>

</form>



















<?php include(VIEWS.'_partials/footer.php'); ?>
