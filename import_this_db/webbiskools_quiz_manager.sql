-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2020 at 06:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbiskools_quiz_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `category`) VALUES
(2, '2', '1 + 1 =?', 'A. 2', 'B. 6', 'C. 9', 'D. 8', 'A. 2', 'Mathematics'),
(3, '1', 'What is 50 * 5?', 'A. 2500', 'B. 505', 'C. 500', 'D. None of these', 'D. None of these', 'Mathematics'),
(4, '3', 'What is 90 / 10 ?', 'A. 10', 'B. 900', 'C. 9', 'D. 1', 'C. 9', 'Mathematics'),
(5, '1', 'How is carbohydrate stored in plants?', 'A. Cellulose', 'B. Starch', 'C. Protein', 'D. Lipids', 'B. Starch', 'Biology'),
(6, '2', 'During day time, plants absorb:', 'A. Oxygen', 'B. Carbon dioxide', 'C. Nitrous oxide', 'D. Carbon monoxide', 'B. Carbon dioxide', 'Biology'),
(7, '3', 'Which part of the heart receives dexoygenated blood?', 'A. Right atrium', 'B. Left atrium', 'C. Right ventricle', 'D. Left ventricle', 'A. Right atrium', 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category`
--

CREATE TABLE `quiz_category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_category`
--

INSERT INTO `quiz_category` (`id`, `category`) VALUES
(1, 'Mathematics'),
(2, 'Biology'),
(5, 'Chemistry'),
(6, 'Physics'),
(7, 'Psychology'),
(8, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `total_questions` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `incorrect_answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `permission` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permission`) VALUES
(1, 'admin_edit1', '01f3c81f998658f1f08ca4c7687ebc3d', 'edit'),
(2, 'user_view1', '915a5036952fba615603d650bc7e1c1e', 'view'),
(3, 'user_restricted1', '0cbd5241747423f9e703704c65e46259', 'restricted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_category`
--
ALTER TABLE `quiz_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quiz_category`
--
ALTER TABLE `quiz_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
