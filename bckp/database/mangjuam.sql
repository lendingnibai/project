-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 08:17 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangjuam`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklists`
--

CREATE TABLE `blacklists` (
  `blacklist_id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrower_id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`borrower_id`, `user_account_id`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 0, '2018-12-19 21:35:35', '2018-12-21 23:07:20'),
(2, 2, 1, '2018-12-19 23:47:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrower_monthly_repayments`
--

CREATE TABLE `borrower_monthly_repayments` (
  `borrower_monthly_repayment_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loan_application_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `monthly_repayment` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `penalty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `penalty_paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rebate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `due_date` datetime NOT NULL,
  `is_passed_due_date` int(11) NOT NULL DEFAULT '0' COMMENT '1 = passed due date\n0 = not yet',
  `is_fully_paid` int(11) NOT NULL DEFAULT '0' COMMENT '1 = fully paid\n0 = not fully paid\n',
  `is_notified` int(11) NOT NULL DEFAULT '0' COMMENT '1 = borrower notified\n0 = not yet',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1= active\n0 = end term',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrower_monthly_repayments`
--

INSERT INTO `borrower_monthly_repayments` (`borrower_monthly_repayment_id`, `borrower_id`, `loan_id`, `loan_application_id`, `registered_brgy_id`, `reference_code`, `monthly_repayment`, `amount_paid`, `penalty`, `penalty_paid`, `rebate`, `due_date`, `is_passed_due_date`, `is_fully_paid`, `is_notified`, `status`, `date_created`, `date_updated`) VALUES
(21, 2, 11, 11, 1, '177ALE8096BRWR18', '6250.00', '6250.00', '0.00', '0.00', '31.25', '2019-01-27 21:43:17', 0, 1, 0, 1, '2018-12-27 21:43:17', '2018-12-27 21:54:12'),
(22, 2, 11, 11, 1, '177ALE8096BRWR18', '6250.00', '6250.00', '0.00', '0.00', '31.25', '2019-02-27 21:43:17', 0, 1, 0, 1, '2018-12-27 21:43:17', '2018-12-27 21:54:12'),
(23, 2, 12, 12, 1, '397ALE4886BRWR18', '4480.00', '4480.00', '0.00', '0.00', '22.40', '2019-01-27 22:34:13', 0, 1, 0, 1, '2018-12-27 22:34:13', '2018-12-27 22:36:10'),
(24, 2, 12, 12, 1, '397ALE4886BRWR18', '4480.00', '4480.00', '0.00', '0.00', '22.40', '2019-02-27 22:34:13', 0, 1, 0, 1, '2018-12-27 22:34:13', '2018-12-27 22:36:10'),
(25, 2, 12, 12, 1, '397ALE4886BRWR18', '4480.00', '4480.00', '0.00', '0.00', '22.40', '2019-03-27 22:34:13', 0, 1, 0, 1, '2018-12-27 22:34:13', '2018-12-27 22:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `borrower_transactions`
--

CREATE TABLE `borrower_transactions` (
  `borrower_transaction_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `reference_code` varchar(45) NOT NULL,
  `from_brgy_id` int(11) NOT NULL,
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'cash in',
  `debit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'cash out',
  `type` varchar(45) NOT NULL COMMENT '1 = loan\n2 = payment\n3 = withdraw savings/rebates\n',
  `type_code` int(11) NOT NULL DEFAULT '1' COMMENT '1 = payment\n2 = withdraw sa savings',
  `outstanding_balance` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrower_transactions`
--

INSERT INTO `borrower_transactions` (`borrower_transaction_id`, `borrower_id`, `loan_id`, `payment_id`, `reference_code`, `from_brgy_id`, `credit`, `debit`, `type`, `type_code`, `outstanding_balance`) VALUES
(1, 2, 11, NULL, '177ALE8096BRWR18', 1, '0.00', '10000.00', 'Loan', 1, '10000.00'),
(2, 2, NULL, 1, '177ALE8096BRWR18', 1, '12500.00', '0.00', 'Payment', 2, '-2500.00'),
(3, 2, 12, NULL, '397ALE4886BRWR18', 1, '0.00', '12000.00', 'Loan', 1, '9500.00'),
(4, 2, NULL, 2, '397ALE4886BRWR18', 1, '13440.00', '0.00', 'Payment', 2, '-3940.00');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_accounts`
--

CREATE TABLE `brgy_accounts` (
  `brgy_account_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_type` varchar(45) NOT NULL DEFAULT 'brgy_admin',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brgy_accounts`
--

INSERT INTO `brgy_accounts` (`brgy_account_id`, `registered_brgy_id`, `email`, `username`, `password`, `user_type`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 'bsitcabua@gmail.com', 'mj2018bsitcabua_439', '4f064dffa0dc976194cd7657703ddf2e', 'brgy_admin', 1, '2018-12-19 21:18:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brgy_earnings`
--

CREATE TABLE `brgy_earnings` (
  `brgy_earning_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `earning` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brgy_staff_accounts`
--

CREATE TABLE `brgy_staff_accounts` (
  `brgy_staff_account_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_type` varchar(45) NOT NULL DEFAULT 'brgy_staff',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brgy_user_details`
--

CREATE TABLE `brgy_user_details` (
  `brgy_user_detail_id` int(11) NOT NULL,
  `brgy_account_id` int(11) DEFAULT NULL,
  `brgy_staff_account_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `position` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `spouse_name` varchar(45) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL COMMENT 'User Photo',
  `mobile_no` varchar(15) NOT NULL,
  `tel_no` varchar(10) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `barangay` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state_prov` varchar(45) NOT NULL,
  `zip_code` varchar(45) NOT NULL,
  `oor` varchar(45) DEFAULT NULL COMMENT 'Ownership of residence\nyes = 1\nno = 0',
  `gov_id` varchar(255) DEFAULT NULL COMMENT 'photo',
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brgy_user_details`
--

INSERT INTO `brgy_user_details` (`brgy_user_detail_id`, `brgy_account_id`, `brgy_staff_account_id`, `first_name`, `middle_name`, `last_name`, `position`, `gender`, `dob`, `civil_status`, `spouse_name`, `photo`, `mobile_no`, `tel_no`, `street`, `barangay`, `city`, `state_prov`, `zip_code`, `oor`, `gov_id`, `is_completed`, `date_created`, `date_updated`) VALUES
(1, 1, NULL, 'EM', 'Dela Cerna', 'Cabua', 'Barangay Captain', 'Male', '1992-08-26', 'Maried', 'Angel Locsin', 'public/uploads/super_admin/registered_brgy/71.jpg', '09322996632', '1234567', 'Englis St.', 'Guadalupe', 'Cebu City', 'Cebu', '6000', 'Owned', 'public/uploads/barangay/gov_ids/DELA_CRUZ_JOHN_ALARCON.jpg', 1, '2018-12-19 21:18:01', '2018-12-19 21:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `default`
--

CREATE TABLE `default` (
  `default_id` int(11) NOT NULL,
  `super_admin_id` int(11) NOT NULL,
  `min_loan` decimal(10,2) NOT NULL DEFAULT '1000.00',
  `max_loan` decimal(10,2) NOT NULL DEFAULT '12000.00',
  `min_invest` decimal(10,2) NOT NULL DEFAULT '10000.00',
  `max_invest` decimal(10,2) NOT NULL DEFAULT '50000.00',
  `min_loan_rate` varchar(10) NOT NULL DEFAULT '6' COMMENT '6%',
  `max_loan_rate` varchar(10) NOT NULL DEFAULT '25' COMMENT '25%',
  `min_invest_rate` varchar(10) NOT NULL DEFAULT '20' COMMENT '20%',
  `max_invest_rate` varchar(10) NOT NULL DEFAULT '24' COMMENT '24%',
  `max_rebate_rate` varchar(10) NOT NULL DEFAULT '1',
  `min_rebate_rate` varchar(10) NOT NULL DEFAULT '0.5',
  `max_penalty_rate` varchar(10) NOT NULL DEFAULT '1.5',
  `min_penalty_rate` varchar(10) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `default`
--

INSERT INTO `default` (`default_id`, `super_admin_id`, `min_loan`, `max_loan`, `min_invest`, `max_invest`, `min_loan_rate`, `max_loan_rate`, `min_invest_rate`, `max_invest_rate`, `max_rebate_rate`, `min_rebate_rate`, `max_penalty_rate`, `min_penalty_rate`, `date_created`, `date_updated`) VALUES
(1, 1, '1000.00', '12000.00', '10000.00', '50000.00', '6', '25', '20', '22', '1', '0.5', '1.5', '1', '2018-11-23 13:43:25', '2018-12-17 22:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `expense_type` varchar(100) NOT NULL,
  `expense_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `accepted_by` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '5',
  `is_hidden` int(11) NOT NULL DEFAULT '1' COMMENT 'hidden = 1\n!hidden = 0',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `investment_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `investment_application_id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `interest_rate` varchar(10) NOT NULL COMMENT 'percentage',
  `invest_amount` decimal(10,2) NOT NULL,
  `invest_term` int(11) NOT NULL DEFAULT '1' COMMENT 'term by year',
  `interest_return` decimal(10,2) NOT NULL COMMENT 'total interest',
  `monthly_return` decimal(10,2) NOT NULL,
  `total_return` decimal(10,2) NOT NULL,
  `end_term` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active =1\ninactive/ended= 0',
  `is_ended` int(11) NOT NULL DEFAULT '0' COMMENT '1 = ended\n0 = not yet',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`investment_id`, `lender_id`, `registered_brgy_id`, `investment_application_id`, `reference_code`, `interest_rate`, `invest_amount`, `invest_term`, `interest_return`, `monthly_return`, `total_return`, `end_term`, `status`, `is_ended`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 1, '959EMC4887LNDR18', '22', '20000.00', 3, '4400.00', '122.22', '24400.00', '2021-12-19 22:53:39', 1, 0, '2018-12-19 22:53:39', '2018-12-23 14:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `investment_applications`
--

CREATE TABLE `investment_applications` (
  `investment_application_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `invest_amount` decimal(10,2) NOT NULL,
  `invest_term` int(11) NOT NULL COMMENT '1= 1 year\n2= 2 years\n3=3 years',
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `payment_options` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0\n',
  `is_accepted` int(11) NOT NULL DEFAULT '0' COMMENT '0 = for approval\n1 = accepted\n2 = rejected\n3 = completed',
  `is_funded` int(11) NOT NULL DEFAULT '0' COMMENT 'funded =1\n!funded = 0',
  `note` varchar(255) DEFAULT NULL COMMENT 'for rejection',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investment_applications`
--

INSERT INTO `investment_applications` (`investment_application_id`, `lender_id`, `registered_brgy_id`, `reference_code`, `full_name`, `invest_amount`, `invest_term`, `mobile_no`, `email`, `address`, `payment_options`, `status`, `is_accepted`, `is_funded`, `note`, `date_created`, `date_updated`) VALUES
(1, 1, 1, '959EMC4887LNDR18', 'Piolo Doe Askal', '20000.00', 3, '09322996632', 'emcabua@gmail.com', 'Brgy. Guadalupe Englis V.rama Cebu Cebu City', 'Barangay', 1, 3, 1, 'Thanks for investing!', '2018-12-19 22:52:04', '2018-12-19 22:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `investment_requirements`
--

CREATE TABLE `investment_requirements` (
  `investment_requirement_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `investment_application_id` int(11) NOT NULL,
  `source_of_income` varchar(45) NOT NULL,
  `monthly_income` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gov_id` varchar(255) NOT NULL COMMENT 'Photo',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investment_requirements`
--

INSERT INTO `investment_requirements` (`investment_requirement_id`, `lender_id`, `registered_brgy_id`, `investment_application_id`, `source_of_income`, `monthly_income`, `gov_id`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 1, 'Business', '10000.00', 'public/uploads/main_user/lender/req/gov_ids/PASCUAL_PIOLO.JPG', '2018-12-19 22:52:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invest_interest_rate`
--

CREATE TABLE `invest_interest_rate` (
  `invest_interest_rate_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `one_year` varchar(10) NOT NULL DEFAULT '20' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 20%',
  `two_year` varchar(10) NOT NULL DEFAULT '21',
  `three_year` varchar(10) NOT NULL DEFAULT '22',
  `four_year` varchar(10) NOT NULL DEFAULT '23',
  `five_year` varchar(10) NOT NULL DEFAULT '24',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invest_interest_rate`
--

INSERT INTO `invest_interest_rate` (`invest_interest_rate_id`, `brgy_account_id`, `one_year`, `two_year`, `three_year`, `four_year`, `five_year`, `date_created`, `date_updated`) VALUES
(1, 1, '20', '21', '22', '23', '22', '2018-12-19 21:32:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lender`
--

CREATE TABLE `lender` (
  `lender_id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lender`
--

INSERT INTO `lender` (`lender_id`, `user_account_id`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 1, '2018-12-19 22:21:25', '2018-12-21 23:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `lender_monthly_returns`
--

CREATE TABLE `lender_monthly_returns` (
  `lender_monthly_return_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `investment_id` int(11) NOT NULL,
  `investment_application_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `monthly_return` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_returned` int(11) NOT NULL DEFAULT '0' COMMENT '1 = returned\n0 = not yet',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = active\n0 = end term or returned already',
  `date_return` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lender_monthly_returns`
--

INSERT INTO `lender_monthly_returns` (`lender_monthly_return_id`, `lender_id`, `investment_id`, `investment_application_id`, `registered_brgy_id`, `reference_code`, `monthly_return`, `is_returned`, `status`, `date_return`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 1, 0, '2018-01-19 22:53:39', '2018-12-19 22:53:39', '2018-12-19 23:00:21'),
(2, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-02-19 22:53:39', '2018-12-19 22:53:39', NULL),
(3, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-03-19 22:53:39', '2018-12-19 22:53:39', NULL),
(4, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-04-19 22:53:39', '2018-12-19 22:53:39', NULL),
(5, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-05-19 22:53:39', '2018-12-19 22:53:39', NULL),
(6, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-06-19 22:53:39', '2018-12-19 22:53:39', NULL),
(7, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-07-19 22:53:39', '2018-12-19 22:53:39', NULL),
(8, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-08-19 22:53:39', '2018-12-19 22:53:39', NULL),
(9, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-09-19 22:53:39', '2018-12-19 22:53:39', NULL),
(10, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-10-19 22:53:39', '2018-12-19 22:53:39', NULL),
(11, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-11-19 22:53:39', '2018-12-19 22:53:39', NULL),
(12, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2019-12-19 22:53:39', '2018-12-19 22:53:39', NULL),
(13, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-01-19 22:53:39', '2018-12-19 22:53:39', NULL),
(14, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-02-19 22:53:39', '2018-12-19 22:53:39', NULL),
(15, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-03-19 22:53:39', '2018-12-19 22:53:39', NULL),
(16, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-04-19 22:53:39', '2018-12-19 22:53:39', NULL),
(17, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-05-19 22:53:39', '2018-12-19 22:53:39', NULL),
(18, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-06-19 22:53:39', '2018-12-19 22:53:39', NULL),
(19, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-07-19 22:53:39', '2018-12-19 22:53:39', NULL),
(20, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-08-19 22:53:39', '2018-12-19 22:53:39', NULL),
(21, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-09-19 22:53:39', '2018-12-19 22:53:39', NULL),
(22, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-10-19 22:53:39', '2018-12-19 22:53:39', NULL),
(23, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-11-19 22:53:39', '2018-12-19 22:53:39', NULL),
(24, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2020-12-19 22:53:39', '2018-12-19 22:53:39', NULL),
(25, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-01-19 22:53:39', '2018-12-19 22:53:39', NULL),
(26, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-02-19 22:53:39', '2018-12-19 22:53:39', NULL),
(27, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-03-19 22:53:39', '2018-12-19 22:53:39', NULL),
(28, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-04-19 22:53:39', '2018-12-19 22:53:39', NULL),
(29, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-05-19 22:53:39', '2018-12-19 22:53:39', NULL),
(30, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-06-19 22:53:39', '2018-12-19 22:53:39', NULL),
(31, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-07-19 22:53:39', '2018-12-19 22:53:39', NULL),
(32, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-08-19 22:53:39', '2018-12-19 22:53:39', NULL),
(33, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-09-19 22:53:39', '2018-12-19 22:53:39', NULL),
(34, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-10-19 22:53:39', '2018-12-19 22:53:39', NULL),
(35, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-11-19 22:53:39', '2018-12-19 22:53:39', NULL),
(36, 1, 1, 1, 1, '959EMC4887LNDR18', '122.22', 0, 1, '2021-12-19 22:53:39', '2018-12-19 22:53:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lender_transactions`
--

CREATE TABLE `lender_transactions` (
  `lender_transaction_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `investment_id` int(11) DEFAULT NULL,
  `withdrawal_id` int(11) DEFAULT NULL,
  `reference_code` varchar(50) NOT NULL,
  `from_brgy_id` int(11) NOT NULL COMMENT 'registered_brgy_id',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'cash in',
  `debit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'cash out',
  `type` varchar(45) NOT NULL COMMENT 'Monthly Return\nPayout/Withdraw\nCapital Investment Return',
  `type_code` int(11) NOT NULL COMMENT '1 = capital investment returned\n2 = monthly returned\n3 = withdrawal',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lender_transactions`
--

INSERT INTO `lender_transactions` (`lender_transaction_id`, `lender_id`, `investment_id`, `withdrawal_id`, `reference_code`, `from_brgy_id`, `credit`, `debit`, `type`, `type_code`, `balance`, `date_created`, `date_updated`) VALUES
(1, 1, 1, NULL, '959EMC4887LNDR18', 1, '122.22', '0.00', 'Monthly Return', 2, '122.22', '2018-12-19 23:00:21', NULL),
(2, 1, NULL, 1, '527EMC5655WDRW18', 1, '0.00', '122.22', 'Withdraw', 3, '0.00', '2018-12-19 23:40:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `loan_application_id` int(11) NOT NULL,
  `reference_code` varchar(20) NOT NULL,
  `interest_rate` varchar(10) NOT NULL COMMENT 'percentage',
  `loan_amount` decimal(10,2) NOT NULL,
  `loan_term` int(11) NOT NULL COMMENT 'by month',
  `interest_repayment` decimal(10,2) NOT NULL COMMENT 'total interest to be paid',
  `monthly_repayment` decimal(10,2) NOT NULL,
  `total_repayment` decimal(10,2) NOT NULL COMMENT 'total repayment = interest repaymnt + loan amount',
  `penalty_rate` varchar(10) NOT NULL,
  `rebate_rate` varchar(10) NOT NULL,
  `end_term` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'ongoing = 1\ncomplete = 2\nincomplete = 3\n',
  `is_ended` int(11) NOT NULL DEFAULT '0' COMMENT 'ended = 1\n!ended = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `borrower_id`, `registered_brgy_id`, `loan_application_id`, `reference_code`, `interest_rate`, `loan_amount`, `loan_term`, `interest_repayment`, `monthly_repayment`, `total_repayment`, `penalty_rate`, `rebate_rate`, `end_term`, `status`, `is_ended`, `date_created`, `date_updated`) VALUES
(11, 2, 1, 11, '177ALE8096BRWR18', '25', '10000.00', 2, '2500.00', '6250.00', '12500.00', '1', '0.5', '2019-02-27 21:43:17', 2, 0, '2018-12-27 21:43:17', '2018-12-27 21:54:12'),
(12, 2, 1, 12, '397ALE4886BRWR18', '12', '12000.00', 3, '1440.00', '4480.00', '13440.00', '1', '0.5', '2019-03-27 22:34:13', 2, 0, '2018-12-27 22:34:13', '2018-12-27 22:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `loan_application_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `loan_term` int(11) NOT NULL COMMENT 'by month',
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `is_released` int(11) NOT NULL DEFAULT '0' COMMENT '1 = released\n0 != released',
  `is_accepted` int(11) NOT NULL DEFAULT '0' COMMENT '0 = for approval\n1 = accepted\n2 = rejected\n3 = completed',
  `co_maker_1` int(11) DEFAULT NULL COMMENT 'lender_id',
  `co_maker_2` int(11) DEFAULT NULL COMMENT 'lender_id',
  `note` varchar(100) DEFAULT NULL COMMENT 'for rejection',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0\n',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_applications`
--

INSERT INTO `loan_applications` (`loan_application_id`, `registered_brgy_id`, `borrower_id`, `reference_code`, `full_name`, `loan_amount`, `loan_term`, `mobile_no`, `email`, `address`, `is_released`, `is_accepted`, `co_maker_1`, `co_maker_2`, `note`, `status`, `date_created`, `date_updated`) VALUES
(11, 1, 2, '177ALE8096BRWR18', 'Joseph Vincent Doe Alesna', '10000.00', 2, '09322996632', 'alesna@gmail.com', 'Brgy. Guadalupe Guaduajara Cebu Cebu City', 1, 3, 1, 0, 'Loan released!', 1, '2018-12-27 21:42:46', '2018-12-27 21:43:17'),
(12, 1, 2, '397ALE4886BRWR18', 'Joseph Vincent Doe Alesna', '12000.00', 3, '09322996632', 'alesna@gmail.com', 'Brgy. Guadalupe Guaduajara Cebu Cebu City', 1, 3, 1, 0, 'Loan released!', 1, '2018-12-27 22:33:10', '2018-12-27 22:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `loan_interest_rate`
--

CREATE TABLE `loan_interest_rate` (
  `loan_interest_rate_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `one_mo` varchar(10) NOT NULL DEFAULT '8' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 8%',
  `two_mo` varchar(10) NOT NULL DEFAULT '10' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 10%',
  `three_mo` varchar(10) NOT NULL DEFAULT '12' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 12%',
  `four_mo` varchar(10) NOT NULL DEFAULT '14' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 14%',
  `five_mo` varchar(10) NOT NULL DEFAULT '16' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 16%',
  `six_mo` varchar(10) NOT NULL DEFAULT '18' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 18%',
  `seven_mo` varchar(10) NOT NULL DEFAULT '20' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 20%',
  `eight_mo` varchar(10) NOT NULL DEFAULT '22' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 22%',
  `nine_mo` varchar(10) NOT NULL DEFAULT '24' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 24%',
  `ten_mo` varchar(10) NOT NULL DEFAULT '26' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 26%',
  `eleven_mo` varchar(10) NOT NULL DEFAULT '28' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 28%',
  `twelve_mo` varchar(10) NOT NULL DEFAULT '30' COMMENT 'selected = 1 or >\n!selected = null or zero\ndefault 30%',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_interest_rate`
--

INSERT INTO `loan_interest_rate` (`loan_interest_rate_id`, `brgy_account_id`, `one_mo`, `two_mo`, `three_mo`, `four_mo`, `five_mo`, `six_mo`, `seven_mo`, `eight_mo`, `nine_mo`, `ten_mo`, `eleven_mo`, `twelve_mo`, `date_created`, `date_updated`) VALUES
(1, 1, '6', '25', '12', '14', '16', '18', '20', '22', '24', '26', '28', '30', '2018-12-19 21:32:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_requirements`
--

CREATE TABLE `loan_requirements` (
  `loan_requirement_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `loan_application_id` int(11) NOT NULL,
  `source_of_income` varchar(45) NOT NULL,
  `monthly_income` decimal(10,2) NOT NULL,
  `gov_id` varchar(255) NOT NULL COMMENT 'photo',
  `water_elect_bill` varchar(255) NOT NULL COMMENT 'photo',
  `brgy_permit` varchar(255) DEFAULT NULL,
  `mayor_permit` varchar(255) DEFAULT NULL,
  `payslip` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_requirements`
--

INSERT INTO `loan_requirements` (`loan_requirement_id`, `borrower_id`, `registered_brgy_id`, `loan_application_id`, `source_of_income`, `monthly_income`, `gov_id`, `water_elect_bill`, `brgy_permit`, `mayor_permit`, `payslip`, `date_created`, `date_updated`) VALUES
(11, 2, 1, 11, 'Business', '10000.00', 'public/uploads/main_user/borrower/req/all/National-ID8.jpg', 'public/uploads/main_user/borrower/req/all/11989.png', 'public/uploads/main_user/borrower/req/all/brgy_ordinance11.jpg', NULL, NULL, '2018-12-27 21:42:46', NULL),
(12, 2, 1, 12, 'Business', '10000.00', 'public/uploads/main_user/borrower/req/all/National-ID9.jpg', 'public/uploads/main_user/borrower/req/all/119810.png', 'public/uploads/main_user/borrower/req/all/brgy_ordinance12.jpg', NULL, NULL, '2018-12-27 22:33:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `super_admin_id` int(11) DEFAULT NULL,
  `brgy_account_id` int(11) DEFAULT NULL,
  `brgy_staff_account_id` int(11) DEFAULT NULL,
  `user_account_id` int(11) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `user_agent` varchar(100) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL COMMENT 'super admin\nbarangay admin\nlender\nborrower\n',
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `super_admin_id`, `brgy_account_id`, `brgy_staff_account_id`, `user_account_id`, `action`, `user_agent`, `platform`, `user_type`, `date_time`) VALUES
(1, 1, NULL, NULL, NULL, 'Logged out', 'Chrome version 70.0.3538.102', 'Windows 10', 'super_admin', '2018-11-23 13:43:36'),
(2, 1, NULL, NULL, NULL, 'Logged in', 'Chrome version 70.0.3538.102', 'Windows 10', 'super_admin', '2018-11-23 13:43:41'),
(4, 1, NULL, NULL, NULL, 'Super admin added new barangay (Gudalupe)', 'Chrome version 70.0.3538.102', 'Windows 10', 'super_admin', '2018-11-23 13:45:35'),
(5, 1, NULL, NULL, NULL, 'Super admin added new barangay (Calamba)', 'Chrome version 70.0.3538.102', 'Windows 10', 'super_admin', '2018-11-23 13:47:15'),
(16, 1, NULL, NULL, NULL, 'Logged out', 'Chrome version 70.0.3538.102', 'Windows 10', 'super_admin', '2018-11-23 14:20:22'),
(170, 1, NULL, NULL, NULL, 'Logged in', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 14:47:45'),
(171, 1, NULL, NULL, NULL, 'Super admin added new barangay (Pasil)', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 15:34:43'),
(172, 1, NULL, NULL, NULL, 'Logged out', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 15:35:18'),
(175, 1, NULL, NULL, NULL, 'Logged in', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 15:40:23'),
(176, 1, NULL, NULL, NULL, 'Super admin added new barangay (Minapla)', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 15:41:58'),
(177, 1, NULL, NULL, NULL, 'Logged out', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 15:42:12'),
(181, 1, NULL, NULL, NULL, 'Logged in', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 15:47:24'),
(184, 1, NULL, NULL, NULL, 'Logged in', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 20:57:59'),
(185, 1, NULL, NULL, NULL, 'Super admin added new barangay (Gudalupe)', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 20:59:43'),
(186, 1, NULL, NULL, NULL, 'Super admin added new barangay (Gudalupe)', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 21:01:48'),
(187, 1, NULL, NULL, NULL, 'Logged out', 'Chrome version 70.0.3538.110', 'Windows 10', 'super_admin', '2018-11-30 21:02:02'),
(478, NULL, NULL, NULL, NULL, 'Monthly repayment penlaty 435ELV4568BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-17 23:50:56'),
(483, NULL, NULL, NULL, NULL, 'Monthly repayment penlaty 435ELV4568BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-18 00:37:49'),
(484, NULL, NULL, NULL, NULL, 'Monthly repayment penlaty 435ELV4568BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-18 00:37:49'),
(491, NULL, NULL, NULL, NULL, 'Monthly repayment penlaty 435ELV4568BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-19 00:25:39'),
(492, NULL, NULL, NULL, NULL, 'Monthly repayment penlaty 435ELV4568BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-19 00:26:35'),
(493, NULL, NULL, NULL, NULL, 'Monthly repayment penlaty 435ELV4568BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-19 00:27:25'),
(494, 1, NULL, NULL, NULL, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'super_admin', '2018-12-19 21:02:36'),
(495, 1, NULL, NULL, NULL, 'Super admin added new barangay (Guadalupe)', 'Chrome version 71.0.3578.98', 'Windows 10', 'super_admin', '2018-12-19 21:11:17'),
(496, 1, NULL, NULL, NULL, 'Super admin added new barangay (Guadalupe)', 'Chrome version 71.0.3578.98', 'Windows 10', 'super_admin', '2018-12-19 21:18:01'),
(497, NULL, 1, NULL, NULL, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 21:20:27'),
(498, NULL, 1, NULL, NULL, 'Brgy admin account updated a profile', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 21:32:09'),
(499, 1, NULL, NULL, NULL, 'Logged out', 'Chrome version 71.0.3578.98', 'Windows 10', 'super_admin', '2018-12-19 21:34:43'),
(500, NULL, NULL, NULL, 1, 'New user registered from brgy. Guadalupe', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-19 21:35:36'),
(501, NULL, NULL, NULL, 1, 'Updated incomplete user profile', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-19 21:54:35'),
(502, NULL, 1, NULL, NULL, 'New user was successfully approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 21:54:58'),
(503, NULL, NULL, NULL, 1, 'Main user was switched from borrower to lender', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (lender)', '2018-12-19 22:21:25'),
(504, NULL, NULL, NULL, 1, 'Submitted investment application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-19 22:52:04'),
(505, NULL, 1, NULL, NULL, 'New investment application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 22:52:29'),
(506, NULL, 1, NULL, NULL, 'New investment fund added', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 22:53:49'),
(507, NULL, 1, NULL, NULL, 'Monthly return was added to lender\'s wallet 959EMC4887LNDR18', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 23:00:21'),
(508, NULL, NULL, NULL, 1, 'Request for withdrawal', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-19 23:40:22'),
(509, NULL, 1, NULL, NULL, 'Withdraw cash', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 23:40:52'),
(510, NULL, NULL, NULL, 1, 'Logged out', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (lender)', '2018-12-19 23:46:36'),
(511, NULL, NULL, NULL, 2, 'New user registered from brgy. Guadalupe', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-19 23:47:22'),
(512, NULL, NULL, NULL, 2, 'Updated incomplete user profile', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-19 23:48:33'),
(513, NULL, 1, NULL, NULL, 'New user was successfully approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 23:48:50'),
(514, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-19 23:49:51'),
(515, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 23:50:58'),
(516, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 23:53:05'),
(517, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-19 23:59:21'),
(518, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 23:59:39'),
(519, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-19 23:59:57'),
(520, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-20 01:14:43'),
(521, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-20 01:15:01'),
(522, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-20 01:15:35'),
(523, NULL, NULL, NULL, NULL, 'Monthly repayment penlaty 277ALE3426BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-20 01:23:00'),
(524, NULL, 1, NULL, NULL, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-21 21:45:10'),
(525, NULL, NULL, NULL, 1, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (lender)', '2018-12-21 21:45:21'),
(526, NULL, NULL, NULL, 1, 'Main user was switched from lender to borrower', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-21 21:46:01'),
(527, NULL, NULL, NULL, 1, 'Main user was switched from borrower to lender', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (lender)', '2018-12-21 23:07:20'),
(528, NULL, NULL, NULL, 1, 'Logged out', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (lender)', '2018-12-21 23:07:24'),
(529, NULL, NULL, NULL, 2, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-21 23:07:36'),
(530, NULL, 1, NULL, NULL, 'Monthly repayment penlaty 277ALE3426BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-21 23:12:17'),
(531, NULL, 1, NULL, NULL, 'Monthly repayment penlaty 277ALE3426BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-21 23:12:58'),
(532, NULL, 1, NULL, NULL, 'Monthly repayment penlaty 277ALE3426BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-21 23:13:14'),
(533, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-22 00:00:07'),
(534, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-22 00:09:45'),
(535, NULL, 1, NULL, NULL, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 10:16:39'),
(536, NULL, NULL, NULL, 2, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-23 10:17:04'),
(537, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 10:50:26'),
(538, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 10:57:14'),
(539, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 11:02:32'),
(540, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 11:56:05'),
(541, NULL, NULL, NULL, NULL, 'Loan was ended 277ALE3426BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-23 14:22:50'),
(542, NULL, 1, NULL, NULL, 'Loan was ended 277ALE3426BRWR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-23 14:30:47'),
(543, NULL, 1, NULL, NULL, 'Investment was ended 959EMC4887LNDR18', 'Mangjuam', 'Mangjuam', 'Mangjuam', '2018-12-23 14:31:39'),
(544, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:20:26'),
(545, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:21:21'),
(546, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:23:12'),
(547, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:23:23'),
(548, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:24:44'),
(549, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:25:04'),
(550, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:25:16'),
(551, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:28:06'),
(552, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:28:19'),
(553, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:28:30'),
(554, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:35:01'),
(555, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:35:23'),
(556, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:35:31'),
(557, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:36:18'),
(558, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:36:33'),
(559, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:36:43'),
(560, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:38:58'),
(561, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:39:09'),
(562, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:39:20'),
(563, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-23 15:40:57'),
(564, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:41:10'),
(565, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 15:41:18'),
(566, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 16:30:07'),
(567, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 16:31:53'),
(568, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-23 16:33:02'),
(569, NULL, 1, NULL, NULL, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-26 17:32:10'),
(570, NULL, 1, NULL, NULL, 'Logged out', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-26 17:32:24'),
(571, NULL, NULL, NULL, 2, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-26 17:32:36'),
(572, NULL, 1, NULL, NULL, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-26 21:54:44'),
(573, NULL, 1, NULL, NULL, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-27 20:58:01'),
(574, NULL, NULL, NULL, 2, 'Logged in', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user as (borrower)', '2018-12-27 20:58:28'),
(575, NULL, NULL, NULL, 1, 'Logged in', 'Edge version 17.17134', 'Windows 10', 'main_user as (lender)', '2018-12-27 21:03:55'),
(576, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-27 21:42:46'),
(577, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-27 21:43:04'),
(578, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-27 21:43:17'),
(579, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-27 21:54:12'),
(580, NULL, NULL, NULL, 2, 'Submitted loan application', 'Chrome version 71.0.3578.98', 'Windows 10', 'main_user', '2018-12-27 22:33:10'),
(581, NULL, 1, NULL, NULL, 'New loan application approved', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-27 22:33:52'),
(582, NULL, 1, NULL, NULL, 'New loan released', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-27 22:34:13'),
(583, NULL, 1, NULL, NULL, 'Received payments', 'Chrome version 71.0.3578.98', 'Windows 10', 'brgy_admin', '2018-12-27 22:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `member_requests`
--

CREATE TABLE `member_requests` (
  `member_request_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = pending\n1 = approved\n2 = rejected',
  `memo` varchar(100) DEFAULT 'Waiting for approval',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` longtext NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'deleted = 0\n!deleted = 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `min_max_loan_invest`
--

CREATE TABLE `min_max_loan_invest` (
  `min_max_loan_invest_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `min_loan` decimal(10,2) NOT NULL,
  `max_loan` decimal(10,2) NOT NULL,
  `min_invest` decimal(10,2) NOT NULL,
  `max_invest` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `min_max_loan_invest`
--

INSERT INTO `min_max_loan_invest` (`min_max_loan_invest_id`, `brgy_account_id`, `min_loan`, `max_loan`, `min_invest`, `max_invest`, `date_created`, `date_updated`) VALUES
(1, 1, '1000.00', '12000.00', '10000.00', '50000.00', '2018-12-19 21:32:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_term_borrower`
--

CREATE TABLE `monthly_term_borrower` (
  `monthly_term_borrower_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `one_mo` int(11) NOT NULL DEFAULT '0' COMMENT 'selected = 1\n!selected = 0',
  `two_mo` int(11) NOT NULL DEFAULT '2' COMMENT 'selected = 2\n!selected = 0',
  `three_mo` int(11) NOT NULL DEFAULT '3' COMMENT 'selected = 1\n!selected = 0',
  `four_mo` int(11) NOT NULL DEFAULT '0' COMMENT 'selected = 1\n!selected = 0',
  `five_mo` int(11) NOT NULL DEFAULT '0' COMMENT 'selected = 1\n!selected = 0',
  `six_mo` int(11) NOT NULL DEFAULT '6' COMMENT 'selected = 1\n!selected = 0',
  `seven_mo` int(11) NOT NULL DEFAULT '0' COMMENT 'selected = 1\n!selected = 0',
  `eight_mo` int(11) NOT NULL DEFAULT '0' COMMENT 'selected = 1\n!selected = 0',
  `nine_mo` int(11) NOT NULL DEFAULT '9' COMMENT 'selected = 1\n!selected = 0',
  `ten_mo` int(11) NOT NULL DEFAULT '0' COMMENT 'selected = 1\n!selected = 0',
  `eleven_mo` int(11) NOT NULL DEFAULT '0' COMMENT 'selected = 1\n!selected = 0',
  `twelve_mo` int(11) NOT NULL DEFAULT '12' COMMENT 'selected = 1\n!selected = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_term_borrower`
--

INSERT INTO `monthly_term_borrower` (`monthly_term_borrower_id`, `brgy_account_id`, `one_mo`, `two_mo`, `three_mo`, `four_mo`, `five_mo`, `six_mo`, `seven_mo`, `eight_mo`, `nine_mo`, `ten_mo`, `eleven_mo`, `twelve_mo`, `date_created`, `date_updated`) VALUES
(1, 1, 0, 2, 3, 0, 0, 6, 0, 0, 9, 0, 0, 12, '2018-12-19 21:32:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `super_admin_id` varchar(45) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `brgy_account_id` int(11) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `content` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'unread = 0\nread = 1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT 'payment borrower\npayment co-maker',
  `type_code` int(11) NOT NULL DEFAULT '1' COMMENT '1 = from borrower\n2 = from co-maker',
  `is_with_penalty` int(11) NOT NULL DEFAULT '0' COMMENT '1 = with penalty\n0 = withpuy penalty',
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `borrower_id`, `registered_brgy_id`, `reference_code`, `amount`, `type`, `type_code`, `is_with_penalty`, `status`, `date_created`, `date_updated`) VALUES
(1, 2, 1, '177ALE8096BRWR18', '12500.00', 'Payment Borrower', 1, 0, 1, '2018-12-27 21:54:12', NULL),
(2, 2, 1, '397ALE4886BRWR18', '13440.00', 'Payment Borrower', 1, 0, 1, '2018-12-27 22:36:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rebate_penalty_rate`
--

CREATE TABLE `rebate_penalty_rate` (
  `rebate_penalty_rate_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `penalty_rate` varchar(10) NOT NULL DEFAULT '1',
  `rebate_rate` varchar(10) NOT NULL DEFAULT '0.5',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rebate_penalty_rate`
--

INSERT INTO `rebate_penalty_rate` (`rebate_penalty_rate_id`, `brgy_account_id`, `penalty_rate`, `rebate_rate`, `date_created`, `date_updated`) VALUES
(1, 1, '1', '0.5', '2018-12-19 21:32:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registered_brgy`
--

CREATE TABLE `registered_brgy` (
  `registered_brgy_id` int(11) NOT NULL,
  `super_admin_id` int(11) NOT NULL COMMENT 'FK Link to super_admin',
  `barangay` varchar(45) NOT NULL,
  `brgy_captain` varchar(45) NOT NULL,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `state_prov` varchar(45) NOT NULL,
  `zip_code` varchar(45) NOT NULL,
  `photo_brgy` varchar(255) NOT NULL COMMENT 'Brgy hall picture',
  `photo_docs` varchar(255) NOT NULL COMMENT 'brgy ordinance',
  `mobile_no` varchar(15) NOT NULL,
  `tel_no` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\nstop accepting of loans & investment = 2\ninactive = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registered_brgy`
--

INSERT INTO `registered_brgy` (`registered_brgy_id`, `super_admin_id`, `barangay`, `brgy_captain`, `street`, `city`, `state_prov`, `zip_code`, `photo_brgy`, `photo_docs`, `mobile_no`, `tel_no`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 'Guadalupe', 'EM Dela Cerna Cabua', 'Guada', 'Cebu City', 'Cebu', '6000', 'public/uploads/super_admin/registered_brgy/71.jpg', 'public/uploads/super_admin/registered_brgy/brgy_ordinance1.jpg', '09322996632', '1234567', 1, '2018-12-19 21:18:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `saving_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `super_admin_id` int(11) NOT NULL COMMENT 'super admin id',
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'public/img/admin/profile/default.jpg',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0',
  `user_type` varchar(45) NOT NULL DEFAULT 'super_admin',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`super_admin_id`, `first_name`, `last_name`, `email`, `username`, `password`, `profile`, `status`, `user_type`, `date_created`, `date_updated`) VALUES
(1, 'Mang', 'Juam', 'mangjuamlending@gmail.com', 'mangjuam', 'c0914fec37237926f727e5068e6c9195', 'public/img/admin/profile/default.jpg', 1, 'super_admin', '2018-11-23 13:43:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'cash in',
  `debit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'cash out',
  `reference_code` varchar(50) NOT NULL,
  `withdrawal_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `investment_id` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `type` varchar(45) NOT NULL COMMENT 'withdraw/payout\npayment/payin\nloan\ninvestment\nexpense',
  `type_code` int(11) NOT NULL DEFAULT '0' COMMENT '1 = withdraw/payout\n2= payment/payin\n3 = loan\n4 = investment\n5 = expense',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `registered_brgy_id`, `credit`, `debit`, `reference_code`, `withdrawal_id`, `payment_id`, `loan_id`, `investment_id`, `expense_id`, `type`, `type_code`, `balance`, `date_created`, `date_updated`) VALUES
(1, 1, '20000.00', '0.00', '959EMC4887LNDR18', NULL, NULL, NULL, 1, NULL, 'Investment', 0, '20000.00', '2018-12-19 22:53:39', NULL),
(2, 1, '0.00', '122.22', '527EMC5655WDRW18', 1, NULL, NULL, NULL, NULL, 'Withdraw', 0, '19877.78', '2018-12-19 23:40:51', NULL),
(11, 1, '0.00', '10000.00', '177ALE8096BRWR18', NULL, NULL, 11, NULL, NULL, 'Loan', 3, '9877.78', '2018-12-27 21:43:17', NULL),
(12, 1, '0.00', '12000.00', '397ALE4886BRWR18', NULL, NULL, 12, NULL, NULL, 'Loan', 3, '-2122.22', '2018-12-27 22:34:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_account_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0' COMMENT '1 = verified residence\n0 = !verified\nfor borrower only',
  `is_borrower` int(11) NOT NULL DEFAULT '0' COMMENT 'borrower = 1\n!borrower = 0',
  `is_lender` int(11) NOT NULL DEFAULT '0' COMMENT 'lender = 1\n!lender = 0',
  `user_type` varchar(45) NOT NULL DEFAULT 'main_user',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1\ninactive = 0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_account_id`, `registered_brgy_id`, `email`, `username`, `password`, `is_verified`, `is_borrower`, `is_lender`, `user_type`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 'emcabua@gmail.com', 'emcabua', 'f258f23607880ed0387c8a8d2c56a319', 1, 0, 1, 'main_user', 1, '2018-12-19 21:35:35', '2018-12-21 23:07:19'),
(2, 1, 'alesna@gmail.com', 'alesna', 'a84195a62d46f3854c61398d2aab82d3', 1, 1, 0, 'main_user', 1, '2018-12-19 23:47:21', '2018-12-19 23:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_detail_id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `suffix_name` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `spouse_name` varchar(45) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL COMMENT 'User Photo',
  `mobile_no` varchar(15) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `barangay` varchar(45) NOT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state_prov` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `oor` varchar(45) DEFAULT NULL COMMENT 'Ownership of residence\nyes = 1\nno = 0',
  `gov_id` varchar(255) NOT NULL COMMENT 'photo',
  `url_location` varchar(255) DEFAULT NULL,
  `is_completed` int(11) DEFAULT '0' COMMENT 'required details\nincomplete = 0\ncompleted = 1\n',
  `for_approval` int(11) DEFAULT NULL COMMENT 'for approval = 1\napproved = 0\nrejected = 2\n',
  `reason_message` varchar(255) DEFAULT 'Waiting for approval.',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_detail_id`, `user_account_id`, `first_name`, `middle_name`, `last_name`, `suffix_name`, `gender`, `dob`, `civil_status`, `spouse_name`, `photo`, `mobile_no`, `street`, `barangay`, `city`, `state_prov`, `zip_code`, `oor`, `gov_id`, `url_location`, `is_completed`, `for_approval`, `reason_message`, `date_created`, `date_updated`) VALUES
(1, 1, 'Piolo', 'Doe', 'Askal', NULL, 'Male', '1992-08-26', 'Married', 'Angel Loksi', 'public/img/default_profile/male.jpg', '09322996632', 'Englis V.rama', 'Guadalupe', 'Cebu City', 'Cebu', '6000', 'Owned', 'public/uploads/main_user/gov_ids/PASCUAL_PIOLO.JPG', NULL, 1, 0, 'This is a verified user', '2018-12-19 21:35:35', '2018-12-19 21:54:55'),
(2, 2, 'Joseph Vincent', 'Doe', 'Alesna', NULL, 'Male', '2005-07-06', 'Single', '', 'public/img/default_profile/male.jpg', '09322996632', 'Guaduajara', 'Guadalupe', 'Cebu City', 'Cebu', '6000', 'Living with Relatives', 'public/uploads/main_user/gov_ids/DELA_CRUZ_JOHN_ALARCON.jpg', NULL, 1, 0, 'This is a verified user', '2018-12-19 23:47:21', '2018-12-19 23:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `withdrawal_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `registered_brgy_id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = not yet withdrawn\n1 = withdrawn\n2 = canceled',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`withdrawal_id`, `lender_id`, `registered_brgy_id`, `reference_code`, `amount`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 1, '527EMC5655WDRW18', '122.22', 1, '2018-12-19 23:40:20', '2018-12-19 23:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `yearly_term_lender`
--

CREATE TABLE `yearly_term_lender` (
  `yearly_term_lender_id` int(11) NOT NULL,
  `brgy_account_id` int(11) NOT NULL,
  `one_year` int(11) DEFAULT NULL COMMENT 'selected = 1\n!selected = null',
  `two_year` int(11) DEFAULT NULL COMMENT 'selected = 2\n!selected = null',
  `three_year` int(11) DEFAULT '3' COMMENT 'selected = 3\n!selected = null',
  `four_year` int(11) DEFAULT '4' COMMENT 'selected = 4\n!selected = null',
  `five_year` int(11) DEFAULT '5' COMMENT 'selected = 5\n!selected = null',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yearly_term_lender`
--

INSERT INTO `yearly_term_lender` (`yearly_term_lender_id`, `brgy_account_id`, `one_year`, `two_year`, `three_year`, `four_year`, `five_year`, `date_created`, `date_updated`) VALUES
(1, 1, NULL, NULL, 3, 4, 5, '2018-12-19 21:32:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklists`
--
ALTER TABLE `blacklists`
  ADD PRIMARY KEY (`blacklist_id`),
  ADD KEY `fk_blacklists_brgy_accounts1_idx` (`brgy_account_id`),
  ADD KEY `fk_blacklists_user_accounts1_idx` (`user_account_id`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrower_id`),
  ADD UNIQUE KEY `user_account_id_UNIQUE` (`user_account_id`);

--
-- Indexes for table `borrower_monthly_repayments`
--
ALTER TABLE `borrower_monthly_repayments`
  ADD PRIMARY KEY (`borrower_monthly_repayment_id`),
  ADD KEY `fk_borrower_monthly_repayments_borrower1_idx` (`borrower_id`),
  ADD KEY `fk_borrower_monthly_repayments_loans1_idx` (`loan_id`),
  ADD KEY `fk_borrower_monthly_repayments_loan_applications1_idx` (`loan_application_id`),
  ADD KEY `fk_borrower_monthly_repayments_registered_brgy1_idx` (`registered_brgy_id`);

--
-- Indexes for table `borrower_transactions`
--
ALTER TABLE `borrower_transactions`
  ADD PRIMARY KEY (`borrower_transaction_id`);

--
-- Indexes for table `brgy_accounts`
--
ALTER TABLE `brgy_accounts`
  ADD PRIMARY KEY (`brgy_account_id`,`registered_brgy_id`),
  ADD UNIQUE KEY `brgy_account_id_UNIQUE` (`brgy_account_id`),
  ADD UNIQUE KEY `registered_brgy_id_UNIQUE` (`registered_brgy_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `brgy_earnings`
--
ALTER TABLE `brgy_earnings`
  ADD PRIMARY KEY (`brgy_earning_id`),
  ADD KEY `fk_brgy_earnings_brgy_accounts1_idx` (`brgy_account_id`);

--
-- Indexes for table `brgy_staff_accounts`
--
ALTER TABLE `brgy_staff_accounts`
  ADD PRIMARY KEY (`brgy_staff_account_id`),
  ADD KEY `fk_brgy_staff_accounts_brgy_accounts1_idx` (`brgy_account_id`);

--
-- Indexes for table `brgy_user_details`
--
ALTER TABLE `brgy_user_details`
  ADD PRIMARY KEY (`brgy_user_detail_id`),
  ADD KEY `fk_brgy_user_details_brgy_staff_accounts1_idx` (`brgy_staff_account_id`),
  ADD KEY `fk_brgy_user_details_brgy_accounts1_idx` (`brgy_account_id`);

--
-- Indexes for table `default`
--
ALTER TABLE `default`
  ADD PRIMARY KEY (`default_id`),
  ADD UNIQUE KEY `super_admin_id_UNIQUE` (`super_admin_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `fk_expenses_brgy_accounts1_idx` (`brgy_account_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_feedbacks_user_accounts1_idx` (`user_account_id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`investment_id`),
  ADD UNIQUE KEY `reference_code_UNIQUE` (`reference_code`),
  ADD KEY `fk_investments_lender1_idx` (`lender_id`),
  ADD KEY `fk_investments_registered_brgy1_idx` (`registered_brgy_id`),
  ADD KEY `fk_investments_investment_applications1_idx` (`investment_application_id`);

--
-- Indexes for table `investment_applications`
--
ALTER TABLE `investment_applications`
  ADD PRIMARY KEY (`investment_application_id`),
  ADD UNIQUE KEY `reference_code_UNIQUE` (`reference_code`),
  ADD KEY `fk_investment_applications_lender1_idx` (`lender_id`),
  ADD KEY `fk_investment_applications_registered_brgy1_idx` (`registered_brgy_id`);

--
-- Indexes for table `investment_requirements`
--
ALTER TABLE `investment_requirements`
  ADD PRIMARY KEY (`investment_requirement_id`),
  ADD KEY `fk_investment_requirements_lender1_idx` (`lender_id`),
  ADD KEY `fk_investment_requirements_registered_brgy1_idx` (`registered_brgy_id`),
  ADD KEY `fk_investment_requirements_investment_applications1_idx` (`investment_application_id`);

--
-- Indexes for table `invest_interest_rate`
--
ALTER TABLE `invest_interest_rate`
  ADD PRIMARY KEY (`invest_interest_rate_id`),
  ADD UNIQUE KEY `brgy_account_id_UNIQUE` (`brgy_account_id`);

--
-- Indexes for table `lender`
--
ALTER TABLE `lender`
  ADD PRIMARY KEY (`lender_id`),
  ADD UNIQUE KEY `user_account_id_UNIQUE` (`user_account_id`);

--
-- Indexes for table `lender_monthly_returns`
--
ALTER TABLE `lender_monthly_returns`
  ADD PRIMARY KEY (`lender_monthly_return_id`),
  ADD KEY `fk_lender_monthly_returns_lender1_idx` (`lender_id`),
  ADD KEY `fk_lender_monthly_returns_investments1_idx` (`investment_id`),
  ADD KEY `fk_lender_monthly_returns_registered_brgy1_idx` (`registered_brgy_id`),
  ADD KEY `fk_lender_monthly_returns_investment_applications1_idx` (`investment_application_id`);

--
-- Indexes for table `lender_transactions`
--
ALTER TABLE `lender_transactions`
  ADD PRIMARY KEY (`lender_transaction_id`),
  ADD KEY `fk_earnings_lender1_idx` (`lender_id`),
  ADD KEY `fk_lender_transactions_investments1_idx` (`investment_id`),
  ADD KEY `fk_lender_transactions_withdrawals1_idx` (`withdrawal_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`),
  ADD UNIQUE KEY `reference_code_UNIQUE` (`reference_code`),
  ADD KEY `fk_loans_borrower1_idx` (`borrower_id`),
  ADD KEY `fk_loans_registered_brgy1_idx` (`registered_brgy_id`),
  ADD KEY `fk_loans_loan_applications1_idx` (`loan_application_id`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`loan_application_id`),
  ADD KEY `fk_loan_applications_borrower1_idx` (`borrower_id`),
  ADD KEY `fk_loan_applications_registered_brgy1_idx` (`registered_brgy_id`);

--
-- Indexes for table `loan_interest_rate`
--
ALTER TABLE `loan_interest_rate`
  ADD PRIMARY KEY (`loan_interest_rate_id`),
  ADD UNIQUE KEY `brgy_account_id_UNIQUE` (`brgy_account_id`);

--
-- Indexes for table `loan_requirements`
--
ALTER TABLE `loan_requirements`
  ADD PRIMARY KEY (`loan_requirement_id`),
  ADD KEY `fk_loan_requirements_borrower1_idx` (`borrower_id`),
  ADD KEY `fk_loan_requirements_loan_applications1_idx` (`loan_application_id`),
  ADD KEY `fk_loan_requirements_registered_brgy1_idx` (`registered_brgy_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_logs_super_admin1_idx` (`super_admin_id`),
  ADD KEY `fk_logs_brgy_accounts1_idx` (`brgy_account_id`),
  ADD KEY `fk_logs_user_accounts1_idx` (`user_account_id`),
  ADD KEY `fk_logs_brgy_staff_accounts1_idx` (`brgy_staff_account_id`);

--
-- Indexes for table `member_requests`
--
ALTER TABLE `member_requests`
  ADD PRIMARY KEY (`member_request_id`),
  ADD KEY `fk_member_requests_registered_brgy1_idx` (`registered_brgy_id`),
  ADD KEY `fk_member_requests_user_accounts1_idx` (`user_account_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD UNIQUE KEY `messages_id_UNIQUE` (`message_id`);

--
-- Indexes for table `min_max_loan_invest`
--
ALTER TABLE `min_max_loan_invest`
  ADD PRIMARY KEY (`min_max_loan_invest_id`),
  ADD UNIQUE KEY `brgy_account_id_UNIQUE` (`brgy_account_id`);

--
-- Indexes for table `monthly_term_borrower`
--
ALTER TABLE `monthly_term_borrower`
  ADD PRIMARY KEY (`monthly_term_borrower_id`),
  ADD UNIQUE KEY `brgy_account_id_UNIQUE` (`brgy_account_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_payments_registered_brgy1_idx` (`registered_brgy_id`),
  ADD KEY `fk_payments_borrower1_idx` (`borrower_id`);

--
-- Indexes for table `rebate_penalty_rate`
--
ALTER TABLE `rebate_penalty_rate`
  ADD PRIMARY KEY (`rebate_penalty_rate_id`),
  ADD UNIQUE KEY `brgy_account_id_UNIQUE` (`brgy_account_id`);

--
-- Indexes for table `registered_brgy`
--
ALTER TABLE `registered_brgy`
  ADD PRIMARY KEY (`registered_brgy_id`),
  ADD KEY `fk_registered_brgy_super_admin_idx` (`super_admin_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`saving_id`),
  ADD KEY `fk_savings_borrower1_idx` (`borrower_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`super_admin_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`,`reference_code`),
  ADD KEY `fk_transactions_registered_brgy1_idx` (`registered_brgy_id`),
  ADD KEY `fk_transactions_payments1_idx` (`payment_id`),
  ADD KEY `fk_transactions_loans1_idx` (`loan_id`),
  ADD KEY `fk_transactions_investments1_idx` (`investment_id`),
  ADD KEY `fk_transactions_expenses1_idx` (`expense_id`),
  ADD KEY `fk_transactions_withdrawals1_idx` (`withdrawal_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_account_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `fk_user_accounts_registered_brgy1_idx` (`registered_brgy_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`),
  ADD UNIQUE KEY `user_account_id_UNIQUE` (`user_account_id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`withdrawal_id`),
  ADD UNIQUE KEY `reference_code_UNIQUE` (`reference_code`),
  ADD KEY `fk_withdrawals_lender1_idx` (`lender_id`),
  ADD KEY `fk_withdrawals_registered_brgy1_idx` (`registered_brgy_id`);

--
-- Indexes for table `yearly_term_lender`
--
ALTER TABLE `yearly_term_lender`
  ADD PRIMARY KEY (`yearly_term_lender_id`),
  ADD UNIQUE KEY `brgy_account_id_UNIQUE` (`brgy_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `borrower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrower_monthly_repayments`
--
ALTER TABLE `borrower_monthly_repayments`
  MODIFY `borrower_monthly_repayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `borrower_transactions`
--
ALTER TABLE `borrower_transactions`
  MODIFY `borrower_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brgy_accounts`
--
ALTER TABLE `brgy_accounts`
  MODIFY `brgy_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brgy_earnings`
--
ALTER TABLE `brgy_earnings`
  MODIFY `brgy_earning_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brgy_staff_accounts`
--
ALTER TABLE `brgy_staff_accounts`
  MODIFY `brgy_staff_account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brgy_user_details`
--
ALTER TABLE `brgy_user_details`
  MODIFY `brgy_user_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `default`
--
ALTER TABLE `default`
  MODIFY `default_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `investment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investment_applications`
--
ALTER TABLE `investment_applications`
  MODIFY `investment_application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investment_requirements`
--
ALTER TABLE `investment_requirements`
  MODIFY `investment_requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invest_interest_rate`
--
ALTER TABLE `invest_interest_rate`
  MODIFY `invest_interest_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lender`
--
ALTER TABLE `lender`
  MODIFY `lender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lender_monthly_returns`
--
ALTER TABLE `lender_monthly_returns`
  MODIFY `lender_monthly_return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `lender_transactions`
--
ALTER TABLE `lender_transactions`
  MODIFY `lender_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `loan_application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loan_interest_rate`
--
ALTER TABLE `loan_interest_rate`
  MODIFY `loan_interest_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_requirements`
--
ALTER TABLE `loan_requirements`
  MODIFY `loan_requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=584;

--
-- AUTO_INCREMENT for table `member_requests`
--
ALTER TABLE `member_requests`
  MODIFY `member_request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `min_max_loan_invest`
--
ALTER TABLE `min_max_loan_invest`
  MODIFY `min_max_loan_invest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monthly_term_borrower`
--
ALTER TABLE `monthly_term_borrower`
  MODIFY `monthly_term_borrower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rebate_penalty_rate`
--
ALTER TABLE `rebate_penalty_rate`
  MODIFY `rebate_penalty_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registered_brgy`
--
ALTER TABLE `registered_brgy`
  MODIFY `registered_brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `saving_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `super_admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'super admin id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yearly_term_lender`
--
ALTER TABLE `yearly_term_lender`
  MODIFY `yearly_term_lender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blacklists`
--
ALTER TABLE `blacklists`
  ADD CONSTRAINT `fk_blacklists_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_blacklists_user_accounts1` FOREIGN KEY (`user_account_id`) REFERENCES `user_accounts` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `fk_borrower_user_accounts1` FOREIGN KEY (`user_account_id`) REFERENCES `user_accounts` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrower_monthly_repayments`
--
ALTER TABLE `borrower_monthly_repayments`
  ADD CONSTRAINT `fk_borrower_monthly_repayments_borrower1` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_borrower_monthly_repayments_loan_applications1` FOREIGN KEY (`loan_application_id`) REFERENCES `loan_applications` (`loan_application_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_borrower_monthly_repayments_loans1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_borrower_monthly_repayments_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brgy_accounts`
--
ALTER TABLE `brgy_accounts`
  ADD CONSTRAINT `fk_brgy_accounts_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brgy_earnings`
--
ALTER TABLE `brgy_earnings`
  ADD CONSTRAINT `fk_brgy_earnings_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brgy_staff_accounts`
--
ALTER TABLE `brgy_staff_accounts`
  ADD CONSTRAINT `fk_brgy_staff_accounts_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brgy_user_details`
--
ALTER TABLE `brgy_user_details`
  ADD CONSTRAINT `fk_brgy_user_details_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_brgy_user_details_brgy_staff_accounts1` FOREIGN KEY (`brgy_staff_account_id`) REFERENCES `brgy_staff_accounts` (`brgy_staff_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `default`
--
ALTER TABLE `default`
  ADD CONSTRAINT `fk_default_min_max_loan_super_admin1` FOREIGN KEY (`super_admin_id`) REFERENCES `super_admin` (`super_admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `fk_expenses_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_feedbacks_user_accounts1` FOREIGN KEY (`user_account_id`) REFERENCES `user_accounts` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investments`
--
ALTER TABLE `investments`
  ADD CONSTRAINT `fk_investments_investment_applications1` FOREIGN KEY (`investment_application_id`) REFERENCES `investment_applications` (`investment_application_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_investments_lender1` FOREIGN KEY (`lender_id`) REFERENCES `lender` (`lender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_investments_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investment_applications`
--
ALTER TABLE `investment_applications`
  ADD CONSTRAINT `fk_investment_applications_lender1` FOREIGN KEY (`lender_id`) REFERENCES `lender` (`lender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_investment_applications_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investment_requirements`
--
ALTER TABLE `investment_requirements`
  ADD CONSTRAINT `fk_investment_requirements_investment_applications1` FOREIGN KEY (`investment_application_id`) REFERENCES `investment_applications` (`investment_application_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_investment_requirements_lender1` FOREIGN KEY (`lender_id`) REFERENCES `lender` (`lender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_investment_requirements_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invest_interest_rate`
--
ALTER TABLE `invest_interest_rate`
  ADD CONSTRAINT `fk_invest_interest_rate_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lender`
--
ALTER TABLE `lender`
  ADD CONSTRAINT `fk_lender_user_accounts1` FOREIGN KEY (`user_account_id`) REFERENCES `user_accounts` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lender_monthly_returns`
--
ALTER TABLE `lender_monthly_returns`
  ADD CONSTRAINT `fk_lender_monthly_returns_investment_applications1` FOREIGN KEY (`investment_application_id`) REFERENCES `investment_applications` (`investment_application_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lender_monthly_returns_investments1` FOREIGN KEY (`investment_id`) REFERENCES `investments` (`investment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lender_monthly_returns_lender1` FOREIGN KEY (`lender_id`) REFERENCES `lender` (`lender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lender_monthly_returns_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lender_transactions`
--
ALTER TABLE `lender_transactions`
  ADD CONSTRAINT `fk_earnings_lender1` FOREIGN KEY (`lender_id`) REFERENCES `lender` (`lender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lender_transactions_investments1` FOREIGN KEY (`investment_id`) REFERENCES `investments` (`investment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lender_transactions_withdrawals1` FOREIGN KEY (`withdrawal_id`) REFERENCES `withdrawals` (`withdrawal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `fk_loans_borrower1` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loans_loan_applications1` FOREIGN KEY (`loan_application_id`) REFERENCES `loan_applications` (`loan_application_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loans_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD CONSTRAINT `fk_loan_applications_borrower1` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loan_applications_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_interest_rate`
--
ALTER TABLE `loan_interest_rate`
  ADD CONSTRAINT `fk_loan_interest_rate_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_requirements`
--
ALTER TABLE `loan_requirements`
  ADD CONSTRAINT `fk_loan_requirements_borrower1` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loan_requirements_loan_applications1` FOREIGN KEY (`loan_application_id`) REFERENCES `loan_applications` (`loan_application_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loan_requirements_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_logs_brgy_staff_accounts1` FOREIGN KEY (`brgy_staff_account_id`) REFERENCES `brgy_staff_accounts` (`brgy_staff_account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_logs_super_admin1` FOREIGN KEY (`super_admin_id`) REFERENCES `super_admin` (`super_admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_logs_user_accounts1` FOREIGN KEY (`user_account_id`) REFERENCES `user_accounts` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_requests`
--
ALTER TABLE `member_requests`
  ADD CONSTRAINT `fk_member_requests_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member_requests_user_accounts1` FOREIGN KEY (`user_account_id`) REFERENCES `user_accounts` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `min_max_loan_invest`
--
ALTER TABLE `min_max_loan_invest`
  ADD CONSTRAINT `fk_min_max_loan_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monthly_term_borrower`
--
ALTER TABLE `monthly_term_borrower`
  ADD CONSTRAINT `fk_monthly_term_borrower_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_borrower1` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payments_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rebate_penalty_rate`
--
ALTER TABLE `rebate_penalty_rate`
  ADD CONSTRAINT `fk_rebate_penalty_rate_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered_brgy`
--
ALTER TABLE `registered_brgy`
  ADD CONSTRAINT `fk_registered_brgy_super_admin` FOREIGN KEY (`super_admin_id`) REFERENCES `super_admin` (`super_admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `fk_savings_borrower1` FOREIGN KEY (`borrower_id`) REFERENCES `borrower` (`borrower_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transactions_expenses1` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`expense_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_investments1` FOREIGN KEY (`investment_id`) REFERENCES `investments` (`investment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_loans1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_payments1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions_withdrawals1` FOREIGN KEY (`withdrawal_id`) REFERENCES `withdrawals` (`withdrawal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD CONSTRAINT `fk_user_accounts_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `fk_user_details_user_accounts1` FOREIGN KEY (`user_account_id`) REFERENCES `user_accounts` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `fk_withdrawals_lender1` FOREIGN KEY (`lender_id`) REFERENCES `lender` (`lender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_withdrawals_registered_brgy1` FOREIGN KEY (`registered_brgy_id`) REFERENCES `registered_brgy` (`registered_brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yearly_term_lender`
--
ALTER TABLE `yearly_term_lender`
  ADD CONSTRAINT `fk_yearly_term_lender_brgy_accounts1` FOREIGN KEY (`brgy_account_id`) REFERENCES `brgy_accounts` (`brgy_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
