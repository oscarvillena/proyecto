-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-06-2023 a las 18:13:40
-- Versión del servidor: 8.0.33-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_augusta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Citas`
--

CREATE TABLE `Citas` (
  `fecha` varchar(255) DEFAULT NULL,
  `hora` varchar(255) DEFAULT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `apellidos_cliente` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `tipo_vehiculo` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cod_Cl` int NOT NULL,
  `Nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Direccion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Apellidos` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cod_Cl`, `Nombre`, `Direccion`, `Apellidos`, `Telefono`) VALUES
(1, 'Oscar', 'Calle 1, Ciudad A', 'Villena Camino', '111-111-1111'),
(2, 'Iván', 'Calle 2, Ciudad B', 'Mosteo González', '222-222-2222'),
(3, 'Álvaro', 'Calle 3, Ciudad C', 'Llorens García', '333-333-3333'),
(4, 'Juan', 'Calle 4, Ciudad D ', 'Almeida Rodriguez', '444-444-4444'),
(5, 'Jose', 'Calle 6, Ciudad f', 'Martinez Soria', '555-555-5555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Cod_Em` int NOT NULL,
  `Apellidos` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Cod_Em`, `Apellidos`, `Nombre`) VALUES
(1, 'Rovira Martínez', 'Sergio'),
(2, 'Sánchez Romea', 'Juan'),
(3, 'Vargas Frances', 'Eduardo'),
(4, 'Garcia Ibañez', 'Andrea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `IdFactura` int NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Cod_Cl` int DEFAULT NULL,
  `IdServicio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`IdFactura`, `Fecha`, `Estado`, `Cod_Cl`, `IdServicio`) VALUES
(1, '2022-01-01', 'Pagado', 1, 1),
(2, '2022-02-01', 'Pendiente', 2, 2),
(3, '2022-03-01', 'Pagado', 3, 1),
(4, '2022-04-01', 'Pendiente', 1, 3),
(5, '2022-05-01', 'Pagado', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `IdServicio` int NOT NULL,
  `Reparacion` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`IdServicio`, `Reparacion`) VALUES
(1, '100.00'),
(2, '200.00'),
(3, '300.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Matricula` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Modelo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Orden` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Marca` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Color` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Cod_Em` int DEFAULT NULL,
  `Cod_Cl` int DEFAULT NULL,
  `Tipo_Vehiculo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`Matricula`, `Modelo`, `Orden`, `Marca`, `Color`, `Cod_Em`, `Cod_Cl`, `Tipo_Vehiculo`) VALUES
('7894MGH', 'Accord', '02', 'Honda', 'Verde', 2, 2, 'Coche'),
('8596MGP', 'Mondeo', '01', 'Ford', 'Azul', 1, 1, 'Coche'),
('8968JOF', 'Mondeo', '05', 'Ford', 'Celeste', 1, 3, 'Furgoneta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Citas`
--
ALTER TABLE `Citas`
  ADD PRIMARY KEY (`telefono`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cod_Cl`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Cod_Em`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`IdFactura`),
  ADD KEY `Cod_Cl` (`Cod_Cl`),
  ADD KEY `IdServicio` (`IdServicio`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IdServicio`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `Cod_Em` (`Cod_Em`),
  ADD KEY `Cod_Cl` (`Cod_Cl`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`Cod_Cl`) REFERENCES `cliente` (`Cod_Cl`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`Cod_Em`) REFERENCES `empleado` (`Cod_Em`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`Cod_Cl`) REFERENCES `cliente` (`Cod_Cl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
