-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2025 a las 16:47:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- ------------------------------------------------------------------------------------------------------------
-- ------------------------------ INICIO ITred Spa Base de Datos blanquita_melipilla .SQL ---------------------
-- ------------------------------------------------------------------------------------------------------------

--
-- Base de datos: `blanquita_melipilla`
--

CREATE DATABASE IF NOT EXISTS `blanquita_melipilla` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `blanquita_melipilla`;

-- --------------------------------------------------------

-- --------------------------------------------------------------
-- --------Estructura de tabla para la tabla `productos`---------
-----------------------------------------------------------------

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `imagen_producto` varchar(255) DEFAULT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `precio_mayor` int(11) DEFAULT NULL,
  `producto_disponible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- ------------------------------------------------------------------------------------------------------------
-- ------------------------------ FIN ITred Spa Base de Datos blanquita_melipilla .SQL ------------------------
-- ------------------------------------------------------------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
