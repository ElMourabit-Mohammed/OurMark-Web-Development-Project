-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 mai 2022 à 13:15
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
-- Base de données : `ourmark`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers_requests`
--

DROP TABLE IF EXISTS `customers_requests`;
CREATE TABLE IF NOT EXISTS `customers_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prj_subject` varchar(255) NOT NULL,
  `prj_type` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_send` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers_requests`
--

INSERT INTO `customers_requests` (`id`, `fname`, `lname`, `phone`, `email`, `prj_subject`, `prj_type`, `description`, `date_send`) VALUES
(1, 'Marwane', 'Azam', '+212-600000000', 'marazam@gmail.com', 'Website for my business (store)', 'Personal project', 'I need a website to improve my business and this should be working:\r\nUser-Friendly\r\nMobile-Friendly Website\r\nHigh-Resolution Photos & Video\r\nUser-Generated Reviews\r\nSpecial Offers\r\nWish Lists\r\nFind-in-Store', '2022-04-17 22:52:05'),
(2, 'Mohammed', 'Kamil', '+212-611111111', 'mohammedkamil@gmail.com', 'Website for my business (store)', 'Personal project', 'I need a website to improve my business and this should be working:\r\nUser-Friendly\r\nMobile-Friendly Website\r\nHigh-Resolution Photos & Video\r\nUser-Generated Reviews\r\nSpecial Offers\r\nWish Lists\r\nFind-in-Store', '2022-04-17 23:54:56'),
(3, 'Ayman', 'naim', '+212-622222222', 'aymannaim@gmail.com', 'Website for my business (store)', 'Personal project', 'I need a website to improve my business and this should be working:\r\nUser-Friendly\r\nMobile-Friendly Website\r\nHigh-Resolution Photos & Video\r\nUser-Generated Reviews\r\nSpecial Offers\r\nWish Lists\r\nFind-in-Store', '2022-04-18 11:26:29');

-- --------------------------------------------------------

--
-- Structure de la table `events_date`
--

DROP TABLE IF EXISTS `events_date`;
CREATE TABLE IF NOT EXISTS `events_date` (
  `event` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events_date`
--

INSERT INTO `events_date` (`event`, `event_date`) VALUES
('Formation', '2022-05-30 14:00:00'),
('Meeting', '2022-05-31 23:12:00'),
('Meeting', '2022-05-20 10:30:00'),
('Formation', '2022-05-11 09:30:00'),
('Meeting', '2022-05-04 11:00:00'),
('Meeting', '2022-05-05 10:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `members_accounts`
--

DROP TABLE IF EXISTS `members_accounts`;
CREATE TABLE IF NOT EXISTS `members_accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members_accounts`
--

INSERT INTO `members_accounts` (`id`, `name`, `email`, `password`, `member_type`) VALUES
(6, 'Mouad FAKIHI', 'mouadfakihi01@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Web Developer'),
(7, 'Mohammed ElMourabit', 'mmmm@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Graphic Designer'),
(8, 'IHAB', 'Test@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Projects Manager'),
(15, 'Imad mnis', 'imadim@gmail.com', 'e9510081ac30ffa83f10b68cde1cac07', 'Expert Marketing Digital'),
(11, 'Youssef raid', 'youss@gmail.com', '814f06ab7f40b2cff77f2c7bdffd3415', 'Content Writer'),
(12, 'Hicham Ghouch', 'ghouch@gmail.com', 'e9510081ac30ffa83f10b68cde1cac07', 'Web Developer'),
(16, 'Morad hilal', 'mouradhilal@gmail.com', 'd79c8788088c2193f0244d8f1f36d2db', 'SEO/SEM Manager'),
(18, 'Souhail esaid', 'souhail@gmail.com', '3b712de48137572f3849aabd5666a4e3', 'Web Developer');

-- --------------------------------------------------------

--
-- Structure de la table `project_status`
--

DROP TABLE IF EXISTS `project_status`;
CREATE TABLE IF NOT EXISTS `project_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codeprj` varchar(255) NOT NULL,
  `prj_name` varchar(255) NOT NULL,
  `prj_manager` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project_status`
--

INSERT INTO `project_status` (`id`, `codeprj`, `prj_name`, `prj_manager`) VALUES
(1, '001-AAA', 'My Store', 'Mouad FAKIHI'),
(3, '002-BBB', 'Storeapp', 'Mouad FAKIHI'),
(4, '003-CCC', 'Restauria', 'Souhail esaid');

-- --------------------------------------------------------

--
-- Structure de la table `project_team`
--

DROP TABLE IF EXISTS `project_team`;
CREATE TABLE IF NOT EXISTS `project_team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prjcode` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `content_writer` varchar(255) NOT NULL,
  `graphic_designer` varchar(255) NOT NULL,
  `marketer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project_team`
--

INSERT INTO `project_team` (`id`, `prjcode`, `manager`, `developer`, `content_writer`, `graphic_designer`, `marketer`) VALUES
(1, '001-AAA', 'Mouad FAKIHI', 'Hicham Ghouch', 'Youssef raid', 'Mohammed ElMourabit', 'Imad mnis'),
(2, '002-BBB', 'Hicham Ghouch', 'Mouad FAKIHI', 'Youssef raid\r\n', 'Mohammed ElMourabit\r\n', 'Imad mnis'),
(4, '003-CCC', 'Souhail esaid', 'Mouad FAKIHI', 'Youssef raid', 'Mohammed ElMourabit', 'Imad mnis');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
