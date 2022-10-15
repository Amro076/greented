<!doctype html>
<html lang="en">

<head>
    <title><?= CONFIG['app']['name'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.0/sketchy/bootstrap.min.css"
          integrity="sha512-HELAKhzlCqBvNXJjqWSD4Upcf8ZsYykAY6wbNc380yhEwuNCtXo38EbvU6nrenCfZGMPzGsU95mvG5i8q3fflw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css"
          integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light ms-2 me-2 mt-2 pe-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_PATH; ?>"><img src="<?= BASE . 'img/logo.jpg'; ?>" width="80" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= BASE_PATH; ?>"><i class="fas fa-home fa-2x"></i></a>
                </li>


                <li class="nav-item ms-5">
                    <a class=" btn btn-info text-light" href="<?= BASE_PATH . 'produit/vrac'; ?>">Nos produits en vrac</a>
                </li>
            </ul>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="<?=  BASE_PATH.'utilisateur/updateTirelire' ; ?>" class=" btn btn-light text-white me-5 position-relative"><i
                            class="fas fa-piggy-bank fa-lg position-relative fa-2x text-warning"></i><span
                            class="position-absolute top-0 start-100 translate-middle badge text-info bg-transparent"><?= $_SESSION['user']['tirelire'] . ' €'; ?></span>
                </a>
            <?php endif; ?>

            <?php if (isset($_SESSION['panier'])): ?>
                <a href="<?= BASE_PATH . 'panier/gestion'; ?>"
                   class="btn btn-light text-info <?php if (!isset($_SESSION['panier'])) {
                       echo 'disabled';
                   } ?> me-5 position-relative"><i class="fas fa-shopping-basket fa-2x"></i><span
                            class="position-absolute top-0 start-100 translate-middle badge bg-transparent text-info border border-info"><?php if (!isset($_SESSION['panier'])):echo 0; else: echo count($_SESSION['panier']); endif; ?></span></a>
            <?php else: ?>
                <a href="<?= BASE_PATH . 'panier/gestion'; ?>"
                   class="btn disabled me-5 position-relative bg-transparent text-secondary"><i
                            class="fas fa-shopping-basket fa-2x"></i><span
                            class="badge position-absolute top-0 start-100 translate-middle bg-danger text-secondary">
            <?php if (!isset($_SESSION['panier'])):echo 0;
            else: echo count($_SESSION['panier']);
            endif; ?></span></a>
            <?php endif; ?>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="<?= BASE_PATH . 'produit/ajout'; ?>" class="btn btn-success me-5">Nouvelle annonce</a>
            <?php endif; ?>
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="<?= BASE_PATH . 'utilisateur/inscription'; ?>" class="btn btn-info me-5">Inscription</a>
                <a href="<?= BASE_PATH . 'utilisateur/connexion'; ?>" class="btn btn-secondary me-5">Connexion</a>
            <?php else: ?>
                <a href="<?= BASE_PATH . 'utilisateur/deconnexion'; ?>" class="btn btn-secondary me-5">Deconnexion</a>
            <?php endif; ?>
        </div>   <?php if (isset($_SESSION['user'])): ?>
        <div class=" dropstart nav-item   ">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-2x"></i></a>
            <div class="dropdown-menu mt-4 ">
                <a class="dropdown-item" href="<?= BASE_PATH . 'produit/gestion'; ?>">Gérer mes annonces</a>
                <?php if ($_SESSION['user']['role']=='ROLE_ADMIN'): ?>
                   <a class="dropdown-item" href="<?=  BASE_PATH.'categorie/ajout' ; ?>">Ajout catégorie</a>
                   <a class="dropdown-item" href="<?=  BASE_PATH.'categorie/gestion' ; ?>">Gestion catégories</a>
               <?php endif; ?>
                    <a class="dropdown-item" href="<?=  BASE_PATH.'profil'."?id=".$_SESSION['user']['id'] ; ?>">Mon profil</a>

                    <a href="<?= BASE_PATH . 'produit/ajout'; ?>" class="dropdown-item">Nouvelle annonce</a>
                   <div class="dropdown-divider"></div>
                    <a class="dropdown-item"
                       href="<?= BASE_PATH . 'utilisateur/deconnexion'; ?>">Déconnexion</a>

            </div>
        </div>
        <?php endif; ?>

</nav>


<div class="container mt-5">

    <?php if (isset($_SESSION['messages'])):
        foreach ($_SESSION['messages'] as $type => $messages):
            foreach ($messages as $message):
                ?>
                <div class="w-50 text-center mx-auto alert alert-<?= $type ?>"><?= $message; ?></div>

            <?php endforeach; endforeach;
        unset($_SESSION['messages']);
    endif; ?>

