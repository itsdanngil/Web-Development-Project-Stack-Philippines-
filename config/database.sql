-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for stackph
DROP DATABASE IF EXISTS `stackph`;
CREATE DATABASE IF NOT EXISTS `stackph` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stackph`;

-- Dumping structure for table stackph.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table stackph.answers
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `code` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `meridiem` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Answer User ID` (`user_id`),
  KEY `Answer Thread ID` (`thread_id`),
  CONSTRAINT `Answer Thread ID` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Answer User ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.answers: ~0 rows (approximately)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table stackph.answer_votes
DROP TABLE IF EXISTS `answer_votes`;
CREATE TABLE IF NOT EXISTS `answer_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Vote Answer ID` (`answer_id`),
  CONSTRAINT `Vote Answer ID` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.answer_votes: ~0 rows (approximately)
/*!40000 ALTER TABLE `answer_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `answer_votes` ENABLE KEYS */;

-- Dumping structure for table stackph.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `meridiem` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Comment User ID` (`user_id`),
  KEY `Comment Thread ID` (`thread_id`),
  CONSTRAINT `Comment Thread ID` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Comment User ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table stackph.comment_votes
DROP TABLE IF EXISTS `comment_votes`;
CREATE TABLE IF NOT EXISTS `comment_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Vote Comment ID` (`comment_id`),
  CONSTRAINT `Vote Comment ID` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.comment_votes: ~0 rows (approximately)
/*!40000 ALTER TABLE `comment_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_votes` ENABLE KEYS */;

-- Dumping structure for table stackph.statuses
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.statuses: ~1 rows (approximately)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `status`) VALUES
	(0, 'Active'),
	(1, 'Answered');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Dumping structure for table stackph.threads
DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `code` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `meridiem` char(2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Thread Status ID` (`status`),
  KEY `Thread User ID` (`user_id`),
  CONSTRAINT `Thread Status ID` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Thread User ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.threads: ~0 rows (approximately)
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;

-- Dumping structure for table stackph.thread_votes
DROP TABLE IF EXISTS `thread_votes`;
CREATE TABLE IF NOT EXISTS `thread_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Vote Thread ID` (`thread_id`),
  CONSTRAINT `Vote Thread ID` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.thread_votes: ~0 rows (approximately)
/*!40000 ALTER TABLE `thread_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `thread_votes` ENABLE KEYS */;

-- Dumping structure for table stackph.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table stackph.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
	(2, 'John Michael', 'manlupigjohnmichael@gmail.com', '$2y$08$8Y4gmlNsLRM4BGcdgSte4.VPcElvUtXgkC4RuXgOq0wKpqmlxfuSy');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
