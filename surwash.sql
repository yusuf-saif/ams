-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 12:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `indicate`
--

CREATE TABLE `indicate` (
  `indicate_id` int(11) NOT NULL,
  `indicate` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `indicate_programme` varchar(50) NOT NULL,
  `indicate_project` varchar(100) NOT NULL,
  `est_no_male` int(11) NOT NULL,
  `est_no_female` int(11) NOT NULL,
  `no_rural_comm_benefit` int(11) NOT NULL,
  `no_serviced_drinking_water` int(11) NOT NULL,
  `no_comm_benefit_sanitation` int(11) NOT NULL,
  `indicate_date` datetime NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicate`
--

INSERT INTO `indicate` (`indicate_id`, `indicate`, `state`, `indicate_programme`, `indicate_project`, `est_no_male`, `est_no_female`, `no_rural_comm_benefit`, `no_serviced_drinking_water`, `no_comm_benefit_sanitation`, `indicate_date`, `user`) VALUES
(1, '', 'Please select a state', 'dfg', '0', 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'Admin'),
(2, '', 'FCT', 'ghj', '0', 1, 2, 1, 0, 0, '2022-07-01 02:22:00', 'Admin'),
(3, '', 'Bauchi', 'sdf', 'wed', 2, 1, 1, 0, 0, '2022-07-01 02:24:00', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(50) NOT NULL,
  `hasc` varchar(255) NOT NULL,
  `abr` varchar(255) NOT NULL,
  `fips` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `name`, `hasc`, `abr`, `fips`, `status`) VALUES
(1, 98, 'Abia', 'NG.AB', 'AB', 'NI45', 1),
(2, 98, 'Adamawa', 'NG.AD', 'AD', 'NI35', 1),
(3, 98, 'Akwa Ibom', 'NG.AK', 'AK', 'NI21', 1),
(4, 98, 'Anambra', 'NG.AN', 'AN', 'NI25', 1),
(5, 98, 'Bauchi', 'NG.BA', 'BA', 'NI46', 1),
(6, 98, 'Bayelsa', 'NG.BY', 'BY', 'NI52', 1),
(7, 98, 'Benue', 'NG.BE', 'BE', 'NI26', 1),
(8, 98, 'Borno', 'NG.BO', 'BO', 'NI27', 1),
(9, 98, 'Cross River', 'NG.CR', 'CR', 'NI22', 1),
(10, 98, 'Delta', 'NG.DE', 'DE', 'NI36', 1),
(11, 98, 'Ebonyi', 'NG.EB', 'EB', 'NI53', 1),
(12, 98, 'Edo', 'NG.ED', 'ED', 'NI37', 1),
(13, 98, 'Ekiti', 'NG.EK', 'EK', 'NI54', 1),
(14, 98, 'Enugu', 'NG.EN', 'EN', 'NI47', 1),
(15, 98, 'FCT', 'NG.FC', 'FC', 'NI11', 1),
(16, 98, 'Gombe', 'NG.GO', 'GO', 'NI55', 1),
(17, 98, 'Imo', 'NG.IM', 'IM', 'NI28', 1),
(18, 98, 'Jigawa', 'NG.JI', 'JI', 'NI39', 1),
(19, 98, 'Kaduna', 'NG.KD', 'KD', 'NI23', 1),
(20, 98, 'Kano', 'NG.KN', 'KN', 'NI29', 1),
(21, 98, 'Katsina', 'NG.KT', 'KT', 'NI24', 1),
(22, 98, 'Kebbi', 'NG.KE', 'KE', 'NI40', 1),
(23, 98, 'Kogi', 'NG.KO', 'KO', 'NI41', 1),
(24, 98, 'Kwara', 'NG.KW', 'KW', 'NI30', 1),
(25, 98, 'Lagos', 'NG.LA', 'LA', 'NI05', 1),
(26, 98, 'Nasarawa', 'NG.NA', 'NA', 'NI56', 1),
(27, 98, 'Niger', 'NG.NI', 'NI', 'NI31', 1),
(28, 98, 'Ogun', 'NG.OG', 'OG', 'NI16', 1),
(29, 98, 'Ondo', 'NG.ON', 'ON', 'NI48', 1),
(30, 98, 'Osun', 'NG.OS', 'OS', 'NI42', 1),
(31, 98, 'Oyo', 'NG.OY', 'OY', 'NI32', 1),
(32, 98, 'Plateau', 'NG.PL', 'PL', 'NI49', 1),
(33, 98, 'Rivers', 'NG.RI', 'RI', 'NI50', 1),
(34, 98, 'Sokoto', 'NG.SO', 'SO', 'NI51', 1),
(35, 98, 'Taraba', 'NG.TA', 'TA', 'NI43', 1),
(36, 98, 'Yobe', 'NG.YO', 'YO', 'NI44', 1),
(37, 98, 'Zamfara', 'NG.ZA', 'ZA', 'NI57', 1),
(38, 98, 'Others', 'NA.OTH', 'OTH', 'OTH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `usr_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`usr_id`, `first_name`, `last_name`, `role`, `user`, `passwd`) VALUES
(8, 'demo', 'test', 'Head', 'demo', 'd941191e51e81390343e12b159bb123f'),
(9, 'FMC', 'Admin', 'Chairman', 'Admin', 'f4831417ef62d838f8d7d6bf2934b3ed'),
(11, 'test', 'tested', 'officer', 'test', 'd941191e51e81390343e12b159bb123f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indicate`
--
ALTER TABLE `indicate`
  ADD PRIMARY KEY (`indicate_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indicate`
--
ALTER TABLE `indicate`
  MODIFY `indicate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `usr`
--
ALTER TABLE `usr`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
