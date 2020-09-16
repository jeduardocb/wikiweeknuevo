-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: mysql1008.mochahost.com    Database: dawbdorg_A01704641
-- ------------------------------------------------------
-- Server version	5.6.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1500) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `id_categoria_blog` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `subtitulo` varchar(45) DEFAULT NULL,
  `descripcion2` varchar(1500) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'prueba de blog prueba1','descripcion del titulo del blog prueba111','2020-08-06 05:57:51',1,NULL,'este es el subtitulo de la prueba 1 orueba111','descripcion del subtitulo de la prueba 1 prueba11',1),(2,'blog prueba 2','descripcion del titulo de priueba 2','2020-08-06 06:19:30',2,NULL,'subtitulo de prueba 2','Descripcion del Subtitulo: de prueba2',1),(3,'prueba 3','descricpion prueba 3','2020-08-06 06:47:05',2,NULL,'subtitulo 3','descripcion 3',1);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `nombre_foto` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Híbrida','Wikihigh_Icono_naranja.png','El Cannabis híbrido, al contrario que las cepas puras, es aquella raza con genes de Sativa e índica'),(2,'Sativa','Wikihigh_Icono_verde2.png','Las variedades de marihuana sativa se caracterizan por tener un alto contenido en THC y muy poco CBD. Algunas variedades tambiÃ©n sintetizan un cannabinoide conocido como THCV, con efectos antagonistas al THC en cuanto a la inducciÃ³n al apetito.'),(3,'índica','Wikihigh_Icono_purpura2.png','La marihuana Ã­ndica o cÃ¡Ã±amo Ã­ndico es una subespecie de la planta cannabis, originaria de Asia central.');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_blog`
--

DROP TABLE IF EXISTS `categoria_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_blog`
--

LOCK TABLES `categoria_blog` WRITE;
/*!40000 ALTER TABLE `categoria_blog` DISABLE KEYS */;
INSERT INTO `categoria_blog` VALUES (1,'SALUD'),(2,'CULTURA'),(3,'Borrar Categoria');
/*!40000 ALTER TABLE `categoria_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_recetas`
--

DROP TABLE IF EXISTS `categoria_recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_recetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_recetas`
--

LOCK TABLES `categoria_recetas` WRITE;
/*!40000 ALTER TABLE `categoria_recetas` DISABLE KEYS */;
INSERT INTO `categoria_recetas` VALUES (1,'POSTRE'),(2,'COMIDA');
/*!40000 ALTER TABLE `categoria_recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias_efectos`
--

DROP TABLE IF EXISTS `categorias_efectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias_efectos` (
  `id_categoria_efecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria_efecto`),
  UNIQUE KEY `id_categoria_efecto_UNIQUE` (`id_categoria_efecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_efectos`
--

LOCK TABLES `categorias_efectos` WRITE;
/*!40000 ALTER TABLE `categorias_efectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias_efectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbd`
--

DROP TABLE IF EXISTS `cbd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cbd` (
  `id_cbd` int(11) NOT NULL AUTO_INCREMENT,
  `min` float DEFAULT NULL,
  `max` float DEFAULT NULL,
  PRIMARY KEY (`id_cbd`),
  UNIQUE KEY `id_cbd_UNIQUE` (`id_cbd`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbd`
--

LOCK TABLES `cbd` WRITE;
/*!40000 ALTER TABLE `cbd` DISABLE KEYS */;
INSERT INTO `cbd` VALUES (1,0,1),(4,0.99,0),(6,0.99,0),(7,0.99,0),(8,0.99,0),(12,0.89,0),(13,2,22),(20,5,0),(21,0.89,0),(22,0.89,0),(23,0.89,0),(24,0.85,0),(25,0.85,0),(26,12,16),(28,2,0),(29,0.8,2),(30,1,10),(31,0.89,0),(32,0.89,0),(33,0.89,0),(34,0.89,0),(35,0.89,0),(36,0.89,0),(37,0.89,0),(45,1,0),(46,1,9);
/*!40000 ALTER TABLE `cbd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crecimiento`
--

DROP TABLE IF EXISTS `crecimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crecimiento` (
  `id_crecimiento` int(11) NOT NULL AUTO_INCREMENT,
  `dificultad` varchar(45) DEFAULT NULL,
  `altura` varchar(45) DEFAULT NULL,
  `rendimiento` varchar(45) DEFAULT NULL,
  `florecimiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_crecimiento`),
  UNIQUE KEY `id_crecimiento_UNIQUE` (`id_crecimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crecimiento`
--

LOCK TABLES `crecimiento` WRITE;
/*!40000 ALTER TABLE `crecimiento` DISABLE KEYS */;
INSERT INTO `crecimiento` VALUES (1,'facil','30 - 78','1 - 3','10 - 12'),(4,'moderado','< 30','3 - 6','7 - 9'),(6,'moderado','< 30','1 - 3','7 - 9'),(7,'moderado','30 - 78','1 - 3','10 - 12'),(8,'moderado','30 - 78','3 - 6','7 - 9'),(12,'facil','< 30','0.5 - 1','7 - 9'),(13,'facil','< 30','0.5 - 1','7 - 9'),(14,'dificil','> 78','3 - 6','> 12'),(15,'moderado','30 - 78','3 - 6','7 - 9'),(16,'moderado','30 - 78','1 - 3','> 12'),(17,'moderado','30 - 78','3 - 6','7 - 9'),(18,'facil','30 - 78','1 - 3','7 - 9'),(19,'facil','< 30','0.5 - 1','7 - 9'),(20,'facil','< 30','0.5 - 1','7 - 9'),(22,'moderado','< 30','0.5 - 1','7 - 9'),(23,'facil','< 30','0.5 - 1','7 - 9'),(24,'moderado','< 30','0.5 - 1','7 - 9'),(25,'facil','< 30','0.5 - 1','7 - 9'),(26,'facil','< 30','0.5 - 1','7 - 9'),(27,'facil','< 30','0.5 - 1','7 - 9'),(28,'facil','< 30','0.5 - 1','7 - 9'),(29,'facil','< 30','0.5 - 1','7 - 9'),(30,'facil','< 30','0.5 - 1','7 - 9'),(31,'facil','< 30','0.5 - 1','7 - 9'),(39,'facil','< 30','0.5 - 1','7 - 9'),(40,'facil','< 30','0.5 - 1','7 - 9');
/*!40000 ALTER TABLE `crecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `efectos`
--

DROP TABLE IF EXISTS `efectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `efectos` (
  `id_weed` int(11) NOT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `porcentaje` tinyint(3) DEFAULT NULL,
  `id_efectos` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_efectos`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `efectos`
--

LOCK TABLES `efectos` WRITE;
/*!40000 ALTER TABLE `efectos` DISABLE KEYS */;
INSERT INTO `efectos` VALUES (26,1,'sensaciones1',10,1),(26,1,'sensaciones2',10,2),(26,1,'sensaciones3',10,3),(26,1,'sensaciones4',10,4),(26,1,'sensaciones5',10,5),(26,2,'ayuda1',20,6),(26,2,'ayuda2',20,7),(26,2,'ayuda3',20,8),(26,2,'ayuda4',20,9),(26,2,'ayuda5',20,10),(26,3,'negativos1',30,11),(26,3,'negativos2',30,12),(26,3,'negativos3',30,13),(26,3,'negativos4',30,14),(26,3,'negativos5',30,15);
/*!40000 ALTER TABLE `efectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_weed` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (2,3,'mari.jpeg'),(4,5,'fondo3.jpg'),(5,5,'fondo4.jpeg'),(6,6,'bg.jpg'),(7,7,'fondo zoom.jpg'),(8,11,'weeddfgh.jfif'),(9,11,'1weed.jfif'),(10,12,'templo 3.jpg'),(11,12,'templo 3-Pano.dng'),(12,12,'templo 2.jpg'),(13,13,'jaja1.jfif'),(14,13,'asdasd.jfif'),(15,1,'amnesia1.jpg'),(20,3,'Platinum1.jpg'),(21,4,'PIEFACE1.jpg'),(22,5,'bananasplit1.jpg'),(23,6,'elektra1.jpg'),(24,8,'cepa de prueba.jfif'),(25,9,'cepa de prueba 1.jfif'),(26,2,'dosidos1.jfif'),(27,10,'stock-photo-marijuana-head-and-cannabis-consu'),(28,11,'purplepunch1.jpeg'),(29,12,'SugarCookie1.jpg'),(30,13,'wedding-cake1.jpg'),(31,14,'limonhaze1.jpg'),(32,15,'Candyland1.jpeg'),(33,16,'White Bu1.jpg'),(34,17,'Clenentine1.webp'),(47,25,'WhatsApp Image 2020-05-06 at 11.10.50.jpeg'),(48,25,'WhatsApp Image 2020-07-23 at 23.52.26.jpeg'),(49,26,'WhatsApp Image 2020-05-06 at 11.10.50.jpeg'),(50,26,'WhatsApp Image 2020-07-23 at 23.52.26.jpeg');
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_blog`
--

DROP TABLE IF EXISTS `fotos_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotos_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_blog` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_blog`
--

LOCK TABLES `fotos_blog` WRITE;
/*!40000 ALTER TABLE `fotos_blog` DISABLE KEYS */;
INSERT INTO `fotos_blog` VALUES (1,'fondo2.jpg',1),(2,'fondo3.jpg',1),(3,'mari.jpeg',2),(4,'main2.jpg',2),(5,'fondo4.jpeg',3),(6,'fondo4.jpg',3);
/*!40000 ALTER TABLE `fotos_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_recetas`
--

DROP TABLE IF EXISTS `fotos_recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotos_recetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_receta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_recetas`
--

LOCK TABLES `fotos_recetas` WRITE;
/*!40000 ALTER TABLE `fotos_recetas` DISABLE KEYS */;
INSERT INTO `fotos_recetas` VALUES (1,'brownie-trozos1-e1584371731926.jpg',1),(2,'brownie-de-chocolate.jpg',1),(22,'Captura de pantalla (18).png',3),(21,'Captura de pantalla (17).png',3),(20,'Captura de pantalla (9).png',2),(19,'Captura de pantalla (1).png',2),(18,'modificado.png',1);
/*!40000 ALTER TABLE `fotos_recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recetas`
--

DROP TABLE IF EXISTS `recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1500) DEFAULT NULL,
  `subtitulo` varchar(45) DEFAULT NULL,
  `descripcion2` varchar(1500) DEFAULT NULL,
  `ingredientes` varchar(1500) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `id_categoria_receta` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recetas`
--

LOCK TABLES `recetas` WRITE;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` VALUES (1,'brownie magico','espaciales chidos cambio','pos estan chidos cambio','saben chido (me contaron) cambio','pos maria y brownie','2020-08-08 03:49:30',NULL,'1',0),(2,'té','pos un té we','pues que mas?','pos le pones awa','awa de uwu','2020-08-09 05:08:40',NULL,'2',1),(3,'ensalada','pos mota we','pos lleva carne','pos jamon','pues weed y jamón','2020-08-09 06:04:57',NULL,'1',1);
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `calificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terpenos`
--

DROP TABLE IF EXISTS `terpenos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `terpenos` (
  `id_terpeno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_terpeno`),
  UNIQUE KEY `id_terpeno_UNIQUE` (`id_terpeno`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terpenos`
--

LOCK TABLES `terpenos` WRITE;
/*!40000 ALTER TABLE `terpenos` DISABLE KEYS */;
INSERT INTO `terpenos` VALUES (1,'Limoneno',NULL),(2,'Pineno',NULL),(3,'Eucaliptol',NULL),(4,'Linalool',NULL),(5,'Cariofileno',NULL),(6,'Mirceno',NULL),(7,'Linalol',NULL),(9,'Humuleno',NULL);
/*!40000 ALTER TABLE `terpenos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thc`
--

DROP TABLE IF EXISTS `thc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thc` (
  `id_thc` int(11) NOT NULL AUTO_INCREMENT,
  `min` float DEFAULT NULL,
  `max` float DEFAULT NULL,
  PRIMARY KEY (`id_thc`),
  UNIQUE KEY `id_thc_UNIQUE` (`id_thc`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thc`
--

LOCK TABLES `thc` WRITE;
/*!40000 ALTER TABLE `thc` DISABLE KEYS */;
INSERT INTO `thc` VALUES (1,15,0),(4,15,0),(6,13,0),(7,16,0),(8,14,0),(12,15,0),(13,3,0),(14,5,0),(15,16,20),(16,18,22),(17,14,20),(18,16,20),(19,14,21),(20,0.85,0),(22,18,22),(23,2,22),(24,6,0),(25,16,20),(26,19,23),(27,17,24),(28,16,19),(29,16,21),(30,16,19),(31,14,19),(39,9,10),(40,5,0);
/*!40000 ALTER TABLE `thc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `contrasena` varchar(60) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'prueba1','$2y$10$zIAVTYkRNUgtT8imUmfCheJwBBaPXHv7nUG2EihnLZDjYgf8VCyjS','admin','prueba1'),(2,'admin','$2y$10$JuZBcChUMCQLtdHNsh/Cc.okbS1kUnM.ngPlGH7oo27/Af2/KYfGi','admin','admin');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weed`
--

DROP TABLE IF EXISTS `weed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `id_crecimiento` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `id_thc` int(11) DEFAULT NULL,
  `id_cbd` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `id_crecimientox` (`id_crecimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weed`
--

LOCK TABLES `weed` WRITE;
/*!40000 ALTER TABLE `weed` DISABLE KEYS */;
INSERT INTO `weed` VALUES (1,2,15,'Amnesia Haze','Con sabores terrosos de limones y cÃ­tricos, Amnesia Haze es una variedad perfecta para comenzar el dÃ­a con una sonrisa. El zumbido estimulante y enÃ©rgico es algo que no olvidarÃ¡ pronto. Su genÃ©tica se remonta a las variedades autÃ³ctonas del sur de Asia y Jamaica, y este ganador de la Cannabis Cup (1er lugar 2004, 1er lugar Sativa Cup 2012) desde entonces se ha popularizado en las cafeterÃ­as de Amsterdam.',15,21,1),(2,1,16,'DO-SI-DOS','Es una cepa hÃ­brida con aroma picante, dulce y terroso, hojas de color verde lima y lavanda. Tiene gran efecto relajante, ayuda con la migraÃ±a, nÃ¡useas, estrÃ©s. Es ideal para los que sufren de insomnio. ',16,22,1),(3,1,17,'Platinum OG ',' Es una cepa hÃ­brida se afirma como una de las cepas mÃ¡s pesadas. Tiene una potente sedaciÃ³n fÃ­sica, adecuada para el uso nocturno. Alivia del dolor, ayuda con el insomnio y espasmos musculares. Es recomendado en personas con estrÃ©s crÃ³nico o ansiedad.',17,23,1),(4,1,18,'Pie Face','Es una cepa hÃ­brida, con sabor a cereza dulce. Ideal para las tardes sociales y relajarse despuÃ©s de un dia estresante. Ayuda con la depresiÃ³n, ansiedad y dolor, tambiÃ©n ayuda a abrir el apetito. ',18,24,1),(5,1,19,'Banana Split','Es una cepa hÃ­brida pero tiene sativa dominante. Te hace sentir feliz, eufÃ³rico y relajado. Ayuda con el estrÃ©s y la fatiga. Con sabor a cÃ­tricos dulces. \r\n',19,25,1),(6,1,20,'Elektra','Es una cepa hÃ­brida con CBD dominante. Ayuda a controlar convulsiones, la paranoia y el dolor. Es ideal para relajarse durante el dÃ­a, tiene un rico aroma a vino, chocolate y cÃ­tricos.\r\n',20,26,1),(8,3,22,'cepa de prueba','holá comó estás? ',22,28,0),(9,3,23,'cepa de prueba con acentos 2 BORRAR','ácento lleva ácento cómo éstas jajaj nó á á é í ',23,29,0),(10,1,24,'cepa Prueba','nani',24,30,0),(11,3,25,'Purple Punch ','Es la uniÃ³n dulce y sedante de dos clÃ¡sicos indica dominante. Al mezclar Larry OG  con Granddaddy Purple, naciÃ³ el asombro Purple Punch. Que huele a caramelo de uva, es  recomendada  para despuÃ©s de la cena. Sus efectos pueden ayudar a controlar las nÃ¡useas, el estrÃ©s, los dolores corporales leves y el insomnio. \r\n',25,31,1),(12,3,26,'Sugar Cookie ','Es una cepa hibrida indica dominante con un dulzor aromÃ¡tico y con sabor a frutas tropicales. Ayuda a relajar bastante, te da una sensacion de felicidad te ayuda con el dolor. Es ideal para fumar antes de dormir, brinda una calma profunda para todo el cuerpo. \r\n',26,32,1),(13,3,27,'Wedding Cake','Es una cepa hÃ­brida indica dominante, conocida por sus efectos relajantes eufÃ³ricos, con sabor terrosos y picantes, es ideal para personas con depresiÃ³n ansiedad y estrÃ©s.  Esta delicia debe disfrutarse con mucho cuidado debido a su contenido extremadamente alto de THC.\r\n',27,33,1),(14,2,28,'Lemon Haze','Es una cepa sativa, se caracteriza por oler a rodajas de limÃ³n reciÃ©n peladas. Ayuda con el estrÃ©s y te da una sensaciÃ³n de felicidad, tambiÃ©n te da energÃ­a para seguir con las actividades del dÃ­a. \r\n\r\n',28,34,1),(15,2,29,'Candyland',' Es un hÃ­brido sativa dominante obtenido de Granddaddy Purple y Bay Platinum Cookies. Ofrece efectos alegres y estimulantes, lo que le convierte en una variedad perfecta para reuniones sociales o pasatiempos creativos. Es ideal para moderar el dolor, la tensiÃ³n y el mal humor. \r\n',29,35,1),(16,2,30,'White Buffalo ',' Es una variedad de cannabis con dominancia sativa 80/20 que desciende de un hÃ­brido Romulan y Blackberry Kush este bÃºfalo blanco es una rareza preciada de sabor agridulce. White Buffalo proporciona una poderosa explosiÃ³n de euforia que puede sorprender a cualquier consumidor que espera una experiencia activa y edificante.\r\n',30,36,1),(17,2,31,'Clementine ','Es una cepa energizante de dominancia sativa que se elabora cruzando Tangie con Lemon Skunk. Esta variedad es amada por su sabor dulce y aroma cÃ­trico, dicen que Clementine es perfecta para despertar y hornear o para activar la concentraciÃ³n, ayuda con el estrÃ©s depresiÃ³n y ansiedad. Clementine ha ganado premios, incluido el mejor concentrado de sativa en 2015. \r\n\r\n\r\n',31,37,1),(25,2,39,'asd','asd',39,45,0),(26,2,40,'prueba con efectos','prueba con efectos',40,46,1);
/*!40000 ALTER TABLE `weed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weed_terpenos`
--

DROP TABLE IF EXISTS `weed_terpenos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weed_terpenos` (
  `id_weed` int(11) DEFAULT NULL,
  `id_terpeno` int(11) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weed_terpenos`
--

LOCK TABLES `weed_terpenos` WRITE;
/*!40000 ALTER TABLE `weed_terpenos` DISABLE KEYS */;
INSERT INTO `weed_terpenos` VALUES (3,1,66),(3,5,100),(3,6,33),(5,2,66),(5,5,33),(5,8,100),(6,1,100),(6,2,66),(6,5,12),(7,2,33),(7,5,66),(7,6,100),(11,1,66),(11,5,100),(11,9,33),(12,1,100),(12,2,10),(12,3,22),(3,1,75),(3,5,100),(3,9,35),(4,1,75),(4,5,100),(4,9,35),(5,1,35),(5,6,75),(6,2,75),(6,5,35),(6,6,100),(8,1,66),(8,2,2),(8,3,20),(9,1,100),(9,2,10),(9,3,50),(2,1,1),(2,3,2),(2,6,99),(10,1,12),(10,3,6),(1,2,10),(1,4,9),(1,6,2),(11,1,3),(11,2,2),(11,5,5),(12,1,75),(12,5,100),(12,9,40),(13,1,100),(13,5,75),(13,6,35),(14,5,87),(15,1,75),(15,5,100),(15,9,45),(16,1,35),(16,5,100),(16,6,85),(17,5,35),(25,1,2),(26,1,1),(26,3,5),(26,6,9);
/*!40000 ALTER TABLE `weed_terpenos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-15 23:33:57
