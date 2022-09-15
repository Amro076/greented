<?php include(VIEWS.'_partials/header.php'); ?>


<form method="post" action="<?=  BASE_PATH.'utilisateur/inscription' ; ?>" class="row g-3">
    <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Nom</label>
        <input name="nom" value="<?=  $_POST['nom'] ?? '' ; ?>"  placeholder="Nom" type="text" class="form-control" id="inputEmail4">
        <small class="text-danger"><?=  $error['nom'] ?? '' ; ?></small>
    </div>
    <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Prénom</label>
        <input name="prenom" value="<?=  $_POST['prenom'] ?? '' ; ?>" placeholder="Prénom" type="text" class="form-control" id="inputEmail4">
        <small class="text-danger"><?=  $error['prenom'] ?? '' ; ?></small>
    </div>
    <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Pseudo</label>
        <input name="pseudo" value="<?=  $_POST['pseudo'] ?? '' ; ?>" placeholder="Pseudo" type="text" class="form-control" id="inputEmail4">
        <small class="text-danger"><?=  $error['pseudo'] ?? '' ; ?></small>
    </div>
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input name="email" value="<?=  $_POST['email'] ?? '' ; ?>" type="text" placeholder="@mail" class="form-control" id="inputEmail4">
        <small class="text-danger"><?=  $error['email'] ?? '' ; ?></small>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Mot de passe</label>
        <input name="mdp" value="<?=  $_POST['mdp'] ?? '' ; ?>" type="password" placeholder="Mot de passe" class="form-control" id="inputPassword4">
        <small class="text-danger"><?=  $error['mdp'] ?? '' ; ?></small>
    </div>
    <div class="col-md-6">
        <label for="inputPassword5" class="form-label">Confirmation de Mot de passe</label>
        <input name="confirmMdp" value="<?=  $_POST['confirmMdp'] ?? '' ; ?>" type="password"  placeholder="confirmation de mot de passe" class="form-control" id="inputPassword5">
        <small class="text-danger"><?=  $error['confirmMdp'] ?? '' ; ?></small>
    </div>
    <div class="form-check form-switch ms-4">
        <input class="form-check-input" onclick="password(event)"  type="checkbox" id="button" >
        <label class="form-check-label" id="label" for="button">Afficher les mots de passe</label>
    </div>
    <div class="col-4">
        <label for="inputAddress" class="form-label">Addresse (N° de Voie)</label>
        <input name="numero_voie" value="<?=  $_POST['numero_voie'] ?? '' ; ?>" type="text"  class="form-control" id="inputAddress" placeholder="Numéro de voie">
        <small class="text-danger"><?=  $error['numero_voie'] ?? '' ; ?></small>
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Addresse (Voie)</label>
        <input name="voie" value="<?=  $_POST['voie'] ?? '' ; ?>" type="text" class="form-control" id="inputAddress2" placeholder="Voie et complément d'adresse">
        <small class="text-danger"><?=  $error['voie'] ?? '' ; ?></small>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Ville</label>
        <input name="ville" value="<?=  $_POST['ville'] ?? '' ; ?>" type="text" placeholder="Ville" class="form-control" id="inputCity">
        <small class="text-danger"><?=  $error['ville'] ?? '' ; ?></small>
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">Code postal</label>
        <input name="cp" value="<?=  $_POST['cp'] ?? '' ; ?>" type="text" placeholder="Code postal" class="form-control" id="inputZip">
        <small class="text-danger"><?=  $error['cp'] ?? '' ; ?></small>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </div>
</form>


<script>

    let password= function (event)
    {
        let mdp1= document.getElementById('inputPassword4');
        let mdp2= document.getElementById('inputPassword5');
        let button=document.getElementById('button');
        let label=document.getElementById('label');

        if (label.innerText==='Cacher les mots de passe'){
            mdp1.setAttribute('type', 'password');
            mdp2.setAttribute('type', 'password');
            button.setAttribute('checked', false);
            label.innerText='Afficher les mots de passe';


        }else{
            mdp1.setAttribute('type', 'text');
            mdp2.setAttribute('type', 'text');
            button.setAttribute('checked', true);
            label.innerText='Cacher les mots de passe';


        }





    }


</script>








<?php include(VIEWS.'_partials/footer.php'); ?>
