-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: techlogistic
-- ------------------------------------------------------
-- Server version	8.2.0

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
  `descripcion` varchar(50) NOT NULL,
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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `medidas` float NOT NULL,
  `estado_cliente` varchar(15) NOT NULL,
  `tipo_cliente` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,3,10,'Activo','Natural','Femenino');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
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
  `correo` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id_correo`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `correo_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correos`
--

LOCK TABLES `correos` WRITE;
/*!40000 ALTER TABLE `correos` DISABLE KEYS */;
INSERT INTO `correos` VALUES (1,1,'dayana@correo.com','dayana'),(2,2,'sandra@correo.com','f40a37048732da05928c3d374549c832'),(3,3,'diana@correo.com','3a23bb515e06d0e944ff916e79a7775c'),(4,4,'cesar_a_mar_@hotmail.com','cesar'),(5,5,'sanabria.ruben.sena@gmail.com','cesar');
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
  `id_cliente` int NOT NULL,
  `codigo_producto` int NOT NULL,
  `tipo_cotizacion` varchar(20) NOT NULL,
  `valor_unitario` float NOT NULL,
  `fecha_cotizacion` date NOT NULL,
  `cantidad_producto` int NOT NULL,
  `valor_total_cot` float NOT NULL,
  PRIMARY KEY (`codigo_cotizacion`),
  KEY `id_cliente` (`id_cliente`),
  KEY `codigo_producto` (`codigo_producto`),
  CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizaciones`
--

LOCK TABLES `cotizaciones` WRITE;
/*!40000 ALTER TABLE `cotizaciones` DISABLE KEYS */;
INSERT INTO `cotizaciones` VALUES (1,1,1,'Normal',20000,'2024-02-02',2,40000);
/*!40000 ALTER TABLE `cotizaciones` ENABLE KEYS */;
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
  `tipo_via` varchar(20) NOT NULL,
  `numero_via` varchar(10) NOT NULL,
  `prefijo` varchar(10) NOT NULL,
  `num_via_veneradora` varchar(10) NOT NULL,
  `prefijo_via_generadora` varchar(10) NOT NULL,
  `numero_placa` varchar(10) NOT NULL,
  `barrio` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
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
  `horario` varchar(20) NOT NULL,
  `salario` float NOT NULL,
  `roles_id_rol` int NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `id_persona` (`id_persona`),
  KEY `fk_funcionario_roles1_idx` (`roles_id_rol`),
  CONSTRAINT `fk_funcionario_roles1` FOREIGN KEY (`roles_id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,1,'8-5',13000,1),(2,2,'8 - 5',1300,2),(3,1,'8 - 5',0,1);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_prima`
--

DROP TABLE IF EXISTS `materia_prima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia_prima` (
  `id_materia_prima` int NOT NULL,
  `id_funcionario` int NOT NULL,
  `color_materia` varchar(20) NOT NULL,
  `precio` float NOT NULL,
  `cantidad_materia` int NOT NULL,
  `descripcion_materia` varchar(40) NOT NULL,
  `categoria_materia_id_categoria` int NOT NULL,
  PRIMARY KEY (`id_materia_prima`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `fk_materia_prima_categoria_materia1_idx` (`categoria_materia_id_categoria`),
  CONSTRAINT `fk_materia_prima_categoria_materia1` FOREIGN KEY (`categoria_materia_id_categoria`) REFERENCES `categoria_materia` (`id_categoria`),
  CONSTRAINT `materia_prima_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_prima`
--

LOCK TABLES `materia_prima` WRITE;
/*!40000 ALTER TABLE `materia_prima` DISABLE KEYS */;
INSERT INTO `materia_prima` VALUES (1,1,'Negra',20000,5,'tela camiseta',1),(2,2,'Verde',30000,2,'Jean',2);
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
  `descripcion_pago` varchar(20) NOT NULL,
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
  `id_cliente` int NOT NULL,
  `id_medio_pago` int NOT NULL,
  `cantidad_productos` int NOT NULL,
  `descuento` float NOT NULL,
  `fecha_factura` date NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `subtotal` float NOT NULL,
  `valor_Total` float NOT NULL,
  PRIMARY KEY (`numero_orden_venta`),
  KEY `id_medio_pago` (`id_medio_pago`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `orden_venta_ibfk_1` FOREIGN KEY (`id_medio_pago`) REFERENCES `medio_pago` (`id_medio_pago`),
  CONSTRAINT `orden_venta_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  CONSTRAINT `orden_venta_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_venta`
--

LOCK TABLES `orden_venta` WRITE;
/*!40000 ALTER TABLE `orden_venta` DISABLE KEYS */;
INSERT INTO `orden_venta` VALUES (1,1,1,1,2,0,'2024-02-02','Camista',40000,40000);
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
INSERT INTO `orden_venta_producto` VALUES (1,1,1);
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
  `numero_orden` int NOT NULL,
  `cantidad_pedido` int NOT NULL,
  `fecha_pedido` date NOT NULL,
  `devolucion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  UNIQUE KEY `numero_orden_UNIQUE` (`numero_orden`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_materia_prima` (`id_materia_prima`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,1,1,5,'2024-02-02',NULL);
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
  `no_documento` varchar(10) NOT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'12345','Iris','Dayana','Sanchez','Perez'),(2,'98765','Sandra','Liliana','Collazos','Gomez'),(3,'15964','Diana','Carolina','Pinzon','Gonzalez'),(4,'85214','Aura','Cristina','Vela','Gonzalez'),(5,'6876416','Ana','Esperanza','Gomez','Anturi'),(6,'9674616','Carmen','Liliana','Ramirez','pinzon'),(7,'100456','Carlos','Andres','Vanegas','Guerrero'),(10,'100457','Martha','Edilma','Puentes','Correo'),(13,'100567','Ginna','Marcela','Mora','Diaz'),(14,'100568','Aura','Cristina','Vela','Gonzalez'),(15,'100569','Ana','Marcela','Cruz','Diaz'),(16,'100570','Maria','Cristina','Muñoz','Gonzalez');
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
  `nombre_producto` varchar(60) NOT NULL,
  `material` varchar(60) NOT NULL,
  `precio` float NOT NULL,
  `talla` varchar(50) NOT NULL,
  `color_producto` varchar(20) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `id_funcionario` (`id_funcionario`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,0,'Camista','Algodon',20000,'s','Gris','Bodega'),(2,1,0,'Saco','Lana',30000,'s','Negro','Bodega'),(3,2,0,'Sudadera','Algodon',15000,'s','Cafe','Bodega'),(4,1,0,'Jean','Algodon',30000,'s','Azul','Bodega');
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
  `nit` varchar(20) NOT NULL,
  `razon_social` varchar(60) NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,4,'123','3');
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
  `descripcion_rol` varchar(50) NOT NULL,
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
  `descripcion_stock` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
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

-- Dump completed on 2024-04-17 21:18:37
