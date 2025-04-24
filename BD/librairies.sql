-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 avr. 2025 à 13:15
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `librairies`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégories`
--

DROP TABLE IF EXISTS `catégories`;
CREATE TABLE IF NOT EXISTS `catégories` (
  `idCatégorie` int NOT NULL AUTO_INCREMENT,
  `titre` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `edition` year NOT NULL,
  PRIMARY KEY (`idCatégorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `catégories`
--

INSERT INTO `catégories` (`idCatégorie`, `titre`, `description`, `edition`) VALUES
(1, 'Roman', '', 2012),
(2, 'Techno et info', '', 2019),
(3, 'Techno et info', '', 2019);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `idLivre` int NOT NULL AUTO_INCREMENT,
  `Titre` text COLLATE utf8mb4_general_ci,
  `auteur` text COLLATE utf8mb4_general_ci,
  `creation` date DEFAULT NULL,
  `categorie_id` int DEFAULT NULL,
  PRIMARY KEY (`idLivre`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`idLivre`, `Titre`, `auteur`, `creation`, `categorie_id`) VALUES
(2, 'Html, css, js et php', 'Dom Cooks', '2019-08-14', 2),
(11, 'Le rêve de mon père', 'Obama', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `idMembre` int NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8mb4_general_ci,
  `prenom` text COLLATE utf8mb4_general_ci,
  `adresse` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel` int DEFAULT NULL,
  `sexe` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`idMembre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`idMembre`, `nom`, `prenom`, `adresse`, `tel`, `sexe`) VALUES
(1, 'JEAN', 'Lou', '12 Rue Bourre-neuf', 645308966, 'Féminin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
