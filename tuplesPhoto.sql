-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 04, 2021 at 07:18 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `p1911736`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categorie`
--

CREATE TABLE `Categorie` (
  `catId` int(11) NOT NULL,
  `nomCat` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Categorie`
--

INSERT INTO `Categorie` (`catId`, `nomCat`) VALUES
(1, 'Animaux'),
(2, 'Art'),
(3, 'Cuisine'),
(4, 'Sport'),
(5, 'Voyage');

-- --------------------------------------------------------

--
-- Table structure for table `Photo`
--

CREATE TABLE `Photo` (
  `photoId` int(11) NOT NULL,
  `nomFich` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 NOT NULL,
  `visible` varchar(3) NOT NULL,
  `catId` int(11) NOT NULL,
  `utilisateurId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Photo`
--

INSERT INTO `Photo` (`photoId`, `nomFich`, `description`, `visible`, `catId`, `utilisateurId`) VALUES
(1, 'foot.jpg', 'Photo de deux footballeurs qui essayent d\'attraper le ballon.', 'oui', 4, 1),
(2, 'rome.jpg', 'Photo du palais du Vatican à Rome.', 'oui', 5, 1),
(3, 'carbonara.jpg', 'Photo d\'un plat de pâtes à la carbonara.', 'oui', 3, 2),
(4, 'peinture.jpg', 'Photo d\'une peinture \"Nuit étoilée\" de Van Gogh.', 'oui', 2, 2),
(5, 'danse.jpg', 'Photo du sport nommé la danse.', 'oui', 4, 2),
(6, 'dessin.jpg', 'Photo d\'un dessin d\'une licorne.', 'oui', 2, 1),
(7, 'paris.jpg', 'Photo de la Tour Eiffel à Paris.', 'oui', 5, 2),
(8, 'cochon.jpg', 'Photo d\'un bébé cochon.', 'oui', 1, 1),
(9, 'burger.jpg', 'Photo d\'un burger américain.', 'oui', 3, 1),
(10, 'chaton.jpg', 'Photo d\'un chaton noir et blanc.', 'oui', 1, 1),
(11, 'chien.jpg', 'Photo d\'un labrador.', 'oui', 1, 2),
(12, 'lyon.jpg', 'Photo de la Tour de la Part-Dieu à Lyon (appelé le crayon).', 'oui', 5, 2),
(13, 'pixelart.jpg', 'Photo d\'un pixel art d\'une pokeball.', 'oui', 2, 1),
(14, 'gratin.jpg', 'Photo d\'un gratin de courgettes.', 'oui', 3, 2),
(15, 'basket.jpg', 'Photo de deux basketteuses qui se défient avec le ballon.', 'oui', 4, 2),
(16, 'paella.jpg', 'Photo d\'une paella traditionnelle.', 'oui', 3, 2),
(17, 'pouletBasquaise.jpg', 'Photo d\'un poulet basquaise traditionnel.', 'oui', 3, 1),
(18, 'lama.jpg', 'Photo d\'un lama vue de face.', 'oui', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `utilisateurId` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(36) NOT NULL,
  `etat` varchar(12) NOT NULL,
  `statut` varchar(11) NOT NULL,
  `temps_connexion` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`utilisateurId`, `pseudo`, `mdp`, `etat`, `statut`, `temps_connexion`) VALUES
(1, 'boran', '7682fe272099ea26efe39c890b33675b', 'déconnecté', 'admin', '1567865432'),
(2, 'lea', '7682fe272099ea26efe39c890b33675b', 'connecté', 'utilisateur', '1567865432');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `Photo`
--
ALTER TABLE `Photo`
  ADD PRIMARY KEY (`photoId`),
  ADD KEY `catId` (`catId`),
  ADD KEY `utilisateurId` (`utilisateurId`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`utilisateurId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Photo`
--
ALTER TABLE `Photo`
  MODIFY `photoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `utilisateurId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Photo`
--
ALTER TABLE `Photo`
  ADD CONSTRAINT `Photo_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `Categorie` (`catId`),
  ADD CONSTRAINT `utilisateurId` FOREIGN KEY (`utilisateurId`) REFERENCES `Utilisateur` (`utilisateurId`);