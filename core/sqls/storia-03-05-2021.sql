-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: storia
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_clientes`
--

LOCK TABLES `st_clientes` WRITE;
/*!40000 ALTER TABLE `st_clientes` DISABLE KEYS */;
INSERT INTO `st_clientes` VALUES (2,'Augusto Sebastian Maza','debianmaza@gmail.com','La Chilca 1883','Ciudad Evita','21440301','1161669201','cli'),(3,'Gastón Motta','gaston.motta@gmail.com','Av. Directorio 4867','Capital Federal','1122887651','1130238224','emp');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_items_mesa`
--

LOCK TABLES `st_items_mesa` WRITE;
/*!40000 ALTER TABLE `st_items_mesa` DISABLE KEYS */;
INSERT INTO `st_items_mesa` VALUES (1,4,'Cortado en Jarrito',150.00),(2,4,'Café en jarrito',150.00),(3,4,'Café en jarrito',150.00),(4,4,'Tostado',230.00),(5,5,'Café con Leche',200.00),(6,5,'Tostado',230.00),(7,6,'Cortado en Jarrito',150.00),(8,6,'Factura',45.00),(9,7,'Café en jarrito',150.00),(10,7,'Café con Leche',200.00),(11,7,'Factura',45.00),(12,7,'Tostado',230.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_mesas`
--

LOCK TABLES `st_mesas` WRITE;
/*!40000 ALTER TABLE `st_mesas` DISABLE KEYS */;
INSERT INTO `st_mesas` VALUES (1,1,'Abierta','2021-04-28','Administrador','11:19:22',NULL,NULL),(2,2,'Abierta','2021-04-28','Administrador','12:45:46',NULL,NULL),(3,3,'Abierta','2021-04-28','Administrador','12:46:16',NULL,NULL),(4,1,'Cerrada','2021-04-30','Administrador','12:08:04','18:28:33',680.00),(5,2,'Cerrada','2021-04-30','Administrador','15:27:33','18:29:30',430.00),(6,3,'Cerrada','2021-04-30','Administrador','15:28:36','18:30:01',195.00),(7,1,'Cerrada','2021-05-03','Administrador','19:55:32','19:57:00',625.00);
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
INSERT INTO `st_sabores` VALUES (1,'sb0001','Vainilla'),(2,'sb0002','Almendrado'),(3,'sb0003','Crema Americana'),(4,'sb0004','Crema del Cielo'),(5,'sb0005','Crema Rusa'),(6,'sb0006','Frutilla a la Crema'),(7,'sb0007','Frutilla al Agua'),(8,'sb0008','Cereza a la Crema'),(10,'sb0009','Dulce de Leche'),(11,'sb0000','Ninguno'),(12,'sb0010','Mascarpone'),(13,'sb0011','Kinotos al Whisky'),(14,'sb0012','Sambayon'),(15,'sb0013','Dulce de Leche granizado'),(16,'sb0014','Dulce de Leche con Nueces'),(17,'sb0015','Chocolate'),(18,'sb0016','Chocolate con Almendras'),(19,'sb0017','Frutos del Bosque'),(20,'sb0018','Menta'),(21,'sb0019','Menta Granizada');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_usuarios`
--

LOCK TABLES `st_usuarios` WRITE;
/*!40000 ALTER TABLE `st_usuarios` DISABLE KEYS */;
INSERT INTO `st_usuarios` VALUES (1,'Administrador','root','storia2021',NULL,'Adm','1'),(3,'Augusto Maza','debianmaza@gmail.com','pY612DrLopkk8NU',NULL,'cli','1'),(4,'Gastón Motta','gaston.motta@gmail.com','mobJprx5nfeGpi9',NULL,'emp','1');
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
  `lugar_venta` enum('Local','Web') NOT NULL,
  `tipo_pago` enum('MP','Efectivo') NOT NULL,
  `fecha_venta` date NOT NULL,
  `hora_venta` time NOT NULL,
  `cliente_nombre` varchar(90) DEFAULT NULL,
  `importe` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_ventas`
--

LOCK TABLES `st_ventas` WRITE;
/*!40000 ALTER TABLE `st_ventas` DISABLE KEYS */;
INSERT INTO `st_ventas` VALUES (2,'hd0001','1 Kg','heladeria','Almendrado','Crema del Cielo','Frutilla a la Crema','Crema Americana','Gastón Motta','Local','Efectivo','2021-04-20','09:52:04','Augusto Sebastian Maza',650.00),(4,'hd0003','1/4 Hg','heladeria','Crema Rusa','Frutos del Bosque','Frutilla a la Crema','Ninguno','Gastón Motta','Local','Efectivo','2021-04-21','19:31:29','Augusto Sebastian Maza',250.00);
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

-- Dump completed on 2021-05-03 20:12:55
