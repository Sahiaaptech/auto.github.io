-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 09:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automation`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(10) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_revision` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products2`
--

CREATE TABLE `products2` (
  `product_id` bigint(10) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_type` varchar(50) DEFAULT NULL,
  `test_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products2`
--

INSERT INTO `products2` (`product_id`, `product_name`, `product_type`, `test_id`) VALUES
(1234567901, 'capasitor', 'part', NULL),
(1234567902, 'led', 'resistor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testingrecords`
--

CREATE TABLE `testingrecords` (
  `record_id` int(11) NOT NULL,
  `product_id` int(12) DEFAULT NULL,
  `test_id` int(12) DEFAULT NULL,
  `testing_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `tester_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testing_records2`
--

CREATE TABLE `testing_records2` (
  `record_id` int(11) NOT NULL,
  `output` varchar(50) NOT NULL,
  `prod_id` bigint(12) NOT NULL,
  `tes_id` bigint(12) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `tester_name` varchar(50) DEFAULT NULL,
  `testing_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing_records2`
--

INSERT INTO `testing_records2` (`record_id`, `output`, `prod_id`, `tes_id`, `remarks`, `result`, `tester_name`, `testing_date`) VALUES
(1, 'bad display', 1234567902, 123456789014, 'connect', 'fail', NULL, '2023-06-12'),
(2, 'bad display', 1234567902, 123456789014, 'connect', 'pass', NULL, '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_code` varchar(10) DEFAULT NULL,
  `test_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tests2`
--

CREATE TABLE `tests2` (
  `test_id` bigint(12) NOT NULL,
  `test_name` varchar(50) DEFAULT NULL,
  `test_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests2`
--

INSERT INTO `tests2` (`test_id`, `test_name`, `test_type`) VALUES
(123456789012, '', ''),
(123456789013, 'diode', 'Connectivity'),
(123456789014, 'diode', 'Connectivity');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_role`) VALUES
(1, 'sano', 'sano@gmail.com', '$2y$10$TPr2tw/jb7k6ZQywN9hY3.hFcR7QqOWuFaTKKmnNzDDvmFQ254yxK', '1'),
(2, 'hun', 'tomanmikey0345@gmail.com', '$2y$10$bsWbiUEeJ9EqcCoa0qooHON15ddofo24etMP7X8kzHlc1IDwlK8Aa', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `products2`
--
ALTER TABLE `products2`
  ADD UNIQUE KEY `id` (`product_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `testingrecords`
--
ALTER TABLE `testingrecords`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `testing_records2`
--
ALTER TABLE `testing_records2`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `tes_id` (`tes_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tests2`
--
ALTER TABLE `tests2`
  ADD UNIQUE KEY `id` (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products2`
--
ALTER TABLE `products2`
  MODIFY `product_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567903;

--
-- AUTO_INCREMENT for table `testingrecords`
--
ALTER TABLE `testingrecords`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testing_records2`
--
ALTER TABLE `testing_records2`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests2`
--
ALTER TABLE `tests2`
  MODIFY `test_id` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456789015;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products2`
--
ALTER TABLE `products2`
  ADD CONSTRAINT `products2_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests2` (`test_id`);

--
-- Constraints for table `testingrecords`
--
ALTER TABLE `testingrecords`
  ADD CONSTRAINT `testingrecords_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `testingrecords_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`);

--
-- Constraints for table `testing_records2`
--
ALTER TABLE `testing_records2`
  ADD CONSTRAINT `testing_records2_ibfk_1` FOREIGN KEY (`tes_id`) REFERENCES `tests2` (`test_id`),
  ADD CONSTRAINT `testing_records2_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products2` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
