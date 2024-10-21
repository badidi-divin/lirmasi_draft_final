-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 juil. 2024 à 09:50
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
-- Base de données : `gestion_etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant`
--

CREATE TABLE `apprenant` (
  `code` varchar(15) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `postnom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresses` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `nom_complet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenant`
--

INSERT INTO `apprenant` (`code`, `nom`, `postnom`, `prenom`, `sexe`, `phone`, `tel`, `email`, `adresses`, `dates`, `nom_complet`) VALUES
('3EEA6D07/24', 'KALUSA', 'MAKINA', 'DORCAS', 'F', '243817767357', '243817767357', 'ras@ras.com', 'kinshasa', '2024-07-29 03:03:14', '3EEA6D07/24 KALUSA MAKINA DORCAS'),
('C6F84007/24', 'BADIDI', 'KAZIMALI', 'DIVIN', 'M', '243817767357', '243817767357', 'divinbadidi081@gmail.com', 'KIN', '2024-07-29 02:40:29', 'C6F84007/24 BADIDI KAZIMALI DIVIN M ras@ras.com'),
('FE61A307/24', 'BADIDI', 'BAOGA', 'STEVE', 'M', '243817767357', '243817767357', 'divinbadidi081@gmail.com', 'Kinshasa', '2024-07-29 07:25:58', 'FE61A307/24 BADIDI BAOGA STEVE');

-- --------------------------------------------------------

--
-- Structure de la table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `code_apprenant` varchar(15) NOT NULL,
  `nombre_inscript` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bonus`
--

INSERT INTO `bonus` (`id`, `code_apprenant`, `nombre_inscript`) VALUES
(1, '3EEA6D07/24', 2),
(2, 'C6F84007/24', 3),
(3, 'FE61A307/24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(11) NOT NULL,
  `nom_complet` varchar(25) NOT NULL,
  `sexe` varchar(25) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `option_etudiant` varchar(25) NOT NULL,
  `promotion_etudiant` varchar(20) NOT NULL,
  `annee_scolaire` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `nom_complet`, `sexe`, `telephone`, `adresse`, `option_etudiant`, `promotion_etudiant`, `annee_scolaire`, `image`, `dates`) VALUES
('ISANGI/1', 'BADIDI KAZIMALI DIVIN', 'M', '0817767357', 'KINSHASA/BLOC L19', 'Latin-Philo', '8Ã¨me', '2020-2021', '64e051a61b12e5.59997389.jpg', '2023-08-19 05:22:46');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `montant` int(11) NOT NULL,
  `duree` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `designation`, `montant`, `duree`) VALUES
(1, 'EXCEL DES ENTREPRISES', 10, '2 SMAINES');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `code_apprenant` varchar(10) NOT NULL,
  `formation` varchar(100) NOT NULL,
  `montant_a_payer` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `code_apprenant`, `formation`, `montant_a_payer`, `session`, `date_inscription`) VALUES
(1, '3EEA6D07/2', 'EXCEL DES ENTREPRISES', 0, 'NOVEMBRE 2025', '2024-07-29 03:05:54'),
(2, '3EEA6D07/2', 'EXCEL DES ENTREPRISES', 10, 'NOVEMBRE 2024', '2024-07-29 07:22:36'),
(3, '3EEA6D07/2', 'EXCEL DES ENTREPRISES', 10, 'DECEMBRE 2024', '2024-07-29 07:23:12'),
(4, 'C6F84007/2', 'EXCEL DES ENTREPRISES', 10, 'NOVEMBRE 2024', '2024-07-29 07:23:40'),
(5, 'FE61A307/2', 'EXCEL DES ENTREPRISES', 10, 'NOVEMBRE 2024', '2024-07-29 07:26:41'),
(6, 'C6F84007/2', 'EXCEL DES ENTREPRISES', 10, 'NOVEMBRE 2024', '2024-07-29 07:34:09'),
(7, 'C6F84007/2', 'EXCEL DES ENTREPRISES', 10, 'DECEMBRE 2024', '2024-07-29 07:34:26');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `code_apprenant` varchar(15) NOT NULL,
  `formation` varchar(100) NOT NULL,
  `montant_payer` int(11) NOT NULL,
  `reste` int(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `date_paie` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id`, `code_apprenant`, `formation`, `montant_payer`, `reste`, `session`, `date_paie`) VALUES
(1, '3EEA6D07/2', 'EXCEL DES ENTREPRISES', 5, 5, 'NOVEMBRE 2025', '2024-07-29 03:26:45'),
(2, '3EEA6D07/2', 'EXCEL DES ENTREPRISES', 5, 0, 'NOVEMBRE 2025', '2024-07-29 03:27:33');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'divin', 'ea3dc49e04ffdd8e1b4a1628e16e341e', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
