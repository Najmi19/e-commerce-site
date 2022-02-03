-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 08 mai 2021 à 18:49
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `Id_article` int(11) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `description` text DEFAULT NULL,
  `illustration` varchar(30) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `nom_article` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_article`),
  KEY `categorie` (`categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`Id_article`, `categorie`, `description`, `illustration`, `prix`, `nom_article`) VALUES
(1, 'robe', 'Une robe toute belle', 'img/robes/2.jpg', 220, 'robe blanche'),
(2, 'sac', 'Un très beau sac', 'img/sacs/1.jpg', 120, 'sac rouge'),
(3, 'veste', 'Une belle, très belle veste', 'img/vestes/2.jpg', 321, 'veste kaki');

-- --------------------------------------------------------

--
-- Structure de la table `cartebancaire`
--

DROP TABLE IF EXISTS `cartebancaire`;
CREATE TABLE IF NOT EXISTS `cartebancaire` (
  `n_carte` varchar(16) NOT NULL,
  `Date_validite` date NOT NULL,
  `num_secret` int(3) NOT NULL,
  `nom_owner` varchar(20) NOT NULL,
  `Id_user` varchar(11) NOT NULL,
  PRIMARY KEY (`n_carte`),
  KEY `Id_user` (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id_article` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `Ptt` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  PRIMARY KEY (`Id_article`,`id_user`) USING BTREE,
  KEY `Id_user_cmd` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id_role` int(11) NOT NULL,
  `Role` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id_role`, `Role`) VALUES
(0, 'administrateur'),
(1, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `sexe` char(1) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sexe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`sexe`, `description`) VALUES
('e', 'enfant'),
('f', 'femme'),
('h', 'homme'),
('n', 'non-binaire');

-- --------------------------------------------------------

--
-- Structure de la table `typesdarticle`
--

DROP TABLE IF EXISTS `typesdarticle`;
CREATE TABLE IF NOT EXISTS `typesdarticle` (
  `type_article` varchar(30) NOT NULL,
  PRIMARY KEY (`type_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typesdarticle`
--

INSERT INTO `typesdarticle` (`type_article`) VALUES
('robe'),
('sac'),
('veste');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_user` varchar(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naiss` date NOT NULL,
  `Id_Role` int(11) DEFAULT NULL,
  `mdp` varchar(60) NOT NULL,
  `sexe` char(1) DEFAULT NULL,
  `Adresse` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `Id_Role_user` (`Id_Role`),
  KEY `sexe` (`sexe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom`, `prenom`, `date_naiss`, `Id_Role`, `mdp`, `sexe`, `Adresse`, `email`, `telephone`) VALUES
('EdMak', 'Makon', 'Manyimma', '1997-02-26', 0, '$2y$10$7qGpD5nUb.h.nyHmChNHY.uDpDE0j8a0/1XJZX8/r0LBX4uedyjy6', 'h', '2 rue du baobab', 'nman@net.com', 782306485),
('Rodmor', 'Rodeo', 'Manor', '1996-02-22', 1, '$2y$10$PRxtIpvtBogMQdm1DS1ise7BiAMS09hEntFA5mvyl2LfoQ6m402Gq', 'h', '2 rue Akkra', 'dm@net.com', 782306485);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `categorie` FOREIGN KEY (`categorie`) REFERENCES `typesdarticle` (`type_article`);

--
-- Contraintes pour la table `cartebancaire`
--
ALTER TABLE `cartebancaire`
  ADD CONSTRAINT `Id_user` FOREIGN KEY (`Id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Id_user_cmd` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_article_cmd` FOREIGN KEY (`Id_article`) REFERENCES `articles` (`Id_article`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `Id_Role_user` FOREIGN KEY (`Id_Role`) REFERENCES `role` (`Id_role`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sexe` FOREIGN KEY (`sexe`) REFERENCES `sexe` (`sexe`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
