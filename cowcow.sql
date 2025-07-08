-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2025 at 11:45 AM
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
-- Database: `cowcow`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `lot_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `customer_id`, `employee_id`, `lot_num`) VALUES
(10205, 10002, 3, 2),
(10206, 10003, 3, 4),
(10207, 10002, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cow`
--

CREATE TABLE `cow` (
  `lot_num` int(11) NOT NULL,
  `AmountOfMilk` int(11) NOT NULL,
  `Quality` varchar(1) NOT NULL,
  `Price` int(11) NOT NULL,
  `Price_mem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cow`
--

INSERT INTO `cow` (`lot_num`, `AmountOfMilk`, `Quality`, `Price`, `Price_mem`) VALUES
(1, 5000, 'A', 150000, 125000),
(2, 2300, 'C', 46000, 34500),
(3, 70000, 'C', 1400000, 1050000),
(4, 6200, 'A', 186000, 155000),
(5, 6500, 'B', 162500, 130000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_type`) VALUES
(10001, 'jobb', '208/5 ต.หนองแค อ.หนองแค จ.สระบุรี', '0958460055', 'ทั่วไป'),
(10002, 'somchai c', '207 ต.เนินหอม อ.เมือง จ.ปราจีนบุรี', '0898972649', 'สมาชิก'),
(10003, 'งูเขียว', '78/9 แขวงแสมดำ เขตบางขุนเทียน กรุงเทพมหานคร', '0988885558', 'สมาชิก');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(100) NOT NULL,
  `employee_name` text NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_address` text NOT NULL,
  `employee_phone` varchar(10) NOT NULL,
  `employee_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_email`, `employee_address`, `employee_phone`, `employee_pass`) VALUES
(1, 'pratimakorn', '', '78 ต.ศรีราชา อ.ศรีราชา จ.ชลบุรี', '0987588449', ''),
(2, 'jeyu', 'nice.jutarat@email.com', '11 ม.5 ต.เสาไห้ อ.เสาไห้ จ.สระบุรี ', '0637588252', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'kotchapun', 'kotchapun15@email.com', '44 ซอยเพชรเกษม69 ถนนเพชรเกษม กรุงเทพมหานคร', '0978598811', '30e535568de1f9231e7d9df0f4a5a44d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `cow`
--
ALTER TABLE `cow`
  ADD PRIMARY KEY (`lot_num`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10208;

--
-- AUTO_INCREMENT for table `cow`
--
ALTER TABLE `cow`
  MODIFY `lot_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
