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
-- Dumping data for table stripelaravel.customers: ~2 rows (approximately)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `stripe_user_id`, `access_token`, `refresh_token`, `livemode`, `stripe_publishable_key`, `token_type`, `updated_at`, `created_at`) VALUES
	(1, 'acct_102iUX2SP6aFv9Ol', 'sk_test_QpfZA8vWoMso7BrsToa4DZNm', 'rt_51JapJVZKeT9jX99BoJVaqfo0v68CI8GhblH4iaeee3F461', '0', 'pk_test_LRVuOsDDk6u8VFQnQycLWqxs', 'bearer', '2014-10-25 05:14:00', '2014-10-25 05:13:22'),
	(2, 'acct_14qcVFE3SDHzE176', 'sk_test_FGvLLQfpxZWivI9HcDsGxtK5', 'rt_51K1pfeVKcmVIREOm7ss6BAnlo0THumi2Z00Oe63Vc9GGIe', '0', 'pk_test_Z9lQXvwnu4Au08eWjByOOFyw', 'bearer', '2014-10-25 05:23:00', '2014-10-25 05:23:00');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping data for table stripelaravel.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `customer_id`, `user_id`, `description`, `email`, `cards`, `default_card`, `updated_at`, `created_at`) VALUES
	(1, 1, 'cus_51KGOrWW6QJpzI', 'shamimhasan008@gmail.com', 'shamimhasan008@gmail.com', '[{"id":"card_14rHbT2SP6aFv9OlguR4tzIC","last4":"4242","brand":"Visa","exp_month":12,"exp_year":2015}]', 'card_14rHbT2SP6aFv9OlguR4tzIC', '2014-10-25 06:44:59', '2014-10-25 06:44:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
