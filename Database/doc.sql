-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 05:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `msg_date` date NOT NULL,
  `msg_time` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `user_id`, `doc_id`, `msg`, `msg_date`, `msg_time`, `status`) VALUES
(22, 1, 118, 'Hello Doctor', '2020-01-03', '07:16 pm', 0),
(23, 1, 118, 'Hi Darshan.', '2020-01-03', '07:16 pm', 1),
(24, 1, 118, 'What Problem You Suffering?', '2020-01-12', '09:42 pm', 1),
(25, 1, 118, 'Kahi nahi asach', '2020-01-13', '11:10 pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_name` varchar(30) NOT NULL,
  `doc_gender` varchar(10) NOT NULL,
  `doc_spec` varchar(100) NOT NULL,
  `doc_bdate` date NOT NULL,
  `doc_contact` varchar(100) NOT NULL,
  `disabled` int(11) NOT NULL,
  `modified_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `user_id`, `doc_name`, `doc_gender`, `doc_spec`, `doc_bdate`, `doc_contact`, `disabled`, `modified_at`) VALUES
(1, 3, 'Priya Avagan', 'Female', 'MBBS', '1998-08-16', '9876543210', 1, '2020-01-12'),
(118, 14, 'Shruti Randive', 'Female', 'M.D.', '2000-09-17', '9876543210', 0, '2019-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `doc_ref`
--

CREATE TABLE `doc_ref` (
  `docref_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_msg` varchar(300) NOT NULL,
  `docref_date` varchar(11) NOT NULL,
  `docaccept_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_ref`
--

INSERT INTO `doc_ref` (`docref_id`, `doc_id`, `user_id`, `user_msg`, `docref_date`, `docaccept_date`, `status`) VALUES
(21, 118, 1, 'Doctor Aunthentication', '2020-01-03', '2020-01-03', 1),
(22, 1, 1, 'I Have Cardiac Problem', '2020-01-03', '0000-00-00', 0),
(23, 118, 2, 'Doctor Aunthentication', '2020-01-23', '2020-01-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fb_descp` varchar(1000) NOT NULL,
  `fb_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `user_id`, `fb_descp`, `fb_date`) VALUES
(2, 1, 'My Browser Is Crshing While Opening Test.php', '2019-09-26'),
(3, 1, 'Connected Doctor Shruti Not Responding', '2019-09-28'),
(4, 1, 'I face problems in opening reports.', '2020-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `master_medicine`
--

CREATE TABLE `master_medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_descp` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_medicine`
--

INSERT INTO `master_medicine` (`medicine_id`, `medicine_name`, `medicine_descp`) VALUES
(1, 'Crocine', 'Normal Fever, Tooth Pain,Headache'),
(2, 'Digene', 'Stomach acid , heartburn , bloating'),
(3, 'Paracetamol', 'Pain reliever and fever reducer');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_map`
--

CREATE TABLE `medicine_map` (
  `medmap_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `userpres_id` int(11) NOT NULL,
  `qty` varchar(45) NOT NULL,
  `timings` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_map`
--

INSERT INTO `medicine_map` (`medmap_id`, `medicine_id`, `userpres_id`, `qty`, `timings`) VALUES
(8, 1, 30, 'One Tablet', 'Morning-Afternoon'),
(9, 3, 31, 'Half Tablet', 'Morning-Night'),
(10, 2, 31, '5 mL', 'Night'),
(11, 1, 32, 'One Tablet', 'Morning-Afternoon-Night');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_bdate` date NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_regdate` date NOT NULL,
  `temp_key` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_name`, `email`, `user_contact`, `user_pass`, `user_gender`, `user_bdate`, `user_type`, `user_regdate`, `temp_key`) VALUES
(1, 'darshan', 'Darshan Shirke', 'shirkedarshan@gmail.com', '9594252516', 'healthatm', 'Male', '1999-02-20', 'patient', '2019-08-15', ''),
(2, 'adarsh', 'Adarsh Singh', 'singhadarsh0104@gmail.com', '9876543210', 'healthatm', 'Male', '2014-12-01', 'patient', '2019-08-27', ''),
(3, 'priya', 'Priya Avagan', 'avapriyagan@gmail.com', '9876543210', 'healthatm', 'Female', '1998-08-16', 'doctor', '2019-09-01', '261a33b1609c971821637c9d9989baa4'),
(4, 'admin', 'admin', 'healthatm9@gmail.com', '9876543210', 'a', 'Male', '2019-09-03', '', '2019-09-25', ''),
(14, 'Shruti', 'Shruti Milind Randive', 'healthatm9@gmail.com', '9876543210', 'healthatm', 'Female', '2019-09-17', 'doctor', '2019-09-17', ''),
(17, 'shrutim', 'shruti mhambrey', 'healthatm9@gmail.com', '9876543210', 'healthatm', 'Female', '1999-02-20', 'patient', '2019-08-15', '089bd4ec43a3266178745e8a75ffb95e');

-- --------------------------------------------------------

--
-- Table structure for table `user_med`
--

CREATE TABLE `user_med` (
  `med_id` int(11) NOT NULL,
  `med_repdate` date NOT NULL,
  `total_pres` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `med_age` varchar(20) NOT NULL,
  `med_wt` int(11) NOT NULL,
  `med_ht` int(11) NOT NULL,
  `med_bmi` int(11) NOT NULL,
  `med_fat` int(11) NOT NULL,
  `med_bp` int(11) NOT NULL,
  `med_hmg` int(11) NOT NULL,
  `med_pulse` int(11) NOT NULL,
  `med_temp` int(11) NOT NULL,
  `med_rbc` int(11) NOT NULL,
  `med_hct` int(11) NOT NULL,
  `med_wbc` int(11) NOT NULL,
  `med_plt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_med`
--

INSERT INTO `user_med` (`med_id`, `med_repdate`, `total_pres`, `user_id`, `user_gender`, `med_age`, `med_wt`, `med_ht`, `med_bmi`, `med_fat`, `med_bp`, `med_hmg`, `med_pulse`, `med_temp`, `med_rbc`, `med_hct`, `med_wbc`, `med_plt`) VALUES
(1, '2019-08-01', 2, 2, 'Male', '20', 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13),
(2, '2019-08-08', 1, 2, 'Male', '20', 22, 1, 1, 1, 1, 1, 11, 1, 1, 11, 11, 13),
(3, '2019-08-15', 0, 2, 'Male', '20', 1, 1, 1, 1, 11, 1, 1, 1, 11, 11, 11, 13),
(23, '2020-01-03', 0, 1, 'Male', '21', 70, 199, 18, 6, 156, 20, 68, 99, 4, 39, 3973, 165793),
(24, '2020-01-03', 0, 1, 'Male', '21', 55, 174, 18, 20, 102, 20, 104, 99, 5, 36, 5612, 253737),
(25, '2020-01-03', 0, 1, 'Male', '21', 85, 178, 27, 5, 133, 14, 73, 105, 5, 49, 10712, 283478),
(26, '2020-01-16', 0, 19, 'Male', '20', 55, 170, 23, 11, 135, 13, 55, 95, 6, 31, 3888, 460412);

-- --------------------------------------------------------

--
-- Table structure for table `user_pres`
--

CREATE TABLE `user_pres` (
  `userpres_id` int(11) NOT NULL,
  `med_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `med_pres` longtext NOT NULL,
  `med_pres_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pres`
--

INSERT INTO `user_pres` (`userpres_id`, `med_id`, `doc_id`, `doc_name`, `med_pres`, `med_pres_date`) VALUES
(30, 23, 118, 'Shruti Randive', 'Take Medicines below as given', '2020-01-03'),
(31, 24, 118, 'Shruti Randive', 'Take Medicines As Below :', '2020-01-03'),
(32, 3, 118, 'Shruti Milind Randive', 'Take Below Prescription', '2020-01-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `doc_ref`
--
ALTER TABLE `doc_ref`
  ADD PRIMARY KEY (`docref_id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `master_medicine`
--
ALTER TABLE `master_medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD UNIQUE KEY `medicine_name_2` (`medicine_name`),
  ADD KEY `medicine_name` (`medicine_name`);

--
-- Indexes for table `medicine_map`
--
ALTER TABLE `medicine_map`
  ADD PRIMARY KEY (`medmap_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `userpres_id` (`userpres_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_med`
--
ALTER TABLE `user_med`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_pres`
--
ALTER TABLE `user_pres`
  ADD PRIMARY KEY (`userpres_id`),
  ADD KEY `med_id` (`med_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `doc_ref`
--
ALTER TABLE `doc_ref`
  MODIFY `docref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_medicine`
--
ALTER TABLE `master_medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine_map`
--
ALTER TABLE `medicine_map`
  MODIFY `medmap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_med`
--
ALTER TABLE `user_med`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_pres`
--
ALTER TABLE `user_pres`
  MODIFY `userpres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
