-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2017 at 04:31 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `author_id` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(1, 'Benjamin C Pierce'),
(2, 'Harold Abelson'),
(3, 'Thomas H. Cormen'),
(4, 'Michael Sipser'),
(5, 'Russell'),
(6, 'Andrew S. Tanenbaum'),
(7, 'Steve McConnell'),
(8, 'Jon Erickson'),
(9, 'Erich Gamma'),
(10, 'Jon L. Bentley'),
(11, ' Adel S. Sedra '),
(12, ' Paul Scherz '),
(13, ' B.P. Lathi '),
(14, ' Stephen D. Brown '),
(15, ' Paul Horowitz'),
(16, 'William J. Beyda'),
(17, 'Peter Erik Mellquist'),
(18, 'Uyless Black'),
(19, 'Nathan J. Muller'),
(20, 'Annabel Z. Dodd'),
(21, 'Stephen Haag'),
(22, 'Vladimir S. Lerner'),
(23, 'Cheng Hsu'),
(24, 'Peter Rob'),
(25, 'Jane Laudon');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `book_isbn` int(11) NOT NULL,
  `book_title` varchar(50) DEFAULT NULL,
  `actual_copies` int(11) DEFAULT NULL,
  `current_copies` int(11) DEFAULT NULL,
  `published_year` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`book_isbn`),
  UNIQUE KEY `book_isbn` (`book_isbn`),
  KEY `author_id` (`author_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_isbn`, `book_title`, `actual_copies`, `current_copies`, `published_year`, `category_id`, `author_id`) VALUES
(262162463, 'Modern Operating Systems', 21, 21, 2006, 2, 6),
(262162666, 'Artificial Intelligence 3e: A Modern Approach', 15, 15, 2005, 1, 5),
(262162652, 'Introduction to the Theory of Computation', 19, 19, 2005, 1, 4),
(262510364, 'Introduction to Algorithms', 25, 25, 2000, 1, 3),
(262510871, 'Structure and Interpretation of Computer Programs', 29, 29, 1996, 1, 2),
(262162091, 'Types and Programming Languages', 20, 20, 2002, 1, 1),
(262162877, 'Code Complete', 21, 21, 2007, 2, 7),
(262164255, 'Hacking: The Art of Exploitation', 26, 26, 2007, 2, 8),
(262134747, 'Design Patterns', 16, 16, 2000, 2, 9),
(262126727, 'Programming Pearls', 7, 7, 2002, 2, 10),
(262116573, 'Microelectronic Circuits', 27, 27, 2004, 3, 11),
(262169674, 'Practical Electronics for Inventors', 34, 34, 2003, 3, 12),
(262166846, 'Linear Systems and Signals', 23, 23, 2001, 3, 13),
(262168656, 'Fundamentals of Digital Logic with Verilog Design', 14, 14, 2000, 3, 14),
(262167436, 'The Art of Electronics', 8, 8, 1999, 3, 15),
(262169808, 'Data Communications', 9, 9, 1998, 4, 16),
(262163256, 'SNMP++', 14, 14, 2002, 4, 17),
(262169556, 'ATM, Volume I', 14, 14, 1997, 4, 18),
(264853767, 'LANs to WANs', 7, 7, 2007, 4, 19),
(262247676, 'The Essential Guide to Telecommunications', 9, 9, 2008, 4, 20),
(262677582, 'Management Information Systems', 16, 16, 2006, 5, 21),
(262162456, 'Information Systems Analysis and Modeling', 18, 18, 2005, 5, 22),
(262136667, 'Enterprise Integration and Modeling', 16, 16, 2006, 5, 23),
(262165247, 'Database Systems', 13, 13, 1999, 5, 24),
(262184546, 'Essentials of Business Information Systems', 12, 12, 2003, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

DROP TABLE IF EXISTS `borrower`;
CREATE TABLE IF NOT EXISTS `borrower` (
  `borrower_id` int(11) NOT NULL AUTO_INCREMENT,
  `borrowed_from` date DEFAULT NULL,
  `borrowed_to` date DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `book_isbn` int(11) DEFAULT NULL,
  PRIMARY KEY (`borrower_id`),
  UNIQUE KEY `borrower_id` (`borrower_id`),
  KEY `student_id` (`student_id`),
  KEY `book_isbn` (`book_isbn`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Computer Science'),
(2, 'Computer Engineering'),
(3, 'Electrical'),
(4, 'Telecommunications'),
(5, 'MIS');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`department_id`),
  UNIQUE KEY `department_id` (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(11, 'Computer Science'),
(22, 'Computer Engineering'),
(33, 'Electrical'),
(44, 'Telecommunications'),
(55, 'MIS');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(10) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `staff_password` varchar(20) NOT NULL,
  `designation` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `staff_id` (`staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(25) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id` (`student_id`),
  KEY `department_id` (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
