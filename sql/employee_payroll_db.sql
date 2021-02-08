-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 11:19 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_payroll_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `employee_id` int(11) NOT NULL,
  `employee_firstname` text DEFAULT NULL,
  `employee_middlename` text DEFAULT NULL,
  `employee_lastname` text DEFAULT NULL,
  `employee_phone_primary` text DEFAULT NULL,
  `employee_phone_secondary` text DEFAULT NULL,
  `employee_email` text DEFAULT NULL,
  `employee_image` text DEFAULT NULL,
  `employee_designation` text DEFAULT NULL,
  `employee_reporting_manager` text DEFAULT NULL,
  `employee_date_of_join` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`employee_id`, `employee_firstname`, `employee_middlename`, `employee_lastname`, `employee_phone_primary`, `employee_phone_secondary`, `employee_email`, `employee_image`, `employee_designation`, `employee_reporting_manager`, `employee_date_of_join`, `created_at`, `updated_at`) VALUES
(1, 'Obed', 'Arif', 'Shk', '9876543210', '6543210236', 'ub@mail.com', 'obed.jpg', 'Developer', 'Ubaa', '2021-01-20', '2021-02-07 11:52:30', '2021-02-07 11:52:30'),
(3, 'Saurabh', 'S', 'Singh', '8789879988', '6543210236', 'saurabh@mails.com', 'saurabh.jpg', 'Developer', 'Swapnil', '2007-01-20', '2021-02-07 13:46:21', '2021-02-07 13:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payroll`
--

CREATE TABLE `employee_payroll` (
  `payroll_id` int(11) NOT NULL,
  `p_employee_id` int(11) DEFAULT NULL,
  `p_basic_salary` double(10,2) DEFAULT NULL,
  `p_hra` double(10,2) DEFAULT NULL,
  `p_fix_convevance` double(10,2) DEFAULT NULL,
  `p_medical_allowance` double(10,2) DEFAULT NULL,
  `p_internet_allowance` double(10,2) DEFAULT NULL,
  `p_telephone` double(10,2) DEFAULT NULL,
  `p_prof_development` double(10,2) DEFAULT NULL,
  `p_special_allowance` double(10,2) DEFAULT NULL,
  `p_employee_provident_fund` double(10,2) DEFAULT NULL,
  `p_employer_provident_fund` double(10,2) DEFAULT NULL,
  `p_tds` double(10,2) DEFAULT NULL,
  `p_prof_tax` double(10,2) DEFAULT NULL,
  `p_other` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_payroll`
--

INSERT INTO `employee_payroll` (`payroll_id`, `p_employee_id`, `p_basic_salary`, `p_hra`, `p_fix_convevance`, `p_medical_allowance`, `p_internet_allowance`, `p_telephone`, `p_prof_development`, `p_special_allowance`, `p_employee_provident_fund`, `p_employer_provident_fund`, `p_tds`, `p_prof_tax`, `p_other`, `created_at`, `updated_at`) VALUES
(1, 1, 21667.00, 8667.00, 1600.00, 1200.00, 1000.00, 1000.00, 2000.00, 591.00, 1800.00, 1800.00, NULL, 200.00, 12592.00, '2021-02-07 13:45:39', '2021-02-07 13:45:39'),
(2, 3, 21667.00, 8667.00, 1600.00, 1200.00, 1040.00, 1400.00, 2000.00, 591.00, 1800.00, 1800.00, NULL, 200.00, 12592.00, '2021-02-07 13:46:41', '2021-02-07 13:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `employee_timesheet`
--

CREATE TABLE `employee_timesheet` (
  `timesheet_id` int(11) NOT NULL,
  `t_employee_id` int(11) DEFAULT NULL,
  `month` text DEFAULT NULL,
  `year` text NOT NULL DEFAULT 'NULL',
  `working_days` int(11) DEFAULT NULL,
  `leave_days` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_timesheet`
--

INSERT INTO `employee_timesheet` (`timesheet_id`, `t_employee_id`, `month`, `year`, `working_days`, `leave_days`, `created_at`, `updated_at`) VALUES
(1, 1, 'January', '2021', 25, 6, '2021-02-08 03:39:39', '2021-02-08 03:39:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_payroll`
--
ALTER TABLE `employee_payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `employee_timesheet`
--
ALTER TABLE `employee_timesheet`
  ADD PRIMARY KEY (`timesheet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_payroll`
--
ALTER TABLE `employee_payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_timesheet`
--
ALTER TABLE `employee_timesheet`
  MODIFY `timesheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
