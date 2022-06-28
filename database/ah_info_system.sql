-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 05:09 PM
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
(1, 'Straw Hat Pirates', 'Going Merry', 'None', '2022-06-27', '2022-07-01', 'Going-Merry.jpg'),
(2, ' Heart Pirates', 'Polar Tang (ポーラータング号)', 'None', '2022-06-27', '2022-07-04', 'polar-tang.jpg'),
(3, 'Red Hair Pirates', 'Red Force', 'None', '2022-06-27', '2022-07-09', 'red hair P.png');

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
(1, 'first', 'June 27, 2022', 'Incoming', '1231233', 'NP', '150', 'June', '2022', 'Froilan Sulit'),
(2, 'testing2', 'June 27, 2022', 'Incoming', '123513', 'NP', '500', 'June', '2022', 'Froilan Sulit'),
(3, 'test3', 'June 27, 2022', 'Incoming', '123512321', 'NP', '100', 'June', '2022', 'Froilan Sulit');

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
(1, 'Vince Lenard Gregorio', '2022-06-20', '2022-06-27'),
(2, 'Daniel Espiritu', '2022-06-04', '2022-06-18'),
(3, 'Vishnu Padilla', '2022-05-20', '2022-05-31'),
(4, 'Froilan Sulit', '2022-06-27', '2022-07-09');

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
(6, 'Daniel Espiritu', 'danyel', 'danyel123', 'user'),
(7, 'beta-tester', 'beta-tester', 'beta-tester', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drydock_record`
--
ALTER TABLE `drydock_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_record`
--
ALTER TABLE `financial_record`
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
-- AUTO_INCREMENT for table `drydock_record`
--
ALTER TABLE `drydock_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `financial_record`
--
ALTER TABLE `financial_record`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugboat_record`
--
ALTER TABLE `tugboat_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
