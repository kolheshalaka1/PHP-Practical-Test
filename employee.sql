-- Adminer 4.8.1 MySQL 10.4.28-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `hobby` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `mobile`, `address`, `gender`, `hobby`, `photo`, `created`) VALUES
(2,	'pranaliupdate',	'Agaseupdate',	'pranali14@gmail.com',	9822466782,	'Ayodhya Nagar,Nagpur',	'Female',	'Singing',	'671512201c820.jpg',	'2024-10-20 14:53:18');

-- 2024-10-20 15:39:43
