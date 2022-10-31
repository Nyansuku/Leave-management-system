-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 06:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_abbr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_abbr`) VALUES
(8, 'Community Health and Nursing', 'CHN'),
(4, 'Computer Science', 'CS'),
(5, 'Credit Control', 'CC'),
(11, 'Education', 'Education'),
(3, 'Finance And Account', 'F&A'),
(10, 'Human Resource', 'HR'),
(1, 'Information Communication Technology', 'ICT'),
(6, 'Kitchenette', 'KIT'),
(9, 'Law', 'LAW'),
(2, 'Library', 'Lib'),
(20, 'new', 'news'),
(13, 'ODEL', 'ODEL'),
(14, 'Registry', 'REG'),
(15, 'Security', 'SEC'),
(12, 'Student Council', 'STD'),
(16, 'Sub-ordinate Staff', 'SB STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_number` varchar(50) NOT NULL,
  `emp_email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `idnumber` int(10) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile` blob DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `emp_type` varchar(50) DEFAULT NULL,
  `emp_role` varchar(50) DEFAULT NULL,
  `employment_date` date NOT NULL,
  `employment_period` int(11) DEFAULT NULL,
  `retirement_year` int(11) DEFAULT NULL,
  `leave_days` int(11) DEFAULT NULL,
  `account_status` varchar(50) DEFAULT NULL,
  `employee_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_number`, `emp_email`, `first_name`, `other_name`, `idnumber`, `phone`, `gender`, `dob`, `marital_status`, `password`, `profile`, `department`, `emp_type`, `emp_role`, `employment_date`, `employment_period`, `retirement_year`, `leave_days`, `account_status`, `employee_type`) VALUES
(53, 'EMP001', 'emp001@gmail.com', 'Nyansuku', 'Orina', 34256782, 712356473, 'Female', '1999-06-13', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Library', 'Full-time', 'Regular', '2020-12-12', 33, 2053, 30, 'Activated', '1'),
(54, 'EMP002', 'emp002@gmail.com', 'Mwathi', 'Calvin', 32451892, 789672435, 'Male', '1992-07-01', 'Married', '827ccb0eea8a706c4c34a16891f84e7b', 0x6d616c65312e6a666966, 'Library', 'Contract', 'HOD', '2019-01-01', 5, 2024, 30, 'Activated', '0'),
(55, 'EMP003', 'emp003@gmail.com', 'Ryan ', 'Mbeki', 23829384, 723728392, 'Male', '1989-01-12', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Library', 'Contract', 'Lecturer', '2018-12-01', 4, 2022, 29, 'Activated', '0'),
(56, 'EMP004', 'emp004@gmail.com', 'Violet ', 'Nyakonu', 23784637, 738245362, 'Female', '1998-07-20', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Finance And Account', 'Full-time', 'HOD', '2020-01-01', 32, 2052, 30, 'Activated', '0'),
(57, 'EMP005', 'emp005@gmail.com', 'Lilian', 'chebet', 53628392, 2147483647, 'Female', '1994-12-24', 'Single', '827ccb0eea8a706c4c34a16891f84e7b', 0x66656d616c65322e6a666966, 'Library', 'Full-time', 'Lecturer', '2017-03-20', 28, 2045, 18, 'Activated', '0'),
(58, 'EMP006', 'emp006@gmail.com', 'Felix', 'Cheptoo', 12356789, 982938137, 'Male', '1984-12-01', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Computer Science', 'Full-time', 'HOD', '2010-01-01', 18, 2028, 24, 'Activated', '0'),
(59, 'EMP007', 'emp007@gmail.com', 'Kimani', 'Samwel', 23456721, 278382937, 'Male', '1993-01-02', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Computer Science', 'Contract', 'Regular', '2015-07-20', 8, 2023, 30, 'Activated', '0'),
(60, 'EMP008', 'emp008@gmail.com', 'George', 'Omwoyo', 32561800, 789352372, 'Male', '1990-04-02', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Law', 'Full-time', 'Lecturer', '2017-12-31', 24, 2041, 30, 'Activated', '0'),
(61, 'EMP009', 'emp009@gmail.com', 'Sharon', 'Mwaniki', 31220099, 789235623, 'Female', '1989-07-20', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Human Resource', 'Contract', 'Regular', '2019-01-01', 3, 2022, 24, 'Activated', '0'),
(62, 'EMP010', 'emp010@gmail.com', 'Kepha', 'Ogamba', 32435412, 728392893, 'Male', '1975-09-30', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Human Resource', 'Contract', 'Regular', '2018-12-01', 4, 2022, 26, 'Activated', '0'),
(63, 'EMP011', 'emp011@gmail.com', 'Ian', 'Mose', 32090088, 789234782, 'Male', '1985-10-10', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Law', 'Contract', 'Regular', '2017-02-02', 5, 2022, 18, 'Activated', '0'),
(64, 'EMP012', 'emp012@gmail.com', 'Meshack', 'Ntume', 32001199, 700223356, 'Male', '1988-12-31', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Finance And Account', 'Full-time', 'Lecturer', '2021-01-01', 22, 2043, 21, 'Activated', '0'),
(65, 'EMP013', 'emp013@gmail.com', 'Robert', 'Atieno', 39001128, 789243526, 'Male', '1984-10-23', 'Divorced', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Registry', 'Full-time', 'Regular', '2020-01-01', 18, 2038, 30, 'Activated', '0'),
(66, 'EMP014', 'emp014@gmail.com', 'Zainabu', 'Mokaya', 23889098, 799882223, 'Female', '1990-12-23', 'Married', '827ccb0eea8a706c4c34a16891f84e7b', 0x66656d616c65322e6a666966, 'Credit Control', 'Contract', 'Regular', '2019-03-02', 4, 2023, 20, 'Activated', '0'),
(67, 'EMP015', 'emp015@gmail.com', 'Happiness', 'Momanyi', 32009987, 178236702, 'Female', '1993-10-12', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Community Health and Nursing', 'Contract', 'Lecturer', '2021-01-01', 5, 2026, 23, 'Activated', '0'),
(68, 'EMP016', 'emp016@gmail.com', 'Frank ', 'Githigia', 12345232, 738293829, 'Female', '1993-01-01', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Computer Science', 'Contract', 'Lecturer', '2017-01-01', 7, 2024, 30, 'Activated', '0'),
(69, 'EMP017', 'emp017@gmail.com', 'beatrice', 'Sijui', 23547234, 738293748, 'Female', '1998-12-02', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Human Resource', 'Full-time', 'Regular', '2019-12-01', 32, 2051, 30, 'Activated', '0'),
(70, 'EMP018', 'emp018@gmail.com', 'Eva', 'Waweru', 32453623, 728392012, 'Female', '1989-01-20', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Education', 'Full-time', 'Lecturer', '2015-01-01', 22, 2037, 30, 'Activated', '0'),
(71, 'EMP019', 'emp019@gmail.com', 'Doreen', 'Moraa', 32990032, 899223312, 'Female', '1990-03-14', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Human Resource', 'Contract', 'Regular', '2019-01-01', 30, 2049, 30, 'Activated', '0'),
(72, 'EMP020', 'emp020@gmail.com', 'Peter', 'Kioko', 23990098, 728392831, 'Male', '1993-11-20', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Kitchenette', 'Contract', 'Regular', '2020-01-01', 3, 2023, 27, 'Activated', '0'),
(73, 'EMP021', 'emp021@gmail.com', 'Israel', 'Kamau', 33990012, 788235562, 'Male', '1990-08-09', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Student Council', 'Contract', 'Regular', '2019-02-02', 3, 2022, 30, 'Activated', '0'),
(74, 'EMP022', 'emp022@gmail.com', 'Damaris', 'Mnoga', 22337712, 799228328, 'Female', '1996-06-23', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Community Health and Nursing', 'Contract', 'HOD', '2020-12-03', 5, 2025, 30, 'Activated', '0'),
(75, 'EMP023', 'emp023@gmail.com', 'Angel', 'Elizabeth', 32431233, 728329123, 'Female', '1999-10-02', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Education', 'Contract', 'Lecturer', '2019-01-01', 4, 2023, 30, 'Activated', '0'),
(76, 'EMP024', 'emp024@gmail.com', 'Isaac', 'Ogari', 33224527, 788323342, 'Male', '1998-03-14', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Law', 'Contract', 'Lecturer', '2018-01-01', 3, 2021, 24, 'Deactivated', '0'),
(77, 'EMP025', 'emp025@gmail.com', 'Diana', 'Kemuma', 33829472, 782935162, 'Female', '1997-09-20', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Security', 'Contract', 'HOD', '2020-01-01', 10, 2030, 27, 'Activated', '0'),
(78, 'EMP026', 'emp026@gmail.com', 'Phoebe ', 'wambui', 33442327, 789334455, 'Female', '1990-03-23', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Sub-ordinate Staff', 'Full-time', 'Regular', '2018-12-13', 24, 2042, 30, 'Activated', '0'),
(79, 'EMP028', 'emp028@gmail.com', 'lilian ', 'Wambui', 23222627, 789214345, 'Female', '1999-06-06', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Registry', 'Contract', 'Regular', '2020-12-31', 3, 2023, 30, 'Activated', '0'),
(83, 'EMP029', 'emp29@gmail.com', 'KELVIN', 'NGARU', 22334455, 111434849, 'Male', '1988-02-22', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Student Council', 'Contract', 'Regular', '1970-01-01', 8, 1978, 30, 'Activated', '0'),
(81, 'EMP030', 'emp030@gmail.com', 'ANTHONEY', 'GIKONYO', 36454802, 725581578, 'Male', '1988-03-04', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Sub-ordinate Staff', 'Contract', 'Regular', '2015-12-12', 7, 2022, 30, 'Activated', '0'),
(82, 'EMP031', 'emp031@gmail.com', 'KIMSON ', 'KIMANI', 22113234, 715322544, 'Male', '1996-04-25', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Registry', 'Full-time', 'Regular', '2020-01-01', 30, 2050, 17, 'Activated', '0'),
(84, 'EMP033', 'emp033@gmail.com', 'CHRIS', 'MBURU', 23446279, 795839283, 'Male', '1993-12-23', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Education', 'Contract', 'Lecturer', '2017-01-31', 5, 2022, 30, 'Activated', '0'),
(85, 'EMP034', 'emp034@gmail.com', 'Rose', 'Omwoyo', 33447882, 728392388, 'Female', '2000-01-01', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Law', 'Contract', 'Lecturer', '2021-12-30', 4, 2025, 20, 'Activated', '0'),
(86, 'EMP035', 'emp035@gmail.com', 'Debra', 'Kemunto', 33990023, 788293723, 'Female', '1992-03-24', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Education', 'Contract', 'Lecturer', '2019-01-01', 8, 2027, 30, 'Activated', '0'),
(87, 'EMP036', 'emp036@gmail.com', 'Lilian', 'Lilian', 33228193, 783920829, 'Female', '1990-12-24', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Kitchenette', 'Full-time', 'Regular', '2015-10-01', 24, 2039, 30, 'Activated', '0'),
(88, 'EMP037', 'emp037@gmail.com', 'David', 'Ogeto', 22338891, 768992233, 'Male', '1997-12-12', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Law', 'Full-time', 'HOD', '2018-01-01', 31, 2049, 30, 'Activated', '0'),
(89, 'EMP038', 'emp038@gmail.com', 'Maureen', 'Mayaka', 33990023, 788992212, 'Female', '2000-03-04', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Computer Science', 'Contract', 'Lecturer', '2022-01-01', 5, 2027, 30, 'Activated', '0'),
(90, 'EMP039', 'emp039@gmail.com', 'Alex', 'Omondi', 32462374, 728392933, 'Male', '1990-06-23', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'ODEL', 'Contract', 'Regular', '2015-12-12', 7, 2022, 30, 'Activated', '0'),
(91, 'EMP040', 'emp040@gmail.com', 'Fridah', 'Chepngeno', 33882939, 788392031, 'Female', '1998-07-30', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Credit Control', 'Contract', 'HOD', '2018-03-02', 3, 2021, 30, 'Activated', '0'),
(92, 'EMP041', 'emp041@gmail.com', 'Calvin', 'calvo', 23442234, 784892831, 'Male', '1995-03-11', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Credit Control', 'Contract', 'Regular', '2021-12-12', 3, 2024, 30, 'Activated', '0'),
(93, 'EMP042', 'emp042@gmail.com', 'Nelson', 'Muimi', 23388923, 738293322, 'Male', '2000-01-01', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Human Resource', 'Contract', 'Regular', '2021-12-01', 3, 2024, 30, 'Activated', '0'),
(94, 'EMP043', 'emp043@gmail.com', 'Stacey', 'Kemuma', 22334452, 739494924, 'Female', '1998-01-11', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65322e6a666966, 'Law', 'Contract', 'Lecturer', '2021-01-01', 3, 2024, 30, 'Activated', '0'),
(95, 'EMP044', 'emp044@gmail.com', 'Mercy', 'Cheptoo', 97594939, 748392934, 'Female', '2000-01-01', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'Kitchenette', 'Contract', 'Regular', '2021-11-01', 4, 2025, 30, 'Activated', '0'),
(96, 'EMP045', 'emp045@gmail.com', 'Brian ', 'Moriku', 45678920, 924678392, 'Male', '1997-03-12', 'Single', '827ccb0eea8a706c4c34a16891f84e7b', 0x6d616c65322e6a666966, 'Credit Control', 'Full-time', 'Regular', '2020-01-14', 30, 2050, 22, 'Activated', '0'),
(97, 'EMP046', 'emp046@gmail.com', 'titus', 'Monayo', 45678902, 956782393, 'Male', '1993-05-12', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'Education', 'Contract', 'Lecturer', '2021-03-01', 10, 2031, 30, 'Activated', '0'),
(119, 'EMP47', '', '', '', 0, 0, 'Choose the Gender', '1970-01-01', '', 'd41d8cd98f00b204e9800998ecf8427e', '', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL),
(121, 'EMP48', 'emp048@gmail.com', 'Brian ', 'nyamu', 32322112, 922332232, 'Male', '1992-12-02', 'Single', '76d76775c4d89560c7dc1d606e389fa4', 0x6d616c65322e6a666966, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL),
(129, 'EMP49', 'emp049@gmail.com', 'benard', 'mobisa', 32112233, 729382939, 'Male', '1998-12-03', 'Single', '827ccb0eea8a706c4c34a16891f84e7b', 0x6d616c65322e6a666966, 'Computer Science', 'Full-time', 'Lecturer', '2020-06-04', 32, 2052, 30, 'Activated', NULL),
(130, 'EMP50', 'emp050@gmail.com', 'kamau', 'francis', 22332212, 822991282, 'Male', '1994-12-23', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Student Council', 'Full-time', 'Regular', '2019-01-01', 28, 2047, 30, 'Activated', NULL),
(132, 'EMP51', 'emp051@gmail.com', 'KEMUNTO', 'felix', 34213212, 99283922, 'Male', '1999-02-12', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x66656d616c65312e6a666966, 'ODEL', 'Contract', 'Regular', '2019-12-13', 10, 2029, 30, 'Activated', NULL),
(133, 'EMP52', 'emp052@gmail.com', 'Felix', 'Nyamori', 12332322, 99283912, 'Male', '1970-01-01', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'ODEL', 'Contract', 'Lecturer', '2018-02-20', 5, 2023, 30, 'Activated', NULL),
(134, 'EMP53', 'emp053@gmail.com', 'Jeff', 'Mwathi', 34221121, 728391722, 'Male', '1998-04-12', 'Married', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65312e6a666966, 'ODEL', 'Contract', 'HOD', '2020-12-12', 5, 2025, 30, 'Activated', NULL),
(135, 'EMP54', 'emp54@gmail.com', 'ian', 'mkubwa', 56367233, 938232933, 'Female', '2000-12-12', 'Single', '81dc9bdb52d04dc20036dbd8313ed055', 0x6d616c65322e6a666966, 'Finance And Account', 'Full-time', 'Lecturer', '2022-03-20', 34, 2056, 30, 'Activated', NULL),
(155, 'EMP55', 'emp055@gmail.com', 'collex', 'music', 992211, 737002211, 'Male', '1995-05-23', 'Married', 'fcea920f7412b5da7be0cf42b8c93759', 0x53637265656e2053686f7420323032312d30312d30372061742031302e33372e353020414d2e706e67, 'Education', 'Contract', 'HOD', '2022-04-25', 3, 2025, 30, 'Activated', NULL),
(156, 'EMP56', 'emp56@gmail.com', 'lynn', 'Ngugi', 23120000, 900332211, 'Female', '1984-12-23', 'Married', 'fcea920f7412b5da7be0cf42b8c93759', 0x66656d616c65312e6a666966, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leavetbl`
--

CREATE TABLE `leavetbl` (
  `leaveid` int(11) NOT NULL,
  `employee_number` varchar(50) DEFAULT NULL,
  `emp_dept` varchar(50) DEFAULT NULL,
  `emp_email` varchar(50) DEFAULT NULL,
  `leavetype` varchar(50) DEFAULT NULL,
  `daterequested` date NOT NULL,
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `num_of_days` int(11) DEFAULT NULL,
  `leavestatus` varchar(50) DEFAULT NULL,
  `mobile_leave` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leavetbl`
--

INSERT INTO `leavetbl` (`leaveid`, `employee_number`, `emp_dept`, `emp_email`, `leavetype`, `daterequested`, `leave_start`, `leave_end`, `num_of_days`, `leavestatus`, `mobile_leave`, `remarks`, `approved_by`, `approved_days`) VALUES
(19, 'EMP002', 'Library', 'emp002@gmail.com', 'sick leave', '2022-02-22', '2022-03-01', '2022-03-03', 2, 'approved', NULL, 'okay', 'admin@gmail.com', NULL),
(20, 'EMP003', 'Library', 'emp003@gmail.com', 'sick leave', '2022-02-23', '2020-01-01', '2020-01-03', 2, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(21, 'EMP003', 'Library', 'emp003@gmail.com', 'annual leave', '2022-02-23', '2021-11-30', '2021-12-01', 1, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(22, 'EMP005', 'Library', 'emp005@gmail.com', 'annual leave', '2022-02-23', '2022-01-20', '2022-01-23', 3, 'approved', NULL, '', 'admin@gmail.com', NULL),
(24, 'EMP005', 'Library', 'emp005@gmail.com', 'annual leave', '2022-02-23', '2021-11-01', '2021-11-07', 6, 'approved', NULL, 'okay', 'admin@gmail.com', NULL),
(25, 'EMP006', 'Computer Science', 'emp006@gmail.com', 'paternity leave', '2022-02-23', '2021-03-10', '2021-03-24', 14, 'approved', NULL, 'okay', 'admin@gmail.com', NULL),
(26, 'EMP006', 'Computer Science', 'emp006@gmail.com', 'annual leave', '2022-02-23', '2021-07-02', '2021-07-08', 6, 'approved', NULL, 'okay', 'admin@gmail.com', NULL),
(27, 'EMP007', 'Computer Science', 'emp007@gmail.com', 'sick leave', '2022-02-23', '2021-08-01', '2021-08-04', 3, 'approved', NULL, 'okay', 'admin@gmail.com', NULL),
(29, 'EMP008', 'Law', 'emp008@gmail.com', 'paternity leave', '2022-02-23', '2022-01-10', '2022-01-29', 19, 'approved', NULL, 'okay', 'admin@gmail.com', NULL),
(30, 'EMP009', 'Human Resource', 'emp009@gmail.com', 'sick leave', '2022-02-25', '2022-01-18', '2022-01-20', 2, 'approved', NULL, '', 'admin@gmail.com', NULL),
(31, 'EMP009', 'Human Resource', 'emp009@gmail.com', 'annual leave', '2022-02-25', '2021-12-10', '2021-12-16', 6, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(32, 'EMP010', 'Human Resource', 'emp010@gmail.com', 'annual leave', '2022-02-25', '2022-01-10', '2022-01-14', 4, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(33, 'EMP010', 'Human Resource', 'emp010@gmail.com', 'paternity leave', '2022-02-25', '2021-08-12', '2021-08-26', 14, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(34, 'EMP011', 'Law', 'emp011@gmail.com', 'annual leave', '2022-02-25', '2021-10-02', '2021-10-10', 8, 'approved', NULL, 'TES', 'admin@gmail.com', NULL),
(35, 'EMP011', 'Law', 'emp011@gmail.com', 'annual leave', '2022-02-25', '2022-01-31', '2022-02-04', 4, 'approved', NULL, 'YES', 'admin@gmail.com', NULL),
(36, 'EMP012', 'Finance And Account', 'emp012@gmail.com', 'annual leave', '2022-02-25', '2021-10-03', '2021-10-12', 9, 'approved', NULL, 'YES', 'admin@gmail.com', NULL),
(37, 'EMP012', 'Finance And Account', 'emp012@gmail.com', 'paternity leave', '2022-02-25', '2021-12-01', '2021-12-15', 14, 'approved', NULL, 'YES', 'admin@gmail.com', NULL),
(38, 'EMP014', 'Credit Control', 'emp014@gmail.com', 'annual leave', '2022-02-25', '2022-03-05', '2022-03-10', 5, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(39, 'EMP014', 'Credit Control', 'emp014@gmail.com', 'maternity leave', '2022-02-25', '2020-04-01', '2020-07-03', 93, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(40, 'EMP014', 'Credit Control', 'emp014@gmail.com', 'annual leave', '2022-02-25', '2021-12-03', '2021-12-08', 5, 'disapproved', NULL, 'yes', 'admin@gmail.com', NULL),
(41, 'EMP015', 'Community Health and Nursing', 'emp015@gmail.com', 'annual leave', '2022-02-10', '2022-02-25', '2022-03-01', 7, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(42, 'EMP020', 'Kitchenette', 'emp020@gmail.com', 'annual leave', '2022-02-22', '2022-02-26', '2022-03-01', 3, 'approved', NULL, 'YES', 'admin@gmail.com', NULL),
(43, 'EMP020', 'Kitchenette', 'emp020@gmail.com', 'sick leave', '2022-02-25', '2022-01-18', '2022-01-23', 5, 'approved', NULL, 'YES', 'admin@gmail.com', NULL),
(44, 'EMP024', 'Law', 'emp024@gmail.com', 'annual leave', '2022-02-25', '2019-02-20', '2019-02-23', 3, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(45, 'EMP024', 'Law', 'emp024@gmail.com', 'sick leave', '2022-02-25', '2020-03-13', '2020-03-16', 3, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(46, 'EMP024', 'Law', 'emp024@gmail.com', 'paternity leave', '2022-02-25', '2020-07-01', '2020-07-16', 15, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(47, 'EMP025', 'Security', 'emp025@gmail.com', 'annual leave', '2022-02-20', '2022-02-25', '2022-02-28', 3, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(48, 'EMP025', 'Security', 'emp025@gmail.com', 'maternity leave', '2022-02-25', '2021-08-23', '2021-11-23', 92, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(49, 'EMP028', 'Registry', 'emp028@gmail.com', 'sick leave', '2022-02-25', '2021-12-01', '2021-12-03', 2, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(50, 'EMP028', 'Registry', 'emp028@gmail.com', 'maternity leave', '2022-02-22', '2022-02-25', '2022-05-25', 90, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(51, 'EMP029', 'Student Council', 'emp29@gmail.com', 'paternity leave', '2022-02-25', '2021-12-01', '2021-12-16', 15, 'approved', NULL, '', 'admin@gmail.com', NULL),
(52, 'EMP031', 'Registry', 'emp031@gmail.com', 'paternity leave', '2022-02-25', '2022-03-14', '2022-03-29', 15, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(53, 'EMP031', 'Registry', 'emp031@gmail.com', 'annual leave', '2022-02-25', '2022-01-02', '2022-01-08', 6, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(54, 'EMP031', 'Registry', 'emp031@gmail.com', 'annual leave', '2022-02-25', '2021-12-06', '2021-12-13', 7, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(55, 'EMP034', 'Law', 'emp034@gmail.com', 'maternity leave', '2022-02-25', '2021-08-20', '2021-11-30', 102, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(56, 'EMP034', 'Law', 'emp034@gmail.com', 'annual leave', '2022-02-25', '2022-01-27', '2022-01-31', 4, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(57, 'EMP034', 'Law', 'emp034@gmail.com', 'annual leave', '2022-02-25', '2022-03-10', '2022-03-16', 6, 'approved', NULL, 'yes', 'admin@gmail.com', NULL),
(59, 'EMP045', 'Credit Control', 'emp045@gmail.com', 'annual leave', '2022-03-21', '2022-03-28', '2022-04-01', 4, 'approved', NULL, 'approved', 'admin@gmail.com', NULL),
(61, 'EMP045', 'Credit Control', 'emp045@gmail.com', 'paternity leave', '2022-03-21', '2022-04-01', '2022-04-15', 14, 'approved', NULL, 'approved', 'admin@gmail.com', NULL),
(62, 'EMP005', 'Library', 'emp005@gmail.com', 'annual leave', '2022-03-25', '2022-04-02', '2022-04-07', 5, 'pending', NULL, NULL, NULL, NULL),
(65, 'EMP021', 'Student Council', 'emp021@gmail.com', 'annual leave', '2022-04-02', '2022-08-04', '2022-12-04', 122, 'pending', NULL, NULL, NULL, NULL),
(66, 'EMP021', 'Student Council', 'emp021@gmail.com', 'annual leave', '2022-04-02', '2022-08-04', '2022-12-04', 122, 'pending', NULL, NULL, NULL, NULL),
(67, 'EMP005', 'Library', 'emp005@gmail.com', 'sick leave', '2022-04-02', '2022-04-10', '2022-04-14', 4, 'pending', NULL, NULL, NULL, NULL),
(68, 'EMP003', 'Library', 'emp003@gmail.com', 'sick leave', '2022-05-08', '1970-01-01', '1970-01-01', 0, 'pending', 989492923, NULL, NULL, NULL),
(69, 'EMP55', 'Education', 'emp055@gmail.com', 'sick leave', '2022-05-09', '2022-05-18', '2022-05-30', 12, 'pending', 33243321, NULL, NULL, NULL),
(70, 'EMP55', 'Education', 'emp055@gmail.com', 'annual leave', '2022-05-09', '2022-05-22', '2022-05-27', 5, 'pending', 2147483647, NULL, NULL, NULL),
(71, 'EMP54', 'Finance And Account', 'emp54@gmail.com', 'sick leave', '2022-05-09', '2022-05-20', '2022-08-20', 92, 'pending', 2147483647, NULL, NULL, NULL),
(72, 'EMP54', 'Finance And Account', 'emp54@gmail.com', 'maternity leave', '2022-05-09', '2022-05-20', '2022-08-18', 90, 'pending', 737002211, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resign`
--

CREATE TABLE `resign` (
  `resign_id` int(11) NOT NULL,
  `employee_number` varchar(50) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `resignment_year` date NOT NULL,
  `statuss` varchar(100) NOT NULL,
  `daterequested` date NOT NULL,
  `resign_file` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resign`
--

INSERT INTO `resign` (`resign_id`, `employee_number`, `department`, `reason`, `resignment_year`, `statuss`, `daterequested`, `resign_file`) VALUES
(4, 'EMP005', 'Library', 'resign', '2022-12-12', 'approved', '2022-02-23', NULL),
(6, 'EMP008', 'Law', 'resign', '2023-03-01', 'approved', '2022-02-23', NULL),
(0, 'EMP020', 'Kitchenette', 'reason', '2022-10-23', 'approved', '2022-05-09', 'faith nyansuku_cv.pdf'),
(0, 'EMP55', 'Education', 'reason', '2022-07-20', 'approved', '2022-05-09', 'faith nyansuku_cv.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `employee_number` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` int(12) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `employee_number`, `user_name`, `user_email`, `user_phone`, `password`) VALUES
(1, 'ADM001', 'nyansuku faith', 'admin@gmail.com', 2147483647, '202cb962ac');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_name`),
  ADD UNIQUE KEY `dept_id` (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_number`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `leavetbl`
--
ALTER TABLE `leavetbl`
  ADD PRIMARY KEY (`leaveid`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `emp_dept` (`emp_dept`),
  ADD KEY `employee_number` (`employee_number`);

--
-- Indexes for table `resign`
--
ALTER TABLE `resign`
  ADD PRIMARY KEY (`employee_number`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_email`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `employee_number` (`employee_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `leavetbl`
--
ALTER TABLE `leavetbl`
  MODIFY `leaveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`dept_name`);

--
-- Constraints for table `leavetbl`
--
ALTER TABLE `leavetbl`
  ADD CONSTRAINT `leavetbl_ibfk_1` FOREIGN KEY (`approved_by`) REFERENCES `user` (`user_email`),
  ADD CONSTRAINT `leavetbl_ibfk_2` FOREIGN KEY (`emp_dept`) REFERENCES `department` (`dept_name`),
  ADD CONSTRAINT `leavetbl_ibfk_3` FOREIGN KEY (`employee_number`) REFERENCES `employee` (`employee_number`);

--
-- Constraints for table `resign`
--
ALTER TABLE `resign`
  ADD CONSTRAINT `resign_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`dept_name`),
  ADD CONSTRAINT `resign_ibfk_2` FOREIGN KEY (`employee_number`) REFERENCES `employee` (`employee_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
