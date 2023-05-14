-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lams_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaveform`
--

CREATE TABLE `leaveform` (
  `id` int(11) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `leavetype` varchar(20) NOT NULL,
  `leavecatergory` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `fromwhere` varchar(20) NOT NULL,
  `towhere` varchar(20) NOT NULL,
  `description` varchar(191) NOT NULL,
  `file` blob NOT NULL,
  `approval` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaveform`
--

INSERT INTO `leaveform` (`id`,`lastname`,`email`, `leavetype`, `leavecatergory`, `startdate`, `enddate`, `fromwhere`, `towhere`, `description`, `file`) VALUES
(22,'jomba nyuso kichaa','jomba@gmail.com' ,'paid', 'Mandatory Leave', '2022-09-05', '2022-09-26', 'Dodoma', 'Morogoro', 'THANKS GOD', 0x77616c6c7061706572666c6172652e636f6d5f77616c6c7061706572202832292e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaveform`
--
ALTER TABLE `leaveform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaveform`
--
ALTER TABLE `leaveform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
