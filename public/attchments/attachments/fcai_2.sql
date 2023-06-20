-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 05:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcai_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcemets`
--

CREATE TABLE `announcemets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcemets`
--

INSERT INTO `announcemets` (`id`, `created_at`, `updated_at`, `content`) VALUES
(1, '2023-04-13 12:16:32', NULL, 'Officia optio alias et ut. Et enim non quas distinctio itaque.'),
(2, '2023-04-13 12:16:33', NULL, 'Eos delectus possimus dolore et doloremque aspernatur harum. Nemo ipsam natus ea distinctio.'),
(3, '2023-04-13 12:16:33', NULL, 'Saepe non alias commodi quibusdam. Voluptas qui dolor tempora quia enim consequuntur sequi.'),
(4, '2023-04-13 12:16:34', NULL, 'Omnis vitae repellat suscipit harum cumque nobis. Libero et tempora tenetur et repellat minima.'),
(5, '2023-04-13 12:16:34', NULL, 'Non aliquam quasi atque placeat. Ipsa consequuntur nam libero quod voluptas iusto sit excepturi.'),
(6, '2023-04-13 12:16:34', NULL, 'Laudantium temporibus consequuntur sunt aut. Et rerum expedita quae accusamus.'),
(7, '2023-04-13 12:16:35', NULL, 'Voluptatem ipsum esse sapiente odit earum. Sunt laborum consequatur quae sit.'),
(8, '2023-04-13 12:16:35', NULL, 'Et sit similique est iure non ut alias eos. Commodi et totam et dolore et pariatur laborum fugiat.'),
(9, '2023-04-13 12:16:35', NULL, 'Quod eum velit est perspiciatis accusamus beatae. Omnis deleniti minima quod et perspiciatis saepe.'),
(10, '2023-04-13 12:16:35', NULL, 'Et quo incidunt voluptates et et dignissimos delectus. Eum amet iste quis in rerum.'),
(11, '2023-04-27 10:31:09', NULL, 'Aliquam cum ut sunt autem nobis vitae. Et rerum nam doloremque tempore et incidunt officia.'),
(12, '2023-04-27 10:31:09', NULL, 'Inventore vitae voluptates aut magni. Eaque quia ea nesciunt itaque.'),
(13, '2023-04-27 10:31:09', NULL, 'Voluptatem quisquam saepe sit ratione eos. Quo repudiandae est nulla dolores at sunt cum explicabo.'),
(14, '2023-04-27 10:31:09', NULL, 'Error aperiam debitis iste voluptas. Adipisci aliquam nisi nam unde magni et.'),
(15, '2023-04-27 10:31:09', NULL, 'Sed officiis doloremque et. Doloremque dolor velit architecto.'),
(16, '2023-04-27 10:31:09', NULL, 'Quisquam ipsum eaque dolores explicabo architecto. Recusandae at est nulla autem optio rem qui.'),
(17, '2023-04-27 10:31:10', NULL, 'Blanditiis quidem maiores veniam dolor. Iusto iusto consequatur error.'),
(18, '2023-04-27 10:31:10', NULL, 'Quia rerum voluptatem sed odit nobis. Est rerum aspernatur sed ea ea quia quo.'),
(19, '2023-04-27 10:31:10', NULL, 'Officia quae incidunt ratione aut minus. Voluptas voluptas accusamus in voluptatem officia.'),
(20, '2023-04-27 10:31:10', NULL, 'Sed facere optio assumenda molestiae rem facilis non. Nobis perferendis ut sapiente et.');

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
  `startTime2` time NOT NULL DEFAULT '08:00:00',
  `endTime2` time NOT NULL DEFAULT '09:30:00',
  `slotPlace1` text DEFAULT '\'مدرج ابراهيم فرج\'',
  `slotPlace2` text DEFAULT '\'مدرج ابراهيم فرج\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `departmentCode`, `Course_Code`, `Level`, `Semester`, `type`, `slotday1`, `startTime1`, `endTime1`, `creditHours`, `slotday2`, `startTime2`, `endTime2`, `slotPlace1`, `slotPlace2`) VALUES
('1', 'database1', 'IS', 'IS437', 'Second Level', 'First', 'mandatory', 'Tuesday', '08:00:00', '09:30:00', 3, 'Saturday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\''),
('2', 'Gis', 'IS', 'IS438', 'Fourth Level', 'First', 'optional', 'Monday', '11:15:00', '12:30:00', 3, 'Wednesday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\''),
('3', 'computer science', 'CS', 'CS1234', 'First Level', 'First', 'mandatory', 'Wednesday', '09:30:00', '11:15:00', 3, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\''),
('4', 'programming1', 'CS', 'cs345', 'First Level', 'Second', 'mandatory', 'Tuesday', '08:00:00', '09:30:00', 3, 'Thursday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\''),
('5', 'oop', 'CS', 'cs567', 'Second Level', 'First', 'mandatory', 'Saturday', '12:45:00', '02:00:00', 3, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\''),
('6', 'data structure', 'CS', 'cs876', 'Second Level', 'Second', 'optional', 'Tuesday', '08:00:00', '09:30:00', 3, 'Wednesday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\''),
('7', 'software1', 'CS', 'cs176', 'Second Level', 'Second', 'mandatory', 'Sunday', '04:00:00', '05:30:00', 3, 'Monday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج ابراهيم فرج\''),
('8', 'software2', 'CS', 'cs276', 'Third Level', 'First', 'mandatory', 'Thursday', '09:30:00', '11:00:00', 3, 'Monday', '08:00:00', '09:30:00', '\'مدرج 7\'', '\'مدرج ابراهيم فرج\''),
('9', 'Data Base 1', 'IS', 'IS012', 'Second Level', 'First', 'mandatory', 'Wednesday', '08:00:00', '09:30:00', 3, 'Sunday', '08:00:00', '09:30:00', '\'مدرج ابراهيم فرج\'', '\'مدرج 8\'');

-- --------------------------------------------------------

--
-- Table structure for table `course_professor`
--

CREATE TABLE `course_professor` (
  `courseID` varchar(100) NOT NULL,
  `professorID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_professor`
--

INSERT INTO `course_professor` (`courseID`, `professorID`) VALUES
('8', '1'),
('9', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_reigesters`
--

CREATE TABLE `course_reigesters` (
  `groupId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `courseid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `studentId` int(11) NOT NULL,
  `grade` enum('F','D','D+','C','C+','B','B+','A','A+') DEFAULT NULL,
  `creditHours` int(11) NOT NULL,
  `TermWork` int(11) DEFAULT NULL,
  `ExamWork` int(11) DEFAULT NULL,
  `Result` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_reigesters`
--

INSERT INTO `course_reigesters` (`groupId`, `courseid`, `studentId`, `grade`, `creditHours`, `TermWork`, `ExamWork`, `Result`) VALUES
('All', '6', 20190022, NULL, 3, NULL, NULL, NULL),
('All', '7', 20190022, NULL, 3, NULL, NULL, NULL),
('S2', '4', 20190022, 'B', 3, 30, 49, 79),
('S2', '5', 20190022, 'A+', 3, 39, 60, 99);

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
('general', 'general', 'Reda'),
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
  `TAId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `created_at`, `updated_at`, `contentRate`, `isRepeated`, `isClear`, `relevantToObjectives`, `preparetionForFutureCourses`, `courseID`, `engagedStudents`, `conveiedMaterial`, `isClearAgenda`, `teacherEffectiveness`, `communicationSkills`, `professorId`, `TAengagedStudents`, `TAconveiedMaterial`, `TAisClearAgenda`, `TAteacherEffectiveness`, `TAcommunicationSkills`, `TAId`) VALUES
(6, NULL, NULL, 'Average', 'Yes', 'No', 'Average', 'Poor', '9', 'Average', 'Average', 'No', 'Average', 'Poor', '1', 'Average', 'Average', 'No', 'Average', 'Poor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_halls`
--

CREATE TABLE `exam_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Student_id` int(11) NOT NULL,
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
(1, 20190022, 'IS437', 'database', 'صاله أ', 23, NULL, NULL),
(2, 20190267, 'IS438', 'GIS', 'صاله ج', 24, NULL, NULL),
(3, 20190267, 'IS437', 'database', 'صاله ب', 40, NULL, NULL);

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
  `requirements` varchar(255) NOT NULL,
  `member1` varchar(100) NOT NULL,
  `member2` varchar(100) NOT NULL,
  `member3` varchar(100) NOT NULL,
  `member4` varchar(100) NOT NULL,
  `member5` varchar(100) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `TA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gp`
--

INSERT INTO `gp` (`created_at`, `updated_at`, `idea`, `requirements`, `member1`, `member2`, `member3`, `member4`, `member5`, `professor`, `TA`) VALUES
(NULL, NULL, 'aaaa', 'xxxx', '20190022', '20190022', '20190022', '20190022', '20190022', 'sss', 'qqq'),
(NULL, NULL, 'سيببلامبطؤكرركبلبلم', 'بيخمكبيقبحبلمل', '20190022', '20190123', '20193463', '20193456', '20190235', 'بيبنمبب', 'يبنمبللسي'),
(NULL, NULL, 'student register', 'dfgjjk', '20190022', '20190233', '20190234', '20190025', '20190026', 'eman', 'ahmed');

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
  `groupCount` int(11) NOT NULL DEFAULT 25
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupNumber`, `TAId`, `courseId`, `slotDay`, `startTime`, `endTime`, `slotPlace`, `groupCount`) VALUES
('All', '1', '6', 'Sunday', '08:00:00', '09:30:00', 'lab1', 21),
('All', '2', '7', 'Saturday', '12:45:00', '02:30:00', 'lab1', 21),
('S1', '1', '6', 'Sunday', '09:30:00', '11:00:00', 'lab1', 25),
('S1', '2', '7', 'Saturday', '02:30:00', '04:00:00', 'lab1', 25),
('S2', '1', '7', 'Wednesday', '08:00:00', '09:30:00', 'lab1', 25);

-- --------------------------------------------------------

--
-- Table structure for table `group2`
--

CREATE TABLE `group2` (
  `courseId` varchar(100) NOT NULL,
  `groupNumber` varchar(50) NOT NULL,
  `TAId` varchar(100) NOT NULL,
  `endTime` time NOT NULL,
  `slotDay` enum('Sunday','Saturday','Friday','Thursday','Wednesday','Tuesday','Monday') NOT NULL,
  `startTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `attachment_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `created_at`, `updated_at`, `attachment_path`) VALUES
(1, 3, 4, 'Hi Dr Ayman', '2023-06-09 16:19:48', '2023-06-09 16:19:48', NULL),
(2, 4, 3, 'hello from Ayman', '2023-06-09 16:21:08', '2023-06-09 16:21:08', NULL);

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
  `password` varchar(200) NOT NULL,
  `phoneNumber` varchar(150) NOT NULL,
  `nationalId` varchar(150) NOT NULL,
  `departmentCode` varchar(100) NOT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `courseID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`professorId`, `professorName`, `email`, `address`, `gender`, `password`, `phoneNumber`, `nationalId`, `departmentCode`, `userID`, `courseID`) VALUES
('1', 'Ali', 'ali@gmail.com', 'dfflghlsd', 'male', 'ayman1234', '0111345528949', '122349045912094095', 'IS', 4, '9');

-- --------------------------------------------------------

--
-- Table structure for table `program_perferences`
--

CREATE TABLE `program_perferences` (
  `studentId` int(100) NOT NULL,
  `preference1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preference5` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_perferences`
--

INSERT INTO `program_perferences` (`studentId`, `preference1`, `preference2`, `preference3`, `preference4`, `preference5`) VALUES
(20190022, 'AI', 'CS', 'DS', 'IS', 'IT');

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
  `studentId` int(100) NOT NULL,
  `studentName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
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
  `nationalId` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentName`, `email`, `password`, `address`, `gender`, `GPA`, `departmentCode`, `level`, `loginToken`, `userID`, `Status`, `bylaw`, `phone`, `mobile`, `Entry_year`, `total_grades`, `first_language`, `second_language`, `nationality`, `birthdate`, `birth_place`, `country`, `Compulsory_Hours`, `electrive_hours`, `nationalId`) VALUES
(1, 'arwa', 'a@gmail.com', '', '', 'female', 3.5, 'IS', 'Fourth Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'shimaa', 'shimaa@gmail.com', '', '', 'female', 3.03, 'IS', 'Fourth Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'sara', 'sara@gmail.com', '', '', 'female', 3.4, 'IS', 'Fourth Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'gehad', 'gehad@gmail.com', '', '', 'female', 3.2, 'IS', 'Fourth Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Soad', 'soad@gmail.com', 'soad1234', '', 'female', 4, 'CS', 'Second Level', '', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20190022, 'Ali ahmed', 'ali.ahmed@gmail.com', 'ali1234', 'Helwan', 'male', 3.05, 'CS', 'Second Level', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODY0OTQ1MzcsImV4cCI6MTY4NjQ5ODEzNywibmJmIjoxNjg2NDk0NTM3LCJqdGkiOiJnejE0b2lMbXBNN01RN2M1Iiwic3ViIjoiMyIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.yHYzXBSZDMy2hRO7TszeOpfgVP4th4VofC_9_cMullU', 3, 'مقيد', 'general program(2018)', 238444445, 1115565554, 2019, 1500, NULL, NULL, 'egyptian', NULL, 'Giza\r\n', 'egypt', 90, 13, 123456767889),
(20190267, 'Alaa', 'alaa@gmail.com', 'alaa1234', 'Helwan', 'male', 3.2, 'CS', 'Third Level', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODI2NzcwMjgsImV4cCI6MTY4MjY4MDYyOCwibmJmIjoxNjgyNjc3MDI4LCJqdGkiOiJIdzZnTHFIQm1aaUVkQ0FKIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.B747vILbjbWl8rZY50RdMrWNIMMvfcmgDKK850Rp3AM', NULL, 'مقيد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `TAId` varchar(100) NOT NULL,
  `TAName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nationalId` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `departmentCode` varchar(100) NOT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `courseID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`TAId`, `TAName`, `email`, `password`, `nationalId`, `address`, `gender`, `departmentCode`, `userID`, `courseID`) VALUES
('1', 'ahmed', 'ahmed@gmail.com', 'ahmed1234', '1234567899000', 'helwan', 'male', 'IS', NULL, '9'),
('2', 'esraa', 'esraa@gmail.com', 'esraa1234', '3456721956239', 'giza', 'female', 'IS', 6, NULL);

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
  `name` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `Type` enum('Student','Professor','TA') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `Type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 20190022, 'sr5678467@gmail.com', NULL, NULL, '$2y$10$wTgn0YQ71hTn1BoJUcf.9uFe94uWpqza41y.RHIrwAXh.l5Hku5NS', NULL, '2023-04-27 12:56:41', '2023-05-14 05:13:16'),
(4, 20113456, 'a@gmail.com', NULL, 'Professor', 'ahmed1234', NULL, NULL, NULL),
(5, 20190267, 'sr56784679@gmail.com', NULL, NULL, '$2y$10$UJHyZRIBM2jWlUlvOUu4EOu6lXdjSEZjDutpNGAN1Xzq5xwzRzViu', NULL, '2023-04-27 13:05:42', '2023-04-27 13:05:42'),
(6, 20114565, 'lamiaa@gmail.com', NULL, NULL, 'lamiaa1234', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `_office_hour_`
--

CREATE TABLE `_office_hour_` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ProfessorId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TAid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `professorOrTAName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `OfficeHours` time DEFAULT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Day` varchar(255) NOT NULL,
  `Department` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_office_hour_`
--

INSERT INTO `_office_hour_` (`id`, `ProfessorId`, `TAid`, `professorOrTAName`, `Email`, `Location`, `OfficeHours`, `StartTime`, `EndTime`, `Day`, `Department`) VALUES
(1, NULL, NULL, 'Eman', 'emain@gmail.com', 'TA room', '14:14:12', '00:00:00', '00:00:00', 'monday', 'IS'),
(2, NULL, NULL, 'Nour', 'nour@gmail.com', 'is room', '13:14:12', '00:00:00', '00:00:00', 'sunday', 'cs'),
(3, '1', NULL, 'Ali', 'ali@gmail.com', 'is room', NULL, '12:00:00', '01:00:00', 'sunday', 'is'),
(8, '1', NULL, 'Ali', 'a@gmail.com', '345', NULL, '09:05:00', '10:05:00', 'Tuesday', 'is'),
(9, '1', NULL, 'Ali', 'a@gmail.com', 'it room', NULL, '23:05:00', '21:05:00', 'Wednesday', 'is');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcemets`
--
ALTER TABLE `announcemets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `departmentCode` (`departmentCode`);

--
-- Indexes for table `course_professor`
--
ALTER TABLE `course_professor`
  ADD PRIMARY KEY (`courseID`,`professorID`),
  ADD KEY `professorId` (`professorID`);

--
-- Indexes for table `course_reigesters`
--
ALTER TABLE `course_reigesters`
  ADD PRIMARY KEY (`groupId`,`courseid`,`studentId`),
  ADD KEY `test forign` (`courseid`),
  ADD KEY `studentid` (`studentId`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`member1`,`member2`,`member3`,`member4`,`member5`);

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
  ADD KEY `professorid_forign` (`ProfessorId`),
  ADD KEY `Ta_id` (`TAid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcemets`
--
ALTER TABLE `announcemets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_halls`
--
ALTER TABLE `exam_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `program_perferences`
--
ALTER TABLE `program_perferences`
  MODIFY `studentId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20190023;

--
-- AUTO_INCREMENT for table `scheudles`
--
ALTER TABLE `scheudles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20190268;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `_office_hour_`
--
ALTER TABLE `_office_hour_`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_professor`
--
ALTER TABLE `course_professor`
  ADD CONSTRAINT `courseid` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professorId` FOREIGN KEY (`professorID`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_reigesters`
--
ALTER TABLE `course_reigesters`
  ADD CONSTRAINT `groupid` FOREIGN KEY (`groupId`) REFERENCES `group` (`groupNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentid` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`TAId`) REFERENCES `ta` (`TAId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_to_foreign` FOREIGN KEY (`to`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `program_perferences`
--
ALTER TABLE `program_perferences`
  ADD CONSTRAINT `p1` FOREIGN KEY (`preference1`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p2` FOREIGN KEY (`preference2`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p3` FOREIGN KEY (`preference3`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p4` FOREIGN KEY (`preference4`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p5` FOREIGN KEY (`preference5`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_dept` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ta`
--
ALTER TABLE `ta`
  ADD CONSTRAINT `course1` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ta_ibfk_1` FOREIGN KEY (`departmentCode`) REFERENCES `department` (`departmentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taid` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_office_hour_`
--
ALTER TABLE `_office_hour_`
  ADD CONSTRAINT `Ta_id` FOREIGN KEY (`TAid`) REFERENCES `ta` (`TAId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professorid_forign` FOREIGN KEY (`ProfessorId`) REFERENCES `professor` (`professorId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
