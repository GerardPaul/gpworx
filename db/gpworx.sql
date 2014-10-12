-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2014 at 04:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gpworx`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_admin`
--

CREATE TABLE IF NOT EXISTS `gpworx_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `profile_picture1` varchar(250) NOT NULL,
  `profile_picture2` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `salt` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gpworx_admin`
--

INSERT INTO `gpworx_admin` (`id`, `fullname`, `profile_picture1`, `profile_picture2`, `username`, `password`, `salt`) VALUES
(1, 'Gerard Paul Picardal Labitad', 'profile 1', 'profile 2', 'gerardpaul.labitad@outlook.com', 'd1b2d6cdb49e70db690e341a0ed18222e97e48d263f7aeb797081bcf724e12ae', '79e6515e18bd901904371ddc0fffabad');

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_backgrounds`
--

CREATE TABLE IF NOT EXISTS `gpworx_backgrounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `type` enum('home','portfolio','about','contact') NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_category`
--

CREATE TABLE IF NOT EXISTS `gpworx_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(25) NOT NULL,
  `url` varchar(25) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_info`
--

CREATE TABLE IF NOT EXISTS `gpworx_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(250) DEFAULT NULL,
  `value` varchar(250) NOT NULL,
  `order` int(11) NOT NULL,
  `type` enum('info','contact') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_project`
--

CREATE TABLE IF NOT EXISTS `gpworx_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tags` text NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `url` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_skills`
--

CREATE TABLE IF NOT EXISTS `gpworx_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
