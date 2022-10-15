<?php include(VIEWS.'_partials/header.php');



?>


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>

        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $categorie): ?>
    <tr>
        <th scope="row"><?=  $categorie['id'] ; ?></th>
        <td><?=  $categorie['titre'] ; ?></td>
        <td>
            <a href="<?=  BASE_PATH.'categorie/modification?id='.$categorie['id'] ; ?>">
                <img class="me-5 " src="<?=  BASE.'img/edit.png' ; ?>" width="40" title="Modifier">
            </a>

            <a onclick="return confirm('Etes-vous sûr de vouloir supprimmer cette catégorie?')" href="<?=  BASE_PATH.'categorie/suppression?id='.$categorie['id'] ; ?>">
                <img src="<?=  BASE.'img/delete.png' ; ?>" width="40" title="Supprimer">
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

    </tbody>
</table>















<?php include(VIEWS.'_partials/footer.php');  ?>
