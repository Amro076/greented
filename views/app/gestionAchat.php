<?php include(VIEWS.'_partials/header.php');

if (!isset($_SESSION['user'])){

    header('location:../');
    exit();


}
?>

<?php foreach ($commandes as  $commande):
     $achats=Achat::detailAchat(['id_commande'=>$commande['id']]) ;

     $livraison=Livraison::detailLivraison(['id_commande'=>$commande['id']]);
    // var_dump($livraison);
     $relais=Utilisateur::findById(['id'=>$livraison['id_relais']]);
     //var_dump($relais);
    $adresse = $relais['numero_voie'] . ' ' . $relais['voie'] . ' ' . $relais['ville'];
    //var_dump($commande);
    $address = str_replace(' ', '%20', $adresse);

     ?>
<table class="table table-dark table-striped mt-0 mb-0">
    <thead>
    <tr>
    <th class="text-center"><h4><?=  'Commande N° : '.$commande['id'].' du '.date_format(new DateTime($commande['date']), 'D-d-m-Y') ; ?></h4></th>
    </tr>   </thead>

</table>


    <table class="table table-dark table-striped mt-0 mb-0">
        <thead>
        <tr>
            <th class="text-center" colspan="3"><h4>Détail de vos achats</h4></th>
        </tr>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Prix</th>
            <th scope="col">Photo</th>
        </tr>
        </thead>
        <tbody>

      <?php foreach ($achats as  $achat):
     $produit=Produit::readOne(['id'=>$achat['id_produit']]);
            ?>
            <tr>
                <td><?=  $produit['titre'] ; ?></td>
                <td><?=  $produit['prix'] ; ?>€</td>
                <td><img src="<?=  BASE.'upload/'.$produit['photo'] ; ?>" width="70" alt=""></td>

            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
    <table class="table table-dark table-striped mt-0 mb-0">
        <thead>
        <tr>
            <th> <h5>Informations point relais</h5></th>
            <th> <h5>Visualisation point relais</h5></th>
            <th> <h5>Etat de la livraison</h5></th>

            <th> <h5>Date de livraison</h5></th>

        </tr>
        <tr>
            <th>

                <p class='card-title'><strong>Pseudo</strong> : <?= $relais['pseudo']; ?></p>
                <p class='card-title'><strong>Adresse</strong> : <?= $relais['numero_voie']; ?> <?= $relais['voie']; ?></p>
                <p class='card-title'><strong>Code Postal</strong> : <?= $relais['cp']; ?></p>
                <p class='card-title'><strong>Ville</strong> : <?= $relais['ville']; ?></p>
            </th>
            <th class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100" height="100" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=<?= $address; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://123movies-to.org"></a><br></div>
            </th>
            <th>

                <?php if ($commande['statut']==0): ?>
                    <p>A confirmer</p>
                <?php elseif ($commande['statut']==1): ?>
                    <p>Confirmé</p>
                <?php elseif ($commande['statut']==2): ?>
                    <p>Livré</p><a href="<?=  BASE_PATH.'livraison/update?statut=3&livraison='.$livraison['id'].'&commande='.$commande['id'].'&type=acheteur' ; ?>" class="btn btn-warning">Accuser reception</a>
                <?php elseif ($commande['statut']==3): ?>
                    <p>Receptionné</p>
                <?php endif; ?>
            </th>
            <td>

                <p> <?=  date_format(new DateTime($livraison['date_reception']), 'D-d-m-Y') ; ?></p>
            </td>

        </tr>
        </thead>
    </table>

<?php endforeach; ?>







<?php include(VIEWS.'_partials/footer.php');  ?>
