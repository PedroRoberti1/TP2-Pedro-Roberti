-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 14:16:59
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crackwatch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Imagen` varchar(1000) NOT NULL,
  `Estado` varchar(255) NOT NULL,
  `Crack_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `Nombre`, `Imagen`, `Estado`, `Crack_by`) VALUES
(1, 'BULLY', '1666092120_MV5BYTQ5NWM4ZDgtZTFhZS00YzQwLWI5OWMtZjVlYTdhZGM4ZGNiXkEyXkFqcGdeQXVyMTA0MTM5NjI2._V1_FMjpg_UX1000_.jpg', 'Crackeado', 'Codex'),
(2, 'The evil within ', '1666092375_oW8ShmeCKapjXbHxjHUlmqB1.jpg', 'Crackeado', 'Varios'),
(3, 'Crash Bandicoot 4: It\'s About Time', '1666092464_503614131592840975.jpg', 'Crackeado', 'EMPRESS'),
(4, 'Resident Evil 3: Nemesis', '1666092255_d1f180fa101a0626298ee89ee37ab59d.jpg', 'Emulacion', 'Desconocido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `clave`) VALUES
(17, 'pedroroberti99@gmail.com', '$2y$10$gvlzl2JsZDWIfx7i4lOEU.6IFtjbogKGV1BuCvWrw1Eu2R7ccNE1u'),
(20, 'pedritonewells1@gmail.com', '$2y$10$kDHfJ.dfNX5n1AKHzMHV9.x46N8HBx24.rDD7tRob0Vjnesf9vse6'),
(21, 'SkayBeilinson@gmail.com', '$2y$10$9KacgrJAQIk6ax1da71f2.Bbqd2c8rmYUN06R/GJk.E4KWMudROzK'),
(22, 'MundoRedondo@gmail.com', '$2y$10$67VtMaRV/fDOri2BDVZHEeNyBh3B8MBwCaRbIeIJWG7O6AqflLHzu'),
(23, 'LobosueltoCorderoAtado@gmail.com', '$2y$10$0k7Hc5nGFMHztwARg0fSkuiGL5gqwvkBliq8ZbSGR2cGfZ3pxRL6W'),
(26, 'pedroroberti99@gmail.com', '$2y$10$B2bSfItuqByG81t2cNowU.wepGtup5tRsJUPp6I.BsKN38sgh6/TC'),
(27, 'gulp!1985@gmail.com', '$2y$10$PJd8CZE4V4YdZusbxCwC0O22zhVRoiAOXIsXXtzTvRjZdWA0Oqsem'),
(28, 'pedroroberti99@gmail.com', '$2y$10$I7/Qa45A48pfnNDMzXQTcOGNlgLCnE5K/tuISktSFhOvhcmzwsK1.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
