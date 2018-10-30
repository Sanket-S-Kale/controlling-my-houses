-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 06:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmh`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `expense_info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `house_id`, `type_id`, `amount`, `is_deleted`, `created_date`, `modified_by`, `created_by`, `modified_date`, `expense_info`) VALUES
(1, 1, 1, '330', 1, '2018-04-08', 4, 4, '2018-04-08', 'House tax for the house'),
(2, 1, 4, '200', 1, '2018-04-08', 4, 4, '2018-04-08', 'Repair for broken glass'),
(3, 1, 3, '400', 1, '2018-04-01', 1, 4, '2018-04-30', 'Monthly electricity bill'),
(4, 1, 1, '600', 0, '2018-04-08', 4, 4, '2018-04-08', 'Yearly tax bill'),
(5, 1, 3, '123', 0, '2018-04-29', 1, 1, '2018-04-29', 'New Expense'),
(6, 2, 1, '2342', 0, '2018-04-30', 1, 1, '2018-04-30', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`type_id`, `type_name`, `description`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Tax', 'House tax to be paid', 0, 2, '2018-04-08', 1, '2018-04-08'),
(2, 'Maintenance', 'Amount spent on house maintenance', 1, 2, '2018-04-08', 2, '2018-04-08'),
(3, 'electricity_bill', 'amount of electricity bill', 1, 2, '2018-04-08', 2, '2018-04-08'),
(4, 'Repair', 'Repairing damaged parts', 0, 2, '2018-04-08', 2, '2018-04-08'),
(5, 'Rent', 'Rent received for the house', 0, 2, '2018-04-08', 2, '2018-04-02'),
(6, 'Flooring', 'flooring repair', 0, 2, '0000-00-00', 2, '0000-00-00'),
(7, 'Insurance', 'Home insurance amount', 0, 2, '0000-00-00', 2, '0000-00-00'),
(8, 'Wifi', 'Wifi Amount', 1, 2, '0000-00-00', 2, '0000-00-00'),
(9, 'Tax', 'Test Tax', 1, 1, '2018-04-30', 1, '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `accountant_id` int(11) NOT NULL,
  `house_name` varchar(45) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `initial_cost` decimal(10,0) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` int(50) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `owner_id`, `accountant_id`, `house_name`, `street`, `city`, `state`, `zip_code`, `initial_cost`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 4, 3, 'Meadow Run', '425, South Oak Street', 'Arlington', 'Texas', '76010', '7000', 1, 4, '2018-04-08', 4, '2018-04-08'),
(2, 1, 3, 'Arbor Oaks', '108, Greek Row Drive', 'Arlington', 'Texas', '76010', '9000', 0, 1, '2018-04-08', 1, '2018-04-08'),
(3, 4, 3, 'Timber Brooks', '220, Lincoln Drive', 'Arlington', 'Texas', '76010', '6000', 1, 4, '2018-04-08', 4, '2018-04-08'),
(4, 1, 3, 'Greek House', '500, Randol  Mill Road', 'Arlington', 'Texas', '76010', '4000', 1, 1, '2018-04-08', 1, '2018-04-08'),
(5, 4, 3, 'Centennial Court Apartment', '700 W Mitchell Street', 'Arlington', 'Texas', '76013', '50000', 1, 1, '2018-04-29', 1, '2018-04-29'),
(6, 4, 3, 'Vintage Pads', '426, Randoll Mill Road', 'Arlington', 'Texas', '76013', '8000', 1, 1, '2018-04-30', 1, '2018-04-30'),
(7, 1, 3, 'Garden Club', '333 summit avenue, Apt #324', 'Arlington', 'TX', '76013', '40000', 1, 1, '2018-04-30', 1, '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `payment_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `house_id`, `type_id`, `amount`, `is_deleted`, `created_by`, `created_date`, `modified_by`, `modified_date`, `payment_info`) VALUES
(1, 2, 5, '600', 0, 1, '2018-04-08', 1, '2018-04-08', ''),
(2, 3, 5, '400', 0, 4, '2018-04-08', 4, '2018-04-08', ''),
(3, 1, 5, '700', 0, 4, '2018-04-08', 4, '2018-04-08', ''),
(4, 4, 5, '300', 1, 1, '2018-04-08', 1, '2018-04-08', ''),
(5, 4, 5, '2343', 0, 1, '2018-04-30', 1, '2018-04-30', 'rest'),
(6, 4, 5, '2343', 0, 1, '2018-04-30', 1, '2018-04-30', 'rent'),
(7, 4, 5, '1', 0, 1, '2018-04-30', 1, '2018-04-30', 'refxb'),
(8, 4, 1, '896', 0, 1, '2018-04-30', 1, '2018-04-30', 'New Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modofied_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`type_id`, `type_name`, `description`, `is_active`, `created_by`, `created_date`, `modified_by`, `modofied_date`) VALUES
(5, 'Rent', 'rent', 1, 5, '2018-04-29', 5, '2018-04-29'),
(1, 'Deposit', 'Deposit', 1, 5, '2018-04-29', 1, '2018-04-29'),
(1, 'Deposit', 'Deposit', 1, 5, '2018-04-29', 1, '2018-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL,
  `role_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'admin', 'admin role'),
(2, 'Owner', 'Owner of houses, adds houses'),
(3, 'accountant', 'manage expenses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `fname`, `lname`, `password`, `role_id`, `created_date`) VALUES
(1, 'rkatta', 'rohitkatta517@gmail.com', 'Rohit', 'Katta', 'rkatta11', 2, '2018-04-08'),
(2, 'shashmani', 'sajjad.hashmani@gmail.com', 'Sajjad', 'Hashmani', 'shashmani11', 1, '2018-04-08'),
(3, 'skale', 'skal2@mavs.uta.edu', 'Sanket', 'Kale', 'skale11', 3, '2018-04-08'),
(4, 'rnikam', 'rnikam@uta.edu', 'Rutuja', 'Nikam', 'rnikam11', 2, '2018-04-08'),
(5, 'admin123', 'saik1992@yahoo.com', 'Rohit', 'Katta', '123', 2, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `accountant_id` (`accountant_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `house` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `expense_types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `expenses_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD CONSTRAINT `expense_types_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `expense_types_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_ibfk_2` FOREIGN KEY (`accountant_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `house` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `expense_types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_4` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD CONSTRAINT `payment_types_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `payment_types_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
