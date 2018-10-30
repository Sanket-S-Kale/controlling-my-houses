-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 12:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacific`
--
CREATE DATABASE IF NOT EXISTS `pacific` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pacific`;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ActivityId` int(11) NOT NULL,
  `ActivityName` varchar(255) NOT NULL,
  `ActivityDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `activities`:
--

--
-- Dumping data for table `activities`
--

INSERT DELAYED INTO `activities` (`ActivityId`, `ActivityName`, `ActivityDescription`) VALUES
(1, 'Hiking', 'Pacific Trails Resort has 5 miles of hiking trail and is adjacent to a state park. Go it alone or join one of our guided hikes.'),
(2, 'Kayaking', 'Ocean kayaks are available for guest use.'),
(3, 'Bird Watching', 'While anytime is a good time for birdwatching at Pacifice Trails, we offre guided birdwatching trips at sunrise several times a week.'),
(4, 'Scuba Diving', 'Only Pacific Trails Resort offers unlimited scuba diving and most comprehensive resort diving program with all the instruction and equipment needed for an unforgettable dive experience.');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientId` int(11) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `ResId` int(11) DEFAULT NULL,
  `ActivityId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `client`:
--   `ResId`
--       `reservationyurt` -> `ResId`
--   `ActivityId`
--       `activities` -> `ActivityId`
--

--
-- Dumping data for table `client`
--

INSERT DELAYED INTO `client` (`ClientId`, `FName`, `LName`, `Address`, `Phone`, `Email`, `ResId`, `ActivityId`) VALUES
(23, 'Sanket', 'Kale', '', '6824727696', 'sanket.kale@mavs.uta.edu', 24, 1),
(26, 'Noopur', 'Kharche', '', '6824727887', 'noopur@kharche.com', 27, 1),
(27, 'Tejesh', 'Chinchkar', '', '6824727696', 't@c.com', 28, 1),
(28, 'Krunal', 'Pawale', '', '6824727696', 'k@p.com', 29, 1),
(30, 'Darshil', 'Parikh', '', '6824727696', 'darshil.parikh@gmail.com', 31, 2),
(31, 'Shreyas', 'Vaidya', '', '6824727696', 'Shreyas@vaidya.com', 32, 1),
(32, 'c', 'i', '', '6824727696', 'c@i.com', 36, 1),
(33, 'a', 'b', '', '6824727696', 'a@b.com', 37, 2),
(34, 't', 's', '', '6824727696', 't@s.com', 38, 1),
(35, 's', 'K', '', '6824727696', 's@k.com', 39, 1),
(36, 's', 'K', '', '6824727696', 's@k.com', 40, 1),
(37, 's', 'K', '', '6824727696', 's@k.com', 41, 1),
(38, 's', 'K', '', '6824727696', 's@k.com', 42, 3),
(39, 's', 'K', '', '6824727696', 's@k.com', 43, 3),
(40, 'q', 'f', '', '6824727696', 's@k.com', 44, 2),
(41, 'q', 'f', '', '6824727696', 's@k.com', 45, 2),
(43, 'sa', 'ka', '', '6824727696', 'sa@ka.com', 47, 2),
(44, 'sa', 'ka', '', '6824727696', 'sa@ka.com', 48, 2),
(45, 'K', 's', '', '6824727696', 'k@s.com', 49, 2),
(46, 'v', 'c', '', '6824727696', 'v@c.vom', 50, 1),
(47, 's', 'Kale', '', '6824727696', 's@kale.com', 51, 2),
(48, 'Theodora', 'T', '', '6824727696', 'theodora@t.com', 52, 4);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(255) NOT NULL,
  `PackageDescription` varchar(500) NOT NULL,
  `NumberOfNights` int(11) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `package`:
--

--
-- Dumping data for table `package`
--

INSERT DELAYED INTO `package` (`PackageId`, `PackageName`, `PackageDescription`, `NumberOfNights`, `Cost`) VALUES
(1, 'Weekend Escape', 'Two breakfasts, a trail map, a picnic snack', 2, 450),
(2, 'Zen Retreat', 'Four breakfasts, a trail map, a pass for daily yoga', 4, 600),
(3, 'Kayak Away', 'Two breakfasts, four hour of Kayak rentail daily, a trail map', 2, 500),
(4, 'Scuba Adventure', 'Two breakfasts, unlimited scuba', 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Product_Image_URL` varchar(100) DEFAULT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `products`:
--

--
-- Dumping data for table `products`
--

INSERT DELAYED INTO `products` (`ProductId`, `Name`, `Description`, `Product_Image_URL`, `price`) VALUES
(1, 'Pacific Trails Hiking Guide', 'Guided hikes to the best trails around Pacific Trails Resort. Each hike includes a detailed route, distance, elevation change and estimated time. 187 pages. Softcover. $19.95', 'http://localhost/Kale_PacificTrails/images/hikingguide.jpg', 19.95),
(2, 'Yurt Yoga', 'Enjoy the restorative poses of yurt yoga in the comfort of your own home. Each pose is illustrated with several photographs, an explanation, and a descriptuin of the restorative benefits. 206 pages. Softcover. $24.95', 'http://localhost/Kale_PacificTrails/images/yurtyoga.jpg', 24.95);

-- --------------------------------------------------------

--
-- Table structure for table `reservationyurt`
--

CREATE TABLE `reservationyurt` (
  `ResId` int(11) NOT NULL,
  `ArrivalDate` date NOT NULL,
  `NumberOfNights` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `Comments` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `reservationyurt`:
--   `PackageId`
--       `package` -> `PackageId`
--

--
-- Dumping data for table `reservationyurt`
--

INSERT DELAYED INTO `reservationyurt` (`ResId`, `ArrivalDate`, `NumberOfNights`, `PackageId`, `Comments`) VALUES
(24, '2018-05-02', 5, 1, NULL),
(27, '2018-05-20', 5, 1, NULL),
(28, '2018-05-02', 4, 1, NULL),
(29, '2018-05-02', 4, 1, NULL),
(31, '2018-05-02', 4, 3, NULL),
(32, '2018-05-02', 3, 1, NULL),
(33, '2018-05-03', 2, 1, NULL),
(34, '2018-05-03', 5, 1, NULL),
(35, '2018-05-03', 2, 1, NULL),
(36, '2018-05-05', 4, 1, NULL),
(37, '2018-06-06', 4, 2, NULL),
(38, '2018-05-03', 2, 1, NULL),
(39, '2018-05-03', 3, 1, NULL),
(40, '2018-05-03', 3, 1, NULL),
(41, '2018-05-03', 3, 1, NULL),
(42, '2018-05-03', 3, 3, NULL),
(43, '2018-05-03', 3, 3, NULL),
(44, '2018-05-03', 3, 1, NULL),
(45, '2018-05-03', 3, 2, NULL),
(47, '2018-05-03', 2, 3, 'testest'),
(48, '2018-05-03', 2, 3, 'testest'),
(49, '2018-05-03', 1, 2, 'testets'),
(50, '2018-05-03', 1, 1, 'fasf'),
(51, '2018-05-03', 2, 1, 'fsafasf'),
(52, '2018-05-03', 3, 4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `whenclientactivity`
--

CREATE TABLE `whenclientactivity` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `ActivityId` int(11) DEFAULT NULL,
  `ClientId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `whenclientactivity`:
--   `ClientId`
--       `client` -> `ClientId`
--   `ActivityId`
--       `activities` -> `ActivityId`
--

--
-- Dumping data for table `whenclientactivity`
--

INSERT DELAYED INTO `whenclientactivity` (`Id`, `Date`, `ActivityId`, `ClientId`) VALUES
(10, '2018-05-03', 1, 23),
(13, '2018-05-20', 1, 26),
(14, '2018-05-03', 1, 27),
(15, '2018-05-02', 1, 28),
(17, '2018-05-02', 2, 30),
(18, '2018-05-02', 1, 31),
(19, '2018-06-06', 2, 33),
(20, '2018-05-03', 1, 34),
(21, '2018-05-03', 1, 35),
(22, '2018-05-03', 1, 36),
(23, '2018-05-03', 1, 37),
(24, '2018-05-03', 3, 38),
(25, '2018-05-03', 3, 39),
(26, '2018-05-03', 2, 40),
(27, '2018-05-03', 2, 41),
(29, '2018-05-03', 2, 43),
(30, '2018-05-03', 2, 44),
(31, '2018-05-05', 2, 45),
(32, '2018-05-03', 1, 46),
(33, '2018-05-03', 2, 47),
(34, '2018-05-03', 4, 48);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ActivityId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientId`),
  ADD KEY `ResId` (`ResId`),
  ADD KEY `ActivityId` (`ActivityId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `reservationyurt`
--
ALTER TABLE `reservationyurt`
  ADD PRIMARY KEY (`ResId`),
  ADD KEY `PackageId` (`PackageId`);

--
-- Indexes for table `whenclientactivity`
--
ALTER TABLE `whenclientactivity`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ClientId` (`ClientId`),
  ADD KEY `ActivityId` (`ActivityId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ActivityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservationyurt`
--
ALTER TABLE `reservationyurt`
  MODIFY `ResId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `whenclientactivity`
--
ALTER TABLE `whenclientactivity`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`ResId`) REFERENCES `reservationyurt` (`ResId`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`ActivityId`) REFERENCES `activities` (`ActivityId`);

--
-- Constraints for table `reservationyurt`
--
ALTER TABLE `reservationyurt`
  ADD CONSTRAINT `reservationyurt_ibfk_1` FOREIGN KEY (`PackageId`) REFERENCES `package` (`PackageId`);

--
-- Constraints for table `whenclientactivity`
--
ALTER TABLE `whenclientactivity`
  ADD CONSTRAINT `whenclientactivity_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `client` (`ClientId`),
  ADD CONSTRAINT `whenclientactivity_ibfk_2` FOREIGN KEY (`ActivityId`) REFERENCES `activities` (`ActivityId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
