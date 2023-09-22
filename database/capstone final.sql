-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 01:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `id` int(12) NOT NULL,
  `name` varchar(180) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`id`, `name`, `email`, `password`) VALUES
(1, 'Fabrice Mukarage', 'admin.admin@gmail.com', '912ec803b2ce49e4a541068d495ab570');

-- --------------------------------------------------------

--
-- Table structure for table `approvedstudent`
--

CREATE TABLE `approvedstudent` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `resume` blob NOT NULL,
  `interview` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approvedstudent`
--

INSERT INTO `approvedstudent` (`id`, `name`, `email`, `password`, `school`, `major`, `year`, `skills`, `job`, `resume`, `interview`) VALUES
(72, 'Bofils Peter', 'bofils.peter@outlook.com', '912ec803b2ce49e4a541068d495ab570', 'Ashesi University', 'Computer Science', 'Year 4', 'Business skills,Marketing', 'business operations internship', 0x426f66696c735f70657465722e706466, ''),
(78, 'Grace Emma', 'grace.emma@gmail.com', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 'Ashesi University', 'Computer Science', 'Year 4', 'Business skills,Web Design,Marketing,Problem Solving', 'Social media manager jobs', 0x47726163655f456d6d612e706466, ''),
(79, 'Kalisa Eric', 'kalisa.eric@gmail.com', 'ad57484016654da87125db86f4227ea3', 'Ashesi University', 'Business Administration', 'Year 4', 'Business skills,Marketing,Problem Solving,Leadership', 'Business analysis internships', 0x4b616c6973615f657269632e706466, ''),
(81, 'Mutabazi Claude', 'mutabazi.claude@gmail.com', '08a4415e9d594ff960030b921d42b91e', 'Ashesi University', 'Mechanical Engineering', 'Graduate', 'Business skills,Problem Solving,Leadership,Engineerin Skills', 'Mechanical jobs', 0x4d75746162617a695f436c617564652e706466, ''),
(82, 'Patrick Emmy', 'patrick.emmy@gmail.com', 'd2f2297d6e829cd3493aa7de4416a18f', 'Ashesi University', 'Computer Engineering', 'Graduate', 'Business skills,Problem Solving,Leadership,Engineerin Skills', 'Data science internship', 0x5061747269636b5f656d6d792e706466, ''),
(83, 'Ppp Ana', 'ppp.ana@gmail.com', 'e4a59df8b97206109eb4b7f2fe528a4d', 'Ashesi University', 'Mechanical Engineering', 'Year 3', 'Business skills,Web Design,Problem Solving,Leadership,Engineerin Skills', 'Business analysis jobs', 0x7070705f616e612e706466, '');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter`
--

CREATE TABLE `recruiter` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `company` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruiter`
--

INSERT INTO `recruiter` (`id`, `name`, `email`, `phone`, `company`, `password`, `code`) VALUES
(15, 'asd', 'fabriceee.mukarage@gmail.com', '0783932356', 'asdfsadf', '912ec803b2ce49e4a541068d495ab570', 0),
(17, 'fasd', 'fabrice.mukaraage@gmail.com', '0783932356', 'Ashesi university', '912ec803b2ce49e4a541068d495ab570', 0),
(18, 'fabrice.mukarage@gmail.com', 'fasdf@gmail.com', '0783932356', 'asdfd', '912ec803b2ce49e4a541068d495ab570', 0),
(19, 'asdfcom', 'fabrice.mukaraawge@gmail.com', '0783932356', 'Ashesi University', '912ec803b2ce49e4a541068d495ab570', 0),
(20, 'fmukarage', 'fabrice.mukarage@gmail.com', '0787777877', 'Ashesi University', 'ccb507236fa18a4ceb3e8b19ed06489b', 0),
(21, 'fabrice', 'fabrice.mukaragee@gmail.com', '0544444444', 'Turntabl', '912ec803b2ce49e4a541068d495ab570', 0),
(23, 'shema', 'shemaa.placide@gmail.com', '0787877878', 'Tufts Company', '912ec803b2ce49e4a541068d495ab570', 0),
(24, 'fabrice shema', 'fabrice.shema@gmail.com', '0478784787', 'Ashesi University', '912ec803b2ce49e4a541068d495ab570', 0),
(25, 'Nana', 'nana.nana@gmail.com', '0787548787', 'Company name', '912ec803b2ce49e4a541068d495ab570', 0),
(26, 'Joseph Nana', 'joseph.joseph@gmail.com', '0787955787', 'Turntab', '912ec803b2ce49e4a541068d495ab570', 0),
(27, 'Divine Nkurunziza', 'divine@gmail.com', '0454945645', 'Software CEO ', '6d87a19f011653459575ceb722db3b69', 0),
(28, 'Divine Nkurunziza', 'divine.divine@gmail.com', '0784546546', 'Software CEO ', '912ec803b2ce49e4a541068d495ab570', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `job` varchar(100) NOT NULL,
  `resume` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `school`, `major`, `year`, `skills`, `job`, `resume`) VALUES
(71, 'Aline Nana', 'aline.nana@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'Ashesi University', 'Electrical And Electronics Engineering', 'Year 3', 'Business skills,Web Design', 'web devoloper internship', 0x416c696e655f4e616e612e706466),
(73, 'Boniface Toni', 'boniface.toni@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'Ashesi University', 'Computer Engineering', 'Graduate', 'Business skills,Marketing', 'Marketing jobs', 0x426f6e69666163655f546f6e692e706466),
(74, 'Claude Toy', 'claude.toy@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'Ashesi University', 'Computer Engineering', 'Year 2', 'Business skills,Marketing', 'software engineering internship', 0x436c617564655f546f792e706466),
(75, 'Divine Anne', 'divine.anne@gmail.com', 'efc5ebdd837f53cd49cd24de317db20d', 'Ashesi University', 'Computer Engineering', 'Graduate', 'Business skills,Web Design,Marketing,Problem Solving', 'website developer internship', 0x446976696e655f416e6e652e706466),
(76, 'Eric Murwanashyaka', 'eric.murwanashyaka@gmail.com', 'efc5ebdd837f53cd49cd24de317db20d', 'Ashesi University', 'Computer Science', 'Graduate', 'Business skills,Web Design,Marketing,Problem Solving', 'wordpress developer jobs', 0x457269635f4d757277616e61736879616b612e706466),
(77, 'Fabrice Mukarage', 'fabrice.mukarage@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'Ashesi University', 'Computer Science', 'Year 4', 'Business skills,Web Design,Marketing,Problem Solving', 'software engineering internship', 0x466162726963655f4d756b61726167652e706466),
(80, 'Liter Yesaza', 'liter.yesaza@gmail.com', 'c50c0fca46eb62427a47508a73f01b18', 'Ashesi University', 'Electrical And Electronics Engineering', 'Year 4', 'Business skills,Problem Solving,Leadership,Engineerin Skills', 'Engineering internship', 0x6c697465725f796573617a612e706466),
(84, 'Rapa Ropa', 'rapa.ropa@gmail.com', 'a57b8491d1d8fc1014dd54bcf83b130a', 'Ashesi University', 'Computer Engineering', 'Graduate', 'Business skills,Web Design,Marketing,Problem Solving,Leadership,Engineerin Skills', 'Any job available', 0x726170615f726f70612e706466),
(85, 'Shema Peter', 'shema.peter@gmail.com', '789adfdcea5becf7ab4b27347b0dca88', 'Ashesi University', 'Computer Science', 'Graduate', 'Business skills,Web Design,Marketing,Problem Solving', 'Internship in robotics', 0x5368656d615f50657465722e706466),
(86, 'Tuyishime Auto', 'tuyishime.auto@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'Ashesi University', 'Business Administration', 'Year 2', 'Business skills,Web Design,Marketing,Problem Solving', 'Open to any internship', 0x547579697368696d655f4175746f2e706466),
(87, 'Zzz Yyy', 'zzz.yyy@gmail.com', '540e32485047e61b02c23569cb1ef799', 'Ashesi University', 'Electrical And Electronics Engineering', 'Graduate', 'Business skills,Web Design,Marketing,Problem Solving', 'Electrical and electronics jobs', 0x7a7a7a5f7979792e706466);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvedstudent`
--
ALTER TABLE `approvedstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiter`
--
ALTER TABLE `recruiter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recruiter`
--
ALTER TABLE `recruiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
