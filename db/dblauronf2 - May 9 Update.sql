-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 01:42 PM
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
-- Table structure for table `tblauctionpost`
--

CREATE TABLE `tblauctionpost` (
  `auctionpostid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `startdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `enddate` timestamp NOT NULL DEFAULT (current_timestamp() + interval 3 month),
  `highestbid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblauctionpost`
--

INSERT INTO `tblauctionpost` (`auctionpostid`, `postid`, `startdate`, `enddate`, `highestbid`) VALUES
(14, 54, '2024-05-09 06:47:35', '2024-08-09 06:47:35', 1000000),
(16, 57, '2024-05-09 10:31:54', '2024-08-09 10:31:54', 100000);

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
(9, 28),
(10, 29),
(11, 30),
(12, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tblbid`
--

CREATE TABLE `tblbid` (
  `bidid` int(11) NOT NULL,
  `auctionpostid` int(11) NOT NULL,
  `bidamount` int(11) NOT NULL,
  `userbidid` int(11) NOT NULL DEFAULT 0,
  `usercontact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbid`
--

INSERT INTO `tblbid` (`bidid`, `auctionpostid`, `bidamount`, `userbidid`, `usercontact`) VALUES
(32, 14, 200000, 28, '9236308748'),
(33, 14, 20000, 29, '9236308748'),
(34, 14, 239000, 30, '21312313131'),
(35, 14, 325000, 31, '213123123131'),
(36, 16, 52000, 32, '2312313'),
(37, 16, 100000, 33, '3213123131'),
(38, 14, 500000, 34, '4213123131'),
(39, 14, 1000000, 35, '2312313131');

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
(53, 28, 1),
(53, 29, 1),
(55, 29, 1),
(55, 30, 1),
(53, 30, 1),
(56, 30, 1),
(56, 31, 1),
(53, 31, 1),
(56, 32, 1),
(55, 32, 1),
(58, 32, 1),
(53, 32, 1);

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
(53, 9, 'images/b7d5163e9f3c68be8fe2a3880fc2ee2e.jpg', 'Pink Lamborghinni Gallardo', 5, 0, 1),
(54, 9, 'images/b7d5163e9f3c68be8fe2a3880fc2ee2e.jpg', 'Selling my v12 pink Lamborghinni', 0, 1, 1),
(55, 10, 'images/ferarrileclerc.jpg', 'My favorite F1 car', 3, 0, 1),
(56, 11, 'images/firstFerrari.jpg', 'My first ferrari', 3, 0, 1),
(57, 11, 'images/fastCar.jpg', 'Planning of selling my first w12, may the highest bidder win ', 0, 1, 1),
(58, 12, 'images/bmwfast.jpg', 'My favorite European baby ', 1, 0, 1);

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
  `is_user` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`, `is_admin`, `is_user`, `is_active`) VALUES
(28, 'ardeltiocojefflauron@gmail.com', 'ArdelJeff', '$2y$10$0Qtv3q1qW2fN810omWuMO.upPtuoDJEQh8li3Sy2v97c5szNbpUxG', 1, 1, 1),
(29, 'avery.campbell@example.com', 'averycampbell', '$2y$10$jjTuCmq9vZaaeZ3iysJFJ.XMVsyztETZHwr4yqPaMPMU6S8Mp9VfK', 0, 1, 0),
(30, 'maya.patel@example.com', 'mayapatel', '$2y$10$Mft1DaosqzvPtqM6bdZ/Q.y35MhuA8xm3Gr8xe7aJ/CvyD02mWlfK', 1, 1, 1),
(31, 'dylan.rodriguez@example.com', 'dylanrodriguez', '$2y$10$Ts3.IyfqHNJ8DuQWhevQeuhz0Az8sBo/N8ogWIpwWaAGfu3Tyf.Gq', 0, 1, 1),
(32, 'isabella.nguyen@example.com', 'isabellanguyen', '$2y$10$uNHzs3P19HVgi2iE9V0BUO/OVMa5916uAeokMvZ2RSEpxmZqS9pQW', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserbid`
--

CREATE TABLE `tbluserbid` (
  `userbidid` int(11) NOT NULL,
  `acctid` int(11) NOT NULL,
  `auctionpostid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserbid`
--

INSERT INTO `tbluserbid` (`userbidid`, `acctid`, `auctionpostid`) VALUES
(28, 29, 14),
(29, 29, 14),
(30, 28, 14),
(31, 30, 14),
(32, 30, 16),
(33, 31, 16),
(34, 31, 14),
(35, 32, 14);

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
(28, 'Ardel Tioco Jeff', 'Lauron', 'Male'),
(29, 'Avery', 'Campbell', 'Female'),
(30, ' Maya', 'Patel', 'Female'),
(31, ' Dylan', 'Rodriguez', 'Male'),
(32, 'Isabella ', 'Nguyen', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblauctionpost`
--
ALTER TABLE `tblauctionpost`
  ADD PRIMARY KEY (`auctionpostid`);

--
-- Indexes for table `tblauthor`
--
ALTER TABLE `tblauthor`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `tblbid`
--
ALTER TABLE `tblbid`
  ADD PRIMARY KEY (`bidid`);

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
-- Indexes for table `tbluserbid`
--
ALTER TABLE `tbluserbid`
  ADD PRIMARY KEY (`userbidid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblauctionpost`
--
ALTER TABLE `tblauctionpost`
  MODIFY `auctionpostid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblbid`
--
ALTER TABLE `tblbid`
  MODIFY `bidid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbluserbid`
--
ALTER TABLE `tbluserbid`
  MODIFY `userbidid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
