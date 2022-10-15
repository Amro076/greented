<?php include(VIEWS . '_partials/header.php'); ?>



<?php if(isset($_GET['produit'])) :?>




    <div class=' row border border-danger rounded mb-3'>
        <div class="col-md-7 d-inline-flex p-2">
            <img class="p-1" src="<?= BASE.'upload/' . $produit['photo']; ?>" style="width: 25rem"  alt="">

            <div class='card-body text-center mt-5 ps-3 pe-3 pt-5 border border-warning rounded'>
                <h3><?= $produit['titre']; ?></h3>
                <h4 class='card-title'><?= $produit['prix']; ?>euros</h4>
                <p class='card-text'><?= $produit['description']; ?></p>
                <h5><?= 'Catégorie:' . $produit['type']; ?></h5>
                <h6><?= 'Etat'; ?>
                    <?php if ($produit['etat']==1): echo 'Neuf'; endif; ?>
                    <?php if ($produit['etat']==2): echo 'Très bon état'; endif; ?>
                    <?php if ($produit['etat']==3): echo 'Bon état'; endif; ?>
                    <?php if ($produit['etat']==4): echo 'Vrac'; endif; ?>
                </h6>
            </div>
        </div>
        <?php if($vendeur['point_relais']== 1 ): ?>
            <?php $adresse= $vendeur['numero_voie'].' '.$vendeur['voie'].' '.$vendeur['ville']  ;
            $address=str_replace(' ', '%20', $adresse);?>



            <div class=' col-md-4  mb-3 mt-5' >
                <h3>Informations du vendeur point relais:</h3>
                <div class='card-body'>
                    <p class='card-title'>Pseudo : <?= $vendeur['pseudo']; ?></p>
                    <p class='card-title'>Adresse : <?= $vendeur['numero_voie']; ?> <?= $vendeur['voie']; ?></p>
                    <p class='card-title'>Code Postal : <?= $vendeur['cp']; ?></p>
                    <p class='card-title'>Ville : <?= $vendeur['ville']; ?></p>
                </div>
                <section class="w-50  mt-3" id="section ">

                    <div class="mapouter "><div class="gmap_canvas"><iframe width="400" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=<?=$address ;?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br></div></div>
                </section>
            </div>

        <?php endif; ?>



        <div>
            <?php
            $affichage=true;
            if(isset($_SESSION['panier'])):
                foreach($_SESSION['panier'] as $index => $id): ?>
                    <?php if($id == $produit['id']):
                        $affichage=false;?>
                    <?php endif; ?>
                <?php endforeach; endif;  ?>
            <?php if($affichage): ?>
                <a href="<?= BASE_PATH.'panier/ajout?id='.$produit['id']; ?>" class="btn  btn-lg btn-info ms-5 mb-5">Ajouter au panier</a>
            <?php else: ?>
                <span class="btn btn-secondary disabled btn-lg mb-5 ms-5">Déjà ajouté au panier</span>
            <?php endif; ?>
        </div>

    </div>


<?php endif; ?>









<?php include(VIEWS . '_partials/footer.php'); ?>


