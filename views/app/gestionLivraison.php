<?php include(VIEWS . '_partials/header.php');


if (!isset($_SESSION['user'])){

    header('location:../');
    exit();


}
//var_dump($vendeur, $pointrelais);
?>


<?php foreach ($vendeur as $index => $point): ?>

    <form method="post" action="<?= BASE_PATH . 'panier/commander'; ?>">
        <div class=" row text-center justify-content-center border border-dark ">
            <?php $adresse = $point['numero_voie'] . ' ' . $point['voie'] . ' ' . $point['ville'];
            $address = str_replace(' ', '%20', $adresse); ?>
            <h3>Informations du vendeur point relais:</h3>
            <div class=' col-md-5 mt-5'>
                <p class='card-title'><strong>Pseudo</strong> : <?= $point['pseudo']; ?></p>
                <p class='card-title'><strong>Adresse</strong> : <?= $point['numero_voie']; ?> <?= $point['voie']; ?></p>
                <p class='card-title'><strong>Code Postal</strong> : <?= $point['cp']; ?></p>
                <p class='card-title'><strong>Ville</strong> : <?= $point['ville']; ?></p>
            </div>
            <section class="col-md-5" id="section">

                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="400" height="400" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=<?= $address; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://123movies-to.org"></a><br></div>
                </div>
            </section>
            <input type="hidden" name='id_relais' value="<?=  $point['id'] ; ?>">
            <button class="btn btn-secondary w-50 mx-auto mb-2" type="submit">Choisir ce point relais</button>
        </div>
    </form>
<?php endforeach; ?>
<div class="text-center mt-3">
<h4> Liste des autres point relais disponibles </h4>
<form action="<?= BASE_PATH . 'panier/commander'; ?>" method="post">

    <div class="form-group">

        <select name='id_relais' class="form-select" id="exampleSelect1">
            <?php foreach ($pointrelais as $relais) : ?>
                <option value="<?= $relais['id']; ?>"><?= $relais['numero_voie'] . ' ' . $relais['voie'] . ' ' . $relais['cp']; ?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-secondary w-50 mx-auto mt-2 mb-2" type="submit">Choisir ce point relais</button>
    </div>


</form>
</div>

<?php include(VIEWS . '_partials/footer.php'); ?>

