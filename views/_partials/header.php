<!doctype html>
<html lang="en">

<head>
    <title><?= CONFIG['app']['name'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.0/sketchy/bootstrap.min.css" integrity="sha512-HELAKhzlCqBvNXJjqWSD4Upcf8ZsYykAY6wbNc380yhEwuNCtXo38EbvU6nrenCfZGMPzGsU95mvG5i8q3fflw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=  BASE_PATH ; ?>"><img src="<?=  BASE.'img/logo.jpg' ; ?>" width="80"  alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=  BASE_PATH ; ?>">Accueil

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=  BASE_PATH.'produit/gestion' ; ?>">Gérer mes annonces</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
            </ul>

            <?php if (isset($_SESSION['user'])): ?><button class="disabled btn btn-danger
 text-white btn-lg me-5 position-relative" >Tirelire<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"><?=  $_SESSION['user']['tirelire'].'€' ; ?></span></button><?php endif; ?>
            <a href="<?=  BASE_PATH.'panier/gestion' ; ?>" class="btn btn-warning <?php if (!isset($_SESSION['panier'])) { echo 'disabled';} ?>
 text-dark btn-lg me-5 position-relative">Voir le panier<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php if (!isset($_SESSION['panier'])):echo  0; else: echo count($_SESSION['panier']); endif; ?></span></a>

            <?php if (isset($_SESSION['user'])): ?>
            <a href="<?=  BASE_PATH.'produit/ajout' ; ?>" class="btn btn-success btn-lg me-5">Créer une nouvelle annonce</a>
            <?php endif; ?>
            <?php if (!isset($_SESSION['user'])): ?>
            <a href="<?=  BASE_PATH.'utilisateur/inscription' ; ?>" class="btn btn-info  me-5">Inscription</a>
            <a href="<?=  BASE_PATH.'utilisateur/connexion' ; ?>" class="btn btn-primary  me-5">Connexion</a>
            <?php else: ?>
                <a href="<?=  BASE_PATH.'utilisateur/deconnexion' ; ?>" class="btn btn-primary  me-5">Déconnexion</a>
            <?php endif; ?>

        </div>
    </div>
</nav>


<div class="container mt-5">

                        <?php if (isset($_SESSION['messages'])):
                            foreach ($_SESSION['messages'] as $type=>$messages):
                                foreach ($messages as $message):
                            ?>
                              <div class="w-50 text-center mx-auto alert alert-<?= $type ?>"><?=  $message; ?></div>

                        <?php endforeach; endforeach;
                        unset($_SESSION['messages']);
                        endif; ?>

