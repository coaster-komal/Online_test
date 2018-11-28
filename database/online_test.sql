-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 07:27 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `branch` set('NA','CS','IT') NOT NULL,
  `year` set('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `branch`, `year`) VALUES
(51, 'Btech', 'CS', '1'),
(52, 'Btech', 'CS', '2'),
(53, 'Btech', 'CS', '3'),
(61, 'Btech', 'IT', '1'),
(101, 'MCA', 'NA', '1'),
(102, 'MCA', 'NA', '2');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`) VALUES
(1, 'manisha', 'manisha.sirus@gmail.com', 'restart of test', 'ek baar test khatm hone k baad  user chahe to fir se test de skta hai.ek baar test dene k baad card ko disable krdo');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ques_id` bigint(20) NOT NULL,
  `ques_desc` varchar(1500) NOT NULL,
  `opt1` varchar(1000) NOT NULL,
  `opt2` varchar(1000) NOT NULL,
  `opt3` varchar(1000) NOT NULL,
  `opt4` varchar(1000) NOT NULL,
  `curr_ans` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ques_id`, `ques_desc`, `opt1`, `opt2`, `opt3`, `opt4`, `curr_ans`) VALUES
(41, '1+1=', '1', '2', '3', '4', 2),
(42, '2+2=', '3', '4', '5', '6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ques_link`
--

CREATE TABLE `ques_link` (
  `test_id` int(50) NOT NULL,
  `q_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ques_link`
--

INSERT INTO `ques_link` (`test_id`, `q_id`) VALUES
(1, 41),
(1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `password`) VALUES
(8, 'Logan', '123456'),
(9, 'lakshmi29', 'lakshmi29'),
(10, 'komal', '123456'),
(11, 'Himanshu', '987654'),
(12, 'komal1', '123456'),
(13, 'zishan', '123456'),
(14, 'satyam', '123456'),
(15, '2016CA11', '2016CA11'),
(16, 'monish', '123456'),
(17, 'Pragya Singh', '123456789'),
(18, 'rishabh', '123456'),
(19, 'farhan', '123456'),
(20, 'tripti', 'triptiverma'),
(21, 'archiepandey', 'qwertyuiop'),
(22, 'simpi', 'simpi123'),
(23, 'Ayushi Gupta', 'ayushigupta'),
(24, '2016CA14', 'neosteam'),
(25, 'aakriti211', 'aakriti211'),
(26, 'preetimadan', '123456'),
(27, 'ARJOO', 'QWERTYUIOP'),
(28, 'Suruchi Suman', '1234567890'),
(29, '2016CA142', 'neosteam'),
(30, 'pankaj', '654321'),
(31, 'Gyayak', '123456'),
(32, 'mahima', 'mahima'),
(33, 'diksha', 'db12345'),
(34, 'sankarshan mish', '789shyam'),
(35, 'shivam', '123456'),
(36, 'anivesh', 'anivesh'),
(37, 'susmitagupta', 'susmita'),
(38, 'MP02', 'MONA02'),
(39, 'MONA02', 'MONA02'),
(40, 'shweta', '2016ca54'),
(41, 'rupam', '123456'),
(42, 'manisha', 'manisha6'),
(43, 'premkagrani', '12345678'),
(44, 'dilip kumar', 'dilip123'),
(45, 'shivangi', 'shivangi111'),
(46, 'abhishek', 'abhishek123'),
(47, 'ajay0007', '9685034121'),
(48, 'rohitshah1928@g', 'rk3348642   '),
(49, 'murmu', '123456'),
(50, 'rohitshah1928@g', 'rk3348642   '),
(51, 'rohitshah1928@g', '123456'),
(52, 'sankarshanmishr', '789shyam'),
(53, 'crisetime', '789456123'),
(54, 'sankarshan', '789456123'),
(55, 'ROHIT', '123456'),
(56, 'sunil', '987654'),
(57, 'satyendra', '12345678'),
(58, 'gonde', 'poiuyr'),
(59, 'Priya Soni', '2016ca20'),
(60, 'Arpit_Dixit', 'arpit123'),
(61, 'rohit1', 'rohit123'),
(62, 'Rahul', 'rahul1'),
(63, '2016ca85', '12345678'),
(64, 'Prem', '123456'),
(65, 'harneet6432', 'harneet@1234'),
(66, 'ShadyNS', 'nitish'),
(67, 'tushar8848', 'allahabadsucks'),
(68, 'thevkc', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `user_id` bigint(20) NOT NULL,
  `test_id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`user_id`, `test_id`, `username`, `result`) VALUES
(0, 0, '', 0),
(9, 51, 'lakshmi29', 7),
(10, 51, 'komal', 9),
(11, 51, 'Himanshu', 6),
(13, 51, 'zishan', 2),
(14, 51, 'satyam', 1),
(15, 51, '2016CA11', 0),
(16, 51, 'monish', 1),
(17, 51, 'Pragya Singh', 7),
(18, 51, 'rishabh', 2),
(19, 51, 'farhan', 2),
(20, 51, 'tripti', 8),
(21, 51, 'archiepandey', 8),
(22, 51, 'simpi', 9),
(23, 51, 'Ayushi Gupta', 9),
(24, 51, '2016CA14', 0),
(25, 51, 'aakriti211', 9),
(26, 51, 'preetimadan', 9),
(27, 51, 'ARJOO', 9),
(28, 51, 'Suruchi Suman', 8),
(29, 51, '2016CA142', 7),
(31, 51, 'Gyayak', 7),
(32, 51, 'mahima', 8),
(33, 51, 'diksha', 8),
(35, 51, 'shivam', 5),
(36, 51, 'anivesh', 4),
(37, 51, 'susmitagupta', 5),
(38, 51, 'MP02', 1),
(39, 51, 'MONA02', 6),
(40, 51, 'shweta', 8),
(41, 51, 'rupam', 8),
(42, 51, 'manisha', 6),
(43, 51, 'premkagrani', 5),
(46, 51, 'abhishek', 2),
(47, 51, 'ajay0007', 3),
(49, 51, 'murmu', 6),
(53, 51, 'crisetime', 10),
(54, 51, 'sankarshan', 3),
(55, 51, 'ROHIT', 5),
(56, 51, 'sunil', 7),
(57, 51, 'satyendra', 0),
(58, 51, 'gonde', 5),
(59, 51, 'Priya Soni', 9),
(60, 51, 'Arpit_Dixit', 7),
(62, 51, 'Rahul', 5),
(63, 51, '2016ca85', 1),
(64, 51, 'Prem', 4),
(65, 51, 'harneet6432', 1),
(66, 51, 'ShadyNS', 6),
(67, 51, 'tushar8848', 1),
(68, 51, 'thevkc', 8);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` varchar(40) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `j_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `c_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `s_name`, `c_id`, `t_id`) VALUES
(401, 'Data Structure', 102, 5);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(50) NOT NULL,
  `t_handle` varchar(50) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `t_handle`, `t_name`, `t_email`) VALUES
(5, '', 'DS KUSHWAHA', 'ds@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(50) NOT NULL,
  `sub_id` int(50) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `duration` time NOT NULL,
  `total_ques` int(50) NOT NULL,
  `pt_curr` int(50) NOT NULL DEFAULT '1',
  `pt_neg` int(50) NOT NULL DEFAULT '0',
  `pass_limit` int(50) NOT NULL,
  `active` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `sub_id`, `test_name`, `duration`, `total_ques`, `pt_curr`, `pt_neg`, `pass_limit`, `active`) VALUES
(1, 401, 'fresh', '02:00:00', 2, 1, 0, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `u_handle` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `type` set('admin','student','teacher') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `u_handle`, `u_pass`, `type`) VALUES
(1, 'teacher1', '12345', 'teacher'),
(2, 'student1', '12345', 'student'),
(3, 'admin', '12345', 'admin'),
(5, 'teacher2', '12345', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `useranswer`
--

CREATE TABLE `useranswer` (
  `user_id` bigint(20) NOT NULL,
  `test_id` bigint(20) NOT NULL,
  `que_id` bigint(20) NOT NULL,
  `user_ans` int(11) NOT NULL,
  `curr_ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useranswer`
--

INSERT INTO `useranswer` (`user_id`, `test_id`, `que_id`, `user_ans`, `curr_ans`) VALUES
(9, 51, 29, 1, 3),
(9, 51, 30, 3, 3),
(9, 51, 31, 2, 3),
(9, 51, 32, 4, 4),
(9, 51, 33, 2, 2),
(9, 51, 34, 2, 2),
(9, 51, 35, 1, 1),
(9, 51, 36, 4, 4),
(9, 51, 37, 3, 3),
(9, 51, 38, 3, 4),
(10, 51, 29, 3, 3),
(10, 51, 30, 3, 3),
(10, 51, 31, 3, 3),
(10, 51, 32, 4, 4),
(10, 51, 33, 2, 2),
(10, 51, 34, 2, 2),
(10, 51, 35, 1, 1),
(10, 51, 36, 2, 4),
(10, 51, 37, 3, 3),
(10, 51, 38, 4, 4),
(11, 51, 29, 3, 3),
(11, 51, 30, 3, 3),
(11, 51, 31, 1, 3),
(11, 51, 32, 4, 4),
(11, 51, 33, 4, 2),
(11, 51, 34, 2, 2),
(11, 51, 35, 1, 1),
(11, 51, 36, 3, 4),
(11, 51, 37, 3, 3),
(11, 51, 38, 3, 4),
(13, 51, 29, 3, 3),
(13, 51, 30, 4, 3),
(13, 51, 31, 3, 3),
(13, 51, 32, 2, 4),
(14, 51, 29, 3, 3),
(14, 51, 30, 2, 3),
(16, 51, 29, 3, 3),
(16, 51, 30, 4, 3),
(17, 51, 29, 3, 3),
(17, 51, 30, 4, 3),
(17, 51, 31, 3, 3),
(17, 51, 32, 4, 4),
(17, 51, 33, 1, 2),
(17, 51, 34, 2, 2),
(17, 51, 35, 1, 1),
(17, 51, 36, 2, 4),
(17, 51, 37, 3, 3),
(17, 51, 38, 4, 4),
(18, 51, 29, 3, 3),
(18, 51, 30, 3, 3),
(19, 51, 29, 3, 3),
(19, 51, 30, 3, 3),
(20, 51, 29, 3, 3),
(20, 51, 30, 3, 3),
(20, 51, 31, 3, 3),
(20, 51, 32, 4, 4),
(20, 51, 33, 2, 2),
(20, 51, 34, 2, 2),
(20, 51, 35, 1, 1),
(20, 51, 36, 2, 4),
(20, 51, 37, 2, 3),
(20, 51, 38, 4, 4),
(21, 51, 29, 3, 3),
(21, 51, 30, 3, 3),
(21, 51, 31, 3, 3),
(21, 51, 32, 4, 4),
(21, 51, 33, 1, 2),
(21, 51, 34, 2, 2),
(21, 51, 35, 1, 1),
(21, 51, 36, 2, 4),
(21, 51, 37, 3, 3),
(21, 51, 38, 4, 4),
(22, 51, 29, 3, 3),
(22, 51, 30, 3, 3),
(22, 51, 31, 3, 3),
(22, 51, 32, 4, 4),
(22, 51, 33, 3, 2),
(22, 51, 34, 2, 2),
(22, 51, 35, 1, 1),
(22, 51, 36, 4, 4),
(22, 51, 37, 3, 3),
(22, 51, 38, 4, 4),
(23, 51, 29, 3, 3),
(23, 51, 30, 2, 3),
(23, 51, 31, 3, 3),
(23, 51, 32, 4, 4),
(23, 51, 33, 2, 2),
(23, 51, 34, 2, 2),
(23, 51, 35, 1, 1),
(23, 51, 36, 4, 4),
(23, 51, 37, 3, 3),
(23, 51, 38, 4, 4),
(25, 51, 29, 3, 3),
(25, 51, 30, 2, 3),
(25, 51, 31, 3, 3),
(25, 51, 32, 4, 4),
(25, 51, 33, 2, 2),
(25, 51, 34, 2, 2),
(25, 51, 35, 1, 1),
(25, 51, 36, 4, 4),
(25, 51, 37, 3, 3),
(25, 51, 38, 4, 4),
(26, 51, 29, 3, 3),
(26, 51, 30, 3, 3),
(26, 51, 31, 3, 3),
(26, 51, 32, 3, 4),
(26, 51, 33, 2, 2),
(26, 51, 34, 2, 2),
(26, 51, 35, 1, 1),
(26, 51, 36, 4, 4),
(26, 51, 37, 3, 3),
(26, 51, 38, 4, 4),
(27, 51, 29, 3, 3),
(27, 51, 30, 3, 3),
(27, 51, 31, 3, 3),
(27, 51, 32, 4, 4),
(27, 51, 33, 2, 2),
(27, 51, 34, 2, 2),
(27, 51, 35, 1, 1),
(27, 51, 36, 2, 4),
(27, 51, 37, 3, 3),
(27, 51, 38, 4, 4),
(28, 51, 29, 1, 3),
(28, 51, 30, 3, 3),
(28, 51, 31, 3, 3),
(28, 51, 32, 4, 4),
(28, 51, 33, 2, 2),
(28, 51, 34, 2, 2),
(28, 51, 35, 1, 1),
(28, 51, 36, 4, 4),
(28, 51, 37, 4, 3),
(28, 51, 38, 4, 4),
(29, 51, 29, 3, 3),
(29, 51, 30, 2, 3),
(29, 51, 31, 3, 3),
(29, 51, 32, 4, 4),
(29, 51, 33, 1, 2),
(29, 51, 34, 2, 2),
(29, 51, 35, 1, 1),
(29, 51, 36, 2, 4),
(29, 51, 37, 3, 3),
(29, 51, 38, 4, 4),
(31, 51, 29, 3, 3),
(31, 51, 30, 3, 3),
(31, 51, 31, 2, 3),
(31, 51, 32, 1, 4),
(31, 51, 33, 2, 2),
(31, 51, 34, 2, 2),
(31, 51, 35, 1, 1),
(31, 51, 36, 3, 4),
(31, 51, 37, 3, 3),
(31, 51, 38, 4, 4),
(32, 51, 29, 1, 3),
(32, 51, 30, 3, 3),
(32, 51, 31, 3, 3),
(32, 51, 32, 4, 4),
(32, 51, 33, 3, 2),
(32, 51, 34, 2, 2),
(32, 51, 35, 1, 1),
(32, 51, 36, 4, 4),
(32, 51, 37, 3, 3),
(32, 51, 38, 4, 4),
(33, 51, 29, 3, 3),
(33, 51, 30, 2, 3),
(33, 51, 31, 3, 3),
(33, 51, 32, 3, 4),
(33, 51, 33, 2, 2),
(33, 51, 34, 2, 2),
(33, 51, 35, 1, 1),
(33, 51, 36, 4, 4),
(33, 51, 37, 3, 3),
(33, 51, 38, 4, 4),
(35, 51, 29, 3, 3),
(35, 51, 30, 3, 3),
(35, 51, 31, 1, 3),
(35, 51, 32, 3, 4),
(35, 51, 33, 2, 2),
(35, 51, 34, 2, 2),
(35, 51, 35, 1, 1),
(35, 51, 36, 2, 4),
(35, 51, 37, 2, 3),
(35, 51, 38, 3, 4),
(36, 51, 29, 3, 3),
(36, 51, 30, 3, 3),
(36, 51, 31, 1, 3),
(36, 51, 32, 1, 4),
(36, 51, 33, 2, 2),
(36, 51, 34, 2, 2),
(36, 51, 35, 4, 1),
(36, 51, 36, 2, 4),
(36, 51, 37, 2, 3),
(36, 51, 38, 1, 4),
(37, 51, 29, 3, 3),
(37, 51, 30, 4, 3),
(37, 51, 31, 1, 3),
(37, 51, 32, 3, 4),
(37, 51, 33, 3, 2),
(37, 51, 34, 1, 2),
(37, 51, 35, 1, 1),
(37, 51, 36, 4, 4),
(37, 51, 37, 3, 3),
(37, 51, 38, 4, 4),
(38, 51, 38, 4, 4),
(39, 51, 29, 3, 3),
(39, 51, 30, 2, 3),
(39, 51, 31, 3, 3),
(39, 51, 32, 3, 4),
(39, 51, 33, 2, 2),
(39, 51, 34, 2, 2),
(39, 51, 35, 1, 1),
(39, 51, 36, 2, 4),
(39, 51, 37, 4, 3),
(39, 51, 38, 4, 4),
(40, 51, 29, 3, 3),
(40, 51, 30, 2, 3),
(40, 51, 31, 3, 3),
(40, 51, 32, 4, 4),
(40, 51, 33, 2, 2),
(40, 51, 34, 2, 2),
(40, 51, 35, 1, 1),
(40, 51, 36, 4, 4),
(40, 51, 38, 4, 4),
(41, 51, 29, 3, 3),
(41, 51, 30, 3, 3),
(41, 51, 31, 3, 3),
(41, 51, 32, 4, 4),
(41, 51, 33, 2, 2),
(41, 51, 34, 1, 2),
(41, 51, 35, 1, 1),
(41, 51, 36, 2, 4),
(41, 51, 37, 3, 3),
(41, 51, 38, 4, 4),
(42, 51, 29, 3, 3),
(42, 51, 30, 2, 3),
(42, 51, 31, 3, 3),
(42, 51, 32, 3, 4),
(42, 51, 33, 2, 2),
(42, 51, 34, 2, 2),
(42, 51, 35, 1, 1),
(42, 51, 36, 2, 4),
(42, 51, 38, 4, 4),
(43, 51, 29, 3, 3),
(43, 51, 30, 2, 3),
(43, 51, 31, 3, 3),
(43, 51, 32, 3, 4),
(43, 51, 33, 3, 2),
(43, 51, 34, 2, 2),
(43, 51, 35, 1, 1),
(43, 51, 36, 3, 4),
(43, 51, 37, 3, 3),
(43, 51, 38, 3, 4),
(46, 51, 29, 1, 3),
(46, 51, 30, 1, 3),
(46, 51, 31, 3, 3),
(46, 51, 32, 1, 4),
(46, 51, 33, 4, 2),
(46, 51, 34, 2, 2),
(46, 51, 35, 2, 1),
(46, 51, 36, 1, 4),
(46, 51, 37, 1, 3),
(46, 51, 38, 3, 4),
(47, 51, 29, 3, 3),
(47, 51, 30, 2, 3),
(47, 51, 31, 2, 3),
(47, 51, 32, 2, 4),
(47, 51, 33, 3, 2),
(47, 51, 34, 2, 2),
(47, 51, 35, 2, 1),
(47, 51, 36, 3, 4),
(47, 51, 37, 3, 3),
(47, 51, 38, 3, 4),
(49, 51, 29, 2, 3),
(49, 51, 30, 2, 3),
(49, 51, 31, 3, 3),
(49, 51, 32, 4, 4),
(49, 51, 33, 4, 2),
(49, 51, 34, 2, 2),
(49, 51, 35, 4, 1),
(49, 51, 36, 4, 4),
(49, 51, 37, 3, 3),
(49, 51, 38, 4, 4),
(53, 51, 29, 3, 3),
(53, 51, 30, 3, 3),
(53, 51, 31, 3, 3),
(53, 51, 32, 4, 4),
(53, 51, 33, 2, 2),
(53, 51, 34, 2, 2),
(53, 51, 35, 1, 1),
(53, 51, 36, 4, 4),
(53, 51, 37, 3, 3),
(53, 51, 38, 4, 4),
(54, 51, 29, 3, 3),
(54, 51, 30, 3, 3),
(54, 51, 31, 2, 3),
(54, 51, 32, 3, 4),
(54, 51, 33, 2, 2),
(54, 51, 34, 3, 2),
(54, 51, 35, 2, 1),
(54, 51, 36, 3, 4),
(54, 51, 37, 2, 3),
(54, 51, 38, 3, 4),
(55, 51, 29, 2, 3),
(55, 51, 30, 1, 3),
(55, 51, 31, 3, 3),
(55, 51, 32, 4, 4),
(55, 51, 33, 2, 2),
(55, 51, 34, 2, 2),
(55, 51, 35, 1, 1),
(55, 51, 36, 3, 4),
(55, 51, 37, 2, 3),
(55, 51, 38, 1, 4),
(56, 51, 29, 2, 3),
(56, 51, 30, 2, 3),
(56, 51, 31, 3, 3),
(56, 51, 32, 4, 4),
(56, 51, 33, 2, 2),
(56, 51, 34, 2, 2),
(56, 51, 35, 1, 1),
(56, 51, 36, 3, 4),
(56, 51, 37, 3, 3),
(56, 51, 38, 4, 4),
(57, 51, 30, 2, 3),
(57, 51, 32, 4, 4),
(57, 51, 34, 2, 2),
(57, 51, 35, 1, 1),
(57, 51, 36, 2, 4),
(57, 51, 37, 3, 3),
(57, 51, 38, 3, 4),
(58, 51, 29, 3, 3),
(58, 51, 30, 2, 3),
(58, 51, 31, 3, 3),
(58, 51, 32, 4, 4),
(58, 51, 33, 1, 2),
(58, 51, 34, 1, 2),
(58, 51, 35, 1, 1),
(58, 51, 36, 2, 4),
(58, 51, 37, 3, 3),
(58, 51, 38, 3, 4),
(59, 51, 29, 3, 3),
(59, 51, 30, 3, 3),
(59, 51, 31, 3, 3),
(59, 51, 32, 4, 4),
(59, 51, 33, 2, 2),
(59, 51, 34, 2, 2),
(59, 51, 35, 1, 1),
(59, 51, 36, 4, 4),
(59, 51, 37, 2, 3),
(59, 51, 38, 4, 4),
(60, 51, 29, 3, 3),
(60, 51, 30, 2, 3),
(60, 51, 31, 3, 3),
(60, 51, 32, 4, 4),
(60, 51, 33, 3, 2),
(60, 51, 34, 2, 2),
(60, 51, 35, 1, 1),
(60, 51, 36, 4, 4),
(60, 51, 37, 4, 3),
(60, 51, 38, 4, 4),
(62, 51, 29, 3, 3),
(62, 51, 30, 2, 3),
(62, 51, 31, 1, 3),
(62, 51, 32, 4, 4),
(62, 51, 34, 2, 2),
(62, 51, 35, 4, 1),
(62, 51, 36, 4, 4),
(62, 51, 37, 2, 3),
(62, 51, 38, 4, 4),
(63, 51, 29, 1, 3),
(63, 51, 30, 2, 3),
(63, 51, 31, 3, 3),
(63, 51, 32, 2, 4),
(63, 51, 33, 3, 2),
(64, 51, 29, 3, 3),
(64, 51, 30, 3, 3),
(64, 51, 31, 1, 3),
(64, 51, 32, 3, 4),
(64, 51, 33, 4, 2),
(64, 51, 34, 2, 2),
(64, 51, 35, 2, 1),
(64, 51, 36, 4, 4),
(64, 51, 37, 2, 3),
(64, 51, 38, 3, 4),
(65, 51, 38, 4, 4),
(66, 51, 29, 3, 3),
(66, 51, 30, 2, 3),
(66, 51, 31, 3, 3),
(66, 51, 32, 3, 4),
(66, 51, 33, 2, 2),
(66, 51, 34, 2, 2),
(66, 51, 35, 4, 1),
(66, 51, 36, 4, 4),
(66, 51, 37, 1, 3),
(66, 51, 38, 4, 4),
(67, 51, 38, 4, 4),
(68, 51, 29, 3, 3),
(68, 51, 30, 3, 3),
(68, 51, 31, 3, 3),
(68, 51, 32, 4, 4),
(68, 51, 33, 2, 2),
(68, 51, 34, 2, 2),
(68, 51, 35, 1, 1),
(68, 51, 36, 2, 4),
(68, 51, 37, 2, 3),
(68, 51, 38, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `ques_link`
--
ALTER TABLE `ques_link`
  ADD PRIMARY KEY (`test_id`,`q_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`,`username`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`user_id`,`test_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `t_handle` (`t_handle`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`u_handle`);

--
-- Indexes for table `useranswer`
--
ALTER TABLE `useranswer`
  ADD PRIMARY KEY (`user_id`,`test_id`,`que_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ques_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
