-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: initium
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `asistencia_cursos`
--

DROP TABLE IF EXISTS `asistencia_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia_cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `curso_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencia_cursos_client_id_foreign` (`client_id`),
  KEY `asistencia_cursos_curso_id_foreign` (`curso_id`),
  CONSTRAINT `asistencia_cursos_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `asistencia_cursos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia_cursos`
--

LOCK TABLES `asistencia_cursos` WRITE;
/*!40000 ALTER TABLE `asistencia_cursos` DISABLE KEYS */;
INSERT INTO `asistencia_cursos` VALUES (211,922,10,'2023-03-15 18:57:05','2023-03-15 18:57:05'),(212,972,10,'2023-03-15 20:20:13','2023-03-15 20:20:13'),(213,974,10,'2023-03-15 20:20:16','2023-03-15 20:20:16'),(214,909,10,'2023-03-15 20:20:19','2023-03-15 20:20:19'),(216,911,10,'2023-03-15 20:20:23','2023-03-15 20:20:23'),(217,912,10,'2023-03-15 20:20:27','2023-03-15 20:20:27'),(218,913,10,'2023-03-15 20:20:30','2023-03-15 20:20:30'),(219,914,10,'2023-03-15 20:20:33','2023-03-15 20:20:33'),(220,915,10,'2023-03-15 20:20:37','2023-03-15 20:20:37'),(221,916,10,'2023-03-15 20:20:40','2023-03-15 20:20:40'),(223,917,10,'2023-03-15 20:20:46','2023-03-15 20:20:46'),(224,971,10,'2023-03-15 20:20:49','2023-03-15 20:20:49'),(225,982,10,'2023-03-15 20:20:53','2023-03-15 20:20:53'),(226,918,10,'2023-03-15 20:20:56','2023-03-15 20:20:56'),(228,919,10,'2023-03-15 20:21:03','2023-03-15 20:21:03'),(229,920,10,'2023-03-15 20:21:08','2023-03-15 20:21:08'),(230,921,10,'2023-03-15 20:21:13','2023-03-15 20:21:13'),(231,923,10,'2023-03-15 20:21:21','2023-03-15 20:21:21'),(232,924,10,'2023-03-15 20:21:26','2023-03-15 20:21:26'),(233,925,10,'2023-03-15 20:21:29','2023-03-15 20:21:29'),(234,926,10,'2023-03-15 20:21:32','2023-03-15 20:21:32'),(235,927,10,'2023-03-15 20:21:46','2023-03-15 20:21:46'),(236,928,10,'2023-03-15 20:21:49','2023-03-15 20:21:49'),(237,929,10,'2023-03-15 20:21:52','2023-03-15 20:21:52'),(238,930,10,'2023-03-15 20:21:56','2023-03-15 20:21:56'),(239,973,10,'2023-03-15 20:22:00','2023-03-15 20:22:00'),(240,931,10,'2023-03-15 20:22:09','2023-03-15 20:22:09'),(241,932,10,'2023-03-15 20:22:12','2023-03-15 20:22:12'),(242,933,10,'2023-03-15 20:22:15','2023-03-15 20:22:15'),(243,934,10,'2023-03-15 20:22:21','2023-03-15 20:22:21'),(244,935,10,'2023-03-15 20:22:24','2023-03-15 20:22:24'),(245,936,10,'2023-03-15 20:22:27','2023-03-15 20:22:27'),(246,978,10,'2023-03-15 20:22:31','2023-03-15 20:22:31'),(247,938,10,'2023-03-15 20:22:39','2023-03-15 20:22:39'),(248,939,10,'2023-03-15 20:22:44','2023-03-15 20:22:44'),(249,940,10,'2023-03-15 20:22:52','2023-03-15 20:22:52'),(251,942,10,'2023-03-15 20:22:56','2023-03-15 20:22:56'),(252,943,10,'2023-03-15 20:22:59','2023-03-15 20:22:59'),(253,944,10,'2023-03-15 20:23:05','2023-03-15 20:23:05'),(254,945,10,'2023-03-15 20:23:08','2023-03-15 20:23:08'),(255,946,10,'2023-03-15 20:23:10','2023-03-15 20:23:10'),(256,947,10,'2023-03-15 20:23:13','2023-03-15 20:23:13'),(257,948,10,'2023-03-15 20:23:19','2023-03-15 20:23:19'),(258,949,10,'2023-03-15 20:23:24','2023-03-15 20:23:24'),(259,950,10,'2023-03-15 20:23:26','2023-03-15 20:23:26'),(260,951,10,'2023-03-15 20:23:29','2023-03-15 20:23:29'),(261,952,10,'2023-03-15 20:23:34','2023-03-15 20:23:34'),(262,953,10,'2023-03-15 20:23:51','2023-03-15 20:23:51'),(263,954,10,'2023-03-15 20:23:54','2023-03-15 20:23:54'),(264,955,10,'2023-03-15 20:23:56','2023-03-15 20:23:56'),(265,979,10,'2023-03-15 20:24:05','2023-03-15 20:24:05'),(266,981,10,'2023-03-15 20:24:10','2023-03-15 20:24:10'),(267,980,10,'2023-03-15 20:24:13','2023-03-15 20:24:13'),(268,956,10,'2023-03-15 20:24:16','2023-03-15 20:24:16'),(269,957,10,'2023-03-15 20:24:22','2023-03-15 20:24:22'),(270,958,10,'2023-03-15 20:24:26','2023-03-15 20:24:26'),(271,959,10,'2023-03-15 20:24:33','2023-03-15 20:24:33'),(272,960,10,'2023-03-15 20:24:35','2023-03-15 20:24:35'),(273,961,10,'2023-03-15 20:24:40','2023-03-15 20:24:40'),(274,962,10,'2023-03-15 20:24:43','2023-03-15 20:24:43'),(275,963,10,'2023-03-15 20:24:48','2023-03-15 20:24:48'),(276,964,10,'2023-03-15 20:24:52','2023-03-15 20:24:52'),(277,965,10,'2023-03-15 20:25:00','2023-03-15 20:25:00'),(278,966,10,'2023-03-15 20:25:07','2023-03-15 20:25:07'),(279,967,10,'2023-03-15 20:25:09','2023-03-15 20:25:09'),(280,968,10,'2023-03-15 20:25:13','2023-03-15 20:25:13'),(281,969,10,'2023-03-15 20:25:15','2023-03-15 20:25:15'),(282,970,10,'2023-03-15 20:25:18','2023-03-15 20:25:18'),(283,983,10,'2023-03-20 23:45:39','2023-03-20 23:45:39'),(296,914,14,'2023-03-23 18:26:10','2023-03-23 18:26:10'),(297,982,14,'2023-03-23 18:26:13','2023-03-23 18:26:13'),(299,944,14,'2023-03-23 18:43:51','2023-03-23 18:43:51'),(300,918,14,'2023-03-23 18:45:54','2023-03-23 18:45:54'),(301,919,14,'2023-03-23 18:45:57','2023-03-23 18:45:57'),(303,976,10,'2023-03-23 23:52:48','2023-03-23 23:52:48'),(304,975,10,'2023-03-23 23:53:39','2023-03-23 23:53:39'),(305,941,10,'2023-03-23 23:53:45','2023-03-23 23:53:45'),(307,915,14,'2023-03-23 23:54:39','2023-03-23 23:54:39'),(308,974,14,'2023-03-23 23:54:57','2023-03-23 23:54:57'),(311,917,14,'2023-03-24 00:50:40','2023-03-24 00:50:40'),(312,971,14,'2023-03-24 00:57:00','2023-03-24 00:57:00'),(313,966,14,'2023-03-24 01:31:22','2023-03-24 01:31:22'),(314,977,14,'2023-03-28 15:24:05','2023-03-28 15:24:05'),(315,916,14,'2023-03-28 15:24:13','2023-03-28 15:24:13');
/*!40000 ALTER TABLE `asistencia_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  `civil_status` varchar(100) DEFAULT NULL,
  `pais` varchar(100) NOT NULL DEFAULT 'Panamá',
  `accept_contract` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `occupation` varchar(250) DEFAULT NULL,
  `objectives` varchar(250) DEFAULT NULL,
  `dni` varchar(255) NOT NULL,
  `nickname` varchar(250) DEFAULT NULL,
  `place_work` varchar(250) DEFAULT NULL,
  `referrals_code` varchar(250) DEFAULT NULL,
  `question_1` varchar(250) DEFAULT NULL,
  `question_2` varchar(250) DEFAULT NULL,
  `note_1` varchar(250) DEFAULT NULL,
  `note_2` varchar(250) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `soft_delete` tinyint(1) NOT NULL DEFAULT 0,
  `reference_person` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `curso_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_user_id_foreign` (`user_id`),
  KEY `clientes_curso_id_foreign` (`curso_id`),
  CONSTRAINT `clientes_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `clientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1052 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (909,'Alexandra Vasquez -','','507 60700425 -','alexandravasquez1504@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:46','2023-03-23 17:21:45','','','','ALEXANDRA VASQUEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'SHER -',NULL,8),(910,'Annybel Aracelys','Alvarado Angulo','507 61105410','Annybel2101@gmail.com','2023-02-28','jjjj','4','jjjjj',0,'2023-03-15 18:27:46','2023-03-23 18:09:41','4444','jjjjj','544444','ANNYBEL ALVARADO -',NULL,'',NULL,NULL,NULL,NULL,'F',0,'ANAMARIA',NULL,6),(911,'Aracellys Cumbrera -','','507 64957438 -','arac_05@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:46','2023-03-23 18:10:01','','','','ARACELLYS CUMBRERA -','','',NULL,NULL,NULL,NULL,NULL,0,'AMARELLYS -',NULL,6),(912,'Arelis Donaide Amado Miranda -','','57 3008256477 -','arelisamado0206@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 18:10:05','','','','ARELIS AMADO -','','',NULL,NULL,NULL,NULL,NULL,0,'DONA -',NULL,6),(913,'Aristides Ariel Barrios Morales -','','507 66799661 -','Ab141981@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 18:11:20','','','','ARISTIDES BARRIOS -','','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,6),(914,'Barbara Danieisy Cabrera -','','504 31852304 -','barbarad.cabreras@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-21 21:39:50','','','','BARBARA CABRERA -','','',NULL,NULL,NULL,NULL,NULL,0,'GEO -',NULL,14),(915,'Bolívar Tascon -','','507 60706829 -','btascon26@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 05:46:01','','','','CHINO TASCON -','','',NULL,NULL,NULL,NULL,NULL,0,'JHON -',NULL,14),(916,'Carla Morales -','','507 61009889 -','carlasofia102010@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:11:54','','','','CARLA SOFIA MORALES -','','',NULL,NULL,NULL,NULL,NULL,0,'NANCY -',NULL,14),(917,'Carlos Luis de la Rosa Candanedo -','','507 69940284 -','carlosdrc90@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:12:00','','','','CARLOS DE LA ROSA -','','',NULL,NULL,NULL,NULL,NULL,0,'MARIELA -',NULL,14),(918,'Cecimar Martinez -','','507 61500698 -','cecimar.martinez02@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 05:46:28','','','','CECY MARTINEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'LILIA -',NULL,14),(919,'Claudina Escobar -','','507 65089303 -','claudinaescobar60@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:22:27','','','','CLAUDIN ESCOBAR -','','',NULL,NULL,NULL,NULL,NULL,0,'MIGUEL -',NULL,14),(920,'Cristian Jesús Castro -','','507 65321048 -','ayanamicastro@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:22:44','','','','FITO CASTRO -','','',NULL,NULL,NULL,NULL,NULL,0,'YESSY -',NULL,14),(921,'Dailis Ester Navarro Ospino -','','507 62590554 -','navarrodailis547@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:23:11','','','','DAILIS NAVARRO -','','',NULL,NULL,NULL,NULL,NULL,0,'LILIA -',NULL,14),(922,'Daritzel del Carmen Martínez -','','507 66858031 -','daritzel.martinez@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:23:24','','','','DARY MARTINEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'FRANK -',NULL,14),(923,'Dashmairy Cerrud -','','507 61723888 -','cerruddash@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:23:49','','','','DASHY CERRUD -','','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,14),(924,'Diego Lizano Jimenez -','','507 62664883 -','dlj1587@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:24:07','','','','DIEGO LIZANO -','','',NULL,NULL,NULL,NULL,NULL,0,'MAIRO -',NULL,14),(925,'Eloisa Montero -','','507 61551876 -','eloisa_montero@yahoo.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:24:45','','','','ELOISA MONTERO -','','',NULL,NULL,NULL,NULL,NULL,0,'ZULEYKA -',NULL,14),(926,'Elvia Castillo -','','507 69810531 -','eycastillo@copaair.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 18:22:45','','','','YARELIS CASTILLO -','','',NULL,NULL,NULL,NULL,NULL,0,'VIELKA -',NULL,11),(927,'German Jose Vera -','','507 68612518 -','germanverajr@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:27:20','','','','JOSÉ VERA -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRA -',NULL,14),(928,'Guillermo Aaron Sanchez Alzamora -','','507 66725839 -','gaaron@gasaplastic.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:27:31','','','','AARON SANCHEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'MIGUEL -',NULL,14),(929,'Heidy Luzmila Flores Pinzon -','','507 65895453 -','heidyf1425@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','PALESTINA FLORES -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEXA -',NULL,10),(930,'Ihamadis Batista -','','507 63273706 -','ihamadis15batista@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:27:39','','','','IVETTE BATISTA -','','',NULL,NULL,NULL,NULL,NULL,0,'ESTEFANY B. -',NULL,14),(931,'Jesús Eladio Suárez -','','507 62536203 -','belerofomte84@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:27:54','','','','JESÚS SUÁREZ -','','',NULL,NULL,NULL,NULL,NULL,0,'YRAIS -',NULL,14),(932,'Jonathan Javier Hernández Quijano -','','507 65638603 -','javierherna654@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:28:28','','','','ASHE HERNÁNDEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'KENNYA -',NULL,14),(933,'Jonathan Said Sánchez Rodriguez -','','507 69664818 -','jonasaid4sanchez@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:28:12','','','','JONASAID SÁNCHEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'EMILY -',NULL,14),(934,'José Luis Palacios -','',' -','Jlpm01@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:28:03','','','','JOSÉ LUIS PALACIOS -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO -',NULL,14),(935,'Julissa Arauz Ibarra -','','507 65359402 -','yuli.2098@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:28:49','','','','JULISSA ARAUZ -','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS FERNANDO -',NULL,14),(936,'Kathia del Carmen López Riasco -','','507 63472737 -','kathia.lopez@ifarhu.gob.pa-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:28:52','','','','KATHIA LÓPEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'HERNAN -',NULL,14),(937,'Kenelma Vargas Cozzarelli -','','507 66741374 -','kenycozzarelli@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','KENY VARGAS -','','',NULL,NULL,NULL,NULL,NULL,0,'YISEL -',NULL,10),(938,'Kimberly Ortega -','','507 62457412 -','maykimby27@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 05:30:37','','','','KIMBERLY ORTEGA -','','',NULL,NULL,NULL,NULL,NULL,0,'KENI -',NULL,14),(939,'Librada Rivera -','','507 66765207 -','libririvera@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:29:40','','','','LIBRI RIVERA -','','',NULL,NULL,NULL,NULL,NULL,0,'IBIS -',NULL,14),(940,'Liliana Guerrero -','','507 62744285 -','lylyanaguerrero@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:29:45','','','','LILIANA GUERRERO -','','',NULL,NULL,NULL,NULL,NULL,0,'MICHELLE -',NULL,14),(941,'Lorena Gutierrez -','','507 63975443 -','anerolg2509@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','LORENA GUTIERREZ -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO -',NULL,10),(942,'Luis Alfredo Benavides Arellano -','','507 66671626 -','luisbenaalfre@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','LUIS BENAVIDES -','','',NULL,NULL,NULL,NULL,NULL,0,'TEFI -',NULL,10),(943,'Luis Gilberto Guzman Morales -','','507 66581647 -','luisggm82@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:30:25','','','','LUIGI GUZMAN -','','',NULL,NULL,NULL,NULL,NULL,0,'ANA I. -',NULL,14),(944,'Luis Inocente Camarena García -','','507 69253100 -','camarenaluis28@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:31:50','','','','LUIS CAMARENA -','','',NULL,NULL,NULL,NULL,NULL,0,'GRISELDA -',NULL,14),(945,'Maria Cristina Sanchez -','','58 4145708777 / 507 64929935 -','crismar0823@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','MARIA CRISTINA SANCHEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'GREPSY -',NULL,10),(946,'Maria Gabriela Melendez -','','507 66913468 -','mariagmelendezg@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:32:08','','','','MARY GABY MELENDEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'RODERICK -',NULL,14),(947,'María Rebeca Alonso -','','52 5561607860 -','rebecalonso@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:32:12','','','','REBECA ALONSO -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO -',NULL,14),(948,'Michelle Marie Parchment -','','507 64973364 -','michelleparchment@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','MICHELLE MARIE PARCHMENT -','','',NULL,NULL,NULL,NULL,NULL,0,'LINETTE -',NULL,10),(949,'Miriam Darlene Rueda Morgado -','','507 62503716 -','mdar19@live.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:32:19','','','','DARLENE RUEDA -','','',NULL,NULL,NULL,NULL,NULL,0,'WILLY -',NULL,14),(950,'Moisés Enrique Justavino -','','507 69207748 -','justavinomoises5@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:32:25','','','','MOISÉS JUSTAVINO -','','',NULL,NULL,NULL,NULL,NULL,0,'LETICIA -',NULL,14),(951,'Nancy Aguilar -','','507 69672802 -','nancyaguilar626@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:32:46','','','','LARY AGUILAR -','','',NULL,NULL,NULL,NULL,NULL,0,'PRISCILA -',NULL,14),(952,'Nino Moscoso Castorina -','','507 63017862 -','ninomoscoso13@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:32:49','','','','NINO MOSCOSO -','','',NULL,NULL,NULL,NULL,NULL,0,'NATII -',NULL,14),(953,'Norelys Espinosa -','','507 64560185 -','norelysespinosa92@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:35:22','','','','NORELYS ESPINOSA -','','',NULL,NULL,NULL,NULL,NULL,0,'BRYAN -',NULL,14),(954,'Paula Andrea Mayorquino Vargas -','','507 64233963 -','Paulamayorquinov21@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:32:56','','','','PAULA MAYORQUINO -','','',NULL,NULL,NULL,NULL,NULL,0,'MARLIN -',NULL,14),(955,'Rigoberto Rene Rodriguez Avila -','','507 67352999 -','grupohipa@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','RENE AVILA -','','',NULL,NULL,NULL,NULL,NULL,0,'MILEIKA -',NULL,10),(956,'Ruben Alvarez -','','507 67104941 -','ralvarez@mayorsafety.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:33:29','','','','RUBEN ALVAREZ -','','',NULL,NULL,NULL,NULL,NULL,0,'CHARLES -',NULL,14),(957,'Saharaly Quiel -','','507 65743968 -','qsaharaly@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:33:34','','','','SAHARALY QUIEL -','','',NULL,NULL,NULL,NULL,NULL,0,'EYRA -',NULL,14),(958,'Shanelys Tays Garibaldi Maldonado -','','507 60269101 -','Shanelysgaribaldi21@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','NELYS GARIBALDI -','','',NULL,NULL,NULL,NULL,NULL,0,'LEYLA -',NULL,10),(959,'Sofía Gonzalez Arauz -','','507 62932701 -','soffgonzalez06@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:34:52','','','','SOFIA GONZALEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'RUBEN -',NULL,14),(960,'Sophia Victoria Robinson Samudio -','','507 62662644 -','robinsonsophia771@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:34:29','','','','SOFI ROBINSON -','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS FERNANDO -',NULL,14),(961,'Susana Diaz -','','507 67982917 -','susanadiaz321@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:34:25','','','','SUSANA DIAZ -','','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,14),(962,'Tatiana Moncada -','','507 68237587 -','tatimoncada11@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-20 23:40:00','','','','TATIANA MONCADA -','','',NULL,NULL,NULL,NULL,NULL,0,'HECTOR CRUZ -',NULL,14),(963,'Tomas Guardia -','','507 62688801 -','tjgguerra@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 18:09:11','','','','TOMAS GUARDIA -','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS FERNANDO -',NULL,6),(964,'Wilker León -','','507 63185322 -','wilkerleon77@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 21:47:18','','','','WILKER LEON -','','',NULL,NULL,NULL,NULL,NULL,0,'ALBA -',NULL,14),(965,'Yennyfer Quezada -','','507 63785145 -','yennyferquezada@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:34:00','','','','YE QUEZADA -','','',NULL,NULL,NULL,NULL,NULL,0,'DYAN -',NULL,14),(966,'Yinkiria Lorena Cheng Orobio -','','507 62311512 -','yinki203@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:33:56','','','','YINKIRIA CHENG -','','',NULL,NULL,NULL,NULL,NULL,0,'ODESSA -',NULL,14),(967,'Yoselin Betania Perez Perozo -','','507 65121785 -','yoselinbperez@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:33:53','','','','YOSELIN PEREZ -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO -',NULL,14),(968,'Yulissa Cedeño -','','507 62175780 -','yulissalzate@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','YUYU CEDEÑO -','','',NULL,NULL,NULL,NULL,NULL,0,'WENDY -',NULL,10),(969,'Zaara Yaheel Wittgren Pinzon -','','507 61518046 -','zaarawdt@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-20 23:34:51','','','','ZAARA Y. WITTGREN P. -','','',NULL,NULL,NULL,NULL,NULL,0,'EYRA -',NULL,14),(970,'Zadock Mitchell -','','507 63832466 -','cardiofit.zm@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:33:38','','','','MIGUE ZADOCK -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO -',NULL,14),(971,'Carlos Mauricio Giraldo Tangarife -','','507 60248551 -','procoservicios@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 21:46:31','','','','CARLOS GIRALDO -','','',NULL,NULL,NULL,NULL,NULL,0,'FRANCO -',NULL,14),(972,'Adahir Milagros Cando Castillo -','','507 67123712 -','adahircando06@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 18:09:23','','','','ADAHIR CANDO -','','',NULL,NULL,NULL,NULL,NULL,0,'AMELITH -',NULL,6),(973,'Jan Luca Reiss -','','507 63784580 -','janlucareiss@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','JAN REISS -','','',NULL,NULL,NULL,NULL,NULL,0,'IBIS -',NULL,10),(974,'Alejandra Paola Diaz Rivas -','','507 65415913 -','alepaoladiazrivas09@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 21:46:43','','','','ALE DIAZ -','','',NULL,NULL,NULL,NULL,NULL,0,'CARMEN -',NULL,14),(975,'Claudia Muñoz H. -','','507 68116101 -','claudiadenniss041891@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','CLAUDIA MUÑOZ -','','',NULL,NULL,NULL,NULL,NULL,0,'MITCH -',NULL,10),(976,'Cindylu Mileidy Vega Manrique -','','507 68959608 -','cindyluvega666@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','CINDYLU VEGA -','','',NULL,NULL,NULL,NULL,NULL,0,'GEO -',NULL,10),(977,'Carlos Aizpurua -','','507 65753906 -','caizpuruaseguros@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-24 08:19:34','','','','CARLOS AIZPURUA -','','',NULL,NULL,NULL,NULL,NULL,0,'LIMY -',NULL,14),(978,'Keely Mabel Almengor Méndez -','','507 67513054 -','almengorkeely@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','KEELY ALMENGOR -','','',NULL,NULL,NULL,NULL,NULL,0,'NELLY -',NULL,10),(979,'Rodrigo Velarde -','','507 69630888 -','rodrigoeducacion09@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 21:47:01','','','','RODRI VELARDE -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRA -',NULL,14),(980,'Rosaura Reiss -','','507 69201258 -','rosaurareiss@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','ROSY REISS -','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRA -',NULL,10),(981,'Ronald Javier Lopez Galindo -','','507 69124531 -','elflacolopez1024@hotmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','RONALD LOPEZ -','','',NULL,NULL,NULL,NULL,NULL,0,'RICARDO -',NULL,10),(982,'Carolina Salamanca -','','507 68998950 -','carolinasalamanca03@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-23 07:12:24','','','','CARITO SALAMANCA -','','',NULL,NULL,NULL,NULL,NULL,0,'ANAMARÍA -',NULL,14),(983,'Geraldine Shantal Jaimes Roman -','','507 62057207 -','Geraldinejaimes05@gmail.con-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-20 23:49:30','','','','SHANTY JAIMES -','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS C. -',NULL,14),(984,'Rita Varela Rodriguez -','','507 65372887 -','ritavarela2005@gmail.com-',NULL,'','','',0,'2023-03-15 18:27:47','2023-03-15 18:27:47','','','','RITA VARELA -','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS C. -',NULL,10),(986,'mass','sasas','sasasa','mau@gmail.com','2023-03-16','sasas','2','sasas',0,'2023-03-21 16:51:47','2023-03-23 21:16:15','aospoas',NULL,'1219029',NULL,'aisoasa','986508','1','0','aisoasias','aisoaisoas','M',0,'asasas',50,8),(987,'asasasaos','saosiaosiaosio','sioasiaosioasoi','saiosaisoaiosi@gmail.com','0012-12-12','ioasiaosiaosio','2','isoaisoasioai',0,'2023-03-21 16:57:54','2023-03-21 16:57:54',NULL,NULL,'asaisoasio',NULL,'asas','9871601','0','0','asaosioasiaos','1','M',0,NULL,51,NULL),(988,'Prueba formulario','Prueba formulario','2333332','prueba@gmail.com','2023-03-21','Test','3','panama',0,'2023-03-21 21:02:02','2023-04-06 23:20:44','asdfasf','asdfasf','8-888-8888888',NULL,'asdfasef','988798','0','0',NULL,'4','M',0,'asdfasfd',53,15),(989,'oaisoaisoiao','asioasioasio','isoaisaisoaio','aosiaosiaosio@gmail.com','0012-12-12','isoaisoaisoaiso','1','iosaiosiaosoasio',0,'2023-03-23 14:01:57','2023-03-23 14:01:57','asioasoasi','aisoaisaisoaisoais','aisoaosaiosaiosasa',NULL,'ioasioasioasioas','9891933','1',NULL,'asioaisoasaosas','1','M',0,'asoiasiaosio',54,NULL),(990,'asoaisoasoaios','isodiodsiodio','sasasaosi','oaisoais@gmail.com','0012-12-12','asaiso','1','oaisoasoais',0,'2023-03-23 14:10:17','2023-03-23 18:11:12','ooio','asaosaosa','1212',NULL,'oioio','990254','1','1','asioasioasia','2','M',0,'asaosaosiaosas',55,6),(991,'oscar','as','as','sasa@gmail.com','0001-02-21','1212','1','128aoasas',0,'2023-03-24 17:23:55','2023-03-24 17:23:55','asasas','asiaosaiosias','1219',NULL,'asasas','9911694','0','0',NULL,'2','F',0,'asasasa',57,NULL),(992,'ASASAS','SASASAS','1212121212','MA@GMAIL.COM','0012-12-12','ASASA','3','SASAS',0,'2023-03-28 22:43:50','2023-03-28 22:43:50','ASAS','ASKOASKAOSKAOSAK','121212121',NULL,'ASSAS','9921465','0','0',NULL,NULL,'M',0,'ASASASASAS',58,NULL),(993,'test','test','test','test@gmai.com','2023-03-27','test','1','test',0,'2023-03-28 23:08:19','2023-03-28 23:08:19','tes','ste','test',NULL,'test','9931316','0','0',NULL,'2','F',0,'test',59,NULL),(996,'test','test','test','tesst@gmail.com','2023-03-21','test','3','test',0,'2023-03-28 23:24:55','2023-03-28 23:24:55','test','test','tsse','test','test','996451','0','0',NULL,'2','M',0,'test',63,NULL),(997,'Barbara Hernández -','','507 67305597 -','barbiehernandez20@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'EMM -',NULL,10),(998,'Eduardo Villanueva España -','','507 65503832 -','villa199210@hotmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'PEDRO -',NULL,10),(999,'Justina Marinlleli De Gracia Muñoz -','','507 6534-8096 -','neymaramv10@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MARIA -',NULL,10),(1000,'Carmen Graciela Miranda -','','507 62399596 -','elynn1109@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,10),(1001,'Deniece Newton Cuerpo -','','507 63313848 -','newtondeniece@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'RUPERT -',NULL,10),(1002,'Ida Baloco -','','507 60390287 -','idabaloco13@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'ROBERTO -',NULL,10),(1003,'Robert Alex Letoutneau -','','507 69137017 -','lxletourneau@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'YELEISHKA -',NULL,10),(1004,'Yaiseth Ruiz -','','507 61788162 -','ruizalvarez10@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,10),(1005,'Yasser Jimenez -','','507 66737428 -','yasser@aduanasjimenez.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'FERNANDO -',NULL,10),(1006,'Jesus Magallon Menchaca -','','507 65774402 -','jesus.magallon@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,10),(1007,'Maximo Gordon -','','507 69562724 -','maximogordon777@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,10),(1008,'Natalia Baccino -','','507 66126688 -','natybaccino@yahoo.com.ar-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'NATALIA -',NULL,10),(1009,'Mack Joel Mendoza Ayala -','','507 62435246 -','mjma34@hotmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'CLAY -',NULL,10),(1010,'Luis Jose Mauricio Fernandes Araujo -','','507 64302590 -','luisjm27.8@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MITCH -',NULL,10),(1011,'Miguel Alberto Chung Yau -','','507 68883103 -','miguelchung2008@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'VICTORIA -',NULL,10),(1012,'Astrid Castillo Bocanegra -','',' -','astridmc28@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'LIMY -',NULL,10),(1013,'Georgino Antonelli Biso Umaña -','','507 62253793 -','georginobiso21@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'KEVIN -',NULL,10),(1014,'Arianis Yahaira Martinez Mendoza -','','507 66747520 -','supventasch@haristmo.net-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'RUBEN -',NULL,10),(1015,'Némesis Saldaña -','','507 62116873 -','nemesissaldana@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MIKE -',NULL,10),(1016,'Ferney Mosquera Mosquera -','','507 60912155 -','licferney@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MAURICIO -',NULL,10),(1017,'Maria Teresa Moreno  -','','507 62352199 -','mariateresa@prestapanama.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'MITCH -',NULL,10),(1018,'Valery Michell Ramos González -','','507 61208670 -','ramosvalery2604@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'LILIA -',NULL,10),(1019,'Roger Alejandro Madriñán Guinto -','','507 68508435 -','ramg_23_4@hotmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'NATALIA -',NULL,10),(1020,'Ailin Lisbeth Delgado Aguilar -','','507 68162451 -','ailinlisbeth@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'JHON -',NULL,10),(1021,'Maria del Pilar Lopez -','','507 63499974 -','calipili77@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'NATALIA -',NULL,10),(1022,'Blanca Joya -','','507 62561419 -','Jblanca@servitransfcj.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'ERNESTO -',NULL,10),(1023,'Edgar Uzcátegui -','','507 68902314 -','edgaruzca@yahoo.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'JHON -',NULL,10),(1024,'Yorelanys Mayreth Rodriguez Moreno -','','507 64832926 -','ryorelanys@gmail.com','2023-04-12','kb','3','njnk',0,'2023-03-31 00:58:07','2023-04-06 14:09:17',NULL,'kknknk','mk','mau','jnjn','',NULL,NULL,'uunvg','knkn','F',0,'ESTRELLA -',NULL,10),(1025,'Eleyma Carolina Hurtado Medina -','','507 64467351 -','eleymah@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'AARON -',NULL,10),(1026,'Diznarda Castrellón -','','507 67386483 -','dizivasquez@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'ALEXANDRA -',NULL,10),(1027,'Hannah Tejedor Pitty -','','507 62587074 -','tejedorpitty@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'DIEGO -',NULL,10),(1028,'Lucero Ricord -','','507 66705931 -','luricord@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'NINO -',NULL,10),(1029,'Jorge Fernando Yearwood Cruz -','','507 62546878 -','jyearwood02@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'CARLOS -',NULL,10),(1030,'Daid Othon -','','507 62177981 -','daidothon4@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'IVETTE -',NULL,10),(1031,'Andrés Vega -','','507 61130492 -','vegaandres0381@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'JONASAID -',NULL,10),(1032,'Yarelis Yaizareth Dixon Cedeño -','','507 63414163 -','dyarelis182@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'KIMBERLY -',NULL,10),(1033,'Itzelia Hervey Valencia -','','507 66856518 -','itzeliah@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'FITO -',NULL,10),(1034,'Linette Rivera -','','507 67227783 -','linette.rivera2@gmail.com-',NULL,'','','',0,'2023-03-31 00:58:07','2023-03-31 00:58:07','','','',NULL,'','',NULL,NULL,NULL,NULL,NULL,0,'YAMI -',NULL,10),(1035,'ajandro padilla','padillo','asasas','asioa@gmail.com','0012-12-12','asasa','1','sasass',0,'2023-04-06 16:17:16','2023-04-06 16:17:16','aas','saoskasas','asiaosiaos','askaoskaoskaoskaoksas','asas','10351405','0','0','askaos','3','M',0,'asokasaos',65,NULL),(1036,'aksaoskaosko','ksaoksaskaosko','skaoskaoskasoka','sasasasa@gmail.com','0121-12-12','asasas','1','sasas',0,'2023-04-06 16:20:40','2023-04-06 16:20:40','asasa','kokkoo','oasoasoaso','sasasas','o','10361758','0','0','okoko','3','M',0,'okooko',66,NULL),(1040,'1212221','12121212','assasasas','sass@ass.com','0121-12-12','sasas','2','sasas',0,'2023-04-06 16:57:39','2023-04-12 21:45:14','asas','asasas','asasas','sasas','assas','1040922','0','0','asasas','sasasas','F',1,'asasas',70,NULL),(1044,'sdsdsdsds','dsdsd','dsdsdsdsd','dsdsdsdsd@gmail.com','1212-12-12','dsdsds','Unido','sdsdsd',1,'2023-05-02 03:29:35','2023-05-02 03:29:35','dsdsds','sdsdsdsdsdsdsdsdsdsdsd','sdsdsd','sdsd',NULL,'10441420','0','0','sdsdsds','sdsdsds','femenino',0,'sdsdsdsdsd',77,NULL),(1045,'asasasasa','sasasasa','sasasasa','xsdoskdosdksodkok@gmail.com','0111-11-11','asasasas','viudo','sasasasa',1,'2023-05-02 14:26:02','2023-05-02 14:26:02','asasas','asasa','xcsdsdsdsdsdsd','asasasas',NULL,'10451788','1','1','asas','asasass','masculino',0,'asasas',78,NULL),(1051,'asasasasa','asasasa','sasasasas','maur28363429rd@gmail.com','0012-12-12','ssasasas','divorciado','asasasas',1,'2023-05-02 15:55:47','2023-05-02 15:55:47','asasasas','asasas','sasas','asasas',NULL,'1051403','1','1','asasas','asasasasasa','femenino',0,'asasasas',84,NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `price` double(30,2) NOT NULL DEFAULT 0.00,
  `url_image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `init_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cursos_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (6,'2023-01-27 19:20:04','2023-03-23 07:36:58','Curso fase 1',100.00,NULL,'Descripcion','2023-01-27','2023-03-04',NULL),(8,'2023-01-28 00:19:57','2023-01-28 00:19:57','SEG 66',1550.00,NULL,NULL,'2023-02-01','2023-08-27',NULL),(9,'2023-01-31 01:09:37','2023-01-31 01:09:37','SIC 65',625.00,NULL,'SIC 65','2023-03-01','2023-03-05',NULL),(10,'2023-01-31 01:12:23','2023-03-15 00:14:54','ECI 65',625.00,NULL,'ECI 65','2023-03-15','2023-03-19',NULL),(11,'2023-01-31 01:13:07','2023-01-31 01:13:07','GOL 65',300.00,NULL,'GOL 65','2023-03-01','2023-03-05',NULL),(12,'2023-02-07 21:58:48','2023-02-07 21:58:48','GOL 64 (next)',300.00,NULL,'Gol 64 inicia viernes 10','2023-02-10','2023-05-07',NULL),(14,'2023-03-20 23:23:45','2023-03-20 23:23:45','Gol next 65',300.00,NULL,'Gol next 65','2023-03-24','2023-07-23',NULL),(15,'2023-03-20 23:24:24','2023-03-20 23:24:24','SIC 66',625.00,NULL,'SIC 66','2023-04-12','2023-07-16',NULL),(16,'2023-04-10 22:07:20','2023-04-11 02:43:06','SIC 67',625.00,NULL,NULL,'2023-01-13','2023-01-20',NULL);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dias_curso_clientes`
--

DROP TABLE IF EXISTS `dias_curso_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dias_curso_clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `llego` tinyint(1) NOT NULL DEFAULT 0,
  `curso_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dias_curso_clientes_client_id_foreign` (`client_id`),
  KEY `dias_curso_clientes_curso_id_foreign` (`curso_id`),
  CONSTRAINT `dias_curso_clientes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `dias_curso_clientes_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias_curso_clientes`
--

LOCK TABLES `dias_curso_clientes` WRITE;
/*!40000 ALTER TABLE `dias_curso_clientes` DISABLE KEYS */;
INSERT INTO `dias_curso_clientes` VALUES (20,922,1,10,'2023-03-15 18:30:29','2023-03-15 18:30:29'),(21,956,1,10,'2023-03-15 18:30:47','2023-03-15 18:30:47'),(22,941,1,10,'2023-03-15 18:31:06','2023-03-15 18:31:06'),(23,969,1,10,'2023-03-15 18:31:26','2023-03-15 18:31:26'),(24,910,1,10,'2023-03-15 18:31:44','2023-03-15 18:31:44'),(25,982,1,10,'2023-03-15 18:32:02','2023-03-15 18:32:02'),(26,929,1,10,'2023-03-15 18:32:50','2023-03-15 18:32:50'),(27,943,1,10,'2023-03-15 18:33:27','2023-03-15 18:33:27'),(28,962,1,10,'2023-03-15 18:33:46','2023-03-15 18:33:46'),(29,980,1,10,'2023-03-15 18:34:02','2023-03-15 18:34:02'),(30,953,1,10,'2023-03-15 18:34:13','2023-03-15 18:34:13'),(31,984,1,10,'2023-03-15 18:34:41','2023-03-15 18:34:41'),(32,921,1,10,'2023-03-15 18:34:56','2023-03-15 18:34:56'),(33,945,1,10,'2023-03-15 18:35:13','2023-03-15 18:35:13'),(34,909,1,10,'2023-03-15 18:35:28','2023-03-15 18:35:28'),(35,944,1,10,'2023-03-15 18:35:51','2023-03-15 18:35:51'),(36,957,1,10,'2023-03-15 18:36:20','2023-03-15 18:36:20'),(37,938,1,10,'2023-03-15 18:36:25','2023-03-15 18:36:25'),(39,914,1,10,'2023-03-15 18:37:22','2023-03-15 18:37:22'),(40,978,1,10,'2023-03-15 18:37:44','2023-03-15 18:37:44'),(41,968,1,10,'2023-03-15 18:38:06','2023-03-15 18:38:06'),(42,936,1,10,'2023-03-15 18:38:22','2023-03-15 18:38:22'),(43,947,1,10,'2023-03-15 18:38:37','2023-03-15 18:38:37'),(44,955,1,10,'2023-03-15 18:39:09','2023-03-15 18:39:09'),(45,920,1,10,'2023-03-15 18:39:23','2023-03-15 18:39:23'),(46,927,1,10,'2023-03-15 18:39:43','2023-03-15 18:39:43'),(47,959,1,10,'2023-03-15 18:40:01','2023-03-15 18:40:01'),(48,930,1,10,'2023-03-15 18:40:46','2023-03-15 18:40:46'),(49,965,1,10,'2023-03-15 18:40:57','2023-03-15 18:40:57'),(50,954,1,10,'2023-03-15 18:43:54','2023-03-15 18:43:54'),(51,946,1,10,'2023-03-15 18:44:03','2023-03-15 18:44:03'),(52,950,1,10,'2023-03-15 18:44:57','2023-03-15 18:44:57'),(53,916,1,10,'2023-03-15 18:45:13','2023-03-15 18:45:13'),(54,974,1,10,'2023-03-15 18:46:51','2023-03-15 18:46:51'),(55,917,1,10,'2023-03-15 18:47:14','2023-03-15 18:47:14'),(56,912,1,10,'2023-03-15 18:49:47','2023-03-15 18:49:47'),(57,981,1,10,'2023-03-15 18:56:34','2023-03-15 18:56:34'),(58,918,1,10,'2023-03-15 18:57:14','2023-03-15 18:57:14'),(59,923,1,10,'2023-03-15 18:58:06','2023-03-15 18:58:06'),(60,961,1,10,'2023-03-15 18:58:21','2023-03-15 18:58:21'),(61,973,1,10,'2023-03-15 19:00:30','2023-03-15 19:00:30'),(62,958,1,10,'2023-03-15 19:01:58','2023-03-15 19:01:58'),(63,915,1,10,'2023-03-15 19:02:25','2023-03-15 19:02:25'),(64,939,1,10,'2023-03-15 19:02:36','2023-03-15 19:02:36'),(65,919,1,10,'2023-03-15 19:02:46','2023-03-15 19:02:46'),(66,926,1,10,'2023-03-15 19:04:19','2023-03-15 19:04:19'),(67,975,1,10,'2023-03-15 19:20:43','2023-03-15 19:20:43'),(68,972,1,10,'2023-03-15 20:36:32','2023-03-15 20:36:32'),(69,972,1,10,'2023-03-23 02:30:39','2023-03-23 02:30:39'),(70,974,1,10,'2023-03-23 02:53:13','2023-03-23 02:53:13'),(72,916,1,14,'2023-03-23 18:24:24','2023-03-23 18:24:24'),(73,917,1,14,'2023-03-23 18:47:17','2023-03-23 18:47:17'),(74,918,1,14,'2023-03-23 18:47:21','2023-03-23 18:47:21'),(75,914,1,14,'2023-03-23 18:47:24','2023-03-23 18:47:24'),(76,915,1,14,'2023-03-23 18:47:30','2023-03-23 18:47:30'),(77,936,1,14,'2023-03-23 18:48:01','2023-03-23 18:48:01'),(78,977,1,10,'2023-03-23 23:53:56','2023-03-23 23:53:56'),(79,976,1,10,'2023-03-23 23:54:00','2023-03-23 23:54:00'),(80,975,1,10,'2023-03-23 23:54:03','2023-03-23 23:54:03'),(81,974,1,14,'2023-03-23 23:54:53','2023-03-23 23:54:53');
/*!40000 ALTER TABLE `dias_curso_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etapas`
--

DROP TABLE IF EXISTS `etapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etapas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` double(30,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `init_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etapas_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etapas`
--

LOCK TABLES `etapas` WRITE;
/*!40000 ALTER TABLE `etapas` DISABLE KEYS */;
INSERT INTO `etapas` VALUES (1,'GOL',1250.00,'2023-01-20 23:44:18','2023-01-20 23:44:18',NULL,NULL),(2,'SEG',1250.00,'2023-01-20 23:45:42','2023-01-20 23:45:42',NULL,NULL),(3,'ECI',1250.00,'2023-01-20 23:45:57','2023-01-20 23:45:57',NULL,NULL);
/*!40000 ALTER TABLE `etapas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_curso_clients`
--

DROP TABLE IF EXISTS `historial_curso_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_curso_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `curso_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historial_curso_clients_client_id_foreign` (`client_id`),
  KEY `historial_curso_clients_curso_id_foreign` (`curso_id`),
  CONSTRAINT `historial_curso_clients_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `historial_curso_clients_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_curso_clients`
--

LOCK TABLES `historial_curso_clients` WRITE;
/*!40000 ALTER TABLE `historial_curso_clients` DISABLE KEYS */;
INSERT INTO `historial_curso_clients` VALUES (2,990,15,'2023-03-23 14:10:17','2023-03-23 14:10:17'),(3,990,11,'2023-03-23 14:12:31','2023-03-23 14:12:31'),(4,990,14,'2023-03-23 14:21:20','2023-03-23 14:21:20'),(5,909,8,'2023-03-23 17:21:45','2023-03-23 17:21:45'),(6,963,6,'2023-03-23 18:09:11','2023-03-23 18:09:11'),(7,972,6,'2023-03-23 18:09:23','2023-03-23 18:09:23'),(8,910,6,'2023-03-23 18:09:41','2023-03-23 18:09:41'),(9,911,6,'2023-03-23 18:10:01','2023-03-23 18:10:01'),(10,912,6,'2023-03-23 18:10:05','2023-03-23 18:10:05'),(11,990,6,'2023-03-23 18:11:12','2023-03-23 18:11:12'),(12,913,6,'2023-03-23 18:11:20','2023-03-23 18:11:20'),(13,926,11,'2023-03-23 18:22:45','2023-03-23 18:22:45'),(16,986,8,'2023-03-23 21:16:15','2023-03-23 21:16:15'),(17,971,14,'2023-03-23 21:46:31','2023-03-23 21:46:31'),(18,974,14,'2023-03-23 21:46:43','2023-03-23 21:46:43'),(19,979,14,'2023-03-23 21:47:01','2023-03-23 21:47:01'),(20,964,14,'2023-03-23 21:47:18','2023-03-23 21:47:18'),(21,977,14,'2023-03-24 08:19:34','2023-03-24 08:19:34'),(22,991,NULL,'2023-03-24 17:23:55','2023-03-24 17:23:55'),(23,992,NULL,'2023-03-28 22:43:50','2023-03-28 22:43:50'),(24,993,NULL,'2023-03-28 23:08:19','2023-03-28 23:08:19'),(27,996,NULL,'2023-03-28 23:24:55','2023-03-28 23:24:55'),(28,997,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(29,998,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(30,999,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(31,1000,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(32,1001,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(33,1002,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(34,1003,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(35,1004,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(36,1005,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(37,1006,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(38,1007,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(39,1008,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(40,1009,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(41,1010,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(42,1011,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(43,1012,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(44,1013,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(45,1014,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(46,1015,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(47,1016,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(48,1017,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(49,1018,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(50,1019,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(51,1020,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(52,1021,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(53,1022,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(54,1023,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(55,1024,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(56,1025,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(57,1026,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(58,1027,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(59,1028,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(60,1029,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(61,1030,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(62,1031,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(63,1032,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(64,1033,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(65,1034,10,'2023-03-31 00:58:07','2023-03-31 00:58:07'),(66,1035,NULL,'2023-04-06 16:17:16','2023-04-06 16:17:16'),(67,1036,NULL,'2023-04-06 16:20:40','2023-04-06 16:20:40'),(71,1040,NULL,'2023-04-06 16:57:39','2023-04-06 16:57:39'),(75,988,15,'2023-04-06 23:20:44','2023-04-06 23:20:44'),(76,1044,NULL,'2023-05-02 03:29:35','2023-05-02 03:29:35'),(77,1045,NULL,'2023-05-02 14:26:02','2023-05-02 14:26:02'),(83,1051,NULL,'2023-05-02 15:55:47','2023-05-02 15:55:47');
/*!40000 ALTER TABLE `historial_curso_clients` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_11_000000_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_01_15_125412_create_categorias_table',1),(7,'2023_01_15_125607_create_sub_categorias_table',1),(8,'2023_01_15_125700_create_grupos_table',1),(9,'2023_01_15_125719_create_cursos_table',1),(10,'2023_01_15_125807_create_orders_table',1),(11,'2023_01_15_132240_create_payments_table',1),(12,'2023_01_15_135627_create_suscripciones_table',1),(13,'2023_01_15_135847_create_notifies_table',1),(14,'2023_01_20_195837_create_clientes_table',1),(15,'2023_01_20_201108_create_etapas_table',1),(16,'2023_01_20_201230_add_etapa_in_suscripciones',1),(17,'2023_01_20_203358_add_duration',1),(18,'2023_01_23_171735_user_recovery',2),(19,'2023_01_23_215949_add_data_clientes',3),(20,'2023_01_24_145736_add_data_cursos',4),(21,'2023_01_26_200936_add_data_orders',5),(22,'2023_01_27_003227_add_new_data_order',6),(23,'2023_01_27_003735_add_data_payments',6),(24,'2023_01_27_010754_add_new_data_order_curso',7),(25,'2023_01_30_153630_add_pending_order',8),(26,'2023_02_01_003551_add_status_cursos',9),(27,'2023_02_08_212216_create_asistencia_cursos_table',10),(28,'2023_02_08_223250_delete_assist_assist',11),(29,'2023_02_11_125506_add_soft_delete',12),(30,'2023_02_23_164459_clientes_add_reference',13),(31,'2023_02_27_185945_add_role_id_user',14),(32,'2023_03_01_131048_add_user_id_cliente',15),(33,'2023_03_07_182646_create_dias_curso_clientes_table',16),(34,'2023_03_09_160250_add_curso_id',17),(35,'2023_03_23_104248_create_historial_curso_clients_table',18),(36,'2023_03_23_163255_add_image',19),(37,'2023_04_11_110938_gol_add',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifies`
--

DROP TABLE IF EXISTS `notifies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `body` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifies`
--

LOCK TABLES `notifies` WRITE;
/*!40000 ALTER TABLE `notifies` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `price` double(30,2) DEFAULT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` varchar(250) DEFAULT NULL,
  `curso_id` bigint(20) unsigned DEFAULT NULL,
  `pending` double(30,2) DEFAULT NULL,
  `img_url` text DEFAULT NULL,
  `gol` varchar(200) NOT NULL DEFAULT 'No definido',
  PRIMARY KEY (`id`),
  KEY `orders_client_id_foreign` (`client_id`),
  KEY `orders_curso_id_foreign` (`curso_id`),
  CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `orders_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (286,'2023-03-20 23:25:20','2023-03-20 23:25:20',NULL,909,300.00,0,'2',14,300.00,NULL,'No definido'),(289,'2023-03-21 21:08:43','2023-03-21 21:08:43',NULL,988,625.00,0,'1',10,625.00,NULL,'No definido'),(290,'2023-03-23 02:19:49','2023-03-23 02:19:49',NULL,909,300.00,0,'1',11,300.00,NULL,'No definido'),(291,'2023-03-23 02:20:30','2023-03-23 02:20:30',NULL,909,625.00,0,'2',10,625.00,NULL,'No definido'),(292,'2023-03-23 02:21:13','2023-03-23 02:21:13',NULL,909,100.00,0,'1',6,100.00,NULL,'No definido'),(293,'2023-03-23 14:12:31','2023-03-23 14:12:31',NULL,990,300.00,0,'1',11,300.00,NULL,'No definido'),(294,'2023-03-23 18:10:51','2023-03-23 18:10:51',NULL,913,300.00,0,'1',14,300.00,NULL,'No definido'),(298,'2023-03-23 21:23:13','2023-03-23 21:23:13',NULL,971,1550.00,0,'1',8,1550.00,NULL,'No definido'),(299,'2023-03-23 21:37:05','2023-03-23 21:37:05',NULL,971,1550.00,0,'1',8,1550.00,NULL,'No definido'),(300,'2023-03-23 21:37:53','2023-03-23 21:37:53',NULL,971,1550.00,0,'1',8,1550.00,NULL,'No definido'),(301,'2023-03-24 01:54:55','2023-03-24 01:54:55',NULL,910,1550.00,0,'1',8,1550.00,NULL,'No definido');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `total` double(30,2) DEFAULT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT 0,
  `method` varchar(250) DEFAULT NULL,
  `file` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  KEY `payments_client_id_foreign` (`client_id`),
  CONSTRAINT `payments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2023-01-20 23:49:41','2023-01-20 23:49:41'),(2,'empresa','2023-01-20 23:49:41','2023-01-20 23:49:41'),(3,'cliente','2023-01-20 23:49:41','2023-01-20 23:49:41'),(4,'acreditador','2023-02-01 03:18:45','2023-02-01 03:18:45'),(5,'couch','2023-02-23 04:20:47','2023-02-23 04:20:47'),(6,'capitan','2023-02-23 04:20:51','2023-02-23 04:20:51'),(7,'participante','2023-02-23 04:20:58','2023-02-23 04:20:58'),(8,'graduado','2023-03-06 22:58:01','2023-03-06 22:58:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categorias`
--

DROP TABLE IF EXISTS `sub_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `categoria_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_categorias_name_unique` (`name`),
  KEY `sub_categorias_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `sub_categorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categorias`
--

LOCK TABLES `sub_categorias` WRITE;
/*!40000 ALTER TABLE `sub_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripciones`
--

DROP TABLE IF EXISTS `suscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suscripciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `etapa_id` bigint(20) unsigned DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `suscripciones_client_id_foreign` (`client_id`),
  KEY `suscripciones_etapa_id_foreign` (`etapa_id`),
  CONSTRAINT `suscripciones_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `suscripciones_etapa_id_foreign` FOREIGN KEY (`etapa_id`) REFERENCES `etapas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripciones`
--

LOCK TABLES `suscripciones` WRITE;
/*!40000 ALTER TABLE `suscripciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `suscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recovery_cod` varchar(10) DEFAULT NULL,
  `curso_actual_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_curso_actual_id_foreign` (`curso_actual_id`),
  CONSTRAINT `users_curso_actual_id_foreign` FOREIGN KEY (`curso_actual_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (15,'acreditador','acreditador2@gmail.com',NULL,'$2y$10$EgeYz/K0VbonE796C1a9kuxl6YTeW0RItA4hyktkOkKQ178m8SiYi',1,4,NULL,'2023-02-10 02:30:00','2023-02-23 16:40:31',NULL,NULL),(16,'cliente','cliente@gmail.com',NULL,'$2y$10$J21YHdhQSAAGe4fIJwXnJu07Ky9A6YHSZMykGFU2SWBxYu1JsFa8m',1,3,NULL,'2023-02-16 18:04:17','2023-02-23 16:40:31',NULL,NULL),(17,'Leo','leonardojosehe@gmail.com',NULL,'$2y$10$qPo5k430t4WDVr66FcWxVeKbcY/4/jupf.Q4tWI7xShQa830RTsM.',1,3,NULL,'2023-02-22 23:47:09','2023-02-24 23:49:55','',NULL),(20,'admin','admin@gmail.com',NULL,'$2y$10$mdjpywl5w1Oy7cDkRNwNw.QLi0CqtZbceWC5sVpKuruqdhhhCCJ2u',1,1,NULL,'2023-02-23 16:28:58','2023-02-23 16:40:31',NULL,NULL),(22,'Coach','leonardojosehe+11@gmail.com',NULL,'$2y$10$34AjwV3REH0IuG.Q/ArgJuCOcwG2Dd5oz8AZY0bPJ3.QJjKzW3w0y',1,5,NULL,'2023-02-23 17:48:51','2023-02-23 17:48:51',NULL,NULL),(23,'Capitan','leonardojosehe+12@gmail.com',NULL,'$2y$10$iDWvMpMd405GJxIfPDyAW.oDMUNeGV10n.HUwIleSyyXtY3SckW1e',1,6,NULL,'2023-02-23 17:49:24','2023-02-23 17:49:24',NULL,NULL),(24,'Participante','leonardojosehe+13@gmail.com',NULL,'$2y$10$dUOA28F6iu2iha8fEf2x.eyZdsTBWPZgQ3GyT8uG5M10aYjSH0plq',1,7,NULL,'2023-02-23 17:49:51','2023-02-23 19:12:05','',NULL),(25,'leo','leonardojosehe+14@gmail.com',NULL,'$2y$10$FcMfOfOoEbgb2VS72MsVPuOiKc3Gn0ZBWnUSVLSoJYwBuMrVQV.Ba',0,3,NULL,'2023-02-24 01:11:12','2023-02-28 15:35:21',NULL,NULL),(32,'Mauricio','maur2836342229rd@gmail.com',NULL,'$2y$10$zwIHS1G1KtePGpkIm6hYp.84z26qjP.B7S13coTDhGdxbemBFOwfq',0,7,NULL,'2023-03-01 18:25:24','2023-03-01 18:25:24',NULL,9),(34,'Mauricio Reyes','maur28396342229rd@gmail.com',NULL,'$2y$10$kLESTHzH1.nyhod0u/LSv.0KzZMrd0pTj7/1LmoclB9dF4sJI9kgO',0,7,NULL,'2023-03-01 18:27:42','2023-03-01 18:27:42',NULL,9),(35,'example example','exampleexample@gmail.com',NULL,'$2y$10$CbA0dAlcZCUPtPUKGDlyhuJQOcczuPBma7jkWkbkKPIklebG0hXFa',0,7,NULL,'2023-03-01 21:03:26','2023-03-01 21:03:26',NULL,9),(36,'example example','exam112pleexample@gmail.com',NULL,'$2y$10$hvhlqgColrg5kCeKNG/G7.iE4l4Qh086mLavN2bB7FNbzrXKOZk5y',1,7,NULL,'2023-03-01 22:02:10','2023-03-01 22:03:40',NULL,9),(37,'Yani Alvarez','lalla@gmai.com',NULL,'$2y$10$4snuxguRQeU0hcENtZqRc.ohks9.0hNpJxAk528VaRMNmLnhb7DWi',0,7,NULL,'2023-03-02 02:07:56','2023-03-02 02:07:56',NULL,9),(38,'jose luis palacios miranda','asfsafasd@gmail.com',NULL,'$2y$10$gFUq4yUD4dk620BSOYPB8.LuPdEsurxH.vYyxLqQpBB/BpoIUR93W',0,7,NULL,'2023-03-02 02:08:47','2023-03-02 02:08:47',NULL,9),(39,'aylene maclean','asdfas@gmail.com',NULL,'$2y$10$GTP2QJ2weLsPQKQH9khbMe.INGm7YRalcgiOqF80XTtUUy8RTeeOq',0,7,NULL,'2023-03-02 02:09:33','2023-03-02 02:09:33',NULL,9),(40,'Eduardo Alonso Pacheco Lay','asdfd@gmail.com',NULL,'$2y$10$48fEuyzoZDcD.dYXCtRUge1Fyo7ZXRv3CeuXwUBKu.PMBMEwdvrEW',0,7,NULL,'2023-03-02 02:10:30','2023-03-02 02:10:30',NULL,9),(41,'Migue zadok','test@gmail.com',NULL,'$2y$10$DHQSwzdvOuEWuvRt2EAv7uq5zwtG1eyQxv2yOI4/vAUR3zdj28pYK',0,7,NULL,'2023-03-02 02:33:11','2023-03-02 02:33:11',NULL,9),(42,'Nuevo Participante','leonardojosehe+15@gmail.com',NULL,'$2y$10$.Ka5NZwCevdHwjciZTr5N.Xngp9jz17MlHz7NCREtnOfq6840wPeG',0,7,NULL,'2023-03-02 19:38:09','2023-03-02 19:38:09',NULL,9),(43,'Participante Dos','leonardojosehe+16@gmail.com',NULL,'$2y$10$Df1IVFFpI7tt0WwaudLgruhexfZP8jtmcVmmoEES/TkiDjJ5XGpua',0,7,NULL,'2023-03-02 19:44:56','2023-03-02 19:44:56',NULL,9),(44,'Paticipante Tres','leonardojosehe+20@gmail.com',NULL,'$2y$10$aNFEQmwXb9nnuTEZ.aw6/OAZJ94uALP/aEGK2MD6.R0hb7uxgtQVu',1,7,NULL,'2023-03-02 23:10:27','2023-03-02 23:17:11',NULL,9),(45,'Participante Cuatro','leonadojosehe+22@gmail.com',NULL,'$2y$10$6QVxJhMh/fGd9p6ioV/7ceCFTZj0NSLQ.aXwI3iUOorM7axfyshly',1,7,NULL,'2023-03-03 00:52:38','2023-03-03 00:54:41',NULL,9),(50,'mass sasas','mau@gmail.com',NULL,'$2y$10$bh/bTyttC94igD67jaeQH.8Hy.Gc.SqVNrtvYsueS4WyJpDOCm9Le',0,7,NULL,'2023-03-21 16:51:47','2023-03-21 16:51:47',NULL,15),(51,'asasasaos saosiaosiaosio','saiosaisoaiosi@gmail.com',NULL,'$2y$10$5D2C/w4SyBawtKNPOm9Fg.G6HXFSQF075FB3CuOD6qqzncUEIa1sO',0,7,NULL,'2023-03-21 16:57:54','2023-03-21 16:57:54',NULL,15),(53,'Prueba formulario Prueba formulario','prueba@gmail.com',NULL,'$2y$10$Mck6aGRMaYcf7mQnNorXReAbuORBV3ZDX8iKDzPD8FfP8b2DNpmRW',0,7,NULL,'2023-03-21 21:02:02','2023-03-21 21:02:02',NULL,15),(54,'oaisoaisoiao asioasioasio','aosiaosiaosio@gmail.com',NULL,'$2y$10$ZxVtC2g2GMG5p/y5llfxWuSzXJuwGHOQLllX4zzyC2SKip1GAVWKG',0,7,NULL,'2023-03-23 14:01:57','2023-03-23 14:01:57',NULL,15),(55,'asoaisoasoaios isodiodsiodio','oaisoais@gmail.com',NULL,'$2y$10$sjo6.m3fW5q.CxR7dJbhXu/j1kueBB7XGy2LBlRt9csujsN/Bt0tC',0,7,NULL,'2023-03-23 14:10:17','2023-03-23 14:10:17',NULL,15),(57,'oscar as','sasa@gmail.com',NULL,'$2y$10$PjG9tnjDOemF8R0B6Orkxuto131s8SM1r.kSXDTptraZb9kGxpcb6',0,7,NULL,'2023-03-24 17:23:55','2023-03-24 17:23:55',NULL,NULL),(58,'ASASAS SASASAS','MA@GMAIL.COM',NULL,'$2y$10$8VRlTvIxdURWYVtUUNlfauuC4DE9SqcXzWaiKhSW04xYf0ZbWcqc.',0,7,NULL,'2023-03-28 22:43:50','2023-03-28 22:43:50',NULL,NULL),(59,'test test','test@gmai.com',NULL,'$2y$10$LVDFE1h7gaOD91FdLrotEuHxCo2k2szeK9Ytcie92tf1gmbDrjkty',0,7,NULL,'2023-03-28 23:08:19','2023-03-28 23:08:19',NULL,NULL),(63,'test test','tesst@gmail.com',NULL,'$2y$10$gF93gyiWMfUwcaud7Ahkhu5L.rwf2ZBOYr3U4gSWnay84lWXaQDyK',0,7,NULL,'2023-03-28 23:24:55','2023-03-28 23:24:55',NULL,NULL),(65,'ajandro padilla padillo','asioa@gmail.com',NULL,'$2y$10$5eMfSnOA8QNgSKgfg3GEjOj/xYRnELlDaEmFOohyhEgQuI9zLWFEK',0,7,NULL,'2023-04-06 16:17:16','2023-04-06 16:17:16',NULL,NULL),(66,'aksaoskaosko ksaoksaskaosko','sasasasa@gmail.com',NULL,'$2y$10$hbsJOCEJ3A4oFl7xHv89he85wwxcdgaRLcUW7IlMtb.73dpDaGJ96',0,7,NULL,'2023-04-06 16:20:40','2023-04-06 16:20:40',NULL,NULL),(70,'1212221 12121212','sass@ass.com',NULL,'$2y$10$FwlZQoWpgpwEvqY8o0L5tuZ4Tl7vAhV1seSMJyCaZYHQdtg0DD3sm',0,7,NULL,'2023-04-06 16:57:39','2023-04-06 16:57:39',NULL,NULL),(76,'Pedro','pedrointlife@gmail.com',NULL,'$2y$10$uKDJwnvjuuFDTXo119wRG.BB6bCvEdzZ1Es4Q5InLrr6uKXj5ZFJy',1,1,NULL,'2023-04-12 21:43:12','2023-04-12 21:43:12',NULL,NULL),(77,'sdsdsdsds dsdsd','dsdsdsdsd@gmail.com',NULL,'$2y$10$U7g9fgiza/XY9159vNnAfeitE2noEoplEa9LJ1JpeSaa4FkVN/u02',0,7,NULL,'2023-05-02 03:29:35','2023-05-02 03:29:35',NULL,NULL),(78,'asasasasa sasasasa','xsdoskdosdksodkok@gmail.com',NULL,'$2y$10$Qte14UzD7e6j2UMc9Pka6OvbnbuE74dp6LQ.6iAuwv.jfsTOHZqhq',0,7,NULL,'2023-05-02 14:26:02','2023-05-02 14:26:02',NULL,NULL),(84,'asasasasa asasasa','maur28363429rd@gmail.com',NULL,'$2y$10$hGnsLPxb9y/3mUKFBb4yVeVXs9sX.MOqFsIw2ZdslR8mHTLphsTMC',0,7,NULL,'2023-05-02 15:55:47','2023-05-02 15:55:47',NULL,NULL),(85,'example','mau123@gmail.com',NULL,'$2y$10$hwlyLNZBHqVdgh0WQAnoduqg31XfmiYkUcDwcxbZn3aG2cRxcBIci',0,7,NULL,'2023-05-12 16:17:58','2023-05-12 16:17:58',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-17 10:21:36
