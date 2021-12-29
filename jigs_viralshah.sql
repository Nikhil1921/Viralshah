-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 06:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jigs_viralshah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` smallint(2) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL DEFAULT '123456',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `email`, `password`, `otp`, `created_at`, `last_update`, `is_deleted`) VALUES
(1, 'Densetek Infotech', '9537128259', 'densetek.jignesh@gmail.com', 'Kzc1UThmdGFhQnJsNHBObSt3enZYZz09', '416655', '2021-02-17 14:54:36', '2021-02-17 14:55:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `body_type`
--

CREATE TABLE `body_type` (
  `id` int(11) NOT NULL,
  `body_type` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `body_type`
--

INSERT INTO `body_type` (`id`, `body_type`, `is_deleted`) VALUES
(1, 'saloon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `is_deleted`) VALUES
(1, 'Ahmedabada', 0),
(2, 'Surat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` smallint(2) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL DEFAULT '123456',
  `emp_code` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `mobile`, `email`, `password`, `otp`, `emp_code`, `created_at`, `last_update`, `is_deleted`) VALUES
(1, 'Viral shah', '9565223555', 'pskdj@gmail.com', 'QnNRWFhBQW9iSzBLcTRiLzRsb01Qdz09', '123456', NULL, '2021-10-19 11:38:11', '2021-10-19 11:38:11', 0),
(2, 'saurabh', '9095959493', 'patelsaurabh37@gmail.com', 'QnNRWFhBQW9iSzBLcTRiLzRsb01Qdz09', '123456', 'SAU37', '2021-10-30 13:23:53', '2021-10-30 13:23:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `valid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(11) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `fuel`, `is_deleted`) VALUES
(1, 'petrol', 0);

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`id`, `make`, `is_deleted`) VALUES
(1, 'maruti', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `veh_no` varchar(20) NOT NULL,
  `veh_sender` int(10) NOT NULL,
  `veh_sender_emp` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `emp_id` smallint(2) NOT NULL,
  `ins_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `ref_no` varchar(10) DEFAULT NULL,
  `app_no` varchar(50) DEFAULT NULL,
  `old_veh_no` varchar(50) DEFAULT NULL,
  `applicant` varchar(255) DEFAULT NULL,
  `applicant_mobile` bigint(20) NOT NULL DEFAULT 99999999,
  `owner` varchar(255) DEFAULT NULL,
  `owner_sr` varchar(255) DEFAULT NULL,
  `trim` int(10) UNSIGNED DEFAULT NULL,
  `gvw` varchar(255) DEFAULT NULL,
  `hpa` varchar(255) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `chassis_no` varchar(50) DEFAULT NULL,
  `repunched` varchar(50) DEFAULT NULL,
  `engine_no` varchar(30) DEFAULT NULL,
  `make` int(11) NOT NULL DEFAULT 0,
  `variant` int(11) NOT NULL DEFAULT 0,
  `man_year` varchar(4) DEFAULT NULL,
  `veh_class` int(11) NOT NULL DEFAULT 0,
  `body_type` int(11) NOT NULL DEFAULT 0,
  `odometer` varchar(50) DEFAULT NULL,
  `fuel` int(11) NOT NULL DEFAULT 0,
  `seating` varchar(6) NOT NULL,
  `condition` text DEFAULT NULL,
  `documents` enum('VALID','INVALID') NOT NULL DEFAULT 'VALID',
  `market_value` varchar(30) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `loan` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Completed') NOT NULL DEFAULT 'Pending',
  `created_by` int(11) NOT NULL,
  `created_type` enum('Admin','Employee') NOT NULL DEFAULT 'Admin',
  `contact_no` varchar(10) DEFAULT NULL,
  `pay_type` enum('Pending','Recieved') NOT NULL,
  `payment` int(11) NOT NULL DEFAULT 0,
  `payment_id` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `veh_no`, `veh_sender`, `veh_sender_emp`, `city_id`, `emp_id`, `ins_date`, `created_at`, `ref_no`, `app_no`, `old_veh_no`, `applicant`, `applicant_mobile`, `owner`, `owner_sr`, `trim`, `gvw`, `hpa`, `reg_date`, `chassis_no`, `repunched`, `engine_no`, `make`, `variant`, `man_year`, `veh_class`, `body_type`, `odometer`, `fuel`, `seating`, `condition`, `documents`, `market_value`, `images`, `loan`, `status`, `created_by`, `created_type`, `contact_no`, `pay_type`, `payment`, `payment_id`, `is_deleted`) VALUES
(1, 'gj1hx2641', 1, 1, 0, 0, '2021-10-19', '2021-10-19 11:32:13', '12305', '123456', NULL, 'viral shah', 9824065744, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, '', '{\"engine\":\"\",\"chassis\":\"\",\"body_cabin\":\"\",\"transmission\":\"\",\"load_body\":\"\",\"steering\":\"\",\"tyres\":\"\",\"electrical_parts\":\"\",\"battery\":\"\",\"ac_system\":\"\",\"upholstery\":\"\",\"hydraulic\":\"\",\"other\":\"\",\"overall\":\"\",\"odo\":\"\",\"color\":\"\",\"approx_today\":\"\",\"approx_purchase\":\"\",\"demand\":\"\",\"absolute\":\"\"}', 'VALID', NULL, '{\"front\":\"\",\"front_left\":\"\",\"front_right\":\"\",\"rear\":\"\",\"rear_left\":\"\",\"rear_right\":\"\",\"chassis_no\":\"\",\"number_plate\":\"\",\"oddo_meter\":\"\",\"open_dickey\":\"\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', NULL, 'Pending', 1, 'Admin', NULL, 'Recieved', 700, NULL, 0),
(2, 'gj01ha9587', 1, 1, 1, 1, '2021-10-19', '2021-10-19 11:41:07', '31958', '123654', '', 'viral shah', 9840065744, '', '', 0, '', '', '1970-01-01', '', 'YES', '', 1, 1, '', 1, 1, '', 1, '', '{\"engine\":\"A\",\"chassis\":\"A\",\"body_cabin\":\"A\",\"transmission\":\"A\",\"load_body\":\"A\",\"steering\":\"A\",\"tyres\":\"A\",\"electrical_parts\":\"A\",\"battery\":\"A\",\"ac_system\":\"A\",\"upholstery\":\"A\",\"hydraulic\":\"A\",\"other\":\"\",\"overall\":\"\",\"odo\":\"\",\"color\":\"\",\"approx_today\":\"\",\"approx_purchase\":\"\",\"demand\":\"\",\"absolute\":\"YES\"}', 'VALID', '25', '{\"front\":\"86172.jpg\",\"front_left\":\"92875.png\",\"front_right\":\"94251.jpg\",\"rear\":\"81639.jpg\",\"rear_left\":\"18327.jpg\",\"rear_right\":\"38749.jpg\",\"chassis_no\":\"31567.png\",\"number_plate\":\"91827.png\",\"oddo_meter\":\"15798.jpg\",\"open_dickey\":\"43127.jpg\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', NULL, 'Pending', 1, 'Admin', NULL, 'Pending', 700, NULL, 0),
(3, 'gj01ha2263', 1, 1, 2, 1, '2021-10-22', '2021-10-23 10:28:06', '29710', '123654', 'na', 'viral shah', 9824065744, 'viral', '3', 0, '2400', '', '1970-01-01', '524', 'NO', '854', 1, 1, '1995', 1, 1, NULL, 1, '2', '{\"engine\":\"A\",\"chassis\":\"A\",\"body_cabin\":\"A\",\"transmission\":\"A\",\"load_body\":\"A\",\"steering\":\"A\",\"tyres\":\"A\",\"electrical_parts\":\"A\",\"battery\":\"A\",\"ac_system\":\"A\",\"upholstery\":\"A\",\"hydraulic\":\"A\",\"other\":\"---\",\"overall\":\"98\",\"odo\":\"251188\",\"color\":\"white\",\"approx_today\":\"25\",\"approx_purchase\":\"24\",\"demand\":\"hi\",\"absolute\":\"YES\"}', 'VALID', '4.25', '{\"front\":\"67132.jpg\",\"front_left\":\"58321.jpg\",\"front_right\":\"81324.jpg\",\"rear\":\"41753.jpg\",\"rear_left\":\"\",\"rear_right\":\"\",\"chassis_no\":\"\",\"number_plate\":\"\",\"oddo_meter\":\"\",\"open_dickey\":\"\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', NULL, 'Pending', 1, 'Admin', NULL, '', 0, NULL, 0),
(4, 'GJ01HX2641', 1, 1, 2, 1, '2021-10-27', '2021-10-27 10:44:46', '47583', '123', NULL, 'VIRAL SHAH', 9824065744, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, '', '{\"engine\":\"\",\"chassis\":\"\",\"body_cabin\":\"\",\"transmission\":\"\",\"load_body\":\"\",\"steering\":\"\",\"tyres\":\"\",\"electrical_parts\":\"\",\"battery\":\"\",\"ac_system\":\"\",\"upholstery\":\"\",\"hydraulic\":\"\",\"other\":\"\",\"overall\":\"\",\"odo\":\"\",\"color\":\"\",\"approx_today\":\"\",\"approx_purchase\":\"\",\"demand\":\"\",\"absolute\":\"\"}', 'VALID', NULL, '{\"front\":\"\",\"front_left\":\"\",\"front_right\":\"\",\"rear\":\"\",\"rear_left\":\"\",\"rear_right\":\"\",\"chassis_no\":\"\",\"number_plate\":\"\",\"oddo_meter\":\"\",\"open_dickey\":\"\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', NULL, 'Pending', 1, 'Admin', NULL, 'Pending', 700, NULL, 0),
(5, 'GJ01HX2641', 1, 1, 1, 1, '2021-10-28', '2021-10-27 10:45:35', '89451', '123', NULL, 'VIRAL SHAH', 9824065744, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, '', '{\"engine\":\"\",\"chassis\":\"\",\"body_cabin\":\"\",\"transmission\":\"\",\"load_body\":\"\",\"steering\":\"\",\"tyres\":\"\",\"electrical_parts\":\"\",\"battery\":\"\",\"ac_system\":\"\",\"upholstery\":\"\",\"hydraulic\":\"\",\"other\":\"\",\"overall\":\"\",\"odo\":\"\",\"color\":\"\",\"approx_today\":\"\",\"approx_purchase\":\"\",\"demand\":\"\",\"absolute\":\"\"}', 'VALID', NULL, '{\"front\":\"\",\"front_left\":\"\",\"front_right\":\"\",\"rear\":\"\",\"rear_left\":\"\",\"rear_right\":\"\",\"chassis_no\":\"\",\"number_plate\":\"\",\"oddo_meter\":\"\",\"open_dickey\":\"\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', NULL, 'Pending', 1, 'Admin', NULL, 'Pending', 800, NULL, 0),
(6, 'gj01hx2641', 1, 1, 1, 1, '2021-10-27', '2021-10-27 10:55:54', '91504', 'dfsfd', NULL, 'ajay', 9824065744, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, '', '{\"engine\":\"\",\"chassis\":\"\",\"body_cabin\":\"\",\"transmission\":\"\",\"load_body\":\"\",\"steering\":\"\",\"tyres\":\"\",\"electrical_parts\":\"\",\"battery\":\"\",\"ac_system\":\"\",\"upholstery\":\"\",\"hydraulic\":\"\",\"other\":\"\",\"overall\":\"\",\"odo\":\"\",\"color\":\"\",\"approx_today\":\"\",\"approx_purchase\":\"\",\"demand\":\"\",\"absolute\":\"\"}', 'VALID', NULL, '{\"front\":\"68137.jpg\",\"front_left\":\"29518.jpg\",\"front_right\":\"37892.jpg\",\"rear\":\"75419.jpg\",\"rear_left\":\"63791.jpg\",\"rear_right\":\"48967.jpg\",\"chassis_no\":\"81294.jpg\",\"number_plate\":\"42965.jpg\",\"oddo_meter\":\"\",\"open_dickey\":\"\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', NULL, 'Pending', 1, 'Admin', NULL, 'Pending', 800, NULL, 0),
(7, 'GJ09CQ1987', 1, 1, 2, 2, '2021-10-31', '2021-10-30 13:25:05', '96510', '250555', 'GJ09CQ1766', 'saurabh patel', 9429757345, 'SAURAB PATEL', '1', 1, '111', '111', '2011-03-03', 'GJ198988JKL99888', 'YES', '123549852445', 1, 1, '2010', 1, 1, NULL, 1, '5', '{\"engine\":\"A\",\"chassis\":\"A\",\"body_cabin\":\"A\",\"transmission\":\"A\",\"load_body\":\"A\",\"steering\":\"A\",\"tyres\":\"A\",\"electrical_parts\":\"A\",\"battery\":\"A\",\"ac_system\":\"A\",\"upholstery\":\"A\",\"hydraulic\":\"A\",\"other\":\"\",\"overall\":\"\",\"odo\":\"1000\",\"color\":\"\",\"approx_today\":\"100000\",\"approx_purchase\":\"100000\",\"demand\":\"\",\"absolute\":\"YES\"}', 'VALID', '100', '{\"front\":\"39782.jpg\",\"front_left\":\"93817.jpg\",\"front_right\":\"78692.jpg\",\"rear\":\"16495.jpg\",\"rear_left\":\"65347.jpg\",\"rear_right\":\"49512.jpg\",\"chassis_no\":\"82163.jpg\",\"number_plate\":\"28795.jpg\",\"oddo_meter\":\"\",\"open_dickey\":\"\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', '10', 'Pending', 1, 'Admin', NULL, '', 0, NULL, 0),
(8, 'GJ01HA9587', 2, 2, 2, 2, '2021-11-01', '2021-11-01 18:08:02', '63492', '12345', 'NA', 'JIGAN', 9898988221, 'VIRAL', '12', 1, '25000', 'IND', '1970-01-01', '88888AN', 'NO', '55555', 1, 1, '1999', 1, 1, NULL, 1, '25', '{\"engine\":\"A\",\"chassis\":\"A\",\"body_cabin\":\"A\",\"transmission\":\"A\",\"load_body\":\"A\",\"steering\":\"A\",\"tyres\":\"A\",\"electrical_parts\":\"A\",\"battery\":\"A\",\"ac_system\":\"A\",\"upholstery\":\"A\",\"hydraulic\":\"A\",\"other\":\"CHASSIS NO NOT CLEAR\",\"overall\":\"GOOD\",\"odo\":\"5555\",\"color\":\"RED\",\"approx_today\":\"25 LAC\",\"approx_purchase\":\"24 LAC\",\"demand\":\"HIGH\",\"absolute\":\"NO\"}', 'VALID', '250', '{\"front\":\"84152.jpg\",\"front_left\":\"25163.jpg\",\"front_right\":\"24793.jpg\",\"rear\":\"87243.jpg\",\"rear_left\":\"47235.jpg\",\"rear_right\":\"57361.jpg\",\"chassis_no\":\"73256.jpg\",\"number_plate\":\"38961.jpg\",\"oddo_meter\":\"\",\"open_dickey\":\"\",\"accessories\":\"\",\"selfie_with_vehicle\":\"\",\"rc_front\":\"\",\"rc_back\":\"\",\"id_proof\":\"\"}', '12222', 'Pending', 1, 'Admin', NULL, 'Pending', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trim`
--

CREATE TABLE `trim` (
  `id` int(10) UNSIGNED NOT NULL,
  `make_id` int(10) UNSIGNED NOT NULL,
  `variant_id` int(10) UNSIGNED NOT NULL,
  `trim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trim`
--

INSERT INTO `trim` (`id`, `make_id`, `variant_id`, `trim`, `is_deleted`) VALUES
(1, 1, 1, 'LXI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `id` int(11) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `make_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`id`, `variant`, `make_id`, `is_deleted`) VALUES
(1, 'alto', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_class`
--

CREATE TABLE `vehicle_class` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_class`
--

INSERT INTO `vehicle_class` (`id`, `class`, `is_deleted`) VALUES
(1, 'lmv', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_sender`
--

CREATE TABLE `vehicle_sender` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_sender`
--

INSERT INTO `vehicle_sender` (`id`, `name`, `created_at`, `last_update`, `is_deleted`) VALUES
(1, 'INDUsind', '2021-10-19 11:29:28', '2021-10-19 11:29:28', 0),
(2, 'KOGTA FINANCE', '2021-11-01 17:56:05', '2021-11-01 17:56:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_sender_employee`
--

CREATE TABLE `vehicle_sender_employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_sender_employee`
--

INSERT INTO `vehicle_sender_employee` (`id`, `name`, `sender_id`, `created_at`, `last_update`, `is_deleted`) VALUES
(1, 'daxes', 1, '2021-10-19 11:29:50', '2021-10-19 11:29:50', 0),
(2, 'CHTN', 2, '2021-11-01 17:56:42', '2021-11-01 17:56:42', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `body_type`
--
ALTER TABLE `body_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `trim`
--
ALTER TABLE `trim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_class`
--
ALTER TABLE `vehicle_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_sender`
--
ALTER TABLE `vehicle_sender`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `vehicle_sender_employee`
--
ALTER TABLE `vehicle_sender_employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `body_type`
--
ALTER TABLE `body_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trim`
--
ALTER TABLE `trim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_class`
--
ALTER TABLE `vehicle_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_sender`
--
ALTER TABLE `vehicle_sender`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_sender_employee`
--
ALTER TABLE `vehicle_sender_employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
