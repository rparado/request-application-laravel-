-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2016 at 10:34 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_request`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_05_085406_create_registration_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_confirmation` varchar(205) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `company_name`, `email`, `password`, `password_confirmation`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Robinson', 'robi@mail.com', '$2y$10$KH0/2bx68Bs0LOAPBDt7xOxfQ2Iie/c5Nl398tUlPFr2LBxopm7K6', '$2y$10$geRmq/HBlldKBhQczF1lLufXQnrDOvimkYBkgDvwYEm2qa3g9KvAG', 'uC5Noyg9JzLa2LDfpZDtWbuHTM8Oc3utjc996ZQq5A0tD6JidP3xMcTdfjy4', '2016-07-08 06:00:00', '2016-07-07 22:00:00'),
(4, 'Gaisano', 'gaisano@yahoo.com', '$2y$10$TYCyU2O0xT23kF/cZBJ8I.BumZCn5DJFg36oY7Uw1C59uuYRjaSQ2', '$2y$10$3s1lTeAuvhIgtYjYZcjkH.X6O2MYv4CgX8B14jZAgKcB1lGUz4Aci', 'kbIZBvPxlSBpvtSyhAQe7rlOE7PO88nPkot3vkdsU1EjZvfsGkPaklRugqUs', '2016-07-08 06:07:59', '2016-07-07 22:07:59'),
(5, 'Savers Mart', 'mart@savers.com', '$2y$10$Nxr1fmBgsDvcRlwI0xI3jen3g8jpj2r1x5rTdaWXZDQhsOfdmIWJ.', '$2y$10$m4k1t7e9/XhwUuu7wktM4e4QQUEuuEZc3bftfeBnylYHxEd4Pq04q', 'qJB2lRaN5N35eMymobcsPM99Gh2pqZG47FRyn0DQgEFcWM2MDwSQ9HVkR48Y', '2016-07-08 06:17:13', '2016-07-07 22:17:13'),
(6, 'sari-sari', 'sari@mail.com', '$2y$10$KqIcAmS7g7TsodfKdz4VK.uPbuz0j665w6/FtW.i2xwqEwMIfzNw2', '$2y$10$8/Z74mGO7ZkXgkrys3eGbOYPpyKIMtpoE9rF1SLfQIpL3.s98uwNC', '6tV7EsuiSany9WgiV8zsE3oSLbAeu9h6yNjU5W9GFkEOWtvarwAFdjAhTKAA', '2016-07-08 08:25:27', '2016-07-08 00:25:27'),
(7, 'Bulaloan', 'bolalo@mail.com', '$2y$10$FjH4Fi5RQup3z2mf/AWqnOYCM3MKrc.LQMQCwL/.A6TfGr7EzbPFS', '$2y$10$XCtgJjGDJBHthDTll.JN7OArvLiM01QUPj/C0M4ZFqU4DZySXzY0i', 'W9ZVyLLjUeUAYpGyZrW2pyjBKdKi312RKRrOgHWD5BXrv84Pk3iEk2d6w91l', '2016-07-11 03:05:52', '2016-07-10 19:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `dept_no` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `active` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `dept_no`, `dept_name`, `active`, `created_at`, `updated_at`) VALUES
(10, 'Dept-0000000002', 'Quality Control', 'No', '2016-06-30 05:02:25', '0000-00-00 00:00:00'),
(11, 'Dept-0000000003', 'Technical Operation', 'Yes', '2016-06-30 05:02:25', '0000-00-00 00:00:00'),
(13, 'Dep-0000000004', 'IT Department', 'Yes', '2016-07-04 08:22:05', '2016-07-04 00:22:05'),
(14, 'Dept-0000000005', 'ACT', 'No', '2016-06-30 05:02:25', '0000-00-00 00:00:00'),
(18, 'Dept-0000000009', 'Mabuhay', 'No', '2016-06-30 05:02:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_received_request`
--

CREATE TABLE `tbl_received_request` (
  `id` int(11) NOT NULL,
  `received_no` varchar(100) NOT NULL,
  `date_received` date NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Open','In Progress','On Hold','Closed') NOT NULL,
  `remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL,
  `request_no` varchar(100) NOT NULL,
  `date_requested` date NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `service_item_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `priority` varchar(20) NOT NULL,
  `due_date` date NOT NULL,
  `dept_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `support_status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `request_no`, `date_requested`, `user_id`, `service_item_id`, `rate`, `priority`, `due_date`, `dept_id`, `description`, `status`, `support_status`, `created_at`, `updated_at`) VALUES
(105, 'Req-0000000001', '2016-07-14', 35, 15, 500, 'urgent', '2016-07-30', 18, '<p>asdasd</p>', 'Closed', 'Open', '2016-07-14 07:07:24', '2016-07-13 23:07:24'),
(106, 'Req-0000000002', '2016-07-14', 35, 14, 271, 'low', '2016-07-27', 10, '<p>asdasd</p>', 'Closed', 'Open', '2016-07-13 19:52:19', '2016-07-13 19:52:19'),
(108, 'Req-0000000004', '2016-07-15', 35, 16, 260, 'low', '2016-07-29', 11, 'Sample only', 'Closed', 'Open', '2016-07-14 22:04:46', '2016-07-14 22:04:46'),
(109, 'Req-0000000005', '2016-07-15', 35, 15, 150, 'low', '2016-07-29', 13, '<p>asd</p>', 'Closed', 'Open', '2016-07-14 22:09:46', '2016-07-14 22:09:46'),
(113, 'Req-0000000006', '2016-07-15', 35, 15, 150, 'low', '2016-07-30', 13, '<p>asd</p>', 'Closed', 'Open', '2016-07-14 22:25:32', '2016-07-14 22:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_item`
--

CREATE TABLE `tbl_service_item` (
  `id` int(11) NOT NULL,
  `service_number` varchar(100) NOT NULL,
  `service_item_name` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `active` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_item`
--

INSERT INTO `tbl_service_item` (`id`, `service_number`, `service_item_name`, `dept_id`, `rate`, `active`, `created_at`, `updated_at`) VALUES
(13, 'Ser-0000000006', 'Development', 14, 600, 'Yes', '2016-06-30 05:04:02', '0000-00-00 00:00:00'),
(14, 'Ser-0000000007', 'Accounting', 13, 750, 'Yes', '2016-06-30 05:04:02', '0000-00-00 00:00:00'),
(15, 'Ser-0000000008', 'FPOSI', 10, 271, 'Yes', '2016-06-30 05:04:02', '0000-00-00 00:00:00'),
(16, 'Ser-0000000009', 'Encoding', 17, 350, 'Yes', '2016-06-30 05:04:02', '0000-00-00 00:00:00'),
(32, 'Ser-0000000009', 'IT Personnel', 11, 2000, 'No', '2016-07-05 03:49:49', '2016-07-04 19:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_confirm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_number`, `photo`, `first_name`, `last_name`, `dept_id`, `email`, `password`, `password_confirm`, `remember_token`, `user_type`, `active`, `created_at`, `updated_at`) VALUES
(7, 'Us-0000000001', '01785ee39b79d2ed907d4d3f075608f8e27457c9.jpg', 'ash', 'ketchump', 14, 'ash@mail.com', '$2y$10$kuxa3b4scfrgr1d.SsBYgOBg7vuowNEpMIAloghoLtKoF9/BEwiLK', 'vfyxXXqJc1Wth0uqZAADJXk6TFxqYUpb', 'ObtJaC4P8JWu7ngRxowH6LkP9xxbp7aS8espzXeHsNLfYGH6B6Rr7X2JJ0lN', 'Admin', 'Yes', '2016-07-10 17:36:07', '2016-07-15 00:07:47'),
(35, 'Us-0000000002', '', 'cath', 'pajares', 10, 'cath@mail.com', '$2y$10$f2o3mfegpM/tBg8j7XiHUOaDbvFEx8654aSqhk/fESyC/ikIUXwAO', 'EKS68F4cCIU1s9sFhMR9VpCd3KqrqxIL', '3e97bVUfxkqnoW3JhViVEh8udcZODp1tdEeU7PYWBmOIhf1xwmJMeGxM2KA5', 'Regular', 'Yes', '2016-07-11 01:18:27', '2016-07-15 00:32:59'),
(36, 'Us-0000000003', '075336d4a7c7d458f15aa1f67cd0795aa37a9198.png', 'daniel', 'Parado', 13, 'daniel@mail.com', '$2y$10$9g.SZ5MwjjP9sroIELy7PODp2kA63hkQGZawvkvgH2PZNR9Qwo382', 'NcFsfdCRrL7PA4dKbpMekrfIllFpmPgy', 'ZkybvX49lZ8ksn9ylC0bNMUW6thgXJe8SI5aZXzn9EvJK3n3ELGfI4runLEs', 'Regular', 'Yes', '2016-07-14 23:25:26', '2016-07-15 00:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_received_request`
--
ALTER TABLE `tbl_received_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`service_item_id`,`dept_id`),
  ADD KEY `service_item_id` (`service_item_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `key_name` (`user_id`);

--
-- Indexes for table `tbl_service_item`
--
ALTER TABLE `tbl_service_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `tbl_user_ibfk_1` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_received_request`
--
ALTER TABLE `tbl_received_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `tbl_service_item`
--
ALTER TABLE `tbl_service_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_received_request`
--
ALTER TABLE `tbl_received_request`
  ADD CONSTRAINT `tbl_received_request_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `tbl_request` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD CONSTRAINT `tbl_request_ibfk_2` FOREIGN KEY (`service_item_id`) REFERENCES `tbl_service_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_request_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `tbl_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_request_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
