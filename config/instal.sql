DROP TABLE `viticulteurs`;
DROP TABLE `vins`;
DROP TABLE `domaines`;

CREATE TABLE `domaines` (
  `idDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `nomDomaine` varchar(32) NOT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `vins` (
  `idVin` int(11) NOT NULL AUTO_INCREMENT,
  `nomVin` varchar(32) NOT NULL,
  `anneeVin` year(4) NOT NULL,
  `descriptionVin` text NOT NULL,
  `typeVin` varchar(15) NOT NULL,
  `medailleVin` varchar(10) DEFAULT NULL,
  `prixVin` double NOT NULL,
  `idDomaine` int(11) NOT NULL,
  PRIMARY KEY (`idVin`),
  KEY `idDomaine` (`idDomaine`),
  KEY `idVin` (`idVin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `viticulteurs` (
  `idViticulteur` int(11) NOT NULL AUTO_INCREMENT,
  `nomViticulteur` varchar(32) NOT NULL,
  `prenomViticulteur` varchar(32) NOT NULL,
  `idDomaine` int(11) NOT NULL,
  PRIMARY KEY (`idViticulteur`),
  KEY `idDomaine` (`idDomaine`),
  KEY `idViticulteur` (`idViticulteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `vins`
  ADD CONSTRAINT `fk_domaine_vin` FOREIGN KEY (`idDomaine`) REFERENCES `domaines` (`idDomaine`);

ALTER TABLE `viticulteurs`
  ADD CONSTRAINT `fk_domaine_viticulteur` FOREIGN KEY (`idDomaine`) REFERENCES `domaines` (`idDomaine`);