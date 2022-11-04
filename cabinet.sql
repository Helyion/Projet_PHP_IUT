-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 déc. 2021 à 15:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cabinet`
--

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `civilite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `civilite`) VALUES
(3, 'Med2', 'Med2', 'Homme'),
(5, 'Med5', 'Med5', 'Femme'),
(7, 'Med6', 'Med6', 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_usager` int(11) NOT NULL,
  `date_rdv` datetime NOT NULL,
  `duree` smallint(6) DEFAULT NULL,
  `id_medecin` int(11) NOT NULL,
  PRIMARY KEY (`id_usager`,`date_rdv`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_usager`, `date_rdv`, `duree`, `id_medecin`) VALUES
(8, '2021-12-15 08:47:27', 30, 3),
(11, '2021-12-23 16:03:00', 60, 3),
(14, '2021-08-03 12:00:00', 30, 5),
(13, '2021-12-02 09:00:00', 20, 7);

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `id_usager` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `civilite` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cdp` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `lieu_naiss` varchar(50) DEFAULT NULL,
  `num_secu` varchar(50) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usager`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`id_usager`, `nom`, `prenom`, `civilite`, `adresse`, `cdp`, `ville`, `lieu_naiss`, `num_secu`, `date_naiss`, `id_medecin`) VALUES
(8, 'Test1', 'Yes ca marche', 'Homme', 'rue le nÃ´tre', '121', 'Toulouse', 'Paris', '55555', '2021-12-03', NULL),
(13, 'Ajout1', 'Ajout1', 'Homme', '110 grande rue st mi', '111', 'Toulouse', 'Nice', '2213', '2021-12-26', NULL),
(12, 'Usager1', 'Usager1', 'Homme', 'rue de metz', '31400', 'Nice', 'Cestres', '111', '2021-12-16', NULL),
(11, 'Test2', 'Test2', 'Homme', 'Rue st michel', '1234', 'Toulouse', 'Nice', '9999', '2021-12-29', NULL),
(14, 'Dupont', 'Paul', 'Femme', '17 belle vue', '31400', 'Toulouse', 'Nice', '12345', '2021-12-06', NULL),
(15, 'Vieux', 'Vieux', 'Femme', '120 vieux ', '31400', 'Toulouse', 'Nice', '43253', '1932-12-13', NULL),
(16, 'Testid', 'Testid', 'Homme', '110 rue le nÃ´tre', '31400', 'Toulouse', 'Nice', '2121', '1989-12-05', 5),
(17, 'TestID2', 'TestID2', 'TestID2', '12', '123', 'tou', 'tou', '123', '2021-12-28', 6),
(18, 'Lol', 'lol', 'Femme', '110 rue metz', '3200', 'Toulouse', 'NIce', '4532', '2021-12-30', NULL),
(19, 'ID2', 'ID2', 'Femme', '12 rue de metz', '31400', 'Toulouse', 'Castres', '1111', '2021-12-30', 3),
(20, 'LOL', 'LOL', 'Homme', '120 rue de metz', '31200', 'TLS', 'ijd&quot;Ã©', '4343', '2021-11-15', NULL),
(21, 'Homme50', 'Homme50', 'Homme', '1222ijrfoh\'nov', '100', 'TT', 'TT', '222', '1893-02-01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `mdp`) VALUES
(2, 'Admin', '$2y$10$78/LxjSipaBYZARSw7IJBORUwFEFgcp7SzpTL02MYTn65lxp3dp2G');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
