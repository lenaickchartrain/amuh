-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: amuh
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attribut`
--

DROP TABLE IF EXISTS `attribut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribut` (
  `id_attribut` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_categorie_attribut` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `atb_libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `atb_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_attribut`),
  KEY `IDX_7AB8E85DC11D1B98` (`id_categorie_attribut`),
  CONSTRAINT `FK_7AB8E85DC11D1B98` FOREIGN KEY (`id_categorie_attribut`) REFERENCES `categorie_attribut` (`id_categorie_attribut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribut`
--

LOCK TABLES `attribut` WRITE;
/*!40000 ALTER TABLE `attribut` DISABLE KEYS */;
INSERT INTO `attribut` VALUES 
('10cd1cdb-8c19-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Nom','ACTIF'),
('146fe80a-8c19-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Prenom','ACTIF'),
('1895fdd3-8c19-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Age','ACTIF'),
('1c6f9d01-8c19-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Genre','ACTIF'),
('4e1ba078-8c1a-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Régulé','ACTIF'),
('536b61c4-8c1a-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Cause','ACTIF'),
('5ccda8d1-8c1a-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Code Postal','ACTIF'),
('5ff41929-8c1a-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Ville','ACTIF'),
('6a8bfca2-8c1a-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Montant','ACTIF'),
('71a6d61a-8c1a-11e7-bc55-0011321fa613','07dbe03c-8c19-11e7-bc55-0011321fa613','Modalité de règlement','ACTIF');
/*!40000 ALTER TABLE `attribut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_attribut`
--

DROP TABLE IF EXISTS `categorie_attribut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie_attribut` (
  `id_categorie_attribut` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `cat_libelle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cat_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categorie_attribut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_attribut`
--

LOCK TABLES `categorie_attribut` WRITE;
/*!40000 ALTER TABLE `categorie_attribut` DISABLE KEYS */;
INSERT INTO `categorie_attribut` VALUES ('07dbe03c-8c19-11e7-bc55-0011321fa613','Consultation','ACTIF');
/*!40000 ALTER TABLE `categorie_attribut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cause`
--

DROP TABLE IF EXISTS `cause`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cause` (
  `id_cause` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `cau_libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cau_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cause`),
  UNIQUE KEY `UNIQ_F0DA7FBF931C914C` (`cau_libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cause`
--

LOCK TABLES `cause` WRITE;
/*!40000 ALTER TABLE `cause` DISABLE KEYS */;
INSERT INTO `cause` VALUES 
('06579105-8d58-11e7-a85a-705a0f4838cf','Pb dermatologique','ACTIF'),
('10721a24-8d58-11e7-a85a-705a0f4838cf','Pb social','ACTIF'),
('1b817e01-8d58-11e7-a85a-705a0f4838cf','Fièvre - état grippal','ACTIF'),
('2afee0f2-8d58-11e7-a85a-705a0f4838cf','Renouvellement ordonnance','ACTIF'),
('330f05aa-8d58-11e7-a85a-705a0f4838cf','Autre','ACTIF'),('a6e43a2a-8d57-11e7-a85a-705a0f4838cf','Neuropsychologique','ACTIF'),
('b1447d30-8d57-11e7-a85a-705a0f4838cf','Ophtalmologique','ACTIF'),
('b6ac4eea-8d57-11e7-a85a-705a0f4838cf','ORL','ACTIF'),
('bd4e8fa9-8d57-11e7-a85a-705a0f4838cf','Stomatologique','ACTIF'),
('cd4db021-8d57-11e7-a85a-705a0f4838cf','Céphalée (Maux de tête)','ACTIF'),
('d615e640-8d57-11e7-a85a-705a0f4838cf','Pb respiratoire','ACTIF'),
('de5030bd-8d57-11e7-a85a-705a0f4838cf','Pb cardiovasculaire','ACTIF'),
('f5e70618-8d57-11e7-a85a-705a0f4838cf','Pb gastro-entérologique','ACTIF'),
('ff180b10-8d57-11e7-a85a-705a0f4838cf','Pb génito-urinaire','ACTIF');
/*!40000 ALTER TABLE `cause` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultation` (
  `id_consultation` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `id_medecin` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `cst_date_creation` datetime NOT NULL,
  `cst_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `cst_commentaire` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_consultation`),
  KEY `IDX_964685A650EAE44` (`id_utilisateur`),
  KEY `IDX_964685A6C547FAB6` (`id_medecin`),
  CONSTRAINT `FK_964685A650EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_964685A6C547FAB6` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultation`
--

LOCK TABLES `consultation` WRITE;
/*!40000 ALTER TABLE `consultation` DISABLE KEYS */;
INSERT INTO `consultation` VALUES ('c346a912-8d6e-11e7-a85a-705a0f4838cf','35098050-8c11-11e7-bc55-0011321fa613','baae3027-8c25-11e7-bc55-0011321fa613','2017-08-30 12:34:12','ACTIF','RAS');
/*!40000 ALTER TABLE `consultation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultation_data`
--

DROP TABLE IF EXISTS `consultation_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultation_data` (
  `id_consultation_data` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_attribut` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `id_consultation` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `csd_valeur` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:object)',
  `csd_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `csd_link` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `csd_date_creation` datetime NOT NULL,
  PRIMARY KEY (`id_consultation_data`),
  KEY `IDX_863A73A92A6304C8` (`id_attribut`),
  KEY `IDX_863A73A950EAE44` (`id_utilisateur`),
  KEY `IDX_863A73A9B587F0D4` (`id_consultation`),
  CONSTRAINT `FK_863A73A92A6304C8` FOREIGN KEY (`id_attribut`) REFERENCES `attribut` (`id_attribut`),
  CONSTRAINT `FK_863A73A950EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_863A73A9B587F0D4` FOREIGN KEY (`id_consultation`) REFERENCES `consultation` (`id_consultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultation_data`
--

LOCK TABLES `consultation_data` WRITE;
/*!40000 ALTER TABLE `consultation_data` DISABLE KEYS */;
INSERT INTO `consultation_data` VALUES ('c3477f7e-8d6e-11e7-a85a-705a0f4838cf','10cd1cdb-8c19-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','s:9:\"CHARTRAIN\";','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c34788fc-8d6e-11e7-a85a-705a0f4838cf','146fe80a-8c19-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','s:7:\"Lenaick\";','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c34791db-8d6e-11e7-a85a-705a0f4838cf','1895fdd3-8c19-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','s:2:\"35\";','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c34798c8-8d6e-11e7-a85a-705a0f4838cf','1c6f9d01-8c19-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','s:1:\"H\";','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c3479f25-8d6e-11e7-a85a-705a0f4838cf','4e1ba078-8c1a-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','O:34:\"AMUH\\AmuhBundle\\Entity\\Orientation\":3:{s:49:\"\0AMUH\\AmuhBundle\\Entity\\Orientation\0idOrientation\";i:1;s:46:\"\0AMUH\\AmuhBundle\\Entity\\Orientation\0oriLibelle\";s:8:\"Régulé\";s:43:\"\0AMUH\\AmuhBundle\\Entity\\Orientation\0oriEtat\";s:5:\"ACTIF\";}','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c347a577-8d6e-11e7-a85a-705a0f4838cf','536b61c4-8c1a-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','O:28:\"AMUH\\AmuhBundle\\Entity\\Cause\":3:{s:37:\"\0AMUH\\AmuhBundle\\Entity\\Cause\0idCause\";s:36:\"06579105-8d58-11e7-a85a-705a0f4838cf\";s:40:\"\0AMUH\\AmuhBundle\\Entity\\Cause\0cauLibelle\";s:17:\"Pb dermatologique\";s:37:\"\0AMUH\\AmuhBundle\\Entity\\Cause\0cauEtat\";s:5:\"ACTIF\";}','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c347ab8f-8d6e-11e7-a85a-705a0f4838cf','5ccda8d1-8c1a-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','s:5:\"76700\";','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c347b1c8-8d6e-11e7-a85a-705a0f4838cf','5ff41929-8c1a-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','s:8:\"HARFLEUR\";','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c347b7da-8d6e-11e7-a85a-705a0f4838cf','6a8bfca2-8c1a-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','N;','ACTIF','59a694a4a2422','2017-08-30 12:34:12'),('c347be13-8d6e-11e7-a85a-705a0f4838cf','71a6d61a-8c1a-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613','c346a912-8d6e-11e7-a85a-705a0f4838cf','N;','ACTIF','59a694a4a2422','2017-08-30 12:34:12');
/*!40000 ALTER TABLE `consultation_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journee`
--

DROP TABLE IF EXISTS `journee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journee` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_type_journee` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `jou_date` date NOT NULL,
  PRIMARY KEY (`id_journee`),
  KEY `IDX_DC179AEDD7F7806A` (`id_type_journee`),
  CONSTRAINT `FK_DC179AEDD7F7806A` FOREIGN KEY (`id_type_journee`) REFERENCES `type_journee` (`id_type_journee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journee`
--

LOCK TABLES `journee` WRITE;
/*!40000 ALTER TABLE `journee` DISABLE KEYS */;
INSERT INTO `journee` VALUES ('82e0677e-8d58-11e7-a85a-705a0f4838cf','e2000a2f-8ced-11e7-bc55-0011321fa613','2017-08-30'),('8a17606e-8c27-11e7-bc55-0011321fa613',NULL,'2017-08-28'),('f262e342-8ced-11e7-bc55-0011321fa613','e2000a2f-8ced-11e7-bc55-0011321fa613','2017-08-29');
/*!40000 ALTER TABLE `journee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journee_consultations`
--

DROP TABLE IF EXISTS `journee_consultations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journee_consultations` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_consultation` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id_journee`,`id_consultation`),
  UNIQUE KEY `UNIQ_60DE4409B587F0D4` (`id_consultation`),
  KEY `IDX_60DE440928A339D` (`id_journee`),
  CONSTRAINT `FK_60DE440928A339D` FOREIGN KEY (`id_journee`) REFERENCES `journee` (`id_journee`),
  CONSTRAINT `FK_60DE4409B587F0D4` FOREIGN KEY (`id_consultation`) REFERENCES `consultation` (`id_consultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journee_consultations`
--

LOCK TABLES `journee_consultations` WRITE;
/*!40000 ALTER TABLE `journee_consultations` DISABLE KEYS */;
INSERT INTO `journee_consultations` VALUES ('82e0677e-8d58-11e7-a85a-705a0f4838cf','c346a912-8d6e-11e7-a85a-705a0f4838cf');
/*!40000 ALTER TABLE `journee_consultations` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medecin` (
  `id_medecin` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `med_rue` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `med_complement_adresse` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `med_code_postal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `med_ville` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `med_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `prs_nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_nom_jeune_fille` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prs_prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_telephone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medecin`
--

LOCK TABLES `medecin` WRITE;
/*!40000 ALTER TABLE `medecin` DISABLE KEYS */;
INSERT INTO `medecin` VALUES 
('a25f1a98-8c25-11e7-bc55-0011321fa613','55 rue de Saint Quentin',NULL,'76600','LE HAVRE','ACTIF','CASAUX',NULL,'Dominique','0123456789'),
('baae3027-8c25-11e7-bc55-0011321fa613','rue inconnue',NULL,'76600','LE HAVRE','ACTIF','DUMENIL',NULL,'Jean-Luc','0123456789');
/*!40000 ALTER TABLE `medecin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journee_medecins`
--

DROP TABLE IF EXISTS `journee_medecins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journee_medecins` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_medecin` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id_journee`,`id_medecin`),
  KEY `IDX_F56E872C28A339D` (`id_journee`),
  KEY `IDX_F56E872CC547FAB6` (`id_medecin`),
  CONSTRAINT `FK_F56E872C28A339D` FOREIGN KEY (`id_journee`) REFERENCES `journee` (`id_journee`),
  CONSTRAINT `FK_F56E872CC547FAB6` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journee_medecins`
--

LOCK TABLES `journee_medecins` WRITE;
/*!40000 ALTER TABLE `journee_medecins` DISABLE KEYS */;
INSERT INTO `journee_medecins` VALUES ('82e0677e-8d58-11e7-a85a-705a0f4838cf','a25f1a98-8c25-11e7-bc55-0011321fa613'),('82e0677e-8d58-11e7-a85a-705a0f4838cf','baae3027-8c25-11e7-bc55-0011321fa613'),('8a17606e-8c27-11e7-bc55-0011321fa613','a25f1a98-8c25-11e7-bc55-0011321fa613'),('8a17606e-8c27-11e7-bc55-0011321fa613','baae3027-8c25-11e7-bc55-0011321fa613'),('f262e342-8ced-11e7-bc55-0011321fa613','a25f1a98-8c25-11e7-bc55-0011321fa613'),('f262e342-8ced-11e7-bc55-0011321fa613','baae3027-8c25-11e7-bc55-0011321fa613');
/*!40000 ALTER TABLE `journee_medecins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `usr_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usr_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `prs_nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_nom_jeune_fille` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prs_prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_telephone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES 
('35098050-8c11-11e7-bc55-0011321fa613','sivelia@live.fr','$2y$16$IVoF3XFDVItwDhvTy5bZ3ewXtJMvKZs2MMcQw7DCM8hTjxpJvY86G','','ACTIF','LE GAUDION',NULL,'Mylène','0621757035'),
('4ca6ad6b-8c10-11e7-bc55-0011321fa613','lenaickchartrain@gmail.com','$2y$16$7Nz7RB0H24Bn3Z6xoCQ5XezGdsm3tJqYJOm/DiTZeS1AnXvbKTq2C','','ACTIF','CHARTRAIN','','Lenaick','0621757035');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journee_secretaires`
--

DROP TABLE IF EXISTS `journee_secretaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journee_secretaires` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id_journee`,`id_utilisateur`),
  KEY `IDX_19DE998928A339D` (`id_journee`),
  KEY `IDX_19DE998950EAE44` (`id_utilisateur`),
  CONSTRAINT `FK_19DE998928A339D` FOREIGN KEY (`id_journee`) REFERENCES `journee` (`id_journee`),
  CONSTRAINT `FK_19DE998950EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journee_secretaires`
--

LOCK TABLES `journee_secretaires` WRITE;
/*!40000 ALTER TABLE `journee_secretaires` DISABLE KEYS */;
INSERT INTO `journee_secretaires` VALUES ('82e0677e-8d58-11e7-a85a-705a0f4838cf','35098050-8c11-11e7-bc55-0011321fa613'),('82e0677e-8d58-11e7-a85a-705a0f4838cf','4ca6ad6b-8c10-11e7-bc55-0011321fa613'),('8a17606e-8c27-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613'),('8a17606e-8c27-11e7-bc55-0011321fa613','4ca6ad6b-8c10-11e7-bc55-0011321fa613'),('f262e342-8ced-11e7-bc55-0011321fa613','35098050-8c11-11e7-bc55-0011321fa613'),('f262e342-8ced-11e7-bc55-0011321fa613','4ca6ad6b-8c10-11e7-bc55-0011321fa613');
/*!40000 ALTER TABLE `journee_secretaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalite_reglement`
--

DROP TABLE IF EXISTS `modalite_reglement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalite_reglement` (
  `id_modalite_reglement` int(11) NOT NULL AUTO_INCREMENT,
  `more_libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `more_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_modalite_reglement`),
  UNIQUE KEY `UNIQ_BCDAB5425FF06174` (`more_libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalite_reglement`
--

LOCK TABLES `modalite_reglement` WRITE;
/*!40000 ALTER TABLE `modalite_reglement` DISABLE KEYS */;
INSERT INTO `modalite_reglement` VALUES 
(1,'CMU','ACTIF'),
(2,'Tiers Payant','ACTIF');
/*!40000 ALTER TABLE `modalite_reglement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orientation`
--

DROP TABLE IF EXISTS `orientation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orientation` (
  `id_orientation` int(11) NOT NULL AUTO_INCREMENT,
  `ori_libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ori_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_orientation`),
  UNIQUE KEY `UNIQ_3680C5561F6B8805` (`ori_libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orientation`
--

LOCK TABLES `orientation` WRITE;
/*!40000 ALTER TABLE `orientation` DISABLE KEYS */;
INSERT INTO `orientation` VALUES 
(1,'Régulé','ACTIF'),
(2,'Non régulé','ACTIF');
/*!40000 ALTER TABLE `orientation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id_role` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `rol_libelle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rol_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES 
('2da2b0f6-8c10-11e7-bc55-0011321fa613','ROLE_SECRETAIRE','ACTIF'),
('3834f378-8c10-11e7-bc55-0011321fa613','ROLE_ADMINISTRATION','ACTIF');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_journee`
--

DROP TABLE IF EXISTS `type_journee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_journee` (
  `id_type_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `tpj_libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tpj_nb_secretaire` int(11) NOT NULL,
  `tpj_nb_medecin` int(11) NOT NULL,
  `tpj_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type_journee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_journee`
--

LOCK TABLES `type_journee` WRITE;
/*!40000 ALTER TABLE `type_journee` DISABLE KEYS */;
INSERT INTO `type_journee` VALUES 
('9c7ab8a2-8ced-11e7-bc55-0011321fa613','JEP',2,2,'ACTIF'),
('e2000a2f-8ced-11e7-bc55-0011321fa613','Samedi',2,2,'ACTIF');
/*!40000 ALTER TABLE `type_journee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs_roles`
--

DROP TABLE IF EXISTS `utilisateurs_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs_roles` (
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_role` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id_utilisateur`,`id_role`),
  KEY `IDX_55B6AB3850EAE44` (`id_utilisateur`),
  KEY `IDX_55B6AB38DC499668` (`id_role`),
  CONSTRAINT `FK_55B6AB3850EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_55B6AB38DC499668` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs_roles`
--

LOCK TABLES `utilisateurs_roles` WRITE;
/*!40000 ALTER TABLE `utilisateurs_roles` DISABLE KEYS */;
INSERT INTO `utilisateurs_roles` VALUES 
('35098050-8c11-11e7-bc55-0011321fa613','2da2b0f6-8c10-11e7-bc55-0011321fa613'),
('4ca6ad6b-8c10-11e7-bc55-0011321fa613','3834f378-8c10-11e7-bc55-0011321fa613');
/*!40000 ALTER TABLE `utilisateurs_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-30 16:33:45
