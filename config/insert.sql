--
-- Structure de la table `domaines`
--

DROP TABLE IF EXISTS `domaines`;
CREATE TABLE IF NOT EXISTS `domaines` (
  `idDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `nomDomaine` varchar(32) NOT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`idDomaine`, `nomDomaine`) VALUES
(1, 'Mont ventoux'),
(2, 'Gigondas');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `loginUtilisateur` varchar(32) NOT NULL,
  `mdpUtilisateur` varchar(64) NOT NULL,
  `nomUtilisateur` varchar(32) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
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
  `idDomaine` int(11) NOT NULL,
  PRIMARY KEY (`idVin`),
  KEY `idDomaine` (`idDomaine`),
  KEY `idVin` (`idVin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`idVin`, `nomVin`, `anneeVin`, `descriptionVin`, `typeVin`, `medailleVin`, `prixVin`, `qteVin`, `imageVin`, `idDomaine`) VALUES
(1, 'Viognier Chardonnay', 2018, 'Blanc sec', 'Blanc', '', 5.95, 99, './view/images/vmvChardo2018', 1),
(2, 'Sira', 2015, 'Bon avec la viande', 'Rouge', 'Or', 6, 235, './view/images/gig2011', 2),
(3, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(4, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(5, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(6, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(7, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(8, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(9, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(10, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1);

-- --------------------------------------------------------

--
-- Structure de la table `viticulteurs`
--

DROP TABLE IF EXISTS `viticulteurs`;
CREATE TABLE IF NOT EXISTS `viticulteurs` (
  `idViticulteur` int(11) NOT NULL AUTO_INCREMENT,
  `nomViticulteur` varchar(32) NOT NULL,
  `prenomViticulteur` varchar(32) NOT NULL,
  `idDomaine` int(11) NOT NULL,
  PRIMARY KEY (`idViticulteur`),
  KEY `idDomaine` (`idDomaine`),
  KEY `idViticulteur` (`idViticulteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vins`
--
ALTER TABLE `vins`
  ADD CONSTRAINT `fk_domaine_vin` FOREIGN KEY (`idDomaine`) REFERENCES `domaines` (`idDomaine`);

--
-- Contraintes pour la table `viticulteurs`
--
ALTER TABLE `viticulteurs`
  ADD CONSTRAINT `fk_domaine_viticulteur` FOREIGN KEY (`idDomaine`) REFERENCES `domaines` (`idDomaine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
