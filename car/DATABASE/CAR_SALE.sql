-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 10:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addp` (IN `pname` VARCHAR(50), IN `cat` VARCHAR(50), IN `work` VARCHAR(10))  insert into product values(pname,cat,work)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cid` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cid`, `c_name`) VALUES
(19, 'Furniture'),
(21, 'hshs');

--
-- Triggers `cat`
--
DELIMITER $$
CREATE TRIGGER `catdel` AFTER DELETE ON `cat` FOR EACH ROW DELETE FROM `department` WHERE `cat`= old.c_name
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(20) NOT NULL,
  `dept_name` varchar(60) DEFAULT NULL,
  `e_name` varchar(60) DEFAULT NULL,
  `working` char(10) NOT NULL,
  `cat` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `e_name`, `working`, `cat`, `total`) VALUES
('01', 'CSE', 'chair', 'yes', 'Furniture', 30);

--
-- Triggers `department`
--
DELIMITER $$
CREATE TRIGGER `cat` BEFORE INSERT ON `department` FOR EACH ROW INSERT INTO `cat`(`c_name`) VALUES (new.cat)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inp` AFTER INSERT ON `department` FOR EACH ROW INSERT INTO `product`(`p_name`, `working`, `cat`) VALUES (new.e_name,new.working,new.cat)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upsup` AFTER UPDATE ON `department` FOR EACH ROW UPDATE `sup` SET `total`=new.total WHERE `dm`=old.dept_name
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_name` varchar(50) NOT NULL,
  `working` char(10) DEFAULT NULL,
  `cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_name`, `working`, `cat`) VALUES
('chair', 'yes', 'Furniture'),
('Indore', 'yes', 'hshs'),
('projector', 'yes', 'Electronics'),
('Table', 'yes', 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `sup`
--

CREATE TABLE `sup` (
  `s_id` int(20) NOT NULL,
  `s_name` varchar(60) DEFAULT NULL,
  `dm` varchar(20) DEFAULT NULL,
  `em` varchar(30) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sup`
--

INSERT INTO `sup` (`s_id`, `s_name`, `dm`, `em`, `total`) VALUES
(1, 'Manjunath', 'CSE', 'chair', 30);

--
-- Triggers `sup`
--
DELIMITER $$
CREATE TRIGGER `deldept` BEFORE DELETE ON `sup` FOR EACH ROW DELETE FROM `department` WHERE `dept_name`=old.dm
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `admin` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `admin`) VALUES
('Ganavi', '12345', 'y'),
('ksheera', '12345', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_name`);

--
-- Indexes for table `sup`
--
ALTER TABLE `sup`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sup`
--
ALTER TABLE `sup`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
