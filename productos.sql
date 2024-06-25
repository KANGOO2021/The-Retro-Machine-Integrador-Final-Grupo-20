-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 08:56:21
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `retro_machine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` int(8) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `descripcion`, `precio`, `cantidad`, `imagen`) VALUES
(1, 'He-Man Original Mattel', 100900, 22, '../img/Productos/Producto1.webp'),
(2, 'Skeletor Original Mattel', 75468, 13, '../img/Productos/Producto2.webp'),
(3, 'Man at arms Original Mattel', 65128, 11, '../img/Productos/Producto3.webp'),
(4, 'Mer man Original Mattel', 82100, 17, '../img/Productos/Producto4.webp'),
(5, 'Lion-o Original Super-7', 100900, 15, '../img/Productos/Producto5.webp'),
(6, 'Panthro Original Super-7', 92100, 10, '../img/Productos/Producto6.webp'),
(7, 'Tygro Original Super-7', 108100, 8, '../img/Productos/Producto7.webp'),
(8, 'Mumm-ra Original Super-7', 99100, 5, '../img/Productos/Producto8.webp'),
(9, 'Marty Mcfly Original', 95500, 5, '../img/Productos/Producto9.webp'),
(10, 'Doc Brown Original', 99925, 7, '../img/Productos/Producto10.webp'),
(11, 'Delorean Original', 79590, 20, '../img/Productos/Producto11.png'),
(12, 'Circuitos Del Tiempo Original', 40100, 12, '../img/Productos/Producto12.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
