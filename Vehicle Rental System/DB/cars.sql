-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 02:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `ctype` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `cost` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `bag` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`cid`, `cname`, `ctype`, `image`, `cost`, `capacity`, `bag`, `status`) VALUES
(1, 'Mercedes Benz', 'Mercedes Benz', 'MercedesBenz.jpg', 20000, 5, 3, 'Available'),
(2, 'Range Rover', 'LandRover', 'RangeRover.jpg', 30000, 6, 1, 'Available'),
(3, 'Harrier', 'Toyota', 'Harrier.jpg', 20000, 6, 2, 'Available'),
(5, 'LandCruiser V8', 'LandCruiser ', 'LandCruiserV8.jpg', 20000, 5, 3, 'Available'),
(6, 'Security Vehicles', 'Hummer Cars', 'SecurityCar.jpg', 30000, 8, 2, 'Available'),
(7, 'Wedding Limousine', 'Wedding Limousine', 'WeddingLimo.jpg', 50000, 10, 3, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dlno` varchar(30) NOT NULL,
  `validity` date NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fname`, `lname`, `gender`, `nationality`, `phone`, `email`, `dlno`, `validity`, `password`) VALUES
(2, 'felix kiamba', '', 'Male', '', 2147483647, 'kiambafelix@yahoo.com', '1234', '0000-00-00', '30073147'),
(3, 'concepter', '', 'Female', '', 1234567878, 'concybogita@gmail.com', '', '0000-00-00', '27695131'),
(4, 'enock bosire', '', 'Male', '', 717056766, 'enock@gmail.com', '', '0000-00-00', '1234567'),
(5, 'Ratnajeet Swain', '', 'Male', '', 2147483647, '14allmidoriyaizuku@gmail.com', '', '0000-00-00', '123'),
(6, 'Fname', '20', 'male', 'Indian', 1234567891, 'abcd@gmail.com', '1234567', '2022-06-03', 'PassWord@1234'),
(7, 'Ratnajeet', 'Swain', 'male', 'Indian', 2147483647, 'abcdefg@gmail.com', '12321', '2021-02-03', '$2y$10$lBQZICGS7ICofhxijj8SlOwH0dHy8hIg.a3UwVjDUjs69E0OQxvje'),
(8, 'Ratnajeet', 'Swain', 'male', 'Indian', 2147483647, 'abcdefgf@gmail.com', '123213', '2021-02-03', '$2y$10$xJX13modMowqHPrJv0G6.OuzlxBGfStiiR0Y5aJEoCgMfaHv.7TR.'),
(9, 'Ratnajeet', 'Swain', 'male', 'Indian', 2147483647, 'abcdefgdvvdsvsf@gmail.com', '1232134545', '2021-02-03', '$2y$10$0rZ7xQ5qSLD3M3XoHW9xh.UXE3lmfIQpCOvLGuD1fN8iLJHS9hG0a'),
(10, 'Ratnajeet', 'Swain', 'male', 'Indian', 2147483647, 'abcdefgdvvdsvsfwd@gmail.com', '123213454', '2021-02-03', '$2y$10$CsTn6m9zwOcmdYIUYxXijuVSA3w82HcCts/X4ctPQsmTbbsNKL2Mm'),
(11, 'Ratnajeet', 'Swain', 'male', 'Indian', 2147483647, 'abcdefgdrgvvdsvsfwd@gmail.com', '123213454rgg', '2021-02-03', '$2y$10$gz4p32Ya5/86fM7SMAr07udVSfimLMgfkMSa9EnqfeW8J.I0r3lQa'),
(12, 'Ratnajeet', 'Swain', 'male', 'Indian', 2147483647, 'dgfdsfgrgrew@gmail.com', '4rt5tr', '2021-02-24', '$2y$10$TEkHmPyWf/hov3glOFUO0uejxxZ9yxide8gBQyM5vaPLRe2lOr7dC'),
(13, 'Ratnajeet', 'Swain', 'male', 'fsefse', 2147483647, 'ratnajeetswain1@gmail.com', 'fbfbr4t', '2021-02-05', '$2y$10$FrxpZ/g6Cy7DRddF2IzqgupfZX.TPzIDA3srM/jm1yuBbo4hgLGM2');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `hire_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `joinus`
--

CREATE TABLE `joinus` (
  `slno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dlno` varchar(255) NOT NULL,
  `phno` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `vtype` varchar(255) NOT NULL,
  `pltno` varchar(255) NOT NULL,
  `clr` varchar(255) NOT NULL,
  `corigin` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `sdate` varchar(255) NOT NULL,
  `kms` varchar(255) NOT NULL,
  `icomp` varchar(255) NOT NULL,
  `itype` varchar(255) NOT NULL,
  `irdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joinus`
--

INSERT INTO `joinus` (`slno`, `name`, `dlno`, `phno`, `mail`, `vin`, `vtype`, `pltno`, `clr`, `corigin`, `model`, `sdate`, `kms`, `icomp`, `itype`, `irdate`) VALUES
(1, 'Ratnajeet Swain', '68686', 1234567890, 'gcgcgc@gmail.com', '8778', '', '8867887', 'red', 'India', '', '2021-02-19', '1300', 'Retail', 'jbbj', '2030-11-12'),
(2, 'Ratnajeet Swain', '68686', 1234567890, 'gcgcgc@gmail.com', '8778', '', '8867887', 'red', 'India', '', '2021-02-19', '1300', 'Retail', 'jbbj', '2030-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `client_id`, `message`, `status`, `time`) VALUES
(2, 0, 'Am happy its working?', 'Unread', '0000-00-00 00:00:00'),
(3, 0, 'Thanks for that..OK?', 'Unread', '0000-00-00 00:00:00'),
(5, 0, 'I love this. It worked the way i want...', 'Unread', '2015-08-04 21:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `carid` int(11) NOT NULL,
  `tranid` varchar(255) NOT NULL,
  `pmethod` varchar(40) NOT NULL,
  `tfee` int(11) NOT NULL,
  `pDate` datetime NOT NULL,
  `rDate` datetime NOT NULL,
  `pLoc` varchar(255) NOT NULL,
  `rLoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `clientid`, `carid`, `tranid`, `pmethod`, `tfee`, `pDate`, `rDate`, `pLoc`, `rLoc`) VALUES
(1, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(2, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(3, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(4, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(5, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(6, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(7, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(8, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(9, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(10, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(11, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(12, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(13, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(14, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'RazorPay', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(15, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'RazorPay', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(16, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'RazorPay', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(17, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(18, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(19, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(20, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(21, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(22, 13, 5, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 60350, '2021-02-04 18:07:00', '2021-02-07 18:07:00', 'bekari Sahi', 'bekari Sahi'),
(23, 13, 3, 'vbjsvbwef349rf43hfi43fh34', 'PayPal', 160850, '2021-02-05 23:09:00', '2021-02-13 23:09:00', 'jbbybyy', 'bbhbvvtyvy'),
(24, 13, 2, 'mmo', 'PayPal', 814100, '2021-02-06 23:11:00', '2021-03-05 23:11:00', 'hbbbuyybyu', 'gvvrcrccr'),
(25, 13, 1, 'kkn', 'RazorPay', 301550, '2021-02-05 23:13:00', '2021-02-20 23:13:00', 'fefef', 'gesgesg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`hire_id`);

--
-- Indexes for table `joinus`
--
ALTER TABLE `joinus`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `hire_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joinus`
--
ALTER TABLE `joinus`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
