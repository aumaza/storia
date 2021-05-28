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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-28 14:30:31
