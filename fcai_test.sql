-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 02:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcai_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincontrol`
--

CREATE TABLE `admincontrol` (
  `evaluationStatus` enum('1','0') NOT NULL DEFAULT '0',
  `GpFormStatus` enum('1','0') NOT NULL DEFAULT '0',
  `registerationStatus` enum('1','0') NOT NULL DEFAULT '0',
  `programSelectionStatus` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admincontrol`
--

INSERT INTO `admincontrol` (`evaluationStatus`, `GpFormStatus`, `registerationStatus`, `programSelectionStatus`) VALUES
('1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `announcemets`
--

CREATE TABLE `announcemets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `announcmentTitle` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isOpened` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcemets`
--

INSERT INTO `announcemets` (`id`, `created_at`, `updated_at`, `content`, `announcmentTitle`, `isOpened`) VALUES
(23, '6/21/2023, 11:02:06 PM', NULL, 'Courses evaluation have been opened follow this link to evaluate your courses', 'Courses evaluation have been opened', '1'),
(29, '6/23/2023, 6:07:42 PM', NULL, 'Gp regestered have been opened follow this link to register', 'Gp regestered have been opened', '1'),
(39, '6/23/2023, 6:10:42 PM', NULL, 'The midterm exams for the Fall Semester 2022-2023 will take place during the period from Saturday November 19, 2022 till Thursday November 24, 2022, as per the attached schedules.', 'Midterm Schedule for First Term ', '1'),
(40, '6/23/2023, 6:07:42 PM', NULL, 'Each student must register in the groups specified of his/her majour group, otherwise their registration will be deleted\r\nFor example, the student who want to attend in Bio G1, then he/she must register in only groups B1, B2, or B3', 'For Special programs', '1'),
(54, '7/7/2023, 1:23:10 PM', NULL, 'Deadline is 10/7/2023', 'Evaluation opened', '1'),
(57, '7/7/2023, 7:33:36 PM', NULL, 'find the grades in your courses', 'grades have been uploaded', '1'),
(58, '7/7/2023, 7:43:46 PM', NULL, 'the lecture will be at 9AM', 'according to lecture tommorrow', '1'),
(70, '7/8/2023, 2:29:47 PM', NULL, 'final final dinal', 'test final isa', '0');

-- --------------------------------------------------------

--
-- Table structure for table `blockeduserchat`
--

CREATE TABLE `blockeduserchat` (
  `user1` bigint(20) UNSIGNED NOT NULL,
  `user2` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blockeduserchat`
--

INSERT INTO `blockeduserchat` (`user1`, `user2`) VALUES
(7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(100) NOT NULL,
  `courseName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `departmentCode` varchar(100) NOT NULL,
  `Course_Code` varchar(60) NOT NULL,
  `Level` enum('First Level','Second Level','Third Level','Fourth Level') NOT NULL,
  `Semester` enum('First','Second','Summer') NOT NULL,
  `type` enum('mandatory','optional') NOT NULL,
  `slotday1` enum('Sunday','Saturday','Friday','Thursday','Wednesday','Tuesday','Monday') DEFAULT NULL,
  `startTime1` time DEFAULT NULL,
  `endTime1` time DEFAULT NULL,
  `creditHours` int(11) NOT NULL DEFAULT 3,
  `slotday2` enum('Sunday','Saturday','Friday','Thursday','Wednesday','Tuesday','Monday') DEFAULT 'Sunday',
  `startTime2` time DEFAULT '08:00:00',
  `endTime2` time DEFAULT '09:30:00',
  `slotPlace1` text DEFAULT '\'\\\'مدرج ابراهيم فرج\\\'\'',
  `slotPlace2` text DEFAULT '\'\\\'مدرج ابراهيم فرج\\\'\'',
  `professor1` varchar(100) DEFAULT NULL,
  `professor2` varchar(100) DEFAULT NULL,
  `Num_of_groups` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `departmentCode`, `Course_Code`, `Level`, `Semester`, `type`, `slotday1`, `startTime1`, `endTime1`, `creditHours`, `slotday2`, `startTime2`, `endTime2`, `slotPlace1`, `slotPlace2`, `professor1`, `professor2`, `Num_of_groups`) VALUES
('1', 'database1', 'IS', 'IS437', 'Second Level', 'First', 'mandatory', NULL, NULL, NULL, 0, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', 'ihelal', NULL, NULL),
('10', 'selected Topices in Data Base', 'IS', 'IS135', 'Fourth Level', 'Second', 'optional', 'Sunday', '08:00:00', '09:30:00', 3, 'Tuesday', '09:30:00', '11:00:00', 'مدرج 10', 'مدرج 9', 'aymank', NULL, 4),
('11', 'TOM', 'AI', 'AI123', 'Third Level', 'Second', 'mandatory', 'Thursday', '08:00:00', '09:30:00', 3, 'Wednesday', '04:00:00', '17:30:00', 'مدرج 10', 'مدرج 9', 'ihelal', NULL, 3),
('12', 'ML', 'AI', 'AI123', 'Third Level', 'Second', 'mandatory', 'Thursday', '08:00:00', '09:30:00', 3, 'Wednesday', '04:00:00', '17:30:00', 'مدرج 10', 'مدرج 9', 'ihelal', NULL, 3),
('13', 'Data Mining', 'IS', 'IS123', 'Third Level', 'Second', 'mandatory', 'Thursday', '08:00:00', '09:30:00', 3, 'Wednesday', '04:00:00', NULL, 'مدرج 10', 'مدرج 9', 'ihelal', NULL, 3),
('2', 'Gis', 'IS', 'IS438', 'Fourth Level', 'First', 'optional', NULL, NULL, NULL, 0, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', 'ihelal', NULL, NULL),
('3', 'computer science', 'CS', 'CS1234', 'First Level', 'First', 'mandatory', NULL, NULL, NULL, 0, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', 'aymank', NULL, NULL),
('4', 'programming1', 'CS', 'cs345', 'First Level', 'Second', 'mandatory', NULL, NULL, NULL, 3, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', 'ihelal', NULL, NULL),
('5', 'oop', 'CS', 'cs567', 'Second Level', 'First', 'mandatory', NULL, NULL, NULL, 3, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', 'aymank', NULL, NULL),
('6', 'data structure', 'CS', 'cs876', 'Second Level', 'Second', 'optional', 'Tuesday', '08:00:00', '09:30:00', 3, 'Wednesday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', 'ihelal', NULL, NULL),
('7', 'software1', 'CS', 'cs176', 'Second Level', 'Second', 'mandatory', 'Sunday', '04:00:00', '05:30:00', 3, 'Monday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', 'مدرج 7', 'ihelal', NULL, NULL),
('8', 'software2', 'CS', 'cs276', 'Third Level', 'First', 'mandatory', NULL, NULL, NULL, 0, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', 'ihelal', NULL, NULL),
('9', 'Data Base 1', 'IS', '', '', '', '', NULL, NULL, NULL, 3, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\'', NULL, NULL, NULL),
('IT120', 'math2', 'IT', 'IT120', 'Second Level', 'Second', 'mandatory', 'Saturday', '08:00:00', '09:30:00', 3, 'Saturday', '09:30:00', '11:00:00', 'مدرج 7', 'مدرج 7', 'aymank', NULL, 1),
('it567', 'Electronics', 'IT', 'it567', 'Second Level', 'Second', 'mandatory', 'Sunday', '08:00:00', '09:30:00', 3, 'Wednesday', '09:00:00', '10:30:00', 'hall1', 'hall2', 'ihelal', NULL, 3),
('IT657', 'math', 'IT', 'IT657', 'Second Level', 'Second', 'mandatory', 'Sunday', '08:00:00', '09:30:00', 3, 'Tuesday', '08:00:00', '09:30:00', 'مدرج 7', 'hall 7', 'aymank', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_reigesters`
--

CREATE TABLE `course_reigesters` (
  `groupId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `courseid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `studentId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grade` enum('F','D','D+','C','C+','B','B+','A','A+') DEFAULT NULL,
  `creditHours` int(11) NOT NULL,
  `TermWork` int(11) DEFAULT NULL,
  `ExamWork` int(11) DEFAULT NULL,
  `Result` int(11) DEFAULT NULL,
  `professorId1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `professorId2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `TAId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isEvaluaed` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_reigesters`
--

INSERT INTO `course_reigesters` (`groupId`, `courseid`, `studentId`, `grade`, `creditHours`, `TermWork`, `ExamWork`, `Result`, `professorId1`, `professorId2`, `Year`, `TAId`, `isEvaluaed`) VALUES
('All', '6', '20190022', 'C+', 3, 40, 30, 70, 'ihelal', NULL, '2023', 'Ahmed', '1'),
('All', '7', '20190022', 'C+', 3, 30, 40, 70, 'ihelal', NULL, '2023', 'Ahmed', '1'),
('S1', '4', '20190267', 'A+', 3, 40, 50, 90, 'ihelal', NULL, '2019', NULL, '0'),
('S1', '7', '20190084', 'D+', 3, 20, 40, 60, 'ihelal', NULL, '2019', 'damr', '0'),
('S1', '7', '20190153', 'C', 3, 40, 25, 65, 'ihelal', 'aymank', '2023', 'Ahmed', '0'),
('S2', '4', '20190022', 'B', 3, 30, 49, 79, 'ihelal', NULL, '2019', NULL, '0'),
('S2', '5', '20190022', 'F', 3, 20, 20, 40, 'aymank', NULL, '2019', 'mramdan', '0'),
('S2', '7', '20190233', 'B+', 3, 40, 40, 80, 'ihelal', NULL, '2019', NULL, '0'),
('S2', '7', '20190234', 'A+', 3, 30, 60, 90, 'ihelal', NULL, '2023', NULL, '0'),
('S2', '7', '20190619', 'D+', 3, 40, 20, 60, 'ihelal', NULL, '2019', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentCode` varchar(100) NOT NULL,
  `departmentName` varchar(100) NOT NULL,
  `departmentHead` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentCode`, `departmentName`, `departmentHead`) VALUES
('AI', 'Artificial Intelligence', 'asmaa'),
('CS', 'Computer Science', 'Abeer'),
('DS', 'decision support', 'ola'),
('General', 'General', 'Reda'),
('IS', 'Information Systems', 'Nour'),
('IT', 'Information Technology', 'ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contentRate` varchar(255) NOT NULL,
  `isRepeated` varchar(255) NOT NULL,
  `isClear` varchar(255) NOT NULL,
  `relevantToObjectives` varchar(255) NOT NULL,
  `preparetionForFutureCourses` varchar(255) NOT NULL,
  `courseID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `engagedStudents` varchar(255) NOT NULL,
  `conveiedMaterial` varchar(255) NOT NULL,
  `isClearAgenda` varchar(255) NOT NULL,
  `teacherEffectiveness` varchar(255) NOT NULL,
  `communicationSkills` varchar(255) NOT NULL,
  `professorId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TAengagedStudents` varchar(255) NOT NULL,
  `TAconveiedMaterial` varchar(255) NOT NULL,
  `TAisClearAgenda` varchar(255) NOT NULL,
  `TAteacherEffectiveness` varchar(255) NOT NULL,
  `TAcommunicationSkills` varchar(255) NOT NULL,
  `TAId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `created_at`, `updated_at`, `contentRate`, `isRepeated`, `isClear`, `relevantToObjectives`, `preparetionForFutureCourses`, `courseID`, `engagedStudents`, `conveiedMaterial`, `isClearAgenda`, `teacherEffectiveness`, `communicationSkills`, `professorId`, `TAengagedStudents`, `TAconveiedMaterial`, `TAisClearAgenda`, `TAteacherEffectiveness`, `TAcommunicationSkills`, `TAId`, `Year`) VALUES
(7, NULL, NULL, '5', '2', '1', '4', '4', '7', '3', '3', '1', '3', '5', 'ihelal', '3', '3', '1', '3', '5', 'damr', '2023'),
(8, NULL, NULL, '4', '2', '1', '1', '3', '7', '2', '3', '2', '3', '2', 'ihelal', '2', '3', '2', '3', '2', 'damr', '2023'),
(9, NULL, NULL, '3', '2', '2', '2', '3', '7', '3', '1', '1', '5', '1', 'ihelal', '3', '1', '1', '5', '1', 'damr', '2023'),
(10, NULL, NULL, '1', '1', '1', '1', '1', '7', '1', '1', '1', '1', '1', 'ihelal', '1', '1', '1', '1', '1', 'damr', '2023'),
(11, NULL, NULL, '1', '1', '1', '1', '1', '7', '1', '1', '1', '1', '1', 'aymank', '1', '1', '1', '1', '1', 'damr', '2023'),
(12, NULL, NULL, '1', '1', '1', '1', '1', '5', '1', '1', '1', '1', '1', 'aymank', '5', '5', '5', '5', '5', 'mramdan', '2023'),
(13, NULL, NULL, '1', '1', '1', '1', '1', '7', '3', '3', '3', '3', '3', 'ihelal', '1', '5', '4', '2', '3', 'Ahmed', '2023'),
(14, NULL, NULL, '1', '1', '', '1', '1', '7', '3', '5', '5', '3', '4', 'ihelal', '1', '5', '4', '2', '3', 'Ahmed', '2019'),
(15, NULL, NULL, '3', '2', '1', '3', '3', '7', '3', '5', '5', '5', '5', 'ihelal', '5', '5', '5', '5', '5', 'damr', '2023'),
(16, NULL, NULL, '3', '2', '1', '3', '3', '7', '4', '4', '4', '4', '4', 'aymank', '5', '5', '5', '5', '5', 'damr', '2023'),
(17, NULL, NULL, '5', '5', '5', '5', '5', '6', '5', '5', '5', '5', '5', 'ihelal', '5', '4', '4', '4', '4', 'Ahmed', '2023'),
(18, NULL, NULL, '5', '5', '5', '5', '5', '7', '4', '5', '5', '4', '5', 'ihelal', '5', '5', '5', '5', '5', 'Ahmed', '2023'),
(19, NULL, NULL, '3', '5', '5', '5', '5', '6', '4', '5', '5', '4', '5', 'ihelal', '3', '5', '5', '4', '4', 'Ahmed', '2023'),
(20, NULL, NULL, '5', '5', '5', '5', '5', '7', '4', '5', '5', '4', '5', 'ihelal', '3', '5', '5', '4', '5', 'Ahmed', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `exam_halls`
--

CREATE TABLE `exam_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Student_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Subject_code` varchar(255) NOT NULL,
  `Subject_name` varchar(255) NOT NULL,
  `Exam_Hall` varchar(255) NOT NULL,
  `Student_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_halls`
--

INSERT INTO `exam_halls` (`id`, `Student_id`, `Subject_code`, `Subject_name`, `Exam_Hall`, `Student_number`, `created_at`, `updated_at`) VALUES
(1, '20190022', 'IS437', 'software1', 'صاله أ', 23, NULL, NULL),
(2, '20190267', 'IS438', 'GIS', 'صاله ج', 24, NULL, NULL),
(3, '20190267', 'IS437', 'database', 'صاله ب', 40, NULL, NULL),
(4, '20190022', 'cs876', 'data structure', 'مدرج 7', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gp`
--

CREATE TABLE `gp` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idea` varchar(255) NOT NULL,
  `requirements` text NOT NULL,
  `member1` varchar(100) NOT NULL,
  `member2` varchar(100) NOT NULL,
  `member3` varchar(100) NOT NULL,
  `member4` varchar(100) NOT NULL,
  `member5` varchar(100) NOT NULL,
  `professor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TA` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Prof_status` enum('Accepted','Rejected','Pending') NOT NULL DEFAULT 'Pending',
  `id` int(11) NOT NULL,
  `Ta_status` enum('Accepted','Rejected','Pending') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gp`
--

INSERT INTO `gp` (`created_at`, `updated_at`, `idea`, `requirements`, `member1`, `member2`, `member3`, `member4`, `member5`, `professor`, `TA`, `Prof_status`, `id`, `Ta_status`) VALUES
(NULL, NULL, 'test', 'test', '20190022', '20190230', '20190233', '20190234', '20190619', 'ihelal', 'damr', 'Accepted', 6, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `groupNumber` varchar(50) NOT NULL,
  `TAId` varchar(100) NOT NULL,
  `courseId` varchar(100) NOT NULL,
  `slotDay` enum('Sunday','Saturday','Friday','Thursday','Wednesday','Tuesday','Monday') NOT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `slotPlace` text NOT NULL DEFAULT 'lab1',
  `groupCount` int(11) NOT NULL DEFAULT 25,
  `Year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupNumber`, `TAId`, `courseId`, `slotDay`, `startTime`, `endTime`, `slotPlace`, `groupCount`, `Year`) VALUES
('All', 'Ahmed', '6', 'Sunday', '08:00:00', '09:30:00', 'lab1', 14, '2019'),
('All', 'damr', '7', 'Saturday', '12:45:00', '02:30:00', 'lab1', 17, '2023'),
('S01', 'Ahmed', 'IT120', 'Sunday', '08:00:00', '09:30:00', 'lab 6', 25, '2023'),
('S01', 'Ahmed', 'IT657', 'Sunday', '09:30:00', '11:00:00', 'lab7', 25, '2023'),
('s1', 'Ahmed', '13', 'Saturday', '01:59:00', '02:59:00', 'lab8', 25, '2023'),
('S1', 'Ahmed', '6', 'Sunday', '09:30:00', '11:00:00', 'lab1', 25, '2023'),
('S1', 'damr', '7', 'Saturday', '02:30:00', '04:00:00', 'lab1', 22, '2023'),
('S2', 'mramdan', '5', 'Thursday', '08:00:00', '09:30:00', 'lab7', 25, '2023'),
('S2', 'Ahmed', '7', 'Sunday', '08:00:00', '09:30:00', 'lab1', 25, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment_path` varchar(255) DEFAULT NULL,
  `seen` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `created_at`, `updated_at`, `attachment_path`, `seen`) VALUES
(174, 7, 3, 'iman to ali', '2023-07-03 06:32:27', '2023-07-03 06:32:27', NULL, '1'),
(176, 12, 3, 'Hi, Ali', '2023-07-03 06:33:08', '2023-07-03 06:33:08', NULL, '1'),
(177, 3, 7, 'ho', '2023-07-03 08:15:14', '2023-07-03 08:15:14', NULL, '1'),
(178, 3, 7, 'hi dr. iman', '2023-07-03 08:34:08', '2023-07-03 08:34:08', NULL, '1'),
(179, 3, 7, 'hi dr', '2023-07-03 08:35:07', '2023-07-03 08:35:07', NULL, '1'),
(180, 3, 7, 'hi', '2023-07-03 08:37:18', '2023-07-03 08:37:18', NULL, '1'),
(181, 3, 7, 'hi', '2023-07-03 08:37:51', '2023-07-03 08:37:51', NULL, '1'),
(182, 3, 10, 'hi dr. Ayman', '2023-07-03 08:40:30', '2023-07-03 08:40:30', NULL, '1'),
(183, 3, 14, 'ali to mohamed', '2023-07-03 08:44:21', '2023-07-03 08:44:21', NULL, '0'),
(184, 7, 3, 'iman to ali', '2023-07-03 09:15:26', '2023-07-03 09:15:26', NULL, '1'),
(185, 7, 3, 'iman to ali', '2023-07-03 09:15:53', '2023-07-03 09:15:53', NULL, '1'),
(186, 10, 3, 'ayman to ali', '2023-07-03 09:19:43', '2023-07-03 09:19:43', NULL, '1'),
(187, 10, 3, 'ayman to ali', '2023-07-03 09:26:19', '2023-07-03 09:26:19', NULL, '1'),
(188, 7, 3, 'hi', '2023-07-03 09:33:42', '2023-07-03 09:33:42', NULL, '1'),
(189, 10, 3, 'hi', '2023-07-03 09:48:52', '2023-07-03 09:48:52', NULL, '1'),
(190, 7, 3, 'hi ali', '2023-07-03 10:29:21', '2023-07-03 10:29:21', NULL, '1'),
(191, 7, 3, 'messages.sql', '2023-07-03 10:34:51', '2023-07-03 10:34:51', 'attachments/messages.sql', '1'),
(192, 10, 3, 'hi', '2023-07-03 10:38:42', '2023-07-03 10:38:42', NULL, '1'),
(193, 10, 3, 'hi', '2023-07-03 10:38:54', '2023-07-03 10:38:54', NULL, '1'),
(194, 14, 3, 'hi', '2023-07-03 10:39:14', '2023-07-03 10:39:14', NULL, '1'),
(195, 3, 12, 'Hi, Eng. Dina', '2023-07-03 10:41:23', '2023-07-03 10:41:23', NULL, '1'),
(196, 3, 7, 'Thanks, Dr', '2023-07-03 11:01:45', '2023-07-03 11:01:45', NULL, '1'),
(197, 7, 3, 'You are welcome', '2023-07-03 11:05:34', '2023-07-03 11:05:34', NULL, '1'),
(198, 7, 3, 'ali', '2023-07-03 11:07:13', '2023-07-03 11:07:13', NULL, '1'),
(199, 3, 12, 'Navicat-Data-Modeler.jpg', '2023-07-03 11:24:10', '2023-07-03 11:24:10', 'attachments/Navicat-Data-Modeler.jpg', '1'),
(200, 7, 15, 'hi gehad', '2023-07-03 16:47:39', '2023-07-03 16:47:39', NULL, '0'),
(201, 7, 3, 'schedule-2020-2-4.pdf', '2023-07-03 17:03:57', '2023-07-03 17:03:57', 'attachments/schedule-2020-2-4.pdf', '1'),
(202, 7, 3, 'hi', '2023-07-04 07:35:19', '2023-07-04 07:35:19', NULL, '1'),
(203, 3, 7, 'hi', '2023-07-04 07:36:38', '2023-07-04 07:36:38', NULL, '1'),
(204, 7, 3, 'hi', '2023-07-05 06:25:36', '2023-07-05 06:25:36', NULL, '1'),
(205, 3, 7, 'Hi, Dr', '2023-07-05 06:51:51', '2023-07-05 06:51:51', NULL, '1'),
(206, 3, 7, 'Hi, Dr', '2023-07-05 06:52:23', '2023-07-05 06:52:23', NULL, '1'),
(207, 3, 7, 'Hi, Dr', '2023-07-05 06:52:36', '2023-07-05 06:52:36', NULL, '1'),
(208, 3, 7, 'Hi, Dr', '2023-07-05 06:52:56', '2023-07-05 06:52:56', NULL, '1'),
(209, 3, 7, 'Hi, Dr', '2023-07-05 06:53:09', '2023-07-05 06:53:09', NULL, '1'),
(210, 3, 7, 'Hi, Dr', '2023-07-05 06:54:05', '2023-07-05 06:54:05', NULL, '1'),
(211, 7, 12, 'hi', '2023-07-05 07:28:37', '2023-07-05 07:28:37', NULL, '1'),
(212, 3, 12, 'Hi Ali', '2023-07-07 06:22:40', '2023-07-07 06:22:40', NULL, '1'),
(213, 3, 12, 'How are you?', '2023-07-07 06:33:53', '2023-07-07 06:33:53', NULL, '1'),
(214, 14, 3, 'hi Ali', '2023-07-07 08:54:43', '2023-07-07 08:54:43', NULL, '0'),
(215, 14, 3, 'send me the GP Documentation', '2023-07-07 08:55:20', '2023-07-07 08:55:20', NULL, '0'),
(216, 3, 10, 'hello', '2023-07-07 09:15:08', '2023-07-07 09:15:08', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_12_114701_create_announcemets_table', 1),
(6, '2023_04_17_115200_create_scheudles_table', 2),
(7, '2023_04_18_181836_create_exam_halls_table', 3),
(8, '2023_04_12_185105_create__office_hour__table', 4),
(9, '2023_04_16_221939_create_password_resets_table', 4),
(10, '2023_04_27_135907_create_users_table', 5),
(11, '2023_04_30_110417_create_prerequisite_cousres_table', 6),
(13, '2023_05_03_141526_create_course_reigesters_table', 8),
(14, '2023_05_09_111853_create_program_perferences_table', 9),
(15, '2023_05_06_162426_create_messages_table', 10),
(16, '2023_04_29_171612_create_gp_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('negma1266@gmail.com', 'GMAZ2qAaERKfhfzhnPjuCn15Ho3RtbldCwoqGJ7b', '2023-04-27 10:05:16'),
('sr5678467@gmail.com', 'ChaM93tbco7PvCAWh40Ps3ajFAgyaxVpF7NlFIHJ', '2023-05-14 05:23:46'),
('negma1266@gmail.com', 'GMAZ2qAaERKfhfzhnPjuCn15Ho3RtbldCwoqGJ7b', '2023-04-27 10:05:16'),
('sr5678467@gmail.com', 'ChaM93tbco7PvCAWh40Ps3ajFAgyaxVpF7NlFIHJ', '2023-05-14 05:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prerequisitecousre`
--

CREATE TABLE `prerequisitecousre` (
  `ID_COURSE` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID_PREREQ_COURSE` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prerequisitecousre`
--

INSERT INTO `prerequisitecousre` (`ID_COURSE`, `ID_PREREQ_COURSE`) VALUES
('4', '3'),
('5', '4'),
('6', '5'),
('7', '1'),
('7', '5'),
('8', '7');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `professorId` varchar(100) NOT NULL,
  `professorName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phoneNumber` varchar(150) NOT NULL,
  `nationalId` varchar(150) NOT NULL,
  `departmentCode` varchar(100) NOT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `courseID` varchar(100) DEFAULT NULL,
  `loginToken` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`professorId`, `professorName`, `email`, `address`, `gender`, `phoneNumber`, `nationalId`, `departmentCode`, `userID`, `courseID`, `loginToken`) VALUES
('aymank', 'Ayman El-Kilany', 'blalblabla', 'dfflghlsd', 'male', '0111345528949', '122349045912094095', 'IS', 10, '9', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODY0MTEyMzUsImV4cCI6MTY4NjQxNDgzNSwibmJmIjoxNjg2NDExMjM1LCJqdGkiOiIxUGR2QXJMR3ltVHY4eFJhIiwic3ViIjoiMTAiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.UIpqAkS8XfEwdV3cztX9Naw3WknyIMmUSK4CMuYZR3Y'),
('ihelal', 'Iman Helal', 'iman@gmail.com', 'Gizaa', 'female', '011134245573', '123456789098753422', 'IS', 7, '7', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODg4MTQzMTEsImV4cCI6MTY4ODgxNzkxMSwibmJmIjoxNjg4ODE0MzExLCJqdGkiOiJucEJtamlhbGE0WXFCN2MxIiwic3ViIjoiNyIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.SFHFi4FUB7ct66rxVGjlLn3nFekr_Q3hBBDVu2ncXJA');

-- --------------------------------------------------------

--
-- Table structure for table `program_perferences`
--

CREATE TABLE `program_perferences` (
  `studentId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference5` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_perferences`
--

INSERT INTO `program_perferences` (`studentId`, `preference1`, `preference2`, `preference3`, `preference4`, `preference5`, `Year`) VALUES
('20190022', 'CS', 'AI', 'IS', 'IT', 'DS', '2023'),
('20190084', 'AI', 'IS', 'DS', 'CS', 'IT', '2023'),
('20190153', 'DS', 'CS', 'AI', 'IT', 'IS', '2023'),
('20190230', 'IS', 'CS', 'AI', 'IT', 'DS', '2023'),
('20190233', 'CS', 'AI', 'IT', 'IS', 'DS', '2023'),
('20190234', 'IS', 'IT', 'CS', 'AI', 'DS', '2023'),
('20190267', 'IS', 'AI', 'CS', 'IT', 'DS', '2023'),
('20190619', 'IT', 'DS', 'IS', 'CS', 'AI', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `scheudles`
--

CREATE TABLE `scheudles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Scheudle_Name` varchar(255) NOT NULL,
  `Link_Value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scheudles`
--

INSERT INTO `scheudles` (`id`, `Scheudle_Name`, `Link_Value`, `created_at`, `updated_at`) VALUES
(1, 'General Schedule.pdf', 'Scheudles\\General Schedule.pdf', NULL, NULL),
(2, 'Sepcial Schedule.pdf', 'Scheudles\\Sepcial Schedule.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` varchar(100) NOT NULL,
  `studentName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `GPA` double NOT NULL,
  `departmentCode` varchar(100) NOT NULL,
  `level` enum('First Level','Second Level','Third Level','Fourth Level') NOT NULL,
  `loginToken` text NOT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `Status` enum('مقيد','غير مقيد') NOT NULL DEFAULT 'مقيد',
  `bylaw` varchar(100) DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `mobile` bigint(11) DEFAULT NULL,
  `Entry_year` int(11) DEFAULT NULL,
  `total_grades` int(11) DEFAULT NULL,
  `first_language` varchar(100) DEFAULT NULL,
  `second_language` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birth_place` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `Compulsory_Hours` int(11) DEFAULT NULL,
  `electrive_hours` int(11) DEFAULT NULL,
  `nationalId` bigint(50) NOT NULL,
  `isBlocked` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentName`, `email`, `address`, `gender`, `GPA`, `departmentCode`, `level`, `loginToken`, `userID`, `Status`, `bylaw`, `phone`, `mobile`, `Entry_year`, `total_grades`, `first_language`, `second_language`, `nationality`, `birthdate`, `birth_place`, `country`, `Compulsory_Hours`, `electrive_hours`, `nationalId`, `isBlocked`) VALUES
('20190022', 'Ali ahmed', 'ali.ahmed@gmail.com', 'Helwan', 'male', 2.1, 'CS', 'Third Level', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODg4MTc5ODgsImV4cCI6MTY4ODgyMTU4OCwibmJmIjoxNjg4ODE3OTg4LCJqdGkiOiJoN3JwTTc2NGhwUWUxc1FlIiwic3ViIjoiMyIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.mgHtGg7InnteFF993nEzkBZyPn4ed-tbMk3_WHX9_oU', 3, 'مقيد', 'general program(2018)', 238444445, 1115565554, 2019, 1500, NULL, NULL, 'egyptian', NULL, 'Giza\r\n', 'egypt', 96, 19, 123456767889, '0'),
('20190084', 'arwa', 'a@gmail.com', '', 'female', 2.2, 'AI', 'Third Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0'),
('20190153', 'Gehad Akram', '', '', 'female', 2.4, 'DS', 'Third Level', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODgyMTg4MjksImV4cCI6MTY4ODIyMjQyOSwibmJmIjoxNjg4MjE4ODI5LCJqdGkiOiJBMDZmVUlqUW1rYW9yTDlJIiwic3ViIjoiMTUiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.v8rgpBVrgvzA2B6wo5VV6_NclRwB2ftjjcVUqa79DKA', 15, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0'),
('20190230', 'sara', 'sara@gmail.com', '', 'female', 3.4, 'IS', 'Third Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0'),
('20190233', 'gehad', 'gehad@gmail.com', '', 'female', 3.3, 'CS', 'Third Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0'),
('20190234', 'shimaa', 'shimaa@gmail.com', '', 'female', 4, 'IT', 'Fourth Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0'),
('20190267', 'Ali Alaa', 'alaa@gmail.com', 'Helwan', 'male', 4, 'IS', 'Fourth Level', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODI2NzcwMjgsImV4cCI6MTY4MjY4MDYyOCwibmJmIjoxNjgyNjc3MDI4LCJqdGkiOiJIdzZnTHFIQm1aaUVkQ0FKIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.B747vILbjbWl8rZY50RdMrWNIMMvfcmgDKK850Rp3AM', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0'),
('20190619', 'Soad', 'soad@gmail.com', '', 'female', 2.2, 'IT', 'Third Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `TAId` varchar(100) NOT NULL,
  `TAName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `nationalId` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `departmentCode` varchar(100) NOT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `courseID` varchar(100) DEFAULT NULL,
  `loginToken` text NOT NULL,
  `phone` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`TAId`, `TAName`, `email`, `nationalId`, `address`, `gender`, `departmentCode`, `userID`, `courseID`, `loginToken`, `phone`) VALUES
('Ahmed', 'Ahmed Galal', 'ahmed@gmail.com', '1234567899000', 'helwan', 'male', 'IS', 4, '7', '', 123456787),
('damr', 'dina amr', 'dinaAmr@gmail.com', '3456721956239', 'Cairo', 'female', 'IS', 12, '7', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODg4MTY3MTMsImV4cCI6MTY4ODgyMDMxMywibmJmIjoxNjg4ODE2NzEzLCJqdGkiOiJUaWZtSlNOVENGTWlGa2JtIiwic3ViIjoiMTIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2x06jnY8-JceoYeRI-00lt8WUO3fUgZE_4rW_IhPUrg', 21876543980),
('mramdan', 'mohamed ramdan', 'mramdan@gmail.com', '', '', 'male', 'IS', 14, '5', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODgzODY0MDcsImV4cCI6MTY4ODM5MDAwNywibmJmIjoxNjg4Mzg2NDA3LCJqdGkiOiJLRFFpcVp6d0tUNUxCSW5qIiwic3ViIjoiMTQiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.dMPdEP-tH4rgVPCSzKta_rRVZPec5fsr3fl2UIYeQA4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Type` enum('Student','Professor','TA','Admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `loginToken` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Type`, `loginToken`) VALUES
(3, '20190022', 'shimaareda001@gmail.com', NULL, '$2y$10$wTgn0YQ71hTn1BoJUcf.9uFe94uWpqza41y.RHIrwAXh.l5Hku5NS', NULL, '2023-04-27 12:56:41', '2023-05-14 05:13:16', 'Student', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODg4MTc5ODgsImV4cCI6MTY4ODgyMTU4OCwibmJmIjoxNjg4ODE3OTg4LCJqdGkiOiJoN3JwTTc2NGhwUWUxc1FlIiwic3ViIjoiMyIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.mgHtGg7InnteFF993nEzkBZyPn4ed-tbMk3_WHX9_oU'),
(4, 'ayman', 'a@gmail.com', NULL, 'ayman1234', NULL, NULL, NULL, NULL, NULL),
(5, '20190267', 'sr56784679@gmail.com', NULL, '$2y$10$UJHyZRIBM2jWlUlvOUu4EOu6lXdjSEZjDutpNGAN1Xzq5xwzRzViu', NULL, '2023-04-27 13:05:42', '2023-04-27 13:05:42', NULL, NULL),
(6, 'eahmed', 'esraaAhmed@gmail.com', NULL, 'esraa1234', NULL, NULL, NULL, NULL, NULL),
(7, 'ihelal', 'i@gmail.com', NULL, '$2y$10$2qSXz81rAwoGbvauln6hTOb84tfmVovGwhLIeNBZLqwDk5NBeBmbK', NULL, '2023-06-10 08:13:48', '2023-06-10 08:13:48', 'Professor', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODg4MTQzMTEsImV4cCI6MTY4ODgxNzkxMSwibmJmIjoxNjg4ODE0MzExLCJqdGkiOiJucEJtamlhbGE0WXFCN2MxIiwic3ViIjoiNyIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.SFHFi4FUB7ct66rxVGjlLn3nFekr_Q3hBBDVu2ncXJA'),
(10, 'aymank', 'ayman@gmail.com', NULL, '$2y$10$bhe5ebE79BIqg40INOiTjOmbnm/8sexZOj4RjZbcDFRcV1rz5PBJG', NULL, '2023-06-10 08:45:09', '2023-06-10 08:45:09', 'Professor', NULL),
(11, 'lmohamed', 'lamiaMohamed@gmail.com', NULL, '$2y$10$G/pqb9Ljgs3DAZmNBUokEe0w2CMYbCCEft8uthXNYF3QYby9Fy8Pu', NULL, '2023-06-16 09:35:03', '2023-06-16 09:35:03', NULL, NULL),
(12, 'damr', 'dinaAmr@gmail.com', NULL, '$2y$10$i4Ylk4TbE/kiYiTuYqpg2uCT3nxvw.YEaKG2vKQjBjdHly/yx/uz2', NULL, '2023-06-16 09:40:46', '2023-06-16 09:40:46', 'TA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODg4MTY3MTMsImV4cCI6MTY4ODgyMDMxMywibmJmIjoxNjg4ODE2NzEzLCJqdGkiOiJUaWZtSlNOVENGTWlGa2JtIiwic3ViIjoiMTIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2x06jnY8-JceoYeRI-00lt8WUO3fUgZE_4rW_IhPUrg'),
(13, 'admin', 'admin@gmail.com', NULL, '$2y$10$LTLceVE1.wl117Uj379xMOTKuIeIyFEXm5CW3c40m4hSOLs/tYfmS', NULL, '2023-06-23 11:07:54', '2023-06-23 11:07:54', 'Admin', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODg4MTc1MzMsImV4cCI6MTY4ODgyMTEzMywibmJmIjoxNjg4ODE3NTMzLCJqdGkiOiJMTVZiM202VDNhYTdCcVlHIiwic3ViIjoiMTMiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.PgFkOB7vAf9tRIE1iKTWGkkNqazFn0gPucRdWLkkRRI'),
(14, 'mramdan', 'mramdan@gmail.com', NULL, '$2y$10$F0tYMQd6wkz7PcbvSvHZeOPq8OH1sd0YynFsXgG0Fz0LpC1oWvMqS', NULL, '2023-07-01 08:11:53', '2023-07-01 08:11:53', 'TA', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODgzODY0MDcsImV4cCI6MTY4ODM5MDAwNywibmJmIjoxNjg4Mzg2NDA3LCJqdGkiOiJLRFFpcVp6d0tUNUxCSW5qIiwic3ViIjoiMTQiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.dMPdEP-tH4rgVPCSzKta_rRVZPec5fsr3fl2UIYeQA4'),
(15, '20190153', 'jnh0194@gmail.com', NULL, '$2y$10$5JXuPrmB1TJmv0mAYpWIKOfY0QFbh7T9LoB89tHo21edVU1yMlozu', NULL, '2023-07-01 10:36:34', '2023-07-01 10:36:34', 'Student', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODgyMTg4MjksImV4cCI6MTY4ODIyMjQyOSwibmJmIjoxNjg4MjE4ODI5LCJqdGkiOiJBMDZmVUlqUW1rYW9yTDlJIiwic3ViIjoiMTUiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.v8rgpBVrgvzA2B6wo5VV6_NclRwB2ftjjcVUqa79DKA');

-- --------------------------------------------------------

--
-- Table structure for table `_office_hour_`
--

CREATE TABLE `_office_hour_` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professorOrTAName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Day` varchar(255) NOT NULL,
  `Department` varchar(2) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `professorId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TAid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_office_hour_`
--

INSERT INTO `_office_hour_` (`id`, `professorOrTAName`, `Email`, `Location`, `Day`, `Department`, `StartTime`, `EndTime`, `professorId`, `TAid`) VALUES
(19, 'dina amr', 'dinaAmr@gmail.com', 'new building, third floor , IS TA room', 'Wednesday', 'IS', '12:51:00', '18:51:00', NULL, 'damr'),
(21, 'Iman Helal', 'iman@gmail.com', 'new building, third floor , IS room', 'Saturday', 'IS', '15:47:00', '23:47:00', 'ihelal', NULL),
(23, 'Iman Helal', 'iman@gmail.com', 'new building, third floor , IS room', 'Saturday', 'IS', '12:05:00', '15:05:00', 'ihelal', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcemets`
--
ALTER TABLE `announcemets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blockeduserchat`
--
ALTER TABLE `blockeduserchat`
  ADD KEY `user1` (`user1`),
  ADD KEY `user2` (`user2`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `departmentCode` (`departmentCode`),
  ADD KEY `pr1` (`professor1`),
  ADD KEY `pr2` (`professor2`);

--
-- Indexes for table `course_reigesters`
--
ALTER TABLE `course_reigesters`
  ADD PRIMARY KEY (`groupId`,`courseid`,`studentId`),
  ADD KEY `test forign` (`courseid`),
  ADD KEY `studentid` (`studentId`),
  ADD KEY `profId2` (`professorId2`),
  ADD KEY `profId1` (`professorId1`),
  ADD KEY `taid` (`TAId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentCode`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`courseID`),
  ADD KEY `pro` (`professorId`),
  ADD KEY `ta` (`TAId`);

--
-- Indexes for table `exam_halls`
--
ALTER TABLE `exam_halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forign key1` (`Student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gp`
--
ALTER TABLE `gp`
  ADD PRIMARY KEY (`member1`,`member2`,`member3`,`member4`,`member5`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `prof` (`professor`),
  ADD KEY `ta_f` (`TA`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`groupNumber`,`courseId`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `TAId` (`TAId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_from_foreign` (`from`),
  ADD KEY `messages_to_foreign` (`to`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prerequisitecousre`
--
ALTER TABLE `prerequisitecousre`
  ADD PRIMARY KEY (`ID_COURSE`,`ID_PREREQ_COURSE`),
  ADD KEY `forign 2` (`ID_PREREQ_COURSE`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`professorId`),
  ADD KEY `departmentCode` (`departmentCode`),
  ADD KEY `profId` (`userID`),
  ADD KEY `forign3` (`courseID`);

--
-- Indexes for table `program_perferences`
--
ALTER TABLE `program_perferences`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `p1` (`preference1`),
  ADD KEY `p2` (`preference2`),
  ADD KEY `p3` (`preference3`),
  ADD KEY `p4` (`preference4`),
  ADD KEY `p5` (`preference5`);

--
-- Indexes for table `scheudles`
--
ALTER TABLE `scheudles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `student_dept` (`departmentCode`),
  ADD KEY `userid` (`userID`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`TAId`),
  ADD KEY `departmentCode` (`departmentCode`),
  ADD KEY `taid` (`userID`),
  ADD KEY `course1` (`courseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `_office_hour_`
--
ALTER TABLE `_office_hour_`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proId` (`professorId`),
  ADD KEY `taIdForiegn` (`TAid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcemets`
--
ALTER TABLE `announcemets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exam_halls`
--
ALTER TABLE `exam_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gp`
--
ALTER TABLE `gp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheudles`
--
ALTER TABLE `scheudles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `_office_hour_`
--
ALTER TABLE `_office_hour_`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blockeduserchat`
--
ALTER TABLE `blockeduserchat`
  ADD CONSTRAINT `user1` FOREIGN KEY (`user1`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user2` FOREIGN KEY (`user2`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pr1` FOREIGN KEY (`professor1`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pr2` FOREIGN KEY (`professor2`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_reigesters`
--
ALTER TABLE `course_reigesters`
  ADD CONSTRAINT `groupid` FOREIGN KEY (`groupId`) REFERENCES `group` (`groupNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profId1` FOREIGN KEY (`professorId1`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profId2` FOREIGN KEY (`professorId2`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentid ` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taid` FOREIGN KEY (`TAId`) REFERENCES `ta` (`TAId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test forign` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro` FOREIGN KEY (`professorId`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ta` FOREIGN KEY (`TAId`) REFERENCES `ta` (`TAId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_halls`
--
ALTER TABLE `exam_halls`
  ADD CONSTRAINT `forign key1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gp`
--
ALTER TABLE `gp`
  ADD CONSTRAINT `prof` FOREIGN KEY (`professor`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ta_f` FOREIGN KEY (`TA`) REFERENCES `ta` (`TAId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`TAId`) REFERENCES `ta` (`TAId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prerequisitecousre`
--
ALTER TABLE `prerequisitecousre`
  ADD CONSTRAINT `course_id forign` FOREIGN KEY (`ID_COURSE`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forign 1` FOREIGN KEY (`ID_COURSE`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forign 2` FOREIGN KEY (`ID_PREREQ_COURSE`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `forign3` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profId` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
