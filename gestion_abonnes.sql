-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 05 oct. 2024 à 14:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_abonnes`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `code_abonne` varchar(15) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `type_abonne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `abonne`
--

INSERT INTO `abonne` (`code_abonne`, `nom`, `postnom`, `prenom`, `sexe`, `telephone`, `email`, `adresse`, `type_abonne`) VALUES
('7DD11-08-24', 'BADILA', 'KAZIMALI', 'DIVIN', 'M', '243817767357', 'ras@ras.com', 'kinshasa', 1);

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `num_achat` int(11) NOT NULL,
  `code_produit` int(15) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `code_abonne` varchar(15) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date_achat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prix` int(11) NOT NULL,
  `qte_com` int(11) NOT NULL,
  `pt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`num_achat`, `code_produit`, `designation`, `code_abonne`, `nom`, `date_achat`, `prix`, `qte_com`, `pt`) VALUES
(1, 3, '', '7DD11-08-24', 'BADILA', '2024-08-18 08:47:54', 25, 10, 250),
(2, 3, 'Coca', '7DD11-08-24', 'BADILA', '2024-08-18 09:04:42', 25, 5, 125);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `num_categ` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`num_categ`, `designation`) VALUES
(1, 'Thé'),
(2, 'Café'),
(3, 'Objet de Sport'),
(4, 'Proteine'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `code_pro` int(11) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `prix` int(11) NOT NULL,
  `qte_stock` int(11) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`code_pro`, `designation`, `prix`, `qte_stock`, `categorie`) VALUES
(3, 'Cocas', 25, 5, 1),
(4, 'TEST1', 100, 20, 1),
(5, 'TEMBO', 2500, 10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `souscription`
--

CREATE TABLE `souscription` (
  `code_op` int(11) NOT NULL,
  `code_abonne` varchar(15) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `num_abon` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `duree` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `date_fin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `souscription`
--

INSERT INTO `souscription` (`code_op`, `code_abonne`, `nom`, `num_abon`, `montant`, `duree`, `date`, `date_fin`) VALUES
(1, '7DD11-08-24', 'BADILA', 1, 11, '0', '2024-10-05', '2024-10-26');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `designation`) VALUES
(1, 'unknown'),
(2, 'Golden member');

-- --------------------------------------------------------

--
-- Structure de la table `type_abonnement`
--

CREATE TABLE `type_abonnement` (
  `id` int(11) NOT NULL,
  `design_abon` varchar(100) NOT NULL,
  `duree` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `num_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_abonnement`
--

INSERT INTO `type_abonnement` (`id`, `design_abon`, `duree`, `prix`, `num_categ`) VALUES
(1, 'evasions', '0', 11, 1),
(3, 'Access', '1 mois', 15, 1),
(4, 'TET', '20', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'lirmasi', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`code_abonne`),
  ADD KEY `type_abonne` (`type_abonne`);

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`num_achat`),
  ADD KEY `code_produit` (`code_produit`,`code_abonne`),
  ADD KEY `code_abonne` (`code_abonne`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`num_categ`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`code_pro`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `souscription`
--
ALTER TABLE `souscription`
  ADD PRIMARY KEY (`code_op`),
  ADD KEY `num_abon` (`num_abon`),
  ADD KEY `code_abonne` (`code_abonne`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_abonnement`
--
ALTER TABLE `type_abonnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_categ` (`num_categ`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `num_achat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `num_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `code_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `souscription`
--
ALTER TABLE `souscription`
  MODIFY `code_op` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_abonnement`
--
ALTER TABLE `type_abonnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD CONSTRAINT `abonne_ibfk_1` FOREIGN KEY (`type_abonne`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`code_abonne`) REFERENCES `abonne` (`code_abonne`),
  ADD CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`code_produit`) REFERENCES `produit` (`code_pro`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`num_categ`);

--
-- Contraintes pour la table `souscription`
--
ALTER TABLE `souscription`
  ADD CONSTRAINT `souscription_ibfk_1` FOREIGN KEY (`num_abon`) REFERENCES `type_abonnement` (`id`),
  ADD CONSTRAINT `souscription_ibfk_2` FOREIGN KEY (`code_abonne`) REFERENCES `abonne` (`code_abonne`);

--
-- Contraintes pour la table `type_abonnement`
--
ALTER TABLE `type_abonnement`
  ADD CONSTRAINT `type_abonnement_ibfk_1` FOREIGN KEY (`num_categ`) REFERENCES `categorie` (`num_categ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
