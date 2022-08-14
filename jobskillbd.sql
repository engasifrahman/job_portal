-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 05:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobskillbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `username` varchar(200) NOT NULL,
  `amount` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`username`, `amount`) VALUES
('asif12', '500'),
('asif123', '500'),
('asifrahman', '500'),
('asifrahman23', '500');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pic_dir` varchar(250) NOT NULL DEFAULT 'not_defined_yet',
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `action` varchar(10) NOT NULL DEFAULT 'admin',
  `created-at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `pic_dir`, `full_name`, `gender`, `contact_no`, `address`, `password`, `action`, `created-at`, `updated_at`) VALUES
(1, 'asif@gmail.com', 'asif', 'not_defined_yet', 'Md. Asif Rahman', 'Male', '01772635883', 'sukrabd', '14e1b600b1fd579f47433b88e8d85291', 'SUperAdmIN', '2018-11-17 07:56:47', '2018-11-17 07:56:47'),
(2, 'shapla@gmail.com', 'shapla', 'not_defined_yet', 'Shapla Akter', 'Female', '', '', '14e1b600b1fd579f47433b88e8d85291', 'admin', '2018-12-05 12:07:00', '2018-12-05 12:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `name`, `email`, `contact`, `password`) VALUES
(1, 'ironimran', 'Md. Imran', 'imran@gmail.com', '01772-102030', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `applied_job`
--

CREATE TABLE `applied_job` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `post_id` int(250) NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applied_job`
--

INSERT INTO `applied_job` (`id`, `js_id`, `post_id`, `applied_at`) VALUES
(1, 2, 15, '2018-11-25 14:37:59'),
(2, 8, 16, '2018-12-05 17:12:22'),
(3, 8, 22, '2018-12-07 05:39:35'),
(4, 8, 1, '2018-12-07 05:40:13'),
(5, 2, 22, '2018-12-08 06:43:56'),
(6, 1, 15, '2018-12-09 06:54:51'),
(7, 13, 15, '2018-12-09 07:57:23'),
(8, 2, 8, '2018-12-09 20:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `total_seat` int(100) NOT NULL,
  `show_date` varchar(15) NOT NULL,
  `show_time` varchar(100) NOT NULL,
  `total_bill` int(50) NOT NULL,
  `booked_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `cus_email`, `movie_name`, `total_seat`, `show_date`, `show_time`, `total_bill`, `booked_at`) VALUES
(4, 'asifrahman@gmail.com', 'Titanic', 1, '2018-04-19', '01', 250, '2018-04-12 21:34:54'),
(5, 'asifrahman@gmail.com', 'Titanic', 2, '2018-04-26', '01', 500, '2018-04-12 21:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `career_info`
--

CREATE TABLE `career_info` (
  `js_id` int(250) NOT NULL,
  `objective` varchar(500) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `present_salary` varchar(50) NOT NULL,
  `expected_salary` varchar(50) NOT NULL,
  `job_level` varchar(100) NOT NULL,
  `job_nature` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `career_info`
--

INSERT INTO `career_info` (`js_id`, `objective`, `summary`, `present_salary`, `expected_salary`, `job_level`, `job_nature`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', '', '', '2018-10-23 16:39:01', '2018-10-23 16:39:01'),
(2, 'I am a web developer with a vast array of knowledge in many different front end and back end languages, responsive frameworks, databases, and best code\r\npractices. My objective is simply to be the best web developer that can be and to contribute to the technology industry all that I know and can do.\r\n', 'I am a web developer with a vast array of knowledge in many different front end and back end languages, responsive frameworks, databases, and best code\r\npractices. My objective is simply to be the best web developer that can be and to contribute to the technology industry all that I know and can do.\r\n', '', '40000', 'Entry Level, Mid Level, Top Level', 'Full Time', '2018-10-23 16:39:01', '2019-04-27 05:39:18'),
(3, '', '', '', '', '', '', '2018-10-23 16:39:01', '2018-10-23 16:39:01'),
(4, '', '', '', '', '', '', '2018-10-23 17:17:54', '2018-10-23 17:17:54'),
(5, '', '', '', '', '', '', '2018-10-27 10:34:54', '2018-10-27 10:34:54'),
(7, '', '', '', '', '', '', '2018-10-27 11:17:56', '2018-10-27 11:17:56'),
(8, 'Career objective or resume objective acts as the pitch of your resume. It mentions the goal and objective of your career. Even though it is not a strict requirement to include a resume objective in your resume, a well-written \r\n', 'Proficient in maintaining the computer system and existing software.\r\nProficient in web designing.\r\nExcellent in database management system.\r\nExcellent in designing and testing software. \r\n', '45000', '55000', 'Entry Level, Mid Level, Top Level', 'Full Time, Part Time, Contractual', '2018-12-05 16:35:24', '2018-12-05 16:41:49'),
(9, '', '', '', '', '', '', '2018-12-08 06:37:47', '2018-12-08 06:37:47'),
(11, '', '', '', '', '', '', '2018-12-08 15:52:14', '2018-12-08 15:52:14'),
(12, '', '', '', '', '', '', '2018-12-09 05:02:12', '2018-12-09 05:02:12'),
(13, 'ddgdg', 'dgdfg', '', '5045435', 'Entry Level', 'Full Time', '2018-12-09 07:54:22', '2018-12-09 07:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(100) NOT NULL,
  `js_id` int(250) NOT NULL,
  `certificate_name` varchar(250) NOT NULL,
  `exam_date` date NOT NULL DEFAULT '0000-00-00',
  `expire_date` date NOT NULL DEFAULT '0000-00-00',
  `score` varchar(10) NOT NULL,
  `score_scale` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'user_data',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `js_id`, `certificate_name`, `exam_date`, `expire_date`, `score`, `score_scale`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'LICT Web development', '2018-10-17', '2022-02-08', '5', '5', 'user_data', '2018-12-05 16:56:36', '2018-12-05 16:56:36'),
(4, 1, '', '0000-00-00', '0000-00-00', '', '', 'user_existence', '2018-12-09 07:19:14', '2018-12-09 07:19:14'),
(5, 13, '', '0000-00-00', '0000-00-00', '', '', 'user_existence', '2018-12-09 07:54:23', '2018-12-09 07:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `circular_post`
--

CREATE TABLE `circular_post` (
  `post_id` int(250) NOT NULL,
  `em_id` int(250) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `vacancies_no` int(10) NOT NULL,
  `job_level` varchar(20) NOT NULL,
  `job_nature` varchar(100) NOT NULL,
  `job_location` varchar(250) NOT NULL,
  `details_location` varchar(250) NOT NULL,
  `skills_requirements` varchar(500) NOT NULL,
  `gender_requirements` varchar(10) NOT NULL,
  `age_requirements` varchar(20) NOT NULL,
  `experience_years` varchar(20) NOT NULL,
  `educational_requirements` varchar(250) NOT NULL,
  `additional_requirements` varchar(1000) NOT NULL,
  `salary_range` varchar(100) NOT NULL,
  `salary_details` varchar(250) NOT NULL,
  `extra_facilities` varchar(250) NOT NULL,
  `apply_instructions` varchar(250) NOT NULL,
  `application_deadline` date NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `circular_post`
--

INSERT INTO `circular_post` (`post_id`, `em_id`, `job_title`, `job_category`, `job_description`, `vacancies_no`, `job_level`, `job_nature`, `job_location`, `details_location`, `skills_requirements`, `gender_requirements`, `age_requirements`, `experience_years`, `educational_requirements`, `additional_requirements`, `salary_range`, `salary_details`, `extra_facilities`, `apply_instructions`, `application_deadline`, `posted_at`, `updated_at`, `action`) VALUES
(1, 2, 'Web design and development', 'Design / Creative', 'Web Developer Job Responsibilities The role is responsible for designing, coding and modifying websites, from layout to function and according to a client s specifications. Strive to create visually appealing sites that feature user friendly design and clear navigation', 45, 'Entry / Mid', 'Part Time', 'Dhaka', 'house 55, shukrabad, Dhaka-1207', 'PHP, JAVA, PYTHON, CSS3. HTML5, MYSQL, Javascript (JS), jquery, ajax, xml, laravel', 'Any', '25 to 24 Year(s)', 'N/A', 'BSc in Computer science and engineering (CSE), Software Engineering (SWE)', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-12-28', '2018-10-11 18:00:00', '2018-12-10 09:16:08', 'Active'),
(2, 1, '2', 'IT-Software', 'iam', 45, 'Entry', 'Full Time', 'Dhanmondi', 'Not mentioned', 'php', 'Female', '18 to 24 Year(s)', '2 to 3 Year(s)', 'dfgggggggggggggggggggggggggggggggggggggggg', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-10-31', '2018-10-18 18:00:00', '2018-12-08 06:21:27', 'Hide'),
(3, 1, '3', 'Web Development', 'fdgggggggggggggggggggggggggggggg', 45, 'Entry', 'Full Time', 'Dhanmondi', 'Not mentioned', 'dfgggggggggggggggggggggggggg', 'Female', '18 to 24 Year(s)', '2 to 3 Year(s)', 'dfgggggggggggggggggggggggggggggggggggggggg', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-10-31', '2018-10-18 18:00:00', '2018-12-08 06:21:26', 'Hide'),
(4, 1, '4', 'Web Development', '4', 45, 'Entry', 'Full Time', 'Dhanmondi', 'Not mentioned', 'dfgggggggggggggggggggggggggg', 'Female', '18 to 24 Year(s)', '2 to 3 Year(s)', 'dfgggggggggggggggggggggggggggggggggggggggg', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-10-31', '2018-10-18 18:00:00', '2018-12-08 06:21:25', 'Hide'),
(5, 1, '5', 'IT & Telecommunication', 'fdgggggggggggggggggggggggggggggg', 45, 'Entry', 'Full Time', 'Dhanmondi', 'Not mentioned', 'dfgggggggggggggggggggggggggg', 'Female', '18 to 24 Year(s)', '2 to 3 Year(s)', 'dfgggggggggggggggggggggggggggggggggggggggg', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-10-31', '2018-10-18 18:00:00', '2018-12-08 06:21:24', 'Hide'),
(6, 1, '6', 'Software Development', 'iam', 5, 'Top', 'Part Time', 'Joypurhat', 'Not mentioned', 'sdfffffffffffffff', 'Male', '18 to 24 Year(s)', '2 to 3 Year(s)', 'sdfffffffffffffffffff', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-10-21', '2018-10-20 09:38:25', '2018-12-08 06:21:23', 'Hide'),
(8, 1, 'Web development', 'IT & Telecommunication', 'software analyst needed', 5, 'Entry', 'Full Time / Part Time / Contractual / Internship', 'Joypurhat', 'Not mentioned', 'php, mysql', 'Any', '18 to 24 Year(s)', '2 to 3 Year(s)', 'bsc in cse, software', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-12-31', '2018-10-21 20:53:14', '2018-12-09 20:13:04', 'Active'),
(9, 1, 'Android Apps Development', 'IT & Telecommunication', 'Need expert android apps developer', 12, 'Entry', 'Full Time', 'Dhaka', 'Not mentioned', 'Java Android Studio React.js', 'Any', '18 to 24 Year(s)', '1 to 2 Year(s)', 'BSc in CSE, Softare', 'Not mentioned', '23000 to 43000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-29', '2018-10-22 06:39:51', '2018-12-09 20:14:15', 'Active'),
(10, 1, 'Web Deveplopmrnt', 'Software Development', 'ddfsdfsdffsdfsdfsdfsdfsf', 45, 'Mid / Top', 'Full Time', 'Dhaka', 'Not mentioned', 'fsfsfsdfsdf', 'Any', '18 to 24 Year(s)', 'N/A', 'CSE, BBA', 'Not mentioned', '28500 to 36000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-24', '2018-11-07 04:57:36', '2018-12-09 09:50:27', 'Deactive'),
(11, 1, 'terterterterter', 'Software Development', 'ertertertertertertertert', 5, 'Top', 'Full Time', 'Dhaka', 'ertertertertert', 'ertertertertertertertert', 'Male', '18 to 24 Year(s)', 'N/A', 'rtertertertert', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-30', '2018-11-18 11:10:05', '2018-12-08 06:21:06', 'Hide'),
(12, 1, 'terterterterter', 'Software Development', 'ertertertertertertertert', 5, 'Top', 'Full Time', 'Dhaka', 'ertertertertert', 'ertertertertertertertert', 'Male', '18 to 24 Year(s)', 'N/A', 'rtertertertert', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-30', '2018-11-18 11:32:56', '2018-12-08 06:21:05', 'Hide'),
(13, 1, 'hfg6ry645645645', 'NGO/Development', '456456456456456456456456', 456, 'Top', 'Part Time', 'Dhaka', 'trtyyt', 'tryrtyrty', 'Male', '20 to 26 Year(s)', 'N/A', 'ryrtyrtyrtyr', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-24', '2018-11-19 13:52:16', '2018-12-08 06:21:03', 'Hide'),
(14, 1, 'hfg6ry645645645', 'NGO/Development', '456456456456456456456456', 456, 'Top', 'Part Time', 'Dhaka', 'trtyyt', 'tryrtyrty', 'Male', '20 to 26 Year(s)', 'N/A', 'ryrtyrtyrtyr', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-24', '2018-11-19 13:53:35', '2018-12-08 06:21:02', 'Hide'),
(15, 1, 'Ecommerce Site Development', 'IT & Telecommunication', 'This job is for ecomerce site developer ', 2, 'Entry', 'Contractual', 'Dhaka', 'Sukrabad, dhaka-1207', 'php, c, python', 'Any', '18 to 24 Year(s)', 'N/A', 'B.Sc in CSE, SWE', 'Not mentioned', '22500 to 40000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-30', '2018-11-23 06:05:28', '2018-11-28 10:18:47', 'Active'),
(16, 1, 'Ecommerce Site Development', 'NGO/Development', 'This job is for ecomerce site developer ', 2, 'Entry', 'Contractual', 'Dhaka', 'Sukrabad, dhaka-1207', 'php, c, python', 'Any', '18 to 24 Year(s)', 'N/A', 'B.Sc in CSE, SWE', 'Not mentioned', '22500 to 40000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-12-30', '2018-11-23 06:06:47', '2018-12-08 06:21:00', 'Hide'),
(17, 1, 'Ecommerce Site Development', 'NGO/Development', 'adfffffffffffffffffffffffffffffffffffff', 3, 'Top', 'Contractual', 'Dhaka', 'Not mentioned', 'affffffffffff', 'Others', '18 to 24 Year(s)', 'N/A', 'affffffffffffff', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-29', '2018-11-23 10:44:16', '2018-12-08 06:20:59', 'Hide'),
(18, 1, 'Open cart spetalist ', 'Web Development', 'dsgggggggg ggggggggggg', 2, 'Mid / Top', 'Full Time / Part Time', 'Mirpur', 'Not mentioned', 'sdgggggggggggg', 'Female', '18 to 24 Year(s)', 'N/A', 'sdgggggggggggggggggg', 'sdgggggggggggggggggggg', '5000 to 10000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-30', '2018-11-23 10:58:42', '2018-12-10 08:58:31', 'Active'),
(19, 1, 'Open cart spetalist ', 'Web Development', 'dsgggggggg ggggggggggg', 2, 'Mid / Top', 'Full Time / Part Time', 'Mirpur', 'Not mentioned', 'sdgggggggggggg', 'Female', '18 to 24 Year(s)', 'N/A', 'sdgggggggggggggggggg', 'sdgggggggggggggggggggg', '5000 to 10000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-11-30', '2018-11-23 10:58:52', '2018-12-10 08:43:08', 'Active'),
(20, 1, 'Open cart spetalist ', 'Software Development', 'sdaffffffffffffffffffffffffffff', 2, 'Top', 'Part Time', 'Mirpur', 'Not mentioned', 'sdfggggggggg', 'Female', '18 to 24 Year(s)', 'N/A', 'sdggggggggggg', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-12-01', '2018-11-23 11:09:11', '2018-12-10 08:43:04', 'Active'),
(21, 1, 'Open cart spetalist ', 'IT & Telecommunication', 'sdaffffffffffffffffffffffffffff', 2, 'Mid', 'Full Time', 'Dhaka', 'Not mentioned', 'sdfggggggggg', 'Female', '20 to 26 Year(s)', 'N/A', 'sdggggggggggg', 'Not mentioned', '20000 to 30000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-12-01', '2018-11-23 11:10:52', '2018-12-09 05:15:54', 'Active'),
(22, 2, 'Senior network engineer', 'IT & Telecommunication', 'As a network engineer you will have responsibility for setting up, developing and maintaining computer networks within an organisation or between organisations.', 20, 'Mid / Top', 'Full Time / Contractual / Internship', 'Sirajgonj', 'zubayer  IT limited is situated in kazipur, sirajganj. ', 'CCNA, C, Java, ', 'Any', '20 to 40 Year(s)', 'N/A', 'BSC in computer science and engineering (CSE), BSC in Software engineering (SWE)', 'Not mentioned', 'Negotiable', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-12-31', '2018-12-07 05:29:41', '2018-12-10 09:16:07', 'Active'),
(23, 1, 'dfg erdgt ert', 'Agro (Plant / Animal / Fisheries)', 'sdr rwer werwer werwe wer', 234, 'Entry', 'Part Time', 'Joypurhat', 'Not mentioned', 'er er rewr werwe rwerwe rwe', 'Any', '18 to 24 Year(s)', '2 to 3 Year(s)', 'er wer wer rwer erwe r', 'Not mentioned', '5000 to 10000 TK', 'Not mentioned', 'Not mentioned', 'Not mentioned', '2018-12-29', '2018-12-09 05:30:37', '2018-12-10 08:58:27', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `circular_visited`
--

CREATE TABLE `circular_visited` (
  `id` int(250) NOT NULL,
  `post_id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `visit_count` int(250) NOT NULL,
  `first_visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `circular_visited`
--

INSERT INTO `circular_visited` (`id`, `post_id`, `js_id`, `visit_count`, `first_visited_at`, `last_visited_at`) VALUES
(1, 2, 2, 16, '2018-10-18 22:05:33', '2018-10-26 15:46:42'),
(2, 3, 2, 11, '2018-10-18 22:06:36', '2018-10-24 16:03:43'),
(3, 4, 2, 28, '2018-10-18 22:06:53', '2018-10-24 16:03:00'),
(4, 5, 2, 35, '2018-10-18 22:07:23', '2018-10-26 16:06:36'),
(5, 1, 2, 26, '2018-10-18 22:07:34', '2018-12-09 20:33:01'),
(6, 7, 2, 4, '2018-10-21 16:34:27', '2018-10-21 19:50:48'),
(7, 6, 2, 4, '2018-10-21 16:47:37', '2018-10-21 16:47:44'),
(8, 8, 2, 22, '2018-10-21 21:02:11', '2018-12-10 09:14:10'),
(10, 9, 2, 32, '2018-10-22 15:54:57', '2018-11-25 14:23:46'),
(12, 1, 3, 5, '2018-10-26 19:15:36', '2018-10-26 19:15:36'),
(13, 9, 3, 5, '2018-10-26 19:30:22', '2018-10-26 19:30:22'),
(14, 10, 2, 41, '2018-11-07 10:08:32', '2018-11-24 05:24:37'),
(15, 12, 2, 1, '2018-11-19 13:45:00', '2018-11-19 13:45:00'),
(16, 21, 2, 18, '2018-11-24 05:17:40', '2018-11-24 10:34:23'),
(17, 11, 2, 2, '2018-11-24 05:19:12', '2018-11-24 05:28:30'),
(18, 13, 2, 1, '2018-11-24 05:19:19', '2018-11-24 05:19:19'),
(19, 15, 2, 16, '2018-11-24 05:19:26', '2018-11-25 14:37:53'),
(20, 16, 2, 1, '2018-11-24 05:19:34', '2018-11-24 05:19:34'),
(21, 18, 2, 2, '2018-11-24 05:19:45', '2018-11-24 10:34:05'),
(22, 14, 2, 1, '2018-11-24 05:40:16', '2018-11-24 05:40:16'),
(23, 17, 2, 3, '2018-11-24 06:01:48', '2018-11-24 10:34:28'),
(25, 20, 2, 3, '2018-11-24 08:13:03', '2018-12-01 14:28:28'),
(26, 19, 2, 3, '2018-11-24 10:32:01', '2018-11-24 10:34:01'),
(27, 16, 8, 3, '2018-12-05 17:12:17', '2018-12-07 05:40:17'),
(28, 22, 8, 2, '2018-12-07 05:39:13', '2018-12-09 19:01:48'),
(29, 1, 8, 1, '2018-12-07 05:40:09', '2018-12-07 05:40:09'),
(30, 22, 2, 7, '2018-12-08 06:43:53', '2018-12-10 08:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `cover_letter_info`
--

CREATE TABLE `cover_letter_info` (
  `js_id` int(250) NOT NULL,
  `position` varchar(250) NOT NULL DEFAULT 'Not Mentioned',
  `published_on` varchar(250) NOT NULL DEFAULT 'Not Mentioned',
  `to_director` varchar(100) NOT NULL DEFAULT 'Not Mentioned',
  `institution` varchar(250) NOT NULL DEFAULT 'Not Mentioned',
  `contact_no` varchar(20) NOT NULL DEFAULT 'Not Mentioned',
  `email` varchar(250) NOT NULL DEFAULT 'Not Mentioned',
  `address` varchar(250) NOT NULL DEFAULT 'Not Mentioned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cover_letter_info`
--

INSERT INTO `cover_letter_info` (`js_id`, `position`, `published_on`, `to_director`, `institution`, `contact_no`, `email`, `address`) VALUES
(2, 'Web development', 'jobskillbd', 'Mr. Zubayer Islam', 'jobskillbd.com', '01772635883', 'jobskillbd@gmail.com', 'Sukrabad, Dhanmondi, Dhaka-1207'),
(8, 'Software Engineer', '05-12-18', 'Asif rahman', 'asif soft limited', '0176253763', 'asifrahman@gmail.com', 'mirpur,dhaka-1208'),
(9, 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned'),
(11, 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned'),
(12, 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned'),
(13, 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned', 'Not Mentioned');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `username`, `name`, `email`, `gender`, `dob`, `contact`, `address`, `password`) VALUES
(1, 'asifrahman', 'md asif', 'a@gmail.com', 'male', '2018-04-14', '134567898765456', 'zxcfxgv sdfgd', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'asif12', 'md. asif', 'as@gmail.com', 'male', '2018-04-20', '01772635883', 'vhj', 'fcea920f7412b5da7be0cf42b8c93759'),
(12, 'asif123', 'md. asif', 'asifrah@gmail.com', 'male', '2018-04-28', '34567866666', 'sdfg', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'asifrahman23', 'asif rahman', 'asifrahman@gmail.com', 'male', '2018-04-21', '2365679866676', 'sdbk', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `data_business_category`
--

CREATE TABLE `data_business_category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_business_category`
--

INSERT INTO `data_business_category` (`id`, `category_name`) VALUES
(1, 'Agro based Industry'),
(2, 'Airline/GSA'),
(3, 'Architecture / Engineering / Construction'),
(4, 'Automobile / Industrial Machine'),
(5, 'Bank / Non-Bank Fin. Institution'),
(6, 'BPO/Call Center'),
(7, 'Business Administrative Company'),
(8, 'Consultancy'),
(9, 'Distribution Agency'),
(10, 'Education'),
(11, 'Electronics / Consumer Durables'),
(12, 'Embassy/Foreign Mission'),
(13, 'Energy / Power / Fuel'),
(14, 'Engineering Firm'),
(15, 'Entertainment / Recreation '),
(16, 'Event Management Firm'),
(17, 'Export/Import'),
(18, 'Food & Beverage Industry'),
(19, 'Garments / Textile'),
(20, 'Govt. Organizations'),
(21, 'Hospital / Diagnostic Center'),
(22, 'Hotel/Resort/Restaurant '),
(23, 'Immigration Firm'),
(24, 'Information Technology (IT)'),
(25, 'Insurance'),
(26, 'IT-Hardware'),
(27, 'IT-Networking/ISP'),
(28, 'IT-Software'),
(29, 'Leasing'),
(30, 'Logistics / Transportation'),
(31, 'Manpower Recruitment'),
(32, 'Manufacturing (Heavy Industry)'),
(33, 'Manufacturing (Light Industry)'),
(34, 'Market Research Company'),
(35, 'Marketing'),
(36, 'Media / Advertising / Event Mgt.'),
(37, 'Multinational Company'),
(38, 'NGO / Development'),
(49, 'Others'),
(39, 'Pharmaceutical/Medicine Company'),
(40, 'Poultry/Dairy/Veterinary'),
(41, 'Power Equipment/Oil/Gas/Generator'),
(42, 'Real Estate/Developer/Construction'),
(43, 'Security Service'),
(44, 'Shipping/ Freight Forwarding/ Supply Chain'),
(45, 'Tannery/Footwear'),
(46, 'Telecommunication'),
(47, 'Travel Agents/Tour Operators'),
(48, 'TV/Films/Production');

-- --------------------------------------------------------

--
-- Table structure for table `data_degree_level`
--

CREATE TABLE `data_degree_level` (
  `id` int(250) NOT NULL,
  `degree_level` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_degree_level`
--

INSERT INTO `data_degree_level` (`id`, `degree_level`, `created_at`, `updated_at`) VALUES
(1, 'PSC/Equivalant', '2018-10-23 13:33:20', '2018-10-23 13:33:20'),
(2, 'JSC/Equivalant', '2018-10-23 13:33:20', '2018-10-23 13:33:20'),
(3, 'SSC/Equivalant', '2018-10-23 13:33:20', '2018-10-23 13:33:20'),
(4, 'HSC/Equivalant', '2018-10-23 13:33:20', '2018-10-23 13:33:20'),
(5, 'Diploma', '2018-10-23 13:33:20', '2018-10-23 13:33:20'),
(6, 'Bachelors Degree', '2018-10-23 13:33:20', '2018-10-23 13:47:55'),
(7, 'Post Graduate Degree', '2018-10-23 13:33:20', '2018-10-23 13:33:20'),
(9, 'Doctoral', '2018-10-23 13:33:20', '2018-10-23 13:33:20'),
(10, 'Internship', '2018-10-23 13:33:20', '2018-10-23 13:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `data_job_category`
--

CREATE TABLE `data_job_category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_job_category`
--

INSERT INTO `data_job_category` (`id`, `category_name`) VALUES
(1, 'Accounting / Finance'),
(2, 'Agro (Plant / Animal / Fisheries)'),
(3, 'Bank / Non-Bank Fin. Institution'),
(4, 'Beauty Care / Health & Fitness'),
(5, 'Commercial / Supply Chain'),
(6, 'Customer Support / Call Centre'),
(7, 'Data Entry / Operator / BPO'),
(8, 'Design / Creative'),
(9, 'Driving / Motor Technician'),
(10, 'Education / Training'),
(11, 'Electrician / Construction / Repair'),
(12, 'Engineer / Architects'),
(13, 'Gen Mgt / Admin'),
(14, 'Hospitality / Travel / Tourism'),
(15, 'HR / Org. Development'),
(16, 'IT & Telecommunication'),
(17, 'Law / Legal'),
(18, 'Marketing / Sales'),
(19, 'Media / Advertisement / Event Mgt.'),
(20, 'Medical / Pharma'),
(21, 'NGO / Development'),
(26, 'Others'),
(22, 'Production / Operation'),
(23, 'Research / Consultancy'),
(24, 'Secretary / Receptionist'),
(25, 'Security / Support Service');

-- --------------------------------------------------------

--
-- Table structure for table `data_job_location`
--

CREATE TABLE `data_job_location` (
  `id` int(100) NOT NULL,
  `location_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_job_location`
--

INSERT INTO `data_job_location` (`id`, `location_name`) VALUES
(1, 'Bagerhat'),
(2, 'Bandarban'),
(3, 'Barguna'),
(4, 'Barisal'),
(6, 'Bhola'),
(7, 'Bogra'),
(5, 'Brahmanbaria'),
(8, 'Chandpur'),
(9, 'Chittagong'),
(10, 'Chuadanga'),
(11, 'Comilla'),
(12, 'Coxs Bazar'),
(13, 'Dhaka'),
(14, 'Dinajpur'),
(15, 'Faridpur'),
(16, 'Feni'),
(17, 'Gaibandha'),
(18, 'Gazipur'),
(19, 'Gopalganj'),
(20, 'Habiganj'),
(22, 'Jamalpur'),
(23, 'Jessore'),
(24, 'Jhalakathi'),
(25, 'Jhinaidah'),
(21, 'Joypurhat'),
(26, 'Khagrachari'),
(27, 'Khulna'),
(28, 'Kishoreganj'),
(29, 'Kurigram'),
(30, 'Kushtia'),
(31, 'Lakshmipur'),
(32, 'Lalmonirhat'),
(33, 'Madaripur'),
(34, 'Magura'),
(35, 'Manikganj'),
(36, 'Meherpur'),
(37, 'Moulavibazar'),
(38, 'Munshiganj'),
(39, 'Mymensingh'),
(40, 'Naogaon'),
(41, 'Narayanganj'),
(42, 'Narsingdi'),
(43, 'Natore'),
(44, 'Nawabgonj'),
(45, 'Netrokona'),
(46, 'Nilphamari'),
(47, 'Noakhali'),
(48, 'Norail'),
(49, 'Pabna'),
(50, 'Panchagarh'),
(51, 'Patuakhali'),
(52, 'Pirojpur'),
(53, 'Rajbari'),
(54, 'Rajshahi'),
(55, 'Rangamati'),
(56, 'Rangpur'),
(57, 'Satkhira'),
(58, 'Shariatpur'),
(59, 'Sherpur'),
(60, 'Sirajgonj'),
(61, 'Sunamganj'),
(62, 'Sylhet'),
(63, 'Tangail'),
(64, 'Thakurgaon');

-- --------------------------------------------------------

--
-- Table structure for table `data_organization_type`
--

CREATE TABLE `data_organization_type` (
  `id` int(250) NOT NULL,
  `organization_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_organization_type`
--

INSERT INTO `data_organization_type` (`id`, `organization_type`) VALUES
(1, 'Government'),
(5, 'International Agencies'),
(3, 'NGO'),
(6, 'Others'),
(4, 'Private Firm/Company'),
(2, 'Semi Government');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `degree_level` varchar(250) NOT NULL,
  `degree_title` varchar(250) NOT NULL,
  `major_subject` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `result_system` varchar(10) NOT NULL,
  `grade_scale` varchar(10) NOT NULL,
  `result_achieved` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `passing_year` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'user_data',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `js_id`, `degree_level`, `degree_title`, `major_subject`, `institution`, `result_system`, `grade_scale`, `result_achieved`, `duration`, `passing_year`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'SSC/Equivalant', 'Dahkil Examination', 'Science', 'Hatigara Dakhil Madrasah', 'Grade', '5.00', '5.00', '10', '2012', 'user_data', '2018-10-25 13:09:49', '2018-12-03 12:28:49'),
(4, 2, 'HSC/Equivalant', 'Higher Secondary School Certificate', 'Science', 'Bogra Cantonment  Public School & Collage', 'Grade', '5.00', '4.10', '2', '2014', 'user_data', '2018-11-06 17:00:37', '2018-11-25 13:19:34'),
(5, 2, 'Bachelors Degree', 'B.sc in Computer Science & Engineering', 'CSE', 'Daffodil International University', 'Grade', '4.00', '3.79', '4', '2018', 'user_data', '2018-11-10 08:58:41', '2019-01-07 02:32:54'),
(6, 8, 'SSC/Equivalant', 'Secondary scholl certificate', 'science', 'Natuar para kb ml high  school', 'Grade', '5', '5', '2', '2012', 'user_data', '2018-12-07 04:44:22', '2018-12-07 04:44:22'),
(7, 8, 'HSC/Equivalant', 'Higher secondary school certifcate', 'science', 'Bogra cantonment public school and college', 'Grade', '5', '4.90', '2', '2014', 'user_data', '2018-12-07 04:45:30', '2018-12-07 04:45:30'),
(8, 8, 'Bachelors Degree', 'Computer science and engineering', 'Computer science and engineering', 'Daffodil international university', 'Grade', '4', '3.80', '4', '2018', 'user_data', '2018-12-07 04:46:40', '2018-12-07 04:46:40'),
(9, 1, '', '', '', '', '', '', '', '', '', 'user_existence', '2018-12-09 07:16:43', '2018-12-09 07:16:43'),
(10, 13, '', '', '', '', '', '', '', '', '', 'user_existence', '2018-12-09 07:54:22', '2018-12-09 07:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `logo_dir` varchar(250) NOT NULL DEFAULT 'not_defined_yet',
  `company_name` varchar(250) NOT NULL,
  `company_type` varchar(250) NOT NULL,
  `company_category` varchar(250) NOT NULL,
  `company_size` varchar(50) NOT NULL,
  `employer_type` varchar(20) NOT NULL,
  `portfolio` varchar(1000) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `location` varchar(250) NOT NULL,
  `web_url` varchar(250) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_privacy` varchar(10) NOT NULL DEFAULT 'Private',
  `action` varchar(10) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `username`, `email`, `logo_dir`, `company_name`, `company_type`, `company_category`, `company_size`, `employer_type`, `portfolio`, `city`, `zip_code`, `location`, `web_url`, `mobile_number`, `phone_number`, `password`, `profile_privacy`, `action`, `created_at`, `updated_at`) VALUES
(1, 'asif', 'asif@gmail.com', '../user_info/employer/1/company_logo/02_12_2018_21_28_27.jpg', 'Asif  Software Limited', 'Private Firm/Company', 'Information Technology (IT)', '500 Employees or More', 'Employer', '', 'Gopalganj', '1205', 'Sukrabad, Dhaka', 'https://stackoverflow.com/', '+8801772 635883', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-17 15:46:21', '2018-12-02 20:28:27'),
(2, 'zubayer', 'zubayer@gmail.com', 'not_defined_yet', 'zubayer IT Ltd.', 'Private Firm/Company', 'Information Technology (IT)', '50-99 Employees', 'Employer', '', 'Dhaka', '1207', 'Sukrabad', 'https://www.youtube.com/', '01721706080', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-19 06:29:52', '2018-12-09 19:30:55'),
(3, 'decoders1', 'zubayer.cse@gmail.com', 'not_defined_yet', 'zubayer IT Ltd.', '', 'IT', '', '', '', 'dhaka', '1207', 'sdsad', 'https://www.chakri.com/', '01721706080', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-22 07:24:06', '2018-11-25 14:46:30'),
(4, 'mridha', 'mridha@gmail.com', 'not_defined_yet', 'mridha it institute', '', 'IT', '', '', '', 'dhaka', '1207', 'sukrabad', '', '01721314151', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-27 09:42:58', '2018-11-28 10:18:29'),
(5, 'ana', 'ana@gmail.com', 'not_defined_yet', 'ana it', '', 'IT', '', '', '', 'dhaka', '1207', 'sfvsdf', '', '01721314151', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Active', '2018-10-27 10:31:42', '2018-11-28 10:18:28'),
(8, 'zubayer5047', 'zubayerislam@gmail.com', 'not_defined_yet', 'Decoders IT', '', 'IT', '', '', '', 'dhaka', '1207', 'Dhanmondi 32', '', '01721706080', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Active', '2018-12-07 05:10:29', '2018-12-07 05:10:29'),
(9, 'sohag', 'sohag@gmail.com', 'not_defined_yet', 'Sohag IT Inc.', 'Private Firm/Company', 'Manufacturing (Heavy Industry)', '1-9 Employees', 'Employer', '', 'Coxs Bazar', '1209', 'sukrabad', '', '01704050607', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Deactive', '2018-12-08 18:31:05', '2018-12-10 08:58:20'),
(11, 'assasas', '4g@gmail.com', 'not_defined_yet', 'asa asas', 'NGO', 'Govt. Organizations', '', '', '', 'Gopalganj', '1209', 'sukrabad', '', '01704050607', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Active', '2018-12-08 18:58:07', '2018-12-08 18:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `em_contact_person`
--

CREATE TABLE `em_contact_person` (
  `em_id` int(250) NOT NULL,
  `pic_dir` varchar(250) NOT NULL DEFAULT 'not_defined_yet',
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'Others',
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `em_contact_person`
--

INSERT INTO `em_contact_person` (`em_id`, `pic_dir`, `full_name`, `gender`, `designation`, `department`, `email`, `mobile_no`, `phone_no`, `address`, `created_at`, `updated_at`) VALUES
(1, '../user_info/employer/1/CP_profile_picture/18_11_2018_10_34_26.png', 'Md. Asif Rahman', 'Others', 'CEO', 'Admin', 'ana@gmail.com', '+8801772635883', '5434545345345', 'sukrabad, Dhaka', '2018-10-27 10:49:50', '2018-11-18 09:34:26'),
(2, '../user_info/employer/2/CP_profile_picture/09_12_2018_07_23_11.jpg', 'Md. Zubayer Islam', 'Male', 'CEO', 'Software development', 'zubayerislam.cse@gmail.com', '01721706080', '', 'dhanmondi-32,dhaka-1207', '2018-10-27 10:49:50', '2018-12-09 06:23:11'),
(3, 'not_defined_yet', '', '', '', '', '', '', '', '', '2018-10-27 10:49:50', '2018-10-27 10:49:50'),
(4, 'not_defined_yet', '', '', '', '', '', '', '', '', '2018-10-27 10:49:50', '2018-10-27 10:49:50'),
(5, 'not_defined_yet', 'Anamika', '', '', '', '', '', '', '', '2018-10-27 10:31:42', '2018-10-27 10:41:30'),
(8, 'not_defined_yet', 'Zubayer Islam', 'Others', '', '', '', '', '', '', '2018-12-07 05:10:29', '2018-12-07 05:10:29'),
(9, 'not_defined_yet', 'Sohag', 'Others', '', '', '', '', '', '', '2018-12-08 18:31:05', '2018-12-08 18:31:05'),
(10, 'not_defined_yet', 'ddddddddddddddddddd', 'Others', '', '', '', '', '', '', '2018-12-08 18:38:43', '2018-12-08 18:38:43'),
(11, 'not_defined_yet', 'assasas', 'Others', '', '', '', '', '', '', '2018-12-08 18:58:07', '2018-12-08 18:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `em_following_js`
--

CREATE TABLE `em_following_js` (
  `id` int(250) NOT NULL,
  `em_id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `started_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `em_following_js`
--

INSERT INTO `em_following_js` (`id`, `em_id`, `js_id`, `started_at`) VALUES
(13, 2, 1, '2018-10-19 12:19:41'),
(16, 2, 2, '2018-10-20 08:01:24'),
(42, 1, 2, '2018-11-24 16:30:23'),
(43, 1, 3, '2018-11-24 16:30:24'),
(45, 2, 4, '2018-12-10 09:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `id` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `pic_dir` varchar(1000) NOT NULL DEFAULT 'not_defined_yet',
  `up_resume_dir` varchar(1000) NOT NULL DEFAULT 'not_defined_yet',
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT 'Bnagladesh',
  `nid` varchar(50) NOT NULL,
  `birth_certificate` varchar(50) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `present_address` varchar(250) NOT NULL,
  `permanent_address` varchar(250) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `alternative_email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_privacy` varchar(10) NOT NULL DEFAULT 'Private',
  `action` varchar(10) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id`, `email`, `username`, `full_name`, `pic_dir`, `up_resume_dir`, `dob`, `gender`, `marital_status`, `nationality`, `nid`, `birth_certificate`, `father_name`, `mother_name`, `present_address`, `permanent_address`, `mobile_number`, `phone_number`, `alternative_email`, `password`, `profile_privacy`, `action`, `created_at`, `updated_at`) VALUES
(1, 'evaaktermeri@gmail.com', 'eva', 'Eva Akter', 'not_defined_yet', 'not_defined_yet', '2018-10-01', 'Female', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '+8801780 890429', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-17 10:34:24', '2018-11-24 16:16:39'),
(2, 'eng.asifrahman@gmail.com', 'asif', 'Md. Asif Rahman', '../user_info/job_sekeer/2/profile_picture/07_01_2019_03_33_25.jpg', '../user_info/job_sekeer/2/uploaded_resume/Md. Asif Rahman (2018-12-09).doc', '1997-10-15', 'Male', 'Married', 'Bnagladesh', '', '', 'Md. Monsur Rahman', 'Asma Begum', 'H#55, Sukrabd, Dhaka-1207, Bangladesh', 'Village: Tulat, U.P: Poranaoail, P.O: Amdoi 5900,  Distrcict: Joypurhat', '01910241412', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-17 10:35:16', '2019-04-26 15:51:31'),
(3, 'istiak@gmail.com', 'istiak', 'Istiak Akmed', 'not_defined_yet', 'not_defined_yet', '2018-09-30', 'Male', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '+8801772 635883', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-17 11:55:26', '2018-11-28 10:18:32'),
(4, 'shapla@gmail.com', 'shapla', 'Sapla Akter', 'not_defined_yet', 'not_defined_yet', '2018-10-26', 'Female', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '01710203040', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-10-23 17:17:54', '2018-11-28 10:18:32'),
(5, 'urmi@gmail.com', 'urmi', 'Urmi', 'not_defined_yet', 'not_defined_yet', '2018-10-17', 'Female', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '01721314151', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Active', '2018-10-27 10:34:53', '2018-11-24 05:15:19'),
(7, 'e@gmail.com', 'trt', 'Munna', 'not_defined_yet', 'not_defined_yet', '2018-10-26', 'Male', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '01721314151', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Deactive', '2018-10-27 11:17:56', '2018-12-10 09:20:32'),
(8, 'zubayerislam.cse@gmail.com', 'zubayer5047', 'Md. Zubayer Islam', '../user_info/job_sekeer/8/profile_picture/09_12_2018_18_48_04.jpg', 'not_defined_yet', '1997-07-15', 'Male', 'Married', 'Bnagladesh', '19978815015000038', '000000236436723', 'Md. Sirajul Islam', 'nargish begaum', '#55,Shukrabad,Mohammadpur,Dhaka-1207', 'Chargirish,Kazipur,Sirajganj', '01721706080', '', 'zubayer15-5047@diu.edu.bd', 'e10adc3949ba59abbe56e057f20f883e', 'Public', 'Active', '2018-12-05 16:35:24', '2018-12-10 09:20:31'),
(9, 'munna@gmail.com', 'munna', 'Munna', 'not_defined_yet', 'not_defined_yet', '2018-12-27', 'Male', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '01710203040', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Active', '2018-12-08 06:37:47', '2018-12-10 09:20:29'),
(11, 'remon@gmail.com', 'remon', 'Md. Remon', 'not_defined_yet', 'not_defined_yet', '2018-12-29', 'Male', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '01704050607', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Active', '2018-12-08 15:52:14', '2018-12-10 08:41:09'),
(13, 'sohag@gmail.com', 'sohag', 'Sohag', 'not_defined_yet', 'not_defined_yet', '2018-12-28', 'Male', NULL, 'Bnagladesh', '', '', NULL, NULL, '', '', '01704050607', '', '', 'e10adc3949ba59abbe56e057f20f883e', 'Private', 'Active', '2018-12-09 07:54:22', '2018-12-10 09:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `js_following_em`
--

CREATE TABLE `js_following_em` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `em_id` int(250) NOT NULL,
  `started_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `js_following_em`
--

INSERT INTO `js_following_em` (`id`, `js_id`, `em_id`, `started_at`) VALUES
(1, 8, 1, '2018-12-05 17:12:57'),
(2, 8, 2, '2018-12-05 17:12:59'),
(3, 8, 4, '2018-12-05 17:13:03'),
(4, 13, 1, '2018-12-09 10:50:44'),
(5, 13, 4, '2018-12-09 10:50:45'),
(13, 2, 3, '2018-12-10 09:14:42'),
(14, 2, 1, '2019-03-29 12:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `language` varchar(50) NOT NULL,
  `reading` varchar(50) NOT NULL,
  `writing` varchar(50) NOT NULL,
  `speaking` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'user_data',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `js_id`, `language`, `reading`, `writing`, `speaking`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'English', 'High', 'Medium', 'Medium', 'user_data', '2018-12-05 16:56:55', '2018-12-05 16:56:55'),
(2, 8, 'bangla', 'High', 'High', 'High', 'user_data', '2018-12-05 16:57:06', '2018-12-05 16:57:06'),
(4, 2, 'English', 'High', 'Medium', 'Medium', 'user_data', '2018-12-08 06:11:41', '2018-12-08 06:11:41'),
(5, 1, '', '', '', '', 'user_existence', '2018-12-09 07:16:11', '2018-12-09 07:16:11'),
(6, 13, '', '', '', '', 'user_existence', '2018-12-09 07:54:23', '2018-12-09 07:54:23'),
(7, 2, 'Bangla', 'High', 'High', 'High', 'user_data', '2019-04-26 15:50:21', '2019-04-26 15:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_comment`
--

CREATE TABLE `lesson_comment` (
  `id` int(250) NOT NULL,
  `l_id` int(250) NOT NULL,
  `c_id` int(250) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL DEFAULT 'Active',
  `commented_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson_comment`
--

INSERT INTO `lesson_comment` (`id`, `l_id`, `c_id`, `comment`, `status`, `action`, `commented_at`, `updated_at`) VALUES
(1, 33, 1, 'Is it helpful?', 'Admin', 'Active', '2018-12-08 06:19:17', '2018-12-08 06:19:17'),
(2, 30, 1, 'very important MCQ.....', 'Admin', 'Active', '2018-12-08 06:20:06', '2018-12-08 06:20:06'),
(3, 33, 8, 'Yes it is very helpful......', 'User', 'Hide', '2018-12-09 17:49:01', '2018-12-09 17:55:12'),
(4, 33, 1, 'Thank\'s', 'Admin', 'Hide', '2018-12-09 17:53:53', '2018-12-09 17:53:57'),
(5, 33, 8, 'Thanks for this post, it\'s very helpful post...', 'User', 'Active', '2018-12-09 17:57:40', '2018-12-09 17:57:40'),
(6, 29, 2, 'helpful', 'User', 'Hide', '2018-12-10 08:18:38', '2018-12-10 08:27:28'),
(7, 29, 2, 'helpful\r\n', 'User', 'Hide', '2018-12-10 08:27:47', '2018-12-10 09:12:53'),
(8, 29, 2, 'helpful', 'User', 'Hide', '2018-12-10 08:35:46', '2018-12-10 09:12:55'),
(9, 29, 2, 'helpful', 'User', 'Hide', '2018-12-10 08:53:24', '2018-12-10 09:12:56'),
(10, 29, 2, 'helpful', 'User', 'Active', '2018-12-10 09:13:06', '2018-12-10 09:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `movie_info`
--

CREATE TABLE `movie_info` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `cast` varchar(200) NOT NULL,
  `release_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_info`
--

INSERT INTO `movie_info` (`id`, `name`, `director`, `genre`, `cast`, `release_date`) VALUES
(6, 'Titanic', 'Imran', 'real story', 'Shapla & Minar', '2018-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `preparation_lesson`
--

CREATE TABLE `preparation_lesson` (
  `id` int(250) NOT NULL,
  `sub_id` int(250) NOT NULL,
  `lesson_title` varchar(250) NOT NULL,
  `lesson_content` mediumtext NOT NULL,
  `posted_by` int(250) NOT NULL,
  `updated_by` int(250) NOT NULL,
  `action` varchar(20) NOT NULL DEFAULT 'Public',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preparation_lesson`
--

INSERT INTO `preparation_lesson` (`id`, `sub_id`, `lesson_title`, `lesson_content`, `posted_by`, `updated_by`, `action`, `created_at`, `updated_at`) VALUES
(22, 2, 'à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬', '<p>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§à¦° à¦¶à¦¿à¦•à§à¦·à¦¾à¦œà§€à¦¬à¦¨ à¦¶à§à¦°à§ à¦¹à¦¯à¦¼ à¦•à§‹à¦¨ à¦¸à§à¦•à§à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦—à§‹à¦ªà¦¾à¦²à¦—à¦žà§à¦œà§‡à¦° à¦—à¦¿à¦®à¦¾à¦¡à¦¾à¦™à§à¦—à¦¾ à¦ªà§à¦°à¦¾à¦¥à¦®à¦¿à¦• à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦®à§à¦¯à¦¾à¦Ÿà§à¦°à¦¿à¦• à¦ªà¦¾à¦¶ à¦•à¦°à§‡à¦¨ à¦•à§‹à¦¨ à¦¸à§à¦•à§à¦² à¦¥à§‡à¦•à§‡, à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦—à§‹à¦ªà¦¾à¦²à¦—à¦žà§à¦œ à¦®à¦¿à¦¶à¦¨à¦¾à¦°à¦¿ à¦¸à§à¦•à§à¦²à§‡, à§§à§¯à§ªà§¨ à¦¸à¦¾à¦²à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦•à¦²à¦•à¦¾à¦¤à¦¾ à¦‡à¦¸à¦²à¦¾à¦®à¦¿à¦¯à¦¼à¦¾ à¦•à¦²à§‡à¦œà§‡à¦° à¦¬à§‡à¦•à¦¾à¦° à¦¹à§‹à¦·à§à¦Ÿà§‡à¦²à§‡à¦° à¦•à¦¤ à¦¨à¦®à§à¦¬à¦° à¦•à¦•à§à¦·à§‡ à¦¥à¦¾à¦•à¦¤à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§ª à¦¨à¦®à§à¦¬à¦° à¦•à¦•à§à¦·à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦†à¦¨à§à¦·à§à¦ à¦¾à¦¨à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦°à¦¾à¦œà¦¨à§€à¦¤à¦¿à¦¤à§‡ à¦…à¦­à¦¿à¦·à¦¿à¦•à§à¦¤ à¦¹à¦¨ à¦•à§€à¦­à¦¾à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§ªà§ª à¦¸à¦¾à¦²à§‡ à¦•à§à¦·à§à¦Ÿà¦¿à¦¯à¦¼à¦¾à¦¯à¦¼ à¦…à¦¨à§à¦·à§à¦ à¦¿à¦¤ à¦¨à¦¿à¦–à¦¿à¦² à¦¬à¦™à§à¦— à¦®à§à¦¸à¦²à¦¿à¦® à¦›à¦¾à¦¤à§à¦°à¦²à§€à¦—à§‡à¦° à¦¸à¦®à§à¦®à§‡à¦²à¦¨à§‡ à¦¯à§‹à¦—à¦¦à¦¾à¦¨à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦¹à§‹à¦¸à§‡à¦¨ à¦¶à¦¹à§€à¦¦ à¦¸à§‹à¦¹à¦°à¦¾à¦“à¦¯à¦¼à¦¾à¦°à§à¦¦à§€à¦° à¦¸à¦¹à¦•à¦¾à¦°à§€ à¦¨à¦¿à¦¯à§à¦•à§à¦¤ à¦¹à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§ªà§¬ à¦¸à¦¾à¦²à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¬à¦¿à¦ à¦ªà¦¾à¦¶ à¦•à¦°à§‡à¦¨ à¦•à¦¤ à¦¸à¦¾à¦²à§‡, à¦•à§‹à¦¨ à¦•à¦²à§‡à¦œ à¦¥à§‡à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§ªà§­ à¦¸à¦¾à¦²à§‡ à¦•à¦²à¦•à¦¾à¦¤à¦¾ à¦‡à¦¸à¦²à¦¾à¦®à¦¿à¦¯à¦¼à¦¾ à¦•à¦²à§‡à¦œ à¦¥à§‡à¦•à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼à§‡ à¦•à§‹à¦¨ à¦¬à¦¿à¦­à¦¾à¦—à§‡à¦° à¦›à¦¾à¦¤à§à¦° à¦›à¦¿à¦²à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦†à¦‡à¦¨ à¦¬à¦¿à¦­à¦¾à¦—à§‡à¦°à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦¥à§‡à¦•à§‡ à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦•à§‡à¦¨ à¦¬à¦¹à¦¿à¦¸à§à¦•à§ƒà¦¤ à¦¹à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§ªà§¯ à¦¸à¦¾à¦²à§‡ à¦šà¦¤à§à¦°à§à¦¥ à¦¶à§à¦°à§‡à¦£à¦¿à¦° à¦•à¦°à§à¦®à¦šà¦¾à¦°à§€à¦¦à§‡à¦° à¦†à¦¨à§à¦¦à§‹à¦²à¦¨à§‡ à¦¸à¦‚à¦¹à¦¤à¦¿ à¦ªà§à¦°à¦•à¦¾à¦¶ à¦•à¦°à¦¾à¦¯à¦¼ à¦¤à¦¾à¦à¦•à§‡ à¦¬à¦¹à¦¿à¦¸à§à¦•à¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦œà§€à¦¬à¦¨à§‡ à¦ªà§à¦°à¦¥à¦® à¦•à¦¾à¦°à¦¾à¦­à§‹à¦— à¦•à¦°à§‡à¦¨ à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦•à¦¤ à¦¤à¦¾à¦°à¦¿à¦–à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§©à§¯ à¦¸à¦¾à¦²à§‡à¥¤ à¦¸à¦°à¦•à¦¾à¦°à¦¿ à¦¨à¦¿à¦·à§‡à¦§à¦¾à¦œà§à¦žà¦¾ à¦‰à¦ªà§‡à¦•à§à¦·à¦¾ à¦•à¦°à§‡ à¦¸à§à¦•à§à¦² à¦•à¦°à§à¦¤à§ƒà¦ªà¦•à§à¦·à§‡à¦° à¦¬à¦¿à¦°à§à¦¦à§à¦§à§‡ à¦à¦•à¦Ÿà¦¿ à¦ªà§à¦°à¦¤à¦¿à¦¬à¦¾à¦¦ à¦¸à¦­à¦¾ à¦•à¦°à¦¾à¦° à¦•à¦¾à¦°à¦£à§‡ à¦¤à¦¾à¦à¦•à§‡ à¦•à¦¾à¦°à¦­à§‹à¦— à¦•à¦°à¦¤à§‡ à¦¹à¦¯à¦¼à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à§§à§¯à§ªà§¯ à¦¸à¦¾à¦²à§‡à¦° à§¨à§© à¦œà§à¦¨ à¦ªà§‚à¦°à§à¦¬ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨ à¦†à¦“à¦¯à¦¼à¦¾à¦®à§€ à¦®à§à¦¸à¦²à¦¿à¦® à¦²à§€à¦— à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾ à¦²à¦¾à¦­ à¦•à¦°à¦²à§‡ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨ à¦¸à§‡à¦–à¦¾à¦¨à§‡ à¦•à§€ à¦ªà¦¦ à¦ªà¦¾à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¯à§à¦—à§à¦® à¦¸à¦®à§à¦ªà¦¾à¦¦à¦•à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à§§à§¯à§«à§¨ à¦¸à¦¾à¦²à§‡à¦° à¦•à¦¤ à¦¤à¦¾à¦°à¦¿à¦–à§‡ à¦°à¦¾à¦·à§à¦Ÿà§à¦° à¦­à¦¾à¦·à¦¾ à¦¬à¦¾à¦‚à¦²à¦¾à¦° à¦¦à¦¾à¦¬à§€à¦¤à§‡ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦•à¦¾à¦°à¦¾à¦—à¦¾à¦°à§‡ à¦…à¦¨à¦¶à¦¨ à¦¶à§à¦°à§ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§ª à¦«à§‡à¦¬à§à¦°à§à¦¯à¦¼à¦¾à¦°à¦¿à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¯à§à¦•à§à¦¤à¦«à§à¦°à¦¨à§à¦Ÿ à¦¨à¦¿à¦°à§à¦¬à¦¾à¦šà¦¨à§‡ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦•à§‹à¦¨ à¦†à¦¸à¦¨à§‡ à¦¬à¦¿à¦œà¦¯à¦¼à§€ à¦¹à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦—à§‹à¦ªà¦¾à¦²à¦—à¦žà§à¦œ à¦†à¦¸à¦¨à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦•à§‹à¦¨ à¦®à¦¨à§à¦¤à§à¦°à§€à¦¸à¦­à¦¾à¦¯à¦¼ à¦¸à¦°à§à¦¬à¦•à¦¨à¦¿à¦·à§à¦  à¦®à¦¨à§à¦¤à§à¦°à§€ à¦›à¦¿à¦²à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§«à§ª à¦¸à¦¾à¦²à§‡à¦° à¦¯à§à¦•à§à¦¤à¦«à§à¦°à¦¨à§à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€à¦¸à¦­à¦¾à¦¯à¦¼à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à§§à§¯à§¬à§ª à¦¸à¦¾à¦²à§‡ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§à¦° à¦¨à§‡à¦¤à§ƒà¦¤à§à¦¬à§‡ à¦¸à¦®à§à¦®à¦¿à¦²à¦¿à¦¤ à¦¬à¦¿à¦°à§‹à¦§à§€ à¦¦à¦² à¦—à¦ à¦¨ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤ à¦¦à¦²à¦Ÿà¦¿à¦° à¦¨à¦¾à¦® à¦•à§€?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦•à¦®à§à¦¬à¦¾à¦‡à¦¨à§à¦¡ à¦…à¦ªà¦œà¦¿à¦¶à¦¨ à¦ªà¦¾à¦°à§à¦Ÿà¦¿à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦®à§à¦œà¦¿à¦¬ à¦›à¦¯à¦¼à¦¦à¦«à¦¾ à§§à¦® à¦•à¦¬à§‡ à¦˜à§‹à¦·à¦¨à¦¾ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§« à¦«à§‡à¦¬à§à¦°à§à¦¯à¦¼à¦¾à¦°à¦¿ à§§à§¯à§¬à§¬à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦†à¦“à¦¯à¦¼à¦¾à¦®à§€ à¦²à§€à¦—à§‡à¦° à¦•à¦¾à¦‰à¦¨à§à¦¸à¦¿à¦² à¦…à¦§à¦¿à¦¬à§‡à¦¶à¦¨à§‡ à§¬ à¦¦à¦«à¦¾ à¦—à§ƒà¦¹à§€à¦¤ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§¬à§¬ à¦¸à¦¾à¦²à§‡à¦° à§§à§® à¦®à¦¾à¦°à§à¦šà¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬ à¦†à¦¨à§à¦·à§à¦ à¦¾à¦¨à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦•à¦¬à§‡ à¦›à¦¯à¦¼à¦¦à¦«à¦¾ à¦˜à§‹à¦·à¦¨à¦¾ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§© à¦®à¦¾à¦°à§à¦š à§§à§¯à§¬à§¬à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦•à§‹à¦¨ à¦ªà§à¦°à¦¸à§à¦¤à¦¾à¦¬à§‡à¦° à¦­à¦¿à¦¤à§à¦¤à¦¿à¦¤à§‡ à¦›à¦¯à¦¼à¦¦à¦«à¦¾ à¦°à¦šà¦¿à¦¤ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦²à¦¾à¦¹à§‹à¦° à¦ªà§à¦°à¦¸à§à¦¤à¦¾à¦¬à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨à¦•à§‡ &lsquo;à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§&rsquo; à¦‰à¦ªà¦¾à¦§à¦¿à¦¤à§‡ à¦­à§‚à¦·à¦¿à¦¤ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§¬à§¯ à¦¸à¦¾à¦²à§‡à¦° à§¨à§© à¦«à§‡à¦¬à§à¦°à§à¦¯à¦¼à¦¾à¦°à¦¿à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨à¦•à§‡ &lsquo;à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§&rsquo; à¦‰à¦ªà¦¾à¦§à¦¿ à¦•à§‡ à¦¦à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¤à§Žà¦•à¦¾à¦²à§€à¦¨ à¦¡à¦¾à¦•à¦¸à§à¦° à¦­à¦¿à¦ªà¦¿ à¦¤à§‹à¦«à¦¾à¦¯à¦¼à§‡à¦² à¦†à¦¹à¦®à§‡à¦¦à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦•à§‹à¦¥à¦¾à¦¯à¦¼ &lsquo;à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦‰à¦ªà¦¾à¦§à¦¿ à¦¦à§‡à¦“à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦°à§‡à¦¸à¦•à§‹à¦°à§à¦¸ à¦®à¦¯à¦¼à¦¦à¦¾à¦¨à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à§­ à¦®à¦¾à¦°à§à¦šà§‡à¦° à¦­à¦¾à¦·à¦£ à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦¦à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¢à¦¾à¦•à¦¾à¦° à¦°à§‡à¦¸à¦•à§‹à¦°à§à¦¸ à¦®à¦¯à¦¼à¦¦à¦¾à¦¨à§‡, à¦¯à¦¾ à¦à¦–à¦¨ à¦¸à§‹à¦¹à¦°à¦¾à¦“à¦¯à¦¼à¦¾à¦°à§à¦¦à¦¿ à¦‰à¦¦à§à¦¯à§‹à¦¨ à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à§­ à¦®à¦¾à¦°à§à¦šà§‡à¦° à¦­à¦¾à¦·à¦£à§‡à¦° à¦®à§‚à¦² à¦¬à¦•à§à¦¤à¦¬à§à¦¯ à¦•à§€ à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦à¦¬à¦¾à¦°à§‡à¦° à¦¸à¦‚à¦—à§à¦°à¦¾à¦® à¦®à§à¦•à§à¦¤à¦¿à¦° à¦¸à¦‚à¦—à§à¦°à¦¾à¦®, à¦à¦¬à¦¾à¦°à§‡à¦° à¦¸à¦‚à¦—à§à¦°à¦¾à¦® à¦¸à§à¦¬à¦¾à¦§à§€à¦¨à¦¤à¦¾à¦° à¦¸à¦‚à¦—à§à¦°à¦¾à¦®à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦•à¦–à¦¨ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨à¦¤à¦¾à¦° à¦˜à§‹à¦·à¦£à¦¾ à¦¦à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§§ à¦¸à¦¾à¦²à§‡à¦° à§¨à§« à¦®à¦¾à¦°à§à¦š à¦®à¦§à§à¦¯à¦°à¦¾à¦¤ à¦…à¦°à§à¦¥à¦¾à§Ž à§¨à§¬ à¦®à¦¾à¦°à§à¦šà§‡ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦¸à§à¦¬à¦¾à¦§à§€à¦¨à¦¤à¦¾ à¦˜à§‹à¦·à¦£à¦¾ à¦•à¦°à§‡à¦¨à¥¤ à¦à¦°à¦ªà¦°à¦‡ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à¦¿ à¦¸à§‡à¦¨à¦¾à¦¬à¦¾à¦¹à¦¿à¦¨à§€ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§à¦•à§‡ à¦—à§à¦°à§‡à¦ªà§à¦¤à¦¾à¦° à¦•à¦°à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à§§à§¯à§­à§§ à¦¸à¦¾à¦²à§‡à¦° à§§à§­ à¦à¦ªà§à¦°à¦¿à¦² à¦—à¦ à¦¿à¦¤ à¦…à¦¸à§à¦¥à¦¾à¦¯à¦¼à§€ à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§à¦° à¦ªà¦¦ à¦•à§€ à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨à§‡à¦° à¦ªà¦¦ à¦›à¦¿à¦² à¦°à¦¾à¦·à§à¦Ÿà§à¦°à¦ªà¦¤à¦¿à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦•à¦¾à¦°à¦¾à¦—à¦¾à¦° à¦¥à§‡à¦•à§‡ à¦®à§à¦•à§à¦¤à¦¿ à¦ªà¦¾à¦¨ à¦•à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§¨ à¦¸à¦¾à¦²à§‡à¦° à§® à¦œà¦¾à¦¨à§à¦¯à¦¼à¦¾à¦°à¦¿à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦«à§‡à¦°à§‡à¦¨ à¦•à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§¨ à¦¸à¦¾à¦²à§‡à¦° à§§à§¦ à¦œà¦¾à¦¨à§à¦¯à¦¼à¦¾à¦°à¦¿, à¦¯à¦¾ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§à¦° à¦¸à§à¦¬à¦¦à§‡à¦¶ à¦ªà§à¦°à¦¤à§à¦¯à¦¾à¦¬à¦°à§à¦¤à¦¨ à¦¦à¦¿à¦¬à¦¸ à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦°à¦¾à¦·à§à¦Ÿà§à¦°à¦ªà¦¤à¦¿à¦° à¦¦à¦¾à¦¯à¦¼à¦¿à¦¤à§à¦¬ à¦—à§à¦°à¦¹à¦£ à¦•à¦°à§‡à¦¨ à¦•à¦¤ à¦¤à¦¾à¦°à¦¿à¦–à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§¨ à¦¸à¦¾à¦²à§‡à¦° à§§à§¦ à¦œà¦¾à¦¨à§à¦¯à¦¼à¦¾à¦°à¦¿à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦ªà§à¦°à¦¥à¦® à¦¨à§‡à¦¤à¦¾ à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦œà¦¾à¦¤à¦¿à¦¸à¦‚à¦˜à§‡à¦° à¦¸à¦¾à¦§à¦¾à¦°à¦£ à¦ªà¦°à¦¿à¦·à¦¦à§‡ à¦¬à¦¾à¦‚à¦²à¦¾ à¦­à¦¾à¦·à¦¾à¦¯à¦¼ à¦¬à¦•à§à¦¤à§ƒà¦¤à¦¾ à¦¦à§‡à¦¨ à¦•à¦¤ à¦¸à¦¾à¦²à§‡, à¦•à¦¤ à¦¤à¦¾à¦°à¦¿à¦–à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§ª à¦¸à¦¾à¦²à§‡à¦° à§¨à§« à¦¸à§‡à¦ªà§à¦Ÿà§‡à¦®à§à¦¬à¦°à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¸à§à¦¬à¦ªà¦°à¦¿à¦¬à¦¾à¦°à§‡ à¦¨à¦¿à¦¹à¦¤ à¦¹à¦¨ à¦•à¦¤ à¦¤à¦¾à¦°à¦¿à¦–à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§« à¦¸à¦¾à¦²à§‡à¦° à§§à§« à¦†à¦—à¦·à§à¦Ÿà¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§à¦° à¦¸à§à¦¤à§à¦°à§€à¦° à¦¨à¦¾à¦® à¦•à§€?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¶à§‡à¦– à¦«à¦œà¦¿à¦²à¦¾à¦¤à§à¦¨à§à¦¨à§‡à¦¸à¦¾ à¦®à§à¦œà¦¿à¦¬à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§à¦° à¦›à§‡à¦²à§‡&ndash;à¦®à§‡à¦¯à¦¼à§‡ à¦•à¦¤ à¦œà¦¨? à¦¤à¦¾à¦¦à§‡à¦° à¦¨à¦¾à¦® à¦•à§€?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§« à¦œà¦¨à¥¤ à¦¤à¦¿à¦¨ à¦›à§‡à¦²à§‡ à¦¦à§à¦‡ à¦®à§‡à¦¯à¦¼à§‡à¥¤ à¦¶à§‡à¦– à¦¹à¦¾à¦¸à¦¿à¦¨à¦¾, à¦¶à§‡à¦– à¦•à¦¾à¦®à¦¾à¦², à¦¶à§‡à¦– à¦°à§‡à¦¹à¦¾à¦¨à¦¾, à¦¶à§‡à¦– à¦œà¦¾à¦®à¦¾à¦² à¦“ à¦¶à§‡à¦– à¦°à¦¾à¦¸à§‡à¦²à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦œà¦¾à¦¦à§à¦˜à¦° à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¢à¦¾à¦•à¦¾à¦° à¦§à¦¾à¦¨à¦®à¦¨à§à¦¡à¦¿à¦° à§©à§¨ à¦¨à¦®à§à¦¬à¦°à§‡à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à¦•à§‡ &lsquo;à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§&rsquo; à¦‰à¦ªà¦¾à¦§à¦¿ à¦¦à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼ à¦•à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§© à¦«à§‡à¦¬à§à¦°à§à¦¯à¦¼à¦¾à¦°à§€ à§§à§¯à§¬à§¯ à¦¸à¦¾à¦²à§‡<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à¦•à§‡ &lsquo;à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§&rsquo; à¦‰à¦ªà¦¾à¦§à¦¿ à¦•à§‡ à¦¦à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¤à§‹à¦«à¦¾à¦¯à¦¼à§‡à¦² à¦†à¦¹à¦®à§à¦®à§‡à¦¦<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦•à§‹à¦¥à¦¾à¦¯à¦¼ &lsquo;à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦‰à¦ªà¦¾à¦§à¦¿ à¦¦à§‡à¦“à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦°à§‡à¦¸à¦•à§‹à¦°à§à¦¸ à¦®à¦¯à¦¼à¦¦à¦¾à¦¨à§‡<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦à¦¤à¦¿à¦¹à¦¾à¦¸à¦¿à¦• &lsquo;à¦›à¦¯à¦¼à¦¦à¦«à¦¾&rsquo; à¦•à§‡ à¦·à§‹à¦·à¦¨à¦¾ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦›à¦¯à¦¼à¦¦à¦«à¦¾ à§§à¦® à¦•à¦¬à§‡ à¦˜à§‹à¦·à¦¨à¦¾ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§« à¦«à§‡à¦¬à§à¦°à§à¦¯à¦¼à¦¾à¦°à§€ à§§à§¯à§¬à§¬<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¬à¦¿à¦°à§‹à¦§à§€à¦¦à¦²à§‡à¦° à¦¸à¦®à§à¦®à§‡à¦²à¦¨à§‡ à¦®à§à¦œà¦¿à¦¬ à¦•à¦¬à§‡ à¦›à¦¯à¦¼à¦¦à¦«à¦¾ à¦‰à¦¤à§à¦¥à¦¾à¦ªà¦¨ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§© à¦«à§‡à¦¬à§à¦°à§à¦¯à¦¼à¦¾à¦°à§€ à§§à§¯à§¬à§¬<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬ à¦†à¦¨à§à¦·à§à¦ à¦¾à¦¨à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦•à¦¬à§‡ à¦›à¦¯à¦¼à¦¦à¦«à¦¾ à¦˜à§‹à¦·à¦¨à¦¾ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§© à¦®à¦¾à¦°à§à¦š à§§à§¯à§¬à§¬<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦›à¦¯à¦¼à¦¦à¦«à¦¾à¦° à¦ªà§à¦°à¦¥à¦® à¦¦à¦«à¦¾ à¦•à¦¿ à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¸à§à¦¬à¦¾à¦¯à¦¼à¦¤à§à¦¬à¦¶à¦¾à¦¸à¦¨<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ &lsquo;à¦¬à¦¾à¦™à§à¦—à¦¾à¦²à§€ à¦œà¦¾à¦¤à¦¿à¦° à¦®à§à¦•à§à¦¤à¦¿à¦° à¦¸à¦¨à¦¦&rsquo; à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤ à¦•à§‹à¦¨à¦Ÿà¦¿?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦›à¦¯à¦¼à¦¦à¦«à¦¾<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦ªà§‚à¦°à§à¦¬ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¥à¦¾à¦¨à§‡à¦° à¦¨à¦¾à¦®à¦•à¦°à¦£ &ldquo;à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶&rdquo; à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦•à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§« à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦° à§§à§¯à§¬à§¯ à¦¸à¦¾à¦²à§‡<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦•à§‡ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¨à¦¾à¦®à¦•à¦°à¦¨ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨à¦•à§‡ &lsquo;à¦œà¦¾à¦¤à¦¿à¦° à¦œà¦¨à¦•&rsquo; à¦˜à§‹à¦·à¦¨à¦¾ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦•à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§© à¦®à¦¾à¦°à§à¦š à§§à§¯à§­à§§<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦•à§‡ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à¦•à§‡ à¦œà¦¾à¦¤à¦¿à¦° à¦œà¦¨à¦• à¦˜à§‹à¦·à¦¨à¦¾ à¦•à¦°à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦†.à¦¸.à¦®. à¦†à¦¬à§à¦¦à§à¦° à¦°à¦¬<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬ à¦•à§‡ à¦œà¦¾à¦¤à¦¿à¦° à¦œà¦¨à¦• à¦˜à§‹à¦·à¦¨à¦¾ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦•à§‹à¦¥à¦¾à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦ªà¦²à§à¦Ÿà¦¨ à¦®à¦¯à¦¼à¦¦à¦¾à¦¨à§‡<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦†à¦—à¦°à¦¤à¦²à¦¾ à¦·à¦¡à¦¼à¦¯à¦¨à§à¦¤à§à¦° à¦®à¦¾à¦®à¦²à¦¾ à¦¦à¦¾à¦¯à¦¼à§‡à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦•à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§© à¦œà¦¾à¦¨à§à¦¯à¦¼à¦¾à¦°à§€ à§§à§¯à§¬à§®<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦†à¦—à¦°à¦¤à¦²à¦¾ à¦·à¦¡à¦¼à¦¯à¦¨à§à¦¤à§à¦° à¦®à¦¾à¦®à¦²à¦¾ à¦•à§€ à¦¨à¦¾à¦®à§‡ à¦¦à¦¾à¦¯à¦¼à§‡à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à§‡à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à¦¦à§à¦°à§‹à¦¹à§€à¦¤à¦¾ à¦¬à¦¨à¦¾à¦® à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬ à¦“ à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦†à¦—à¦°à¦¤à¦²à¦¾ à¦®à¦¾à¦®à¦²à¦¾à¦° à¦®à§‹à¦Ÿ à¦†à¦¸à¦¾à¦®à§€ à¦•à¦¤à¦œà¦¨ à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§©à§« à¦œà¦¨ (à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬ à¦¸à¦¹)<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦†à¦—à¦°à¦¤à¦²à¦¾ à¦·à¦¡à¦¼à¦¯à¦¨à§à¦¤à§à¦° à¦®à¦¾à¦®à¦²à¦¾à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦†à¦¸à¦¾à¦®à§€ à¦•à§‡ à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ à¦†à¦—à¦°à¦¤à¦²à¦¾ à¦·à¦¡à¦¼à¦¯à¦¨à§à¦¤à§à¦° à¦®à¦¾à¦®à¦²à¦¾ à¦•à¦¿ à¦¨à¦¾à¦®à§‡ à¦¦à¦¾à¦¯à¦¼à§‡à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à§‡à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦°à¦¾à¦·à§à¦Ÿà§à¦° à¦¬à¦¨à¦¾à¦® à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨ à¦“ à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯à¥¤<br><br>à¦ªà§à¦°à¦¶à§à¦¨à¦ƒ &lsquo;à¦…à¦¸à¦®à¦¾à¦ªà§à¦¤ à¦†à¦¤à§à¦®à¦œà§€à¦¬à¦¨à§€&rsquo; à¦¬à¦‡à¦Ÿà¦¿à¦° à¦²à§‡à¦–à¦•à§‡à¦° à¦¨à¦¾à¦® à¦•à§€?<br>à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¬à¦™à§à¦—à¦¬à¦¨à§à¦§à§ à¦¶à§‡à¦– à¦®à§à¦œà¦¿à¦¬à§à¦° à¦°à¦¹à¦®à¦¾à¦¨à¥¤ </p>', 2, 1, 'Public', '2018-12-05 15:15:16', '2018-12-06 17:29:52'),
(23, 6, 'à¦à¦• à¦¨à¦œà¦°à§‡ à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾ ', '<p>â˜…à¦¸à§à¦¬à¦°à¦¬à¦°à§à¦£ - à§§à§§ à¦Ÿà¦¿<br>â˜… à¦¬à§à¦¯à¦žà§à¦œà¦£à¦¬à¦°à§à¦£ --- à§©à§¯ à¦Ÿà¦¿<br>â˜… à¦®à§Œà¦²à¦¿à¦• à¦¸à§à¦¬à¦°à¦§à§à¦¬à¦£à¦¿--- à§­ à¦Ÿà¦¿<br>â˜… à¦¯à§Œà¦—à¦¿à¦• à¦¸à§à¦¬à¦°à¦§à§à¦¬à¦£à¦¿ ---- à§¨ à¦Ÿà¦¿<br>â˜… à¦¯à§Œà¦—à¦¿à¦• à¦¸à§à¦¬à¦°à¦œà§à¦žà§à¦¯à¦¾à¦ªà¦• à¦¬à¦°à§à¦£ --- à§¨à§« à¦Ÿà¦¿<br>â˜… à¦¹à§à¦°à¦¸à§à¦¬à¦° à¦§à§à¦¬à¦£à¦¿ ----- à§ª à¦Ÿà¦¿<br>â˜… à¦¦à§€à¦°à§à¦˜à¦¸à§à¦¬à¦° à¦¸à§à¦¬à¦°à¦§à§à¦¬à¦£à¦¿------ à§­ à¦Ÿà¦¿<br>â˜… à¦®à¦¾à¦¤à§à¦°à¦¾à¦¹à§€à¦¨ à¦¬à¦°à§à¦£ ------ à§§à§¦ à¦Ÿà¦¿<br>â˜… à¦…à¦°à§à¦§à¦®à¦¾à¦¤à§à¦°à¦¾ à¦¬à¦°à§à¦£ ------ à§® à¦Ÿà¦¿<br>â˜… à¦ªà§‚à¦°à§à¦£à¦®à¦¾à¦¤à§à¦°à¦¾ à¦¬à¦°à§à¦£ ---- à§©à§¨ à¦Ÿà¦¿<br>â˜… à¦•à¦¾à¦° à¦šà¦¿à¦¹à§à¦¨ -------- à§§à§¦ à¦Ÿà¦¿<br>â˜… à¦«à¦²à¦¾ ------ à§« à¦Ÿà¦¿<br>â˜… à¦¸à§à¦ªà¦°à§à¦¶ à¦¬à¦°à§à¦£ ---- à§¨à§« à¦Ÿ<br>à¦à¦• à¦¨à¦œà¦°à§‡ à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦° à¦¸à¦¬à¦•à¦¿à¦›à§à¦ƒ<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦®à§‹à¦Ÿ à¦¬à¦°à§à¦£ à¦†à¦›à§‡ à§«à§¦à¦Ÿà¦¿à¥¤(à¦¸à§à¦¬à¦°à¦¬à¦°à§à¦£ à§§à§§à¦Ÿà¦¿ + à¦¬à§à¦¯à¦žà§à¦œà¦£à¦¬à¦°à§à¦£ à§©à§¯à¦Ÿà¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦®à§‹à¦Ÿ à¦¸à§à¦¬à¦°à¦¬à¦°à§à¦£ à§§à§§à¦Ÿà¦¿(à¦¹à§à¦°à¦¸à§à¦¬ à¦¸à§à¦¬à¦° à§ªà¦Ÿà¦¿ + à¦¦à§€à¦°à§à¦˜ à¦¸à§à¦¬à¦° à§­à¦Ÿà¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦®à§‹à¦Ÿ à¦¬à§à¦¯à¦žà§à¦œà¦£à¦¬à¦°à§à¦£ à§©à§¯à¦Ÿà¦¿(à¦ªà§à¦°à¦•à§ƒà¦¤ à§©à§«à¦Ÿà¦¿ + à¦…à¦ªà§à¦°à¦•à§ƒà¦¤ à§ª à¦Ÿà¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦ªà§‚à¦°à§à¦£à¦®à¦¾à¦¤à§à¦°à¦¾à¦¯à§à¦•à§à¦¤à¦¬à¦°à§à¦£ à¦†à¦›à§‡ à§©à§¨à¦Ÿà¦¿ (à¦¸à§à¦¬à¦°à¦¬à¦°à§à¦£ à§¬à¦Ÿà¦¿ + à¦¬à§à¦¯à¦žà§à¦œà¦£à¦¬à¦°à§à¦£ à§¨à§¬à¦Ÿà¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦…à¦°à§à¦§à¦®à¦¾à¦¤à§à¦°à¦¾à¦¯à§à¦•à§à¦¤à¦¬à¦°à§à¦£ à¦†à¦›à§‡ à§®à¦Ÿà¦¿ (à¦¸à§à¦¬à¦°à¦¬à¦°à§à¦£ à§§à¦Ÿà¦¿ + à¦¬à§à¦¯à¦žà§à¦œà¦£à¦¬à¦°à§à¦£ à§­à¦Ÿà¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦®à¦¾à¦¤à§à¦°à¦¾à¦¹à§€à¦¨ à¦¬à¦°à§à¦£à¦†à¦›à§‡ à§§à§¦à¦Ÿà¦¿ ( à¦¬à§à¦¯à¦žà§à¦œà¦£à¦¬à¦°à§à¦£ à§¬à¦Ÿà¦¿ + à¦¸à§à¦¬à¦°à¦¬à¦°à§à¦£à§ªà¦Ÿà¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦•à¦¾à¦° à¦†à¦›à§‡ à¦à¦®à¦¨ à¦¸à§à¦¬à¦°à¦¬à¦°à§à¦£ à§§à§¦à¦Ÿà¦¿ (&ldquo;à¦…&rdquo; à¦›à¦¾à¦¡à¦¼à¦¾)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦«à¦²à¦¾ à¦†à¦›à§‡ à¦à¦®à¦¨ à¦¬à§à¦¯à¦žà§à¦œà¦£à¦¬à¦°à§à¦£ à§«à¦Ÿà¦¿ (à¦®, à¦¨, à¦¬,à¦¯, à¦°) { à¦¸à§Œà¦®à¦¿à¦¤à§à¦° à¦¶à§‡à¦–à¦°à§‡à¦° à¦¬à¦‡ à¦¯à§‡ à§¬à¦Ÿà¦¿ à¥¤ à¦¯à§‡à¦®à¦¨: à¦¨, à¦®, à¦¯, à¦° à¦², à¦¬<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¸à§à¦ªà¦°à§à¦¶à¦§à§à¦¬à¦¨à¦¿/à¦¬à¦°à§à¦—à§€à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡ à§¨à§«à¦Ÿà¦¿ (à¦• à¦¥à§‡à¦•à§‡ à¦® à¦ªà¦°à§à¦¯à¦¨à§à¦¤)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦•à¦¨à§à¦ / à¦œà¦¿à¦¹à¦¬à¦¾à¦®à§‚à¦²à§€à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡ à§«à¦Ÿà¦¿ (&ldquo;à¦•&rdquo; à¦¬à¦°à§à¦—à§€à¦¯à¦¼à¦§à§à¦¬à¦¨à¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¤à¦¾à¦²à¦¬à§à¦¯ à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡à§®à¦Ÿà¦¿ (&ldquo;à¦š&rdquo; à¦¬à¦°à§à¦—à§€à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿ + à¦¶,à¦¯, à¦¯à¦¼)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦®à§‚à¦°à§à¦§à¦¨à§à¦¯/à¦ªà¦¶à§à¦šà¦¾ à§Žà¦¦à¦¨à§à¦¤à¦®à§‚à¦²à§€à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡ à§¯à¦Ÿà¦¿ (&ldquo;à¦Ÿ&rdquo; à¦¬à¦°à§à¦—à§€à¦¯à¦¼à¦§à§à¦¬à¦¨à¦¿ + à¦·, à¦°, à¦¡à¦¼, à¦¢à¦¼)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¦à¦¨à§à¦¤à§à¦¯ à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡à§­à¦Ÿà¦¿ (&ldquo;à¦¤&rdquo; à¦¬à¦°à§à¦—à§€à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿ + à¦¸,à¦²)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦“à¦·à§à¦ à§à¦¯ à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡à§«à¦Ÿà¦¿ (&ldquo;à¦ª&rdquo; à¦¬à¦°à§à¦—à§€à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦…à¦˜à§‹à¦· à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡à§§à§ªà¦Ÿà¦¿ (à¦ªà§à¦°à¦¤à¦¿ à¦¬à¦°à§à¦—à§‡à¦° à§§à¦® à¦“ à§¨à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿ + à¦ƒ, à¦¶, à¦·, à¦¸)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦˜à§‹à¦· à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡à§§à§§à¦Ÿà¦¿ (à¦ªà§à¦°à¦¤à¦¿ à¦¬à¦°à§à¦—à§‡à¦° à§©à¦¯à¦¼ à¦“ à§ªà¦°à§à¦¥ à¦§à§à¦¬à¦¨à¦¿ + à¦¹)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦…à¦²à§à¦ªà¦ªà§à¦°à¦¾à¦£ à¦§à§à¦¬à¦¨à¦¿à¦†à¦›à§‡ à§§à§©à¦Ÿà¦¿ (à¦ªà§à¦°à¦¤à¦¿ à¦¬à¦°à§à¦—à§‡à¦° à§§à¦® à¦“ à§©à¦¯à¦¼ à¦§à§à¦¬à¦¨à¦¿ + à¦¶, à¦·, à¦¸)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦®à¦¹à¦¾à¦ªà§à¦°à¦¾à¦£ à¦§à§à¦¬à¦¨à¦¿à¦†à¦›à§‡ à§§à§§à¦Ÿà¦¿ (à¦ªà§à¦°à¦¤à¦¿ à¦¬à¦°à§à¦—à§‡à¦° à§¨à¦¯à¦¼ à¦“ à§ªà¦°à§à¦¥ à¦§à§à¦¬à¦¨à¦¿ + à¦¹)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¨à¦¾à¦¸à¦¿à¦•à§à¦¯/<br>à¦…à¦¨à§à¦¨à¦¾à¦¸à¦¿à¦•à¦§à§à¦¬à¦¨à¦¿ à¦†à¦›à§‡ à§®à¦Ÿà¦¿ (à¦ªà§à¦°à¦¤à¦¿ à¦¬à¦°à§à¦—à§‡à¦° à§«à¦® à¦§à§à¦¬à¦¨à¦¿ + à¦‚, à§º, à¦“)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦‰à¦·à§à¦®/à¦¶à¦¿à¦· à¦§à§à¦¬à¦¨à¦¿à§ªà¦Ÿà¦¿ (à¦¶, à¦·, à¦¸, à¦¹)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦…à¦¨à§à¦¤à¦ƒà¦¸à§à¦¥ à¦§à§à¦¬à¦¨à¦¿à§ªà¦Ÿà¦¿ (à¦¬, à¦¯, à¦°, à¦²)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦ªà¦¾à¦°à§à¦¶à§à¦¬à¦¿à¦• à¦§à§à¦¬à¦¨à¦¿à§§à¦Ÿà¦¿ (à¦²)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦•à¦®à§à¦ªà¦¨à¦œà¦¾à¦¤ à¦§à§à¦¬à¦¨à¦¿à§§à¦Ÿà¦¿ (à¦°)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¤à¦¾à¦¡à¦¼à¦¨à¦œà¦¾à¦¤ à¦§à§à¦¬à¦¨à¦¿à§§à¦Ÿà¦¿ (à¦¡à¦¼, à¦¢à¦¼)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦ªà¦°à¦¾à¦¶à§à¦°à¦¯à¦¼à§€ à¦§à§à¦¬à¦¨à¦¿à§©à¦Ÿà¦¿ (à¦‚, à¦ƒ, à§º)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦…à¦¯à§‹à¦—à¦¬à¦¾à¦¹ à¦§à§à¦¬à¦¨à¦¿à§¨à¦Ÿà¦¿ (à¦‚, à¦ƒ)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¯à§Œà¦—à¦¿à¦• à¦¸à§à¦¬à¦°à¦œà§à¦žà¦¾à¦ªà¦•à¦§à§à¦¬à¦¨à¦¿ à§¨à¦Ÿà¦¿ (à¦, à¦”)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦–à¦¨à§à¦¡à¦¬à§à¦¯à¦žà§à¦œà¦£à¦§à§à¦¬à¦¨à¦¿ à§§à¦Ÿà¦¿ (à§Ž)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¨à¦¿à¦²à§€à¦¨ à¦§à§à¦¬à¦¨à¦¿ à§§à¦Ÿà¦¿(à¦…)<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦¹à¦¸à¦¨à§à¦¤/à¦¹à¦²à¦¨à§à¦¤ à¦¬à¦°à§à¦£à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ à¦•à§, à¦–à§, à¦—à§ à¦à¦§à¦°à¦£à§‡à¦° à¦¬à¦°à§à¦£à¦•à§‡<br># à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à¦°à§à¦£à¦®à¦¾à¦²à¦¾à¦¯à¦¼ à¦…à¦°à§à¦§à¦¸à§à¦¬à¦° à§¨à¦Ÿà¦¿ (à¦¯,à¦¬) </p>', 1, 1, 'Public', '2018-12-06 15:34:27', '2018-12-06 17:31:01'),
(24, 3, ' à¦ªà§à¦°à¦¥à¦® à¦“ à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§', '<p style=\"text-align: justify;\">à¦ªà§à¦°à¦¥à¦® à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§à§‡à¦° à¦•à¦¾à¦°à¦£ à¦•à§€?<br>à¦ªà§à¦°à¦¥à¦® à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§à§‡à¦° à¦¸à¦®à¦¯à¦¼ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦šà§à¦¯à¦¾à¦¨à§à¦¸à§‡à¦²à¦° à¦•à§‡ à¦›à¦¿à¦²à§‡à¦¨?<br>à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦­à¦¾à¦°à§à¦¸à¦¾à¦‡ à¦šà§à¦•à§à¦¤à¦¿ à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦¹à¦¯à¦¼?<br>à¦Ÿà§à¦°à¦¿à¦Ÿà¦¿ à¦…à¦¬ à¦ªà¦¿à¦¸ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ à¦•à§‹à¦¨ à¦šà§à¦•à§à¦¤à¦¿à¦•à§‡?&nbsp;<br>à¦œà¦¾à¦¤à¦¿à¦ªà§à¦žà§à¦œà§‡à¦° à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¤à¦¾ à¦¦à§‡à¦¶ à¦•à§‹à¦¨à¦Ÿà¦¿?<br>à¦¹à¦¿à¦Ÿà¦²à¦¾à¦° à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦•à§à¦·à¦®à¦¤à¦¾à¦¯à¦¼ à¦†à¦°à§‹à¦¹à¦£ à¦•à¦°à§‡à¦¨?<br>à¦—à§‡à¦¸à§à¦Ÿà¦¾à¦ªà§‹ à¦•à§€?<br>à¦¹à¦¿à¦Ÿà¦²à¦¾à¦° à¦•à§‡à¦¨ à¦‡à¦¹à§à¦¦à§€ à¦¬à¦¿à¦¦à§à¦¬à§‡à¦·à§€ à¦¹à¦¯à¦¼à§‡ à¦‰à¦ à¦²à§‡à¦¨?<br>à¦œà¦¾à¦ªà¦¾à¦¨à§‡à¦° à¦ªà¦¾à¦°à§à¦² à¦¹à¦¾à¦°à¦¬à¦¾à¦° à¦†à¦•à§à¦°à¦®à¦£ à¦•à¦°à¦¾à¦° à¦•à¦¾à¦°à¦£ à¦•à§€?<br>à¦¨à§‚à¦°à§‡à¦®à¦¬à¦¾à¦°à§à¦— à¦Ÿà§à¦°à¦¾à¦¯à¦¼à¦¾à¦² à¦•à§€?&nbsp;<br>à¦œà§‡à¦¨à§‡à¦­à¦¾ à¦•à¦¨à¦­à§‡à¦¨à¦¶à¦¨ à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦¹à¦¯à¦¼?<br>à¦œà§‡à¦¨à§‡à¦­à¦¾ à¦•à¦¨à¦­à§‡à¦¨à¦¶à¦¨à§‡à¦° à¦¬à¦¿à¦·à¦¯à¦¼ à¦¬à¦¸à§à¦¤à§ à¦•à§€?<br>à¦†à¦¨à¦¾ à¦«à§à¦°à¦¾à¦™à§à¦•à§‡à¦° à¦¡à¦¾à¦¯à¦¼à§‡à¦°à¦¿ à¦•à§€?<br>à¦«à§à¦°à¦¾à¦¨à§à¦¸à§‡à¦° à¦¨à¦°à¦®à¦¾à¦¨à§à¦¡à¦¿ à¦¶à¦¹à¦°à§‡ à¦®à¦¿à¦¤à§à¦° à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦…à¦¬à¦¤à¦°à¦£à¦•à§‡ à¦•à§€ à¦¬à¦²à§‡?<br>à¦®à¦¾à¦°à§à¦¶à¦¾à¦² à¦ªà§à¦²à§à¦¯à¦¾à¦¨ à¦“ à¦®à¦²à§‹à¦Ÿà¦­ à¦ªà§à¦²à§à¦¯à¦¾à¦¨ à¦•à§€?<br>à¦¯à§à¦¦à§à¦§à§ à¦¬à¦¿à¦¦à§à¦§à¦¸à§à¦¤ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦†à¦°à§à¦¥ à¦¸à¦¾à¦®à¦¾à¦œà¦¿à¦• à¦‰à¦¨à§à¦¨à¦¯à¦¼à¦¨à§‡ à¦®à§à¦–à§‹à¦®à§à¦–à¦¿ à¦¦à§à¦‡ à¦¦à§‡à¦¶ à¦“ à¦¦à§à¦Ÿà¦¿ à¦†à¦¦à¦°à§à¦¶ à¦•à§€?<br>à¦ªà§à¦œà¦¿à¦¬à¦¾à¦¦ à¦à¦¬à¦‚ à¦¸à¦¾à¦®à§à¦¯à¦¬à¦¾à¦¦ à¦§à¦¾à¦°à¦£à¦¾ à¦¦à§à¦Ÿà¦¿ à¦¦à§à¦­à¦¾à¦¬à§‡ à¦…à¦°à§à¦¥à¦¨à§ˆà¦¤à¦¿à¦• à¦‰à¦¨à§à¦¨à¦¯à¦¼à¦¨à§‡à¦° à¦•à¦¥à¦¾ à¦¬à¦²à¦²à§‡à¦“ à¦ªà§ƒà¦¥à¦¿à¦¬à§€ à¦¬à§à¦¯à¦¾à¦ªà§€ à¦à¦• à¦§à¦°à¦£à§‡à¦° à¦¯à§à¦¦à§à¦§ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡à¦›à¦¿à¦² à¦¤à¦¾à¦° à¦¨à¦¾à¦® à¦•à§€?<br>à¦ªà§à¦°à¦¿à¦²à¦¿ à¦¶à§à¦§à§ à¦ªà§à¦°à¦¿à¦²à¦¿ à¦¨à¦¯à¦¼,à¦°à¦¿à¦Ÿà§‡à¦¨ à¦“ à¦­à¦¾à¦‡à¦­à¦¾à¦° à¦­à¦¿à¦¤à§à¦¤à¦¿à¥¤<br>à¦ªà§à¦°à¦¾à¦¸à¦™à§à¦—à¦¿à¦• à¦à¦®à¦¨ à¦…à¦¨à§‡à¦• à¦ªà§à¦°à¦¶à§à¦¨à§‡à¦° à¦‰à¦¤à§à¦¤à¦° à¦ªà¦¾à¦“à¦¯à¦¼à¦¾ à¦¯à¦¾à¦¬à§‡ à¦•à¦¯à¦¼à§‡à¦•à¦Ÿà¦¿ à¦¬à¦¿à¦·à¦¯à¦¼ à¦¨à¦¿à¦¯à¦¼à§‡ à¦à¦•à¦Ÿà§ à¦­à¦¾à¦¬à¦²à§‡à¥¤<br><br><strong>à¦ªà§à¦°à¦¥à¦® à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§à¦ƒ</strong><br>à¦ªà§à¦°à¦¥à¦® à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§ à¦†à¦¸à¦²à§‡ à¦¹à¦¯à¦¼à§‡à¦›à¦¿à¦²à§‹ à¦«à§à¦šà¦•à¦¾à¦° à¦¦à§‹à¦•à¦¾à¦¨ à¦¨à¦¿à¦¯à¦¼à§‡à¥¤ <span class=\"fr-emoticon fr-deletable fr-emoticon-img\" style=\"background: url(https://cdnjs.cloudflare.com/ajax/libs/emojione/2.0.1/assets/svg/1f61c.svg);\">&nbsp;</span>&nbsp; à¦¬à¦¿à¦¶à§à¦¬à¦¾à¦¸ à¦¹à¦šà§à¦›à§‡ à¦¨à¦¾à¦¤à§‹? à¦†à¦šà§à¦›à¦¾ à¦¦à§‡à¦–à¦¾ à¦¯à¦¾à¦• à¦¬à¦¿à¦·à¦¯à¦¼à¦Ÿà¦¾à¥¤à¦®à¦¨à§‡ à¦•à¦°à¦¾ à¦¯à¦¾à¦• à¦¢à¦¾à¦•à¦¾ à¦•à¦²à§‡à¦œà§‡à¦° à¦•à¦¯à¦¼à§‡à¦•à¦Ÿà¦¾ à¦›à§‡à¦²à§‡ à¦®à¦¿à¦²à§‡ à¦‡à¦¡à§‡à¦¨ à¦•à¦²à§‡à¦œà§‡à¦° à¦¸à¦¾à¦®à¦¨à§‡ à¦à¦•à¦Ÿà¦¾ à¦«à§à¦šà¦•à¦¾à¦° à¦¦à§‹à¦•à¦¾à¦¨ à¦¦à¦¿à¦²,à¦•à§‡à¦®à¦¨ à¦šà¦²à¦¬à§‡? à¦¹à§à¦® à¦–à§à¦¬à¥¤<br>à¦¤à¦¾à¦¹à¦²à§‡ à¦–à§à¦¬ à¦¬à§‡à¦šà¦¾à¦•à§‡à¦¨à¦¾ à¦¹à¦šà§à¦›à§‡ à¦•à¦¿à¦¨à§à¦¤à§à¥¤ à¦•à¦¿à¦›à§à¦¦à¦¿à¦¨ à¦ªà¦° à¦‡à¦¡à§‡à¦¨ à¦•à¦²à§‡à¦œà§‡à¦° à¦à¦•à¦Ÿà¦¾ à¦®à§‡à¦¯à¦¼à§‡à¦° à¦®à¦¾à¦¥à¦¾à¦¯à¦¼ à¦šà¦¿à¦¨à§à¦¤à¦¾ à¦–à§‡à¦²à¦², &zwnj;&zwnj;à¦†à¦®à¦¾à¦¦à§‡à¦° à¦•à¦²à§‡à¦œà§‡à¦° à¦¸à¦¾à¦®à¦¨à§‡ à¦à¦°à¦¾ à¦•à§‡à¦¨ à¦«à§à¦šà¦•à¦¾ à¦¬à¦¿à¦•à§à¦°à¦¿ à¦•à¦°à¦¬à§‡?à¦†à¦®à¦°à¦¾à¦“ à¦•à¦°à¦¬à¥¤ à¦¤à¦¾à¦°à¦¾à¦“ à¦à¦•à¦Ÿà¦¾ à¦¦à§‹à¦•à¦¾à¦¨ à¦¦à¦¿à¦¤à§‡ à¦ªà§à¦°à¦¸à§à¦¤à§à¦¤ à¦¹à¦²à§‹à¥¤<br>à¦à¦¦à¦¿à¦•à§‡ à¦¢à¦¾à¦•à¦¾ à¦•à¦²à§‡à¦œà§‡à¦° à¦­à¦¾à¦‡à¦¯à¦¼à§‡à¦°à¦¾ à¦¤à§‹ à¦¦à§‹à¦•à¦¾à¦¨ à¦¦à¦¿à¦¤à§‡à¦‡ à¦¦à§‡à¦¬à§‡ à¦¨à¦¾ à¦®à§‡à¦¯à¦¼à§‡à¦¦à§‡à¦°à¥¤ à¦¶à§à¦°à§ à¦¹à¦²à§‹ à¦¦à§à¦¬à¦¨à§à¦¦à§à¦¬à¥¤ à¦¢à¦¾à¦•à¦¾ à¦•à¦²à§‡à¦œ à¦•à¦¿à¦›à§ à¦¬à¦¨à§à¦§à§ à¦¡à§‡à¦•à§‡ à¦¨à¦¿à¦¯à¦¼à§‡ à¦†à¦¸à¦²à§‹ à¦¤à¦¿à¦¤à§à¦®à§€à¦° à¦•à¦²à§‡à¦œ à¦¥à§‡à¦•à§‡à¥¤ à¦‡à¦¡à§‡à¦¨ à¦•à¦¿à¦›à§ à¦¬à¦¾à¦¨à§à¦§à¦¬à§€ à¦¡à§‡à¦•à§‡ à¦¨à¦¿à¦¯à¦¼à§‡ à¦†à¦¸à¦²à§‹ à¦¬à¦¦à¦°à§à¦¨à§à¦¨à§‡à¦¸à¦¾ à¦¥à§‡à¦•à§‡à¥¤ à¦à¦® à¦®à¦§à§à¦¯à§‡ à¦¹à¦¾à¦¤à¦¾à¦¹à¦¾à¦¤à¦¿à¦¤à§‡ à¦¢à¦¾à¦•à¦¾ à¦•à¦²à§‡à¦œà§‡à¦° à¦à¦• à¦›à¦¾à¦¤à§à¦° à¦«à¦¾à¦¨à§à¦¡à¦¿à¦²à§à¦¯à¦¾à¦¨à§à¦¡ à¦®à¦¾à¦°à¦¾ à¦ªà¦°à§‡ à¦—à§‡à¦²à§‹à¥¤ à¦¶à§à¦°à§ à¦¹à¦²à§‹ à¦¯à§à¦¦à§à¦§à¥¤ à¦¦à§‡à¦–à§à¦¨,<br>à§§à§­à§¬à§¦ à¦¸à¦¾à¦² à¦¥à§‡à¦•à§‡ à¦‡à¦‰à¦°à§‹à¦ªà§‡ à¦¬à¦¿à¦¶à§‡à¦· à¦•à¦°à§‡ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡ à¦¶à¦¿à¦²à§à¦ª à¦¬à¦¿à¦ªà§à¦²à¦¬ à¦¶à§à¦°à§ à¦¹à¦¯à¦¼à¥¤ à¦¶à¦¿à¦²à§à¦ª à¦¬à¦¿à¦ªà§à¦²à¦¬ à¦®à¦¾à¦¨à§‡ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦‰à§Žà¦ªà¦¾à¦¦à¦¨à¦®à§‚à¦–à§€ à¦¯à¦¨à§à¦¤à§à¦°à¦ªà¦¾à¦¤à¦¿ à¦‰à¦¦à§à¦­à¦¾à¦¬à¦¨ à¦“ à¦¤à¦¾ à¦¦à¦¿à¦¯à¦¼à§‡ à¦ªà§à¦°à¦šà§à¦° à¦ªà¦£à§à¦¯ à¦¦à§à¦°à¦¬à§à¦¯ à¦‰à§Žà¦ªà¦¾à¦¦à¦¨à¥¤ à¦¯à§‡à¦¹à§‡à¦¤à§ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡ à¦¬à§‡à¦¶ à¦†à¦—à§‡ à¦¥à§‡à¦•à§‡à¦‡ à¦­à¦¾à¦°à¦¤ à¦‰à¦ªà¦®à¦¹à¦¾à¦¦à§‡à¦¶ à¦“ à¦à¦¶à¦¿à¦¯à¦¼à¦¾à¦° à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¸à§à¦¥à¦¾à¦¨à§‡ à¦…à¦¨à§‡à¦• à¦•à¦²à§‹à¦¨à¦¿ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾ à¦•à¦°à§‡à¦›à¦¿à¦² à¦¤à¦¾à¦‡ à¦¤à¦¾à¦¦à§‡à¦° à¦‰à§Žà¦ªà¦¾à¦¦à¦¿à¦¤ à¦ªà¦£à§à¦¯à§‡à¦° à¦¬à¦¾à¦œà¦¾à¦° à¦›à¦¿à¦² à¦…à¦¨à§‡à¦•à¥¤ à¦¬à§‡à¦šà¦¾ à¦¬à¦¿à¦•à§à¦°à¦¿à¦¤à§‡ à¦•à§‹à¦¨ à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦¹à¦¤à§‹ à¦¨à¦¾à¥¤ à¦•à¦¾à¦à¦šà¦¾ à¦®à¦¾à¦²à¦“ à¦“à¦‡à¦¸à¦¬ à¦œà¦¾à¦¯à¦¼à¦—à¦¾ à¦¥à§‡à¦•à§‡à¦‡ à¦†à¦¸à¦¤à§‹à¥¤ à§§à§®à§«à§¦ à¦¸à¦¾à¦²à§‡à¦° à¦ªà¦° à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦¤à§‡à¦“ à¦¶à¦¿à¦²à§à¦ª à¦¬à¦¿à¦ªà§à¦²à¦¬à§‡à¦° à¦›à§‹à¦à¦¯à¦¼à¦¾ à¦²à¦¾à¦—à§‡à¥¤ à¦¤à¦¾à¦°à¦¾à¦“ à¦¨à¦¾à¦¨à¦¾ à¦ªà¦£à§à¦¯ à¦‰à§Žà¦ªà¦¾à¦¦à¦¨ à¦•à¦°à§‡ à¦à¦¬à¦‚ à¦¬à¦¿à¦¶à§à¦¬ à¦¬à¦¾à¦œà¦¾à¦°à§‡ à¦¬à¦¿à¦•à§à¦°à¦¿ à¦•à¦°à¦¤à§‡ à¦šà¦¾à¦¯à¦¼à¥¤à¦•à¦¿à¦¨à§à¦¤ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡ à¦†à¦° à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾ à¦¤à¦¾à¦•à§‡ à¦¸à§‡ à¦¸à§à¦¯à§‹à¦— à¦¦à¦¿à¦¤à§‡ à¦šà¦¾à¦¯à¦¼ à¦¨à¦¾à¥¤ à¦à¦¦à¦¿à¦•à§‡ à§§à§®à§­à§§ à¦¸à¦¾à¦²à§‡ à¦–à¦¨à§à¦¡ à¦¬à¦¿à¦–à¦¨à§à¦¡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿ à¦à¦•à¦¤à§à¦°à¦¿à¦¤à¦¹à¦¯à¦¼à§‡ à¦¯à¦¾à¦¯à¦¼ à¦¬à¦¿à¦¸à¦®à¦¾à¦°à§à¦•à§‡à¦° à¦¨à§‡à¦¤à§ƒà¦¤à§à¦¬à§‡à¥¤ à¦•à§à¦·à¦®à¦¤à¦¾ à¦¬à§ƒà¦¦à§à¦§à¦¿ à¦›à¦¾à¦¡à¦¼à¦¾ à¦¬à¦¾à¦œà¦¾à¦° à¦§à¦°à¦¾ à¦¯à¦¾à¦¬à§‡ à¦¨à¦¾ à¦à¦Ÿà¦¾ à¦¤à¦¾à¦°à¦¾ à¦¬à§à¦à§‡ à¦«à§‡à¦²à§‡à¥¤ à¦¤à¦¾à¦‡ à¦¨à§Œ à¦•à§à¦·à¦®à¦¤à¦¾ à¦¬à¦¾à¦¡à¦¼à¦¾à¦¨à§‹à¦° à¦ªà§à¦°à¦¤à¦¿à¦¯à§‹à¦—à¦¿à¦¤à¦¾à¦¯à¦¼ à¦¨à§‡à¦®à§‡ à¦ªà¦¡à¦¼à§‡ à¦¤à¦¾à¦°à¦¾à¥¤ à¦à¦¦à¦¿à¦•à§‡ à¦¤à¦–à¦¨ à¦…à¦Ÿà§‹à¦®à¦¾à¦¨ à¦¸à¦®à¦¾à¦œà§à¦¯ à¦¦à§à¦°à§à¦¬à¦² à¦¹à¦¯à¦¼à§‡ à¦ªà¦¡à¦¼à¦¾à¦° à¦•à¦¾à¦°à¦£à§‡ à¦…à¦¸à§à¦Ÿà§à¦°à¦¿à¦¯à¦¼à¦¾-à¦¹à¦¾à¦™à§à¦—à§‡à¦°à¦¿ à¦†à¦° à¦¸à¦¾à¦°à§à¦¬à¦¿à¦¯à¦¼à¦¾-à¦¹à¦¾à¦°à§à¦œà§‡à¦—à§‹à¦­à¦¿à¦¨à¦¾à¦° à¦®à¦§à§à¦¯à§‡ à¦•à¦¿à¦›à§ à¦•à¦¿à¦›à§ à¦à¦²à¦¾à¦•à¦¾ à¦¨à¦¿à¦¯à¦¼à§‡ à¦¦à§à¦¬à¦¨à§à¦¦à§à¦¬ à¦šà¦²à¦›à¦¿à¦²à¥¤ à¦ à¦¿à¦• à¦à¦‡ à¦®à§à¦¹à§‚à¦°à§à¦¤à§‡ à§¨à§® à¦œà§à¦¨ à§§à§¯à§§à§ª à¦…à¦¸à§à¦Ÿà§à¦°à¦¿à¦¯à¦¼à¦¾à¦° à¦¯à§à¦¬à¦°à¦¾à¦œ à¦“ à¦¤à¦¾à¦° à¦¸à§à¦¤à§à¦°à§€ à¦¸à§‹à¦«à¦¿à¦¯à¦¼à¦¾ à¦¸à¦¾à¦°à§à¦¬à¦¿à¦¯à¦¼à¦¾à¦¤ à¦—à¦¿à¦¯à¦¼à§‡ à¦¬à§à¦²à§à¦¯à¦¾à¦• à¦¹à§à¦¯à¦¾à¦¨à§à¦¡ à¦¨à¦¾à¦®à§‡à¦° à¦—à§‹à¦ªà¦¨ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦¹à¦¾à¦¤à§‡ à¦–à§à¦¨ à¦¹à¦¯à¦¼à¥¤ à¦¬à§à¦²à§à¦¯à¦¾à¦• à¦¹à§à¦¯à¦¾à¦¨à§à¦¡ à¦›à¦¿à¦² à¦¸à¦¾à¦°à§à¦¬à¦¿à¦¯à¦¼à¦¾à¦° à¦—à§‹à¦ªà¦¨ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¥¤ à¦¬à§à¦¯à¦¸, à¦¯à§à¦¦à§à¦§ à¦¶à§à¦°à§à¥¤&nbsp;<br>à¦¤à¦¾à¦¹à¦²à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿/à¦ªà§à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾ à¦•à§‹à¦¥à¦¾ à¦¥à§‡à¦•à§‡ à¦†à¦¸à¦²à§‹? à¦…à¦¸à§à¦Ÿà§à¦°à¦¿à¦¯à¦¼à¦¾-à¦¹à¦¾à¦™à§à¦—à§‡à¦°à¦¿à¦° à¦¸à¦¾à¦¥à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦šà§à¦•à§à¦¤à¦¿ à¦›à¦¿à¦² à¦†à¦—à§‡ à¦¥à§‡à¦•à§‡à¦‡à¥¤ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨ à¦šà§à¦¯à¦¾à¦¨à§à¦¸à§‡à¦²à¦° à¦¬à§‡à¦¥à¦®à§à¦¯à¦¾à¦¨ à¦à¦‡ à¦¸à§à¦¯à§‹à¦—à§‡ à¦«à§à¦°à¦¾à¦¨à§à¦¸ à¦†à¦° à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à¦•à§‡ à¦à¦• à¦¹à¦¾à¦¤ à¦¦à§‡à¦–à§‡ à¦¨à¦¿à¦¤à§‡ à¦šà§‡à¦¯à¦¼à§‡à¦›à¦¿à¦²à§‡à¦¨à¥¤<br>à¦†à¦° à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾-à¦«à§à¦°à¦¾à¦¨à§à¦¸ à¦à¦¬à¦‚ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à¦“ à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦šà§à¦•à§à¦¤à¦¿à¦¤à§‡ à¦†à¦¬à¦¦à§à¦§à¥¤ à¦¤à¦¾à¦°à¦¾ à¦†à¦²à¦¾à¦¦à¦¾ à¦¹à¦¯à¦¼à§‡ à¦—à§‡à¦²à§‹ à¦®à¦¿à¦¤à§à¦° à¦à¦¬à¦‚ à¦…à¦•à§à¦· à¦¶à¦•à§à¦¤à¦¿à¦¤à§‡à¥¤ à¦…à¦Ÿà§‹à¦®à¦¾à¦¨ à¦¸à¦®à§à¦°à¦¾à¦œà§à¦¯à§‡à¦° à¦ªà¦¤à¦¨à§‡à¦° à¦¸à¦®à¦¯à¦¼ à¦¸à¦¬à¦¾à¦‡ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¸à§à¦¥à¦¾à¦¨ à¦“ à¦¬à¦¾à¦œà¦¾à¦° à¦¦à¦–à¦² à¦•à¦°à¦¤à§‡ à¦šà§‡à¦¯à¦¼à§‡à¦›à¦¿à¦²à¥¤<br><br>à¦¯à§à¦¦à§à¦§ à¦¶à§‡à¦· à¦¹à¦²à§‹,à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿ à¦¹à¦²à§‹ à¦ªà¦°à¦¾à¦œà¦¿à¦¤à¥¤ à¦¤à¦¾à¦•à§‡ à¦†à¦° à¦¤à¦¾à¦° à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦•à§‡ à§¨à§® à¦œà§à¦¨ à§§à§¯à§§à§¯ à¦¸à¦¾à¦²à§‡ à§¨à¦¯à¦¼ à¦­à¦¾à¦°à§à¦¸à¦¾à¦‡ à¦šà§à¦•à§à¦¤à¦¿à¦¤à§‡ à¦¬à§‡à¦§à§‡ à¦«à§‡à¦²à¦¾ à¦¹à¦²à§‹à¥¤ à¦à¦‡ à¦šà§à¦•à§à¦¤à¦¿à¦° à¦¨à¦¾à¦® &zwnj;à¦Ÿà§à¦°à¦¿à¦Ÿà¦¿ à¦…à¦¬ à¦ªà¦¿à¦¸à¥¤ à¦¶à¦¾à¦¨à§à¦¤à¦¿à¦° à¦šà§à¦•à§à¦¤à¦¿à¥¤ à¦ªà¦²à¦¿à¦Ÿà¦¿à¦•à¦¾à¦² à¦¸à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸à§‡ à¦¶à¦¾à¦¨à§à¦¤à¦¿ à¦¬à¦²à¦¤à§‡ à¦¬à§‹à¦à¦¾à¦¯à¦¼- à¦¯à§à¦¦à§à¦§à§‡à¦° à¦…à¦¨à§à¦ªà¦¸à§à¦¥à¦¿à¦¤à¦¿à¥¤ à¦šà§à¦•à§à¦¤à¦¿à¦¤à§‡ à¦¬à¦²à¦¾ à¦¹à¦²à§‹, à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿ à¦¤à¦¾à¦° à¦…à¦¸à§à¦¤à§à¦° à¦¬à¦¾à¦¡à¦¼à¦¾à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡ à¦¨à¦¾à¥¤ à¦¬à¦²à¦¾ à¦¹à¦²à§‹ à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦¸à¦•à§à¦·à¦®à¦¤à¦¾ à¦¬à¦¾à¦¡à¦¼à¦¾à¦¨à§‹ à¦¯à¦¾à¦¬à§‡ à¦¨à¦¾à¥¤ à¦†à¦° à¦ªà§à¦°à¦¥à¦® à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§ à¦¬à¦¾ à¦—à§à¦°à§‡à¦Ÿ à¦“à¦¯à¦¼à¦¾à¦°à§‡ à¦®à¦¦à¦¦ à¦¦à§‡à¦¯à¦¼à¦¾à¦° à¦•à¦¾à¦°à¦£à§‡ à¦ªà§à¦°à¦¤à¦¿ à¦¬à¦›à¦° à¦à¦•à¦Ÿà¦¿ à¦¨à¦¿à¦°à§à¦¦à¦¿à¦·à§à¦Ÿ à¦ªà¦°à¦¿à¦®à¦¾à¦¨ à¦œà¦°à¦¿à¦®à¦¾à¦¨à¦¾ à¦®à¦¿à¦¤à§à¦° à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦¹à¦¾à¦¤à§‡ à¦¤à§à¦²à§‡ à¦¦à¦¿à¦¤à§‡à¥¤&nbsp;<br><br>à¦‰à¦¡à§à¦°à§‹ à¦‰à¦‡à¦²à¦¸à¦¨ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦° à¦ªà§à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿ à¦à¦¸à§‡ à¦¬à¦²à¦²à§‡à¦¨,à¦à¦­à¦¾à¦¬à§‡ à¦¹à¦¯à¦¼ à¦¨à¦¾à¥¤ à¦¯à§à¦¦à§à¦§ à¦†à¦° à¦•à¦¤à§‹ à¦¦à¦¿à¦¨? à¦à¦‡ à¦¨à§ˆà¦°à¦¾à¦œà§à¦¯ à¦†à¦° à¦•à¦¤à§‹ à¦¦à¦¿à¦¨? à¦à¦¸à§‹ à¦à¦•à¦Ÿà¦¿ à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦• à¦¸à¦‚à¦—à¦ à¦¨ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à¦¿,à¦¨à¦¿à¦œà§‡à¦¦à§‡à¦° à¦•à¦°à¦¿ à¦¶à§ƒà¦™à§à¦–à¦²à¦¾à¦¬à¦¦à§à¦§à¥¤ à¦¸à¦¬à¦¾à¦‡ à¦¬à¦²à¦²,à¦¬à¦¾à¦¹ à¦¬à§‡à¦¶à¦¬à§‡à¦¶à¥¤ à¦¤à§ˆà¦°à¦¿ à¦¹à¦²à§‹ à¦œà¦¾à¦¤à¦¿à¦ªà§à¦žà§à¦œ,à¦²à§‡à¦–à¦¾ à¦¹à¦²à§‹ à¦à¦° à¦¨à¦¿à¦¯à¦¼à¦® à¦•à¦¾à¦¨à§à¦¨à¥¤ à¦•à§‡à¦‰ à¦à¦–à¦¨ à¦¥à§‡à¦•à§‡ à¦•à¦¾à¦‰à¦•à§‡ à¦à¦‡ à¦¸à¦‚à¦—à¦ à¦¨à§‡à¦° à¦…à¦¨à§à¦®à¦¤à¦¿ à¦›à¦¾à¦¡à¦¼à¦¾ à¦†à¦•à§à¦°à¦®à¦£ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡ à¦¨à¦¾à¥¤ à¦¯à¦¤à§‹ à¦°à¦¾à¦—à¦‡ à¦¹à§‹à¦• à¦•à¦¾à¦‰à¦•à§‡ à¦®à¦¾à¦°à¦¬à§‡ à¦¨à¦¾à¥¤ à¦†à¦°, à¦à¦° à¦¸à¦¿à¦¦à§à¦§à¦¾à¦¨à§à¦¤ à¦®à¦¾à¦¨à¦¤à§‡ à¦¬à¦¾à¦§à§à¦¯ à¦¥à¦¾à¦•à¦¬à§‡à¥¤ à¦à¦‡à¦¸à¦¬ à¦†à¦‡à¦¨ à¦œà¦¾à¦¤à¦¿à¦ªà§à¦žà§à¦œà§‡à¦° à¦¸à¦¦à¦¸à§à¦¯ à¦¦à§‡à¦¶à§‡à¦°à¦¾ à¦®à§‡à¦¨à§‡ à¦šà¦²à¦¬à§‡à¥¤ à¦à¦¬à¦¾à¦° à¦‰à¦¡à§à¦°à§‹ à¦‰à¦‡à¦²à¦¸à¦¨ à¦¸à¦¾à¦¹à§‡à¦¬ à¦¬à¦²à¦²à§‡à¦¨,à¦¹à¦¾à¦ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾ à¦•à¦¿à¦¨à§à¦¤à§ à¦à¦° à¦¸à¦¦à¦¸à§à¦¯ à¦¨à¦¯à¦¼à¥¤ à¦¨à¦¿à¦¯à¦¼à¦® à¦¤à§‹à¦®à¦¾à¦¦à§‡à¦° à¦œà¦¨à§à¦¯à¥¤ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾ à¦¯à¦¾ à¦–à§à¦¶à¦¿ à¦¤à¦¾à¦‡ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡à¥¤ à¦†à¦®à¦°à¦¾à¦¤à§‹ à¦†à¦° à¦ªà§à¦°à¦¥à¦® à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§ à¦•à¦°à¦¿à¦¨à¦¿à¥¤ à¦­à¦¦à§à¦°à¦¦à§‡à¦° à¦à¦¸à¦¬ à¦²à¦¾à¦—à§‡ à¦¨à¦¾à¥¤&nbsp;<br><br><strong>à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§à¦ƒ</strong><br>à§§à§¯à§©à§© à¦¸à¦¾à¦²à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦•à§à¦·à¦®à¦¤à¦¾à¦¯à¦¼ à¦¹à¦¿à¦Ÿà¦²à¦¾à¦° à¦†à¦¸à¦²à§‡à¦¨à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦à¦¸à§‡ à¦¦à§‡à¦–à¦²à§‡à¦¨ à¦­à¦¾à¦°à§à¦¸à¦¾à¦‡ à¦šà§à¦•à§à¦¤à¦¿ à¦†à¦° à¦œà¦¾à¦¤à¦¿à¦ªà§à¦žà§à¦œ à¦®à¦¿à¦²à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦•à§‡ à¦ªà§à¦°à¦¾à¦¯à¦¼ à¦ªà¦™à§à¦—à§ à¦•à¦°à§‡ à¦¦à¦¿à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦° à¦ªà§à¦°à¦­à¦¾à¦¬à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦•à§à¦·à¦®à¦¤à¦¾à¦¯à¦¼ à¦¬à§‡à¦¶à¦¿à¦°à¦­à¦¾à¦— à¦œà¦¾à¦¯à¦¼à¦—à¦¾à¦¯à¦¼ à¦‡à¦¹à§à¦¦à§€à¦°à¦¾ à¦¬à¦¸à§‡ à¦†à¦›à§‡à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦­à¦¾à¦²à§‹à¦®à¦¨à§à¦¦ à¦¨à¦¾ à¦¬à§à¦à§‡à¦‡ à¦‡à¦¹à§à¦¦à§€à¦¦à§‡à¦° à¦¸à¦°à¦¾à¦¨à§‹ à¦¶à§à¦°à§ à¦•à¦°à¦²à§‡à¦¨à¥¤ à¦œà¦¾à¦¤à¦¿ à¦¸à¦‚à¦˜ à¦¥à§‡à¦•à§‡ à¦¸à¦¦à¦¸à§à¦¯ à¦ªà¦¦ à¦ªà§à¦°à¦¤à§à¦¯à¦¾à¦¹à¦¾à¦° à¦•à¦°à§‡ à¦¨à¦¿à¦²à§‡à¦¨à¥¤ à¦­à¦¾à¦°à§à¦¸à¦¾à¦‡ à¦šà§à¦•à§à¦¤à¦¿ à¦…à¦¨à§à¦¯à¦¾à¦¯à¦¼à§€ à¦•à¦¾à¦œ à¦¨à¦¾ à¦•à¦°à§‡ à¦²à¦•à§à¦· à¦²à¦•à§à¦· à¦…à¦¸à§à¦¤à§à¦°,à¦¬à¦¿à¦®à¦¾à¦¨, à¦Ÿà§à¦¯à¦¾à¦‚à¦• à¦¤à§ˆà¦°à§€ à¦¶à§à¦°à§ à¦•à¦°à¦²à§‡à¦¨à¥¤ à¦à¦•à¦¦à¦¿à¦¨(à¦¸à§‡à¦ªà§à¦Ÿà§‡à¦®à§à¦¬à¦° 1939) à¦¸à¦¬ à¦¶à§ƒà¦™à§à¦–à¦² à¦­à§‡à¦™à§à¦—à§‡ à¦¨à¦¿à¦œà§‡à¦° à¦†à¦§à¦¿à¦ªà¦¤à§à¦¯ à¦¬à¦¿à¦¸à§à¦¤à¦¾à¦°à§‡à¦° à¦œà¦¨à§à¦¯ à¦ªà§‹à¦²à§à¦¯à¦¾à¦¨à§à¦¡à¦•à§‡ à¦¦à¦¿à¦¯à¦¼à§‡à¦‡ à¦ªà¦¾à¦“à¦¯à¦¼à¦¾à¦° à¦—à§‡à¦® à¦¶à§à¦°à§ à¦•à¦°à¦²à§‡à¦¨à¥¤ à¦¶à§à¦°à§ à¦¹à¦² à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§à¥¤ à¦¨à¦¿à¦œ à¦¦à§‡à¦¶à§‡ à¦¸à¦¬ à¦œà¦¾à¦¯à¦¼à¦—à¦¾à¦¯à¦¼ à¦¸à§‡à¦¨à¦¾à¦¬à¦¾à¦¹à¦¿à¦¨à§€ à¦¬à¦¸à¦¿à¦¯à¦¼à§‡ à¦‡à¦¹à§à¦¦à§€à¦¦à§‡à¦° à¦–à§à¦¨ à¦•à¦°à¦¤à§‡ à¦¶à§à¦°à§ à¦•à¦°à¦²à§‡à¦¨à¥¤ à¦—à§‡à¦¸à§à¦Ÿà¦¾à¦ªà§‹ à¦¨à¦¾à¦®à§‡ à¦ªà§à¦²à¦¿à¦® à¦¬à¦¾à¦¹à¦¿à¦¨à§€ à¦¤à§ˆà¦°à§€ à¦•à¦°à¦²à§‡à¦¨ à¦¶à§à¦§à§ à¦‡à¦¹à§à¦¦à§€à¦¦à§‡à¦° à¦–à¦¬à¦° à¦¸à¦‚à¦—à§à¦°à¦¹ à¦•à¦°à¦¾à¦° à¦œà¦¨à§à¦¯à¥¤ à¦ à¦¸à¦®à¦¯à¦¼ à¦à¦• à§§à§ª à¦¬à¦›à¦°à§‡à¦° à¦‡à¦¹à§à¦¦à§€ à¦•à¦¿à¦¶à§‹à¦°à§€ à¦†à¦¨à¦¾ à¦«à§à¦°à¦¾à¦™à§à¦• à¦—à§‡à¦¸à§à¦Ÿà¦¾à¦ªà§‹ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦…à¦¤à§à¦¯à¦¾à¦šà¦¾à¦°à§‡à¦° à¦•à¦¾à¦¹à¦¿à¦¨à§€ à¦¤à¦¾à¦° à¦¡à¦¾à¦¯à¦¼à§‡à¦°à¦¿à¦¤à§‡ à¦²à¦¿à¦–à¦¤à§‡ à¦¶à§à¦°à§ à¦•à¦°à§‡à¥¤ à¦•à¦¿à¦­à¦¾à¦¬à§‡ à¦²à§à¦•à¦¿à¦¯à¦¼à§‡ à¦¤à¦¾à¦°à¦¾ à¦œà§€à¦¬à¦¨ à¦¯à¦¾à¦ªà¦¨ à¦•à¦°à§‡à¦›à§‡ à¦¹à¦¿à¦Ÿà¦²à¦¾à¦°à§‡à¦° à¦¹à¦¾à¦¤ à¦¥à§‡à¦•à§‡ à¦¬à¦¾à¦à¦šà¦¤à§‡à¥¤ à¦•à¦¿à¦­à¦¾à¦¬à§‡ à¦•à§‡à¦Ÿà§‡à¦›à§‡ à¦‡à¦¹à§à¦¦à§€ à¦ªà¦°à¦¿à¦¬à¦¾à¦°à¦Ÿà¦¿à¦° à¦œà§€à¦¬à¦¨ à¦à¦¤à§‹ à¦•à¦·à§à¦Ÿà§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦¦à¦¿à¦¯à¦¼à§‡à¥¤ à¦¸à§‡à¦‡ à¦¡à¦¾à¦¯à¦¼à¦°à¦¿à¦Ÿà¦¿ à¦†à¦œ à¦‡à¦¤à¦¿à¦¹à¦¾à¦¸à§‡à¦° à¦‰à§Žà¦¸à¥¤ à¦†à¦° à¦¹à¦¿à¦Ÿà¦²à¦¾à¦° à¦¬à¦¿à¦¶à¦¾à¦² à¦—à§à¦¯à¦¾à¦¸ à¦šà§‡à¦®à§à¦¬à¦¾à¦°à§‡ à¦†à¦Ÿà¦•à§‡ à¦²à¦•à§à¦·à¦¾à¦§à¦¿à¦• à¦‡à¦¹à§à¦¦à§€ à¦®à§‡à¦°à§‡ à¦¹à¦²à§‹à¦•à¦¾à¦¸à§à¦Ÿ à¦¨à¦¾à¦®à§‡à¦° à¦˜à¦Ÿà¦¨à¦¾ à¦œà¦¨à§à¦® à¦¦à¦¿à¦²à§‡à¦¨à¥¤ à¦à¦¦à¦¿à¦•à§‡ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾ à¦¦à§‚à¦°à§‡ à¦¬à¦¸à§‡ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡ à¦†à¦° à¦«à§à¦°à¦¾à¦¨à§à¦¸à§‡à¦° à¦•à¦¾à¦›à§‡ à¦…à¦¸à§à¦¤à§à¦° à¦¬à¦¿à¦•à§à¦°à¦¿ à¦•à¦°à¦›à¦¿à¦²à¥¤ à¦¯à§à¦¦à§à¦§ à¦¬à¦¿à¦·à¦¯à¦¼à§‡ à¦ªà¦°à¦¾à¦®à¦°à§à¦¶ à¦¦à¦¿à¦šà§à¦›à¦¿à¦²à¥¤ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦¬à¦¨à§à¦§à§ à¦œà¦¾à¦ªà¦¾à¦¨à§‡à¦° à¦¬à¦¹à§à¦¦à¦¿à¦¨à§‡à¦° à¦‡à¦šà§à¦›à§‡ à¦¯à§‡ à¦ªà§à¦°à¦¶à¦¾à¦¨à§à¦¤ à¦®à¦¹à¦¾à¦¸à¦¾à¦—à¦°à§€à¦¯à¦¼ à¦à¦²à¦¾à¦•à¦¾à¦¯à¦¼ à¦ªà§à¦°à¦­à¦¾à¦¬ à¦¬à¦¿à¦¸à§à¦¤à¦¾à¦° à¦•à¦°à¦¬à§‡à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦° à¦œà¦¨à§à¦¯ à¦¤à¦¾ à¦¹à¦¯à¦¼à§‡ à¦“à¦ à§‡ à¦¨à¦¾à¥¤ à§­ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦° à§§à§¯à§ªà§§ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§©à§¦à§¦à¦Ÿà¦¿ à¦œà¦¾à¦ªà¦¾à¦¨à¦¿ à¦¬à¦¿à¦®à¦¾à¦¨ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦° à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦¬à¦¡à¦¼ à¦¸à¦®à§à¦¦à§à¦° à¦¬à¦¨à§à¦¦à¦° à¦ªà¦¾à¦°à§à¦² à¦¹à¦¾à¦°à¦¬à¦¾à¦° à¦†à¦•à§à¦°à¦®à¦¨ à¦•à¦°à§‡à¥¤ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦“ à¦¨à§‡à¦®à§‡ à¦ªà¦°à§‡ à¦¯à§à¦¦à§à¦§à§‡à¥¤ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿ à¦à¦‡ à¦¯à§à¦¦à§à¦§à§‡ à¦«à§à¦°à¦¾à¦¨à§à¦¸à§‡à¦° à¦¬à¦¾à¦°à§‹à¦Ÿà¦¾ à¦¬à¦¾à¦œà¦¿à¦¯à¦¼à§‡ à¦¦à¦¿à¦¯à¦¼à§‡à¦›à¦¿à¦²à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦¬à§ƒà¦Ÿà¦¿à¦¶ à¦†à¦° à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦¨ à¦¸à§‡à¦¨à¦¾à¦°à¦¾ à¦«à§à¦°à¦¾à¦¨à§à¦¸à¦•à§‡ à¦¬à¦¾à¦à¦šà¦¾à¦¤à§‡ à¦«à§à¦°à¦¾à¦¨à§à¦¸à§‡à¦° à¦¨à¦°à¦®à¦¾à¦¨à§à¦¡à¦¿ à¦¶à¦¹à¦°à§‡ à§¬ à¦œà§à¦¨ à¦²à¦•à§à¦·à¦¾à¦§à¦¿à¦• à¦¸à§‡à¦¨à¦¾ à¦¬à¦¿à¦®à¦¾à¦¨à§‡ à¦•à¦°à§‡ à¦à¦¬à¦‚ à¦œà¦¾à¦¹à¦¾à¦œà§‡ à¦•à¦°à§‡ à¦¨à¦¾à¦®à¦¿à¦¯à¦¼à§‡ à¦¦à§‡à¦¯à¦¼à¥¤ à¦à¦•à§‡ à¦¬à¦²à§‡ à¦¡à¦¿ à¦¡à§‡ à¦¬à¦¾ à¦¡à¦“à¦¨ à¦¡à§‡à¥¤ à¦¸à§‹à¦­à¦¿à¦¯à¦¼à§‡à¦¤ à¦‡à¦‰à¦¨à¦¿à¦¯à¦¼à¦¨(à§§à§¯à§¨à§¨ à¦¸à¦¾à¦²à§‡ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤) à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦•à§‡ à¦ªà§à¦°à¦¤à¦¿à¦°à§‹à¦§ à¦•à¦°à¦¾à¦° à¦¸à¦¬ à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾ à¦•à¦°à§‡à¥¤ à¦¯à§à¦¦à§à¦§à§‡à¦° à¦«à¦¾à¦à¦•à§‡ à¦«à¦¾à¦à¦•à§‡ à¦¬à¦¿à¦¶à§à¦¬ à¦¶à¦¾à¦¨à§à¦¤à¦¿ à¦¨à¦¿à¦¯à¦¼à§‡ à¦¯à§‡ à¦•à§‡à¦‰ à¦­à¦¾à¦¬à¦›à§‡ à¦¨à¦¾ à¦¤à¦¾ à¦•à¦¿à¦¨à§à¦¤à§ à¦¨à¦¯à¦¼à¥¤ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦° à¦ªà§à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿ à¦«à§à¦°à¦¾à¦™à§à¦•à¦²à¦¿à¦¨ à¦¡à¦¿ à¦°à§à¦œà¦­à§‡à¦²à§à¦Ÿ à¦¬à¦¡à¦¼ à¦¬à¦¡à¦¼ à¦¦à§‡à¦¶ à¦—à§à¦²à§‹à¦° à¦¸à¦¾à¦¥à§‡ à¦†à¦²à¦¾à¦ª à¦•à¦°à¦›à§‡à¦¨ à¦à¦•à¦Ÿà¦¿ à¦¸à§à¦¥à¦¾à¦¯à¦¼à§€ à¦“ à¦•à§à¦·à¦®à¦¤à¦¾à¦¶à¦¾à¦²à§€ à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦• à¦¸à¦‚à¦—à¦ à¦¨ à¦¤à§ˆà¦°à§€à¦° à¦œà¦¨à§à¦¯à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦‡à¦¤à¦¿à¦®à¦§à§à¦¯à§‡ à¦²à¦¨à§à¦¡à¦° à¦˜à§‹à¦·à¦¨à¦¾à¦° à¦†à¦¯à¦¼à§‹à¦œà¦¨ à¦•à¦°à§‡à¦›à§‡à¦¨,à¦¹à¦¯à¦¼à§‡à¦›à§‡ à¦†à¦Ÿà¦²à¦¾à¦¨à§à¦Ÿà¦¿à¦• à¦¸à¦¨à¦¦,à¦®à¦¸à§à¦•à§‹ à¦˜à§‹à¦·à¦¨à¦¾,à¦¤à§‡à¦¹à¦°à¦¾à¦¨ à¦•à¦¨à¦«à¦¾à¦°à§‡à¦¨à§à¦¸à¥¤ à¦œà¦¾à¦¤à¦¿à¦¸à¦‚à¦˜ à¦¤à§ˆà¦°à§€à¦° à¦•à¦¾à¦œ à¦…à¦¨à§‡à¦•à¦Ÿà¦¾ à¦à¦—à¦¿à¦¯à¦¼à§‡ à¦—à§‡à¦›à§‡à¥¤ à¦¯à§à¦¦à§à¦§ à¦¯à¦–à¦¨ à¦ªà§à¦°à¦¾à¦¯à¦¼ à¦¶à§‡à¦· à¦¤à¦–à¦¨ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾ à¦†à¦‡à¦¨à¦¿à¦¸à§à¦Ÿà¦¾à¦‡à¦¨à§‡à¦° à¦«à¦¿à¦¶à¦¨ à¦“ à¦šà§‡à¦‡à¦¨ à¦°à¦¿à¦à¦•à¦¶à¦¨ à¦¤à¦¤à§à¦¬à§‡à¦° à¦‰à¦ªà¦° à¦­à¦¿à¦¤à§à¦¤à¦¿ à¦•à¦°à§‡ à¦¬à¦¿à¦œà§à¦žà¦¾à¦¨à§€ à¦“à¦ªà§‡à¦¨ à¦¹à¦¾à¦‡à¦®à¦¾à¦° à¦à¦° à¦¨à§‡à¦¤à§ƒà¦¤à§à¦¬à§‡ à¦ªà§à¦°à¦œà§‡à¦•à§à¦Ÿ à¦®à§à¦¯à¦¾à¦¨à¦¹à¦¾à¦Ÿà¦¨à§‡à¦° à¦†à¦“à¦¤à¦¾à¦¯à¦¼ à¦²à¦¸ à¦à¦²à¦¾à¦®à¦¸ à¦¨à¦¾à¦®à§‡à¦° à¦²à§à¦¯à¦¾à¦¬à¦°à§‡à¦Ÿà¦°à¦¿à¦¤à§‡ à¦ªà¦¾à¦°à¦®à¦¾à¦¨à¦¬à¦¿à¦• à¦¬à§‹à¦®à¦¾ à¦¬à¦¾à¦¨à¦¿à¦¯à¦¼à§‡ à¦«à§‡à¦²à§‡à¦›à§‡à¥¤ à¦•à¦¯à¦¼à§‡à¦•à¦Ÿà¦¿ à¦ªà¦°à§€à¦•à§à¦·à¦¾ à¦•à¦°à¦¾à¦° à¦ªà¦° à¦¸à¦«à¦² à¦¹à¦¯à¦¼à§‡ à¦à¦¬à¦¾à¦° à¦¯à§à¦¦à§à¦§à§‡ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à§‡à¦° à¦…à¦¨à§à¦®à¦¤à¦¿ à¦¦à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦ªà§à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿ à¦¬à¦¦à¦² à¦¹à¦¯à¦¼à§‡ à¦—à§‡à¦›à§‡à¥¤ à¦°à§à¦œà¦­à§‡à¦°à§à¦Ÿ à¦¥à¦¾à¦•à¦²à§‡ à¦¹à¦¯à¦¼à¦¤à§‹ à¦ªà¦¾à¦°à¦®à¦¾à¦¨à¦¬à¦¿à¦• à¦¬à§‹à¦®à¦¾ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦¹à¦¤à§‹à¦¨à¦¾à¥¤ à¦à¦¬à¦¾à¦° à¦•à§à¦·à¦®à¦¤à¦¾à¦¯à¦¼ à¦Ÿà§à¦°à§à¦®à§à¦¯à¦¾à¦¨à¥¤ à¦¤à¦¾à¦° à¦†à¦¦à§‡à¦¶à§‡ à§¬ à¦†à¦—à¦¸à§à¦Ÿ à¦à¦¬à¦‚ à§¯ à¦†à¦—à¦¸à§à¦Ÿ à§§à§¯à§ªà§« à¦œà¦¾à¦ªà¦¾à¦¨à§‡ à¦¹à¦¿à¦°à§‹à¦¸à¦¿à¦®à¦¾ à¦à¦¬à¦‚ à¦¨à¦¾à¦—à¦¾à¦¸à¦¾à¦•à¦¿à¦¤à§‡ à¦²à¦¿à¦Ÿà¦² à¦¬à¦¯à¦¼ à¦à¦¬à¦‚ à¦«à§à¦¯à¦¾à¦Ÿ à¦®à§à¦¯à¦¾à¦¨ à¦¨à¦¾à¦®à§‡à¦° à¦ªà¦¾à¦°à¦®à¦¾à¦¨à¦¬à¦¿à¦• à¦¬à§‹à¦®à¦¾ à¦«à§‡à¦²à¦¾ à¦¹à¦¯à¦¼à¥¤ 14 à¦†à¦—à¦¸à§à¦Ÿ à§§à§¯à§ªà§« à¦œà¦¾à¦ªà¦¾à¦¨ à¦†à¦¤à§à¦® à¦¸à¦®à¦¾à¦°à§à¦ªà¦¨ à¦•à¦°à§‡à¥¤ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿ à¦†à¦°à§‹ à¦•à¦¿à¦›à§ à¦¦à¦¿à¦¨ à¦¯à§à¦¦à§à¦§ à¦šà¦¾à¦²à¦¿à¦¯à¦¼à§‡ à¦—à§‡à¦²à§‡à¦“ à¦¹à¦¿à¦Ÿà¦²à¦¾à¦° à¦¬à¦¾à¦¹à¦¿à¦¨à§€ à¦†à¦° à¦¯à§à¦¦à§à¦§ à¦šà¦¾à¦²à¦¾à¦¤à§‡ à¦¸à¦•à§à¦·à¦® à¦›à¦¿à¦² à¦¨à¦¾à¥¤ à§©à§¦ à¦à¦ªà§à¦°à¦¿à¦² à§§à§¯à§ªà§« à¦¹à¦¿à¦Ÿà¦²à¦¾à¦° à¦†à¦¤à§à¦®à¦¹à¦¤à§à¦¯à¦¾ à¦•à¦°à§‡ à¦¬à¦²à§‡ à¦§à¦¾à¦°à¦£à¦¾ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤ à¦†à¦° à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯ à¦¯à§à¦¦à§à¦§à¦¾à¦ªà¦°à¦¾à¦§à§€à¦¦à§‡à¦° à¦¬à¦¿à¦šà¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦¨à§à¦°à§‡à¦®à¦¬à¦¾à¦°à§à¦—à§‡à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦¯à§à¦¦à§à¦§ à¦¬à¦¨à§à¦¦à¦¿à¦°à¦¾à¦“à¦¤à§‹ à¦®à¦¾à¦¨à§à¦·! à¦¨à§‡à¦¤à¦¾à¦¦à§‡à¦° à¦†à¦¦à§‡à¦¶à§‡ à¦¤à¦¾à¦°à¦¾ à¦®à¦¾à¦¨à§à¦· à¦®à¦¾à¦°à§‡, à¦¨à¦¾ à¦®à¦¾à¦°à¦²à§‡ à¦¨à§‡à¦¤à¦¾à¦°à¦¾à¦‡ à¦¤à¦¾à¦¦à§‡à¦° à¦¹à¦¤à§à¦¯à¦¾ à¦•à¦°à§‡à¥¤ à¦¤à¦¾à¦‡ à¦¯à§à¦¦à§à¦§ à¦¬à¦¨à§à¦¦à¦¿à¦¦à§‡à¦° à¦¨à§à¦¯à¦¾à¦¯à¦¼ à¦¬à¦¿à¦šà¦¾à¦° à¦ªà¦¾à¦“à¦¯à¦¼à¦¾à¦° à¦…à¦§à¦¿à¦•à¦¾à¦° à¦†à¦›à§‡à¥¤ à¦¯à§à¦¦à§à¦§ à¦¬à¦¨à§à¦¦à¦¿à¦¦à§‡à¦° à¦®à¦¾à¦¨à¦¬à¦¾à¦§à¦¿à¦•à¦¾à¦° à¦¨à¦¿à¦¶à§à¦šà¦¿à¦¤ à¦¹à¦¯à¦¼à¦¨à¦¿ à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§ à¦šà¦²à¦¾à¦•à¦¾à¦²à§€à¦¨ à¦¸à¦®à¦¯à¦¼à§‡à¥¤ à¦¤à¦¾à¦‡ à¦†à¦—à¦¾à¦®à§€à¦¤à§‡ à¦¯à§‡à¦¨ à¦¯à§à¦¦à§à¦§à¦¬à¦¨à§à¦¦à¦¿à¦¦à§‡à¦° à¦®à¦¾à¦¨à¦¬à¦¾à¦§à¦¿à¦•à¦¾à¦° à¦°à¦•à§à¦·à¦¾ à¦¹à¦¯à¦¼ à¦ à¦²à¦•à§à¦·à§à¦¯à§‡ à§§à§¯à§ªà§¯ à¦¸à¦¾à¦²à§‡ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à§«à§¦ à¦Ÿà¦¿ à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦°à¦¤à¦¿à¦¨à¦¿à¦§à¦¿à¦°à¦¾ à¦œà§‡à¦¨à§‡à¦­à¦¾à¦¤à§‡ à¦†à¦²à§‹à¦šà¦¨à¦¾à¦¯à¦¼ à¦¬à¦¸à§‡à¦¨ à¥¤ à¦à¦•à§‡ à¦¬à¦²à§‡ à¦œà§‡à¦¨à§‡à¦­à¦¾ à¦•à¦¨à¦­à§‡à¦¨à¦¶à¦¨à¥¤&nbsp;<br><br>à¦¯à§à¦¦à§à¦§ à¦¶à§‡à¦·à§‡ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¦à§‡à¦¶à¦—à§à¦²à¦¾ à¦…à¦°à§à¦¥à¦¨à§ˆà¦¤à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦­à§‡à¦™à§‡ à¦ªà¦¡à¦¼à§‡à¦›à§‡à¥¤ à¦¤à¦¾à¦¦à§‡à¦° à¦¨à¦¤à§à¦¨ à¦•à¦°à§‡ à¦†à¦°à§à¦¥à¦¸à¦¾à¦®à¦¾à¦œà¦¿à¦• à¦…à¦¬à¦¸à§à¦¥à¦¾à¦° à¦‰à¦¨à§à¦¨à¦¯à¦¼à¦¨ à¦˜à¦Ÿà¦¾à¦¤à§‡ à¦¹à¦¬à§‡à¥¤ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦° à¦¨à§‡à¦¤à§ƒà¦¤à§à¦¬à§‡ à¦—à¦¡à¦¼à§‡ à¦‰à¦ à¦² à¦¬à¦¿à¦¶à§à¦¬ à¦¬à§à¦¯à¦¾à¦‚à¦•(IBRD,IDA,MIGA,IFC,ICSID). à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾ à¦ªà§ƒà¦¥à¦¿à¦¬à§€ à¦—à¦¡à¦¼à¦¾à¦° à¦à¦‡ à¦®à¦¹à§Ž à¦ªà¦°à¦¿à¦•à¦²à§à¦ªà¦¨à¦¾ à¦•à¦°à¦²,à¦¤à¦¾à¦° à¦¨à¦¾à¦® à¦®à¦¾à¦°à§à¦¶à¦¾à¦² à¦ªà§à¦²à§à¦¯à¦¾à¦¨à¥¤ à¦¤à¦¾à¦¦à§‡à¦° à¦…à¦¸à§à¦¤à§à¦° à¦¹à¦²à§‹ à¦ªà§à¦œà¦¿à¦à¦¬à¦¾à¦¦à¥¤ à¦¸à¦¬à¦¾à¦‡à¦•à§‡ à¦¬à¦²à¦², à¦¸à¦¬ à¦‰à§Žà¦ªà¦¾à¦¦à¦¨ à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾ à¦¬à§à¦¯à¦•à§à¦¤à¦¿ à¦®à¦¾à¦²à¦¿à¦•à¦¾à¦¨à¦¾à¦¯à¦¼ à¦¦à¦¿à¦¯à¦¼à§‡ à¦¦à¦¾à¦“à¥¤ à¦®à§à¦•à§à¦¤ à¦¬à¦¾à¦œà¦¾à¦° à¦…à¦¨à§à¦¸à¦°à¦£ à¦•à¦°à§‹,à¦—à¦£à¦¤à¦¨à§à¦¤à§à¦°à§‡à¦° à¦ªà¦¥à§‡ à¦šà¦²à§‹à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦¸à§‹à¦­à¦¿à¦¯à¦¼à§‡à¦¤ à¦‡à¦‰à¦¨à¦¿à¦¯à¦¼à¦¨à§‡à¦° à¦à¦‡ à¦•à¦¥à¦¾à¦—à§à¦²à§‹ à¦ªà¦›à¦¨à§à¦¦ à¦¹à¦²à§‹ à¦¨à¦¾à¥¤ à¦¤à¦¾à¦°à¦¾ à¦¬à¦²à¦²,à¦¶à§à¦§à§ à¦¤à§à¦®à¦¿ à¦•à§‡à¦¨ à¦¬à¦¿à¦¶à§à¦¬ à¦…à¦°à§à¦¥à¦£à§€à¦¤à¦¿ à¦—à¦¡à¦¼à§‡ à¦¦à§‡à¦¬à§‡? à¦†à¦®à¦¿ à¦¬à§‡à¦à¦šà§‡ à¦†à¦›à¦¿ à¦à¦–à¦¨à§‹à¥¤ à¦¸à§à¦Ÿà§à¦¯à¦¾à¦²à¦¿à¦¨ à¦¸à¦¾à¦¹à§‡à¦¬ à¦à¦—à¦¿à¦¯à¦¼à§‡ à¦†à¦¸à¦²à§‡à¦¨ à¦¸à¦¾à¦®à§à¦¯à¦¬à¦¾à¦¦à§‡à¦° à¦§à¦¾à¦°à¦£à¦¾ à¦¨à¦¿à¦¯à¦¼à§‡à¥¤ à¦¤à¦¾à¦¦à§‡à¦°à¦“ à¦¬à§à¦¯à¦¾à¦‚à¦• à¦†à¦›à§‡à¥¤ à¦¤à¦¾à¦° à¦¨à¦¾à¦® à¦•à¦®à§‡à¦•à¦¨à¥¤ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿ à¦¸à¦¹ à¦ªà§à¦°à§‹ à¦¬à¦¿à¦¶à§à¦¬ à¦…à¦°à§à¦¥à¦¨à§ˆà¦¤à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦‰à¦¨à§à¦¨à¦¤ à¦•à¦°à¦¤à§‡ à¦¤à¦¾à¦°à¦¾ à¦à¦•à¦Ÿà¦¾ à¦ªà¦°à¦¿à¦•à¦²à§à¦ªà¦¨à¦¾ à¦•à¦°à¦² à¦¤à¦¾à¦° à¦¨à¦¾à¦® à¦®à¦²à§‹à¦Ÿà¦­ à¦ªà§à¦²à§à¦¯à¦¾à¦¨à¥¤ à¦à¦­à¦¾à¦¬à§‡ à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦ªà§à¦œà¦¿à¦¬à¦¾à¦¦ à¦†à¦° à¦¸à¦¾à¦®à§à¦¯à¦¬à¦¾à¦¦/à¦¸à¦®à¦¾à¦œà¦¤à¦¨à§à¦¤à§à¦°(à¦•à¦®à¦¿à¦‰à¦¨à¦¿à¦œà¦®) à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¦à§‡à¦¶à§‡ à¦¦à§‡à¦¶à§‡ à¦œà¦¨à¦ªà§à¦°à¦¿à¦¯à¦¼ à¦¹à¦¤à§‡ à¦¶à§à¦°à§ à¦•à¦°à¦²à¥¤ à¦ªà§ƒà¦¥à¦¿à¦¬à§€ à¦¹à¦¯à¦¼à§‡ à¦—à§‡à¦²à§‹ à¦¦à§à¦‡ à¦®à§‡à¦°à§à¦­à¦¿à¦¤à§à¦¤à¦¿à¦•à¥¤ à¦¤à¦¾à¦‡à¦¤à§‹ à¦•à§‹à¦°à¦¿à¦¯à¦¼à¦¾ à¦¯à§à¦¦à§à¦§à§‡ à§§à§¯à§«à§¦ à¦¸à¦¾à¦²à§‡ à¦‰à¦¤à§à¦¤à¦° à¦•à§‹à¦°à¦¿à¦¯à¦¼à¦¾à¦•à§‡ à¦¸à¦®à¦°à§à¦¥à¦¨ à¦•à¦°à§‡ à¦¸à§‹à¦­à¦¿à¦¯à¦¼à§‡à¦¤ à¦‡à¦‰à¦¨à¦¿à¦¯à¦¼à¦¨, à¦†à¦° à¦¦à¦•à§à¦·à¦¿à¦¨ à¦•à§‹à¦°à¦¿à¦¯à¦¼à¦¾à¦•à§‡ à¦¸à¦®à¦°à§à¦¥à¦¨à¦¨ à¦•à¦°à§‡ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¥¤ à§§à§¯à§­à§§ à¦¸à¦¾à¦²à§‡ à¦¸à§‹à¦­à¦¿à¦¯à¦¼à§‡à¦¤ à¦‡à¦‰à¦¨à¦¿à¦¯à¦¼à¦¨ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦ªà¦•à§à¦·à§‡ à¦†à¦° à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¥à¦¾à¦¨à§‡à¦° à¦ªà¦•à§à¦·à§‡à¥¤ à§§à§¯à§¯à§§ à¦¸à¦¾à¦² à¦ªà¦°à§à¦¯à¦¨à§à¦¤ à¦šà¦²à¦¾ à¦à¦‡ à¦‰à¦¤à§à¦¤à§‡à¦œà¦¨à¦¾à¦•à§‡ à¦¬à¦²à§‡ à¦¸à§à¦¨à¦¾à¦¯à¦¼à§ à¦¯à§à¦¦à§à¦§à¥¤ à¦à¦–à¦¨à§‹ à¦¤à¦¾ à¦¥à¦¾à¦®à§‡à¦¨à¦¿ , à¦šà¦²à¦›à§‡ à¦¨à¦¤à§à¦¨ à¦°à§‚à¦ªà§‡à¥¤</p>', 1, 1, 'Public', '2018-12-06 16:58:28', '2018-12-06 17:36:31');
INSERT INTO `preparation_lesson` (`id`, `sub_id`, `lesson_title`, `lesson_content`, `posted_by`, `updated_by`, `action`, `created_at`, `updated_at`) VALUES
(25, 3, 'à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¦à¦¶à¦Ÿà¦¿ à¦¦à§à¦°à§à¦§à¦°à§à¦· à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾', '<p style=\"text-align: justify;\">à¦¤à¦¬à§‡ à¦«à¦°à§‡à¦¨ à¦ªà¦²à¦¿à¦¸à¦¿, à¦à¦¬à¦¿à¦¸à¦¿ à¦¨à¦¿à¦‰ à¦ªà¦¯à¦¼à§‡à¦¨à§à¦Ÿ, à¦à¦•à§à¦¸à¦ªà¦¾à¦°à§à¦Ÿ à¦¸à¦¿à¦•à¦¿à¦‰à¦°à¦¿à¦Ÿà¦¿ à¦Ÿà¦¿à¦ªà¦¸, à¦¦à¦¿ à¦®à§‡à¦¶ à¦¨à¦¿à¦‰à¦œ, à¦œà¦¿ à¦¨à¦¿à¦‰à¦œ à¦à¦¬à¦‚ à¦¸à§à¦Ÿà§‹à¦°à¦¿ à¦ªà¦¿à¦• à¦¨à¦¾à¦®à¦• à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨à§‡à¦° à¦ªà¦•à§à¦· à¦¥à§‡à¦•à§‡ à¦•à¦°à¦¾ à¦•à¦¯à¦¼à§‡à¦•à¦Ÿà¦¿ à¦¤à¦¾à¦²à¦¿à¦•à¦¾ à¦ªà¦¾à¦“à¦¯à¦¼à¦¾ à¦¯à¦¾à¦¯à¦¼, à¦¯à§‡à¦–à¦¾à¦¨à§‡ à¦‰à¦ªà¦¸à§à¦¥à¦¾à¦ªà¦¿à¦¤ à¦¤à¦¥à§à¦¯-à¦‰à¦ªà¦¾à¦¤à§à¦¤à§‡ à¦¬à§‡à¦¶ à¦®à¦¿à¦² à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦à¦¸à¦¬ à¦¸à§‚à¦¤à§à¦°à§‡à¦° à¦¤à¦¥à§à¦¯-à¦‰à¦ªà¦¾à¦¤à§à¦¤ à¦¬à¦¿à¦¶à§à¦²à§‡à¦·à¦£ à¦•à¦°à§‡ à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦¸à¦®à¦¯à¦¼à§‡à¦° à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¸à¦¬ à¦¥à§‡à¦•à§‡ à¦¦à§à¦°à§à¦§à¦°à§à¦· à¦¦à¦¶ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦à¦‡ à¦¤à¦¾à¦²à¦¿à¦•à¦¾à¦Ÿà¦¿ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤<br><br><strong>à§§. #à¦®à§‹à¦¸à¦¾à¦¦</strong><br>à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¦à§‡à¦¶à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦—à§à¦²à§‹à¦° à¦®à¦§à§à¦¯à§‡ à¦¸à¦¬ à¦¥à§‡à¦•à§‡ à¦¦à§à¦°à§à¦§à¦°à§à¦· à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¨à¦¾à¦® à¦®à§‹à¦¸à¦¾à¦¦ (MOSSAD)à¥¤ à¦®à§‹à¦¸à¦¾à¦¦ à¦‡à¦¸à¦°à¦¾à¦‡à¦²à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¯à¦¾ à¦¦à§‡à¦¶à¦Ÿà¦¿à¦° à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€à¦° à¦¦à¦«à¦¤à¦° à¦¥à§‡à¦•à§‡ à¦¸à¦°à¦¾à¦¸à¦°à¦¿ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¿à¦¤ à¦¹à¦¯à¦¼à§‡ à¦¥à¦¾à¦•à§‡à¥¤ à¦¦à§‡à¦¶à¦Ÿà¦¿à¦° à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦ªà§à¦°à¦§à¦¾à¦¨à¥¤ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¸à¦¬ à¦œà¦¾à¦¯à¦¼à¦—à¦¾à¦¤à§‡ à¦¯à§‡à¦•à§‹à¦¨à§‹ à¦ªà¦°à¦¿à¦¸à§à¦¥à¦¿à¦¤à¦¿à¦¤à§‡ à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦šà¦¾à¦²à¦¾à¦¨à§‹à¦° à¦¸à¦•à§à¦·à¦®à¦¤à¦¾ à¦°à¦¾à¦–à§‡ à¦‡à¦¸à¦°à¦¾à¦‡à¦² à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦à¦‡ à¦¬à¦¿à¦¶à§‡à¦· à¦à¦²à¦¿à¦Ÿ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¥¤<br><br>à¦®à§‹à¦¸à¦¾à¦¦ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼ à§§à§¯à§ªà§¯ à¦¸à¦¾à¦²à§‡à¦° à§§à§© à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦°à¥¤ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦ªà§à¦°à¦§à¦¾à¦¨à§‡à¦° à¦¨à¦¾à¦® à¦‡à¦¯à¦¼à§‹à¦¸à¦¿ à¦•à§‹à¦¹à§‡à¦¨à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦—à¦¤ à¦¬à¦›à¦° à¦¨à¦¿à¦¯à§à¦•à§à¦¤ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¦¨à¥¤ à¦à¦‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¸à¦¦à¦¸à§à¦¯ à¦°à¦¯à¦¼à§‡à¦›à§‡ à¦¹à¦¾à¦œà¦¾à¦°à§‡à¦° à¦‰à¦ªà¦°à§‡à¥¤ à¦—à¦ à¦¨à§‡à¦° à¦ªà¦° à¦¥à§‡à¦•à§‡ à¦à¦–à¦¨ à¦ªà¦°à§à¦¯à¦¨à§à¦¤ à¦…à¦¸à¦‚à¦–à§à¦¯ à¦¦à§à¦°à§à¦§à¦°à§à¦· à¦…à¦­à¦¿à¦¯à¦¾à¦¨ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾ à¦•à¦°à§‡à¦›à§‡ à¦à¦‡ à¦®à§‹à¦¸à¦¾à¦¦à¥¤<br><br>à¦®à§‹à¦¸à¦¾à¦¦ à¦¸à¦¾à¦§à¦¾à¦°à¦£à¦­à¦¾à¦¬à§‡ à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦—à§à¦ªà§à¦¤à¦¹à¦¤à§à¦¯à¦¾, à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦¨à§€à¦¤à¦¿-à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦£à§‡ à¦¸à¦¹à¦¾à¦¯à¦¼à¦¤à¦¾, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦Ÿà§‡à¦°à¦°à¦¿à¦œà¦®, à¦¨à¦¿à¦œà¦¸à§à¦¬ à¦²à§‹à¦• à¦¸à¦‚à¦—à§à¦°à¦¹ à¦“ à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦¤à§ˆà¦°à¦¿, à¦¬à¦¿à¦¦à§‡à¦¶à¦¿ à¦•à§‚à¦Ÿà¦¨à§€à¦¤à¦¿à¦•à¦¦à§‡à¦° à¦“à¦ªà¦° à¦¨à¦œà¦°à¦¦à¦¾à¦°à¦¿, à¦¶à¦¤à§à¦°à§ à¦à¦œà§‡à¦¨à§à¦Ÿà¦¦à§‡à¦° à¦¸à¦¨à§à¦§à¦¾à¦¨, à¦¸à¦¾à¦‡à¦¬à¦¾à¦° à¦“à¦¯à¦¼à¦¾à¦°à¦«à§‡à¦¯à¦¼à¦¾à¦° à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦¨à¦¤à§à¦¨ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦¸à¦‚à¦—à§à¦°à¦¹, à¦•à§à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦¸à§à¦Ÿà¦¾à¦‡à¦¨ à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦¡à§à¦°à§‹à¦¨ à¦†à¦•à§à¦°à¦®à¦£, à¦—à§à¦ªà§à¦¤ à¦•à¦¾à¦°à¦¾à¦—à¦¾à¦° à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¬à¦¡à¦¼ à¦¬à¦¡à¦¼ à¦•à¦°à¦ªà§‹à¦°à§‡à¦¶à¦¨à§‡à¦° à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦£à§‡à¦° à¦šà§‡à¦·à§à¦Ÿà¦¾, à¦‡à¦¨à§à¦¡à¦¾à¦¸à§à¦Ÿà§à¦°à¦¿à¦¯à¦¼à¦¾à¦² à¦¸à§à¦ªà¦¿à¦“à¦¨à¦¾à¦œ à¦‡à¦¤à§à¦¯à¦¾à¦¦à¦¿ à¦•à¦¾à¦œ à¦•à¦°à§‡ à¦¥à¦¾à¦•à§‡à¥¤<br><br>à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦à¦‡ à¦•à¦¾à¦œà§‡à¦° à¦¬à¦¾à¦œà§‡à¦Ÿà¦“ à¦•à¦¾à¦°à¦“ à¦œà¦¾à¦¨à¦¾ à¦¨à§‡à¦‡à¥¤ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦ªà§à¦°à¦¤à¦¿à¦¦à§à¦¬à¦¨à§à¦¦à§à¦¬à§€ à¦à¦®à¦à¦¸à¦à¦¸, à¦à¦«à¦à¦¸à¦¬à¦¿, à¦à¦®à¦†à¦‡à¦à¦¸à¦†à¦‡à¦†à¦°à¦†à¦‡, à¦¹à¦¿à¦œà¦¬à§à¦²à§à¦²à¦¾à¦¹ à¦à¦¬à¦‚ à¦¹à¦¾à¦®à¦¾à¦¸à¥¤<br><br>à¦‡à¦¸à¦°à¦¾à¦¯à¦¼à§‡à¦²à¦¿ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¬à¦¿à¦–à§à¦¯à¦¾à¦¤ à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨à¦—à§à¦²à§‹ à¦¹à¦šà§à¦›à§‡- à§§à§¯à§¬à§¦ à¦¸à¦¾à¦²à§‡ à¦†à¦°à§à¦œà§‡à¦¨à§à¦Ÿà¦¿à¦¨à¦¾à¦¯à¦¼ à¦†à¦‡à¦–à¦®à§à¦¯à¦¾à¦¨ à¦¹à¦¾à¦¨à§à¦Ÿ, à§§à§¯à§¬à§« à¦¸à¦¾à¦²à§‡ à¦¹à§‡à¦¬à¦¾à¦°à¦°à¦¤ à¦šà§à¦•à¦¾à¦°à¦¸ à¦¹à¦¤à§à¦¯à¦¾, à§§à§¯à§¬à§©-à§¬à§¬ à¦¸à¦¾à¦²à§‡à¦° à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦¡à¦¾à¦¯à¦¼à¦®à¦¨à§à¦¡, à§§à§¯à§­à§¨ à¦¸à¦¾à¦²à§‡à¦° à¦®à¦¿à¦‰à¦¨à¦¿à¦– à¦…à¦²à¦¿à¦®à§à¦ªà¦¿à¦•à§‡ à¦¹à¦¤à§à¦¯à¦¾à¦•à¦¾à¦£à§à¦¡à§‡à¦° à¦ªà§à¦°à¦¤à¦¿à¦¶à§‹à¦§, à§§à§¯à§¯à§¦ à¦¸à¦¾à¦²à§‡à¦° à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦œà§‡à¦°à¦¾à¦²à§à¦¡ à¦¬à§à¦² à¦•à¦¿à¦²à¦¿à¦‚, à§§à§¯à§¯à§¨ à¦¸à¦¾à¦²à§‡à¦° à¦†à¦¤à§‡à¦« à¦¬à§‡à¦‡à¦¸à§‹ à¦¹à¦¤à§à¦¯à¦¾à¦•à¦¾à¦£à§à¦¡, à§¨à§¦à§§à§¦ à¦¸à¦¾à¦²à§‡à¦° à¦®à§‹à¦¹à¦¾à¦®à§à¦®à¦¦ à¦†à¦² à¦®à¦¾à¦¬à¦¹à§ à¦¹à¦¤à§à¦¯à¦¾à¦•à¦¾à¦£à§à¦¡à¥¤<br><br>à§§à§¯à§¬à§¦ à¦¸à¦¾à¦²à§‡ à¦–à¦¬à¦° à¦ªà¦¾à¦“à¦¯à¦¼à¦¾ à¦¯à¦¾à¦¯à¦¼ à¦¯à§‡, à¦¨à¦¾à§Žà¦¸à¦¿ à¦¨à§‡à¦¤à¦¾ à¦à¦¡à¦²à¦« à¦‡à¦•à¦®à§à¦¯à¦¾à¦¨ à¦†à¦°à§à¦œà§‡à¦¨à§à¦Ÿà¦¿à¦¨à¦¾à¦¤à§‡ à¦ªà¦¾à¦²à¦¿à¦¯à¦¼à§‡ à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦®à¦¾à¦¤à§à¦° à¦ªà¦¾à¦à¦šà¦œà¦¨ à¦¸à¦¦à¦¸à§à¦¯ à¦¨à¦¿à¦¯à¦¼à§‡ à¦®à§‹à¦¸à¦¾à¦¦ à¦à¦‡ à¦¨à¦¾à§Žà¦¸à¦¿ à¦¨à§‡à¦¤à¦¾à¦•à§‡ à¦†à¦°à§à¦œà§‡à¦¨à§à¦Ÿà¦¿à¦¨à¦¾ à¦¥à§‡à¦•à§‡ à¦‡à¦¸à¦°à¦¾à¦‡à¦²à§‡ à¦«à¦¿à¦°à¦¿à¦¯à¦¼à§‡ à¦à¦¨à§‡ à¦¸à¦°à§à¦¬à§‹à¦šà§à¦š à¦¶à¦¾à¦¸à§à¦¤à¦¿ à¦•à¦¾à¦°à§à¦¯à¦•à¦° à¦•à¦°à§‡à¥¤ à¦ªà§à¦°à¦¤à¦¿à¦Ÿà¦¿ à¦®à¦¹à¦¾à¦¦à§‡à¦¶à§‡à¦‡ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦à¦°à¦•à¦® à¦…à¦­à¦¿à¦¯à¦¾à¦¨ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾à¦° à¦‡à¦¤à¦¿à¦¹à¦¾à¦¸ à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦‡à¦¸à¦°à¦¾à¦¯à¦¼à§‡à¦²à§‡à¦° à¦¸à§à¦¬à¦¾à¦°à§à¦¥ à¦°à¦•à§à¦·à¦¾à¦¯à¦¼ &lsquo;à¦¯à§‡à¦•à§‹à¦¨à§‹&rsquo; à¦•à¦¿à¦›à§ à¦•à¦°à¦¤à§‡ à¦ªà§à¦°à¦¸à§à¦¤à§à¦¤ à¦¥à¦¾à¦•à§‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¥¤ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦¾à¦«à¦²à§à¦¯ à¦¬à§‡à¦¶ à¦¸à§à¦ªà¦°à¦¿à¦šà¦¿à¦¤ à¦à¦¬à¦‚ à¦œà¦¨à¦ªà§à¦°à¦¿à¦¯à¦¼à¥¤<br><br>à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¸à¦¬ à¦¥à§‡à¦•à§‡ à¦¶à¦•à§à¦¤à¦¿à¦¶à¦¾à¦²à§€ à¦¦à¦¿à¦• à¦¹à¦šà§à¦›à§‡ à¦à¦¦à§‡à¦° à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦à¦¬à¦‚ à¦®à§‡à¦§à¦¾à¥¤ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦‰à§Žà¦ªà¦¾à¦¦à¦¨, à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦…à¦¸à§à¦¤à§à¦°-à¦¶à¦¸à§à¦¤à§à¦° à¦¤à§ˆà¦°à¦¿à¦¤à§‡à¦“ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦à¦• à¦¨à¦®à§à¦¬à¦° à¦à¦‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¥¤ à§§à§¯à§¬à§­ à¦¸à¦¾à¦²à§‡à¦° à¦¯à§à¦¦à§à¦§à§‡ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦®à¦¿à¦—-à§¨à§§ à¦¬à¦¿à¦®à¦¾à¦¨à§‡à¦° à¦•à¦¾à¦°à¦£à§‡ à¦®à¦¾à¦¤à§à¦° à¦›à¦¯à¦¼ à¦¦à¦¿à¦¨à§‡ à¦†à¦°à¦¬à¦¦à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦œà¦¯à¦¼à¦²à¦¾à¦­ à¦•à¦°à¦¤à§‡ à¦­à§à¦®à¦¿à¦•à¦¾ à¦°à¦¾à¦–à§‡à¥¤<br><br>à¦¤à¦¬à§‡ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦¨à¦¿à¦¯à¦¼à§‡à¦“ à¦¨à¦¾à¦¨à¦¾ à¦¸à¦®à¦¾à¦²à§‹à¦šà¦¨à¦¾ à¦†à¦›à§‡à¥¤ à¦œà¦¾à¦¤à¦¿à¦¸à¦‚à¦˜à§‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦­à§‚à¦®à¦¿à¦•à¦¾ à¦¨à¦¿à¦¯à¦¼à§‡ à¦¬à¦¾à¦° à¦¬à¦¾à¦° à¦†à¦²à§‹à¦šà¦¨à¦¾ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦®à§‹à¦¸à¦¾à¦¦ à¦—à§à¦ªà§à¦¤à¦¹à¦¤à§à¦¯à¦¾à¦¯à¦¼à¦“ à¦¬à¦¿à¦¶à§‡à¦· à¦ªà¦¾à¦°à¦¦à¦°à§à¦¶à§€à¥¤ à¦¤à¦¾à¦°à¦¾ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¸à¦®à¦¯à¦¼à§‡ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¦à§‡à¦¶à§‡ à¦—à§à¦ªà§à¦¤à¦¹à¦¤à§à¦¯à¦¾ à¦˜à¦Ÿà¦¿à¦¯à¦¼à§‡à¦›à§‡ à¦à¦¬à¦‚ à¦à¦¸à¦¬ à¦˜à¦Ÿà¦¨à¦¾ à¦ªà§à¦°à¦®à¦¾à¦¨à¦¿à¦¤ à¦¹à¦“à¦¯à¦¼à¦¾à¦° à¦ªà¦°à¦“ à¦¤à¦¾à¦¦à§‡à¦° à¦ªà¦•à§à¦· à¦¥à§‡à¦•à§‡ à¦•à§‹à¦¨ à¦¦à§‹à¦· à¦¸à§à¦¬à§€à¦•à¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¦¨à¦¿à¥¤<br><br>à¦œà¦¨à¦¶à§à¦°à§à¦¤à¦¿ à¦°à¦¯à¦¼à§‡à¦›à§‡ à¦ªà¦¿à¦à¦²à¦“ à¦à¦° à¦œà¦¨à¦ªà§à¦°à¦¿à¦¯à¦¼ à¦¨à§‡à¦¤à¦¾ à¦‡à¦¯à¦¼à¦¾à¦¸à¦¿à¦° à¦†à¦°à¦¾à¦«à¦¾à¦¤ à¦¹à¦¤à§à¦¯à¦¾à¦° à¦ªà¦¿à¦›à¦¨à§‡ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¹à¦¾à¦¤ à¦›à¦¿à¦²à¥¤ à¦à¦Ÿà¦¿ à¦œà¦¾à¦¨à¦¾ à¦¯à¦¾à¦¯à¦¼ à¦¯à§‡ à¦à¦‡ à¦¨à§‡à¦¤à¦¾à¦•à§‡ à¦¬à¦¿à¦· à¦ªà§à¦°à¦¯à¦¼à§‹à¦— à¦•à¦°à§‡ à¦¹à¦¤à§à¦¯à¦¾ à¦•à¦°à§‡ à¦®à§‹à¦¸à¦¾à¦¦à¥¤<br><br><strong>à§¨. #à¦¸à§‡à¦¨à§à¦Ÿà§à¦°à¦¾à¦²_à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸_à¦à¦œà§‡à¦¨à§à¦¸à¦¿ à¦¬à¦¾ à¦¸à¦¿à¦†à¦‡à¦</strong><br>à¦¸à§‡à¦¨à§à¦Ÿà§à¦°à¦¾à¦² à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦à¦œà§‡à¦¨à§à¦¸à¦¿ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¸à¦°à§à¦¬à¦¬à§ƒà¦¹à§Ž à¦à¦¬à¦‚ à¦…à¦¨à§à¦¯à¦¤à¦® à¦¤à§à¦–à§‹à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¯à¦¾ à¦¸à¦¿à¦†à¦‡à¦ (CIA) à¦¨à¦¾à¦®à§‡ à¦¬à§‡à¦¶à¦¿ à¦ªà¦°à¦¿à¦šà¦¿à¦¤à¥¤ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦•à§‡à¦¨à§à¦¦à§à¦°à§€à¦¯à¦¼ à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦†à¦“à¦¤à¦¾à¦§à§€à¦¨ à¦à¦•à¦Ÿà¦¿ à¦¬à§‡à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¥¤ à¦à¦Ÿà¦¿ à¦à¦•à¦Ÿà¦¿ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨ à¦¸à¦‚à¦¸à§à¦¥à¦¾, à¦¯à¦¾à¦° à¦¦à¦¾à¦¯à¦¼à¦¿à¦¤à§à¦¬ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾ à¦¨à¦¿à¦¶à§à¦šà¦¿à¦¤ à¦•à¦°à¦¾ à¦à¦¬à¦‚ à¦‰à¦šà§à¦šà¦ªà¦¦à¦¸à§à¦¥ à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦•à¦¦à§‡à¦° à¦•à¦¾à¦›à§‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦°à¦¬à¦°à¦¾à¦¹ à¦•à¦°à¦¾à¥¤<br><br>à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§à¦•à¦¾à¦²à§€à¦¨ à¦¸à¦®à¦¯à¦¼à§‡ à¦—à¦ à¦¿à¦¤ à¦…à¦«à¦¿à¦¸ à¦…à¦« à¦¸à§à¦Ÿà§à¦°à§à¦¯à¦¾à¦Ÿà§‡à¦œà¦¿à¦• à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸à§‡à¦¸ (OSS)-à¦à¦° à¦‰à¦¤à§à¦¤à¦°à¦¸à§‚à¦°à§€ à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦¸à¦¿à¦†à¦‡à¦à¦° à¦œà¦¨à§à¦®à¥¤ à¦à¦° à¦•à¦¾à¦œ à¦›à¦¿à¦²à§‹ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦° à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¶à¦¾à¦–à¦¾-à¦ªà§à¦°à¦¶à¦¾à¦–à¦¾à¦° à¦®à¦§à§à¦¯à§‡ à¦¤à¦¥à§à¦¯ à¦†à¦¦à¦¾à¦¨-à¦ªà§à¦°à¦¦à¦¾à¦¨ à¦•à¦°à¦¾à¥¤ à§§à§¯à§ªà§­ à¦¸à¦¾à¦²à§‡ à¦…à¦¨à§à¦®à§‹à¦¦à¦¿à¦¤ à¦¹à¦“à¦¯à¦¼à¦¾ à¦¨à§à¦¯à¦¾à¦¶à¦¨à¦¾à¦² à¦¸à¦¿à¦•à¦¿à¦‰à¦°à¦¿à¦Ÿà¦¿ à¦…à§à¦¯à¦¾à¦•à§à¦Ÿ à¦¬à¦¾ à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾ à¦†à¦‡à¦¨à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦¸à¦¿à¦†à¦‡à¦ à¦—à¦ à¦¨ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤<br><br>à¦¸à¦¿à¦†à¦‡à¦à¦° à¦ªà§à¦°à¦¾à¦¥à¦®à¦¿à¦• à¦•à¦¾à¦œ à¦¹à¦šà§à¦›à§‡ à¦¬à¦¿à¦¦à§‡à¦¶à¦¿ à¦¸à¦°à¦•à¦¾à¦°, à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦“ à¦¬à§à¦¯à¦•à§à¦¤à¦¿à¦¦à§‡à¦° à¦¸à¦®à§à¦¬à¦¨à§à¦§à§‡ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦•à¦°à¦¾ à¦à¦¬à¦‚ à¦¤à¦¾ à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦•à¦¦à§‡à¦° à¦•à¦¾à¦›à§‡ à¦¤à¦¾ à¦¸à¦°à¦¬à¦°à¦¾à¦¹ à¦“ à¦ªà¦°à¦¾à¦®à¦°à§à¦¶ à¦ªà§à¦°à¦¦à¦¾à¦¨ à¦•à¦°à¦¾à¥¤ à¦¸à¦¿à¦†à¦‡à¦ à¦à¦¬à¦‚ à¦à¦° à¦¦à¦¾à¦¯à¦¼à¦¬à¦¦à§à¦§à¦¤à¦¾ à§¨à§¦à§¦à§ª à¦¸à¦¾à¦²à§‡ à¦‰à¦²à§à¦²à§‡à¦–à¦¯à§‹à¦—à§à¦¯à¦­à¦¾à¦¬à§‡ à¦ªà¦°à¦¿à¦¬à¦°à§à¦¤à¦¿à¦¤ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤<br><br>à§¨à§¦à§¦à§ª à¦¸à¦¾à¦²à§‡à¦° à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦°à§‡à¦° à¦ªà§‚à¦°à§à¦¬à§‡ à¦¸à¦¿à¦†à¦‡à¦ à¦›à¦¿à¦²à§‹ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¥¤ à¦à¦Ÿà¦¿ à¦¶à§à¦§à§ à¦¨à¦¿à¦œà§‡à¦° à¦•à¦°à§à¦®à¦•à¦¾à¦£à§à¦¡à¦‡ à¦¨à¦¯à¦¼, à¦¬à¦°à¦‚ à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦—à§à¦²à§‹à¦° à¦•à¦°à§à¦®à¦•à¦¾à¦£à§à¦¡à¦“ à¦¦à§‡à¦–à¦¾à¦¶à§‹à¦¨à¦¾ à¦•à¦°à¦¤à§‹à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à§¨à§¦à§¦à§ª à¦¸à¦¾à¦²à§‡ à¦…à¦¨à§à¦®à§‹à¦¦à¦¿à¦¤ à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦°à¦¿à¦«à¦°à§à¦® à¦…à§à¦¯à¦¾à¦¨à§à¦¡ à¦Ÿà§‡à¦°à¦°à¦¿à¦œà¦® à¦ªà§à¦°à¦¿à¦­à§‡à¦¨à¦¶à¦¨ à¦…à§à¦¯à¦¾à¦•à§à¦Ÿ, à§¨à§¦à§¦à§ª à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦¤à¦¾ à¦ªà¦°à¦¿à¦¬à¦°à§à¦¤à¦¿à¦¤ à¦¹à¦¯à¦¼à¥¤ à¦¸à¦¿à¦†à¦‡à¦ à¦ªà§à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿà§‡à¦° à¦…à¦¨à§à¦°à§‹à¦§à§‡ à¦—à§‹à¦ªà¦¨ à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦®à§‡à¦“ à¦…à¦‚à¦¶ à¦¨à§‡à¦¯à¦¼à¥¤ à¦à¦° à¦ªà¦¾à¦¶à¦¾à¦ªà¦¾à¦¶à¦¿ à¦†à¦§à¦¾à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦à¦¬à¦‚ à¦…à¦¨à§à¦¯ à¦¦à§‡à¦¶à§‡ à¦°à¦¾à¦œà¦¨à§ˆà¦¤à¦¿à¦• à¦ªà§à¦°à¦­à¦¾à¦¬ à¦¬à¦¿à¦¸à§à¦¤à¦¾à¦°à§‡à¦° à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¿à¦¤ à¦¹à¦¯à¦¼à§‡ à¦¥à¦¾à¦•à§‡ à¦¬à¦¿à¦¶à§‡à¦· à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦¬à¦¿à¦­à¦¾à¦—à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡à¥¤<br><br>à¦¸à¦¿à¦†à¦‡à¦ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¸à¦¬ à¦§à¦°à¦¨à§‡à¦° à¦¡à¦¿à¦­à¦¾à¦‡à¦¸à§‡ à¦à¦•à¦¸à§‡à¦¸ à¦¨à¦¿à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¥¤ à¦¬à¦¿à¦¶à§‡à¦· à¦¸à¦¾à¦°à§à¦š à¦‡à¦žà§à¦œà¦¿à¦¨à§‡à¦° à¦¸à¦¾à¦¹à¦¾à¦¯à§à¦¯à§‡ à¦…à¦¨à¦²à¦¾à¦‡à¦¨-à¦…à¦«à¦²à¦¾à¦‡à¦¨à§‡à¦° à¦¸à¦¬ à¦§à¦°à¦¨à§‡à¦° à¦¤à¦¥à§à¦¯ à¦¤à¦¾à¦°à¦¾ à¦ªà§‡à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¦¨à¥¤ à¦¸à¦¿à¦†à¦‡à¦à¦° à¦®à¦¤à§‹ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦•à§‡ à¦«à¦¾à¦à¦•à¦¿ à¦¦à§‡à¦¯à¦¼à¦¾à¦° à¦œà¦¨à§à¦¯ à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸à§€à¦°à¦¾ à¦¡à§‡à¦Ÿà¦¾ à¦à¦¨à¦•à§à¦°à¦¿à¦ªà¦¶à¦¨ à¦ªà¦¦à§à¦§à¦¤à¦¿à¦° à¦†à¦¶à§à¦°à¦¯à¦¼ à¦¨à§‡à¦¯à¦¼à¥¤<br><br>à¦à¦° à¦¸à¦¦à¦° à¦¦à¦«à¦¤à¦° à¦­à¦¾à¦°à§à¦œà¦¿à¦¨à¦¿à¦¯à¦¼à¦¾à¦° à¦²à§à¦¯à¦¾à¦‚à¦²à§‡à¦° à¦œà¦°à§à¦œ à¦¬à§à¦¶ à¦¸à§‡à¦¨à§à¦Ÿà¦¾à¦° à¦«à¦° à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸à§‡à¥¤ à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦• à¦®à¦¾à¦‡à¦• à¦ªà¦®à§à¦ªà§‡à¦“à¥¤ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦¦à§à¦°à§à¦¨à§€à¦¤à¦¿ à¦à¦¬à¦‚ à¦…à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾à¦ªà¦¨à¦¾à¦° à¦•à¦¾à¦°à¦£à§‡ à§¯/à§§à§§ à¦à¦° à¦¬à¦¿à¦®à¦¾à¦¨ à¦¹à¦¾à¦®à¦²à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦°à§‹à¦§à§‡ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦° à¦¬à§à¦¯à¦°à§à¦¥ à¦¹à¦¯à¦¼à¥¤ à¦†à¦«à¦—à¦¾à¦¨à¦¿à¦¸à§à¦¥à¦¾à¦¨à§‡ à§§à§¦ à¦²à¦¾à¦– à¦¸à§‹à¦­à¦¿à¦¯à¦¼à§‡à¦¤ à¦¸à§ˆà¦¨à§à¦¯à§‡à¦° à¦†à¦—à¦®à¦¨ à¦¸à¦®à§à¦ªà¦°à§à¦• à¦•à§‹à¦¨à§‹ à¦¤à¦¥à§à¦¯ à¦¤à¦¾à¦°à¦¾ à¦ªà¦¾à¦¯à¦¼à¦¨à¦¿ à¦à¦¬à¦‚ à¦‡à¦°à¦¾à¦•à§‡ à¦¸à¦¾à¦¦à§à¦¦à¦¾à¦® à¦¹à§‹à¦¸à§‡à¦¨ à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦¬à§à¦¯à¦¾à¦ªà¦• à¦¬à¦¿à¦§à§à¦¬à¦‚à¦¸à§€ à¦…à¦¸à§à¦¤à§à¦° à¦¥à¦¾à¦•à¦¾à¦° à¦…à¦­à¦¿à¦¯à§‹à¦— à¦ªà§à¦°à¦®à¦¾à¦£ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¦¨à¦¿à¥¤<br><br>à¦¸à¦¿à¦†à¦‡à¦à¦° à¦¸à¦¬ à¦¥à§‡à¦•à§‡ à¦¨à§‡à¦¤à¦¿à¦¬à¦¾à¦šà¦• à¦¦à¦¿à¦• à¦¹à¦šà§à¦›à§‡ à¦à¦¦à§‡à¦° à¦¬à¦¿à¦°à§à¦¦à§à¦§à§‡ à¦¬à¦¿à¦¶à§à¦¬à¦¬à§à¦¯à¦¾à¦ªà§€ à¦¹à¦¿à¦Ÿà¦®à§à¦¯à¦¾à¦¨ (à¦­à¦¾à¦¡à¦¼à¦¾à¦Ÿà§‡ à¦¦à¦•à§à¦· à¦–à§à¦¨à§€) à¦¨à¦¿à¦¯à¦¼à§‹à¦—à§‡à¦° à¦…à¦­à¦¿à¦¯à§‹à¦— à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦¯à¦¾à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦¤à¦¾à¦°à¦¾ à¦ªà¦²à¦¿à¦Ÿà¦¿à¦•à§à¦¯à¦¾à¦² à¦•à¦¿à¦²à¦¿à¦‚ à¦•à¦°à§‡ à¦¥à¦¾à¦•à§‡à¥¤<br><br><strong>à§©. #à¦à¦®à¦†à¦‡à¦¸à¦¿à¦•à§à¦¸</strong><br>à¦œà§‡à¦®à¦¸ à¦¬à¦¨à§à¦¡ à¦¸à¦¿à¦°à¦¿à¦œà§‡à¦° à¦®à§à¦­à¦¿à¦—à§à¦²à§‹ à¦¬à§‡à¦¶ à¦œà¦¨à¦ªà§à¦°à¦¿à¦¯à¦¼à¥¤ à¦à¦œà§‡à¦¨à§à¦Ÿ à§¦à§¦à§­ à¦¯à¦¿à¦¨à¦¿ à¦¬à§à¦°à¦¿à¦Ÿà¦¿à¦¶ à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦Ÿ à¦à¦œà§‡à¦¨à§à¦¸à¦¿ à¦à¦®à¦†à¦‡à¦¸à¦¿à¦•à§à¦¸à§‡à¦° (MI6) à¦¦à§à¦°à§à¦§à¦°à§à¦· à¦¸à§à¦ªà¦¾à¦‡ à¦¥à¦¾à¦•à§‡à¦¨à¥¤ à¦œà§€à¦¬à¦¨à§‡à¦° à¦à§à¦à¦•à¦¿ à¦¨à¦¿à¦¯à¦¼à§‡ à¦¤à¦¿à¦¨à¦¿ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦•à¦°à§à¦®à¦•à¦¾à¦£à§à¦¡ à¦¸à¦®à§à¦ªà¦¨à§à¦¨ à¦•à¦°à§‡ à¦¥à¦¾à¦•à§‡à¦¨à¥¤ à¦œà§‡à¦®à¦¸ à¦¬à¦¨à§à¦¡ à¦®à§à¦­à¦¿à¦° à¦®à¦¤à§‹ à¦¹à¦¯à¦¼à¦¤à§‹ à¦¬à¦¾à¦¸à§à¦¤à¦¬à§‡ à¦¸à§à¦ªà¦¾à¦‡à¦°à¦¾ à¦•à¦¾à¦œ à¦•à¦°à§‡à¦¨ à¦¨à¦¾à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦¬à¦¾à¦¸à§à¦¤à¦¬à§‡ à¦à¦®à¦†à¦‡à¦¸à¦¿à¦•à§à¦¸ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤<br><br>à¦à¦®à¦†à¦‡à¦¸à¦¿à¦•à§à¦¸ à¦¬à§à¦°à¦¿à¦Ÿà¦¿à¦¶ à¦®à¦¿à¦²à¦¿à¦Ÿà¦¾à¦°à¦¿à¦° à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦à¦° à¦à¦•à¦Ÿà¦¿ à¦¬à¦¿à¦¶à§‡à¦·à¦¾à¦¯à¦¼à¦¿à¦¤ à¦¶à¦¾à¦–à¦¾à¥¤ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦…à¦«à¦¿à¦¸à¦¿à¦¯à¦¼à¦¾à¦² à¦¨à¦¾à¦® à¦¸à¦¿à¦•à§à¦°à§‡à¦Ÿ à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸ (à¦à¦¸à¦†à¦‡à¦à¦¸)à¥¤ à§§à§¯à§¦à§¯ à¦¸à¦¾à¦²à§‡à¦° à¦…à¦•à§à¦Ÿà§‹à¦¬à¦°à§‡ à¦¸à¦¿à¦•à§à¦°à§‡à¦Ÿ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸ à¦¬à§à¦¯à§à¦°à§‹ à¦¨à¦¾à¦®à§‡ à¦à¦Ÿà¦¿ à¦—à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼à¥¤ à¦“à¦‡ à¦¸à¦®à¦¯à¦¼à§‡ à¦¬à§à¦¯à§à¦°à§‹ à¦¨à§‡à¦­à¦¾à¦² à¦“ à¦†à¦°à§à¦®à¦¿ à¦¸à§‡à¦•à¦¶à¦¨ à¦¨à¦¾à¦®à§‡ à¦¦à§&rsquo;à¦Ÿà¦¿ à¦¬à¦¿à¦­à¦¾à¦—à§‡ à¦•à¦¾à¦œ à¦•à¦°à¦¤à¥¤ à¦¨à§‡à¦­à¦¾à¦² à¦¬à¦¿à¦­à¦¾à¦—à§‡à¦° à¦•à¦¾à¦œ à¦›à¦¿à¦² à¦…à¦¨à§à¦¯ à¦¦à§‡à¦¶à§‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾à¦—à¦¿à¦°à¦¿à¥¤ à¦…à¦¨à§à¦¯à¦¦à¦¿à¦•à§‡ à¦†à¦°à§à¦®à¦¿ à¦¬à¦¿à¦­à¦¾à¦—à§‡à¦° à¦•à¦¾à¦œ à¦›à¦¿à¦² à¦…à¦­à§à¦¯à¦¨à§à¦¤à¦°à§€à¦£ à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸ à¦¦à¦®à¦¨à¥¤ à¦ªà¦°à§‡ à¦¨à§‡à¦­à¦¾à¦² à¦¬à¦¿à¦­à¦¾à¦—à§‡à¦° à¦¨à¦¾à¦® à¦¦à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼ à¦à¦®à¦†à¦‡ à¦¸à¦¿à¦•à§à¦¸ à¦†à¦° à¦†à¦°à§à¦®à¦¿ à¦¬à¦¿à¦­à¦¾à¦—à§‡à¦° à¦¨à¦¾à¦® à¦¦à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼ à¦à¦®à¦†à¦‡ à¦«à¦¾à¦‡à¦­à¥¤<br><br>à¦à¦¸à¦†à¦‡à¦à¦¸à§‡à¦° à¦¸à¦¦à¦° à¦¦à¦ªà§à¦¤à¦° à¦²à¦¨à§à¦¡à¦¨à§‡à¦° à¦à¦¸à¦†à¦‡à¦à¦¸ à¦¬à¦¿à¦²à§à¦¡à¦¿à¦‚à¥¤ à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦à¦¸à¦†à¦‡à¦à¦¸ à¦ªà§à¦°à¦§à¦¾à¦¨ à¦à¦²à§‡à¦•à§à¦¸ à¦‡à¦¯à¦¼à¦‚à¦—à¦¾à¦°à¥¤ à§§à§¯à§§à§§ à¦¸à¦¾à¦²à§‡ à¦¸à¦¿à¦•à§à¦°à§‡à¦Ÿ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸ à¦¬à§à¦¯à§à¦°à§‹à¦° à¦¨à¦¾à¦® à¦ªà¦°à¦¿à¦¬à¦°à§à¦¤à¦¨ à¦•à¦°à§‡ à¦¸à¦¿à¦•à§à¦°à§‡à¦Ÿ à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤ à¦à¦®à¦†à¦‡ à¦¸à¦¿à¦•à§à¦¸à§‡à¦° à¦¦à§€à¦°à§à¦˜ à¦‡à¦¤à¦¿à¦¹à¦¾à¦¸ à¦°à¦¯à¦¼à§‡à¦›à§‡ à¦ªà§à¦°à¦¤à¦¿à¦¦à§à¦¬à¦¨à§à¦¦à§à¦¬à§€ à¦¦à§‡à¦¶à§‡ à¦¹à¦¾à¦®à¦²à¦¾ à¦“ à¦¹à¦¤à§à¦¯à¦¾à¦•à¦¾à¦£à§à¦¡à§‡ à¦¸à¦®à§à¦ªà§ƒà¦•à§à¦¤à¦¤à¦¾à¦°à¥¤ à¦ à¦œà¦¨à§à¦¯ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿ à¦‡à¦¸à¦°à¦¾à¦‡à¦²à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦®à§‹à¦¸à¦¾à¦¦, à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦¸à¦¿à¦†à¦‡à¦&rsquo;à¦° à¦¸à¦¹à¦¯à§‹à¦—à¦¿à¦¤à¦¾ à¦¨à¦¿à¦¯à¦¼à§‡à¦›à§‡ à¦†à¦¬à¦¾à¦° à¦•à¦–à¦¨à§‹ à¦¸à¦¹à¦¯à§‹à¦—à¦¿à¦¤à¦¾ à¦•à¦°à§‡à¦›à§‡à¥¤ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦‡à¦¸à§à¦¯à§à¦¤à§‡ à¦ à¦¤à¦¿à¦¨à¦Ÿà¦¿ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦à¦•à¦¸à¦¾à¦¥à§‡à¦‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¦›à§‡ à¦¬à¦²à§‡ à¦œà¦¾à¦¨à¦¾ à¦¯à¦¾à¦¯à¦¼à¥¤<br><br>à¦à¦¶à¦¿à¦¯à¦¼à¦¾ à¦Ÿà¦¾à¦‡à¦®à¦¸ à¦ªà¦¤à§à¦°à¦¿à¦•à¦¾à¦¯à¦¼ à¦¸à¦¾à¦‚à¦¬à¦¾à¦¦à¦¿à¦• à¦°à¦¿à¦šà¦¾à¦°à§à¦¡ à¦à¦® à¦¬à¦¾à¦¨à§‡à¦Ÿà§‡à¦° à¦à¦®à¦†à¦‡ à¦¸à¦¿à¦•à§à¦¸à§‡à¦° à¦¹à¦¤à§à¦¯à¦¾à¦•à¦¾à¦£à§à¦¡à§‡à¦° à¦¸à¦‚à¦•à§à¦·à¦¿à¦ªà§à¦¤ à¦¤à¦¾à¦²à¦¿à¦•à¦¾ à¦¸à¦®à§à¦ªà¦°à§à¦•à¦¿à¦¤ à¦à¦•à¦Ÿà¦¿ à¦ªà§à¦°à¦¤à¦¿à¦¬à§‡à¦¦à¦¨ à§¨à§¦à§¦à§© à¦¸à¦¾à¦²à§‡à¦° à¦œà§à¦¨ à¦®à¦¾à¦¸à§‡ à¦ªà§à¦°à¦•à¦¾à¦¶ à¦•à¦°à§‡à¥¤ à§§à§¯à§­à§¦ à¦¸à¦¾à¦²à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦¦à¦¿à¦•à§‡ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¹à¦¿à¦Ÿ à¦¸à§à¦•à§‹à¦¯à¦¼à¦¾à¦¡ à¦•à¦¿à¦¡à¦¨à§‡à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦°à¦¾à¦«à¦¾à¦¯à¦¼à§‡à¦² à¦‡à¦¤à¦¾à¦¨ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦° à¦¹à¦¾à¦°à¦«à§‹à¦°à§à¦¡à§‡ à¦¸à¦«à¦°à§‡à¦° à¦ªà¦° à¦¬à§à¦°à¦¿à¦Ÿà§‡à¦¨à§‡à¦° à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾ à¦ªà¦²à¦¿à¦¸à¦¿à¦° à¦¬à¦¡à¦¼ à¦ªà¦°à¦¿à¦¬à¦°à§à¦¤à¦¨ à¦†à¦¸à§‡à¥¤ à¦à¦‡ à¦¸à¦«à¦°à§‡à¦° à¦•à¦¿à¦›à§ à¦¦à¦¿à¦¨ à¦ªà¦° à¦²à¦¨à§à¦¡à¦¨à§‡ à¦«à¦¿à¦²à¦¿à¦¸à§à¦¤à¦¿à¦¨ à¦®à§à¦•à§à¦¤à¦¿ à¦†à¦¨à§à¦¦à§‹à¦²à¦¨à§‡à¦° à¦¦à§à¦‡ à¦¨à§‡à¦¤à¦¾à¦•à§‡ à¦¹à¦¤à§à¦¯à¦¾ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤<br><br>à¦¹à¦¤à§à¦¯à¦¾à¦•à¦¾à¦£à§à¦¡à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦à¦®à¦†à¦‡ à¦¸à¦¿à¦•à§à¦¸ à¦“ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¸à¦®à§à¦ªà§ƒà¦•à§à¦¤à¦¤à¦¾ à¦›à¦¿à¦²à¥¤ à§§à§¯à§®à§® à¦¸à¦¾à¦²à§‡ à¦¤à¦¿à¦¨à¦œà¦¨ à¦†à¦‡à¦°à¦¿à¦¶ à¦°à¦¿à¦ªà¦¾à¦¬à¦²à¦¿à¦•à¦¾à¦¨ à¦†à¦°à§à¦®à¦¿à¦•à§‡ à¦œà¦¿à¦¬à§à¦°à¦¾à¦²à¦Ÿà¦¾à¦°à§‡ à¦¹à¦¤à§à¦¯à¦¾ à¦•à¦°à§‡ à¦‡à¦‰à¦•à§‡ à¦¸à§à¦ªà§‡à¦¶à¦¾à¦² à¦«à§‹à¦°à§à¦¸à§‡à¦¸à¥¤ à¦à¦° à¦¸à¦¾à¦¥à§‡à¦“ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¸à¦®à§à¦ªà§ƒà¦•à§à¦¤à¦¤à¦¾ à¦›à¦¿à¦²à¥¤<br><br>à¦ªà§à¦°à¦¤à¦¿à¦¬à§‡à¦¦à¦¨à§‡ à¦†à¦°à§‹ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ à¦¬à§à¦°à¦¿à¦Ÿà¦¿à¦¶ à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€ à¦Ÿà¦¨à¦¿ à¦¬à§à¦²à§‡à¦¯à¦¼à¦¾à¦° à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦•à¦¾à¦›à§‡ à¦¤à¦¾à¦° à¦¦à§‡à¦¶à§‡à¦° à¦¨à¦¾à¦—à¦°à¦¿à¦•à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦¹à§à¦®à¦•à¦¿ à¦à¦®à¦¨ à¦²à§‹à¦•à¦¦à§‡à¦° à¦à¦•à¦Ÿà¦¿ à¦¤à¦¾à¦²à¦¿à¦•à¦¾ à¦¦à¦¿à¦¯à¦¼à§‡à¦›à¦¿à¦²à¥¤ à¦®à¦¿à¦¸à¦°à§‡à¦° à¦œà¦¨à¦ªà§à¦°à¦¿à¦¯à¦¼ à¦ªà§à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿ à¦œà¦¾à¦®à¦¾à¦² à¦†à¦¬à¦¦à§à¦² à¦¨à¦¾à¦¸à§‡à¦°à¦•à§‡ à¦¹à¦¤à§à¦¯à¦¾à¦° à¦ªà¦°à¦¿à¦•à¦²à§à¦ªà¦¨à¦¾à¦¯à¦¼ à¦¸à¦®à¦°à§à¦¥à¦¨ à¦¦à¦¿à¦¯à¦¼à§‡à¦›à¦¿à¦² à¦à¦®à¦†à¦‡à¦¸à¦¿à¦•à§à¦¸à¥¤ à¦¨à¦¾à¦°à§à¦­ à¦—à§à¦¯à¦¾à¦¸ à¦ªà§à¦°à¦¯à¦¼à§‹à¦—à§‡ à¦¤à¦¾à¦•à§‡ à¦¹à¦¤à§à¦¯à¦¾à¦° à¦ªà¦°à¦¿à¦•à¦²à§à¦ªà¦¨à¦¾ à¦•à¦°à§‡à¦›à¦¿à¦² à¦à¦‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¥¤ à¦…à¦¬à¦¶à§à¦¯ à§§à§¯à§­à§¦ à¦¸à¦¾à¦²à§‡ à¦¤à¦¿à¦¨à¦¿ à¦¹à¦¾à¦°à§à¦Ÿ à¦…à§à¦¯à¦¾à¦Ÿà¦¾à¦•à§‡ à¦®à¦¾à¦°à¦¾ à¦¯à¦¾à¦¨à¥¤<br><br>à§§à§¯à§¬à§¦ à¦¸à¦¾à¦²à§‡ à¦¹à¦¤à§à¦¯à¦¾à¦° à¦ªà¦°à¦¿à¦•à¦²à§à¦ªà¦¨à¦¾ à¦•à¦°à§‡ à¦•à¦™à§à¦—à§‹à¦° à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€ à¦œà¦¾à¦¤à§€à¦¯à¦¼à¦¤à¦¾à¦¬à¦¾à¦¦à§€ à¦¨à§‡à¦¤à¦¾ à¦ªà§à¦¯à¦¾à¦Ÿà¦°à¦¿à¦• à¦²à§à¦®à¦¾à¦®à¦¬à¦¾à¦•à§‡à¥¤ à§§à§¯à§¬à§§ à¦¸à¦¾à¦²à§‡ à¦¤à¦¿à¦¨à¦¿ à¦¨à¦¿à¦¹à¦¤ à¦¹à¦¨à¥¤ à¦…à¦«à¦¿à¦¸à¦¿à¦¯à¦¼à¦¾à¦²à¦¿ à¦¤à¦¾à¦•à§‡ à¦¹à¦¤à§à¦¯à¦¾à¦° à¦…à¦¨à§à¦®à¦¤à¦¿ à¦¦à§‡à¦¯à¦¼ à¦¹à¦¾à¦“à¦¯à¦¼à¦¾à¦°à§à¦¡ à¦¸à§à¦®à¦¿à¦¥ à¦¨à¦¾à¦®à§‡à¦° à¦à¦• à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾à¥¤ à¦ªà¦°à§‡ à¦à¦‡ à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾à¦•à§‡ à¦à¦®à¦†à¦‡ à¦«à¦¾à¦‡à¦­à§‡à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦¬à¦¾à¦¨à¦¾à¦¨à§‹ à¦¹à¦¯à¦¼à¥¤ à§§<br><br>à§¯à§­à§¨ à¦¸à¦¾à¦²à§‡ à¦œà¦¨ à¦“à¦¯à¦¼à¦¾à¦‡à¦®à§à¦¯à¦¾à¦¨ à¦†à¦¯à¦¼à¦¾à¦°à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦° à¦°à¦¾à¦œà¦¨à§ˆà¦¤à¦¿à¦• à¦¨à§‡à¦¤à¦¾à¦¦à§‡à¦° à¦¬à§‹à¦®à¦¾ à¦¹à¦¾à¦®à¦²à¦¾ à¦•à¦°à§‡ à¦¹à¦¤à§à¦¯à¦¾à¦° à¦à¦•à¦Ÿà¦¿ à¦ªà¦°à¦¿à¦•à¦²à§à¦ªà¦¨à¦¾ à¦—à§à¦°à¦¹à¦£ à¦•à¦°à§‡à¥¤ à¦“à¦¯à¦¼à¦¾à¦‡à¦®à§à¦¯à¦¾à¦¨ à¦†à¦‡à¦°à¦¿à¦¶ à¦°à¦¿à¦ªà¦¾à¦¬à¦²à¦¿à¦•à¦¾à¦¨ à¦†à¦°à§à¦®à¦¿ à¦¨à§‡à¦¤à¦¾ à¦²à¦¿à¦Ÿà¦²à¦œà¦¨à¦¸à¦•à§‡ à¦ à¦¸à¦‚à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦à¦•à¦Ÿà¦¿ à¦¤à¦¾à¦²à¦¿à¦•à¦¾ à¦¦à§‡à¦¯à¦¼à¥¤ à¦¤à¦¾à¦²à¦¿à¦•à¦¾à¦¯à¦¼ à¦¸à§à¦¯à¦¾à¦®à§à¦¯à¦¼à§‡à¦¸ à¦•à¦¸à§à¦Ÿà§‡à¦²à§‹, à¦¸à¦¿à¦¨ à¦•à¦¾à¦°à¦²à§à¦¯à¦¾à¦¨à§à¦¡ à¦“ à¦¸à¦¿à¦¨ à¦®à¦¾à¦‡à¦•à§‡à¦² à¦¸à§à¦Ÿà¦¾à¦‡à¦«à§‡à¦¨à§‡à¦° à¦¨à¦¾à¦® à¦›à¦¿à¦²à¥¤<br><br>à¦‰à¦²à§à¦²à§‡à¦–à§à¦¯ à¦¯à§‡ à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨à§‡ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¸à¦¬ à¦¥à§‡à¦•à§‡ à¦šà§Œà¦•à¦· à¦“ à¦¦à§à¦°à§à¦§à¦°à§à¦· à¦•à¦®à¦¾à¦¨à§à¦¡à§‹ à¦¬à¦¾à¦¹à¦¿à¦¨à§€ à¦¹à¦šà§à¦›à§‡ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦œà§à¦¯à§‡à¦° à¦¦à¦¿ à¦¸à§à¦ªà§‡à¦¶à¦¾à¦² à¦à¦¯à¦¼à¦¾à¦° à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸ (à¦à¦¸à¦à¦à¦¸)<br><br><strong>à§ª. #à¦à¦®à¦à¦¸à¦à¦¸</strong><br>à¦šà§€à¦¨à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦—à¦“à¦œà¦¿à¦¯à¦¼à¦¾ à¦…à§à¦¯à¦¾à¦‚à¦•à§‡à¦¨ à¦¬à§ à¦…à¦¥à¦¬à¦¾ à¦®à¦¿à¦¨à¦¿à¦¸à§à¦Ÿà§à¦°à¦¿ à¦…à¦¬ à¦¸à§à¦Ÿà§‡à¦Ÿ à¦¸à¦¿à¦•à¦¿à¦‰à¦°à¦¿à¦Ÿà¦¿à¥¤ à¦à¦Ÿà¦¿ à¦¬à¦¿à¦¶à§à¦¬à¦œà§à¦¡à¦¼à§‡ à¦à¦®à¦à¦¸à¦à¦¸ (MSS) à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤à¥¤<br><br>à¦šà§€à¦¨à¦¾ à¦à¦®à¦à¦¸à¦à¦¸à§‡à¦° à¦…à¦¨à§‡à¦• à¦•à¦¿à¦›à§à¦‡ à¦¸à¦¾à¦§à¦¾à¦°à¦£ à¦®à¦¾à¦¨à§à¦·à§‡à¦° à¦…à¦œà¦¾à¦¨à¦¾à¥¤ à¦†à¦° à¦à¦° à¦•à¦°à§à¦®à§€ à¦¸à¦‚à¦–à§à¦¯à¦¾ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¸à¦¬ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¤à§à¦²à¦¨à¦¾à¦¯à¦¼ à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦¬à§‡à¦¶à¦¿ à¦¬à¦²à§‡ à¦§à¦¾à¦°à¦£à¦¾ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤<br><br>à§¨à§¦à§¦à§« à¦¸à¦¾à¦²à§‡à¦° à¦à¦• à¦ªà§à¦°à¦¤à¦¿à¦¬à§‡à¦¦à¦¨à§‡ à¦œà¦¾à¦¨à¦¾ à¦¯à¦¾à¦¯à¦¼, à¦¶à§à¦§à§ à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾à¦¤à§‡à¦‡ à¦à¦®à¦à¦¸à¦à¦¸ à¦à¦° à¦à¦• à¦¹à¦¾à¦œà¦¾à¦° à¦‡à¦¨à¦«à¦°à§à¦®à¦¾à¦° à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦à¦®à¦à¦¸à¦à¦¸à§‡à¦° à¦¸à¦¦à¦° à¦¦à¦«à¦¤à¦° à¦šà§€à¦¨à§‡à¦° à¦°à¦¾à¦œà¦§à¦¾à¦¨à§€ à¦¬à§‡à¦‡à¦œà¦¿à¦‚à¦ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤à¥¤ à¦à¦° à¦œà¦¬à¦¾à¦¬à¦¦à¦¿à¦¹à¦¿à¦¤à¦¾ à¦¸à§à¦Ÿà§‡à¦Ÿ à¦•à¦¾à¦‰à¦¨à§à¦¸à¦¿à¦² à¦…à¦¬ à¦šà¦¾à¦¯à¦¼à¦¨à¦¾à¦° à¦•à¦¾à¦›à§‡à¥¤ à¦à¦®à¦à¦¸à¦à¦¸à§‡à¦° à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦ªà§à¦°à¦§à¦¾à¦¨ à¦šà§‡à¦¨ à¦“à¦¯à¦¼à§‡à¦¨à¦•à¦¿à¦‚à¥¤<br><br>à¦à¦° à¦®à§‚à¦² à¦¦à¦¾à¦¯à¦¼à¦¿à¦¤à§à¦¬ à¦¹à¦šà§à¦›à§‡ à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦—à§à¦ªà§à¦¤à¦¹à¦¤à§à¦¯à¦¾, à¦¬à¦°à§à¦¡à¦¾à¦° à¦¸à¦¾à¦°à§à¦­à§‡à¦‡à¦²à§à¦¯à¦¾à¦¨à§à¦¸, à¦…à¦­à§à¦¯à¦¨à§à¦¤à¦°à§€à¦£ à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦Ÿà§‡à¦°à¦°à¦¿à¦œà¦®, à¦¨à¦¿à¦œà¦¸à§à¦¬ à¦²à§‹à¦• à¦¸à¦‚à¦—à§à¦°à¦¹ à¦“ à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦¤à§ˆà¦°à¦¿, à¦¬à¦¿à¦¦à§‡à¦¶à¦¿ à¦•à§‚à¦Ÿà¦¨à§€à¦¤à¦¿à¦•à¦¦à§‡à¦° à¦“à¦ªà¦° à¦¨à¦œà¦°à¦¦à¦¾à¦°à¦¿, à¦¶à¦¤à§à¦°à§ à¦à¦œà§‡à¦¨à§à¦Ÿà¦¦à§‡à¦° à¦¸à¦¨à§à¦§à¦¾à¦¨, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦°à§‡à¦­à¦¿à¦‰à¦²à§à¦¯à§à¦¶à¦¨à¦¾à¦°à¦¿ à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦¦à¦®à¦¨, à¦¸à¦¾à¦‡à¦¬à¦¾à¦° à¦“à¦¯à¦¼à¦¾à¦°à¦«à§‡à¦¯à¦¼à¦¾à¦° à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦¨à¦¤à§à¦¨ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦¸à¦‚à¦—à§à¦°à¦¹, à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¬à¦¡à¦¼ à¦•à¦°à¦ªà§‹à¦°à§‡à¦¶à¦¨à¦—à§à¦²à§‹à¦° à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦£à§‡à¦° à¦šà§‡à¦·à§à¦Ÿà¦¾, à¦‡à¦¨à§à¦¡à¦¾à¦¸à§à¦Ÿà§à¦°à¦¿à¦¯à¦¼à¦¾à¦² à¦¸à§à¦ªà¦¿à¦“à¦¨à¦¾à¦œà¥¤<br><br>à¦à¦®à¦à¦¸à¦à¦¸à§‡à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦¬à¦¿à¦šà¦°à¦£ à¦à¦²à¦¾à¦•à¦¾ à¦®à§à¦¯à¦¾à¦•à¦¾à¦“, à¦¹à¦‚à¦•à¦‚, à¦¤à¦¾à¦‡à¦“à¦¯à¦¼à¦¾à¦¨, à¦¨à§‡à¦¦à¦¾à¦°à¦²à§à¦¯à¦¾à¦¨à§à¦¡à¦¸, à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾, à¦ªà¦¶à§à¦šà¦¿à¦® à¦‡à¦‰à¦°à§‹à¦ª, à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾, à¦®à¦¾à¦°à§à¦•à¦¿à¦¨ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°, à¦­à¦¾à¦°à¦¤, à¦œà¦¾à¦ªà¦¾à¦¨, à¦¨à§‡à¦ªà¦¾à¦², à¦¶à§à¦°à§€à¦²à¦™à§à¦•à¦¾, à¦¦à¦•à§à¦·à¦¿à¦£ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾, à¦‰à¦¤à§à¦¤à¦° à¦“ à¦ªà¦¶à§à¦šà¦¿à¦® à¦†à¦«à§à¦°à¦¿à¦•à¦¾ à¦“ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à¦¯à¦¼à¦¾à¦° à¦šà¦¾à¦‡à¦¨à¦¿à¦œ à¦¬à¦‚à¦¶à§‹à¦¦à§à¦­à§‚à¦¤ à¦œà¦¨à¦—à¦£à¥¤<br><br>à¦à¦®à¦à¦¸à¦à¦¸à§‡à¦° à¦…à¦¨à§‡à¦• à¦¨à¦¾à¦®à¦•à¦°à¦¾ à¦à¦œà§‡à¦¨à§à¦Ÿ à¦°à¦¯à¦¼à§‡à¦›à§‡à¦¨à¥¤ à¦à¦° à¦®à¦§à§à¦¯à§‡ à¦°à¦¯à¦¼à§‡à¦›à§‡à¦¨ à¦²à§à¦¯à¦¾à¦°à¦¿ à¦‰ à¦¤à¦¾à¦‡à¦šà¦¿à¦¨, à¦•à§à¦¯à¦¾à¦Ÿà§à¦°à¦¿à¦¨à¦¾ à¦²à§‡à¦‰à¦‚, à¦ªà¦¿à¦Ÿà¦¾à¦° à¦²à¦¿, à¦šà¦¿ à¦®à¦¾à¦•, à¦•à§‹ à¦¸à§à¦¯à¦¼à§‡à¦¨ à¦®à§‹à¥¤ à§§à§¯à§¯à§¬ à¦¸à¦¾à¦²à§‡ à¦à¦«-à§§à§«, à¦¬à¦¿-à§«à§¨à¦¸à¦¹ à¦¬à¦¹à§ à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦ªà¦¾à¦šà¦¾à¦°à§‡à¦° à¦…à¦­à¦¿à¦¯à§‹à¦—à§‡ à¦¡à¦‚ à¦«à§à¦¯à¦¾à¦‚ à¦šà§à¦¯à§ à¦¨à¦¾à¦®à§‡ à¦¬à§‹à¦¯à¦¼à¦¿à¦‚ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à¦¿à¦° à¦à¦• à¦‡à¦žà§à¦œà¦¿à¦¨à¦¿à¦¯à¦¼à¦¾à¦° à¦§à¦°à¦¾ à¦ªà¦¡à¦¼à§‡à¦¨à¥¤<br><br>à¦§à¦¾à¦°à¦£à¦¾ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼, à¦®à¦¾à¦°à§à¦•à¦¿à¦¨ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°, à¦‡à¦‰à¦•à§‡, à¦•à¦¾à¦¨à¦¾à¦¡à¦¾, à¦‡à¦‰à¦°à§‹à¦ª, à¦­à¦¾à¦°à¦¤, à¦œà¦¾à¦ªà¦¾à¦¨à§‡ à¦†à¦¨-à¦…à¦«à¦¿à¦¶à¦¿à¦¯à¦¼à¦¾à¦² à¦•à¦¾à¦­à¦¾à¦°à§‡ à¦¯à§‡à¦®à¦¨ à¦¬à§à¦¯à¦¬à¦¸à¦¾à¦¯à¦¼à§€, à¦¸à¦¾à¦‚à¦¬à¦¾à¦¦à¦¿à¦•, à¦–à§‡à¦²à§‹à¦¯à¦¼à¦¾à¦¡à¦¼, à¦¬à§à¦¯à¦¾à¦‚à¦•à¦¾à¦°, à¦¶à¦¿à¦•à§à¦·à¦•, à¦°à¦¾à¦œà¦¨à§€à¦¤à¦¿à¦¬à¦¿à¦¦ à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦•à¦®à¦ªà¦•à§à¦·à§‡ à§§à§¨à§¦ à¦œà¦¨ à¦•à¦°à§‡ à¦à¦®à¦à¦¸à¦à¦¸ à¦•à¦°à§à¦®à§€ à¦…à¦¬à¦¸à§à¦¥à¦¾à¦¨ à¦•à¦°à¦›à§‡à¦¨à¥¤<br><br>à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦…à¦¨à§à¦¯à¦¸à¦¬ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦•à§‡à¦‡ à¦à¦®à¦à¦¸à¦à¦¸ à¦¤à¦¾à¦¦à§‡à¦° à¦ªà§à¦°à¦¤à¦¿à¦¦à§à¦¬à¦¨à§à¦¦à§à¦¬à§€ à¦®à¦¨à§‡ à¦•à¦°à§‡à¥¤<br><br><strong>à§«. #à¦à¦«à¦à¦¸à¦¬à¦¿</strong><br>à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦®à§‚à¦² à¦¨à¦¾à¦® à¦«à§‡à¦¡à¦¾à¦°à§‡à¦²à¦¨à¦¾à¦¯à¦¼à¦¾ à¦¸à§à¦²à¦à¦¬à¦¾ à¦¬à§‡à¦œà¦ªà¦¾à¦¸à¦¨à§‹à¦¸à§à¦¤à¦¿ à¦°à¦¾à¦¶à¦¿à¦¸à§à¦•à¦¯à¦¼ à¦«à§‡à¦¡à§‡à¦°à¦¾à¦Ÿà¦¸à¦¿à¥¤ à¦¸à¦‚à¦•à§à¦·à§‡à¦ªà§‡ à¦à¦Ÿà¦¿ à¦à¦«à¦à¦¸à¦¬à¦¿ (FSB) à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤à¥¤ à¦à¦Ÿà¦¿ à¦¸à§à¦¥à¦¾à¦ªà¦¿à¦¤ à¦¹à¦¯à¦¼ à§§à§¯à§¯à§« à¦¸à¦¾à¦²à§‡à¦° à§© à¦à¦ªà§à¦°à¦¿à¦²à¥¤ à¦¤à¦¬à§‡ à¦à¦¤ à¦…à¦²à§à¦ª à¦¬à¦¯à¦¼à¦¸ à¦¦à¦¿à¦¯à¦¼à§‡ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦•à¦¾à¦°à§à¦¯à¦•à¦¾à¦°à¦¿à¦¤à¦¾à¦° à¦ªà§à¦°à¦­à¦¾à¦¬ à¦“ à¦­à¦¯à¦¼à¦¾à¦¬à¦¹à¦¤à¦¾à¦° à¦•à¦¥à¦¾ à¦®à§‹à¦Ÿà§‡à¦“ à¦…à¦¨à§à¦®à¦¾à¦¨ à¦•à¦°à¦¾ à¦¯à¦¾à¦¬à§‡ à¦¨à¦¾à¥¤ à¦…à¦¨à§à¦®à¦¾à¦¨ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡ à¦à¦° à¦ªà§‚à¦°à§à¦¬à¦¸à§‚à¦°à¦¿ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦•à¦¥à¦¾ à¦®à¦¾à¦¥à¦¾à¦¯à¦¼ à¦°à§‡à¦–à§‡à¥¤<br><br>à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾à¦° à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦ªà§‚à¦°à§à¦¬à¦¸à§‚à¦°à¦¿ à¦›à¦¿à¦² à¦¦à§à¦¨à¦¿à¦¯à¦¼à¦¾ à¦•à¦¾à¦à¦ªà¦¾à¦¨à§‹ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦•à§‡à¦œà¦¿à¦¬à¦¿à¥¤ à¦†à¦° à¦•à§‡à¦œà¦¿à¦¬à¦¿à¦°à¦“ à¦†à¦—à§‡ à¦à¦° à¦¨à¦¾à¦® à¦›à¦¿à¦² à¦šà§‡à¦•à¦¾à¥¤ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦•à¦°à§à¦®à§€ à¦¸à¦‚à¦–à§à¦¯à¦¾ à¦†à¦¨à§à¦®à¦¾à¦¨à¦¿à¦• à¦²à¦•à§à¦·à¦¾à¦§à¦¿à¦•à¥¤ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦¸à¦¦à¦° à¦¦à¦«à¦¤à¦° à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾à¦° à¦®à¦¸à§à¦•à§‹ à¦¶à¦¹à¦°à§‡à¦° à¦²à§à¦¯à§à¦¬à¦¿à¦¯à¦¼à¦¾à¦™à§à¦•à¦¾ à¦¸à§à¦•à§‹à¦¯à¦¼à¦¾à¦°à§‡à¥¤ à¦à¦° à¦œà¦¬à¦¾à¦¬à¦¦à¦¿à¦¹à¦¿à¦¤à¦¾ à¦•à¦°à¦¤à§‡ à¦¹à¦¯à¦¼ à¦ªà§à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿ à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾à¦¨ à¦«à§‡à¦¡à¦¾à¦°à§‡à¦¶à¦¨à¥¤<br><br>à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦ªà§à¦°à¦§à¦¾à¦¨ à¦†à¦²à§‡à¦•à¦œà¦¾à¦¨à§à¦¡à¦¾à¦° à¦¬à¦°à§à¦Ÿà¦¨à¦¿à¦•à¦­à¥¤ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦¸à¦¾à¦¹à¦¾à¦¯à§à¦¯à¦•à¦¾à¦°à§€ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¨à¦¾à¦® à¦—à§à¦°à§à¥¤ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦®à§‹à¦Ÿ à§§à§¦à¦Ÿà¦¿ à¦¬à¦¿à¦­à¦¾à¦— à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦®à§‚à¦² à¦¦à¦¾à¦¯à¦¼à¦¿à¦¤à§à¦¬ à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦—à§à¦ªà§à¦¤à¦¹à¦¤à§à¦¯à¦¾, à¦¬à¦°à§à¦¡à¦¾à¦° à¦¸à¦¾à¦°à§à¦­à§‡à¦‡à¦²à§à¦¯à¦¾à¦¨à§à¦¸, à¦°à¦ªà§à¦¤à¦¾à¦¨à¦¿ à¦¨à¦¿à¦¯à¦¼à¦¨à§à¦¤à§à¦°à¦£, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦Ÿà§‡à¦°à¦°à¦¿à¦œà¦®, à¦¨à¦¿à¦œà¦¸à§à¦¬ à¦²à§‹à¦• à¦¸à¦‚à¦—à§à¦°à¦¹ à¦“ à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦¤à§ˆà¦°à¦¿, à¦¬à¦¿à¦¦à§‡à¦¶à¦¿ à¦•à§‚à¦Ÿà¦¨à§€à¦¤à¦¿à¦•à¦¦à§‡à¦° à¦“à¦ªà¦° à¦¨à¦œà¦°à¦¦à¦¾à¦°à¦¿à¥¤<br><br>à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦¨à¦¾à¦®à¦•à¦°à¦¾ à¦à¦œà§‡à¦¨à§à¦Ÿà§‡à¦° à¦¨à¦¾à¦® à¦†à¦¨à§à¦¨à¦¾ à¦šà§à¦¯à¦¾à¦ªà¦®à§à¦¯à¦¾à¦¨à¥¤ à¦¸à¦¾à¦°à¦¾ à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦›à¦¡à¦¼à¦¿à¦¯à¦¼à§‡ à¦›à¦¿à¦Ÿà¦¿à¦¯à¦¼à§‡ à¦°à¦¯à¦¼à§‡à¦›à§‡ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾à¦°à¦¾ à¦¯à¦¾à¦°à¦¾ à¦¨à¦¿à¦¯à¦¼à¦®à¦¿à¦¤ à¦à¦«à¦à¦¸à¦¬à¦¿à¦•à§‡ à¦—à§‹à¦ªà¦¨ à¦¤à¦¥à§à¦¯ à¦¸à¦°à¦¬à¦°à¦¾à¦¹ à¦•à¦°à§‡ à¦¯à¦¾à¦šà§à¦›à§‡à¥¤ à¦à¦«à¦à¦¸à¦¬à¦¿à¦° à¦¸à¦°à§à¦¬à¦®à§‹à¦Ÿ à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾à¦° à¦¸à¦‚à¦–à§à¦¯à¦¾ à¦à¦¬à¦‚ à¦à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦¬à¦°à¦¾à¦¦à§à¦¦à¦•à§ƒà¦¤ à¦¬à¦¾à¦œà§‡à¦Ÿà§‡à¦° à¦ªà¦°à¦¿à¦®à¦¾à¦£ à¦à¦¦à§‡à¦° à¦¨à¦¿à¦œà¦¸à§à¦¬ à¦•à§Œà¦¶à¦² à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦—à§‹à¦ªà¦¨ à¦°à¦¾à¦–à¦¾ à¦¹à¦¯à¦¼à¥¤<br><br><strong>à§¬. #à¦¬à¦¿à¦à¦¨à¦¡à¦¿</strong><br>à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¨à¦¾à¦® à¦œà¦¾à¦°à§à¦®à¦¾à¦¨ à¦­à¦¾à¦·à¦¾à¦¯à¦¼ à¦¬à§à¦¨à§à¦¦à§‡à¦¸à¦¨à§à¦¯à¦¾à¦šà¦°à¦¿à¦šà¦Ÿà§‡à¦¨à¦¡à¦¿à¦¯à¦¼à§‡à¦¨à¦¸à§à¦Ÿ à¦¬à¦¾ à¦¬à¦¿à¦à¦¨à¦¡à¦¿ (BND)à¥¤ à¦‡à¦‚à¦°à§‡à¦œà¦¿à¦¤à§‡ à¦«à§‡à¦¡à¦¾à¦°à§‡à¦² à¦‡à¦¨à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸à¥¤ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨ à¦šà§à¦¯à¦¾à¦¨à§à¦¸à§‡à¦²à¦°à§‡à¦° à¦…à¦«à¦¿à¦¸ à¦¥à§‡à¦•à§‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿ à¦¸à¦°à¦¾à¦¸à¦°à¦¿ à¦¨à¦¿à¦¯à¦¼à¦¨à§à¦¤à§à¦°à¦¿à¦¤ à¦¹à¦¯à¦¼ à¦à¦¬à¦‚ à¦šà§à¦¯à¦¾à¦¨à§à¦¸à§‡à¦²à¦°à§‡à¦° à¦•à¦¾à¦›à§‡ à¦œà¦¬à¦¾à¦¬à¦¦à¦¿à¦¹à¦¿ à¦•à¦°à§‡à¥¤ à¦à¦Ÿà¦¾ à¦‡à¦‰à¦°à§‹à¦ªà§‡à¦° à¦…à¦¨à§à¦¯à¦¤à¦® à¦¶à¦•à§à¦¤à¦¿à¦¶à¦¾à¦²à§€ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¥¤<br><br>à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦¬à¦¿à¦¶à§à¦¬à¦¯à§à¦¦à§à¦§à§‡à¦° à¦ªà¦° à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿ à¦¨à¦¤à§à¦¨ à¦•à¦°à§‡ à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦¨à¦°à§à¦—à¦ à¦¨à§‡à¦° à¦•à¦¾à¦œ à¦¶à§à¦°à§ à¦•à¦°à§‡à¥¤ à¦ à¦¸à¦®à¦¯à¦¼ à¦¤à¦¾à¦¦à§‡à¦° à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾ à¦à¦•à§‡à¦¬à¦¾à¦°à§‡ à¦¢à§‡à¦²à§‡ à¦¸à¦¾à¦œà¦¾à¦¤à§‡ à¦¹à¦¯à¦¼à¥¤ à¦¤à¦–à¦¨ à¦¤à¦¾à¦°à¦¾ à¦…à¦¨à§à¦­à¦¬ à¦•à¦°à§‡, à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾à¦° à¦œà¦¨à§à¦¯ à¦¤à¦¾à¦¦à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯à§‡à¦° à¦…à¦­à¦¾à¦¬ à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦¸à§‡à¦‡ à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨ à¦¥à§‡à¦•à§‡à¦‡ à¦¤à¦¾à¦°à¦¾ à¦à¦•à¦Ÿà¦¿ à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¨à¦¿à¦°à§à¦®à¦¾à¦£ à¦¶à§à¦°à§ à¦•à¦°à§‡à¥¤ à§§à§¯à§«à§¬ à¦¸à¦¾à¦²à§‡à¦° à§§ à¦à¦ªà§à¦°à¦¿à¦² à¦¬à¦¿à¦à¦¨à¦¡à¦¿ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼à¥¤ à¦®à§‡à¦œà¦° à¦œà§‡à¦¨à¦¾à¦°à§‡à¦² à¦°à§‡à¦‡à¦¨à¦¹à¦¾à¦°à§à¦¡à¦°à§‡à¦° à¦¨à§‡à¦¤à§ƒà¦¤à§à¦¬à§‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿ à¦¨à¦¿à¦°à§à¦®à¦¿à¦¤ à¦¹à¦¯à¦¼à§‡à¦›à¦¿à¦²à¥¤ à¦¶à§à¦°à§à¦¤à§‡ à¦à¦Ÿà¦¾ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¸à¦¿à¦†à¦‡à¦à¦° à¦¸à¦¹à¦¯à§‹à¦—à§€ à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤<br><br>à¦à¦‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦¤à§‡ à¦“ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¯à§‡à¦•à§‹à¦¨à§‹ à¦šà§à¦¯à¦¾à¦²à§‡à¦žà§à¦œ à¦®à§‹à¦•à¦¾à¦¬à¦¿à¦²à¦¾à¦¯à¦¼ à¦ªà§à¦°à¦¸à§à¦¤à§à¦¤ à¦¥à¦¾à¦•à§‡à¥¤ à¦¬à¦¿à¦à¦¨à¦¡à¦¿ à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦• à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸, à¦®à¦¾à¦¦à¦• à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸, à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦° à¦…à¦¬à§ˆà¦§ à¦ªà¦¾à¦šà¦¾à¦°, à¦…à¦¸à§à¦¤à§à¦° à¦ªà¦¾à¦šà¦¾à¦°, à¦¸à¦‚à¦˜à¦¬à¦¦à§à¦§ à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦—à§‹à¦ªà¦¨ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦•à¦°à§‡à¥¤ à¦¬à¦¿à¦à¦¨à¦¡à¦¿ à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¹à¦²à§‡à¦“ à¦¤à¦¾à¦°à¦¾ à¦®à¦¿à¦²à¦¿à¦Ÿà¦¾à¦°à¦¿ à¦“ à¦¸à¦¿à¦­à¦¿à¦² à¦‡à¦¨à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸à§‡à¦° à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦•à¦°à§‡à¥¤<br><br>à¦¬à¦¾à¦°à§à¦²à¦¿à¦¨à§‡ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦•à¦¾à¦°à§à¦¯à¦¾à¦²à¦¯à¦¼à§‡ à¦šà¦¾à¦° à¦¹à¦¾à¦œà¦¾à¦° à¦•à¦°à§à¦®à§€ à¦à¦•à¦¸à¦™à§à¦—à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤ à¦¬à¦¿à¦¶à¦¾à¦² à¦à¦‡ à¦•à¦¾à¦°à§à¦¯à¦¾à¦²à¦¯à¦¼à¦Ÿà¦¿ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§©à§«à¦Ÿà¦¿ à¦«à§à¦Ÿà¦¬à¦² à¦®à¦¾à¦ à§‡à¦° à¦¸à¦®à¦¾à¦¨à¥¤ à¦¬à¦¿à¦à¦¨à¦¡à¦¿ à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦‡à¦¨à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾, à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¦à§‡à¦¶à§‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾ à¦•à¦°à¦¾, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦Ÿà§‡à¦°à¦°à¦¿à¦œà¦®, à¦¨à¦¿à¦œà¦¸à§à¦¬ à¦²à§‹à¦• à¦¸à¦‚à¦—à§à¦°à¦¹ à¦“ à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦¤à§ˆà¦°à¦¿à¦¤à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤<br><br>à¦ à¦›à¦¾à¦¡à¦¼à¦¾ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§€à¦¯à¦¼ à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦•à¦¦à§‡à¦° à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦£à§‡ à¦¸à¦¹à¦¾à¦¯à¦¼à¦¤à¦¾, à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦“ à¦¬à§à¦¯à¦•à§à¦¤à¦¿ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦“ à¦¬à¦¿à¦¶à§à¦²à§‡à¦·à¦£ à¦ªà§à¦°à¦­à§ƒà¦¤à¦¿ à¦¬à¦¿à¦·à¦¯à¦¼à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤ à¦à¦• à¦•à¦¥à¦¾à¦¯à¦¼ à¦¬à¦¹à¦¿à¦°à§à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨ à¦¸à§à¦¬à¦¾à¦°à§à¦¥à§‡à¦° à¦ªà¦•à§à¦·à§‡ à¦¯à¦¾ à¦•à¦¿à¦›à§ à¦•à¦°à¦¾à¦° à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨ à¦¤à¦¾à¦°à¦¾ à¦¸à§‡à¦Ÿà¦¾à¦‡ à¦•à¦°à§‡à¥¤ à¦¬à¦¿à¦¦à§‡à¦¶à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨ à¦¸à§à¦¬à¦¾à¦°à§à¦¥à§‡à¦° à¦ªà§à¦°à¦¤à¦¿ à¦¹à§à¦®à¦•à¦¿à¦° à¦¬à§à¦¯à¦¾à¦ªà¦¾à¦°à§‡ à¦¤à¦¾à¦°à¦¾ à¦¸à¦°à¦•à¦¾à¦°à¦•à§‡ à¦†à¦—à¦¾à¦® à¦¸à¦¤à¦°à§à¦• à¦•à¦°à¦¾à¦° à¦¹à¦¾à¦¤à¦¿à¦¯à¦¼à¦¾à¦° à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤<br><br>à¦Ÿà§‡à¦²à¦¿à¦«à§‹à¦¨à§‡ à¦†à¦¡à¦¼à¦¿ à¦ªà¦¾à¦¤à¦¾ à¦“ à¦‡à¦²à§‡à¦•à¦Ÿà§à¦°à¦¨à¦¿à¦• à¦ªà¦°à§à¦¯à¦¬à§‡à¦•à§à¦·à¦£à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡à¦“ à¦¤à¦¾à¦°à¦¾ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤ à¦¤à¦¾à¦°à¦¾ à¦†à¦¨à§à¦¤à¦°à§à¦œà¦¾à¦¤à¦¿à¦• à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸à¦¬à¦¾à¦¦ à¦¬à¦¿à¦¸à§à¦¤à¦¾à¦°, à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦° à¦¸à¦¬ à¦§à¦°à¦¨à§‡à¦° à¦…à¦¬à§ˆà¦§ à¦¹à¦¸à§à¦¤à¦¾à¦¨à§à¦¤à¦°, à¦¸à¦‚à¦˜à¦¬à¦¦à§à¦§ à¦…à¦ªà¦°à¦¾à¦§, à¦…à¦¸à§à¦¤à§à¦° à¦“ à¦®à¦¾à¦¦à¦• à¦ªà¦¾à¦šà¦¾à¦°, à¦®à¦¾à¦¨à¦¿ à¦²à¦¨à§à¦¡à¦¾à¦°à¦¿à¦‚, à¦…à¦¬à§ˆà¦§ à¦…à¦­à¦¿à¦¬à¦¾à¦¸à¦¨ à¦“ à¦¤à¦¥à§à¦¯à¦¯à§à¦¦à§à¦§à§‡à¦° à¦®à¦¤à§‹ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦•à§à¦·à§‡à¦¤à§à¦°à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤<br><br>à¦¤à¦¾à¦°à¦¾ à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§à¦ªà§à¦¤à¦šà¦°à¦¬à§ƒà¦¤à§à¦¤à¦¿à¦¤à§‡ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦à¦•à¦®à¦¾à¦¤à§à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¹à¦“à¦¯à¦¼à¦¾à¦¯à¦¼ à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦“ à¦¬à§‡à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦‰à¦­à¦¯à¦¼ à¦§à¦°à¦¨à§‡à¦° à¦—à§à¦ªà§à¦¤à¦šà¦°à¦¬à§ƒà¦¤à§à¦¤à¦¿à¦¤à§‡à¦‡ à¦¨à¦¿à¦¯à¦¼à§‹à¦œà¦¿à¦¤ à¦¥à¦¾à¦•à§‡à¥¤<br><br><strong>à§­. #à¦†à¦‡à¦à¦¸à¦†à¦‡</strong><br>à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦¸à¦¬ à¦¥à§‡à¦•à§‡ à¦¬à¦¿à¦¤à¦°à§à¦•à¦¿à¦¤ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¨à¦¾à¦® à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦†à¦‡à¦à¦¸à¦†à¦‡ (ISI)à¥¤ à¦¬à¦¿à¦¤à¦°à§à¦•à§‡à¦° à¦¦à¦¿à¦• à¦¥à§‡à¦•à§‡ à¦à¦‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦ªà§à¦°à¦¥à¦®à¥¤ &lsquo;à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦­à¦¿à¦¤à¦°à§‡ à¦¸à¦°à¦•à¦¾à¦°&rsquo; à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦®à¦¾à¦Ÿà¦¿à¦¤à§‡ à¦à¦‡ à¦¨à¦¾à¦®à§‡ à¦¬à¦¹à§à¦² à¦ªà¦°à¦¿à¦šà¦¿à¦¤ à¦“ à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦•à§à¦·à¦®à¦¤à¦¾à¦§à¦° à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦¨à¦¾à¦® à¦†à¦‡à¦à¦¸à¦†à¦‡à¥¤<br><br>à§§à§¯à§ªà§® à¦à¦° à¦®à¦¾à¦à¦¾à¦®à¦¾à¦à¦¿ à¦¸à¦®à¦¯à¦¼à§‡ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨ à¦¸à§‡à¦¨à¦¾à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦¤à§‡ à¦•à¦°à§à¦®à¦°à¦¤ à¦…à¦¸à§à¦Ÿà§à¦°à§‹à¦²à§€à¦¯à¦¼ à¦¬à¦‚à¦¶à¦¦à§à¦­à§‚à¦¤ à¦¬à§à¦°à¦¿à¦Ÿà¦¿à¦¶ à¦†à¦°à§à¦®à¦¿ à¦…à¦«à¦¿à¦¸à¦¾à¦° à¦“ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨ à¦¸à§‡à¦¨à¦¾ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦¡à§‡à¦ªà§à¦Ÿà¦¿ à¦šà¦¿à¦« à¦…à¦¬ à¦¸à§à¦Ÿà¦¾à¦« à¦®à§‡à¦œà¦° à¦œà§‡à¦¨à¦¾à¦°à§‡à¦² à¦°à¦¬à¦¾à¦°à§à¦Ÿ à¦šà¦¾à¦“à¦¥à¦¾à¦®à§‡à¦° à¦ªà¦°à¦¾à¦®à¦°à§à¦¶à§‡ à¦“ à¦¤à¦¤à§à¦¬à¦¾à¦¬à¦§à¦¾à¦¨à§‡ à¦†à¦‡à¦à¦¸à¦†à¦‡ à¦¤à§ˆà¦°à¦¿ à¦¹à¦¯à¦¼à¥¤<br><br>à¦ªà§à¦°à¦¾à¦¥à¦®à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦à¦° à¦•à¦¾à¦œ à¦¤à¦¿à¦¨ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦ªà§à¦°à¦¾à¦ªà§à¦¤ à¦¤à¦¥à§à¦¯ à¦¯à¦¾à¦šà¦¾à¦‡ à¦¬à¦¾à¦›à¦¾à¦‡ à¦•à¦°à§‡ à¦¸à¦®à¦¨à§à¦¨à¦¯à¦¼ à¦¸à¦¾à¦§à¦¨ à¦•à¦°à¦¾ à¦¹à¦²à§‡à¦“ à§§à§¯à§«à§¦ à¦¸à¦¾à¦² à¦¥à§‡à¦•à§‡ à¦à¦•à§‡ à¦†à¦¦à¦¾à¦²à¦¾ à¦•à¦°à§‡ à¦¶à§à¦§à§à¦®à¦¾à¦¤à§à¦° à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾, à¦¸à§à¦¬à¦¾à¦°à§à¦¥ à¦°à¦•à§à¦·à¦¾ à¦“ à¦…à¦–à¦¨à§à¦¡à¦¤à¦¾ à¦¬à¦œà¦¾à¦¯à¦¼ à¦°à¦¾à¦–à¦¾à¦° à¦¦à¦¾à¦¯à¦¼à¦¿à¦¤à§à¦¬ à¦¦à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼à¥¤<br><br>à¦¦à§‡à¦¶à§‡-à¦¬à¦¿à¦¦à§‡à¦¶à§‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦¸à¦®à§à¦­à¦¾à¦¬à§à¦¯ à¦¸à¦¦à¦¸à§à¦¯ à¦¸à¦‚à¦–à§à¦¯à¦¾ à§¨à§« à¦¹à¦¾à¦œà¦¾à¦°à§‡à¦° à¦¬à§‡à¦¶à¦¿ à¦à¦¬à¦‚ à¦à¦° à¦®à¦§à§à¦¯à§‡ à¦…à¦¨à§‡à¦• à¦¤à¦¥à§à¦¯ à¦ªà§à¦°à¦¦à¦¾à¦¨à¦•à¦¾à¦°à§€à¦“ à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦à¦‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦•à¦¾à¦œ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§€à¦¯à¦¼ à¦¸à§à¦¬à¦¾à¦°à§à¦¥ à¦“ à¦…à¦–à¦¨à§à¦¡à¦¤à¦¾ à¦°à¦•à§à¦·à¦¾ à¦•à¦°à¦¾à¥¤<br><br>à¦¯à§‡ à¦¸à¦•à¦² à¦¬à§à¦¯à¦•à§à¦¤à¦¿, à¦—à§‹à¦·à§à¦ à§€, à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨, à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦¸à§à¦¬à¦¾à¦°à§à¦¥à§‡à¦° à¦¬à¦¿à¦°à§à¦¦à§à¦§à§‡ à¦¯à¦¾à¦°à¦¾ à¦•à¦¾à¦œ à¦•à¦°à§‡ à¦¤à¦¾à¦¦à§‡à¦° à¦‰à¦ªà¦° à¦¨à¦œà¦°à¦¦à¦¾à¦°à¦¿ à¦•à¦°à¦¾ à¦“ à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨à§‡ à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾ à¦•à¦°à¦¾à¥¤ à¦¬à¦¿à¦¦à§‡à¦¶à§‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¨à¦¾ à¦•à¦°à¦¾à¥¤<br><br>à¦­à¦¾à¦°à¦¤à§‡à¦° à¦¬à¦¿à¦°à§à¦¦à§à¦§à§‡ à¦¸à¦®à§à¦­à¦¾à¦¬à§à¦¯ à¦¯à§à¦¦à§à¦§à§‡ à¦•à§Œà¦¶à¦²à¦—à¦¤ à¦­à¦¾à¦¬à§‡ à¦¨à¦¿à¦œà§‡à¦¦à§‡à¦° à¦…à¦—à§à¦°à¦¬à¦°à§à¦¤à§€ à¦°à¦¾à¦–à¦¾à¦° à¦‰à¦¦à§à¦¦à§‡à¦¶à§à¦¯à§‡ à¦ªà§à¦°à¦¤à¦¿à¦¬à§‡à¦¶à§€ à¦¸à¦¬ à¦¦à§‡à¦¶à¦•à§‡ à¦ªà§à¦°à¦­à¦¾à¦¬à¦¿à¦¤ à¦•à¦°à¦¾à¥¤ à¦¸à¦°à¦•à¦¾à¦° à¦“ à¦¸à§‡à¦¨à¦¾ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦•à§‡ à¦¬à¦¾à¦‡à¦°à§‡ à¦“ à¦­à¦¿à¦¤à¦° à¦¥à§‡à¦•à§‡ à¦¨à¦¿à¦¯à¦¼à¦¨à§à¦¤à§à¦°à¦£ à¦•à¦°à¦¾à¥¤ à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦¨à§€à¦¤à¦¿ à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦£ à¦•à¦°à¦¾à¥¤<br><br>à¦¤à¦¿à¦¨à¦œà¦¨ à¦¡à§‡à¦ªà§à¦Ÿà¦¿ à¦¡à¦¾à¦‡à¦°à§‡à¦•à§à¦Ÿà¦° à¦œà§‡à¦¨à¦¾à¦°à§‡à¦²à§‡à¦° à¦…à¦§à§€à¦¨à§‡ à¦¤à¦¿à¦¨à¦Ÿà¦¿ à¦•à§‹à¦° à¦¬à¦¿à¦·à¦¯à¦¼à§‡à¦° à¦œà¦¨à§à¦¯ à§­ à¦Ÿà¦¿ à¦¬à¦¿à¦­à¦¾à¦— à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤ à¦‡à¦¨à§à¦Ÿà¦¾à¦° à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸à§‡à¦¸ à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦à¦° à¦¸à¦¬ à¦•à¦¾à¦œ à¦®à§à¦²à¦¤ à§­à¦Ÿà¦¿ à¦¡à¦¾à¦‡à¦°à§‡à¦•à§à¦Ÿà¦°à§‡à¦Ÿà§‡ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦¿à¦¤ à¦¹à¦¯à¦¼à¥¤<br><br>à¦†à¦‡à¦à¦¸à¦†à¦‡ à¦•à¦°à§à¦®à§€à¦°à¦¾ à¦¸à¦¾à¦§à¦¾à¦°à¦£à¦¤ à¦¸à§‡à¦¨à¦¾à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦à¦¸à¦à¦¸à¦œà¦¿, à¦¨à§Œ à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦“ à¦¬à¦¿à¦®à¦¾à¦¨ à¦¬à¦¾à¦¹à¦¿à¦¨à§€ à¦¥à§‡à¦•à§‡ à¦†à¦¸à§‡à¥¤ à¦¤à¦¬à§‡ à¦¨à¦¿à¦šà§ à¦¸à§à¦¤à¦°à§‡à¦° à¦•à¦°à§à¦®à§€à¦¦à§‡à¦° à¦…à¦¨à§‡à¦• à¦¸à¦®à¦‡à¦¯à¦¼ à¦ªà§à¦¯à¦¾à¦°à¦¾ à¦®à¦¿à¦²à¦¿à¦Ÿà¦¾à¦°à¦¿ à¦“ à¦ªà§à¦²à¦¿à¦¶ à¦¬à¦¾à¦¹à¦¿à¦¨à§€ à¦¥à§‡à¦•à§‡à¦“ à¦¨à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼à¥¤<br><br>à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦®à§‚à¦² à¦ªà§à¦°à¦¤à¦¿à¦¦à§à¦¬à¦¨à§à¦¦à§à¦¬à¦¿ à¦° à¦à¦¬à¦‚ à¦®à§‹à¦¸à¦¾à¦¦à¥¤ à¦¬à¦¿à¦–à§à¦¯à¦¾à¦¤ à¦®à¦¿à¦¶à¦¨ à¦—à§à¦²à§‹ à¦¹à¦šà§à¦›à§‡- à¦¸à§‹à¦­à¦¿à¦¯à¦¼à§‡à¦¤ à¦¬à¦¿à¦°à§‹à¦§à§€ à¦†à¦«à¦—à¦¾à¦¨ à¦¯à§à¦¦à§à¦§, à¦•à¦¾à¦°à§à¦—à¦¿à¦² à¦¯à§à¦¦à§à¦§, à¦“à¦¯à¦¼à¦¾à¦° à¦…à¦¨ à¦Ÿà§‡à¦°à¦° à¦“à¦¯à¦¼à¦¾à¦œà¦¿à¦°à¦¿à¦¸à§à¦¤à¦¾à¦¨, à¦¬à¦¾à¦²à§à¦šà¦¿à¦¸à§à¦¤à¦¾à¦¨ à¦ à¦†à¦•à¦¬à¦° à¦¬à§à¦—à¦¾à¦¤à¦¿ à¦¹à¦¤à§à¦¯à¦¾à¥¤<br><br><strong>à§®. #à¦°à¦¿à¦¸à¦¾à¦°à§à¦š_à¦à¦¨à§à¦¡_à¦à¦¨à¦¾à¦²à¦¾à¦‡à¦¸à¦¿à¦¸_à¦‰à¦‡à¦‚ &lsquo;à¦°&rsquo;</strong><br>à¦†à¦²à§‹à¦šà¦¿à¦¤ à¦à¦‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿à¦° à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¸à¦¾à¦² à§¨à§§ à¦¸à§‡à¦ªà§à¦Ÿà§‡à¦®à§à¦¬à¦° à§§à§¯à§¬à§® à¦¸à¦¾à¦²à¥¤ à¦¨à¦¯à¦¼à¦¾à¦¦à¦¿à¦²à§à¦²à§€ à¦¹à¦šà§à¦›à§‡ à¦°&rsquo;à¦¯à¦¼à§‡à¦° (RAW) à¦•à§‡à¦¨à§à¦¦à§à¦°à¦¬à¦¿à¦¨à§à¦¦à§à¥¤ à¦†à¦¨à§€à¦² à¦¦à¦¶à¦®à¦¨à¦¾ à¦à¦œà§‡à¦¨à§à¦¸à¦¿à¦° à¦¨à¦¿à¦°à§à¦¬à¦¾à¦¹à§€ à¦ªà§à¦°à¦§à¦¾à¦¨à¥¤ à¦° à¦à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦à¦œà§‡à¦¨à§à¦¸à¦¿ à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€à¦° à¦•à¦¾à¦°à§à¦¯à¦¾à¦²à¦¯à¦¼à¥¤ à¦° à¦­à¦¾à¦°à¦¤à§‡à¦° à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¥¤<br><br>à§§à§¯à§¬à§® à¦¸à¦¾à¦²à§‡à¦° à§¨à§§ à¦¸à§‡à¦ªà§à¦Ÿà§‡à¦®à§à¦¬à¦° à¦ªà§à¦°à¦¾à¦•à§à¦¤à¦¨ à¦¬à§ƒà¦Ÿà¦¿à¦¶ à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦…à¦«à¦¿à¦¸à¦¾à¦° à¦“ à¦†à¦‡à¦¬à¦¿ à¦° à¦¡à§‡à¦ªà§à¦Ÿà¦¿ à¦¡à¦¾à¦‡à¦°à§‡à¦•à§à¦Ÿà¦° à¦†à¦°.à¦à¦¨.à¦•à¦¾à¦“ à¦° à¦¨à§‡à¦¤à§ƒà¦¤à§à¦¬à§‡ à¦­à¦¾à¦°à¦¤à§‡ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾ à¦²à¦¾à¦­ à¦•à¦°à§‡ Research and Analysis Wingà¥¤<br><br>à¦à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦•à¦¾à¦œ à¦¹à¦² à¦¬à¦¿à¦¦à§‡à¦¶à¦¿ à¦—à§‹à¦ªà¦¨ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦Ÿà§‡à¦°à§‹à¦°à¦¿à¦œà¦® à¦à¦¬à¦‚ à¦—à§‹à¦ªà¦¨ à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨ à¦šà¦¾à¦²à¦¾à¦¨à§‹à¥¤ à¦ªà¦¾à¦°à§à¦¶à¦¬à¦°à§à¦¤à§€ à¦¦à§‡à¦¶à¦¸à¦®à§à¦¹ à¦¯à¦¾à¦¦à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦­à¦¾à¦°à¦¤à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾ à¦œà¦¡à¦¼à¦¿à¦¤ à¦¤à¦¾à¦¦à§‡à¦° à¦°à¦¾à¦œà¦¨à§ˆà¦¤à¦¿à¦• à¦“ à¦¸à¦¾à¦®à¦°à¦¿à¦• à¦•à¦¾à¦°à§à¦¯à¦•à¦²à¦¾à¦ª à¦ªà¦°à§à¦¯à¦¬à§‡à¦•à§à¦·à¦¨à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦“à¦‡ à¦¸à¦¬ à¦¦à§‡à¦¶à§‡à¦° à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦¨à§€à¦¤à¦¿ à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦¨à§‡ à¦­à§à¦®à¦¿à¦•à¦¾ à¦°à¦¾à¦–à¦¾à¦“ à¦° à¦à¦° à¦…à¦¨à§à¦¯à¦¤à¦® à¦•à¦¾à¦œà¥¤<br><br>à¦° à¦¬à¦¿à¦¦à§‡à¦¶à¦¿ à¦¸à¦°à¦•à¦¾à¦°, à¦¬à§à¦¯à¦¾à¦¬à¦¸à¦¾à¦¯à¦¼à§€, à¦¬à§à¦¯à¦¾à¦¬à¦¸à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦à¦¬à¦‚ à¦¬à¦¿à¦¶à§à¦²à§‡à¦·à¦£ à¦•à¦°à§‡ à¦¥à¦¾à¦•à§‡ à¦à¦¬à¦‚ à¦¸à§‡ à¦…à¦¨à§à¦¯à¦¾à¦¯à¦¼à§€ à¦­à¦¾à¦°à¦¤à§€à¦¯à¦¼ à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦•à¦¦à§‡à¦° à¦ªà¦°à¦¾à¦®à¦°à§à¦¶ à¦¦à¦¿à¦¯à¦¼à§‡ à¦¥à¦¾à¦•à§‡à¥¤ à¦à¦¶à¦¿à¦¯à¦¼à¦¾à¦¸à¦¹ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦…à¦¨à§‡à¦• à¦¦à§‡à¦¶à§‡ à¦° à¦à¦° à¦à¦œà§‡à¦¨à§à¦Ÿ à¦°à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦®à¦œà¦¾à¦° à¦¤à¦¥à§à¦¯ à¦¹à¦šà§à¦›à§‡ à¦° à¦¤à¦¾à¦¦à§‡à¦° à¦¯à¦¾à¦¬à¦¤à§€à¦¯à¦¼ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦“ à¦…à¦¸à§à¦¤à§à¦°-à¦¶à¦¸à§à¦¤à§à¦°à§‡à¦° à¦œà¦¨à§à¦¯ à¦®à§‹à¦¸à¦¾à¦¦à§‡à¦° à¦¸à¦¹à¦¯à§‹à¦—à¦¿à¦¤à¦¾ à¦ªà§‡à¦¯à¦¼à§‡ à¦¥à¦¾à¦•à§‡à¥¤<br><br><strong>à§¯. #à¦¡à¦¿à¦œà¦¿à¦à¦¸à¦‡</strong><br>à¦¡à¦¿à¦œà¦¿à¦à¦¸à¦‡ (DGSE) à¦«à§à¦°à¦¾à¦¨à§à¦¸à§‡à¦° à¦¬à§ˆà¦¦à§‡à¦¶à¦¿à¦• à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¥¤ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼ à§¨ à¦à¦ªà§à¦°à¦¿à¦² à§§à§¯à§®à§¨à¥¤ à¦¡à¦¿à¦œà¦¿à¦à¦¸à¦‡ à¦«à§à¦°à¦¾à¦¨à§à¦¸à§‡à¦° à¦ªà§à¦°à¦¤à¦¿à¦°à¦•à§à¦·à¦¾ à¦®à¦¨à§à¦¤à§à¦°à¦£à¦¾à¦²à¦¯à¦¼à§‡à¦° à¦¨à¦¿à¦°à§à¦¦à§‡à¦¶à§‡ à¦šà¦²à§‡à¥¤<br><br>à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¦à§‡à¦¶à§‡ à¦°à¦¾à¦œà¦¨à§ˆà¦¤à¦¿à¦• à¦ªà§à¦°à¦­à¦¾à¦¬ à¦à¦¬à¦‚ à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦° à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦Ÿ à¦…à¦ªà¦¾à¦°à§‡à¦¶à¦¨à§‡ à¦¡à¦¿à¦œà¦¿à¦à¦¸à¦‡ à¦¡à¦¿à¦œà¦¿à¦à¦¸à¦†à¦‡ à¦¨à¦¾à¦®à¦• à¦†à¦°à§‡à¦•à¦Ÿà¦¿ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¸à¦¾à¦¥à§‡ à¦à¦•à¦¸à¦¾à¦¥à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¥¤ à¦à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦•à¦¾à¦œ à¦¹à¦² à¦¬à¦¾à¦‡à¦°à§‡à¦° à¦¦à§‡à¦¶à§‡à¦° à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¸à§‚à¦¤à§à¦° à¦¥à§‡à¦•à§‡ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦à¦¬à¦‚ à¦¤à¦¾ à¦®à¦¿à¦²à¦¿à¦Ÿà¦¾à¦°à¦¿ à¦à¦¬à¦‚ à¦¨à§€à¦¤à¦¿à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦•à¦¦à§‡à¦° à¦•à§‡ à¦¸à¦°à¦¬à¦°à¦¾à¦¹ à¦•à¦°à¦¾à¥¤<br><br>à¦¡à¦¿à¦œà¦¿à¦à¦¸à¦‡à¦¤à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡à¦¨ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§« à¦¹à¦¾à¦œà¦¾à¦°à§‡à¦° à¦¬à§‡à¦¶à¦¿ à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾à¥¤ à¦à¦° à¦¸à¦¦à¦° à¦¦à¦«à¦¤à¦° à¦ªà§à¦¯à¦¾à¦°à¦¿à¦¸à§‡à¥¤<br><br><strong>à§§à§¦. #à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾à¦°_à¦à¦à¦¸à¦†à¦‡à¦à¦¸</strong><br>à¦à¦à¦¸à¦†à¦‡à¦à¦¸ (ASIS) à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾à¦° à¦¸à¦°à¦•à¦¾à¦°à¦¿ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦¯à¦¾à¦° à¦•à¦¾à¦œ à¦¹à¦² à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹ à¦•à¦°à¦¾, à¦•à¦¾à¦‰à¦¨à§à¦Ÿà¦¾à¦² à¦‡à¦¨à§à¦Ÿà§‡à¦²à¦¿à¦œà§‡à¦¨à§à¦¸ à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦à¦¬à¦‚ à¦¬à¦¿à¦¦à§‡à¦¶à¦¿ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦—à§à¦²à§‹à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦¹à¦¾à¦¯à¦¼à¦¤à¦¾ à¦®à§‚à¦²à¦• à¦•à¦¾à¦œ à¦•à¦°à¦¾à¥¤<br><br>à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¤ à¦¹à¦¯à¦¼ à§§à§© à¦®à§‡ à§§à§¯à§«à§¨à¥¤ à¦ªà§à¦°à¦§à¦¾à¦¨ à¦•à¦¾à¦°à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦•à§à¦¯à¦¾à¦¨à¦¬à§‡à¦°à¦¾à¦¤à§‡à¥¤ à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦¡à¦¿à¦°à§‡à¦•à§à¦Ÿà¦° à¦¨à¦¿à¦• à¦“à¦¯à¦¼à¦¾à¦°à§à¦¨à¦¾à¦°à¥¤ à¦à¦‡ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦Ÿà¦¿ à§¨à§¦ à¦¬à¦›à¦° à¦ªà¦°à§à¦¯à¦¨à§à¦¤ à¦—à§‹à¦ªà¦¨ à¦›à¦¿à¦² à¦à¦®à¦¨à¦•à¦¿ à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾à¦° à¦¸à¦°à¦•à¦¾à¦°à¦“ à¦à¦‡ à¦à¦œà§‡à¦¨à§à¦¸à¦¿ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦œà¦¾à¦¨à¦¤à§‹ à¦¨à¦¾à¥¤ à¦à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦•à¦¾à¦œ à¦¹à¦² à¦à¦¶à¦¿à¦¯à¦¼à¦¾ à¦à¦¬à¦‚ à¦ªà§à¦°à¦¶à¦¾à¦¨à§à¦¤ à¦®à¦¹à¦¾à¦¸à¦¾à¦—à¦°à§€à¦¯à¦¼ à¦à¦²à¦¾à¦•à¦¾à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¤à¦¥à§à¦¯ à¦¸à¦‚à¦—à§à¦°à¦¹à¥¤<br><br>à¦à¦‡ à¦•à¦¾à¦œà§‡à¦° à¦œà¦¨à§à¦¯à§‡ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¦à§‡à¦¶à§‡ à¦à¦œà§‡à¦¨à§à¦Ÿ à¦¨à¦¿à¦¯à¦¼à§‹à¦— à¦¦à¦¿à¦¯à¦¼à§‡ à¦°à§‡à¦–à§‡à¦›à§‡ ASISà¥¤ à¦à¦° à¦…à¦¨à§à¦¯à¦¤à¦® à¦ªà§à¦°à¦§à¦¾à¦¨ à¦•à¦¾à¦œ à¦¹à¦² à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯ à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦—à§à¦²à§‹à¦° à¦¸à¦¾à¦¥à§‡ à¦à¦•à¦¸à¦¾à¦¥à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡ à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾à¦° à¦…à¦°à§à¦¥à¦¨à§ˆà¦¤à¦¿à¦• à¦“ à¦°à¦¾à¦œà¦¨à§ˆà¦¤à¦¿à¦• à¦¨à¦¿à¦°à¦¾à¦ªà¦¤à§à¦¤à¦¾ à¦¨à¦¿à¦¶à§à¦šà¦¿à¦¤ à¦•à¦°à¦¾ à¦à¦¬à¦‚ à¦¬à¦¾à¦‡à¦°à§‡à¦° à¦¯à§‡à¦•à§‹à¦¨à§‹ à¦¹à§à¦®à¦•à¦¿ à¦¥à§‡à¦•à§‡ à¦¦à§‡à¦¶à§‡à¦° à¦œà¦¨à¦—à¦¨à¦•à§‡ à¦¸à§à¦°à¦•à§à¦·à¦¾ à¦¦à§‡à¦¯à¦¼à¦¾à¥¤<br><br>à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¦à§‡à¦¶à§‡à¦° à¦—à§‹à¦¯à¦¼à§‡à¦¨à§à¦¦à¦¾ à¦¸à¦‚à¦¸à§à¦¥à¦¾ à¦“ à¦ªà§à¦²à¦¿à¦¶<br>=======================<br>#à¦Ÿà§‡à¦•à¦¨à¦¿à¦•: à¦­à¦¾à¦°à¦¤à§‡à¦° RAW à¦®à§‡à¦Ÿà§‡à¦°à¦¿à¦¯à¦¼à¦¾à¦² à¦¦à¦¿à¦¯à¦¼à§‡ UK Scotland Yard à¦ M16 à¦¬à¦¾à¦¨à¦¿à¦¯à¦¼à§‡ USA à¦à¦° FBI, Black Water à¦à¦° à¦‰à¦ªà¦° à¦¦à¦¿à¦¯à¦¼à§‡ à¦šà¦²à§‡ à¦—à§‡à¦²à§‡ à¦‡à¦¸à¦°à¦¾à¦‡à¦²à§‡à¦° à¦®à§‹à¦¸à¦¾à¦¦ (à¦‡à¦¸à§à¦¤à¦¾à¦®à§à¦¬à§à¦²)+à¦†à¦®à¦¾à¦¨+à¦¸à¦¾à¦­à¦¾à¦• à¦¤à¦¿à¦¨ à¦­à¦¾à¦‡ à¦‡à¦°à¦¾à¦¨à§‡à¦° VIVAK à¦ à¦†à¦¤à§à¦®à¦—à§‹à¦ªà¦¨ à¦•à¦°à§‡à¥¤ à¦­à¦¾à¦°à§à¦œà¦¿à¦¨à¦¿à¦¯à¦¼à¦¾à¦° CIA à¦ à¦¤à¦¾à¦¦à§‡à¦° à¦–à§à¦œà¦¤à§‡ à¦¥à¦¾à¦•à§‡à¥¤<br>----------------------------------------------------<br><strong>à¦¬à§à¦¯à¦¾à¦–à§à¦¯à¦¾:</strong><br>à§§à¥¤ à¦­à¦¾à¦°à¦¤-RAW<br>à§¨à¥¤ UK à¦¬à¦¾ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦œà§à¦¯-Scotland Yard , M16<br>à§©à¥¤ USA à¦¬à¦¾ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°-FBI, Black Water<br>à§ªà¥¤ à¦‡à¦¸à¦°à¦¾à¦‡à¦²-à¦®à§‹à¦¸à¦¾à¦¦ (à¦‡à¦¸à§à¦¤à¦¾à¦®à§à¦¬à§à¦²)+à¦†à¦®à¦¾à¦¨+à¦¸à¦¾à¦­à¦¾à¦•<br>à§«à¥¤ à¦‡à¦°à¦¾à¦¨-VIVAK<br>à§¬à¥¤ à¦­à¦¾à¦°à§à¦œà¦¿à¦¨à¦¿à¦¯à¦¼à¦¾- CIA</p>', 1, 1, 'Public', '2018-12-06 17:02:42', '2018-12-06 17:37:36'),
(26, 3, ' à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦¦à§‡à¦¶à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦•à¦¸à¦®à§à¦¹', '<p>â– à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦•à§à¦¯à¦¾à¦™à§à¦—à¦¾à¦°à§à¥¤<br>â– à¦†à¦«à¦—à¦¾à¦¨à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à§©à§¦ à¦ªà¦°à§€à¥¤&nbsp;<br>â– à¦‡à¦¤à¦¾à¦²à¦¿à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¶à§à¦¬à§‡à¦¤ à¦ªà¦¦à§à¦®à¥¤&nbsp;<br>â– à¦•à¦¾à¦¨à¦¾à¦¡à¦¾à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¶à§à¦¬à§‡à¦¤ à¦ªà¦¦à§à¦®à¥¤&nbsp;<br>â– à¦‡à¦°à¦¾à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦—à§‹à¦²à¦¾à¦ªà¥¤<br>â– à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦—à§‹à¦²à¦¾à¦ªà¥¤&nbsp;<br>â– à¦¡à§‡à¦¨à¦®à¦¾à¦°à§à¦•à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¸à¦®à§à¦¦à§à¦° à¦¸à§ˆà¦•à¦¤à¥¤&nbsp;<br>â– à¦®à¦¿à¦¸à¦°à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¸à¦®à§à¦¦à§à¦° à¦¸à§ˆà¦•à¦¤à¥¤&nbsp;<br>â– à¦­à¦¾à¦°à¦¤à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¸à¦¿à¦‚à¦¹ à¦¦à¦°à¦œà¦¾à¥¤&nbsp;<br>â– à¦«à§à¦°à¦¾à¦¨à§à¦¸à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦ªà¦¦à§à¦®à¥¤&nbsp;<br>â– à¦¸à§à¦ªà§‡à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦ˆà¦—à¦²à¥¤&nbsp;<br>â– à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à¦¿à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¶à¦¸à§à¦¯à¦«à¦²à¥¤&nbsp;<br>â– à¦†à¦¯à¦¼à¦¾à¦°à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¤à§à¦°à¦¿à¦ªà¦¤à§à¦° à¦—à¦¾à¦›à¥¤&nbsp;<br>â– à¦šà§€à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¸à¦¿à¦¸à¦¾à¦® à¦—à¦¾à¦›à¥¤&nbsp;<br>â– à¦œà¦¾à¦ªà¦¾à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦•à§à¦°à¦¿à¦¸à§‡à¦¨à¦¥à¦¿à¦¯à¦¼à¦¾à¦®à¥¤&nbsp;<br>â– à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦…à¦°à§à¦§à¦šà¦¨à§à¦¦à§à¦°à¥¤&nbsp;<br>â– à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• à¦…à¦¸à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦•à§à¦¯à¦¾à¦™à§à¦—à¦¾à¦°à§à¥¤&nbsp;<br>â– à¦†à¦«à¦—à¦¾à¦¨à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à§©à§¦ à¦ªà¦°à§€à¥¤<br>â– à¦‡à¦¤à¦¾à¦²à¦¿à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¶à§à¦¬à§‡à¦¤ à¦ªà¦¦à§à¦®à¥¤<br>â– à¦•à¦¾à¦¨à¦¾à¦¡à¦¾à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¶à§à¦¬à§‡à¦¤ à¦ªà¦¦à§à¦®à¥¤&nbsp;<br>â– à¦‡à¦°à¦¾à¦¨à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦—à§‹à¦²à¦¾à¦ªà¥¤&nbsp;<br>â– à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦—à§‹à¦²à¦¾à¦ªà¥¤<br>â– à¦¡à§‡à¦¨à¦®à¦¾à¦°à§à¦•à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¸à¦®à§à¦¦à§à¦° à¦¸à§ˆà¦•à¦¤à¥¤&nbsp;<br>â– à¦®à¦¿à¦¸à¦°à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¸à¦®à§à¦¦à§à¦° à¦¸à§ˆà¦•à¦¤à¥¤&nbsp;<br>â– à¦­à¦¾à¦°à¦¤à§‡à¦° à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦¤à§€à¦• - à¦¸à¦¿à¦‚à¦¹ à¦¦à¦°à¦œà¦¾à¥¤</p>', 1, 1, 'Public', '2018-12-06 17:39:01', '2018-12-06 17:39:52');
INSERT INTO `preparation_lesson` (`id`, `sub_id`, `lesson_title`, `lesson_content`, `posted_by`, `updated_by`, `action`, `created_at`, `updated_at`) VALUES
(27, 2, ' à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦¤à¦¥à§à¦¯ à¦“ à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿', '<p>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦šà¦¾à¦²à§‚ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§¯à§© à¦¸à¦¾à¦²à§‡à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦¸à¦¬à¦¾à¦° à¦œà¦¨à§à¦¯ à¦‰à¦¨à§à¦®à§à¦•à§à¦¤ à¦•à¦°à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§¯à§¬ à¦¸à¦¾à¦²à§‡à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦¸à¦°à§à¦¬à¦ªà§à¦°à¦¥à¦® à¦¡à¦¾à¦• à¦Ÿà¦¿à¦•à§‡à¦Ÿ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§¦ à¦œà§à¦²à¦¾à¦‡, à§§à§¯à§­à§§ à¦¸à¦¾à¦²à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦®à§‹à¦Ÿ à¦¡à¦¾à¦•à¦˜à¦°à§‡à¦° à¦¸à¦‚à¦–à§à¦¯à¦¾ à¦•à¦¤à¦Ÿà¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¯à§®à§¬à§¦ à¦Ÿà¦¿à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦‡-à¦ªà§‹à¦¸à§à¦Ÿ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸ à¦•à¦¬à§‡ à¦šà¦¾à¦²à§‚ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¬ à¦†à¦—à¦·à§à¦Ÿ, à§¨à§¦à§¦à§¦à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦…à¦¨à¦²à¦¾à¦‡à¦¨ à¦•à§à¦°à¦¿à¦¯à¦¼à¦¾à¦° à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸à§‡à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦‡à¦œà¦¿-à¦ªà§‹à¦¸à§à¦Ÿà¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦•à¦¬à§‡ à¦ªà§à¦°à¦¥à¦® à¦¡à¦¿à¦œà¦¿à¦Ÿà¦¾à¦² à¦Ÿà§‡à¦²à¦¿à¦«à§‹à¦¨ à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾ à¦šà¦¾à¦²à§‚ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¦à§ª à¦œà¦¾à¦¨à§à¦¯à¦¼à¦¾à¦°à§€, à§§à§¯à§¯à§¦à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦•à¦¬à§‡, à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦¸à¦¾à¦‡à¦¬à¦¾à¦° à¦•à§à¦¯à¦¾à¦«à§‡ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§¯à§¯ à¦¸à¦¾à¦²à§‡, à¦¬à¦¨à¦¾à¦¨à§€à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦†à¦‡à¦Ÿà¦¿ à¦­à¦¿à¦²à§‡à¦œ à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦¸à§à¦¥à¦¾à¦ªà¦¨à§‡à¦° à¦‰à¦¦à§à¦¯à§‹à¦— à¦—à§à¦°à¦¹à¦¨ à¦•à¦°à§‡à¦›à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦—à¦¾à¦œà¦¿à¦ªà§à¦°à§‡à¦° à¦•à¦¾à¦²à¦¿à¦¯à¦¼à¦¾à¦•à§ˆà¦°à¥¤<br>à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿà§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦•à¦® à¦–à¦°à¦šà§‡ à¦«à§‹à¦¨ à¦•à¦°à¦¾à¦° à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦­à¦¯à¦¼à§‡à¦¸ à¦“à¦­à¦¾à¦° à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦ªà§à¦°à¦Ÿà§‹à¦•à¦² à¦¬à¦¾ à¦­à¦¿à¦“à¦†à¦‡à¦ªà¦¿à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à§€à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¸à¦¿à¦Ÿà¦¿à¦¸à§‡à¦² à¦¡à¦¿à¦œà¦¿à¦Ÿà¦¾à¦², à§§à§¯à§¯à§© à¦¸à¦¾à¦²à¥¤<br>à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦¡à¦¾à¦• à¦Ÿà¦¿à¦•à§‡à¦Ÿ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à¦•à§‹à¦¥à¦¾à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¬à§à¦°à¦¿à¦Ÿà§‡à¦¨à§‡à¥¤<br>à¦­à¦¾à¦°à¦¤à¦¬à¦°à§à¦·à§‡ à¦•à¦–à¦¨ à¦¡à¦¾à¦• à¦Ÿà¦¿à¦•à§‡à¦Ÿ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§®à§­à§« à¦¸à¦¾à¦²à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦•à¦–à¦¨ à¦¥à§‡à¦•à§‡ à¦•à¦¾à¦°à§à¦¡ à¦«à§‹à¦¨ à¦šà¦¾à¦²à§‚ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§¯à§¨ à¦¸à¦¾à¦²à§‡à¥¤<br>à¦¦à§‡à¦¶à§‡ à¦®à§‹à¦Ÿ à¦•à¦¯à¦¼à¦Ÿà¦¿ à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à§€ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸ à¦ªà§à¦°à¦¦à¦¾à¦¨ à¦•à¦°à¦›à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¬ à¦Ÿà¦¿à¥¤<br>à¦¬à¦¿à¦Ÿà¦¿à¦†à¦°à¦¸à¦¿ à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦Ÿà§‡à¦²à¦¿à¦•à¦® à¦°à§‡à¦—à§à¦²à¦¾à¦°à§‡à¦Ÿà¦°à§€ à¦•à¦®à¦¿à¦¶à¦¨à¥¤<br>à¦¦à§‡à¦¶à§‡ à¦®à¦¾à¦²à§à¦Ÿà¦¿à¦®à¦¿à¦Ÿà¦¾à¦°à¦¿à¦‚ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦® à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à¦•à¦¬à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§©à§¦ à¦œà§à¦¨, à§¨à§¦à§¦à§¨à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¬à§‡à¦¤à¦¾à¦° à¦•à§‡à¦¨à§à¦¦à§à¦° à¦—à§à¦²à§‹ à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¢à¦¾à¦•à¦¾, à¦šà¦Ÿà§à¦Ÿà¦—à§à¦°à¦¾à¦®, à¦°à¦¾à¦œà¦¶à¦¾à¦¹à§€, à¦–à§à¦²à¦¨à¦¾, à¦¸à¦¿à¦²à§‡à¦Ÿ, à¦¬à¦—à§à¦¡à¦¼à¦¾, à¦°à¦‚à¦ªà§à¦°, à¦•à§à¦®à¦¿à¦²à§à¦²à¦¾, à¦°à¦¾à¦™à§à¦—à¦¾à¦®à¦¾à¦Ÿà¦¿, à¦ à¦¾à¦•à§à¦°à¦—à¦¾à¦à¦“, à¦¬à¦°à¦¿à¦¶à¦¾à¦², à¦¯à¦¶à§‹à¦° à¦“ à¦•à¦•à§à¦¸à¦¬à¦¾à¦œà¦¾à¦°à¥¤<br>à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨à§‡ à¦•à¦¯à¦¼à¦Ÿà¦¿ à¦¬à§‡à¦¸à¦°à¦•à¦¾à¦°à§€ à¦à¦«à¦à¦® à¦°à§‡à¦¡à¦¿à¦“ à¦¸à§à¦Ÿà§‡à¦¶à¦¨ à¦šà¦¾à¦²à§ à¦†à¦›à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§ªà¦Ÿà¦¿ (à¦°à§‡à¦¡à¦¿à¦“ à¦Ÿà§à¦¡à§‡, à¦°à§‡à¦¡à¦¿à¦“ à¦«à§à¦°à§à¦¤à¦¿, à¦°à§‡à¦¡à¦¿à¦“ à¦à¦¬à¦¿à¦¸à¦¿ à¦“ à¦°à§‡à¦¡à¦¿à¦“ à¦†à¦®à¦¾à¦°)<br>à¦•à¦¬à§‡ à¦ªà§à¦°à¦¥à¦® à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨ à¦•à§‡à¦¨à§à¦¦à§à¦° à¦¸à§à¦¥à¦¾à¦ªà¦¨ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§« à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦°, à§§à§¯à§¬à§ª à¦¸à¦¾à¦²à¥¤<br>à¦•à¦¬à§‡ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦°à¦™à¦¿à¦¨ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦°, à§§à§¯à§®à§¦à¥¤<br>à¦¢à¦¾à¦•à¦¾à¦° à¦°à¦¾à¦®à¦ªà§à¦°à¦¾à¦¯à¦¼ à¦•à¦¬à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨ à¦•à§‡à¦¨à§à¦¦à§à¦° à¦¸à§à¦¥à¦¾à¦ªà¦¨ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§« à¦¸à¦¾à¦²à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§‚à¦°à§à¦¨à¦¾à¦™à§à¦— à¦•à§‡à¦¨à§à¦¦à§à¦° à¦•à¦¤à¦Ÿà¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¦à§¨ à¦Ÿà¦¿à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¬à§‡à¦¤à¦¾à¦° à¦¥à§‡à¦•à§‡ à¦•à§‹à¦¨ à¦•à§‹à¦¨ à¦­à¦¾à¦·à¦¾à¦¯à¦¼ à¦…à¦¨à§à¦·à§à¦ à¦¾à¦¨ à¦¸à¦®à¦ªà§à¦°à¦šà¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¬à¦¾à¦‚à¦²à¦¾, à¦‡à¦‚à¦°à§‡à¦œà¦¿, à¦°à§à¦‰à¦¦à§, à¦¹à¦¿à¦¨à§à¦¦à§€, à¦†à¦°à¦¬à§€ à¦“ à¦¨à§‡à¦ªà¦¾à¦²à§€à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¦à§‡à¦¶ à¦¬à§‡à¦¤à¦¾à¦°à§‡à¦° à¦¸à¦¦à¦° à¦¦à¦ªà§à¦¤à¦° à¦•à§‹à¦¥à¦¾à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¢à¦¾à¦•à¦¾à¦° à¦†à¦—à¦¾à¦°à¦—à¦¾à¦à¦“à¦¯à¦¼à§‡à¥¤<br>à¦¸à§à¦¬à¦§à§€à¦¨à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à§‡à¦¤à¦¾à¦° à¦•à§‡à¦¨à§à¦¦à§à¦° à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦¸à§à¦¥à¦¾à¦ªà¦¿à¦¤ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¦²? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦šà¦Ÿà§à¦Ÿà¦—à§à¦°à¦¾à¦®à§‡à¦° à¦•à¦¾à¦²à§à¦°à¦˜à¦¾à¦Ÿà¥¤<br>à¦°à§‡à¦¡à¦¿à¦“ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦¨à¦¾à¦® à¦•à¦¬à§‡ à¦¢à¦¾à¦•à¦¾ à¦¬à§‡à¦¤à¦¾à¦° à¦•à§‡à¦¨à§à¦¦à§à¦° à¦°à¦¾à¦–à¦¾ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¦à§ª à¦®à¦¾à¦°à§à¦š, à§§à§¯à§­à§§à¥¤<br>à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à¦‚à¦¸à¦¦à§‡ à¦•à¦¬à§‡ à¦¬à§‡à¦¤à¦¾à¦°-à¦Ÿà¦¿à¦­à¦¿à¦° à¦¸à§à¦¬à¦¾à¦¯à¦¼à¦¤à§à¦¬à¦¶à¦¾à¦¸à¦¨ à¦¬à¦¿à¦² à¦ªà¦¾à¦¸ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¨ à¦œà§à¦²à¦¾à¦‡, à§¨à§¦à§¦à§§à¥¤<br>à¦¬à§‡à¦¸à¦°à¦•à¦¾à¦°à§€ à¦°à§‡à¦¡à¦¿à¦“ à¦¸à§à¦Ÿà§‡à¦¶à¦¨à§‡à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦°à§‡à¦¡à¦¿à¦“ à¦®à§‡à¦Ÿà§à¦°à§‹à¦“à¦¯à¦¼à§‡à¦­à¥¤<br>à¦šà¦Ÿà§à¦Ÿà¦—à§à¦°à¦¾à¦® à¦ªà§‚à¦°à§à¦¨à¦¾à¦™à§à¦— à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨ à¦•à§‡à¦¨à§à¦¦à§à¦°à¦Ÿà¦¿ à¦¸à§à¦¥à¦¾à¦ªà¦¨ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦°, à§§à§¯à§¯à§¬ à¦¸à¦¾à¦²à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦‰à¦ªà¦•à§‡à¦¨à§à¦¦à§à¦° à¦•à¦¯à¦¼à¦Ÿà¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§ª à¦Ÿà¦¿à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦¨à¦¾à¦Ÿà¦• à¦•à§‹à¦¨à¦Ÿà¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦à¦•à¦¤à¦²à¦¾ à¦¦à§‹à¦¤à¦²à¦¾, à¦«à§‡à¦¬à§à¦°à§à¦¯à¦¼à¦¾à¦°à§€, à§§à§¯à§¬à§«à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦¸à¦‚à¦—à§€à¦¤ à¦¶à¦¿à¦²à§à¦ªà§€ à¦•à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦«à§‡à¦°à¦¦à§Œà¦¸à§€ à¦°à¦¹à¦®à¦¾à¦¨à¥¤<br>à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦¬à§‡à¦¸à¦°à¦•à¦¾à¦°à§€ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦à¦•à§à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à¥¤<br>à¦à¦•à§à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§® à¦®à¦¾à¦°à§à¦š, à§§à§¯à§¯à§®à¥¤<br>à¦à¦•à§à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨ à¦¬à¦¨à§à¦§ à¦¹à¦¯à¦¼à§‡ à¦¯à¦¾à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§¯ à¦†à¦—à¦·à§à¦Ÿ, à§¨à§¦à§¦à§¨à¥¤<br>à¦à¦•à§à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾à¦ªà¦¨à¦¾ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦• à¦•à§‡ à¦›à¦¿à¦²à§‡à¦¨? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¸à¦¾à¦‡à¦®à¦¨ à¦¡à§à¦°à¦¿à¦‚à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨ à¦•à¦¬à§‡ à¦†à¦¨à§à¦·à§à¦ à¦¾à¦¨à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦¸à§à¦¯à¦¾à¦Ÿà§‡à¦²à¦¾à¦‡à¦Ÿ à¦¸à¦®à§à¦ªà§à¦°à¦šà¦¾à¦° à¦¶à§à¦°à§ à¦•à¦°à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§§ à¦à¦ªà§à¦°à¦¿à¦², à§¨à§¦à§¦à§ªà¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦•à¦–à¦¨ à¦¥à§‡à¦•à§‡ à¦¡à¦¿à¦¶ à¦à¦¨à§à¦Ÿà§‡à¦¨à¦¾ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à§‡à¦° à¦¸à¦°à¦•à¦¾à¦°à§€ à¦¸à¦¿à¦¦à§à¦§à¦¾à¦¨à§à¦¤ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¨à§­ à¦à¦ªà§à¦°à¦¿à¦², à§§à§¯à§¯à§¨à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦­à§-à¦‰à¦ªà¦—à§à¦°à¦¹ à¦•à§‡à¦¨à§à¦¦à§à¦° à¦•à¦¯à¦¼à¦Ÿà¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§ª à¦Ÿà¦¿à¥¤ à¦¬à§‡à¦¤à¦¬à§à¦¨à¦¿à¦¯à¦¼à¦¾, à¦¤à¦¾à¦²à¦¿à¦¬à¦¾à¦¬à¦¾à¦¦, à¦®à¦¹à¦¾à¦–à¦¾à¦²à§€ à¦“ à¦¸à¦¿à¦²à§‡à¦Ÿà¥¤<br>à¦¬à§‡à¦¤à¦¬à§à¦¨à¦¿à¦¯à¦¼à¦¾ à¦•à§‹à¦¨ à¦œà§‡à¦²à¦¾à¦¯à¦¼ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦°à¦¾à¦™à§à¦—à¦¾à¦®à¦¾à¦Ÿà¦¿à¥¤<br>à¦¤à¦¾à¦²à¦¿à¦¬à¦¾à¦¬à¦¾à¦¦ à¦•à§‹à¦¨ à¦œà§‡à¦²à¦¾à¦¯à¦¼ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦—à¦¾à¦œà¦¿à¦ªà§à¦°à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦…à¦¨à§à¦·à§à¦ à¦¾à¦¨ à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§«à§¦ à¦®à¦¿à¦¨à¦¿à¦Ÿà§‡à¦° à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦¸à¦¿à¦¨à§‡à¦®à¦¾à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦¸à¦‚à¦¬à¦¾à¦¦ à¦ªà¦¾à¦ à¦• à¦•à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¹à§à¦®à¦¾à¦¯à¦¼à§à¦¨ à¦šà§Œà¦§à§à¦°à§€à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦¸à¦‚à¦¬à¦¾à¦¦ à¦ªà¦¾à¦ à¦• à¦•à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦†à¦²à¦® à¦°à¦¶à§€à¦¦à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦…à¦¨à§à¦·à§à¦ à¦¾à¦¨ à¦ªà¦°à¦¿à¦šà¦¾à¦²à¦• à¦•à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦•à¦²à¦¿à¦® à¦¶à¦°à¦¾à¦«à§€à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦Ÿà¦¿à¦­à¦¿ à¦¸à¦¿à¦°à¦¿à¦¯à¦¼à¦¾à¦²à§‡à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¤à§à¦°à¦¿à¦°à¦¤à§à¦¨, à§§à§¯à§¬à§¬à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦Ÿà§‡à¦²à¦¿à¦­à¦¿à¦¶à¦¨à§‡ à¦ªà§à¦¯à¦¾à¦•à§‡à¦œ à¦…à¦¨à§à¦·à§à¦ à¦¾à¦¨ à¦—à§ƒà¦¹à§€à¦¤ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§¯à§ª à¦¸à¦¾à¦²à§‡à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦•à¦¤à¦Ÿà¦¿ à¦†à¦¬à¦¹à¦¾à¦“à¦¯à¦¼à¦¾ à¦•à§‡à¦¨à§à¦¦à§à¦° à¦†à¦›à§‡? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§¦à§© à¦Ÿà¦¿à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦¡à¦¿à¦œà¦¿à¦Ÿà¦¾à¦² à¦ªà¦¤à§à¦°à¦¿à¦•à¦¾à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦†à¦‡à¦Ÿà¦¿.à¦•à¦®à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦…à¦¨à¦²à¦¾à¦‡à¦¨ à¦¸à¦‚à¦¬à¦¾à¦¦ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¬à¦¿à¦¡à¦¿à¦¨à¦¿à¦‰à¦œà§¨à§ª.à¦•à¦®<br>à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à¦‚à¦¬à¦¾à¦¦ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦¨à¦¾à¦® à¦•à¦¿? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¸à¦‚à¦¬à¦¾à¦¦ à¦¸à¦‚à¦¸à§à¦¥à¦¾ (à¦¬à¦¾à¦¸à¦¸)à¥¤<br>à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¸à¦‚à¦¬à¦¾à¦¦ à¦¸à¦‚à¦¸à§à¦¥à¦¾à¦° à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼? à¦‰à¦¤à§à¦¤à¦°à¦ƒ à§§à§¯à§­à§¨ à¦¸à¦¾à¦²à§‡à¥¤</p>', 1, 1, 'Public', '2018-12-06 17:41:10', '2018-12-06 17:42:09'),
(28, 2, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦—à§à¦°à§à¦¤à§à¦¬à¦ªà§‚à¦°à§à¦£ à¦•à¦¿à¦›à§ à¦­à¦¾à¦¸à§à¦•à¦°à§à¦¯ à¦“ à¦¸à§à¦¥à¦¾à¦ªà¦¤à§à¦¯', '<p>à§§à¥¤ à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à§à¦®à§ƒà¦¤à¦¿à¦¸à§Œà¦§ âžŸ à¦¸à§ˆà¦¯à¦¼à¦¦ à¦®à¦¾à¦ˆà¦¨à§à¦² à¦¹à§‹à¦¸à§‡à¦¨ âžŸ à¦¸à¦¾à¦­à¦¾à¦°<br>à§¨à¥¤ à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à¦‚à¦¸à¦¦ à¦­à¦¬à¦¨ âžŸ à¦²à§à¦‡ à¦†à¦‡ à¦•à¦¾à¦¨ âžŸ à¦¶à§‡à¦°à§‡ à¦¬à¦¾à¦‚à¦²à¦¾ à¦¨à¦—à¦°, à¦¢à¦¾à¦•à¦¾<br>à§©à¥¤ à¦•à§‡à¦¨à§à¦¦à§à¦°à§€à¦¯à¦¼ à¦¶à¦¹à§€à¦¦ à¦®à¦¿à¦¨à¦¾à¦° âžŸ à¦¹à¦¾à¦®à¦¿à¦¦à§à¦° à¦°à¦¹à¦®à¦¾à¦¨ âžŸ à¦¢à¦¾à¦•à¦¾ à¦®à§‡à¦¡à¦¿à¦•à§‡à¦² à¦•à¦²à§‡à¦œ à¦ªà§à¦°à¦¾à¦™à§à¦—à¦£<br>à§ªà¥¤ à¦¤à¦¿à¦¨ à¦¨à§‡à¦¤à¦¾à¦° à¦®à¦¾à¦œà¦¾à¦° âžŸ à¦®à¦¾à¦¸à§à¦¦ à¦†à¦¹à¦®à§‡à¦¦ âžŸ à¦¢à¦¾à¦•à¦¾<br>à§«à¥¤ à¦°à¦¾à¦œà¦¾à¦°à¦¬à¦¾à¦— à¦¸à§à¦®à§ƒà¦¤à¦¿à¦¸à§Œà¦§ âžŸ à¦®à§‹à¦¸à§à¦¤à¦«à¦¾ à¦¹à¦¾à¦°à§à¦¨ à¦•à§à¦¦à§à¦¦à§à¦¸ à¦¹à¦¿à¦²à¦¿ âžŸ à¦—à¦—à¦¨à¦¬à¦¾à¦¡à¦¼à¦¿, à¦¸à¦¾à¦­à¦¾à¦°<br>à§¬à¥¤ à¦¶à¦¹à§€à¦¦ à¦¬à§à¦¦à§à¦§à¦¿à¦œà§€à¦¬à§€ à¦¸à§à¦®à§ƒà¦¤à¦¿à¦¸à§Œà¦§ âžŸ à¦®à§‹à¦¸à§à¦¤à¦«à¦¾ à¦¹à¦¾à¦°à§à¦¨ à¦•à§à¦¦à§à¦¦à§à¦¸ à¦¹à¦¿à¦²à¦¿ âžŸ à¦¢à¦¾à¦•à¦¾ à¦®à¦¿à¦°à¦ªà§à¦°<br>à§­à¥¤ à¦¸à¦¾à¦°à§à¦• à¦«à§‹à¦¯à¦¼à¦¾à¦°à¦¾ âžŸ à¦¨à¦¿à¦¤à§à¦¨ à¦•à§à¦¨à§à¦¡à§ âžŸ à¦ªà¦¾à¦¨à§à¦¥à¦ªà¦¥ à¦¢à¦¾à¦•à¦¾<br>à§®à¥¤ à¦¶à¦¹à§€à¦¦ à¦¸à§à¦®à§ƒà¦¤à¦¿à¦¸à§à¦¤à¦®à§à¦­ âžŸ à¦ à¦†à¦° à¦–à¦¨à§à¦¦à¦•à¦¾à¦° à¦¤à¦¾à¦œà¦‰à¦¦à§à¦¦à¦¿à¦¨ à¦†à¦¹à¦®à¦¦ âžŸ à¦®à¦¿à¦°à¦ªà§à¦°<br>à§¯à¥¤ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨à¦¤à¦¾ à¦¸à¦‚à¦—à§à¦°à¦¾à¦® âžŸ à¦¶à¦¾à¦®à§€à¦® à¦¶à¦¿à¦•à¦¦à¦¾à¦° âžŸà¦«à§à¦²à¦¾à¦° à¦°à§‹à¦¡, à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§§à§¦à¥¤ à¦…à¦ªà¦°à¦¾à¦œà§‡à¦¯à¦¼ à¦¬à¦¾à¦‚à¦²à¦¾ âžŸà¦¸à§ˆà¦¯à¦¼à¦¦ à¦†à¦¬à§à¦¦à§à¦²à§à¦²à¦¾à¦¹ à¦–à¦¾à¦²à§‡à¦¦ âžŸ à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦•à¦²à¦¾à¦­à¦¬à¦¨<br>à§§à§§à¥¤ à¦°à¦¾à¦œà§ à¦­à¦¾à¦¸à§à¦•à¦° âžŸ à¦¶à§à¦¯à¦¾à¦®à¦² à¦šà§Œà¦§à§à¦°à§€ âžŸ à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦Ÿà¦¿à¦à¦¸à¦¸à¦¿ à¦šà¦¤à§à¦¬à¦°<br>à§§à§¨à¥¤ à¦¸à§à¦¬à§‹à¦ªà¦¾à¦°à§à¦œà¦¿à¦¤ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨à¦¤à¦¾ âžŸ à¦¶à¦¾à¦®à§€à¦® à¦¶à¦¿à¦•à¦¦à¦¾à¦° âžŸ à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦Ÿà¦¿à¦à¦¸à¦¸à¦¿ à¦šà¦¤à§à¦¬à¦°<br>à§§à§©à¥¤ à¦¶à¦¾à¦¨à§à¦¤à¦¿à¦° à¦ªà¦¾à¦–à¦¿ âžŸ à¦¹à¦¾à¦®à¦¿à¦¦à§à¦œà§à¦œà¦¾à¦®à¦¾à¦¨ à¦–à¦¾à¦¨ âžŸ à¦Ÿà¦¿ à¦à¦¸ à¦¸à¦¿, à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§§à§ªà¥¤ à¦¬à§‡à¦—à¦® à¦°à§‹à¦•à§‡à¦¯à¦¼à¦¾ à¦­à¦¾à¦¸à§à¦•à¦°à§à¦¯ âžŸ à¦¹à¦¾à¦®à¦¿à¦¦à§à¦œà§à¦œà¦¾à¦®à¦¾à¦¨ à¦–à¦¾à¦¨ âžŸ à¦°à§‹à¦•à§‡à¦¯à¦¼à¦¾ à¦¹à¦²à§‡, à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§§à§«à¥¤ à¦¶à¦¿à¦–à¦¾ à¦šà¦¿à¦°à¦¨à§à¦¤à¦¨ âžŸ à¦¸à§‹à¦¹à¦°à¦¾à¦“à¦¯à¦¼à¦¾à¦°à§à¦¦à§€ à¦‰à¦¦à§à¦¯à¦¾à¦¨<br>à§§à§¬à¥¤ à¦¶à¦¿à¦–à¦¾ à¦…à¦¨à¦¿à¦°à§à¦¬à¦¾à¦£ âžŸ à¦¢à¦¾à¦•à¦¾ à¦•à§à¦¯à¦¾à¦¨à§à¦Ÿà¦¨à¦®à§‡à¦¨à§à¦Ÿ<br>à§§à§­à¥¤ à¦¬à§€à¦° à¦¬à¦¾à¦™à¦¾à¦²à§€ âžŸ à¦à¦¡à¦­à§‹à¦•à§‡à¦Ÿ à¦²à§à§Žà¦«à¦° à¦°à¦¹à¦®à¦¾à¦¨<br>à§§à§®à¥¤ à¦•à§à¦°à¦†à¦¨ à¦­à¦¾à¦¸à§à¦•à¦°à§à¦¯ âžŸ à¦•à¦¾à¦®à¦°à§à¦² à¦¹à¦¾à¦¸à¦¾à¦¨ à¦¶à¦¿à¦ªà¦¨ âžŸ à¦•à¦¸à¦¬à¦¾, à¦¬à§à¦°à¦¾à¦¹à§à¦®à¦£à¦¬à¦¾à¦¡à¦¼à¦¿à¦¯à¦¼à¦¾<br>à§§à§¯à¥¤ à¦°à¦•à§à¦¤à¦¸à§‹à¦ªà¦¾à¦¨ âžŸ à¦°à¦¾à¦œà§‡à¦¨à§à¦¦à§à¦°à¦ªà§à¦° à¦¸à§‡à¦¨à¦¾à¦¨à¦¿à¦¬à¦¾à¦¸<br>à§¨à§¦à¥¤ à¦¦à§‹à¦¯à¦¼à§‡à¦² à¦šà¦¤à§à¦¬à¦° âžŸ à¦†à¦œà¦¿à¦œà§à¦² à¦œà¦²à¦¿à¦² à¦ªà¦¾à¦¶à¦¾ âžŸ à¦¢à¦¾à¦•à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦•à¦¾à¦°à§à¦œà¦¨ à¦¹à¦²<br>à§¨à§§à¥¤ à¦¶à¦¾à¦ªà¦²à¦¾ à¦šà¦¤à§à¦¬à¦° âžŸ à¦†à¦œà¦¿à¦œà§à¦² à¦œà¦²à¦¿à¦² à¦ªà¦¾à¦¶à¦¾ âžŸ à¦®à¦¤à¦¿à¦à¦¿à¦²<br>à§¨à§¨à¥¤ à¦¸à¦¾à¦¬à¦¾à¦¸ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ âžŸ à¦¨à¦¿à¦¤à§à¦¨ à¦•à§à¦¨à§à¦¡à§ âžŸ à¦°à¦¾à¦œà¦¶à¦¾à¦¹à§€ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§¨à§©à¥¤ à¦¸à¦‚à¦¶à¦ªà§à¦¤à¦• âžŸ à¦¹à¦¾à¦®à¦¿à¦¦à§à¦œà§à¦œà¦¾à¦®à¦¾à¦¨ à¦–à¦¾à¦¨ âžŸ à¦œà¦¾à¦¹à¦¾à¦™à§à¦—à§€à¦°à¦¨à¦—à¦° à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§¨à§ªà¥¤ à¦¬à¦²à¦¾à¦•à¦¾ âžŸ à¦®à§ƒà¦£à¦¾à¦² à¦¹à¦• âžŸ à¦®à¦¤à¦¿à¦à¦¿à¦²<br>à§¨à§«à¥¤ à¦…à¦®à¦° à¦à¦•à§à¦¶à§‡ âžŸ à¦œà¦¾à¦¹à¦¾à¦¨à¦¾à¦°à¦¾ à¦ªà¦¾à¦°à¦­à§€à¦¨ âžŸ à¦œà¦¾à¦¹à¦¾à¦™à§à¦—à§€à¦°à¦¨à¦—à¦° à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§¨à§¬à¥¤ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨à¦¤à¦¾ à¦šà¦¤à§à¦¬à¦° âžŸ à¦®à§ƒà¦£à¦¾à¦² à¦¹à¦• âžŸ à¦®à¦¾à¦¦à¦¾à¦°à§€à¦ªà§à¦°à¥¤<br>à§¨à§­à¥¤ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨à¦¤à¦¾ âžŸ à¦¹à¦¾à¦®à¦¿à¦¦à§à¦œà§à¦œà¦¾à¦®à¦¾à¦¨ à¦–à¦¾à¦¨ âžŸ à¦•à¦¾à¦œà¦¿ à¦¨à¦œà¦°à§à¦² à¦‡à¦¸à¦²à¦¾à¦® à¦à¦­à¦¿à¦¨à¦¿à¦‰ à¦¢à¦¾à¦•à¦¾<br>à§¨à§®à¥¤ à¦¦à§à¦°à§à¦œà¦¯à¦¼ âžŸ à¦®à§ƒà¦£à¦¾à¦² à¦¹à¦• âžŸ à¦°à¦¾à¦œà¦¾à¦°à¦¬à¦¾à¦— à¦¢à¦¾à¦•à¦¾<br>à§¨à§¯à¥¤ à¦¬à¦¿à¦œà¦¯à¦¼ âžŸ à¦®à§ƒà¦£à¦¾à¦² à¦¹à¦• âžŸ à¦–à¦¾à¦—à¦¡à¦¼à¦¾à¦›à¦¡à¦¼à¦¿<br>à§©à§¦à¥¤ à¦®à§à¦•à§à¦¤à¦¬à¦¾à¦‚à¦²à¦¾ âžŸ à¦°à¦¶à¦¿à¦¦ à¦†à¦¹à¦®à§‡à¦¦ âžŸ à¦‡à¦¸à¦²à¦¾à¦®à§€ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§©à§§à¥¤ à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ âžŸ à¦¶à§à¦¯à¦¾à¦®à¦² à¦šà§Œà¦§à§à¦°à¦¿ âžŸ à¦•à§ƒà¦·à¦¿ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼, à¦®à¦¯à¦¼à¦®à¦¨à¦¸à¦¿à¦‚à¦¹<br>à§©à§¨à¥¤ à¦œà¦¯à¦¼ à¦¬à¦¾à¦‚à¦²à¦¾ âžŸ à¦¹à¦¾à¦®à¦¿à¦¦à§à¦œà§à¦œà¦¾à¦®à¦¾à¦¨ à¦–à¦¾à¦¨ âžŸ à¦ªà¦Ÿà§à¦¯à¦¼à¦¾à¦–à¦¾à¦²à§€ à¦¬à¦¿à¦œà§à¦žà¦¾à¦¨ à¦“ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§©à§©à¥¤ à¦…à¦¦à¦®à§à¦¯ à¦¬à¦¾à¦‚à¦²à¦¾ âžŸ à¦—à§‹à¦ªà¦¾à¦² à¦šà¦¨à§à¦¦à§à¦° à¦ªà¦¾à¦² âžŸ à¦–à§à¦²à¦¨à¦¾ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§©à§ªà¥¤ à¦œà¦¾à¦—à§à¦°à¦¤ à¦šà§Œà¦°à¦™à§à¦—à§€ âžŸ à¦†à¦¬à§à¦¦à§à¦° à¦°à¦¾à¦œà§à¦œà¦¾à¦• âžŸ à¦œà¦¯à¦¼à¦¦à§‡à¦¬à¦ªà§à¦°(à¦—à¦¾à¦œà§€à¦ªà§à¦°)<br>à§©à§«à¥¤ à¦¦à§‚à¦°à¦¨à§à¦¤ âžŸ à¦¸à§à¦²à¦¤à¦¾à¦¨à§à¦² à¦‡à¦¸à¦²à¦¾à¦® âžŸ à¦¶à¦¿à¦¶à§ à¦à¦•à¦¾à¦¡à§‡à¦®à§€, à¦¢à¦¾à¦•à¦¾<br>à§©à§¬à¥¤ à¦…à¦ªà¦°à¦¾à¦œà§‡à¦¯à¦¼ à§­à§§ âžŸ à¦¸à§à¦¬à¦¾à¦§à§€à¦¨ à¦šà§Œà¦§à§à¦°à§€ âžŸ à¦ à¦¾à¦•à§à¦°à¦—à¦¾à¦à¦“<br>à§©à§­à¥¤ à¦®à§ƒà¦¤à§à¦¯à§à¦žà§à¦œà¦¯à¦¼à§€ à§­à§§ âžŸ à¦•à¦¾à¦œà¦² à¦†à¦šà¦¾à¦°à§à¦¯ âžŸ à¦¶à§à¦°à§€à¦®à¦™à§à¦—à¦², à¦®à§Œà¦²à¦­à§€à¦¬à¦¾à¦œà¦¾à¦°<br>à§©à§®à¥¤ à¦šà§‡à¦¤à¦¨à¦¾ à§­à§§ âžŸ à¦®à§‹à¦ƒ à¦®à¦‡à¦¨à§à¦² âžŸ à¦•à§à¦·à§à¦Ÿà¦¿à¦¯à¦¼à¦¾<br>à§©à§¯à¥¤ à¦ªà§à¦°à¦¤à§à¦¯à¦¯à¦¼ à§­à§§ âžŸ à¦®à§ƒà¦£à¦¾à¦² à¦¹à¦• âžŸ à¦®à¦¾à¦“à¦²à¦¾à¦¨à¦¾ à¦­à¦¾à¦¸à¦¾à¦¨à§€ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼<br>à§ªà§¦à¥¤ à¦¬à¦¿à¦œà¦¯à¦¼ à§­à§§ âžŸ à¦–à¦¨à§à¦¦à¦•à¦¾à¦° à¦¬à¦¦à¦°à§à¦² à¦‡à¦¸à¦²à¦¾à¦® à¦¨à¦¾à¦¨à§à¦¨à§ âžŸ à¦•à§ƒà¦·à¦¿ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼(à¦®à¦¯à¦¼à¦®à¦¨à¦¸à¦¿à¦‚à¦¹)</p>', 1, 1, 'Public', '2018-12-06 17:43:32', '2018-12-06 17:46:01'),
(29, 2, 'à¦Ÿà§‡à¦•à¦¨à§‹à¦•à§à¦°à§à¦¯à¦¾à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€', '<p>à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¦à§‡à¦¶à§‡ à¦®à¦¨à§à¦¤à§à¦°à§€ à¦†à¦›à§‡à¦¨ à¦¦à§à¦‡ à¦§à¦°à¦¨à§‡à¦°à¥¤&nbsp;<br>à§§) à¦•à§à¦¯à¦¾à¦¬à¦¿à¦¨à§‡à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€à¥¤ à§¨) à¦Ÿà§‡à¦•à¦¨à§‹à¦•à§à¦°à§à¦¯à¦¾à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€à¥¤<br><br>à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¸à¦‚à¦¸à¦¦ à¦¸à¦¦à¦¸à§à¦¯ à¦¥à§‡à¦•à§‡ à¦¯à¦¾à¦¦à§‡à¦° à¦®à¦¨à§à¦¤à§à¦°à¦¿à¦¤à§à¦¬ à¦¦à§‡à¦¨ à¦¤à¦¾à¦°à¦¾ à¦¹à¦² à¦•à§à¦¯à¦¾à¦¬à¦¿à¦¨à§‡à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€à¥¤ à¦à¦•à¦Ÿà¦¿ à¦®à¦¨à§à¦¤à§à¦°à§€à¦¸à¦­à¦¾à¦¯à¦¼ à¦•à§à¦¯à¦¾à¦¬à¦¿à¦¨à§‡à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¯à¦¤à¦œà¦¨ à¦¹à¦¬à§‡ à¦¤à¦¾à¦° à§§à§¦ à¦­à¦¾à¦—à§‡à¦° à§§ à¦­à¦¾à¦— à¦¨à¦¿à¦¯à¦¼à§‡ à¦—à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼ à¦Ÿà§‡à¦•à¦¨à§‹à¦•à§à¦°à§à¦¯à¦¾à¦Ÿ à¦•à§‹à¦Ÿà¦¾à¥¤ à¦à¦‡ à¦•à§‹à¦Ÿà¦¾à¦¯à¦¼ à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¸à¦‚à¦¸à¦¦ à¦¸à¦¦à¦¸à§à¦¯ à¦¨à¦¯à¦¼ à¦à¦®à¦¨ à¦¯à§‡ à¦•à¦¾à¦‰à¦•à§‡ à¦®à¦¨à§à¦¤à§à¦°à¦¿à¦¤à§à¦¬ à¦¦à¦¿à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¦¨à¥¤<br><br>à¦…à¦°à§à¦¥à¦¾à§Ž, à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¯à¦¦à¦¿ à§ªà§¦ à¦œà¦¨ à¦¸à¦‚à¦¸à¦¦ à¦¸à¦¦à¦¸à§à¦¯à¦•à§‡ à¦•à§à¦¯à¦¾à¦¬à¦¿à¦¨à§‡à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à¦¿à¦¤à§à¦¬ à¦¦à¦¿à¦¯à¦¼à§‡ à¦®à¦¨à§à¦¤à§à¦°à§€à¦¸à¦­à¦¾ à¦—à¦ à¦¨ à¦•à¦°à§‡à¦¨ à¦¤à¦¬à§‡ à¦¸à¦‚à¦¸à¦¦ à¦¸à¦¦à¦¸à§à¦¯ à¦¨à¦¯à¦¼ à¦à¦®à¦¨ à§ª à¦œà¦¨à¦•à§‡ à¦Ÿà§‡à¦•à¦¨à§‹à¦•à§à¦°à§à¦¯à¦¾à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€ à¦•à¦°à¦¾à¦° à¦…à¦§à¦¿à¦•à¦¾à¦° à¦°à¦¾à¦–à§‡à¦¨à¥¤ à¦…à¦°à§à¦¥à¦¾à§Ž, à¦•à§à¦¯à¦¾à¦¬à¦¿à¦¨à§‡à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¯à¦¤à¦œà¦¨ à¦¤à¦¾à¦° à§§à§¦ à¦­à¦¾à¦—à§‡à¦° à§§ à¦­à¦¾à¦—à¦•à§‡ à¦Ÿà§‡à¦•à¦¨à§‹à¦•à§à¦°à§à¦¯à¦¾à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€ à¦•à¦°à¦¾à¦° à¦•à§à¦·à¦®à¦¤à¦¾ à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€à¦° à¦†à¦›à§‡à¦¨à¥¤<br><br>à¦à¦–à¦¾à¦¨à§‡ à¦¬à¦²à§‡ à¦°à¦¾à¦–à¦¾ à¦­à¦¾à¦²à§‹, à¦Ÿà§‡à¦•à¦¨à§‹à¦•à§à¦°à§à¦¯à¦¾à¦Ÿ à¦•à§‹à¦Ÿà¦¾ à¦ªà§à¦°à§‹à¦ªà§à¦°à¦¿ à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€à¦° à¦¹à¦¾à¦¤à§‡ à¦¸à¦‚à¦°à¦•à§à¦·à¦¿à¦¤ à¦¥à¦¾à¦•à§‡à¥¤ à¦†à¦°, à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¦à§‡à¦¶à§‡ à¦®à¦¨à§à¦¤à§à¦°à§€à¦¸à¦­à¦¾à¦° à¦•à¦¾à¦ à¦¾à¦®à§‹ à¦•à§‡à¦®à¦¨ à¦¹à¦¬à§‡ à¦¤à¦¾ à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦£à§‡à¦° à¦•à§à¦·à¦®à¦¤à¦¾à¦“ à¦ªà§à¦°à¦§à¦¾à¦¨à¦®à¦¨à§à¦¤à§à¦°à§€à¦° à¦¹à¦¾à¦¤à§‡ à¦¸à¦‚à¦°à¦•à§à¦·à¦¿à¦¤ à¦¥à¦¾à¦•à§‡à¥¤<br><br>à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦Ÿà§‡à¦•à¦¨à§‹à¦•à§à¦°à§à¦¯à¦¾à¦Ÿ à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¹à¦šà§à¦›à§‡à¦¨ à¦§à¦°à§à¦®à¦®à¦¨à§à¦¤à§à¦°à§€ à¦…à¦§à§à¦¯à¦•à§à¦· à¦®à¦¤à¦¿à¦‰à¦° à¦°à¦¹à¦®à¦¾à¦¨, à¦ªà§à¦°à¦¬à¦¾à¦¸à§€ à¦•à¦²à§à¦¯à¦¾à¦£ à¦®à¦¨à§à¦¤à§à¦°à§€ à¦¨à§à¦°à§à¦² à¦‡à¦¸à¦²à¦¾à¦® à¦¬à¦¿à¦à¦¸à¦¸à¦¿, à¦¬à¦¿à¦œà§à¦žà¦¾à¦¨ à¦“ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦¬à¦¿à¦·à¦¯à¦¼à¦• à¦®à¦¨à§à¦¤à§à¦°à§€ à¦‡à¦¯à¦¼à¦¾à¦«à§‡à¦¸ à¦“à¦¸à¦®à¦¾à¦¨ à¦à¦¬à¦‚ à¦¡à¦¾à¦• à¦“ à¦Ÿà§‡à¦²à¦¿à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦®à¦¨à§à¦¤à§à¦°à§€ à¦®à§‹à¦¸à§à¦¤à¦¾à¦«à¦¾ à¦œà¦¬à§à¦¬à¦¾à¦°à¥¤ à¦¤à¦¾à¦°à¦¾ à¦¨à¦¿à¦°à§à¦¬à¦¾à¦šà¦¿à¦¤ à¦¸à¦‚à¦¸à¦¦ à¦¸à¦¦à¦¸à§à¦¯ à¦¨à¦¨ à¦à¦¬à¦‚ à¦¸à¦°à¦•à¦¾à¦°à§‡à¦° à¦¬à¦¿à¦¶à§‡à¦· à¦¬à¦¿à¦¬à§‡à¦šà¦¨à¦¾à¦¯à¦¼ à¦®à¦¨à§à¦¤à§à¦°à¦¿à¦ªà¦°à¦¿à¦·à¦¦à§‡ à¦¸à§à¦¥à¦¾à¦¨ à¦ªà§‡à¦¯à¦¼à§‡à¦›à¦¿à¦²à§‡à¦¨à¥¤</p>', 1, 1, 'Public', '2018-12-06 17:47:44', '2018-12-06 17:48:22'),
(30, 2, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦†à¦‡à¦¨à¦¸à¦­à¦¾', '<p>â˜… à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦†à¦‡à¦¨à¦¸à¦­à¦¾à¦° à¦¨à¦¾à¦®â†’ à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à¦‚à¦¸à¦¦à¥¤<br>â˜… à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦¨à¦¾à¦®â†’ House of the Nation.<br>â˜… à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à¦‚à¦¸à¦¦à§‡à¦° à¦ªà§à¦°à¦¤à§€à¦•â†’ à¦¶à¦¾à¦ªà¦²à¦¾à¥¤<br>â˜… à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦¸à¦°à§à¦¬à¦®à§‹à¦Ÿ à¦†à¦¸à¦¨ à¦¸à¦‚à¦–à§à¦¯à¦¾â†’ à§©à§«à§¦à¦Ÿà¦¿à¥¤<br>â˜… à¦¸à¦‚à¦°à¦•à§à¦·à¦¿à¦¤ à¦®à¦¹à¦¿à¦²à¦¾ à¦†à¦¸à¦¨â†’ à§«à§¦à¦Ÿà¦¿à¥¤<br>â˜… à¦¸à¦°à¦¾à¦¸à¦°à¦¿ à¦­à§‹à¦Ÿà§‡ à¦¨à¦¿à¦°à§à¦¬à¦¾à¦šà¦¿à¦¤ à¦†à¦¸à¦¨â†’ à§©à§¦à§¦à¦Ÿà¦¿à¥¤<br>â˜… à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à¦‚à¦¸à¦¦à§‡à¦° à¦®à§‡à¦¯à¦¼à¦¾à¦¦â†’ à§« à¦¬à¦›à¦°à¥¤<br>â˜… à¦¸à¦‚à¦¸à¦¦ à¦…à¦§à¦¿à¦¬à§‡à¦¶à¦¨ à¦†à¦¹à§à¦¬à¦¾à¦¨, à¦­à¦™à§à¦— à¦“ à¦¸à§à¦¥à¦—à¦¿à¦¤ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¦¨â†’ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à¦ªà¦¤à¦¿à¥¤<br>â˜… à¦œà¦¾à¦¤à§€à¦¯à¦¼ à¦¸à¦‚à¦¸à¦¦à§‡à¦° à¦¸à¦­à¦¾à¦ªà¦¤à¦¿â†’ à¦¸à§à¦ªà¦¿à¦•à¦¾à¦°à¥¤<br>â˜… à¦ªà§à¦°à¦¥à¦® à¦¸à§à¦ªà¦¿à¦•à¦¾à¦° à¦›à¦¿à¦²à§‡à¦¨â†’ à¦®à§‹à¦¹à¦¾à¦®à§à¦®à¦¦ à¦‰à¦²à§à¦²à§à¦¯à¦¾à¦¹à¥¤<br>â˜… à¦ªà§à¦°à¦¥à¦® à¦¨à¦¾à¦°à§€ à¦¸à§à¦ªà¦¿à¦•à¦¾à¦°â†’ à¦¡. à¦¶à¦¿à¦°à§€à¦¨ à¦¶à¦¾à¦°à¦®à¦¿à¦¨ à¦šà§Œà¦§à§à¦°à§€à¥¤<br>â˜… à¦®à¦¹à¦¿à¦²à¦¾à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦¸à¦‚à¦°à¦•à§à¦·à¦¿à¦¤ à¦†à¦¸à¦¨ à¦›à¦¿à¦² à¦¨à¦¾â†’ à§ªà¦°à§à¦¥ à¦¸à¦‚à¦¸à¦¦à§‡à¥¤<br>â˜… à¦•à¦¾à¦¸à§à¦Ÿà¦¿à¦‚ à¦­à§‹à¦Ÿâ†’ à¦¸à§à¦ªà¦¿à¦•à¦¾à¦°à§‡à¦° à¦­à§‹à¦Ÿà¥¤<br>â˜… à¦…à¦§à§à¦¯à¦¾à¦¦à§‡à¦¶â†’ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à¦ªà¦¤à¦¿ à¦¨à¦¿à¦œà§‡ à¦¯à§‡ à¦†à¦‡à¦¨ à¦œà¦¾à¦°à¦¿ à¦•à¦°à§‡à¦¨à¥¤<br>â˜… à¦¸à¦°à¦•à¦¾à¦°à¦¿ à¦¬à¦¿à¦²â†’ à¦®à¦¨à§à¦¤à§à¦°à§€à¦°à¦¾ à¦¯à§‡ à¦¬à¦¿à¦² à¦‰à¦¤à§à¦¥à¦¾à¦ªà¦¨ à¦•à¦°à§‡à¦¨à¥¤<br>â˜… à¦¬à§‡à¦¸à¦°à¦•à¦¾à¦°à¦¿ à¦¬à¦¿à¦²â†’ à¦¸à¦‚à¦¸à¦¦ à¦¸à¦¦à¦¸à§à¦¯à¦°à¦¾ à¦¯à§‡ à¦¬à¦¿à¦² à¦‰à¦¤à§à¦¥à¦¾à¦ªà¦¨ à¦•à¦°à§‡à¦¨à¥¤<br>â˜… à¦«à§à¦²à§‹à¦° à¦•à§à¦°à¦¸à¦¿à¦‚â†’ à¦…à¦¨à§à¦¯ à¦¦à¦²à§‡ à¦¯à§‹à¦—à¦¦à¦¾à¦¨ à¦•à¦¿à¦‚à¦¬à¦¾ à¦¨à¦¿à¦œ à¦¦à¦²à§‡à¦° à¦¬à¦¿à¦ªà¦•à§à¦·à§‡ à¦­à§‹à¦Ÿ à¦¦à¦¾à¦¨à¥¤<br>â˜… à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦¸à¦°à¦•à¦¾à¦°â†’ à¦¸à¦‚à¦¸à¦¦à§€à¦¯à¦¼ à¦ªà¦¦à§à¦§à¦¤à¦¿à¦°à¥¤<br>â˜… à¦¸à¦‚à¦¸à¦¦à§€à¦¯à¦¼ à¦ªà¦¦à§à¦§à¦¤à¦¿à¦¤à§‡ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à¦ªà§à¦°à¦§à¦¾à¦¨â†’ à¦°à¦¾à¦·à§à¦Ÿà§à¦°à¦ªà¦¤à¦¿à¥¤</p>', 1, 1, 'Public', '2018-12-06 17:50:01', '2018-12-06 17:50:29');
INSERT INTO `preparation_lesson` (`id`, `sub_id`, `lesson_title`, `lesson_content`, `posted_by`, `updated_by`, `action`, `created_at`, `updated_at`) VALUES
(31, 1, 'à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° --à§«à§¨à§© à¦Ÿà¦¿ à¦—à§à¦°à§à¦¤à§à¦¬à¦ªà§‚à¦°à§à¦£ à¦ªà§à¦°à¦¶à§à¦¨à§‹à¦¤à§à¦¤à¦°', '<p>à¦¬à¦¿à¦¸à¦¿à¦à¦¸, à¦¬à§à¦¯à¦¾à¦‚à¦•à¦¸à¦¹ à¦¯à§‡ à¦•à§‹à¦¨ à¦ªà¦°à§€à¦•à§à¦·à¦¾à¦° à¦œà¦¨à§à¦¯ à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨à§€à¦¯à¦¼ à¦®à§‚à¦°à§à¦¹à§à¦¤à§‡ à¦–à§à¦à¦œà§‡ à¦ªà§‡à¦¤à§‡ à¦ªà§‹à¦¸à§à¦Ÿà¦Ÿà¦¿ à¦¤à§‡ à¦šà§‹à¦– à¦¬à§à¦²à¦¿à¦¯à¦¼à§‡ à¦¨à¦¿à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¦¨.....<br><br>à§§. à¦…à¦¤à§à¦¯à¦¾à¦§à§à¦¨à¦¿à¦• à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¦à§à¦°à§à¦¤ à¦…à¦—à§à¦°à¦—à¦¤à¦¿à¦° à¦®à§‚à¦²à§‡ à¦°à¦¯à¦¼à§‡à¦›à§‡- à¦‡à¦¨à§à¦Ÿà¦¿à¦—à§à¦°à§‡à¦Ÿà§‡à¦¡ à¦¸à¦¾à¦°à§à¦•à¦¿à¦Ÿ (à¦†à¦‡à¦¸à¦¿);<br>à§¨. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¬à§à¦°à§‡à¦‡à¦¨ à¦¹à¦²à§‹- Microprocessor<br>à§©. à¦†à¦§à§à¦¨à¦¿à¦• à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦œà¦¨à¦• à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼- à¦šà¦¾à¦°à§à¦²à¦¸ à¦¬à§à¦¯à¦¾à¦¬à§‡à¦œ à¦•à§‡;<br>à§ª. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦†à¦¬à¦¿à¦¸à§à¦•à¦¾à¦°à¦•- à¦¹à¦¾à¦“à¦¯à¦¼à¦¾à¦°à§à¦¡ à¦…à§à¦¯à¦‡à¦•à§‡à¦¨;<br>à§«. à¦†à¦§à§à¦¨à¦¿à¦• à¦®à§à¦¦à§à¦°à¦£ à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾à¦¯à¦¼ à¦§à¦¾à¦¤à§ à¦¨à¦¿à¦°à§à¦®à¦¿à¦¤ à¦…à¦•à§à¦·à¦°à§‡à¦° à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨à§€à¦¯à¦¼à¦¤à¦¾ à¦¶à§‡à¦· à¦¹à¦“à¦¯à¦¼à¦¾à¦° à¦•à¦¾à¦°à¦£- à¦«à¦Ÿà§‹ à¦²à¦¿à¦¥à§‹à¦—à§à¦°à¦¾à¦«à§€;<br>à§¬. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¸à¦•à¦² à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦¨à¦¿à¦¯à¦¼à¦¨à§à¦¤à§à¦°à¦£ à¦•à¦°à§‡- à¦¸à§‡à¦¨à§à¦Ÿà§à¦°à¦¾à¦² à¦ªà§à¦°à¦¸à§‡à¦¸à¦¿à¦‚ à¦‡à¦‰à¦¨à¦¿à¦Ÿ;<br>à§­. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦•à§‡à¦¨à§à¦¦à§à¦°à§€à¦¯à¦¼ à¦ªà¦•à§à¦°à¦¿à¦¯à¦¼à¦¾à¦•à¦°à¦£ à¦…à¦‚à¦¶ à¦—à¦ à¦¿à¦¤ à¦…à¦­à§à¦¯à¦¨à§à¦¤à¦°à§€à¦¨ à¦¸à§à¦®à§ƒà¦¤à¦¿, à¦—à¦¾à¦£à¦¿à¦¤à¦¿à¦• à¦¯à§à¦•à§à¦¤à¦¿ à¦…à¦‚à¦¶ à¦“ à¦¨à¦¿à¦¯à¦¼à¦¨à§à¦¤à§à¦°à¦£ à¦…à¦‚à¦¶à§‡à¦° à¦¸à¦®à¦¨à§à¦¬à¦¯à¦¼à§‡;<br>à§®. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¯à¦¨à§à¦¤à§à¦°à¦¾à¦‚à¦¶ à¦¬à¦¾ à¦¯à¦¨à§à¦¤à§à¦°à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼- à¦¹à¦¾à¦°à§à¦¡à¦“à¦¯à¦¼à§à¦¯à¦¾à¦°;<br>à§¯. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ªà¦¦à§à¦§à¦¤à¦¿à¦° à¦¦à§â€™à¦Ÿà¦¿ à¦ªà§à¦°à¦§à¦¾à¦¨ à¦…à¦™à§à¦—- à¦¹à¦¾à¦°à§à¦¡à¦“à¦¯à¦¼à§à¦¯à¦¾à¦° à¦“ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦°à¥¤<br>à§§à§¦. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦¸à¦®à¦¾à¦§à¦¾à¦¨à§‡à¦° à¦‰à¦¦à§à¦¦à§‡à¦¶à§à¦¯à§‡ à¦¸à¦®à§à¦ªà¦¾à¦¦à¦¨à§‡à¦° à¦…à¦¨à§à¦•à§à¦°à¦®à§‡ à¦¸à¦¾à¦œà¦¾à¦¨à§‹ à¦¨à¦¿à¦°à§à¦¦à§‡à¦¶à¦¾à¦¬à¦²à§€à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼- à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®;<br>à§§à§§. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¹à¦²à§‹ à¦à¦•à¦Ÿà¦¿ à¦•à§à¦·à¦¤à¦¿à¦•à¦¾à¦°à¦• à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¬à¦¾ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦°à¥¤<br>à§§à§¨. à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿà§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦‰à¦¨à¦¡à¦¼à¦¬à¦¤ à¦šà¦¿à¦•à¦¿à§Žà¦¸à¦¾ à¦ªà¦¦à§à¦§à¦¤à¦¿à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼- à¦Ÿà§‡à¦²à¦¿à¦®à§‡à¦¡à¦¿à¦¸à¦¿à¦¨;<br>à§§à§©. à¦¨à¦¾à¦«à¦¿à¦¸ à¦¬à¦¿à¦¨ à¦¸à¦¾à¦¤à§à¦¤à¦¾à¦°- à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦° à¦‡à¦žà§à¦œà¦¿à¦¨à¦¿à¦¯à¦¼à¦¾à¦° à§¨à§¦à§¦à§­ à¦¸à¦¾à¦²à§‡ à¦…à¦¸à§à¦•à¦¾à¦° à¦ªà§à¦°à¦¸à§à¦•à¦¾à¦° à¦…à¦°à§à¦œà¦¨ à¦•à¦°à§‡à¦¨;<br>à§§à§ª. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦° à¦¬à¦²à¦¤à§‡ à¦¬à§à¦à¦¾à¦¯à¦¼ à¦à¦° à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¬à¦¾ à¦•à¦°à§à¦®à¦ªà¦°à¦¿à¦•à¦²à§à¦ªà¦¨à¦¾ à¦•à§Œà¦¶à¦²;<br>à§§à§«. à¦®à§‡à¦¶à¦¿à¦¨à§‡à¦° à¦­à¦¾à¦·à¦¾à¦¯à¦¼ à¦²à¦¿à¦–à¦¿à¦¤ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼- à¦à¦¸à§‡à¦®à§à¦¬à¦²à¦¿;<br>à§§à§¬. à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦°à¦šà¦¨à¦¾ à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦•à¦ à¦¿à¦¨ à¦®à§‡à¦¶à¦¿à¦¨à§‡à¦° à¦­à¦¾à¦·à¦¾à¦¯à¦¼;<br>à§§à§­. à¦¬à¦¿à¦¶à§à¦¬à¦¬à§à¦¯à¦¾à¦ªà§€ à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼ à¦¸à§ƒà¦·à§à¦Ÿà¦¿à¦•à¦¾à¦°à§€ à¦¸à¦¿à¦†à¦‡à¦à¦‡à¦š (à¦šà§‡à¦‚-à¦‡à¦¯à¦¼à¦‚-à¦¹à§‹) à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à§¨à§¬ à¦à¦ªà§à¦°à¦¿à¦² à§§à§¯à§¯à§¯ à¦¤à¦¾à¦°à¦¿à¦–à§‡ à¦†Î¼à¦®à¦£ à¦•à¦°à§‡à¥¤<br>à§§à§®. à¦¤à¦¾à¦°à¦¬à¦¿à¦¹à§€à¦¨ à¦¦à§à¦°à§à¦¤à¦—à¦¤à¦¿à¦° à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¸à¦‚à¦¯à§‹à¦—à§‡à¦° à¦œà¦¨à§à¦¯ à¦‰à¦ªà¦¯à§‹à¦—à§€- à¦“à¦¯à¦¼à¦¾à¦‡à¦®à§à¦¯à¦¾à¦•à§à¦¸;<br>à§§à§¯. à¦ à¦à¦…à¦ž à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦­à§‚-à¦ªà§ƒà¦·à§à¦  à¦¹à¦¤à§‡ à¦¸à§à¦¯à¦¾à¦Ÿà§‡à¦²à¦¾à¦‡à¦Ÿà§‡ à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦•à¦°à¦¾à¦° à¦œà¦¨à§à¦¯ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼;<br>à§¨à§¦. à¦ªà§à¦°à¦® à¦²à§à¦¯à¦¾à¦ªà¦Ÿà¦ª à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°- à¦à¦ªà¦¸à¦¨, à§§à§¯à§®à§¨;<br>à§¨à§§. à¦ªà§à¦¨à¦°à¦¾à¦¬à§ƒà¦¤à§à¦¤à¦¿à¦®à§‚à¦²à¦• à¦•à¦¾à¦œà§‡ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à§‡à¦¶à¦¿ à¦¸à§à¦¬à¦¿à¦§à¦¾à¦œà¦¨à¦•;<br>à§¨à§¨. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦•à§à¦·à§‡à¦¤à§à¦°à§‡ à¦¤à¦¥à§à¦¯ à¦ªà¦°à¦¿à¦¬à¦¹à¦¨à§‡à¦° à¦œà¦¨à§à¦¯ à¦ªà¦°à¦¿à¦¬à¦¾à¦¹à§€ à¦ªà¦¥à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼- à¦¬à¦¾à¦¸;<br>à§¨à§©. à¦‰à¦ªà¦¾à¦¤à§à¦¤ à¦—à§à¦°à¦¹à¦£ à¦“ à¦¨à¦¿à¦°à§à¦—à¦®à¦£ à¦¬à¦¾à¦¸à§‡à¦° à¦¨à¦¾à¦® à¦¡à§‡à¦Ÿà¦¾à¦¬à§‡à¦¸;<br>à§¨à§ª. à¦“à¦°à¦¾à¦•à¦²- à¦à¦•à¦Ÿà¦¿ à¦¡à§‡à¦Ÿà¦¾à¦¬à§‡à¦¸ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦°;<br>à§¨à§«. à¦¡à§‡à¦Ÿà¦¾à¦¬à§‡à¦¸ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦° à¦à¦° à¦œà¦¨à§à¦®à¦¤à¦¾à¦°à¦¿à¦– à¦¹à¦²à§‹ à¦à¦•à¦Ÿà¦¿ à¦«à¦¿à¦²à§à¦¡;<br>à§¨à§¬. à¦¶à¦¿à¦•à§à¦·à¦¾à¦°à§à¦¥à§€à¦°à¦¾ à¦¸à¦¹à¦œà§‡ à¦†à¦¯à¦¼à¦¤à§à¦¤ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡ à¦‡à¦…à¦à¦“à¦ˆ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®;<br>à§¨à§­. System softwareà¦¥à¦¾à¦•à§‡ Startup disc G<br>à§¨à§®. à¦ªà¦¾à¦“à¦¯à¦¼à¦¾à¦° à¦…à¦ªà§‡à¦¨- à¦à¦•à¦Ÿà¦¿ à¦…à¦ªà¦¾à¦°à§‡à¦Ÿà¦¿à¦‚ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®;<br>à§¨à§¯. à¦ªà§à¦°à¦® à¦¸à¦«à¦² à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à¦¾à¦œà¦¾à¦°à§‡ à¦†à¦¸à§‡ à§§à§¯à§­à§¬ à¦¸à¦¾à¦²à§‡à¥¤<br>à§©à§¦. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦•à§‹à¦¨ à¦¬à§à¦¦à§à¦§à¦¿ à¦¬à¦¿à¦¬à§‡à¦šà¦¨à¦¾ à¦¨à§‡à¦‡;<br>à§©à§§. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¹à¦²à§‹ à¦à¦•à¦Ÿà¦¿ à¦•à§à¦·à¦¤à¦¿à¦•à¦¾à¦°à¦• à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¬à¦¾ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦°à¥¤<br>à§©à§¨. à¦®à§‡à¦•à¦¿à¦¨à¦Ÿà§‹à¦¶ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¸à¦¾à¦¹à¦¾à¦¯à§à¦¯à§‡ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¸à¦¬ à¦­à¦¾à¦·à¦¾ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à§‡à¦° à¦ªà§à¦° à¦® à¦¸à§à¦¯à§‹à¦— à¦†à¦¸à§‡;<br>à§©à§©. à¦•à¦®à¦ªà§à¦²à§‡à¦•à§à¦¸ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¨à¦•à§à¦¸à¦¾ à¦¤à§ˆà¦°à§€ à¦•à¦°à§‡à¦¨- à¦¡. à¦¸à§à¦Ÿà¦¿à¦¬à¦¿à¦œ;<br>à§©à§ª. à¦‡à¦‰à¦¨à¦¿à¦•à§à¦¸ à¦…à¦ªà¦¾à¦°à§‡à¦Ÿà¦¿à¦‚ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®à§‡ à¦¦à§à¦‡à¦¶â€™à¦° à¦…à¦§à¦¿à¦• à¦•à¦®à¦¾à¦¨à§à¦¡ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦¤à§‡ à¦¹à¦¯à¦¼;<br>à§©à§«. à¦®à§‡à¦¶à¦¿à¦¨ à¦²à§à¦¯à¦¾à¦™à§à¦—à§à¦¯à¦¼à§‡à¦œ à¦¦à§à¦‡à¦Ÿà¦¿ à¦¸à¦‚à¦•à§‡à¦¤ à¦¸à¦®à¦¨à§à¦¬à¦¯à¦¼à§‡ à¦—à¦ à¦¿à¦¤;<br>à§©à§¬. à¦ªà§à¦°à¦¾à¦šà§€à¦¨ à¦¬à§à¦¯à¦¾à¦¬à¦¿à¦²à¦¨à§‡ à¦—à¦£à¦¨à¦¾à¦° à¦ªà¦¦à§à¦§à¦¤à¦¿ à¦›à¦¿à¦² à§¨ à¦§à¦°à¦¨à§‡à¦°;<br>à§©à§­. à¦¹à§‡à¦•à§à¦¸à¦¾à¦¡à§‡à¦¸à¦¿à¦®à§‡à¦² à¦—à¦£à¦¨à¦¾à¦° à¦®à§Œà¦²à¦¿à¦• à¦…à¦‚à¦¶ à§§à§¬à¦Ÿà¦¿;<br>à§©à§®. à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦ªà§à¦°à¦® à¦“à¦¯à¦¼à§‡à¦¬ à¦¬à§à¦°à¦¾à¦‰à¦œà¦¾à¦°- à¦®à§‹à¦œà¦¾à¦‡à¦•;<br>à§©à§¯. à¦ªà§à¦° à¦® à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦²à§à¦¯à¦¾à¦™à§à¦—à§à¦¯à¦¼à§‡à¦œ- à¦«à¦°à¦Ÿà§à¦°à¦¾à¦¨;<br>à§ªà§¦. à¦²à¦¿à¦¨à¦¾à¦•à§à¦¸ à¦…à¦ªà¦¾à¦°à§‡à¦Ÿà¦¿à¦‚ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®à§‡à¦° à¦œà¦¨à¦•- à¦Ÿà§à¦¯à¦¾à¦­à§‡à¦²à¦¡ à¦²à¦¿à¦¨à¦¾à¦•à§à¦¸;<br>à§ªà§§. à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦ªà§à¦° à¦® à¦¸à§à¦¬à¦¯à¦¼à¦‚Î¼à¦¿à¦¯à¦¼ à¦—à¦£à¦¨à¦¾à¦° à¦¯à¦¨à§à¦¤à§à¦°- à¦®à¦¾à¦°à§à¦• à§§; à¦¯à¦¨à§à¦¤à§à¦°à¦Ÿà¦¿ à¦²à¦®à§à¦¬à¦¾à¦¯à¦¼ à¦›à¦¿à¦² à§«à§§ à¦«à§à¦Ÿ à¦¦à§ˆà¦°à§à¦˜à§à¦¯:<br>à§ªà§¨. à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦¦à§à¦°à§à¦¤à¦—à¦¤à¦¿à¦¸à¦®à§à¦ªà¦¨à¦¡à¦¼à¦¬ à¦Ÿà§‡à¦ª- à¦®à§à¦¯à¦¾à¦—à¦¨à§‡à¦Ÿà¦¿à¦• à¦Ÿà§‡à¦ª;<br>à§ªà§©. à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦ªà§à¦°à§‡à¦Ÿà¦¾à¦°- à¦…à¦¨à§à¦¬à¦¾à¦¦à¦• à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®;<br>à§ªà§ª. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦¤à¦¿à¦¨ à¦§à¦°à¦¨à§‡à¦°- à¦–à¦…à¦˜, à¦—à¦…à¦˜, à¦¡à¦…à¦˜;<br>à§ªà§«. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡ à¦¦à§‡à¦¯à¦¼à¦¾ à¦…à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨à§€à¦¯à¦¼ à¦‡à¦¨à¦«à¦°à¦®à§‡à¦¶à¦¨à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼- à¦à¦°à¦¨à¦¨à¦¬à§Žà¦°à¦‚à¦¯;<br>à§ªà§¬. à¦‹à¦·à¦§à¦‚à¦¯ à¦¸à¦¡à¦¼à¦¾à¦°à¦¬ à¦¤à§‡ à¦¤à¦¿à¦¨ à¦§à¦°à¦¨à§‡à¦° à¦‚à§à¦¸à¦¨à¦¡à¦¼à¦· à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤<br>à§ªà§­. à¦šà¦¯à¦¡à¦¼à¦ƒà¦¡à¦¼à¦‚à¦¯à¦¡à¦¼à¦¢à¦¼ à¦ à¦à§à¦¯à¦¾à¦‚à¦•à¦° à¦ªà¦¯à¦¼à§‡à¦¨à§à¦Ÿ à§« à¦ªà§à¦°à¦•à¦¾à¦°;<br>à§ªà§®. à¦¤à¦¥à§à¦¯ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦à¦•à¦Ÿà¦¿ à¦¸à¦®à¦¨à§à¦¬à¦¿à¦¤ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿;<br>à§ªà§¯. à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦…à¦¨à¦²à¦¾à¦‡à¦¨ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¸à§‡à¦¬à¦¾ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼- à§ª à¦œà§à¦¨, à§§à§¯à§¯à§¬ à¦¤à¦¾à¦°à¦¿à¦–à§‡;<br>à§«à§¦. à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦ªà§à¦°à¦® à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦†à¦°à¦ªà¦¾à¦¨à§‡à¦Ÿ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à§§à§¯à§¬à§¯ à¦¸à¦¾à¦²à§‡;<br>à§«à§§. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦•à§‡à¦° à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦ªà¦°à¦¿à¦šà¦¿à¦¤à¦¿ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à§§à§¯à§¯à§ª à¦¸à¦¾à¦²à§‡à¥¤<br>à§«à§¨. à¦ªà§à¦°à¦® à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦°- à¦²à§‡à¦¡à¦¿ à¦…à§à¦¯à¦¡à¦¾ à¦…à¦¸à¦¾à¦¸à§à¦Ÿà¦¾ à¦¬à¦¾à¦¯à¦¼à¦°à¦¨ (à¦•à¦¬à¦¿ à¦²à¦°à§à¦¡ à¦…à§à¦¯à¦¡à¦¾ à¦¬à¦¾à¦¯à¦¼à¦°à¦¨à§‡à¦° à¦•à¦¨à§à¦¯à¦¾);<br>à§«à§©. à¦®à§à¦¯à¦¾à¦•à§à¦¸à§‡à¦®à¦¿à¦¡à¦¿à¦¯à¦¼à¦¾ à¦«à§à¦²à¦¾à¦¶- à¦à¦•à¦Ÿà¦¿ à¦à¦¨à¦¿à¦®à§‡à¦¶à¦¨ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦°;<br>à§«à§ª. à¦¸à§à¦•à§‹à¦Ÿà¦¿à¦¯à¦¼à¦¾- à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾à¦° à¦…à§à¦¯à¦¬à¦¾à¦•à¦¾à¦¸;<br>à§«à§«. à¦¸à¦°à§‹à¦¬à¦°à§à¦£- à¦œà¦¾à¦ªà¦¾à¦¨à§‡à¦° à¦…à§à¦¯à¦¬à¦¾à¦•à¦¾à¦¸;<br>à§«à§¬. à¦•à§à¦¯à¦²à¦•à§à¦²à§‡à¦Ÿà¦°à§‡à¦° à¦¸à¦°à§à¦¬à§‡à¦šà§à¦š à¦•à§à¦·à¦®à¦¤à¦¾ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦•à¦°à¦¾;<br>à§«à§­. à¦•à§€ à¦¬à§‹à¦°à§à¦¡à§‡ à¦«à¦¾à¦‚à¦¶à¦¨à¦¾à¦² à¦•à§€ à§§à§¨à¦Ÿà¦¿;<br>à§«à§®. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦¸à§à¦‡à¦š à¦…à¦¨ à¦•à¦°à¦¾à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦¾à¦¥à§‡ RAM à¦à¦° à¦œà¦¾à¦¯à¦¼à¦—à¦¾à¦° à¦ªà¦°à¦¿à¦®à¦¾à¦£ à¦ªà¦°à§€à¦•à§à¦·à¦¾ à¦•à¦°à§‡ operating system<br>à§«à§¯. Ok à¦à¦¬à¦‚ Cancel à¦…à¦¥à¦¬à¦¾ Close à¦¬à§‹à¦¤à¦¾à¦® à¦¥à¦¾à¦•à§‡ Dialogue Boxà¦;<br>à§¬à§¦. à¦¬à¦°à§à¦£à¦­à¦¿à¦¤à§à¦¤à¦¿à¦• à¦…à¦ªà¦¾à¦°à§‡à¦Ÿà¦¿à¦‚ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦® DOS, UNIX<br>à§¬à§§. Visual Basicà¦ à¦¦à§à¦‡ à¦§à¦°à¦¨à§‡à¦° à¦§à§à¦°à§à¦¬à¦• à¦¥à¦¾à¦•à§‡;<br>à§¬à§¨. Visual Basic à¦à¦° Project à¦ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ Object- Procedure<br>à§¬à§©. E-mail à¦ à¦¿à¦•à¦¾à¦¨à¦¾à¦° à¦¡à§‹à¦®à§‡à¦¨ à¦¨à¦¾à¦®à§‡à¦° à¦¸à¦°à§à¦¬à¦¶à§‡à¦· à¦…à¦‚à¦¶à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ Top Level Domain (TLD)<br>64. LAN Ges LAN Topology- BUS, STAR, RING;<br>à§¬à§«. Flash à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à§‡à¦° à¦­à¦¿à¦¤à§à¦¤à¦¿ Timeline;<br>à§¬à§¬. à¦¸à§à¦‡à¦œà¦¾à¦°à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦° à¦¬à¦¿à¦œà§à¦žà¦¾à¦¨à§€à¦—à¦£ www à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾à¦Ÿà¦¿ à¦‰à¦¦à§à¦­à¦¾à¦¬à¦¨ à¦•à¦°à§‡à¦¨ à§§à§¯à§¯à§§ à¦¸à¦¾à¦²à§‡;<br>à§¬à§­. à§§à§¯à§¯à§© à¦¸à¦¾à¦²à§‡ à¦ªà§à¦°à¦¥à¦® à¦†à¦¬à¦¿à¦¸à§à¦•à§ƒà¦¤ à¦¬à§à¦°à¦¾à¦‰à¦œà¦¾à¦°à§‡à¦° à¦¨à¦¾à¦® à¦®à§‹à¦œà¦¾à¦‡à¦•, à¦†à¦¬à¦¿à¦¸à§à¦•à¦¾à¦°à¦•- à¦®à¦¾à¦°à§à¦• à¦à¦¡à§à¦°à¦¿à¦¸à¦¨;<br>à§¬à§®. à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦²à¦¿à¦‚à¦• à¦¥à§‡à¦•à§‡ à¦²à¦¿à¦‚à¦•à§‡ à¦—à¦®à¦£ à¦•à¦°à¦¾à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ à¦²à¦— à¦‡à¦¨;<br>à§¬à§¯. Dial up internet connectionà¦ à¦Ÿà§‡à¦²à¦¿à¦«à§‹à¦¨ à¦²à¦¾à¦‡à¦¨ à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨;<br>à§­à§¦. à¦Ÿà§‡à¦²à¦¿à¦«à§‹à¦¨ à¦†à¦¬à¦¿à¦¸à§à¦•à§ƒà¦¤ à¦¹à¦¯à¦¼ à¦†à¦²à§‡à¦•à¦œà¦¾à¦¨à§à¦¡à¦¾à¦° à¦—à§à¦°à¦¾à¦¹à¦¾à¦® à¦¬à§‡à¦² à¦•à¦°à§à¦¤à§ƒà¦• à§§à§­à§®à§¬ à¦¸à¦¾à¦²à§‡à¥¤<br>à§­à§§. Zoom outâ€”image à¦›à§‹à¦Ÿ à¦•à¦°à¦¾;<br>à§­à§¨. Gray scale à¦‡à¦®à§‡à¦œà¦•à§‡ à¦¸à¦¾à¦¦à¦¾-à¦•à¦¾à¦²à§‹à¦¤à§‡ à¦°à§‚à¦ªà¦¾à¦¨à§à¦¤à¦°à¦¿à¦¤ à¦•à¦°à¦¾ à¦¯à¦¾à¦¯à¦¼ Threshold à¦•à¦®à¦¾à¦¨à§à¦¡;<br>à§­à§©. à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¸à§‡à¦¬à¦¾à¦¦à¦¾à¦¨à¦•à¦¾à¦°à§€ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨- à¦ªà§à¦°à¦¶à¦¿à¦•à¦¾à¦¨à§‡à¦Ÿ, à¦—à§à¦°à¦¾à¦®à§€à¦£ à¦¸à¦¾à¦‡à¦¬à¦¾à¦° à¦¨à§‡à¦Ÿ, à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦…à¦¨à¦²à¦¾à¦‡à¦¨;<br>à§­à§ª. à¦¸à¦°à§à¦¬à¦ªà§à¦°à¦® à¦«à¦Ÿà§‹à¦¶à¦ª à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦¹à¦¯à¦¼ Apple Macintosh à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡;<br>75. The mechanism of digital is- Symbol of number;<br>76. The task of operating system for hardware and software is- Make bridge;<br>77. The first calculation machine in the history of computer- Abacus;<br>78. The storage capacity of RAM cannot be increased;<br>79. The instruction for starting the computer are housed on- Read Only Memory chip;<br>80. A destination for data going outside the system is called- Sink;<br>81. In a computer system there are 4 parts;<br>82. Unwanted e mail- Spam;<br>83. The word â€˜Computerâ€™ came from Geek;<br>84. The process of starting of resting a computer is â€“ Boot;<br>85. The ability to have a number of applications running at the same time is called â€“ Integrated;<br>86. In general, â€œMy Documentâ€ is located at- C drive;<br>87. In general, letter D is considered [except A, B &amp; C] for Hard Disk Drive;<br>88. Hard disk is a auxiliary drive;<br>89. Keyboard is used to store data;<br>90. Register is a part of CPU;<br>91. The printers usually used in office work- Dot matrix, Inkjet, LASER;<br>92. A dot matrix printer prints with â€œpin and ribbobnâ€.<br>93. The term â€œHard copyâ€ means- Printed copy;<br>94. The best chart for showing parts of a whole- Pie;<br>95. A separate file sent as part of an email message is called a/an- attachment;<br>96. Computer memory is normally measured in Gigabytes;<br>97. Time to spin the needed data under head- Latency time;<br>98. Time to position the head over proper track- Seek time;<br>99. Access time is Seek time + Latency time;<br>100. The smallest power interruption that can cause memory errors or cause the computer to lock up- 1/200 seconds;<br>101. Properly arranged data is called- Information;<br>102. Another word for a Daisy Wheel Printer- Golf ball printer.<br>103. The wheel of mouse can make it easier scroll through documents;<br>104. First program of Microsoft- DOS;<br>105. MS-DOS is operating system for IBM PCs;<br>106. DOS is not a multi user multi taking operating system;<br>107. â€˜DOSâ€™ floppy disc does not have virtual memory;<br>108. Text based operating system- DOS, UNIX (for mainframe computer);<br>109. Mac Operating System is compatible for Macintosh computer;<br>110. The disk contains operating system is called- start up disk;<br>111. Cache- related to memory of a computer;<br>112. Cache memory have the shortest access time;<br>113. The computer that has no hard disc storage but sends input and receives output from the server is knows as- Host;<br>114. Binary system is used to store data in a computer;<br>115. Example of optical storage device (auxiliary memory)- Hard Disk, CD, DVD, Pen Drive;<br>116. USA is the inventor of Internet in 1969. Invented by- Vinton Gray Cerf;<br>117. The predecessor of modern internet- Arpanet (Advance Research Project Agency Network);<br>118. Web browser is used to display web contents;<br>119. Popular Web browsers- Mozilla Firefox, Opera, Google chrome, Internet Explorer;<br>120. Search engines searches websites by keyword(s);<br>121. Popular search engines- Google, Yahoo, Bing, Hotmail, MSN;<br>122. The resolution of a printer is measured in Dot Per Inch (DPI);<br>123. Tape speed- Inch per second;<br>124. The most commonly used standard data code to represent alphabetical numerical and<br>punctuation characters used in electronic data processing system is called- ASCII<br>(American Standard Code for Information Interchange).<br>125. The two basic type of record access methods are- Sequential and Random;<br>126. Lower efficiency is the limitation of high level language;<br>127. Sequential file organization is the most efficient for a file with a high degree of file activity.<br>128. In a punched card system data is processed by a accounting machine, keypunch machine and sorter;<br>129. The central device in star topology is- Hub/Switch;<br>130. An online backing storage system capable of storing larger quantities of data is- Mass storage;<br>131. DASD-A class of storage device that can access storage locations in any others;<br>132. Disk- An item of storage medium in the form of circular plate;<br>133. Aback extension refers usually backup file.<br>134. Wi-Fi means Wireless fidelity;<br>135. WiMax- Wireless Internet Technology;<br>136. A technique used by codes to convert an analogy signal into a digital bit stream is known as- pulse code modulation;<br>137. Interconnected computer configuration- Multiprogramming;<br>138. An input and output device at which data enters or leaves a computer system- Terminal;<br>139. A group of magnetic tapes, video or terminals usually under the control of one master- Cluster;<br>140. The data recording format is most of the modern magnetic tape is â€“ 8 bit EBCDIC;<br>141. The most common type of storage device is- Magnetic;<br>142. Each model of a computer has a unique machine language;<br>143. A computer connected with server (server client) is called- work station;<br>144. Microsoft is trying to buy yahoo search engine.<br>145. Programming languages- Fortran, Java, C++, BASIC, LOGO, COBOL, Pascal;<br>146. 1st Programming language- Fortran (Formula Translator);<br>147. The characteristic of computers that differentiate from the other electronic devices- Programming;<br>148. Instruction in computer language consist of OPCODE &amp; OPERAND;<br>149. Other name of Chip- IC (Integrated Circuit);<br>150. The component works first, when you start your computer- Processor;<br>151. The utility program could improves the speed of a disk- Fragmentation;<br>152. Disk Defragmentation is used to rearrange files in a disk;<br>153. Bluetooth operation use- radio technology;<br>154. Bluetooth is the name for the 802.15 wireless networking standard;<br>155. A CD-ROM drive is labeled with 52x; Here 52x is a measurement of Data transfer rate.<br>156. Access time is made up of- data transfer time;<br>157. Functional key F12 is- save button;<br>158. Pictorial representation of an operation- icon;<br>159. Pixel of a color monitor consists of 3 color dot. The colors are- Blue, Green &amp; Red.<br>160. The inventor of punch card- Joseph Marie Jacquard;<br>161. 1 Byte = 21 to 23 BITs = 2 to 8 BITs information;<br>162. 1 kilobyte = 1024 bytes = 210 bytes information;<br>163. 1 Megabyte = 1024 x 1024 bytes = 220 bytes = 106 bytes information;<br>164. 1GB = = 1024 x 1024 x 1024 bytes information = 230 bytes information;<br>165. One millisecond is equal to a 1000th of a second;<br>166. The largest unit of storage- Terabyte;<br>167. Modem is a device for exchanging data;<br>168. Data transfer rate of a dial up MODEM is measured in kbps (Kilo Byte per Second);<br>169. Modem connection is used to assess the internet in a very remote location;<br>170. Antivirus software is an utility software;<br>171. In MS Word application package, you can produce some letter for different persons by using- mail merge;<br>172. If you format a disk then- everything will be lost.<br>173. In the numerical key pad of a standard key board available- 17 keys;<br>174. In a standard keyboard functional keys available- 12 keys;<br>175. Charles Babbage invented his first calculating machine in 1812;<br>176. Analytical engine of Charles Babbage was the simplification of modern computer;<br>177. The specialty of EDVAC- storage program;<br>178. â€œMicrosoft Outlookâ€ is a software designed to function as- An Internet Explorer;<br>179. Transistor invented in 1948;<br>180. Integrated Circuit (IC) invented in 1958;<br>181. The most distinctive difference between a LAN and a WAN is- Distance covered;<br>182. Programming errors detected by the language translator are called- Syntax errors;<br>183. MS Access- A database package;<br>184. MS Word, Word Star, WP- Word Processing Packages;<br>185. In windows operating system â€œctrl + alt + delâ€ command indicate- Shutdown the computer;<br>186. Screen size does not affect the resolution of a video display image;<br>187. Records are composed of fields;<br>188. Fields are composed of- bytes and character;<br>189. LASER printers are known as- Character printer;<br>190. High speed &amp; high quality printer- LASER printer;<br>191. The number system used to store data in a computer is- Binary;<br>192. The fasted data transmission media is- Fiber optic cable;<br>193. The low level language- machine language, assembly language;<br>194. High level language is also called- Problem oriented language, Business oriented language, Mathematically oriented language;<br>195. Interpreter translate one instruction- at a time;<br>196. The component hold a charge even through power has been removed- Capacitor;<br>197. Different components on the motherboard of a PC processor unit are linked together by sets or parallel electrical conducting lines- Busses;<br>198. Odd parity bit &amp; Even parity bit associated with error detector;<br>199. Analog computer works on the supply for continuous electrical pulses;<br>200. Speed measurement device of vehicle- Analog computer;<br>201. Graphics for word processor- Clip art;<br>202. The file run automatically if it is available extension-<br>203. The general term for buying and selling through the internet is- e. commerce;<br>204. Removable disk- Floppy disk, compact disk, DVD, Pen drive;<br>205. Irremovable disk- Hard disk;<br>206. Hard disc is coated in both side above-Magnetic Metallic Oxide;<br>207. The command â€œshift deleteâ€- completely delete;<br>208. The scanner used in banking industry is- Magnetic Ink Character Reader (MICR);<br>209. â€œBullet and Numberingâ€ option of MS Word at- Format menu;<br>210. â€œHeader and Footerâ€ option of MS Word at- Insert menu;<br>211. Windows 98 Operating System is 32 bit;<br>212. A Hybrid computer- Resembles both a digital &amp; analog computer;<br>213. The silicon chips used for data processing are called- PROM chips;<br>214. Input devices- Mouse, Keyboard, Scanner, Digital Camera, Joystick, light pen.<br>215. Output devices- Monitor, Printer, Speaker, Plotter.<br>216. Input &amp; Output devices- Modem, Touch screen monitor, Terminal.<br>217. IT stands for- Information Technology;<br>218. Submarine power cables are cables for- Electrical power running through the sea, below the surface;<br>219. The two main types software are- System software &amp; Application software;<br>220. A computer must have- an operating system;<br>221. The principal system software is known as- Operating system;<br>222. The most important part (central portion) of Operating System- Kernel;<br>223. The â€œInformation Highwayâ€ is also known as- Internet;<br>224. All classes IP networks can be divided into smaller networks called- Subnet;<br>225. A password is a form of secret authentication data that is used to control access to a resource;<br>226. A `file` is a unit of- Information;<br>227. A computer is a device for processing, storing and displaying- Information;<br>228. A spreadsheet is a type of- Accounting program;<br>229. Scientific software is typically used to solve differential equations;<br>230. A personal computer is a type of- microcomputer;<br>231. The term `Micro` (extremely small) denotes 10âˆ’6 ;<br>232. Palmtop is the name of- a small handheld computer;<br>233. A Pentium 4 (P-4) employs roughly 40 million transistors;<br>234. Mark-1, Apple-1 &amp; Collossus were- initial desktop computers;<br>235. The printers in pre-1950s were- Punch card;<br>236. An error in software designing which can even cause a computer to crash is called- bug;<br>237. Before the 1950s, computers were mostly owned by universities and research labs;<br>238. The computer museum is situated in USA;<br>239. The 1st Electronic computer was- ENIAC;<br>240. The 1st commercially produced and sold computer was- UNIVAC (1951);<br>241. The 1st digital computer- UNIVAC-1 [Edition December, 2008];<br>242. IBM was provided software for PCs by-Microsoft;<br>243. The first personal computer- Sphere 1;<br>244. Time sharing, teletyping were associated with- mainframe computers;<br>245. Midrange computer- Minicomputer;<br>246. The first electric computer with storage program- EDSAC;<br>247. The first computer game- Space war (1962);<br>248. There are many computers or dumb computers are jointed with Mainframe computers;<br>249. RAM cache will not be more than one-fourth of RAM;<br>250. Memory capacity of a CD is 700MB;<br>251. Networking operating system is- Resource sharing;<br>252. Personal computer, Mainframe and Mainframe computers can use the operating system-UNIX operating system;<br>253. Real time server meant- Then and then;<br>254. The internal memory of computer is called- Main memory;<br>255. The main memory of Atlas operating system- Dram;<br>256. The main part of Atlas operating system- Device drive;<br>257. The important part for activating of hardware of computer- Software;<br>258. Computer can works in diversifying- for processor;<br>259. DPT starts in Macintosh computer;<br>260. Clone is duplication of developed computer;<br>261. First computer was installed in Bangladesh in 1964 at Bangladesh Nuclear Energy Commission, Model: IBM-1620;<br>262. The unit of speed of computers work is- Nano second (1 Nano second =10âˆ’9 second;<br><br><strong>Computer Logic :</strong><br><br>263. George Boole find the relationship between Logic &amp; Mathâ€™s in 1854;<br>264. George Boole invented the Boolean Algebra;<br>265. There are 2 values of each variable in Boolean Algebra;<br>266. There are 3 basic/fundamental gates in Boolean Algebra;<br>267. NOT is one of the basic/fundamental gates of Boolean Algebra;<br>268. The logic gate NOT has one input and one output;<br>269. NOT operator is one of the logical operator;<br>270. The logic gate NOT has- One output &amp; One Output;<br>271. The main character of NOT gate is- reverse the signal;<br>272. X-NOR gate is the combination of X-OR gate and NOT gate;<br>273. John Nepiar invented- Logarithms;<br>274. Super computers, Mainframe computers, mini computers and Micro computers are based on Digital;<br>275. The arranging of data in a logical sequence is called- sorting;<br>276. The brain of a computer within the CPU is- Arithmetic Logic Unit (ALU);<br>277. Central Processing Unit is combination of Arithmetic Logic Unit &amp; Control Unit;<br>278. The ancient Babylon people used 2 types of counting system;<br>279. The ancient Babylon people used 15 based for large counting;<br>280. The ancient Babylon people used 10 based for small counting;<br>281. The ten-based book was published in India;<br>282. Al Khwarizmi wrote a book on ten based;<br>283. Binary number system is mainly used for computer system;<br>284. In binary number system 2 is the base;<br>285. In decimal system there are 10 digits;<br>286. In number system the lowest unit is digit;<br>287. Computers use 2 digits for its electronic job purpose: 0 &amp; 1;<br>288. 1 (One) is the value of any number when its power zero;<br>289. The binary compliment of 0 is 1;<br>290. The binary compliment of 1 is 0;<br>291. The number with the fraction is called- real number;<br>292. There are 2 kinds of real number; Any number with fraction is called- real number;<br>293. Rational number is understood by integer;<br>294. Internal processing (task) of computer is normally performed in- Binary system;<br>295. In octal number system, 8 base;<br>296. In Hexadecimal number system the base is 16;<br>297. Octal + Decimal = Hexadecimal number;<br>298. ASCII code that used for the English and Roman language;<br>299. There are 2 steps in ASCII;300. There are 256 symbols used for the main English language;<br>301. There are 85000 symbols used for the Chinese language;<br>302. There are 65536 codes for UNICODE consodium in the world for all language;<br>303. The latest version of UNICODE 501;<br>304. The length of Unicode character is 16 bits;<br>305. Bit is the short form of- Binary &amp; digit;<br>306. The first digital computer was invented by- Blias Pascal;<br>307. The name of 0 &amp; 1 is bit;<br>308. The name of the word that constitute of eight bits in Binary system-Byte; 8 bit=1 Byte.<br>309. 8 bits are used for processing data;<br>310. The name of Coding system that is used in Bangla language- UNICODE;<br>311. An EBCDI code is 8 Bit;<br>312. Binary Coded Decimal (BCD) is 4 Bit;<br>313. Low level language is own language of computer which is written in binary;<br>314. The capacity of 3.5 inches floppy disc is 1.44 MB;<br><br><strong>Spreadsheet Analysis :</strong><br><br>315. Spreadsheet is a accounting program;<br>316. The program that used for calculations relating purpose is- Spreadsheet program;<br>317. The special advantage of Spreadsheet program- Large and complicated calculation;<br>318. The popular and common used spread program is MS Excel;<br>319. In 1985 Microsoft company prepared spreadsheet for- Macintosh computer;<br>320. The command of spreadsheet program is called- Menu driven;<br>321. MS Excel spreadsheet program is Graphical User Interface (GUI) type program;<br>322. The reserve words in BASIC include GOTO;<br>323. Most commonly used spreadsheet program for DOS is- LOTUS 123;<br>324. Lotus is a text based spreadsheet program;<br>325. The nature of organization of BASIC is open;<br>326. In MS Excel 2003 program maximum number of rows 65536 and columns 256;<br>327. In MS Excel 2007 program maximum number of rows 1048576 and columns 16384;<br>328. The name of the point where a row and a column crossed is- Cell;<br>329. An active cell in work sheet mean- Ready for execute for command;<br>330. Cell address A2 means- 2nd row of column A;<br>331. In spreadsheet program range mean- Select some cell at a time;<br>332. There are 2 kinds of cell in MS Excel program;<br>333. Using logical formula based mathematical works be done in spreadsheet program;<br>334. At the beginning of formula in spreadsheet program Equal Sign (=) is to be typed;<br>335. The command of symbols currency (dollar, Taka) remain in MS Excel program- format<br>cells of format menu;<br>336. The cells in the worksheet when cells are run from top to bottom is called- column;<br>337. The place of Formula typing in MS Excel is- Formula Bar;<br><br><strong>Word Processing :</strong><br><br>338. The program used for word processing is called- package program;<br>339. Key board is joined with computer like type writer for Input data;<br>340. Shift key helps to write English capital letters form key board;<br>341. Caps Lock is the function of display English capital letter;<br>342. Auto correction is possible in English language software;<br>343. The line at the top of File, Edit, View in a document is called- Title bar;<br>344. G button is used for link in time of Bengali text;<br>345. The weekly Anandapatra published in 1987 by Mostafa Jabbar;<br>346. To delete a sentence, the command is- press delete button after selecting the sentence;<br>347. Different size of characters in word processing software is called as- Font;<br>348. Mail merge is- Prepare a document from two file;<br>349. Move cursor is done by arrow key;<br>350. Point is the unit of measure character;<br>351.To select a paper size, the command is- page set up from file;<br><br><strong>Computer Programming :</strong><br><br>à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦†à¦¦à§‡à¦¶ à¦¨à¦¿à¦°à§à¦¦à§‡à¦¶ à¦ªà§à¦°à¦¦à¦¾à¦¨à§‡à¦° à¦œà¦¨à§à¦¯ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à§à¦à¦¤à§‡ à¦ªà¦¾à¦°à§‡ à¦à¦®à¦¨ à¦•à¦¿à¦›à§ à¦¸à¦‚à¦•à§‡à¦¤ à¦à¦¬à¦‚ à¦•à¦¤à¦¿à¦ªà¦¯à¦¼ à¦¨à¦¿à¦¯à¦¼à¦®à¦•à¦¾à¦¨à§à¦¨ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡ à¦ªà§à¦°à§‹à¦—à¦¾à¦® à¦¤à§ˆà¦°à§€ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¤à§ˆà¦°à§€à¦° à¦œà¦¨à§à¦¯ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¸à¦•à¦² à¦¨à¦¿à¦¯à¦¼à¦® à¦•à¦¾à¦¨à§à¦¨ à¦“ à¦¸à¦‚à¦•à§‡à¦¤à¦—à§à¦²à§‹à¦•à§‡ à¦à¦•à¦¤à§à¦°à§‡ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à§‡à¦° à¦­à¦¾à¦·à¦¾ à¦¬à¦²à§‡à¥¤ à¦à¦•à¦Ÿà¦¿ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¶à¦¤ à¦¸à¦¹Â¯à§à¦° à¦‡à¦²à§‡à¦•à§à¦Ÿà§à¦°à¦¨à¦¿à¦• à¦¸à§à¦‡à¦š à¦¸à¦®à¦¨à§à¦¬à¦¯à¦¼à§‡ à¦¤à§ˆà¦°à§€, à¦¯à¦¾à¦° à¦¦à§à¦‡à¦Ÿà¦¿ à¦…à¦¬à¦¸à§à¦¥à¦¾ OFF / ON à¦¥à¦¾à¦•à§‡à¥¤ à¦à¦¦à§‡à¦°à¦•à§‡ à¦¦à§à¦Ÿà¦¿ à¦¸à¦‚à¦•à§‡à¦¤ â€™à§§â€™ à¦“ â€™à§¦â€™ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦ªà§à¦°à¦•à¦¾à¦¶ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à¥¤ à§§à§¯à§ªà§« à¦¸à¦¾à¦² à¦¥à§‡à¦•à§‡ à¦¶à§à¦°à§ à¦•à¦°à§‡ à¦ à¦ªà¦°à§à¦¯à¦¨à§à¦¤ à¦•à¦¯à¦¼à§‡à¦• à¦¶à¦¤ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦²à§à¦¯à¦¾à¦™à§à¦—à§à¦¯à¦¼à§‡à¦œ à¦†à¦¬à¦¿à¦¸à§à¦•à§ƒà¦¤ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤<br><br>352. A series of instructions that tells a computer what to do , how do it is called- program;<br>353. Chief component of first generation computer was- Vacuum Tubes and Valves;<br>354. First generation programming language â€“ Machine language;<br>355. The language which is directly understood by the computer without translation program Machine language;<br>356. Second generation computer was developed in during 1956 to 1965;<br>357. Second generation programming language- Assembly language;<br>358. The third generation programming language is High level language;<br>359. Forth generation programming language- Very High level language;<br>360. Fifth generation programming language- Natural language;<br>361. Computer can understand human language after converting into machine language;<br>362. The present time is called age of information;<br>363. In industries the device is used as alternative of worker is called- Robot;<br>364. Computer is not intelligent like man;<br>365. Computer cannot be used to exchange of feelings;<br>366. 1st Generation computer- EDSAC;<br>367. 2nd Generation computer- IBM 1401;<br>368. Vacuum tubes- Computers of 1st generation;<br>369. Transistors instead of bulbs at first use in- Computers of 2nd generation;<br>370. High level language used in- 2nd generation computer;<br>371. Integrated circuit (IC) was in use in- 3rd generation computer;<br>372. Micro Computers (Micro processor)- 4th Generation computer;<br>373. The brain of a computer- Microprocessor;<br>374. Microprocessor invented in 1971;<br>375. Intel Itanum microprocessor is 128 bit;<br>376. A physical connection between the microprocessor memory and other parts of the microcomputer is known as- address bus;<br>377. A basic unit of measurement for capacitors is- farad;<br>378. At first Microprocessor manufactured by- Intel;<br>379. Microprocessor is used for processing data;<br>380. Intel 4080 was the model of the first microprocessor was marketed on November 1971;<br>381. The Microprocessor 8080 was manufactured by Intel in 1974;<br>382. Micro computer were first marketed by Apple company in 1976, Brand name- Apple;<br>383. International Business Machine (IBM) company marketed her microcomputer in 1981;<br>384. Apple company marketed her new series of microcomputer with Macintosh brand name in 1984 and earned quick popularity;<br>385. The translation from heavy computers to PCs was made possible by using- microprocessor;<br>386. Several lacks of transistors make a Microprocessor;<br>387. There are 5 generations of computers;<br>388. Fifth generation computer is still under development;<br>389. Artificial intelligence is associated with- fifth generation;<br>390. Super Computer- 5th generation computer;<br>391. 5th generation computer is also known as Knowledge information processing system;<br>392. Assembler is a software;<br>393. Translator convert programming instruction into Machine language;<br>394. Translator software is interpreter or compiler;<br>395. Main goal of programming is satisfactory solution of problem;<br>396. There are 3 types of programming language- i. Machine language, ii. Assembly language, iii. High level language;<br>397. Compiler software is used to convert High Level language into Machine language;<br>398. The program that used in High level language is- Source code;<br>399. In a perfect program there are 4 steps- i. Identity the problem, ii. Flow chart, iii. Code, iv. Debug;<br>400. When flow chart is converted into computer programming language is called- Coding;<br>401. Flow chart is the pictorial form of the different steps of a program;<br>402. Pseudo code used in programming, the word â€˜Pseudoâ€™ come from Greek;<br>403. In programming language â€˜Pseudoâ€™ means- It is not true;<br>404. When some instruction are written before using the programming language is called- Pseudo code;<br>405. Boolean data type is 2 byte;<br>406. Integer data type is 2 byte;<br>407. The size of â€˜Dateâ€™ data type = 8 byte; [each character 2 byte]<br>408. Property, Event and Method are the base of a object oriented programming;<br>409. A visual basic programming does have 3 mood;<br>410. When controls are used on the form at the design mood visual basic programming is called Interface of program;<br>411. The principal goal of a visual basic programming language is fast and easy window based program;<br>412. In 3rd step coding work is done in programming;<br>413. Flow chart is one of the base of programming;<br>414. Coding means write program;<br>415. 3 types of operators used in visual Basic program;<br>416. Array- One kind of variable;<br>417. DO --------- LOOP is the statement, means- repetition;<br>418. The short form of Combo box- object in visual basic programming- cbo;<br>419. The short form of command Button in visual Basic programming- cmd;<br>420. The short form of label object in visual basic programming- lbl;<br>421. The short form of Text object in visual basic program- txt<br>422. Visual basic programming marketed in 1960;<br>423. The program that translate program thatâ€™s written in high level language into machine language is called- Compiler;<br>424. The â€˜Add or remove programsâ€™ utility can be found in- Control panel;<br>425. The task of a debug program is to look into all programs to- Locate and correct errors;<br>426. The process of identifying and correcting mistakes in a computer program is referred to as- Debugging [Wrong program];<br>427. There are three types of errors in a program, namely- (a). Syntax error; (b). Logical error; (c). Executive error.<br>428. In a computer program, the process of executing the same instructions over and over is called- Looping;<br><br><strong>Computer Network and Internet:</strong><br><br>429. Network can exchange data in between different companies;<br>430. There are 2 types of Network in computers in context of geographical region- Local Area Network (LAN) and Wide Area Network (WAN);<br>431. When computers are installed very near to each other is the Local Area Network;<br>432. When all the computers are installed a long way distance or among the countries is the Wide Area Network;<br>433. Wired and Wireless are the medium for making internet or network;<br>434. The structure that creates network among the computers is Topology;<br>435. The member of the Local Area Network is â€“ Bus Topology, Ring Topology, Star Topology, Completely connected Topology, Delta Topology, Hybrid Topology;<br>436. The function of Delta Bus among the different computers- Delta transfer;<br>437. In Bus Topology does not have Host computer;<br>438. In Star Topology does have Host computer;<br>439. In Star Topology Host computer plays role of bridge with the terminal;<br>440. The name of extended form of Star Topology is- Tree Topology;<br>441. The Star Topology does not allow to transfer data directly from computer to computer;<br>442. Hybrid Topology consist of Ring + Bus + completely connected Topology;<br>443. Internet was popularly known to all and got its recognition in 1994;<br>444. The different servers of different cities come under satellite at the beginning of 90â€™s;<br>445. Each and every document of Internet purpose must have their won Address;<br>446. Uniform Resource Location (URL) is the address of document in internet;<br>447. There are 3 parts in an internet address;<br>à§ªà§ªà§®. E-mail à¦ à¦¿à¦•à¦¾à¦¨à¦¾ à¦¦à§à¦‡à¦­à¦¾à¦—à§‡ à¦¬à¦¿à¦­à¦•à§à¦¤;<br>à§ªà§ªà§¯. E-mail à¦ à¦¿à¦•à¦¾à¦¨à¦¾à¦¯à¦¼ @ à¦šà¦¿à¦¹à§à¦¨ à¦…à¦¬à¦¶à§à¦¯à¦‡ à¦¥à¦¾à¦•à§‡;<br>à§ªà§«à§¦. E-mail à¦ à¦¿à¦•à¦¾à¦¨à¦¾à¦° @ à¦šà¦¿à¦¹à§à¦¨à§‡à¦° à¦ªà¦°à§‡à¦° à¦…à¦‚à¦¶- Host domain name;<br>à§ªà§«à§§. E-mail à¦ à¦¿à¦•à¦¾à¦¨à¦¾à¦° @ à¦šà¦¿à¦¹à§à¦¨à§‡à¦° à¦†à¦—à§‡ à¦¥à¦¾à¦•à§‡ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à¦•à¦¾à¦°à§€à¦° à¦¨à¦¾à¦®à¥¤<br>à§ªà§«à§¨. Network à¦à¦° à§Žà¦°à¦¹à¦® à¦¸à¦‚à¦—à¦ à¦¨ à¦¹à¦šà§à¦›à§‡ à¦¬à§ƒà¦¤à§à¦¤à¦¾à¦•à¦¾à¦°;<br>453. Wikipedia is online based free Encyclopedia;<br>454. BD News 24 dot com- The first internet based news agency of Bangladesh;<br>455. The first virtual news presenter- Anna nova;<br>456. YouTube is a famous video sharing site;<br>457. Facebook is a social networking site;<br>458. Google plus- A new social networking site of Google;<br>459. Account holders of Internet- Netigen;<br>460. A person having the full control over the domain of computer is- an operator.<br>461. The symbol must exist in an email address- @<br>462. Correct syntax for a URL-&nbsp;<a data-original-title=\"\" href=\"mailto:anyone@abc.com\" title=\"\">anyone@abc.com</a><br>463. In 1972, the symbol @ chosen for its use in e mail address;<br>464. We use web to- (1) Send and receive e-mail, (2) Search for information.<br>465. â€œFreeze Windows Pansesâ€ is an Excel command which helps in- Password protection;<br>466. Firewall- protects a computer system from hacking &amp; filtering Virus;<br>467. A program that can copy itself and infect the computer without permission and knowledge of the owner is called- Virus;<br>468. The name of structure where data move through a network is- Packets;<br>469. Universal gate- NAND, NOR, EX-OR;<br>470. Verification of a log in name and password is known as- Authentication;<br>471. VoIP means- Voice Over Internet Protocol;<br>472. The Googleâ€™s first mobile phone is- Nexus One;<br><br><strong>Database :</strong><br><br>473. Database means- Store of Information;<br>474. Database management means- proper management of data;<br>475. A database is a organized collection of- data or records;<br>476. The system when information of different table can exchange- Relational database;<br>477. A record consist of- more than one field;<br>478. Part of different record is called field;<br>479. Date of birth in database program is field;<br>480. Show data in various way- Report;<br>481. Yes/No in any program- Logical field;<br>482. Database software- Oracle, Fox Pro, File maker pro.<br>Application of Computer &amp; Multimedia:<br>483. Multimedia mean- many media;<br>484. Graphics font is used in Lisa and Macintosh;<br>485. At the end of 80â€™s start compose with the help of computer;<br>486. Lisa is an operating system;<br>487. The dynamic graphics of text in multimedia is called- Animation;<br>488. Casketed letter were used during poster size paper printing;<br>489. The additional advantage of Multimedia than Radio-Television are- interactivity;<br>490. The single wave of sound- Mono sound;<br>491. Many wave of sound- Stereo sound;<br>492. There are 2 kinds of multimedia- (i) Hyper multimedia, (ii) Non linear multimedia;<br>493. Hyper multimedia- Internet based;<br>494. Non linear multimedia- Computer based;<br>495. Multimedia development tools- Director, Hyper studio, Hyper Card, Super Card and Author;<br>496. The criteria to be a multimedia programmer- know text, animation and graphics;<br>497. 3 media is required for Multimedia Programming;<br>498. The advantage of 3D Vacillator Card in Multimedia is- Excess memory;<br>499. We can used Internet and Ethernet in multimedia;<br>500. Multimedia mainly depends on Programming;<br>501. Multimedia software and Internet is one of the modern teaching aid;<br>502. Television program is not multimedia, because it has no- Interactivity;<br>503. Nineteen century is recognized as remarkable period of Multimedia;<br><br><strong>RbK (Inventor) :</strong><br><br>à§«à§¦à§ª. à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿà§‡à¦° à¦œà¦¨à¦•- à¦­à¦¿à¦¨à§à¦Ÿà¦¨ à¦—à§à¦°à§‡ à¦•à¦¾à¦°à§à¦«;<br>à§«à§¦à§«. à¦¡à¦¿à¦œà¦¿à¦Ÿà¦¾à¦² à¦•à§à¦¯à¦¾à¦®à§‡à¦°à¦¾à¦° à¦œà¦¨à¦•- à¦¸à§à¦Ÿà¦¿à¦­à§‡à¦¨ à¦œà§‡ à¦¸à¦¿à¦¸à§‹à¦¨ (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°);<br>à§«à§¦à§¬. à¦¬à§à¦¯à¦¾à¦‚à¦•à¦¿à¦‚ à¦–à¦¾à¦¤à§‡ à¦à¦Ÿà¦¿à¦à¦® à¦ªà¦¦à§à¦§à¦¤à¦¿à¦° à¦œà¦¨à¦•- à¦œà¦¨ à¦¶à§‡à¦«à¦¾à¦°à§à¦¡ à¦¬à§à¦¯à¦¾à¦°à¦¨;<br>à§«à§¦à§­. à¦®à¦¾à¦‡Î¼à§‹à¦¸à¦«à¦Ÿ à¦à¦° à¦œà¦¨à¦•- à¦¬à¦¿à¦² à¦—à§‡à¦Ÿà¦¸ (à§§à§¯à§­à§«);<br>à§«à§¦à§®. à¦“à¦°à§à¦¯à¦¼à¦¾à¦²à§à¦¡ à¦“à¦¯à¦¼à¦¾à¦‡à¦¡ à¦“à¦¯à¦¼à§‡à¦¬ (WWW) à¦à¦° à¦œà¦¨à¦•- à¦Ÿà¦¿à¦® à¦¬à¦¾à¦°à§à¦¨à¦¾à¦¡à¦¸ à¦²à¦¿ (à¦¸à§à¦‡à¦œà¦¾à¦°à¦²à§à¦¯à¦¾à¦¨à§à¦¡, à§§à§¯à§¯à§§);<br>à§«à§¦à§¯. à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨à§‡à¦° à¦œà¦¨à¦•- à¦®à¦¾à¦°à§à¦Ÿà¦¿à¦¨ à¦•à§à¦ªà¦¾à¦° (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°, à§§à§¯à§­à§©);<br>à§«à§§à§¦. à¦‡à¦¯à¦¼à¦¾à¦¹à§â€™à¦° à¦œà¦¨à¦•- à¦œà§‡à¦°à¦¿ à¦‡à¦¯à¦¼à¦¾à¦‚ (à¦¤à¦¾à¦‡à¦“à¦¯à¦¼à¦¾à¦¨) à¦“ à¦¡à§‡à¦­à¦¿à¦¡ à¦«à§‡à¦²à§‹ (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°),à§§à§¯à§¯à§«;<br>à§«à§§à§§. à¦—à§à¦—à¦²- à¦à¦° à¦œà¦¨à¦•- à¦¸à¦¾à¦°à§à¦œà§‡à¦‡ à¦¬à§à¦°à¦¿à¦¨ (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°, à§§à§¯à§¯à§®);<br>à§«à§§à§¨. à¦«à§‡à¦¸à¦¬à§à¦•à§‡à¦° à¦œà¦¨à¦•- à¦®à¦¾à¦°à§à¦• à¦œà§à¦•à¦¾à¦°à¦¬à¦¾à¦°à§à¦— (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°, à§¨à§¦à§¦à§ª);<br>à§«à§§à§©. à¦Ÿà§à¦‡à¦Ÿà¦¾à¦°à§‡à¦° à¦œà¦¨à¦•- à¦œà§à¦¯à¦¾à¦• à¦¡à§‹à¦°à¦¸à§‡à¦‡ (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°, à§¨à§¦à§¦à§¬);<br>à§«à§§à§ª. à¦‡-à¦¬à§à¦• à¦à¦° à¦œà¦¨à¦•- à¦®à¦¾à¦‡à¦•à§‡à¦² à¦à¦¸ à¦¹à¦¾à¦°à§à¦Ÿ;<br>à§«à§§à§«. à¦‡-à¦®à§‡à¦‡à¦²à§‡à¦° à¦œà¦¨à¦•- à¦°à§à¦¯à¦¾ à¦¯à¦¼à¦®à¦¨à§à¦¡ à¦¸à§à¦¯à¦¾à¦®à§à¦¯à¦¼à§‡à¦² à¦Ÿà¦®à¦²à¦¿à¦¨à¦¸à¦¨ (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°);<br>à§«à§§à§¬. à¦‰à¦‡à¦•à¦¿à¦²à¦¿à¦•à¦¸ (à¦¸à§à¦‡à¦¡à§‡à¦¨ à¦­à¦¿à¦¤à§à¦¤à¦¿à¦•)- à¦à¦° à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¤à¦¾- à¦œà§à¦²à¦¿à¦¯à¦¼à¦¾à¦¨ à¦à¦¸à§à¦¯à¦¾à¦žà§à¦œ (à¦…à¦·à§à¦Ÿà§à¦°à§‡à¦²à¦¿à¦¯à¦¼à¦¾);<br>à§«à§§à§­. à¦•à¦®à¦ªà§à¦¯à¦¾à¦•à§à¦Ÿ à¦¡à¦¿à¦¸à§à¦• (à¦¸à¦¿à¦¡à¦¿) à¦à¦° à¦œà¦¨à¦•- à¦¨à§‹à¦°à¦¿à¦“ à¦“à¦¹à¦—à¦¾ (à¦œà¦¾à¦ªà¦¾à¦¨);<br>à§«à§§à§®. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦®à¦¾à¦‰à¦¸à§‡à¦° à¦œà¦¨à¦•- à¦¡à¦—à¦²à¦¾à¦¸ à¦à¦™à§à¦—à§‡à¦²à¦¬à¦¾à¦°à§à¦Ÿ (à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°);<br>à§«à§§à§¯. à¦†à¦§à§à¦¨à¦¿à¦• à¦²à§à¦¯à¦¾à¦ªà¦Ÿà¦ªà§‡à¦° à¦œà¦¨à¦•- à¦¬à¦¿à¦² à¦®à§‹à¦—à¦¾à¦°à¦¿à¦œ;<br>à§«à§¨à§¦. à¦¸à¦¾à¦°à§à¦š à¦‡à¦žà§à¦œà¦¿à¦¨à§‡à¦° à¦œà¦¨à¦•- à¦à¦²à¦¾à¦¨ à¦à¦®à¦Ÿà¦¾à¦œ;<br>à§«à§¨à§§. à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¨à¦¿à¦°à§à¦®à¦¾à¦¤à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨ à¦…à§à¦¯à¦ªà¦²à§‡à¦° à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¤à¦¾- à¦¸à§à¦Ÿà¦¿à¦­ à¦œà¦¬à¦¸ (à¦¸à¦¾à¦¨à¦«à§à¦°à¦¾à¦¨à§à¦¸à¦¿à¦¸à¦•à§‹, à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°);<br>à§«à§¨à§¨. à¦ªà¦¾à¦žà§à¦š à¦•à¦¾à¦°à§à¦¡à§‡à¦° à¦‰à¦¦à§à¦­à¦¾à¦¬à¦•- à¦œà§‹à¦¸à§‡à¦« à¦®à§à¦¯à¦¾à¦°à§€ à¦œà§à¦¯à¦¾à¦•à§à¦¯à¦¼à¦¾à¦°à§à¦¡;<br>à§«à§¨à§©. à¦²à¦—à¦¾à¦°à¦¿à¦¦à¦® à¦à¦° à¦‰à¦¦à§à¦­à¦¾à¦¬à¦•- à¦œà¦¨ à¦¨à§‡à¦ªà¦¿à¦¯à¦¼à¦¾à¦°.....</p>', 1, 1, 'Public', '2018-12-06 17:52:25', '2018-12-06 17:53:55');
INSERT INTO `preparation_lesson` (`id`, `sub_id`, `lesson_title`, `lesson_content`, `posted_by`, `updated_by`, `action`, `created_at`, `updated_at`) VALUES
(32, 1, 'à¦†à¦‡à¦¸à¦¿à¦Ÿà¦¿ à¦¬à¦¿à¦·à¦¯à¦¼à¦• à¦ªà§à¦°à¦¶à§à¦¨ à¦“ à¦‰à¦¤à§à¦¤à¦°', '<p>1.Multitasking à¦•à¦¾à¦•à§‡ à¦¬à¦²à§‡?<br>Ans: à¦à¦•à¦‡ à¦¸à¦®à¦¯à¦¼à§‡ à¦à¦•à¦¾à¦§à¦¿à¦• à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¸à¦šà¦² à¦°à¦¾à¦–à¦¾à¦° à¦•à§à¦·à¦®à¦¤à¦¾à¦•à§‡ à¦¬à¦²à§‡ multitasking.<br>2.à¦Ÿà¦¾à¦¸à§à¦•à¦¬à¦¾à¦° à¦•à¦¾à¦•à§‡ à¦¬à¦²?<br>Ans: à¦¡à§‡à¦•à§à¦¸à¦Ÿà¦ªà§‡à¦° à¦¨à¦¿à¦šà§‡à¦° à¦¦à¦¿à¦•à§‡ start à¦²à§‡à¦–à¦¾ à¦¸à¦®à§à¦«à¦²à¦¿à¦¤ à¦¬à¦¾à¦°à¦•à§‡ à¦Ÿà¦¾à¦•à§à¦¸ à¦¬à¦¾à¦° à¦¬à¦²à§‡à¥¤<br>3.à¦°à¦¿à¦¸à¦¾à¦‡à¦•à§‡à¦²à¦¬à¦¿à¦¨ à¦•à¦¿?<br>Ans: à¦°à¦¿à¦¸à¦¾à¦‡à¦•à§‡à¦²à¦¬à¦¿à¦¨ à¦¹à¦šà§à¦›à§‡ à¦à¦•à¦Ÿà¦¿ à¦Ÿà§à¦°à¦¨à§à¦¸à¦œà¦¿à¦Ÿ à¦®à§‡à¦®à§‹à¦°à¦¿ à¦²à§‹à¦•à§‡à¦¶à¦¨à¥¤<br>4.Defragmentation à¦•à¦¿?<br>Ans: à¦¯à§‡ à¦‡à¦‰à¦Ÿà¦¿à¦²à¦¿à¦Ÿà¦¿ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦à¦•à¦Ÿà¦¿ à¦¡à¦¿à¦¸à§à¦•à§‡à¦° à¦—à¦¤à¦¿ à¦¬à§ƒà¦¦à§à¦§à¦¿ à¦•à¦°à§‡ à¦¤à¦¾ à¦¹à¦² defragmentation.<br>5.à¦«à¦°à¦®à§‡à¦Ÿ à¦•à¦¾à¦•à§‡ à¦¬à¦²à§‡?<br>Ans:à¦¡à¦¿à¦¸à§à¦•à¦•à§‡ à¦¤à¦¥à§à¦¯ à¦§à¦¾à¦°à¦£à§‡à¦° à¦‰à¦ªà¦¯à§‹à¦—à§€ à¦•à¦°à¦¾à¦•à§‡ à¦«à¦°à¦®à§‡à¦Ÿ à¦¬à¦²à§‡à¥¤<br><br>â‘´ à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦²à§à¦¯à¦¾à¦ªà¦Ÿà¦ªà§‡à¦° à¦¨à¦•à¦¶à¦¾ à¦•à¦°à§‡à¦¨ â†’ à¦¬à¦¿à¦² à¦®à§‹à¦—à¦°à¦¿à¦œ<br>â‘µ à¦¸à¦°à§à¦¬à¦ªà§à¦°à¦¥à¦® à¦ªà§‚à¦°à§à¦£à¦¾à¦™à§à¦— à¦¡à¦¿à¦œà¦¿à¦Ÿà¦¾à¦² à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¹à¦²à§‹ â†’ Mark - 1<br>â‘¶ \'à¦¹à¦¾à¦°à§à¦¡à¦¡à¦¿à¦¸à§à¦•\' à¦®à¦¾à¦ªà¦¾à¦° à¦à¦•à¦• à¦¹à¦²à§‹ â†’ à¦—à¦¿à¦—à¦¾à¦¬à¦¾à¦‡à¦Ÿ<br>â‘· à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦¡à¦¿à¦­à¦¾à¦‡à¦¸à§‡à¦° à¦ªà§à¦°à¦¾à¦£ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ â†’ à¦…à§à¦¯à¦¾à¦ªà¦•à§‡<br>â‘¸ à¦¸à§à¦¬à¦šà§à¦› à¦Ÿà¦¾à¦šà¦¸à§à¦•à§à¦°à¦¿à¦¨ à¦‰à¦¦à§à¦­à¦¾à¦¬à¦¿à¦¤ à¦¹à¦¯à¦¼ â†’ à§§à§¯à§­à§ª à¦¸à¦¾à¦²à§‡<br>â‘¹ à¦…à§à¦¯à¦¾à¦¨à§à¦¡à§à¦°à¦¯à¦¼à§‡à¦¡ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦ªà§à¦°à¦¥à¦® à¦«à§‹à¦¨ â†’ HTC Dream, à¦¯à¦¾ T- mobile G1 à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤<br>â‘º à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¹à¦¾à¦°à§à¦¡à¦“à¦¯à¦¼à§à¦¯à¦¾à¦°à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦¥à¦¾à¦•à§‡ â†’ à§© à¦Ÿà¦¿ à¦…à¦‚à¦¶<br>â‘» à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡ à¦®à§‡à¦•à¦¾à¦¨à¦¿à¦•à§à¦¯à¦¾à¦² à¦¡à¦¿à¦­à¦¾à¦‡à¦¸à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ â†’ à¦¹à¦¾à¦°à§à¦¡à¦“à¦¯à¦¼à§à¦¯à¦¾à¦°<br>â‘¼ IC à¦†à¦¬à¦¿à¦·à§à¦•à§ƒà¦¤ à¦¹à¦¯à¦¼ â†’ à§§à§¯à§«à§® à¦¸à¦¾à¦²à§‡<br>â‘½ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¨à¦¾à¦®à¦•à¦°à¦£ à¦•à¦°à§‡à¦¨ â†’ â†’ à¦—à¦¬à§‡à¦·à¦• à¦«à§à¦°à§‡à¦¡à¦°à¦¿à¦• à¦•à§‹à¦¹à§‡à¦¨<br><br>à§§. à¦ªà§à¦°à¦¶à§à¦¨: Fire fox OS à¦•à§‡ à¦¸à¦‚à¦•à§à¦·à§‡à¦ªà§‡ à¦•à¦¿ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: B2G<br>à§¨. à¦ªà§à¦°à¦¶à§à¦¨: COD à¦à¦° à¦ªà§‚à¦°à§à¦£à¦°à§‚à¦ª-<br>à¦‰à¦¤à§à¦¤à¦°: Cash on Delivery<br>à§©. à¦ªà§à¦°à¦¶à§à¦¨: Oracle Corporation - à¦à¦° à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¤à¦¾ à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: Lawrence J. Ellison<br>à§ª. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à¦®à¦¿à¦‰à¦¨à¦¿à¦•à§‡à¦¶à¦¨ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®à§‡ à¦—à§‡à¦Ÿà¦“à¦¯à¦¼à§‡ à¦•à¦¿ à¦•à¦¾à¦œà§‡ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¦à§à¦‡ à¦¬à¦¾ à¦¤à¦¾à¦° à¦…à¦§à¦¿à¦• à¦­à¦¿à¦¨à§à¦¨ à¦§à¦°à¦¨à§‡à¦° à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦•à¦•à§‡ à¦¸à¦‚à¦¯à§à¦•à§à¦¤ à¦•à¦°à¦¾à¦° à¦•à¦¾à¦œà§‡<br>à§«. à¦ªà§à¦°à¦¶à§à¦¨: à¦¸à¦¾à¦§à¦¾à¦°à¦£à¦¤ à¦‡à¦¨à¦«à§à¦°à¦¾à¦°à§‡à¦¡ à¦¡à¦¿à¦­à¦¾à¦‡à¦¸ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼--<br>à¦‰à¦¤à§à¦¤à¦°: WAN-à¦<br>à§¬. à¦ªà§à¦°à¦¶à§à¦¨: WiMAX à¦à¦° à¦ªà§‚à¦°à§à¦£à¦°à§‚à¦ª à¦•à¦¿?<br>à¦‰à¦¤à§à¦¤à¦°: Worldwide Interoperability for Microwave Access<br>à§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§‹à¦¨à¦Ÿà¦¿ 3G Language à¦¨à¦¯à¦¼--<br>à¦‰à¦¤à§à¦¤à¦°: Machine Language/Assembly Language<br>à§®. à¦ªà§à¦°à¦¶à§à¦¨: wi-fi à¦•à§‹à¦¨ à¦¸à§à¦Ÿà§à¦¯à¦¾à¦¨à§à¦¡à¦¾à¦°à§à¦¡-à¦à¦° à¦‰à¦ªà¦° à¦­à¦¿à¦¤à§à¦¤à¦¿ à¦•à¦°à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: IEEE 802.11<br>à§¯. à¦ªà§à¦°à¦¶à§à¦¨: LinkedIn à¦•à¦¿ à¦§à¦°à¦¨à§‡à¦° à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸?<br>à¦‰à¦¤à§à¦¤à¦°: à¦à¦Ÿà¦¿ à¦à¦•à¦Ÿà¦¿ à¦¬à¦¿à¦œà¦¨à§‡à¦¸ à¦…à¦°à¦¿à¦¯à¦¼à§‡à¦¨à§à¦Ÿà§‡à¦¡ à¦¸à§‹à¦¶à§à¦¯à¦¾à¦² à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦•à¦¿à¦‚ à¦¸à¦¾à¦°à§à¦­à¦¿à¦¸<br>à§§à§¦. à¦ªà§à¦°à¦¶à§à¦¨: à¦†à¦‡à¦¨à§‡à¦° à§­à¦® à¦§à¦¾à¦°à¦¾à¦¯à¦¼ à¦¤à¦¥à§à¦¯ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦° à¦•à¦¤à¦Ÿà¦¿ à¦¬à¦¿à¦·à¦¯à¦¼à¦•à§‡ à¦†à¦‡à¦¨à§‡à¦° à¦†à¦“à¦¤à¦¾à¦¯à¦¼ à¦°à¦¾à¦–à¦¾ à¦¹à¦¯à¦¼à§‡à¦›à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦<br>à§§à§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¤à¦¥à§à¦¯ à¦¡à¦¿à¦œà¦¿à¦Ÿà¦¾à¦² à¦•à¦°à¦¨à§‡à¦° à¦«à¦²à§‡ à¦¸à¦¿à¦¦à§à¦§à¦¾à¦¨à§à¦¤ à¦—à§à¦°à¦¹à¦£à§‡ à¦•à¦¤ à¦­à¦¾à¦— à¦•à¦® à¦¸à¦®à¦¯à¦¼ à¦²à¦¾à¦—à¦›à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§®à§¦-à§¯à§¦<br>à§§à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦¦à§‡à¦¶à§‡à¦° à§§à§«à¦Ÿà¦¿ à¦šà¦¿à¦¨à¦¿à¦•à¦²à§‡à¦° à¦šà¦¾à¦·à¦¿ à¦à¦•à¦¯à§‹à¦—à§‡ à¦¤à¦¥à§à¦¯ à¦ªà¦¾à¦šà§à¦›à§‡ à¦•à§‹à¦¥à¦¾ à¦¥à§‡à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à¦‡- à¦ªà§à¦°à§à¦œà¦¿<br>à§§à§©. à¦ªà§à¦°à¦¶à§à¦¨: COD à¦à¦° à¦ªà§‚à¦°à§à¦£à¦°à§‚à¦ª-<br>à¦‰à¦¤à§à¦¤à¦°: Cash on Delivery<br>à§§à§ª. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦•à¦¤ à¦¸à¦¾à¦²à§‡à¦° à¦ªà¦°à¦ªà¦° à¦‡-à¦•à¦®à¦¾à¦°à§à¦¸à§‡à¦° à¦ªà§à¦°à¦¸à¦¾à¦° à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§§à§§-à§§à§¨<br>à§§à§«. à¦ªà§à¦°à¦¶à§à¦¨: Twitter -à¦ à¦¸à¦°à§à¦¬à§‹à¦šà§à¦š à¦•à¦¤ à¦…à¦•à§à¦·à¦°à§‡à¦° à¦¬à¦¾à¦°à§à¦¤à¦¾ à¦ªà§à¦°à¦•à¦¾à¦¶ à¦•à¦°à¦¾ à¦¯à¦¾à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§ªà§¦<br>à§§à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§‹à¦¨à§‹ à¦¦à§‡à¦¶ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦¤à§‡ à¦ªà¦¿à¦›à¦¿à¦¯à¦¼à§‡ à¦¥à¦¾à¦•à¦²à§‡ à¦•à¦¿à¦­à¦¾à¦¬à§‡ à¦…à¦¨à§à¦¯ à¦¦à§‡à¦¶à§‡à¦° à¦¸à¦®à¦¾à¦¨ à¦¹à¦¤à§‡ à¦ªà¦¾à¦°à§‡? Raisul Islam Hridoy<br>à¦‰à¦¤à§à¦¤à¦°: Leap Frog à¦à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡<br>à§§à§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦°à§‡à¦œà¦¿à¦¸à§à¦Ÿà§à¦°à¦¿ à¦•à§à¦²à¦¿à¦¨ à¦†à¦ª à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦¨à¦¾ à¦•à¦°à¦²à§‡ à¦•à¦¿ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ à¦¿à¦• à¦­à¦¾à¦¬à§‡ à¦•à¦¾à¦œ à¦•à¦°à§‡ à¦¨à¦¾<br>à§§à§®. à¦ªà§à¦°à¦¶à§à¦¨: BSA à¦ªà§‚à¦°à§à¦£à¦°à§‚à¦ª-<br>à¦‰à¦¤à§à¦¤à¦°: Business Software Alliance<br>à§§à§¯. à¦ªà§à¦°à¦¶à§à¦¨: à¦¤à¦¥à§à¦¯ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦¤à§‡ à¦¦à¦•à§à¦· à¦²à§‹à¦•à§‡à¦° à¦šà¦¾à¦¹à¦¿à¦¦à¦¾ à¦†à¦—à¦¾à¦®à§€ à§¨-à§© à¦¬à¦›à¦°à§‡ à¦•à§€à¦°à§‚à¦ª à¦¹à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¦à§à¦¬à¦¿à¦—à§à¦¨<br>à§¨à§¦. à¦ªà§à¦°à¦¶à§à¦¨: GPS à¦à¦° à¦ªà§‚à¦°à§à¦£à¦°à§‚à¦ª--<br>à¦‰à¦¤à§à¦¤à¦°: Global Positioning System<br><br>à§ªà§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦…à§à¦¯à¦¾à¦¨à§à¦¡à§à¦°à¦¯à¦¼à§‡à¦¡ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¹à¦¯à¦¼ à¦ªà§à¦°à¦¥à¦® -- à¦«à§‹à¦¨à§‡à¥¤<br>à¦‰à¦¤à§à¦¤à¦°: HTC<br>à§ªà§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦ªà§à¦°à¦¤à¦¿ à¦¸à§‡à¦•à§‡à¦¨à§à¦¡à§‡ à¦¯à§‡ à¦¬à¦¿à¦Ÿ à¦Ÿà¦¾à¦¨à§à¦¸à¦®à¦¿à¦Ÿ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦¤à¦¾à¦•à§‡ à¦¬à¦²à§‡ -<br>à¦‰à¦¤à§à¦¤à¦°: Bandwith<br>à§ªà§©. à¦ªà§à¦°à¦¶à§à¦¨: Coaxial Cable à¦à¦° à¦¸à¦¾à¦¹à¦¾à¦¯à§à¦¯à§‡ à¦¡à¦¿à¦œà¦¿à¦Ÿà¦¾à¦² à¦ªà§à¦°à§‡à¦°à¦£ à¦•à¦°à¦¾ à¦¯à¦¾à¦¯à¦¼_____ à¦•à¦¿à¦²à§‹à¦®à¦¿à¦Ÿà¦¾à¦° à¦ªà¦°à§à¦¯à¦¨à§à¦¤à¥¤<br>à¦‰à¦¤à§à¦¤à¦°: à§§<br>à§ªà§ª. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦¸à¦¾à¦¬à¦®à§‡à¦°à¦¿à¦¨ à¦²à§à¦¯à¦¾à¦¨à§à¦¡à¦¿à¦‚ à¦¸à§à¦Ÿà§‡à¦¶à¦¨ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤ -<br>à¦‰à¦¤à§à¦¤à¦°: à¦•à¦•à§à¦¸à¦¬à¦¾à¦œà¦¾à¦°<br>à§ªà§«. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦•à¦¤ à¦ªà§à¦°à¦•à¦¾à¦° ?<br>à¦‰à¦¤à§à¦¤à¦°: à§«<br>à§ªà§¬. à¦ªà§à¦°à¦¶à§à¦¨: Man à¦à¦° à¦‰à§Žà¦•à§ƒà¦·à§à¦Ÿ à¦‰à¦¦à¦¾à¦¹à¦°à¦¨ -<br>à¦‰à¦¤à§à¦¤à¦°: à¦•à§à¦¯à¦¾à¦¬à¦² à¦Ÿà¦¿à¦­à¦¿ à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦•<br>à§ªà§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§à¦°à¦¾à¦‰à¦¡ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦à¦° à¦¸à§‡à¦¬à¦¾ à¦¦à§‡à¦¯à¦¼à¦¾ à¦¶à§à¦°à§ à¦¹à¦¯à¦¼ -<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§¦à§« à¦¸à¦¾à¦²à§‡<br>à§ªà§®. à¦ªà§à¦°à¦¶à§à¦¨: à¦¦à§‚à¦°à¦¤à§à¦¬ à¦¬à§‡à¦¶à¦¿ à¦¹à¦²à§‡ à¦¬à§‡à¦¸ à¦¸à§à¦Ÿà§‡à¦¶à¦¨à§‡à¦° à¦¸à¦‚à¦–à§à¦¯à¦¾ -<br>à¦‰à¦¤à§à¦¤à¦°: à¦¬à¦¾à¦¡à¦¼à¦¾à¦¤à§‡ à¦¹à¦¯à¦¼<br>à§ªà§¯. à¦ªà§à¦°à¦¶à§à¦¨: à¦¸à¦‚à¦°à¦•à§à¦·à¦¿à¦¤ à¦¡à§‡à¦Ÿà¦¾à¦¬à§‡à¦œà¦•à§‡ à¦¬à¦²à§‡ -<br>à¦‰à¦¤à§à¦¤à¦°: Back end<br>à§«à§¦. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦à¦•à¦¾à¦‰à¦¨à§à¦Ÿ à¦—à§à¦°à¦¹à¦£à¦•à¦¾à¦°à§€à¦¦à§‡à¦° à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ -<br>à¦‰à¦¤à§à¦¤à¦°: à¦¨à§‡à¦Ÿà¦¿à¦œà§‡à¦¨<br>à§«à§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨à§‡ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à§‡ à¦¶à§€à¦°à§à¦·à§‡ à¦•à§‹à¦¨ à¦¦à§‡à¦¶?<br>à¦‰à¦¤à§à¦¤à¦°: à¦šà§€à¦¨<br>à§«à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦•à§‡à¦° à¦¨à¦¾à¦® -<br>à¦‰à¦¤à§à¦¤à¦°: ARPANET<br>à§«à§©. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦ªà§à¦°à¦¥à¦® à¦…à¦«-à¦²à¦¾à¦‡à¦¨ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ -<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§¯à§ª à¦¸à¦¾à¦²à§‡<br>à§«à§ª. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿà§‡à¦° à¦œà¦¨à¦• à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ -<br>à¦‰à¦¤à§à¦¤à¦°: VintonGray Cert à¦•à§‡<br>à§«à§«. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦…à¦¨à¦²à¦¾à¦‡à¦¨ à¦ªà¦¤à§à¦°à¦¿à¦•à¦¾ -<br>à¦‰à¦¤à§à¦¤à¦°: bdnews24. com<br>à§«à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦ªà§à¦°à¦¤à§à¦¯à¦¨à§à¦¤ à¦…à¦žà§à¦šà¦² à¦¥à§‡à¦•à§‡ à¦‡à¦¨à§à¦Ÿà¦¾à¦¨à§‡à¦Ÿ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦¤à§‡ à¦šà¦¾à¦‡à¦²à§‡ à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨--<br>à¦‰à¦¤à§à¦¤à¦°: à¦®à¦¡à§‡à¦®<br>à§«à§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¸à¦‚à¦¯à§‹à¦— à¦¸à¦¾à¦§à¦¾à¦°à¦£à¦¤ à¦•à¦¤ à¦ªà§à¦°à¦•à¦¾à¦°?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨<br>à§«à§®. à¦ªà§à¦°à¦¶à§à¦¨: IP Address à¦à¦° à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨ à¦ªà§à¦°à¦šà¦²à¦¿à¦¤ à¦­à¦¾à¦°à§à¦¸à¦¨--<br>à¦‰à¦¤à§à¦¤à¦°: IPV 4<br>à§«à§¯. à¦ªà§à¦°à¦¶à§à¦¨: E-mail à¦ à¦¿à¦•à¦¾à¦¨à¦¾à¦¯à¦¼ à¦•à¦¯à¦¼à¦Ÿà¦¿ à¦…à¦‚à¦¶ à¦¥à¦¾à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨<br>à§¬à§¦. à¦ªà§à¦°à¦¶à§à¦¨: Cyber Crime à¦°à§‹à¦§à§‡ à§§à§¯à§¯à§¨ à¦¸à¦¾à¦²à§‡ à¦•à¦¯à¦¼à¦Ÿà¦¿ à¦¨à¦¿à¦°à§à¦¦à§‡à¦¶à¦¨à¦¾ à¦¦à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¦à¦¶<br><br>à§¬à§§. à¦ªà§à¦°à¦¶à§à¦¨: Bar Code à¦¸à¦¾à¦§à¦¾à¦°à¦£à¦¤ à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: Supermarkets<br>à§¬à§¨. à¦ªà§à¦°à¦¶à§à¦¨: LAN card à¦à¦° à¦…à¦ªà¦° à¦¨à¦¾à¦® à¦•à¦¿?<br>à¦‰à¦¤à§à¦¤à¦°: NIC<br>à§¬à§©. à¦ªà§à¦°à¦¶à§à¦¨: à¦—à§à¦—à¦²à§‡à¦° à¦…à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨à¦¿à¦• à¦®à§‚à¦²à¦®à¦¨à§à¦¤à§à¦°-<br>à¦‰à¦¤à§à¦¤à¦°: Don\'t be evil<br>à§¬à§ª. à¦ªà§à¦°à¦¶à§à¦¨: â€™à¦…à§à¦¯à¦¾à¦ªà¦²â€™ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à¦¾à¦œà¦¾à¦°à§‡ à¦†à¦¸à§‡ -<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§­à§¬ à¦¸à¦¾à¦²à§‡<br>à§¬à§«. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à§à¦Ÿà§‡à¦²à§‡à¦° à¦œà¦¨à§à¦® _____ à¦¸à¦¾à¦²à§‡à¥¤<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§¬à§®<br>à§¬à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à§à¦Ÿà§‡à¦² à¦ªà§à¦°à¦¥à¦® à¦¬à¦¾à¦¨à¦¿à¦œà§à¦¯à¦¿à¦• à¦ªà§à¦°à¦¸à§‡à¦¸à¦° à¦¤à§ˆà¦°à§€ à¦•à¦°à§‡ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§­à§§<br>à§¬à§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦Ÿà§à¦‡à¦Ÿà¦¾à¦° à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§¦à§¬<br>à§¬à§®. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à¦¸à§à¦Ÿà¦¾à¦—à§à¦°à¦¾à¦® à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡à¦° à¦…à¦•à§à¦Ÿà§‹à¦¬à¦°à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§§à§¦<br>à§¬à§¯. à¦ªà§à¦°à¦¶à§à¦¨: à¦¸à¦°à§à¦¬à¦ªà§à¦°à¦¥à¦® â€œà¦°à§‹à¦¬à¦Ÿâ€ à¦¶à¦¬à§à¦¦à¦Ÿà¦¿ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§¨à§¦&nbsp;<br>à§­à§¦. à¦ªà§à¦°à¦¶à§à¦¨: à¦à¦•à¦Ÿà¦¿ à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦‡à¦‰à¦¨à¦¿à¦Ÿà§‡ à¦•à¦¤à¦Ÿà¦¿ à¦…à¦‚à¦• à¦¥à¦¾à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§©<br>à§­à§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨à§‡ GSM à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§¯à§§<br>à§­à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨à§‡à¦° à¦¤à§ƒà¦¤à§€à¦¯à¦¼ à¦ªà§à¦°à¦œà¦¨à§à¦® à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼-<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§¦à§¦ à¦¸à¦¾à¦²à§‡<br>à§­à§©. à¦ªà§à¦°à¦¶à§à¦¨: à¦¸à¦¿à¦®à§à¦¬à¦¿à¦¯à¦¼à¦¾à¦¨ à¦…à¦ªà¦¾à¦°à§‡à¦Ÿà¦¿à¦‚ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®à§‡ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦ªà§à¦°à¦¥à¦® à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨-<br>à¦‰à¦¤à§à¦¤à¦°: à¦à¦°à¦¿à¦•à¦¸à¦¨ à¦†à¦° à§©à§¦à§®<br>à§­à§ª. à¦ªà§à¦°à¦¶à§à¦¨: Mozilla Firefox OS à¦‰à¦¦à§à¦­à¦¾à¦¬à¦¨ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§§à§¨<br>à§­à§«. à¦ªà§à¦°à¦¶à§à¦¨: à¦¡à§‡à¦Ÿà¦¾ à¦Ÿà§à¦°à¦¾à¦¨à§à¦¸à¦®à¦¿à¦¶à¦¨ à¦ªà¦¦à§à¦§à¦¤à¦¿ à¦•à¦¯à¦¼ à¦§à¦°à¦¨à§‡à¦°?<br>à¦‰à¦¤à§à¦¤à¦°: à§ª<br>à§­à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à¦«à§à¦°à¦¾à¦°à§‡à¦¡à§‡à¦° à¦¡à§‡à¦Ÿà¦¾ à¦Ÿà§à¦°à¦¾à¦¨à§à¦¸à¦«à¦¾à¦° à¦°à§‡à¦Ÿ à¦•à¦¤?<br>à¦‰à¦¤à§à¦¤à¦°: 1-4Mbps<br>à§­à§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦à¦•à¦Ÿà¦¿ LAN à¦ à¦¸à¦°à§à¦¬à§‹à¦šà§à¦š à¦°à¦¿à¦ªà¦¿à¦Ÿà¦¾à¦° à¦¸à§à¦Ÿà§‡à¦¶à¦¨-<br>à¦‰à¦¤à§à¦¤à¦°: à§ª à¦Ÿà¦¿<br>à§­à§®. à¦ªà§à¦°à¦¶à§à¦¨: à¦¹à¦Ÿà¦¸à§à¦ªà¦Ÿ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦¨à¦¯à¦¼-<br>à¦‰à¦¤à§à¦¤à¦°: Broadband<br>à§­à§¯. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à§à¦²à§à¦Ÿà§à¦¥à§‡à¦° à¦à¦•à¦Ÿà¦¿ à¦ªà¦¿à¦•à§‹à¦¨à§‡à¦Ÿà§‡ à¦¸à¦°à§à¦¬à§‹à¦šà§à¦š à¦•à¦¤à¦Ÿà¦¿ à¦¸à§à¦²à§à¦¯à¦¾à¦­ à¦¥à¦¾à¦•à¦¤à§‡ à¦ªà¦¾à¦°à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§­<br>à§®à§¦. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¨à§‡à¦Ÿà¦“à¦¯à¦¼à¦¾à¦°à§à¦• à¦¨à¦¯à¦¼--<br>à¦‰à¦¤à§à¦¤à¦°: WAN<br>à§®à§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§à¦²à¦¾à¦‰à¦¡ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¿à¦‚ à¦ªà§à¦°à¦¥à¦® à¦¸à§‡à¦¬à¦¾ à¦¦à§‡à¦¯à¦¼à¦¾ à¦¶à§à¦°à§ à¦•à¦°à§‡-<br>à¦‰à¦¤à§à¦¤à¦°: Amazon<br>à§®à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¸à§‹à¦¸à¦¾à¦‡à¦Ÿà¦¿ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼-<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§¯à§¨ à¦¸à¦¾à¦²à§‡<br>à§®à§©. à¦ªà§à¦°à¦¶à§à¦¨: Internet à¦¶à¦¬à§à¦¦à¦Ÿà¦¿à¦° à¦‰à§Žà¦ªà¦¤à§à¦¤à¦¿-<br>à¦‰à¦¤à§à¦¤à¦°: Internet connected Network à¦¥à§‡à¦•à§‡<br>à§®à§ª. à¦ªà§à¦°à¦¶à§à¦¨: Tcp/IP à¦ªà§à¦°à¦Ÿà§‹à¦•à¦²à§‡à¦° à¦‰à¦¦à§à¦­à¦¾à¦¬à¦¨ à¦¹à¦¯à¦¼-<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§®à§¨ à¦¸à¦¾à¦²à§‡<br>à§®à§«. à¦ªà§à¦°à¦¶à§à¦¨: European Laboratory For Particle Physics à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤?<br>à¦‰à¦¤à§à¦¤à¦°: à¦œà§‡à¦¨à§‡à¦­à¦¾<br>à§®à§¬. à¦ªà§à¦°à¦¶à§à¦¨: Opera-mini\'à¦° à¦œà¦¨à¦•-<br>à¦‰à¦¤à§à¦¤à¦°: à¦¸à§à¦Ÿà¦¿à¦«à§‡à¦¨à§à¦¸à¦¨<br>à§®à§­. à¦ªà§à¦°à¦¶à§à¦¨: Google e-book à¦¸à§‡à¦¬à¦¾ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼-<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§§à§¦ à¦¸à¦¾à¦²à§‡<br>à§®à§®. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¿à¦¶à§à¦¬à¦—à§à¦°à¦¾à¦® à¦§à¦¾à¦°à¦£à¦¾à¦° à¦œà¦¨à¦•--<br>à¦‰à¦¤à§à¦¤à¦°: à¦®à¦¾à¦°à§à¦¶à¦¾à¦² à¦®à§à¦¯à¦¾à¦•à§à¦²à§à¦¹à¦¾à¦¨<br>à§®à§¯. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨à§‡ à¦®à¦¾à¦‡à¦•à§à¦°à§‹à¦¸à¦«à¦Ÿ à¦à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦¨à¦¿à¦°à§à¦¬à¦¾à¦¹à§€ à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾-<br>à¦‰à¦¤à§à¦¤à¦°: à¦¸à¦¤à§à¦¯ à¦¨à¦¾à¦¦à§‡à¦²à¦¾<br>à§¯à§¦. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡-à¦•à¦®à¦¾à¦°à§à¦¸à¦•à§‡ à¦¸à¦¾à¦§à¦¾à¦°à¦£à¦¤ à¦•à¦¯à¦¼ à¦­à¦¾à¦—à§‡ à¦­à¦¾à¦— à¦•à¦°à¦¾ à¦¯à¦¾à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à§ª<br>à§¯à§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à§ˆà¦¦à§à¦¯à§à¦¤à¦¿à¦• à¦Ÿà§‡à¦²à¦¿à¦—à§à¦°à¦¾à¦« à¦†à¦¬à¦¿à¦·à§à¦•à§ƒà¦¤ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§®à§©à§­<br>à§¯à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à§à¦²à¦—à¦¿à¦‚ à¦à¦° à¦œà¦¨à¦•-<br>à¦‰à¦¤à§à¦¤à¦°: à¦‡à¦­à¦¾à¦¨ à¦‰à¦‡à¦²à¦¿à¦¯à¦¼à¦¾à¦®<br>à§¯à§©. à¦ªà§à¦°à¦¶à§à¦¨: à¦‰à¦‡à¦•à¦¿à¦²à¦¿à¦•à§à¦¸ à¦•à¦¤ à¦¸à¦¨à§‡ à¦¯à¦¾à¦¤à§à¦°à¦¾ à¦¶à§à¦°à§ à¦•à¦°à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§¨à§¦à§¦à§¬<br>à§¯à§ª. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¿à¦¶à§à¦¬à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦¬à§à¦¯à¦¾à¦‚à¦•à¦¿à¦‚ à¦šà¦¾à¦²à§ à¦¹à¦¯à¦¼ à¦•à¦–à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§¯à§­<br>à§¯à§«. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦•à§‹à¦¨ à¦¬à§à¦¯à¦¾à¦‚à¦• à¦¸à¦°à§à¦¬à¦ªà§à¦°à¦¥à¦® à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦¬à§à¦¯à¦¾à¦‚à¦•à¦¿à¦‚ à¦¸à§‡à¦¬à¦¾ à¦šà¦¾à¦²à§ à¦•à¦°à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¡à¦¾à¦š à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à§à¦¯à¦¾à¦‚à¦•<br>à§¯à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à§à¦²à§‡à¦Ÿà¦¿à¦¨ à¦¬à§‹à¦°à§à¦¡ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¹à¦¯à¦¼ à¦•à¦¿ à¦•à¦¾à¦œà§‡à¦° à¦œà¦¨à§à¦¯?<br>à¦‰à¦¤à§à¦¤à¦°: à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿà§‡ à¦¬à¦¿à¦œà§à¦žà¦¾à¦¨ à¦ªà§à¦°à¦¦à¦¾à¦¨à§‡à¦° à¦œà¦¨à§à¦¯<br>à§¯à§­. à¦ªà§à¦°à¦¶à§à¦¨: GSM à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨à§‡à¦° à¦œà¦¨à§à¦¯ à¦¥à¦¾à¦•à§‡--<br>à¦‰à¦¤à§à¦¤à¦°: SIM<br>à§¯à§®. à¦ªà§à¦°à¦¶à§à¦¨: Fire fox OS à¦•à§‡ à¦¸à¦‚à¦•à§à¦·à§‡à¦ªà§‡ à¦•à¦¿ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: B2G<br>à§¯à§¯. à¦ªà§à¦°à¦¶à§à¦¨: à¦¸à§à¦¬à¦šà§à¦› à¦Ÿà¦¾à¦šà¦¸à§à¦•à§à¦°à¦¿à¦¨ à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦‰à¦¦à§à¦­à¦¾à¦¬à¦¨ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§­à§ª à¦¸à¦¾à¦²à§‡<br>à§§à§¦à§¦. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦à¦•à¦®à¦¾à¦¤à§à¦° à¦…à¦ªà¦Ÿà¦¿à¦•à§à¦¯à¦¾à¦² à¦«à¦¾à¦‡à¦¬à¦¾à¦° à¦ªà§à¦°à¦¸à§à¦¤à§à¦¤à¦•à¦¾à¦°à§€ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨ à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦…à¦¬à¦¸à§à¦¥à¦¿à¦¤?<br>à¦‰à¦¤à§à¦¤à¦°: à¦–à§à¦²à¦¨à¦¾<br>à§§à§¨à§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦®à¦¾à¦‡à¦•à§à¦°à§‹à¦¸à¦«à¦Ÿà§‡à¦° à¦®à¦¿à¦¡à¦¿à¦¯à¦¼à¦¾à¦°à§à¦® à¦¹à¦²à§‹-<br>à¦‰à¦¤à§à¦¤à¦°: à¦¸à§‡à¦Ÿ-à¦Ÿà¦ª à¦¬à¦•à§à¦¸<br>à§§à§¨à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦†à¦‡à¦¬à¦¿à¦à¦® à¦—à¦¬à§‡à¦·à¦•à¦¬à§ƒà¦¨à§à¦¦ à¦à¦¯à¦¾à¦¬à¦¤à¦•à¦¾à¦²à§‡ à¦•à¦¤à¦Ÿà¦¿ à¦¨à§‹à¦¬à§‡à¦² à¦ªà§à¦°à¦¸à§à¦•à¦¾à¦° à¦ªà§‡à¦¯à¦¼à§‡à¦›à§‡à¦¨?<br>à¦‰à¦¤à§à¦¤à¦°: à§«<br>à§§à§¨à§ª. à¦ªà§à¦°à¦¶à§à¦¨: â€œà¦…à¦Ÿà§‹à¦®à§‡à¦Ÿà§‡à¦¡ à¦Ÿà§‡à¦²à¦¾à¦° à¦®à§‡à¦¶à¦¿à¦¨â€ à¦•à¦¿ à¦•à¦¾à¦œà§‡ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¬à§à¦¯à¦¾à¦‚à¦•à¦¿à¦‚ à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦®à§‡à¦° à¦œà¦¨à§à¦¯ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¹à¦¯à¦¼<br>à§§à§¨à§«. à¦ªà§à¦°à¦¶à§à¦¨: IPVC à¦•à¦¤ à¦¬à¦¿à¦Ÿà§‡à¦° à¦¹à¦¬à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¨à§®<br>à§§à§¨à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦†à¦°à¦ªà¦¾à¦¨à§‡à¦Ÿ à¦¬à¦¨à§à¦§ à¦¹à¦¯à¦¼à§‡ à¦¯à¦¾à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§¯à§¦<br>à§§à§¨à§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à§à¦²à§-à¦Ÿà§à¦¥ à¦«à§à¦°à¦¿à¦•à§‹à¦¯à¦¼à§‡à¦¨à§à¦¸à¦¿ à¦°à§‡à¦žà§à¦œ à¦•à¦¤ à¦ªà¦°à§à¦¯à¦¨à§à¦¤?<br>à¦‰à¦¤à§à¦¤à¦°: 2.4 GHz<br>à§§à§¨à§®. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§‹à¦¨ à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ à¦ªà§à¦°à¦¥à¦® à¦†à¦¸à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¸à¦¿à¦Ÿà¦¿à¦¸à§‡à¦²<br>à§§à§¨à§¯. à¦ªà§à¦°à¦¶à§à¦¨: à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦¡à¦¿à¦­à¦¾à¦‡à¦¸à§‡à¦° à¦ªà§à¦°à¦¾à¦£ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼ à¦•à§‹à¦¨à¦Ÿà¦¿à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à¦…à§à¦¯à¦¾à¦ªà¦•à§‡<br>à§§à§©à§¦. à¦ªà§à¦°à¦¶à§à¦¨: à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨à§‡à¦° à¦ªà§à¦°à¦¥à¦® à¦ªà§à¦°à¦œà¦¨à§à¦®à§‡à¦° à¦¸à¦®à¦¯à¦¼à¦¸à§€à¦®à¦¾ à¦•à¦¤ à¦›à¦¿à¦²?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§®à§¦-à§§à§¯à§¯à§§ à¦¸à¦¾à¦² à¦ªà¦°à§à¦¯à¦¨à§à¦¤<br>à§§à§©à§§. à¦ªà§à¦°à¦¶à§à¦¨: GSM à¦•à¦¿ à¦§à¦°à¦£à§‡à¦° à¦šà§à¦¯à¦¾à¦¨à§‡à¦² à¦à¦•à¦¸à§‡à¦¸ à¦ªà¦¦à§à¦§à¦¤à¦¿?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¸à¦®à§à¦®à¦¿à¦²à¦¿à¦¤<br>à§§à§©à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦°à§à¦¤à¦®à¦¾à¦¨à§‡ à¦à¦•à¦®à¦¾à¦¤à§à¦° à¦•à§‹à¦¨ à¦¦à§‡à¦¶ 4G à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à¦›à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¦à¦•à§à¦·à¦¿à¦£ à¦•à§‹à¦°à¦¿à¦¯à¦¼à¦¾<br>à§§à§©à§©. à¦ªà§à¦°à¦¶à§à¦¨: à¦¸à¦¾à¦¬à¦®à§‡à¦°à¦¿à¦¨ à¦•à§‡à¦¬à¦² à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦¸à§à¦¥à¦¾à¦ªà¦¨ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¸à¦¾à¦—à¦°à§‡à¦° à¦¤à¦²à¦¦à§‡à¦¶à§‡<br>à§§à§©à§ª. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§‹à¦¨à¦Ÿà¦¿ à¦–à§à¦¬à¦‡ à¦¦à§à¦°à§à¦¤ à¦—à¦¤à¦¿à¦°?<br>à¦‰à¦¤à§à¦¤à¦°: SPX<br>à§§à§©à§«. à¦ªà§à¦°à¦¶à§à¦¨: IPV4 à¦­à¦¾à¦°à§à¦¸à¦¨à§‡à¦° IP Address à¦à¦° à¦ªà¦°à§‡à¦° à¦¦à§à¦Ÿà¦¿ à¦…à¦•à¦Ÿà§‡à¦Ÿ à¦•à¦¿ à¦ªà§à¦°à¦•à¦¾à¦¶ à¦•à¦°à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: Host ID<br>à§§à§©à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦¯à§‡ à¦ªà§à¦°à§‹à¦Ÿà§‹à¦•à¦²à§‡à¦° à¦…à¦§à§€à¦¨à§‡ HTML à¦†à¦¦à¦¾à¦¨ à¦ªà§à¦°à¦¦à¦¾à¦¨ à¦•à¦°à§‡--<br>à¦‰à¦¤à§à¦¤à¦°: http<br>à§§à§©à§­. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§‹à¦¨à¦Ÿà¦¿ à¦›à¦¾à¦¡à¦¼à¦¾ à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿà§‡ à¦ªà§à¦°à¦¬à§‡à¦¶ à¦•à¦°à¦¾ à¦¸à¦¹à¦œ à¦¨à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: Web browser<br>à§§à§©à§®. à¦ªà§à¦°à¦¶à§à¦¨: E-mail à¦ à¦¿à¦•à¦¾à¦¨à¦¾à¦¯à¦¼ @ à¦¸à¦°à§à¦¬à¦ªà§à¦°à¦¥à¦® à¦•à¦¤ à¦¸à¦¾à¦²à§‡ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§­à§¨ à¦¸à¦¾à¦²à§‡<br>à§§à§©à§¯. à¦ªà§à¦°à¦¶à§à¦¨: à§¨à§¦à§§à§© à¦¸à¦¾à¦²à§‡ à¦¸à¦¾à¦°à¦¾ à¦¬à¦¿à¦¶à§à¦¬à§‡ à§«à§¦à¦Ÿà¦¿ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦•à¦¤à¦Ÿà¦¿ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦°à§‹à¦¬à¦Ÿà¦¿à¦•à§à¦¸ à¦ªà§à¦°à¦¤à¦¿à¦¯à§‹à¦—à§€à¦¤à¦¾à¦¯à¦¼ à¦…à¦‚à¦¶à¦—à§à¦°à¦¹à¦£ à¦•à¦°à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§«<br>à§§à§ªà§¦. à¦ªà§à¦°à¦¶à§à¦¨: à§¨à§¦à§§à§© à¦¸à¦¾à¦²à§‡à¦° à¦°à§‹à¦¬à¦Ÿà¦¿à¦•à§à¦¸ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à§‡ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦•à§‹à¦¨ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼ à¦ªà§à¦°à¦¥à¦® à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: MIST<br>à§§à§¬à§§. à¦ªà§à¦°à¦¶à§à¦¨: \"Chorndro Bot-2\" à¦°à§‹à¦¬à¦Ÿà§‡à¦° à¦…à¦¬à¦¸à§à¦¥à¦¾à¦¨ à¦¸à¦¾à¦°à¦¾à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦•à¦¤à¦¤à¦®?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¨à¦¤à¦®<br>à§§à§¬à§¨. à¦ªà§à¦°à¦¶à§à¦¨: à¦à¦•à¦Ÿà¦¿ à¦°à§‹à¦¬à¦Ÿà§‡à¦° à¦†à¦¶à§‡à¦ªà¦¾à¦¶à§‡à¦° à¦¬à¦¸à§à¦¤à§à¦—à§à¦²à§‹à¦° à¦…à¦¬à¦¸à§à¦¥à¦¾à¦¨ à¦ªà¦°à¦¿à¦¬à¦°à§à¦¤à¦¨ à¦¬à¦¾ à¦¬à¦¸à§à¦¤à§à¦Ÿà¦¿à¦° à¦ªà¦°à¦¿à¦¬à¦°à§à¦¤à¦¨ à¦•à¦°à¦¾à¦° à¦ªà¦¦à§à¦§à¦¤à¦¿à¦•à§‡ à¦•à¦¿ à¦¬à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: Manipulation<br>à§§à§¬à§©. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à§à¦°à¦¾à¦¯à¦¼à§‹à¦¥à§‡à¦°à¦¾à¦ªà¦¿ à¦šà¦¿à¦•à¦¿à§Žà¦¸à¦¾à¦¯à¦¼ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦Ÿà¦¿à¦¸à§à¦¯à§ à¦§à§à¦¬à¦‚à¦¸ à¦•à¦°à¦¾ à¦¯à¦¾à¦¯à¦¼ à¦•à¦¤ à¦­à¦¾à¦—?<br>à¦‰à¦¤à§à¦¤à¦°: à§¯à§¦&nbsp;<br>à§§à§¬à§ª. à¦ªà§à¦°à¦¶à§à¦¨: à¦¬à¦¾à¦¯à¦¼à§‹à¦®à§‡à¦Ÿà§à¦°à¦¿à¦• à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦® à¦¶à¦¨à¦¾à¦•à§à¦¤à¦•à¦°à¦£à§‡ à¦•à¦¿ à¦§à¦°à¦£à§‡à¦° à¦¬à¦¾à¦¯à¦¼à§‹à¦²à¦œà¦¿à¦•à§à¦¯à¦¾à¦² à¦¡à§‡à¦Ÿà¦¾ à¦¬à§à¦¯à¦¬à¦¹à§ƒà¦¤ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: à¦¶à¦¾à¦°à§€à¦°à¦¬à§ƒà¦¤à§à¦¤<br>à§§à§¬à§«. à¦ªà§à¦°à¦¶à§à¦¨: à¦à¦•à¦Ÿà¦¿ à¦¸à¦¾à¦§à¦¾à¦°à¦£ à¦°à§‹à¦¬à¦Ÿà§‡ à¦•à¦¯à¦¼à¦Ÿà¦¿ à¦‰à¦ªà¦¾à¦¦à¦¾à¦¨ à¦¥à¦¾à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§ª<br>à§§à§¬à§¬. à¦ªà§à¦°à¦¶à§à¦¨: à¦®à¦™à§à¦—à¦²à¦—à§à¦°à¦¹à§‡ à¦ªà§à¦°à¦¥à¦® à¦®à¦¹à¦¾à¦¶à§‚à¦¨à§à¦¯à¦¯à¦¾à¦¨ à¦ªà§à¦°à§‡à¦°à¦£ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§­à§¬ à¦¸à¦¾à¦²à§‡<br>à§§à§¬à§­. à¦ªà§à¦°à¦¶à§à¦¨: Robot à¦¶à¦¬à§à¦¦à¦Ÿà¦¿à¦° à¦‰à§Žà¦ªà¦¤à§à¦¤à¦¿ à¦•à§‹à¦¨ à¦¦à§‡à¦¶à§€ à¦¶à¦¬à§à¦¦ à¦¥à§‡à¦•à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à¦šà§‡à¦•<br>à§§à§¬à§®. à¦ªà§à¦°à¦¶à§à¦¨: IBM à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼ à¦•à¦¤ à¦¸à¦¾à¦²à§‡?<br>à¦‰à¦¤à§à¦¤à¦°: à§§à§¯à§§à§§ à¦¸à¦¾à¦²à§‡<br>à§§à§¬à§¯. à¦ªà§à¦°à¦¶à§à¦¨: Unauthentic à¦à¦¬à¦‚ Unwanted à¦®à§‡à¦‡à¦² à¦•à§‹à¦¥à¦¾à¦¯à¦¼ à¦œà¦®à¦¾ à¦¹à¦¯à¦¼?<br>à¦‰à¦¤à§à¦¤à¦°: Spam<br>à§§à§­à§¦. à¦ªà§à¦°à¦¶à§à¦¨: BTRC- à¦à¦° à¦‡à¦‚à¦°à§‡à¦œà¦¿ à¦ªà§‚à¦°à§à¦£à¦°à§‚à¦ª à¦•à§‹à¦¨à¦Ÿà¦¿?<br>à¦‰à¦¤à§à¦¤à¦°: Bangladesh Telecommunication Regulatory Commission<br>à§§à§­à§§. à¦ªà§à¦°à¦¶à§à¦¨: à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¥à§‡à¦•à§‡ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡ à¦¤à¦¥à§à¦¯ à¦†à¦¦à¦¾à¦¨- à¦ªà§à¦°à¦¦à¦¾à¦¨à§‡à¦° à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿à¦•à§‡ à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼â€”<br>à¦‰à¦¤à§à¦¤à¦°: à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ</p>', 1, 1, 'Public', '2018-12-06 17:55:02', '2018-12-06 17:55:59');
INSERT INTO `preparation_lesson` (`id`, `sub_id`, `lesson_title`, `lesson_content`, `posted_by`, `updated_by`, `action`, `created_at`, `updated_at`) VALUES
(33, 1, ' à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‡à¦¤à¦¿à¦¹à¦¾à¦¸', '<p style=\"text-align: justify;\">à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡à¦›à§‡à¦¨ à¦•à¦¿à¦¨à§à¦¤à§ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¸à¦®à§à¦®à§‚à¦–à§€à¦¨ à¦¹à¦¨à¦¨à¦¿ à¦à¦®à¦¨ à¦•à¦¾à¦‰à¦•à§‡ à¦ªà¦¾à¦“à¦¯à¦¼à¦¾à¦‡ à¦­à¦¾à¦°à¥¤ à¦ªà§à¦°à¦¾à¦¯à¦¼ à¦¸à¦¬ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à¦•à¦¾à¦°à§€à¦‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦•à¦® à¦¬à§‡à¦¶à¦¿ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¦¨à¥¤ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¨à¦¿à¦¯à¦¼à§‡ à¦°à¦¯à¦¼à§‡à¦›à§‡ à¦…à¦¨à§‡à¦• à¦œà¦²à§à¦ªà¦¨à¦¾-à¦•à¦²à§à¦ªà¦¨à¦¾à¥¤ à¦‰à§Žà¦¸à¦¾à¦¹à§€à¦¦à§‡à¦° à¦†à¦—à§à¦°à¦¹ à¦®à§‡à¦Ÿà¦¾à¦¤à§‡ à¦†à¦®à¦¾à¦° à¦à¦‡ à¦›à§‹à¦Ÿ à¦ªà§à¦°à¦šà§‡à¦·à§à¦Ÿà¦¾à¥¤ à¦†à¦¸à§à¦¨ à¦œà¦¾à¦¨à¦¾ à¦¯à¦¾à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‡à¦¤à¦¿à¦¹à¦¾à¦¸!<br><br>âœ”à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦•à¦¿?<br><br>à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¹à¦² à¦à¦®à¦¨ à¦à¦•à¦Ÿà¦¿ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¯à¦¾ à¦à¦•à¦Ÿà¦¿ à¦§à§à¦¬à¦‚à¦¶à¦•à¦¾à¦°à§€/à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸à§€ à¦¹à¦¿à¦¸à§‡à¦¬à§‡ à¦¨à¦¿à¦œà§‡à¦•à§‡ (à¦…à¦°à§à¦¥à¦¾à§Ž à¦à¦° &ldquo;à¦à¦•à§à¦¸à¦¿à¦•à¦¿à¦‰à¦Ÿà§‡à¦¬à¦²&rdquo; à¦…à¦‚à¦¶à¦•à§‡) à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦‚à¦¯à§‹à¦— à¦•à¦°à§‡ à¦¸à¦‚à¦•à§à¦°à¦®à¦£ à¦˜à¦Ÿà¦¾à¦¯à¦¼ à¦à¦¬à¦‚ à¦§à§à¦¬à¦‚à¦¶à¦¯à¦œà§à¦ž à¦šà¦¾à¦²à¦¾à¦¯à¦¼à¥¤ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡à¦° à¦ªà¦°à¦¿à¦­à¦¾à¦·à¦¾à¦¯à¦¼ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ (VIRUS) à¦¶à¦¬à§à¦¦à¦Ÿà¦¿ à¦­à¦¾à¦™à¦²à§‡ à¦ªà¦¾à¦“à¦¯à¦¼à¦¾ à¦¯à¦¾à¦¯à¦¼ &lsquo;à¦­à¦¾à¦‡à¦Ÿà¦¾à¦² à¦‡à¦¨à¦«à¦°à¦®à§‡à¦¶à¦¨ à¦°à¦¿à¦¸à§‹à¦°à§à¦¸à§‡à¦¸ à¦†à¦¨à§à¦¡à¦¾à¦° à¦¸à¦¿à¦œ (Vital Information Resources Under Seize)&rsquo; à¦…à¦°à§à¦¥à¦¾à§Ž à¦—à§à¦°à§à¦¤à§à¦¬à¦ªà§‚à¦°à§à¦£ à¦‰à§Žà¦¸à¦—à§à¦²à§‹ à¦¬à¦¾à¦œà§‡à¦¯à¦¼à¦¾à¦ªà§à¦¤ à¦•à¦°à¦¾ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦ªà§à¦°à¦–à§à¦¯à¦¾à¦¤ à¦—à¦¬à§‡à¦·à¦• &lsquo;à¦«à§à¦°à§‡à¦¡ à¦•à§‹à¦¹à§‡à¦¨&rsquo; à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¨à¦¾à¦®à¦•à¦°à¦£ à¦•à¦°à§‡à¦¨à¥¤<br><br>à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‡à¦¤à¦¿à¦¹à¦¾à¦¸ à¦ªà¦°à§à¦¯à¦¾à¦²à§‹à¦šà¦¨à¦¾<br>à§§à§¯à§®à§¬-à§§à§¯à§®à§­ à¦ªà§à¦°à¦¾à¦°à¦®à§à¦­à¦¿à¦• à¦ªà¦°à¦¿à¦šà¦¯à¦¼à¦ƒ<br><br>à§§à§¯à§®à§¬ à¦¸à¦¾à¦²à§‡ à¦ªà¦¾à¦•à¦¿à¦¸à§à¦¤à¦¾à¦¨à§‡à¦° à¦¦à§à¦‡ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦° à¦†à¦®à¦œà¦¾à¦¦ à¦“ à¦¬à¦¾à¦¸à¦¿à¦¤ à¦‰à¦ªà¦²à¦¦à§à¦§à¦¿ à¦•à¦°à¦² à¦«à§à¦²à¦ªà¦¿&nbsp; à¦¡à¦¿à¦¸à§à¦•à§‡à¦° à¦¬à§à¦Ÿà¦¸à§‡à¦•à§à¦Ÿà¦° executable à¦•à§‹à¦¡ à¦§à¦¾à¦°à¦£ à¦•à¦°à§‡ à¦à¦¬à¦‚ à¦ à¦•à§‹à¦¡ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦šà¦¾à¦²à§ à¦•à¦°à¦²à§‡à¦‡ à¦°à¦¾à¦¨ à¦•à¦°à§‡ à¦¯à¦¦à¦¿ à¦¡à§à¦°à¦¾à¦‡à¦­à§‡ à¦¡à¦¿à¦¸à§à¦• à¦¥à¦¾à¦•à§‡à¥¤ à¦¤à¦¾à¦°à¦¾ à¦†à¦°à¦“ à¦‰à¦ªà¦²à¦¦à§à¦§à¦¿ à¦•à¦°à§‡, à¦ à¦•à§‹à¦¡ à¦¤à¦¾à¦¦à§‡à¦° à¦¨à¦¿à¦œà¦¸à§à¦¬ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® (à¦•à§‹à¦¡) à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦¸à§à¦¥à¦¾à¦ªà¦¿à¦¤ à¦¹à¦¯à¦¼ à¦¯à¦¾ à¦®à§‡à¦®à§‹à¦°à¦¿ à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¹à¦¤à§‡ à¦ªà¦¾à¦°à§‡ à¦à¦¬à¦‚ à¦¯à¦¾ à¦¨à¦¿à¦œà§‡à¦° à¦•à¦ªà¦¿ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à¦¤à§‡ à¦¸à¦•à§à¦·à¦®à¥¤ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦¨à¦¿à¦œà§‡à¦° à¦…à¦¨à§à¦²à¦¿à¦ªà¦¿ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡ à¦¬à¦²à§‡ à¦¤à¦¾à¦°à¦¾ à¦à¦° à¦¨à¦¾à¦® à¦¦à§‡à¦¯à¦¼ &lsquo;à¦­à¦¾à¦‡à¦°à¦¾à¦¸&rsquo;à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦à¦Ÿà¦¿ à¦¶à§à¦§à§à¦®à¦¾à¦¤à§à¦° à§©à§¬à§¦ à¦•à¦¿à¦²à§‹à¦¬à¦¾à¦‡à¦Ÿ à¦«à§à¦²à¦ªà¦¿ à¦¡à¦¿à¦¸à§à¦•à¦•à§‡ à¦¸à¦‚à¦•à§à¦°à¦®à¦¿à¦¤ à¦•à¦°à§‡à¥¤<br>à§§à§¯à§®à§­ à¦¸à¦¾à¦²à§‡ University of Delaware à¦…à¦¨à§à¦­à¦¬ à¦•à¦°à¦² à¦¤à¦¾à¦¦à§‡à¦° à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦¸à¦‚à¦•à§à¦°à¦®à¦¿à¦¤à¥¤ à¦¯à¦–à¦¨ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¶à§à¦°à§ à¦•à¦°à§‡ à¦«à§à¦²à¦ªà¦¿ à¦¡à¦¿à¦¸à§à¦•à§‡à¦° à¦²à§‡à¦¬à§‡à¦² &lsquo;(c) Brain&rsquo; à¦¦à§‡à¦–à¦¤à§‡ à¦ªà§‡à¦²à¥¤ à¦à¦Ÿà¦¿à¦‡ à¦ªà§à¦°à¦¥à¦® à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦†à¦•à§à¦°à¦®à¦£ à¦à¦¬à¦‚ à¦à¦Ÿà¦¿ à¦¡à¦ƒ à¦¸à¦²à§‡à¦®à¦¨ à¦ªà¦¯à¦¾à¦¬à§‡à¦•à§à¦·à¦£ à¦•à¦°à§‡à¦¨à¥¤ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‰à¦ªà¦¸à§à¦¥à¦¿à¦¤à¦¿ à¦ªà§à¦°à¦¥à¦® à¦‰à¦•à§à¦¤ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼à§‡à¦° à¦œà¦¨à§ˆà¦•à¦¾ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦•à¦°à§à¦®à§€ à¦¦à§‡à¦–à§‡ à¦à¦•à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¬à¦²à§‡ à¦®à¦¨à§‡ à¦•à¦°à§‡à¦¨ à¦à¦¬à¦‚ à¦¡à¦¿à¦¸à§à¦• à¦¥à§‡à¦•à§‡ à¦¡à§‡à¦Ÿà¦¾ à¦ªà§à¦¨à¦°à§à¦¦à§à¦§à¦¾à¦°à§‡à¦° à¦•à¦¾à¦œà§‡ à¦¨à¦¿à¦®à¦—à§à¦¨ à¦¡à¦ƒ à¦¸à¦²à§‡à¦®à¦¨à§‡à¦° à¦•à¦¾à¦›à§‡ à¦¯à¦¾à¦¨à¥¤ à¦¡à¦ƒ à¦¸à¦²à§‡à¦®à¦¨ à¦à¦•à§‡ à¦¬à¦¿à¦¶à§à¦²à§‡à¦·à¦£ à¦•à¦°à§‡à¦¨ à¦à¦¬à¦‚ à¦à¦­à¦¾à¦¬à§‡ à¦¤à¦¿à¦¨à¦¿ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¬à§à¦¯à¦¬à¦¸à¦¾à¦¯à¦¼à§‡ à¦†à¦¸à§‡à¦¨à¥¤<br><br>à¦‡à¦¤à¦¿à¦®à¦§à§à¦¯à§‡ à§§à§¯à§®à§¬ à¦¤à§‡ Ralf Burger à¦¨à¦¾à¦®à¦• à¦à¦• à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦° à¦‰à¦ªà¦²à¦¦à§à¦§à¦¿ à¦•à¦°à¦², à¦à¦•à¦Ÿà¦¿ à¦«à¦¾à¦‡à¦² à¦†à¦°à§‡à¦•à¦Ÿà¦¿ à¦­à¦¾à¦‡à¦²à§‡à¦° à¦¸à¦‚à¦¯à§à¦•à§à¦¤à¦¿à¦¤à§‡ à¦¨à¦¿à¦œà§‡ à¦¨à¦¿à¦œà§‡à¦° à¦…à¦¨à§à¦²à¦¿à¦ªà¦¿ (à¦•à¦ªà¦¿) à¦¤à§ˆà¦°à¦¿ à¦•à¦°à¦¤à§‡ à¦¸à¦•à§à¦·à¦®à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦à¦° à¦‰à¦ªà¦° à¦à¦•à¦Ÿà¦¿ à¦¡à§‡à¦®à§‹à¦¨à§‡à¦¸à§à¦Ÿà§à¦°à§‡à¦¶à¦¨ à¦²à¦¿à¦–à§‡à¦¨ à¦¯à¦¾à¦•à§‡ Virdem à¦¬à¦²à¦¾ à¦¹à¦¯à¦¼à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦à¦Ÿà¦¿ Chaos Computer Club à¦ à¦¬à¦¿à¦¤à¦°à¦£ à¦•à¦°à§‡à¦¨ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦°à§‡à¦° à¦•à¦¨à¦«à¦¾à¦°à§‡à¦¨à§à¦¸à§‡ à¦¯à§‡à¦Ÿà¦¿à¦° Theme à¦›à¦¿à¦² à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡à¥¤ Virdem à¦¯à§‡à¦•à§‹à¦¨ com à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¥¤ à¦à¦° à¦ªà§‡-à¦²à§‹à¦¡ à¦­à§€à¦¤à¦¿à¦•à¦° à¦¨à¦¯à¦¼à¥¤ à¦ à¦¬à§à¦¯à¦¾à¦ªà¦¾à¦°à§‡ Ralf à¦–à§à¦¬ à¦¬à§‡à¦¶à¦¿ à¦‰à§Žà¦¸à¦¾à¦¹à¦¿ à¦¹à¦¯à¦¼à§‡ à¦ à¦¸à¦®à§à¦ªà¦°à§à¦•à¦¿à¦¤ à¦à¦•à¦Ÿà¦¿ à¦¬à¦‡ à¦²à§‡à¦–à§‡à¦¨à¥¤ Ralf à¦¬à§à¦Ÿ à¦¸à§‡à¦•à§à¦Ÿà¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¨à¦¿à¦¯à¦¼à§‡ à¦•à§‹à¦¨ à¦šà¦¿à¦¨à§à¦¤à¦¾ à¦•à¦°à§‡à¦¨ à¦¨à¦¿, à¦¤à¦¾à¦‡ à¦ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦¬à¦‡à¦¤à§‡ à¦•à¦¿à¦›à§ à¦¬à¦²à¦²à§‡à¦¨ à¦¨à¦¿à¥¤<br><br>à§§à§¯à§®à§­ à¦¸à¦¾à¦²à§‡ Charlie, Vienna à¦¨à¦¾à¦®à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‰à¦ªà¦¨à§à¦¥à¦¿à¦¤à¦¿ à¦²à¦•à§à¦·à§à¦¯ à¦•à¦°à¦¾ à¦¯à¦¾à¦¯à¦¼, à¦¯à¦¾ à¦®à§‡à¦¶à¦¿à¦¨à¦•à§‡ à¦¹à§à¦¯à¦¾à¦‚ à¦¬à¦¾ à¦°à¦¿à¦¬à§à¦Ÿ à¦•à¦°à§‡ à¦¦à§‡à¦¯à¦¼à¥¤ à¦‡à¦¤à¦¿à¦®à¦§à§à¦¯à§‡ à¦‡à¦¸à¦°à¦¾à¦‡à¦²à§‡à¦° à¦¤à§‡à¦²à¦†à¦¬à¦¿à¦¤à§‡ à¦…à¦¨à§à¦¯ à¦à¦•à¦œà¦¨ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦° Suriv-01 à¦¨à¦¾à¦®à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡à¥¤ à¦à¦Ÿà¦¿ à¦›à¦¿à¦² à¦®à§‡à¦®à§‹à¦°à¦¿ à¦°à§‡à¦¸à¦¿à¦¡à§‡à¦¨à§à¦Ÿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦•à¦¿à¦¨à§à¦¤à§ à¦à¦Ÿà¦¿ .com à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦†à¦•à§à¦°à¦®à¦£ à¦•à¦°à¦¤à¥¤ à¦¤à¦¾à¦° à¦¦à§à¦¬à¦¿à¦¤à§€à¦¯à¦¼ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¹à¦² Suriv-02 à¦¯à¦¾ à¦¶à§à¦§à§ .exe à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦†à¦•à§à¦°à¦®à¦£ à¦•à¦°à§‡ à¦à¦¬à¦‚ à¦à¦Ÿà¦¿ à¦¹à¦² à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦ªà§à¦°à¦¥à¦® .exe à¦«à¦¾à¦‡à¦² à¦†à¦•à§à¦°à¦®à¦²à¦•à¦¾à¦°à§€ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à¥¤ à¦¤à¦¾à¦° à¦¤à§ƒà¦¤à§€à¦¯à¦¼ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¹à¦² Suriv-03 à¦¯à¦¾ .com à¦à¦¬à¦‚ .exe à¦‰à¦­à¦¯à¦¼ à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦†à¦•à§à¦°à¦®à¦£ à¦•à¦°à§‡à¥¤ à¦¤à¦¾à¦° à¦šà¦¤à§à¦°à§à¦¥ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦ªà§ƒà¦¥à¦¿à¦¬à§€à¦° à¦¸à¦°à§à¦¬à¦¤à§à¦° à¦›à¦¡à¦¼à¦¿à¦¯à¦¼à§‡ à¦¯à¦¾à¦¯à¦¼ à¦à¦¬à¦‚ à¦¤à¦¾ Jerosalem à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤ à¦¹à¦¯à¦¼à¥¤ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦«à¦¾à¦‡à¦² à¦ªà§à¦°à¦¤à¦¿ à¦¶à§à¦•à§à¦°à¦¬à¦¾à¦° à§§à§© à¦¤à¦¾à¦°à¦¿à¦–à§‡ à¦šà¦¾à¦²à¦¾à¦²à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦®à§à¦›à§‡ à¦«à§‡à¦²à§‡à¥¤<br><br>à¦‡à¦¤à¦¿à¦®à¦§à§à¦¯à§‡ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡ Fred Chohen à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‰à¦ªà¦° à¦¤à¦¤à§à¦¤à§à¦¬à¦®à§‚à¦²à¦• à¦ªà§à¦°à¦¬à¦¨à§à¦§ à¦²à§‡à¦–à§‡à¥¤ Dr. Chohen à¦ªà§à¦°à¦®à¦¾à¦£ à¦•à¦°à§‡à¦¨ à¦¯à§‡ à¦•à§‡à¦‰ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦°à¦šà¦¨à¦¾ à¦•à¦°à¦¤à§‡ à¦¸à¦•à§à¦·à¦® à¦¨à¦¨ à¦¯à¦¾ à¦•à§‹à¦¨ à¦«à¦¾à¦‡à¦² à¦¦à§‡à¦–à§‡ à§§à§¦à§¦% à¦¨à¦¿à¦¶à§à¦šà¦¿à¦¤à¦­à¦¾à¦¬à§‡ à¦¬à¦²à¦¤à§‡ à¦ªà¦¾à¦°à§‡ à¦à¦¤à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦†à¦›à§‡ à¦•à¦¿ à¦¨à¦¾à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦•à¦¿à¦›à§ à¦ªà¦°à§€à¦•à§à¦·à¦¾ à¦šà¦¾à¦²à¦¾à¦¨à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®à§‡à¦° à¦œà¦¨à§à¦¯ à¦à¦•à¦Ÿà¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦°à¦¿à¦²à¦¿à¦œ à¦•à¦°à§‡à¦¨ à¦à¦¬à¦‚ à¦†à¦¬à¦¿à¦·à§à¦•à¦¾à¦° à¦•à¦°à§‡à¦¨ à¦¯à§‡, à¦à¦Ÿà¦¿ à¦¯à§‡ à¦•à¦¾à¦°à§‹ à¦…à¦¨à§à¦®à¦¾à¦¨à§‡à¦° à¦šà§‡à¦¯à¦¼à§‡à¦“ à¦…à¦¨à§‡à¦• à¦¬à§‡à¦¶à¦¿ à¦¦à§à¦°à§à¦¤ à¦¬à¦¿à¦šà¦°à¦£ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¥¤<br><br>2011-02-09_ (080403) à§§à§¯à§®à§­ à¦¤à§‡ Chohen, Lehigh University à¦¤à§‡ à¦¯à§‹à¦—à¦¦à¦¾à¦¨ à¦•à¦°à§‡à¦¨ à¦à¦¬à¦‚ à¦à¦–à¦¾à¦¨à§‡ Lehigh à¦¨à¦¾à¦®à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡à¦¨à¥¤ Lehigh à¦¨à¦¿à¦¶à§à¦šà¦¿à¦¤ à¦›à¦¿à¦² à¦à¦•à¦Ÿà¦¿ à¦…à¦•à§à¦·à¦® à¦­à¦¾à¦‡à¦°à¦¾à¦¸, à¦à¦Ÿà¦¿ à¦•à¦–à¦¨à§‹ à¦¬à¦¿à¦¸à§à¦¤à¦¾à¦° à¦²à¦¾à¦­ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡ à¦¨à¦¾à¥¤ à¦•à¦¾à¦°à¦£ à¦à¦Ÿà¦¿ à¦¶à§à¦§à§ à¦®à¦¾à¦¤à§à¦° Command.com à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦¸à¦‚à¦•à§à¦°à¦®à¦¿à¦¤ à¦•à¦°à§‡ à¦à¦¬à¦‚ à¦šà¦¤à§à¦°à§à¦¥ à¦…à¦¨à§à¦²à¦¿à¦ªà¦¿ à¦¤à§ˆà¦°à¦¿à¦° à¦ªà¦° à¦à¦Ÿà¦¿ Host à¦à¦° à¦…à¦¨à§‡à¦• à¦•à§à¦·à¦¤à¦¿ à¦¸à¦¾à¦§à¦¨ à¦•à¦°à§‡à¥¤ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦à¦•à¦Ÿà¦¿ à¦¨à§€à¦¤à¦¿ à¦›à¦¿à¦² à¦¯à§‡ à¦à¦Ÿà¦¿ à¦¦à§à¦°à§à¦¤ à¦à¦° Host à¦•à§‡ Damage à¦•à¦°à§‡ à¦¬à§‡à¦à¦šà§‡ à¦¥à¦¾à¦•à¦¤ à¦¨à¦¾à¥¤ Lehigh à¦›à¦¿à¦² à¦œà¦˜à¦¨à§à¦¯à¦¤à¦® à¦¬à¦¿à¦ªà¦¦à¦œà§à¦œà¦¨à¦•à¥¤ à¦šà¦¤à§à¦°à§à¦¥ à¦…à¦¨à§à¦²à¦¿à¦ªà¦¿ à¦¤à§ˆà¦°à¦¿à¦° à¦ªà¦° à¦à¦Ÿà¦¿ à¦¡à¦¿à¦¸à§à¦•à§‡ à¦…à¦­à¦¾à¦°à¦°à¦¾à¦‡à¦Ÿ à¦•à¦°à¦¤, à¦¬à§‡à¦¶à¦¿à¦°à¦­à¦¾à¦— FAT à¦•à§‡ à¦†à¦˜à¦¾à¦¤ à¦•à¦°à¦¤à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦à¦•à¦Ÿà¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¯à¦¾ à¦¶à§à¦§à§à¦®à¦¾à¦¤à§à¦° Command.com à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦†à¦•à§à¦°à¦¨à§à¦¤ à¦•à¦°à¦¤ à¦¤à¦¾ à¦¬à§‡à¦¶à¦¿ à¦¸à¦‚à¦•à§à¦°à¦®à¦• à¦›à¦¿à¦² à¦¨à¦¾à¥¤ à¦¯à¦¾à¦‡ à¦¹à§‹à¦• à¦¨à¦¾ à¦•à§‡à¦¨ Lehigh à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¬à§à¦¯à¦¾à¦ªà¦• à¦ªà§à¦°à¦šà¦¾à¦° à¦ªà¦¾à¦¯à¦¼à¥¤<br><br>à¦¯à¦–à¦¨ à¦¸à¦¬à¦•à¦¿à¦›à§ à¦šà¦²à¦¤à§‡à¦›à¦¿à¦², Newzealand à¦à¦° University of Wellington à¦à¦° à¦›à¦¾à¦¤à§à¦° à¦à¦•à¦Ÿà¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡ à¦¯à¦¾à¦° Soft-restraint à¦à¦¬à¦‚ Memory-restraint Replication à¦¥à¦¾à¦•à¦¾à¦¯à¦¼ à¦¸à¦¾à¦°à¦¾ à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦¦à§à¦°à§à¦¤ à¦ªà§à¦°à¦¸à¦¾à¦° à¦²à¦¾à¦­ à¦•à¦°à§‡à¥¤ à¦‡à¦Ÿà¦¾à¦²à§€à¦° à¦‡à¦‰à¦¨à¦¿à¦­à¦¾à¦°à§à¦¸à¦¿à¦Ÿà¦¿ à¦…à¦¬ à¦Ÿà§à¦°à¦¿à¦¨à§‡à¦° à¦à¦•à¦œà¦¨ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦° à¦…à¦¨à§à¦¯ à¦†à¦°à§‡à¦•à¦Ÿà¦¿ à¦¬à§à¦Ÿ à¦¸à§‡à¦•à§à¦Ÿà¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à§‡à¦¨à¥¤ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦°à¦¾à¦¨ à¦•à¦°à§‡ à¦¸à§à¦•à§à¦°à§€à¦£à§‡ à¦²à¦¾à¦«à¦¾à¦¨à§‹ à¦¬à¦² à¦ªà§à¦°à¦¦à¦°à§à¦¶à§€à¦¤ à¦¹à¦¯à¦¼à¥¤ à¦à¦Ÿà¦¿ Italian, Ping-Pong / Bounching Ball à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¿à¦¤à¥¤ à¦ à¦¸à¦®à¦¯à¦¼ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦¤à§‡ Yale à¦¨à¦¾à¦®à¦• à¦…à¦¨à§à¦¯ à¦†à¦°à§‡à¦•à¦Ÿà¦¿ à¦¬à§à¦Ÿ à¦¸à§‡à¦•à§à¦Ÿà¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§‡à¦–à¦¾ à¦¯à¦¾à¦¯à¦¼à¥¤ à§§à§¯à§®à§­ à¦¤à§‡à¦‡ à¦à¦•à¦œà¦¨ à¦œà¦¾à¦°à§à¦®à¦¾à¦¨à§€ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦° Cascade à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à§‡à¦¨à¥¤<br><br><i class=\"fa fa-hand-o-right fr-deletable\">&nbsp;</i>à§§à§¯à§®à§®- à¦¨à¦¤à§à¦¨ à¦–à§‡à¦²à¦¾ à¦¶à§à¦°à§<br>à§§à§¯à§®à§® à¦¸à¦¾à¦²à§‡ à¦¬à¦¾à¦¨à¦¿à¦œà§à¦¯à¦¿à¦•à¦­à¦¾à¦¬à§‡ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦° à¦¤à§ˆà¦°à¦¿ à¦¹à¦¯à¦¼à¥¤ &shy;IBM à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¬à§à¦¯à¦¾à¦ªà¦¾à¦°à§‡ à¦œà§‹à¦°à¦¾à¦²à§‹ à¦ªà¦¦à¦•à§à¦·à§‡à¦ª à¦¨à§‡à¦¯à¦¼à¥¤ à§§à§¯à§®à§® à¦¸à¦¾à¦²à§‡ Virus-B à¦¨à¦¾à¦®à§‡ à¦…à¦ªà¦° à¦à¦•à¦Ÿà¦¿ à¦¸à¦¾à¦‚à¦˜à¦¾à¦¤à¦¿à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à¦¾ à¦¹à¦¯à¦¼à¥¤ à§§à§¯à§®à§® à¦à¦° à¦¶à§‡à¦·à§‡à¦° à¦¦à¦¿à¦•à§‡ Jerosalem à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦à¦•à¦Ÿà¦¿ à¦…à¦°à§à¦¥à¦²à¦—à§à¦¨à§€ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨ à¦®à¦¾à¦°à¦¾à¦¤à§à¦®à¦• à¦•à§à¦·à¦¤à¦¿à¦° à¦¸à¦®à§à¦®à§‚à¦–à§€à¦¨ à¦¹à¦¯à¦¼à¥¤ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‰à¦ªà¦° à¦ªà§à¦°à¦¥à¦® à¦¸à§‡à¦®à¦¿à¦¨à¦¾à¦° à¦…à¦¨à§à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼ à¦¡à¦ƒ à¦¸à¦²à§‡à¦®à¦¾à¦¨à§‡à¦° à¦ªà§à¦°à¦šà§‡à¦·à§à¦Ÿà¦¾à¦¯à¦¼ à¦à¦¬à¦‚ à¦à¦•à¦‡ à¦¬à¦›à¦° à¦¤à¦¿à¦¨à¦¿ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡à¦¨ à¦ªà§à¦°à¦¥à¦® à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ Toolkità¥¤<br><br>âœ”à§§à§¯à§®à§¯- à¦¤à¦¥à§à¦¯ à¦¸à¦¨à§à¦¤à§à¦°à¦¾à¦¸<br><br>Jerisalem à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦°à§‚à¦ªà¦¾à¦¨à§à¦¤à¦°à¦¿à¦¤ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ Fu Manchu à¦¬à§ƒà¦Ÿà¦¿à¦¶ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦—à¦¬à§‡à¦·à¦•à¦¦à§‡à¦° à¦¹à¦¾à¦¤à§‡ à¦†à¦¸à§‡à¥¤ à¦®à¦¾à¦°à§à¦šà§‡ Data crime à¦¨à¦¾à¦®à¦• à¦­à¦¾à§&zwnj;à¦‡à¦°à¦¾à¦¸ à¦¦à§‡à¦–à¦¾ à¦¦à§‡à¦¯à¦¼ à¦¹à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡, à¦à¦¤à§‡ à¦…à¦¨à§‡à¦• à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦…à¦šà¦² à¦¹à¦¯à¦¼à§‡ à¦ªà¦¡à¦¼à§‡ à¦à¦¬à¦‚ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦…à¦•à§à¦Ÿà§‹à¦¬à¦°à§‡ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦¤à§‡à¦“ à¦§à¦°à¦¾ à¦ªà¦¡à¦¼à§‡à¥¤ à¦²à¦¨à§à¦¡à¦¨à§‡à¦° Royal National Institute of Blind, Jerosalem à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦†à¦•à¦¾à¦¨à§à¦¤ à¦¹à¦¯à¦¼à¥¤ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦¤à§‡ à¦¬à¦¿à¦¤à¦°à¦£à¦•à§ƒà¦¤ à¦à¦‡à¦¡à¦¸ à¦¸à¦®à§à¦ªà¦°à§à¦•à¦¿à¦¤ à¦¤à¦¥à§à¦¯ à¦¸à¦®à§ƒà¦¦à§à¦§ à¦¬à¦¿à¦¶à¦¹à¦¾à¦œà¦¾à¦° à¦¡à¦¿à¦¸à§à¦•à§‡ à¦¦à§‡à¦¯à¦¼à¦¾ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦® à¦‡à¦¨à§à¦¸à¦Ÿà¦² à¦•à¦°à§‡ à¦…à¦¨à§‡à¦• à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à¦•à¦¾à¦°à§€ à¦¬à§‡à¦¶ à¦¬à¦¿à¦ªà¦¾à¦•à§‡ à¦ªà¦¡à¦¼à§‡à¦¨à¥¤ Aids Information Disk à¦‡à¦¨à¦¸à§à¦Ÿà¦² à¦•à¦°à¦¾à¦° à¦ªà¦° à¦à¦•à¦Ÿà¦¿ à¦¹à¦¿à¦¡à§‡à¦¨ à¦¡à¦¿à¦°à§‡à¦•à§à¦Ÿà¦°à§€ à¦“ à¦«à¦¾à¦‡à¦² à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡ à¦à¦¬à¦‚ Autoexec.bat à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦ªà¦°à¦¿à¦¬à¦°à§à¦¤à¦¨ à¦•à¦°à§‡ à¦«à§‡à¦²à§‡à¥¤ à¦à¦° à¦«à¦²à§‡ à§¯à§¦à¦¬à¦¾à¦° à¦¬à§à¦Ÿ à¦¹à¦“à¦¯à¦¼à¦¾à¦° à¦ªà¦° à¦¸à¦¬ à¦«à¦¾à¦‡à¦² à¦¨à¦¾à¦®à¦•à§‡ à¦Ÿà§à¦°à§‹à¦œà¦¨ à¦à¦¨à¦ªà§à¦°à¦¿à¦ªà§à¦Ÿà§‡à¦¡ à¦•à¦°à§‡ à¦¹à¦¿à¦¡à§‡à¦¨ à¦à¦Ÿà§à¦°à¦¿à¦¬à¦¿à¦‰à¦Ÿ à¦¦à§‡à¦¯à¦¼ à¦à¦¬à¦‚ à¦à¦•à¦Ÿà¦¿ à¦«à¦¾à¦‡à¦²à¦‡ à¦¥à¦¾à¦•à§‡ à¦¯à¦¾à¦¤à§‡ Po Box7, Panama à¦ à¦ à¦¿à¦•à¦¾à¦¨à¦¾à¦¯à¦¼ $à§§à§®à§¯ à¦ªà¦¾à¦ à¦¾à¦¨à§‹à¦° à¦•à¦¥à¦¾ à¦¬à¦²à§‡à¥¤ à¦ªà§à¦²à¦¿à¦¶ à¦ à¦¬à§à¦¯à¦¾à¦ªà¦¾à¦°à§‡ à¦¤à¦¦à¦¨à§à¦¤ à¦•à¦°à§‡ à¦¦à¦¾à¦¯à¦¼à§€à¦•à§‡ à¦—à§‡à¦ªà§à¦¤à¦¾à¦° à¦•à¦°à§‡à¥¤ à§§à§¯à§®à§¯ à¦à¦° à¦¶à§‡à¦· à¦¨à¦¾à¦—à¦¾à¦¦ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§¨à¦¡à¦œà¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦œà¦¾à¦¨à¦¾ à¦¯à¦¾à¦¯à¦¼à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦ à¦¸à¦®à¦¯à¦¼à§‡ à¦°à¦¾à¦¶à¦¿à¦¯à¦¼à¦¾ à¦“ à¦¬à§à¦²à¦—à§‡à¦°à¦¿à¦¯à¦¼à¦¾à¦¤à§‡ à¦•à¦¿ à¦¹à¦šà§à¦›à§‡ à¦¤à¦¾ à¦…à¦¨à§‡à¦•à§‡à¦° à¦…à¦œà¦¾à¦¨à¦¾ à¦¥à§‡à¦•à§‡ à¦¯à¦¾à¦¯à¦¼à¥¤<br><br>âœ”à§§à§¯à§¯à§¦- à¦•à¦ à¦¿à¦¨ à¦à¦• à¦–à§‡à¦²à¦¾<br><br>Vienna à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¥à§‡à¦•à§‡ à¦ªà§à¦°à¦¥à¦® Polymerphic à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦¹à¦¯à¦¼à¥¤ à¦ à¦¬à¦›à¦° à¦¬à§à¦²à¦—à§‡à¦°à¦¿à¦¯à¦¼à¦¾ à¦¥à§‡à¦•à§‡ à¦…à¦¨à§‡à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦‰à¦¦à§à¦­à¦¬ à¦¹à¦¯à¦¼ à¦†à¦° à¦à¦°à¦¾ à¦¨à¦¿à¦œà§‡à¦•à§‡ Dark Avenger à¦¨à¦¾à¦®à§‡ à¦ªà¦°à¦¿à¦šà¦¯à¦¼ à¦¦à§‡à¦¯à¦¼à¥¤ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¨à¦¤à§à¦¨ à¦¦à§&rsquo;à¦Ÿà¦¿ à¦§à¦¾à¦°à¦£à¦¾à¦° à¦œà¦¨à§à¦® à¦¦à§‡à¦¯à¦¼à¥¤ à§§. `Fast Infector&rsquo; à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦®à§‡à¦®à§‹à¦°à¦¿à¦¤à§‡ à¦“à¦ªà§‡à¦¨ à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦†à¦•à§à¦°à¦¾à¦®à¦£ à¦•à¦°à§‡ à¦“ à¦¦à§à¦°à§à¦¤ à¦¹à¦¾à¦°à§à¦¡à¦¡à¦¿à¦¸à§à¦•à§‡ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦•à¦°à§‡à¥¤ à§¨. Subtle Damage. Dark Avenger à¦­à¦¾à¦‡à¦°à¦¾à¦¸à¦Ÿà¦¿ à¦¶à§à¦§à§ à¦¡à§‡à¦Ÿà¦¾ à¦¨à¦¯à¦¼, à¦¡à§‡à¦Ÿà¦¾à¦° à¦¬à§à¦¯à¦¾à¦•à¦†à¦ªà¦“ à¦¨à¦·à§à¦Ÿ à¦•à¦°à¦¤à§‡ à¦šà§‡à¦·à§à¦Ÿà¦¾ à¦•à¦°à§‡à¥¤ à¦à¦¬à¦›à¦° à¦¬à§à¦²à¦—à§‡à¦°à¦¿à¦¯à¦¼à¦¾à¦¤à§‡ à¦ªà§à¦°à¦¥à¦® Virus Exchange BBS (VX BBS) à¦¬à§‡à¦° à¦¹à¦¯à¦¼à¥¤ à§§à§¯à§¯à§¦ à¦à¦° à§¨à¦¯à¦¼ à¦¸à¦ªà§à¦¤à¦¾à¦¹à§‡ Whale à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§‡à¦–à¦¾ à¦¦à§‡à¦¯à¦¼à¥¤ à¦à¦Ÿà¦¿ à¦¬à§‡à¦¶ à¦¬à¦¡à¦¼ à¦“ à¦œà¦Ÿà¦¿à¦² à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¯à¦¾ à¦¬à¦¿à¦¶à§à¦²à§‡à¦·à¦£ à¦•à¦°à¦¤à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦—à¦¬à§‡à¦·à¦•à¦¦à§‡à¦° à¦…à¦¨à§‡à¦• à¦¸à¦®à¦¯à¦¼ à¦²à§‡à¦—à§‡à¦›à¦¿à¦²à¥¤ à§§à§¯à§¯à§¦ à¦à¦° à¦¶à§‡à¦·à§‡ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à¦•à¦¦à§‡à¦° à¦šà§‡à¦¯à¦¼à§‡ à¦¶à¦•à§à¦¤à¦¿à¦¶à¦¾à¦²à§€ à¦“ à¦¸à¦‚à¦—à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼à¥¤ à§§à§¯à§¯à§¦ à¦à¦° à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦°à§‡ à¦¹à§à¦¯à¦¾à¦®à¦¬à§à¦°à§à¦—à§‡ European Institute for Computer Anti-virus Research (EICAR) à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼à¥¤ à¦¤à¦¾à¦°à¦¾ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦—à¦¬à§‡à¦·à¦• à¦“ à¦­à§‡à¦¨à§à¦¡à¦¾à¦°à¦¦à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦†à¦²à§‹à¦šà¦¨à¦¾à¦° à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾ à¦•à¦°à§‡ à¦“ à¦¸à¦°à¦•à¦¾à¦°à¦•à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à¦•à¦¦à§‡à¦° à¦¬à¦¿à¦°à§à¦¦à§à¦§à§‡ à¦•à¦ à§‹à¦° à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾ à¦¨à§‡à¦¯à¦¼à¦¾à¦° à¦œà¦¨à§à¦¯ à¦¬à¦²à§‡à¥¤ à¦¯à¦–à¦¨ EICAR à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼ à¦¤à¦–à¦¨ à¦ªà¦°à§à¦¯à¦¨à§à¦¤ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§§à§«à§¦à¦Ÿà¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦›à¦¿à¦² à¦“ à¦¬à§à¦²à¦—à§‡à¦°à¦¿à¦¯à¦¼à¦¾à¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿à¦° à¦•à¦¾à¦°à¦–à¦¾à¦¨à¦¾ à¦ªà§à¦°à§‹à¦¦à¦®à§‡ à¦šà¦²à¦›à¦¿à¦²à¥¤<br><br><i class=\"fa fa-hand-o-right fr-deletable\">&nbsp;</i>à§§à§¯à§¯à§§- à¦ªà§à¦°à¦¡à¦¾à¦•à§à¦Ÿ à¦šà¦¾à¦²à§ à¦“ à¦ªà¦²à¦¿à¦®à¦°à¦«à¦¿à¦œà¦®<br>à§§à§¯à§¯à§§ à¦¤à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦®à§‹à¦Ÿà¦¾à¦®à§à¦Ÿà¦¿ à¦¸à¦®à¦¾à¦§à¦¾à¦¨à§‡ à¦†à¦¸à§‡à¥¤ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦° à§§à§¯à§¯à§¦ à¦¤à§‡ Symantec Norton Antivirus à¦šà¦¾à¦²à§ à¦•à¦°à§‡à¥¤ à¦à¦ªà§à¦°à¦¿à¦² à§§à§¯à§¯à§§ à¦¤à§‡ Central Point CPAV à¦šà¦¾à¦²à§ à¦•à¦°à§‡à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦° à§§à§¯à§¯à§§ à¦à¦° à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦¬à¦¡à¦¼ à¦¸à¦®à¦¸à§à¦¯à¦¾ à¦¹à¦² Glut (à¦…à¦¸à¦‚à¦–à§à¦¯ à¦­à¦¾à¦‡à¦°à¦¾à¦¸)à¥¤ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦° à§§à§¯à§¯à§¦ à¦¤à§‡ à§¨à§¦à§¦-à§©à§¦à§¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦›à¦¿à¦²à¥¤ à¦•à¦¿à¦¨à§à¦¤à§ à¦¡à¦¿à¦¸à§‡à¦®à§à¦¬à¦° à§§à§¯à§¯à§§ à¦¤à§‡ à¦à¦° à¦¸à¦‚à¦–à§à¦¯à¦¾ à¦¦à¦¾à¦à¦¡à¦¼à¦¾à¦¯à¦¼ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§§à§¨à§¦à§¦à¦¤à§‡à¥¤ à¦ªà§‚à¦°à§à¦¬ à¦‡à¦‰à¦°à§‹à¦ª à¦¥à§‡à¦•à§‡ à¦¬à§‡à¦¶à¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦¹à¦¯à¦¼à¥¤ à¦à¦¤à§‡ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦—à¦¬à§‡à¦·à¦•à¦°à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦·à§‡à¦§à¦• à¦¤à§ˆà¦°à¦¿à¦¤à§‡ à¦¬à§‡à¦¶ à¦¹à¦¿à¦®à¦¸à¦¿à¦® à¦–à¦¾à¦¨à¥¤ Tequila (à¦¸à§à¦‡à¦œà¦¾à¦°à¦²à§à¦¯à¦¾à¦¨à§à¦¡) à¦¹à¦² à¦ªà§à¦°à¦¥à¦® à¦¬à¦¿à¦¸à§à¦¤à¦¾à¦°à¦•à¦¾à¦°à§€ Polymorphic à¦­à¦¾à¦‡à¦°à¦¾à¦¸à¥¤<br>âœ”à§§à§¯à§¯à§¨-à¦¬à§à¦¯à¦¸à§à¦¤ à¦¬à¦›à¦°<br><br>à¦œà¦¾à¦¨à§à¦¯à¦¼à¦¾à¦°à§€ à§§à§¯à§¯à§¨à¦¤à§‡ Dark Avenger à¦¥à§‡à¦•à§‡ Self Mutating Engine (MtE) à¦¦à§‡à¦–à¦¾ à¦—à¦¿à¦¯à¦¼à§‡à¦›à¦¿à¦²à¥¤ à¦ªà§à¦°à¦¥à¦®à§‡ à¦à¦Ÿà¦¾à¦•à§‡ à¦¦à§‡à¦¥à¦¾ à¦—à¦¿à¦¯à¦¼à§‡à¦›à¦¿à¦² à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¨à¦¾à¦® à¦›à¦¿à¦² Dedicated à¦•à¦¿à¦¨à§à¦¤à§ à¦¸à¦¹à¦¸à¦¾ MtE à¦¦à§‡à¦¥à¦¾ à¦¦à¦¿à¦¯à¦¼à§‡à¦›à¦¿à¦²à¥¤ à¦ªà§à¦°à¦¥à¦®à§‡ à¦§à¦°à§‡ à¦¨à§‡à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼à§‡à¦›à¦¿à¦² MtE à¦¤à§‡ à¦…à¦œà¦¸à§à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¥à¦¾à¦•à¦¤à§‡ à¦ªà¦¾à¦°à§‡, à¦•à¦¾à¦°à¦£ à¦à§à¦Ÿà¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦–à§à¦à¦œà¦¤à§‡ à¦•à¦ à¦¿à¦¨à¦¤à¦° à¦•à¦°à§‡à¥¤ à¦ à¦¸à¦®à¦¯à¦¼ Starship à¦¨à¦¾à¦®à¦• à¦…à¦ªà¦° à¦à¦•à¦Ÿà¦¿ à¦¸à¦®à§à¦ªà§‚à¦°à§à¦£ à¦ªà¦²à¦¿à¦®à¦°à¦«à¦¿à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦†à¦¸à§‡à¥¤ à§§à§¯à§¯à§¨à¦¤à§‡ à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦°à¦•à¦¾à¦°à§€à¦¦à§‡à¦° à¦®à¦§à§à¦¯à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦†à¦¤à¦‚à¦• à¦¦à§‡à¦–à¦¾ à¦¦à§‡à¦¯à¦¼ à¦à¦¬à¦‚ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à¦¿à¦•à§à¦°à§‡à¦¤à¦¾à¦°à¦¾ à¦†à¦¤à¦‚à¦•à¦¿à¦¤ à¦¹à¦¯à¦¼à§‡ à¦ªà¦¡à¦¼à§‡à¥¤ à§¬à¦‡ à¦®à¦¾à¦°à§à¦šà§‡à¦° à¦ªà§‚à¦°à§à¦¬ à¦ªà¦°à§à¦¯à¦¨à§à¦¤ à¦¶à§à¦§à§ à¦†à¦®à§‡à¦°à¦¿à¦•à¦¾à¦¤à§‡ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§§à§¦à¦¹à¦¾à¦œà¦¾à¦° à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦…à¦•à§‡à¦œà§‹ à¦¹à¦¯à¦¼à§‡ à¦ªà¦¡à¦¼à§‡à¥¤<br><br>à¦†à¦—à¦·à§à¦Ÿ, à§¯à§¨à¦¤à§‡ à¦ªà§à¦°à¦¥à¦® à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦…à¦¥à¦°à¦¿à¦‚ à¦ªà§à¦¯à¦¾à¦•à§‡à¦œ à¦¦à§‡à¦–à¦¾ à¦¦à§‡à¦¯à¦¼, à¦¯à¦¾ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡ à¦¯à§‡ à¦•à§‡à¦‰ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¤à¥¤ à§§à§¯à§¯à§¨ à¦à¦° à¦¶à§‡à¦·à§‡à¦° à¦¦à¦¿à¦•à§‡ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡ à¦—à¦ à¦¿à¦¤ à¦¹à¦¯à¦¼ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à¦• à¦¸à¦®à¦¿à¦¤à¦¿ Association of Really Cruel Viruses (ARCV) à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦ªà§à¦°à¦¤à¦¿à¦°à§‹à¦§ à¦—à§‹à¦·à§à¦ à¦¿à¦° à¦¸à¦¹à¦¾à¦¯à¦¼à¦¤à¦¾à¦¯à¦¼ à¦¸à§à¦•à¦Ÿà¦²à§à¦¯à¦¾à¦¨à§à¦¡ à¦‡à¦¯à¦¼à¦¾à¦°à§à¦¡à§‡à¦° à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦•à§à¦°à¦¾à¦‡à¦® à¦‡à¦‰à¦¨à¦¿à¦Ÿ à¦à¦¦à§‡à¦° à¦šà¦¿à¦¹à§à¦¨à¦¿à¦¤ à¦•à¦°à§‡ à¦“ à¦—à§à¦°à§‡à¦«à¦¤à¦¾à¦° à¦•à¦°à§‡à¥¤ ARCV à¦¤à¦¿à¦¨ à¦®à¦¾à¦¸à§‡ à¦•à¦¯à¦¼à§‡à¦• à¦¡à¦œà¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡à¥¤<br><br><i class=\"fa fa-hand-o-right fr-deletable\">&nbsp;</i>à§§à§¯à§¯à§©- à¦ªà¦²à¦¿à¦®à¦°à¦«à¦¿à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦“ à¦‡à¦žà§à¦œà¦¿à¦¨<br>à§§à§¯à§¯à§© à¦à¦° à¦ªà§à¦°à¦¥à¦® à¦¦à¦¿à¦•à§‡ à¦¹à¦²à§à¦¯à¦¾à¦¨à§à¦¡ Trident à¦¨à¦¾à¦®à¦• à¦¨à¦¤à§à¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à¦• à¦†à¦¬à¦¿à¦·à§à¦•à§ƒà¦¤ à¦¹à¦¯à¦¼à¥¤ Trident à¦à¦° à¦ªà§à¦°à¦§à¦¾à¦¨ à¦²à§‡à¦–à¦• à¦®à¦¾à¦¸à§à¦¦ à¦–à¦¾à¦«à¦¿à¦° Trident Polymorphic Engine (TPE) à¦²à¦¿à¦–à§‡ à¦“ à¦à¦Ÿà¦¿ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡ GRARFE à¦¨à¦¾à¦®à¦• à¦¨à¦¤à§à¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦›à¦¾à¦¡à¦¼à§‡à¥¤ Cruncher à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¹à¦² Compression à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¯à¦¾ à¦¸à§à¦¬à¦¯à¦¼à¦‚à¦•à§à¦°à¦¿à¦¯à¦¼à¦­à¦¾à¦¬à§‡ à¦¨à¦¿à¦œà§‡à¦•à§‡ à¦«à¦¾à¦‡à¦²à§‡ à¦¯à§à¦•à§à¦¤ à¦•à¦°à§‡ à¦¬à¦¿à¦­à¦¿à¦¨à§à¦¨ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡ à¦…à¦Ÿà§‹-à¦‡à¦¨à¦¸à§à¦Ÿà¦² à¦•à¦°à§‡à¥¤ à¦‡à¦¤à¦¿à¦®à¦§à§à¦¯à§‡ Dark Avenger DAME (Dark Angel&rsquo;s Multiple Encryptor) à¦›à¦¾à¦¡à¦¼à§‡ à¦“ à¦à¦Ÿà¦¿ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡ Trigger à¦¨à¦¾à¦®à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡à¥¤ Trident à¦†à¦—à§‡à¦° à¦šà§‡à¦¯à¦¼à§‡à¦“ à¦œà¦Ÿà¦¿à¦² à¦“ à¦•à¦ à¦¿à¦¨ TPE à¦à¦° à¦­à¦¾à¦°à§à¦¸à¦¨ à§§.à§ª à¦à¦¬à¦‚ à¦à¦Ÿà¦¿ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡ à¦¤à§ˆà¦°à¦¿ Bosnia à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦›à¦¾à¦¡à¦¼à§‡à§à¥¤ à¦ à¦¬à¦›à¦°à¦‡ à¦‰à¦šà§à¦š à¦ªà¦²à¦¿à¦®à¦°à¦«à¦¿à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ Tremor à¦¦à§‡à¦–à¦¾ à¦¦à§‡à¦¯à¦¼à¥¤ Dark Ray à¦à¦¬à¦‚ John Tardy à¦¤à¦¾à¦¦à§‡à¦° à¦¦à¦²à§‡ à¦¯à§‹à¦— à¦¦à§‡à¦¯à¦¼à¦¾à¦¯à¦¼ à§§à§¯à§¯à§© à¦à¦° à¦®à¦¾à¦à¦¾à¦®à¦¾à¦à¦¿ Trident à¦—à§‹à¦·à§à¦ à¦¿ à¦†à¦°à¦“ à¦‰à¦¨à§à¦¨à¦¤à¦¿ à¦²à¦¾à¦­ à¦•à¦°à§‡à¥¤ Tardy 888 à¦¬à¦¾à¦‡à¦Ÿà§‡ à¦¸à¦®à§à¦ªà§‚à¦°à§à¦£ à¦ªà¦²à¦¿à¦®à¦¾à¦°à¦«à¦¿à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦›à¦¾à¦¡à¦¼à§‡à¥¤ à§§à§¯à§¯à§© à¦à¦° à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦–à¦¾à¦°à¦ª à¦¸à¦‚à¦¬à¦¾à¦¦ à¦¹à¦² à¦ªà¦²à¦¿à¦®à¦¾à¦°à¦«à¦¿à¦• à¦‡à¦žà§à¦œà¦¿à¦¨ à¦à¦¬à¦‚ à¦ªà¦²à¦¿à¦®à¦¾à¦°à¦«à¦¿à¦• à¦ªà§à¦¯à¦¾à¦•à§‡à¦œà§‡à¦° à¦›à¦¡à¦¼à¦¾à¦›à¦¡à¦¼à¦¿ à¦¯à¦¾ à¦¦à¦¿à¦¯à¦¼à§‡ à¦¸à¦¹à¦œà§‡à¦‡ à¦à¦®à¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à¦¾ à¦¯à¦¾à¦¯à¦¼ à¦¯à¦¾ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¸à§à¦•à§à¦¯à¦¾à¦¨à¦¾à¦° à¦¦à¦¿à¦¯à¦¼à¦¾ à¦§à¦°à¦¾ à¦•à¦ à¦¿à¦¨à¥¤<br><br>à§§à§¯à§¯à§©à¦¤à§‡ XTREE à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à¦¿ à¦¤à¦¾à¦¦à§‡à¦° à¦¬à§à¦¯à¦¬à¦¸à¦¾ à¦›à§‡à¦¡à¦¼à§‡ à¦¦à§‡à¦¯à¦¼à¦¾à¦° à¦˜à§‹à¦·à¦£à¦¾ à¦¦à§‡à¦¯à¦¼- à¦à¦Ÿà¦¿à¦‡ à¦¹à¦² à¦ªà§à¦°à¦–à¦® à¦˜à¦Ÿà¦¨à¦¾ à¦¯à§‡ à¦à¦•à¦Ÿà¦¿ à¦¬à¦¡à¦¼ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à§€ à¦—à§à¦Ÿà¦¿à¦¯à¦¼à§‡ à¦«à§‡à¦²à¦¾à¥¤ à¦à¦›à¦¾à¦¡à¦¼à¦¾à¦“ à¦ à¦¬à¦›à¦° à¦…à¦¨à§‡à¦• à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à§€ à¦¬à¦¨à§à¦§ à¦¹à¦¯à¦¼à§‡ à¦¯à¦¾à¦¯à¦¼à¥¤ à¦à¦•à¦‡ à¦¬à¦›à¦° à¦¡à¦ƒ à¦¸à¦²à§‡à¦®à¦¨ Find Virus à¦à¦¬à¦‚ Virus Guard à¦à¦° à¦²à§à¦¯à¦¾à¦‚à¦—à§à¦¯à¦¼à§‡à¦œ à¦œà¦¨à§à¦¯ VIRTRAN à¦à¦° à¦œà¦¨à§à¦¯ Queen&rsquo;s Award à¦ªà¦¾à¦¨à¥¤ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿à¦° à¦ªà§à¦¯à¦¾à¦•à§‡à¦œ à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡ à¦¤à§ˆà¦°à¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¸à¦‚à¦–à§à¦¯à¦¾à¦§à¦¿à¦•à§à¦¯à¦° à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à¦•à¦°à¦¾ à¦¹à¦¿à¦®à¦¸à¦¿à¦® à¦–à¦¾à¦šà§à¦›à¦¿à¦²à¥¤ à¦à¦¸à¦¬ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¬à¦¿à¦¶à§à¦²à§‡à¦·à¦£ à¦•à¦°à¦¤à§‡ à¦¤à¦¾à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦¸à¦¹à¦œ à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾à¦° à¦ªà§à¦°à¦¯à¦¼à§‹à¦œà¦¨ à¦¹à¦¯à¦¼à§‡ à¦ªà¦¡à¦¼à§‡à¥¤ à¦à¦° à¦¸à¦®à¦¾à¦§à¦¾à¦¨ à¦¹à¦² Generic Decryption Engine (GDE) à¦¯à¦¾ à¦¸à¦¨à§à¦¦à§‡à¦¹à¦œà¦¨à¦• à¦«à¦¾à¦‡à¦²à¦•à§‡ à¦•à§‹à¦¡ Decrypt à¦•à¦°à§‡ à¦ à¦¸à¦¿à¦¦à§à¦§à¦¾à¦¨à§à¦¤à§‡ à¦‰à¦ªà¦¨à§€à¦¤ à¦•à¦°à§‡ à¦¯à§‡ à¦«à¦¾à¦‡à¦²à¦Ÿà¦¿à¦¤à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦†à¦›à§‡ à¦•à¦¿ à¦¨à§‡à¦‡à¥¤<br><br>âœ”à§§à§¯à§¯à§ª CPAV à¦¬à¦¨à§à¦§ à¦“ à¦…à¦œà¦¸à§à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦†à¦—à¦®à¦¨<br><br>à§§à§¯à§¯à§ª à¦à¦° à¦à¦ªà§à¦°à¦¿à¦²à§‡ Central Point Software à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨à¦Ÿà¦¿ à¦¬à¦¨à§à¦§ à¦¹à¦¯à¦¼à§‡ à¦¯à¦¾à¦¯à¦¼à¥¤ Central Point à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦®à¦¾à¦°à§à¦•à§‡à¦Ÿà§‡ à¦¤à¦¾à¦¦à§‡à¦° CPAV à¦ªà§à¦°à¦¡à¦¾à¦•à§à¦Ÿ à¦¨à¦¿à¦¯à¦¼à§‡ à¦œà¦¨à¦ªà§à¦°à¦¿à¦¯à¦¼ à¦›à¦¿à¦²à¥¤ à¦à¦¬à¦›à¦° à¦…à¦œà¦¸à§à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦†à¦—à¦®à¦¨ à¦˜à¦Ÿà§‡à¥¤ à¦¬à¦›à¦°à§‡à¦° à¦¶à§à¦°à§ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦›à¦¿à¦² à§ªà§¦à§¦à§¦ à¦à¦¬à¦‚ à¦¶à§‡à¦·à§‡ à¦¹à¦² à¦ªà§à¦°à¦¾à¦¯à¦¼ à§¬à§¦à§¦à§¦à¥¤ à¦‡à¦‰à¦°à§‹à¦ªà§‡à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à¦• à¦—à§‹à¦·à§à¦ à¦¿ à¦†à¦°à¦“ à¦¬à§‡à¦ªà§‹à¦°à§‹à¦¯à¦¼à¦¾ à¦¹à¦¯à¦¼à§‡ à¦‰à¦ à§‡à¥¤à¦¦à§à¦°à¦ªà§à¦°à¦¾à¦šà§à¦¯à§‡ (Far fast) Mulation Engine à¦¤à§ˆà¦°à¦¿ à¦¶à§à¦°à§ à¦•à¦°à§‡à¥¤ Dark Slyer à¦¥à§‡à¦•à§‡ DSME à¦…à¦¨à§à¦¤à¦°à§à¦­à§‚à¦•à§à¦¤ à¦•à¦°à§‡à¥¤ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦à¦‡ à¦®à¦¾à¦°à¦¾à¦¤à§à¦®à¦• à¦›à¦¡à¦¼à¦¾à¦›à¦¡à¦¼à¦¿ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦­à§‡à¦¨à§à¦¡à¦¾à¦°à¦¦à§‡à¦° à¦¸à¦‚à¦•à¦Ÿà§‡ à¦«à§‡à¦²à§‡ à¦¦à§‡à¦¯à¦¼à¥¤ à¦¡à¦ƒ à¦¸à¦²à§‡à¦®à¦¾à¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦ªà§à¦°à¦¾à¦šà§à¦°à§à¦¯à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦¤à¦¾à¦² à¦®à¦¿à¦²à¦¿à¦¯à¦¼à§‡ Combination à¦ªà¦šà¦¨à§à¦¦ à¦•à¦°à§‡à¦¨à¥¤ à¦•à¦¿à¦›à§ Combination à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦‰à¦¤à§à¦¤à¦°-à¦ªà¦¶à§à¦šà¦¿à¦® à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡ à¦¥à§‡à¦•à§‡ à¦¬à§‡à¦° à¦¹à¦¯à¦¼à¥¤ à§§à§¯à§¯à§ª à¦¤à§‡ à¦¤à¦¿à¦¨à¦Ÿà¦¿ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ Natas, One-Half, SMEG.Pathogen à¦†à¦²à¦¾à¦¦à¦¾ à¦†à¦²à¦¾à¦¦à¦¾à¦­à¦¾à¦¬à§‡ à¦…à¦¨à§‡à¦• à¦¸à¦®à¦¸à§à¦¯à¦¾à¦° à¦¸à§ƒà¦·à§à¦Ÿà¦¿ à¦•à¦°à§‡à¥¤<br><br><i class=\"fa fa-hand-o-right fr-deletable\">&nbsp;</i>à§§à§¯à§¯à§« à¦¡à¦•à§à¦®à§‡à¦¨à§à¦Ÿ à¦§à§à¦¬à¦‚à¦¸à¦•à¦¾à¦°à§€ à¦®à§à¦¯à¦¾à¦•à§à¦°à§‹à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦‰à¦¦à§à¦­à¦¬<br>à§§à§¯à§¯à§« à¦à¦° à§¨à§¬à¦¶à§‡ à¦®à§‡ Smeg à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿à¦° à¦…à¦ªà¦°à¦¾à¦§à§‡ à¦‡à¦‚à¦²à§à¦¯à¦¾à¦¨à§à¦¡à§‡à¦° à¦ªà§à¦²à§‡à¦®à¦¾à¦‰à¦¥à§‡ à§¨à§¬ à¦¬à¦›à¦° à¦¬à¦¯à¦¸à§à¦• Christopher Pile, Computer Misuse Act à¦à¦° à¦†à¦“à¦¤à¦¾à¦¯à¦¼ à¦¦à¦¨à§à¦¡à¦¿à¦¤ à¦¹à¦¨à¥¤ à§§à§¯à§¯à§« à¦à¦° à¦®à¦§à§à¦¯ à¦ªà¦°à§à¦¯à¦¨à§à¦¤ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¸à¦‚à¦–à§à¦¯à¦¾ à¦¦à¦¾à¦à¦¡à¦¼à¦¾à¦¯à¦¼ à¦ªà§à¦°à¦¾à¦¯à¦¼ à§­à§¦à§¦à§¦ à¦à¥¤ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¨à¦¿à¦°à§à¦®à¦¾à¦¤à¦¾à¦°à¦¾ à¦†à¦¤à¦‚à¦•à¦¿à¦¤ à¦¹à¦¯à¦¼à§‡ à¦‰à¦ à§‡à¦¨à¥¤à¦¦à§‚à¦°à¦ªà§à¦°à¦¾à¦šà§à¦¯à§‡à¦° à¦…à¦¨à§‡à¦• à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦° à¦…à¦¨à§‡à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¨à¦•à¦² à¦•à¦°à§‡ à¦¨à¦¤à§à¦¨ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦•à¦°à§‡à¦¨à¥¤ à¦¯à§‡à¦®à¦¨, à¦¤à¦¾à¦‡à¦“à¦¯à¦¼à¦¾à¦¨à§‡à¦° CVEX à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦ªà¦°à§€à¦•à§à¦·à¦¾ à¦•à¦°à¦²à§‡ à¦§à¦°à¦¾ à¦ªà¦¡à¦¼à§‡ à¦¯à§‡ à¦à¦Ÿà¦¿ Jerosalem à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¨à¦•à¦²à¥¤ Virogen à¦¨à¦¾à¦®à¦• à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¾à¦° VICE à¦à¦¬à¦‚ Pinworm à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦²à§‡à¦–à§‡à¦¨à¥¤ à§§à§¯à§¯à§« à¦à¦° à¦®à¦§à§à¦¯à¦­à¦¾à¦—à§‡ à¦¡à¦ƒ à¦¸à¦²à§‡à¦®à¦¨ Advanced Heuristic Analysis (AHA) à¦‰à¦ªà¦¸à§à¦¥à¦¿à¦¤ à¦•à¦°à¦¾à¦¨ à¦¯à¦¾ /ANALYZE à¦¸à§à¦‡à¦š à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡ Find Virus à¦•à§‡ à¦¨à¦¤à§à¦¨ à¦¸à¦®à§à¦­à¦¾à¦¬à§à¦¯ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦ªà¦°à§€à¦•à§à¦·à¦¾ à¦•à¦°à¦¤à§‡ Allow à¦•à¦°à§‡à¥¤ à§§à§¯à§¯à§« à¦à¦° à¦†à¦—à¦·à§à¦Ÿà§‡ à¦ªà§à¦°à¦¥à¦® à¦®à§à¦¯à¦¾à¦•à§à¦°à§‹à¦­à¦¾à¦‡à¦°à¦¾à¦¸ WM/Concept à¦à¦° à¦‰à¦¦à§à¦­à¦¬ à¦˜à¦Ÿà§‡à¥¤ à¦à¦‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦à¦®à¦à¦¸ à¦“à¦¯à¦¼à¦¾à¦°à§à¦¡à§‡à¦°à§¬.à§¦ à¦à¦° à¦¡à¦•à§à¦®à§‡à¦¨à§à¦Ÿà¦•à§‡ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦•à¦°à§‡à¥¤ à¦¡à¦•à§à¦®à§‡à¦¨à§à¦Ÿà§‡ à¦®à§à¦¯à¦¾à¦•à§à¦°à§‹ à¦¤à§ˆà¦°à¦¿ à¦¥à§‡à¦•à§‡ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¤à§ˆà¦°à¦¿ à¦¹à¦¯à¦¼à¥¤<br><br><i class=\"fa fa-hand-o-right fr-deletable\">&nbsp;</i>à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦­à¦¯à¦¼à¦¾à¦¬à¦¹ à¦†à¦•à§à¦°à¦®à¦£à§‡ à¦¬à¦¿à¦¶à§à¦¬à¦¬à§à¦¯à¦¾à¦ªà§€ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼<br>à§¯à§¯ à¦à¦° à§¨à§¬à¦¶à§‡ à¦à¦ªà§à¦°à¦¿à¦² à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à¦¸à¦¹ à¦¸à¦¾à¦°à¦¾à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦²à¦•à§à¦· à¦²à¦•à§à¦· à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° CIH à¦¬à¦¾ à¦šà§‡à¦¨à¦¨à§‹à¦¬à¦¿à¦² à¦¨à¦¾à¦®à¦• à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦†à¦•à§à¦°à¦®à¦£à§‡ à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼à§‡à¦° à¦¸à¦®à§à¦®à§‚à¦–à§€à¦¨ à¦¹à¦¯à¦¼à¥¤ à¦Ÿà¦¾à¦‡à¦® à¦¬à§‹à¦®à¦¾à¦° à¦®à¦¤à§‹ à¦¨à¦¿à¦°à§à¦¦à¦¿à¦·à§à¦Ÿ à¦¸à¦®à¦¯à¦¼à§‡ à¦ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à¦Ÿà¦¿ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à¦•à§‡ à¦†à¦•à§à¦°à¦®à¦£ à¦•à¦°à§‡à¥¤ à¦à¦•à¦‡ à¦¸à¦®à¦¯à¦¼à§‡ à¦¸à¦¾à¦°à¦¾à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦¹à¦“à¦¯à¦¼à¦¾à¦° à¦à¦Ÿà¦¾à¦‡ à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦†à¦²à§‹à¦¡à¦¼à¦¨ à¦¸à§ƒà¦·à§à¦Ÿà¦¿à¦•à¦¾à¦°à§€ à¦˜à¦Ÿà¦¨à¦¾à¥¤ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦®à§‡ à¦¸à¦®à¦¯à¦¼ à¦“ à¦¤à¦¾à¦°à¦¿à¦–à§‡à¦° à¦œà¦¨à§à¦¯ à¦˜à¦¡à¦¼à¦¿ à¦¸à§‡à¦Ÿ à¦•à¦°à¦¾ à¦†à¦›à§‡à¥¤ à¦˜à¦¡à¦¼à¦¿à¦° à¦•à¦¾à¦Ÿà¦¾à¦¯à¦¼ à§¨à§¬à¦¶à§‡ à¦à¦ªà§à¦°à¦¿à¦², à§§à§¯à§¯à§¯ à¦¹à¦“à¦¯à¦¼à¦¾à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦¾à¦¥à§‡ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦°à§‡ à¦²à§à¦•à¦¾à¦¯à¦¼à¦¿à¦¤ à¦¸à¦¿à¦†à¦‡à¦à¦‡à¦š à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼à§‡à¦° à¦¸à§ƒà¦·à§à¦Ÿà¦¿ à¦•à¦°à§‡à¥¤ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à¦¸à¦¹ à¦¬à¦¿à¦¶à§à¦¬à§‡ à¦²à¦•à§à¦· à¦²à¦•à§à¦· à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦…à¦šà¦² à¦¹à¦¯à¦¼à§‡ à¦ªà¦¡à¦¼à§‡à¥¤ à¦ªà¦¶à§à¦šà¦¿à¦®à¦¾à¦¦à§‡à¦¶à¦—à§à¦²à§‹à¦° à¦¤à§à¦²à¦¨à¦¾à¦¯à¦¼ à¦à¦¶à¦¿à¦¯à¦¼à¦¾à¦° à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼à§‡à¦° à¦®à¦¾à¦¤à§à¦°à¦¾ à¦…à¦¨à§‡à¦• à¦­à¦¯à¦¼à¦¾à¦¬à¦¹à¥¤ à¦à¦‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦­à¦¯à¦¼à¦¾à¦¬à¦¹à¦¤à¦¾ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à§€à¦—à§à¦²à§‹ à¦¬à¦¾à¦°à¦‚à¦¬à¦¾à¦° à¦¸à¦°à§à¦¤à¦• à¦•à¦°à¦¾à¦° à¦¸à¦¤à§à¦¤à§à¦¬à§‡à¦“ à¦à¦¶à¦¿à¦¯à¦¼à¦¾ à¦“ à¦®à¦§à§à¦¯à¦ªà§à¦°à¦¾à¦šà§à¦¯à§‡à¦° à¦¦à§‡à¦¶à¦—à§à¦²à§‹à¦° à¦‰à¦¦à¦¾à¦¸à§€à¦¨à¦¤à¦¾à¦° à¦«à¦²à§‡ à¦à¦‡ à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼ à¦˜à¦Ÿà§‡à¦›à§‡à¥¤<br><br>à¦…à¦¨à§à¦¯à¦¾à¦¨à§à¦¯ à¦¦à§‡à¦¶à§‡à¦° à¦¤à§à¦²à¦¨à¦¾à¦¯à¦¼ à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦° à¦…à¦¨à§‡à¦• à¦•à¦® à¦•à§à¦·à¦¤à¦¿à¦—à§à¦°à¦¸à§à¦¥ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤ à¦¬à§à¦¯à¦¾à¦ªà¦• à¦ªà§à¦°à¦šà¦¾à¦°à¦¨à¦¾à¦° à¦«à¦²à§‡ à¦¯à¦¥à¦¾à¦¸à¦®à¦¯à¦¼à§‡ à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦†à¦ªà¦—à§à¦°à¦¡ à¦•à¦¾à¦°à¦¾à¦¯à¦¼ à¦•à¦°à§à¦ªà§‹à¦°à§‡à¦Ÿ à¦¹à¦¾à¦‰à¦œà¦—à§à¦²à§‹ à¦à¦‡ à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼ à¦à¦¡à¦¼à¦¾à¦¤à§‡ à¦ªà§‡à¦°à§‡à¦›à§‡à¥¤ à¦ªà¦¿à¦Ÿà¦¾à¦°à§à¦¸ à¦¬à§à¦°à§à¦—à§‡à¦° à¦®à§‡à¦²à§‹à¦¨ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼à§‡à¦° à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦‡à¦®à¦¾à¦°à¦œà§‡à¦¨à§à¦¸à¦¿ à¦°à§‡à¦¸à¦ªà¦¨à§à¦¸ à¦Ÿà¦¿à¦®à§‡à¦° à¦®à§à¦–à¦ªà¦¾à¦¤à§à¦° à¦¬à¦¿à¦² à¦ªà§‹à¦²à¦• à¦¬à¦²à§‡à¦¨, &ldquo;à¦¯à§à¦•à§à¦¤à¦°à¦¾à¦·à§à¦Ÿà§à¦°à§‡ à¦•à¦®à¦ªà¦•à§à¦·à§‡ à§¨à§©à§®à§¨à¦Ÿà¦¿ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦•à§à¦·à¦¤à¦¿à¦—à§à¦°à¦¸à§à¦¥ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤&ldquo;<br><br>à¦¸à¦¾à¦°à¦¾ à¦šà§€à¦¨à§‡ à§§ à¦²à¦¾à¦–à§‡à¦°à¦“ à¦¬à§‡à¦¶à¦¿ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° CIH à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦†à¦•à§à¦°à¦®à¦£à§‡à¦° à¦¶à¦¿à¦•à¦¾à¦° à¦¹à¦¯à¥¤à¦šà§€à¦¨à§‡à¦° à¦¬à§ƒà¦¹à¦¤à§à¦¤à¦® à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦¸à¦«à¦Ÿà¦“à¦¯à¦¼à§à¦¯à¦¾à¦° à¦¨à¦¿à¦°à§à¦®à¦¾à¦¤à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨ à¦°à§à¦‡à¦œà¦¿à¦¨ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à§€à¦° à¦œà¦¿à¦à¦® à¦²à¦¿à¦‰ à¦œà§ à¦à¦•à§‡ à¦®à¦¹à¦¾à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¯à¦¼ à¦¬à¦²à§‡ à¦†à¦–à§à¦¯à¦¾à¦¯à¦¼à¦¿à¦¤ à¦•à¦°à§‡à¦¨à¥¤<br><br>à¦¦à¦•à§à¦·à¦¿à¦£ à¦•à§‹à¦°à¦¿à¦¯à¦¼à¦¾à¦° à¦…à¦¬à¦¸à§à¦¥à¦¾ à¦¸à¦¬à¦šà§‡à¦¯à¦¼à§‡ à¦­à¦¯à¦¼à¦¾à¦¬à¦¹à¥¤ à¦¦à¦•à§à¦·à¦¿à¦¨ à¦•à§‹à¦°à¦¿à¦¯à¦¼à¦¾à¦° à¦¤à¦¥à§à¦¯ à¦“ à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦ªà§à¦°à¦¤à¦¿à¦®à¦¨à§à¦¤à§à¦°à§€ à¦†à¦¨ à¦¬à¦¿à¦‰à¦‚-à¦‡à¦¯à¦¼à¦ª à¦•à§à¦·à¦®à¦¾ à¦šà§‡à¦¯à¦¼à§‡ à¦¬à¦²à§‡à¦¨, &ldquo;à¦†à¦®à¦°à¦¾ à¦à¦‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à¦Ÿà¦¿à¦° à¦§à§à¦¬à¦‚à¦¶ à¦•à§à¦·à¦®à¦¤à¦¾ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦…à¦œà§à¦ž à¦›à¦¿à¦²à¦¾à¦® à¦à¦¬à¦‚ à¦¬à¦¿à¦·à¦¯à¦¼à¦Ÿà¦¿à¦° à¦ªà§à¦°à¦¤à¦¿ à¦¯à¦¥à§‡à¦·à§à¦Ÿ à¦—à§à¦°à§à¦¤à§à¦¬ à¦¦à§‡à¦‡à¦¨à¦¿&rdquo;à¥¤ à¦¤à¦¿à¦¨à¦¿ à¦¬à¦²à§‡à¦›à§‡à¦²à§‡à¦¨, &ldquo;à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦®à¦¾à¦¨à§à¦·à¦•à§‡ à¦¸à¦šà§‡à¦¤à¦¨ à¦•à¦°à§‡ à¦¤à§à¦²à¦¤à§‡ à¦¹à¦¬à§‡ à¦“ à¦¸à¦°à§à¦¤à¦•à¦¤à¦¾ à¦ªà¦¦à§à¦§à¦¤à¦¿à¦•à§‡ à¦†à¦°à¦“ à¦¶à¦•à§à¦¤à¦¿à¦¶à¦¾à¦²à§€ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡&rdquo;à¥¤ à¦¸à¦°à¦•à¦¾à¦°à§€ à¦¸à§‚à¦¤à§à¦°à¦®à¦¤à§‡, à¦¦à¦•à§à¦·à¦¿à¦£ à¦•à§‹à¦°à¦¿à¦¯à¦¼à¦¾à¦¯à¦¼ à§© à¦²à¦•à§à¦· à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° CIH à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦¹à¦¯à¦¼à§‡à¦›à¦¿à¦²à¥¤ à¦¤à¦¬à§‡, à¦à¦¨à§à¦Ÿà¦¿à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦•à§‹à¦®à§à¦ªà¦¾à¦¨à§€à¦—à§à¦²à§‹ à¦¦à¦¾à¦¬à¦¿ à¦•à¦°à§‡à¦›à§‡, à§¬ à¦²à¦¾à¦–à§‡à¦°à¦“ à¦¬à§‡à¦¶à¦¿ à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦¹à¦¯à¦¼à§‡à¦›à§‡à¥¤<br><br>à¦¤à§à¦°à¦·à§à¦•à§‡à¦° à¦°&zwj;à§à¦¯à¦¾à¦¡à¦¿à¦•à§‡à¦² à¦ªà¦¤à§à¦°à¦¿à¦•à¦¾ à¦œà¦¾à¦¨à¦¿à¦¯à¦¼à§‡à¦›à§‡, à¦¬à¦¾à¦°à¦‚à¦¬à¦¾à¦° à¦¸à¦°à§à¦¤à¦• à¦•à¦°à¦¾à¦° à¦¸à¦¤à§à¦¤à§à¦¬à§‡à¦“, à¦•à§‡à¦‰à¦‡ à¦¬à¦¿à¦·à¦¯à¦¼à¦Ÿà¦¿ à¦¤à§‡à¦®à¦¨ à¦—à§à¦°à§à¦¤à§à¦¬ à¦¦à§‡à¦¯à¦¼à¦¨à¦¿à¥¤ à¦«à¦²à§‡ à¦¯à¦¾ à¦˜à¦Ÿà¦¾à¦° à¦¤à¦¾à¦‡ à¦˜à¦Ÿà§‡à¦›à§‡à¥¤ à¦ªà§à¦°à¦šà§à¦° à¦•à¦®à§à¦ªà¦¿à¦‰à¦Ÿà¦¾à¦° à¦­à¦¾à¦‡à¦°à¦¾à¦¸ à¦†à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦¹à¦¯à¦¼à§‡ à¦…à¦šà¦² à¦¹à¦¯à¦¼à§‡ à¦—à§‡à¦›à§‡à¥¤<br><br>à¦¬à¦¿à¦¶à§à¦¬à¦¬à§à¦¯à¦¾à¦ªà¦¿ à¦¸à¦¬à¦¾à¦‡ à¦šà§‡à¦·à§à¦Ÿà¦¾ à¦•à¦°à§‡ à¦ à¦¬à¦¿à¦ªà¦°à§à¦¯à¦¾à¦¯à¦¼ à¦•à¦¾à¦Ÿà¦¿à¦¯à¦¼à§‡ à¦‰à¦ à¦¾à¦° à¦œà¦¨à§à¦¯à¥¤ à¦à¦‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à¦Ÿà¦¿ à§¨à§¬à¦¶à§‡ à¦à¦ªà§à¦°à¦¿à¦², à§¨à§¬à¦¶à§‡ à¦œà§à¦¨ à¦“ à¦ªà§à¦°à¦¤à¦¿ à¦®à¦¾à¦¸à§‡à¦° à§¨à§¬ à¦¤à¦¾à¦°à¦¿à¦–à§‡ à¦†à¦•à§à¦°à¦®à¦£ à¦•à¦°à¦¤à§‡ à¦¦à§‡à¦–à¦¾ à¦¯à¦¾à¦¯à¦¼à¥¤ à¦à¦‡ à¦­à¦¾à¦‡à¦°à¦¾à¦¸à§‡à¦° à¦†à¦•à§à¦°à¦¾à¦®à¦£ à¦¥à§‡à¦•à§‡ à¦°à¦•à§à¦·à¦¾ à¦ªà¦¾à¦“à¦¯à¦¼à¦¾à¦° à¦œà¦¨à§à¦¯ à¦à¦–à¦¨à¦‡ à¦¸à¦°à§à¦¤à¦• à¦¥à¦¾à¦•à§à¦¨à¥¤</p>', 1, 1, 'Public', '2018-12-06 18:26:17', '2018-12-06 18:26:46'),
(34, 8, 'Basic Grammer', '<h2>Basic English Grammar Rules</h2><p>Some of the most basic and important English grammar rules relate directly to&nbsp;<a href=\"http://grammar.yourdictionary.com/sentences/different-parts-sentence.html\">sentence</a> structure. These rules specify that:</p><ul><li>A singular subject needs a singular predicate.</li><li>A sentence needs to express a complete thought.</li></ul><p>Another term for a sentence is an independent clause:</p><ul><li>Clauses, like any sentence, have a subject and predicate too. If a group of words does not have a subject and predicate, it is a phrase.</li><li>If a clause can stand alone and make a complete thought, then it is independent and can be called a sentence.</li><li>If clauses do not express a complete thought, they are called dependent clauses. An example of a dependent clause, which is not a sentence, is &quot;when I finish my work.&quot; A dependent clause needs an independent clause to make it whole.</li></ul>', 2, 0, 'Public', '2018-12-10 09:01:45', '2018-12-10 09:01:45'),
(36, 9, 'Basic Grammers rule', '<h2>Basic English Grammar Rules</h2><p>Some of the most basic and important English grammar rules relate directly to <a href=\"http://grammar.yourdictionary.com/sentences/different-parts-sentence.html\">sentence</a> structure. These rules specify that:</p><ul><li>A singular subject needs a singular predicate.</li><li>A sentence needs to express a complete thought.</li></ul><p>Another term for a sentence is an independent clause:</p><ul><li>Clauses, like any sentence, have a subject and predicate too. If a group of words does not have a subject and predicate, it is a phrase.</li><li>If a clause can stand alone and make a complete thought, then it is independent and can be called a sentence.</li><li>If clauses do not express a complete thought, they are called dependent clauses. An example of a dependent clause, which is not a sentence, is &quot;when I finish my work.&quot; A dependent clause needs an independent clause to make it whole.</li></ul>', 2, 0, 'Public', '2018-12-10 09:25:14', '2018-12-10 09:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `preparation_sub`
--

CREATE TABLE `preparation_sub` (
  `id` int(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `created_by` int(250) NOT NULL,
  `action` varchar(20) NOT NULL DEFAULT 'Public',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preparation_sub`
--

INSERT INTO `preparation_sub` (`id`, `subject`, `created_by`, `action`, `created_at`, `updated_at`) VALUES
(1, 'à¦†à¦‡à¦¸à¦¿à¦Ÿà¦¿', 1, 'Public', '2018-11-28 08:05:33', '2018-12-06 18:40:49'),
(2, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶ à¦¬à¦¿à¦·à¦¯à¦¼à¦¾à¦¬à¦²à§€', 1, 'Public', '2018-11-28 09:03:56', '2018-12-06 17:09:04'),
(3, 'à¦†à¦°à§à¦¨à§à¦¤à¦œà¦¾à¦¤à¦¿à¦• à¦¬à¦¿à¦·à¦¯à¦¼à¦¾à¦¬à¦²à§€', 1, 'Public', '2018-11-28 09:08:25', '2018-12-06 17:09:06'),
(6, 'à¦¬à¦¾à¦‚à¦²à¦¾ à¦¬à§à¦¯à¦¾à¦•à¦°à¦£', 1, 'Public', '2018-11-28 15:56:00', '2018-12-10 08:43:24'),
(7, 'Math', 2, 'Public', '2018-12-10 08:44:00', '2018-12-10 08:44:00'),
(9, 'English', 2, 'Public', '2018-12-10 09:22:20', '2018-12-10 09:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `ref_person_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `organization_name` varchar(250) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `land_phone` varchar(20) NOT NULL,
  `ref_email` varchar(250) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'user_data',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `js_id`, `ref_person_name`, `designation`, `organization_name`, `mobile`, `land_phone`, `ref_email`, `relationship`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'Shah Md Tanvir Siddiquee', 'Senior Lecturer', 'Daffodil International University ', '01712560297', '', 'tanvir.cse@diu.edu.bd', 'Academic', 'user_data', '2018-12-05 16:58:19', '2018-12-05 16:58:19'),
(2, 8, 'Ms. Subhenur Latif', 'Assistant Professor   ', 'Daffodil International University ', '01703600895', '', 'snlatif@daffodilvarsity.edu.bd', 'Academic', 'user_data', '2018-12-05 16:59:38', '2018-12-05 16:59:38'),
(3, 2, ' Shah Md Tanvir Siddiquee', 'Senior Lecturer  ', 'Daffodil International University', '01712560297', '', 'tanvir.cse@diu.edu.bd', 'Academic', 'user_data', '2018-12-08 06:14:13', '2018-12-08 06:14:13'),
(4, 1, '', '', '', '', '', '', '', 'user_existence', '2018-12-09 07:15:52', '2018-12-09 07:15:52'),
(5, 13, '', '', '', '', '', '', '', 'user_existence', '2018-12-09 07:54:23', '2018-12-09 07:54:23'),
(6, 2, 'Md. Tarek Habib', 'Assistant Professor  ', 'Daffodil International University', '01709076951', '', 'tarek.cse@diu.edu.bd', 'Academic', 'user_data', '2019-01-07 02:32:10', '2019-01-07 02:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `resume_visited`
--

CREATE TABLE `resume_visited` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `em_id` int(250) NOT NULL,
  `visit_count` int(250) NOT NULL,
  `first_visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resume_visited`
--

INSERT INTO `resume_visited` (`id`, `js_id`, `em_id`, `visit_count`, `first_visited_at`, `last_visited_at`) VALUES
(1, 1, 1, 50, '2018-10-18 22:03:36', '2018-12-09 07:58:32'),
(2, 2, 1, 190, '2018-10-18 22:03:40', '2018-12-09 07:34:43'),
(4, 2, 2, 6, '2018-10-19 09:49:09', '2018-12-10 09:17:26'),
(6, 3, 1, 14, '2018-10-22 17:02:33', '2018-10-26 20:00:10'),
(7, 4, 1, 2, '2018-10-23 19:12:15', '2018-11-19 07:21:06'),
(8, 7, 1, 1, '2018-11-19 07:19:47', '2018-11-19 07:19:47'),
(9, 8, 2, 10, '2018-12-07 05:41:46', '2018-12-10 08:31:28'),
(10, 13, 1, 1, '2018-12-09 07:57:39', '2018-12-09 07:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `saved_job`
--

CREATE TABLE `saved_job` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `post_id` int(250) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saved_job`
--

INSERT INTO `saved_job` (`id`, `js_id`, `post_id`, `saved_at`) VALUES
(1, 2, 20, '2018-12-01 14:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `selected_applied_applicants`
--

CREATE TABLE `selected_applied_applicants` (
  `id` int(250) NOT NULL,
  `em_id` int(250) NOT NULL,
  `post_id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `selected_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selected_applied_applicants`
--

INSERT INTO `selected_applied_applicants` (`id`, `em_id`, `post_id`, `js_id`, `selected_at`, `updated_at`) VALUES
(89, 1, 8, 2, '2018-11-07 12:02:42', '2018-11-07 12:02:42'),
(90, 1, 9, 1, '2018-11-24 16:16:57', '2018-11-24 16:16:57'),
(184, 1, 15, 2, '2018-12-10 07:58:44', '2018-12-10 07:58:44'),
(190, 2, 22, 2, '2018-12-10 09:17:30', '2018-12-10 09:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `js_id` int(250) NOT NULL,
  `specialized_skills` varchar(1000) NOT NULL,
  `extracurricular_activities` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`js_id`, `specialized_skills`, `extracurricular_activities`, `created_at`, `updated_at`) VALUES
(1, 'php', '', '2018-10-23 16:39:29', '2018-10-25 07:16:59'),
(2, 'C,Java OOP (Basic),PHP OOP (Advance),Computer Algorithms (Basic),Computer Networks (Basic),Microsoft Office,Embedded system using arduino,HTML5,CSS3,Bootstrap,Material bootstrap wizard,Material design for bootstrap),Materialdesignicons,FontAwesome,IcoMoon,JavaScript,AJAX,JSON,JWT Token,Jquery.js,Jquery toast.js,Datatables.js,Animate.js,Dropify.js,Toast Notification Notify.js,Datepicker.js,BootstrapValidator.js,Selectize.js,Select2.js,Quill.js,Froala.js,TinyMce.js,Vue.js,Vuetify.js,Vue-Snotify.js,iziToast.js,VeeValidate.js,RESTful api,Laravel,Database Management,Full Stack Web Development', '', '2018-10-23 16:39:29', '2019-04-27 05:17:08'),
(3, 'php', '', '2018-10-23 16:39:29', '2018-10-25 07:16:50'),
(4, 'php', '', '2018-10-23 17:17:54', '2018-10-25 07:16:40'),
(5, '', '', '2018-10-27 10:34:54', '2018-10-27 10:34:54'),
(7, '', '', '2018-10-27 11:17:56', '2018-10-27 11:17:56'),
(8, 'Webdevelopment,Database management,IT support,Oracle,android app', 'Member of DIU CPC Club. \r\nClass Representative of school,college and varsity. ', '2018-12-05 16:35:24', '2018-12-05 16:47:22'),
(9, '', '', '2018-12-08 06:37:47', '2018-12-08 06:37:47'),
(11, '', '', '2018-12-08 15:52:14', '2018-12-08 15:52:14'),
(12, '', '', '2018-12-09 05:02:12', '2018-12-09 05:02:12'),
(13, '', '', '2018-12-09 07:54:22', '2018-12-09 07:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `targeted_job`
--

CREATE TABLE `targeted_job` (
  `js_id` int(250) NOT NULL,
  `keywords` varchar(2000) NOT NULL,
  `job_categories` varchar(1000) NOT NULL,
  `job_location` varchar(1000) NOT NULL,
  `business` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `targeted_job`
--

INSERT INTO `targeted_job` (`js_id`, `keywords`, `job_categories`, `job_location`, `business`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', '2018-10-23 16:40:10', '2018-10-23 16:40:10'),
(2, 'PHP,cse', 'Education / Training, IT & Telecommunication', 'Bogra, Dhaka, Joypurhat', 'Engineering Firm, Govt. Organizations, Information Technology (IT), IT-Hardware, IT-Networking/ISP, IT-Software, Telecommunication', '2018-10-23 16:40:10', '2019-04-17 13:46:49'),
(3, '', '', '', '', '2018-10-23 16:40:10', '2018-10-23 16:40:10'),
(4, '', '', '', '', '2018-10-23 17:17:54', '2018-10-23 17:17:54'),
(5, '', '', '', '', '2018-10-27 10:34:54', '2018-10-27 10:34:54'),
(7, '', '', '', '', '2018-10-27 11:17:56', '2018-10-27 11:17:56'),
(8, 'CSE,Web development,database management,network engineering,IT', 'Bank / Non-Bank Fin. Institution, Education / Training, IT & Telecommunication, Security / Support Service, Design / Creative', 'Sirajgonj, Dhaka, Rajshahi, Bogra, Sylhet', 'Engineering Firm, IT-Hardware, IT-Software, Telecommunication, IT-Networking/ISP', '2018-12-05 16:35:24', '2018-12-05 16:45:27'),
(9, '', '', '', '', '2018-12-08 06:37:47', '2018-12-08 06:37:47'),
(11, '', '', '', '', '2018-12-08 15:52:15', '2018-12-08 15:52:15'),
(12, '', '', '', '', '2018-12-09 05:02:12', '2018-12-09 05:02:12'),
(13, '', '', '', '', '2018-12-09 07:54:22', '2018-12-09 07:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `training_workshop`
--

CREATE TABLE `training_workshop` (
  `id` int(250) NOT NULL,
  `js_id` int(250) NOT NULL,
  `training_type` varchar(250) NOT NULL,
  `training_title` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `training_duration` varchar(10) NOT NULL,
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `certification` varchar(10) NOT NULL,
  `training_description` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'user_data',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `training_workshop`
--

INSERT INTO `training_workshop` (`id`, `js_id`, `training_type`, `training_title`, `institution`, `training_duration`, `start_date`, `end_date`, `certification`, `training_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'IT Training', 'Web Development', 'US Software Ltd (LICT Bangladesh)', '360', '2017-07-01', '2017-12-31', 'Yes', '', 'user_data', '2018-10-25 07:07:09', '2018-12-03 08:36:43'),
(2, 8, 'Web development', 'Web development', 'us software limited', '6', '2018-01-04', '2018-07-31', 'Yes', 'training on web designing and web development.  html,css,php,javascript content was mandatory .', 'user_data', '2018-12-05 16:55:19', '2018-12-05 16:55:19'),
(5, 1, '', '', '', '', '0000-00-00', '0000-00-00', '', '', 'user_existence', '2018-12-09 07:20:04', '2018-12-09 07:20:04'),
(6, 13, '', '', '', '', '0000-00-00', '0000-00-00', '', '', 'user_existence', '2018-12-09 07:54:23', '2018-12-09 07:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(100) NOT NULL,
  `js_id` int(250) NOT NULL,
  `organization_name` varchar(250) NOT NULL,
  `organization_website` varchar(250) NOT NULL,
  `position_title` varchar(100) NOT NULL,
  `position_level` varchar(100) NOT NULL,
  `type_of_employment` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `join_date` varchar(10) NOT NULL,
  `resign_date` varchar(50) NOT NULL,
  `years_of_exp` varchar(10) NOT NULL,
  `responsibility_and_achivement` varchar(500) NOT NULL,
  `ref_name` varchar(100) NOT NULL,
  `ref_position_dept` varchar(100) NOT NULL,
  `ref_contact_no` varchar(20) NOT NULL,
  `ref_email` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'user_data',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated-at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `js_id`, `organization_name`, `organization_website`, `position_title`, `position_level`, `type_of_employment`, `department`, `join_date`, `resign_date`, `years_of_exp`, `responsibility_and_achivement`, `ref_name`, `ref_position_dept`, `ref_contact_no`, `ref_email`, `status`, `created_at`, `updated-at`) VALUES
(1, 2, 'Daffodil International University', 'https://www.daffodilvarsity.edu.bd/', 'Student Prefect', 'Others', 'Part Time', 'Computer Science & ENgineering', '2017-05-01', '2018-08-31', '1.4', '', '', '', '', '', 'user_data', '2018-10-25 07:05:52', '2018-12-03 08:24:58'),
(2, 8, 'Daffodil International University ', 'https://www.daffodilvarsity.edu.bd/', 'student prefetch', 'Entry Level', 'Part Time', 'computer science and engineering', '2018-01-02', '2018-12-18', '0.21', '', '', '', '', '', 'user_data', '2018-12-05 17:15:24', '2018-12-05 17:15:24'),
(3, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'user_existence', '2018-12-09 07:13:11', '2018-12-09 07:13:11'),
(4, 13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'user_existence', '2018-12-09 07:54:22', '2018-12-09 07:54:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `career_info`
--
ALTER TABLE `career_info`
  ADD PRIMARY KEY (`js_id`),
  ADD UNIQUE KEY `js_id` (`js_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `circular_post`
--
ALTER TABLE `circular_post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `id` (`post_id`);

--
-- Indexes for table `circular_visited`
--
ALTER TABLE `circular_visited`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cover_letter_info`
--
ALTER TABLE `cover_letter_info`
  ADD PRIMARY KEY (`js_id`),
  ADD UNIQUE KEY `js_id` (`js_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `data_business_category`
--
ALTER TABLE `data_business_category`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `data_degree_level`
--
ALTER TABLE `data_degree_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `deegre_level` (`degree_level`);

--
-- Indexes for table `data_job_category`
--
ALTER TABLE `data_job_category`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `data_job_location`
--
ALTER TABLE `data_job_location`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `location_name` (`location_name`);

--
-- Indexes for table `data_organization_type`
--
ALTER TABLE `data_organization_type`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `organization_type` (`organization_type`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `em_contact_person`
--
ALTER TABLE `em_contact_person`
  ADD PRIMARY KEY (`em_id`),
  ADD UNIQUE KEY `em_id` (`em_id`);

--
-- Indexes for table `em_following_js`
--
ALTER TABLE `em_following_js`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `js_following_em`
--
ALTER TABLE `js_following_em`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lesson_comment`
--
ALTER TABLE `lesson_comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `movie_info`
--
ALTER TABLE `movie_info`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `preparation_lesson`
--
ALTER TABLE `preparation_lesson`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lesson_id` (`id`),
  ADD UNIQUE KEY `lesson_title` (`lesson_title`);

--
-- Indexes for table `preparation_sub`
--
ALTER TABLE `preparation_sub`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `resume_visited`
--
ALTER TABLE `resume_visited`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `saved_job`
--
ALTER TABLE `saved_job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `selected_applied_applicants`
--
ALTER TABLE `selected_applied_applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`js_id`) USING BTREE,
  ADD UNIQUE KEY `js_id` (`js_id`);

--
-- Indexes for table `targeted_job`
--
ALTER TABLE `targeted_job`
  ADD PRIMARY KEY (`js_id`),
  ADD UNIQUE KEY `js_id` (`js_id`);

--
-- Indexes for table `training_workshop`
--
ALTER TABLE `training_workshop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_job`
--
ALTER TABLE `applied_job`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `circular_post`
--
ALTER TABLE `circular_post`
  MODIFY `post_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `circular_visited`
--
ALTER TABLE `circular_visited`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_business_category`
--
ALTER TABLE `data_business_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `data_degree_level`
--
ALTER TABLE `data_degree_level`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_job_category`
--
ALTER TABLE `data_job_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `data_job_location`
--
ALTER TABLE `data_job_location`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `data_organization_type`
--
ALTER TABLE `data_organization_type`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `em_following_js`
--
ALTER TABLE `em_following_js`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `js_following_em`
--
ALTER TABLE `js_following_em`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lesson_comment`
--
ALTER TABLE `lesson_comment`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movie_info`
--
ALTER TABLE `movie_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `preparation_lesson`
--
ALTER TABLE `preparation_lesson`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `preparation_sub`
--
ALTER TABLE `preparation_sub`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resume_visited`
--
ALTER TABLE `resume_visited`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `saved_job`
--
ALTER TABLE `saved_job`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `selected_applied_applicants`
--
ALTER TABLE `selected_applied_applicants`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `training_workshop`
--
ALTER TABLE `training_workshop`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
