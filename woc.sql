-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 11:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category_name`) VALUES
(1, 'Sports Activities'),
(2, 'Cultural Activities'),
(3, 'Technical Activities'),
(4, 'Stream Specific');

-- --------------------------------------------------------

--
-- Table structure for table `emequery`
--

CREATE TABLE `emequery` (
  `emequery_id` int(5) UNSIGNED NOT NULL,
  `author` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emequery`
--

INSERT INTO `emequery` (`emequery_id`, `author`, `content`, `date_posted`) VALUES
(1, 'Vansh', 'ADWSDWDWSSxcdzdcws', '2020-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `subcat_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `date_posted` date NOT NULL,
  `views` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `cat_id`, `subcat_id`, `author`, `content`, `date_posted`, `views`) VALUES
(1, 3, 15, 'Arpit ', 'Sir, I am from second Year and i want to improve my coding skills. \r\nSo, I want you to tell me which platform is good to improve my skills.', '2019-10-25', 0),
(2, 1, 1, 'Madhav', 'Sir, I love to play Football in my school days and I want to continue my passion in college.\r\nSo, Please sir tell me the date and Venue of the football trials in MNNIT', '2019-08-08', 0),
(3, 4, 23, 'Diviansh', 'Sir, I want to know about the procedure of branch updating.\r\nAs in my JEE exam I am unable to score good rank due to some health issue.But this time I want to work hard and get my dream branch Mechanical.', '2019-08-01', 0),
(4, 2, 9, 'Devang', 'Sir, I am very much passinate to show my drama skills on stage.\r\nSo, I want to Know about Dramatics Culture in MNNIT and how can I participate into this Cultural activity.', '2019-08-17', 0),
(5, 4, 18, 'Vansh', 'I want learn Python but unable to get good resources.\r\nPlease anyone tell me the best resources for Python Learning.', '2020-01-16', 0),
(6, 4, 20, 'Pooja', 'Hello Sir, I am in 3rd year.\r\nI want to know about the Future scope in Mechanical Engineering.\r\n', '2020-02-19', 0),
(7, 3, 16, 'Aman', 'Sir, I completed the Machine Learning course from deeplearning.ai.\r\nI want to know about what can i do futher to improve my AI skills.\r\nAnd what projects i can made on ML/AI to sharpen my skills.', '2020-01-31', 0),
(8, 2, 14, 'Arushi', 'Hello Sir and Ma\'am, I think that the god gift to me is my Voice. As I got selected in Indian Idel Round 2.\r\nThis shows my passion towards music.\r\nSo, I want to know about how the selection of Music Committee.', '2019-08-03', 0),
(9, 1, 2, 'Rudra', 'Sir, I want to know about the josh Tournament as due to my leg Injury I am not able to come for cricket selection but this time I want to show my capablities.', '2021-01-17', 0),
(10, 1, 5, 'Divianshi', 'Hello everyone I listen very much about the Athletics Team of MNNIT and I want to be the part of this great community.\r\nSo, Please tell me the Ways i could join this.', '2019-10-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `subcat_id` int(10) UNSIGNED NOT NULL,
  `query_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `date_posted` date NOT NULL,
  `Likes` int(5) UNSIGNED NOT NULL,
  `Dislikes` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `cat_id`, `subcat_id`, `query_id`, `author`, `comment`, `date_posted`, `Likes`, `Dislikes`) VALUES
(1, 1, 5, 10, 'Avika', 'Yes, our college\'s athletics team is very Good and have lots of achievements in inter NIT competitions.\r\nTo be the part of this team you has to qualify the team trials which held every year.', '2019-10-10', 4, 1),
(2, 1, 5, 10, 'Lalit', 'Yes, no doubt our MNNIT\'s athletics team is awesome. If you want to participate into this team you has to show your capablities.\r\nAs trials for athletics team is held every year.', '2019-10-12', 1, 1),
(3, 1, 2, 9, 'vansh', 'cszdcasaz', '2020-05-19', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `Subcat_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `subcat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`Subcat_id`, `parent_id`, `subcat_name`) VALUES
(1, 1, 'FootBall'),
(2, 1, 'Cricket'),
(3, 1, 'Basketball'),
(4, 1, 'Hockey'),
(5, 1, 'Athletics'),
(6, 1, 'VolleyBall'),
(7, 1, 'Skating'),
(8, 1, 'Gym'),
(9, 2, 'Dramatics'),
(10, 2, 'Garbha Dance'),
(11, 2, 'Western Dance'),
(12, 2, 'Arts'),
(13, 2, 'Bhangda'),
(14, 2, 'Music'),
(15, 3, 'Computer Club'),
(16, 3, 'Robotics'),
(17, 3, 'Aero Club'),
(18, 4, 'CSE'),
(19, 4, 'IT'),
(20, 4, 'Mechanical'),
(21, 4, 'Electrical'),
(22, 4, 'Biotechnlogy'),
(23, 4, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `woc_users`
--

CREATE TABLE `woc_users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `woc_users`
--

INSERT INTO `woc_users` (`ID`, `Name`, `Email`, `Username`, `Password`) VALUES
(1, 'Amit Gupta', 'amit@gmail.com', 'amit', 'pass'),
(2, 'Madhav', 'madhav@gmail.com', 'madhav', 'pass'),
(3, 'Vansh', 'vansh@gmail.com', 'vansh', 'pass'),
(4, 'Sandharsh', 'sandharsh@gmail.com', 'sandharsh', 'pass'),
(5, 'Aman', 'aman@gmail.com', 'aman', 'pass'),
(6, 'Diviansh', 'diviansh@gmail.com', 'diviansh', 'pass'),
(7, 'Devang', 'devang@gmail.com', 'devang', 'pass'),
(8, 'Ayush', 'ayush@gmail.com', 'ayush', 'pass'),
(9, 'Arushi', 'arushi@gmail.com', 'arushi', 'pass'),
(10, 'Khushi', 'khushi@gmail.com', 'khushi', 'pass'),
(11, 'Avika', 'avika@gmail.com', 'avika', 'pass'),
(12, 'Charvi', 'charvi@gmail.com', 'charvi', 'pass'),
(13, 'Rudra', 'rudra@gmail.com', 'rudra', 'pass'),
(14, 'Anvasha', 'anvasha@gmail.com', 'anvasha', 'pass'),
(15, 'Tushar', 'tushar@gmail.com', 'tushar', 'pass'),
(16, 'Deepti', 'deepti@gmail.com', 'deepti', 'pass'),
(17, 'Anamika', 'anamika@gmail.com', 'anamika', 'pass'),
(18, 'Rekha', 'rekha@gmail.com', 'rekha', 'pass'),
(19, 'Puja', 'puja@gmail.com', 'puja', 'pass'),
(20, 'Advik', 'advik@gmail.com', 'advik', 'pass'),
(21, 'Gunjan', 'gunjan@gmail.com', 'gunjan', 'pass'),
(22, 'Rohit', 'rohit@gmail.com', 'rohit', 'pass'),
(23, 'Sanjeev', 'sanjeev@gmail.com', 'sanjeev', 'pass'),
(24, 'Prateek', 'prateek@gmail.com', 'prateek', 'pass'),
(25, 'Lalit', 'lalit@gmail.com', 'lalit', 'pass'),
(26, 'Manvardhan', 'manvardhan@gmail.com', 'manvardhan', 'pass'),
(27, 'Poonam', 'poonam@gmail.com', 'poonam', 'pass'),
(28, 'Prachi', 'prachi@gmail.com', 'prachi', 'pass'),
(29, 'Renu', 'renu@gmail.com', 'renu', 'pass'),
(30, 'Arpit', 'arpit@gmail.com', 'arpit', 'pass'),
(31, 'Divianshi', 'divianshi@gmail.com', 'divianshi', 'pass'),
(32, 'Udit', 'udit@gmail.com', 'udit', 'pass'),
(33, 'Ravi', 'ravi@gmail.com', 'ravi', 'pass'),
(34, 'Devandr', 'devandr@gmail.com', 'devandr', 'pass'),
(35, 'Ashish', 'ashish@gmail.com', 'ashish', 'pass'),
(36, 'Amit', 'amit@gmail.com', 'Ammmy7500', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `emequery`
--
ALTER TABLE `emequery`
  ADD PRIMARY KEY (`emequery_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`Subcat_id`);

--
-- Indexes for table `woc_users`
--
ALTER TABLE `woc_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emequery`
--
ALTER TABLE `emequery`
  MODIFY `emequery_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `Subcat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `woc_users`
--
ALTER TABLE `woc_users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
