-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2019 a las 15:10:09
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NewPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sede` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `NewPass`, `sede`, `area`, `nombre`, `apellido`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'VEROBINCAZ@hotmail.com ', 'EjGMh3', 'LA PLATA', 'DIRECTORA PROVINCIAL', 'Veronica Haydeé', 'BINCAZ ', '2019-06-22 15:17:36', '$2y$10$Y26Gs6D9hgot/hsF.keHseGP26MzhIZuN2Y0OtdCszlA3n8AwRblG', '2nf4dnSjSILYqISzqYRLiTsjw6H6w6YF2vFIR1pt4VHcGKrVakkW1hsQriel', NULL, '2019-06-22 18:17:36'),
(2, 'lic.juanbombelli@gmail.com', 'pu2NvT', 'LA PLATA', 'DIRECTORA DE SEDES DECENTRALIZADAS', 'LUCIA', 'TEALDI', '2019-06-22 15:17:36', '$2y$10$f3xZD5FGptZjmt./av27wObv3LP55MovyFNXvL0EqG7kar2lxaf5e', NULL, NULL, '2019-06-22 18:17:36'),
(3, 'tealdi.lucia@gmail.com', 'uQ1Wb2', 'LA PLATA', 'DIRECTOR DE ASISTENCIA Y PROTECCIÓN A LA VÍCTIMA', 'Juan Ignacio', 'BOMBELLI', '2019-06-22 15:17:37', '$2y$10$KPtyqjpMw/xb3H/pzkpQNO8rq5rTR1rXX8ddDn/8WjLEl4/YLwIpu', NULL, NULL, '2019-06-22 18:17:37'),
(4, 'rominabenitezar@hotmail.com', 'XL0eY4', 'ALTE. BRWON', 'PSICÓLOGA', 'Romina', 'BENITEZ', '2019-06-22 15:17:37', '$2y$10$pwaGmw2hFddE3S41MDoDW.Xbv5e9M3OLDKXAj8YkbpUUJEsk5fUAu', NULL, NULL, '2019-06-22 18:17:37'),
(5, 'veritoapc@hotmail.com', 'vrsz0W', 'ALTE. BRWON', 'TRABAJADORA SOCIAL', 'Verónica', 'PEREZ  ', '2019-06-22 15:17:37', '$2y$10$5RgDuMCZy9cXECGzx8FhwebW4nHv7mQhFT7DzaLAKSLuH8y0BAV9q', NULL, NULL, '2019-06-22 18:17:37'),
(6, 'norbertoricco@hotmail.com', 'D3cbiF', 'ALTE. BRWON', 'ABOGADO', 'Norberto', 'RICCO ', '2019-06-22 15:17:38', '$2y$10$s5aSj3c1rp.AYYs5WrdXf..N9x7fy0dJ09jfHW3kR97fq0IyuNdky', NULL, NULL, '2019-06-22 18:17:38'),
(7, 'mflorencia_aramburu@hotmail.com', 'EyoFap', 'AZUL', 'ABOGADA', 'María Florencia', 'ARAMBURU', '2019-06-22 15:17:38', '$2y$10$a6neg9guV56DDQRwRv61kO.sr19IeTkS8evYzkiPLRQC1PntnR37.', NULL, NULL, '2019-06-22 18:17:38'),
(8, 'josefina.casado@gmail.com', '90dTYp', 'AZUL', 'PSICÓLOGA', 'Josefina', 'CASADO', '2019-06-22 15:17:39', '$2y$10$c3SPvrSQ1eF4uiT1XdQih.lLWwTo7bU/Ui75vfMVPNkx9qZmiXaTG', NULL, NULL, '2019-06-22 18:17:39'),
(9, 'jime_ciappina@hotmail.com', 'Uj7Klh', 'AZUL', 'TRABAJADORA SOCIAL', 'María Jimena', 'CIAPPINA', '2019-06-22 15:17:39', '$2y$10$Qo5coZXUlP4MOxjpKToGT.s.oO3KxnSQkki8VFaPWdbn3iC.SFKpa', NULL, NULL, '2019-06-22 18:17:39'),
(10, 'ignaciobarsellini@estudiobarsellini.com', 'TmkDxX', 'BAHIA BLANCA', 'ABOGADO', 'Ignacio Armando', 'BARSELLINI', '2019-06-22 15:17:39', '$2y$10$KFdH8OSxHMsRKybtpMgZ7uxfdtc2y0sCiYh2yoSY/nuLXinb7tIs6', NULL, NULL, '2019-06-22 18:17:39'),
(11, 'iglesiabraun@hotmail.com.ar', 'f4s2MK', 'BAHIA BLANCA', 'ADMINISTRATIVO', 'Martín', 'IGLESIA', '2019-06-22 15:17:40', '$2y$10$WnrLqITCMoKXgTl.MMxpSe.MHZMLsUZNXpJDXJ3gP/ucBh1xzHDMu', NULL, NULL, '2019-06-22 18:17:40'),
(12, 'catalinaotero.bblanca@gmail.com', '15bO9a', 'BAHIA BLANCA', 'PSICÓLOGA', 'Ana Catalina', 'OTERO D.', '2019-06-22 15:17:40', '$2y$10$Kncq/aTNLD1rtM2BRTWXKeyKD89h8Nq7eLFNXlZX0Hi91VIF6gcXS', NULL, NULL, '2019-06-22 18:17:40'),
(13, 'mariela_delf@hotmail.com', 'C3saP5', 'EZEIZA', 'TRABAJADORA SOCIAL', 'Mariela', 'FORNARI', '2019-06-22 15:17:41', '$2y$10$/SmPYjwvtXzwQguTlRfMyOIScNDoVrkn5PdLpDVALN8l/sl5wpn5G', NULL, NULL, '2019-06-22 18:17:41'),
(14, 'noeliadlombardo@gmail.com', 'Uovpif', 'EZEIZA', 'ABOGADA', 'Noelia', 'LOMBARDO', '2019-06-22 15:17:41', '$2y$10$/ayc6yDpB34sjzYYqpEHeeC7pF9JEwGuJvc/GCHcIeED6Nt7bQ6ay', NULL, NULL, '2019-06-22 18:17:41'),
(15, 'gmatthesius@hotmail.com', 'ivjbTq', 'EZEIZA', 'PSICÓLOGA', 'Gladys Mabel', 'MATTHESIUS', '2019-06-22 15:17:42', '$2y$10$zo3RXEbhyBWhk6Cv.qljRu/fDQAZX7jTe/ca14jmakTBmPPLujjlO', NULL, NULL, '2019-06-22 18:17:42'),
(16, 'cortes.m.soledad@gmail.com', 'pXrtBm', 'JOSE C. PAZ', 'ABOGADA', 'María Soledad', 'CORTES', '2019-06-22 15:17:42', '$2y$10$vAl8j3jrKw7a9B/K4hsOOuGiRKUXK3SC6UPib7Wg4oEn4sBx0e6LC', NULL, NULL, '2019-06-22 18:17:42'),
(17, 'alimichela@hotmail.com', 'JqVZvy', 'JOSE C. PAZ', 'PSICÓLOGA', 'Alicia', 'MICHELA', '2019-06-22 15:17:43', '$2y$10$vj/kFBIVg2MTsSsfA81GW.o0fina6s6RQvRczGe.tDRY0A2eEAfYm', NULL, NULL, '2019-06-22 18:17:43'),
(18, 'anabela_romero_03@hotmail.com', 'qbhxAp', 'JOSE C. PAZ', 'TRABAJADORA SOCIAL', 'Soledad Anabela', 'ROMERO', '2019-06-22 15:17:43', '$2y$10$8xgobL6VVKJwv.6dyd1syOoj6YxF9T9q1J6twOB3H1mLa6BywIm.2', NULL, NULL, '2019-06-22 18:17:43'),
(19, 'giuliettacuozzo@hotmail.com', 'ORXLnt', 'LA MATANZA', 'PSICÓLOGA', 'Giulietta', 'CUOZZO', '2019-06-22 15:17:43', '$2y$10$mW7rHsmSKgEObHp5pvoqsupcAy37jeGBNaDRUVPHIh2roujPHDZZy', 'kLnkx9mrqRMDY1X1v2Ea8Gvv68Ekpn6wvVD2uHZhMUnUT9fMzxEs17VnAh7R', NULL, '2019-06-22 18:17:43'),
(20, 'jecru@yahoo.com.ar', 'JUZWMf', 'LA MATANZA', 'TRABAJADORA SOCIAL', 'Jesica', 'CRUZ', '2019-06-22 15:17:44', '$2y$10$nakBJG/CL/ZhD/ck4RGyHuU6NMKixfRSmuhh5iR.lqfuclp0V6Fku', NULL, NULL, '2019-06-22 18:17:44'),
(21, 'agustina.iriondo@hotmail.es', 'crSU1x', 'LA MATANZA', 'PSICÓLOGA', 'AGUSTINA A.', 'IRIONDO', '2019-06-22 15:17:44', '$2y$10$xnm18kc2FpXpeaX6FukVyuVDAHvmc9QEUoqr9BiGxc2EZ8XgwSjte', NULL, NULL, '2019-06-22 18:17:44'),
(22, 'mariel_velazquez@hotmail.com.ar', 'CBj6U9', 'LA MATANZA', 'ABOGADA', 'Rafaela Mariel', 'Velazquez', '2019-06-22 15:17:44', '$2y$10$VVHUN7jRFaMGTgR5AVZClO07PAv3nr/wHGb9f6lg3Ex6.NQGr2fPm', NULL, NULL, '2019-06-22 18:17:44'),
(23, 'rjapecechea@gmail.com', 'xQpk0a', 'LA PLATA', 'ABOGADO', 'Jorge', 'APECECHEA', '2019-06-22 15:17:45', '$2y$10$lOOUYNgnU21txwl.QbpdGO5jOFXtRqtiOWeucm1rwEdFA9zIk48R.', NULL, NULL, '2019-06-22 18:17:45'),
(24, 'julietapsi@gmail.com', 'hLxu2w', 'LA PLATA', 'PSICÓLOGA', 'Julieta Anahí', 'ARAGUES', '2019-06-22 15:17:45', '$2y$10$7TGitCBC.hL5FVVk1aq6wuGW0aZeXAlpyFu5gomTA3uPKCY/Kyq6e', NULL, NULL, '2019-06-22 18:17:45'),
(25, 'veronica.ardohain76@gmail.com', 'B1hvTZ', 'LA PLATA', 'TRABAJADORA SOCIAL', 'Veronica Haydeé', 'ARDOHAIN', '2019-06-22 15:17:46', '$2y$10$OH2OHrF727vL/DwdbWarW.jjvvcADB2lloybuosdF8cfxt8RJprrq', NULL, NULL, '2019-06-22 18:17:46'),
(26, 'elbeca_81@hotmail.com', 'XamN16', 'LA PLATA', 'ADMINISTRATIVO', 'Agustín', 'BEJARANO', '2019-06-22 15:17:46', '$2y$10$vWDkOJdUSYaWlHvpOjfI..dPgVTytPDv96lXPDanbDEkf8VrlF15K', NULL, NULL, '2019-06-22 18:17:46'),
(27, 'maiacalabrese85@gmail.com', 'biIMV5', 'LA PLATA', 'EQUIPO DIRECCIÓN', 'Maia Yésica', 'CALABRESE', '2019-06-22 15:17:46', '$2y$10$9ePaFOUh/puOMmqSQxKUPeIErwe3AW6hQQsLoD95/hpIWIHJWReqO', NULL, NULL, '2019-06-22 18:17:46'),
(28, 'marialujancic@gmail.com', 'y8i0ta', 'LA PLATA', 'PSICÓLOGA', 'Maria Lujan', 'CICCONI', '2019-06-22 15:17:47', '$2y$10$YFoAjn1DUUGhHyl0VxZa6ewsTK3eV74qUGLgTx8NpbLMHDx5VY18y', NULL, NULL, '2019-06-22 18:17:47'),
(29, 'lu.comp1989@gmail.com', '36nbCt', 'LA PLATA', 'EQUIPO DIRECCIÓN', 'Lucia', 'COMPAGNUCCI', '2019-06-22 15:17:47', '$2y$10$5mlVy/ZYFnrFFXQ/DDKoXOfiCbvEL3YTEBbE.WCBklEkZyKLPE7Me', NULL, NULL, '2019-06-22 18:17:47'),
(30, 'rocuccia@hotmail.com', 'OkPDrM', 'LA PLATA', 'PSICÓLOGA', 'Rosario Leontina', 'CUCCIA', '2019-06-22 15:17:47', '$2y$10$MnbpwylhE7ttiAG3MupxSObbNruMMw/qJ7qxUsfuDJyjVK9.S0tri', NULL, NULL, '2019-06-22 18:17:47'),
(31, 'deandreisagustina@gmail.com', 'nHmFJ9', 'LA PLATA', 'ADMINISTRATIVA', 'Agustina Soledad', 'DE ANDREIS', '2019-06-22 15:17:48', '$2y$10$NVMyM5Kgx.o8bktxlQVv/eA8CUaaNXvOIWeljyClXo4ofjxVJtmOi', NULL, NULL, '2019-06-22 18:17:48'),
(32, 'ludeantoni@hotmail.com', 'QzTlLr', 'LA PLATA', 'ADMINISTRATIVA', 'Lucía', 'DE ANTONI', '2019-06-22 15:17:48', '$2y$10$is3KBj0zn5djRZ98TjsoruRY6NLX8k.wlF7reWrMY3HgWuiIJRvTW', NULL, NULL, '2019-06-22 18:17:48'),
(33, 'juanfdinardo@gmail.com', 'IWJFaq', 'LA PLATA', 'ABOGADO', 'Juan Francisco', 'DI NARDO', '2019-06-22 15:17:49', '$2y$10$laAtBg4VoI.ASHEmi3FwDO.kIFnnlRpRCOEbzfsnSSwDEFl1mc7z2', NULL, NULL, '2019-06-22 18:17:49'),
(34, 'carogassull@gmail.com', 'TSi7wM', 'LA PLATA', 'ADMINISTRATIVA', ' María Carolina', 'GASSULL', '2019-06-22 15:17:49', '$2y$10$kI2B8Da/3v0rM7ZqDaJeFu.BsxlWyjop7dwQ0eEY8QVGmcrwkpdjC', NULL, NULL, '2019-06-22 18:17:49'),
(35, 'andreagiacomino04@yahoo.com.ar', '9U1ioF', 'LA PLATA', 'PSICÓLOGA', 'Andrea Daniela', 'GIACOMINO', '2019-06-22 15:17:49', '$2y$10$2nlPRPkjUPFBwhwkF9EpMeRYBa/xfHzstN1UcixRTKCjhPNyE9hIK', NULL, NULL, '2019-06-22 18:17:49'),
(36, 'dantegiu@yahoo.com.ar', 'seaFck', 'LA PLATA', 'ADMINISTRATIVO', 'Dante Bautista', 'GUILIANI', '2019-06-22 15:17:50', '$2y$10$wTsaeSkGZ2sIyv7pxCWzdeb1K.1kyawGnnxe0QL0SFNtCIvaCub9S', NULL, NULL, '2019-06-22 18:17:50'),
(37, 'azul.labalta@gmail.com', '8OqP9x', 'LA PLATA', 'ABOGADA', 'Azul', 'LABALTA R.', '2019-06-22 15:17:50', '$2y$10$3lkte1iaV5SYV.bAj4M3neVqti2dSNZ3gTtWUTryXfeDwdtY5naqa', NULL, NULL, '2019-06-22 18:17:50'),
(38, 'MilagrosLuayza@hotmail.com', 'i4Svad', 'LA PLATA', 'ABOGADA', 'Milagros Aldana', 'LUAYZA T.', '2019-06-22 15:17:51', '$2y$10$vcPvfwPI0ujJsrFYHBAg0eRKtmJBZpPJWQT49DrE6Go0t9pqjm0Oy', NULL, NULL, '2019-06-22 18:17:51'),
(39, 'macloughlinmartin@gmail.com', 'i0xkPW', 'LA PLATA', 'ADMINISTRATIVO', 'Martín Darío', 'MAC LOUGHLIN', '2019-06-22 15:17:51', '$2y$10$nOiS4KDuOdlfXy1rd0M6guiMWuGwKQmJWD7d2B1/jfzF.UXIEfC4i', NULL, NULL, '2019-06-22 18:17:51'),
(40, 'lucianomac@gmail.com', 'VwU73Q', 'LA PLATA', 'PSICÓLOGO', 'Luciano', 'MACIEL', '2019-06-22 15:17:52', '$2y$10$jc83.nhzXmyycULcAW3jg.azGCn5qCpGRSKrtUYCZaT.8FkJyREA.', NULL, NULL, '2019-06-22 18:17:52'),
(41, 'slommac@hotmail.com', 'f12hJq', 'LA PLATA', 'ADMINISTRATIVO', 'Sebastián ', 'MACUCHO', '2019-06-22 15:17:52', '$2y$10$R3tNXTSQdzCiNQf6gZP5NO047ymp.jJ2D/RSA34SfdgiW6btN3wRm', NULL, NULL, '2019-06-22 18:17:52'),
(42, 'veropsicol@hotmail.com', 'mCOWNR', 'LA PLATA', 'PSICÓLOGA', 'Verónica Isabel', 'MARTINUZZI R.', '2019-06-22 15:17:52', '$2y$10$19ZveYifRXwLZYEN42dcruPJep8ieEXif7QYzEXAJtgQbEHHnfoS6', NULL, NULL, '2019-06-22 18:17:52'),
(43, 'silviomonti@gmail.com', 'QlcsfH', 'LA PLATA', 'PSICÓLOGO', 'Silvio Gabriel', 'MONTI', '2019-06-22 15:17:53', '$2y$10$DDyeHPj7dVv6XcpO.Jh9cewu3t4h2ucioZXznMRbdDSqcwymtFzy6', NULL, NULL, '2019-06-22 18:17:53'),
(44, 'agus_montone@hotmail.com', 'DCxwTq', 'LA PLATA', 'ADMINISTRATIVO', 'Agustín', 'MONTONE', '2019-06-22 15:17:53', '$2y$10$rdU1A6tjfl.VlauB5/YXMOYkNTgMNcroTpyYO5lLaHer11AF.nVaK', NULL, NULL, '2019-06-22 18:17:53'),
(45, 'elimorrone@gmail.com', 'YFuWx5', 'LA PLATA', 'PSICÓLOGO', 'Eliana Silvina', 'MORRONE', '2019-06-22 15:17:53', '$2y$10$1qabKqJFAGVenu7Bs8aHLOhzWvuydgcdIdvIFx9gLrDzDqqhMz8Mu', NULL, NULL, '2019-06-22 18:17:53'),
(46, 'lisandropanelli@gmail.com', '3nGkPf', 'LA PLATA', 'ABOGADO', 'Lisandro Ariel', 'PANELLI', '2019-06-22 15:17:54', '$2y$10$zt.tlh20D5gaJ3qxoALOq.jEMgSMygPyJ8qUxTc3yk958kxHf5ybO', NULL, NULL, '2019-06-22 18:17:54'),
(47, 'cuchipellegrini@hotmail.com', 'dJSWLx', 'LA PLATA', 'ADMINISTRATIVO', 'Héctor Rubén', 'PELLEGRINI', '2019-06-22 15:17:54', '$2y$10$uJklfQm0KPlW8jWeUO6W/ORvCqMx6/df5.PbrYpvhwk58w138kfb2', NULL, NULL, '2019-06-22 18:17:54'),
(48, 'guillerisso@hotmail.com', 'xcE3Kj', 'LA PLATA', 'PSICÓLOGA', 'Guillermina', 'RISSO', '2019-06-22 15:17:54', '$2y$10$nkcpXHD2Xw2xUvorORWU3uo93FXBGxjQlNhJ.ohuV4EQLi1GKis4G', NULL, NULL, '2019-06-22 18:17:54'),
(49, 'vaninaseminara@hotmail.com', 'KibtxR', 'LA PLATA', 'PSICÓLOGA', 'Vanina Eleonora', 'SEMINARA', '2019-06-22 15:17:55', '$2y$10$.abjmsCY4IGZ0NBbcJGz8.a7PBpcqqYkh2pPAtaQtz0Mx4BBp15x6', NULL, NULL, '2019-06-22 18:17:55'),
(50, 'patriciarack@gmail.com', 'AwntS5', 'LA PLATA', 'TRABAJADORA SOCIAL', 'M. PATRICIA', 'RACK', '2019-06-22 15:17:55', '$2y$10$WDO3WfangUB7AE5D9r40G.gFWKHp3sUDnAJgg84sn.YgIYTGA43j6', NULL, NULL, '2019-06-22 18:17:55'),
(51, 'valerinasoto12@gmail.com', 'Xn0lZG', 'LA PLATA', 'TRABAJADORA SOCIAL', 'Valeria', 'SOTO', '2019-06-22 15:17:55', '$2y$10$D/QGC/i3Jn7i0WmASKug6uOns0Iwp.77AV.TjUf3B9VjBNkatarOO', NULL, NULL, '2019-06-22 18:17:55'),
(52, 'cpvconsultadir@gmail.com', '9GhYtb', 'LA PLATA', 'ADMINISTRATIVA', 'Maria Guadalupe', 'SOSA', '2019-06-22 15:17:55', '$2y$10$RIpuJ45LtsFcc7rocYSRO.opQkv6algTuZau61n1vySwXqOtkYXWi', NULL, NULL, '2019-06-22 18:17:55'),
(53, 'candeservin@gmail.com', 'L2Refv', 'LA PLATA', 'PSICÓLOGA', 'María Candela', 'SERVIN', '2019-06-22 15:17:56', '$2y$10$QT8kPPYOTTFCeXXhoByXu.pkU5fuPOj6NEdvy4QAT7.GsuuddCT3q', NULL, NULL, '2019-06-22 18:17:56'),
(54, 'paustroppolo25@hotmail.com', '0Hi9Sb', 'LA PLATA', 'ADMINISTRATIVA', 'Paula', 'STROPPOLO', '2019-06-22 15:17:56', '$2y$10$JRXtQvgExUA8XbmRxRuL5eSINR6sHVHHADh2UclH6Yf2oqFwTrHtW', NULL, NULL, '2019-06-22 18:17:56'),
(55, 'meelinasulasguzman@gmail.com', 'oik8HS', 'LA PLATA', 'ADMINISTRATIVA', 'Jacqueline Melina', 'SULAS', '2019-06-22 15:17:56', '$2y$10$wyD901n/ZRKk5JAkVrxJee0JIdV47fzDMooYwY.0eOThAXhBILBAS', NULL, NULL, '2019-06-22 18:17:56'),
(56, 'alfonsovicinanza@yahoo.com.ar', 'GsI8RP', 'LA PLATA', 'ABOGADO', 'Alfonso', 'VICINANZAS', '2019-06-22 15:17:57', '$2y$10$b2fCkytXh63C7Ppah6nUk.MatjC86Ai.udqwMMlJiYFEsJS0IeqjC', NULL, NULL, '2019-06-22 18:17:57'),
(57, 'laura_logriego@yahoo.com.ar', 'gXt9Hf', 'LANUS', 'ABOGADA', 'Laura', 'LOGRIEGO', '2019-06-22 15:17:57', '$2y$10$YUV6wMB.Ij8TcidsOnSkOOQJOxJupLp02QwdiA2CTBzGGRX4b2nO.', NULL, NULL, '2019-06-22 18:17:57'),
(58, 'ramonaruizdiaz@hotmail.com', 'BmPinw', 'LANUS', 'TRABAJADORA SOCIAL', 'Ramona', 'RUIZ DIAZ', '2019-06-22 15:17:58', '$2y$10$q8b.0Gi1IB56yaDEXi58QuU/o2vcV4jE4nda5PL.bDJhKCFDJ9Jfy', NULL, NULL, '2019-06-22 18:17:58'),
(59, 'mvtemudio@hotmail.com', 'FPnM4I', 'LANUS', 'PSICÓLOGA', 'María Victoria', 'TEMUDIO', '2019-06-22 15:17:58', '$2y$10$frEWIaOc8i5/Jf4PgNfJsuJtGl5I2kD4drDUspVW7nD8k/kCygswq', NULL, NULL, '2019-06-22 18:17:58'),
(60, 'malearrieta76@hotmail.com', 'FSZ7GV', 'LOMAS Z.', 'ADMINISTRATIVA', 'María Alejandra', 'ARRIETA', '2019-06-22 15:17:58', '$2y$10$itRZjuoK18/NCz0rsUfop.c5NinNws/TR5euC5DFJ93AbSz3aas02', NULL, NULL, '2019-06-22 18:17:58'),
(61, 'ana_liagallo@yahoo.com.ar', 'LvY21S', 'LOMAS Z.', 'PSICÓLOGA', 'Analía', 'GALLO', '2019-06-22 15:17:59', '$2y$10$N/8b1.V2B1C0p2h86PZPqOYiLUpuiZZB.gKLFsRbhwRf/DJ6/tTc.', NULL, NULL, '2019-06-22 18:17:59'),
(62, 'galvanvirginia@yahoo.com.ar', 'im5aeN', 'LOMAS Z.', 'TRABAJADORA SOCIAL', 'Virginia', 'GALVAN', '2019-06-22 15:17:59', '$2y$10$qNpmpB02a4XeI/llp7C4nedg6oebGYXYIS0kbaR7MR.hG6jnT6UMe', NULL, NULL, '2019-06-22 18:17:59'),
(63, 'nataliajofre22@gmail.com', 'ygw2Pe', 'LOMAS Z.', 'ABOGADA', 'Natalia', 'JOFRE', '2019-06-22 15:18:00', '$2y$10$axPFjS1nY3BJRnGW5G06V.HE3yZo/7BV/KeCeYQt8H9pfsABDbeX.', NULL, NULL, '2019-06-22 18:18:00'),
(64, 'ordoñez.sol85@gmail.com', 'CcbXFt', 'LOS TOLDOS', 'TRABAJADORA SOCIAL', 'Mariciel', 'ORDOÑEZ', '2019-06-22 15:18:00', '$2y$10$xUDJ.Uew/1vbUvL.B1W95.61dK2nWNpKurUYh/SdNs.Zit/ZQqQj6', NULL, NULL, '2019-06-22 18:18:00'),
(65, 'lia_sanchez8@yahoo.com.ar', 'i1rHFR', 'LOS TOLDOS', 'PSICÓLOGA', 'LIA', 'SANCHEZ', '2019-06-22 15:18:00', '$2y$10$xulNj.ozWF4jzBMlCzRcouO2sbHV96E5F9vefJMG2uv/UhyZ0gj0i', NULL, NULL, '2019-06-22 18:18:00'),
(66, 'cpvgralviamonte@hotmail.com', 'KUcojq', 'LOS TOLDOS', 'PSICÓLOGA', 'María Belén', 'TAGLIAFERRO', '2019-06-22 15:18:01', '$2y$10$8R46bxQimZl75/n2o1KGR.LpZmG8/1bC9nmomPBebKEPjJxaZTKLO', NULL, NULL, '2019-06-22 18:18:01'),
(67, 'natalia_cascardo@hotmail.com', 'ihHu2q', 'MAR DEL PLATA', 'PSICÓLOGA', 'Natalia', 'CASCARDO', '2019-06-22 15:18:01', '$2y$10$TfefRk5s4h936MgxLY8ePOl7nMKvYggxqzKO/VAhfCQ2QOZr2MhOS', NULL, NULL, '2019-06-22 18:18:01'),
(68, 'monidimauro@hotmail.com', 'AIQ1KM', 'MAR DEL PLATA', 'ADMINISTRATIVA', 'Mónica', 'DI MAURO', '2019-06-22 15:18:01', '$2y$10$ZtwpJLemGokCkCkEyM6I6emgpjdqpLyBH2R.iTQDPIUUerO0On.0i', NULL, NULL, '2019-06-22 18:18:01'),
(69, 'patriciohorn@hotmail.com', 'pMfwQ0', 'MAR DEL PLATA', 'ABOGADO', 'Patricio', 'HORN', '2019-06-22 15:18:02', '$2y$10$ImP4oROkqI.RGk7D4ljTmufdHcGeTwoyo9alsZiUMyd9T.fq3d0c2', NULL, NULL, '2019-06-22 18:18:02'),
(70, 'joseluismartins@hotmail.com', 'uv9F25', 'MAR DEL PLATA', 'ABOGADO', ' José Luis', 'MARTINS', '2019-06-22 15:18:02', '$2y$10$JD6LYrNGpQBwohMIX1fMWecEQ4NSSM5zMSm.yak8KFpVPICSDWMie', 'xnQL6pCoXlXAYgdqRI6I76OnFU0tp0pkntlLDHtAaQlAkaHM4Qk1ChGHkr2c', NULL, '2019-06-22 18:18:02'),
(71, 'luz_22_mm@hotmail.com', '5H9M4s', 'MAR DEL PLATA', 'TRABAJADORA SOCIAL', 'Luz', 'MUÑIZ', '2019-06-22 15:18:02', '$2y$10$S3db3makqer2xWjP1E8r8uC0lDjruWFtDJsRXB1yOhKZ5xwbwvK0.', NULL, NULL, '2019-06-22 18:18:02'),
(72, 'florencianovello@yahoo.com.ar', 'FluzUn', 'MAR DEL PLATA', 'PSICÓLOGA', 'Florencia', 'NOVELLO', '2019-06-22 15:18:03', '$2y$10$CBuRCGYDnYzNU3bD/ozSeOO5t7VlhI.a10Zl2jcgmhrdbPofj0jhC', NULL, NULL, '2019-06-22 18:18:03'),
(73, 'catalinaespil@hotmail.com', 'NKM1Yf', 'MERCEDES', 'PSICÓLOGA', 'Catalina', 'ESPIL', '2019-06-22 15:18:03', '$2y$10$a/6YCt3F3tqc//xXBxFz3eOlvameicFmHohQwQtaRS8Du70CzB6Dy', NULL, NULL, '2019-06-22 18:18:03'),
(74, 'pia.frattini@hotmail.com', 'FcTaeP', 'MERCEDES', 'TRABAJADORA SOCIAL', 'María Pía', 'FRATTINI', '2019-06-22 15:18:04', '$2y$10$iy2HMGj8.JLcag2pTHBJteGS6nYeoynSUKuY5Bk6fBZQ.q/OKzwaa', NULL, NULL, '2019-06-22 18:18:04'),
(75, 'valeriamanfria@gmail.com', 'j3rti4', 'MERECEDES', 'ABOGADA', 'Valeria', 'MANFRIA MASSA', '2019-06-22 15:18:04', '$2y$10$qMB7J0Pn6e3xmODRU4M6UOniikdpVURlmASY6WUgW93y2p9zOHvh2', NULL, NULL, '2019-06-22 18:18:04'),
(76, 'sb.gonzalo@hotmail.com', 'lRubUg', 'MORENO', 'ABOGADO', 'Jorge Gonzalo', 'SESSAREGO B.', '2019-06-22 15:18:05', '$2y$10$j19eQE52KECRBk8C7tpwde5Ciuf/kZsvqVT7fXTklALl1w6.7PkjC', NULL, NULL, '2019-06-22 18:18:05'),
(77, 'german.landgraf@gmail.com', 'dMy0TP', 'MORENO', 'ABOGADO', 'Germán', 'LANDGRAF', '2019-06-22 15:18:05', '$2y$10$CF9SF/8OIgG8uefB7n9K2OPVTQVdzLvOaXZsCcJAC/cy67n5CZKgm', NULL, NULL, '2019-06-22 18:18:05'),
(78, 'valtasan0910@gmail.com', 'ZBmLHI', 'MORENO', 'PSICÓLOGA', 'VALERIA', 'SANCHEZ', '2019-06-22 15:18:05', '$2y$10$QonptBAO5RN8oieJd9caOu.Lnnpb9jWj6RcbhI3J9PR66HzAnQR/C', NULL, NULL, '2019-06-22 18:18:05'),
(79, 'gomezmiguelangel12@yahoo.com.ar', 'i0czmw', 'MORON', 'TRABAJADOR SOCIAL', 'Miguel Angel', 'GOMEZ', '2019-06-22 15:18:06', '$2y$10$K2EY.60Idi95MjJ7j8Goqe49Ldg5MEI8vJK9BjVBNOjUcpe9cgaEG', NULL, NULL, '2019-06-22 18:18:06'),
(80, 'jessin23@hotmail.com', '82uL0W', 'MORON', 'ABOGADA', 'Yésica', 'IZARRIAGA', '2019-06-22 15:18:06', '$2y$10$rWBW6lA3xAxsIUYLoQl91ucdyCsr7obgw4NLauPZNKyORpvn67Mre', NULL, NULL, '2019-06-22 18:18:06'),
(81, 'dralucero@live.com', 'Q629VR', 'MORON', 'ABOGADA', 'Viviana', 'LUCERO', '2019-06-22 15:18:07', '$2y$10$ydZ7R2aOfElOHwn6hEfEseH07vPgB9iSjZvrhNjHkv2eoDFRR7rAe', NULL, NULL, '2019-06-22 18:18:07'),
(82, 'isabel_men@hotmail.com', 'SXaGkP', 'MORON', 'PSICÓLOGA', 'Isabel', 'MENGHINI', '2019-06-22 15:18:07', '$2y$10$qCmmFo.QvaEMoxPfMzwlme2.8xEgPAEUd3RoyXQ1T23OA6tiRW4gC', NULL, NULL, '2019-06-22 18:18:07'),
(83, 'malenap_@hotmail.com', '60Gmae', 'MORON', 'ADMINISTRATIVA', 'Malena', 'PEREZ SOTO', '2019-06-22 15:18:07', '$2y$10$lQJaMGx/WJnWDpQfWmjQx.tdUdKlY//fPDUNa6Bqw9FZTZlBZkGDK', NULL, NULL, '2019-06-22 18:18:07'),
(84, 'fantemanuel2@gmail.com', 'IHpoKb', 'PERGAMINO', 'TRABAJADOR SOCIAL', 'EMANUEL', 'FANTE', '2019-06-22 15:18:08', '$2y$10$PrEOVw05mSdlgabqi0P3vu8m3x9bpfRUMDeFEP8bLDFD948991yry', NULL, NULL, '2019-06-22 18:18:08'),
(85, 'cecimarquiselli@hotmail.com', 'xvPOkZ', 'PERGAMINO', 'PSICÓLOGA', 'Cecilia', 'MARQUISELLI', '2019-06-22 15:18:08', '$2y$10$KJZr0K7Aj56JroK9GO9ZOOqlL4VF5uMaWjoGBjhvi287xpe74ODym', NULL, NULL, '2019-06-22 18:18:08'),
(86, 'valentinapiccinimanfredini@gmail.com', 'Rd8N6T', 'PERGAMINO', 'ABOGADA', 'Valentina', 'PICCINI M.', '2019-06-22 15:18:08', '$2y$10$cNrvy.51grhA.r9A6eOB/u9iftm5I9XiRtyn5Lw.fNW4GQLOZaHaK', NULL, NULL, '2019-06-22 18:18:08'),
(87, 'dra.diazcecilia@gmail.com', '7BkqEn', 'PILAR', 'ABOGADA', 'Cecilia', 'DIAZ', '2019-06-22 15:18:09', '$2y$10$2O5GZ5XnZxTXlOmKlMp.eexklJ0ECEFH.2xq7HJvmrtSZge2yrT.m', NULL, NULL, '2019-06-22 18:18:09'),
(88, 'barbara.ramallo.1980@outlook.com', 'D8FNOP', 'PILAR', 'TRABAJADORA SOCIAL', 'Bárbara Mariela', 'RAMALLO', '2019-06-22 15:18:09', '$2y$10$ZAUk.GyZqyIT7EhhlXvhmuaz6/L6cIrDBHP5jt3i5VMWX0MujONKC', NULL, NULL, '2019-06-22 18:18:09'),
(89, 'mariana_sv3@hotmail.com', 'DQ4wJ5', 'PILAR', 'PSICÓLOGA', 'Mariana', 'SEMENZATO V.', '2019-06-22 15:18:10', '$2y$10$NO84TVudaB1OYsfpS9KeLuX4P7c.Q55z7L4eClzS6aZqeyaAs3DvG', NULL, NULL, '2019-06-22 18:18:10'),
(90, 'estudiojuridicodona@gmail.com', '2qoZmG', 'PINAMAR', 'ABOGADA', 'María José', 'DOÑA', '2019-06-22 15:18:10', '$2y$10$OgBBdgBOR.HKn.70Mq99uejXWlwEP2PqTYZWQ/G/NbI1jH4ZcYKFi', NULL, NULL, '2019-06-22 18:18:10'),
(91, 'matutaur2@hotmail.com', '1pMhzx', 'PINAMAR', 'PSICÓLOGA', 'Matilde', 'PAGGI', '2019-06-22 15:18:10', '$2y$10$BkppCrk2KdExYtwN1tGjr.b781DSSlqFCkQkgsIscBhCE3i7gZqBG', NULL, NULL, '2019-06-22 18:18:10'),
(92, 'RIVEROMARIAJ@GMAIL.COM', 'wPzyhB', 'PINAMAR', 'PSICÓLOGA', 'María José', 'RIVERO', '2019-06-22 15:18:11', '$2y$10$Btns08kvNn1HgQQx9XSWsuOqCRUxjklZrQUrF4RiCMnaWED5KBUZ2', NULL, NULL, '2019-06-22 18:18:11'),
(93, 'alejandracaceres07@yahoo.com>', 'PGikMm', 'QUILMES', 'TRABAJADORA SOCIAL', 'Alejandra', 'CACERES', '2019-06-22 15:18:11', '$2y$10$rTqm.zGPqbwfxzK.TYfFXOJPNMWxw54P.6VvNVT1Tu0cG3NVyqUj.', NULL, NULL, '2019-06-22 18:18:11'),
(94, 'palacios669@hotmail.com', 'heqPRf', 'QUILMES', 'ADMINISTRATIVA', 'CAROLINA', 'PALACIOS', '2019-06-22 15:18:11', '$2y$10$DiSabtP1.51/OSKEew242.ftIVRIJqgGrfQzJqgNrOAsOS2CqKXOq', NULL, NULL, '2019-06-22 18:18:11'),
(95, 'rivarolamarinag@gmail.com', 'cNgTt9', 'QUILMES', 'ABOGADA', 'Marina', 'RIVAROLA', '2019-06-22 15:18:12', '$2y$10$cvUpONwWSIlxnnyUzIELN.GZWMT35XXO8pGrGWeHZDgikXXGPpvKu', NULL, NULL, '2019-06-22 18:18:12'),
(96, 'carolinavenosa@gmail.com', 'eBvRrs', 'QUILMES', 'PSICÓLOGA', 'Carolina', 'VENOSA', '2019-06-22 15:18:12', '$2y$10$uCGGqWMbiKBbN5dBzAdyv.JOBx5nUcBQpAlsqRKpLq.4Xpehda..u', NULL, NULL, '2019-06-22 18:18:12'),
(97, 'campiflorencia@hotmail.com', 'c82zyW', 'SAN FERNANDO', 'ABOGADA', 'Florencia', 'CAMPI', '2019-06-22 15:18:13', '$2y$10$CNkUP9xpWAi6JbR7rHiJb..KXZlOOhjXyX3nEosC2vHMu4FpS2Nna', NULL, NULL, '2019-06-22 18:18:13'),
(98, 'midaverio@hotmail.com', 'xkSgZM', 'SAN FERNANDO', 'ADMINISTRATIVA', 'María Inés', 'DAVERIO', '2019-06-22 15:18:13', '$2y$10$pc2v8qFP9ma0vri8l5U0puz368O6RLT7eo8sbnX2YByOaW4g/YcNK', 'xNJZWmmvzj3Bm23wHNLgUMCfLdOxTNHPJXClMBOpqmlugR5du5jzmAGKLvWG', NULL, '2019-06-22 18:18:13'),
(99, 'jupa_8@hotmail.com', 'gvOh2Q', 'SAN FERNANDO', 'PSICÓLOGA', 'María Julia', 'PALAVICINI', '2019-06-22 15:18:13', '$2y$10$yxTzOMyH9KgiJzxFJuJaCe/70/w2Av/q7/VUZzFU6gZyYEItxVMH2', NULL, NULL, '2019-06-22 18:18:13'),
(100, 'veronicasoriano@yahoo.com', 'XC2tZU', 'SAN FERNANDO', 'ADMINISTRATIVA', 'Verónica', 'SORIANO', '2019-06-22 15:18:14', '$2y$10$dHJCo9xtSquJIEjj3tqJZedEWEpcSJrJmFfQI/cy0TMIm6/AcYr/G', NULL, NULL, '2019-06-22 18:18:14'),
(101, 'carobusquier@yahoo.com.ar', 'Dkjzvy', 'SAN MARTIN', 'PSICÓLOGA', 'Carolina', 'BUSQUIER', '2019-06-22 15:18:14', '$2y$10$XGakdiNHLCY35q775UjSJO8JmEFbvs6NZ3pf1eN6jI0WeIJuwKSVK', NULL, NULL, '2019-06-22 18:18:14'),
(102, 'daianabrendacordoba@yahoo.com.ar', '2v7pBJ', 'SAN MARTIN', 'ABOGADA', 'Daiana', 'CORDOBA', '2019-06-22 15:18:14', '$2y$10$YFEuegE5wX75JmbaZXP8L.OlKsLeYyuUq2TDmhjukomZXo3NnQVxq', NULL, NULL, '2019-06-22 18:18:14'),
(103, 'estudiodt@gmail.com', 'rwEcl7', 'SAN MARTIN', 'ABOGADO', 'Diego', 'DALLA TORRE', '2019-06-22 15:18:15', '$2y$10$TxhkP72IjLt0Mv9NVkp.L.Hfmy6OVFbbGXTtHH0AEKxL7h9tey.JO', NULL, NULL, '2019-06-22 18:18:15'),
(104, 'loremagista@gmail.com', 'IvRTAN', 'SAN MARTIN', 'ADMINISTRATIVA', 'Lorena', 'MAGISTA', '2019-06-22 15:18:15', '$2y$10$vPDHt8.COHHCc6A/G3YNU.pPuc0wsqo1N.CeE0usRf0o6ZsP4lLbS', NULL, NULL, '2019-06-22 18:18:15'),
(105, 'alcuazm@hotmail.com', '4hgRYK', 'TANDIL', 'ABOGADA', 'Micaela', 'ALCUAZ', '2019-06-22 15:18:16', '$2y$10$qJa8EIIiJuN.H/sk.4SHBekJ2//of9LMrqBDyTNbjXKJDKXExHS8u', NULL, NULL, '2019-06-22 18:18:16'),
(106, 'casilvana@hotmail.com', '02bwHa', 'TANDIL', 'PSICÓLOGA', 'Silvana', 'CERDA', '2019-06-22 15:18:16', '$2y$10$U0nNMS9KVNNn/Y2IMLRSeuHx9Ra7hAJPLBXfDhCb.lH1vhOAc74yO', NULL, NULL, '2019-06-22 18:18:16'),
(107, 'alicia_rubilar@hotmail.com', 'C1ZLka', 'TANDIL', 'TRABAJADORA SOCIAL', 'Alicia', 'RUBILAR', '2019-06-22 15:18:16', '$2y$10$f1r6WbRzNuPxjhM651QqQOKk2R3tv34MAnGVLT9BARstVvi2sJs1a', NULL, NULL, '2019-06-22 18:18:16'),
(108, 'verocracea@yahoo.com', 'qxinOC', 'VICENTE LOPEZ', 'PSICÓLOGA', 'Verónica', 'ATTALA', '2019-06-22 15:18:17', '$2y$10$CYqlqafv1tscL.kuMEADNu76n3qcQgC/Z7WJTs7XoGIsiMzJEsZmW', NULL, NULL, '2019-06-22 18:18:17'),
(109, 'lutipirovani@hotmail.com', 'Cl40o9', 'VICENTE LOPEZ', 'ABOGADA', 'Lucía', 'PIROVANI', '2019-06-22 15:18:17', '$2y$10$ljoiGi3/MeiDWmK85XoiKube/zgy.9Y.a4vWLIuK7yh/k9ByaUkUG', NULL, NULL, '2019-06-22 18:18:17'),
(110, 'pablo.porubsky@gmail.com', 'JTebj5', 'VICENTE LOPEZ', 'ABOGADO', 'Pablo', 'PORUBSKY', '2019-06-22 15:18:18', '$2y$10$onB505eFXHIlPgfH00RlNe7v2gqmN1D8sjuc7R.CskdyqrYPKt6x2', NULL, NULL, '2019-06-22 18:18:18'),
(111, 'nataliacribelli@hotmail.com.a', 'NSAhPX', 'ZARATE', 'PSICÓLOGA', 'Natalia', 'CRIBELLI', '2019-06-22 15:18:18', '$2y$10$ZihllmRGbyvIfbUooCHI1uS12uhyNClgny/DSagxoMZeS.95SfEzK', NULL, NULL, '2019-06-22 18:18:18'),
(112, 'l.fraccarolli@live.com', 'LXtQcq', 'ZARATE', 'ABOGADA', 'Lucía', 'FRACCAROLLI', '2019-06-22 15:18:18', '$2y$10$Tdcz1MEMF6RfqLcpxkBxZeRAtm.X7aAWxjeVmYmmzVa/F/msEat.q', NULL, NULL, '2019-06-22 18:18:18'),
(113, 'minuccisol@gmail.com', '3NPyjT', 'BAHIA BLANCA', 'TRABAJADORA SOCIAL', 'Solange', 'MINUCCI', '2019-06-22 15:18:19', '$2y$10$vI8Iis4pgjXUWpursozTDO27SjUXlO8BaWDU.MEY1bOkfCwRGYaX6', NULL, NULL, '2019-06-22 18:18:19'),
(114, 'ignacioklena@hotmail.com', 'y1hgeY', 'LA PLATA', 'ABOGADO', 'Ignacio ', 'KLENA', '2019-06-22 15:18:19', '$2y$10$Z5dLjpgvqjFYbGFRbCcaAeLEDcTcjawE.ZnB6MSnV3QJTsXkPFKze', 'pzEk2KfDRudSj0WwFU8ZymiWUbuC9GQ0qnKcxg5feccoejrJVCUHKIrebpV7', NULL, '2019-06-22 18:18:19'),
(115, 'mariaemiliamathe@gmail.com', 'X6aRb9', 'SAN ISIDRO', 'ABOGADA', 'Maria Emilia', 'MATHE', '2019-06-22 15:18:19', '$2y$10$.A467f3wKZLJ1HIXUogmhuSmYKdHKkYDsMY6n8NGSVk6RdbG7irSq', NULL, NULL, '2019-06-22 18:18:19'),
(116, 'xul27@hotmail.com', 'Jwsh3K', 'LA PLATA', 'DIRECTORA', 'LUCKY', 'SANCHEZ', '2019-06-22 15:18:20', '$2y$10$554SHP23MMP2RP1t2qLdAuXo1BuhbrUsOkg2rmdblWeBHuZ2K5bJ6', 'p5ERez6Fjm9GEGRxXxgxYTxeh6xswJbQsheuecqaTptibNGiajdgG5xfBpoX', NULL, '2019-06-22 18:18:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
