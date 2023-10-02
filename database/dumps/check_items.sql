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
-- Table structure for table `check_items`
--

DROP TABLE IF EXISTS `check_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `checkitem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `machine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `first_estimate` tinyint(1) DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_items`
--

LOCK TABLES `check_items` WRITE;
/*!40000 ALTER TABLE `check_items` DISABLE KEYS */;
INSERT INTO `check_items` VALUES (1,'運用','common',1,1,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(2,'MyAbstracts','both',1,3,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(3,'MyAbstracts 外字マップメンテナンス','common',0,4,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(4,'MyAbstracts 外字作成','common',0,5,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(5,'MyAbstracts 個別調整','common',0,7,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(6,'MyAbstracts 全日程セッションの文言変更（見出し・ツメ）','common',0,6,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(7,'展示','both',1,25,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(8,'展示マップ　※100社程度想定','app',1,26,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(9,'展示「はい/いいえ」画面設置','common',1,27,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(10,'セッションアンケート・資料ダウンロード','common',1,22,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(11,'大会アンケート','common',1,23,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(12,'大会資料アップロード（インフォメーションボード）','common',1,24,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(13,'テキストダウンロード（セッションPDF/演題PDF）認証画面あり','common',1,20,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(14,'テキストダウンロード（セッションPDF/演題PDF）認証画面なし、PDFの設置、ボタン文言変更対応のみ','common',1,21,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(15,'デジタルポスター','both',1,8,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(16,'LIVE/オンデマンド','both',1,9,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(17,'有料セミナー','both',1,10,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(18,'認証付き外部リンク','both',1,12,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(19,'参加証明書','common',1,33,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(20,'質問投稿と管理機能','common',1,19,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(21,'各種ご案内','web',1,44,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(22,'広告　アプリ表紙フッター','app',0,37,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(23,'広告　アプリ起動時','app',0,38,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(24,'広告　ウェブ版左トップ　※タイルレイアウトの時のみ','web',0,39,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(25,'広告　ウェブ版左メニュー/モバイル版フッター','web',1,40,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(26,'広告　MyAb前付・後付への広告ページ差込','common',0,41,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(27,'大会フィルタ','common',1,14,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(28,'大会別抄録前PW制限','app',0,15,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(29,'分野フィルタ','common',1,16,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(30,'関連情報フィルタ','common',1,17,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(31,'日程表アイコンカスタマイズ','common',1,47,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(32,'表紙カスタマイズ','both',1,2,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(33,'文言変更','common',1,46,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(34,'日程表コマ名指定（5件以上）','app',0,43,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(35,'日程表タブ(icon・文言)変更（アプリ版）','app',0,48,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(36,'アプリ版トップからの参加登録サイト呼び出し','app',0,49,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(37,'会期5日間以上の日程表タブ調整（ウェブ版）','web',0,50,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(38,'視聴履歴','common',1,11,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(39,'共催セミナー','common',1,51,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(40,'スポンサー','common',1,34,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(41,'スポンサー一覧（HTML）　※100社程度想定','common',0,35,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(42,'プログラム一覧（タブ分けコマ表示）','common',1,52,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(43,'紙面開催（日時会場無し）','common',0,53,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(44,'各種ご案内、開催概要作成なし','app',1,45,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(46,'時間外のWeb開催ID有効化作業','common',0,54,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(47,'データ更新','both',1,55,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(48,'コンテナOSメンテ','app',1,56,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(49,'ランチョン','app',1,13,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(50,'ハイライト','both',1,28,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(51,'ハイライトトップページ','both',1,29,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(52,'ハイライトアイコン表示（共催セミナーページ）','common',1,30,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(53,'ハイライトリンク追加','common',1,31,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(54,'ハイライト表示方式追加','common',1,32,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(55,'サムネイル表示内容選択','common',1,36,'2023-08-30 17:40:00','2023-08-30 17:40:00'),(56,'リンク指定','common',1,18,'2023-08-30 17:40:00','2023-08-30 17:40:00');
/*!40000 ALTER TABLE `check_items` ENABLE KEYS */;
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