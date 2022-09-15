<?php include(VIEWS . '_partials/header.php'); ?>


<div class="row justify-content-between">
    <?php foreach ($produits as $produit): ?>
        <div class="card col-md-4 border-info me-2 ms-2 mb-3 mt-2" style="max-width: 20rem;">
            <img class="p-1" src="<?= BASE . 'upload/' . $produit['photo']; ?>" alt="">
            <div class="card-header"><?= $produit['titre']; ?></div>
            <div class="card-body">
                <h4 class="card-title"><?= $produit['prix']; ?>€</h4>
                <p class="card-text"><?= $produit['description']; ?></p>
                <h6><?= '<strong>Catégorie</strong>: ' . $produit['type']; ?></h6>
                <h6><?= '<strong>Etat</strong>: '; ?>
                    <?php if ($produit['etat'] == 1): echo 'Neuf'; endif; ?>
                    <?php if ($produit['etat'] == 2): echo 'Très bon état'; endif; ?>
                    <?php if ($produit['etat'] == 3): echo 'Bon état'; endif; ?>
                    <?php if ($produit['etat'] == 4): echo 'Vrac'; endif; ?>
                </h6>

                <?php
                $affichage=true;
                if (isset($_SESSION['panier'])):
                foreach ($_SESSION['panier'] as $index => $id):
                    if ($id == $produit['id']):
                        $affichage=false;
                    endif;
                endforeach;
                endif;
                if ($affichage):
                ?>

                <a href="<?= BASE_PATH . 'panier/ajout?id=' . $produit['id']; ?>" class="btn btn-info">Ajouter au
                    panier</a>
                <?php

                else:  ?>
                <span class="btn disabled btn-secondary" >Déjà ajouté au panier !!</span>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include(VIEWS . '_partials/footer.php'); ?>
