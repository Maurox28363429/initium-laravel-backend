-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: curso
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistencia_cursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned DEFAULT NULL,
  `curso_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencia_cursos_client_id_foreign` (`client_id`),
  KEY `asistencia_cursos_curso_id_foreign` (`curso_id`),
  CONSTRAINT `asistencia_cursos_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `asistencia_cursos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia_cursos`
--

LOCK TABLES `asistencia_cursos` WRITE;
/*!40000 ALTER TABLE `asistencia_cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `nacionalidad` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Panamá',
  `accept_contract` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `occupation` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objectives` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_work` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrals_code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_1` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_1` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soft_delete` tinyint(1) NOT NULL DEFAULT '0',
  `reference_person` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `curso_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_user_id_foreign` (`user_id`),
  KEY `clientes_curso_id_foreign` (`curso_id`),
  CONSTRAINT `clientes_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `clientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (3,'Adahir Milagros Cando Castillo','','507 67123712','adahircando06@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ADAHIR CANDO','','',NULL,NULL,NULL,NULL,NULL,0,'AMELITH',NULL,1),(4,'Alejandra Paola Diaz Rivas','','507 65415913','alepaoladiazrivas09@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ALE DIAZ','','',NULL,NULL,NULL,NULL,NULL,0,'CARMEN',NULL,1),(5,'Alexandra Vasquez','','507 60700425','alexandravasquez1504@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ALEXANDRA VASQUEZ','','',NULL,NULL,NULL,NULL,NULL,0,'SHER',NULL,1),(6,'Annybel Aracelys Alvarado Angulo','','507 61105410','Annybel2101@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ANNYBEL ALVARADO','','',NULL,NULL,NULL,NULL,NULL,0,'ANAMARIA',NULL,1),(7,'Aracellys Cumbrera','','507 64957438','arac_05@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ARACELLYS CUMBRERA','','',NULL,NULL,NULL,NULL,NULL,0,'AMARELLYS',NULL,1),(8,'Arelis Donaide Amado Miranda','','57 3008256477','arelisamado0206@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ARELIS AMADO','','',NULL,NULL,NULL,NULL,NULL,0,'DONA',NULL,1),(9,'Aristides Ariel Barrios Morales','','507 66799661','Ab141981@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ARISTIDES BARRIOS','','',NULL,NULL,NULL,NULL,NULL,0,'MIKE',NULL,1),(10,'Barbara Danieisy Cabrera','','504 31852304','barbarad.cabreras@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','BARBARA CABRERA','','',NULL,NULL,NULL,NULL,NULL,0,'GEO',NULL,1),(11,'Bolívar Tascon','','507 60706829','btascon26@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CHINO TASCON','','',NULL,NULL,NULL,NULL,NULL,0,'JHON',NULL,1),(12,'Carla Morales','','507 61009889','carlasofia102010@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CARLA SOFIA MORALES','','',NULL,NULL,NULL,NULL,NULL,0,'NANCY',NULL,1),(13,'Carlos Aizpurua','','507 65753906','caizpuruaseguros@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CARLOS AIZPURUA','','',NULL,NULL,NULL,NULL,NULL,0,'LIMY',NULL,1),(14,'Carlos Luis de la Rosa Candanedo','','507 69940284','carlosdrc90@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CARLOS DE LA ROSA','','',NULL,NULL,NULL,NULL,NULL,0,'MARIELA',NULL,1),(15,'Carlos Mauricio Giraldo Tangarife','','507 60248551','procoservicios@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CARLOS GIRALDO','','',NULL,NULL,NULL,NULL,NULL,0,'FRANCO',NULL,1),(16,'Carolina Salamanca','','507 68998950','carolinasalamanca03@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CARITO SALAMANCA','','',NULL,NULL,NULL,NULL,NULL,0,'ANAMARÍA',NULL,1),(17,'Cecimar Martinez','','507 61500698','cecimar.martinez02@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CECY MARTINEZ','','',NULL,NULL,NULL,NULL,NULL,0,'LILIA',NULL,1),(18,'Claudia Muñoz H.','','507 68116101','claudiadenniss041891@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CLAUDIA MUÑOZ','','',NULL,NULL,NULL,NULL,NULL,0,'MITCH',NULL,1),(19,'Claudina Escobar','','507 65089303','claudinaescobar60@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','CLAUDIN ESCOBAR','','',NULL,NULL,NULL,NULL,NULL,0,'MIGUEL',NULL,1),(20,'Cristian Jesús Castro','','507 65321048','ayanamicastro@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','FITO CASTRO','','',NULL,NULL,NULL,NULL,NULL,0,'YESSY',NULL,1),(21,'Dailis Ester Navarro Ospino','','507 62590554','navarrodailis547@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','DAILIS NAVARRO','','',NULL,NULL,NULL,NULL,NULL,0,'LILIA',NULL,1),(22,'Daritzel del Carmen Martínez','','507 66858031','daritzel.martinez@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','DARY MARTINEZ','','',NULL,NULL,NULL,NULL,NULL,0,'FRANK',NULL,1),(23,'Dashmairy Cerrud','','507 61723888','cerruddash@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','DASHY CERRUD','','',NULL,NULL,NULL,NULL,NULL,0,'MIKE',NULL,1),(24,'Diego Lizano Jimenez','','507 62664883','dlj1587@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','DIEGO LIZANO','','',NULL,NULL,NULL,NULL,NULL,0,'MAIRO',NULL,1),(25,'Eloisa Montero','','507 61551876','eloisa_montero@yahoo.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ELOISA MONTERO','','',NULL,NULL,NULL,NULL,NULL,0,'ZULEYKA',NULL,1),(26,'Elvia Castillo','','507 69810531','eycastillo@copaair.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','YARELIS CASTILLO','','',NULL,NULL,NULL,NULL,NULL,0,'VIELKA',NULL,1),(27,'German Jose Vera','','507 68612518','germanverajr@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','JOSÉ VERA','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRA',NULL,1),(28,'Guillermo Aaron Sanchez Alzamora','','507 66725839','gaaron@gasaplastic.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','AARON SANCHEZ','','',NULL,NULL,NULL,NULL,NULL,0,'MIGUEL',NULL,1),(29,'Heidy Luzmila Flores Pinzon','','507 65895453','heidyf1425@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','PALESTINA FLORES','','',NULL,NULL,NULL,NULL,NULL,0,'ALEXA',NULL,1),(30,'Ihamadis Batista','','507 63273706','ihamadis15batista@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','IVETTE BATISTA','','',NULL,NULL,NULL,NULL,NULL,0,'ESTEFANY B.',NULL,1),(31,'Jan Luca Reiss','','507 63784580','janlucareiss@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','JAN REISS','','',NULL,NULL,NULL,NULL,NULL,0,'IBIS',NULL,1),(32,'Jesús Eladio Suárez','','507 62536203','belerofomte84@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','JESÚS SUÁREZ','','',NULL,NULL,NULL,NULL,NULL,0,'YRAIS',NULL,1),(33,'Jonathan Javier Hernández Quijano','','507 65638603','javierherna654@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ASHE HERNÁNDEZ','','',NULL,NULL,NULL,NULL,NULL,0,'KENNYA',NULL,1),(34,'Jonathan Said Sánchez Rodriguez','','507 69664818','jonasaid4sanchez@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','JONASAID SÁNCHEZ','','',NULL,NULL,NULL,NULL,NULL,0,'EMILY',NULL,1),(35,'José Luis Palacios','','0','Jlpm01@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','JOSÉ LUIS PALACIOS','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO',NULL,1),(36,'Julissa Arauz Ibarra','','507 65359402','yuli.2098@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','JULISSA ARAUZ','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS FERNANDO',NULL,1),(37,'Kathia del Carmen López Riasco','','507 63472737','kathia.lopez@ifarhu.gob.pa',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','KATHIA LÓPEZ','','',NULL,NULL,NULL,NULL,NULL,0,'HERNAN',NULL,1),(38,'Keely Mabel Almengor Méndez','','507 67513054','almengorkeely@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','KEELY ALMENGOR','','',NULL,NULL,NULL,NULL,NULL,0,'NELLY',NULL,1),(39,'Kimberly Ortega','','507 62457412','maykimby27@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','KIMBERLY ORTEGA','','',NULL,NULL,NULL,NULL,NULL,0,'KENI',NULL,1),(40,'Librada Rivera','','507 66765207','libririvera@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','LIBRI RIVERA','','',NULL,NULL,NULL,NULL,NULL,0,'IBIS',NULL,1),(41,'Liliana Guerrero','','507 62744285','lylyanaguerrero@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','LILIANA GUERRERO','','',NULL,NULL,NULL,NULL,NULL,0,'MICHELLE',NULL,1),(42,'Lorena Gutierrez','','507 63975443','anerolg2509@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','LORENA GUTIERREZ','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO',NULL,1),(43,'Luis Alfredo Benavides Arellano','','507 66671626','luisbenaalfre@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','LUIS BENAVIDES','','',NULL,NULL,NULL,NULL,NULL,0,'TEFI',NULL,1),(44,'Luis Gilberto Guzman Morales','','507 66581647','luisggm82@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','LUIGI GUZMAN','','',NULL,NULL,NULL,NULL,NULL,0,'ANA I.',NULL,1),(45,'Luis Inocente Camarena García','','507 69253100','camarenaluis28@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','LUIS CAMARENA','','',NULL,NULL,NULL,NULL,NULL,0,'GRISELDA',NULL,1),(46,'Maria Cristina Sanchez','','507 64929935','crismar0823@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','MARIA CRISTINA SANCHEZ','','',NULL,NULL,NULL,NULL,NULL,0,'GREPSY',NULL,1),(47,'Maria Gabriela Melendez','','507 66913468','mariagmelendezg@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','MARY GABY MELENDEZ','','',NULL,NULL,NULL,NULL,NULL,0,'RODERICK',NULL,1),(48,'María Rebeca Alonso','','52 5561607860','rebecalonso@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','REBECA ALONSO','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO',NULL,1),(49,'Michelle Marie Parchment','','507 64973364','michelleparchment@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','MICHELLE MARIE PARCHMENT','','',NULL,NULL,NULL,NULL,NULL,0,'LINETTE',NULL,1),(50,'Miriam Darlene Rueda Morgado','','507 62503716','mdar19@live.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','DARLENE RUEDA','','',NULL,NULL,NULL,NULL,NULL,0,'WILLY',NULL,1),(51,'Moisés Enrique Justavino','','507 69207748','justavinomoises5@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','MOISÉS JUSTAVINO','','',NULL,NULL,NULL,NULL,NULL,0,'LETICIA',NULL,1),(52,'Nancy Aguilar','','507 69672802','nancyaguilar626@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','LARY AGUILAR','','',NULL,NULL,NULL,NULL,NULL,0,'PRISCILA',NULL,1),(53,'Nino Moscoso Castorina','','507 63017862','ninomoscoso13@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','NINO MOSCOSO','','',NULL,NULL,NULL,NULL,NULL,0,'NATII',NULL,1),(54,'Norelys Espinosa','','507 64560185','norelysespinosa92@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','NORELYS ESPINOSA','','',NULL,NULL,NULL,NULL,NULL,0,'BRYAN',NULL,1),(55,'Paula Andrea Mayorquino Vargas','','507 64233963','Paulamayorquinov21@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','PAULA MAYORQUINO','','',NULL,NULL,NULL,NULL,NULL,0,'MARLIN',NULL,1),(56,'Rigoberto Rene Rodriguez Avila','','507 67352999','grupohipa@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','RENE AVILA','','',NULL,NULL,NULL,NULL,NULL,0,'MILEIKA',NULL,1),(57,'Rodrigo Velarde','','507 69630888','rodrigoeducacion09@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','RODRI VELARDE','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRA',NULL,1),(58,'Ronald Javier Lopez Galindo','','507 69124531','elflacolopez1024@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','RONALD LOPEZ','','',NULL,NULL,NULL,NULL,NULL,0,'RICARDO',NULL,1),(59,'Rosaura Reiss','','507 69201258','rosaurareiss@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ROSY REISS','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRA',NULL,1),(60,'Ruben Alvarez','','507 67104941','ralvarez@mayorsafety.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','RUBEN ALVAREZ','','',NULL,NULL,NULL,NULL,NULL,0,'CHARLES',NULL,1),(61,'Saharaly Quiel','','507 65743968','qsaharaly@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','SAHARALY QUIEL','','',NULL,NULL,NULL,NULL,NULL,0,'EYRA',NULL,1),(62,'Shanelys Tays Garibaldi Maldonado','','507 60269101','Shanelysgaribaldi21@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','NELYS GARIBALDI','','',NULL,NULL,NULL,NULL,NULL,0,'LEYLA',NULL,1),(63,'Sofía Gonzalez Arauz','','507 62932701','soffgonzalez06@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','SOFIA GONZALEZ','','',NULL,NULL,NULL,NULL,NULL,0,'RUBEN',NULL,1),(64,'Sophia Victoria Robinson Samudio','','507 62662644','robinsonsophia771@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','SOFI ROBINSON','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS FERNANDO',NULL,1),(65,'Susana Diaz','','507 67982917','susanadiaz321@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','SUSANA DIAZ','','',NULL,NULL,NULL,NULL,NULL,0,'MIKE',NULL,1),(66,'Tatiana Moncada','','507 68237587','tatimoncada11@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','TATIANA MONCADA','','',NULL,NULL,NULL,NULL,NULL,0,'HECTOR CRUZ',NULL,1),(67,'Tomas Guardia','','507 62688801','tjgguerra@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','TOMAS GUARDIA','','',NULL,NULL,NULL,NULL,NULL,0,'LUIS FERNANDO',NULL,1),(68,'Wilker León','','507 63185322','wilkerleon77@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','WILKER LEON','','',NULL,NULL,NULL,NULL,NULL,0,'ALBA',NULL,1),(69,'Yennyfer Quezada','','507 63785145','yennyferquezada@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','YE QUEZADA','','',NULL,NULL,NULL,NULL,NULL,0,'DYAN',NULL,1),(70,'Yinkiria Lorena Cheng Orobio','','507 62311512','yinki203@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','YINKIRIA CHENG','','',NULL,NULL,NULL,NULL,NULL,0,'ODESSA',NULL,1),(71,'Yoselin Betania Perez Perozo','','507 65121785','yoselinbperez@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','YOSELIN PEREZ','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO',NULL,1),(72,'Yulissa Cedeño','','507 62175780','yulissalzate@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','YUYU CEDEÑO','','',NULL,NULL,NULL,NULL,NULL,0,'WENDY',NULL,1),(73,'Zaara Yaheel Wittgren Pinzon','','507 61518046','zaarawdt@hotmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','ZAARA Y. WITTGREN P.','','',NULL,NULL,NULL,NULL,NULL,0,'EYRA',NULL,1),(74,'Zadock Mitchell','','507 63832466','cardiofit.zm@gmail.com',NULL,'','','',0,'2023-03-23 23:23:40','2023-03-23 23:23:40','','','','MIGUE ZADOCK','','',NULL,NULL,NULL,NULL,NULL,0,'ALEJANDRO',NULL,1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(30,2) NOT NULL DEFAULT '0.00',
  `url_image` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `init_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cursos_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'2023-03-23 22:45:42','2023-03-23 22:45:42','ECI 65',625.00,'https://res.cloudinary.com/phoenix-tech-sa/image/upload/v1679611540/ge_client/znphdkb1xo5pl8twnuzd.png',NULL,'2023-03-15','2023-03-19',NULL),(2,'2023-03-23 22:46:29','2023-03-23 22:46:29','por defecto',0.00,'https://res.cloudinary.com/phoenix-tech-sa/image/upload/v1679611540/ge_client/znphdkb1xo5pl8twnuzd.png','0','2023-03-15','2023-03-19',NULL),(4,'2023-03-23 22:46:57','2023-03-23 22:46:57','por defecto2',0.00,'https://res.cloudinary.com/phoenix-tech-sa/image/upload/v1679611540/ge_client/znphdkb1xo5pl8twnuzd.png','0','2023-03-15','2023-03-19',NULL),(5,'2023-03-23 22:47:08','2023-03-23 22:47:08','por defecto3',0.00,'https://res.cloudinary.com/phoenix-tech-sa/image/upload/v1679611540/ge_client/znphdkb1xo5pl8twnuzd.png','0','2023-03-15','2023-03-19',NULL);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dias_curso_clientes`
--

DROP TABLE IF EXISTS `dias_curso_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dias_curso_clientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned DEFAULT NULL,
  `llego` tinyint(1) NOT NULL DEFAULT '0',
  `curso_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dias_curso_clientes_client_id_foreign` (`client_id`),
  KEY `dias_curso_clientes_curso_id_foreign` (`curso_id`),
  CONSTRAINT `dias_curso_clientes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `dias_curso_clientes_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias_curso_clientes`
--

LOCK TABLES `dias_curso_clientes` WRITE;
/*!40000 ALTER TABLE `dias_curso_clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `dias_curso_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etapas`
--

DROP TABLE IF EXISTS `etapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etapas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(30,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `init_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etapas_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etapas`
--

LOCK TABLES `etapas` WRITE;
/*!40000 ALTER TABLE `etapas` DISABLE KEYS */;
/*!40000 ALTER TABLE `etapas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial_curso_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned DEFAULT NULL,
  `curso_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historial_curso_clients_client_id_foreign` (`client_id`),
  KEY `historial_curso_clients_curso_id_foreign` (`curso_id`),
  CONSTRAINT `historial_curso_clients_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `historial_curso_clients_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_curso_clients`
--

LOCK TABLES `historial_curso_clients` WRITE;
/*!40000 ALTER TABLE `historial_curso_clients` DISABLE KEYS */;
INSERT INTO `historial_curso_clients` VALUES (1,3,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(2,4,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(3,5,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(4,6,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(5,7,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(6,8,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(7,9,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(8,10,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(9,11,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(10,12,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(11,13,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(12,14,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(13,15,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(14,16,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(15,17,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(16,18,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(17,19,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(18,20,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(19,21,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(20,22,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(21,23,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(22,24,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(23,25,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(24,26,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(25,27,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(26,28,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(27,29,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(28,30,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(29,31,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(30,32,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(31,33,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(32,34,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(33,35,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(34,36,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(35,37,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(36,38,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(37,39,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(38,40,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(39,41,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(40,42,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(41,43,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(42,44,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(43,45,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(44,46,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(45,47,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(46,48,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(47,49,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(48,50,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(49,51,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(50,52,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(51,53,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(52,54,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(53,55,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(54,56,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(55,57,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(56,58,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(57,59,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(58,60,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(59,61,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(60,62,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(61,63,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(62,64,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(63,65,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(64,66,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(65,67,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(66,68,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(67,69,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(68,70,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(69,71,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(70,72,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(71,73,1,'2023-03-23 23:23:40','2023-03-23 23:23:40'),(72,74,1,'2023-03-23 23:23:40','2023-03-23 23:23:40');
/*!40000 ALTER TABLE `historial_curso_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_11_000000_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_01_15_125412_create_categorias_table',1),(7,'2023_01_15_125607_create_sub_categorias_table',1),(8,'2023_01_15_125700_create_grupos_table',1),(9,'2023_01_15_125719_create_cursos_table',1),(10,'2023_01_15_125807_create_orders_table',1),(11,'2023_01_15_132240_create_payments_table',1),(12,'2023_01_15_135627_create_suscripciones_table',1),(13,'2023_01_15_135847_create_notifies_table',1),(14,'2023_01_20_195837_create_clientes_table',1),(15,'2023_01_20_201108_create_etapas_table',1),(16,'2023_01_20_201230_add_etapa_in_suscripciones',1),(17,'2023_01_20_203358_add_duration',1),(18,'2023_01_23_171735_user_recovery',1),(19,'2023_01_23_215949_add_data_clientes',1),(20,'2023_01_24_145736_add_data_cursos',1),(21,'2023_01_26_200936_add_data_orders',1),(22,'2023_01_27_003227_add_new_data_order',1),(23,'2023_01_27_003735_add_data_payments',1),(24,'2023_01_27_010754_add_new_data_order_curso',1),(25,'2023_01_30_153630_add_pending_order',1),(26,'2023_02_01_003551_add_status_cursos',1),(27,'2023_02_08_212216_create_asistencia_cursos_table',1),(28,'2023_02_08_223250_delete_assist_assist',1),(29,'2023_02_11_125506_add_soft_delete',1),(30,'2023_02_23_164459_clientes_add_reference',1),(31,'2023_02_27_185945_add_role_id_user',1),(32,'2023_03_01_131048_add_user_id_cliente',1),(33,'2023_03_07_182646_create_dias_curso_clientes_table',1),(34,'2023_03_09_160250_add_curso_id',1),(35,'2023_03_23_104248_create_historial_curso_clients_table',2),(36,'2023_03_23_163255_add_image',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifies`
--

DROP TABLE IF EXISTS `notifies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `client_id` bigint unsigned DEFAULT NULL,
  `price` double(30,2) DEFAULT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT '0',
  `payment_method` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso_id` bigint unsigned DEFAULT NULL,
  `pending` double(30,2) DEFAULT NULL,
  `img_url` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `orders_client_id_foreign` (`client_id`),
  KEY `orders_curso_id_foreign` (`curso_id`),
  CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `orders_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (75,'2023-03-23 23:27:14','2023-03-23 23:27:14','',3,625.00,0,'1',1,NULL,NULL),(76,'2023-03-23 23:27:14','2023-03-23 23:27:14','',4,625.00,0,'1',1,NULL,NULL),(77,'2023-03-23 23:27:14','2023-03-23 23:27:14','',5,625.00,0,'1',1,NULL,NULL),(78,'2023-03-23 23:27:14','2023-03-23 23:27:14','',6,625.00,0,'1',1,NULL,NULL),(79,'2023-03-23 23:27:14','2023-03-23 23:27:14','',7,625.00,0,'1',1,NULL,NULL),(80,'2023-03-23 23:27:14','2023-03-23 23:27:14','',8,625.00,0,'1',1,NULL,NULL),(81,'2023-03-23 23:27:14','2023-03-23 23:27:14','',9,625.00,0,'1',1,NULL,NULL),(82,'2023-03-23 23:27:14','2023-03-23 23:27:14','',10,625.00,0,'1',1,NULL,NULL),(83,'2023-03-23 23:27:14','2023-03-23 23:27:14','',11,625.00,0,'1',1,NULL,NULL),(84,'2023-03-23 23:27:14','2023-03-23 23:27:14','',12,625.00,0,'1',1,NULL,NULL),(85,'2023-03-23 23:27:14','2023-03-23 23:27:14','',13,625.00,0,'1',1,NULL,NULL),(86,'2023-03-23 23:27:14','2023-03-23 23:27:14','',14,625.00,0,'1',1,NULL,NULL),(87,'2023-03-23 23:27:14','2023-03-23 23:27:14','',15,625.00,0,'1',1,NULL,NULL),(88,'2023-03-23 23:27:14','2023-03-23 23:27:14','',16,625.00,0,'1',1,NULL,NULL),(89,'2023-03-23 23:27:14','2023-03-23 23:27:14','',17,625.00,0,'1',1,NULL,NULL),(90,'2023-03-23 23:27:14','2023-03-23 23:27:14','',18,625.00,0,'1',1,NULL,NULL),(91,'2023-03-23 23:27:14','2023-03-23 23:27:14','',19,625.00,0,'1',1,NULL,NULL),(92,'2023-03-23 23:27:14','2023-03-23 23:27:14','',20,625.00,0,'1',1,NULL,NULL),(93,'2023-03-23 23:27:14','2023-03-23 23:27:14','',21,625.00,0,'1',1,NULL,NULL),(94,'2023-03-23 23:27:14','2023-03-23 23:27:14','',22,625.00,0,'1',1,NULL,NULL),(95,'2023-03-23 23:27:14','2023-03-23 23:27:14','',23,625.00,0,'1',1,NULL,NULL),(96,'2023-03-23 23:27:14','2023-03-23 23:27:14','',24,625.00,0,'1',1,NULL,NULL),(97,'2023-03-23 23:27:14','2023-03-23 23:27:14','',25,625.00,0,'1',1,NULL,NULL),(98,'2023-03-23 23:27:14','2023-03-23 23:27:14','',26,625.00,0,'1',1,NULL,NULL),(99,'2023-03-23 23:27:14','2023-03-23 23:27:14','',27,625.00,0,'1',1,NULL,NULL),(100,'2023-03-23 23:27:14','2023-03-23 23:27:14','',28,625.00,0,'1',1,NULL,NULL),(101,'2023-03-23 23:27:14','2023-03-23 23:27:14','',29,625.00,0,'1',1,NULL,NULL),(102,'2023-03-23 23:27:14','2023-03-23 23:27:14','',30,625.00,0,'1',1,NULL,NULL),(103,'2023-03-23 23:27:14','2023-03-23 23:27:14','',31,625.00,0,'1',1,NULL,NULL),(104,'2023-03-23 23:27:14','2023-03-23 23:27:14','',32,625.00,0,'1',1,NULL,NULL),(105,'2023-03-23 23:27:14','2023-03-23 23:27:14','',33,625.00,0,'1',1,NULL,NULL),(106,'2023-03-23 23:27:14','2023-03-23 23:27:14','',34,625.00,0,'1',1,NULL,NULL),(107,'2023-03-23 23:27:14','2023-03-23 23:27:14','',35,625.00,0,'1',1,NULL,NULL),(108,'2023-03-23 23:27:14','2023-03-23 23:27:14','',36,625.00,0,'1',1,NULL,NULL),(109,'2023-03-23 23:27:14','2023-03-23 23:27:14','',37,625.00,0,'1',1,NULL,NULL),(110,'2023-03-23 23:27:14','2023-03-23 23:27:14','',38,625.00,0,'1',1,NULL,NULL),(111,'2023-03-23 23:27:14','2023-03-23 23:27:14','',39,625.00,0,'1',1,NULL,NULL),(112,'2023-03-23 23:27:14','2023-03-23 23:27:14','',40,625.00,0,'1',1,NULL,NULL),(113,'2023-03-23 23:27:14','2023-03-23 23:27:14','',41,625.00,0,'1',1,NULL,NULL),(114,'2023-03-23 23:27:14','2023-03-23 23:27:14','',42,625.00,0,'1',1,NULL,NULL),(115,'2023-03-23 23:27:14','2023-03-23 23:27:14','',43,625.00,0,'1',1,NULL,NULL),(116,'2023-03-23 23:27:14','2023-03-23 23:27:14','',44,625.00,0,'1',1,NULL,NULL),(117,'2023-03-23 23:27:14','2023-03-23 23:27:14','',45,625.00,0,'1',1,NULL,NULL),(118,'2023-03-23 23:27:14','2023-03-23 23:27:14','',46,625.00,0,'1',1,NULL,NULL),(119,'2023-03-23 23:27:14','2023-03-23 23:27:14','',47,625.00,0,'1',1,NULL,NULL),(120,'2023-03-23 23:27:14','2023-03-23 23:27:14','',48,625.00,0,'1',1,NULL,NULL),(121,'2023-03-23 23:27:14','2023-03-23 23:27:14','',49,625.00,0,'1',1,NULL,NULL),(122,'2023-03-23 23:27:14','2023-03-23 23:27:14','',50,625.00,0,'1',1,NULL,NULL),(123,'2023-03-23 23:27:14','2023-03-23 23:27:14','',51,625.00,0,'1',1,NULL,NULL),(124,'2023-03-23 23:27:14','2023-03-23 23:27:14','',52,625.00,0,'1',1,NULL,NULL),(125,'2023-03-23 23:27:14','2023-03-23 23:27:14','',53,625.00,0,'1',1,NULL,NULL),(126,'2023-03-23 23:27:14','2023-03-23 23:27:14','',54,625.00,0,'1',1,NULL,NULL),(127,'2023-03-23 23:27:14','2023-03-23 23:27:14','',55,625.00,0,'1',1,NULL,NULL),(128,'2023-03-23 23:27:14','2023-03-23 23:27:14','',56,625.00,0,'1',1,NULL,NULL),(129,'2023-03-23 23:27:14','2023-03-23 23:27:14','',57,625.00,0,'1',1,NULL,NULL),(130,'2023-03-23 23:27:14','2023-03-23 23:27:14','',58,625.00,0,'1',1,NULL,NULL),(131,'2023-03-23 23:27:14','2023-03-23 23:27:14','',59,625.00,0,'1',1,NULL,NULL),(132,'2023-03-23 23:27:14','2023-03-23 23:27:14','',60,625.00,0,'1',1,NULL,NULL),(133,'2023-03-23 23:27:14','2023-03-23 23:27:14','',61,625.00,0,'1',1,NULL,NULL),(134,'2023-03-23 23:27:14','2023-03-23 23:27:14','',62,625.00,0,'1',1,NULL,NULL),(135,'2023-03-23 23:27:14','2023-03-23 23:27:14','',63,625.00,0,'1',1,NULL,NULL),(136,'2023-03-23 23:27:14','2023-03-23 23:27:14','',64,625.00,0,'1',1,NULL,NULL),(137,'2023-03-23 23:27:14','2023-03-23 23:27:14','',65,625.00,0,'1',1,NULL,NULL),(138,'2023-03-23 23:27:14','2023-03-23 23:27:14','',66,625.00,0,'1',1,NULL,NULL),(139,'2023-03-23 23:27:14','2023-03-23 23:27:14','',67,625.00,0,'1',1,NULL,NULL),(140,'2023-03-23 23:27:14','2023-03-23 23:27:14','',68,625.00,0,'1',1,NULL,NULL),(141,'2023-03-23 23:27:14','2023-03-23 23:27:14','',69,625.00,0,'1',1,NULL,NULL),(142,'2023-03-23 23:27:14','2023-03-23 23:27:14','',70,625.00,0,'1',1,NULL,NULL),(143,'2023-03-23 23:27:14','2023-03-23 23:27:14','',71,625.00,0,'1',1,NULL,NULL),(144,'2023-03-23 23:27:14','2023-03-23 23:27:14','',72,625.00,0,'1',1,NULL,NULL),(145,'2023-03-23 23:27:14','2023-03-23 23:27:14','',73,625.00,0,'1',1,NULL,NULL),(146,'2023-03-23 23:27:14','2023-03-23 23:27:14','',74,625.00,0,'1',1,NULL,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned DEFAULT NULL,
  `total` double(30,2) DEFAULT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT '0',
  `method` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  KEY `payments_client_id_foreign` (`client_id`),
  CONSTRAINT `payments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2023-03-21 00:36:51','2023-03-21 00:36:51'),(2,'empresa','2023-03-21 00:36:51','2023-03-21 00:36:51'),(3,'cliente','2023-03-21 00:36:51','2023-03-21 00:36:51');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categorias`
--

DROP TABLE IF EXISTS `sub_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suscripciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint unsigned DEFAULT NULL,
  `etapa_id` bigint unsigned DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0',
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `role_id` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recovery_cod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso_actual_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_curso_actual_id_foreign` (`curso_actual_id`),
  CONSTRAINT `users_curso_actual_id_foreign` FOREIGN KEY (`curso_actual_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'','',NULL,'',0,NULL,NULL,'2023-03-21 00:37:42','2023-03-21 00:37:42',NULL,NULL),(2,'admin','admin@gmail.com',NULL,'$2y$10$/tUa9IX3G9Ljien5oe07x.Pq255kHg.R83qGAhONIT6TzFD9cZfwC',1,1,NULL,'2023-03-21 00:45:22','2023-03-21 00:45:22',NULL,NULL);
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

-- Dump completed on 2023-03-23 23:28:30
