-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 22 Avril 2020 à 19:11
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mkbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `user_tel` varchar(15) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `fk_article_demande1_idx` (`user_tel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `nom`, `user_tel`, `quantite`, `comment`, `etat`) VALUES
(1, 'RIZ', '96134498', NULL, 'Pourriez-vous m''assister avec 10 kg de riz cela me permettra de finir le mois mais bien sûr vous pouvez donner ce que vous pourriez faire, et que Dieu vous récompense', 1),
(3, 'Pâte alimentaire', '96134498', 1, '', 1),
(4, 'Mil', '96134498', 1, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `nom_produit` varchar(45) NOT NULL,
  PRIMARY KEY (`nom_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `user_tel` varchar(15) NOT NULL,
  `label` varchar(35) NOT NULL,
  `date` datetime DEFAULT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`user_tel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`user_tel`, `label`, `date`, `etat`) VALUES
('96134498', 'Alimentaire', '2020-04-17 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE IF NOT EXISTS `quartier` (
  `id_quartier` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `id_ville` int(11) NOT NULL,
  PRIMARY KEY (`id_quartier`),
  KEY `fk_quartier_ville1_idx` (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `quartier`
--

INSERT INTO `quartier` (`id_quartier`, `nom`, `id_ville`) VALUES
(1, 'BOUKOKI 4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `signal`
--

CREATE TABLE IF NOT EXISTS `signal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_tel` varchar(15) NOT NULL,
  `tel_s` varchar(15) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `signal`
--

INSERT INTO `signal` (`id`, `user_tel`, `tel_s`, `date`) VALUES
(1, '96134499', '96134497', '2020-04-21');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `tel` varchar(15) NOT NULL,
  `mp` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `id_quartier` int(11) NOT NULL,
  PRIMARY KEY (`tel`),
  KEY `fk_user_quartier_idx` (`id_quartier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`tel`, `mp`, `type`, `id_quartier`) VALUES
('96134498', '****', '3', 1),
('96134499', '$2y$10$7MZTnwmgyciA0O3fQq5Lkef1fl7Kivhhv8XsU8OyyD6EWPAsZ7kCa', '2', 1),
('96141566', '$2y$10$7MZTnwmgyciA0O3fQq5Lkef1fl7Kivhhv8XsU8OyyD6EWPAsZ7kCa', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_has_user`
--

CREATE TABLE IF NOT EXISTS `user_has_user` (
  `donneur` varchar(15) NOT NULL,
  `receveur` varchar(15) NOT NULL,
  `date` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`donneur`,`receveur`),
  KEY `fk_user_has_user_user2_idx` (`receveur`),
  KEY `fk_user_has_user_user1_idx` (`donneur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_has_user`
--

INSERT INTO `user_has_user` (`donneur`, `receveur`, `date`) VALUES
('96134499', '96134498', '2020-04-18 16:11:45.000000');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom`) VALUES
(1, 'NIAMEY');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_demande1` FOREIGN KEY (`user_tel`) REFERENCES `demande` (`user_tel`) ON DELETE CASCADE ON UPDATE CASCADE ;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande_user1` FOREIGN KEY (`user_tel`) REFERENCES `user` (`tel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD CONSTRAINT `fk_quartier_ville1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_quartier` FOREIGN KEY (`id_quartier`) REFERENCES `quartier` (`id_quartier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_user`
--
ALTER TABLE `user_has_user`
  ADD CONSTRAINT `fk_user_has_user_user1` FOREIGN KEY (`donneur`) REFERENCES `user` (`tel`) ON DELETE CASCADE ON UPDATE CASCADE ,
  ADD CONSTRAINT `fk_user_has_user_user2` FOREIGN KEY (`receveur`) REFERENCES `user` (`tel`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
