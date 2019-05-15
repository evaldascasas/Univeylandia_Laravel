-- MySQL dump 10.15  Distrib 10.0.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: univeylandia.cat    Database: univeylandia_test2
-- ------------------------------------------------------
-- Server version	10.0.38-MariaDB-0ubuntu0.16.04.1

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

USE univeylandia_laravel_final;
--
-- Table structure for table `assign_emp_atraccions`
--

DROP TABLE IF EXISTS `assign_emp_atraccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_emp_atraccions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_empleat` int(10) unsigned NOT NULL,
  `id_atraccio` int(10) unsigned NOT NULL,
  `data_inici` date NOT NULL,
  `data_fi` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `assign_emp_atraccions_id_empleat_foreign` (`id_empleat`),
  KEY `assign_emp_atraccions_id_atraccio_foreign` (`id_atraccio`),
  CONSTRAINT `assign_emp_atraccions_id_atraccio_foreign` FOREIGN KEY (`id_atraccio`) REFERENCES `atraccions` (`id`),
  CONSTRAINT `assign_emp_atraccions_id_empleat_foreign` FOREIGN KEY (`id_empleat`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_emp_atraccions`
--

LOCK TABLES `assign_emp_atraccions` WRITE;
/*!40000 ALTER TABLE `assign_emp_atraccions` DISABLE KEYS */;
/*!40000 ALTER TABLE `assign_emp_atraccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atraccions`
--

DROP TABLE IF EXISTS `atraccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atraccions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_atraccio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipus_atraccio` int(10) unsigned NOT NULL,
  `data_inauguracio` date NOT NULL,
  `altura_min` int(10) unsigned NOT NULL,
  `altura_max` int(10) unsigned NOT NULL,
  `accessibilitat` tinyint(1) NOT NULL,
  `acces_express` tinyint(1) NOT NULL,
  `descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `votacions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `atraccions_nom_atraccio_unique` (`nom_atraccio`),
  KEY `atraccions_tipus_atraccio_foreign` (`tipus_atraccio`),
  CONSTRAINT `atraccions_tipus_atraccio_foreign` FOREIGN KEY (`tipus_atraccio`) REFERENCES `tipus_atraccions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atraccions`
--

LOCK TABLES `atraccions` WRITE;
/*!40000 ALTER TABLE `atraccions` DISABLE KEYS */;
INSERT INTO `atraccions` VALUES (1,'Dragon Stratus',1,'2019-03-12',130,300,1,1,'L\'atracció més espectacular de tot el parc d\'Univeylandia, un montanya russa amb tres loops que et deixaran una experiència per a tota la vida.','/img/atraccions/atraccio1.jpg','20','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Tornado',2,'2019-03-21',100,200,1,0,'El Tornado és una atracció que et fa sentir la sensació d\'estar dins d\'un tornado de l\'Oest del continent Americà.','/img/atraccions/atraccio2.jpg','20','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'West Canyon',3,'2019-03-22',90,300,0,1,'És la unica atraccio d\'aigua del nostre parc, aquesta atracció et porta per dins dels canyons de l\'Oest.','/img/atraccions/atraccio3.jpg','8','2019-05-15 08:55:16','2019-05-15 08:55:16'),(4,'Vasin',3,'2019-03-23',50,300,0,1,' L\'atracció per als nens més petits que vinguin al parc, és una atracció apta per a tota la familia.','/img/atraccions/atraccio4.jpg','8','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `atraccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atributs_producte`
--

DROP TABLE IF EXISTS `atributs_producte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atributs_producte` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mida` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tickets_viatges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_path_aigua` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preu` int(11) NOT NULL,
  `id_atraccio` int(10) unsigned DEFAULT NULL,
  `data_entrada` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atributs_producte`
--

LOCK TABLES `atributs_producte` WRITE;
/*!40000 ALTER TABLE `atributs_producte` DISABLE KEYS */;
INSERT INTO `atributs_producte` VALUES (1,'2','','100','storage/productes/1.png','','',20,NULL,NULL,'2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'4','','100','storage/productes/2.png','','',30,NULL,NULL,'2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'6','','3','storage/productes/3.png','','',10,NULL,NULL,'2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `atributs_producte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Parc','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Atraccions','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `missatge` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `check` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cistelles`
--

DROP TABLE IF EXISTS `cistelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cistelles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuari` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cistelles_id_usuari_foreign` (`id_usuari`),
  CONSTRAINT `cistelles_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cistelles`
--

LOCK TABLES `cistelles` WRITE;
/*!40000 ALTER TABLE `cistelles` DISABLE KEYS */;
/*!40000 ALTER TABLE `cistelles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacte`
--

DROP TABLE IF EXISTS `contacte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacte` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipus_pregunta` enum('Entrades','Botiga','Horaris','Devolucions','Comandes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `missatge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tiquet` int(11) NOT NULL,
  `id_estat` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `contacte_id_estat_foreign` (`id_estat`),
  CONSTRAINT `contacte_id_estat_foreign` FOREIGN KEY (`id_estat`) REFERENCES `estat_incidencies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacte`
--

LOCK TABLES `contacte` WRITE;
/*!40000 ALTER TABLE `contacte` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dades_empleats`
--

DROP TABLE IF EXISTS `dades_empleats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dades_empleats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codi_seg_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_nomina` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IBAN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialitat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrec` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inici_contracte` date NOT NULL,
  `data_fi_contracte` date NOT NULL,
  `id_horari` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dades_empleats_codi_seg_social_unique` (`codi_seg_social`),
  UNIQUE KEY `dades_empleats_num_nomina_unique` (`num_nomina`),
  KEY `dades_empleats_id_horari_foreign` (`id_horari`),
  CONSTRAINT `dades_empleats_id_horari_foreign` FOREIGN KEY (`id_horari`) REFERENCES `horaris` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dades_empleats`
--

LOCK TABLES `dades_empleats` WRITE;
/*!40000 ALTER TABLE `dades_empleats` DISABLE KEYS */;
INSERT INTO `dades_empleats` VALUES (1,'CODISS123456789','N123465789','IBAN123456789','IT','Administrador','2015-09-06','2020-09-06',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(2,'9552400','B43461505','ES9453671587461797764151','General','General','2019-09-06','2020-09-06',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(3,'6294071','A51307744','ES3307628384541000022578','Manteniment','Manteniment','2019-09-06','2020-09-06',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(4,'6409302','B82389765','ES7517156266472077959072','Neteja','Neteja','2019-09-06','2020-09-06',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(5,'7579828','C01449571','ES5988673802907012279326','monetize scalable infomediaries','IT','2007-10-07','2001-06-15',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(6,'8213082','R29779517','ES1436964220043028328937','target real-time users','Manteniment','2000-03-18','2015-04-26',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(7,'3698090','S83115358','ES9777396444674508009345','recontextualize cross-platform synergies','Treballador General','1988-01-23','1993-11-17',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(8,'4902460','G28515550','ES1828244667988298068959','engineer world-class architectures','Seguretat','1983-11-14','2000-01-03',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(9,'8316744','P51749414','ES7142762648499470808131','harness user-centric initiatives','Manteniment','1985-01-16','1972-04-01',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(10,'6393344','Q40880015','ES8192111969598908958306','orchestrate transparent e-business','Atenció al client','1977-07-02','2001-10-28',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(11,'8224818','J46234269','ES0780285891471339937463','matrix interactive action-items','Show','1970-02-13','2013-06-27',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(12,'9723511','J85563734','ES7127922123743676376024','extend 24/365 systems','IT','1972-01-26','1998-12-18',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(13,'1417095','W22258840','ES4193504673205493376115','envisioneer leading-edge ROI','IT','1978-09-05','2019-07-05',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(14,'3695439','G19660843','ES2938594167055347497848','aggregate compelling eyeballs','Manteniment','1975-11-18','1991-11-02',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(15,'9503975','V04362991','ES0616565356388231609306','utilize global portals','Seguretat','1999-07-25','2015-04-29',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(16,'3961947','H38644492','ES1304097624462265230257','e-enable value-added e-commerce','Neteja','1996-11-18','1971-05-03',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(17,'8154750','J39295050','ES8360314411131183255147','empower user-centric bandwidth','Neteja','1978-05-25','2016-06-11',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(18,'7457087','B40710363','ES0264577558343002922764','deploy interactive networks','Neteja','2006-04-24','2011-03-07',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(19,'5214998','E19386403','ES1082381578608759521186','unleash sticky paradigms','Manteniment','1986-03-04','2007-06-21',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(20,'7595922','R75946399','ES8165332351502950794450','streamline scalable ROI','Manteniment','2012-05-12','2014-07-27',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(21,'1750270','C00263965','ES5630013446569599733727','extend leading-edge synergies','Seguretat','2010-11-22','1997-05-16',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(22,'5580830','J89508505','ES2837069309447015087196','leverage proactive metrics','Manteniment','1979-08-06','2010-03-18',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(23,'2834811','P44982447','ES9550040925882140752063','redefine collaborative bandwidth','Show','1988-04-12','1988-02-24',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(24,'1038119','G60046817','ES0239437922560984916930','extend compelling infrastructures','Treballador General','1985-01-28','1997-01-05',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(25,'5400870','U10338545','ES7637748935447517120339','disintermediate vertical e-markets','Neteja','1992-06-25','2012-04-05',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(26,'7464910','H42201011','ES5364396410829987320517','envisioneer B2C action-items','Show','1971-02-07','2016-05-03',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(27,'8722305','A91792830','ES7017230678665103421919','recontextualize seamless e-business','Manteniment','1992-02-09','1989-05-25',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(28,'4901565','U75850737','ES8859256615343237247717','envisioneer collaborative channels','Atenció al client','1998-05-02','2000-12-13',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(29,'7169704','Q43180627','ES3338294022368064153909','incentivize cutting-edge functionalities','Seguretat','1979-09-12','1997-05-21',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(30,'8969828','C71165606','ES7858888083849529713139','transform visionary platforms','Neteja','2000-10-14','1985-02-25',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(31,'1886458','F83966550','ES4752728846620459667834','syndicate global schemas','Neteja','1970-11-05','2015-03-12',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(32,'1499869','J51712611','ES8908968109857111593234','synthesize revolutionary architectures','Neteja','1986-08-27','1983-10-11',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(33,'7663727','U95323021','ES4417041731319283399353','reinvent out-of-the-box infomediaries','Manteniment','2013-11-17','2001-07-31',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(34,'8589791','D39438799','ES6711814297100414879953','brand visionary bandwidth','Seguretat','1993-07-24','1980-03-06',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(35,'5215782','W23160437','ES7723541730374202386083','leverage collaborative models','Administrador','1974-06-21','2000-09-23',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(36,'6599742','J26704595','ES8488204770388934984003','expedite cross-media technologies','Administrador','2002-04-05','1995-10-26',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(37,'1454090','U08786444','ES8347506783728200025462','utilize compelling infomediaries','Administrador','1994-02-28','1976-12-25',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(38,'4935469','D77647888','ES9859886104392934716915','engineer dynamic interfaces','Administrador','1995-10-08','1970-11-13',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(39,'7067074','G94848831','ES2401384935245239531302','optimize best-of-breed networks','Administrador','1978-06-07','2003-12-30',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(40,'7079488','A15781940','ES2247780134423190666577','scale world-class systems','Administrador','1973-11-21','1976-04-22',2,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(41,'1563525','V02931902','ES5886951137445160139508','productize user-centric e-markets','Administrador','1986-04-06','1976-05-23',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(42,'3531642','J38072202','ES4460175275516926081717','harness user-centric interfaces','Administrador','1971-09-17','1993-10-30',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(43,'6264160','A60531993','ES7757075086328069626652','harness 24/7 platforms','Administrador','1995-03-05','2019-10-06',3,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(44,'8549875','Q81037875','ES9094688979958679269045','evolve best-of-breed infomediaries','Administrador','2000-02-26','1982-07-13',1,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL);
/*!40000 ALTER TABLE `dades_empleats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleat_zona`
--

DROP TABLE IF EXISTS `empleat_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleat_zona` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_zona` int(10) unsigned NOT NULL,
  `id_empleat` int(10) unsigned NOT NULL,
  `data_inici` date NOT NULL,
  `data_fi` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleat_zona`
--

LOCK TABLES `empleat_zona` WRITE;
/*!40000 ALTER TABLE `empleat_zona` DISABLE KEYS */;
INSERT INTO `empleat_zona` VALUES (1,1,11,'2019-12-18','2019-12-20','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `empleat_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estat_incidencies`
--

DROP TABLE IF EXISTS `estat_incidencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estat_incidencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_estat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estat_incidencies`
--

LOCK TABLES `estat_incidencies` WRITE;
/*!40000 ALTER TABLE `estat_incidencies` DISABLE KEYS */;
INSERT INTO `estat_incidencies` VALUES (1,'To-do','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'In progress','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'Done','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `estat_incidencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `horaris`
--

DROP TABLE IF EXISTS `horaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horaris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `torn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horaris`
--

LOCK TABLES `horaris` WRITE;
/*!40000 ALTER TABLE `horaris` DISABLE KEYS */;
INSERT INTO `horaris` VALUES (1,'Mati','2019-05-15 08:55:11','2019-05-15 08:55:11'),(2,'Tarda','2019-05-15 08:55:11','2019-05-15 08:55:11'),(3,'Nit','2019-05-15 08:55:11','2019-05-15 08:55:11');
/*!40000 ALTER TABLE `horaris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencies`
--

DROP TABLE IF EXISTS `incidencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prioritat` int(10) unsigned NOT NULL,
  `id_estat` int(10) unsigned NOT NULL,
  `id_usuari_reportador` int(10) unsigned NOT NULL,
  `id_usuari_assignat` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `incidencies_id_prioritat_foreign` (`id_prioritat`),
  KEY `incidencies_id_estat_foreign` (`id_estat`),
  KEY `incidencies_id_usuari_reportador_foreign` (`id_usuari_reportador`),
  KEY `incidencies_id_usuari_assignat_foreign` (`id_usuari_assignat`),
  CONSTRAINT `incidencies_id_estat_foreign` FOREIGN KEY (`id_estat`) REFERENCES `estat_incidencies` (`id`),
  CONSTRAINT `incidencies_id_prioritat_foreign` FOREIGN KEY (`id_prioritat`) REFERENCES `tipus_prioritat` (`id`),
  CONSTRAINT `incidencies_id_usuari_assignat_foreign` FOREIGN KEY (`id_usuari_assignat`) REFERENCES `users` (`id`),
  CONSTRAINT `incidencies_id_usuari_reportador_foreign` FOREIGN KEY (`id_usuari_reportador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies`
--

LOCK TABLES `incidencies` WRITE;
/*!40000 ALTER TABLE `incidencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linia_cistelles`
--

DROP TABLE IF EXISTS `linia_cistelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linia_cistelles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cistella` int(10) unsigned NOT NULL,
  `producte` int(10) unsigned NOT NULL,
  `quantitat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `linia_cistelles_id_cistella_foreign` (`id_cistella`),
  KEY `linia_cistelles_producte_foreign` (`producte`),
  CONSTRAINT `linia_cistelles_id_cistella_foreign` FOREIGN KEY (`id_cistella`) REFERENCES `cistelles` (`id`),
  CONSTRAINT `linia_cistelles_producte_foreign` FOREIGN KEY (`producte`) REFERENCES `productes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linia_cistelles`
--

LOCK TABLES `linia_cistelles` WRITE;
/*!40000 ALTER TABLE `linia_cistelles` DISABLE KEYS */;
/*!40000 ALTER TABLE `linia_cistelles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linia_contacte`
--

DROP TABLE IF EXISTS `linia_contacte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linia_contacte` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ticket_contacte` int(10) unsigned NOT NULL,
  `id_empleat` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `linia_contacte_id_ticket_contacte_foreign` (`id_ticket_contacte`),
  KEY `linia_contacte_id_empleat_foreign` (`id_empleat`),
  CONSTRAINT `linia_contacte_id_empleat_foreign` FOREIGN KEY (`id_empleat`) REFERENCES `users` (`id`),
  CONSTRAINT `linia_contacte_id_ticket_contacte_foreign` FOREIGN KEY (`id_ticket_contacte`) REFERENCES `contacte` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linia_contacte`
--

LOCK TABLES `linia_contacte` WRITE;
/*!40000 ALTER TABLE `linia_contacte` DISABLE KEYS */;
/*!40000 ALTER TABLE `linia_contacte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linia_ventes`
--

DROP TABLE IF EXISTS `linia_ventes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linia_ventes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) unsigned NOT NULL,
  `producte` int(10) unsigned NOT NULL,
  `quantitat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `linia_ventes_id_venta_foreign` (`id_venta`),
  KEY `linia_ventes_producte_foreign` (`producte`),
  CONSTRAINT `linia_ventes_id_venta_foreign` FOREIGN KEY (`id_venta`) REFERENCES `venta_productes` (`id`),
  CONSTRAINT `linia_ventes_producte_foreign` FOREIGN KEY (`producte`) REFERENCES `productes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linia_ventes`
--

LOCK TABLES `linia_ventes` WRITE;
/*!40000 ALTER TABLE `linia_ventes` DISABLE KEYS */;
INSERT INTO `linia_ventes` VALUES (1,1,1,1,'2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,1,2,1,'2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,1,3,1,'2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `linia_ventes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_08_08_100000_create_telescope_entries_table',1),(2,'2019_01_22_153409_create_horaris_table',1),(3,'2019_01_22_153739_create_rol_table',1),(4,'2019_01_22_155810_create_dades_empleat_table',1),(5,'2019_01_22_180830_create_users_table',1),(6,'2019_01_22_181415_create_tipus_atraccio_table',1),(7,'2019_01_22_181520_create_password_resets_table',1),(8,'2019_01_22_182409_create_categories_table',1),(9,'2019_01_22_182609_create_atributs_producte_table',1),(10,'2019_01_22_182609_create_tipus_producte_table',1),(11,'2019_01_22_182851_create_producte_table',1),(12,'2019_01_22_183344_create_cistella_table',1),(13,'2019_01_22_183734_create_linia_cistella_table',1),(14,'2019_01_22_184028_create_venta_producte_table',1),(15,'2019_01_22_184249_create_linia_venta_table',1),(16,'2019_01_22_184654_create_atraccio_table',1),(17,'2019_01_22_184655_create_votacio_user_atraccio_table',1),(18,'2019_01_22_190805_create_estat_incidencia_table',1),(19,'2019_01_22_191027_create_tipus_prioritat_table',1),(20,'2019_01_22_191124_create_incidencia_table',1),(21,'2019_01_22_192739_create_noticia_table',1),(22,'2019_01_22_194051_create_zona_table',1),(23,'2019_01_22_194229_create_servei_table',1),(24,'2019_01_22_194316_create_servei_zona_table',1),(25,'2019_03_05_141435_assign_emp_atraccions',1),(26,'2019_03_09_125654_create_empleat_zona_table',1),(27,'2019_03_12_173611_create_notifications_table',1),(28,'2019_03_17_183752_create_promocions_table',1),(29,'2019_04_02_182609_create_user_entra_atraccio_table',1),(30,'2019_04_10_143315_create_jobs_table',1),(31,'2019_04_10_153444_create_failed_jobs_table',1),(32,'2019_05_12_171046_create_contacte_table',1),(33,'2019_05_12_171100_create_linia_contacte_table',1),(34,'2019_05_12_171107_create_chat_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticies`
--

DROP TABLE IF EXISTS `noticies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuari` int(10) unsigned NOT NULL,
  `categoria` int(10) unsigned NOT NULL,
  `path_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `noticies_titol_unique` (`titol`),
  UNIQUE KEY `noticies_str_slug_unique` (`str_slug`),
  KEY `noticies_id_usuari_foreign` (`id_usuari`),
  KEY `noticies_categoria_foreign` (`categoria`),
  CONSTRAINT `noticies_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `categories` (`id`),
  CONSTRAINT `noticies_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticies`
--

LOCK TABLES `noticies` WRITE;
/*!40000 ALTER TABLE `noticies` DISABLE KEYS */;
INSERT INTO `noticies` VALUES (1,'Tancament 20/03/2019','El parc tancarà el día 20/03/19 per acabar de preparar la nova temporada.',10,1,'/storage/noticies/tancat.jpg','tancament-20032019','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Nova atracció!','El dia 10/04/2019 inaugurarem una nova atracció anomenada Furious Agramunt. Aquesta atracció posarà a prova als més valents, passant de 0 a 150 km/h en tan sols 2 segons. L\'atracció té un recorregut que llista gairebé tocant el terra.No t\'ho perdis!',10,2,'/storage/noticies/atraccio.jpg','nova-atraccio','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'Decoració de nadal','La decoració de nadal estarà disponible a partir del 20/11/2019, toca celebrar la finalització del sprint! :)',10,1,'/storage/noticies/nadal.jpg','decoracio-de-nadal','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `noticies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `productes`
--

DROP TABLE IF EXISTS `productes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `atributs` int(10) unsigned NOT NULL,
  `descripcio` text COLLATE utf8mb4_unicode_ci,
  `estat` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productes`
--

LOCK TABLES `productes` WRITE;
/*!40000 ALTER TABLE `productes` DISABLE KEYS */;
INSERT INTO `productes` VALUES (1,1,'Ticket general xiquet',1,'2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,2,'Ticket express adult',1,'2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,3,'Ticket viatges adult',1,'2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `productes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocions`
--

DROP TABLE IF EXISTS `promocions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuari` int(10) unsigned NOT NULL,
  `path_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `promocions_titol_unique` (`titol`),
  UNIQUE KEY `promocions_slug_unique` (`slug`),
  KEY `promocions_id_usuari_foreign` (`id_usuari`),
  CONSTRAINT `promocions_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocions`
--

LOCK TABLES `promocions` WRITE;
/*!40000 ALTER TABLE `promocions` DISABLE KEYS */;
INSERT INTO `promocions` VALUES (1,'Descomptes d\'estiu','\n                          <p>\n                          Aquest estiu si vens al parc amb més de dues persones et fem un descompte del 25%!\n                          </p>\n                          ',1,'/storage/promocions/promocio1.jpg','descomptes-destiu','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Descobreix els nostres paquets d\'entrades','\n                          <p>\n                          Amb les nostres tipologies d\'entrades de dies consecutius i combinades podràs gaudir de totes les nostres atraccions.\n                          </p>\n                          ',1,'/storage/promocions/promocio2.png','descobreix-els-nostres-paquets-dentrades','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `promocions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_rol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rols_nom_rol_unique` (`nom_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rols`
--

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` VALUES (1,'Client','2019-05-15 08:55:11','2019-05-15 08:55:11'),(2,'Gerent','2019-05-15 08:55:11','2019-05-15 08:55:11'),(3,'Manteniment','2019-05-15 08:55:11','2019-05-15 08:55:11'),(4,'Neteja','2019-05-15 08:55:11','2019-05-15 08:55:11'),(5,'Treballador General','2019-05-15 08:55:11','2019-05-15 08:55:11'),(6,'Atenció al client','2019-05-15 08:55:11','2019-05-15 08:55:11'),(7,'show','2019-05-15 08:55:11','2019-05-15 08:55:11'),(8,'Seguretat','2019-05-15 08:55:11','2019-05-15 08:55:11');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serveis`
--

DROP TABLE IF EXISTS `serveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serveis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serveis`
--

LOCK TABLES `serveis` WRITE;
/*!40000 ALTER TABLE `serveis` DISABLE KEYS */;
INSERT INTO `serveis` VALUES (1,'Neteja','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Manteniment','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'Atenció al client','2019-05-15 08:55:16','2019-05-15 08:55:16'),(4,'Show','2019-05-15 08:55:16','2019-05-15 08:55:16'),(5,'Seguretat','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `serveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serveis_zones`
--

DROP TABLE IF EXISTS `serveis_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serveis_zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_zona` int(10) unsigned NOT NULL,
  `id_empleat` int(10) unsigned NOT NULL,
  `data_inici` date NOT NULL,
  `data_fi` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `serveis_zones_id_zona_foreign` (`id_zona`),
  KEY `serveis_zones_id_empleat_foreign` (`id_empleat`),
  CONSTRAINT `serveis_zones_id_empleat_foreign` FOREIGN KEY (`id_empleat`) REFERENCES `users` (`id`),
  CONSTRAINT `serveis_zones_id_zona_foreign` FOREIGN KEY (`id_zona`) REFERENCES `zones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serveis_zones`
--

LOCK TABLES `serveis_zones` WRITE;
/*!40000 ALTER TABLE `serveis_zones` DISABLE KEYS */;
/*!40000 ALTER TABLE `serveis_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telescope_entries`
--

DROP TABLE IF EXISTS `telescope_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sequence`),
  UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  KEY `telescope_entries_batch_id_index` (`batch_id`),
  KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`),
  KEY `telescope_entries_family_hash_index` (`family_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telescope_entries`
--

LOCK TABLES `telescope_entries` WRITE;
/*!40000 ALTER TABLE `telescope_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `telescope_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telescope_entries_tags`
--

DROP TABLE IF EXISTS `telescope_entries_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  KEY `telescope_entries_tags_tag_index` (`tag`),
  CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telescope_entries_tags`
--

LOCK TABLES `telescope_entries_tags` WRITE;
/*!40000 ALTER TABLE `telescope_entries_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `telescope_entries_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telescope_monitoring`
--

DROP TABLE IF EXISTS `telescope_monitoring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telescope_monitoring`
--

LOCK TABLES `telescope_monitoring` WRITE;
/*!40000 ALTER TABLE `telescope_monitoring` DISABLE KEYS */;
/*!40000 ALTER TABLE `telescope_monitoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipus_atraccions`
--

DROP TABLE IF EXISTS `tipus_atraccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_atraccions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_atraccions`
--

LOCK TABLES `tipus_atraccions` WRITE;
/*!40000 ALTER TABLE `tipus_atraccions` DISABLE KEYS */;
INSERT INTO `tipus_atraccions` VALUES (1,'Extrema','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Mitjana','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'Familiar','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `tipus_atraccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipus_prioritat`
--

DROP TABLE IF EXISTS `tipus_prioritat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_prioritat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_prioritat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_prioritat`
--

LOCK TABLES `tipus_prioritat` WRITE;
/*!40000 ALTER TABLE `tipus_prioritat` DISABLE KEYS */;
INSERT INTO `tipus_prioritat` VALUES (1,'Baixa','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Normal','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'Urgent','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `tipus_prioritat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipus_producte`
--

DROP TABLE IF EXISTS `tipus_producte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_producte` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preu_base` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_producte`
--

LOCK TABLES `tipus_producte` WRITE;
/*!40000 ALTER TABLE `tipus_producte` DISABLE KEYS */;
INSERT INTO `tipus_producte` VALUES (1,'Ticket general adult','20','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Ticket general xiquet','15','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'Ticket general nado','0','2019-05-15 08:55:16','2019-05-15 08:55:16'),(4,'Ticket express adult','30','2019-05-15 08:55:16','2019-05-15 08:55:16'),(5,'Ticket express xiquet','25','2019-05-15 08:55:16','2019-05-15 08:55:16'),(6,'Ticket viatges adult','10','2019-05-15 08:55:16','2019-05-15 08:55:16'),(7,'Ticket viatges xiquet','7','2019-05-15 08:55:16','2019-05-15 08:55:16'),(8,'Foto','5','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `tipus_producte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_entra_atraccio`
--

DROP TABLE IF EXISTS `user_entra_atraccio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_entra_atraccio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuari` int(10) unsigned DEFAULT NULL,
  `id_atraccio` int(10) unsigned NOT NULL,
  `id_ticket` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_entra_atraccio_id_usuari_foreign` (`id_usuari`),
  KEY `user_entra_atraccio_id_ticket_foreign` (`id_ticket`),
  KEY `user_entra_atraccio_id_atraccio_foreign` (`id_atraccio`),
  CONSTRAINT `user_entra_atraccio_id_atraccio_foreign` FOREIGN KEY (`id_atraccio`) REFERENCES `atraccions` (`id`),
  CONSTRAINT `user_entra_atraccio_id_ticket_foreign` FOREIGN KEY (`id_ticket`) REFERENCES `productes` (`id`),
  CONSTRAINT `user_entra_atraccio_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_entra_atraccio`
--

LOCK TABLES `user_entra_atraccio` WRITE;
/*!40000 ALTER TABLE `user_entra_atraccio` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_entra_atraccio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognom1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cognom2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_naixement` date DEFAULT NULL,
  `adreca` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciutat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codi_postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipus_document` enum('DNI','NIE') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` enum('Home','Dona') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rol` int(10) unsigned NOT NULL,
  `id_dades_empleat` int(10) unsigned DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_rol_foreign` (`id_rol`),
  KEY `users_id_dades_empleat_foreign` (`id_dades_empleat`),
  CONSTRAINT `users_id_dades_empleat_foreign` FOREIGN KEY (`id_dades_empleat`) REFERENCES `dades_empleats` (`id`),
  CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Paco','Ramon','Mota','pacoramon@univeylandia-parc.cat','2019-05-15 06:55:11','$2y$10$MT7AiLHUFYT5SDcRRl2wxuAf.DhQ5nUcwF0RS2fZQpFpXWBAhXpq2','1995-09-06','Calle Piruleta 25','Amposta','Tarragona','43870','DNI','82953625P','Home','697682288',2,1,NULL,NULL,NULL,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(2,'Berta','Marcos','Bonilla','hugo.herrero@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1997-12-14','Travessera Gerard, 1, Entre suelo 0º','As Aguayo del Penedès','Guipuzkoa','26587','DNI','25540898L','Home','663 291507',1,NULL,NULL,NULL,'MJralLisZr','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(3,'Guillermo','Rolón','Prado','ochoa.omar@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1987-10-24','Paseo de Jesús, 025, 8º 4º','Soler del Penedès','Huesca','77219','DNI','43806151Y','Home','+34 991 61 4234',1,NULL,NULL,NULL,'7yjWF6Ybvm','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(4,'Marta','Laureano','Pérez','rafael.mota@example.com','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1981-06-13','Camiño Sisneros, 1, 1º C','Os Domingo','Salamanca','36111','DNI','29102164B','Home','+34 960306159',1,NULL,NULL,NULL,'BrVkGNxNvg','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(5,'Jordi','Quezada','Leal','aranda.daniel@example.com','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1973-09-20','Calle Ariadna, 35, 6º 0º','Cornejo Medio','Ourense','66071','DNI','61984469K','Home','993-938514',1,NULL,NULL,NULL,'2BiUc4fk4f','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(6,'Fátima','Valenzuela','Girón','mara.longoria@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1987-05-06','Travessera Malave, 16, Bajo 0º','Vall Pagan','Segovia','75644','DNI','27369407M','Home','690 901316',1,NULL,NULL,NULL,'PtNkPyccmE','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(7,'Eric','Delvalle','Barrera','pau.carrasquillo@example.net','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1972-02-12','Praza Sandoval, 3, 23º B','Villa Delatorre Baja','Jaén','21309','DNI','15491496F','Dona','646-285720',1,NULL,NULL,NULL,'9PQbA9Law5','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(8,'Oliver','Arias','Ayala','samuel10@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1984-05-01','Ruela Carmen, 3, 83º D','A Pons del Mirador','Huesca','60871','DNI','20292167A','Home','+34 911 585330',1,NULL,NULL,NULL,'GVSONPiImG','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(9,'Marina','Tirado','Arroyo','claudia.carballo@example.net','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1972-12-05','Passeig Sofía, 0, 6º D','La Prado Baja','Burgos','55713','DNI','55525160D','Home','+34 632-24-8207',1,NULL,NULL,NULL,'6hKXf7wKQ4','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(10,'José Manuel','Orellana','Raya','mireia03@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1986-11-30','Praza Jon, 192, 75º B','La Delgado del Puerto','Melilla','24515','DNI','11175869P','Dona','+34 951678867',1,NULL,NULL,NULL,'OWXcNljJxN','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(11,'Lidia','Robledo','Ontiveros','ana50@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1980-06-26','Plaça Irene, 0, 30º C','Caro de Lemos','Sevilla','12130','DNI','91551720J','Home','969 98 4279',1,NULL,NULL,NULL,'ExXaNapPZO','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(12,'Aina','Loya','Pabón','marco.madrid@example.net','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1985-05-02','Calle Ian, 80, Ático 7º','Roldán Alta','Granada','26437','NIE','23094195X','Dona','+34 935 58 9656',1,NULL,NULL,NULL,'JXmTvGepYQ','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(13,'Raúl','Cardona','Báez','sandra.orellana@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1982-06-21','Travesía Mayorga, 22, 4º E','Ornelas de Ulla','Zaragoza','51867','DNI','38566072V','Home','+34 920 585723',1,NULL,NULL,NULL,'SOdibpHnnU','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(14,'Marcos','Salazar','Collado','pvaldez@example.com','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1992-06-08','Praza De la Fuente, 4, 5º D','Álvarez del Bages','Cáceres','60674','NIE','79559585D','Dona','+34 685210887',1,NULL,NULL,NULL,'ElviIjNr32','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(15,'Mireia','Cortez','Montemayor','paola58@example.net','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1978-08-06','Travesía Antonio, 61, 6º B','Villa Miranda del Puerto','Tarragona','81718','NIE','01313411L','Dona','924677198',1,NULL,NULL,NULL,'mAYTRCbZoC','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(16,'Roberto','Pedraza','Abad','moreno.dario@example.com','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1992-09-11','Travesía Bermejo, 9, Bajo 4º','Sáenz del Vallès','Illes Balears','26024','NIE','68522717J','Dona','+34 677 273868',1,NULL,NULL,NULL,'fvgQjiFWfA','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(17,'Noelia','Valadez','Verduzco','acevedo.jordi@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1972-12-02','Camino Álvaro, 39, Ático 1º','As Serrato Medio','Valladolid','89710','DNI','31623125B','Home','+34 601 112142',1,NULL,NULL,NULL,'WBQfMa6lnx','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(18,'Dario','Vergara','Martí','domingo.nadia@example.com','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1973-11-07','Avenida Pedroza, 253, Bajo 7º','La Pelayo del Barco','Álava','95923','NIE','19640710K','Dona','+34 686-52-3019',1,NULL,NULL,NULL,'Qd0AQXwzuk','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(19,'Iria','Tamez','Rey','diana87@example.org','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1982-04-16','Travessera Mayorga, 0, 20º A','Os Lucio','Ciudad Real','44044','DNI','42548986K','Home','+34 932699419',1,NULL,NULL,NULL,'rNALXmjbwY','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(20,'Ariadna','Matías','Padilla','emma.cabrera@example.net','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1981-10-31','Plaça José, 968, 2º C','As Velasco','Huelva','39897','NIE','02863313C','Home','+34 657972662',1,NULL,NULL,NULL,'xrCOdZ5oGV','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(21,'Malak','Melgar','Aguilera','diego13@example.com','2019-05-15 06:55:11','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','1987-09-29','Plaça Gabriela, 513, 1º C','A Arribas','Granada','48438','DNI','87963778W','Home','990-91-1728',1,NULL,NULL,NULL,'uOYcybhqxi','2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(22,'Dalasito','Pambisito',NULL,'dalasito@univeylandia-parc.cat','2019-05-15 06:55:11','$2y$10$6yyaPEVl1kRsxPmwbm/zNOmMX00yo8Py3cKpyXLUlld2tGZsWxqcG','1978-07-26','Calle Piruleta 25','Amposta','Tarragona','43870','DNI','88938625V','Home','630450346',5,2,NULL,NULL,NULL,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(23,'Miare','Pambisita',NULL,'miare@univeylandia-parc.cat','2019-05-15 06:55:11','$2y$10$7V/4f4NfyCRRBlOgt/4nouP.rz8emkuvj03aC.ZM7MMikFlAEHUo6','1995-09-06','Calle Piruleta 25','Amposta','Tarragona','43870','DNI','45253606W','Dona','659493709',3,3,NULL,NULL,NULL,'2019-05-15 06:55:11','2019-05-15 06:55:11',NULL),(24,'wismichu','owo',NULL,'wismichu@univeylandia-parc.cat','2019-05-15 06:55:11','$2y$10$8yl/M9RrF9YsmRhW9Cj0buztqWN.hiohJhEb.DHmV3fjX4HcdOGQK','1995-09-06','Calle Piruleta 25','Amposta','Tarragona','43870','DNI','87420539T','Home','682045110',4,4,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(25,'Adriana','Estrada','Román','hgutierrez@example.com','2019-05-15 06:55:12','$2y$10$X1x4ID4chkwmkbVENdWyg.HFw0eR9Qb0dTLTiPzEtSDwImp7fpdmu','1998-07-16','Travessera Leo, 80, 71º E','Mota del Bages','Jaén','34587','DNI','19707275R','Home','+34 659 387494',7,5,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(26,'Alicia','Lucas','Armendáriz','escamilla.aitana@example.com','2019-05-15 06:55:12','$2y$10$J4333VSDr57ekDUro4dRKe85YiWiL0DmpRAUuUqnyX8EvrnGfdpze','1990-07-30','Travesía Luis, 134, 93º A','Las Granados','Cuenca','89376','DNI','83101094R','Dona','918 723175',4,6,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(27,'Alexandra','Fonseca','Padilla','tcortes@example.org','2019-05-15 06:55:12','$2y$10$cQNpeMX9fifYB1j9TdlwTe64jjTAEQG68DNZqqllCO/32Vzy64nua','1983-06-06','Rúa Samaniego, 715, 82º F','Las Casas Medio','Granada','82170','DNI','92195803G','Dona','+34 927 70 7149',3,7,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(28,'Carlos','Meza','Silva','uribe.izan@example.net','2019-05-15 06:55:12','$2y$10$2sZUaTqEQ2TiwRG/a6mXsePs.CJQK67q96COAuZZIvB.Vh3L/CPyS','1983-12-22','Rúa Costa, 7, 6º 5º','As Dávila Baja','Palencia','23558','DNI','90122716E','Home','+34 918-82-7601',7,8,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(29,'Lucía','Cuenca','Vásquez','alvaro44@example.net','2019-05-15 06:55:12','$2y$10$khPollwR9rgrnad27x4wW.x86nn4YL7qSGCmFLTnzA7MaUsI4RQpy','1993-06-10','Travesía Gaitán, 385, 90º E','Tello Medio','A Coruña','58554','DNI','82821893C','Dona','956-53-3546',7,9,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(30,'Ignacio','Cervántez','Valladares','roberto73@example.net','2019-05-15 06:55:12','$2y$10$A6ocflu5wdGpCjQV9d8JZup06HHZsGfqeJyj6S8BXUY44BYa33/pe','1999-02-28','Rúa Garica, 30, 7º D','San Jurado','Las Palmas','87682','DNI','82577595M','Dona','+34 974377292',6,10,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(31,'Alonso','Arredondo','Carbonell','joel.vanegas@example.com','2019-05-15 06:55:12','$2y$10$/M8YrTV28HwsqBA7Ot9Xourz264ePlpo.cEkrl71.q6sAf0HAZciG','1977-09-04','Calle Verdugo, 5, 8º B','San Montalvo Alta','Álava','24070','DNI','18272041J','Dona','961 501233',8,11,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(32,'Valeria','Montoya','Lucas','santiago29@example.org','2019-05-15 06:55:12','$2y$10$3MqYu6MsYW2d9jXBNW89Z.PxK1qWdHiN5FuKf.gsB3I.VEF.nVZv2','1976-03-31','Ruela Álvarez, 3, 6º A','Álvarez Baja','Asturias','85476','DNI','02911435A','Home','942-240305',5,12,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(33,'Anna','Henríquez','Ibáñez','jarmendariz@example.org','2019-05-15 06:55:12','$2y$10$fuT.m/VH1Pa4VeLMCWEEjO16OD5cIAAIdnI5MKXAXspwbeU9ljV/C','1985-03-20','Rúa Magaña, 02, Entre suelo 4º','Martí de Ulla','Málaga','63242','DNI','85961132N','Home','+34 947 49 3519',4,13,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(34,'Marina','Vera','Delacrúz','duran.lucas@example.com','2019-05-15 06:55:12','$2y$10$niirUBIehw8I6P/QoZ2n7u4RE/ahdbh3BGFd8TqJrkmhXibCGTxCa','1971-03-16','Camiño Rubén, 8, 7º E','El Monroy','Melilla','79615','DNI','08299072M','Home','664 52 9026',4,14,NULL,NULL,NULL,'2019-05-15 06:55:12','2019-05-15 06:55:12',NULL),(35,'Pau','Nevárez','Navas','nieto.sara@example.com','2019-05-15 06:55:12','$2y$10$d2i/smJ/D2MBLk21BTmzwuGF.pn6DymDeOOZPRuOOOy84E.Z5KRjm','1977-02-10','Calle Magaña, 552, 88º A','Vall Carranza','León','96718','DNI','79530551R','Home','+34 926232378',3,15,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(36,'Nil','Lira','Carmona','carlota17@example.org','2019-05-15 06:55:13','$2y$10$zX3yNvR57VamnJp0ZDtdWe01OPMeOmgqjBNVpO2nkYQ1rJuxAFDaq','1981-11-27','Camino Dario, 7, 5º C','El Cotto del Vallès','Málaga','98355','DNI','77571825R','Home','617-552529',8,16,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(37,'Carolina','Alcaráz','López','adam.villareal@example.com','2019-05-15 06:55:13','$2y$10$koTjwOBvv9SKuEzLQXF/V.iOzgP5GyJvEBIms2YVjvTCHD9ciR3Y6','1975-05-09','Avenida Eric, 7, 15º B','Las Linares de Lemos','Álava','40407','DNI','40571034T','Dona','956 514397',6,17,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(38,'Noelia','Llamas','Avilés','anaya.diana@example.org','2019-05-15 06:55:13','$2y$10$lSjk1EodubSEBg3PTiO54eKPx.FGP8AXtP4a51NYLw7QyHhT97yRm','1983-01-14','Carrer Olivas, 964, 44º A','Montaño del Vallès','Palencia','38240','DNI','67151754B','Home','984-111493',7,18,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(39,'Jesús','Arevalo','Moya','raul.jimenez@example.com','2019-05-15 06:55:13','$2y$10$6XNWhUx2CtKvrFHsdH2xReq1ooxpcX1IqLnmKO.crYKa.zOoWcXMK','1991-08-25','Carrer Inés, 33, 91º D','O Galindo','Zamora','05061','DNI','96046096M','Home','648805970',5,19,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(40,'Laura','Ybarra','Valladares','salazar.iria@example.com','2019-05-15 06:55:13','$2y$10$gM.T4/150GKFSaJZW4bb3.YSAGSD2OGb6bfjGAoFANr7JqApVLuFG','1976-05-21','Passeig José Antonio, 0, 0º C','Giménez del Mirador','Granada','18383','DNI','42685256Q','Dona','+34 965264687',7,20,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(41,'Beatriz','Vélez','Brito','carrera.ona@example.com','2019-05-15 06:55:13','$2y$10$pgeTY2eGEoiobSc7kj9N1OPHU2pIwvbI75jNaTM53E4.JBoAT2UHm','1995-08-29','Avinguda Rubio, 051, 38º A','Os Aponte','Pontevedra','07921','DNI','62294947E','Home','664 654668',5,21,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(42,'Claudia','Olmos','Colón','iria.velez@example.net','2019-05-15 06:55:13','$2y$10$MvhUjdGtDVeEGPPjrbijmuREFn6lU.hyeiLApl9JzrmufFvieOJvm','1972-05-29','Ruela Cuesta, 63, 4º A','Mata del Bages','Barcelona','34207','DNI','58940915B','Dona','668 329521',4,22,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(43,'Omar','Rodríguez','Barreto','xarriaga@example.org','2019-05-15 06:55:13','$2y$10$P4ZmIufP9GNqWtXOvKvOBe8BKi1XFuoujK4XWJNowKBUcV5UPHq56','1987-08-24','Carrer Ane, 62, 8º F','San Lovato de la Sierra','Cádiz','14851','DNI','17099908Y','Dona','+34 625754983',5,23,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(44,'Manuela','Martín','Monroy','hernandez.berta@example.org','2019-05-15 06:55:13','$2y$10$JaVNPzyhnKo2/aCm00Tdu.xjgpWBJRDkCdgO7MKRt5HWZ5LbadgSu','1975-03-15','Calle Marina, 8, Ático 9º','Las Irizarry del Puerto','Ourense','25030','DNI','77849109C','Dona','+34 975 490276',5,24,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(45,'José Antonio','Rincón','Lemus','qcruz@example.com','2019-05-15 06:55:13','$2y$10$WTPNCbC8y1aGvBaOSn1bD.ku9aXNLXiCPrb7oJHlRGvLz7ai4VFJm','1971-07-27','Camiño Paula, 2, 2º B','L\' Carvajal','Cantabria','40414','DNI','92441212A','Dona','+34 658-82-1278',8,25,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(46,'Guillem','Calero','Collado','ainara.leiva@example.net','2019-05-15 06:55:13','$2y$10$3M7MknK9nfWNYzzK1IUjAu28S/OG/Vel1kdroVPCY/as2Q8Gs2KCi','1998-01-17','Camino Galarza, 2, 49º 2º','As Berríos de Lemos','Badajoz','58058','DNI','68935580A','Home','+34 900-72-4174',6,26,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(47,'Mateo','Enríquez','Cornejo','gil.marco@example.com','2019-05-15 06:55:13','$2y$10$3wZbfIBmWgo4ta8VsFVtQegevMnr9h6pO/.tw574rmmCjBU.V7dcK','1971-02-20','Travessera Valentín, 432, 1º C','La Sola de Lemos','Ciudad Real','68675','DNI','67016912H','Home','682227003',4,27,NULL,NULL,NULL,'2019-05-15 06:55:13','2019-05-15 06:55:13',NULL),(48,'Alejandro','Santos','Velasco','aleix.pineiro@example.com','2019-05-15 06:55:13','$2y$10$Nt4ifY1gLXYTLMjLP.p.E.KwxWjogzTKGcBQHuh1.GYGE0Mse8BRi','1984-11-22','Passeig Aleix, 31, 4º F','Los Rolón de la Sierra','Murcia','62290','DNI','76627888F','Home','949 43 4287',3,28,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(49,'Helena','Navarro','Barroso','luis.sanabria@example.org','2019-05-15 06:55:14','$2y$10$Uh3ew/f9cmgGA20nxevpLe.MhDjfXv/yCvwFVClJTMCIflPY9AHXK','1987-07-11','Rúa Carlota, 321, 79º A','L\' Terrazas de la Sierra','Zamora','64131','DNI','10764970G','Home','+34 931906488',8,29,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(50,'Mario','Cerda','Herrera','oliver.pedroza@example.org','2019-05-15 06:55:14','$2y$10$bh8gFZtT6TAWYm5aJdbAXu3b49MvDJJoJWahh9CLQhpI2wTK.AD9q','1994-09-13','Paseo Villa, 5, Bajos','Los Morales del Barco','Guadalajara','52180','DNI','40205082R','Home','948-687329',8,30,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(51,'Erik','Gracia','Leal','aya77@example.net','2019-05-15 06:55:14','$2y$10$/oCO9Q2c02iLLgtIO2I6GOImIpkhY5grjsZUdQM4KixdHHS1q9K6W','1997-05-29','Paseo Oriol, 001, 86º C','Pedroza de las Torres','Palencia','68050','DNI','97340738T','Dona','+34 657-665081',3,31,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(52,'Laura','Garibay','Valenzuela','collazo.jorge@example.net','2019-05-15 06:55:14','$2y$10$qnHLW8RYdgAiPbGyfFyoJujzA6Hzerpw174jNJKBPVfXKv8nn4ngq','1993-10-29','Plaça Diana, 4, 6º B','Los Ortíz del Puerto','Álava','53339','DNI','07855362B','Dona','922464949',6,32,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(53,'Alexandra','Solís','Galindo','rzayas@example.org','2019-05-15 06:55:14','$2y$10$tkxoWUe22LEL7hYt.jzSXu9GT6uGVeP6MyEqxNxXSYMotlBOmHESe','1985-11-12','Travesía Ramón, 776, 61º A','Solorio del Bages','Soria','31499','DNI','28771527E','Home','+34 665 021297',6,33,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(54,'Pablo','Castellanos','Prado','santiago.gerard@example.net','2019-05-15 06:55:14','$2y$10$.DsgSwv/XDG/xVcU1zhJjutteIZhV7SvfRJcULmh5u0jSp5g0MIqu','1975-01-04','Travesía Arreola, 9, Bajo 4º','L\' Orosco Alta','Ciudad Real','76761','DNI','77994244W','Dona','661 559925',3,34,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(55,'Jorge','Patiño','Vera','natalia.rivero@example.org','2019-05-15 06:55:14','$2y$10$ROJGxMFwqafwT95rzMVV1ewDNrKiCW7zWR1ou0mz7Jc6CsGCtNh5y','1971-12-26','Plaza Martín, 54, Bajo 5º','L\' Calvo del Pozo','Burgos','04620','DNI','52837691K','Home','689254366',2,35,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(56,'Eduardo','Montenegro','Fernández','scovarrubias@example.org','2019-05-15 06:55:14','$2y$10$.i5aHn2JjUcE8Mwbl7DlquqmqGFwg581eyWu8OFqwnXUYj6G1aelG','1992-12-02','Ruela Zoe, 2, 6º B','Los Bautista','Teruel','39217','DNI','09793803N','Dona','911 558786',2,36,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(57,'Lola','Rentería','Bustos','miriam70@example.net','2019-05-15 06:55:14','$2y$10$HpUEg4GGPJ9X./UgnrBScO.raYAVgU4mf.T1Re3xCCnx.6Maq5uW6','1971-11-14','Camiño Clara, 59, 23º 0º','Los Arce','Albacete','82804','DNI','44270116S','Dona','693365058',2,37,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(58,'Jan','Feliciano','Cortez','xgallego@example.org','2019-05-15 06:55:14','$2y$10$/aE8QzgDO4sWQLFdkM8WGOJWDxyBblh8OgYN1dyxKmX9/ZN4yr7Ly','1989-04-28','Ruela Biel, 95, 3º B','Villa Alcaráz Alta','Palencia','84756','DNI','58825064B','Home','+34 649436370',2,38,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(59,'Rocío','Guevara','Verdugo','hector.sotelo@example.net','2019-05-15 06:55:14','$2y$10$L9owUtPNfga0iVag92HtJOeqGW.1T6Z0p9c8.ejy4vxOQLVtPcuha','1974-12-14','Ronda Loera, 8, 0º D','Escudero del Barco','Málaga','09758','DNI','92198098E','Home','660-17-0442',2,39,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(60,'José Manuel','Lozada','Alvarado','mateo.casanova@example.org','2019-05-15 06:55:14','$2y$10$/sJ8EWrMxm63e296RSTrkeXvfFcWGCKoBRLznwCL1VH7QooaohC5K','1992-06-13','Avenida Miguel Ángel, 06, 4º B','Gracia de Arriba','Huesca','26403','DNI','94363129V','Dona','602 70 1203',2,40,NULL,NULL,NULL,'2019-05-15 06:55:14','2019-05-15 06:55:14',NULL),(61,'Jana','Ledesma','Ruvalcaba','claudia65@example.org','2019-05-15 06:55:14','$2y$10$le0bM86OCRg3uOrOo.zBCejIWPVmPI/shn32kPB7x2Hfc5tdMqvny','1975-05-08','Paseo Archuleta, 63, 6º B','Villa Baca','Ávila','23314','DNI','06514839C','Home','602 716585',2,41,NULL,NULL,NULL,'2019-05-15 06:55:15','2019-05-15 06:55:15',NULL),(62,'Alba','Pastor','Urrutia','mateo84@example.net','2019-05-15 06:55:15','$2y$10$F2MuSNthNlhfDbQkVJmu5ugAwty2BffJg.I2w0BKXORngI78hlTp6','1988-05-08','Carrer Font, 1, Entre suelo 0º','Os Roldán del Pozo','Almería','42807','DNI','14057593Q','Home','+34 686344567',2,42,NULL,NULL,NULL,'2019-05-15 06:55:15','2019-05-15 06:55:15',NULL),(63,'Diego','Patiño','Cotto','upardo@example.org','2019-05-15 06:55:15','$2y$10$16sBbdiw3U/glhDXn4vOC.zewL4pUhtAt3PX5vlAoLZK6b6OGCVy.','1985-10-14','Travesía Iker, 69, 27º C','Urbina del Penedès','Girona','00028','DNI','80425513X','Dona','691 108630',2,43,NULL,NULL,NULL,'2019-05-15 06:55:15','2019-05-15 06:55:15',NULL),(64,'Nora','Martos','Quintero','fjimenez@example.com','2019-05-15 06:55:15','$2y$10$eLF.BAry5vombCmwapsgzuMQPHQ5lQ8lGrDox4X4YfW.c/EKqelLa','1992-04-30','Avenida Alejandro, 93, 8º D','La Frías','Castellón','43774','DNI','42982298J','Dona','+34 900-45-2122',2,44,NULL,NULL,NULL,'2019-05-15 06:55:15','2019-05-15 06:55:15',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_productes`
--

DROP TABLE IF EXISTS `venta_productes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_productes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuari` int(10) unsigned NOT NULL,
  `preu_total` int(11) NOT NULL,
  `factura_pdf_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estat` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `venta_productes_id_usuari_foreign` (`id_usuari`),
  CONSTRAINT `venta_productes_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_productes`
--

LOCK TABLES `venta_productes` WRITE;
/*!40000 ALTER TABLE `venta_productes` DISABLE KEYS */;
INSERT INTO `venta_productes` VALUES (1,1,60,'res',1,'2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `venta_productes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votacio_user_atraccio`
--

DROP TABLE IF EXISTS `votacio_user_atraccio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votacio_user_atraccio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuari` int(10) unsigned NOT NULL,
  `id_atraccio` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `votacio_user_atraccio_id_usuari_foreign` (`id_usuari`),
  KEY `votacio_user_atraccio_id_atraccio_foreign` (`id_atraccio`),
  CONSTRAINT `votacio_user_atraccio_id_atraccio_foreign` FOREIGN KEY (`id_atraccio`) REFERENCES `atraccions` (`id`),
  CONSTRAINT `votacio_user_atraccio_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votacio_user_atraccio`
--

LOCK TABLES `votacio_user_atraccio` WRITE;
/*!40000 ALTER TABLE `votacio_user_atraccio` DISABLE KEYS */;
/*!40000 ALTER TABLE `votacio_user_atraccio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'Españita','2019-05-15 08:55:16','2019-05-15 08:55:16'),(2,'Mèxic','2019-05-15 08:55:16','2019-05-15 08:55:16'),(3,'Polinesia','2019-05-15 08:55:16','2019-05-15 08:55:16'),(4,'Xina','2019-05-15 08:55:16','2019-05-15 08:55:16'),(5,'Otaku','2019-05-15 08:55:16','2019-05-15 08:55:16'),(6,'Far West','2019-05-15 08:55:16','2019-05-15 08:55:16');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'univeylandia_test2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-15 10:57:21
