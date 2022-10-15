-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 sep. 2022 à 15:03
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `greented`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id`, `id_produit`, `id_commande`) VALUES
(7, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `titre`) VALUES
(2, 'Pantalons');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_utilisateur`, `date`, `statut`) VALUES
(7, 3, '2022-09-16 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `id_relais` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `date_reception` datetime NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `id_relais`, `id_commande`, `date_reception`, `statut`) VALUES
(1, 1, 7, '2022-09-18 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `etat` enum('1','2','3','4') NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` enum('homme','femme','enfant') NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 0,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `titre`, `etat`, `description`, `prix`, `photo`, `type`, `id_utilisateur`, `statut`, `id_categorie`) VALUES
(1, 'Pantalon noir', '4', 'super pantalon noir', 70, '13092022100557632039e57b2c4view.png', 'homme', 1, 1, 2),
(2, 'Pantalon noir', '2', 'super pantalon noir', 70, '12092022174736631f5498b54b7edit.png', 'homme', 3, 0, 2),
(3, 'Pantalon noir', '2', 'super pantalon noir', 70, '12092022172010631f4e2a5ff03bibliotheque-francois.jpg', 'homme', 1, 0, 2),
(5, 'Pantalon&lt; no&lt;ir&lt;', '1', 'sssssssssss', 70, '12092022112013631ef9cd87b88bibliotheque-francois.jpg', 'homme', 3, 0, 2),
(6, 'Pantalon noir', '4', 'super pantalon noir', 70, '13092022100557632039e57b2c4view.png', 'homme', 1, 0, 2),
(7, 'Pantalon noir', '2', 'super pantalon noir', 70, '12092022174736631f5498b54b7edit.png', 'homme', 3, 0, 2),
(8, 'Pantalon noir', '2', 'super pantalon noir', 70, '12092022172010631f4e2a5ff03bibliotheque-francois.jpg', 'homme', 1, 0, 2),
(9, 'Pantalon&lt; no&lt;ir&lt;', '1', 'sssssssssss', 70, '12092022112013631ef9cd87b88bibliotheque-francois.jpg', 'homme', 3, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `tirelire` float NOT NULL,
  `numero_voie` varchar(255) NOT NULL,
  `voie` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `point_relais` tinyint(1) DEFAULT 0,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `nom`, `prenom`, `email`, `mdp`, `tirelire`, `numero_voie`, `voie`, `cp`, `ville`, `point_relais`, `role`) VALUES
(1, 'cezdig', 'cez', 'desau', 'cezdesaulle.evogue@gmail.com', '$2y$10$FwLnvh3BWn/0LLPzEJmdvOJG1K/twAGSffwynlUpczebS6EtbyLxe', 270, '26', 'rue eugène jumin', 75019, 'paris', 0, 'ROLE_USER'),
(3, 'cezdigit', 'cez', 'desau', 'cezdesaulle@gmail.com', '$2y$10$UJaXGzPw65HIh709n9ioX.5StnnfE0WvLGKB62qkzqUxLLhKXnhYO', 5930, '26', 'rue eugène jumin', 75019, 'paris', 1, 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
