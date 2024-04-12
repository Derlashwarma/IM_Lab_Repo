-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 02:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblauronf2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblauthor`
--

CREATE TABLE `tblauthor` (
  `author_id` int(11) NOT NULL,
  `acctid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblauthor`
--

INSERT INTO `tblauthor` (`author_id`, `acctid`) VALUES
(1, 1),
(2, 2),
(6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbllike`
--

CREATE TABLE `tbllike` (
  `post_id` int(11) DEFAULT NULL,
  `acctid` int(11) DEFAULT NULL,
  `isliked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllike`
--

INSERT INTO `tbllike` (`post_id`, `acctid`, `isliked`) VALUES
(9, 11, 1),
(8, 11, 1),
(9, 1, 0),
(8, 1, 0),
(13, 1, 0),
(16, 1, 0),
(17, 1, 0),
(32, 2, 0),
(13, 19, 1),
(9, 19, 1),
(8, 19, 1),
(6, 19, 1),
(6, 1, 1),
(13, 20, 0),
(9, 20, 1),
(8, 20, 1),
(6, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_information` text DEFAULT NULL,
  `post_likes` int(11) DEFAULT 0,
  `is_auction` tinyint(1) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`post_id`, `author_id`, `post_image`, `post_information`, `post_likes`, `is_auction`, `is_active`) VALUES
(6, 2, 'images/fastCar.jpg', '8 cylinders', 3, 0, 1),
(8, 2, 'images/bmwfast.jpg', 'fastesBMW in my collection', 3, 0, 1),
(9, 1, 'images/firstFerrari.jpg', 'My First Ferrari, it is dear to me', 3, 0, 1),
(12, 6, 'images/JEFF.png', 'friendlyFriend', 0, 0, 0),
(13, 1, 'images/ferarrileclerc.jpg', 'My Favorite F1 car Scuderia Ferrari', 1, 0, 1),
(14, 1, 'images/logo.png', 'This is an auction and will not appear in the main_page', 0, 1, 0),
(16, 1, 'images/unbeatable_Car.jpg', 'Redbull Max Verstappen the unbeatable man from 2022-present', 0, 0, 0),
(17, 1, 'images/notACar.jpg', 'I dunno what this is', 0, 0, 0),
(18, 1, 'images/notACar.jpg', 'Not A Car', 0, 0, 0),
(19, 1, 'images/notACar.jpg', 'notCAr', 0, 0, 0),
(20, 1, 'images/notACar.jpg', 'noCar', 0, 0, 0),
(21, 1, 'images/notACar.jpg', 'notACarAuction', 0, 0, 0),
(28, 1, 'images/notACar.jpg', 'asdasd', 0, 0, 0),
(30, 1, 'images/notACar.jpg', 'asdasdsdsdsds', 0, 1, 0),
(31, 1, 'images/notACar.jpg', 'ssssssssssssssssss', 0, 0, 0),
(32, 1, 'images/notACar.jpg', 'NotACarBUtAuction', 0, 1, 1),
(33, 1, 'images/UserFLow HCI.png', 'HCIUSerflow', 0, 0, 0),
(34, 1, 'images/notACar.jpg', 'adadsdsdsd', 0, 0, 0),
(35, 1, 'images/notACar.jpg', 'dsadadadadas', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` int(5) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_user` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`, `is_admin`, `is_user`) VALUES
(1, 'ardeltiocojefflauron@gmail.com', 'retroman', '$2y$10$k7skMdUztIFgIDXyCPmyw.w2xDwI0.0ssTHlWVeW0PPB.TaPzqG0C', 0, 1),
(2, 'retrokiddie@gmail.com', 'ardeljeff', '$2y$10$Mzu3rc.vXMZcH1OsTriUP.3gQAREB.GWsHOWLPLrZrk53JPbnA5eS', 1, 1),
(4, 'realEmail@gmail.com', 'realArdel', '$2y$10$ykH.lgEalpyQo14UYS0dCu0DVFybYh/AZqOdZy7UwBvFrNBd8sXei', 0, 1),
(5, 'TiocoLauron@gmail.com', 'TiocoJeff', '$2y$10$TtYJ7QxZokn0riFGWWSz4.qJKt89o375tgn521x2DU0C7a1Vxn8lW', 0, 1),
(6, 'realEmailAdd@gmail.com', 'ardelJeffReal', '$2y$10$OUz741iq02nPPiVLCxxLBu4mmfq3oEIIsfC/xBOR.dr.XPVTmo9tC', 0, 1),
(7, 'JeffLauron@gmail.com', 'JeffLauron', '$2y$10$/PVQmonv9LkRJZ/gAGrmjeQmGqzVsbE6TUYqOcLNa.mmjlFM1.jn.', 0, 1),
(8, 'uniqueFields@gmail.com', 'uniqueField', '$2y$10$buCtKmn2bzlrT9iRGyia..AkHoB4SDOS0aKVRkKE5JWPORJmLlzoC', 0, 1),
(9, 'uniqi@gmail.com', 'uniqi', '$2y$10$ogmaR6b0vazUg0beQ.6rruEcFo8Kn4GU1OpLf5ewr2SWvLfOIr7fq', 0, 1),
(10, 'asdasdada@gmail.com', 'realdeal', '$2y$10$LJZ/7bVp61/fygsTvsoGtOlg2wSoJwNyc17Fpa9DbP/ueCvq7w2fK', 0, 1),
(11, 'emmanuelPepito@gmail.com', 'emmanuel', '$2y$10$eZKtd.ojTz5mGqo.bGjYHeQPUDzQBl1TaHumsydJccSLexuwdtw1a', 0, 1),
(13, 'asdasdad@gmail.com', 'retreat', '$2y$10$zz9MJx4ibacQDadZYh3k8eWDjJIz47KF5zyQaTIV4OtP2wNGdyhuW', 0, 1),
(19, 'sadasdas@gmail.com', 'retromania', '$2y$10$/nMa9QsdBfMFIeIo/YwWY.NV/O6loUQ6ok/qhguZvI2VV5SiQOnFS', 0, 1),
(20, 'NarutoUzumaki@gmail.com', 'NarutoUzomaki', '$2y$10$rFKS4wxDdZwjk1g/RRPPzuQr1v2sILmpnyTwuTWXlqnd3w61hsMf6', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` int(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userid`, `firstname`, `lastname`, `gender`) VALUES
(1, 'Ardel Tioco Jeff', 'Lauron', 'Male'),
(2, 'Ardel', 'Lauron', 'Male'),
(4, 'Ardel Tioco Jeff', 'Lauron', 'Male'),
(5, 'Tioco', 'Lauron', 'Male'),
(6, 'Ardel Tioco Jeff', 'Lauron', 'Male'),
(7, 'Jeff', 'Lauron', 'Female'),
(8, 'Unique', 'Fields', 'Female'),
(9, 'Unique', 'Really', 'Female'),
(10, 'Ardel Tioco Jeff', 'sadasda', 'Male'),
(11, 'Emmanuel', 'Pepito', 'Male'),
(13, 'asdasdsad', 'asdasdasd', 'Female'),
(19, 'asdasdsad', 'Lauron', 'Male'),
(20, 'Naruto', 'Uzumaki', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblauthor`
--
ALTER TABLE `tblauthor`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
