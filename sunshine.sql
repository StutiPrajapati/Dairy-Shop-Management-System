-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 07:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunshine`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `categoryname` varchar(30) NOT NULL,
  `categorycode` varchar(30) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `categoryname`, `categorycode`, `postingdate`) VALUES
(1, 'Milk', '0M1', '2023-01-12 02:34:08'),
(10, 'chess', '0c1', '2023-01-12 02:59:18'),
(12, 'butter', '0b1', '2023-01-12 03:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cmpid` int(11) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cmpid`, `companyname`, `postingdate`) VALUES
(1, 'Amul', '2023-01-12 03:09:37'),
(17, 'Dudhsagar', '2023-02-02 13:23:57'),
(20, 'Mahasagar', '2023-02-25 14:37:33'),
(22, 'Yamuna', '2023-02-26 05:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(11) NOT NULL,
  `adminname` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT 'User',
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `mobilenumber` varchar(11) NOT NULL,
  `email` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `adminregdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `adminname`, `username`, `mobilenumber`, `email`, `password`, `adminregdate`, `updationdate`) VALUES
(5, 'User', 'yash', '123456', 'yash1@gmail.com', 'yp', '2022-12-23 06:33:46', '2023-01-06 02:56:36'),
(6, 'Admin', 'stuti', '123456', 'stuti1@gmail.com', 'sp', '2022-12-23 06:35:24', '2023-01-06 02:56:36'),
(10, 'User', 'meet', '2344', 'meet@gmail.com', '12', '2022-12-26 04:00:08', '2023-01-06 02:56:36'),
(11, 'Admin', 'alka', '9898870211', 'as12@gmail.com', 'as', '2023-02-06 15:44:25', '2023-02-06 15:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `invoicenumber` int(11) NOT NULL,
  `customername` varchar(30) NOT NULL,
  `customermo` int(12) NOT NULL,
  `stock` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `paymentmode` varchar(10) NOT NULL,
  `invoicedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `categoryname` varchar(30) NOT NULL,
  `productprice` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `postingdate` timestamp NULL DEFAULT current_timestamp(),
  `updationdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `productname`, `companyname`, `categoryname`, `productprice`, `stock`, `postingdate`, `updationdate`) VALUES
(1, 'Gold500g', 'Amul', 'Milk', 44, 22, '2023-01-16 03:53:22', '2023-01-16 09:23:22'),
(3, 'Butter', 'Amul', 'butter', 45, 20, '2023-01-23 03:39:29', NULL),
(4, 'Shakti500g', 'Dudhsagar', 'Milk', 44, 22, '2023-01-25 03:56:26', NULL),
(5, 'Chass', 'Amul', 'Milk', 28, 20, '2023-02-21 14:06:22', NULL),
(6, 'Ghee500gm', 'Amul', 'chess', 31, 20, '2023-02-25 14:38:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cmpid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `order_ibfk_1` (`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cmpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
