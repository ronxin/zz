-- phpMyAdmin SQL Dump
-- version 4.1.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2014 at 03:52 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zz`
--
CREATE DATABASE IF NOT EXISTS `zz` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zz`;

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

DROP TABLE IF EXISTS `facts`;
CREATE TABLE IF NOT EXISTS `facts` (
  `entity` varchar(256) NOT NULL,
  `desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`entity`, `desc`) VALUES
('Apple', 'a computer company that sells iPhone'),
('Twitter', 'a social media company that limits how long you can post'),
('Facebook', 'a social network service where people dislike you to post political messages'),
('Google', 'an Internet company where many Foreseers will visit during summer'),
('research', 'a type of activity which is conducted by many PhD students who do not have better things to do during weekends'),
('life', 'a journal that takes one from birth to death'),
('data mining', 'a discipline that is conducted by the computer-science equivalent of coal-miners'),
('natural language processing', 'a discipline in which people study how computers can talk like human'),
('zz', 'an experimental QA system based on a toy knowledge base named after someone who is really smart'),
('CIKM', 'a great academic conference where everyone  with a great mind should publish at');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
