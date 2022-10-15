<?php include(VIEWS.'_partials/header.php');

if (!isset($_SESSION['user'])){

    header('location:../');
    exit();


}


?>


<form method="post" action="<?=  BASE_PATH.'profil/updateMdp' ; ?>" class="row g-3">

    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Mot de passe actuel</label>
        <input name="actualMdp" value="<?=  $_POST['actualMdp'] ?? '' ; ?>" placeholder="Pseudo" type="text" class="form-control" id="inputEmail4">
        <small class="text-danger"><?=  $error['actualMdp'] ?? '' ; ?></small>
    </div>

    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Nouveau Mot de passe</label>
        <input name="mdp" value="<?=  $_POST['mdp'] ?? '' ; ?>" type="password" placeholder="Mot de passe" class="form-control" id="inputPassword4">
        <small class="text-danger"><?=  $error['mdp'] ?? '' ; ?></small>
    </div>
    <div class="col-md-6">
        <label for="inputPassword5" class="form-label">Confirmation du nouveau Mot de passe</label>
        <input name="confirmMdp" value="<?=  $_POST['confirmMdp'] ?? '' ; ?>" type="password"  placeholder="confirmation de mot de passe" class="form-control" id="inputPassword5">
        <small class="text-danger"><?=  $error['confirmMdp'] ?? '' ; ?></small>
    </div>
    <div class="form-check form-switch ms-4">
        <input class="form-check-input" onclick="password(event)"  type="checkbox" id="button" >
        <label class="form-check-label" id="label" for="button">Afficher les mots de passe</label>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Modifier</button>
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
