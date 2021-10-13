-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 mai 2020 à 00:20
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testminiprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Admin` int(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID`, `Login`, `Password`, `Nom`, `Prenom`, `Admin`) VALUES
(1, 'admin', 'admin', 'Ennaffati', 'Hamza', 1),
(2, 'mouad10', 'mouad10', 'El Allaly', 'Mouad', 0),
(55, 'ismail05', 'ismail100', 'moatadid', 'ismail', 0),
(56, 'Raouzi16', '123', 'Raouzi', 'Hamza', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `NumCmd` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(100) NOT NULL,
  `IdClient` int(11) NOT NULL,
  PRIMARY KEY (`NumCmd`),
  KEY `fk_idclt` (`IdClient`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NumCmd`, `Date`, `IdClient`) VALUES
(1, 'May 18, 2020, 12:03 pm', 1),
(2, 'May 18, 2020, 12:06 pm', 2),
(4, 'May 18, 2020, 12:08 pm', 1),
(5, 'May 18, 2020, 12:10 pm', 56),
(6, 'May 18, 2020, 1:46 pm', 1),
(7, 'May 18, 2020, 5:40 pm', 2);

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

DROP TABLE IF EXISTS `lignedecommande`;
CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `RefProd` int(11) NOT NULL,
  `NumCmd` int(11) NOT NULL,
  `Quantite` int(100) NOT NULL,
  KEY `fk_numcmd` (`NumCmd`),
  KEY `fk_Refprod` (`RefProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `Reference` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(100) NOT NULL,
  `Categorie` varchar(100) NOT NULL,
  `Prix` int(100) NOT NULL,
  `Marque` varchar(100) NOT NULL,
  `Couleur` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`Reference`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`Reference`, `Designation`, `Categorie`, `Prix`, `Marque`, `Couleur`, `Image`) VALUES
(1, 'Samsung Galaxy A51', 'Telephone', 2968, 'Samsung', 'Noir', 'img\\samsung galaxy A51.jpg'),
(2, 'galaxy S20', 'Telephone', 8870, 'Samsung', 'Bleu', 'img\\galaxy S20.jpg'),
(3, 'samsung galaxy s20+', 'Telephone', 9790, 'Samsung', 'Bleu', 'img\\samsung galaxy s20+'),
(4, 'samsung galaxy A30s', 'Telephone', 2080, 'Samsung', 'Vert', 'img\\samsung galaxy A30s.jpg'),
(5, 'XIAOMI Redmi Note 9S', 'Telephone', 2550, 'Xiaomi', 'Bleu', 'img\\XIAOMI Redmi Note 9S.jpg'),
(6, 'Apple IPhone 6S 16 Go', 'Telephone', 6399, 'Apple', 'Gris', 'img\\Apple IPhone 6S 16 Go.jpg'),
(7, 'Apple iPhone XS 256 Go', 'Telephone', 12800, 'Apple', 'Noir', 'img\\Apple iPhone XS 256 Go.jpg'),
(8, 'Apple iPhone XR', 'Telephone', 6499, 'Apple', 'Noir', 'img\\Apple iPhone XR.jpg'),
(9, 'Apple iPhone 8', 'Telephone', 4590, 'Apple', 'Blanc', 'img\\Apple iPhone 8.jpg'),
(10, 'Apple Iphone Xs Gold 64Go', 'Telephone', 9296, 'Apple', 'Gold', 'img\\Apple Iphone Xs Gold 64Go.jpg'),
(11, 'Apple iPhone 11', 'Telephone', 9490, 'Apple', 'Rouge', 'img\\Apple iPhone 11.jpg'),
(12, 'Apple PHONEIX IPHONE 8 PLUS 64GB', 'Telephone', 6490, 'Apple', 'Noir', 'img\\Apple PHONEIX IPHONE 8 PLUS 64GB.jpg'),
(13, 'Oppo A5s', 'Telephone', 1499, 'Oppo', 'Bleu', 'img\\Oppo A5s.jpg'),
(14, 'Oppo F7 ', 'Telephone', 3599, 'Oppo', 'Rouge', 'img\\Oppo F7.jpg'),
(15, 'Oppo F11 Pro', 'Telephone', 3799, 'Oppo', 'Noir', 'img\\Oppo F11 Pro.jpg'),
(16, 'Oppo F11', 'Telephone', 3399, 'Oppo', 'Vert', 'img\\Oppo F11.jpg'),
(17, 'Oppo F5 Youth', 'Telephone', 2899, 'Oppo', 'Gold', 'img\\Oppo F5 Youth.jpg'),
(18, 'Oppo F3', 'Telephone', 3199, 'Oppo', 'Noir', 'img\\Oppo F3.jpg'),
(19, 'Infinix Smart 4', 'Telephone', 1199, 'Infinix', 'Bleu', 'img\\Infinix Smart 4.jpg'),
(20, 'Infinix Hot 8', 'Telephone', 1599, 'Infinix', 'Noir', 'img\\Infinix Hot 8.jpg'),
(21, 'Infinix S5 128Go + 6RAM', 'Telephone', 2150, 'Infinix', 'Bleu', 'img\\Infinix S5 128Go + 6RAM.jpg'),
(22, 'Infinix S5 64Go+4RAM', 'Telephone', 1890, 'Infinix', 'Noir', 'img\\Infinix S5 64Go+4RAM.jpg'),
(23, 'Infinix S4B', 'Telephone', 1900, 'Infinix', 'Bleu', 'img\\Infinix S4B.jpg'),
(24, 'XIAOMI Redmi Note 9S Blanc', 'Telephone', 2550, 'Xiaomi', 'Blanc', 'img\\XIAOMI Redmi Note 9S Blanc.jpg'),
(25, 'XIAOMI Redmi Note 8', 'Telephone', 1999, 'Xiaomi', 'Bleu', 'img\\XIAOMI Redmi Note 8.jpg'),
(26, 'XIAOMI Redmi Note 8 Pro', 'Telephone', 2970, 'Xiaomi', 'Bleu', 'img\\XIAOMI Redmi Note 8 Pro.jpg'),
(27, 'XIAOMI Redmi 8', 'Telephone', 1769, 'Xiaomi', 'Rouge', 'img\\XIAOMI Redmi 8.jpg'),
(28, 'Revolution TV 50p Smart 4K', 'Tv', 3429, 'Revolution', 'Noir', 'img\\Revolution TV 50p Smart 4K.jpg'),
(29, 'Revolution TV LED 43\" Full HD', 'Tv', 2743, 'Revolution', 'Noir', 'img\\Revolution TV LED 43p Full HD.jpg'),
(30, 'Revolution Smart TV 32p', 'Tv', 1599, 'Revolution', 'Noir', 'img\\Revolution Smart TV 32p.jpg'),
(31, 'Revolution TV 39p Slim HD Smart', 'Tv', 1999, 'Revolution', 'Noir', 'img\\Revolution TV 39p Slim HD Smart.jpg'),
(32, 'Revolution TV LED 55p Smart', 'Tv', 4199, 'Revolution', 'Noir', 'img\\Revolution TV LED 55p Smart.jpg'),
(33, 'Revolution LED 32', 'Tv', 1249, 'Revolution', 'Noir', 'img\\Revolution LED 32.jpg'),
(34, 'Samsung 43p UHD 4K LED Smart TV', 'Tv', 3999, 'Samsung', 'Noir', 'img\\Samsung 43p UHD 4K LED Smart TV.jpg'),
(35, 'Samsung TV 32p LED Full HD', 'Tv', 1499, 'Samsung', 'Noir', 'img\\Samsung TV 32p LED Full HD.jpg'),
(36, 'Samsung 58p UHD 4K LED Smart TV', 'Tv', 6399, 'Samsung', 'Noir', 'img\\Samsung 58p UHD 4K LED Smart TV.jpg'),
(37, 'Samsung 55p UHD 4K LED Smart TV', 'Tv', 5999, 'Samsung', 'Noir', 'img\\Samsung 55p UHD 4K LED Smart TV.jpg'),
(38, 'Samsung 65p UHD 4K LED Smart TV', 'Tv', 8999, 'Samsung', 'Noir', 'img\\Samsung 65p UHD 4K LED Smart TV.jpg'),
(39, 'Samsung 65p 4K UHD QLED Smart TV', 'Tv', 25990, 'Samsung', 'Noir', 'img\\Samsung 65p 4K UHD QLED Smart TV.jpg'),
(40, 'Samsung 49p LED Full HD Smart TV', 'Tv', 3499, 'Samsung', 'Noir', 'img\\Samsung 49p LED Full HD Smart TV.jpg'),
(41, 'Samsung 70p UHD 4K LED Smart TV', 'Tv', 12990, 'Samsung', 'Noir', 'img\\Samsung 70p UHD 4K LED Smart TV.jpg'),
(42, 'Samsung 75p 4K UHD QLED Smart TV', 'Tv', 39990, 'Samsung', 'Noir', 'img\\Samsung 75p 4K UHD QLED Smart TV.jpg'),
(43, 'Hisense 32p FHD SMART TV', 'Tv', 1669, 'Hisense', 'Noir', 'img\\Hisense 32p FHD SMART TV.jpg'),
(44, 'Hisense 43p FHD SMART TV', 'Tv', 2699, 'Hisense', 'Noir', 'img\\Hisense 43p FHD SMART TV.jpg'),
(45, 'Hisense TV HISENSE H65A6140', 'Tv', 7290, 'Hisense', 'Noir', 'img\\Hisense TV HISENSE H65A6140.jpg'),
(46, 'Hisense 65p  4K UHD Smart TV', 'Tv', 7499, 'Hisense', 'Noir', 'img\\Hisense 65p  4K UHD Smart TV.jpg'),
(47, 'Hisense 43p FHD SMART TV + IPTV1 AN', 'Tv', 2949, 'Hisense', 'Noir', 'img\\Hisense 43p FHD SMART TV + IPTV1 AN.jpg'),
(48, 'Hisense TV 32p full hd SMART', 'Tv', 1875, 'Hisense', 'Noir', 'img\\Hisense TV 32p full hd SMART.jpg'),
(49, 'Visio TV LED Smart 50p UHD 4K', 'Tv', 3649, 'Visio', 'Noir', 'img\\Visio TV LED Smart 50p UHD 4K.jpg'),
(50, 'Visio SMART TV 32p ANDROID', 'Tv', 1699, 'Visio', 'Noir', 'img\\Visio SMART TV 32p ANDROID.jpg'),
(51, 'Visio TV 32p Pouces HD Led', 'Tv', 1379, 'Visio', 'Noir', 'img\\Visio TV 32p Pouces HD Led.jpg'),
(52, 'Visio TV 40p SMART', 'Tv', 2580, 'Visio', 'Noir', 'img\\Visio TV 40p SMART.jpg'),
(53, 'Philips 43p Full HD Ultra Slim LED TV', 'Tv', 3790, 'Philips', 'Noir', 'img\\Philips 43p Full HD Ultra Slim LED TV.jpg'),
(54, 'Philips 32p LED TV HD', 'Tv', 2290, 'Philips', 'Noir', 'img\\Philips 32p LED TV HD.jpg'),
(55, 'Philips 55p 4K Ultra HD Smart TV', 'Tv', 4690, 'Philips', 'Noir', 'img\\Philips 55p 4K Ultra HD Smart TV.jpg'),
(56, 'Philips 24p LED HD TV', 'Tv', 929, 'Philips', 'Noir', 'img\\Philips 24p LED HD TV.jpg'),
(57, 'Apple MacBook Pro i7 16Go', 'PC', 31000, 'Apple', 'Gris', 'img/Apple MacBook Pro i7 16Go.jpg'),
(59, 'Apple MacBook Pro i5 128Go', 'Pc', 19000, 'Apple', 'Noir', 'img/Apple MacBook Pro i5 128Go.jpg'),
(60, 'Apple Macbook Air 2018 i5 128Go', 'Pc', 15700, 'Apple', 'Gris', 'img/Apple Macbook Air 2018 i5 128Go.jpg'),
(61, 'Apple MacBook Air 13p Retina-2019', 'Pc', 19190, 'Apple', 'Gris', 'img/Apple MacBook Air 13p Retina-2019.jpg'),
(62, 'Apple MacBook Pro 16p', 'Pc', 39900, 'Apple', 'Gris', 'img/Apple MacBook Pro 16p.jpg'),
(63, 'Apple MacBook pro 2018 i7 16Go', 'Pc', 16500, 'Apple', 'Gris', 'img/Apple MacBook pro 2018 i7 16Go.jpg'),
(64, 'Apple Macbook Air 2018 13,3 i5 8Go', 'Pc', 16500, 'Apple', 'Gold', 'img/Apple Macbook Air 2018 13,3 i5 8Go.jpg'),
(65, 'Hp PC PORTABLE HP 250 G7  i3-7 4Go', 'Pc', 4300, 'Hp', 'Noir', 'img/Hp PC PORTABLE HP 250 G7  i3-7 4Go.jpg'),
(66, 'Hp PC PORTABLE PROBOOK i5 8Go', 'Pc', 5500, 'Hp', 'Gris', 'img/Hp PC PORTABLE PROBOOK i5 8Go.jpg'),
(67, 'Hp PC PORTABLE i5 4Go', 'Pc', 7290, 'Hp', 'Gris', 'img/Hp PC PORTABLE i5 4Go.jpg'),
(68, 'Hp PC PORTABLE HP i5 4Go', 'Pc', 5990, 'Hp', 'Gris', 'img/Hp PC PORTABLE HP i5 4Go.jpg'),
(69, 'Hp PC PORTABLE 820 G3 I5 4Go', 'Pc', 3199, 'Hp', 'Gris', 'img/Hp PC PORTABLE 820 G3 I5 4Go.jpg'),
(70, 'Hp Pc Portable Zbook 15 G1 i7 8Go', 'Pc', 7000, 'Hp', 'Noir', 'img/Hp Pc Portable Zbook 15 G1 i7 8Go.jpg'),
(71, 'Lenovo PC Portable IdeaPad 130 i3', 'Pc', 3890, 'Lenovo', 'Noir', 'img/Lenovo PC Portable IdeaPad 130 i3.jpg'),
(72, 'Lenovo PC Portable IP130 i3', 'Pc', 3800, 'Lenovo', 'Noir', 'img/Lenovo PC Portable IP130 i3.jpg'),
(73, 'Lenovo PC PORTABLE X240 i5', 'Pc', 2400, 'Lenovo', 'Noir', 'img/Lenovo PC PORTABLE X240 i5.jpg'),
(74, 'Lenovo Lenovo IdeaPad 100 i5', 'Pc', 4999, 'Lenovo', 'Noir', 'img/Lenovo Lenovo IdeaPad 100 i5.jpg'),
(75, 'Lenovo PC PORTABLE IDEAPAD 330 i5', 'Pc', 4390, 'Lenovo', 'Gris', 'img/Lenovo PC PORTABLE IDEAPAD 330 i5.jpg'),
(76, 'Lenovo PC PORTABLE IdeaPad 330 i3', 'Pc', 2785, 'Lenovo', 'Gris', 'img/Lenovo PC PORTABLE IdeaPad 330 i3.jpg'),
(77, 'Lenovo PC Portable Idea Pad 330 i3', 'Pc', 2999, 'Lenovo', 'Noir', 'img/Lenovo PC Portable Idea Pad 330 i3.jpg'),
(78, 'PC PORTABLE LENOVO IDEAPAD130 i3', 'Pc', 4100, 'Lenovo', 'Noir', 'img/PC PORTABLE LENOVO IDEAPAD130 i3.jpg'),
(79, 'DELL Precision 5540 i7 32Go', 'Pc', 25690, 'Dell', 'Noir', 'img/DELL Precision 5540 i7 32Go.jpg'),
(80, 'DELL Precision M4800 i7 32Go', 'Pc', 6200, 'Dell', 'Noir', 'img/DELL Precision M4800 i7 32Go.jpg'),
(81, 'Toshiba 6eme generation i5 8Go', 'Pc', 3499, 'Toshiba', 'Gris', 'img/Toshiba 6eme generation i5 8Go.jpg'),
(82, 'Toshiba 14p Tecra Z40 i5 4Go', 'Pc', 2899, 'Toshiba', 'Gris', 'img/Toshiba 14p Tecra Z40 i5 4Go.jpg'),
(83, 'Toshiba SATELLITE PRO A50 i5', 'Pc', 7139, 'Toshiba', 'Noir', 'img/Toshiba SATELLITE PRO A50 i5.jpg'),
(84, 'Toshiba Pc portable i5 4Go', 'Pc', 2736, 'Toshiba', 'Gris', 'img/Toshiba Pc portable i5 4Go.jpg'),
(85, 'Asus PC PORTABLE S512FB i7 8Go', 'Pc', 11900, 'Asus', 'Rouge', 'img/Asus PC PORTABLE S512FB i7 8Go.jpg'),
(86, 'Asus Pc portable X705U 17p i3 4Go', 'Pc', 3799, 'Asus', 'Noir', 'img/Asus Pc portable X705U 17p i3 4Go.jpg'),
(87, 'Asus PC portable UX333FLC i7 8Go', 'Pc', 13999, 'Asus', 'Noir', 'img/Asus PC portable UX333FLC i7 8Go.jpg'),
(88, 'Asus E203MAH i5 4Go', 'Pc', 4369, 'Asus', 'Gold', 'img/Asus E203MAH i5 4Go.jpg'),
(89, 'Asus Notebook X553MA i3 2Go', 'Pc', 3324, 'Asus', 'Noir', 'img/Asus Notebook X553MA i3 2Go.jpg'),
(90, 'Asus PC Portable i3 4Go', 'Pc', 4190, 'Asus', 'Blanc', 'img/Asus PC Portable i3 4Go.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_idclt` FOREIGN KEY (`IdClient`) REFERENCES `client` (`ID`);

--
-- Contraintes pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD CONSTRAINT `fk_Refprod` FOREIGN KEY (`RefProd`) REFERENCES `produit` (`Reference`),
  ADD CONSTRAINT `fk_numcmd` FOREIGN KEY (`NumCmd`) REFERENCES `commande` (`NumCmd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
