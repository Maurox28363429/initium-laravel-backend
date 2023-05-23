-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: app_cursos
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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (11,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"asas\"},{\"Apellido\":\"asasa\"},{\"Cedula\":\"sasas\"},{\"Telefono\":\"0012102\"},{\"Correo\":\"asasas@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"diversion\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(12,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Ahisar \"},{\"Apellido\":\"Martinez \"},{\"Cedula\":\"8-1066-1563\"},{\"Telefono\":\"61491150\"},{\"Correo\":\"martafidelis09@gmail.com\"},{\"edad\":\"18 a 15\"},{\"descuentos\":[\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(13,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Kenia\"},{\"Apellido\":\"Pinzon\"},{\"Cedula\":\"8757295\"},{\"Telefono\":\"66786553\"},{\"Correo\":\"kep1425@gmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"estudios\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(14,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Ashnabell \"},{\"Apellido\":\"Durango\"},{\"Cedula\":\"8-807-447\"},{\"Telefono\":\"65051293\"},{\"Correo\":\"ashnabelldegideon@gmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(15,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Marlenis del Carmen \"},{\"Apellido\":\"Aviles \"},{\"Cedula\":\"2-726-1583\"},{\"Telefono\":\"67539901\"},{\"Correo\":\"marlenisaviles08@gmail.com\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(16,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Silvia \"},{\"Apellido\":\"Lecky\"},{\"Cedula\":\"8-734-2451\"},{\"Telefono\":\"69486954\"},{\"Correo\":\"silvia_lecky@hotmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(17,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Marta \"},{\"Apellido\":\"Madri&ntilde;an \"},{\"Cedula\":\"8-65-612\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(18,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Susan Nicole \"},{\"Apellido\":\"Reese \"},{\"Cedula\":\"\"},{\"Telefono\":\"61491150\"},{\"Correo\":\"\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"estudios\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(19,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Alden Emir\"},{\"Apellido\":\"Rios Barria\"},{\"Cedula\":\"8-1088-684\"},{\"Telefono\":\"69021096\"},{\"Correo\":\"sindybarria1983@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"Pueden tambien ofrecer recargas de celular\"}]'),(20,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Alden Emir\"},{\"Apellido\":\"Rios Barria\"},{\"Cedula\":\"8-1088-684\"},{\"Telefono\":\"69021096\"},{\"Correo\":\"sindybarria1983@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"Pueden tambien ofrecer recargas de celular\"}]'),(21,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Alden Emir\"},{\"Apellido\":\"Rios Barria\"},{\"Cedula\":\"8-1088-684\"},{\"Telefono\":\"69021096\"},{\"Correo\":\"sindybarria1983@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"Pueden tambien ofrecer recargas de celular\"}]'),(22,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Alden Emir\"},{\"Apellido\":\"Rios Barria\"},{\"Cedula\":\"8-1088-684\"},{\"Telefono\":\"69021096\"},{\"Correo\":\"sindybarria1983@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"Pueden tambien ofrecer recargas de celular\"}]'),(23,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Alden Emir\"},{\"Apellido\":\"Rios Barria\"},{\"Cedula\":\"8-1088-684\"},{\"Telefono\":\"69021096\"},{\"Correo\":\"sindybarria1983@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(24,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Adam Sebastian\"},{\"Apellido\":\"Rios Barria\"},{\"Cedula\":\"8-1171-2307\"},{\"Telefono\":\"69021096\"},{\"Correo\":\"sindybarria1983@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(25,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Sulay \"},{\"Apellido\":\"Morales \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(26,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Gesury\"},{\"Apellido\":\"Avila\"},{\"Cedula\":\"8-766-286\"},{\"Telefono\":\"67494232\"},{\"Correo\":\"gesu_06@hotmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"estudios\",\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"false\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(27,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Lorenis \"},{\"Apellido\":\"Barcenas\"},{\"Cedula\":\"8-1072-2061\"},{\"Telefono\":\"68275849\"},{\"Correo\":\"barcenaskristel2@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"estudios\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(28,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"Nombre\":\"Sof&iacute;a \"},{\"Apellido\":\"B&aacute;rcenas \"},{\"Cedula\":\"8-1086-2000\"},{\"Telefono\":\"67500388\"},{\"Correo\":\"sofiabarcenas501@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"diversion\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(29,'[{\"api\":\"formulario\"},{\"rating-2\":\"5\"},{\"dni_vendedor\":\"\"},{\"Nombre\":\"Karen\"},{\"Apellido\":\"Vega\"},{\"Cedula\":\"8-854-305\"},{\"Telefono\":\"3960197\"},{\"Correo\":\"vegakaren.b@gmail.com\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(30,'[{\"api\":\"formulario\"},{\"rating-2\":\"5\"},{\"dni_vendedor\":\"\"},{\"Nombre\":\"Karen\"},{\"Apellido\":\"Vega\"},{\"Cedula\":\"8-854-305\"},{\"Telefono\":\"3960197\"},{\"Correo\":\"vegakaren.b@gmail.com\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(31,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"\"},{\"Nombre\":\"Alexis \"},{\"Apellido\":\"Bethancourt \"},{\"Cedula\":\"8-841-692 \"},{\"Telefono\":\"69116481\"},{\"Correo\":\"alexisyinyo11@gmail.com\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"estudios\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"Muy buena la encuesta \"}]'),(32,'[{\"api\":\"formulario\"},{\"rating-2\":\"5\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Katherin \"},{\"Apellido\":\"De S&aacute;nchez \"},{\"Cedula\":\"8-837-716\"},{\"Telefono\":\"68491120\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"estudios\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(33,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"\"},{\"Nombre\":\"Gael\"},{\"Apellido\":\"Bethancourt \"},{\"Cedula\":\"13-11-1334\"},{\"Telefono\":\"691116481\"},{\"Correo\":\"alexisyinyo11@gmail.com\"},{\"edad\":\"18 a 15\"},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(34,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Xavier \"},{\"Apellido\":\"Moore\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"diversion\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(35,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Stephanie \"},{\"Apellido\":\"Caicedo\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(36,'[{\"api\":\"formulario\"},{\"rating-2\":\"5\"},{\"dni_vendedor\":\"Marta \"},{\"Nombre\":\"Luis \"},{\"Apellido\":\"Peralta \"},{\"Cedula\":\"8-1058-1608\"},{\"Telefono\":\"68668580\"},{\"Correo\":\"luisamadodr1101@gmail.com\"},{\"edad\":\"18 a 15\"},{\"descuentos\":[\"diversion\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(37,'[{\"api\":\"formulario\"},{\"rating-2\":\"5\"},{\"dni_vendedor\":\"Marta \"},{\"Nombre\":\"Luis \"},{\"Apellido\":\"Peralta \"},{\"Cedula\":\"8-1058-1608\"},{\"Telefono\":\"68668580\"},{\"Correo\":\"luisamadodr1101@gmail.com\"},{\"edad\":\"18 a 15\"},{\"descuentos\":[\"diversion\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(38,'[{\"api\":\"formulario\"},{\"rating-2\":\"5\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Nelson \"},{\"Apellido\":\"Ortega \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(39,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Anthony\"},{\"Apellido\":\"Cam\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(40,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Juan \"},{\"Apellido\":\"Barsallo\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(41,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Zuyitza \"},{\"Apellido\":\"Estrada\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"diversion\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(42,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Yerania \"},{\"Apellido\":\"Vargas\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(43,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Yelmira\"},{\"Apellido\":\"Urrutia \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(44,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Ricardo \"},{\"Apellido\":\"Gonz&aacute;lez \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(45,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Ricardo \"},{\"Apellido\":\"Gonz&aacute;lez \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(46,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Raul \"},{\"Apellido\":\"Con \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"estudios\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(47,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Paskinel \"},{\"Apellido\":\"Saenz\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(48,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Paskinel \"},{\"Apellido\":\"Saenz\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(49,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta barcenas\"},{\"Nombre\":\"Tomas\"},{\"Apellido\":\"De gracia\"},{\"Cedula\":\"8-773-2034\"},{\"Telefono\":\"63720833\"},{\"Correo\":\"degracia221984@gmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\"]},{\"menbresia\":\"false\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"Gracias\"}]'),(50,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta barcenas\"},{\"Nombre\":\"Tomas\"},{\"Apellido\":\"De gracia\"},{\"Cedula\":\"8-773-2034\"},{\"Telefono\":\"63720833\"},{\"Correo\":\"degracia221984@gmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\"]},{\"menbresia\":\"false\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"Gracias\"}]'),(51,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"\"},{\"Nombre\":\"Dayarelys\"},{\"Apellido\":\"Barnabas Ruiz\"},{\"Cedula\":\"8-750-376\"},{\"Telefono\":\"61041910\"},{\"Correo\":\"dbarnab0924@gmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(52,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Xiomara Durango\"},{\"Nombre\":\"Eduardo \"},{\"Apellido\":\"Caballero \"},{\"Cedula\":\"8-153-2073\"},{\"Telefono\":\"62649916\"},{\"Correo\":\"caballeroe1945@gmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"No por ahora\"}]'),(53,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Xiomara Durango \"},{\"Nombre\":\"Crescencia \"},{\"Apellido\":\"Palomino \"},{\"Cedula\":\"5-10-420\"},{\"Telefono\":\"66878484\"},{\"Correo\":\"cres_47@hotmail.com\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(54,'[{\"api\":\"formulario\"},{\"rating-2\":\"4\"},{\"dni_vendedor\":\"XD\"},{\"Nombre\":\"Gabriela \"},{\"Apellido\":\"Martinez \"},{\"Cedula\":\"8-814-2000\"},{\"Telefono\":\"69557216\"},{\"Correo\":\"gm065051@gmail.com\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(55,'[{\"api\":\"formulario\"},{\"rating-2\":\"5\"},{\"dni_vendedor\":\"\"},{\"Nombre\":\"\"},{\"Apellido\":\"\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"estudios\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(56,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Odys \"},{\"Apellido\":\"Castro \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(57,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Mois&eacute;s \"},{\"Apellido\":\"Urriola\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(58,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Mauricio \"},{\"Apellido\":\"Mendoza \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(59,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Mar&iacute;a \"},{\"Apellido\":\"Gonz&aacute;lez \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(60,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Margarita \"},{\"Apellido\":\"Palacios \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(61,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Margarita \"},{\"Apellido\":\"Palacios \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(62,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Agust&iacute;n \"},{\"Apellido\":\"Martinez \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(63,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Agust&iacute;n \"},{\"Apellido\":\"Martinez \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(64,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Manuel \"},{\"Apellido\":\"Gracia\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(65,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Manuel \"},{\"Apellido\":\"Lasso\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(66,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Manuel \"},{\"Apellido\":\"Lasso\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(67,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Mainol \"},{\"Apellido\":\"Whenham\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(68,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Maditzel \"},{\"Apellido\":\"Hern&aacute;ndez \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(69,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Luis\"},{\"Apellido\":\"Centeno\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(70,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Lorenza \"},{\"Apellido\":\"Valderrama\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(71,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Lenny \"},{\"Apellido\":\"Acosta\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(72,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Julio \"},{\"Apellido\":\"Aponte \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(73,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Javier \"},{\"Apellido\":\"Arauz \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(74,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Elideth\"},{\"Apellido\":\"Camarena \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(75,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Elideth\"},{\"Apellido\":\"Camarena \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(76,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Yariatna \"},{\"Apellido\":\"Yearwood\"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"turismo\",\"estudios\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(77,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"Marta\"},{\"Nombre\":\"Anthony \"},{\"Apellido\":\"Ramos \"},{\"Cedula\":\"\"},{\"Telefono\":\"\"},{\"Correo\":\"\"},{\"edad\":\"26 a 35\"},{\"descuentos\":[\"estudios\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(78,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"XD\"},{\"Nombre\":\"Leopoldo \"},{\"Apellido\":\"Lester Caballero \"},{\"Cedula\":\"3-97-277\"},{\"Telefono\":\"66257124\"},{\"Correo\":\"llesterc1955@yahoo.es\"},{\"edad\":\"36 o mas\"},{\"descuentos\":[\"turismo\",\"diversion\",\"gastronom&iacute;a\"]},{\"menbresia\":\"true\"},{\"concurso\":\"false\"},{\"recomendar\":\"true\"},{\"comentario\":\"\"}]'),(79,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"asas\"},{\"Nombre\":\"asa\"},{\"Apellido\":\"asas\"},{\"Cedula\":\"sas\"},{\"Telefono\":\"12901290\"},{\"Correo\":\"masas@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"a\"}]'),(80,'[{\"api\":\"formulario\"},{\"rating-2\":\"1\"},{\"dni_vendedor\":\"asas\"},{\"Nombre\":\"asa\"},{\"Apellido\":\"asas\"},{\"Cedula\":\"sas\"},{\"Telefono\":\"12901290\"},{\"Correo\":\"masas@gmail.com\"},{\"edad\":\"18 o menos\"},{\"descuentos\":[\"diversion\",\"gastronom&iacute;a\",\"salud\"]},{\"menbresia\":\"true\"},{\"concurso\":\"true\"},{\"recomendar\":\"true\"},{\"comentario\":\"a\"}]');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-17  9:48:50
