-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: co_at_home_db
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `amigos`
--

DROP TABLE IF EXISTS `amigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amigos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario1_id` int(10) unsigned NOT NULL,
  `usuario2_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `amigo1_usuario_id_foreign_idx` (`usuario1_id`),
  KEY `amigo2_usuario_id_foreign_idx` (`usuario2_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `amigo1_usuario_id_foreign` FOREIGN KEY (`usuario1_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `amigo2_usuario_id_foreign` FOREIGN KEY (`usuario2_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amigos`
--

LOCK TABLES `amigos` WRITE;
/*!40000 ALTER TABLE `amigos` DISABLE KEYS */;
/*!40000 ALTER TABLE `amigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id` int(10) NOT NULL,
  `titulo` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `contenido` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `estudiante` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `profesorAdjunto` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profesor adjunto_idx` (`profesorAdjunto`),
  CONSTRAINT `profesor  adjunto` FOREIGN KEY (`profesorAdjunto`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `contenido` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `like` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user Id_idx` (`user_id`),
  CONSTRAINT `post user Id` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Probando 123','With strange aeons even death may die',NULL,41);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `contenido` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user id_idx` (`user id`),
  CONSTRAINT `tareas user id` FOREIGN KEY (`user id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombres` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `genero` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `birthdate` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `contacto` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `tipo_registro` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `foto_usuario` varchar(80) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (40,NULL,NULL,'Raul','Menendez',NULL,NULL,'sokka@outlook.com','sarasa',NULL,'administrador',NULL),(41,NULL,NULL,'Juan Pablo','Aquilante','male','1212-12-12','aquilantejp@outlook.es','25BAB7F9779AFF3083E7CC41C26CA1D8',NULL,'estudiante','aquilantejp@outlook.es.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-09 20:41:31
