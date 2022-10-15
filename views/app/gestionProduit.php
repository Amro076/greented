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
        <th scope="col">Categorie</th>
        <th class="text-center" scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    
    <?php   
    foreach ($produits as $produit):
        $categorie=Categorie::readOne(['id'=>$produit['id_categorie']])
    ?>
    <tr>
        <th scope="row"><?=  $produit['id'] ; ?></th>
        <td><?=  $produit['titre'] ; ?></td>
        <td><?=  $produit['prix'] ; ?>€</td>
        <td><img src="<?=  BASE.'upload/'.$produit['photo'] ; ?>" width="70" alt=""></td>
        <td><?=   $categorie['titre']; ?></td>
        <td class="text-center">

            <a href="">
                <a href="<?=BASE_PATH.'produit/ficheProduit?produit='.$produit['id'];?>"><img class="me-5 " src="<?=  BASE.'img/view.png' ; ?>" width="40"  title="Voir"></a>

            </a>

            <a href="<?=  BASE_PATH.'produit/modifier?id='.$produit['id'] ; ?>">
                <img class="me-5 " src="<?=  BASE.'img/edit.png' ; ?>" width="40" title="Modifier">
            </a>

            <a onclick="return confirm('Etes-vous sûr de vouloir supprimmer cette annonce?')" href="<?=  BASE_PATH.'produit/supprimer?id='.$produit['id'] ; ?>">
                <img src="<?=  BASE.'img/delete.png' ; ?>" width="40" title="Supprimer">
            </a>

        </td>
    </tr>
<?php   
 endforeach;
?>
    </tbody>
</table>





<?php include(VIEWS.'_partials/footer.php');  ?>
