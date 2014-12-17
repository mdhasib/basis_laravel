-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2014 at 05:53 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basis_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
`id` int(11) NOT NULL,
  `name` varchar(23) NOT NULL,
  `email` varchar(23) NOT NULL,
  `user_name` varchar(23) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `permission` varchar(7) NOT NULL DEFAULT '1:0:0:0' COMMENT 'read:create:edit:delete (0:0:0:0)',
  `is_super` int(1) NOT NULL DEFAULT '0',
  `picture` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0: incative; 1: active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `user_name`, `password`, `mobile`, `permission`, `is_super`, `picture`, `status`) VALUES
(1, 'Arif', 'arif@artcorebd.com', 'arif@artcorebd.com', 'e10adc3949ba59abbe56e057f20f883e', '8801616555550', '1:1:1:1', 1, '', 1),
(2, 'Hasib', 'rhasibur@hotmail.com', 'rhasibur@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8801827197743', '1:0:0:0', 0, '', 0),
(3, 'Rifan', 'mohakal06r@yahoo.com', 'mohakal06r@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '8801711266873', '1:0:0:0', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE IF NOT EXISTS `student_user` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `first_name` varchar(23) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `p_address` varchar(254) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` int(5) NOT NULL,
  `county` varchar(24) NOT NULL,
  `user_name` varchar(23) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(23) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` int(1) NOT NULL COMMENT '0: female; 1: male;',
  `bd_citizen` int(1) NOT NULL COMMENT '0:no; 1:yes',
  `visa` varchar(254) NOT NULL DEFAULT 'N/A',
  `marital_status` varchar(23) NOT NULL,
  `ssnumber` int(11) NOT NULL,
  `education` varchar(254) NOT NULL,
  `verification_code` varchar(23) NOT NULL,
  `email_verified` int(1) NOT NULL COMMENT '0: not verified; 1: verified',
  `status` int(1) NOT NULL COMMENT '0: inactivate; 1: active; '
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`id`, `student_id`, `first_name`, `last_name`, `middle_name`, `p_address`, `city`, `state`, `zip`, `county`, `user_name`, `password`, `email`, `mobile`, `date_of_birth`, `gender`, `bd_citizen`, `visa`, `marital_status`, `ssnumber`, `education`, `verification_code`, `email_verified`, `status`) VALUES
(1, 2014121, 'Dewan', 'Reaz', '', '', '', '', 0, '', 'mohakal06r@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '8801711266873', '0000-00-00', 1, 0, 'N/A', '', 0, '', '', 1, 1),
(2, 2014122, 'Arif', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'a@a.com', '', '1986-03-06', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(3, 2014123, 'Hasib', 'Vai', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'email@email.com', '', '2014-04-06', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(4, 2014124, 'Hasib', 'Vai', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'email@email.com', '', '2014-04-06', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(5, 2014125, 'Hasib', 'Vai', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'email@email.com', '', '2014-04-06', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(6, 2014126, 'Hasib', 'Vai', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'email@email.com', '', '2014-04-06', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(7, 2014127, 'Hasib', 'Vai', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'email@email.com', '', '2014-04-06', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(8, 2014128, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(9, 2014129, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(10, 20141210, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(11, 20141211, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(12, 20141212, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(13, 20141213, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(14, 20141214, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(15, 20141215, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(16, 20141216, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(17, 20141217, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(18, 20141218, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(19, 20141219, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(20, 20141220, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(21, 20141221, 'Hasib', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'mohakal06r@yahoo.com', '', '2013-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(22, 20141222, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(23, 20141223, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(24, 20141224, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(25, 20141225, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(26, 20141226, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(27, 20141227, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(28, 20141228, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(29, 20141229, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(30, 20141230, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(31, 20141231, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(32, 20141232, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(33, 20141233, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(34, 20141234, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(35, 20141235, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(36, 20141236, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(37, 20141237, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(38, 20141238, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(39, 20141239, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(40, 20141240, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(41, 20141241, 'Arif', 'Vai', '', '', '', '', 0, '', '', 'a0d19a09fdd36e22521e429a194120e6', 'a@a.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(42, 20141242, 'Ariful', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'a@a.com', '', '0000-00-00', 0, 0, 'N/A', '', 0, '', '', 0, 0),
(43, 20141243, 'Ariful', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'a@a.com', '', '0000-00-00', 0, 0, 'N/A', '', 0, '', '', 0, 0),
(44, 20141244, 'Ariful', 'Dewan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'a@a.com', '', '0000-00-00', 0, 0, 'N/A', '', 0, '', '', 0, 0),
(45, 20141245, 'Ariful', 'Dewan', '', '', '', '', 0, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'a@a.com', '', '0000-00-00', 0, 0, 'N/A', '', 0, '', '', 0, 0),
(46, 20141246, 'Ariful', 'Dewan', '', '', '', '', 0, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'a@a.com', '', '0000-00-00', 0, 0, 'N/A', '', 0, '', '', 0, 0),
(47, 20141247, 'Hasibul', 'Vai', '', '', '', '', 0, '', '', '25d55ad283aa400af464c76d713c07ad', 'email@email.com', '', '0000-00-00', 0, 0, 'N/A', '', 0, '', '', 0, 0),
(48, 20141248, 'Rayhan', 'Haider', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'rayhan@gmail.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(49, 20141249, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(50, 20141250, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(51, 20141251, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(52, 20141252, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(53, 20141253, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(54, 20141254, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(55, 20141255, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(56, 20141256, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(57, 20141257, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(58, 20141258, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(59, 20141259, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(60, 20141260, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(61, 20141261, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(62, 20141262, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0),
(63, 20141263, 'Reazul', 'Rayhan', '', '', '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'arif@artcorebd.com', '', '2014-01-01', 1, 0, 'N/A', '', 0, '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `student_user`
--
ALTER TABLE `student_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
