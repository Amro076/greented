<?php

/**
 * Fichier contenant la configuration de l'application
 */
const CONFIG = [
    'db' => [
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'greented',
        'DB_USER' => 'root',
        'DB_PSWD' => '',
    ],
    'app' => [
        'name' => 'Greented',
        'projectBaseUrl' => 'http://localhost/GREENTED'
    ]
];

/**
 * Constantes pour accéder rapidement aux dossiers importants du MVC
 */
const BASE_DIR = __DIR__ . '\\..\\';
const BASE= CONFIG['app']['projectBaseUrl'].'/public/';
const BASE_PATH = CONFIG['app']['projectBaseUrl'] . '/public/index.php/';
const PUBLIC_FOLDER = BASE_DIR . 'public\\';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';


/**
 * Liste des actions/méthodes possibles (les routes du routeur)
 */
$routes = [
    ''                  => ['AppController', 'index'],
    '/'                 => ['AppController', 'index'],
    '/produit/ajout'    =>[ 'AppController', 'ajoutProduit'],
    '/produit/gestion'  =>[ 'AppController', 'gestionProduit'],
    '/produit/modifier'  =>[ 'AppController', 'modificationProduit'],
    '/produit/supprimer'  =>[ 'AppController', 'suppressionProduit'],
    '/utilisateur/inscription'  =>[ 'AppController', 'inscription'],
    '/utilisateur/connexion'  =>[ 'AppController', 'connexion'],
    '/utilisateur/deconnexion'=>[ 'AppController', 'deconnexion'],
    '/panier/ajout'=>  ['AppController', 'ajoutPanier'],
    '/panier/gestion'=>  ['AppController', 'gestionPanier'],
    '/panier/retirer'=>  ['AppController', 'retirerPanier'],
    '/panier/supprimer'=>  ['AppController', 'supprimerPanier'],
    '/panier/commander'=>  ['AppController', 'commander'],
    '/livraison/choix'=>  ['AppController', 'choixPointRelais'],
    '/produit/vrac'=>  ['AppController', 'voirVrac'],
    '/produit/ficheProduit' => ['AppController', 'ficheProduit'],
    '/profil'=>  ['AppController', 'profil'],
    '/profil/update'=>  ['AppController', 'updateProfil'],
    '/profil/updateMdp'=>  ['AppController', 'updateMdp'],
    '/profil/updateRelais'=>  ['AppController', 'updateRelais'],
    '/profil/gestionProfil'=>  ['AppController', 'gestionProfil'],
    '/profil/gestionVente' => ['AppController', 'gestionVente'],
    '/profil/gestionAchat'=> ['AppController', 'gestionAchat'],
    '/categorie/ajout'    =>[ 'AppController', 'ajoutCategorie'],
    '/categorie/gestion'  =>[ 'AppController', 'gestionCategorie'],
    '/categorie/modification'  =>[ 'AppController', 'modificationCategorie'],
    '/categorie/suppression'  =>[ 'AppController', 'suppressionCategorie'],
    '/produit/filtre' => ['AppController', 'filtre'],
    '/livraison/update'=>['AppController', 'updateStatut'],
    '/utilisateur/updateTirelire'=>['AppController', 'updateTirelire'],


];
