-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-06-2024 a las 16:50:56
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
-- Base de datos: `retro_machine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id_movie` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `calificacion` varchar(20) NOT NULL,
  `año` smallint NOT NULL,
  `director` varchar(30) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id_movie`, `nombre`, `descripcion`, `genero`, `calificacion`, `año`, `director`, `imagen`, `link`) VALUES
(33, 'Volver al futuro', 'El adolescente Marty McFly es amigo de Doc, un científico que ha construido una máquina del tiempo. Cuando los dos prueban el artefacto, un error fortuito hace que Marty llegue a 1955, año en el que sus padres iban al instituto y todavía no se habían conocido. Después de impedir su primer encuentro, Marty deberá conseguir que se conozcan y se enamoren, de lo contrario su existencia no sería posible', 'Ciencia Ficción', 'ATP', 1981, 'Robert Zemeckis', '../img/peliculas/movie33.webp', 'https://www.youtube.com/watch?v=ceMf9xtDA6U'),
(34, 'Los cazadores del arca perdida', 'El arqueólogo Indiana Jones necesita encontrar el Arca de la Alianza, una reliquia bíblica que contiene los Diez Mandamientos y que convierte en invencible a su poseedor. Jones deberá adelantarse a los nazis, quienes también buscan el Arca.', 'aventura', 'ATP', 1981, 'Steven Spielberg', '../img/peliculas/6677a621bcd73.webp', 'https://www.youtube.com/watch?v=ceMf9xtDA6U'),
(37, 'Star Wars El retorno de Jedi', 'Luke Skywalker, ahora un experimentado caballero Jedi, intenta descubrir la identidad de Darth Vader.', 'ciencia ficcion', 'ATP', 1983, 'Richard Marquand', '../img/peliculas/6678c518bacb2.webp', 'https://www.youtube.com/watch?v=Q4xMJxTaToQ'),
(38, 'E.T.', 'Un pequeño extraterrestre de otro planeta queda abandonado en la Tierra cuando su nave se olvida de él. Está completamente solo y asustado hasta que Elliott, un niño de nueve años, lo encuentra y decide esconderlo en su casa para protegerlo. El chico y sus hermanos intentarán encontrar la forma de devolver al extraterrestre a su planeta antes de que lo encuentren los científicos y la policía.', 'ciencia ficcion', 'ATP', 1982, 'Steven Spielberg', '../img/peliculas/6678c52cb4f32.jpg', 'https://www.youtube.com/watch?v=p4vSher2e3A'),
(39, 'The Terminator', 'En el año 2029 las máquinas dominan el mundo. Los rebeldes que luchan contra ellas tienen como líder a John Connor, un hombre que nació en los años ochenta. Para eliminarlo y así acabar con la rebelión, las máquinas envían al pasado el robot Terminator con la misión de matar a Sarah Connor, la madre de John, e impedir así su nacimiento. Sin embargo, un hombre del futuro intentará protegerla', 'ciencia ficcion', '13', 1984, 'James Cameron', '../img/peliculas/66778b118dc1c.jpeg', 'https://www.youtube.com/watch?v=k64P4l2Wmeg&t=55s'),
(40, 'Karate Kid', 'Daniel llega a Los Ángeles de la costa este y enfrenta la difícil tarea de hacer nuevos amigos. Sin embargo, se convierte en el blanco del acoso de los Cobras, una amenazadora pandilla de estudiantes de karate, cuando inicia una relación con Ali, la ex novia del líder de los Cobras. Deseoso de defenderse e impresionar a su nueva novia, pero temeroso de enfrentar a la peligrosa pandilla, Daniel le pide a su conserje Miyagi, un maestro de las artes marciales, que le enseñe karate', 'accion', 'ATP', 1984, 'John G. Avildsen', '../img/peliculas/66778bd34b48d.jpg', 'https://www.youtube.com/watch?v=r_8Rw16uscg'),
(41, 'La historia sin fin', 'Un día, Bastian entra a una librería donde encuentra un misterioso libro que a pesar de las advertencias del dueño, decide leerlo. Es entonces cuando Bastian se introduce en un mundo fantástico, repleto de seres extraordinarios', 'fantasia', 'ATP', 1984, 'Wolfgang Petersen', '../img/peliculas/66778c3b22764.jpg', 'https://www.youtube.com/watch?v=jKWGgvs_Agk'),
(42, 'Los cazafantasmas', 'Al quedarse en paro, tres doctores en parapsicología crean una empresa para limpiar Nueva York de ectoplasmas. Mítica comedia a cargo de Ivan Reitman', 'ciencia ficcion', '13', 1984, 'Ivan Reitman', '../img/peliculas/66778cb18ea34.webp', 'https://www.youtube.com/watch?v=wQAljlSmjC8'),
(43, 'Gremlins', 'Un viajante busca un regalo especial para su hijo y encuentra uno en una tienda de Chinatown. El dueño de la tienda es reacio a venderle el \"mogwai\", una tierna pero extraña criatura. Finalmente el hombre accede a venderle la criatura con la advertencia de que para cuidarlo debe seguir tres normas: no exponerlo a la luz del sol, no darle de comer después de medianoche y no mojarlo. Sin embargo, todo se tuerce cuando las tres reglas básicas son infringidas una tras otra.', 'ciencia ficcion', 'ATP', 1984, 'Joe Dante', '../img/peliculas/66778d11d4dbe.jpg', 'https://www.youtube.com/watch?v=BNBO0TGm5lM'),
(44, 'Volver al futuro 2', 'Doc vuelve a aparecer con una máquina del tiempo mucho más modernizada y le pide a Marty y a su novia que le acompañen al futuro. En el Hill Valley de 2015 deberán solucionar un problema con la ley que tendrá uno de los futuros hijos de Marty y Jenny. En el futuro, Biff Tannen roba la máquina del tiempo y vuelve al pasado para darle a su hijo un libro con estadísticas deportivas para poder ganar una enorme fortuna en las apuestas. Marty y Doc tendrán que parar la posible catástrofe del destino.', 'ciencia ficcion', 'ATP', 1989, 'Robert Zemeckis', '../img/peliculas/66778d5ccdde7.webp', 'https://www.youtube.com/watch?v=ixLXR27eGCw&t=79s'),
(45, 'Los cazafantasmas 2', 'Cinco años después de salvar a la ciudad de Nueva York, los Cazafantasmas han pasado al olvido. Aunque ya nadie parece necesitar sus servicios, algunos de sus integrantes intentan mantener viva la organización.', 'ciencia ficcion', '13', 1989, 'Ivan Reitman', '../img/peliculas/66778dc52e2f0.webp', 'https://www.youtube.com/watch?v=weIqC-oUGmA'),
(46, 'Rambo I', 'John Rambo es un veterano boina verde que luchó en Vietnam. Un día va a visitar a un viejo amigo del ejército pero se entera de que ha muerto. Algunos días después, la policía lo detiene por vagabundo y se enseña con él. En ese momento, John recuerda los terrores y las torturas que sufrió durante la guerra de Vietnam y reacciona violentamente', 'accion', '13', 1982, 'Ted Kotcheff', '../img/peliculas/66778e1ed4e18.jpg', 'https://www.youtube.com/watch?v=BBccpoudeCc'),
(47, 'Volver al Futuro 3', 'Marty McFly sigue en 1955 y Doc ha retrocedido al año 1885, la época del salvaje oeste. Marty recibe una carta de Doc en la que le informa de que la máquina del tiempo está averiada y no puede volver al presente, pero que no le importa seguir en el pasado. Sin embargo, Marty descubre una tumba en la que lee que Doc murió en 1885 y decide ir a rescatar a su amigo', 'ciencia ficcion', 'ATP', 1990, 'Robert Zemeckis', '../img/peliculas/66778e7995f4f.webp', 'https://www.youtube.com/watch?v=3C8c3EoEfw4'),
(48, 'Robocop', 'Un grupo de científicos utiliza los restos destrozados de un policía muerto para crear al mejor luchador contra el crimen: un robot indestructible. El experimento parece un éxito, pero el policía, a pesar de estar muerto, conserva la memoria y decide vengarse de sus asesinos', 'accion', '13', 1987, 'Paul Verhoeven', '../img/peliculas/66778edd81952.jpg', 'https://www.youtube.com/watch?v=gxJ3trgIsZ4'),
(49, 'Batman', 'El caballero oscuro conocido como Batman defiende a la corrupta e insegura ciudad de Gotham de su enemigo principal, un payaso homicida conocido como Joker.', 'accion', '13', 1989, 'Tim Burton', '../img/peliculas/66778f74187a5.webp', 'https://www.youtube.com/watch?v=dgC9Q0uhX70'),
(50, 'Rocky 2', 'Tras la dura pelea contra Apollo Creed y el embarazo de Adrien, Rocky ha colgado los guantes de boxeo. Sin embargo, su ingenuidad a la hora de llevar las finanzas le deja a él y a su familia en una situación difícil, por lo que considera aceptar la oferta de revancha de Apollo para una segunda pelea. Reticente, acepta cuando éste le llama cobarde, a pesar de las negativas de Adrien, quien teme que la pelea pueda acabar con el ya retirado Rocky', 'drama', '13', 1980, 'Sylvester Stallone', '../img/peliculas/66778fdc6979e.jpg', 'https://www.youtube.com/watch?v=A2P9ATb9Qx8'),
(53, 'La guerra de las galaxias', 'La nave en la que viaja la princesa Leia es capturada por las tropas imperiales al mando del temible Darth Vader. Antes de ser atrapada, Leia consigue introducir un mensaje en su robot R2-D2, quien acompañado de su inseparable C-3PO logran escapar. Tras aterrizar en el planeta Tattooine son capturados y vendidos al joven Luke Skywalker, quien descubrirá el mensaje oculto que va destinado a Obi Wan Kenobi, maestro Jedi a quien Luke debe encontrar para salvar a la princesa.', 'ciencia ficcion', 'ATP', 1980, 'George Lucas', '../img/peliculas/pelicula.jpg', 'https://youtu.be/IS9G-Xppa2w');

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
  MODIFY `id_movie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
