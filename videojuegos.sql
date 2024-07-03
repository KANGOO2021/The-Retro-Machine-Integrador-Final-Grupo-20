-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2024 a las 04:23:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `año_lanzamiento` text(4) NOT NULL,
  `link_juego` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `nombre`, `año_lanzamiento`, `link_juego`, `imagen`) VALUES
(1, 'Super Mario Bros', '1985', 'https://vimm.net/vault/?p=play&id=834', '../img/Videojuegos/Super Mario Bros.png'),
(2, 'Pac-Man', '1981', 'https://vimm.net/vault/?p=play&id=91396', '../img/Videojuegos/Pac-Man.png'),
(3, 'Donkey Kong', '1981', 'https://vimm.net/vault/?p=play&id=257', '../img/Videojuegos/Donkey Kong.png'),
(4, 'Pitfall!', '1982', 'https://vimm.net/vault/?p=play&id=91061', '../img/Videojuegos/Pitfall!.png'),
(5, 'Tetris', '1984', 'https://vimm.net/vault/?p=play&id=880', '../img/Videojuegos/Tetris.png'),
(6, 'Bubble Bobble', '1986', 'https://vimm.net/vault/?p=play&id=75578', '../img/Videojuegos/Bubble Bobble.png'),
(7, 'Outrun', '1986', 'https://vimm.net/vault/?p=play&id=2227', '../img/Videojuegos/OutRun.png'),
(8, '1942', '1984', 'https://vimm.net/vault/?p=play&id=4', '../img/Videojuegos/1942.png'),
(9, 'Sonic The Hedgehog', '1991', 'https://vimm.net/vault/?p=play&id=84133', '../img/Videojuegos/Sonic The Hedgehog.png'),
(10, 'Mortal Kombat 2', '1993', 'https://vimm.net/vault/?p=play&id=83998', '../img/Videojuegos/MortalKombat2.png'),
(11, 'Street Fighter 2', '1994', 'https://vimm.net/vault/?p=play&id=2385', '../img/Videojuegos/Street Fighter 2.png'),
(12, 'DOOM', '1993', 'https://vimm.net/vault/?p=play&id=41503', '../img/Videojuegos/DOOM.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`);
COMMIT;

ALTER TABLE `videojuegos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
