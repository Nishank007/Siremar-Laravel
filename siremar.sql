-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2022 at 06:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siremar`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `id` int(4) UNSIGNED NOT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `pincode` int(5) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Business`
--

CREATE TABLE `Business` (
  `id` int(4) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Chats`
--

CREATE TABLE `Chats` (
  `room` varchar(255) NOT NULL,
  `response` tinyint(1) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Chats`
--

INSERT INTO `Chats` (`room`, `response`, `message`, `user_id`, `updated_at`, `created_at`) VALUES
('admin-5', 0, NULL, NULL, '2022-04-25 13:34:46', '2022-04-25 13:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `Clinics`
--

CREATE TABLE `Clinics` (
  `id` int(4) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Clinics`
--

INSERT INTO `Clinics` (`id`, `phone_number`, `name`, `street1`, `street2`, `benefits`, `county_id`, `created_at`, `updated_at`) VALUES
(4, '9611130912', 'Clinic 1', 'Banashankari', 'Apt 253', '20%', 5, '2022-04-25 21:35:01', '2022-04-25 21:35:01'),
(6, '9611130912', 'Clinic 2', 'Banashankari', 'Apt 253', '40%', 5, '2022-04-25 23:58:06', '2022-04-25 23:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `Counties`
--

CREATE TABLE `Counties` (
  `id` int(4) UNSIGNED NOT NULL,
  `county_name` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Counties`
--

INSERT INTO `Counties` (`id`, `county_name`, `Created_at`, `Updated_at`) VALUES
(5, 'County 1', '2022-04-24 20:51:00', '2022-04-24 20:51:00'),
(9, 'County 2', '2022-04-24 21:01:14', '2022-04-24 21:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `date_of_event` date DEFAULT NULL,
  `event_time` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Ferry`
--

CREATE TABLE `Ferry` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `date_of_ferry` date DEFAULT NULL,
  `ferry_time` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Flights`
--

CREATE TABLE `Flights` (
  `id` int(4) UNSIGNED NOT NULL,
  `flight_number` varchar(255) DEFAULT NULL,
  `airlines_name` varchar(255) DEFAULT NULL,
  `date_of_departure` date DEFAULT NULL,
  `flight_time` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Moveout`
--

CREATE TABLE `Moveout` (
  `id` int(4) UNSIGNED NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `date_of_moveout` date DEFAULT NULL,
  `moveout_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Moveouts`
--

CREATE TABLE `Moveouts` (
  `id` int(4) UNSIGNED NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `date_of_moveout` date DEFAULT NULL,
  `moveout_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Moveouts`
--

INSERT INTO `Moveouts` (`id`, `user_id`, `date_of_moveout`, `moveout_time`, `created_at`, `updated_at`) VALUES
(2, 9, '2022-05-02', '21:26', '2022-04-25 19:26:40', '2022-04-25 19:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Inspector'),
(3, 'Resident');

-- --------------------------------------------------------

--
-- Table structure for table `Schools`
--

CREATE TABLE `Schools` (
  `id` int(4) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Schools`
--

INSERT INTO `Schools` (`id`, `phone_number`, `name`, `street1`, `street2`, `county_id`, `created_at`, `updated_at`) VALUES
(10, '9611130912', 'School 1', 'Banashankari', 'Apt 253', 5, '2022-04-25 21:27:44', '2022-04-25 21:27:44'),
(11, '9611130912', 'School 2', 'Banashankari', 'Apt 253', 5, '2022-04-25 21:41:14', '2022-04-25 21:41:14'),
(12, '1234567890', 'School 3', 'Banashankari', 'Apt 253', 5, '2022-04-25 22:35:15', '2022-04-25 22:35:15'),
(13, '09611130912', 'School 4', 'Banashankari', 'Apt 253', 5, '2022-04-26 00:20:22', '2022-04-26 00:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `UserBenefits`
--

CREATE TABLE `UserBenefits` (
  `id` int(4) UNSIGNED NOT NULL,
  `benefit_id` int(4) UNSIGNED DEFAULT NULL,
  `user_id` int(4) UNSIGNED DEFAULT NULL,
  `benefit_type` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `county_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `UserBenefits`
--

INSERT INTO `UserBenefits` (`id`, `benefit_id`, `user_id`, `benefit_type`, `updated_at`, `created_at`, `county_id`) VALUES
(38, 10, 1, 'Schools', '2022-04-25 21:40:19', '2022-04-25 21:40:19', NULL),
(39, 10, 13, 'Schools', '2022-04-25 21:40:36', '2022-04-25 21:40:36', 5),
(40, 11, 13, 'Schools', '2022-04-25 21:42:31', '2022-04-25 21:42:31', 5),
(41, 10, 15, 'Schools', '2022-04-25 23:33:37', '2022-04-25 23:33:37', 5),
(42, 12, 15, 'Schools', '2022-04-25 23:33:48', '2022-04-25 23:33:48', 5),
(43, 13, 15, 'Schools', '2022-04-26 00:22:40', '2022-04-26 00:22:40', 5),
(44, 11, 15, 'Schools', '2022-04-26 21:00:42', '2022-04-26 21:00:42', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(4) UNSIGNED NOT NULL,
  `phone_number` char(10) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `phone_number`, `first_name`, `last_name`, `dob`, `updated_at`, `created_at`, `gender`, `street1`, `street2`, `email`, `county_id`, `role_id`, `password`) VALUES
(1, '1234567890', 'Admin 1', '', '1890-06-12', NULL, NULL, 'Male', '101 uta', '', 'manasa229@gmail.com', NULL, 0, 'admin'),
(13, '9611130912', 'Resident', '1', '1990-12-12', '2022-04-25', '2022-04-25', NULL, 'Banashankari', 'Apt 253', 'manasam0963@gmail.com', 5, 2, 'qwe'),
(14, '9611130912', 'Resident', '2', NULL, '2022-04-25', '2022-04-25', NULL, 'Banashankari', 'Apt 253', 'resident1@gmail.com', 9, 2, 'qwe'),
(15, '8173536904', 'Pavan', 'Krishna', '1991-04-12', '2022-04-25', '2022-04-25', NULL, 'UTA', 'Blvd', 'kspavankrishna@gmail.com', 5, 2, 'qwe'),
(17, '9611130912', 'Inspector', '1', '1990-12-22', '2022-04-25', '2022-04-25', NULL, 'Banashankari', 'Apt 253', 'inspector1@gmail.com', 5, 1, 'qwe'),
(18, NULL, NULL, NULL, NULL, '2022-05-04', '2022-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Business`
--
ALTER TABLE `Business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Chats`
--
ALTER TABLE `Chats`
  ADD PRIMARY KEY (`room`);

--
-- Indexes for table `Clinics`
--
ALTER TABLE `Clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Counties`
--
ALTER TABLE `Counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Ferry`
--
ALTER TABLE `Ferry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Flights`
--
ALTER TABLE `Flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Moveout`
--
ALTER TABLE `Moveout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Moveouts`
--
ALTER TABLE `Moveouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Schools`
--
ALTER TABLE `Schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserBenefits`
--
ALTER TABLE `UserBenefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Business`
--
ALTER TABLE `Business`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Clinics`
--
ALTER TABLE `Clinics`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Counties`
--
ALTER TABLE `Counties`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Ferry`
--
ALTER TABLE `Ferry`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Flights`
--
ALTER TABLE `Flights`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Moveout`
--
ALTER TABLE `Moveout`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Moveouts`
--
ALTER TABLE `Moveouts`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Schools`
--
ALTER TABLE `Schools`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `UserBenefits`
--
ALTER TABLE `UserBenefits`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
