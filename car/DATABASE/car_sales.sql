-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 01:44 PM
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
-- Database: `car_sales`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_username` (IN `username` VARCHAR(20))  BEGIN
INSERT INTO `ordered`(`username`)VALUES(`username`) ;
INSERT INTO `reviews`(`username`)VALUES(`username`) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orde` (IN `u` VARCHAR(20), IN `n` VARCHAR(20), IN `a` VARCHAR(200), IN `g` VARCHAR(20), IN `p` VARCHAR(20), IN `e` VARCHAR(20), IN `ph` VARCHAR(20), IN `d` VARCHAR(20), IN `c` VARCHAR(20))  UPDATE `ordered` SET
 `name`=n, `addres`=a, `gender`=g, `place`=p, `mail`=e,
`ph`=ph, `dob`=d, `cname`=c
 WHERE`username`=u$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `cname` varchar(20) NOT NULL,
  `cdisc` varchar(10000) NOT NULL,
  `cprice` varchar(20) NOT NULL,
  `cmodel` varchar(20) NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `cyear` varchar(20) NOT NULL,
  `cimg` varchar(255) NOT NULL,
  `ccolour` varchar(20) NOT NULL,
  `cspeed` varchar(20) NOT NULL,
  `cfuel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`cname`, `cdisc`, `cprice`, `cmodel`, `ctype`, `cyear`, `cimg`, `ccolour`, `cspeed`, `cfuel`) VALUES
('Verna SX 1.6', 'Hyundai Verna [2017-2020] SX 1.6 CRDi is the top model in the Verna [2017-2020] lineup and the price of Verna [2017-2020] top model is ₹ 11.73 Lakh.It returns a certified mileage of 24.75 kmpl. This SX 1.6 CRDi variant comes with an engine putting out 126 bhp @ 4000 rpm and 260 Nm @ 1500 rpm of max power and max torque respectively. Hyundai Verna [2017-2020] SX 1.6 CRDi is available in Manual transmission and offered in 7 colours: Alpha Blue, Phantom Black, Starry Night, Titan Grey, Fiery Red, Typhoon Silver and Polar White.', '10.25 Lakh', 'Sedan', '1461 cc,Transmission', '2012-15', 'Verna SX 1.6.jpg', 'Black, White', '20.45 ', 'petrol');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `oid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `addres` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `place` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `ph` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `cname` varchar(20) DEFAULT NULL,
  `sname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`oid`, `username`, `name`, `addres`, `gender`, `place`, `mail`, `ph`, `dob`, `cname`, `sname`) VALUES
(0, 'karna', 'Client 1', 'Puthige, Modbidri', 'male', 'Puthige', 'client123@gmail.com', '9996664445', '1998-01-25', 'Verna SX 1.6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`username`, `password`, `admin`) VALUES
('Anesh', '$2y$10$0Dft9VGdKtUwttBGImnwVe6KA0iZHvjnj3PK5XSz2EyoYgIwjALi6', 'y'),
('karna', '$2y$10$59pSNIBEIXFdx127q9f7med/M9RX6B6Wr2r8ZrNVzJvWVeDpcZ0cC', 'n'),
('Saqib', '$2y$10$nCC3ZbCk5q1aZrRt92iEzuzOrGckYyD4C//QOqWqIoq.18LjTs9zO', 'y');

--
-- Triggers `registered`
--
DELIMITER $$
CREATE TRIGGER `rev` AFTER INSERT ON `registered` FOR EACH ROW CALL add_username(new.username)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `revid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`revid`, `username`, `name`, `msg`, `star`) VALUES
(0, 'karna', 'Client 1', ' I had a great experience at MaxWheel. Found the exact car I wanted in tip-top shape at a fair price with excellent customer service and attention-to-detail. I highly recommend this dealership.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sdisc` varchar(10000) NOT NULL,
  `sicon` varchar(20) NOT NULL,
  `sprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `sname`, `sdisc`, `sicon`, `sprice`) VALUES
(0, 'Battery replacement', 'Car Batteries power up all the electrical systems of your car by converting the chemical energy stored in their electrolytes to the required electrical energy. As time passes, the electrolyte of an automotive battery tends to weaken or evaporate. A weak battery is usually not capable of powering your car. As a result, you need to get your car battery replaced every 3 to 5 years. More often than not, batteries die a premature death owing to external factors and human neglect.', 'car-battery', '40,000'),
(0, 'parts repair', 'vehicles engine. It is replaced with new, fresh oil. The engine oil filter is usually also changed at the same time. Many mechanics will recommend you change your oil every 3,000 miles. Automobile manufacturers might suggest a longer interval, such as 5,000 miles.', 'tools', '30000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`cname`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD KEY `username` (`username`),
  ADD KEY `cname` (`cname`),
  ADD KEY `sname` (`sname`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `username` (`username`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sname`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered`
--
ALTER TABLE `ordered`
  ADD CONSTRAINT `ordered_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registered` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordered_ibfk_2` FOREIGN KEY (`cname`) REFERENCES `cars` (`cname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordered_ibfk_3` FOREIGN KEY (`sname`) REFERENCES `services` (`sname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registered` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
