-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 01:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ah_info_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `name`, `dob`) VALUES
(16, 'Froilan Sulit', '2022-05-17'),
(17, 'dasd', '0000-00-00'),
(18, 'froilan sulit', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `drydock_record`
--

CREATE TABLE `drydock_record` (
  `id` int(11) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `Ship_Name` varchar(255) NOT NULL,
  `Lot_Num` varchar(100) NOT NULL,
  `Drydock_date` date NOT NULL,
  `Exp_Departure` date NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drydock_record`
--

INSERT INTO `drydock_record` (`id`, `Company_Name`, `Ship_Name`, `Lot_Num`, `Drydock_date`, `Exp_Departure`, `images`) VALUES
(13, 'Heart Pirates', ' Polar Tang (ポーラータング号)', 'None', '2022-06-23', '2022-06-25', 'polar-tang.jpg'),
(14, 'StrawHat Pirates', 'Going Merry', 'None', '2022-06-23', '2022-06-26', 'Going-Merry.jpg'),
(15, 'Red Hair Pirates', 'Red Force', 'None', '2022-06-23', '2022-06-28', 'red hair P.png'),
(16, 'Rojer Pirates', 'The Oro Jackson', 'None', '2022-06-23', '2022-06-29', 'The Oro Jackson.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `descript` varchar(80) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `descript`, `images`) VALUES
(27, 'Sample 1', 'Sample 1', 'Sample 1', 'sample1.jpg'),
(28, 'Sample 2', 'Sample 2', 'Sample 2', 'sample2.jpg'),
(34, 'Anabelle', 'Manager', 'description', 'test.jpg'),
(35, 'card', 'card', 'card', 'card.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `financial_record`
--

CREATE TABLE `financial_record` (
  `id` int(20) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `date_set` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `month_date` varchar(255) NOT NULL,
  `year_date` varchar(255) NOT NULL,
  `encoded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_record`
--

INSERT INTO `financial_record` (`id`, `cname`, `date_set`, `purpose`, `or_number`, `images`, `amount`, `month_date`, `year_date`, `encoded_by`) VALUES
(204, 'out', 'June 23, 2021', 'Outgoing', '5487656', 'luffy.jpg', '500', 'May', '2022', 'Froilan Sulit'),
(205, 'Materials', 'June 23, 2021', 'Incoming', '4645416', 'user6.jpg', '20000', 'May', '2022', 'Froilan Sulit'),
(206, 'data 001', 'June 23, 2021', 'Incoming', '156762', 'user3.jpg', '1500', 'June', '2021', 'Froilan Sulit'),
(208, 'This is me', 'June 23, 2022', 'Incoming', '5646464', 'Screenshot_30.png', '1500', 'June', '2022', 'Froilan Sulit'),
(210, 'Materials', 'June 24, 2022', 'Incoming', '44645', 'User1.png', '750', 'June', '2022', 'Froilan Sulit'),
(211, 'outgoing remarks', 'June 24, 2022', 'Outgoing', '546422', 'Screenshot_1.png', '550', 'June', '2022', 'Froilan Sulit'),
(212, 'Materials', 'June 24, 2022', 'Incoming', '46648232', 'Screenshot_5.png', '2500', 'June', '2022', 'Froilan Sulit'),
(213, 'Walling', 'June 24, 2022', 'Outgoing', '544656', 'Screenshot_31.png', '1450', 'June', '2022', 'Froilan Sulit');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
(1, 'IMG-627a60addc5873.31324620.png'),
(2, 'IMG-627a604e130e69.26304929.png'),
(3, 'IMG-627a604e38a7f2.86055525.png'),
(4, 'IMG-627a60873973b5.78798764.png'),
(5, 'IMG-627a608778b028.61879092.png'),
(6, 'IMG-627a6087a137c5.58536050.png'),
(7, 'IMG-627a6087d28978.84831916.png'),
(8, 'IMG-627a60884e76a3.98483485.png'),
(9, 'IMG-627a608933dd51.06514036.png'),
(10, 'IMG-627a60899298b8.49166258.png'),
(11, 'IMG-627a608a180b75.95818425.png'),
(12, 'IMG-627a608a66e829.75342506.png'),
(13, 'IMG-627a608aa1fe05.92177312.png'),
(14, 'IMG-627a608ae81084.41258813.png'),
(15, 'IMG-627a608b2482b2.79950329.png'),
(16, 'IMG-627a608b6f38d7.73184701.png'),
(17, 'IMG-627a608bb412d5.94473140.png'),
(18, 'IMG-627a608c4c5260.51684108.png'),
(19, 'IMG-627a608c91a966.38477487.png'),
(20, 'IMG-627a608cd8f471.45284445.png'),
(21, 'IMG-627a608d152821.47608825.png'),
(22, 'IMG-627a608d65f8d6.81039828.png');

-- --------------------------------------------------------

--
-- Table structure for table `tugboat_record`
--

CREATE TABLE `tugboat_record` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateofRent` date NOT NULL,
  `dateofReturn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugboat_record`
--

INSERT INTO `tugboat_record` (`id`, `name`, `dateofRent`, `dateofReturn`) VALUES
(56, 'Mang Karding', '2022-05-25', '2022-05-30'),
(57, 'BEN 10', '2022-05-19', '2022-05-26'),
(58, 'Gween Tenison', '2022-05-20', '2022-05-31'),
(75, 'MASTER_POGE', '2022-05-19', '2022-05-25'),
(104, 'ADMIN123', '2022-05-20', '2022-05-24'),
(107, 'LAST FOR TODAY', '2022-05-20', '2022-05-25'),
(124, 'NEW DATA123', '2022-05-23', '2022-05-25'),
(125, 'luffy 101', '2022-05-19', '2022-05-25'),
(161, 'Ussop ', '2022-05-20', '2022-05-27'),
(164, 'ZORO', '2022-05-25', '2022-05-30'),
(170, 'danyel', '2022-06-04', '2022-06-18'),
(176, 'Ronoroa Zoro', '2022-06-10', '2022-06-17'),
(178, 'Vince Lenard Gregorio', '2022-06-20', '2022-06-27'),
(180, 'Steffany Francisco', '2022-06-21', '2022-06-28'),
(185, 'Marco the Phoenix', '2022-06-23', '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Froilan Sulit', 'froilan17', 'admin', 'admin'),
(2, 'Vince Lenard Gregorio', 'vlenard', 'user123', 'user'),
(3, 'Jasper Pecorro', 'jasper123', 'user123', 'user'),
(4, 'Vishnu Padilla', 'vish123', 'user123', 'user'),
(5, 'Coeley Dangla Cruz', 'coeley123', 'user123', 'user'),
(32, 'Daniel Espiritu', 'danyel', '123', 'user'),
(40, 'Morgan Jones', 'morgan', '123123', 'user'),
(43, 'Leon S. Kennedy', 'leon123', '123', 'user'),
(45, 'Ashley Grahams', 'ashley123', '123123', 'user'),
(63, 'Froilan Sulit', 'zero123', 'zero123', 'user'),
(73, 'Marco Phoenix', 'marco1232', 'marco1232', 'user'),
(75, 'Ricardo Dalisay', 'rcardo123', 'rcardo123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drydock_record`
--
ALTER TABLE `drydock_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_record`
--
ALTER TABLE `financial_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugboat_record`
--
ALTER TABLE `tugboat_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `drydock_record`
--
ALTER TABLE `drydock_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `financial_record`
--
ALTER TABLE `financial_record`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tugboat_record`
--
ALTER TABLE `tugboat_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
