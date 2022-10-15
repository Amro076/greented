<?php  include(VIEWS.'_partials/header.php');

if (!isset($_SESSION['user'])){

    header('location:../');
    exit();


}
?>



<form method="post" action="<?php if (isset($produit)): echo  BASE_PATH.'produit/modifier' ; else: echo BASE_PATH.'produit/ajout' ;  endif; ?>"  enctype="multipart/form-data" >
    <fieldset>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Titre de l'annonce</label>
            <input name="titre"   value="<?=  $produit['titre'] ?? '' ; ?>"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrez un titre pour votre annonce">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Prix</label>
            <input name="prix" value="<?=  $produit['prix'] ?? '' ; ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre prix">
        </div>
        <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Catégorie</label>
            <select name="type" class="form-select" id="exampleSelect1">
                <option <?php if (isset($produit) && $produit['type']=='homme'): echo 'selected';     endif; ?>  value="homme">Homme</option>
                <option <?php if (isset($produit) && $produit['type']=='femme'): echo 'selected';     endif; ?> value="femme">Femme</option>
                <option <?php if (isset($produit) && $produit['type'] =='enfant'): echo 'selected';     endif;?> value="enfant">Enfant</option>

            </select>
        </div>
        <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Sous-Catégorie</label>
            <select name="id_categorie" class="form-select" id="exampleSelect1">
                <?php foreach($categories as $categorie): ?>
                <option <?php if (isset($produit) && $produit['id_categorie']==$categorie['id']): echo 'selected';     endif; ?>  value="<?=  $categorie['id'] ; ?>"><?=  $categorie['titre'] ; ?></option>
               <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Etat</label>
            <select name="etat" class="form-select" id="exampleSelect1">
                <option <?php if (isset($produit) && $produit['etat'] ==1): echo 'selected';     endif;?> value="1">Neuf</option>
                <option <?php if (isset($produit) && $produit['etat'] ==2): echo 'selected';     endif;?>  value="2">Tres bon état</option>
                <option <?php if (isset($produit) && $produit['etat'] ==3): echo 'selected';     endif;?>  value="3">Bon état</option>
                <option <?php if (isset($produit) && $produit['etat'] ==4): echo 'selected';     endif;?>  value="4">Vrac</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Description</label>
            <textarea name="description" class="form-control" id="exampleTextarea" rows="3"><?=  $produit['description'] ?? '' ; ?></textarea>
        </div>
        <?php if (isset($produit)): ?>
            <input type="hidden" name="id" value="<?=  $_GET['id'] ; ?>">
            <input type="hidden" name="photo" value="<?=  $produit['photo'] ; ?>">
        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Photo</label>
            <input name="photoUpdate" onchange="loadFile(event)" class="form-control" type="file" id="formFile">
            <img src="<?=  BASE.'upload/'.$produit['photo'] ; ?>" width="300" alt="">
            <img id="image"  alt="">
        </div>
        <?php else: ?>
            <div class="form-group">
                <label for="formFile" class="form-label mt-4">Photo</label>
                <input name="photo" onchange="loadFile(event)" class="form-control" type="file" id="formFile">
                <img id="image"  alt="">
            </div>

        <?php endif; ?>
        <button type="submit" class="btn btn-primary mt-5 mb-5">Publier</button>
    </fieldset>
</form>



<script>
    let loadFile = function(event)
    {
        let image = document.getElementById('image');

        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>


<?php  include(VIEWS.'_partials/footer.php'); ?>
