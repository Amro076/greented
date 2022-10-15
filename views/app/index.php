<?php include(VIEWS . '_partials/header.php'); ?>
<form action="<?= BASE_PATH .'produit/filtre'; ?>"class="row g-3" method="get">

    <div class="form-grou col-md-6">
        <label for="type" class="form-label mt-4">Type</label>
        <select class="form-select" id="type" name="type">
            <option class="text-center" value="" >-----------------------------selectionnez un type---------------------------</option>
            <option class="text-center" value="homme" <?php if(isset($_GET['type']) && $_GET['type'] == "homme"): echo "selected"; endif; ?>>homme</option>
            <option class="text-center" value="femme" <?php if(isset($_GET['type']) && $_GET['type'] == "femme"): echo "selected"; endif; ?>>femme</option>
            <option class="text-center" value= "enfant" <?php if(isset($_GET['type']) && $_GET['type'] == "enfant"): echo "selected"; endif; ?>>enfant</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="etat" class="form-label  mt-4">Etat</label>
        <select class="form-select" id="etat" name="etat">
            <option class="text-center" value="">-----------------------------selectionnez un Etat----------------------------</option>
            <option class="text-center" value="1" <?php if(isset($_GET['etat']) && $_GET['etat'] == "1"): echo "selected"; endif; ?> >Neuf</option>
            <option class="text-center" value="2" <?php if(isset($_GET['etat']) && $_GET['etat'] == "2"): echo "selected"; endif; ?>>Très bon</option>
            <option class="text-center" value= "3" <?php if(isset($_GET['etat']) && $_GET['etat'] == "3"): echo "selected"; endif; ?>>Bon</option>
        </select>
    </div>
    <div class="mb-5">
        <button type="submit" class="btn btn-primary col-md-2">filtrer</button>
        <a href="<?= BASE_PATH ; ?>" class="btn btn-danger col-md-2">reset filtre</a>
    </div>
</form>
<div class="row justify-content-between">
    <?php foreach ($produits as $produit): ?>
        <div class="card col-md-4 border-info me-2 ms-2 mb-3 mt-2" style="max-width: 20rem;">
            <a href="<?= BASE_PATH . 'produit/ficheProduit?produit=' . $produit['id']; ?>">
                <img class="p-1 img-fluid"  src="<?= BASE . 'upload/' . $produit['photo']; ?>" alt="">

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
                </div>
            </a>
            <div>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['id']==$produit['id_utilisateur']): ?>
                <button class="btn btn-warning disabled">C'est votre annonce!!</button>
                <?php
                else:
                $affichage = true;
                if (isset($_SESSION['panier'])):
                    foreach ($_SESSION['panier'] as $index => $id):
                        if ($id == $produit['id']):
                            $affichage = false;
                        endif;
                    endforeach;
                endif;
                if ($affichage):
                    ?>

                    <a href="<?= BASE_PATH . 'panier/ajout?id=' . $produit['id'] . '&redirect=accueil'; ?>"
                       class="btn btn-info mb-2">Ajouter au panier</a>


                <?php

                else: ?>
                    <span class="btn disabled btn-secondary mb-2">Déjà ajouté au panier !!</span>
                <?php endif;endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include(VIEWS . '_partials/footer.php'); ?>
