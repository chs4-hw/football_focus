-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2019 at 07:59 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNDSOFTS2A9`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrator`
--

CREATE TABLE IF NOT EXISTS `Administrator` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` char(40) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `Administrator`
--

INSERT INTO `Administrator` (`user_id`, `first_name`, `last_name`, `username`, `pass`, `reg_date`) VALUES
(21, 'Jack', 'Doe', 'Admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2019-05-09'),
(28, 'Jane', 'Doe', 'NewAdmin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2019-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE IF NOT EXISTS `Player` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(40) NOT NULL,
  `player_pos` varchar(30) NOT NULL,
  `player_age` int(11) NOT NULL,
  `player_dob` varchar(20) NOT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`player_id`, `player_name`, `player_pos`, `player_age`, `player_dob`) VALUES
(1, 'Greg Fleming', 'Goalkeeper', 32, '27 September 1986'),
(2, 'Sam Henderson', 'Goalkeeper', 20, '19 January 1999'),
(3, 'Jason Brown', 'Centre-Back', 22, '7 July 1996'),
(4, 'Mick Dunlop', 'Centre-Back', 36, '5 November 1982'),
(5, 'David McCracken', 'Centre-Back', 37, '16 October 1981'),
(6, 'Cameron Eadie', 'Centre-Back', 21, '27 February 1998'),
(7, 'Paddy Boyle', 'Left-Back', 32, '20 March 1987'),
(8, 'Callum Home', 'Right-Back', 26, '25 September 1992'),
(9, 'Ross Willox', 'Central Midfield', 20, '24 November 1998'),
(10, 'Simon Ferry', 'Central Midfield', 31, '11 January 1988'),
(11, 'Scott Brown', 'Central Midfield', 24, '25 November 1994'),
(12, 'Jack Leitch', 'Central Midfield', 23, '17 July 1995'),
(13, 'Liam MacDonald', 'Central Midfield', 19, '6 October 1999'),
(14, 'Jamie Stevenson', 'Right Midfield', 34, '13 July 1984'),
(15, 'Ryan Dow', 'Left Midfield', 27, '7 June 1991'),
(16, 'Nicky Riley', 'Left Midfield', 32, '10 May 1986'),
(17, 'Wullie Gibson', 'Left Midfield', 34, '6 August 1984'),
(18, 'Paul Willis', 'Attacking Midfield', 27, '21 August 1991'),
(19, 'Rory McAllister', 'Centre-Forward', 31, '13 May 1987'),
(20, 'Shane Sutherland', 'Centre-Forward', 28, '23 October 1990'),
(22, 'Derek Lyle', 'Centre-Forward', 38, '13 February 1981');

-- --------------------------------------------------------

--
-- Table structure for table `Results`
--

CREATE TABLE IF NOT EXISTS `Results` (
  `match_id` int(20) NOT NULL AUTO_INCREMENT,
  `team1name` varchar(30) NOT NULL,
  `team2name` varchar(30) NOT NULL,
  `team1_score` int(11) NOT NULL,
  `team2_score` int(11) NOT NULL,
  `match_date` varchar(20) NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Results`
--

INSERT INTO `Results` (`match_id`, `team1name`, `team2name`, `team1_score`, `team2_score`, `match_date`) VALUES
(1, 'Peterhead', 'Elgin City', 1, 0, '2 March 2019'),
(2, 'Cowdenbeath', 'Peterhead', 1, 3, '5 March 2019'),
(3, 'Peterhead', 'Annan Athletic', 2, 1, '9 March 2019'),
(4, 'Berwick Rangers', 'Peterhead', 2, 0, '19 March 2019'),
(5, 'Edinburgh City', 'Peterhead', 0, 0, '23 March 2019'),
(6, 'Peterhead', 'Cowdenbeath', 2, 1, '30 March 2019'),
(7, 'Clyde', 'Peterhead', 3, 3, '6 April 2019'),
(8, 'Peterhead', 'Albion', 1, 1, '13 April 2019'),
(9, 'Elgin', 'Peterhead', 1, 2, '20 April 2019'),
(10, 'Peterhead', 'Stirling', 1, 1, '27 April 2019'),
(11, 'Queen''s Park', 'Peterhead', 0, 2, '4 May 2019');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` char(40) NOT NULL,
  `subscript` varchar(3) NOT NULL,
  `mail_list` varchar(3) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `subscript`, `mail_list`, `reg_date`) VALUES
(60, 'Mail', 'User 1', 'colinhiltonsmith@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'no', 'yes', '2019-05-17'),
(61, 'Mail', 'User 2', 'colinsmith50@yahoo.co.uk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'no', 'yes', '2019-05-17'),
(62, 'Jon', 'Doe', 'jondoe@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'no', 'yes', '2019-05-17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
