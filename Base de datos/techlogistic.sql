-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2024 a las 03:10:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `techlogistic`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_persona` ()   BEGIN
    SELECT 
        p.id_persona,
        p.no_documento,
        p.primer_nombre,
        p.segundo_nombre,
        p.primer_apellido,
        p.segundo_apellido,
        c.correo,
        r.descripcion_rol
    FROM 
        personas p
    LEFT JOIN 
        correos c ON p.id_persona = c.id_persona
    LEFT JOIN 
        roles r ON p.id_rol = r.id_rol;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_materia`
--

CREATE TABLE `categoria_materia` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_materia`
--

INSERT INTO `categoria_materia` (`id_categoria`, `descripcion`) VALUES
(1, 'Algodon'),
(2, 'Lana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `medidas` float NOT NULL,
  `estado_cliente` varchar(15) NOT NULL,
  `tipo_cliente` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_persona`, `medidas`, `estado_cliente`, `tipo_cliente`, `genero`) VALUES
(1, 3, 10, 'Activo', 'Natural', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id_correo` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`id_correo`, `id_persona`, `correo`, `password`) VALUES
(1, 1, 'dayana@correo.com', 'dayana12345'),
(2, 2, 'sandra@correo.com', '12345678'),
(3, 3, 'diana@correo.com', '3a23bb515e06d0e944ff916e79a7775c'),
(4, 4, 'cesar_a_mar_@hotmail.com', 'cesar'),
(5, 5, 'sanabria.ruben.sena@gmail.com', 'cesar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `codigo_cotizacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `tipo_cotizacion` varchar(20) NOT NULL,
  `valor_unitario` float NOT NULL,
  `fecha_cotizacion` date NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `valor_total_cot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`codigo_cotizacion`, `id_cliente`, `codigo_producto`, `tipo_cotizacion`, `valor_unitario`, `fecha_cotizacion`, `cantidad_producto`, `valor_total_cot`) VALUES
(1, 1, 1, 'Normal', 20000, '2024-02-02', 2, 40000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `tipo_via` varchar(20) NOT NULL,
  `numero_via` varchar(10) NOT NULL,
  `prefijo` varchar(10) NOT NULL,
  `num_via_veneradora` varchar(10) NOT NULL,
  `prefijo_via_generadora` varchar(10) NOT NULL,
  `numero_placa` varchar(10) NOT NULL,
  `barrio` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `id_persona`, `tipo_via`, `numero_via`, `prefijo`, `num_via_veneradora`, `prefijo_via_generadora`, `numero_placa`, `barrio`, `ciudad`) VALUES
(1, 1, 'Carrera', '13', '-', '13', '-', '65', 'Chapinero', 'Bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `salario` float NOT NULL,
  `roles_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_persona`, `horario`, `salario`, `roles_id_rol`) VALUES
(1, 1, '8-5', 13000, 1),
(2, 2, '8 - 5', 1300, 2),
(3, 1, '8 - 5', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `id_materia_prima` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `color_materia` varchar(20) NOT NULL,
  `precio` float NOT NULL,
  `cantidad_materia` float NOT NULL,
  `descripcion_materia` varchar(40) NOT NULL,
  `categoria_materia_id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`id_materia_prima`, `id_funcionario`, `color_materia`, `precio`, `cantidad_materia`, `descripcion_materia`, `categoria_materia_id_categoria`) VALUES
(0, 3, 'Azul', 50000, 6, 'Tela algodón', 2),
(1, 1, 'Negra', 20000, 5, 'tela camiseta', 1),
(2, 2, 'Verde', 30000, 2, 'Jean', 2);

--
-- Disparadores `materia_prima`
--
DELIMITER $$
CREATE TRIGGER `actualizar_cantidad_materia_prima` BEFORE INSERT ON `materia_prima` FOR EACH ROW BEGIN
  DECLARE cantidad_existente INT;
  
  -- Verificar si el id_materia_prima ya existe
  SELECT cantidad_materia INTO cantidad_existente 
  FROM materia_prima 
  WHERE descripcion_materia = NEW.descripcion_materia;
  
  -- Si el id_materia_prima ya existe, actualizar la cantidad
  IF cantidad_existente IS NOT NULL THEN
    UPDATE materia_prima 
    SET cantidad_materia = cantidad_materia + NEW.cantidad_materia
    WHERE descripcion_materia = NEW.descripcion_materia;
    
    -- Cancelar la inserción original para evitar duplicados
    SET NEW.descripcion_materia = NULL;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_producto`
--

CREATE TABLE `materia_producto` (
  `id_materia_producto` int(11) NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `gasto_materia_prima` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materia_producto`
--

INSERT INTO `materia_producto` (`id_materia_producto`, `id_materia_prima`, `codigo_producto`, `gasto_materia_prima`) VALUES
(1, 1, 1, 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_pago`
--

CREATE TABLE `medio_pago` (
  `id_medio_pago` int(11) NOT NULL,
  `descripcion_pago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medio_pago`
--

INSERT INTO `medio_pago` (`id_medio_pago`, `descripcion_pago`) VALUES
(1, 'Tarjeta'),
(2, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_venta`
--

CREATE TABLE `orden_venta` (
  `numero_orden_venta` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_medio_pago` int(11) NOT NULL,
  `cantidad_productos` int(11) NOT NULL,
  `descuento` float NOT NULL,
  `fecha_factura` date NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `subtotal` float NOT NULL,
  `valor_Total` float NOT NULL,
  `devolucion` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orden_venta`
--

INSERT INTO `orden_venta` (`numero_orden_venta`, `id_funcionario`, `id_cliente`, `id_medio_pago`, `cantidad_productos`, `descuento`, `fecha_factura`, `observacion`, `subtotal`, `valor_Total`, `devolucion`) VALUES
(1, 1, 1, 1, 2, 0, '2024-02-02', 'Camista', 40000, 40000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_venta_producto`
--

CREATE TABLE `orden_venta_producto` (
  `id_factura_producto` int(11) NOT NULL,
  `numero_orden_venta` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orden_venta_producto`
--

INSERT INTO `orden_venta_producto` (`id_factura_producto`, `numero_orden_venta`, `codigo_producto`) VALUES
(1, 1, 1);

--
-- Disparadores `orden_venta_producto`
--
DELIMITER $$
CREATE TRIGGER `actualizar_stock_despues_venta` AFTER INSERT ON `orden_venta_producto` FOR EACH ROW BEGIN
    DECLARE cantidad_producto INT;
    DECLARE codigo_producto INT;

    -- Obtener la cantidad y el código del producto vendido
    SELECT cantidad, codigo_producto INTO cantidad_producto, codigo_producto
    FROM producto
    WHERE codigo_producto = NEW.codigo_producto;

    -- Actualizar la cantidad en la tabla producto
    UPDATE producto
    SET cantidad = cantidad - cantidad_producto
    WHERE codigo_producto = NEW.codigo_producto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `numero_orden` int(11) NOT NULL,
  `cantidad_pedido` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `devolucion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_materia_prima`, `id_proveedor`, `numero_orden`, `cantidad_pedido`, `fecha_pedido`, `devolucion`) VALUES
(1, 1, 1, 1, 5, '2024-02-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `no_documento` varchar(10) NOT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `no_documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_rol`) VALUES
(1, '12345', 'Iris', 'Dayana', 'Sanchez', 'Perez', NULL),
(2, '98765', 'Sandra', 'Liliana', 'Collazos', 'Gomez', NULL),
(3, '15964', 'Diana', 'Carolina', 'Pinzon', 'Gonzalez', NULL),
(4, '85214', 'Aura', 'Cristina', 'Vela', 'Gonzalez', NULL),
(5, '6876416', 'Ana', 'Esperanza', 'Gomez', 'Anturi', NULL),
(6, '9674616', 'Carmen', 'Liliana', 'Ramirez', 'pinzon', NULL),
(7, '100456', 'Carlos', 'Andres', 'Vanegas', 'Guerrero', NULL),
(10, '100457', 'Martha', 'Edilma', 'Puentes', 'Correo', NULL),
(13, '100567', 'Ginna', 'Marcela', 'Mora', 'Diaz', NULL),
(14, '100568', 'Aura', 'Cristina', 'Vela', 'Gonzalez', NULL),
(15, '100569', 'Ana', 'Marcela', 'Cruz', 'Diaz', NULL),
(16, '100570', 'Maria', 'Cristina', 'Muñoz', 'Gonzalez', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo_producto` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `nombre_producto` varchar(60) NOT NULL,
  `material` varchar(60) NOT NULL,
  `precio` float NOT NULL,
  `talla` varchar(50) NOT NULL,
  `color_producto` varchar(20) NOT NULL,
  `ubicacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_producto`, `id_funcionario`, `cantidad`, `nombre_producto`, `material`, `precio`, `talla`, `color_producto`, `ubicacion`) VALUES
(1, 1, 10, 'Camista', 'Algodon', 20000, 's', 'Gris', 'Bodega'),
(2, 1, 20, 'Saco', 'Lana', 30000, 's', 'Negro', 'Bodega'),
(3, 2, 30, 'Sudadera', 'Algodon', 15000, 's', 'Cafe', 'Bodega'),
(4, 1, 40, 'Jean', 'Algodon', 30000, 's', 'Azul', 'Bodega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `razon_social` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_persona`, `nit`, `razon_social`) VALUES
(1, 4, '123', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_materia`
--

CREATE TABLE `proveedor_materia` (
  `id_proveedor_materia` int(11) NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor_materia`
--

INSERT INTO `proveedor_materia` (`id_proveedor_materia`, `id_materia_prima`, `id_proveedor`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `descripcion_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `descripcion_rol`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Costurero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad_stock` int(11) NOT NULL,
  `descripcion_stock` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_stock`, `codigo_producto`, `cantidad_stock`, `descripcion_stock`, `estado`) VALUES
(1, 1, 8, 'Camiseta', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_materia`
--
ALTER TABLE `categoria_materia`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id_correo`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`codigo_cotizacion`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `fk_funcionario_roles1_idx` (`roles_id_rol`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`id_materia_prima`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `fk_materia_prima_categoria_materia1_idx` (`categoria_materia_id_categoria`);

--
-- Indices de la tabla `materia_producto`
--
ALTER TABLE `materia_producto`
  ADD PRIMARY KEY (`id_materia_producto`),
  ADD KEY `id_materia_prima` (`id_materia_prima`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  ADD PRIMARY KEY (`id_medio_pago`);

--
-- Indices de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  ADD PRIMARY KEY (`numero_orden_venta`),
  ADD KEY `id_medio_pago` (`id_medio_pago`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `orden_venta_producto`
--
ALTER TABLE `orden_venta_producto`
  ADD PRIMARY KEY (`id_factura_producto`),
  ADD KEY `numero_orden_venta` (`numero_orden_venta`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD UNIQUE KEY `numero_orden_UNIQUE` (`numero_orden`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_materia_prima` (`id_materia_prima`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo_producto`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `proveedor_materia`
--
ALTER TABLE `proveedor_materia`
  ADD PRIMARY KEY (`id_proveedor_materia`),
  ADD KEY `id_materia_prima` (`id_materia_prima`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_materia`
--
ALTER TABLE `categoria_materia`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id_correo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `codigo_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materia_producto`
--
ALTER TABLE `materia_producto`
  MODIFY `id_materia_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  MODIFY `id_medio_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  MODIFY `numero_orden_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `orden_venta_producto`
--
ALTER TABLE `orden_venta_producto`
  MODIFY `id_factura_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor_materia`
--
ALTER TABLE `proveedor_materia`
  MODIFY `id_proveedor_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `correos`
--
ALTER TABLE `correos`
  ADD CONSTRAINT `correo_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_roles1` FOREIGN KEY (`roles_id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD CONSTRAINT `fk_materia_prima_categoria_materia1` FOREIGN KEY (`categoria_materia_id_categoria`) REFERENCES `categoria_materia` (`id_categoria`),
  ADD CONSTRAINT `materia_prima_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Filtros para la tabla `materia_producto`
--
ALTER TABLE `materia_producto`
  ADD CONSTRAINT `materia_producto_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`),
  ADD CONSTRAINT `materia_producto_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`);

--
-- Filtros para la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  ADD CONSTRAINT `orden_venta_ibfk_1` FOREIGN KEY (`id_medio_pago`) REFERENCES `medio_pago` (`id_medio_pago`),
  ADD CONSTRAINT `orden_venta_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `orden_venta_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `orden_venta_producto`
--
ALTER TABLE `orden_venta_producto`
  ADD CONSTRAINT `orden_venta_producto_ibfk_1` FOREIGN KEY (`numero_orden_venta`) REFERENCES `orden_venta` (`numero_orden_venta`),
  ADD CONSTRAINT `orden_venta_producto_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `proveedor_materia`
--
ALTER TABLE `proveedor_materia`
  ADD CONSTRAINT `proveedor_materia_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`),
  ADD CONSTRAINT `proveedor_materia_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
