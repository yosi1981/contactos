-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: contactos
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anuncios` (
  `idanuncio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafinal` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `idlocalidad` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ult_muestra` date DEFAULT NULL,
  `horainicial` time DEFAULT NULL,
  `horafinal` time DEFAULT NULL,
  `reservaactiva` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idanuncio`),
  KEY `anuncios_idusuario_foreign` (`idusuario`),
  CONSTRAINT `anuncios_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios`
--

LOCK TABLES `anuncios` WRITE;
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
INSERT INTO `anuncios` VALUES (23,'ANE ESPAÑOLA PAMP','LKADSJF','2018-03-28','2018-03-30',1,1,1022,NULL,NULL,'2018-03-28',NULL,NULL,NULL),(24,'ADSFADSF ALCO','LKAJDSF','2018-03-28','2018-03-28',1,2,1022,NULL,NULL,'2018-03-28',NULL,NULL,NULL),(25,'ABDCADF PINTO','LKJADSF','2018-03-28','2018-04-03',1,1,1022,NULL,NULL,'2018-03-28',NULL,NULL,NULL),(28,'1q3adf','adsfasdf','2015-02-22','2015-02-22',1,1,1022,NULL,NULL,'2018-03-28',NULL,NULL,NULL);
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anunciosDia`
--

DROP TABLE IF EXISTS `anunciosDia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anunciosDia` (
  `idanuncioDia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idanuncio` int(10) unsigned NOT NULL,
  `idlocalidad` int(10) unsigned NOT NULL,
  `idadminPro` int(10) unsigned NOT NULL,
  `iddelegado` int(10) unsigned NOT NULL,
  `numvisitas` double NOT NULL,
  `idpartner` int(11) unsigned NOT NULL,
  `idprovincia` int(11) unsigned NOT NULL,
  `idanunciante` int(10) unsigned NOT NULL,
  `idpaquete` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idanuncioDia`),
  KEY `anunciosdia_idanuncio_foreign` (`idanuncio`),
  KEY `anunciosdia_idlocalidad_foreign` (`idlocalidad`),
  KEY `anunciosdia_idrespprov_foreign` (`idadminPro`),
  KEY `anunciosdia_idrespprovorigen_foreign` (`iddelegado`),
  CONSTRAINT `anunciosdia_idanuncio_foreign` FOREIGN KEY (`idanuncio`) REFERENCES `anuncios` (`idanuncio`),
  CONSTRAINT `anunciosdia_idlocalidad_foreign` FOREIGN KEY (`idlocalidad`) REFERENCES `localidades` (`idlocalidad`),
  CONSTRAINT `anunciosdia_idrespprov_foreign` FOREIGN KEY (`idadminPro`) REFERENCES `users` (`id`),
  CONSTRAINT `anunciosdia_idrespprovorigen_foreign` FOREIGN KEY (`iddelegado`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anunciosDia`
--

LOCK TABLES `anunciosDia` WRITE;
/*!40000 ALTER TABLE `anunciosDia` DISABLE KEYS */;
INSERT INTO `anunciosDia` VALUES (56,'2018-03-28',23,1,1020,1021,2,2,31,1022,13),(57,'2018-03-28',25,1,1020,1021,2,2,31,1022,13),(58,'2018-03-28',28,1,1020,1021,2,2,31,1022,13),(59,'2018-03-28',24,2,1020,1021,1,2,32,1022,13);
/*!40000 ALTER TABLE `anunciosDia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `idcita` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idanuncio` varchar(45) DEFAULT NULL,
  `idusuario` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horaini` time DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `contador` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcita`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `idimagen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ficheroimagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idimagen`),
  KEY `imagenes_idusuario_foreign` (`idusuario`),
  CONSTRAINT `imagenes_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes_anuncios`
--

DROP TABLE IF EXISTS `imagenes_anuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes_anuncios` (
  `idanuncioimagen` int(11) NOT NULL AUTO_INCREMENT,
  `idanuncio` varchar(45) NOT NULL,
  `idimagen` varchar(45) NOT NULL,
  PRIMARY KEY (`idanuncioimagen`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes_anuncios`
--

LOCK TABLES `imagenes_anuncios` WRITE;
/*!40000 ALTER TABLE `imagenes_anuncios` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes_anuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localidades`
--

DROP TABLE IF EXISTS `localidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localidades` (
  `idlocalidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idprovincia` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idlocalidad`),
  KEY `localidades_idprovincia_foreign` (`idprovincia`),
  CONSTRAINT `localidades_idprovincia_foreign` FOREIGN KEY (`idprovincia`) REFERENCES `provincias` (`idprovincia`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localidades`
--

LOCK TABLES `localidades` WRITE;
/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
INSERT INTO `localidades` VALUES (1,'NAVARRA',31,NULL,NULL),(2,'ALCOBENDAS',32,NULL,NULL),(3,'PINTO',32,NULL,NULL);
/*!40000 ALTER TABLE `localidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (3,'2017_12_23_202547_create_paquetes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payerID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `fecha_pago` date NOT NULL,
  `dias` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (10,'2ZU2PGVBQSZR8','PAY-3G5311966U019844NLK53UCQ',1022,'2018-03-28',24,5,120);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquetes` (
  `idpaquete` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('GRATIS','PAGO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GRATIS',
  `idanunciante` int(10) unsigned NOT NULL,
  `total` int(11) NOT NULL,
  `dcontratados` int(11) NOT NULL,
  `drestantes` int(11) NOT NULL,
  `fechaReg` date NOT NULL,
  `fechaUlt` date NOT NULL,
  `estado` enum('EN VIGOR','AGOTADO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EN VIGOR',
  PRIMARY KEY (`idpaquete`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
INSERT INTO `paquetes` VALUES (13,'GRATIS',1022,30,30,26,'2018-03-28','2018-03-28','EN VIGOR');
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `idprovincia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idresponsable` int(10) unsigned NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iddelegado` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idprovincia`),
  KEY `provincias_idresponsable_foreign` (`idresponsable`),
  CONSTRAINT `provincias_idresponsable_foreign` FOREIGN KEY (`idresponsable`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (31,'NAVARRA',1020,1,NULL,NULL,'1021'),(32,'MADRID',1020,1,NULL,NULL,'1021');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_usuario`
--

DROP TABLE IF EXISTS `tipos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_usuario`
--

LOCK TABLES `tipos_usuario` WRITE;
/*!40000 ALTER TABLE `tipos_usuario` DISABLE KEYS */;
INSERT INTO `tipos_usuario` VALUES (1,'anunciante',NULL,NULL,'ANUNCIANTE'),(2,'adminProvincia',NULL,NULL,'ADMIN PROVINCIA'),(3,'delegado',NULL,NULL,'DELEGADO'),(4,'admin',NULL,NULL,'ADMIN'),(5,'colaborador',NULL,NULL,'COLABORADOR');
/*!40000 ALTER TABLE `tipos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tipo_usuario` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1023 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,NULL,NULL,'joseba','japostua2@gmail.com','$2y$10$F6hXWtdv4R6KZorp90YJmOgtDgEttFITrWgPLJsB2DIhCkkUWwAFa','4',1,'ogfj06NFpmXd6ZSU06Iz1wAh6VTGUWyIUwEQCTuD1WImEccARTgYOzrzEUR1','2017-04-06 16:36:37','2017-04-06 16:36:37',NULL),(1020,NULL,NULL,'pedro','japostua1@gmail.com','$2y$10$VImACSsbL863yGlH/QSSS.CzvAGjaFrcz5M1.XBfSC9GRK646qaaC','2',1,NULL,NULL,NULL,NULL),(1021,NULL,NULL,'roberto','japostua3@gmail.com','$2y$10$HF8xEl6bBCBbxj/NCMx8f.uTQq9EfEJJAKdOmx5tBLpj2BuXwT0Sa','3',1,NULL,NULL,NULL,NULL),(1022,NULL,NULL,'raquel','japostua@gmail.com','$2y$10$89w/bw9QyOuic7xWXAHrLObwcHf5LkQ4olNmrgGaWQb9y8qjV575C','1',1,'BK8UopBs801EgmhOUaMxemWS6HPFrn8tUKcjVJuYRwHdwMVoFnaDtBF7QEy1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersAdmin`
--

DROP TABLE IF EXISTS `usersAdmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersAdmin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersAdmin`
--

LOCK TABLES `usersAdmin` WRITE;
/*!40000 ALTER TABLE `usersAdmin` DISABLE KEYS */;
INSERT INTO `usersAdmin` VALUES (2,'joseba'),(1019,NULL);
/*!40000 ALTER TABLE `usersAdmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersAdminProvincia`
--

DROP TABLE IF EXISTS `usersAdminProvincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersAdminProvincia` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersAdminProvincia`
--

LOCK TABLES `usersAdminProvincia` WRITE;
/*!40000 ALTER TABLE `usersAdminProvincia` DISABLE KEYS */;
INSERT INTO `usersAdminProvincia` VALUES (1016),(1017),(1018),(1020);
/*!40000 ALTER TABLE `usersAdminProvincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersAnunciante`
--

DROP TABLE IF EXISTS `usersAnunciante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersAnunciante` (
  `id` int(11) NOT NULL,
  `idpartner` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dias_disponibles` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersAnunciante`
--

LOCK TABLES `usersAnunciante` WRITE;
/*!40000 ALTER TABLE `usersAnunciante` DISABLE KEYS */;
INSERT INTO `usersAnunciante` VALUES (1022,2,NULL,20);
/*!40000 ALTER TABLE `usersAnunciante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersColaborador`
--

DROP TABLE IF EXISTS `usersColaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersColaborador` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersColaborador`
--

LOCK TABLES `usersColaborador` WRITE;
/*!40000 ALTER TABLE `usersColaborador` DISABLE KEYS */;
/*!40000 ALTER TABLE `usersColaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersDelegado`
--

DROP TABLE IF EXISTS `usersDelegado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersDelegado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersDelegado`
--

LOCK TABLES `usersDelegado` WRITE;
/*!40000 ALTER TABLE `usersDelegado` DISABLE KEYS */;
INSERT INTO `usersDelegado` VALUES (1021,NULL);
/*!40000 ALTER TABLE `usersDelegado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-28 18:35:25
