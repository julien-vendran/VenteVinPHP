--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `numCommande` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loginUtilisateur` varchar(32) NOT NULL,
  `montantCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`numCommande`, `dateCommande`, `loginUtilisateur`, `montantCommande`) VALUES
(123, '2019-12-12 01:09:31', 'nico', 84),
(124, '2019-12-12 01:11:35', 'nico', 84),
(125, '2019-12-12 01:17:34', 'nico', 89),
(126, '2019-12-12 08:29:16', 'nico', 239),
(127, '2019-12-12 17:27:01', 'nico', 143);

-- --------------------------------------------------------

--
-- Table structure for table `domaines`
--

CREATE TABLE `domaines` (
  `idDomaine` int(11) NOT NULL,
  `nomDomaine` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lignesCommande`
--

CREATE TABLE `lignesCommande` (
  `numCommande` int(11) NOT NULL,
  `idVin` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lignesCommande`
--

INSERT INTO `lignesCommande` (`numCommande`, `idVin`, `quantite`) VALUES
(123, 1, 2),
(123, 4, 4),
(124, 1, 2),
(124, 4, 4),
(125, 1, 15),
(126, 1, 20),
(126, 2, 20),
(127, 1, 20),
(127, 2, 1),
(127, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `loginUtilisateur` varchar(32) NOT NULL,
  `mdpUtilisateur` varchar(64) NOT NULL,
  `nomUtilisateur` varchar(32) NOT NULL,
  `nonce` varchar(32) NOT NULL,
  `emailUtilisateur` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`loginUtilisateur`, `mdpUtilisateur`, `nomUtilisateur`, `nonce`, `emailUtilisateur`) VALUES
('nico', '1adb2719d9c1d8d83c3bbfa821b279f07e7e876b0598f5df1659f0d639dd2b3a', 'Nicolas', '', 'nicolaspicachou@hotmail.fr');

--
-- Table structure for table `viticulteurs`
--

CREATE TABLE `viticulteurs` (
  `idViticulteur` int(11) NOT NULL,
  `nomViticulteur` varchar(32) NOT NULL,
  `loginViticulteur` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `viticulteurs` (`idViticulteur`, `nomViticulteur`, `loginViticulteur`) VALUES ('1', 'Eric Vendran', 'vendrane');

-- --------------------------------------------------------

--
-- Table structure for table `vins`
--

CREATE TABLE `vins` (
                        `idVin` int(11) NOT NULL,
                        `nomVin` varchar(32) NOT NULL,
                        `anneeVin` year(4) NOT NULL,
                        `descriptionVin` text NOT NULL,
                        `typeVin` varchar(15) NOT NULL,
                        `medailleVin` varchar(10) DEFAULT NULL,
                        `prixVin` double NOT NULL,
                        `qteVin` int(11) NOT NULL,
                        `imageVin` varchar(40) NOT NULL,
                        `idViticulteur` INT NOT NULL ,
                        INDEX `fk_Viticulteur` (`idViticulteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vins`
--

INSERT INTO `vins` (`idVin`, `nomVin`, `anneeVin`, `descriptionVin`, `typeVin`, `medailleVin`, `prixVin`, `qteVin`, `imageVin`, `idViticulteur`) VALUES
(1, 'Viognier Chardonnay', 2018, 'Blanc sec', 'Blanc', '', 5.95, 79, './view/images/vmvChardo2018', 1),
(2, 'Sira', 2015, 'Bon avec la viande', 'Rouge', 'Or', 6, 234, './view/images/gig2011', 1),
(3, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 59, './view/images/vmv18secretdame', 1),
(4, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(5, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(6, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(7, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(8, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(9, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1),
(10, 'SO4', 2018, 'Bon tout le temps', 'Blanc', 'Argent', 18, 60, './view/images/vmv18secretdame', 1);

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`numCommande`),
  ADD KEY `fk_login` (`loginUtilisateur`);

--
-- Indexes for table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`idDomaine`);

--
-- Indexes for table `lignesCommande`
--
ALTER TABLE `lignesCommande`
  ADD PRIMARY KEY (`numCommande`,`idVin`),
  ADD KEY `fk_idVin` (`idVin`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`loginUtilisateur`);

--
-- Indexes for table `vins`
--
ALTER TABLE `vins`
  ADD PRIMARY KEY (`idVin`);

--
-- Indexes for table `viticulteurs`
--
ALTER TABLE `viticulteurs`
  ADD PRIMARY KEY (`idViticulteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `numCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `idDomaine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vins`
--
ALTER TABLE `vins`
  MODIFY `idVin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `viticulteurs`
--
ALTER TABLE `viticulteurs`
  MODIFY `idViticulteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`loginUtilisateur`) REFERENCES `utilisateurs` (`loginUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lignesCommande`
--
ALTER TABLE `lignesCommande`
  ADD CONSTRAINT `fk_idVin` FOREIGN KEY (`idVin`) REFERENCES `vins` (`idVin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_numCommande` FOREIGN KEY (`numCommande`) REFERENCES `commandes` (`numCommande`) ON DELETE CASCADE ON UPDATE CASCADE;
