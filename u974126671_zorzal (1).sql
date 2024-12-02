-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 04:18:04
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
-- Base de datos: `u974126671_zorzal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `imagen_url` longtext NOT NULL,
  `rubroLocal` varchar(20) NOT NULL,
  `ubicacionLocal` varchar(50) NOT NULL,
  `codUsuario` int(10) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL COMMENT '1: activo\r\n0: dado de baja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `descripcion`, `imagen_url`, `rubroLocal`, `ubicacionLocal`, `codUsuario`, `estado`) VALUES
(2, 'BurgerKin', '', 'https://cdn.iconscout.com/icon/free/png-256/free-hamburguesa-2664522-2208951.png?f=webp', 'Comida', 'Por alla', 0, 1),
(9, 'ascsac', '', '../Imagenes/Locales/img_674b710f30ca49.07408944.png', 'Óptica', 'efwe', 2, 1),
(10, 'ascsac', '', '../Imagenes/Locales/img_674b71df8ef758.66790509.png', 'Óptica', 'efwef', 2, 1),
(11, 'sussi', '', '../Imagenes/Locales/img_674b7357ae4640.63588625.png', 'Comida', 'efwef', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `codigo` int(11) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `tipoCliente` enum('inicial','medium','premium') NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`codigo`, `texto`, `fechaDesde`, `fechaHasta`, `tipoCliente`, `estado`) VALUES
(1, 'Carnaval de Fuego', '2024-12-07', '2025-01-31', 'inicial', 0),
(2, '10% descuento ', '2024-11-01', '2024-11-24', 'inicial', 1),
(3, 'Carnaval del Agua', '2024-11-08', '2024-11-21', 'premium', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `categoriaMin` enum('inicial','medium','premium') NOT NULL,
  `diasValidos` varchar(7) NOT NULL COMMENT 'DLMMJVS\r\n(dias validos: 1)\r\n(dias no valid: 0)\r\n(de domingo a sabado)',
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `estadoPromo` enum('aprobada','pendiente','denegada') NOT NULL COMMENT '''aprobada'', ''pendiente'', ''denegada''',
  `codLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `nombre`, `descripcion`, `categoriaMin`, `diasValidos`, `fechaDesde`, `fechaHasta`, `estadoPromo`, `codLocal`) VALUES
(1, 'viernes negro', 'esta es una promo', 'inicial', '1111111', '2024-11-21', '2024-12-11', 'pendiente', 10),
(2, 'hora feliz', 'Descripción de la Promoción 2', 'inicial', '1111111', '2024-02-01', '2024-12-30', 'aprobada', 10),
(3, 'jajas day', 'Descripción de la Promoción 3', 'inicial', '1111111', '2024-03-01', '2024-12-30', 'aprobada', 10),
(4, 'promo cuatro', 'Descripción de la Promoción 4', 'medium', '1111111', '2024-01-01', '2024-12-31', 'aprobada', 10),
(8, 'promo especial', 'venta zapatillas 2x1', 'premium', '1011011', '2024-11-05', '2024-12-21', 'aprobada', 11),
(10, 'super promo', '2x1 en comida', 'inicial', '1111111', '2024-11-08', '2024-12-05', 'aprobada', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registracion`
--

CREATE TABLE `registracion` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contraseña` char(255) NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL,
  `tipoCliente` enum('inicial','medium','premium') NOT NULL COMMENT '''inicial'', ''medium'', ''premium''',
  `estadoDueño` enum('pendiente','rechazado','aceptado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registracion`
--

INSERT INTO `registracion` (`codigo`, `usuario`, `contraseña`, `tipoUsuario`, `tipoCliente`, `estadoDueño`) VALUES
(1, 'nicomazzaglia2005@gmail.com', '$2y$10$nPeuy3.3l1Rt49Yqf8w3buMFDIhsYf.gwmiVRu/uW.C17rJBX/19.', 'administrador', '', NULL),
(2, 'pepe@gmail.com', '$2y$10$8i8ymb22HpcJm4i0aOkpmuwC6sAgxXgLuok7s30NHk0/u/EIXaL4e', 'dueño', '', 'pendiente'),
(3, 'cliente@gmail.com', '$2y$10$wDusQOKGnQDKIG1PnMqtWuLAWAFGoh9m9U2qOGEG4uJvN/qgeHfWm', 'usuario', 'inicial', NULL),
(4, 'a@gmail.com', '$2y$10$4.52kQ6SYES5OnZD.OIYUuZTROfHKBkiaLud1lkrglUWjLwjBsM7C', 'usuario', 'premium', NULL),
(5, 'c@gmail.com', '$2y$10$.4w/f..RZuLPeY6PCx45EOQ4GlerNh9HbWqqiTOJqqs8E4CZ/o1cu', 'usuario', 'inicial', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usopromociones`
--

CREATE TABLE `usopromociones` (
  `codCliente` int(11) NOT NULL,
  `codPromo` int(11) NOT NULL,
  `fechaUso` date NOT NULL DEFAULT current_timestamp() COMMENT 'current_time',
  `estado` enum('enviada','aceptada','rechazada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usopromociones`
--

INSERT INTO `usopromociones` (`codCliente`, `codPromo`, `fechaUso`, `estado`) VALUES
(3, 1, '2024-11-24', 'rechazada'),
(3, 2, '2024-11-23', 'rechazada'),
(3, 3, '2024-11-23', 'aceptada'),
(3, 4, '0000-00-00', 'enviada'),
(3, 5, '2024-11-27', 'enviada'),
(3, 7, '2024-11-27', 'enviada'),
(4, 7, '2024-11-27', 'enviada'),
(4, 1, '2024-12-01', 'enviada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registracion`
--
ALTER TABLE `registracion`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registracion`
--
ALTER TABLE `registracion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
