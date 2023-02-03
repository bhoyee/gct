-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 08:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gt`
--

-- --------------------------------------------------------

--
-- Table structure for table `boidata`
--

CREATE TABLE `boidata` (
  `id` int(11) NOT NULL,
  `DAddress` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `kname` varchar(100) DEFAULT NULL,
  `kphone` varchar(100) DEFAULT NULL,
  `pAddress` varchar(200) NOT NULL,
  `pAdult` char(5) NOT NULL,
  `pChild` char(5) NOT NULL,
  `PDate` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pTimeHR` varchar(100) NOT NULL,
  `pTimeMM` varchar(100) NOT NULL,
  `regDate` varchar(100) NOT NULL,
  `trip` varchar(200) NOT NULL,
  `ttime` time NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boidata`
--

INSERT INTO `boidata` (`id`, `DAddress`, `email`, `fullName`, `gender`, `kname`, `kphone`, `pAddress`, `pAdult`, `pChild`, `PDate`, `phone`, `pTimeHR`, `pTimeMM`, `regDate`, `trip`, `ttime`, `userid`) VALUES
(851, '', 'mistulb11@gmail.com', 'Adeboye Muhammed', 'female', 'sdfdsfdsfds', '9094135585', '', '', '', '', '9094135585', '', '', '2022-05-22', '', '00:00:00', 187242),
(852, '', 'mistulb@gmail.com', 'Adeboye Muhammed', 'male', NULL, NULL, '', '', '', '', '9094135586', '', '', '2022-07-24', '', '00:00:00', 388657),
(853, '', 'binsalith23a@gmail.com', 'Akumar Ofonse', 'female', 'qerewrewr', '9094135585', '', '', '', '', '9094135585', '', '', '2022-05-22', '', '00:00:00', 874218),
(854, '', 's.adeboye4546@outlook.com', 'Salisu Muhammed Adeboye', 'male', NULL, NULL, '', '', '', '', '435645675654', '', '', '2022-05-22', '', '00:00:00', 425643),
(857, '', 'binsalith@gmail.com', 'Akumar Ofonse', 'female', 'sdfdsfdsfds', '09094135585', '', '', '', '', '9094135585', '', '', '2022-05-22', '', '00:00:00', 970216),
(858, '', 's.adeboye@outlook.com', 'Salisu Muhammed Adeboye', 'female', 'sdfdgfdg', '9094135585', '', '', '', '', '09094135585', '', '', '2022-06-03', '', '00:00:00', 916435),
(861, '', 'bi@bhoyee.com', 'Adeboye Salisu', 'Male', NULL, NULL, '', '', '', '', '09094135585', '', '', '2022-06-18 05:06:30 PM', '', '00:00:00', 305599),
(862, '', 'hi@bhoyee.com', 'James Adoga', 'female', NULL, NULL, '', '', '', '', '12245345435', '', '', '2022-06-28 04:06:38 PM', '', '00:00:00', 43700);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `bookingCode` varchar(100) NOT NULL,
  `route` varchar(100) DEFAULT NULL,
  `pCar` varchar(200) NOT NULL,
  `bookdate` date DEFAULT NULL,
  `returnD` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `seat` varchar(100) DEFAULT NULL,
  `tripChar` varchar(100) NOT NULL,
  `airport` varchar(100) DEFAULT NULL,
  `triptype` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `paddress` varchar(100) DEFAULT NULL,
  `daddress` varchar(100) DEFAULT NULL,
  `nAdlut` int(10) DEFAULT NULL,
  `nChild` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `regDate` date DEFAULT NULL,
  `bookstatus` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `paystatus` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `bookingCode`, `route`, `pCar`, `bookdate`, `returnD`, `time`, `seat`, `tripChar`, `airport`, `triptype`, `location`, `paddress`, `daddress`, `nAdlut`, `nChild`, `email`, `regDate`, `bookstatus`, `price`, `paystatus`, `userid`) VALUES
(100, '236045', 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', 'Toyota Siena', '2022-08-03', '0000-00-00', '06:00:00', '5,6', 'Inter-State', NULL, NULL, NULL, NULL, NULL, 2, NULL, 'hi@bhoyee.com', '2022-08-03', 'expired', '400.00', 'UnPaid', 43700),
(101, '559630', 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', 'Ford Van', '2022-08-04', '0000-00-00', '05:00:00', '4,11', 'Inter-State', NULL, NULL, NULL, NULL, NULL, 2, NULL, 'bi@bhoyee.com', '2022-08-04', 'expired', '1300.00', 'Paid', 305599),
(102, '404544', NULL, '', '2022-08-04', NULL, '10:00:00', NULL, 'Airport-Chater', 'BWI Airport', 'Drop Off To Airport', '29 Church Road Abelekale Abuleegba\r\nChurch Road Agbelekale Abuleegba', NULL, NULL, 1, 2, 'bi@bhoyee.com', '2022-08-04', 'expired', '0.00', 'UnPaid', 305599),
(103, '239057', NULL, '', '2022-08-04', NULL, '09:09:00', NULL, 'Point-Point', NULL, 'No Selection', NULL, '29 Church Road Abelekale Abuleegba', 'Church Road Agbelekale Abuleegba', 3, 3, 'hi@bhoyee.com', '2022-08-04', 'expired', '0.00', 'Paid', 43700),
(105, '975368', 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', 'Toyota Siena', '2022-10-19', '0000-00-00', '07:00:00', '3', 'Inter-State', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'hi@bhoyee.com', '2022-10-19', 'expired', '0.00', 'UnPaid', 43700);

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(100) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `seat` int(11) NOT NULL,
  `picture` varchar(250) NOT NULL DEFAULT '0',
  `bus_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_no`, `bus_name`, `seat`, `picture`, `bus_created`) VALUES
(1, 'F_Van_01', 'Ford Van', 15, 'bus2.png', '2022-03-20 04:35:09'),
(2, 'T_Sena_01', 'Toyota Siena', 6, 'bus1.png', '2022-03-20 04:35:09'),
(0, '', 'Benz', 3, '0', '2022-07-24 14:31:12'),
(0, '', 'Benz', 3, '0', '2022-10-19 03:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `terminal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `terminal`) VALUES
(7, 'Baltimore', 'Exxon Gas Station'),
(8, 'New-York', '4880 Broadway NY'),
(12, 'New Jersey', '2379 John F.Kennedy Blvd Jersey City'),
(13, 'Washington DC', 'Exxon Gas Station'),
(25, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `bookingCode` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `price` int(100) NOT NULL,
  `payDate` datetime DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `bookingCode`, `date`, `price`, `payDate`, `status`) VALUES
(40, '247526', '2022-07-13', 650, '2022-07-13 11:50:52', 'Unpaid'),
(41, '364286', '2022-07-13', 650, '2022-07-13 11:51:50', 'Paid'),
(43, '559630', '2022-07-16', 1300, '2022-07-16 04:06:16', 'Paid'),
(44, '826946', '2022-07-16', 1300, '2022-07-16 04:10:26', 'Unpaid'),
(45, '402469', '2022-07-16', 1300, '2022-07-16 04:12:33', 'Unpaid'),
(47, '659283', '2022-08-04', 300, '2022-08-04 08:13:08', 'Paid'),
(51, '236045', '2022-08-02', 400, NULL, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uName` varchar(100) NOT NULL,
  `uPwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `uName`, `uPwd`) VALUES
(1, 'admin@gt.com', 'admin', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `price_status`
--

CREATE TABLE `price_status` (
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_status`
--

INSERT INTO `price_status` (`status`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(100) NOT NULL,
  `route_cities` varchar(255) NOT NULL,
  `route_dep_date` date NOT NULL,
  `route_dep_time` time NOT NULL,
  `bus` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `route_status` tinyint(1) NOT NULL DEFAULT 0,
  `route_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route_cities`, `route_dep_date`, `route_dep_time`, `bus`, `price`, `route_status`, `route_created`) VALUES
(5560, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-03', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5561, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-04', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5562, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-05', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5563, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-06', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5564, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-07', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5565, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-08', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5566, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-09', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5567, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-10', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5568, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-11', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5569, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-12', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5570, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-13', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5571, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-14', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5572, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-15', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5573, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-16', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5574, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-17', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5575, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-18', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5576, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-19', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5577, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-20', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5578, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-21', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5579, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-22', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5580, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-23', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5581, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-24', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5582, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-25', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5583, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-26', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5584, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-27', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5585, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-02-28', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5586, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-01', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5587, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-02', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5588, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-03', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5589, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-04', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5590, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-05', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5591, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-06', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5592, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-07', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5593, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-08', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5594, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-09', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5595, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-10', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5596, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-11', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5597, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-12', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5598, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-13', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5599, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-14', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5600, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-15', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5601, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-16', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5602, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-17', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5603, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-18', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5604, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-19', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5605, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-20', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5606, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-21', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5607, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-22', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5608, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-23', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5609, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-24', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5610, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-25', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5611, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-26', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5612, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-27', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5613, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-28', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5614, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-29', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5615, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-30', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5616, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-03-31', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5617, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-01', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5618, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-02', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5619, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-03', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5620, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-04', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5621, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-05', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5622, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-06', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5623, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-07', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5624, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-08', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5625, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-09', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5626, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-10', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5627, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-11', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5628, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-12', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5629, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-13', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5630, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-14', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5631, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-15', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5632, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-16', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5633, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-17', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5634, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-18', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5635, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-19', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5636, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-20', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5637, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-21', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5638, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-22', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5639, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-23', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5640, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-24', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5641, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-25', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5642, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-26', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5643, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-27', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5644, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-28', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5645, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-29', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5646, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-04-30', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5647, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-01', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5648, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-02', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5649, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-03', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5650, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-04', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5651, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-05', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5652, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-06', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5653, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-07', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5654, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-08', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5655, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-09', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5656, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-10', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5657, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-11', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5658, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-12', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5659, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-13', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5660, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-14', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5661, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-15', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5662, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-16', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5663, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-17', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5664, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-18', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5665, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-19', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5666, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-20', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5667, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-21', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5668, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-22', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5669, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-23', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5670, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-24', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5671, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-25', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5672, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-26', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5673, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-27', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5674, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-28', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5675, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-29', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5676, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-30', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5677, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-05-31', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5678, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-01', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5679, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-02', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5680, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-03', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5681, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-04', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5682, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-05', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5683, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-06', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5684, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-07', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5685, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-08', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5686, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-09', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5687, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-10', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5688, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-11', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5689, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-12', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5690, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-13', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5691, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-14', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5692, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-15', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5693, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-16', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5694, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-17', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5695, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-18', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5696, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-19', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5697, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-20', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5698, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-21', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5699, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-22', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5700, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-23', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5701, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-24', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5702, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-25', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5703, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-26', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5704, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-27', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5705, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-28', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5706, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-29', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5707, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-06-30', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5708, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-01', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5709, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-02', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5710, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-03', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5711, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-04', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5712, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-05', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5713, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-06', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5714, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-07', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5715, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-08', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5716, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-09', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5717, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-10', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5718, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-11', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5719, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-12', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5720, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-13', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5721, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-14', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5722, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-15', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5723, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-16', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5724, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-17', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5725, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-18', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5726, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-19', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5727, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-20', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5728, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-21', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5729, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-22', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5730, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-23', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5731, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-24', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5732, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-25', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5733, 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', '2023-07-26', '11:59:00', 'Ford Van', '400.00', 0, '2022-07-27 01:07:41'),
(5925, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-03', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5926, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-04', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5927, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-05', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5928, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-06', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5929, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-07', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5930, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-08', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5931, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-09', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5932, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-10', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5933, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-11', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5934, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-12', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5935, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-13', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5936, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-14', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5937, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-15', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5938, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-16', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5939, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-17', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5940, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-18', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5941, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-19', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5942, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-20', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5943, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-21', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5944, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-22', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5945, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-23', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5946, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-24', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5947, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-25', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5948, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-26', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5949, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-27', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5950, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-02-28', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5951, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-01', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5952, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-02', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5953, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-03', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5954, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-04', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5955, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-05', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5956, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-06', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5957, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-07', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5958, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-08', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5959, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-09', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5960, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-10', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5961, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-11', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5962, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-12', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5963, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-13', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5964, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-14', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5965, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-15', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5966, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-16', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5967, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-17', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5968, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-18', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5969, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-19', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5970, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-20', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5971, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-21', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5972, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-22', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5973, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-23', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5974, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-24', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5975, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-25', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5976, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-26', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5977, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-27', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5978, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-28', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5979, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-29', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5980, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-30', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5981, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-03-31', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5982, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-01', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5983, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-02', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5984, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-03', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5985, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-04', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5986, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-05', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5987, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-06', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5988, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-07', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5989, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-08', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5990, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-09', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5991, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-10', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5992, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-11', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5993, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-12', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5994, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-13', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5995, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-14', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5996, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-15', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5997, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-16', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5998, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-17', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(5999, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-18', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6000, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-19', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6001, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-20', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6002, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-21', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6003, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-22', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6004, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-23', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6005, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-24', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6006, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-25', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6007, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-26', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6008, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-27', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6009, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-28', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6010, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-29', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6011, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-04-30', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6012, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-01', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6013, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-02', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6014, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-03', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6015, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-04', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6016, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-05', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6017, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-06', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6018, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-07', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6019, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-08', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6020, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-09', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6021, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-10', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6022, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-11', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6023, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-12', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6024, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-13', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6025, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-14', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6026, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-15', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6027, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-16', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6028, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-17', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6029, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-18', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6030, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-19', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6031, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-20', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6032, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-21', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6033, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-22', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6034, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-23', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6035, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-24', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6036, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-25', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6037, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-26', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6038, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-27', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6039, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-28', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6040, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-29', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6041, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-30', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6042, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-05-31', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6043, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-01', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6044, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-02', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6045, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-03', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6046, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-04', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6047, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-05', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6048, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-06', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6049, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-07', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6050, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-08', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6051, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-09', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6052, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-10', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6053, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-11', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6054, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-12', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6055, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-13', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6056, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-14', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6057, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-15', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6058, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-16', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6059, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-17', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6060, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-18', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6061, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-19', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6062, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-20', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6063, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-21', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6064, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-22', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6065, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-23', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6066, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-24', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6067, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-25', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6068, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-26', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6069, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-27', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6070, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-28', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6071, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-29', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6072, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-06-30', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6073, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-01', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6074, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-02', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6075, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-03', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6076, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-04', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6077, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-05', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6078, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-06', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6079, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-07', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6080, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-08', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6081, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-09', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6082, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-10', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6083, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-11', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26');
INSERT INTO `routes` (`id`, `route_cities`, `route_dep_date`, `route_dep_time`, `bus`, `price`, `route_status`, `route_created`) VALUES
(6084, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-12', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6085, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-13', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6086, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-14', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6087, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-15', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6088, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-16', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6089, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-17', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6090, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-18', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6091, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-19', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6092, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-20', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6093, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-21', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6094, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-22', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6095, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-23', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6096, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-24', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6097, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-25', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26'),
(6098, 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', '2023-07-26', '19:00:00', 'Toyota Siena', '100.00', 1, '2022-07-27 01:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `bookingCode` varchar(200) NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  `PNR` varchar(130) NOT NULL,
  `date` date NOT NULL,
  `route` varchar(100) NOT NULL,
  `bus` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bookingCode`, `number`, `PNR`, `date`, `route`, `bus`, `status`) VALUES
(103, '883153', '5,6', '5,6', '2022-07-16', 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', 'Toyota Siena', 'expired'),
(104, '659283', '4', '4,11', '2022-07-30', 'Baltimore,Exxon Gas Station,New-York,4880 Broadway NY', 'Ford Van', 'expired'),
(106, '975368', '3', '3', '2022-10-19', 'Baltimore,Exxon Gas Station,New Jersey,2379 John F.Kennedy Blvd Jersey City', 'Toyota Siena', 'expired');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `sports` varchar(100) NOT NULL,
  `participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `code`, `sports`, `participants`) VALUES
(1, 'BD', 'badminton', 6),
(2, 'BB', 'basketball', 16),
(3, 'VB', 'volleyball', 14),
(4, 'WS', 'wrestling', 8),
(5, 'TN', 'tennis', 6);

-- --------------------------------------------------------

--
-- Table structure for table `stripe_payment`
--

CREATE TABLE `stripe_payment` (
  `id` int(11) NOT NULL,
  `trx_id` varchar(200) NOT NULL,
  `bookingCode` varchar(100) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amt` decimal(10,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `p_date` datetime NOT NULL,
  `ddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stripe_payment`
--

INSERT INTO `stripe_payment` (`id`, `trx_id`, `bookingCode`, `fName`, `email`, `amt`, `status`, `p_date`, `ddate`) VALUES
(9, '', '322426', 'Salisu Muhammed Adeboye', 's.adeboy23e@outlook.com', '150.00', 'Successed', '2022-05-18 09:24:40', '2022-05-18'),
(10, '', '879652', 'Adeboye Muhammed', 'mistulb@gmail.com', '1.00', 'succeeded', '2022-06-03 22:55:50', '2022-06-03'),
(11, 'ch_3L6ls3AiwpPn9IK70MtvIK2d', '641982', 'Adeboye Muhammed', 'bi@bhoyee.com', '1.00', 'Request Refund', '2022-06-04 03:33:44', '2022-06-20'),
(12, 'ch_3L6m77AiwpPn9IK71ka99cpb', '641985', 'Adeboye Muhammed', 'bi@bhoyee.com', '1.00', 'Refund Cancel', '2022-06-04 03:49:19', '2022-06-20'),
(13, 'ch_3L6sohAiwpPn9IK704Ks4CM2', '310707', 'Adeboye Muhammed', 'bi@bhoyee.com', '120.00', 'Failed', '2022-06-04 10:58:44', '2022-06-21'),
(14, 'ch_3L6swHAiwpPn9IK710m049Wj', '352198', 'Adeboye Muhammed', 'bi@bhoyee.com', '300.00', 'Refunded', '2022-07-30 11:06:34', '2022-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `cdate` date DEFAULT NULL,
  `duration` int(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `took` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `cdate`, `duration`, `price`, `took`) VALUES
(2009, '2022-07-03', 0, '0.00', 'bhoye,salius'),
(2010, '2022-07-04', 0, '0.00', 'bhoye,salius'),
(2011, '2022-07-05', 0, '0.00', 'bhoye,salius'),
(2012, '2022-07-06', 0, '0.00', 'bhoye,salius'),
(2013, '2022-07-07', 0, '0.00', 'bhoye,salius'),
(2014, '2022-07-08', 0, '0.00', 'bhoye,salius'),
(2015, '2022-07-09', 0, '0.00', 'bhoye,salius'),
(2016, '2022-07-10', 0, '0.00', 'bhoye,salius'),
(2017, '2022-07-11', 0, '0.00', 'bhoye,salius'),
(2018, '2022-07-12', 0, '0.00', 'bhoye,salius');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `regDate`) VALUES
(3, 'bi@bhoyee.com', '123456', '2022-06-18 05:06:30'),
(4, 'hi@bhoyee.com', '123456', '2022-06-28 04:06:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boidata`
--
ALTER TABLE `boidata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_status`
--
ALTER TABLE `price_status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_payment`
--
ALTER TABLE `stripe_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
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
-- AUTO_INCREMENT for table `boidata`
--
ALTER TABLE `boidata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=863;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6099;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stripe_payment`
--
ALTER TABLE `stripe_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
