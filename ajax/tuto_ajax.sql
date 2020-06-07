-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 juin 2020 à 14:56
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tuto_ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` varchar(10) NOT NULL,
  `montant` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `heure` time NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `telephone`, `montant`, `date`, `heure`) VALUES
(1, '771825414', 100000, '2020-06-04', '13:00:00'),
(2, '776541234', 50000, '2020-06-03', '19:07:12'),
(3, '34557', 6576, '2020-06-04', '14:07:35'),
(4, '11', 112, '2020-06-04', '14:08:17'),
(5, '44', 444, '2020-06-04', '14:14:19'),
(6, '771825414', 20000, '2020-06-04', '14:15:21'),
(7, '456', 56, '2020-06-04', '14:18:37'),
(8, '1111', 211, '2020-06-04', '14:19:51'),
(9, '1234', 1234, '2020-06-03', '14:35:36'),
(10, '44444', 44444, '2020-06-04', '19:25:45'),
(11, '1111', 2222, '2020-06-04', '19:26:26'),
(12, '4444', 55555, '2020-06-04', '19:26:58'),
(13, '33', 33, '2020-06-04', '19:28:05'),
(15, '771854343', 100000, '2020-06-05', '10:42:21'),
(16, '77185434', 3723723, '2020-06-05', '10:43:15'),
(17, '77185434', 3723723, '2020-06-05', '10:43:35'),
(18, '771854232', 3723723, '2020-06-05', '10:43:40'),
(19, '7718542454', 2323, '2020-06-05', '10:43:46'),
(20, '77185424', 2323, '2020-06-05', '10:44:04'),
(21, '3434', 2323, '2020-06-05', '10:44:08'),
(22, '3433434', 2323, '2020-06-05', '10:44:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
