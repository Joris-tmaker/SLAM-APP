-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2023 at 01:11 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compterendu`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte_rendu_de_visite`
--

DROP TABLE IF EXISTS `compte_rendu_de_visite`;
CREATE TABLE IF NOT EXISTS `compte_rendu_de_visite` (
  `id_cr_cp` int NOT NULL AUTO_INCREMENT,
  `date_du_cr` varchar(255) NOT NULL,
  `motif_de_la_visite` varchar(255) NOT NULL,
  `remarques` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cr_cp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delegue_regional`
--

DROP TABLE IF EXISTS `delegue_regional`;
CREATE TABLE IF NOT EXISTS `delegue_regional` (
  `id_delegue_cp` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_delegue_cp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `echantillon`
--

DROP TABLE IF EXISTS `echantillon`;
CREATE TABLE IF NOT EXISTS `echantillon` (
  `id_echantillon_cp` int NOT NULL AUTO_INCREMENT,
  `date_de_distribution` varchar(255) NOT NULL,
  `quantite_distribuee` varchar(255) NOT NULL,
  PRIMARY KEY (`id_echantillon_cp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `praticien`
--

DROP TABLE IF EXISTS `praticien`;
CREATE TABLE IF NOT EXISTS `praticien` (
  `id_praticien` int NOT NULL AUTO_INCREMENT,
  `nom_du_praticien` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `coordonnees` varchar(255) NOT NULL,
  PRIMARY KEY (`id_praticien`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit_du_baboratoire`
--

DROP TABLE IF EXISTS `produit_du_baboratoire`;
CREATE TABLE IF NOT EXISTS `produit_du_baboratoire` (
  `id_produit_cp` int NOT NULL AUTO_INCREMENT,
  `nom_du_produit` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produit_cp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responsable_de_secteur`
--

DROP TABLE IF EXISTS `responsable_de_secteur`;
CREATE TABLE IF NOT EXISTS `responsable_de_secteur` (
  `id_responsable_cp` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_responsable_cp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`) VALUES
(1, 'admin', 'admin', 'admin@admin', '$2y$10$DXLpGydMBowrppjKkms6bOqdlztwQtvs3xep7ybIOnPi3bRus8L2e', 'role_admin'),
(2, 'visiteur', 'visiteur', 'visiteur@visiteur', '$2y$10$wCGjQpI/B.wFJrgQ40mzfuQF2cxn4gCV2er/bVGjfDsGbqpCyhO7S', 'role_visiteur'),
(3, 'delegue', 'delegue', 'delegue@delegue', '$2y$10$Bk2gkV5PiZ7rKp1hoKH/Re0P4/O4PMFP7nVR5TZEEPszAKjpCTfvS', 'role_delegue'),
(4, 'responsable', 'responsable', 'responsable@responsable', '$2y$10$u7/o3Sj0z/CDEvohShJCjenzD2lV1vXcvXjagZitbpy/ogSyZDuo6', 'role_responsable'),
(5, 'praticien', 'praticien', 'praticien@praticien', '$2y$10$eZizrIrTVtHvY8CsthRKkOXQKcMqJdSQv3yLExpoEuMpuTWlE4gW2', 'role_praticien');

-- --------------------------------------------------------

--
-- Table structure for table `visiteur_medical`
--

DROP TABLE IF EXISTS `visiteur_medical`;
CREATE TABLE IF NOT EXISTS `visiteur_medical` (
  `id_visiteur_cp` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id_visiteur_cp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
