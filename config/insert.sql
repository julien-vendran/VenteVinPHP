--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `loginUtilisateur` varchar(32) NOT NULL,
  `mdpUtilisateur` varchar(64) NOT NULL,
  `nomUtilisateur` varchar(32) NOT NULL,
  PRIMARY KEY (`loginUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`idVin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`idVin`, `nomVin`, `anneeVin`, `descriptionVin`, `typeVin`, `medailleVin`, `prixVin`, `qteVin`, `imageVin`) VALUES
(1, 'Viognier Chardonnay', 2018, 'Blanc sec', 'Blanc', '', 5.95, 99, './view/images/vmvChardo2018'),
(2, 'Sira', 2015, 'Bon avec la viande', 'Rouge', 'Or', 6, 235, './view/images/gig2011'),
(3, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame'),
(4, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame'),
(5, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame'),
(6, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame'),
(7, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame'),
(8, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame'),
(9, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame'),
(10, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;