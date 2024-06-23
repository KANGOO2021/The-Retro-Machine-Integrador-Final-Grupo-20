-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-06-2024 a las 00:15:06
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `retromachine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id_movie` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genero` varchar(15) NOT NULL,
  `calificacion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `año` smallint NOT NULL,
  `director` varchar(30) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id_movie`, `nombre`, `descripcion`, `genero`, `calificacion`, `año`, `director`, `imagen`, `link`) VALUES
(29, 'La guerra de las galaxias', 'Su trama describe las vivencias de un grupo de personajes que habitan en una galaxia ficticia e interactúan con elementos como «la Fuerza», un campo de energía metafísico y omnipresente que posee un «lado luminoso» impulsado por la sabiduría, la nobleza y la justicia y utilizado por los Jedi, y un «lado oscuro» usado por los Sith y provocado por la ira, el miedo, el odio y la desesperación', 'ciencia_ficcion', 'ATP', 1980, 'George Lucas', 'img/peliculas/6677408a576fe.jpg', 'https://www.youtube.com/watch?v=1g3_CFmnU7k&pp=ygUWc3RhciB3YXJzIDE5NzcgdHJhaWxlcg%3D%3D'),
(33, 'Volver al futuro', 'El adolescente Marty McFly es amigo de Doc, un científico que ha construido una máquina del tiempo. Cuando los dos prueban el artefacto, un error fortuito hace que Marty llegue a 1955, año en el que sus padres iban al instituto y todavía no se habían conocido. Después de impedir su primer encuentro, Marty deberá conseguir que se conozcan y se enamoren, de lo contrario su existencia no sería posible', 'ciencia_ficcion', 'ATP', 1985, 'Robert Zemeckis', 'img/peliculas/667733f9e145e.webp', 'https://www.youtube.com/watch?v=ceMf9xtDA6U'),
(34, 'Los cazadores del arca perdida', 'El arqueólogo Indiana Jones necesita encontrar el Arca de la Alianza, una reliquia bíblica que contiene los Diez Mandamientos y que convierte en invencible a su poseedor. Jones deberá adelantarse a los nazis, quienes también buscan el Arca.', 'aventura', 'ATP', 1981, 'Steven Spielberg', 'img/peliculas/667742bc369d9.webp', 'https://www.youtube.com/watch?v=ceMf9xtDA6U');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movie`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
