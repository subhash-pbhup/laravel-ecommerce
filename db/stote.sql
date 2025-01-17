-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: store
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `img` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_name` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin','123456','Dasna uttar paradesh','images/YmJrthHP44y3PaG6uRYprI8rFfEl08qq5ChyVlF2.jpg','admin@gmail.com','admin',1,NULL,NULL,'2024-09-30 12:26:04','Maharani Shop');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Earpod','EarpodEarpod','earpod',1,'2024-09-29 10:41:39','2024-10-19 12:28:06'),(2,'Computer','ComputerComputer','computer',1,'2024-09-29 10:41:53','2024-10-02 18:45:51'),(3,'Electronics','Electronics','electronics',1,'2024-09-30 11:21:05','2024-10-02 18:46:57'),(4,'Clothing','Clothing','clothing',1,'2024-09-30 11:21:15','2024-10-02 18:47:21'),(6,'Books','Books','books',1,'2024-09-30 11:21:36','2024-10-02 18:47:07'),(7,'test test asus','test test','test-test-asus',1,'2024-10-01 09:25:02','2024-10-02 18:46:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2024_09_26_135022_create_admin_table',2),(4,'2024_09_26_140621_create_user_table',3),(5,'2024_09_26_141109_create_admin_table',4),(6,'2024_09_26_141338_create_admin_table',5),(7,'2024_09_26_141430_create_admin_table',6),(8,'2024_09_26_141436_create_user_table',7),(9,'2024_10_05_111251_create_user_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(12,2) NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_items` longtext NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled','returned','complete') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp(),
  `shipped_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,'1',45000.00,18.00,10.00,45000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":1,\"price\":\"40000.00\",\"sku\":\"Asus-computer\",\"name\":\"Asus computer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/xKyPyZNoz5LiFETv8KfWiphk09CvzAN0WluRwtrJ.jpg\",\"pid\":5},{\"qty\":1,\"price\":\"5000.00\",\"sku\":\"printer\",\"name\":\"printer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/GWNoPKNOKaDpmWkvtvPhcMn7vZRZpClsx9T78G73.jpg\",\"pid\":4}]','pending','Paypal','2024-10-18 09:06:58','2024-10-18 09:06:58','2024-10-18 09:06:58','2024-10-18 03:36:58','2024-10-18 03:36:58'),(2,3,'1',1000.00,18.00,10.00,1000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":1,\"price\":\"1000.00\",\"sku\":\"T-shirt\",\"name\":\"T-shirt\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/DXLU9KZ8YV2nJCO1uLkGTm5iJtnOJ1Qbm5IAxOHS.jpg\",\"pid\":1}]','pending','Paypal','2024-10-18 09:55:55','2024-10-18 09:55:55','2024-10-18 09:55:55','2024-10-18 04:25:55','2024-10-18 04:25:55'),(3,3,'1',5000.00,18.00,10.00,5000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":1,\"price\":\"5000.00\",\"sku\":\"LG-led-tv\",\"name\":\"LG led tv\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/gGBU3ot8OyFg5GgzYaKlTskGPSakkAh1tR9qNWAz.jpg\",\"pid\":2}]','pending','Direct check','2024-10-18 09:56:29','2024-10-18 09:56:29','2024-10-18 09:56:29','2024-10-18 04:26:29','2024-10-18 04:26:29'),(4,3,'1',45000.00,18.00,10.00,45000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":2,\"price\":\"5000.00\",\"sku\":\"sony-computer\",\"name\":\"sony computer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/guOwrEFeXaoLhEnbCgs1zQt3NJhWbtuXdfAFJosF.jpg\",\"pid\":3},{\"qty\":2,\"price\":\"40000.00\",\"sku\":\"Asus-computer\",\"name\":\"Asus computer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/xKyPyZNoz5LiFETv8KfWiphk09CvzAN0WluRwtrJ.jpg\",\"pid\":5}]','pending','Paypal','2024-10-18 12:52:11','2024-10-18 12:52:11','2024-10-18 12:52:11','2024-10-18 07:22:11','2024-10-18 07:22:11'),(5,2,'1',1000.00,18.00,10.00,1000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":2,\"price\":\"1000.00\",\"sku\":\"T-shirt\",\"name\":\"T-shirt\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/DXLU9KZ8YV2nJCO1uLkGTm5iJtnOJ1Qbm5IAxOHS.jpg\",\"pid\":1}]','pending','Direct check','2024-10-18 13:19:09','2024-10-18 13:19:09','2024-10-18 13:19:09','2024-10-18 07:49:09','2024-10-18 07:49:09'),(6,2,'1',160000.00,18.00,10.00,160000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":4,\"price\":\"40000.00\",\"sku\":\"Asus-computer\",\"name\":\"Asus computer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/xKyPyZNoz5LiFETv8KfWiphk09CvzAN0WluRwtrJ.jpg\",\"pid\":5}]','pending','Paypal','2024-10-18 15:11:57','2024-10-18 15:11:57','2024-10-18 15:11:57','2024-10-18 09:41:57','2024-10-18 09:41:57'),(7,2,'1',20000.00,18.00,10.00,20000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":2,\"price\":\"5000.00\",\"sku\":\"printer\",\"name\":\"printer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/GWNoPKNOKaDpmWkvtvPhcMn7vZRZpClsx9T78G73.jpg\",\"pid\":4},{\"qty\":2,\"price\":\"5000.00\",\"sku\":\"sony-computer\",\"name\":\"sony computer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/guOwrEFeXaoLhEnbCgs1zQt3NJhWbtuXdfAFJosF.jpg\",\"pid\":3}]','pending','Paypal','2024-10-18 15:15:23','2024-10-18 15:15:23','2024-10-18 15:15:23','2024-10-18 09:45:23','2024-10-18 09:45:23'),(8,2,'1',255000.00,18.00,10.00,255000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":6,\"price\":\"40000.00\",\"sku\":\"Asus-computer\",\"name\":\"Asus computer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/xKyPyZNoz5LiFETv8KfWiphk09CvzAN0WluRwtrJ.jpg\",\"pid\":5},{\"qty\":3,\"price\":\"5000.00\",\"sku\":\"printer\",\"name\":\"printer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/GWNoPKNOKaDpmWkvtvPhcMn7vZRZpClsx9T78G73.jpg\",\"pid\":4}]','pending','Direct check','2024-10-18 17:32:23','2024-10-18 17:32:23','2024-10-18 17:32:23','2024-10-18 12:02:23','2024-10-18 12:02:23'),(9,2,'1',10000.00,18.00,10.00,10000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":2,\"price\":\"5000.00\",\"sku\":\"printer\",\"name\":\"printer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/GWNoPKNOKaDpmWkvtvPhcMn7vZRZpClsx9T78G73.jpg\",\"pid\":4}]','pending',NULL,'2024-10-18 17:42:46','2024-10-18 17:42:46','2024-10-18 17:42:46','2024-10-18 12:12:46','2024-10-18 12:12:46'),(10,2,'1',14000.00,18.00,10.00,14000.00,'Mayur vihar dasna , Ghaziabad UP 230128','[{\"qty\":4,\"price\":\"1000.00\",\"sku\":\"T-shirt\",\"name\":\"T-shirt\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/DXLU9KZ8YV2nJCO1uLkGTm5iJtnOJ1Qbm5IAxOHS.jpg\",\"pid\":1},{\"qty\":2,\"price\":\"5000.00\",\"sku\":\"sony-computer\",\"name\":\"sony computer\",\"img\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/products\\/guOwrEFeXaoLhEnbCgs1zQt3NJhWbtuXdfAFJosF.jpg\",\"pid\":3}]','pending','Paypal','2024-10-18 18:08:46','2024-10-18 18:08:46','2024-10-18 18:08:46','2024-10-18 12:38:46','2024-10-18 12:38:46'),(11,2,'1',0.00,18.00,10.00,0.00,'Mayur vihar dasna , Ghaziabad UP 230128','[]','pending',NULL,'2024-10-19 10:25:13','2024-10-19 10:25:13','2024-10-19 10:25:13','2024-10-19 04:55:13','2024-10-19 04:55:13');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'auth_token','d8aa3dc8397b268bc9204960bee7b73ca20599b9704d0e2d82788c53f4f70ff2','[\"*\"]',NULL,NULL,'2024-10-05 06:37:47','2024-10-05 06:37:47'),(2,'App\\Models\\User',2,'auth_token','d5f1f40d245393c03cc5302c5d48c8c2ec3421024a57c2677567188c391455da','[\"*\"]',NULL,NULL,'2024-10-05 06:49:54','2024-10-05 06:49:54'),(3,'App\\Models\\User',2,'auth_token','60076fa58e89d4cc487d137248cb5064800089e7eaf392f16b9db8547197211e','[\"*\"]',NULL,NULL,'2024-10-05 06:52:15','2024-10-05 06:52:15'),(4,'App\\Models\\User',2,'auth_token','aece92ca0970ab877bd7157905d65dc9c99cf03a3d8d96305211f42ec253cbbd','[\"*\"]',NULL,NULL,'2024-10-05 06:53:40','2024-10-05 06:53:40'),(5,'App\\Models\\User',2,'auth_token','d4064b585c4c7d18a4cd1d192926673b73fd2d96faff63531d63e8be49f5f05a','[\"*\"]',NULL,NULL,'2024-10-05 06:53:45','2024-10-05 06:53:45'),(6,'App\\Models\\User',2,'auth_token','177da16b7c6536770206069d9e88e01ddcf793135f8885ef18c17396abe85508','[\"*\"]',NULL,NULL,'2024-10-05 06:53:48','2024-10-05 06:53:48'),(8,'App\\Models\\User',2,'auth_token','d7ad7bca549383eba1d8330b323b4aead7d50742465a791a6b3094dfc07d8881','[\"*\"]',NULL,NULL,'2024-10-05 06:56:44','2024-10-05 06:56:44'),(9,'App\\Models\\User',2,'auth_token','9efb53ff1522824e4dd4a8461930e792063aa1964cba39047746411d915cfe96','[\"*\"]',NULL,NULL,'2024-10-05 19:52:51','2024-10-05 19:52:51'),(10,'App\\Models\\User',2,'auth_token','a995dceb743069875d9aef7fdc5631089afa414a829452f202417c15fe2f3a4b','[\"*\"]',NULL,NULL,'2024-10-05 19:56:14','2024-10-05 19:56:14'),(11,'App\\Models\\User',2,'auth_token','26fe5bf84a94f3fe44b9eb75b0ec82adbbabc6a97fb7e983922e11915920091c','[\"*\"]',NULL,NULL,'2024-10-05 19:57:08','2024-10-05 19:57:08'),(12,'App\\Models\\User',2,'auth_token','3aefcfb631ee8fbb5f9d4ee594d464a0e9bc52720f09a63878568925718df6d0','[\"*\"]',NULL,NULL,'2024-10-05 20:08:33','2024-10-05 20:08:33'),(13,'App\\Models\\User',2,'auth_token','1cc883c64fbe651192ab9ea9e44451045700ec7d7897bc96212d47705b4d1210','[\"*\"]',NULL,NULL,'2024-10-05 20:14:04','2024-10-05 20:14:04'),(14,'App\\Models\\User',2,'auth_token','65a6321ae5702cf093b2d9af74fb02e6033985fe8fcb37853714b083c80cd4bb','[\"*\"]',NULL,NULL,'2024-10-05 20:14:41','2024-10-05 20:14:41'),(15,'App\\Models\\User',2,'auth_token','6b9fcde4ca91dd55d196557b2ff5c078f977a765bab121321c97d842d7d9ecab','[\"*\"]',NULL,NULL,'2024-10-05 20:14:48','2024-10-05 20:14:48'),(16,'App\\Models\\User',2,'auth_token','8304291f4ba3e9a86fa0a4f1b5e3caa6b11603c5158d83fa4082c7d8131d0c8f','[\"*\"]',NULL,NULL,'2024-10-05 20:14:49','2024-10-05 20:14:49'),(17,'App\\Models\\User',2,'auth_token','346bf7d96a6b4e1e2cbfeb443baa1acb311a762e72040398b49dfa24c1ba4bbe','[\"*\"]',NULL,NULL,'2024-10-05 20:17:58','2024-10-05 20:17:58'),(18,'App\\Models\\User',2,'auth_token','3b8e386396aef238160db9bc40e62e1466785a261521c1fe5eb4bf2d65b1f3b0','[\"*\"]',NULL,NULL,'2024-10-05 20:21:11','2024-10-05 20:21:11'),(19,'App\\Models\\User',2,'auth_token','9597210593a11cf2a3f47954d1a7cc159c1a59e086f9027a1fffa9c43741bf25','[\"*\"]',NULL,NULL,'2024-10-05 20:21:11','2024-10-05 20:21:11'),(20,'App\\Models\\User',2,'auth_token','e63e06a6017764cbc93e8f12b6ba355f34913f906cb71c385af5328952e191fa','[\"*\"]',NULL,NULL,'2024-10-05 20:21:24','2024-10-05 20:21:24'),(21,'App\\Models\\User',2,'auth_token','9594932456e8d502175fb9a31116c6d6655fbc9b02419ed0b68467d1ff72cc0a','[\"*\"]',NULL,NULL,'2024-10-05 20:21:43','2024-10-05 20:21:43'),(22,'App\\Models\\User',2,'auth_token','203cfd22d9b1639386bd71b8f373272fe61719e8d65dbebec09b6ae01cda4471','[\"*\"]',NULL,NULL,'2024-10-05 20:26:50','2024-10-05 20:26:50'),(23,'App\\Models\\User',2,'auth_token','19df06043684191faf51a7da5710ba2f6aea6e19fa0b9947f2cfbb83733c156d','[\"*\"]',NULL,NULL,'2024-10-05 20:32:44','2024-10-05 20:32:44'),(24,'App\\Models\\User',2,'auth_token','1116aceed8e5c85836f3d988f150a5652620cc7eaa5e02c9fb3e7553a91a78c0','[\"*\"]',NULL,NULL,'2024-10-05 20:33:40','2024-10-05 20:33:40'),(25,'App\\Models\\User',2,'auth_token','3ac945cfdf59d04dc2f38b5821764ed468d32989585d6f149e2ae7fddb070df2','[\"*\"]',NULL,NULL,'2024-10-05 20:43:26','2024-10-05 20:43:26'),(26,'App\\Models\\User',2,'auth_token','841b30f0c5f8f569c64751a906eef2b06fb0f8335cee4d7699fe8b9062d5dc82','[\"*\"]',NULL,NULL,'2024-10-05 20:43:45','2024-10-05 20:43:45'),(27,'App\\Models\\User',2,'auth_token','6269330c201c7dd655764d235229d5c60ff171a2e267e4b1faaf1f45e9661f74','[\"*\"]',NULL,NULL,'2024-10-05 20:49:05','2024-10-05 20:49:05'),(28,'App\\Models\\User',2,'auth_token','0fc9124cc04ec055568420159e1303d12804cfd31148850064d08cf9057d44bb','[\"*\"]',NULL,NULL,'2024-10-05 21:01:21','2024-10-05 21:01:21'),(29,'App\\Models\\User',2,'auth_token','281dc679dced954e0cf823b716ec24a7d7df736726b6f90b752656954209c955','[\"*\"]',NULL,NULL,'2024-10-05 21:05:59','2024-10-05 21:05:59'),(30,'App\\Models\\User',2,'auth_token','1f46e4498120b1c6c4b8156be4f74fc9910c35328b54ba676a957c923347bc3f','[\"*\"]',NULL,NULL,'2024-10-05 21:08:46','2024-10-05 21:08:46'),(31,'App\\Models\\User',2,'auth_token','cf1e1a848b68aaa8327279d1133bc8009cff30f2bf7516ec9ab5aaa8c596b594','[\"*\"]',NULL,NULL,'2024-10-05 21:10:51','2024-10-05 21:10:51'),(32,'App\\Models\\User',2,'auth_token','352efa0f4499fcba7eaecc1520c82dee52fa7f68a49a3a3a9b5fc031a463dfbb','[\"*\"]',NULL,NULL,'2024-10-05 21:13:31','2024-10-05 21:13:31'),(33,'App\\Models\\User',2,'auth_token','81fda81242febdb945bfa39d06607846f83efd8100293f0e3e89626286e98153','[\"*\"]',NULL,NULL,'2024-10-05 21:17:51','2024-10-05 21:17:51'),(34,'App\\Models\\User',2,'auth_token','ea20e997358adb35aa8461aa849d890c6de521b5025f136d6dd2c6ed1b4dfc5f','[\"*\"]',NULL,NULL,'2024-10-05 21:20:14','2024-10-05 21:20:14'),(35,'App\\Models\\User',2,'auth_token','18156819f76ce5ff1fdde4ffea9cc610fb52cb94bcab0335ee4713b02d45a735','[\"*\"]',NULL,NULL,'2024-10-06 04:44:48','2024-10-06 04:44:48'),(36,'App\\Models\\User',2,'auth_token','3f5e82237dd99a1a5255d7e20f1cbf3d40e5c51b98be7b7fd979562ba75d4bb9','[\"*\"]',NULL,NULL,'2024-10-06 04:45:33','2024-10-06 04:45:33'),(37,'App\\Models\\User',2,'auth_token','a1c89d6ea5baae503542d28fe072c805ed3c78b0650ca660604dd71493f98796','[\"*\"]',NULL,NULL,'2024-10-06 04:47:08','2024-10-06 04:47:08'),(38,'App\\Models\\User',2,'auth_token','f9037cf4a2621abb80d49bbc21bb4db07a265f3102b3c14bb020545b243f27e3','[\"*\"]',NULL,NULL,'2024-10-06 04:53:01','2024-10-06 04:53:01'),(39,'App\\Models\\User',2,'auth_token','a6ac68cf375eeb36a08a5bd5220b0c49500b93f1ace8e2588335748de6ee03c7','[\"*\"]',NULL,NULL,'2024-10-06 04:54:57','2024-10-06 04:54:57'),(40,'App\\Models\\User',2,'auth_token','e00dd92c5e133342945ddc64272d9f2468ea181fb77ce920c3d8f2c8de1efb2c','[\"*\"]',NULL,NULL,'2024-10-06 04:56:05','2024-10-06 04:56:05'),(41,'App\\Models\\User',2,'auth_token','4cc133a12814eaf51062e6d740942a7a3900ca987eea0362f6afb02849da64ed','[\"*\"]',NULL,NULL,'2024-10-06 05:00:15','2024-10-06 05:00:15'),(42,'App\\Models\\User',2,'auth_token','9a7314cb6e01b52418a139839de7fc82f41c5939e415215e3a8fcf3e70a5f705','[\"*\"]',NULL,NULL,'2024-10-06 05:21:00','2024-10-06 05:21:00'),(43,'App\\Models\\User',2,'auth_token','a8ee56fa338638880ccde9f7d7bdc31d4d1894e3e510329e8784139dbc29fcb1','[\"*\"]',NULL,NULL,'2024-10-06 05:28:30','2024-10-06 05:28:30'),(44,'App\\Models\\User',2,'auth_token','1a9af91e30608060ea5a67c830af4db698cb03a4efd2bebe7883e6ed16722364','[\"*\"]',NULL,NULL,'2024-10-06 07:21:55','2024-10-06 07:21:55'),(45,'App\\Models\\User',2,'auth_token','2d3f269ee00834f951ba2e4b0239d58fd1d2254f6cb28d17de719176539904cf','[\"*\"]',NULL,NULL,'2024-10-06 07:37:54','2024-10-06 07:37:54'),(46,'App\\Models\\User',2,'auth_token','3778e9c59cb3c0ada067f14a8511082c7b17d2f7307233ec68847e54e5214bc4','[\"*\"]',NULL,NULL,'2024-10-06 07:39:57','2024-10-06 07:39:57'),(47,'App\\Models\\User',2,'auth_token','32ca1a2b0186e7fc250e5c77c747d17e2ec7b085690a03cc1f8aee482ad8e465','[\"*\"]',NULL,NULL,'2024-10-06 07:53:14','2024-10-06 07:53:14'),(48,'App\\Models\\User',2,'auth_token','65273407a6c7a585a6e345bd314086897557d5b99544609cffb12cb7db99a684','[\"*\"]',NULL,NULL,'2024-10-06 07:53:16','2024-10-06 07:53:16'),(49,'App\\Models\\User',2,'auth_token','5cb8a335994202149283ec5e2f1daeb72e12aed96e5e3384727ebc6a8f23326e','[\"*\"]',NULL,NULL,'2024-10-06 07:53:17','2024-10-06 07:53:17'),(50,'App\\Models\\User',2,'auth_token','eb78676504eab7b39e32b5195df8770bf26260df5a1aa8fe03b4a2f4dc01d7a7','[\"*\"]',NULL,NULL,'2024-10-06 08:05:28','2024-10-06 08:05:28'),(51,'App\\Models\\User',2,'auth_token','431821eddaeba19abefd5fdb1315524a9cea01df09dbac7f0b91cca14bfbebf6','[\"*\"]',NULL,NULL,'2024-10-06 08:32:03','2024-10-06 08:32:03'),(52,'App\\Models\\User',2,'auth_token','fd108e0503285f76cc976ad22bdc64bd663efa37ef54fdf16a83e23d8a253d3c','[\"*\"]',NULL,NULL,'2024-10-07 03:57:49','2024-10-07 03:57:49'),(53,'App\\Models\\User',2,'auth_token','d0f73358d383041fcb4b655e3dba2bc7b14d20951367311a9385ab4cc94b69a8','[\"*\"]',NULL,NULL,'2024-10-07 03:59:40','2024-10-07 03:59:40'),(54,'App\\Models\\User',2,'auth_token','5b6bd1282c8a697f58f442f7d74a6d09f5752d6801c2ae9ab431bd97a5d7477b','[\"*\"]',NULL,NULL,'2024-10-07 04:23:56','2024-10-07 04:23:56'),(55,'App\\Models\\User',2,'auth_token','ea8227453acb1695ade715714c64872c90f112de1dfc1000efb48f77f4eba935','[\"*\"]',NULL,NULL,'2024-10-07 04:41:51','2024-10-07 04:41:51'),(56,'App\\Models\\User',2,'auth_token','a43217a85798fda3e60db0cb215a4b9784a0ea6b5d7922536f0bce45fac2068b','[\"*\"]',NULL,NULL,'2024-10-07 05:15:11','2024-10-07 05:15:11'),(57,'App\\Models\\User',2,'auth_token','9beff6844fdb764e35bdec244365c1e85843d311241310256cfb201e4d76ad49','[\"*\"]',NULL,NULL,'2024-10-07 05:29:18','2024-10-07 05:29:18'),(58,'App\\Models\\User',2,'auth_token','60b5c5d1f5fbdc8db3c3f201c95d5273498a63f17f0770db06a5df2e816310a9','[\"*\"]',NULL,NULL,'2024-10-07 05:34:09','2024-10-07 05:34:09'),(59,'App\\Models\\User',2,'auth_token','39befe09ca6ec770e6fd3d9cfd3bfcfa5a9be31221b2b7e6a03f56ce40f03f6f','[\"*\"]',NULL,NULL,'2024-10-07 05:34:58','2024-10-07 05:34:58'),(60,'App\\Models\\User',2,'auth_token','468045ed1389f22674e2fa116c4dd0c0daa7a869e0be7dee089f0a24fd1056b1','[\"*\"]',NULL,NULL,'2024-10-07 05:35:21','2024-10-07 05:35:21'),(61,'App\\Models\\User',2,'auth_token','8d3a80911adb40612954cac2afd647b8a3acf7746cebcb3d535c691d91cbfd0f','[\"*\"]',NULL,NULL,'2024-10-07 13:23:07','2024-10-07 13:23:07'),(62,'App\\Models\\User',2,'auth_token','2c3113c4c3833879173694d141c9f739168dae0d2351e45f89d3ca341f6424e4','[\"*\"]',NULL,NULL,'2024-10-07 13:23:40','2024-10-07 13:23:40'),(63,'App\\Models\\User',2,'auth_token','f1561109ba543b080d3f8150ace136a3ea2950188c55091807d6c742ca8f06fb','[\"*\"]',NULL,NULL,'2024-10-07 13:37:53','2024-10-07 13:37:53'),(64,'App\\Models\\User',2,'auth_token','26a7f91d405fbcc556a1ff0c806e66f2efc1a7eb533b960da62886baf4cbe78e','[\"*\"]',NULL,NULL,'2024-10-07 22:52:55','2024-10-07 22:52:55'),(65,'App\\Models\\User',2,'auth_token','ea05f09e9bc28c3b8e6f2dd82d5d6461f1582ce977543c1b941ec879f9d1fad5','[\"*\"]',NULL,NULL,'2024-10-07 22:52:56','2024-10-07 22:52:56'),(66,'App\\Models\\User',2,'auth_token','063356ec9be31699ea9ff2b95e96f64bebbf8de66ce850542777670fd0bca544','[\"*\"]',NULL,NULL,'2024-10-09 01:14:38','2024-10-09 01:14:38'),(67,'App\\Models\\User',2,'auth_token','0af876f3e50a233ff5e9acddc5f40135da85afda46e175b9e9378340f1bc3562','[\"*\"]',NULL,NULL,'2024-10-09 02:36:36','2024-10-09 02:36:36'),(68,'App\\Models\\User',2,'auth_token','3ef85d4e0258a17cc8afbd34bc5cfeaa7d4c706dce402b1ad6a71ab86730e991','[\"*\"]',NULL,NULL,'2024-10-09 03:17:36','2024-10-09 03:17:36'),(69,'App\\Models\\User',2,'auth_token','7d3d62a3060fdc3867d452e54e831f923ba49f15458702a8c68d8ea89faa6e91','[\"*\"]',NULL,NULL,'2024-10-09 03:24:25','2024-10-09 03:24:25'),(70,'App\\Models\\User',2,'auth_token','eee92f8425af45dda244e31503a7c7d8d4fd109f31ce708b65404b45f6ae2169','[\"*\"]',NULL,NULL,'2024-10-09 03:26:41','2024-10-09 03:26:41'),(71,'App\\Models\\User',2,'auth_token','93cec5c86b63073eab55ad97746f5397f2e1ee2e280b27be3dc8d3b77208ba99','[\"*\"]',NULL,NULL,'2024-10-15 06:22:39','2024-10-15 06:22:39'),(72,'App\\Models\\User',2,'auth_token','36f9c1c06b6623ec2d1e44fa7415bbae384e7644d23959c44c29493fbc4cf139','[\"*\"]',NULL,NULL,'2024-10-17 07:50:14','2024-10-17 07:50:14'),(73,'App\\Models\\User',2,'auth_token','a0e62e403af83844cf5ab089f80c8140e64762b0b7d9362e8177f5a694e61a74','[\"*\"]',NULL,NULL,'2024-10-17 12:07:17','2024-10-17 12:07:17'),(74,'App\\Models\\User',2,'auth_token','d42054865d35a23932bb63ccb5a6940552ef352fc1019fba90418008b2ad9d1b','[\"*\"]',NULL,NULL,'2024-10-17 12:11:03','2024-10-17 12:11:03'),(75,'App\\Models\\User',2,'auth_token','55aec33c086cce499e3e0c5e6206da4ec16a9293a39032d2039a7988744434dd','[\"*\"]',NULL,NULL,'2024-10-17 12:11:30','2024-10-17 12:11:30'),(76,'App\\Models\\User',2,'auth_token','c5c1a3a0d4e1bdc3fd702fe06f4c70ce117a04334f2fc621078e1b58de5d83fb','[\"*\"]',NULL,NULL,'2024-10-17 12:16:02','2024-10-17 12:16:02'),(77,'App\\Models\\User',2,'auth_token','3814f6d956966360cda40042a70ede7323fc48f2d4d16538cdaf6dce0b7bc518','[\"*\"]',NULL,NULL,'2024-10-17 12:16:16','2024-10-17 12:16:16'),(78,'App\\Models\\User',2,'auth_token','421445bf295358a85273dd5283f40bac289fde8d257ed09e0fd6352ab928c6b9','[\"*\"]',NULL,NULL,'2024-10-17 12:18:30','2024-10-17 12:18:30'),(79,'App\\Models\\User',2,'auth_token','a590ba479bad56102bf162032d68d9464b635ac7025f6ac1be754d273776f759','[\"*\"]',NULL,NULL,'2024-10-17 12:18:39','2024-10-17 12:18:39'),(80,'App\\Models\\User',2,'auth_token','cb860f123a5a4aada776159c07b873c4240a75e5c470cd0f5a6bb92f6c77ef29','[\"*\"]',NULL,NULL,'2024-10-17 13:47:33','2024-10-17 13:47:33'),(81,'App\\Models\\User',2,'auth_token','5aa71a9cad0205e35470c88f3594ea15b37d371e94ba5c12ad8b4e9cacb05203','[\"*\"]',NULL,NULL,'2024-10-17 13:58:32','2024-10-17 13:58:32'),(82,'App\\Models\\User',2,'auth_token','ddb80d395f997981c5b6a9851e09c2f0a431de557b5d1963b7ee4d3771d00dfa','[\"*\"]',NULL,NULL,'2024-10-17 14:00:10','2024-10-17 14:00:10'),(83,'App\\Models\\User',2,'auth_token','cec30f1810f3317431ed326498734dfcab582c24405312fb8be3691095125df1','[\"*\"]',NULL,NULL,'2024-10-17 14:03:52','2024-10-17 14:03:52'),(84,'App\\Models\\User',2,'auth_token','e8cc270cf0309fa4cf6607a43af63b9a17a616de3a93b3820fceaeaa956a6520','[\"*\"]',NULL,NULL,'2024-10-17 14:09:34','2024-10-17 14:09:34'),(85,'App\\Models\\User',3,'auth_token','8827933fdb52370a2add53b24be1e09ed215c52aed4ca2f6227590012f518a90','[\"*\"]',NULL,NULL,'2024-10-17 14:14:05','2024-10-17 14:14:05'),(86,'App\\Models\\User',2,'auth_token','75a50af9794bffb9bb95c91533b7277858fcae983c889cc97237dc389ba496d3','[\"*\"]',NULL,NULL,'2024-10-17 14:15:41','2024-10-17 14:15:41'),(87,'App\\Models\\User',3,'auth_token','0559b1c9050056c324c7cd4d7e7e6b37038c2026fd9e19a9c5b1c77f763f9ccb','[\"*\"]',NULL,NULL,'2024-10-17 14:16:23','2024-10-17 14:16:23'),(88,'App\\Models\\User',2,'auth_token','51770b960debcc2c07c8b5e7760dee326951cc98d68973477f692bb2565fc5c4','[\"*\"]',NULL,NULL,'2024-10-18 07:47:05','2024-10-18 07:47:05'),(89,'App\\Models\\User',2,'auth_token','c45e9d15e2c618a05553d9487cde76156bacfa37eb3e206154a21a8cf6128b22','[\"*\"]',NULL,NULL,'2024-10-18 07:47:16','2024-10-18 07:47:16'),(90,'App\\Models\\User',2,'auth_token','a897ef53b90a37eae44773c95190dbd07a3ed3fb949dca46111d4f65b37a6b31','[\"*\"]',NULL,NULL,'2024-10-18 07:48:23','2024-10-18 07:48:23'),(91,'App\\Models\\User',2,'auth_token','dcc2a63aaa1c5d8bf0d76688c55e8139a4433e6d8c8d084881f70cb18daaf5bd','[\"*\"]',NULL,NULL,'2024-10-18 12:53:14','2024-10-18 12:53:14'),(92,'App\\Models\\User',2,'auth_token','c348bf354b78d468bc17a82281fdbd42d7bafdfcb3fd844441cb83060811cc21','[\"*\"]',NULL,NULL,'2024-10-19 00:39:28','2024-10-19 00:39:28'),(93,'App\\Models\\User',2,'auth_token','69a2fcaa5bbce34e75cc8070e435c285c7ff23f9fef5844f3a6496e494d39d63','[\"*\"]',NULL,NULL,'2024-10-19 00:39:50','2024-10-19 00:39:50'),(94,'App\\Models\\User',2,'auth_token','dae05291a29298b2cdd579f41b6e7bb9f05994c6ff1b3bde5e937379e57eb5c0','[\"*\"]',NULL,NULL,'2024-10-19 07:06:35','2024-10-19 07:06:35');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sku` text NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `gallery_image` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `categories_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`) USING HASH,
  KEY `categories_id` (`categories_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'T-shirte','T-shirte','<p>T-shirt</p>','products/DXLU9KZ8YV2nJCO1uLkGTm5iJtnOJ1Qbm5IAxOHS.jpg',1,'products/9A0yZt8NRy5PR1Rkt0T8eqfDjvkrIO2O260lSD4H.jpg,products/PLosuVfREm7UEJ4vaiISIvDwcHG0FG0bU0r3Cx9Y.jpg',1000.00,20,4,'2024-09-30 12:18:59','2024-10-19 08:45:19'),(2,'LG led tv te','LG-led-tv-te','<p>LG led tv</p>','products/gGBU3ot8OyFg5GgzYaKlTskGPSakkAh1tR9qNWAz.jpg',1,'products/kcOZ0Eq03N44GSVo3gFcApTOzrzjJ1Cn3hn3sUhN.jpg,products/O5kz8RXYu8XT09c3q8ABpOEBD11aWrNPFNqdaaIa.jpg',5000.00,100,3,'2024-09-30 12:20:31','2024-10-19 08:45:09'),(3,'sony computer','sony-computer','<p>sony computerv</p>','products/guOwrEFeXaoLhEnbCgs1zQt3NJhWbtuXdfAFJosF.jpg',1,'products/9A0yZt8NRy5PR1Rkt0T8eqfDjvkrIO2O260lSD4H.jpg,products/PLosuVfREm7UEJ4vaiISIvDwcHG0FG0bU0r3Cx9Y.jpg',5000.00,100,3,'2024-09-30 13:32:33','2024-09-30 19:09:04'),(4,'printer','printer','<p><strong><em>This Canon R100 Mirrorless Camera features a RF-S 18-45 mm lens, which provides a wide range of focal lengths for capturing everything from landscapes to portraits. With its mirrorless design, this camera offers fast and accurate autofocus, as well as the ability to shoot in low-light conditions. With Creative Assist Mode, Hybrid Auto Mode, and Silent Mode for Quiet Operation, this camera is sure to impress with its performance and image quality.</em></strong></p>','products/GWNoPKNOKaDpmWkvtvPhcMn7vZRZpClsx9T78G73.jpg',1,'products/iUHgWPExKvvoQQYSujhC9KxJkq8bBiUWd0CvzA0f.jpg,products/f0lq7XSe0E20eUWAYEupWhmjUlMoMcf3uar7LoaC.jpg',5000.00,100,3,'2024-10-01 13:50:49','2024-10-19 07:15:21'),(5,'Asus computer','Asus-computer','<p>Asus computer</p>','products/xKyPyZNoz5LiFETv8KfWiphk09CvzAN0WluRwtrJ.jpg',1,'products/cD5hyiLKgOMyau3YIoqm68ls1oQgdKYTVcg98mre.jpg,products/HjPmh9K8HbI47EeU8Eidfba4Q7INwsCnxJcxM2oq.jpg',40000.00,100,1,'2024-10-02 20:08:04','2024-10-19 12:25:21');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `img` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'ram','8178360198','Mayur vihar dasna , Ghaziabad UP 230128','img','test@example.com','$2y$12$5cnk2UUZ4pwtjDixk8UbKuFClIZu.zF9DXDmu0zUY0nobt4Y5d.w.',1,'2024-10-05 06:49:54','2024-10-05 06:49:54'),(3,'subham','8178360198','Mayur vihar dasna , Ghaziabad UP 230128','img','subham@gmail.com','$2y$12$Y2UnKVad5HNH5xOdwZYxLups.wKPjLttUsZQAq7xfYXlin4hCnZ1y',1,'2024-10-17 13:57:08','2024-10-17 13:57:08');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-19 19:47:06
