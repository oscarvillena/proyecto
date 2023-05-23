-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-05-2023 a las 15:43:51
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
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cod_Cl` int NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Direccion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Apellidos` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cod_Cl`, `Descripcion`, `Direccion`, `Apellidos`, `Telefono`) VALUES
(1, 'Oscar', 'Calle 1, Ciudad A', 'Villena Camino', '111-111-1111'),
(2, 'Iván', 'Calle 2, Ciudad B', 'Mosteo González', '222-222-2222'),
(3, 'Álvaro', 'Calle 3, Ciudad C', 'Llorens García', '333-333-3333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `Matricula` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `N_Bastidor` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Tipo_Vehiculo` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Coche',
  `Cod_Vehiculo` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`Matricula`, `N_Bastidor`, `Tipo_Vehiculo`, `Cod_Vehiculo`) VALUES
('1234ABC', 'A12345', 'Coche', '1234ABC');

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
(3, 'Vargas Frances', 'Eduardo');

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
-- Estructura de tabla para la tabla `furgonetas`
--

CREATE TABLE `furgonetas` (
  `Matricula` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `N_Bastidor` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Tipo_Vehiculo` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Furgoneta',
  `Cod_Vehiculo` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `furgonetas`
--

INSERT INTO `furgonetas` (`Matricula`, `N_Bastidor`, `Tipo_Vehiculo`, `Cod_Vehiculo`) VALUES
('5678DEF', 'C24680', 'Furgoneta', '5678DEF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motos`
--

CREATE TABLE `motos` (
  `Matricula` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `N_Bastidor` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Tipo_Vehiculo` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Moto',
  `Cod_Vehiculo` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motos`
--

INSERT INTO `motos` (`Matricula`, `N_Bastidor`, `Tipo_Vehiculo`, `Cod_Vehiculo`) VALUES
('9012GHI', 'E86420', 'Moto', '9012GHI');

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
  `Matricula` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
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
('1234ABC', 'Berlina', '01', 'Seat', 'Rojo', 1, 1, 'Coche'),
('5678DEF', 'Vito', '02', 'Mercedes', 'Blanco', 2, 2, 'Furgoneta'),
('9012GHI', 'Suzuki', '03', 'Suzuki', 'Azul', 3, 3, 'Moto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cod_Cl`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `Tipo_Vehiculo` (`Tipo_Vehiculo`);

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
-- Indices de la tabla `furgonetas`
--
ALTER TABLE `furgonetas`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `Tipo_Vehiculo` (`Tipo_Vehiculo`);

--
-- Indices de la tabla `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `Tipo_Vehiculo` (`Tipo_Vehiculo`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IdServicio`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`Tipo_Vehiculo`),
  ADD KEY `Cod_Em` (`Cod_Em`),
  ADD KEY `Cod_Cl` (`Cod_Cl`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`Tipo_Vehiculo`) REFERENCES `vehiculo` (`Tipo_Vehiculo`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`Cod_Cl`) REFERENCES `cliente` (`Cod_Cl`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`);

--
-- Filtros para la tabla `furgonetas`
--
ALTER TABLE `furgonetas`
  ADD CONSTRAINT `furgonetas_ibfk_1` FOREIGN KEY (`Tipo_Vehiculo`) REFERENCES `vehiculo` (`Tipo_Vehiculo`);

--
-- Filtros para la tabla `motos`
--
ALTER TABLE `motos`
  ADD CONSTRAINT `motos_ibfk_1` FOREIGN KEY (`Tipo_Vehiculo`) REFERENCES `vehiculo` (`Tipo_Vehiculo`);

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
