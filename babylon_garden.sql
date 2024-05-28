-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 06:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babylon_garden`
--

-- --------------------------------------------------------

--
-- Table structure for table `care_plans`
--

CREATE TABLE `care_plans` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `care_details` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `care_plans`
--

INSERT INTO `care_plans` (`id`, `plant_id`, `care_details`, `date`) VALUES
(1, 1, 'Fertilized and pruned the Rose.', '2023-08-20'),
(2, 2, 'Completed care for the Orchid during blooming period.', '2023-08-18'),
(3, 3, 'Watered and pruned the Daisy.', '2023-08-15'),
(4, 4, 'Fertilized and supported the Lily.', '2023-08-12'),
(5, 5, 'Treated yellowing leaves of the Violet.', '2023-08-09'),
(6, 6, 'Adjusted watering schedule for the Palm due to leaf drying.', '2023-08-06'),
(7, 7, 'Planned to change the growth environment for the Cactus.', '2023-08-03'),
(8, 8, 'Pruned and supplemented soil for the Ficus.', '2023-07-31'),
(9, 9, 'Fertilized and completed blooming care for the Geranium.', '2023-07-28'),
(10, 10, 'Adjusted watering schedule and checked drainage for the Succulent.', '2023-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `description`) VALUES
(1, 'Garden Festival', '2023-09-10', 'A festival with live music and local food organized with our neighbors.'),
(2, 'Plant Care Seminar', '2023-08-27', 'Our experts will share tips and tricks on plant care.'),
(3, 'Summer Party', '2023-08-19', 'Fun activities and food for all our staff and their families.'),
(4, 'Spring Blooming Event', '2023-05-05', 'We will plant flowers and celebrate spring with our neighbors.'),
(5, 'Autumn Clean-Up Day', '2023-10-21', 'A general clean-up and maintenance day to prepare our garden for winter.'),
(6, 'Flower Arrangement Workshop', '2023-09-03', 'Participants will learn how to create flower arrangements.'),
(7, 'Garden Tour', '2023-08-12', 'We will visit a nearby botanical garden and take a guided tour.'),
(8, 'Plant Swap Event', '2023-07-29', 'An event where plant enthusiasts can swap their plants and acquire new varieties.'),
(9, 'Garden Movie Night', '2023-08-24', 'A garden-themed movie screening and picnic evening.'),
(10, 'Winter Preparation Seminar', '2023-10-07', 'Tips on maintaining and protecting our garden during the winter.');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `watering_schedule` varchar(255) NOT NULL,
  `care_instructions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `name`, `species`, `watering_schedule`, `care_instructions`) VALUES
(1, 'Rose', 'Rosa', 'Twice a week', 'Prefer sunny locations and fertilize weekly.'),
(2, 'Orchid', 'Orchidaceae', 'Every 10 days', 'Avoid direct sunlight and fertilize twice a week during blooming.'),
(3, 'Daisy', 'Asteraceae', 'Three times a week', 'Prefer sunny and well-drained environment.'),
(4, 'Lily', 'Lilium', 'Once a week', 'Provide plenty of sunlight and windless environment, fertilize twice a week during blooming.'),
(5, 'Violet', 'Viola', 'Once a week', 'Needs shade and keep the soil moist.'),
(6, 'Palm', 'Arecaceae', 'Once a week', 'Provide plenty of light and humid air, water when the soil is nearly dry.'),
(7, 'Cactus', 'Cactaceae', 'Once a month', 'Provide plenty of sunlight and warmth, water once a month.'),
(8, 'Ficus', 'Ficus', 'Twice a week', 'Prefer partial shade and moist soil.'),
(9, 'Geranium', 'Pelargonium', 'Twice a week', 'Prefer sunny and airy environment, remember to fertilize during blooming.'),
(10, 'Succulent', 'Succulent', 'Twice a month', 'Prefer sunny and well-drained environment, water sparingly and carefully.');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_date` date NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_name`, `report_date`, `description`) VALUES
(1, 'Monthly Maintenance Report', '2023-08-01', 'Summary of July maintenance activities and plant health.'),
(2, 'Blooming Report', '2023-07-15', 'Observation of blooming plants.'),
(3, 'Irrigation System Report', '2023-06-30', 'Efficiency and maintenance requirements of the irrigation system.'),
(4, 'Staff Performance Report', '2023-07-20', 'Performance evaluation and observations of gardeners.'),
(5, 'Budget Report', '2023-07-05', 'Garden expenses and budget planning.'),
(6, 'Inventory Report', '2023-06-10', 'Inventory of all plants and equipment.'),
(7, 'Maintenance Plan Report', '2023-05-25', 'Monthly maintenance plans and strategies.'),
(8, 'Plant Health Report', '2023-08-20', 'Observations on plant diseases and pest control.'),
(9, 'Event Report', '2023-07-10', 'Summary and outcomes of events held last month.'),
(10, 'Cost Analysis Report', '2023-06-20', 'Detailed analysis of garden expenses and recommendations.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`, `email`) VALUES
(1, 'Ahmed Ali', 'Gardener', 'ahmed@example.com'),
(2, 'Fatima Hassan', 'Manager', 'fatima@example.com'),
(3, 'Yusuf Khan', 'Assistant', 'yusuf@example.com'),
(4, 'Aisha Begum', 'Intern', 'aisha@example.com'),
(5, 'Omar Rahman', 'Maintenance Specialist', 'omar@example.com'),
(6, 'Layla Abbas', 'Office Manager', 'layla@example.com'),
(7, 'Zayd Malik', 'Marketing Specialist', 'zayd@example.com'),
(8, 'Hana Karim', 'Cost Accountant', 'hana@example.com'),
(9, 'Ibrahim Sheikh', 'Sales Representative', 'ibrahim@example.com'),
(10, 'Mariam Yasin', 'Human Resources', 'mariam@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `visit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `contact`, `visit_date`) VALUES
(1, 'Ali Bakr', '555-1234', '2023-08-10'),
(2, 'Zahra Omar', '555-5678', '2023-07-22'),
(3, 'Hassan Nadir', '555-9101', '2023-08-10'),
(4, 'Noor Salim', '555-4321', '2023-07-15'),
(5, 'Bilal Amin', '555-5555', '2023-08-01'),
(6, 'Samira Yusuf', '555-6789', '2023-07-30'),
(7, 'Khalid Ahmed', '555-1111', '2023-08-15'),
(8, 'Fatima Tariq', '555-2222', '2023-07-25'),
(9, 'Aminah Idris', '555-3333', '2023-08-20'),
(10, 'Yahya Musa', '555-4444', '2023-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `care_plans`
--
ALTER TABLE `care_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `care_plans`
--
ALTER TABLE `care_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `care_plans`
--
ALTER TABLE `care_plans`
  ADD CONSTRAINT `care_plans_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
