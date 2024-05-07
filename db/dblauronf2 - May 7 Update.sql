-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 02:18 AM
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
CREATE DATABASE IF NOT EXISTS `dblauronf2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dblauronf2`;

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
(4, 44, '2024-05-06 12:31:01', '2024-08-06 12:31:01', 22222222),
(5, 45, '2024-05-06 12:31:08', '2024-08-06 12:31:08', 694206969),
(6, 46, '2024-05-06 14:03:46', '2024-08-06 14:03:46', 3240000),
(8, 48, '2024-05-06 15:44:52', '2024-08-06 15:44:52', 50000000),
(9, 49, '2024-05-06 15:48:06', '2024-08-06 15:48:06', 0),
(10, 50, '2024-05-06 15:50:07', '2024-08-06 15:50:07', 2000000),
(11, 51, '2024-05-06 16:16:24', '2024-08-06 16:16:24', 0),
(12, 52, '2024-05-06 16:19:24', '2024-08-06 16:19:24', 200000);

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
(6, 11),
(7, 25),
(8, 27);

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
(16, 5, 123, 12, '0'),
(17, 4, 22222222, 13, '0'),
(18, 5, 20, 14, '0'),
(19, 5, 694206, 15, '0'),
(20, 6, 30000, 16, '0'),
(21, 6, 3000, 17, '0'),
(22, 6, 30000, 18, '2147483647'),
(23, 6, 3240000, 19, '2147483647'),
(24, 8, 4000000, 20, '9236308748'),
(25, 8, 3200000, 21, '9922313772'),
(26, 8, 2360000, 22, '223332245'),
(27, 10, 2000000, 23, '92344553312'),
(28, 10, 320000, 24, '22331123213'),
(29, 8, 50000000, 25, '33221144221'),
(30, 12, 200000, 26, '223311245');

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
(6, 20, 1),
(13, 21, 1),
(9, 21, 1),
(8, 21, 1),
(6, 21, 1),
(36, 1, 1),
(36, 25, 1),
(37, 2, 1),
(37, 1, 1),
(47, 1, 1),
(49, 1, 1),
(49, 27, 1),
(47, 27, 1),
(51, 27, 1);

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
(6, 2, 'images/fastCar.jpg', '8 cylinders', 4, 0, 0),
(8, 2, 'images/bmwfast.jpg', 'fastesBMW in my collection', 4, 0, 0),
(9, 1, 'images/firstFerrari.jpg', 'My First Ferrari, it is dear to me', 4, 0, 0),
(12, 6, 'images/JEFF.png', 'friendlyFriend', 0, 0, 0),
(13, 1, 'images/ferarrileclerc.jpg', 'My Favorite F1 car Scuderia Ferrari', 2, 0, 0),
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
(32, 1, 'images/notACar.jpg', 'NotACarBUtAuction', 0, 1, 0),
(33, 1, 'images/UserFLow HCI.png', 'HCIUSerflow', 0, 0, 0),
(34, 1, 'images/notACar.jpg', 'adadsdsdsd', 0, 0, 0),
(35, 1, 'images/notACar.jpg', 'dsadadadadas', 0, 0, 0),
(36, 1, 'images/Screenshot (36).png', 'Not a car but a funny anime', 2, 0, 0),
(37, 7, 'images/Screenshot (37).png', 'Megumi Explosion', 2, 0, 0),
(44, 1, 'images/Screenshot (41).png', 'asdasdasd', 0, 1, 0),
(45, 1, 'images/Screenshot (37).png', 'dsadasdasds', 0, 1, 0),
(46, 2, 'images/Screenshot (51).png', 'Not a car ', 0, 1, 0),
(47, 2, 'images/bmwfast.jpg', 'The BMW M3 is a high-performance variant of the BMW 3 Series, developed by the German automaker BMW\'s in-house motorsport division, BMW M GmbH. It is known for its powerful engines, sporty handling, and aggressive styling. The M3 has a rich motorsport heritage and has been a popular choice among driving enthusiasts for its combination of performance and luxury.', 2, 0, 1),
(48, 2, 'images/ferarrileclerc.jpg', 'Chassis:\r\n\r\nMaterial: Carbon fiber and honeycomb composite structure.\r\nLength: Approximately 5 meters (16.4 feet).\r\nWidth: Approximately 2 meters (6.6 feet), including the wheels.\r\nWeight: Minimum weight of 752 kg (1,657 lbs), including the driver and onboard cameras.\r\nEngine:\r\n\r\nConfiguration: V6 turbocharged engine with energy recovery systems (ERS).\r\nCapacity: 1.6 liters.\r\nMaximum RPM: Approximately 15,000.\r\nPower Output: Around 850-900 horsepower, boosted by ERS.\r\nFuel: Limited to 110 kg (242 lbs) per race.\r\nTransmission:\r\n\r\nType: 8-speed semi-automatic sequential gearbox.\r\nGearshifts: Paddles on the steering wheel.\r\nBrakes:\r\n\r\nType: Carbon fiber discs and pads.\r\nBrake-by-wire system for energy recovery.\r\nSuspension:\r\n\r\nFront and rear independent suspension with pushrod-actuated springs and dampers.\r\nWheels and Tires:\r\n\r\nWheel Size: 13 inches.\r\nTire Supplier: Pirelli, with different compounds available for various track conditions.\r\nPerformance:\r\n\r\nAcceleration: 0 to 100 km/h (0 to 62 mph) in around 2.5 seconds.\r\nTop Speed: Exceeding 330 km/h (205 mph) on certain circuits.\r\nSafety:\r\n\r\nFeatures: Halo cockpit protection system, extensive crumple zones, and other safety measures mandated by the FIA.', 0, 1, 1),
(49, 1, 'images/firstFerrari.jpg', 'The Ferrari Roma is a grand touring sports car produced by the Italian manufacturer Ferrari. It was unveiled in 2019 as a 2+2 coupé, designed to evoke the spirit of the Italian Dolce Vita lifestyle. The Roma features sleek, aerodynamic lines and a front-engine, rear-wheel-drive layout, giving it a classic sports car silhouette. Powered by a twin-turbocharged V8 engine, the Roma delivers exhilarating performance with a blend of luxurious comfort and cutting-edge technology. It represents Ferrari\'s vision of a modern GT car, offering a balance of style, performance, and everyday usability.', 2, 0, 1),
(50, 1, 'images/fastCar.jpg', 'Engine: Sports cars often feature powerful engines with high horsepower and torque outputs. This allows for quick acceleration and high top speeds.\r\n\r\nTransmission: Most sports cars are equipped with manual or automated manual transmissions (often with paddle shifters) to provide quick and precise gear changes.\r\n\r\nSuspension: Sports cars typically have a sport-tuned suspension system that prioritizes handling and responsiveness. This may include features like adjustable dampers or adaptive suspension systems.\r\n\r\nBrakes: High-performance brakes, often with larger discs and calipers, provide strong stopping power and heat dissipation during aggressive driving.\r\n\r\nBody: Sports cars are usually two-door vehicles with a low-slung, aerodynamic body design. Materials like carbon fiber or aluminum are often used to reduce weight and improve performance.\r\n\r\nDrive Layout: Many sports cars have a rear-wheel-drive layout, although some may feature all-wheel drive for improved traction and handling.\r\n\r\nPerformance: Sports cars are known for their impressive performance metrics, such as 0-60 mph acceleration times, top speeds, and lateral grip figures. These vary widely depending on the specific model and manufacturer.\r\n\r\nFeatures: While sports cars prioritize performance, they often include modern features such as advanced infotainment systems, premium audio systems, and luxurious interior materials to enhance the driving experience.', 0, 1, 1),
(51, 8, 'images/unbeatable_Car.jpg', '\r\nThe 2020 Red Bull Racing Formula 1 car, officially known as the Red Bull Racing RB16, was designed and built by the Red Bull Racing team to compete in the 2020 Formula One World Championship. The car was driven by Max Verstappen and Alexander Albon.\r\n\r\nThe RB16 featured a sleek and aerodynamically efficient design, with a focus on maximizing downforce to improve cornering speeds. It featured a prominent front wing, complex bargeboards, and an intricate floor and diffuser design to manage airflow around the car.', 1, 0, 1),
(52, 8, 'images/b7d5163e9f3c68be8fe2a3880fc2ee2e.jpg', 'The Lamborghini Gallardo is a supercar produced by the Italian manufacturer Lamborghini from 2003 to 2013. Here are some key specifications of the Gallardo:\r\n\r\nEngine: 5.0-liter or 5.2-liter V10 engine, depending on the model year and variant.\r\n\r\nPower: The power output varies between different models and editions, ranging from approximately 500 to 570 horsepower.\r\n\r\nTransmission: Available with either a 6-speed manual transmission or a 6-speed automated manual transmission (E-gear).\r\n\r\nPerformance: Acceleration from 0 to 60 mph (0 to 97 km/h) in around 3.4 to 4.0 seconds, depending on the model.\r\n\r\nTop Speed: Top speeds ranging from approximately 192 to 202 mph (309 to 325 km/h), again depending on the model.\r\nThe Gallardo was offered in various versions, including the LP560-4, LP550-2, LP570-4 Superleggera, and LP570-4 Performante, each offering different performance characteristics and features. The Gallardo was known for its striking design, impressive performance, and the characteristic V10 engine sound that Lamborghini is famous for.', 0, 1, 1);

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
(1, 'ardeltiocojefflauron@gmail.com', 'retroman', '$2y$10$k7skMdUztIFgIDXyCPmyw.w2xDwI0.0ssTHlWVeW0PPB.TaPzqG0C', 0, 1, 1),
(2, 'retrokiddie@gmail.com', 'ardeljeff', '$2y$10$Mzu3rc.vXMZcH1OsTriUP.3gQAREB.GWsHOWLPLrZrk53JPbnA5eS', 1, 1, 1),
(4, 'realEmail@gmail.com', 'realArdel', '$2y$10$ykH.lgEalpyQo14UYS0dCu0DVFybYh/AZqOdZy7UwBvFrNBd8sXei', 0, 1, 1),
(5, 'TiocoLauron@gmail.com', 'TiocoJeff', '$2y$10$TtYJ7QxZokn0riFGWWSz4.qJKt89o375tgn521x2DU0C7a1Vxn8lW', 0, 1, 1),
(6, 'realEmailAdd@gmail.com', 'ardelJeffReal', '$2y$10$OUz741iq02nPPiVLCxxLBu4mmfq3oEIIsfC/xBOR.dr.XPVTmo9tC', 0, 1, 1),
(7, 'JeffLauron@gmail.com', 'JeffLauron', '$2y$10$/PVQmonv9LkRJZ/gAGrmjeQmGqzVsbE6TUYqOcLNa.mmjlFM1.jn.', 0, 1, 1),
(8, 'uniqueFields@gmail.com', 'uniqueField', '$2y$10$buCtKmn2bzlrT9iRGyia..AkHoB4SDOS0aKVRkKE5JWPORJmLlzoC', 0, 1, 0),
(9, 'uniqi@gmail.com', 'uniqi', '$2y$10$ogmaR6b0vazUg0beQ.6rruEcFo8Kn4GU1OpLf5ewr2SWvLfOIr7fq', 0, 1, 0),
(10, 'asdasdada@gmail.com', 'realdeal', '$2y$10$LJZ/7bVp61/fygsTvsoGtOlg2wSoJwNyc17Fpa9DbP/ueCvq7w2fK', 0, 1, 1),
(11, 'emmanuelPepito@gmail.com', 'emmanuel', '$2y$10$eZKtd.ojTz5mGqo.bGjYHeQPUDzQBl1TaHumsydJccSLexuwdtw1a', 0, 1, 0),
(13, 'asdasdad@gmail.com', 'retreat', '$2y$10$zz9MJx4ibacQDadZYh3k8eWDjJIz47KF5zyQaTIV4OtP2wNGdyhuW', 0, 1, 1),
(19, 'sadasdas@gmail.com', 'retromania', '$2y$10$/nMa9QsdBfMFIeIo/YwWY.NV/O6loUQ6ok/qhguZvI2VV5SiQOnFS', 0, 1, 0),
(20, 'NarutoUzumaki@gmail.com', 'NarutoUzomaki', '$2y$10$rFKS4wxDdZwjk1g/RRPPzuQr1v2sILmpnyTwuTWXlqnd3w61hsMf6', 0, 1, 0),
(21, 'superIdol@gmail.com', 'SuperIdol', '$2y$10$iqxFq025i9Pl.My4Hc8El.3yO.LWN2jE6KQzg7v8at8CuV6YueAAO', 0, 1, 0),
(25, 'leeyanzen@gmail.com', 'leeyanzen', '$2y$10$900TNOP65dQZBpccFZh9AOMmobusyyK9mn0umpFOdeDOCZ8ysfsVW', 0, 1, 0),
(26, 'ssasdadad@gmail.com', 'retrokiddie', '$2y$10$7N6/GI9KE.VcS72WoW81muOVnYZewbYxQHbi.g7O9H1zmN3GehG4G', 1, 1, 1),
(27, 'marialargo@gmail.com', 'Maria Largo', '$2y$10$XZCthel15Qsiwnmk3blPyeCC6703IUtojDbvPiDzriWqe2LDALLH.', 1, 1, 1);

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
(12, 1, 5),
(13, 1, 4),
(14, 2, 5),
(15, 2, 5),
(16, 2, 6),
(17, 2, 6),
(18, 2, 6),
(19, 2, 6),
(20, 2, 8),
(21, 1, 8),
(22, 1, 8),
(23, 2, 10),
(24, 27, 10),
(25, 27, 8),
(26, 27, 12);

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
(20, 'Naruto', 'Uzumaki', 'Male'),
(21, 'Super', 'Idol', 'Female'),
(25, 'Ardel Tioco Jeff', 'Lauron', 'Male'),
(26, 'Ardel Tioco Jeff', 'Lauron', 'Female'),
(27, 'Maria', 'Largo', 'Female');

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
  MODIFY `auctionpostid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblbid`
--
ALTER TABLE `tblbid`
  MODIFY `bidid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbluserbid`
--
ALTER TABLE `tbluserbid`
  MODIFY `userbidid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Database: `javadatabase`
--
CREATE DATABASE IF NOT EXISTS `javadatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `javadatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `age`) VALUES
(1, 'Ardel Tioco Jeff', 'Lauron', 21),
(2, 'Naruto', 'Uzumaki', 15),
(3, 'You', 'Stupid', 21),
(4, 'You', 'Stupid', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `laurondb`
--
CREATE DATABASE IF NOT EXISTS `laurondb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laurondb`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(13, 'ardel', 'asdasd'),
(15, 'retroman', 'asdasd'),
(16, 'retromans', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log` varchar(500) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `log`, `is_active`) VALUES
(1, 13, 'I pooped a big one today or did I? HMMMMM', 0),
(2, 13, 'This is the first insert test', 0),
(3, 13, 'hello this is the second test', 0),
(4, 13, 'this is the third test', 0),
(5, 13, 'fourth test and I am updating this', 1),
(6, 13, 'this is the fifth test', 1),
(7, 15, 'This is the first log of retroman and this is the first edit', 1),
(8, 15, 'This is the second log of retroman', 1),
(9, 15, 'this is the third log', 1),
(10, 13, 'yeyyy its working', 0),
(11, 13, 'Another', 0),
(12, 13, 'and Another', 0),
(13, 13, 'and and Another', 0),
(14, 13, 'insert and will be deleted', 1),
(15, 15, 'This is log April 24 2024, I was playing some Fallout 3 and turns out it was over\nevery mission and DLC is over and is looking for more, probably and hopefully there is more', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"laurondb\",\"table\":\"users\"},{\"db\":\"javadatabase\",\"table\":\"users\"},{\"db\":\"dblauronf2\",\"table\":\"tbllike\"},{\"db\":\"dblauronf2\",\"table\":\"tbluseraccount\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-04-16 00:28:58', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
