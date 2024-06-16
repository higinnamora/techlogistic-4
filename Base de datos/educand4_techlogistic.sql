-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: techlogistic
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `categoria_materia`
--

DROP TABLE IF EXISTS `categoria_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_materia` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_materia`
--

LOCK TABLES `categoria_materia` WRITE;
/*!40000 ALTER TABLE `categoria_materia` DISABLE KEYS */;
INSERT INTO `categoria_materia` VALUES (1,'Algodon'),(2,'Lana');
/*!40000 ALTER TABLE `categoria_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correos`
--

DROP TABLE IF EXISTS `correos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `correos` (
  `id_correo` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_correo`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `correo_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correos`
--

LOCK TABLES `correos` WRITE;
/*!40000 ALTER TABLE `correos` DISABLE KEYS */;
INSERT INTO `correos` VALUES (1,1,'dayana@correo.com','dayana12345'),(2,2,'sandra@correo.com','f40a37048732da05928c3d374549c832'),(10,3,'diana@correo.com','12345678');
/*!40000 ALTER TABLE `correos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cotizaciones`
--

DROP TABLE IF EXISTS `cotizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cotizaciones` (
  `codigo_cotizacion` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `codigo_producto` int NOT NULL,
  `tipo_cotizacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_unitario` float NOT NULL,
  `fecha_cotizacion` date NOT NULL,
  `cantidad_producto` int NOT NULL,
  `valor_total_cot` float NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`codigo_cotizacion`),
  KEY `codigo_producto` (`codigo_producto`),
  KEY `cotizacion_ibfk_1_idx` (`id_persona`),
  CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizaciones`
--

LOCK TABLES `cotizaciones` WRITE;
/*!40000 ALTER TABLE `cotizaciones` DISABLE KEYS */;
INSERT INTO `cotizaciones` VALUES (1,1,1,'Normal',20000,'2024-02-02',2,40000,NULL);
/*!40000 ALTER TABLE `cotizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int NOT NULL AUTO_INCREMENT,
  `numero_orden_venta` int NOT NULL,
  `producto` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal` float NOT NULL,
  PRIMARY KEY (`id_detalle_venta`),
  KEY `numero_orden_venta` (`numero_orden_venta`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`numero_orden_venta`) REFERENCES `orden_venta` (`numero_orden_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` VALUES (1,10001,'Camiseta',2,20000),(2,10001,'Saco',2,30000),(3,10002,'Camiseta',2,10000),(4,10002,'Sudadera',2,20000),(5,10003,'Sudadera,15000',2,30000),(6,10003,'Pantalon,30000',3,90000),(7,10004,'Jean,30000',1,30000),(8,10005,'Sudadera,15000',2,30000),(9,10006,'Sudadera,15000',2,30000),(10,10006,'Sudadera,15000',3,45000),(11,10007,'Pantalon,30000',2,60000),(12,10007,'Saco,30000',3,90000);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones` (
  `id_direccion` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `tipo_via` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_via` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefijo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_via_veneradora` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefijo_via_generadora` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_placa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (1,1,'Carrera','13','-','13','-','65','Chapinero','Bogota');
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `id_funcionario` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `horario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salario` float NOT NULL,
  `roles_id_rol` int NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `id_persona` (`id_persona`),
  KEY `fk_funcionario_roles1_idx` (`roles_id_rol`),
  CONSTRAINT `fk_funcionario_roles1` FOREIGN KEY (`roles_id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,1,'8-5',13000,1),(2,2,'8 - 5',1300,2),(5,3,'9 - 6',1300,3);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_prima`
--

DROP TABLE IF EXISTS `materia_prima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia_prima` (
  `id_materia_prima` int NOT NULL AUTO_INCREMENT,
  `id_funcionario` int NOT NULL,
  `color_materia` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `cantidad_materia` float NOT NULL,
  `descripcion_materia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_materia_id_categoria` int NOT NULL,
  PRIMARY KEY (`id_materia_prima`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `fk_materia_prima_categoria_materia1_idx` (`categoria_materia_id_categoria`),
  CONSTRAINT `fk_materia_prima_categoria_materia1` FOREIGN KEY (`categoria_materia_id_categoria`) REFERENCES `categoria_materia` (`id_categoria`),
  CONSTRAINT `materia_prima_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_prima`
--

LOCK TABLES `materia_prima` WRITE;
/*!40000 ALTER TABLE `materia_prima` DISABLE KEYS */;
INSERT INTO `materia_prima` VALUES (1,1,'Negra',20000,10,'Tela Camiseta Negra',1),(2,2,'Verde',30000,10,'Tela Jean Negro',2),(3,2,'Negro',15000,10,'Lana Negra',1),(4,2,'Azul',10000,2,'Lana Azul',1);
/*!40000 ALTER TABLE `materia_prima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_producto`
--

DROP TABLE IF EXISTS `materia_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia_producto` (
  `id_materia_producto` int NOT NULL AUTO_INCREMENT,
  `id_materia_prima` int NOT NULL,
  `codigo_producto` int NOT NULL,
  `gasto_materia_prima` float NOT NULL,
  PRIMARY KEY (`id_materia_producto`),
  KEY `id_materia_prima` (`id_materia_prima`),
  KEY `codigo_producto` (`codigo_producto`),
  CONSTRAINT `materia_producto_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`),
  CONSTRAINT `materia_producto_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_producto`
--

LOCK TABLES `materia_producto` WRITE;
/*!40000 ALTER TABLE `materia_producto` DISABLE KEYS */;
INSERT INTO `materia_producto` VALUES (1,1,1,50000);
/*!40000 ALTER TABLE `materia_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medio_pago`
--

DROP TABLE IF EXISTS `medio_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medio_pago` (
  `id_medio_pago` int NOT NULL AUTO_INCREMENT,
  `descripcion_pago` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_medio_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medio_pago`
--

LOCK TABLES `medio_pago` WRITE;
/*!40000 ALTER TABLE `medio_pago` DISABLE KEYS */;
INSERT INTO `medio_pago` VALUES (1,'Tarjeta'),(2,'Efectivo');
/*!40000 ALTER TABLE `medio_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_venta`
--

DROP TABLE IF EXISTS `orden_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden_venta` (
  `numero_orden_venta` int NOT NULL AUTO_INCREMENT,
  `id_funcionario` int NOT NULL,
  `id_persona` int NOT NULL,
  `id_medio_pago` int NOT NULL,
  `fecha_factura` date NOT NULL,
  `doc_identidad` int NOT NULL,
  `nombre_cliente` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`numero_orden_venta`),
  KEY `id_medio_pago` (`id_medio_pago`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_persona` (`id_persona`) /*!80000 INVISIBLE */,
  CONSTRAINT `orden_venta_ibfk_1` FOREIGN KEY (`id_medio_pago`) REFERENCES `medio_pago` (`id_medio_pago`),
  CONSTRAINT `orden_venta_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  CONSTRAINT `orden_venta_ibfk_3` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=10008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_venta`
--

LOCK TABLES `orden_venta` WRITE;
/*!40000 ALTER TABLE `orden_venta` DISABLE KEYS */;
INSERT INTO `orden_venta` VALUES (10001,1,1,1,'2024-06-02',12345,'Iris'),(10002,1,1,1,'2024-06-03',12345,'Iris'),(10003,1,4,1,'2024-06-03',85214,'Aura'),(10004,1,1,1,'2024-06-03',12345,'Iris'),(10005,1,4,1,'2024-06-03',85214,'Aura'),(10006,1,1,1,'2024-06-05',12345,'Iris'),(10007,1,4,1,'2024-06-07',85214,'Aura');
/*!40000 ALTER TABLE `orden_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_venta_producto`
--

DROP TABLE IF EXISTS `orden_venta_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden_venta_producto` (
  `id_factura_producto` int NOT NULL AUTO_INCREMENT,
  `numero_orden_venta` int NOT NULL,
  `codigo_producto` int NOT NULL,
  PRIMARY KEY (`id_factura_producto`),
  KEY `numero_orden_venta` (`numero_orden_venta`),
  KEY `codigo_producto` (`codigo_producto`),
  CONSTRAINT `orden_venta_producto_ibfk_1` FOREIGN KEY (`numero_orden_venta`) REFERENCES `orden_venta` (`numero_orden_venta`),
  CONSTRAINT `orden_venta_producto_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_venta_producto`
--

LOCK TABLES `orden_venta_producto` WRITE;
/*!40000 ALTER TABLE `orden_venta_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_venta_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_materia_prima` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `cantidad_pedido` int NOT NULL,
  `fecha_pedido` date NOT NULL,
  `valor_bruto` float NOT NULL,
  `iva` float NOT NULL,
  `valor_total` float NOT NULL,
  `devolucion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_materia_prima` (`id_materia_prima`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,1,5,'2024-02-02',100000,19000,11900,0),(3,1,1,10,'2024-06-16',200000,38000,238000,NULL),(5,3,3,10,'2024-06-16',40500,9500,50000,NULL);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `no_documento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'12345','Iris','Dayana','Sanchez','Perez'),(2,'98765','Sandra','Liliana','Collazos','Gomez'),(3,'15964','Diana','Carolina','Pinzon','Gonzalez'),(4,'85214','Aura','Cristina','Vela','Gonzalez'),(5,'6876416','Ana','Esperanza','Gomez','Anturi'),(6,'9674616','Carmen','Liliana','Ramirez','pinzon'),(7,'100456','Carlos','Andres','Vanegas','Guerrero'),(10,'100457','Martha','Edilma','Puentes','Correo'),(13,'100567','Ginna','Marcela','Mora','Diaz'),(14,'100568','Aura','Cristina','Vela','Gonzalez'),(15,'100569','Ana','Marcela','Cruz','Diaz'),(16,'100570','Maria','Cristina','Muñoz','Gonzalez'),(21,'','','','',''),(22,'','','','',''),(23,'','','','',''),(24,'','','','',''),(25,'','','','','');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `codigo_producto` int NOT NULL AUTO_INCREMENT,
  `id_funcionario` int NOT NULL,
  `cantidad` int NOT NULL,
  `nombre_producto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `talla` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_producto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `id_funcionario` (`id_funcionario`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,10,'Camiseta-s-gris','Algodon',20000,'s','Gris','Bodega'),(2,1,10,'Saco-s-negro','Lana',30000,'s','Negro','Bodega'),(3,2,10,'Sudadera-s-cafe','Algodon',15000,'s','Cafe','Bodega'),(4,1,10,'Jean-s-azul','Algodon',30000,'s','Azul','Bodega'),(5,2,10,'Pantalon-s-gris','Algodon',30000,'s','Gris','Bodega');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_materia`
--

DROP TABLE IF EXISTS `proveedor_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor_materia` (
  `id_proveedor_materia` int NOT NULL AUTO_INCREMENT,
  `id_materia_prima` int NOT NULL,
  `id_proveedor` int NOT NULL,
  PRIMARY KEY (`id_proveedor_materia`),
  KEY `id_materia_prima` (`id_materia_prima`),
  KEY `id_proveedor` (`id_proveedor`),
  CONSTRAINT `proveedor_materia_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`),
  CONSTRAINT `proveedor_materia_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_materia`
--

LOCK TABLES `proveedor_materia` WRITE;
/*!40000 ALTER TABLE `proveedor_materia` DISABLE KEYS */;
INSERT INTO `proveedor_materia` VALUES (1,1,1);
/*!40000 ALTER TABLE `proveedor_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id_proveedor` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,4,'14','Telas Don Ramón'),(3,1,'12345','Doña Florinda'),(4,1,'4444','Doña María');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `descripcion_rol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Vendedor'),(3,'Costurero');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `id_stock` int NOT NULL AUTO_INCREMENT,
  `codigo_producto` int NOT NULL,
  `cantidad_stock` int NOT NULL,
  `descripcion_stock` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_stock`),
  KEY `codigo_producto` (`codigo_producto`),
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,1,8,'Camiseta','Activo');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-15 23:56:32
