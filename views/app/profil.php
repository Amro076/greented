<?php include(VIEWS . '_partials/header.php');

if (!isset($_SESSION['user'])){

    header('location:../');
    exit();


}

?>

<div class="card mb-3">
  <h3 class="card-header"><?= $_SESSION['user']['pseudo']; ?></h3>
  <div class="card-body">
    <h5 class="card-title"><?= $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom']; ?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $_SESSION['user']['email']; ?></li>
    <li class="list-group-item">montant de votre tirelire : <?= $_SESSION['user']['tirelire']; ?> €</li>
    <li class="list-group-item">adresse :<br><?= $_SESSION['user']['numero_voie'].' '.$_SESSION['user']['voie']; ?><br><?= $_SESSION['user']['cp'].' '.$_SESSION['user']['ville']; ?></li>
    <li class="list-group-item">Etes-vous un de nos point relais : <?php if($_SESSION['user']['point_relais'] == 0): echo '<strong>NON</strong>'; else: echo '<strong>OUI</strong>'; endif; ?>
        <a href="<?=  BASE_PATH.'profil/updateRelais' ; ?>" class="btn btn-info ms-5"><?php if($_SESSION['user']['point_relais'] == 0): echo 'Devenir point relais'; else: echo 'Ne plus être point relais'; endif; ?></a></li>
</ul>
  <div class="card-body">
    <a href="<?=  BASE_PATH.'profil/gestionAchat' ; ?>" class="card-link">Gerer mes achats</a>
    <a href="<?=  BASE_PATH.'profil/gestionVente' ; ?>" class="card-link">Gerer mes ventes</a>
  </div>
  <div class="card-body">
    <a href="<?=  BASE_PATH.'profil/gestionProfil'."?id=".$_SESSION['user']['id'] ; ?>" class="card-link">Modifier mes informations</a>
    <a href="<?=  BASE_PATH.'profil/updateMdp'."?id=".$_SESSION['user']['id'] ; ?>" class="card-link">Modifier mon mot de passe</a>
</div>



<?php include(VIEWS . '_partials/footer.php'); ?>