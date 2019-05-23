-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2019 a las 04:25:44
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `victimas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sede` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `sede`, `area`, `nombre`, `apellido`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'xul27@hotmail.com', 'LINCOLN', 'DIRECTORA', 'Super', 'Admin', NULL, '$2y$10$UKbaGGlhm83VwT10vAeAE.B541vSz6fsStP4brZES3ouR6CxIly2e', 'Lp1lBHYz2FPjyQbZXGRXYVF1IOiIdsh4CuxLIeTefHAYi8ahnegTRxFvLSX5', '2019-02-20 22:35:26', '2019-02-20 22:35:26'),
(2, 'VEROBINCAZ@hotmail.com ', 'LA PLATA', 'DIRECTORA PROVINCIAL', 'Veronica Haydeé', 'BINCAZ ', NULL, '$2y$10$UKbaGGlhm83VwT10vAeAE.B541vSz6fsStP4brZES3ouR6CxIly2e', 'Mm8kqZyaxQOTXrZMEu4dBqmCkN95ngdf0mLEtDLtrPoAgE6yoItTWMpEsmhq', NULL, NULL),
(3, 'cpvgralviamonte@hotmail.com', 'LA PLATA', 'PSICÓLOGA', 'María Belén', 'TAGLIAFERRO', NULL, '$2y$10$UKbaGGlhm83VwT10vAeAE.B541vSz6fsStP4brZES3ouR6CxIly2e', 'Zgrs91tT3IH6F8SqSvg9HzBjUjkyEVGaNPt5e2w6LP6HD6TrHf4Ixw76hTE2', NULL, NULL),
(4, 'calder07@gmail.com', 'TANDIL', 'DIRECTORA', 'Super', 'Admin', NULL, '$2y$10$UKbaGGlhm83VwT10vAeAE.B541vSz6fsStP4brZES3ouR6CxIly2e', 'Zgrs91tT3IH6F8SqSvg9HzBjUjkyEVGaNPt5e2w6LP6HD6TrHf4Ixw76hTE2', '2019-02-20 22:35:26', '2019-02-20 22:35:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
