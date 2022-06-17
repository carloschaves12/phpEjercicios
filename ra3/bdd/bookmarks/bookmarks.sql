-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2022 a las 02:06:43
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bookmarks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `bm_url` varchar(265) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `bm_url`, `descripcion`, `idUsuario`, `datetime`) VALUES
(3, 'https://www.php.net/manual/es/function.str-replace.php', 'documentacion remplazar cadenas php', 2, '2022-06-02 18:45:51'),
(4, 'https://felipe.lavin.blog/2014/10/08/trabajar-con-fechas-en-mysql/', 'prueba', 2, '2022-06-15 18:52:17'),
(5, 'https://felipe.lavin.blog/2014/10/08/trabajar-con-fechas-en-mysql/', 'prueba', 2, '2022-06-08 18:52:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(16) NOT NULL,
  `nombre` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `psw` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `bloqueado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `psw`, `email`, `perfil`, `bloqueado`) VALUES
(1, 'carlos', 'carlos', 'carlos1', 'carlos@gmail.com', 'admin', 1),
(2, 'carlos1', 'carlos1', 'carlos1', 'carlos1@gmail', 'usuario', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
