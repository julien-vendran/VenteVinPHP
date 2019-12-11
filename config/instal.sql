DROP TABLE `viticulteurs`;
DROP TABLE `vins`;
DROP TABLE `utilisateurs`;

CREATE TABLE `vins` (
  `idVin` int(11) NOT NULL AUTO_INCREMENT,
  `nomVin` varchar(32) NOT NULL,
  `anneeVin` year(4) NOT NULL,
  `descriptionVin` text NOT NULL,
  `typeVin` varchar(15) NOT NULL,
  `medailleVin` varchar(10) DEFAULT NULL,
  `prixVin` double NOT NULL,
  `qteVin` int(11) NOT NULL,
  `imageVin` varchar(50) NOT NULL,
  PRIMARY KEY (`idVin`),
  KEY `idVin` (`idVin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `viticulteurs` (
  `idViticulteur` int(11) NOT NULL AUTO_INCREMENT,
  `nomViticulteur` varchar(32) NOT NULL,
  `prenomViticulteur` varchar(32) NOT NULL,
  PRIMARY KEY (`idViticulteur`),
  KEY `idViticulteur` (`idViticulteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE `utilisateurs` (
   `idUtilisateur` INT NOT NULL AUTO_INCREMENT ,
   `loginUtilisateur` VARCHAR(32) NOT NULL ,
   `mdpUtilisateur` VARCHAR(64) NOT NULL ,
   `nomUtilisateur` VARCHAR(32) NOT NULL ,
   PRIMARY KEY (`idUtilisateur`))
   ENGINE=InnoDB DEFAULT CHARSET=utf8;