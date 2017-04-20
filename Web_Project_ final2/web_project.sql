-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Avril 2017 à 20:25
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `idAct` int(11) NOT NULL,
  `actName` varchar(255) NOT NULL,
  `actLocation` varchar(255) NOT NULL,
  `actPrice` int(11) DEFAULT NULL,
  `actDate` date NOT NULL,
  `actDisponibility` int(11) DEFAULT NULL,
  `Vote` int(11) NOT NULL,
  `actTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activities`
--

INSERT INTO `activities` (`idAct`, `actName`, `actLocation`, `actPrice`, `actDate`, `actDisponibility`, `Vote`, `actTime`) VALUES
(1, 'Laser Game', 'Saran', 5, '2017-04-24', 20, 0, '17:00:00'),
(2, 'Course à pied', 'Orléans', NULL, '2017-04-23', NULL, 0, '09:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `cart_product`
--

CREATE TABLE `cart_product` (
  `idcart` int(11) NOT NULL,
  `cartName` varchar(255) NOT NULL,
  `cartProdPrice` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `Com` varchar(255) NOT NULL,
  `idPics` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`idComment`, `Com`, `idPics`, `idUser`) VALUES
(1, 'Cool', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `idPics` int(11) NOT NULL,
  `picUrl` varchar(255) NOT NULL,
  `datePic` date NOT NULL,
  `likePic` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idAct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `gallery`
--

INSERT INTO `gallery` (`idPics`, `picUrl`, `datePic`, `likePic`, `idUser`, `idAct`) VALUES
(1, 'http://www.hostingpics.net/thumbs/49/37/60/mini_493760running.jpg', '2017-04-13', 1, 1, 1),
(2, 'http://www.hostingpics.net/thumbs/54/86/24/mini_548624lasergame.jpg', '2017-04-18', NULL, 1, 1),
(3, 'http://www.hostingpics.net/thumbs/19/67/98/mini_196798peche.jpg', '2017-04-29', NULL, 1, 2),
(4, 'http://www.hostingpics.net/thumbs/49/37/60/mini_493760running.jpg', '2017-05-07', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Size` varchar(25) DEFAULT NULL,
  `prodPic` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`idProduct`, `Name`, `prodPrice`, `Amount`, `Size`, `prodPic`, `Category`) VALUES
(1, 'Mug superman', 5, 200, 'NULL', '..\\Images\\mug.png', 'Mug'),
(2, 'Hoodie bde', 20, 200, 'S', '..\\Images\\hoodie.png', 'Hoodie'),
(3, 'Keychain bde', 1, 200, 'NULL', '..\\Images\\keychain.jpg', 'Keychain'),
(4, 'Tshirt bde', 20, 200, 'S', '..\\Images\\tshirt.jpg', 'Tshirt');

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

CREATE TABLE `purchase` (
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `idPurchase` int(11) NOT NULL,
  `Buyer` varchar(255) NOT NULL,
  `dateOfPurchase` date NOT NULL,
  `product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

CREATE TABLE `subscribe` (
  `idAct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `ProfilePic` varchar(255) DEFAULT NULL,
  `Studies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `Password`, `Lastname`, `Firstname`, `Mail`, `Status`, `ProfilePic`, `Studies`) VALUES
(1, '$2y$10$CdDlBFo0nFKYvAtxGdgmX.esVkak77ZeqzZVwzTRIM7Y7KAQp4f3O', 'Pelaud', 'Nicolas', 'nicolas@gmail.com', 1, '../Images/oui.jpg', 'EXIA'),
(2, '$2y$10$n0eTjJazHR8ceN5UDRewm.m5MgkpizW.vUMcIQxW1lZLZl3uiVLse', 'Mussard', 'William', 'william@gmail.com', 0, 'https://yt3.ggpht.com/-acer29DJUx4/AAAAAAAAAAI/AAAAAAAAAAA/-XSXYKlm24c/s900-c-k-no-mo-rj-c0xffffff/photo.jpg', 'RH');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`idAct`);

--
-- Index pour la table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`idcart`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `FK_Comment_idPics` (`idPics`),
  ADD KEY `FK_Comment_idUser` (`idUser`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idPics`),
  ADD KEY `FK_Gallery_idUser` (`idUser`),
  ADD KEY `FK_Gallery_idAct` (`idAct`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`);

--
-- Index pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`idUser`,`idProduct`),
  ADD KEY `FK_purchase_idProduct` (`idProduct`);

--
-- Index pour la table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`idPurchase`);

--
-- Index pour la table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`idAct`,`idUser`),
  ADD KEY `FK_subscribe_idUser` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `idAct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idPics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `idPurchase` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_Comment_idPics` FOREIGN KEY (`idPics`) REFERENCES `gallery` (`idPics`),
  ADD CONSTRAINT `FK_Comment_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `FK_Gallery_idAct` FOREIGN KEY (`idAct`) REFERENCES `activities` (`idAct`),
  ADD CONSTRAINT `FK_Gallery_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `FK_purchase_idProduct` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`),
  ADD CONSTRAINT `FK_purchase_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `FK_subscribe_idAct` FOREIGN KEY (`idAct`) REFERENCES `activities` (`idAct`),
  ADD CONSTRAINT `FK_subscribe_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
