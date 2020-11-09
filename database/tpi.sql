-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2020 a las 21:10:32
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'San Miguel'),
(2, 'Usulutan'),
(3, 'La Paz'),
(4, 'Cabañas'),
(5, 'San Vicente'),
(6, 'Sonsonate'),
(7, 'San Salvador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(20) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `id_departamento`) VALUES
(1, 'Chinameca', 1),
(2, 'El Tránsito', 1),
(3, 'Usulutan', 2),
(4, 'Berlín', 2),
(5, 'Jerusalén', 3),
(6, 'Zacatecoluca', 3),
(7, 'Cinquera', 4),
(8, 'Sensuntepeque', 4),
(9, 'Apastepeque', 5),
(10, 'Guadalupe', 5),
(11, ' Acajutla', 6),
(12, 'Caluco', 6),
(13, 'Guazapa', 7),
(14, 'Ilopango', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `user_usuario` varchar(30) NOT NULL,
  `rol_usuario` varchar(15) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_colonia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `user_usuario`, `rol_usuario`, `id_departamento`, `id_municipio`, `id_colonia`) VALUES
(1, 'Enrique Antonio', 'Mendez Caceres ', 'Mendez101', 'Administrador', 2, 4, 'Satelite '),
(2, 'Brian Steve', 'Rodas Hernandez ', 'Dark_Snake', 'Administrador', 2, 4, 'Las Parras '),
(3, 'Edgar Antonio ', 'Reyes Ceron', 'King30', 'Administrador', 2, 4, 'Terra nova '),
(4, 'Keny Lisbeth ', 'Chávez Torres', 'Sarca28', 'Moderador', 2, 4, 'El Mozote'),
(5, 'Javier Alexander ', 'Morales Melara', 'JavaLorant', 'Administrador', 2, 4, 'Peralta'),
(6, 'Leo Messi', 'Torres ', 'La_Pulga', 'Administrador', 2, 4, 'Barcelona'),
(7, 'Alejandro Carlos', 'Martinez', 'Alecam', 'Administrador', 2, 4, 'Guadalupe '),
(8, 'Carlos Mario ', 'Perez', 'Carlo_30', 'Administrador', 2, 4, 'Leyba'),
(9, 'Madelyn Nicol', 'Reyes ', 'Nicolss', 'Administrador', 2, 4, 'Los Naranjos'),
(10, 'Monica Paola', 'Salamanca', 'Moni_Flow', 'Administrador', 2, 4, 'Las Cruzetas'),
(11, 'Alan Agustín.', 'Marquez', 'Marquesito', 'Moderador', 1, 2, 'Jardines '),
(12, 'Alexandra Anselmo ', 'Villatoro', 'Toro', 'Moderador', 1, 2, 'La Seiba '),
(13, 'Angel Diego', 'Hidalgo', 'Arcangel', 'Invitado', 1, 1, 'La Suiza'),
(14, 'Araceli Artemisa', 'Soto', 'Zodiaco', 'Moderador', 1, 1, 'Palacio'),
(15, 'Amadeo Aquiles', 'Ferrufino', 'Kilos10', 'Moderador', 1, 2, 'El Paso'),
(16, 'Ruth Silvana', 'García', 'Mother', 'Invitado', 3, 5, 'Moreira '),
(17, 'Luis Fernando', 'Guzman', 'Guzmay', 'Invitado', 4, 7, 'Jerusalen'),
(18, 'Pablo Yamild', 'Morelia', 'Yamilis83', 'Invitado', 5, 9, 'La Poza'),
(19, 'Daniela Ivette', 'Querétaro', 'Quere102', 'Invitado', 6, 12, 'El Cocal '),
(20, 'Zamora Peinado', 'Gomez', 'Zamora20', 'Invitado', 7, 13, 'Maferrer');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_municipio` (`id_municipio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
