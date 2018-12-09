-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 07:23 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bluetooth`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE IF NOT EXISTS `activitylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `date` text NOT NULL,
  `log_type` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `description`, `date`, `log_type`, `value`) VALUES
(5, 'Deleted a user', '2015-06-08T06:27:10 AM', 1, ''),
(6, 'Created user', '2015-06-08 06:27:45 AM', 1, 'arthur.patrimonio'),
(7, 'User Uploaded a file', '2015-06-08 06:28:23 AM', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `givenfilename` varchar(255) NOT NULL,
  `filepath` text NOT NULL,
  `client_filepath` text NOT NULL,
  `thumbnail` text NOT NULL,
  `date_uploaded` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `uploaderid` int(11) NOT NULL,
  `uploaderun` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `givenfilename`, `filepath`, `client_filepath`, `thumbnail`, `date_uploaded`, `uploader`, `uploaderid`, `uploaderun`) VALUES
(1, 'CCS323_G02.csv', 'CCS323_G02', './uploads/users/e778cf2e6d9c26dcc2618f1de23af5c5/CCS323_G02.csv', '', '', '2015-06-08 06:28:23 AM', 'User', 3, 'arthur.patrimonio');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_no` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_joined` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `userfolder` varchar(255) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_no`, `pid`, `username`, `password`, `email`, `firstname`, `middlename`, `lastname`, `nickname`, `birthdate`, `birthplace`, `address`, `date_joined`, `date_updated`, `type`, `userfolder`, `image`) VALUES
(1, '', '', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 'Hello', '', 'Im Admin', '', '15-06-2015', '', '', '2015-05-31 10:31:44 AM', '2015-06-04 06:58:12 PM', 1, '', ''),
(3, '', '', 'arthur.patrimonio', 'e10adc3949ba59abbe56e057f20f883e', '', 'Arthur', '', 'Patrimonio', '', '', '', '', '2015-06-08 06:27:45 AM', '', 10, 'e778cf2e6d9c26dcc2618f1de23af5c5', '');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `lastlogin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `userid`, `lastlogin`) VALUES
(1, 1, '2009-01-10 12:07:59 AM'),
(2, 1, '2009-01-10 12:11:11 AM'),
(3, 1, '2009-01-10 12:12:03 AM'),
(4, 1, '2009-01-10 12:13:57 AM'),
(5, 1, '2015-06-02 01:36:12 PM'),
(6, 1, '2015-06-02 02:14:17 PM'),
(7, 1, '2015-06-02 02:46:22 PM'),
(8, 1, '2015-06-02 08:58:05 AM'),
(9, 1, '2015-06-02 08:58:21 AM'),
(10, 1, '2015-06-02 03:19:20 PM'),
(11, 1, '2015-06-04 06:34:42 PM'),
(12, 1, '2015-06-06 03:37:16 AM'),
(13, 1, '2015-06-06 03:37:42 AM'),
(14, 1, '2015-06-06 03:38:26 AM'),
(15, 1, '2015-06-06 03:38:38 AM'),
(16, 1, '2015-06-06 03:41:57 AM'),
(17, 1, '2015-06-06 03:42:58 AM'),
(18, 1, '2015-06-06 03:43:04 AM'),
(19, 1, '2015-06-06 03:43:33 AM'),
(20, 1, '2015-06-06 03:44:02 AM'),
(21, 2, '2015-06-06 03:44:27 AM'),
(22, 2, '2015-06-06 09:44:54 AM'),
(23, 1, '2015-06-06 09:45:14 AM'),
(24, 1, '2015-06-06 09:46:14 AM'),
(25, 1, '2015-06-06 09:54:19 AM'),
(26, 1, '2015-06-06 09:54:43 AM'),
(27, 1, '2015-06-06 09:59:03 AM'),
(28, 1, '2015-06-06 10:32:12 AM'),
(29, 1, '2015-06-06 10:38:15 AM'),
(30, 1, '2015-06-06 10:47:16 AM'),
(31, 1, '2015-06-06 10:55:44 AM'),
(32, 2, '2015-06-08 05:25:19 AM'),
(33, 2, '2015-06-08 05:28:23 AM'),
(34, 1, '2015-06-08 05:40:42 AM'),
(35, 1, '2015-06-08 05:41:04 AM'),
(36, 2, '2015-06-08 05:41:13 AM'),
(37, 1, '2015-06-08 05:49:25 AM'),
(38, 2, '2015-06-08 06:03:46 AM'),
(39, 1, '2015-06-08 06:07:37 AM'),
(40, 2, '2015-06-08 06:09:48 AM'),
(41, 1, '2015-06-08 06:11:20 AM'),
(42, 1, '2015-06-08 06:20:07 AM'),
(43, 1, '2015-06-08 06:21:48 AM'),
(44, 1, '2015-06-08 06:23:12 AM'),
(45, 3, '2015-06-08 06:27:56 AM'),
(46, 1, '2015-06-08 11:17:09 AM'),
(47, 1, '2015-06-08 11:19:28 AM'),
(48, 1, '2015-06-08 11:20:09 AM'),
(49, 3, '2015-06-08 11:20:22 AM'),
(50, 1, '2015-06-08 11:21:33 AM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
