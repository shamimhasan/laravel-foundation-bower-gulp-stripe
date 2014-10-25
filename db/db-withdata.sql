-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for stripelaravel
DROP DATABASE IF EXISTS `stripelaravel`;
CREATE DATABASE IF NOT EXISTS `stripelaravel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stripelaravel`;


-- Dumping structure for table stripelaravel.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stripe_user_id` varchar(50) NOT NULL,
  `access_token` varchar(50) NOT NULL,
  `refresh_token` varchar(50) NOT NULL,
  `livemode` varchar(50) NOT NULL,
  `stripe_publishable_key` varchar(50) NOT NULL,
  `token_type` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table stripelaravel.customers: ~2 rows (approximately)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `stripe_user_id`, `access_token`, `refresh_token`, `livemode`, `stripe_publishable_key`, `token_type`, `updated_at`, `created_at`) VALUES
	(1, 'acct_102iUX2SP6aFv9Ol', 'sk_test_QpfZA8vWoMso7BrsToa4DZNm', 'rt_51JapJVZKeT9jX99BoJVaqfo0v68CI8GhblH4iaeee3F461', '0', 'pk_test_LRVuOsDDk6u8VFQnQycLWqxs', 'bearer', '2014-10-25 05:14:00', '2014-10-25 05:13:22'),
	(2, 'acct_14qcVFE3SDHzE176', 'sk_test_FGvLLQfpxZWivI9HcDsGxtK5', 'rt_51K1pfeVKcmVIREOm7ss6BAnlo0THumi2Z00Oe63Vc9GGIe', '0', 'pk_test_Z9lQXvwnu4Au08eWjByOOFyw', 'bearer', '2014-10-25 05:23:00', '2014-10-25 05:23:00');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;


-- Dumping structure for table stripelaravel.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` varchar(500) NOT NULL DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `cards` varchar(500) DEFAULT NULL,
  `default_card` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table stripelaravel.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `customer_id`, `user_id`, `description`, `email`, `cards`, `default_card`, `updated_at`, `created_at`) VALUES
	(1, 1, 'cus_51KGOrWW6QJpzI', 'shamimhasan008@gmail.com', 'shamimhasan008@gmail.com', '[{"id":"card_14rHbT2SP6aFv9OlguR4tzIC","last4":"4242","brand":"Visa","exp_month":12,"exp_year":2015}]', 'card_14rHbT2SP6aFv9OlguR4tzIC', '2014-10-25 06:44:59', '2014-10-25 06:44:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
