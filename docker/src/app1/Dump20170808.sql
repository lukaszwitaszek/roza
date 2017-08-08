CREATE DATABASE  IF NOT EXISTS `db_main` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `db_main`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_main
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Table structure for table `hasze`
--

DROP TABLE IF EXISTS `hasze`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hasze` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `hasz` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasze`
--

LOCK TABLES `hasze` WRITE;
/*!40000 ALTER TABLE `hasze` DISABLE KEYS */;
/*!40000 ALTER TABLE `hasze` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kolo`
--

DROP TABLE IF EXISTS `kolo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kolo` (
  `id` int(10) unsigned NOT NULL,
  `nazwa` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `zelator_id` int(11) NOT NULL,
  `rolowanie` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabela zawierajaca informacje o Kolach ZR w systemie.	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kolo`
--

LOCK TABLES `kolo` WRITE;
/*!40000 ALTER TABLE `kolo` DISABLE KEYS */;
INSERT INTO `kolo` VALUES (1,'Koło Pierwsze',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kolo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tajemnice`
--

DROP TABLE IF EXISTS `tajemnice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tajemnice` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_tajemnicy` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='opis tajemnic R';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tajemnice`
--

LOCK TABLES `tajemnice` WRITE;
/*!40000 ALTER TABLE `tajemnice` DISABLE KEYS */;
INSERT INTO `tajemnice` VALUES (1,'Tajemnica pierwsza radosna: Zwiastowanie','Opis tajmnicy zwiastowania',1,NULL,NULL);
/*!40000 ALTER TABLE `tajemnice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uczestnicy`
--

DROP TABLE IF EXISTS `uczestnicy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uczestnicy` (
  `id` int(10) unsigned NOT NULL,
  `imie` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ost_wizyta` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `zelat` tinyint(4) DEFAULT NULL,
  `kolo_id` int(11) NOT NULL,
  `nr_tajemnicy` int(2) NOT NULL,
  `ostatnia_wiadomosc` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idusers_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabela uzytkownikow systemu KZR';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uczestnicy`
--

LOCK TABLES `uczestnicy` WRITE;
/*!40000 ALTER TABLE `uczestnicy` DISABLE KEYS */;
INSERT INTO `uczestnicy` VALUES (1,'Łukasz','Witaszek','tacho25@wp.pl',NULL,'2017-07-18 12:52:11',NULL,0,0,1,1,NULL,NULL);
/*!40000 ALTER TABLE `uczestnicy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wiadomosci`
--

DROP TABLE IF EXISTS `wiadomosci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `naglowek` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `kolo_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='wiadomości przesyłane do członków systemu';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wiadomosci`
--

LOCK TABLES `wiadomosci` WRITE;
/*!40000 ALTER TABLE `wiadomosci` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiadomosci` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-08 15:18:33
