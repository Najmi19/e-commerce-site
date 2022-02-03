-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 mai 2021 à 08:52
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


INSERT INTO `articles` (`Id_article`, `categorie`, `description`, `illustration`, `prix`, `nom_article`) VALUES
(1, 'sac', 'Sac Ã  main fermeture Ã  rabat avec anse rigide effet croco en simili cuir.\r\nPrÃ©sence d\'une bandouliÃ¨re amovible.\r\nL\'intÃ©rieur est muni d\'une pochette centrale.', 'img/sacs/1.jpg', 45, 'sac Ã  main rouge croco verni avec fermeture Ã  rabat'),
(2, 'sac', 'Sac style pochette XXL en simili cuir froncÃ©.\r\nChaÃ®ne Ã  maillons oversize pour portÃ© main.\r\nAnse en simili cuir amovible et ajustable pour le portÃ© Ã©paule.\r\nOuverture clip sur le dessus.\r\nIntÃ©rieur en tissu.', 'img/sacs/2.jpg', 55, 'Sac froncÃ© vert clair avec chaÃ®ne Ã  maillons oversize'),
(3, 'sac', 'Sac bandouliÃ¨re en similicuir.\r\nRabat avec fermoir cercle dorÃ©. \r\nIntÃ©rieur avec une pochette Ã  zip et 2 compartiments.\r\nPrÃ©sence d\'une bandouliÃ¨re Ã  chaÃ®ne.', 'img/sacs/3.jpg', 60, 'Sac en bandouliÃ¨re vert clair avec fermeture Ã  rabat'),
(101, 'robe', 'PossÃ¨de des empiÃ¨cements crochets et des fronces sur le buste\r\nModÃ¨le volantÃ© sur les Ã©paules et sur la bas de la robe. \r\nSe ferme Ã  l\'aide d\'un noeud au dos.\r\nPrÃ©sence d\'une doublure.', 'img/robes/1.jpg', 45, 'Robe blanche Ã  volants et Ã  noeud dans le dos'),
(102, 'robe', 'Robe fluide Ã  bretelles rÃ©glables. \r\nModÃ¨le col V avec petits boutons dÃ©coratifs. \r\nPrÃ©sence d\'un volant en bas de la robe. \r\nDotÃ©e d\'une ceinture Ã  nouer. \r\nDos smockÃ©', 'img/robes/2.jpg', 120, 'Robe beige ceinturÃ©e Ã  volant'),
(103, 'robe', 'Robe longue Ã  motif fleuri.', 'img/robes/3.jpg', 25, 'Robe longue noire Ã  bretelles et imprimÃ© fleuri'),
(201, 'veste', ':Veste perfecto en simili cuir Ã  col revers. \r\nÃ‰paules matelassÃ©es et fermeture Ã  glissiÃ¨re sur le devant. \r\nPrÃ©sence de 2 poches Ã  zips. \r\nDoublure satinÃ©e.', 'img/vestes/1.jpg', 65, 'Perfecto beige en simili cuir'),
(202, 'veste', 'Bomber fluide Ã  imprimÃ© fleurs peintes.  \r\nCol, base et poignets en maille cÃ´telÃ©e.  \r\nFermeture par zip.  \r\nMatiÃ¨re lÃ©gÃ¨re.', 'img/vestes/2.jpg', 33, 'Bomber fluide rose Ã  fleurs &quot;aquarelles&quot;'),
(203, 'veste', 'Veste blazer croisÃ©e en tweed motif pied de poule.\r\nDeux poches dÃ©coratives et col Ã  revers.\r\nFermeture Ã  boutons.', 'img/vestes/3.jpg', 85, 'Blazer croisÃ© parme en tweed motif pied de poule'),
(204, 'veste', 'Trench mi-long Ã  manches longues.\r\nCeinture Ã  nouer Ã  la taille avec passants.\r\nSe ferme Ã  l\'aide de boutons.\r\nDotÃ© de deux poches latÃ©rales.\r\nDoublure intÃ©rieure satinÃ©e.', 'img/vestes/4.jpg', 36, 'Trench mi-long noir');

-