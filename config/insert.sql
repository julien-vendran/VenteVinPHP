-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 déc. 2019 à 02:13
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ventevinphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `numCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loginUtilisateur` varchar(32) NOT NULL,
  `montantCommande` int(11) NOT NULL,
  PRIMARY KEY (`numCommande`),
  KEY `fk_login` (`loginUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`numCommande`, `dateCommande`, `loginUtilisateur`, `montantCommande`) VALUES
(128, '2019-12-13 02:41:13', 'bofin', 174),
(129, '2019-12-13 02:41:42', 'bofin', 158),
(130, '2019-12-13 02:43:06', 'gazaixp', 452),
(131, '2019-12-13 02:43:41', 'gazaixp', 249),
(132, '2019-12-13 02:55:18', 'goichonm', 353),
(133, '2019-12-13 02:56:12', 'goichonm', 269),
(134, '2019-12-13 02:56:58', 'goichonm', 196),
(135, '2019-12-13 03:01:27', 'rouzest', 238),
(136, '2019-12-13 03:01:56', 'rouzest', 357),
(137, '2019-12-13 03:03:06', 'vialaw', 483);

-- --------------------------------------------------------

--
-- Structure de la table `lignescommande`
--

DROP TABLE IF EXISTS `lignescommande`;
CREATE TABLE IF NOT EXISTS `lignescommande` (
  `numCommande` int(11) NOT NULL,
  `idVin` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`numCommande`,`idVin`),
  KEY `fk_idVin` (`idVin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignescommande`
--

INSERT INTO `lignescommande` (`numCommande`, `idVin`, `quantite`) VALUES
(128, 17, 12),
(128, 22, 36),
(129, 15, 4),
(129, 21, 12),
(129, 24, 1),
(130, 17, 6),
(130, 18, 6),
(130, 19, 6),
(130, 20, 6),
(130, 24, 2),
(130, 25, 12),
(131, 21, 32),
(131, 22, 24),
(132, 15, 16),
(132, 16, 12),
(132, 19, 4),
(132, 20, 14),
(133, 20, 28),
(133, 21, 12),
(133, 23, 20),
(134, 18, 2),
(134, 23, 24),
(134, 24, 1),
(134, 25, 2),
(135, 20, 24),
(135, 26, 12),
(136, 21, 38),
(136, 22, 50),
(137, 18, 12),
(137, 20, 6),
(137, 21, 26),
(137, 22, 24),
(137, 26, 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `loginUtilisateur` varchar(32) NOT NULL,
  `mdpUtilisateur` varchar(64) NOT NULL,
  `nomUtilisateur` varchar(32) NOT NULL,
  `nonce` varchar(32) NOT NULL,
  `emailUtilisateur` varchar(256) NOT NULL,
  PRIMARY KEY (`loginUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`loginUtilisateur`, `mdpUtilisateur`, `nomUtilisateur`, `nonce`, `emailUtilisateur`) VALUES
('antoinee', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Antoine Eric', '', ''),
('bigardjm', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Bigard Jean-Marie', '', ''),
('bofin', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Nicolas Bofi', '', 'nicolas.bofi@gmail.com'),
('gazaixp', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Pierre Gazaix', '', 'pierregazaix@gmail.com'),
('goichonm', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Mathis Goichon', '', 'mathisgoichon@gmail.com'),
('pernautjp', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Pernaut Jean-Pierre', '', ''),
('reichmannjl', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Reichmann Jean-Luc', '', ''),
('rouzest', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Thomas Rouzes', '', 'thomasrouzes@gmail.com'),
('vendranj', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Julien Vendran', '', 'julienvendran@gmail.com'),
('vialaw', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'William Viala', '', 'williamviala@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `vins`
--

DROP TABLE IF EXISTS `vins`;
CREATE TABLE IF NOT EXISTS `vins` (
  `idVin` int(11) NOT NULL AUTO_INCREMENT,
  `nomVin` varchar(32) NOT NULL,
  `anneeVin` year(4) NOT NULL,
  `descriptionVin` text NOT NULL,
  `typeVin` varchar(15) NOT NULL,
  `medailleVin` varchar(10) DEFAULT NULL,
  `prixVin` double NOT NULL,
  `qteVin` int(11) NOT NULL,
  `imageVin` varchar(40) NOT NULL,
  `idViticulteur` int(11) NOT NULL,
  PRIMARY KEY (`idVin`),
  KEY `fk_Viticulteur` (`idViticulteur`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`idVin`, `nomVin`, `anneeVin`, `descriptionVin`, `typeVin`, `medailleVin`, `prixVin`, `qteVin`, `imageVin`, `idViticulteur`) VALUES
(15, 'Colombus', 2014, 'Robe or pâle brillante aux reflets jaune. Nez fin et complexe, d\'abricot mûr, de miel et de tilleul. Évoluant sur des notes de poire williams et d\'oranges confites. Bouche tendre et soyeuse marquée par la fraîcheur finale et les notes de poire.', 'Blanc', 'Argent', 9.95, 100, './view/images/blanc_colombus.png', 5),
(16, 'Gold Rose', 2018, 'Macération et extraction pendant une vingtaine de jours. Fermentation sous contrôle strict des températures. Sélection de cuves après fermentation. Vin élevé en barriques de chêne durant 12 mois, avec 20% de barriques neuves (chauffe moyenne). Collé mais non filtré.', 'Rose', 'Bronze', 7.95, 48, './view/images/gold_rose.jpg', 5),
(17, 'Alsace', 2017, 'Robe or pâle brillante aux reflets jaune. Nez fin et complexe, d\'abricot mûr, de miel et de tilleul. Évoluant sur des notes de poire williams et d\'oranges confites. Bouche tendre et soyeuse marquée par la fraîcheur finale et les notes de poire.', 'Blanc', '', 5.95, 62, './view/images/vinBlancAlsace', 5),
(18, 'Regnard', 2013, 'Robe rose aux légers reflets saumonés. Nez discret et élégant de pêche au sirop et d\'orange souligné par des arômes de bonbons acidulés. Bouche souple marquée par l\'équilibre et la fraîcheur et une légère amertume finale.', 'Rose', 'Or', 14.6, 50, './view/images/regnard.jpg', 6),
(19, 'Bordeaux', 2016, 'Robe rouge vermillon moyennement intense. Nez fin et élégant s\'ouvrant sur la framboise fraîche, et évoluant sur des notes de cassis et thym. Bouche fraîche et équilibrée, marquée par des tanins jeunes présents en fin de bouche.', 'Rouge', 'Bronze', 8.95, 70, './view/images/rouge_bordeaux', 6),
(20, 'Ventoux', 2019, 'Bouche agréable, ronde et souple. Belle fraîcheur et vivacité. Pas de présence de boisé. Tanins souples et fondus. Bouche assez puissante, simple et un peu capiteuse. Longueur moyenne.', 'Blanc', '', 4.45, 132, './view/images/ventoux.png', 6),
(21, 'Moelleux', 2019, '    Robe or pâle brillante aux reflets jaune. Nez fin et complexe, d\'abricot mûr, de miel et de tilleul. Évoluant sur des notes de poire williams et d\'oranges confites. Bouche tendre et soyeuse marquée par la fraîcheur finale et les notes de poire.', 'Blanc', 'Bronze', 5.65, 60, './view/images/blanc_moelleux.jpg', 7),
(22, 'Chardonnay', 2019, 'Sa robe jaune pâle aux reflets jaune et argent offre un nez ouvert sur la poire et l\'ananas. En bouche ce vin possède une attaque franche et gourmande avec du gras et de la tension. Finale savoureuse et minérale.', 'Blanc', '', 2.85, 276, './view/images/chardonnay', 7),
(23, 'Cepage', 2019, 'Avec sa robe de couleur jaune citron aux  reflets verts, ce vin vous offre un nez franc, typé, sur la rose, le litchi. En bouche, il s\'ouvre sur des notes de fruit exotique, de fleurs blanche. Finale persistante.   ', 'Bloanc', 'Bronze', 3.85, 276, './view/images/cepage_alsace.png', 7),
(24, 'L\'Hospitalet', 2008, 'Ce vin à la robe rubis aux reflets pourpres, vous offre un nez de fruits rouges, de violettes, sur des notes de poivrons. En bouche, il a un bon équilibre, charnu, le caractère s\'ouvre sur les fruits noirs et les épices.', 'Rouge', 'Or', 49.95, 32, './view/images/hospitalet', 8),
(25, 'Pinot Noir', 2017, 'Sa robe grenat offre un nez assez ouvert de sirop de fruits noirs puis de notes torréfiées. En bouche, ce vin présente un bon équilibre, corsé avec du caractère et des tannins enveloppés.', 'Rouge', 'Argent', 12.35, 28, './view/images/pinot_noir', 8),
(26, 'Gigondas', 2018, 'Avec sa robe grenat, ce vin présente un joli nez de sirop de griottes et de notes de poivrées. En bouche, il présente un bon équilibre, sur un corps moyen et un joli caractère franc et typé. Finale fraîche et savoureuse.', 'Rouge', 'Argent', 10.95, 56, './view/images/gigondas', 8);

-- --------------------------------------------------------

--
-- Structure de la table `viticulteurs`
--

DROP TABLE IF EXISTS `viticulteurs`;
CREATE TABLE IF NOT EXISTS `viticulteurs` (
  `idViticulteur` int(11) NOT NULL AUTO_INCREMENT,
  `nomViticulteur` varchar(32) NOT NULL,
  `loginViticulteur` varchar(32) NOT NULL,
  PRIMARY KEY (`idViticulteur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `viticulteurs`
--

INSERT INTO `viticulteurs` (`idViticulteur`, `nomViticulteur`, `loginViticulteur`) VALUES
(5, 'Pernaut', 'pernautjp'),
(6, 'Reichmann', 'reichmannjl'),
(7, 'Antoine', 'antoinee'),
(8, 'Bigard', 'bigardjm');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`loginUtilisateur`) REFERENCES `utilisateurs` (`loginUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lignescommande`
--
ALTER TABLE `lignescommande`
  ADD CONSTRAINT `fk_idVin` FOREIGN KEY (`idVin`) REFERENCES `vins` (`idVin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_numCommande` FOREIGN KEY (`numCommande`) REFERENCES `commandes` (`numCommande`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
