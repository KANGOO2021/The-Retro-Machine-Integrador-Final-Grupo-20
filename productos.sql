-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2024 a las 21:20:41
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
(1, 'He-Man Original Mattel', 100900, 22, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FHe-man%20mu%C3%B1eco%20retro.webp?alt=media&token=b108eebd-45ae-41e5-b7f4-0ff92daef789'),
(2, 'Skeletor Original Mattel', 75468, 13, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FSkeletor%20mu%C3%B1eco%20retro.webp?alt=media&token=4070aa8d-e8ee-43fd-a0c7-d6f3f721e140'),
(3, 'Man at arms Original Mattel', 65128, 11, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FMan%20at%20arms%20mu%C3%B1eco%20retro.webp?alt=media&token=6c9c9291-b4c6-4c7f-8d94-4d9d9186ec2a'),
(4, 'Mer man Original Mattel', 82100, 17, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FMer%20man%20mu%C3%B1eco%20retro.webp?alt=media&token=141e543b-20a6-4f5d-ae00-c77ad31ba7cf'),
(5, 'Lion-o Original Super-7', 100900, 15, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FLion-o%20mu%C3%B1eco%20retro.webp?alt=media&token=50241cd0-dc53-4c35-8132-0391c43285a1'),
(6, 'Panthro Original Super-7', 92100, 10, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FPanthro%20mu%C3%B1eco%20retro.webp?alt=media&token=09425f5d-eb25-4929-825e-befc6d3552fd'),
(7, 'Tygro Original Super-7', 108100, 8, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FTygro%20mu%C3%B1eco%20retro.webp?alt=media&token=1ac97e0b-8e4b-4dce-a109-55adf4d3c966'),
(8, 'Mumm-ra Original Super-7', 99100, 5, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FMumm-ra%20mu%C3%B1eco%20retro.webp?alt=media&token=be33aa87-50c4-406b-8bae-bad43b815c0d'),
(9, 'Marty Mcfly Original', 95500, 5, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FMarty%20Mcfly%20mu%C3%B1eco%20retro.webp?alt=media&token=70b38db7-3106-469a-990a-9d20b504343a'),
(10, 'Doc Brown Original', 99925, 7, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FDoc%20Brown%20mu%C3%B1eco%20retro.webp?alt=media&token=10766447-2c65-4575-a85b-2c76336ef58f'),
(11, 'Delorean Original', 79590, 20, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FDelorean%20auto%20retro.png?alt=media&token=786c8c14-2f40-40ac-9cbb-8a99adbcfc6a'),
(12, 'Circuitos Del Tiempo Original', 40100, 12, 'https://firebasestorage.googleapis.com/v0/b/retro-machine-19b78.appspot.com/o/imagenes-productos%2FCircuito%20del%20tiempo%20retro.png?alt=media&token=b9f12dce-e6a1-4fab-9bc9-b4437400c3f3');

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
