<?php

class AppController
{

    public static function index()
    {
        $produits = Produit::readNoVrac();

        include(VIEWS . 'app/index.php');
    }


    public static function ajoutProduit()
    {
        if (!empty($_POST)): // condition de soumission du formulaire. $_POST ne sera alors pas vide

            if (!empty($_FILES['photo']['name']) && !empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['type']) && !empty($_POST['etat']) && !empty($_POST['prix'])):

                //die(var_dump($_FILES));
                if (!empty($_FILES['photo']['name']) && $_FILES['photo']['size'] < 3000000 && ($_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/gif')): // condition qui verifie qu'une photo ai été uploadée
                    //die('coucou');      //die(var_dump($_FILES));
                    // on rrenomme le fichier d'upload pour que son nom soit unique et n'écrase pas un précédent fichier du même nom
                    $photoName = date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['photo']['name'];

                    // condition d'existance du dossier d'upload
                    if (!file_exists(PUBLIC_FOLDER . 'upload')):
                        // méthode de php permettant de créer un dossier avec droits de lecture et d'ecriture
                        mkdir(PUBLIC_FOLDER . 'upload', 777);

                    endif;

                    // on copie dans notre dossier d'upload le fichier chargé et renommé
                    copy($_FILES['photo']['tmp_name'], PUBLIC_FOLDER . 'upload/' . $photoName);

                    Produit::create([
                        'titre' => $_POST['titre'],
                        'photo' => $photoName,
                        'description' => $_POST['description'],
                        'prix' => $_POST['prix'],
                        'etat' => $_POST['etat'],
                        'type' => $_POST['type'],
                        'id_utilisateur' => $_SESSION['user']['id']
                    ]);

                    $_SESSION['messages']['success'][] = 'Votre annonce a bien été créée';

                    header('location:../produit/gestion');
                    exit();

                endif;

            //die(var_dump( $_POST, $_FILES));
            else:
                $_SESSION['messages']['danger'][] = 'Tout les champs du formulaire doivent être saisis';
                header('location:../produit/ajout');
                exit();

            endif;

        endif;


        include(VIEWS . 'app/ajoutProduit.php');
    }


    public static function gestionProduit()
    {
        $produits = Produit::readAll(['id_utilisateur' => $_SESSION['user']['id']]);

        include(VIEWS . 'app/gestionProduit.php');
    }

    public static function modificationProduit()
    {
        if (!empty($_GET['id'])):

            $produit = Produit::readOne([
                'id' => $_GET['id']
            ]);
            // var_dump($produit);
        endif;

        if (!empty($_POST)): // condition de soumission du formulaire. $_POST ne sera alors pas vide

            //die(var_dump($_FILES));
            if (!empty($_FILES['photoUpdate']['name']) && $_FILES['photoUpdate']['size'] < 3000000 && ($_FILES['photoUpdate']['type'] == 'image/jpeg' || $_FILES['photoUpdate']['type'] == 'image/png' || $_FILES['photoUpdate']['type'] == 'image/gif')):
                $photoName = date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['photoUpdate']['name'];


                // on supprime la précédente photo grace à la méthode unlink qui attend en argument le chemin complet d'acces au fichier à supprimer
                unlink(PUBLIC_FOLDER . 'upload/' . $_POST['photo']);
                // on copie dans notre dossier d'upload le fichier chargé et renommé
                copy($_FILES['photoUpdate']['tmp_name'], PUBLIC_FOLDER . 'upload/' . $photoName);

            else:

                $photoName = $_POST['photo'];

            endif;
            Produit::update([
                'titre' => $_POST['titre'],
                'photo' => $photoName,
                'description' => $_POST['description'],
                'prix' => $_POST['prix'],
                'etat' => $_POST['etat'],
                'type' => $_POST['type'],
                'id' => intval($_POST['id'])

            ]);
            //die(var_dump( $_POST, $_FILES));

            $_SESSION['messages']['success'][] = 'Annonce modifiée avec succès';


            header('location:../produit/gestion');
            exit();

        endif;


        include(VIEWS . 'app/ajoutProduit.php');
    }

    public static function suppressionProduit()
    {

        if (!empty($_GET['id'])):
            Produit::delete([
                'id' => intval($_GET['id'])
            ]);

            $_SESSION['messages']['success'][] = 'Annonce supprimée avec succès';
        endif;

        header('location:../produit/gestion');
        exit();

    }

    public static function inscription()
    {

        $error = [];
        if (!empty($_POST)):

            function valid_pass($candidate)
            {
                $r1 = '/[A-Z]/';  //Uppercase
                $r2 = '/[a-z]/';  //lowercase
                $r3 = '/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
                $r4 = '/[0-9]/';  //numbers

//                if (preg_match_all($r1, $candidate, $o) < 1) return FALSE;
//
//                if (preg_match_all($r2, $candidate, $o) < 1) return FALSE;
//
//                if (preg_match_all($r3, $candidate, $o) < 1) return FALSE;
//
//                if (preg_match_all($r4, $candidate, $o) < 1) return FALSE;
//
//                if (strlen($candidate) < 8) return FALSE;

                return TRUE;
            }


            if (empty($_POST['nom']) || preg_match('#[0-9]#', $_POST['nom'])):
                $error['nom'] = 'Le champs est obligatoire et doit contenir uniquement des lettres';
            endif;
            if (empty($_POST['prenom']) || preg_match('#[0-9]#', $_POST['prenom'])):
                $error['prenom'] = 'Le champs est obligatoire et doit contenir uniquement des lettres';
            endif;
            if (empty($_POST['pseudo'])):
                $error['pseudo'] = 'Le champs est obligatoire';
            endif;
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || Utilisateur::findByEmail(['email' => $_POST['email']])):

                if (Utilisateur::findByEmail(['email' => $_POST['email']])):
                    $_SESSION['messages']['danger'][] = 'Un compte est déjà existant à cette adresse mail, veuillez procéder à la récupération de mot passe';
                    $error['email'] = '';
                else:
                    $error['email'] = 'Le champs est obligatoire et l\'adresse mail doit être valide';
                endif;

            endif;
            if (empty($_POST['mdp']) || !valid_pass($_POST['mdp'])):
                $error['mdp'] = 'Le champs est obligatoire et votre mot de passe doit contenir, majuscule, minuscule, chiffre lettre et caractère spécial';
            endif;
            if (empty($_POST['confirmMdp']) || $_POST['mdp'] !== $_POST['confirmMdp']):
                $error['confirmMdp'] = 'Le champs est obligatoire et doit concorder avec le champs mot de passe';
            endif;
            if (empty($_POST['numero_voie'])):
                $error['numero_voie'] = 'Le champs est obligatoire';
            endif;
            if (empty($_POST['voie'])):
                $error['voie'] = 'Le champs est obligatoire';
            endif;
            if (empty($_POST['ville']) || preg_match('#[0-9]#', $_POST['ville'])):
                $error['ville'] = 'Le champs est obligatoire et doit contenir uniquement des lettres';
            endif;
            if (empty($_POST['cp']) || !preg_match('#^[0-9]{5}$#', $_POST['cp'])):
                $error['cp'] = 'Le champs est obligatoire';
            endif;

            if (empty($error)):
                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

                Utilisateur::create([
                    'email' => $_POST['email'],
                    'pseudo' => $_POST['pseudo'],
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'mdp' => $mdp,
                    'tirelire' => 200,
                    'numero_voie' => $_POST['numero_voie'],
                    'voie' => $_POST['voie'],
                    'cp' => $_POST['cp'],
                    'ville' => $_POST['ville'],
                    'point_relais' => 0,
                    'role' => 'ROLE_USER'

                ]);

                $_SESSION['messages']['success'][] = 'Félicitation, vous êtes à présent inscrit. Connectez-vous!!';
                header('location:../utilisateur/connexion');
                exit();

            endif;


        endif;


        include(VIEWS . 'app/inscription.php');
    }


    public static function connexion()
    {

        if (!empty($_POST)):
            $user = Utilisateur::findByEmail(['email' => $_POST['email']]);

            if ($user):
                if (password_verify($_POST['mdp'], $user['mdp'])):
                    $_SESSION['user'] = $user;
                    $_SESSION['messages']['success'][] = "Bienvenue " . $user['pseudo'] . " !!!";
                    header('location:../');
                    exit();
                else:
                    $_SESSION['messages']['danger'][] = 'Erreur sur le mot de passe';
                endif;


            else:
                $_SESSION['messages']['danger'][] = 'Aucun compte existant à cette adresse mail';
            endif;


        endif;


        include(VIEWS . 'app/connexion.php');
    }


    public static function deconnexion()
    {
        unset($_SESSION['user']);
        $_SESSION['messages']['info'][] = 'A bientôt !!!';
        header('location:../');
        exit();

    }


    public static function ajoutPanier()
    {
        Panier::add($_GET['id']);
        //die(var_dump($_SESSION['panier']));


        $_SESSION['messages']['success'][] = 'produit ajouté !!!';
        header('location:../');
        exit();
    }

    public static function gestionPanier()
    {

        $produits = Panier::getPanier();
        // var_dump($produits);
        $total=Panier::getTotal();

        include(VIEWS . 'app/gestionPanier.php');
    }


    public static function retirerPanier()
    {
        Panier::remove($_GET['id']);
        //die(var_dump($_SESSION['panier']));


        $_SESSION['messages']['success'][] = 'produit retiré du panier !!!';
        header('location:../panier/gestion');
        exit();
    }


    public static function supprimerPanier()
    {
        Panier::delete();
        //die(var_dump($_SESSION['panier']));


        $_SESSION['messages']['success'][] = 'Panier vidé !!!';
        header('location:../');
        exit();

    }


    public static function commander()
    {

        $panier = Panier::getPanier();
        $id_commande = Commande::create([
            'id_utilisateur' => $_SESSION['user']['id'],
            'date' => date_format(new DateTime(), 'Y-m-d'),
            'statut' => 0
        ]);

        foreach ($panier as $index => $produit):
          Achat::create([
            'id_produit'=>$produit['id'],
              'id_commande'=>$id_commande
          ]);
          Produit::updateStatut(['id'=>$produit['id']]);
         $vendeur=Utilisateur::findById(['id'=>$produit['id_utilisateur']]);

         Utilisateur::updateTirelire([
             'tirelire'=>$vendeur['tirelire'] + $produit['prix'],
             'id'=>$vendeur['id']
         ]);
         Utilisateur::updateTirelire([
             'tirelire'=>$_SESSION['user']['tirelire'] - $produit['prix'],
             'id'=>$_SESSION['user']['id']
         ]);
         $_SESSION['user']['tirelire']=$_SESSION['user']['tirelire'] - $produit['prix'];
        endforeach;


        unset($_SESSION['panier']);

        $_SESSION['messages']['success'][]='Merci pour votre achat !!!';

        header('location:../');
        exit();


    }


}
