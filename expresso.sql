-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 01:10 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expresso`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `morning_break_in` time DEFAULT NULL,
  `morning_break_out` time DEFAULT NULL,
  `lunch_out` time DEFAULT NULL,
  `lunch_in` time DEFAULT NULL,
  `afternoon_break_out` time DEFAULT NULL,
  `afternoon_break_in` time DEFAULT NULL,
  `total_hours` float DEFAULT NULL,
  `overtime` float DEFAULT NULL,
  `overtime_pay` float DEFAULT NULL,
  `night_diff_hrs` float DEFAULT NULL,
  `night_diff_pay` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `time_out`, `morning_break_in`, `morning_break_out`, `lunch_out`, `lunch_in`, `afternoon_break_out`, `afternoon_break_in`, `total_hours`, `overtime`, `overtime_pay`, `night_diff_hrs`, `night_diff_pay`, `subtotal`, `status`) VALUES
(1, 5, '2018-10-03', '22:00:00', '05:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, 0, 7, 560, 496, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `sss` varchar(50) DEFAULT NULL,
  `hdmf` varchar(50) DEFAULT NULL,
  `philhealth` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `employment_status` varchar(20) DEFAULT NULL,
  `dependents` text,
  `picture` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `account_id`, `surname`, `firstname`, `middlename`, `name`, `position`, `dob`, `gender`, `status`, `address`, `tin`, `sss`, `hdmf`, `philhealth`, `contact`, `email`, `employment_status`, `dependents`, `picture`) VALUES
(1, 1, 'Rdnr', 'Jean', 'J', 'Jean Rdnr', 1, '2018-09-15', 'Female', 'Single', 'Val', '123', '123', '123', '123', '123', 'test@gmail.com', 'Regular', NULL, 'default.png'),
(5, 5, 'Serna', 'Mark Erwin', 'T', 'Mark Erwin T Serna', 3, '1998-08-16', 'Male', 'Single', 'Bulacan', '123456', '123456', '123456', '123456', '09954196573', 'markerwin.serna@gmail.com', 'Part Time', 'Carl - Jul 25', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'Store Manager'),
(2, 'Shift Leader'),
(3, 'Barista'),
(4, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `position_salary`
--

CREATE TABLE `position_salary` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `sss` float NOT NULL,
  `philhealth` float NOT NULL,
  `pagibig` float NOT NULL,
  `tax` float NOT NULL,
  `net_pay` float NOT NULL,
  `base_salary` float NOT NULL,
  `per_hour_rate` float NOT NULL,
  `contribution_per_cutoff` float NOT NULL,
  `ot_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_salary`
--

INSERT INTO `position_salary` (`id`, `position_id`, `sss`, `philhealth`, `pagibig`, `tax`, `net_pay`, `base_salary`, `per_hour_rate`, `contribution_per_cutoff`, `ot_rate`) VALUES
(1, 1, 581.3, 481.25, 100, 2625.36, 31212.1, 35000, 218.75, 518.275, 200),
(2, 2, 545, 206.25, 100, 0, 15000, 15000, 93.75, 425.625, 150),
(3, 3, 490.5, 183.04, 100, 0, 12538, 13312, 64, 386.77, 100);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `total_salary` float DEFAULT NULL,
  `additional` float DEFAULT NULL,
  `deductions` float DEFAULT NULL,
  `total_compensation` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `range_start_date` date NOT NULL,
  `range_end_date` date NOT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1' COMMENT '1 : active, 0 : not activ',
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `picture` varchar(50) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `name`, `type`, `isActive`, `address`, `email`, `contact`, `picture`) VALUES
(1, 'jean', 'b71985397688d6f1820685dde534981b', 'Jean', 'admin', 1, 'Valenzuela', 'jean@gmail.com', '09123213123', 'default.png'),
(5, 'Mark Erwin', '06ea604824e0b66b805fa0b3662e24b4', 'Mark Erwin T Serna', 'employee', 1, NULL, NULL, NULL, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_salary`
--
ALTER TABLE `position_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `position_salary`
--
ALTER TABLE `position_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
