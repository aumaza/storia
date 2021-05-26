-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: storia
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `st_clientes`
--

DROP TABLE IF EXISTS `st_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nombre` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `localidad` varchar(120) NOT NULL,
  `telefono` varchar(18) NOT NULL,
  `movil` varchar(18) NOT NULL,
  `espacio` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_clientes`
--

LOCK TABLES `st_clientes` WRITE;
/*!40000 ALTER TABLE `st_clientes` DISABLE KEYS */;
INSERT INTO `st_clientes` VALUES (2,'Augusto Maza','debianmaza@gmail.com','La Chilca 1883','Ciudad Evita','21440301','1161669201','cli'),(3,'Gastón Motta','gaston.motta@gmail.com','Av. Directorio 4867','Capital Federal','1122887651','1130238224','emp'),(6,'Marcelo Tinelli','tinelli@gmail.com','Av. Cordoba 6585','Capital Federal','1144789687','1145892635','cli'),(8,'Ignacio Maza','ignacio@gmail.com','Talcahuano 456','Capital Federal','1147895236','1164859875','cli'),(9,'Claudio Gonzalez','dummy@gmail.com','Av. Sarmiento 1471','Capital Federal','1147894587','1145987852','rep');
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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_items_mesa`
--

LOCK TABLES `st_items_mesa` WRITE;
/*!40000 ALTER TABLE `st_items_mesa` DISABLE KEYS */;
INSERT INTO `st_items_mesa` VALUES (1,4,'Cortado en Jarrito',150.00),(2,4,'Café en jarrito',150.00),(3,4,'Café en jarrito',150.00),(4,4,'Tostado',230.00),(5,5,'Café con Leche',200.00),(6,5,'Tostado',230.00),(7,6,'Cortado en Jarrito',150.00),(8,6,'Factura',45.00),(9,7,'Café en jarrito',150.00),(10,7,'Café con Leche',200.00),(11,7,'Factura',45.00),(12,7,'Tostado',230.00),(13,8,'Cortado en Jarrito',150.00),(14,8,'Factura',45.00),(15,8,'Té con leche',90.00),(16,8,'Té con leche',90.00),(17,8,'Té',85.00),(18,9,'Café con Leche',200.00),(19,9,'Tostado',230.00),(20,10,'Cortado en Jarrito',150.00),(21,10,'Factura',45.00),(22,11,'Té',85.00),(23,11,'Factura',45.00),(24,12,'Café en jarrito',150.00),(25,12,'Factura',45.00),(26,13,'Té',85.00),(27,13,'Factura',45.00),(28,14,'Café con Leche',200.00),(29,14,'Tostado',230.00),(30,15,'Café en jarrito',150.00),(31,15,'Cortado en Jarrito',150.00),(32,15,'Factura',45.00),(33,15,'Factura',45.00),(34,16,'Té con leche',90.00),(35,16,'Factura',45.00),(36,17,'Café en jarrito',150.00),(37,17,'Factura',45.00),(38,18,'Té',85.00),(39,18,'Factura',45.00),(40,19,'Té con leche',90.00),(41,19,'Factura',45.00),(42,20,'Cortado en Jarrito',150.00),(43,20,'Tostado',230.00),(44,21,'Café con Leche',200.00),(45,21,'Café con Leche',200.00),(46,21,'Factura',45.00),(47,21,'Factura',45.00),(48,22,'Café en jarrito',150.00),(49,22,'Factura',45.00),(50,23,'Café con Leche',200.00),(51,23,'Tostado',230.00),(52,24,'Café con Leche',200.00),(53,24,'Factura',45.00),(54,24,'Factura',45.00),(55,25,'Café en jarrito',150.00),(56,25,'Factura',45.00),(57,26,'Té con leche',90.00),(58,26,'Factura',45.00),(59,27,'Cortado en Jarrito',150.00),(60,27,'Factura',45.00),(61,28,'Té con leche',90.00),(62,28,'Tostado',230.00),(63,29,'Café con Leche',200.00),(64,29,'Tostado',230.00),(65,30,'Cortado en Jarrito',150.00),(66,30,'Factura',45.00),(67,31,'Café con Leche',200.00),(68,31,'Factura',45.00),(69,31,'Factura',45.00),(70,32,'Café en jarrito',150.00),(71,32,'Factura',45.00),(72,33,'Cortado en Jarrito',150.00),(73,33,'Factura',45.00),(74,34,'Café con Leche',200.00),(75,34,'Cortado en Jarrito',150.00),(76,34,'Factura',45.00),(77,34,'Factura',45.00);
/*!40000 ALTER TABLE `st_items_mesa` ENABLE KEYS */;
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
  `total` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_mesas`
--

LOCK TABLES `st_mesas` WRITE;
/*!40000 ALTER TABLE `st_mesas` DISABLE KEYS */;
INSERT INTO `st_mesas` VALUES (1,1,'Abierta','2021-04-28','Administrador','11:19:22',NULL,NULL),(2,2,'Abierta','2021-04-28','Administrador','12:45:46',NULL,NULL),(3,3,'Abierta','2021-04-28','Administrador','12:46:16',NULL,NULL),(4,1,'Cerrada','2021-04-30','Administrador','12:08:04','18:28:33',680.00),(5,2,'Cerrada','2021-04-30','Administrador','15:27:33','18:29:30',430.00),(6,3,'Cerrada','2021-04-30','Administrador','15:28:36','18:30:01',195.00),(7,1,'Cerrada','2021-05-03','Administrador','19:55:32','19:57:00',625.00),(8,1,'Cerrada','2021-05-03','Administrador','20:37:22','20:40:14',460.00),(9,1,'Cerrada','2021-05-04','Administrador','17:18:49','17:21:09',430.00),(10,3,'Cerrada','2021-05-04','Administrador','17:39:39','17:54:17',195.00),(11,1,'Cerrada','2021-05-04','Administrador','17:49:26','17:54:25',130.00),(12,1,'Abierta','2021-05-06','Gastón Motta','18:53:37',NULL,NULL),(13,1,'Cerrada','2021-05-07','Gastón Motta','08:46:16','08:52:20',130.00),(14,2,'Cerrada','2021-05-07','Gastón Motta','08:46:54','08:54:16',430.00),(15,3,'Cerrada','2021-05-07','Gastón Motta','08:47:37','08:53:33',390.00),(16,4,'Abierta','2021-05-07','Gastón Motta','08:49:24',NULL,NULL),(17,5,'Abierta','2021-05-07','Gastón Motta','08:49:33',NULL,NULL),(18,6,'Abierta','2021-05-07','Gastón Motta','08:49:39',NULL,NULL),(19,1,'Abierta','2021-05-07','Gastón Motta','08:55:36',NULL,NULL),(20,1,'Cerrada','2021-05-12','Gastón Motta','12:23:08','12:25:46',380.00),(21,2,'Cerrada','2021-05-12','Gastón Motta','12:23:17','12:25:57',490.00),(22,6,'Cerrada','2021-05-12','Gastón Motta','12:23:29','12:25:05',195.00),(23,1,'Cerrada','2021-05-17','Administrador','08:14:36','08:16:16',430.00),(24,2,'Cerrada','2021-05-17','Administrador','08:14:46','08:16:06',290.00),(25,3,'Cerrada','2021-05-17','Administrador','08:14:53','08:16:30',195.00),(26,4,'Cerrada','2021-05-17','Administrador','08:18:58','08:20:37',135.00),(27,5,'Cerrada','2021-05-17','Administrador','08:19:07','08:20:26',195.00),(28,6,'Cerrada','2021-05-17','Administrador','08:19:16','08:20:12',320.00),(29,1,'Cerrada','2021-05-18','Administrador','10:15:28','10:17:58',430.00),(30,2,'Cerrada','2021-05-18','Administrador','10:15:38','10:18:15',195.00),(31,3,'Cerrada','2021-05-18','Administrador','10:15:44','10:18:34',290.00),(32,4,'Cerrada','2021-05-18','Administrador','10:15:51','10:18:44',195.00),(33,5,'Cerrada','2021-05-18','Administrador','10:15:57','10:18:56',195.00),(34,6,'Cerrada','2021-05-18','Administrador','10:16:05','10:19:10',440.00);
/*!40000 ALTER TABLE `st_mesas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_productos`
--

LOCK TABLES `st_productos` WRITE;
/*!40000 ALTER TABLE `st_productos` DISABLE KEYS */;
INSERT INTO `st_productos` VALUES (1,'hd0001','1 Kg',650.00),(2,'hd0002','1/2 Kg',410.00),(3,'hd0003','1/4 Hg',250.00),(5,'hd0004','1/8 Kg',100.00),(6,'cf0001','Café en jarrito',150.00),(7,'cf0002','Cortado en Jarrito',150.00),(8,'cf0003','Café con Leche',200.00),(9,'cf0004','Té',85.00),(10,'cf0005','Té con leche',90.00),(11,'cf0006','Factura',45.00),(12,'cf0007','Tostado',230.00);
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
  `envio_pago` enum('Si','No') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_repartos`
--

LOCK TABLES `st_repartos` WRITE;
/*!40000 ALTER TABLE `st_repartos` DISABLE KEYS */;
INSERT INTO `st_repartos` VALUES (1,6,'1 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',650.00,'Claudio Gonzalez','En Camino','2021-05-14','15:45:52',NULL,NULL),(2,13,'1/2 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',410.00,'Claudio Gonzalez','En Camino','2021-05-18','07:28:45',NULL,NULL),(3,14,'1 Kg','Augusto Maza','La Chilca 1883','1161669201','Efectivo',650.00,'Claudio Gonzalez','En Camino','2021-05-20','14:17:02',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_usuarios`
--

LOCK TABLES `st_usuarios` WRITE;
/*!40000 ALTER TABLE `st_usuarios` DISABLE KEYS */;
INSERT INTO `st_usuarios` VALUES (1,'Administrador','root','storia2021',NULL,'Adm','1'),(3,'Augusto Maza','debianmaza@gmail.com','linux1303','../avatar/WhatsApp Image 2021-05-13 at 17.05.33.jpeg','cli','1'),(4,'Gastón Motta','gaston.motta@gmail.com','gastonmotta1234',NULL,'emp','1'),(7,'Marcelo Tinelli','tinelli@gmail.com','33BxaK79nIpWW8e',NULL,'cli','1'),(9,'Ignacio Maza','ignacio@gmail.com','nachomaza1234',NULL,'cli','1'),(10,'Claudio Gonzalez','dummy@gmail.com','dummy1234',NULL,'rep','1');
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
  `cod_producto` varchar(6) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `espacio` varchar(9) NOT NULL,
  `sabor_1` varchar(60) DEFAULT NULL,
  `sabor_2` varchar(60) DEFAULT NULL,
  `sabor_3` varchar(60) DEFAULT NULL,
  `sabor_4` varchar(60) DEFAULT NULL,
  `empleado` varchar(90) DEFAULT NULL,
  `lugar_venta` enum('Local','Web','WhatsApp','Telefonica') NOT NULL,
  `tipo_pago` enum('MP','Efectivo') NOT NULL,
  `fecha_venta` date NOT NULL,
  `hora_venta` time NOT NULL,
  `cliente_nombre` varchar(90) DEFAULT NULL,
  `importe` float(8,2) NOT NULL,
  `estado_entrega` enum('Entregado','No Entregado','No Responde','En Camino','En Preparación') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_ventas`
--

LOCK TABLES `st_ventas` WRITE;
/*!40000 ALTER TABLE `st_ventas` DISABLE KEYS */;
INSERT INTO `st_ventas` VALUES (2,'hd0001','1 Kg','heladeria','Almendrado','Crema del Cielo','Frutilla a la Crema','Crema Americana','Gastón Motta','Local','Efectivo','2021-04-20','09:52:04','Augusto Sebastian Maza',650.00,'Entregado'),(4,'hd0003','1/4 Hg','heladeria','Crema Rusa','Frutos del Bosque','Frutilla a la Crema','Ninguno','Gastón Motta','Local','Efectivo','2021-04-21','19:31:29','Augusto Sebastian Maza',250.00,'Entregado'),(5,'hd0001','1 Kg','heladeria','Crema Rusa','Sambayon','Ninguno','Ninguno','Gastón Motta','Local','Efectivo','2021-05-03','20:16:55','Augusto Sebastian Maza',650.00,'Entregado'),(6,'','1 Kg','heladeria','Cereza a la Crema','Dulce de Leche con Nueces','Frutilla a la Crema','Mascarpone',NULL,'Web','Efectivo','2021-05-14','15:45:52','Augusto Maza',650.00,'En Preparación'),(7,'','1/2 Kg','heladeria','Frutos del Bosque','Dulce de Leche granizado','Menta Granizada','Ninguno',NULL,'Web','Efectivo','2021-05-14','15:54:32','Augusto Maza',410.00,'En Preparación'),(8,'','1 Kg','heladeria','Dulce de Leche','Frutilla a la Crema','Mascarpone','Menta Granizada',NULL,'Web','Efectivo','2021-05-15','10:30:21','Augusto Maza',650.00,'En Preparación'),(9,'','1 Kg','heladeria','Crema Americana','Dulce de Leche con Nueces','Chocolate con Almendras','Menta Granizada',NULL,'Web','Efectivo','2021-05-15','10:33:10','Augusto Maza',650.00,'En Preparación'),(10,'','1/2 Kg','heladeria','Chocolate','Crema Rusa','Menta Granizada','Mascarpone',NULL,'Web','Efectivo','2021-05-15','10:39:58','Augusto Maza',410.00,'En Preparación'),(11,'','Café con Leche','cafeteria',NULL,NULL,NULL,NULL,NULL,'Web','Efectivo','2021-05-15','11:36:11','Augusto Maza',200.00,'En Preparación'),(12,'','Tostado','cafeteria',NULL,NULL,NULL,NULL,NULL,'Web','Efectivo','2021-05-15','11:36:46','Augusto Maza',230.00,'En Preparación'),(13,'','1/2 Kg','heladeria','Cereza a la Crema','Mascarpone','Frutos del Bosque','Kinotos al Whisky',NULL,'Web','Efectivo','2021-05-18','07:28:45','Augusto Maza',410.00,'En Preparación'),(14,'','1 Kg','heladeria','Almendrado','Vainilla','Mascarpone','Frutos del Bosque',NULL,'Web','Efectivo','2021-05-20','14:17:02','Augusto Maza',650.00,'En Camino');
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

-- Dump completed on 2021-05-20 20:49:05
