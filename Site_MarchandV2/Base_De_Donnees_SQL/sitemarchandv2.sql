-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 13 Décembre 2018 à 17:26
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sitemarchandv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(5) NOT NULL,
  `nomCategorie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(0, 'Chaussure'),
(1, 'Maillot'),
(2, 'Ballon');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(255) NOT NULL,
  `Nom_Client` varchar(50) NOT NULL,
  `Prenom_Client` varchar(50) NOT NULL,
  `Civilite_Client` varchar(255) NOT NULL,
  `Tel_Client` varchar(255) NOT NULL,
  `Email_Client` varchar(255) NOT NULL,
  `Motdepasse_Client` varchar(255) NOT NULL,
  `Anniversaire_Client` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(5) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` decimal(7,2) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `idCategorie` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `description`, `prix`, `photo`, `idCategorie`) VALUES
(0, 'Ballon Basket Wilson NCAA Taille 7', '50.00', 'ballon1', 2),
(1, 'Ballon Basket Molten FIBA Taille 6', '40.00', 'ballon2', 2),
(2, 'Ballon Basket Nike HyperElite Taille 7', '45.00', 'ballon3', 2),
(3, 'Ballon Basket Basique Taille 6', '10.00', 'ballon4', 2),
(4, 'Ballon Basket Spalding NBA Taille 6', '50.00', 'ballon5', 2),
(5, 'Ballon Basket Spalding TF-50 Taille 7', '55.00', 'ballon6', 2),
(6, 'Ballon Basket Spalding NBA Taille 7', '60.00', 'ballon7', 2),
(7, 'Ballon Basket Spalding TF-150 Taille 7', '60.00', 'ballon8', 2),
(8, 'Ballon Basket Nike Dominate Taille 7', '45.00', 'ballon9', 2),
(9, 'Ballon Basket Jordan Taille 7', '55.00', 'ballon10', 2),
(10, 'Chaussure Basket PG   ', '75.00', 'chaussure1', 0),
(11, 'Chaussure Basket CURRY 1', '85.00', 'chaussure2', 0),
(12, 'Chaussure Basket CURRY 2', '100.00', 'chaussure3', 0),
(13, 'Chaussure Basket HYPERDUNK', '60.00', 'chaussure4', 0),
(14, 'Chaussure Basket KD 1', '55.00', 'chaussure5', 0),
(15, 'Chaussure Basket KD 2', '60.00', 'chaussure6', 0),
(16, 'Chaussure Basket KD 3', '65.00', 'chaussure7', 0),
(17, 'Chaussure Basket KD 4', '70.00', 'chaussure8', 0),
(18, 'Chaussure Basket KOBE', '80.00', 'chaussure9', 0),
(19, 'Chaussure Basket KYRIE', '70.00', 'chaussure10', 0),
(20, 'Maillot Basket CARMELO ANTHONY', '70.00', 'joueur1', 1),
(21, 'Maillot Basket BRADLEY BEAL', '70.00', 'joueur2', 1),
(22, 'Maillot Basket VINCE CARTER', '70.00', 'joueur3', 1),
(23, 'Maillot Basket STEPHEN CURRY', '70.00', 'joueur4', 1),
(24, 'Maillot Basket ANTHONY DAVIS', '70.00', 'joueur5', 1),
(25, 'Maillot Basket JAMES HARDEN', '70.00', 'joueur6', 1),
(26, 'Maillot Basket LEBRON JAMES', '70.00', 'joueur7', 1),
(27, 'Maillot Basket KEVIN DURANT', '70.00', 'joueur8', 1),
(28, 'Maillot Basket KOBE BRYANT', '70.00', 'joueur9', 1),
(29, 'Maillot Basket PAUL PIERCE', '70.00', 'joueur10', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
