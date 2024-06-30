-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 05:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chu`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyse`
--

CREATE TABLE `analyse` (
  `idA` int(11) NOT NULL,
  `desciptionA` varchar(45) DEFAULT NULL,
  `montantA` int(11) DEFAULT NULL,
  `alG_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `analysegamme`
--

CREATE TABLE `analysegamme` (
  `alG_id` int(11) NOT NULL,
  `alG_nom` varchar(45) DEFAULT NULL,
  `alG_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analysegamme`
--

INSERT INTO `analysegamme` (`alG_id`, `alG_nom`, `alG_description`) VALUES
(1, 'HEMATHOLOGIE', NULL),
(2, 'BACTERIOGIE', NULL),
(3, 'PARASITOLOGIE', NULL),
(4, 'IMMINULOGIE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docteur`
--

CREATE TABLE `docteur` (
  `doc_im` int(6) NOT NULL,
  `doc_nom` varchar(45) DEFAULT NULL,
  `doc_prenom` varchar(45) DEFAULT NULL,
  `doc_service` varchar(45) DEFAULT NULL,
  `doc_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docteur`
--

INSERT INTO `docteur` (`doc_im`, `doc_nom`, `doc_prenom`, `doc_service`, `doc_type`) VALUES
(100001, 'RAKOTO', 'Nirina', NULL, NULL),
(100002, 'RANDRIA', 'Rado', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `echographie`
--

CREATE TABLE `echographie` (
  `idE` int(11) NOT NULL,
  `descriptionE` varchar(45) DEFAULT NULL,
  `montantE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pat_id` int(11) NOT NULL,
  `pat_nom` varchar(45) DEFAULT NULL,
  `pat_prenom` varchar(45) DEFAULT NULL,
  `pat_dateNaissance` date DEFAULT NULL,
  `pat_sexe` varchar(45) DEFAULT NULL,
  `pat_commune` varchar(45) DEFAULT NULL,
  `pat_addresse` varchar(45) DEFAULT NULL,
  `pat_profession` varchar(45) DEFAULT NULL,
  `tp_id` int(11) DEFAULT NULL,
  `pat_status` varchar(45) DEFAULT NULL,
  `util_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pat_id`, `pat_nom`, `pat_prenom`, `pat_dateNaissance`, `pat_sexe`, `pat_commune`, `pat_addresse`, `pat_profession`, `tp_id`, `pat_status`, `util_id`) VALUES
(2, 'rasoanirina', NULL, '2001-11-20', 'Masculin', 'FIANARANTSOA', 'IIP098 FIANARANTSOA', 'ETUDIANT', 1, 'Hopistaliséé', NULL),
(3, 'RAKOTO', NULL, '2000-11-01', 'Feminin', 'FIANARANTSOA', 'IVS100 TANAMBAO', 'ETUDIANT', 2, 'Externe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quitt_analyse`
--

CREATE TABLE `quitt_analyse` (
  `al_id` int(11) NOT NULL,
  `al_description` varchar(45) DEFAULT NULL,
  `al_somme` varchar(45) DEFAULT NULL,
  `alG_id` int(11) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL,
  `alG_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quitt_banquedesang`
--

CREATE TABLE `quitt_banquedesang` (
  `bds_id` int(11) NOT NULL,
  `bds_desciption` varchar(45) DEFAULT NULL,
  `bds_somme` varchar(45) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quitt_certificatmedical`
--

CREATE TABLE `quitt_certificatmedical` (
  `cm_id` int(11) NOT NULL,
  `cm_designation` varchar(45) DEFAULT NULL,
  `cm_somme` varchar(45) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL,
  `doc_im` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quitt_certificatmedical`
--

INSERT INTO `quitt_certificatmedical` (`cm_id`, `cm_designation`, `cm_somme`, `pat_id`, `doc_im`) VALUES
(1, 'dfzdsfsdf', '1112', 2, 100001);

-- --------------------------------------------------------

--
-- Table structure for table `quitt_consultation`
--

CREATE TABLE `quitt_consultation` (
  `cons_id` int(11) NOT NULL,
  `cons_numero` varchar(10) DEFAULT NULL,
  `cons_dateConsultation` varchar(45) DEFAULT NULL,
  `cons_cout` int(5) DEFAULT NULL,
  `con_validation` int(1) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL,
  `doc_im` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quitt_echographie`
--

CREATE TABLE `quitt_echographie` (
  `echo_id` int(11) NOT NULL,
  `echo_designation` varchar(45) DEFAULT NULL,
  `echo_somme` varchar(45) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quitt_echographie_has_echographie`
--

CREATE TABLE `quitt_echographie_has_echographie` (
  `quitt_echographie_echo_id` int(11) NOT NULL,
  `echographie_idE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quitt_hebergement`
--

CREATE TABLE `quitt_hebergement` (
  `hb_id` int(11) NOT NULL,
  `hb_numero` varchar(45) DEFAULT NULL,
  `hb_service` varchar(45) DEFAULT NULL,
  `hb_dateEntre` date DEFAULT NULL,
  `hb_dateSortie` date DEFAULT NULL,
  `hb_categorie` int(1) DEFAULT NULL,
  `hb_prix` int(11) DEFAULT NULL,
  `hb_somme` varchar(45) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quitt_radio`
--

CREATE TABLE `quitt_radio` (
  `rd_id` int(11) NOT NULL,
  `rd_denomination` varchar(45) DEFAULT NULL,
  `rd_somme` varchar(45) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quitt_radio_has_radio`
--

CREATE TABLE `quitt_radio_has_radio` (
  `quitt_radio_rd_id` int(11) NOT NULL,
  `radio_idR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `idR` int(11) NOT NULL,
  `descriptionR` varchar(45) DEFAULT NULL,
  `montantR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reg_analyse`
--

CREATE TABLE `reg_analyse` (
  `regAl_id` int(11) NOT NULL,
  `regAl_date` date DEFAULT NULL,
  `regAl_nomPatient` varchar(45) DEFAULT NULL,
  `regAl_description` varchar(45) DEFAULT NULL,
  `regAl_numQuittance` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reg_echographie`
--

CREATE TABLE `reg_echographie` (
  `rgEcho_id` int(11) NOT NULL,
  `rgEcho_date` date DEFAULT NULL,
  `rgEcho_nomPatient` varchar(45) DEFAULT NULL,
  `rgEcho_numQuittance` varchar(45) DEFAULT NULL,
  `rgEcho_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reg_radio`
--

CREATE TABLE `reg_radio` (
  `rgRd_id` int(11) NOT NULL,
  `rgRd_date` date DEFAULT NULL,
  `rgRd_nomPatient` varchar(45) DEFAULT NULL,
  `rgRd_numQuittance` varchar(45) DEFAULT NULL,
  `rgRd_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typedepatient`
--

CREATE TABLE `typedepatient` (
  `tp_id` int(11) NOT NULL,
  `tp_typeDePatient` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typedepatient`
--

INSERT INTO `typedepatient` (`tp_id`, `tp_typeDePatient`) VALUES
(1, 'Tout public'),
(2, 'Prise en charge');

-- --------------------------------------------------------

--
-- Table structure for table `typeutilisateur`
--

CREATE TABLE `typeutilisateur` (
  `tutil_id` int(11) NOT NULL,
  `tutil_designation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeutilisateur`
--

INSERT INTO `typeutilisateur` (`tutil_id`, `tutil_designation`) VALUES
(1, 'Administrateur'),
(2, 'personnel d\'acceuil'),
(3, 'personnel session'),
(4, 'secretaire d\'admnistration');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `util_id` int(11) NOT NULL,
  `util_nom` varchar(45) DEFAULT NULL,
  `util_prenom` varchar(45) DEFAULT NULL,
  `util_mail` varchar(45) NOT NULL,
  `util_login` varchar(45) NOT NULL,
  `util_mdp` varchar(255) NOT NULL,
  `util_photo` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyse`
--
ALTER TABLE `analyse`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `FK GAmme_idx` (`alG_id`);

--
-- Indexes for table `analysegamme`
--
ALTER TABLE `analysegamme`
  ADD PRIMARY KEY (`alG_id`),
  ADD UNIQUE KEY `alG_id_UNIQUE` (`alG_id`);

--
-- Indexes for table `docteur`
--
ALTER TABLE `docteur`
  ADD PRIMARY KEY (`doc_im`),
  ADD UNIQUE KEY `doc_id_UNIQUE` (`doc_im`);

--
-- Indexes for table `echographie`
--
ALTER TABLE `echographie`
  ADD PRIMARY KEY (`idE`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pat_id`),
  ADD UNIQUE KEY `idpatient_UNIQUE` (`pat_id`),
  ADD KEY `fk_typa_patient_idx` (`tp_id`),
  ADD KEY `fk_util_idx` (`util_id`);

--
-- Indexes for table `quitt_analyse`
--
ALTER TABLE `quitt_analyse`
  ADD PRIMARY KEY (`al_id`),
  ADD KEY `fk_gamme_analyse_idx` (`alG_id`),
  ADD KEY `fk_pat_analyse_idx` (`pat_id`);

--
-- Indexes for table `quitt_banquedesang`
--
ALTER TABLE `quitt_banquedesang`
  ADD PRIMARY KEY (`bds_id`),
  ADD KEY `fk_pat_bds_idx` (`pat_id`);

--
-- Indexes for table `quitt_certificatmedical`
--
ALTER TABLE `quitt_certificatmedical`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `fk_pat_cm_idx` (`pat_id`),
  ADD KEY `fk_doc_Cm_idx` (`doc_im`);

--
-- Indexes for table `quitt_consultation`
--
ALTER TABLE `quitt_consultation`
  ADD PRIMARY KEY (`cons_id`),
  ADD UNIQUE KEY `cons_id_UNIQUE` (`cons_id`),
  ADD UNIQUE KEY `con_numero_UNIQUE` (`cons_numero`),
  ADD KEY `fk_pat_cons_idx` (`pat_id`),
  ADD KEY `fk_doc_cons_idx` (`doc_im`);

--
-- Indexes for table `quitt_echographie`
--
ALTER TABLE `quitt_echographie`
  ADD PRIMARY KEY (`echo_id`),
  ADD KEY `fk_pat_echo_idx` (`pat_id`);

--
-- Indexes for table `quitt_echographie_has_echographie`
--
ALTER TABLE `quitt_echographie_has_echographie`
  ADD PRIMARY KEY (`quitt_echographie_echo_id`,`echographie_idE`),
  ADD KEY `fk_quitt_echographie_has_echographie_echographie1_idx` (`echographie_idE`),
  ADD KEY `fk_quitt_echographie_has_echographie_quitt_echographie1_idx` (`quitt_echographie_echo_id`);

--
-- Indexes for table `quitt_hebergement`
--
ALTER TABLE `quitt_hebergement`
  ADD PRIMARY KEY (`hb_id`),
  ADD KEY `fk_pat_hb_idx` (`pat_id`);

--
-- Indexes for table `quitt_radio`
--
ALTER TABLE `quitt_radio`
  ADD PRIMARY KEY (`rd_id`),
  ADD KEY `fk_pat_radio_idx` (`pat_id`);

--
-- Indexes for table `quitt_radio_has_radio`
--
ALTER TABLE `quitt_radio_has_radio`
  ADD PRIMARY KEY (`quitt_radio_rd_id`,`radio_idR`),
  ADD KEY `fk_quitt_radio_has_radio_radio1_idx` (`radio_idR`),
  ADD KEY `fk_quitt_radio_has_radio_quitt_radio1_idx` (`quitt_radio_rd_id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`idR`);

--
-- Indexes for table `reg_analyse`
--
ALTER TABLE `reg_analyse`
  ADD PRIMARY KEY (`regAl_id`);

--
-- Indexes for table `reg_echographie`
--
ALTER TABLE `reg_echographie`
  ADD PRIMARY KEY (`rgEcho_id`);

--
-- Indexes for table `reg_radio`
--
ALTER TABLE `reg_radio`
  ADD PRIMARY KEY (`rgRd_id`);

--
-- Indexes for table `typedepatient`
--
ALTER TABLE `typedepatient`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `typeutilisateur`
--
ALTER TABLE `typeutilisateur`
  ADD PRIMARY KEY (`tutil_id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`util_id`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analyse`
--
ALTER TABLE `analyse`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analysegamme`
--
ALTER TABLE `analysegamme`
  MODIFY `alG_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `echographie`
--
ALTER TABLE `echographie`
  MODIFY `idE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quitt_analyse`
--
ALTER TABLE `quitt_analyse`
  MODIFY `al_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quitt_banquedesang`
--
ALTER TABLE `quitt_banquedesang`
  MODIFY `bds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quitt_certificatmedical`
--
ALTER TABLE `quitt_certificatmedical`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quitt_consultation`
--
ALTER TABLE `quitt_consultation`
  MODIFY `cons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quitt_echographie`
--
ALTER TABLE `quitt_echographie`
  MODIFY `echo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quitt_hebergement`
--
ALTER TABLE `quitt_hebergement`
  MODIFY `hb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quitt_radio`
--
ALTER TABLE `quitt_radio`
  MODIFY `rd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_analyse`
--
ALTER TABLE `reg_analyse`
  MODIFY `regAl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_echographie`
--
ALTER TABLE `reg_echographie`
  MODIFY `rgEcho_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_radio`
--
ALTER TABLE `reg_radio`
  MODIFY `rgRd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typedepatient`
--
ALTER TABLE `typedepatient`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typeutilisateur`
--
ALTER TABLE `typeutilisateur`
  MODIFY `tutil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `util_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analyse`
--
ALTER TABLE `analyse`
  ADD CONSTRAINT `FK GAmme` FOREIGN KEY (`alG_id`) REFERENCES `analysegamme` (`alG_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_typa_patient` FOREIGN KEY (`tp_id`) REFERENCES `typedepatient` (`tp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_util` FOREIGN KEY (`util_id`) REFERENCES `utilisateur` (`util_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_analyse`
--
ALTER TABLE `quitt_analyse`
  ADD CONSTRAINT `fk_gamme_analyse` FOREIGN KEY (`alG_id`) REFERENCES `analysegamme` (`alG_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pat_analyse` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_banquedesang`
--
ALTER TABLE `quitt_banquedesang`
  ADD CONSTRAINT `fk_pat_bds` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_certificatmedical`
--
ALTER TABLE `quitt_certificatmedical`
  ADD CONSTRAINT `fk_doc_Cm` FOREIGN KEY (`doc_im`) REFERENCES `docteur` (`doc_im`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pat_cm` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_consultation`
--
ALTER TABLE `quitt_consultation`
  ADD CONSTRAINT `fk_doc_cons` FOREIGN KEY (`doc_im`) REFERENCES `docteur` (`doc_im`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pat_cons` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_echographie`
--
ALTER TABLE `quitt_echographie`
  ADD CONSTRAINT `fk_pat_echo` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_echographie_has_echographie`
--
ALTER TABLE `quitt_echographie_has_echographie`
  ADD CONSTRAINT `fk_quitt_echographie_has_echographie_echographie1` FOREIGN KEY (`echographie_idE`) REFERENCES `echographie` (`idE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quitt_echographie_has_echographie_quitt_echographie1` FOREIGN KEY (`quitt_echographie_echo_id`) REFERENCES `quitt_echographie` (`echo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_hebergement`
--
ALTER TABLE `quitt_hebergement`
  ADD CONSTRAINT `fk_pat_hb` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_radio`
--
ALTER TABLE `quitt_radio`
  ADD CONSTRAINT `fk_pat_radio` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quitt_radio_has_radio`
--
ALTER TABLE `quitt_radio_has_radio`
  ADD CONSTRAINT `fk_quitt_radio_has_radio_quitt_radio1` FOREIGN KEY (`quitt_radio_rd_id`) REFERENCES `quitt_radio` (`rd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quitt_radio_has_radio_radio1` FOREIGN KEY (`radio_idR`) REFERENCES `radio` (`idR`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
