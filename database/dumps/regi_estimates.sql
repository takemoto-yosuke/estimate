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
-- Table structure for table `regi_estimates`
--

DROP TABLE IF EXISTS `regi_estimates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regi_estimates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_prise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkitem_id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regi_estimates`
--

LOCK TABLES `regi_estimates` WRITE;
/*!40000 ALTER TABLE `regi_estimates` DISABLE KEYS */;
INSERT INTO `regi_estimates` VALUES (1,1,'システム設置、DB設置、ヘッダ画像・メニュー表示・学会情報等設定','1','式','150000','150000',1,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(2,1,'基本設定（サイト設定、申込カテゴリ設定、公開日時設定）',NULL,NULL,NULL,NULL,1,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(3,1,'搭載管理機能（各種自動応答メール設定、一斉送信メール設定）',NULL,NULL,NULL,NULL,1,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(4,1,'カテゴリ設定','1','人日','35000','35000',2,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(5,2,'領収証PDF発行機能または参加登録証PDF発行機能','1','式','50000','50000',3,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(6,2,'セミナー申込機能（無料セミナー）　※カスタマイズは含みません。','1','式','100000','100000',4,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(7,2,'セミナー申込機能（有料セミナー）　※カスタマイズは含みません。','1','式','140000','140000',5,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(8,2,'コンビニエンスストア決済・ペイジー決済（日本語版のみ設置対象）','1','式','60000','60000',6,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(9,2,'会員情報取込機能（簡易的な会員管理システムとの連携を実現）','3','人日','35000','105000',7,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(10,2,'団体登録取込機能','1','式','60000','60000',8,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(11,2,'※団体登録データ読込（アカウント読込）、団体登録データ読込（参加登録読込）',NULL,NULL,NULL,NULL,8,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(12,2,'参加証明書 ※PDFのレイアウトが特殊な場合は別途御見積となる場合があります。','2','人日','35000','70000',9,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(13,2,'中間DB 設定・設置（カスタマイズ対応は含みません）','1','式','50000','50000',10,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(14,2,'中間DB セミナー申込機能連携対応','1','式','50000','50000',11,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(15,2,'中間DB Web開催用ID情報の中間DB連携（IDの存在確認、API設定ほか）','1','人日','35000','35000',12,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(16,2,'中間DB 連携用 中間DB設定・設置（券売機との連携対応後）','1','式','80000','80000',13,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(17,2,'Web開催IDの発行機能','5','人日','35000','175000',14,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(18,2,'基本対応 新規アカウント作成時、ログインIDに対して、Web開催用用ID/PWを発行',NULL,NULL,NULL,NULL,14,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(19,2,'　　　　 対応付けたWeb開催用ID/PWを画面上に表示',NULL,NULL,NULL,NULL,14,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(20,2,'　　　　 一斉送信メール及び参加登録完了メールに、Web開催用ID/PWの差込コードを用意',NULL,NULL,NULL,NULL,14,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(21,2,'複数言語対応（日英バイリンガル対応）','1','人日','35000','35000',15,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(22,2,'団体登録読込対応','1','人日','35000','35000',16,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(23,3,'領収証PDF発行機能なし、参加登録証PDF発行機能なしの場合','1','式','60000','60000',17,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(24,3,'領収証PDF発行機能または参加登録証PDF発行機能ありの場合','1','式','80000','80000',18,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(25,3,'領収証PDF発行機能または参加登録証PDF発行機能あり、セミナー申込機能ありの場合','1','式','100000','100000',19,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(26,4,'中間DB連携用WebAPI設置（1学会につき）　参照のみ','1','人日','35000','35000',20,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(27,4,'中間DB連携用WebAPI設置（1学会につき）　参照+書込','1.5','人日','35000','52500',21,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(28,4,'中間DB連携用WebAPIランニング（会期1日につき）','1','日','10000','10000',22,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(29,4,'中間DB連携用WebAPIランニング（動画視聴サイト運用1日につき）','1','日','3000','3000',23,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(30,4,'中間DB会員テーブルへのDBアクセス用ポート開放対応（学会ごとランニング）','0.5','人日','35000','17500',24,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(31,4,'Web開催システムでの視聴確認用テーブル設置（Attend Status設置）','1','人日','35000','35000',25,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(32,4,'※以下の項目を設置し、Web開催システムからの情報連携あり',NULL,NULL,NULL,NULL,25,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(33,4,'※Web開催システムで閲覧完了と同時に新設テーブルに値を格納',NULL,NULL,NULL,NULL,25,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(34,4,'　 Web参加ID、演題管理番号、演題登録番号、セッションNo、受講完了日、取消フラグ、備考1-10',NULL,NULL,NULL,NULL,25,0,'2023-09-27 11:22:22','2023-09-27 11:22:22'),(35,4,'※Web開催との連携動作確認（弊社のWeb開催システム運用前提）含む',NULL,NULL,NULL,NULL,25,0,'2023-09-27 11:22:22','2023-09-27 11:22:22');
/*!40000 ALTER TABLE `regi_estimates` ENABLE KEYS */;
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
