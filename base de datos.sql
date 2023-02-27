-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-02-2023 a las 16:57:50
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19654446_aw2022`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `Nombre`, `Fecha`) VALUES
(85, 'Refrescos', '2018-06-13'),
(86, 'Alimentos', '2018-06-14'),
(87, 'Refrescos', '2018-06-13'),
(88, 'Alimentos', '2018-06-14'),
(89, 'Lacti', '2018-06-10'),
(90, 'Carnes', '2018-06-11'),
(91, 'Lactios', '2018-06-10'),
(92, 'Carnes', '2018-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_p` varchar(50) NOT NULL,
  `Apellido_m` varchar(50) NOT NULL,
  `Genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nombres`, `Apellido_p`, `Apellido_m`, `Genero`) VALUES
(1, 'Cesar', 'Pereda', 'Rdz', 'Masculino'),
(2, 'Miguel', 'Tienda', 'Jurado', 'Masculino'),
(3, 'dsdgsgd', 'sdfgsdg', 'sdfgsdf', 'Femenino'),
(4, 'Santa', 'No tan Santa', 'Mendez', 'Femenino'),
(5, 'hghjfgj', 'fgjfgj', 'fghjfgj', 'Masculino'),
(6, 'oooooo', 'ooooo', 'oooo', 'Otro1'),
(7, 'aaaaaaa', 'aaaaa', 'aaaaa', 'Masculino'),
(9, 'dfgdfdfg', 'dfgdfgdf', 'gdfgdfg', 'dfgdfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cantidad` decimal(10,0) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `Nombre`, `Cantidad`, `id_proveedor`) VALUES
(44, 'Leche', 120, 17),
(46, 'Coca Colaaaa', 100, 16),
(47, 'Huevos', 20, 21),
(53, 'Pepsi', 80, 20),
(54, 'Queso', 40, 21),
(61, 'El profe was hare', 1234567, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_p` varchar(50) NOT NULL,
  `Apellido_m` varchar(50) NOT NULL,
  `Genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `Nombres`, `Apellido_p`, `Apellido_m`, `Genero`) VALUES
(3, 'Cesar', 'Pereda', 'Rdz', 'Masculino'),
(16, 'Alexia', 'Salas', 'Carrasco', 'Femenino'),
(17, 'Eden Gregorio', 'Benavente', 'Guzman', 'Masculino'),
(20, 'Juan Gerardo', 'Fraga', 'Vega', 'Masculino'),
(21, 'Erik', 'Perez', 'Gonzalez', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `Privilegio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Nombre`, `Usuario`, `Contrasena`, `Privilegio`) VALUES
(1, 'Cristopher', 'CrisGamer@gmial.com', '12345', 'Admin'),
(2, 'Rigo', 'Rigo@gmail.com', '123456789', 'Admin'),
(3, 'Brandon', 'Brandon@gmail.com', '09876543', 'Admin'),
(18, 'Frutas', 'almar3149@gmail.com', 'Ua1.....ez', 'Admin'),
(19, 'Trigo', 'Trigo@gmail.com', 'Trigo123', 'Admin'),
(20, 'cris', 'Cris@gmial.com', '12345', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
