-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mar 29 Août 2017 à 22:22
-- Version du serveur :  10.0.30-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amuh`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribut`
--

CREATE TABLE `attribut` (
  `id_attribut` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_categorie_attribut` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `atb_libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `atb_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `attribut`
--

TRUNCATE TABLE `attribut`;
--
-- Contenu de la table `attribut`
--

INSERT INTO `attribut` (`id_attribut`, `id_categorie_attribut`, `atb_libelle`, `atb_etat`) VALUES
('10cd1cdb-8c19-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Nom', 'ACTIF'),
('146fe80a-8c19-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Prenom', 'ACTIF'),
('1895fdd3-8c19-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Age', 'ACTIF'),
('1c6f9d01-8c19-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Genre', 'ACTIF'),
('4e1ba078-8c1a-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Régulé', 'ACTIF'),
('536b61c4-8c1a-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Cause', 'ACTIF'),
('5ccda8d1-8c1a-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Code Postal', 'ACTIF'),
('5ff41929-8c1a-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Ville', 'ACTIF'),
('6a8bfca2-8c1a-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Montant', 'ACTIF'),
('71a6d61a-8c1a-11e7-bc55-0011321fa613', '07dbe03c-8c19-11e7-bc55-0011321fa613', 'Modalité de règlement', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_attribut`
--

CREATE TABLE `categorie_attribut` (
  `id_categorie_attribut` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `cat_libelle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cat_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `categorie_attribut`
--

TRUNCATE TABLE `categorie_attribut`;
--
-- Contenu de la table `categorie_attribut`
--

INSERT INTO `categorie_attribut` (`id_categorie_attribut`, `cat_libelle`, `cat_etat`) VALUES
('07dbe03c-8c19-11e7-bc55-0011321fa613', 'Consultation', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id_consultation` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `id_medecin` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `cst_date_creation` datetime NOT NULL,
  `cst_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `cst_commentaire` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `consultation`
--

TRUNCATE TABLE `consultation`;
-- --------------------------------------------------------

--
-- Structure de la table `consultation_data`
--

CREATE TABLE `consultation_data` (
  `id_consultation_data` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_attribut` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `id_consultation` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `csd_valeur` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `csd_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `csd_link` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `csd_date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `consultation_data`
--

TRUNCATE TABLE `consultation_data`;
-- --------------------------------------------------------

--
-- Structure de la table `journee`
--

CREATE TABLE `journee` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `jou_date` date NOT NULL,
  `id_type_journee` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `journee`
--

TRUNCATE TABLE `journee`;
--
-- Contenu de la table `journee`
--

INSERT INTO `journee` (`id_journee`, `jou_date`, `id_type_journee`) VALUES
('8a17606e-8c27-11e7-bc55-0011321fa613', '2017-08-28', NULL),
('f262e342-8ced-11e7-bc55-0011321fa613', '2017-08-29', 'e2000a2f-8ced-11e7-bc55-0011321fa613');

-- --------------------------------------------------------

--
-- Structure de la table `journee_consultations`
--

CREATE TABLE `journee_consultations` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_consultation` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `journee_consultations`
--

TRUNCATE TABLE `journee_consultations`;
-- --------------------------------------------------------

--
-- Structure de la table `journee_medecins`
--

CREATE TABLE `journee_medecins` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_medecin` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `journee_medecins`
--

TRUNCATE TABLE `journee_medecins`;
--
-- Contenu de la table `journee_medecins`
--

INSERT INTO `journee_medecins` (`id_journee`, `id_medecin`) VALUES
('8a17606e-8c27-11e7-bc55-0011321fa613', 'a25f1a98-8c25-11e7-bc55-0011321fa613'),
('8a17606e-8c27-11e7-bc55-0011321fa613', 'baae3027-8c25-11e7-bc55-0011321fa613'),
('f262e342-8ced-11e7-bc55-0011321fa613', 'a25f1a98-8c25-11e7-bc55-0011321fa613'),
('f262e342-8ced-11e7-bc55-0011321fa613', 'baae3027-8c25-11e7-bc55-0011321fa613');

-- --------------------------------------------------------

--
-- Structure de la table `journee_secretaires`
--

CREATE TABLE `journee_secretaires` (
  `id_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `journee_secretaires`
--

TRUNCATE TABLE `journee_secretaires`;
--
-- Contenu de la table `journee_secretaires`
--

INSERT INTO `journee_secretaires` (`id_journee`, `id_utilisateur`) VALUES
('8a17606e-8c27-11e7-bc55-0011321fa613', '35098050-8c11-11e7-bc55-0011321fa613'),
('8a17606e-8c27-11e7-bc55-0011321fa613', '4ca6ad6b-8c10-11e7-bc55-0011321fa613'),
('f262e342-8ced-11e7-bc55-0011321fa613', '35098050-8c11-11e7-bc55-0011321fa613'),
('f262e342-8ced-11e7-bc55-0011321fa613', '4ca6ad6b-8c10-11e7-bc55-0011321fa613');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

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
  `prs_telephone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `medecin`
--

TRUNCATE TABLE `medecin`;
--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `med_rue`, `med_complement_adresse`, `med_code_postal`, `med_ville`, `med_etat`, `prs_nom`, `prs_nom_jeune_fille`, `prs_prenom`, `prs_telephone`) VALUES
('a25f1a98-8c25-11e7-bc55-0011321fa613', '55 rue de Saint Quentin', NULL, '76600', 'LE HAVRE', 'ACTIF', 'CAZAUX', NULL, 'Dominuqye', '0123456789'),
('baae3027-8c25-11e7-bc55-0011321fa613', 'rue inconnue', NULL, '76600', 'LE HAVRE', 'ACTIF', 'DUMESNIL', NULL, 'René', '0123456789');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `prs_nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_nom_jeune_fille` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prs_prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_telephone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `personne`
--

TRUNCATE TABLE `personne`;
--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `prs_nom`, `prs_nom_jeune_fille`, `prs_prenom`, `prs_telephone`, `type`) VALUES
('3facac1e-89e8-11e7-bc55-0011321fa613', 'LE GAUDION', 'MYLENE', 'Mylène', '0621757035', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `rol_libelle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rol_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `role`
--

TRUNCATE TABLE `role`;
--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_role`, `rol_libelle`, `rol_etat`) VALUES
('2da2b0f6-8c10-11e7-bc55-0011321fa613', 'ROLE_SECRETAIRE', 'ACTIF'),
('3834f378-8c10-11e7-bc55-0011321fa613', 'ROLE_ADMINISTRATION', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `type_journee`
--

CREATE TABLE `type_journee` (
  `id_type_journee` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `tpj_libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tpj_nb_secretaire` int(11) NOT NULL,
  `tpj_nb_medecin` int(11) NOT NULL,
  `tpj_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `type_journee`
--

TRUNCATE TABLE `type_journee`;
--
-- Contenu de la table `type_journee`
--

INSERT INTO `type_journee` (`id_type_journee`, `tpj_libelle`, `tpj_nb_secretaire`, `tpj_nb_medecin`, `tpj_etat`) VALUES
('9c7ab8a2-8ced-11e7-bc55-0011321fa613', 'JEP', 2, 2, 'ACTIF'),
('e2000a2f-8ced-11e7-bc55-0011321fa613', 'Samedi', 2, 2, 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `usr_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usr_etat` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `prs_nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_nom_jeune_fille` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prs_prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prs_telephone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `utilisateur`
--

TRUNCATE TABLE `utilisateur`;
--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `usr_email`, `usr_password`, `usr_etat`, `prs_nom`, `prs_nom_jeune_fille`, `prs_prenom`, `prs_telephone`) VALUES
('35098050-8c11-11e7-bc55-0011321fa613', 'sivelia@live.fr', 'mylene', 'ACTIF', 'LE GAUDION', NULL, 'Mylène', '0621757035'),
('4ca6ad6b-8c10-11e7-bc55-0011321fa613', 'lenaickchartrain@gmail.com', 'lenaick', 'ACTIF', 'CHARTRAIN', '', 'Lenaick', '0621757035');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_roles`
--

CREATE TABLE `utilisateurs_roles` (
  `id_utilisateur` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `id_role` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `utilisateurs_roles`
--

TRUNCATE TABLE `utilisateurs_roles`;
--
-- Contenu de la table `utilisateurs_roles`
--

INSERT INTO `utilisateurs_roles` (`id_utilisateur`, `id_role`) VALUES
('35098050-8c11-11e7-bc55-0011321fa613', '2da2b0f6-8c10-11e7-bc55-0011321fa613'),
('4ca6ad6b-8c10-11e7-bc55-0011321fa613', '3834f378-8c10-11e7-bc55-0011321fa613');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attribut`
--
ALTER TABLE `attribut`
  ADD PRIMARY KEY (`id_attribut`),
  ADD KEY `IDX_7AB8E85DC11D1B98` (`id_categorie_attribut`);

--
-- Index pour la table `categorie_attribut`
--
ALTER TABLE `categorie_attribut`
  ADD PRIMARY KEY (`id_categorie_attribut`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id_consultation`),
  ADD KEY `IDX_964685A650EAE44` (`id_utilisateur`),
  ADD KEY `IDX_964685A6C547FAB6` (`id_medecin`);

--
-- Index pour la table `consultation_data`
--
ALTER TABLE `consultation_data`
  ADD PRIMARY KEY (`id_consultation_data`),
  ADD KEY `IDX_863A73A92A6304C8` (`id_attribut`),
  ADD KEY `IDX_863A73A950EAE44` (`id_utilisateur`),
  ADD KEY `IDX_863A73A9B587F0D4` (`id_consultation`);

--
-- Index pour la table `journee`
--
ALTER TABLE `journee`
  ADD PRIMARY KEY (`id_journee`),
  ADD KEY `IDX_DC179AEDD7F7806A` (`id_type_journee`);

--
-- Index pour la table `journee_consultations`
--
ALTER TABLE `journee_consultations`
  ADD PRIMARY KEY (`id_journee`,`id_consultation`),
  ADD UNIQUE KEY `UNIQ_60DE4409B587F0D4` (`id_consultation`),
  ADD KEY `IDX_60DE440928A339D` (`id_journee`);

--
-- Index pour la table `journee_medecins`
--
ALTER TABLE `journee_medecins`
  ADD PRIMARY KEY (`id_journee`,`id_medecin`),
  ADD KEY `IDX_F56E872C28A339D` (`id_journee`),
  ADD KEY `IDX_F56E872CC547FAB6` (`id_medecin`);

--
-- Index pour la table `journee_secretaires`
--
ALTER TABLE `journee_secretaires`
  ADD PRIMARY KEY (`id_journee`,`id_utilisateur`),
  ADD KEY `IDX_19DE998928A339D` (`id_journee`),
  ADD KEY `IDX_19DE998950EAE44` (`id_utilisateur`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `type_journee`
--
ALTER TABLE `type_journee`
  ADD PRIMARY KEY (`id_type_journee`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateurs_roles`
--
ALTER TABLE `utilisateurs_roles`
  ADD PRIMARY KEY (`id_utilisateur`,`id_role`),
  ADD KEY `IDX_55B6AB3850EAE44` (`id_utilisateur`),
  ADD KEY `IDX_55B6AB38DC499668` (`id_role`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attribut`
--
ALTER TABLE `attribut`
  ADD CONSTRAINT `FK_7AB8E85DC11D1B98` FOREIGN KEY (`id_categorie_attribut`) REFERENCES `categorie_attribut` (`id_categorie_attribut`);

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `FK_964685A650EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `FK_964685A6C547FAB6` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`);

--
-- Contraintes pour la table `consultation_data`
--
ALTER TABLE `consultation_data`
  ADD CONSTRAINT `FK_863A73A92A6304C8` FOREIGN KEY (`id_attribut`) REFERENCES `attribut` (`id_attribut`),
  ADD CONSTRAINT `FK_863A73A950EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `FK_863A73A9B587F0D4` FOREIGN KEY (`id_consultation`) REFERENCES `consultation` (`id_consultation`);

--
-- Contraintes pour la table `journee`
--
ALTER TABLE `journee`
  ADD CONSTRAINT `FK_DC179AEDD7F7806A` FOREIGN KEY (`id_type_journee`) REFERENCES `type_journee` (`id_type_journee`);

--
-- Contraintes pour la table `journee_consultations`
--
ALTER TABLE `journee_consultations`
  ADD CONSTRAINT `FK_60DE440928A339D` FOREIGN KEY (`id_journee`) REFERENCES `journee` (`id_journee`),
  ADD CONSTRAINT `FK_60DE4409B587F0D4` FOREIGN KEY (`id_consultation`) REFERENCES `consultation` (`id_consultation`);

--
-- Contraintes pour la table `journee_medecins`
--
ALTER TABLE `journee_medecins`
  ADD CONSTRAINT `FK_F56E872C28A339D` FOREIGN KEY (`id_journee`) REFERENCES `journee` (`id_journee`),
  ADD CONSTRAINT `FK_F56E872CC547FAB6` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`);

--
-- Contraintes pour la table `journee_secretaires`
--
ALTER TABLE `journee_secretaires`
  ADD CONSTRAINT `FK_19DE998928A339D` FOREIGN KEY (`id_journee`) REFERENCES `journee` (`id_journee`),
  ADD CONSTRAINT `FK_19DE998950EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateurs_roles`
--
ALTER TABLE `utilisateurs_roles`
  ADD CONSTRAINT `FK_55B6AB3850EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `FK_55B6AB38DC499668` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
