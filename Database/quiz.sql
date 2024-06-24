-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 02:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123'),
('Himanshu', 'himanshu@123');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `test_type` varchar(150) NOT NULL,
  `question` varchar(250) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `correct_answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `subject_id`, `test_type`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES
(22, 7, 'basic', 'What is C?', 'Programming Language', 'coding language', 'markup language', 'structural language', 'A'),
(26, 7, 'basic', 'what is c famous for?', 'Encapsulation', 'Fregmentation', 'Polymorphism', 'Pointers', 'D'),
(27, 8, 'basic', 'What is C++ famous for?', 'Polymorphism', 'Inheritance', 'Pointers', 'Both A &B', 'D'),
(28, 8, 'basic', 'What is C++?', 'Programming Language', 'Structural Language', 'Procedural Langauge', 'Object Oriented Programming Language', 'D'),
(29, 9, 'basic', 'Which keyword is used to define a constructor in Java?', '`init`', '`this`', ' `constructor`', '`public`', 'B'),
(30, 9, 'basic', 'What is Java?', 'Programming Language', 'Structural Language', 'Markup Language', 'Object Oriented Programming Language', 'D'),
(31, 10, 'basic', 'What is JavaScript(JS)?', 'Programming Language', 'Interpreted Programming Language', 'Markup Language', 'Structural Language', 'B'),
(32, 10, 'basic', 'Which Case does JavaScript use?', 'Snake Case ', 'Pascal Case', 'Camel Case', 'Upper Case', 'C'),
(33, 11, 'basic', 'What is Ruby?', 'Programming Language', 'Structural Language', 'Markup Language', 'Object Oriented Programming Language', 'D'),
(34, 11, 'basic', 'When was Ruby created?', 'Early 90s', 'Mid 90s', 'Late 90s', 'None Of The Above', 'B'),
(35, 12, 'basic', 'What is Python?', 'Programming Language', 'Structural Language', 'Interpreted Programming Language', 'Markup Language', 'C'),
(36, 12, 'basic', 'When was Python developed?', 'Early 80s', 'Mid 80s', 'Late 80s', 'None Of The Above', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `name` varchar(150) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `percentage_correct` int(11) NOT NULL,
  `test_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`name`, `total_questions`, `correct_answers`, `percentage_correct`, `test_date`) VALUES
('sonu', 2, 2, 100, '2024-02-12'),
('sonu', 2, 1, 50, '2024-02-12'),
('sonu', 2, 2, 100, '2024-02-12'),
('sonu', 1, 0, 0, '2024-02-12'),
('harry', 2, 2, 100, '2024-02-12'),
('harry', 2, 0, 0, '2024-02-12'),
('harry', 2, 2, 100, '2024-02-12'),
('harry', 2, 1, 50, '2024-02-12'),
('sunil', 2, 1, 50, '2024-02-12'),
('sunil', 2, 0, 0, '2024-02-12'),
('harry', 2, 1, 50, '2024-02-12'),
('harry', 2, 0, 0, '2024-02-12'),
('harry', 2, 1, 50, '0000-00-00'),
('Sunil', 2, 2, 100, '0000-00-00'),
('Sunil', 2, 2, 100, '2024-02-12'),
('sonu', 2, 2, 100, '2024-02-12'),
('sonu', 2, 2, 100, '2024-02-12'),
('sonu', 2, 0, 0, '2024-02-12'),
('sonu', 2, 1, 0, '2024-02-12'),
('sonu', 2, 1, 0, '2024-02-12'),
('sonu', 2, 2, 0, '2024-02-12'),
('sonu', 2, 1, 0, '2024-02-12'),
('sonu', 2, 2, 0, '2024-02-12'),
('sonu', 2, 1, 0, '2024-02-12'),
('sonu', 2, 2, 0, '2024-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_code`) VALUES
(7, 'C', 'S1'),
(8, 'C++', 'S2'),
(9, 'JAVA', 'S3'),
(10, 'JavaScript', 'S5'),
(11, 'Ruby', 'S6'),
(12, 'Python', 'S7');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `test_type` varchar(150) NOT NULL,
  `num_questions` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `subject_id`, `test_type`, `num_questions`, `subject_name`) VALUES
(21, 7, 'basic', 2, 'C'),
(24, 8, 'basic', 2, 'C++'),
(25, 9, 'basic', 2, 'JAVA'),
(26, 10, 'basic', 2, 'JavaScript'),
(27, 11, 'basic', 2, 'Ruby'),
(28, 12, 'basic', 2, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `loginid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`loginid`, `name`, `email`, `mobile`, `password`, `signup_date`) VALUES
(18, 'sonu', 'sonu@gmail.com', 9828785695, 'sonu@123', '2024-02-12'),
(19, 'Harry', 'harry@gmail.com', 9828785695, 'harry@123', '2024-01-14'),
(20, 'Sunil', 'sunil@gmail.com', 9828785695, 'sunil@123', '2024-02-12'),
(21, 'Rahul', 'r@gmail.com', 9828785695, 'rahul@123', '2024-02-12'),
(33, 'Monika', 'monika@gmail.com', 9828785695, 'monika@123', '2024-02-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`),
  ADD UNIQUE KEY `test_id` (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`loginid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `loginid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
