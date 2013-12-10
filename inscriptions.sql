-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 28 Septembre 2013 à 18:50
-- Version du serveur: 5.1.44
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `inscriptions`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'H10'),
(2, 'H12'),
(3, 'H14'),
(4, 'H16'),
(5, 'H18'),
(6, 'H20A'),
(7, 'H20E');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `courses`
--

INSERT INTO `courses` (`id`, `nom`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `lieu` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `date_limite_inscript` date DEFAULT NULL,
  `remarques` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `type`, `nom`, `lieu`, `date`, `date_limite_inscript`, `remarques`) VALUES
(1, 'entrainement', 'Entrainement Faux de Verzy', 'Verzy', '2013-10-03', '2013-10-01', 'SportIdent !'),
(2, 'entrainement', 'Evenement passe', 'Verzy', '2013-06-04', '2013-06-03', '');

-- --------------------------------------------------------

--
-- Structure de la table `participations`
--

CREATE TABLE IF NOT EXISTS `participations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evenements_id` int(11) NOT NULL,
  `utilisateurs_id` int(11) NOT NULL,
  `covoiturage` varchar(255) DEFAULT NULL,
  `remarques` varchar(255) DEFAULT NULL,
  `date_inscriptions` datetime DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `courses_id` int(11) DEFAULT NULL,
  `rep` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `evenements_id` (`evenements_id`,`utilisateurs_id`),
  KEY `fk_evenements_has_utilisateurs_utilisateurs1` (`utilisateurs_id`),
  KEY `fk_evenements_has_utilisateurs_evenements` (`evenements_id`),
  KEY `fk_participations_categories1` (`categories_id`),
  KEY `fk_participations_courses1` (`courses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `participations`
--

INSERT INTO `participations` (`id`, `evenements_id`, `utilisateurs_id`, `covoiturage`, `remarques`, `date_inscriptions`, `categories_id`, `courses_id`, `rep`) VALUES
(39, 1, 3, '', '', '2013-09-22 17:07:41', 7, 1, 'oui'),
(40, 1, 4, '', '', '2013-09-22 17:31:32', 1, 1, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `block` tinyint(1) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_utilisateurs_courses1` (`courses_id`),
  KEY `fk_utilisateurs_categories1` (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `login`, `pwd`, `block`, `role`, `courses_id`, `categories_id`) VALUES
(3, 'Blum', 'Simon', 'simon51100@gmail.com', 'simon.blum', 'f71dbe52628a3f83a77ab494817525c6', 0, 'admin', 1, 7),
(4, 'Blum', 'Jean-Guy', 'toto@hotmail.Fr', 'jean-guy.blum', 'f71dbe52628a3f83a77ab494817525c6', 0, '', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `participations`
--
ALTER TABLE `participations`
  ADD CONSTRAINT `fk_evenements_has_utilisateurs_evenements` FOREIGN KEY (`evenements_id`) REFERENCES `evenements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_has_utilisateurs_utilisateurs1` FOREIGN KEY (`utilisateurs_id`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participations_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participations_courses1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_utilisateurs_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_courses1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
