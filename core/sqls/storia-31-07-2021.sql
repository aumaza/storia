-- MySQL dump 10.19  Distrib 10.3.30-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: storia
-- ------------------------------------------------------
-- Server version	10.3.30-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `st_caja`
--

DROP TABLE IF EXISTS `st_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora_apertura` time DEFAULT NULL,
  `hora_cierre` time DEFAULT NULL,
  `importe_apertura` float(8,2) DEFAULT NULL,
  `importe_cierre` float(8,2) DEFAULT NULL,
  `estado_caja` enum('Abierta','Cerrada') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_caja`
--

LOCK TABLES `st_caja` WRITE;
/*!40000 ALTER TABLE `st_caja` DISABLE KEYS */;
INSERT INTO `st_caja` VALUES (1,'2021-07-18','09:00:00','21:00:00',5600.00,9900.00,'Cerrada'),(2,'2021-07-19','12:35:20','20:07:57',9900.00,12630.00,'Cerrada');
/*!40000 ALTER TABLE `st_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_clientes`
--

DROP TABLE IF EXISTS `st_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nombre` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dni` varchar(8) NOT NULL,
  `email` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `localidad` varchar(120) NOT NULL,
  `telefono` varchar(18) NOT NULL,
  `movil` varchar(18) NOT NULL,
  `espacio` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_clientes`
--

LOCK TABLES `st_clientes` WRITE;
/*!40000 ALTER TABLE `st_clientes` DISABLE KEYS */;
INSERT INTO `st_clientes` VALUES (2,'Augusto Maza','24283493','debianmaza@gmail.com','La Chilca 1883','Ciudad Evita','21440301','1161669201','cli'),(3,'Gastón Motta','','gaston.motta@gmail.com','Av. Directorio 4867','Capital Federal','1122887651','1130238224','emp'),(6,'Marcelo Tinelli','','tinelli@gmail.com','Av. Cordoba 6585','Capital Federal','1144789687','1145892635','cli'),(8,'Ignacio Maza','','ignacio@gmail.com','Talcahuano 456','Capital Federal','1147895236','1164859875','cli'),(9,'Claudio Gonzalez','','dummy@gmail.com','Av. Sarmiento 1471','Capital Federal','1147894587','1145987852','rep'),(10,'Lucas Martinez','','lucas@gmail.com','Anchorena 4515','Capital Federal','1143984596','1169784255','rep'),(11,'Local','','local@gmail.com','Av. Directorio 4867','Capital Federal','1122887651','1130238224','cli'),(12,'Julian Martinez','26789451','julianmartinez@gmail.com','Donato Alvarez 789','Capital Federal','1144789684','1169784592','cli'),(13,'Lola Mendieta','27895741','lolamendieta@gmail.com','Francisco Alvarez 1070','Capital Federal','1144967852','1146987532','cli'),(14,'Salvador Martí','16789852','salvadormarti@gmail.com','Reconquista 675','Capital Federal','1137894589','1169784521','cli'),(15,'Juan Pacino','26789752','juanpacino@gmail.com','Udaondo 699','Capital Federal','1178964582','1164855574','cli'),(16,'Paola Krum','23789451','paolakrum@gmail.com','Caseros 1550','Capital Federal','1147589625','1165789563','cli'),(17,'Alonso de Entre Rios','25789751','alonsoentrerios@gmail.com','Av. Corrientes 1289','Capital Federal','1145697842','1169786523','cli'),(25,'Roberto Lopez','32789415','robertolopez@gmail.com','Cochabamba 455','Capital Federal','1144789684','1145892635','cli'),(26,'Claudio Caniggia','23789545','claudiocaniggia@gmail.com','Paseo Colon 458','Capital Federal','1144967852','1146987532','cli'),(27,'Santiago Cúneo','23789451','santiagocuneo@gmail.com','CArlos Calvo 1335','Capital Federal','1122887651','1169784526','cli'),(28,'Diego Capussotto','22789415','capussotto@gmail.com','Riobamba 487','Capital Federal','1122887651','1130238223','cli'),(29,'Mario Islas','23789852','marioislas@gmail.com','Entre Rios 4552','Capital Federal','1143984596','1169784592','cli'),(30,'Pancho Doto','21789452','panchodoto\"gmail.com','Basualdo 3378','Capital Federal','1122887651','1169784255','cli'),(31,'Nicolas Maza','32789652','nicomaza@gmail.com','Talcahuano 185','Capital Federal','1144789684','1169784255','cli'),(32,'Carina Massoco','26789426','massoco@gmail.com','Las Heras 1863','Capital Federal','1143984596','1169784592','emp'),(33,'Cristian Castro','23789741','cristiancastro@gmail.com','Artigas 637','Capital Federal','1122887652','1130238224','emp');
/*!40000 ALTER TABLE `st_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_empleados`
--

DROP TABLE IF EXISTS `st_empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_empleados`
--

LOCK TABLES `st_empleados` WRITE;
/*!40000 ALTER TABLE `st_empleados` DISABLE KEYS */;
/*!40000 ALTER TABLE `st_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_items_mesa`
--

DROP TABLE IF EXISTS `st_items_mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_items_mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesa_numero` int(11) NOT NULL,
  `item` varchar(40) NOT NULL,
  `importe` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_items_mesa`
--

LOCK TABLES `st_items_mesa` WRITE;
/*!40000 ALTER TABLE `st_items_mesa` DISABLE KEYS */;
INSERT INTO `st_items_mesa` VALUES (1,4,'Cortado en Jarrito',150.00),(2,4,'Café en jarrito',150.00),(3,4,'Café en jarrito',150.00),(4,4,'Tostado',230.00),(5,5,'Café con Leche',200.00),(6,5,'Tostado',230.00),(7,6,'Cortado en Jarrito',150.00),(8,6,'Factura',45.00),(9,7,'Café en jarrito',150.00),(10,7,'Café con Leche',200.00),(11,7,'Factura',45.00),(12,7,'Tostado',230.00),(13,8,'Cortado en Jarrito',150.00),(14,8,'Factura',45.00),(15,8,'Té con leche',90.00),(16,8,'Té con leche',90.00),(17,8,'Té',85.00),(18,9,'Café con Leche',200.00),(19,9,'Tostado',230.00),(20,10,'Cortado en Jarrito',150.00),(21,10,'Factura',45.00),(22,11,'Té',85.00),(23,11,'Factura',45.00),(24,12,'Café en jarrito',150.00),(25,12,'Factura',45.00),(26,13,'Té',85.00),(27,13,'Factura',45.00),(28,14,'Café con Leche',200.00),(29,14,'Tostado',230.00),(30,15,'Café en jarrito',150.00),(31,15,'Cortado en Jarrito',150.00),(32,15,'Factura',45.00),(33,15,'Factura',45.00),(34,16,'Té con leche',90.00),(35,16,'Factura',45.00),(36,17,'Café en jarrito',150.00),(37,17,'Factura',45.00),(38,18,'Té',85.00),(39,18,'Factura',45.00),(40,19,'Té con leche',90.00),(41,19,'Factura',45.00),(42,20,'Cortado en Jarrito',150.00),(43,20,'Tostado',230.00),(44,21,'Café con Leche',200.00),(45,21,'Café con Leche',200.00),(46,21,'Factura',45.00),(47,21,'Factura',45.00),(48,22,'Café en jarrito',150.00),(49,22,'Factura',45.00),(50,23,'Café con Leche',200.00),(51,23,'Tostado',230.00),(52,24,'Café con Leche',200.00),(53,24,'Factura',45.00),(54,24,'Factura',45.00),(55,25,'Café en jarrito',150.00),(56,25,'Factura',45.00),(57,26,'Té con leche',90.00),(58,26,'Factura',45.00),(59,27,'Cortado en Jarrito',150.00),(60,27,'Factura',45.00),(61,28,'Té con leche',90.00),(62,28,'Tostado',230.00),(63,29,'Café con Leche',200.00),(64,29,'Tostado',230.00),(65,30,'Cortado en Jarrito',150.00),(66,30,'Factura',45.00),(67,31,'Café con Leche',200.00),(68,31,'Factura',45.00),(69,31,'Factura',45.00),(70,32,'Café en jarrito',150.00),(71,32,'Factura',45.00),(72,33,'Cortado en Jarrito',150.00),(73,33,'Factura',45.00),(74,34,'Café con Leche',200.00),(75,34,'Cortado en Jarrito',150.00),(76,34,'Factura',45.00),(77,34,'Factura',45.00),(78,35,'Café en jarrito',150.00),(79,35,'Factura',45.00),(80,35,'Factura',45.00),(81,35,'Cortado en Jarrito',150.00),(82,36,'Cortado + Media Luna',180.00),(83,37,'Café en jarrito',150.00),(84,37,'Factura',45.00),(85,38,'Cortado + Media Luna',180.00),(86,38,'Tostado',230.00),(87,39,'Té',85.00),(88,39,'Cafe con Leche + Tostado',400.00),(89,39,'Cortado en Jarrito',150.00),(90,39,'Té con leche',90.00),(91,40,'Cortado en Jarrito',150.00),(92,40,'Cortado en Jarrito',150.00),(93,41,'Cortado en Jarrito',150.00),(94,41,'Cortado en Jarrito',150.00),(95,41,'Cortado + Media Luna',180.00),(96,41,'Cafe con Leche + Tostado',400.00),(97,42,'Paleta Cucuruchito',90.00),(98,42,'Café con Leche',200.00),(99,43,'Café con Leche',200.00),(100,43,'Tostado',230.00),(101,44,'Cafe con Leche + Tostado',400.00),(102,44,'Coca Cola 600 ml + Pebete (J/Q)',350.00),(103,45,'Cafe con Leche + Tostado',400.00),(104,46,'Cortado + Media Luna',180.00),(105,47,'Cafe con Leche + Tostado',400.00),(106,47,'Café en jarrito',150.00),(107,48,'Cafe con Leche + Tostado',400.00),(108,48,'Cortado + Media Luna',180.00),(109,49,'Cortado en Jarrito',150.00),(110,49,'Té con leche',90.00),(111,49,'Factura',45.00),(112,49,'Factura',45.00),(113,50,'Café con Leche',200.00),(114,50,'Coca Cola 600 ml + Pebete (J/Q)',350.00),(115,51,'Cortado + Media Luna',180.00);
/*!40000 ALTER TABLE `st_items_mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_mensajes`
--

DROP TABLE IF EXISTS `st_mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `email` varchar(90) NOT NULL,
  `mensaje` varchar(240) NOT NULL,
  `fecha` date NOT NULL,
  `estado` enum('Leido','No Leido') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_mensajes`
--

LOCK TABLES `st_mensajes` WRITE;
/*!40000 ALTER TABLE `st_mensajes` DISABLE KEYS */;
INSERT INTO `st_mensajes` VALUES (1,'Carlos','carlos@gmail.com','Quisiera saber los horarios de fin de semana.','2021-06-04','Leido'),(2,'Julian','julian@gmail.com','Me gustaria saber más sobre las promos en helados','2021-06-04','Leido'),(3,'Ana Maria','maria123@gmail.com','Buen día, quisiera saber si se pueden realizar pedidos por la web. Gracias.','2021-06-04','Leido'),(4,'Cecilia Gomez','cecigomez@gmail.com','Me gustaría saber si se puede reservar una mesa. Gracias.','2021-06-04','Leido'),(5,'Carlos Calvo','charlycalvo@gmail.com','Me gustaria saber con cuantos sabores de helado cuentan. Gracias.','2021-06-04','Leido'),(6,'Matias Martins','matumartins@gmail.com','Me gustaria saber si puede reservar una mesa. Gracias','2021-06-04','Leido'),(7,'Susana Sorensen','sorensen@gmail.com','Buenos días, quería saber si el fin de semana largo están abiertos. Gracias.','2021-06-04','Leido'),(8,'Alberto Bolaños','albertbol@gmail.com','Buenos días queria saber si podia pedir helado por telefono  y retirarlo por el local. Gracias.','2021-06-04','Leido'),(9,'Julia','julialoqui@gmail.com','Me gustaria saber sobre las promos de confiteria','2021-06-04','No Leido'),(10,'Pancho Doto','panchito@gmail.com','Es posible retirar un pedido desde local o solo lo envian. Gracias','2021-06-04','No Leido'),(11,'Cecilia Gomez','cecigomez@gmail.com','Quiero saber los horarios de fin de semana','2021-06-08','Leido');
/*!40000 ALTER TABLE `st_mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_mesas`
--

DROP TABLE IF EXISTS `st_mesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_mesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesa_numero` int(11) NOT NULL,
  `estado` enum('Abierta','Cerrada') NOT NULL,
  `fecha` date NOT NULL,
  `empleado` varchar(60) NOT NULL,
  `hora_apertura` time NOT NULL,
  `hora_cierre` time DEFAULT NULL,
  `tipo_pago` enum('Efectivo','Tarjeta Debito','Tarjeta Credito') DEFAULT NULL,
  `total` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_mesas`
--

LOCK TABLES `st_mesas` WRITE;
/*!40000 ALTER TABLE `st_mesas` DISABLE KEYS */;
INSERT INTO `st_mesas` VALUES (1,1,'Abierta','2021-04-28','Administrador','11:19:22',NULL,'Efectivo',NULL),(2,2,'Abierta','2021-04-28','Administrador','12:45:46',NULL,'Efectivo',NULL),(3,3,'Abierta','2021-04-28','Administrador','12:46:16',NULL,'Efectivo',NULL),(4,1,'Cerrada','2021-04-30','Administrador','12:08:04','18:28:33','Efectivo',680.00),(5,2,'Cerrada','2021-04-30','Administrador','15:27:33','18:29:30','Efectivo',430.00),(6,3,'Cerrada','2021-04-30','Administrador','15:28:36','18:30:01','Efectivo',195.00),(7,1,'Cerrada','2021-05-03','Administrador','19:55:32','19:57:00','Efectivo',625.00),(8,1,'Cerrada','2021-05-03','Administrador','20:37:22','20:40:14','Efectivo',460.00),(9,1,'Cerrada','2021-05-04','Administrador','17:18:49','17:21:09','Efectivo',430.00),(10,3,'Cerrada','2021-05-04','Administrador','17:39:39','17:54:17','Efectivo',195.00),(11,1,'Cerrada','2021-05-04','Administrador','17:49:26','17:54:25','Efectivo',130.00),(12,1,'Abierta','2021-05-06','Gastón Motta','18:53:37',NULL,'Efectivo',NULL),(13,1,'Cerrada','2021-05-07','Gastón Motta','08:46:16','08:52:20','Efectivo',130.00),(14,2,'Cerrada','2021-05-07','Gastón Motta','08:46:54','08:54:16','Efectivo',430.00),(15,3,'Cerrada','2021-05-07','Gastón Motta','08:47:37','08:53:33','Efectivo',390.00),(16,4,'Abierta','2021-05-07','Gastón Motta','08:49:24',NULL,'Efectivo',NULL),(17,5,'Abierta','2021-05-07','Gastón Motta','08:49:33',NULL,'Efectivo',NULL),(18,6,'Abierta','2021-05-07','Gastón Motta','08:49:39',NULL,'Efectivo',NULL),(19,1,'Abierta','2021-05-07','Gastón Motta','08:55:36',NULL,'Efectivo',NULL),(20,1,'Cerrada','2021-05-12','Gastón Motta','12:23:08','12:25:46','Efectivo',380.00),(21,2,'Cerrada','2021-05-12','Gastón Motta','12:23:17','12:25:57','Efectivo',490.00),(22,6,'Cerrada','2021-05-12','Gastón Motta','12:23:29','12:25:05','Efectivo',195.00),(23,1,'Cerrada','2021-05-17','Administrador','08:14:36','08:16:16','Efectivo',430.00),(24,2,'Cerrada','2021-05-17','Administrador','08:14:46','08:16:06','Efectivo',290.00),(25,3,'Cerrada','2021-05-17','Administrador','08:14:53','08:16:30','Efectivo',195.00),(26,4,'Cerrada','2021-05-17','Administrador','08:18:58','08:20:37','Efectivo',135.00),(27,5,'Cerrada','2021-05-17','Administrador','08:19:07','08:20:26','Efectivo',195.00),(28,6,'Cerrada','2021-05-17','Administrador','08:19:16','08:20:12','Efectivo',320.00),(29,1,'Cerrada','2021-05-18','Administrador','10:15:28','10:17:58','Efectivo',430.00),(30,2,'Cerrada','2021-05-18','Administrador','10:15:38','10:18:15','Efectivo',195.00),(31,3,'Cerrada','2021-05-18','Administrador','10:15:44','10:18:34','Efectivo',290.00),(32,4,'Cerrada','2021-05-18','Administrador','10:15:51','10:18:44','Efectivo',195.00),(33,5,'Cerrada','2021-05-18','Administrador','10:15:57','10:18:56','Efectivo',195.00),(34,6,'Cerrada','2021-05-18','Administrador','10:16:05','10:19:10','Efectivo',440.00),(35,1,'Cerrada','2021-05-26','Administrador','20:35:01','20:36:13','Efectivo',390.00),(36,1,'Cerrada','2021-06-01','Administrador','09:14:00','09:14:22','Efectivo',180.00),(37,1,'Cerrada','2021-06-06','Administrador','11:00:09','11:00:33','Efectivo',195.00),(38,1,'Cerrada','2021-06-08','Administrador','18:30:38','18:31:50','Efectivo',410.00),(39,5,'Cerrada','2021-06-13','Administrador','14:07:50','14:09:17','Efectivo',725.00),(40,4,'Cerrada','2021-06-13','Administrador','14:09:57','14:12:00','Efectivo',300.00),(41,2,'Cerrada','2021-06-13','Administrador','14:18:19','14:19:41','Efectivo',880.00),(42,1,'Cerrada','2021-07-13','Administrador','09:42:40','10:31:56','Efectivo',290.00),(43,1,'Cerrada','2021-07-13','Administrador','10:32:23','10:54:30','Efectivo',430.00),(44,2,'Cerrada','2021-07-13','Administrador','11:02:01','11:02:38','Efectivo',750.00),(45,1,'Cerrada','2021-07-16','Administrador','11:53:26','12:07:57','Tarjeta Debito',400.00),(46,2,'Cerrada','2021-07-16','Administrador','15:11:33','15:12:35','Efectivo',180.00),(47,6,'Cerrada','2021-07-16','Administrador','15:11:53','15:12:47','Efectivo',550.00),(48,2,'Cerrada','2021-07-19','Administrador','14:16:50','14:19:58','Efectivo',580.00),(49,6,'Cerrada','2021-07-19','Administrador','14:17:31','14:19:41','Efectivo',330.00),(50,4,'Cerrada','2021-07-19','Administrador','14:18:22','14:19:19','Efectivo',550.00),(51,1,'Cerrada','2021-07-20','Gastón Motta','10:20:24','10:21:15','Efectivo',180.00);
/*!40000 ALTER TABLE `st_mesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_pagos`
--

DROP TABLE IF EXISTS `st_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_pago` date NOT NULL,
  `tipo_pago` enum('Pago Proveedor','Compra Menor') DEFAULT NULL,
  `descripcion` varchar(90) NOT NULL,
  `importe` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_pagos`
--

LOCK TABLES `st_pagos` WRITE;
/*!40000 ALTER TABLE `st_pagos` DISABLE KEYS */;
INSERT INTO `st_pagos` VALUES (1,'2021-07-15','Compra Menor','Compra de Leche',160.00),(3,'2021-07-15','Compra Menor','Servilletas de Papel',250.00),(4,'2021-07-19','Compra Menor','Compra de café',700.00),(5,'2021-07-19','Pago Proveedor','Pago Proveedor Cucuruchos',1500.00);
/*!40000 ALTER TABLE `st_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_productos`
--

DROP TABLE IF EXISTS `st_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(6) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `precio` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_productos`
--

LOCK TABLES `st_productos` WRITE;
/*!40000 ALTER TABLE `st_productos` DISABLE KEYS */;
INSERT INTO `st_productos` VALUES (1,'hd0001','1 Kg',650.00),(2,'hd0002','1/2 Kg',410.00),(3,'hd0003','1/4 Kg',250.00),(5,'hd0004','1/8 Kg',100.00),(6,'cf0001','Café en jarrito',150.00),(7,'cf0002','Cortado en Jarrito',150.00),(8,'cf0003','Café con Leche',200.00),(9,'cf0004','Té',85.00),(10,'cf0005','Té con leche',90.00),(11,'cf0006','Factura',45.00),(12,'cf0007','Tostado',230.00),(13,'cf0008','Cortado + Media Luna',180.00),(14,'cf0009','Cafe con Leche + Tostado',400.00),(15,'ks0001','Coca Cola 600 ml + Pebete (J/Q)',350.00),(16,'hd0005','1 Kg Promo Apertura',500.00),(17,'hd0006','1/2 Kg Promo Apertura',250.00),(18,'hd0007','1/4 Kg Promo Apertura',170.00),(19,'hd0008','1/8 Kg Promo Apertura',150.00),(20,'hdpl03','Paleta Cucuruchito',90.00),(21,'hdpl02','Paleta de Agua',150.00),(22,'hdpl01','Paleta de Crema',175.00),(23,'hd0009','Conogol Chocolate',190.00);
/*!40000 ALTER TABLE `st_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_repartos`
--

DROP TABLE IF EXISTS `st_repartos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_repartos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `cliente` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `movil` varchar(18) NOT NULL,
  `forma_pago` varchar(8) NOT NULL,
  `importe` float(8,2) NOT NULL,
  `repartidor` varchar(70) NOT NULL,
  `estado` enum('Entregado','No Entregado','No Responde','En Camino') NOT NULL,
  `fecha_entrega` date NOT NULL,
  `hora_entrega` time NOT NULL,
  `valor_envio` float(8,2) DEFAULT NULL,
  `envio_pago` enum('Si','No','Pagado') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_repartos`
--

LOCK TABLES `st_repartos` WRITE;
/*!40000 ALTER TABLE `st_repartos` DISABLE KEYS */;
INSERT INTO `st_repartos` VALUES (1,6,'1 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',650.00,'Claudio Gonzalez','En Camino','2021-05-14','15:45:52',NULL,NULL),(2,13,'1/2 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',410.00,'Claudio Gonzalez','En Camino','2021-05-18','07:28:45',NULL,NULL),(3,14,'1 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',650.00,'Claudio Gonzalez','En Camino','2021-05-20','14:17:02',NULL,NULL),(4,15,'1/2 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',410.00,'Lucas Martinez','Entregado','2021-05-21','12:42:15',80.00,'Si'),(5,16,'1 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',650.00,'Claudio Gonzalez','Entregado','2021-05-21','15:11:33',80.00,'Si'),(6,19,'1 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',650.00,'Claudio Gonzalez','Entregado','2021-05-26','20:17:59',80.00,'Si'),(7,11,'Café con Leche','Augusto Maza','La Chilca 1883','1161669201','Efectivo',200.00,'Claudio Gonzalez','En Camino','2021-05-15','11:36:11',NULL,NULL),(8,12,'Tostado','Augusto Maza','La Chilca 1883','1161669201','Efectivo',230.00,'Claudio Gonzalez','En Camino','2021-05-15','11:36:46',NULL,NULL);
/*!40000 ALTER TABLE `st_repartos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_sabores`
--

DROP TABLE IF EXISTS `st_sabores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_sabores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_sabor` varchar(6) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_sabores`
--

LOCK TABLES `st_sabores` WRITE;
/*!40000 ALTER TABLE `st_sabores` DISABLE KEYS */;
INSERT INTO `st_sabores` VALUES (1,'sb0001','Vainilla'),(2,'sb0002','Almendrado'),(3,'sb0003','Crema Americana'),(4,'sb0004','Crema del Cielo'),(5,'sb0005','Crema Rusa'),(6,'sb0006','Frutilla a la Crema'),(7,'sb0007','Frutilla al Agua'),(8,'sb0008','Cereza a la Crema'),(10,'sb0009','Dulce de Leche'),(12,'sb0010','Mascarpone'),(13,'sb0011','Kinotos al Whisky'),(14,'sb0012','Sambayon'),(15,'sb0013','Dulce de Leche granizado'),(16,'sb0014','Dulce de Leche con Nueces'),(17,'sb0015','Chocolate'),(18,'sb0016','Chocolate con Almendras'),(19,'sb0017','Frutos del Bosque'),(20,'sb0018','Menta'),(21,'sb0019','Menta Granizada');
/*!40000 ALTER TABLE `st_sabores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_usuarios`
--

DROP TABLE IF EXISTS `st_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `avatar` varchar(120) DEFAULT NULL,
  `espacio` varchar(3) NOT NULL,
  `role` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_usuarios`
--

LOCK TABLES `st_usuarios` WRITE;
/*!40000 ALTER TABLE `st_usuarios` DISABLE KEYS */;
INSERT INTO `st_usuarios` VALUES (1,'Administrador','root','storia2021',NULL,'Adm','1'),(3,'Augusto Maza','debianmaza@gmail.com','linux1303','../avatar/WhatsApp Image 2021-05-13 at 17.05.33.jpeg','cli','1'),(4,'Gastón Motta','gaston.motta@gmail.com','gastonmotta1234',NULL,'emp','1'),(7,'Marcelo Tinelli','tinelli@gmail.com','33BxaK79nIpWW8e',NULL,'cli','1'),(9,'Ignacio Maza','ignacio@gmail.com','nachomaza1234',NULL,'cli','1'),(10,'Claudio Gonzalez','dummy@gmail.com','dummy1234',NULL,'rep','1'),(11,'Lucas Martinez','lucas@gmail.com','lucas1234',NULL,'rep','1'),(12,'Julian Martinez','julianmartinez@gmail.com','0DMsUIr3dGIbNvO',NULL,'cli','1'),(13,'Lola Mendieta','lolamendieta@gmail.com','lola1234',NULL,'cli','1'),(14,'Salvador Martí','salvadormarti@gmail.com','37cCLEwRhrhYcOE',NULL,'cli','1'),(15,'Juan Pacino','juanpacino@gmail.com','Wn5lxBIQeutzx0F',NULL,'cli','1'),(16,'Paola Krum','paolakrum@gmail.com','3iCV8l7OOrEyEfI',NULL,'cli','1'),(17,'Alonso de Entre Rios','alonsoentrerios@gmail.com','TRDsoLCaSZPO723',NULL,'cli','1'),(25,'Roberto Lopez','robertolopez@gmail.com','oVqhm1JE6xgH2vq',NULL,'cli','1'),(26,'Claudio Caniggia','claudiocaniggia@gmail.com','9HMmOQCmiZmcWDh',NULL,'cli','1'),(27,'Santiago Cúneo','santiagocuneo@gmail.com','U0Uu14@3KFMCwLO',NULL,'cli','1'),(28,'Diego Capussotto','capussotto@gmail.com','jS14gBpERldRIvo',NULL,'cli','1'),(29,'Mario Islas','marioislas@gmail.com','Mlj@y7A91weqA6M',NULL,'cli','1'),(30,'Pancho Doto','panchodoto\"gmail.com','zH4xuTruvpnNhPO',NULL,'cli','1'),(31,'Nicolas Maza','nicomaza@gmail.com','QEO0ir6RKFWvYoT',NULL,'cli','1'),(32,'Carina Massoco','massoco@gmail.com','qIT9O5X6vFqhVZm',NULL,'emp','1'),(33,'Cristian Castro','cristiancastro@gmail.com','uq7jh6nGNljd2@v',NULL,'emp','1');
/*!40000 ALTER TABLE `st_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_ventas`
--

DROP TABLE IF EXISTS `st_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(6) DEFAULT NULL,
  `descripcion` varchar(40) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `espacio` varchar(9) NOT NULL,
  `sabor_1` varchar(60) DEFAULT NULL,
  `sabor_2` varchar(60) DEFAULT NULL,
  `sabor_3` varchar(60) DEFAULT NULL,
  `sabor_4` varchar(60) DEFAULT NULL,
  `empleado` varchar(90) DEFAULT NULL,
  `lugar_venta` enum('Local','Web','WhatsApp','Telefonica') NOT NULL,
  `tipo_pago` enum('Efectivo','Tarjeta Credito','Tarjeta Debito') NOT NULL,
  `fecha_venta` date NOT NULL,
  `hora_venta` time NOT NULL,
  `cliente_nombre` varchar(90) DEFAULT NULL,
  `importe` float(8,2) NOT NULL,
  `nro_ticket` int(11) DEFAULT NULL,
  `estado_ticket` enum('Abierto','Cerrado') DEFAULT NULL,
  `estado_entrega` enum('Entregado','No Entregado','No Responde','En Camino','En Preparacion') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_ventas`
--

LOCK TABLES `st_ventas` WRITE;
/*!40000 ALTER TABLE `st_ventas` DISABLE KEYS */;
INSERT INTO `st_ventas` VALUES (2,'hd0001','1 Kg',0,'heladeria','Almendrado','Crema del Cielo','Frutilla a la Crema','Crema Americana','Gastón Motta','Local','Efectivo','2021-06-01','15:58:33','Augusto Maza',650.00,0,'Abierto','Entregado'),(4,'hd0003','1/4 Hg',0,'heladeria','Crema Rusa','Frutos del Bosque','Frutilla a la Crema','Ninguno','Gastón Motta','Local','Efectivo','2021-06-01','16:00:47','Augusto Maza',250.00,0,'Abierto','Entregado'),(5,'hd0001','1 Kg',0,'heladeria','Crema Rusa','Sambayon','Ninguno','Ninguno','Gastón Motta','Local','Efectivo','2021-06-01','16:01:18','Augusto Maza',650.00,0,'Abierto','Entregado'),(6,'','1 Kg',0,'heladeria','Cereza a la Crema','Dulce de Leche con Nueces','Frutilla a la Crema','Mascarpone',NULL,'Web','Efectivo','2021-05-14','15:45:52','Augusto Maza',650.00,0,'Abierto','En Preparacion'),(7,'','1/2 Kg',0,'heladeria','Frutos del Bosque','Dulce de Leche granizado','Menta Granizada','Ninguno',NULL,'Web','Efectivo','2021-05-14','15:54:32','Augusto Maza',410.00,0,'Abierto','En Preparacion'),(8,'','1 Kg',0,'heladeria','Dulce de Leche','Frutilla a la Crema','Mascarpone','Menta Granizada',NULL,'Web','Efectivo','2021-05-15','10:30:21','Augusto Maza',650.00,0,'Abierto','En Preparacion'),(9,'','1 Kg',0,'heladeria','Crema Americana','Dulce de Leche con Nueces','Chocolate con Almendras','Menta Granizada',NULL,'Web','Efectivo','2021-05-15','10:33:10','Augusto Maza',650.00,0,'Abierto','En Preparacion'),(10,'','1/2 Kg',0,'heladeria','Chocolate','Crema Rusa','Menta Granizada','Mascarpone',NULL,'Web','Efectivo','2021-05-15','10:39:58','Augusto Maza',410.00,0,'Abierto','En Preparacion'),(11,'','Café con Leche',0,'cafeteria',NULL,NULL,NULL,NULL,NULL,'Web','Efectivo','2021-05-15','11:36:11','Augusto Maza',200.00,0,'Abierto','En Camino'),(12,'','Tostado',0,'cafeteria',NULL,NULL,NULL,NULL,NULL,'Web','Efectivo','2021-05-15','11:36:46','Augusto Maza',230.00,0,'Abierto','En Camino'),(13,'','1/2 Kg',0,'heladeria','Cereza a la Crema','Mascarpone','Frutos del Bosque','Kinotos al Whisky',NULL,'Web','Efectivo','2021-05-18','07:28:45','Augusto Maza',410.00,0,'Abierto','En Preparacion'),(14,'','1 Kg',0,'heladeria','Almendrado','Vainilla','Mascarpone','Frutos del Bosque',NULL,'Web','Efectivo','2021-05-20','14:17:02','Augusto Maza',650.00,0,'Abierto','En Camino'),(15,'','1/2 Kg',0,'heladeria','Dulce de Leche','Kinotos al Whisky','Frutos del Bosque','Ninguno',NULL,'Web','Efectivo','2021-05-21','10:48:56','Augusto Maza',410.00,0,'Abierto','Entregado'),(16,'','1 Kg',0,'heladeria','Almendrado','Frutilla a la Crema','Dulce de Leche con Nueces','Sambayon',NULL,'Web','Efectivo','2021-05-21','10:52:25','Augusto Maza',650.00,0,'Abierto','Entregado'),(17,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-05-22','16:29:38','Augusto Maza',400.00,0,'Abierto','Entregado'),(18,'cf0008','Cortado + Media Luna',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-05-22','16:31:59','Augusto Maza',180.00,0,'Abierto','Entregado'),(19,'','1 Kg',0,'heladeria','Cereza a la Crema','Sambayon','Frutos del Bosque','Frutilla al Agua',NULL,'Web','Efectivo','2021-05-26','20:12:52','Augusto Maza',650.00,0,'Abierto','Entregado'),(20,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-05-28','09:30:05','Local',400.00,0,'Abierto','Entregado'),(21,'hd0001','1 Kg',0,'heladeria','Cereza a la Crema','Sambayon','Chocolate','Menta Granizada','Gastón Motta','Local','Efectivo','2021-06-01','09:09:39','Local',650.00,0,'Abierto','Entregado'),(22,'cf0008','Cortado + Media Luna',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-01','16:31:20','Augusto Maza',180.00,0,'Abierto','Entregado'),(23,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-01','16:32:25','Lola Mendieta',400.00,0,'Abierto','Entregado'),(24,'hd0001','1 Kg',0,'heladeria','Almendrado','Vainilla','Crema Americana','Frutilla a la Crema','Gastón Motta','Local','Efectivo','2021-06-02','10:15:24','Julian Martinez',650.00,0,'Abierto','Entregado'),(25,'hd0002','1/2 Kg',0,'heladeria','Chocolate con Almendras','Dulce de Leche','Frutos del Bosque','Ninguno','Gastón Motta','Local','Tarjeta Debito','2021-06-02','10:20:44','Lola Mendieta',410.00,0,'Abierto','Entregado'),(26,'hd0001','1 Kg',0,'heladeria','Sambayon','Frutos del Bosque','Crema Rusa','Dulce de Leche granizado','Gastón Motta','Local','Tarjeta Debito','2021-06-02','10:31:47','Ignacio Maza',650.00,0,'Abierto','Entregado'),(27,'hd0002','1/2 Kg',0,'heladeria','Chocolate con Almendras','Menta Granizada','Sambayon','Ninguno','Gastón Motta','Local','Tarjeta Credito','2021-06-02','10:33:57','Local',410.00,0,'Abierto','Entregado'),(28,'hd0001','1 Kg',0,'heladeria','Almendrado','Chocolate con Almendras','Frutilla a la Crema','Frutilla al Agua','Gastón Motta','Local','Tarjeta Credito','2021-06-02','10:38:47','Marcelo Tinelli',650.00,0,'Abierto','Entregado'),(29,'hd0003','1/4 Hg',0,'heladeria','Crema del Cielo','Chocolate','Cereza a la Crema','Ninguno','Gastón Motta','Local','Tarjeta Debito','2021-06-02','10:39:20','Ignacio Maza',250.00,0,'Abierto','Entregado'),(30,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-02','16:48:40','Lola Mendieta',400.00,0,'Abierto','Entregado'),(31,'cf0008','Cortado + Media Luna',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-02','16:51:51','Julian Martinez',180.00,0,'Abierto','Entregado'),(32,'cf0005','Té con leche',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Telefonica','Efectivo','2021-06-02','16:53:53','Marcelo Tinelli',90.00,0,'Abierto','Entregado'),(33,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-02','16:55:38','Marcelo Tinelli',400.00,0,'Abierto','Entregado'),(34,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','WhatsApp','Tarjeta Credito','2021-06-02','16:59:30','Ignacio Maza',400.00,0,'Abierto','Entregado'),(35,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Telefonica','Tarjeta Credito','2021-06-02','17:02:54','Ignacio Maza',400.00,0,'Abierto','Entregado'),(36,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Telefonica','Tarjeta Debito','2021-06-02','17:03:52','Ignacio Maza',400.00,0,'Abierto','Entregado'),(37,'cf0006','Factura',12,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-03','15:33:14','Claudio Caniggia',540.00,0,'Abierto','Entregado'),(38,'cf0008','Cortado + Media Luna',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-04','13:53:29','Juan Pacino',180.00,0,'Abierto','Entregado'),(39,'cf0002','Cortado en Jarrito',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-04','18:32:17','Diego Capussotto',150.00,0,'Abierto','Entregado'),(40,'cf0003','Café con Leche',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-04','18:42:25','Alonso de Entre Rios',200.00,0,'Abierto','Entregado'),(41,'hd0001','1 Kg',NULL,'heladeria','Cereza a la Crema','Almendrado','Menta Granizada','Mascarpone','Gastón Motta','Local','Tarjeta Credito','2021-06-04','19:03:06','Alonso de Entre Rios',650.00,0,'Abierto','Entregado'),(42,'hd0001','1 Kg',NULL,'heladeria','Almendrado','Frutilla al Agua','Kinotos al Whisky','Dulce de Leche granizado','Gastón Motta','Local','Tarjeta Debito','2021-06-04','19:04:40','Augusto Maza',650.00,0,'Abierto','Entregado'),(43,'cf0003','Café con Leche',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-04','19:07:32','Claudio Caniggia',400.00,0,'Abierto','Entregado'),(44,'cf0006','Factura',3,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-04','19:07:54','Claudio Caniggia',135.00,0,'Abierto','Entregado'),(45,'hd0001','1 Kg',NULL,'heladeria','Sambayon','Menta Granizada','Dulce de Leche con Nueces','Almendrado','Gastón Motta','Local','Tarjeta Credito','2021-06-06','08:51:28','Alonso de Entre Rios',650.00,0,'Abierto','Entregado'),(46,'hd0003','1/4 Hg',NULL,'heladeria','Menta Granizada','Dulce de Leche','Ninguno','Ninguno','Gastón Motta','Local','Tarjeta Debito','2021-06-06','09:05:19','Augusto Maza',250.00,0,'Abierto','Entregado'),(47,'hd0001','1 Kg',NULL,'heladeria','Cereza a la Crema','Chocolate','Menta Granizada','Chocolate con Almendras','Gastón Motta','Local','Tarjeta Debito','2021-06-06','09:22:59','Alonso de Entre Rios',650.00,0,'Abierto','Entregado'),(49,NULL,'1 Kg',NULL,'heladeria','Crema Rusa','Chocolate con Almendras','Menta Granizada','Crema del Cielo','Gastón Motta','Local','Tarjeta Credito','2021-06-06','09:48:44','Augusto Maza',650.00,0,'Abierto','Entregado'),(50,NULL,'1 Kg',NULL,'heladeria','Chocolate con Almendras','Dulce de Leche con Nueces','Menta Granizada','Sambayon','Gastón Motta','Local','Tarjeta Credito','2021-06-06','10:01:15','Mario Islas',650.00,0,'Abierto','Entregado'),(51,NULL,'1 Kg',NULL,'heladeria','Almendrado','Crema del Cielo','Menta Granizada','Frutilla al Agua','','WhatsApp','Tarjeta Credito','2021-06-06','10:10:30','Claudio Caniggia',650.00,0,'Abierto','Entregado'),(52,'hd0001','1 Kg',NULL,'heladeria','Menta Granizada','Cereza a la Crema','Chocolate','Dulce de Leche granizado','Gastón Motta','WhatsApp','Tarjeta Debito','2021-06-06','10:50:51','Claudio Caniggia',650.00,0,'Abierto','Entregado'),(53,NULL,'1 Kg',NULL,'heladeria','Mascarpone','Sambayon','Menta Granizada','Frutilla a la Crema','Gastón Motta','WhatsApp','Tarjeta Credito','2021-06-06','10:16:20','Alonso de Entre Rios',650.00,0,'Abierto','Entregado'),(54,NULL,'1 Kg',NULL,'heladeria','Almendrado','Cereza a la Crema','Menta Granizada','Frutilla a la Crema','Gastón Motta','WhatsApp','Efectivo','2021-06-06','10:18:14','Ignacio Maza',650.00,0,'Abierto','Entregado'),(55,NULL,'1 Kg',NULL,'heladeria','Kinotos al Whisky','Chocolate con Almendras','Menta Granizada','Vainilla','Gastón Motta','WhatsApp','Tarjeta Credito','2021-06-06','10:20:17','Marcelo Tinelli',650.00,0,'Abierto','Entregado'),(56,NULL,'1 Kg',NULL,'heladeria','Mascarpone','Cereza a la Crema','Sambayon','Frutos del Bosque','Gastón Motta','Telefonica','Tarjeta Credito','2021-06-06','10:21:18','Marcelo Tinelli',650.00,0,'Abierto','Entregado'),(57,NULL,'1 Kg',NULL,'heladeria','Chocolate','Chocolate con Almendras','Menta Granizada','Vainilla','Gastón Motta','Telefonica','Tarjeta Credito','2021-06-06','10:25:18','Ignacio Maza',650.00,0,'Abierto','Entregado'),(58,NULL,'1 Kg',NULL,'heladeria','Vainilla','Frutilla al Agua','Dulce de Leche con Nueces','Crema Rusa','Gastón Motta','WhatsApp','Efectivo','2021-06-06','10:28:13','Roberto Lopez',650.00,0,'Abierto','Entregado'),(59,NULL,'1 Kg',NULL,'heladeria','Chocolate con Almendras','Crema Americana','Menta Granizada','Menta Granizada','Gastón Motta','WhatsApp','Tarjeta Debito','2021-06-06','10:35:21','Salvador Martí',650.00,0,'Abierto','Entregado'),(60,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-06','10:46:31','Diego Capussotto',400.00,0,'Abierto','Entregado'),(61,NULL,'1 Kg',NULL,'heladeria','Menta Granizada','Cereza a la Crema','Frutos del Bosque','Sambayon','Gastón Motta','Local','Tarjeta Debito','2021-06-06','10:53:34','Diego Capussotto',650.00,0,'Abierto','Entregado'),(62,'cf0009','Cafe con Leche + Tostado',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-06','11:01:11','Julian Martinez',800.00,0,'Abierto','Entregado'),(63,NULL,'1 Kg',NULL,'heladeria','Menta Granizada','Cereza a la Crema','Frutos del Bosque','Dulce de Leche granizado','Gastón Motta','WhatsApp','Tarjeta Credito','2021-06-06','11:16:32','Ignacio Maza',650.00,0,'Abierto','Entregado'),(64,NULL,'1 Kg',NULL,'heladeria','Kinotos al Whisky','Cereza a la Crema','Menta Granizada','Sambayon','Gastón Motta','Telefonica','Tarjeta Debito','2021-06-06','11:17:16','Lola Mendieta',650.00,0,'Abierto','Entregado'),(65,NULL,'1/2 Kg',NULL,'heladeria','Mascarpone','Dulce de Leche con Nueces','Frutilla a la Crema','Ninguno','','WhatsApp','Efectivo','2021-06-06','11:21:47','Santiago Cúneo',410.00,0,'Abierto','Entregado'),(66,NULL,'1 Kg',NULL,'heladeria','Almendrado','Cereza a la Crema','Mascarpone','Cereza a la Crema','Gastón Motta','WhatsApp','Efectivo','2021-06-06','11:22:31','Paola Krum',650.00,0,'Abierto','Entregado'),(67,NULL,'1/2 Kg',NULL,'heladeria','Cereza a la Crema','Crema Americana','Menta Granizada','Ninguno','Gastón Motta','Local','Tarjeta Credito','2021-06-06','11:31:28','Juan Pacino',410.00,0,'Abierto','Entregado'),(68,'hd0001','1 Kg',NULL,'heladeria','Menta Granizada','Kinotos al Whisky','Frutilla a la Crema','Cereza a la Crema','Gastón Motta','Local','Tarjeta Debito','2021-06-06','11:45:42','Marcelo Tinelli',650.00,0,'Abierto','Entregado'),(69,'hd0001','1 Kg',NULL,'heladeria','Kinotos al Whisky','Frutos del Bosque','Dulce de Leche con Nueces','Sambayon','Gastón Motta','Local','Efectivo','2021-06-06','11:52:41','Diego Capussotto',650.00,0,'Abierto','Entregado'),(70,'hd0001','1 Kg',NULL,'heladeria','Menta Granizada','Mascarpone','Dulce de Leche con Nueces','Crema Americana','Gastón Motta','Local','Tarjeta Credito','2021-06-06','12:16:46','Mario Islas',650.00,0,'Abierto','En Preparacion'),(71,NULL,'1 Kg',NULL,'heladeria','Chocolate','Chocolate con Almendras','Menta Granizada','Frutilla al Agua','Gastón Motta','Local','Tarjeta Debito','2021-06-06','14:16:17','Lola Mendieta',650.00,0,'Abierto','En Preparacion'),(72,'hd0001','1 Kg',NULL,'heladeria','Dulce de Leche granizado','Menta Granizada','Frutos del Bosque','Dulce de Leche con Nueces','Gastón Motta','WhatsApp','Tarjeta Credito','2021-06-06','14:18:30','Roberto Lopez',650.00,0,'Abierto','En Preparacion'),(73,'hd0002','1/2 Kg',NULL,'heladeria','Chocolate con Almendras','Menta Granizada','Frutilla a la Crema','Ninguno','Gastón Motta','Local','Efectivo','2021-06-06','19:07:36','Augusto Maza',410.00,0,'Abierto','En Preparacion'),(74,'hd0001','1 Kg',NULL,'heladeria','Cereza a la Crema','Chocolate con Almendras','Crema del Cielo','Mascarpone','Gastón Motta','Local','Efectivo','2021-06-06','19:08:04','Augusto Maza',650.00,0,'Abierto','En Preparacion'),(75,'hd0001','1 Kg',NULL,'heladeria','Chocolate con Almendras','Menta Granizada','Frutilla a la Crema','Crema Americana','Gastón Motta','Local','Tarjeta Debito','2021-06-06','20:02:12','Augusto Maza',650.00,0,'Abierto','En Preparacion'),(76,'hd0002','1/2 Kg',NULL,'heladeria','Chocolate','Cereza a la Crema','Sambayon','Ninguno','Gastón Motta','Local','Tarjeta Credito','2021-06-06','20:06:11','Alonso de Entre Rios',410.00,0,'Abierto','En Preparacion'),(77,'hd0001','1 Kg',NULL,'heladeria','Almendrado','Menta Granizada','Mascarpone','Chocolate con Almendras','Gastón Motta','Telefonica','Efectivo','2021-06-06','20:28:01','Julian Martinez',650.00,0,'Abierto','En Preparacion'),(78,'hd0002','1/2 Kg',NULL,'heladeria','Cereza a la Crema','Crema del Cielo','Frutos del Bosque','Ninguno','Gastón Motta','Telefonica','Efectivo','2021-06-06','20:28:28','Julian Martinez',410.00,0,'Abierto','En Preparacion'),(79,'hd0001','1 Kg',NULL,'heladeria','Chocolate con Almendras','Crema del Cielo','Menta Granizada','Frutos del Bosque','Gastón Motta','Local','Efectivo','2021-06-07','08:02:24','Mario Islas',650.00,0,'Abierto','En Preparacion'),(80,'hd0002','1/2 Kg',NULL,'heladeria','Dulce de Leche','Kinotos al Whisky','Frutilla a la Crema','Ninguno','Gastón Motta','Local','Efectivo','2021-06-07','08:02:46','Mario Islas',410.00,0,'Abierto','En Preparacion'),(81,'hd0001','1 Kg',NULL,'heladeria','Chocolate','Crema Rusa','Menta Granizada','Crema Rusa','Gastón Motta','Local','Efectivo','2021-06-08','17:39:04','Claudio Caniggia',650.00,0,'Abierto','Entregado'),(82,'hd0002','1/2 Kg',NULL,'heladeria','Crema Rusa','Menta Granizada','Frutos del Bosque','Ninguno','Gastón Motta','Local','Efectivo','2021-06-08','17:39:37','Claudio Caniggia',410.00,0,'Abierto','En Preparacion'),(83,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-08','17:45:04','Augusto Maza',400.00,0,'Abierto','Entregado'),(84,'hd0001','1 Kg',NULL,'heladeria','Frutos del Bosque','Chocolate con Almendras','Kinotos al Whisky','Dulce de Leche con Nueces','Gastón Motta','Local','Tarjeta Credito','2021-06-08','18:04:13','Pancho Doto',650.00,0,'Abierto','En Preparacion'),(85,'hd0001','1 Kg',NULL,'heladeria','Cereza a la Crema','Chocolate con Almendras','Dulce de Leche con Nueces','Crema Rusa','Gastón Motta','Local','Efectivo','2021-06-09','17:08:41','Augusto Maza',650.00,1,'Cerrado','En Preparacion'),(86,'hd0002','1/2 Kg',NULL,'heladeria','Chocolate','Crema del Cielo','Cereza a la Crema','','Gastón Motta','Local','Efectivo','2021-06-09','17:12:33','Augusto Maza',410.00,1,'Cerrado','En Preparacion'),(87,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-09','17:23:59','Augusto Maza',400.00,1,'Cerrado','En Preparacion'),(88,'cf0006','Factura',3,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-09','17:25:01','Augusto Maza',135.00,1,'Cerrado','En Preparacion'),(89,'cf0009','Cafe con Leche + Tostado',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-09','19:20:09','Diego Capussotto',800.00,2,'Cerrado','En Preparacion'),(90,'hd0003','1/4 Kg',NULL,'heladeria','Cereza a la Crema','Crema Americana','','','Gastón Motta','Local','Tarjeta Credito','2021-06-09','19:21:05','Diego Capussotto',250.00,2,'Cerrado','En Preparacion'),(91,'ks0001','Coca Cola 600 ml + Pebete (J/Q)',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-09','19:24:56','Juan Pacino',700.00,3,'Cerrado','En Preparacion'),(92,'hd0003','1/4 Kg',NULL,'heladeria','Chocolate','Sambayon','','','Gastón Motta','Local','Tarjeta Credito','2021-06-09','19:25:51','Juan Pacino',250.00,3,'Cerrado','En Preparacion'),(93,'hd0001','1 Kg',NULL,'heladeria','Chocolate','Crema Americana','Dulce de Leche con Nueces','Frutos del Bosque','Gastón Motta','Local','Tarjeta Credito','2021-06-09','20:13:16','Pancho Doto',650.00,4,'Cerrado','En Preparacion'),(94,'hd0002','1/2 Kg',NULL,'heladeria','Chocolate con Almendras','Frutilla a la Crema','Mascarpone','','Gastón Motta','Local','Tarjeta Credito','2021-06-09','20:13:51','Pancho Doto',410.00,4,'Cerrado','En Preparacion'),(95,'hd0001','1 Kg',NULL,'heladeria','Chocolate con Almendras','Dulce de Leche con Nueces','Almendrado','Mascarpone','Gastón Motta','Local','Efectivo','2021-06-10','14:24:24','Augusto Maza',650.00,5,'Cerrado','Entregado'),(96,'hd0002','1/2 Kg',NULL,'heladeria','Dulce de Leche con Nueces','Kinotos al Whisky','Crema Rusa','','Gastón Motta','Local','Efectivo','2021-06-10','14:24:47','Augusto Maza',410.00,5,'Cerrado','En Preparacion'),(97,'cf0008','Cortado + Media Luna',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-10','14:55:26','Paola Krum',360.00,6,'Cerrado','En Preparacion'),(98,'hd0005','1 Kg Promo Apertura',NULL,'heladeria','Crema Americana','Menta Granizada','Dulce de Leche granizado','Vainilla','Gastón Motta','Local','Tarjeta Credito','2021-06-10','14:59:12','Roberto Lopez',500.00,7,'Cerrado','En Preparacion'),(99,'hd0006','1/2 Kg Promo Apertura',NULL,'heladeria','Crema del Cielo','Kinotos al Whisky','Mascarpone','','Gastón Motta','Local','Tarjeta Credito','2021-06-10','14:59:34','Roberto Lopez',250.00,7,'Cerrado','En Preparacion'),(100,'ks0001','Coca Cola 600 ml + Pebete (J/Q)',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-10','15:03:50','Juan Pacino',700.00,8,'Cerrado','En Preparacion'),(101,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-10','15:05:19','Salvador Martí',400.00,9,'Cerrado','En Preparacion'),(102,'cf0008','Cortado + Media Luna',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-10','15:06:55','Julian Martinez',360.00,10,'Cerrado','En Preparacion'),(103,'cf0008','Cortado + Media Luna',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-10','15:17:15','Juan Pacino',360.00,11,'Cerrado','En Preparacion'),(104,'cf0007','Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-10','15:18:18','Juan Pacino',230.00,11,'Cerrado','En Preparacion'),(105,'hd0001','1 Kg',NULL,'heladeria','Crema del Cielo','Dulce de Leche granizado','Kinotos al Whisky','Dulce de Leche con Nueces','Gastón Motta','Local','Efectivo','2021-06-10','18:30:47','Lola Mendieta',650.00,12,'Cerrado','En Preparacion'),(106,'hd0002','1/2 Kg',NULL,'heladeria','Crema del Cielo','Sambayon','Mascarpone','','','Local','Efectivo','2021-06-10','18:32:27','Lola Mendieta',410.00,12,'Cerrado','En Preparacion'),(107,'cf0002','Cortado en Jarrito',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-10','18:33:47','Lola Mendieta',150.00,12,'Cerrado','En Preparacion'),(108,'hd0002','1/2 Kg',NULL,'heladeria','Chocolate con Almendras','Crema Rusa','Frutilla a la Crema','Ninguno','Gastón Motta','Local','Tarjeta Credito','2021-06-10','19:25:50','Claudio Caniggia',410.00,13,'Cerrado','En Preparacion'),(109,'hd0001','1 Kg',NULL,'heladeria','Crema del Cielo','Almendrado','Menta Granizada','Vainilla','Gastón Motta','Local','Tarjeta Debito','2021-06-10','19:26:13','Claudio Caniggia',650.00,13,'Cerrado','En Preparacion'),(110,'hd0008','1/8 Kg Promo Apertura',NULL,'heladeria','Crema Americana','Chocolate','Ninguno','Ninguno','Gastón Motta','Local','Efectivo','2021-06-10','21:44:34','Lola Mendieta',150.00,14,'Cerrado','En Preparacion'),(111,'cf0001','Café en jarrito',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-10','21:45:04','Lola Mendieta',150.00,14,'Cerrado','En Preparacion'),(112,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-10','21:47:12','Paola Krum',400.00,15,'Cerrado','En Preparacion'),(113,'hd0005','1 Kg Promo Apertura',NULL,'heladeria','Crema del Cielo','Frutilla a la Crema','Dulce de Leche con Nueces','Sambayon','Gastón Motta','Local','Tarjeta Debito','2021-06-13','12:52:54','Julian Martinez',500.00,16,'Cerrado','En Preparacion'),(114,'hd0006','1/2 Kg Promo Apertura',NULL,'heladeria','Crema Rusa','Frutilla al Agua','Almendrado','Ninguno','Gastón Motta','Local','Tarjeta Debito','2021-06-13','12:53:21','Julian Martinez',250.00,16,'Cerrado','En Preparacion'),(115,'hd0005','1 Kg Promo Apertura',NULL,'heladeria','Menta Granizada','Crema Americana','Dulce de Leche con Nueces','Crema Rusa','Gastón Motta','Local','Efectivo','2021-06-13','13:12:44','Claudio Caniggia',500.00,17,'Cerrado','En Preparacion'),(116,'hd0002','1/2 Kg',NULL,'heladeria','Crema del Cielo','Menta Granizada','Frutilla al Agua','Ninguno','Gastón Motta','Local','Efectivo','2021-06-13','13:13:12','Claudio Caniggia',410.00,17,'Cerrado','En Preparacion'),(117,'cf0009','Cafe con Leche + Tostado',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-13','13:15:02','Mario Islas',800.00,18,'Cerrado','En Preparacion'),(118,'ks0001','Coca Cola 600 ml + Pebete (J/Q)',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-13','13:15:46','Mario Islas',350.00,18,'Cerrado','En Preparacion'),(119,'hd0001','1 Kg',NULL,'heladeria','Sambayon','Frutilla al Agua','Crema Americana','Frutilla al Agua','Gastón Motta','Local','Efectivo','2021-06-13','13:24:21','Paola Krum',650.00,19,'Cerrado','En Preparacion'),(120,'hd0003','1/4 Kg',NULL,'heladeria','Crema Rusa','Menta Granizada','Ninguno','Ninguno','Gastón Motta','Local','Efectivo','2021-06-13','13:25:00','Paola Krum',250.00,19,'Cerrado','En Preparacion'),(121,'hd0001','1 Kg',NULL,'heladeria','Crema Americana','Dulce de Leche con Nueces','Kinotos al Whisky','Vainilla','Gastón Motta','Local','Tarjeta Debito','2021-06-13','13:53:22','Nicolas Maza',650.00,20,'Cerrado','En Preparacion'),(122,'cf0009','Cafe con Leche + Tostado',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-13','13:55:09','Nicolas Maza',800.00,20,'Cerrado','En Preparacion'),(123,'cf0006','Factura',12,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-13','13:56:54','Diego Capussotto',540.00,21,'Cerrado','En Preparacion'),(124,'ks0001','Coca Cola 600 ml + Pebete (J/Q)',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Credito','2021-06-13','13:57:25','Diego Capussotto',350.00,21,'Cerrado','En Preparacion'),(125,'cf0005','Té con leche',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Telefonica','Tarjeta Credito','2021-06-13','14:05:06','Claudio Caniggia',180.00,22,'Cerrado','En Preparacion'),(126,'cf0008','Cortado + Media Luna',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-14','08:34:05','Lola Mendieta',360.00,23,'Cerrado','En Preparacion'),(127,'cf0009','Cafe con Leche + Tostado',1,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Tarjeta Debito','2021-06-14','09:11:15','Julian Martinez',400.00,24,'Cerrado','En Preparacion'),(128,'hd0001','1 Kg',NULL,'heladeria','Crema Rusa','Crema Americana','Sambayon','Dulce de Leche granizado','Gastón Motta','Local','Efectivo','2021-06-14','09:12:28','Alonso de Entre Rios',650.00,25,'Cerrado','Entregado'),(129,'hd0002','1/2 Kg',NULL,'heladeria','Chocolate','Menta Granizada','Chocolate con Almendras','Ninguno','Gastón Motta','Local','Efectivo','2021-06-14','09:14:50','Santiago Cúneo',410.00,26,'Cerrado','Entregado'),(130,'cf0003','Café con Leche',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-14','09:52:14','Salvador Martí',400.00,27,'Cerrado','En Preparacion'),(131,'cf0006','Factura',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-06-14','09:52:31','Salvador Martí',90.00,27,'Cerrado','En Preparacion'),(132,'hd0001','1 Kg',NULL,'heladeria','Crema Rusa','Sambayon','Dulce de Leche granizado','Crema del Cielo','Carina Massoco','Local','Efectivo','2021-06-17','10:46:06','Augusto Maza',650.00,28,'Cerrado','En Preparacion'),(133,'hd0004','1/8 Kg',NULL,'heladeria','Chocolate','Frutos del Bosque','Ninguno','Ninguno','Carina Massoco','Local','Efectivo','2021-06-17','10:46:29','Augusto Maza',100.00,28,'Cerrado','En Preparacion'),(134,'cf0009','Cafe con Leche + Tostado',2,'cafeteria',NULL,NULL,NULL,NULL,'Cristian Castro','Local','Efectivo','2021-06-17','10:47:17','Pancho Doto',800.00,29,'Cerrado','En Preparacion'),(135,'hd0001','1 Kg',NULL,'heladeria','Dulce de Leche con Nueces','Chocolate con Almendras','Sambayon','Vainilla','Cristian Castro','Local','Tarjeta Credito','2021-06-17','10:48:00','Lola Mendieta',650.00,30,'Cerrado','En Preparacion'),(136,'hd0001','1 Kg',NULL,'heladeria','Kinotos al Whisky','Frutos del Bosque','Almendrado','Frutilla a la Crema','Cristian Castro','Local','Tarjeta Credito','2021-06-17','10:48:26','Lola Mendieta',650.00,30,'Cerrado','En Preparacion'),(137,'hd0002','1/2 Kg',NULL,'heladeria','Mascarpone','Crema Rusa','Kinotos al Whisky','Ninguno','Cristian Castro','Local','Tarjeta Credito','2021-06-17','10:48:46','Lola Mendieta',410.00,30,'Cerrado','En Preparacion'),(138,'ks0001','Coca Cola 600 ml + Pebete (J/Q)',1,'cafeteria',NULL,NULL,NULL,NULL,'Cristian Castro','Local','Efectivo','2021-06-17','11:26:09','Paola Krum',350.00,31,'Cerrado','En Preparacion'),(139,'cf0008','Cortado + Media Luna',1,'cafeteria',NULL,NULL,NULL,NULL,'Carina Massoco','Local','Efectivo','2021-06-17','11:27:24','Salvador Martí',180.00,32,'Cerrado','En Preparacion'),(140,'cf0003','Café con Leche',1,'cafeteria',NULL,NULL,NULL,NULL,'Carina Massoco','Local','Efectivo','2021-06-17','11:27:46','Salvador Martí',200.00,32,'Cerrado','En Preparacion'),(141,'hd0001','1 Kg',NULL,'heladeria','Sambayon','Cereza a la Crema','Almendrado','Kinotos al Whisky','Carina Massoco','Local','Efectivo','2021-07-16','15:26:36','Lola Mendieta',650.00,33,'Cerrado','En Preparacion'),(142,'hd0002','1/2 Kg',NULL,'heladeria','Dulce de Leche con Nueces','Frutos del Bosque','Dulce de Leche granizado','Ninguno','Carina Massoco','Local','Efectivo','2021-07-16','15:27:07','Lola Mendieta',410.00,33,'Cerrado','En Preparacion'),(143,'hd0001','1 Kg',NULL,'heladeria','Dulce de Leche con Nueces','Chocolate con Almendras','Kinotos al Whisky','Crema del Cielo','Carina Massoco','Local','Efectivo','2021-07-19','14:14:33','Salvador Martí',650.00,34,'Cerrado','En Preparacion'),(144,'ks0001','Coca Cola 600 ml + Pebete (J/Q)',2,'cafeteria',NULL,NULL,NULL,NULL,'Gastón Motta','Local','Efectivo','2021-07-19','14:15:24','Augusto Maza',700.00,35,'Cerrado','En Preparacion'),(145,'hd0001','1 Kg',NULL,'heladeria','Sambayon','Cereza a la Crema','Frutos del Bosque','Menta Granizada','Cristian Castro','Local','Efectivo','2021-07-19','14:16:07','Julian Martinez',650.00,36,'Cerrado','En Preparacion'),(146,'hd0002','1/2 Kg',NULL,'heladeria','Almendrado','Dulce de Leche granizado','Chocolate con Almendras','Ninguno','Cristian Castro','Local','Efectivo','2021-07-19','14:16:23','Julian Martinez',410.00,36,'Cerrado','En Preparacion'),(147,'hd0001','1 Kg',NULL,'heladeria','Sambayon','Chocolate con Almendras','Frutos del Bosque','Crema del Cielo','Carina Massoco','Local','Efectivo','2021-07-19','18:43:06','Pancho Doto',650.00,37,'Cerrado','En Preparacion'),(148,'hd0002','1/2 Kg',NULL,'heladeria','Dulce de Leche granizado','Frutilla al Agua','Vainilla','Ninguno','Carina Massoco','Local','Efectivo','2021-07-19','18:43:27','Pancho Doto',410.00,37,'Cerrado','En Preparacion');
/*!40000 ALTER TABLE `st_ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-31  9:29:35
