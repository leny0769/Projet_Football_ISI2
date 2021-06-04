-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 25 avr. 2021 à 19:26
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Football`
--
CREATE DATABASE IF NOT EXISTS `Football` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Football`;

-- --------------------------------------------------------

--
-- Structure de la table `Avertissement`
--

CREATE TABLE `Avertissement` (
  `IDMatch` int(11) NOT NULL,
  `IDJoueur` int(11) NOT NULL,
  `IDCarton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Carton`
--

CREATE TABLE `Carton` (
  `IDCarton` int(11) NOT NULL,
  `Couleur` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Championnats`
--

CREATE TABLE `Championnats` (
  `IDSaison` int(11) NOT NULL,
  `IDChampionnat` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Format` varchar(50) DEFAULT NULL,
  `Clé` varchar(6) DEFAULT NULL,
  `IDPays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Championnats_Clubs`
--

CREATE TABLE `Championnats_Clubs` (
  `IDSaison` int(11) NOT NULL,
  `IDChampionnat` int(11) NOT NULL,
  `IDClub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Clubs`
--

CREATE TABLE `Clubs` (
  `IDClub` int(11) NOT NULL,
  `Clé` varchar(6) DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `NomComplet` varchar(100) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `SiteWeb` varchar(100) DEFAULT NULL,
  `DateFondation` varchar(10) DEFAULT NULL,
  `Couleur1` varchar(50) DEFAULT NULL,
  `Couleur2` varchar(50) DEFAULT NULL,
  `Couleur3` varchar(50) DEFAULT NULL,
  `Surnom1` varchar(50) DEFAULT NULL,
  `Surnom2` varchar(50) DEFAULT NULL,
  `Surnom3` varchar(50) DEFAULT NULL,
  `LogoURL` varchar(300) DEFAULT NULL,
  `IDStade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Joueurs`
--

CREATE TABLE `Joueurs` (
  `IDJoueur` int(11) NOT NULL,
  `Prénom` varchar(50) DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Poste` varchar(3) DEFAULT NULL,
  `PiedFort` varchar(10) DEFAULT NULL,
  `Taille` int(11) DEFAULT NULL,
  `Poids` int(11) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `VilleNaissance` varchar(50) DEFAULT NULL,
  `Nationalité` varchar(50) DEFAULT NULL,
  `PhotoURL` varchar(200) DEFAULT NULL,
  `TypeJoueur` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déclencheurs `Joueurs`
--
DELIMITER $$
CREATE TRIGGER `Create_Joueurs_Default` AFTER INSERT ON `Joueurs` FOR EACH ROW BEGIN
	IF (NEW.TypeJoueur = 'A') THEN
        INSERT INTO JoueursEnActivité VALUES (NEW.IDJoueur, NULL, NULL) ;
    ELSE
        INSERT INTO JoueursRetraite VALUES (NEW.IDJoueur, NULL) ;
    END IF ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `JoueursEnActivité`
--

CREATE TABLE `JoueursEnActivité` (
  `IDJoueur` int(11) NOT NULL,
  `Numéro` int(11) DEFAULT NULL,
  `IDClub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déclencheurs `JoueursEnActivité`
--
DELIMITER $$
CREATE TRIGGER `InsJoueursEnActivité` BEFORE INSERT ON `JoueursEnActivité` FOR EACH ROW BEGIN
	DECLARE nb Integer ;
    SELECT COUNT(*) INTO nb
    FROM JoueursRetraite JR
    WHERE JR.IDJoueur = NEW.IDJoueur ;
	IF (nb = 1) THEN
        SIGNAL SQLSTATE "45000"
        SET MESSAGE_TEXT = "Opération impossible car le joueur existe déja dans la table JoueursRetraite" ;
    END IF ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `JoueursRetraite`
--

CREATE TABLE `JoueursRetraite` (
  `IDJoueur` int(11) NOT NULL,
  `FinCarriere` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déclencheurs `JoueursRetraite`
--
DELIMITER $$
CREATE TRIGGER `InsJoueursRetraite` BEFORE INSERT ON `JoueursRetraite` FOR EACH ROW BEGIN
	DECLARE nb Integer ;
    SELECT COUNT(*) INTO nb
    FROM JoueursEnActivité JA
    WHERE JA.IDJoueur = NEW.IDJoueur ;
	IF (nb = 1) THEN
        SIGNAL SQLSTATE "45000"
        SET MESSAGE_TEXT = "Opération impossible car le joueur existe déja dans la table JoueursEnActivité" ;
    END IF ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Matchs`
--

CREATE TABLE `Matchs` (
  `IDMatch` int(11) NOT NULL,
  `DateMatch` varchar(50) DEFAULT NULL,
  `ButEquipeExterieur` int(11) DEFAULT NULL,
  `ButEquipeDomicile` varchar(50) DEFAULT NULL,
  `IDClubExterieur` int(11) NOT NULL,
  `IDClubDomicile` int(11) NOT NULL,
  `IDStade` int(11) NOT NULL,
  `IDSaison` int(11) NOT NULL,
  `IDChampionnat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déclencheurs `Matchs`
--
DELIMITER $$
CREATE TRIGGER `InsMatchs` BEFORE INSERT ON `Matchs` FOR EACH ROW BEGIN
	IF (NEW.IDClubDomicile = NEW.IDClubExterieur) THEN
        SIGNAL SQLSTATE "45000"
        SET MESSAGE_TEXT = "Opération impossible car le club à domicile ne peut pas être le même que le club à lexterieur";
    END IF ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Pays`
--

CREATE TABLE `Pays` (
  `IDPays` int(11) NOT NULL,
  `Clé` varchar(3) DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Saisons`
--

CREATE TABLE `Saisons` (
  `IDSaison` int(11) NOT NULL,
  `LibelléSaison` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Stades`
--

CREATE TABLE `Stades` (
  `IDStade` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Adresse` varchar(200) DEFAULT NULL,
  `Surnom1` varchar(100) DEFAULT NULL,
  `Surnom2` varchar(100) DEFAULT NULL,
  `Capacité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Stats_Joueurs`
--

CREATE TABLE `Stats_Joueurs` (
  `IDSaison` int(11) NOT NULL,
  `IDJoueur` int(11) NOT NULL,
  `NombreTitularisation` int(11) DEFAULT NULL,
  `NombreMatch` int(11) DEFAULT NULL,
  `Minutes` decimal(15,1) DEFAULT NULL,
  `Buts` int(11) DEFAULT NULL,
  `PassesDécisives` int(11) DEFAULT NULL,
  `TirsCadrés` decimal(15,2) DEFAULT NULL,
  `CartonJaune` decimal(15,2) DEFAULT NULL,
  `CartonRouge` decimal(15,2) DEFAULT NULL,
  `Centres` decimal(15,2) DEFAULT NULL,
  `TaclesReussis` decimal(15,2) DEFAULT NULL,
  `Interceptions` decimal(15,2) DEFAULT NULL,
  `ButCSC` int(11) DEFAULT NULL,
  `Fautes` decimal(15,2) DEFAULT NULL,
  `HorsJeu` decimal(15,2) DEFAULT NULL,
  `Passes` decimal(15,2) DEFAULT NULL,
  `PassesReussis` decimal(15,2) DEFAULT NULL,
  `CornersGagnés` decimal(15,2) DEFAULT NULL,
  `TirsBloqués` decimal(15,2) DEFAULT NULL,
  `Touches` decimal(15,2) DEFAULT NULL,
  `ArretsGardien` decimal(15,2) DEFAULT NULL,
  `ButsEncaissésGardien` int(11) DEFAULT NULL,
  `CleanSheetsGardien` int(11) DEFAULT NULL,
  `PenaltyMarqué` decimal(15,2) DEFAULT NULL,
  `PenaltyManqué` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Avertissement`
--
ALTER TABLE `Avertissement`
  ADD PRIMARY KEY (`IDMatch`,`IDJoueur`,`IDCarton`),
  ADD KEY `IDCarton` (`IDCarton`),
  ADD KEY `avertissement_ibfk_2` (`IDJoueur`);

--
-- Index pour la table `Carton`
--
ALTER TABLE `Carton`
  ADD PRIMARY KEY (`IDCarton`);

--
-- Index pour la table `Championnats`
--
ALTER TABLE `Championnats`
  ADD PRIMARY KEY (`IDSaison`,`IDChampionnat`),
  ADD KEY `IDPays` (`IDPays`);

--
-- Index pour la table `Championnats_Clubs`
--
ALTER TABLE `Championnats_Clubs`
  ADD PRIMARY KEY (`IDSaison`,`IDChampionnat`,`IDClub`),
  ADD KEY `IDClub` (`IDClub`);

--
-- Index pour la table `Clubs`
--
ALTER TABLE `Clubs`
  ADD PRIMARY KEY (`IDClub`),
  ADD KEY `IDStade` (`IDStade`);

--
-- Index pour la table `Joueurs`
--
ALTER TABLE `Joueurs`
  ADD PRIMARY KEY (`IDJoueur`);

--
-- Index pour la table `JoueursEnActivité`
--
ALTER TABLE `JoueursEnActivité`
  ADD PRIMARY KEY (`IDJoueur`),
  ADD KEY `IDClub` (`IDClub`),
  ADD KEY `IDJoueur` (`IDJoueur`);

--
-- Index pour la table `JoueursRetraite`
--
ALTER TABLE `JoueursRetraite`
  ADD PRIMARY KEY (`IDJoueur`);

--
-- Index pour la table `Matchs`
--
ALTER TABLE `Matchs`
  ADD PRIMARY KEY (`IDMatch`),
  ADD KEY `IDClubExterieur` (`IDClubExterieur`),
  ADD KEY `IDClubDomicile` (`IDClubDomicile`),
  ADD KEY `IDStade` (`IDStade`),
  ADD KEY `IDSaison` (`IDSaison`,`IDChampionnat`);

--
-- Index pour la table `Pays`
--
ALTER TABLE `Pays`
  ADD PRIMARY KEY (`IDPays`);

--
-- Index pour la table `Saisons`
--
ALTER TABLE `Saisons`
  ADD PRIMARY KEY (`IDSaison`);

--
-- Index pour la table `Stades`
--
ALTER TABLE `Stades`
  ADD PRIMARY KEY (`IDStade`);

--
-- Index pour la table `Stats_Joueurs`
--
ALTER TABLE `Stats_Joueurs`
  ADD PRIMARY KEY (`IDSaison`,`IDJoueur`),
  ADD KEY `IDJoueur` (`IDJoueur`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Avertissement`
--
ALTER TABLE `Avertissement`
  ADD CONSTRAINT `avertissement_ibfk_1` FOREIGN KEY (`IDMatch`) REFERENCES `Matchs` (`IDMatch`),
  ADD CONSTRAINT `avertissement_ibfk_2` FOREIGN KEY (`IDJoueur`) REFERENCES `JoueursEnActivité` (`IDJoueur`),
  ADD CONSTRAINT `avertissement_ibfk_3` FOREIGN KEY (`IDCarton`) REFERENCES `Carton` (`IDCarton`);

--
-- Contraintes pour la table `Championnats`
--
ALTER TABLE `Championnats`
  ADD CONSTRAINT `championnats_ibfk_1` FOREIGN KEY (`IDSaison`) REFERENCES `Saisons` (`IDSaison`),
  ADD CONSTRAINT `championnats_ibfk_2` FOREIGN KEY (`IDPays`) REFERENCES `Pays` (`IDPays`);

--
-- Contraintes pour la table `Championnats_Clubs`
--
ALTER TABLE `Championnats_Clubs`
  ADD CONSTRAINT `championnats_clubs_ibfk_1` FOREIGN KEY (`IDSaison`,`IDChampionnat`) REFERENCES `Championnats` (`IDSaison`, `IDChampionnat`),
  ADD CONSTRAINT `championnats_clubs_ibfk_2` FOREIGN KEY (`IDClub`) REFERENCES `Clubs` (`IDClub`);

--
-- Contraintes pour la table `Clubs`
--
ALTER TABLE `Clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`IDStade`) REFERENCES `Stades` (`IDStade`);

--
-- Contraintes pour la table `JoueursEnActivité`
--
ALTER TABLE `JoueursEnActivité`
  ADD CONSTRAINT `joueursenactivité_ibfk_1` FOREIGN KEY (`IDJoueur`) REFERENCES `Joueurs` (`IDJoueur`),
  ADD CONSTRAINT `joueursenactivité_ibfk_2` FOREIGN KEY (`IDClub`) REFERENCES `Clubs` (`IDClub`);

--
-- Contraintes pour la table `JoueursRetraite`
--
ALTER TABLE `JoueursRetraite`
  ADD CONSTRAINT `joueursretraite_ibfk_1` FOREIGN KEY (`IDJoueur`) REFERENCES `Joueurs` (`IDJoueur`);

--
-- Contraintes pour la table `Matchs`
--
ALTER TABLE `Matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`IDClubExterieur`) REFERENCES `Clubs` (`IDClub`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`IDClubDomicile`) REFERENCES `Clubs` (`IDClub`),
  ADD CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`IDStade`) REFERENCES `Stades` (`IDStade`),
  ADD CONSTRAINT `matchs_ibfk_4` FOREIGN KEY (`IDSaison`,`IDChampionnat`) REFERENCES `Championnats` (`IDSaison`, `IDChampionnat`);

--
-- Contraintes pour la table `Stats_Joueurs`
--
ALTER TABLE `Stats_Joueurs`
  ADD CONSTRAINT `stats_joueurs_ibfk_1` FOREIGN KEY (`IDSaison`) REFERENCES `Saisons` (`IDSaison`),
  ADD CONSTRAINT `stats_joueurs_ibfk_2` FOREIGN KEY (`IDJoueur`) REFERENCES `JoueursEnActivité` (`IDJoueur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
