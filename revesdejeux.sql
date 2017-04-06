-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 06 Avril 2017 à 09:28
-- Version du serveur: 5.5.54-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `revesdejeux`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvenement` int(11) NOT NULL AUTO_INCREMENT,
  `idType` int(11) NOT NULL,
  `nomEvenement` varchar(150) NOT NULL,
  `dateEvenement` date NOT NULL,
  `lieuEvenement` varchar(50) NOT NULL,
  `descriptionEvenement` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `siteInternet` varchar(200) NOT NULL,
  `finEvenement` date NOT NULL,
  PRIMARY KEY (`idEvenement`),
  KEY `idType` (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `idType`, `nomEvenement`, `dateEvenement`, `lieuEvenement`, `descriptionEvenement`, `image`, `siteInternet`, `finEvenement`) VALUES
(1, 1, 'Evenement1', '2017-04-01', 'Marseille', 'Ceci est le premier événement à venir !', 'event1.jpg', 'www.evenement1.com', '2017-04-03'),
(2, 2, 'Evenement2', '2017-05-01', 'Paris', 'Ceci est le premier événement à venir !', 'event2.jpg', 'www.evenement2.com', '2017-05-03'),
(3, 2, 'Evenement3', '2017-06-01', 'Bebeloued', 'Ceci est le premier événement à venir !', 'event3.jpg', 'www.evenement3.com', '2017-06-03'),
(4, 1, 'Evenement4', '2017-07-01', 'Bourg La Reine', 'Ceci est le premier événement à venir !', 'event4.jpg', 'www.evenement4.com', '2017-07-03'),
(5, 1, 'Evenement5', '2017-08-01', 'Warzazate', 'Ceci est le premier événement à venir !', 'event5.jpg', 'www.evenement5.com', '2017-08-03'),
(6, 2, 'Evenement6', '2017-08-20', 'Toubouktou', 'Ceci est le premier événement à venir !', 'event6.jpg', 'www.evenement6.com', '2017-08-22'),
(7, 2, 'Evenement7', '2017-09-15', 'Moncul', 'Ceci est le premier événement à venir !', 'event7.jpg', 'www.evenement7.com', '2017-09-16'),
(8, 1, 'Evenement8', '2017-09-20', 'Poitier', 'Ceci est le premier événement à venir !', 'event8.jpg', 'www.evenement8.com', '2017-09-22');

-- --------------------------------------------------------

--
-- Structure de la table `typeEvenement`
--

CREATE TABLE IF NOT EXISTS `typeEvenement` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typeEvenement`
--

INSERT INTO `typeEvenement` (`idType`, `libelle`) VALUES
(1, 'Séjours'),
(2, 'salonFestival');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeEvenement` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
