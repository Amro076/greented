<?php include(VIEWS . '_partials/header.php');
if (!isset($_SESSION['user'])){

    header('location:../');
    exit();


}


?>


<form method="post" action="<?php  echo  BASE_PATH.'profil/gestionProfil' ; ?>"  enctype="multipart/form-data" >
    <fieldset>
        <div class="form-group">
            <label for="pseudo" class="form-label mt-4">Votre pseudo</label>
            <input name="pseudo"   value="<?=  $_POST['pseudo'] ?? $utilisateur['pseudo'] ; ?>"  type="text" class="form-control" id="pseudo">
            <small class="text-danger"><?=  $error['pseudo'] ?? '' ; ?></small>
        </div>
        <div class="form-group">
            <label for="nom" class="form-label mt-4">Votre Nom</label>
            <input name="nom"   value="<?=  $_POST['nom'] ?? $utilisateur['nom'] ; ?>"  type="text" class="form-control" id="nom">
            <small class="text-danger"><?=  $error['nom'] ?? ''; ?></small>
        </div>
        <div class="form-group">
            <label for="prenom" class="form-label mt-4">Votre Prenom</label>
            <input name="prenom"   value="<?=  $_POST['prenom'] ?? $utilisateur['prenom'] ; ?>"  type="text" class="form-control" id="prenom" >
            <small class="text-danger"><?=  $error['prenom'] ?? ''; ?></small>
        </div>
        <div class="form-group">
            <label for="email" class="form-label mt-4">Votre email</label>
            <input name="email" value="<?=  $_POST['email'] ?? $utilisateur['email'] ; ?>" type="text" class="form-control" id="email" placeholder="Entrez votre email">
            <small class="text-danger"><?=  $error['email'] ?? '' ; ?></small>
        </div>
    <div class="form-group">
        <label for="numero_voie" class="form-label mt-4">numéro de voie</label>
        <input name="numero_voie" value="<?=  $_POST['numero_voie'] ?? $utilisateur['numero_voie'] ; ?>" type="text" class="form-control" id="numero_voie" placeholder="Entrez le numéro de voie">
        <small class="text-danger"><?=  $error['numero_voie'] ?? '' ; ?></small>
    </div>
    <div class="form-group">
        <label for="voie" class="form-label mt-4">voie</label>
        <input name="voie" value="<?=  $_POST['voie'] ?? $utilisateur['voie'] ; ?>" type="text" class="form-control" id="voie" placeholder="Entrez le nom de la voie">
        <small class="text-danger"><?=  $error['voie'] ?? '' ; ?></small>
    </div>
    <div class="form-group">
        <label for="cp" class="form-label mt-4">cp</label>
        <input name="cp" value="<?=  $_POST['cp'] ?? $utilisateur['cp'] ; ?>" type="text" class="form-control" id="cp" placeholder="Entrez votre code postal">
        <small class="text-danger"><?=  $error['cp'] ?? '' ; ?></small>
    </div>
    <div class="form-group">
        <label for="ville" class="form-label mt-4">ville</label>
        <input name="ville" value="<?=  $_POST['ville'] ?? $utilisateur['ville'] ; ?>" type="text" class="form-control" id="ville" placeholder="Entrez votre ville">
        <small class="text-danger"><?=  $error['ville'] ?? '' ; ?>'</small>
    </div>

        <button type="submit" class="btn btn-primary mt-5 mb-5">Modifier</button>
    </fieldset>
</form>





<?php include(VIEWS . '_partials/footer.php'); ?>