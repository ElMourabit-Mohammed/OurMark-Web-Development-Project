-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 02 avr. 2022 à 09:27
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `number` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `POG` enum('P','G') NOT NULL,
  `msg` varchar(1500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `registration`
--

INSERT INTO `registration` (`id`, `firstName`, `lastName`, `number`, `email`, `password`, `POG`, `msg`) VALUES
(1, '0', '0', 670366190, 'elmourabitmohammed00@gmail.com', '123456789', 'P', 'THIS IS A TEST FOR MY DATABASE THAT I\'LL USE FOR MY DEVWEB PROJECT ME AND MY FRIEND MOUAD'),
(2, '0', '0', 670366190, 'elmourabitmohammed00@gmail.com', '14565687', 'P', 'THIS IS A TEST FOR MY DATABASE THAT I\'LL USE FOR MY DEVWEB PROJECT ME AND MY FRIEND MOUAD 2'),
(3, '0', '0', 670366190, 'elmourabitmohammed00@gmail.com', '14565687', 'P', 'THIS IS A TEST FOR MY DATABASE THAT I\'LL USE FOR MY DEVWEB PROJECT ME AND MY FRIEND MOUAD 2'),
(4, '0', '0', 600000000, 'fakihi_mouad8@gmail.com', 'mouadodyalo4ever', 'G', 'wlknofkghsbfel dodgdkigkc k,donfvd'),
(5, 'hhh', 'hhh', 44557, 'elmourabitmohammed00@gmail.com', 'BW8EzN7jbzpJiNN', 'G', 'hhj'),
(6, 'EL MOURABIT', 'hhhh', 2556, 'haja.zakaria@gmail.com', 'RnAF5kvjmyAWxGC', 'G', 'hjkl');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
