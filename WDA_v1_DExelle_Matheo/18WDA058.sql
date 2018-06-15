-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 07:46 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.16-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `18WDA058`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE IF NOT EXISTS `Address` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Street` varchar(40) NOT NULL,
  `Housenumber` int(20) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `isDeliveryAddress` tinyint(1) DEFAULT '0',
  `City` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`Id`, `Street`, `Housenumber`, `Country`, `isDeliveryAddress`, `City`) VALUES
(1, 'TestStraat', 1, 'België', 1, 'Teststad');

-- --------------------------------------------------------

--
-- Table structure for table `AddressUserId`
--

CREATE TABLE IF NOT EXISTS `AddressUserId` (
  `AddressId` int(20) NOT NULL,
  `UserId` int(20) NOT NULL,
  KEY `FK_AddressId` (`AddressId`),
  KEY `FK_UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AddressUserId`
--

INSERT INTO `AddressUserId` (`AddressId`, `UserId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Id`, `Name`) VALUES
(1, 'Keychain'),
(2, 'Figurine'),
(3, 'Movie'),
(4, 'Replica'),
(5, 'Collector');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(400) NOT NULL,
  `Pic` varchar(100) DEFAULT NULL,
  `Name` varchar(40) NOT NULL,
  `Price` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Id`, `Description`, `Pic`, `Name`, `Price`) VALUES
(1, 'Figurine of Izuku Midoriya from MHA. Izuku Midoriya, also known as Deku, is the main protagonist of My Hero Academia.\r\nThough born without a Quirk, \r\nhe manages to catch the attention of the legendary\r\n hero All Might and has since become his close pupil and a student at U.A. High School,\r\n making him the ninth user of the Quirk One For All.', 'images\\goodiesimg\\POPIzukuFigurine.png', 'POP Deku', 19.99),
(2, 'Figurine of Son Goku from Dragon Ball Z', 'images\\goodiesimg\\POPGokuFigurine.png', 'POP Son Goku', 19.99),
(3, 'Figurine of The Joker from Batman', 'images\\goodiesimg\\POPJokerFigurine.png', 'POP Joker', 15.99),
(4, '3rd Movie of the Dragon Ball Z saga', 'images\\goodiesimg\\DBZMovie1.png', 'DBZ Movie', 25),
(5, 'Real size replica of the capsule 1028 ', 'images\\goodiesimg\\CapsuleReplica.png', 'Capsule 1028 CE', 5.99),
(6, 'Vegeta and Goku SSJ keychains', 'images\\goodiesimg\\DBZGokuVegKeychains.png', 'DBZ Keychains', 7.99),
(7, '7 keychains representing Dragon Balls', 'images\\goodiesimg\\DBZBallsKeychains.png', 'Dragon Balls keychains', 15.99),
(8, 'Mini figurines of Goku Vegeta and Frieza', 'images\\goodiesimg\\DBZ3Figurines.png', 'Figurine set Dragon Ball Super', 23.99),
(9, 'Real life replica of the Portal Gun', 'images\\goodiesimg\\PortalGunReplica.png', 'Portal gun', 129.99),
(12, 'The Crowbar is an iconic melee weapon and the signature weapon of Gordon Freeman. It is the first weapon acquired in Half-Life, serving as a signature melee weapon and a tool for puzzles. The crowbar is also used as a tool for breaking open supply crates and clearing destructible obstacles. ', 'images/goodiesimg/CrowBarReplica.png', 'Crowbar Half Life', 87.99),
(83, 'Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father.', 'images\\goodiesimg\\GodOfWarCollector.png', 'God of War PS4 Collector', 124.99),
(84, 'Undertale is a role-playing video game created by American indie developer Toby Fox. In the game, players control a human child who has fallen into the Underground, a large, secluded region underneath the surface of the Earth, separated by a magic barrier', 'images/goodiesimg/UndertaleCollector.png', 'Undertale PS4 Collector', 20000),
(85, 'Ni no Kuni II: Revenant Kingdom[a] is a action role-playing game developed by Level-5 and published by Bandai Namco Entertainment.\r\nThe story follows Evan Pettiwhisker Tildrum, a young king who was usurped from his castle and sets out to build a new kingdom. ', 'images/goodiesimg/NiNoKuniCollector.png', 'Ni No Kuni 2 PS4 Collector ', 98.99),
(86, 'Portal 2 is a first-person perspective puzzle game. The Player takes the role of Chell in the single-player campaign, as one of two robots—Atlas and P-Body—in the cooperative campaign, or as a simplistic humanoid icon in community-developed puzzles. These four characters can explore and interact with the environment. ', 'images/goodiesimg/PortalCollector.png', 'Portal 2 PC Collector', 20000),
(87, 'Far Cry 5 is an action-adventure first-person shooter game developed by Ubisoft Montreal and Ubisoft Toronto and published by Ubisoft for Microsoft Windows, PlayStation 4 and Xbox One. It is the eleventh entry and the fifth main title in the Far Cry series, and was released on March 27, 2018.', 'images/goodiesimg/FarCryCollector.png', 'Far Cry 5 PS4 Collector', 120.99),
(88, 'A Scouter is a wearable, all-purpose computer that Frieza\'s army uses. Scouters are mainly used to measure power levels early in Dragon Ball Z.', 'images/goodiesimg/DBZScouterReplica.png', 'Dragon Ball Z Scouter Replica', 29.99),
(89, 'Turrets serve as one of the main testing obstacles in the Portal series. Armed with almost unlimited ammunition and deadly accuracy, they will attempt to kill test subjects on sight.', 'images/goodiesimg/PortalTurretReplica.png', 'Portal Turret Replica ', 5999.99),
(90, 'Chell, documented as Test Subject #1 but previously as #1498, was a test subject of the Aperture Science computer-aided Enrichment Center, and was involved in the testing of the Company\'s Handheld Portal Device (commonly known as the Portal Gun).', 'images/goodiesimg/POPChell.png', 'POP Chell Portal 2', 45.99),
(91, 'The Weighted Companion Cube (often referred to as the Companion Cube) is a recurring object and pseudo-character in the Portal universe. It appears almost identical to the Weighted Storage Cube but with a pink heart replacing the Aperture Science logo.', 'images/goodiesimg/PortalKeychain.png', 'Companion Cube Portal Keychain', 3.99),
(92, 'Undertale is a role-playing video game created by American indie developer Toby Fox. In the game, players control a human child who has fallen into the Underground, a large, secluded region underneath the surface of the Earth, separated by a magic barrier', 'images/goodiesimg/UndertaleKeychains.png', 'Undertale Keychains', 5.99),
(93, 'Harry James Potter was a half-blood wizard, one of the most famous wizards of modern times. He was the only child and son of James and Lily Potter (née Evans), both members of the original Order of the Phoenix.', 'images/goodiesimg/HarryPotterKeychain.png', 'Harry Potter Keychain', 1.99),
(94, 'Minister Hermione Jean Granger was a Muggle-born witch born to Mr and Mrs Granger, both dentists. At the age of eleven she learned that she was a witch, and had been accepted into Hogwarts School of Witchcraft and Wizardry. ', 'images/goodiesimg/HermioneKeychain.png', 'Hermione Granger Keychain', 3.99);

-- --------------------------------------------------------

--
-- Table structure for table `ProductCategoryId`
--

CREATE TABLE IF NOT EXISTS `ProductCategoryId` (
  `ProductId` int(20) NOT NULL,
  `CategoryId` int(20) NOT NULL,
  PRIMARY KEY (`ProductId`,`CategoryId`),
  KEY `FK_Category` (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProductCategoryId`
--

INSERT INTO `ProductCategoryId` (`ProductId`, `CategoryId`) VALUES
(6, 1),
(7, 1),
(91, 1),
(93, 1),
(94, 1),
(1, 2),
(2, 2),
(3, 2),
(8, 2),
(90, 2),
(4, 3),
(5, 4),
(9, 4),
(12, 4),
(88, 4),
(89, 4),
(83, 5),
(84, 5),
(85, 5),
(86, 5),
(87, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE IF NOT EXISTS `Rating` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `UserId` int(20) NOT NULL,
  `ProductId` int(20) NOT NULL,
  `Comment` varchar(40) NOT NULL,
  `Rating` int(20) NOT NULL,
  PRIMARY KEY (`Id`,`UserId`,`ProductId`),
  KEY `FK_User` (`UserId`),
  KEY `FK_ProductRating` (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`Id`, `UserId`, `ProductId`, `Comment`, `Rating`) VALUES
(1, 1, 1, 'This is a test', 4),
(2, 1, 1, 'Best item i bought on this site so far', 3);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Pass` varchar(40) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Id`, `Pass`, `FirstName`, `LastName`, `Email`, `isAdmin`) VALUES
(1, 'matheo', 'Matheo', 'DExelle', 'mdexelle@gmail.com', 0),
(5, 'abc', 'Annelies', 'Van Damme', 'annelies.vandamme@hotmail.be', 0),
(6, 'admin', 'test', 'test', 'test@test.com', 0),
(7, 'bestadmin', 'admin', 'admin', 'admin@best.com', 0),
(8, 'admin', 'admin', 'admin', 'admin@admin.com', 1),
(16, 'b', 'b', 'b', 'b@b.com', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AddressUserId`
--
ALTER TABLE `AddressUserId`
  ADD CONSTRAINT `FK_AddressId` FOREIGN KEY (`AddressId`) REFERENCES `Address` (`Id`),
  ADD CONSTRAINT `FK_UserId` FOREIGN KEY (`UserId`) REFERENCES `User` (`Id`);

--
-- Constraints for table `ProductCategoryId`
--
ALTER TABLE `ProductCategoryId`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`CategoryId`) REFERENCES `Category` (`Id`),
  ADD CONSTRAINT `FK_Product` FOREIGN KEY (`ProductId`) REFERENCES `Product` (`Id`);

--
-- Constraints for table `Rating`
--
ALTER TABLE `Rating`
  ADD CONSTRAINT `FK_ProductRating` FOREIGN KEY (`ProductId`) REFERENCES `Product` (`Id`),
  ADD CONSTRAINT `FK_User` FOREIGN KEY (`UserId`) REFERENCES `User` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
