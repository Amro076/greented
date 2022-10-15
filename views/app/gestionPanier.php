<?php include(VIEWS.'_partials/header.php');


if (!isset($_SESSION['panier'])):
header('location:../');
exit();
endif;

?>




<table class="table table-dark table-striped w-50 mx-auto">
    <thead>
    <tr>
        <th class="text-center" scope="col">#</th>
        <th class="text-center" scope="col">Titre</th>
        <th class="text-center" scope="col">Prix</th>
        <th class="text-center" scope="col">Photo</th>
        <th class="text-center" scope="col">Retirer</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($produits as $produit):
        ?>
        <tr class="pt-1">
            <th class="text-center" scope="row"><?=  $produit['id'] ; ?></th>
            <td class="text-center"><?=  $produit['titre'] ; ?></td>
            <td class="text-center"><?=  $produit['prix'] ; ?>€</td>
            <td class="text-center"><img src="<?=  BASE.'upload/'.$produit['photo'] ; ?>" width="70" alt=""></td>
            <td class="text-center">

                <a href="<?=  BASE_PATH.'panier/retirer?id='.$produit['id'] ; ?>" class="btn btn-primary">-</a>

            </td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>
<h4>Total panier: <?=  '<strong>'.$total.' €</strong>' ; ?></h4>
<div class="text-center">
<a href="<?= BASE_PATH.'panier/supprimer' ;   ?>" class="btn btn-danger">Vider le panier</a>

<?php if (isset($_SESSION['user'])):
    if ($_SESSION['user']['tirelire'] >= $total):
    ?>

<a href="<?= BASE_PATH.'livraison/choix' ;  ?>" class="btn btn-info">Commander</a>
<?php else: ?>
        <a href="" class="btn btn-info">Il est tant de remplir la tirelire !!</a>
<?php endif; else: ?>
    <a href="<?=  BASE_PATH.'utilisateur/connexion' ; ?>" class="btn btn-info">Connectez-vous pour passer à la commande</a>
<?php endif; ?>
</div>



<?php include(VIEWS.'_partials/footer.php');  ?>
