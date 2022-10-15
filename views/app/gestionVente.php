<?php include(VIEWS.'_partials/header.php');

if (!isset($_SESSION['user'])){

    header('location:../');
    exit();


}

?>




<table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Prix</th>
        <th scope="col">Photo</th>
        <th scope="col">Infos acheteur</th>
        <th scope="col">Infos point relais</th>
        <th scope="col">Visualisation lieux relais</th>
        <th scope="col">Date de livraison</th>
        <th scope="col">Etat de prise en charge</th>

        <th class="text-center" scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($commandes as $commande):
        $relais=Utilisateur::findById(['id'=>$commande['id_relais']]);
        $adresse = $relais['numero_voie'] . ' ' . $relais['voie'] . ' ' . $relais['ville'];
        //var_dump($commande);
        $livraison=Livraison::detailLivraison(['id_commande'=>$commande['id_commande']]);
        $address = str_replace(' ', '%20', $adresse);
        ?>


        <tr>
            <th scope="row"><?=  $commande['id_commande'] ; ?></th>
            <td><?=  $commande['titre'] ; ?></td>
            <td><?=  $commande['prix'] ; ?>€</td>
            <td><img src="<?=  BASE.'upload/'.$commande['photo'] ; ?>" width="70" alt=""></td>
            <td >
                <div>
                    <p class='card-title'><strong>Pseudo</strong> : <?= $commande['pseudo']; ?></p>
                    <p class='card-title'><strong>Adresse</strong> : <?= $commande['numero_voie']; ?> <?= $commande['voie']; ?></p>
                    <p class='card-title'><strong>Code Postal</strong> : <?= $commande['cp']; ?></p>
                    <p class='card-title'><strong>Ville</strong> : <?= $commande['ville']; ?></p>
                </div>


            </td>
            <td>
                <div>
                    <p class='card-title'><strong>Pseudo</strong> : <?= $relais['pseudo']; ?></p>
                    <p class='card-title'><strong>Adresse</strong> : <?= $relais['numero_voie']; ?> <?= $relais['voie']; ?></p>
                    <p class='card-title'><strong>Code Postal</strong> : <?= $relais['cp']; ?></p>
                    <p class='card-title'><strong>Ville</strong> : <?= $relais['ville']; ?></p>
                </div>

            </td>
            <td>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100" height="100" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=<?= $address; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://123movies-to.org"></a><br></div>
                </div>
            </td>
            <td>
              <?=  date_format(new DateTime($commande['date_reception']), 'D-d-m-Y') ; ?>
            </td>
            <td>
              <?php if ($commande['statut']==0): ?>
                <p>A confirmer</p>
              <?php elseif ($commande['statut']==1): ?>
                <p>Confirmé</p>
              <?php elseif ($commande['statut']==2): ?>
                <p>Livré</p>
              <?php elseif ($commande['statut']==3): ?>
                <p>Receptionné</p>
              <?php endif; ?>
            </td>
            <td>
                <?php if ($commande['statut']==0): ?>
                    <a class="btn btn-info"  href="<?=  BASE_PATH.'livraison/update?statut=1&livraison='.$livraison['id'].'&commande='.$commande['id_commande'] ; ?>">Confirmer</a>
                <?php elseif ($commande['statut']==1): ?>
                    <a class="btn btn-info" href="<?=  BASE_PATH.'livraison/update?statut=2&livraison='.$livraison['id'].'&commande='.$commande['id_commande'] ; ?>">Valider dépot point relais</a>
                <?php  endif; ?>

            </td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>





<?php include(VIEWS.'_partials/footer.php');  ?>
