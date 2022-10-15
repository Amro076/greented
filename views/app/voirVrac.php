<?php include(VIEWS . '_partials/header.php'); ?>


<div class="row justify-content-between">
    <?php foreach ($vracs as $vrac) : ?>
        <div class="card col-md-4 border-info me-2 ms-2 mb-3 mt-2" style="max-width: 20rem;">
            <a href="<?= BASE_PATH . 'produit/ficheProduit?produit=' . $vrac['id']; ?>">
                <img class="p-1" src="<?= BASE . 'upload/' . $vrac['photo']; ?>" alt="">
                <div class="card-header"><?= $vrac['titre']; ?></div>
                <div class="card-body">
                    <h4 class="card-title"><?= $vrac['prix']; ?>€</h4>
                    <p class="card-text"><?= $vrac['description']; ?></p>
                    <h6><?= '<strong>Catégorie</strong> : ' . $vrac['type']; ?></h6>
                    <h6><?= '<strong>Etat</strong> : '; ?>
                        <?php if ($vrac['etat'] == 4) : echo 'Vrac';
                        endif; ?>
                    </h6>
                </div>
            </a>
            <div>
                <?php
                $affichage = true;
                if (isset($_SESSION['panier'])) :
                    foreach ($_SESSION['panier'] as $index => $id) :
                        if ($id == $vrac['id']) :
                            $affichage = false;
                        endif;
                    endforeach;
                endif;
                if ($affichage) :
                    ?>

                    <a href="<?= BASE_PATH . 'panier/ajout?id=' . $vrac['id'] . '&redirect=vrac'; ?>"
                       class="btn btn-info">Ajouter au
                        panier</a>
                <?php

                else : ?>
                    <span class="btn disabled btn-secondary">Déjà ajouté au panier !!</span>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>


</div>


<?php include(VIEWS . '_partials/footer.php'); ?>
