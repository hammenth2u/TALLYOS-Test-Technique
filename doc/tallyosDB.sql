-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 20 Juin 2020 à 16:33
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.2.11-4+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tallyos`
--

-- --------------------------------------------------------

--
-- Structure de la table `hive`
--

CREATE TABLE `hive` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Identifiant de la ruche',
  `name_hive` varchar(60) NOT NULL COMMENT 'Nom de la ruche',
  `longitude` varchar(30) NOT NULL COMMENT 'Longitude de la ruche',
  `latitude` varchar(30) NOT NULL COMMENT 'Latitude de la ruche',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de création de la ruche',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Date de modification de la ruche'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hive`
--

INSERT INTO `hive` (`id`, `name_hive`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 'ruche A', '18.548', '19.4663661', '2020-06-19 03:09:18', NULL),
(3, 'ruche B', '45.566', '45.6464', '2020-06-19 15:13:55', NULL),
(16, 'ruche C', '7.2', '67.2', '2020-06-20 13:07:31', '2020-06-20 13:39:15'),
(17, 'ruche D', '45.12', '45.154', '2020-06-20 14:13:08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `infos_hive`
--

CREATE TABLE `infos_hive` (
  `id` int(11) NOT NULL,
  `id_hive` int(10) UNSIGNED NOT NULL,
  `weight` float NOT NULL COMMENT 'Poids de la ruche',
  `temperature` float NOT NULL COMMENT 'Température de la ruche',
  `humidity_level` float NOT NULL COMMENT 'Taux d''humidité de la ruche',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `infos_hive`
--

INSERT INTO `infos_hive` (`id`, `id_hive`, `weight`, `temperature`, `humidity_level`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 12, 12, '2020-06-19 23:00:00', NULL),
(2, 1, 13, 14, 15, '2020-06-19 23:30:00', NULL),
(3, 1, 15, 15, 16, '2020-06-20 00:00:00', NULL),
(4, 3, 78, 78, 78, '2020-06-19 23:00:00', NULL),
(5, 3, 78, 79, 80, '2020-06-19 23:30:00', NULL),
(6, 3, 80, 79, 52, '2020-06-20 00:00:00', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `hive`
--
ALTER TABLE `hive`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infos_hive`
--
ALTER TABLE `infos_hive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `hive`
--
ALTER TABLE `hive`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la ruche', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `infos_hive`
--
ALTER TABLE `infos_hive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
