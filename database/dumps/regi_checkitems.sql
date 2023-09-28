-- MySQL dump 10.13  Distrib 5.7.42, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	5.7.42-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `regi_checkitems`
--

DROP TABLE IF EXISTS `regi_checkitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regi_checkitems` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `checkitem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regi_checkitems`
--

LOCK TABLES `regi_checkitems` WRITE;
/*!40000 ALTER TABLE `regi_checkitems` DISABLE KEYS */;
INSERT INTO `regi_checkitems` VALUES (1,'システム設置、DB設置、ヘッダ画像・メニュー表示・学会情報等設定',1,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(2,'カテゴリ設定',2,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(3,'領収証PDF発行機能または参加登録証PDF発行機能',3,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(4,'セミナー申込機能（無料セミナー）　※カスタマイズは含みません。',4,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(5,'セミナー申込機能（有料セミナー）　※カスタマイズは含みません。',5,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(6,'コンビニエンスストア決済・ペイジー決済（日本語版のみ設置対象）',6,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(7,'会員情報取込機能（簡易的な会員管理システムとの連携を実現）',7,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(8,'団体登録取込機能',8,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(9,'参加証明書',9,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(10,'中間DB 設定・設置（カスタマイズ対応は含みません）',10,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(11,'中間DB セミナー申込機能連携対応',11,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(12,'中間DB Web開催用ID情報の中間DB連携（IDの存在確認、API設定ほか）',12,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(13,'中間DB 連携用 中間DB設定・設置（券売機との連携対応後）',13,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(14,'Web開催IDの発行機能',14,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(15,'複数言語対応（日英バイリンガル対応）',15,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(16,'団体登録読込対応',16,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(17,'領収証PDF発行機能なし、参加登録証PDF発行機能なしの場合',17,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(18,'領収証PDF発行機能または参加登録証PDF発行機能ありの場合',18,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(19,'領収証PDF発行機能または参加登録証PDF発行機能あり、セミナー申込機能ありの場合',19,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(20,'中間DB連携用WebAPI設置（1学会につき）　参照のみ',20,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(21,'中間DB連携用WebAPI設置（1学会につき）　参照+書込',21,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(22,'中間DB連携用WebAPIランニング（会期1日につき）',22,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(23,'中間DB連携用WebAPIランニング（動画視聴サイト運用1日につき）',23,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(24,'中間DB会員テーブルへのDBアクセス用ポート開放対応（学会ごとランニング）',24,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(25,'Web開催システムでの視聴確認用テーブル設置（Attend Status設置）',25,'2023-09-27 11:22:22','2023-09-27 11:22:22');
/*!40000 ALTER TABLE `regi_checkitems` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-28  1:35:03
