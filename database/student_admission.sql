-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 06:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('[admin]', '[admin]'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sname` varchar(200) NOT NULL,
  `gname` varchar(200) NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `addy` longtext NOT NULL,
  `gender` varchar(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `sname`, `gname`, `contact`, `email`, `addy`, `gender`, `idnumber`, `nationality`, `course`) VALUES
('DN0001', 'Ropafadzo', 'Moyo', 777838343, 'ropa@gmail.com', '123 rujeko', 'male', '23-23344H34', 'zimbabwean', 'IBAS-Certified To Diploma'),
('DN0002', 'Tendai ', 'James', 747757575, 'james@gmail.com', '234 Mucheke', 'female', '24-34567A79', 'zimbabwean', 'IAC-Certified To Diploma'),
('DN0003', 'Daniel', 'Simbiso', 2147483647, 'dsimbiso@yahoo.com', '345 Hillside', 'male', '12-12453D63', 'zimbabwean', 'HEXCO-Secretarial');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `name`, `surname`, `course`, `time`, `status`, `contact`) VALUES
(1, 'Malvin', 'Moyo', 'Information System', 'Full time', 'Active', 666666666),
(2, 'James', 'Tembo', 'Accounting', 'Part Time', 'Active', 454545454);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
