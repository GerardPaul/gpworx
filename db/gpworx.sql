-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2014 at 05:58 AM
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
  `profile_picture1` int(11) DEFAULT NULL,
  `profile_picture2` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `salt` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile_picture2_2` (`profile_picture2`),
  KEY `profile_picture1` (`profile_picture1`),
  KEY `profile_picture2` (`profile_picture2`),
  KEY `profile_picture1_2` (`profile_picture1`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gpworx_admin`
--

INSERT INTO `gpworx_admin` (`id`, `fullname`, `profile_picture1`, `profile_picture2`, `username`, `password`, `salt`) VALUES
(1, 'Gerard Paul Picardal Labitad', 0, 0, 'gerardpaul.labitad@outlook.com', 'b8fd7ecc9254a6a5350302b5afd97af85fc5452dacdc5361ee09864e6d1b0944', 'a8d79d6c4cb3f4a36ceb153fdc690a43');

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_backgrounds`
--

CREATE TABLE IF NOT EXISTS `gpworx_backgrounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_url` int(11) NOT NULL,
  `type` enum('home','portfolio','about','contact') NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `file_url` (`file_url`)
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
-- Table structure for table `gpworx_files`
--

CREATE TABLE IF NOT EXISTS `gpworx_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
  `file` int(11) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `url` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `file` (`file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gpworx_skills`
--

CREATE TABLE IF NOT EXISTS `gpworx_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(250) NOT NULL,
  `image` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gpworx_backgrounds`
--
ALTER TABLE `gpworx_backgrounds`
  ADD CONSTRAINT `bg_file_fk` FOREIGN KEY (`file_url`) REFERENCES `gpworx_files` (`id`);

--
-- Constraints for table `gpworx_project`
--
ALTER TABLE `gpworx_project`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category`) REFERENCES `gpworx_category` (`id`),
  ADD CONSTRAINT `files_profile_fk` FOREIGN KEY (`file`) REFERENCES `gpworx_files` (`id`);

--
-- Constraints for table `gpworx_skills`
--
ALTER TABLE `gpworx_skills`
  ADD CONSTRAINT `image_files_fk` FOREIGN KEY (`image`) REFERENCES `gpworx_files` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
