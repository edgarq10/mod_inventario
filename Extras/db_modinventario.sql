-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2018 a las 14:21:12
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_modinventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes_productos`
--

CREATE TABLE `ajustes_productos` (
  `id_ajuste` int(11) NOT NULL,
  `numero_ajuste` varchar(9) NOT NULL,
  `motivo_ajuste` varchar(150) NOT NULL,
  `fecha_ajuste` date NOT NULL,
  `estado_impresion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('edgar10_09@hotmail.com', '$2y$10$CBOh1ylB4YG1yg5FoAV0peULjFzKIXbiWCkY4Y539FWs32uCnE/He', '2018-01-25 03:59:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pro` int(11) NOT NULL,
  `codigo_pro` varchar(8) NOT NULL,
  `nombre_pro` varchar(50) NOT NULL,
  `descripcion_pro` varchar(100) DEFAULT NULL,
  `iva_pro` tinyint(1) NOT NULL COMMENT '1=Si; 2=No',
  `costo_pro` decimal(6,0) NOT NULL,
  `pvp_pro` decimal(6,0) NOT NULL,
  `estado_pro` char(1) NOT NULL DEFAULT 'A' COMMENT 'A=Activo; I=Inactivo	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pro`, `codigo_pro`, `nombre_pro`, `descripcion_pro`, `iva_pro`, `costo_pro`, `pvp_pro`, `estado_pro`) VALUES
(1, 'pro100', 'aceite', 'aceitesdfghgfd', 1, '10', '15', 'A'),
(2, 'sdfg', 'sdfg', 'sdfg', 1, '34', '56', 'A'),
(3, '2454', 'atunfggfdfghjhgfd333', 'atunndndnfghjsdd', 1, '23', '23', 'A'),
(4, 'sdf', 'sdf', 'sdf', 1, '345', '34', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipoUsu` int(5) NOT NULL,
  `nombre_tipoUsu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipoUsu`, `nombre_tipoUsu`) VALUES
(1, 'Administrador'),
(2, 'Bodeguero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `cedula` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tipoUsu` int(5) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `ciudadNac` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '' COMMENT 'A = Activo; I=Inactivo',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cedula`, `id_tipoUsu`, `name`, `fechaNac`, `ciudadNac`, `direccion`, `telefono`, `estado`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '1003628615', 1, 'Edgar Quezada', '2018-01-17', 'Loja', 'Ibarra', '0978828827', 'A', 'edgar10_09@hotmail.com', '$2y$10$MOVtYu/Nnqm8pi864PTxi.PoEtwReesx/oyeFAzFf0Con/NLIYRMW', 'jZYE6McYe9A4MRmdBsKjZWsn3vZhejoEpPRJx5rH1i2OZX3pGri5vQvyeTuw', '2018-01-17 18:49:15', '2018-01-17 18:49:15'),
(4, '1003628615', 2, 'Maritza', '2018-01-17', 'Ibarra', 'Ibarra', '0978828827', 'I', 'm@gmail.com', '$2y$10$OJbnTFoWbuTsGGljmaWGF.cGQpRNBbkqJP5ShIBn6r6sfRz.GERnW', NULL, '2018-01-17 18:51:17', '2018-01-17 18:51:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajustes_productos`
--
ALTER TABLE `ajustes_productos`
  ADD PRIMARY KEY (`id_ajuste`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipoUsu`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USUARIOS_REFERENCE_TIPO_USU` (`id_tipoUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajustes_productos`
--
ALTER TABLE `ajustes_productos`
  MODIFY `id_ajuste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_USUARIOS_REFERENCE_TIPO_USU` FOREIGN KEY (`id_tipoUsu`) REFERENCES `tipo_usuario` (`id_tipoUsu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
