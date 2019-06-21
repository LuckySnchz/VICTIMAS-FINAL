-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2019 a las 14:49:39
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

INSERT INTO `users` (`id`, `email`, `sede`, `area`, `nombre`, `apellido`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'VEROBINCAZ@hotmail.com ', 'LA PLATA', 'DIRECTORA PROVINCIAL', 'Veronica Haydeé', 'BINCAZ ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(2, 'lic.juanbombelli@gmail.com', 'LA PLATA', 'DIRECTORA DE SEDES DECENTRALIZADAS', 'LUCIA', 'TEALDI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(3, 'tealdi.lucia@gmail.com', 'LA PLATA', 'DIRECTOR DE ASISTENCIA Y PROTECCIÓN A LA VÍCTIMA', 'Juan Ignacio', 'BOMBELLI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(4, 'rominabenitezar@hotmail.com', 'ALTE. BRWON', 'PSICÓLOGA', 'Romina', 'BENITEZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(5, 'veritoapc@hotmail.com', 'ALTE. BRWON', 'TRABAJADORA SOCIAL', 'Verónica', 'PEREZ  ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(6, 'norbertoricco@hotmail.com', 'ALTE. BRWON', 'ABOGADO', 'Norberto', 'RICCO ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(7, 'mflorencia_aramburu@hotmail.com', 'AZUL', 'ABOGADA', 'María Florencia', 'ARAMBURU', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(8, 'josefina.casado@gmail.com', 'AZUL', 'PSICÓLOGA', 'Josefina', 'CASADO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(9, 'jime_ciappina@hotmail.com', 'AZUL', 'TRABAJADORA SOCIAL', 'María Jimena', 'CIAPPINA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(10, 'ignaciobarsellini@estudiobarsellini.com', 'BAHIA BLANCA', 'ABOGADO', 'Ignacio Armando', 'BARSELLINI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(11, 'iglesiabraun@hotmail.com.ar', 'BAHIA BLANCA', 'ADMINISTRATIVO', 'Martín', 'IGLESIA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(12, 'catalinaotero.bblanca@gmail.com', 'BAHIA BLANCA', 'PSICÓLOGA', 'Ana Catalina', 'OTERO D.', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(13, 'mariela_delf@hotmail.com', 'EZEIZA', 'TRABAJADORA SOCIAL', 'Mariela', 'FORNARI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(14, 'noeliadlombardo@gmail.com', 'EZEIZA', 'ABOGADA', 'Noelia', 'LOMBARDO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(15, 'gmatthesius@hotmail.com', 'EZEIZA', 'PSICÓLOGA', 'Gladys Mabel', 'MATTHESIUS', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(16, 'cortes.m.soledad@gmail.com', 'JOSE C. PAZ', 'ABOGADA', 'María Soledad', 'CORTES', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(17, 'alimichela@hotmail.com', 'JOSE C. PAZ', 'PSICÓLOGA', 'Alicia', 'MICHELA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(18, 'anabela_romero_03@hotmail.com', 'JOSE C. PAZ', 'TRABAJADORA SOCIAL', 'Soledad Anabela', 'ROMERO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(19, 'giuliettacuozzo@hotmail.com', 'LA MATANZA', 'PSICÓLOGA', 'Giulietta', 'CUOZZO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(20, 'jecru@yahoo.com.ar', 'LA MATANZA', 'TRABAJADORA SOCIAL', 'Jesica', 'CRUZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(21, 'agustina.iriondo@hotmail.es', 'LA MATANZA', 'PSICÓLOGA', 'AGUSTINA A.', 'IRIONDO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(22, 'mariel_velazquez@hotmail.com.ar', 'LA MATANZA', 'ABOGADA', 'Rafaela Mariel', 'Velazquez', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(23, 'rjapecechea@gmail.com', 'LA PLATA', 'ABOGADO', 'Jorge', 'APECECHEA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(24, 'julietapsi@gmail.com', 'LA PLATA', 'PSICÓLOGA', 'Julieta Anahí', 'ARAGUES', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(25, 'veronica.ardohain76@gmail.com', 'LA PLATA', 'TRABAJADORA SOCIAL', 'Veronica Haydeé', 'ARDOHAIN', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(26, 'elbeca_81@hotmail.com', 'LA PLATA', 'ADMINISTRATIVO', 'Agustín', 'BEJARANO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(27, 'maiacalabrese85@gmail.com', 'LA PLATA', 'EQUIPO DIRECCIÓN', 'Maia Yésica', 'CALABRESE', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(28, 'marialujancic@gmail.com', 'LA PLATA', 'PSICÓLOGA', 'Maria Lujan', 'CICCONI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(29, 'lu.comp1989@gmail.com', 'LA PLATA', 'EQUIPO DIRECCIÓN', 'Lucia', 'COMPAGNUCCI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(30, 'rocuccia@hotmail.com', 'LA PLATA', 'PSICÓLOGA', 'Rosario Leontina', 'CUCCIA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(31, 'deandreisagustina@gmail.com', 'LA PLATA', 'ADMINISTRATIVA', 'Agustina Soledad', 'DE ANDREIS', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(32, 'ludeantoni@hotmail.com', 'LA PLATA', 'ADMINISTRATIVA', 'Lucía', 'DE ANTONI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(33, 'juanfdinardo@gmail.com', 'LA PLATA', 'ABOGADO', 'Juan Francisco', 'DI NARDO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(34, 'carogassull@gmail.com', 'LA PLATA', 'ADMINISTRATIVA', ' María Carolina', 'GASSULL', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(35, 'andreagiacomino04@yahoo.com.ar', 'LA PLATA', 'PSICÓLOGA', 'Andrea Daniela', 'GIACOMINO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(36, 'dantegiu@yahoo.com.ar', 'LA PLATA', 'ADMINISTRATIVO', 'Dante Bautista', 'GUILIANI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(37, 'azul.labalta@gmail.com', 'LA PLATA', 'ABOGADA', 'Azul', 'LABALTA R.', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(38, 'MilagrosLuayza@hotmail.com', 'LA PLATA', 'ABOGADA', 'Milagros Aldana', 'LUAYZA T.', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(39, 'macloughlinmartin@gmail.com', 'LA PLATA', 'ADMINISTRATIVO', 'Martín Darío', 'MAC LOUGHLIN', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(40, 'lucianomac@gmail.com', 'LA PLATA', 'PSICÓLOGO', 'Luciano', 'MACIEL', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(41, 'slommac@hotmail.com', 'LA PLATA', 'ADMINISTRATIVO', 'Sebastián ', 'MACUCHO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(42, 'veropsicol@hotmail.com', 'LA PLATA', 'PSICÓLOGA', 'Verónica Isabel', 'MARTINUZZI R.', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(43, 'silviomonti@gmail.com', 'LA PLATA', 'PSICÓLOGO', 'Silvio Gabriel', 'MONTI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(44, 'agus_montone@hotmail.com', 'LA PLATA', 'ADMINISTRATIVO', 'Agustín', 'MONTONE', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(45, 'elimorrone@gmail.com', 'LA PLATA', 'PSICÓLOGO', 'Eliana Silvina', 'MORRONE', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(46, 'lisandropanelli@gmail.com', 'LA PLATA', 'ABOGADO', 'Lisandro Ariel', 'PANELLI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(47, 'cuchipellegrini@hotmail.com', 'LA PLATA', 'ADMINISTRATIVO', 'Héctor Rubén', 'PELLEGRINI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(48, 'guillerisso@hotmail.com', 'LA PLATA', 'PSICÓLOGA', 'Guillermina', 'RISSO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(49, 'vaninaseminara@hotmail.com', 'LA PLATA', 'PSICÓLOGA', 'Vanina Eleonora', 'SEMINARA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(50, 'patriciarack@gmail.com', 'LA PLATA', 'TRABAJADORA SOCIAL', 'M. PATRICIA', 'RACK', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(51, 'valerinasoto12@gmail.com', 'LA PLATA', 'TRABAJADORA SOCIAL', 'Valeria', 'SOTO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(52, 'cpvconsultadir@gmail.com', 'LA PLATA', 'ADMINISTRATIVA', 'Maria Guadalupe', 'SOSA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(53, 'candeservin@gmail.com', 'LA PLATA', 'PSICÓLOGA', 'María Candela', 'SERVIN', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(54, 'paustroppolo25@hotmail.com', 'LA PLATA', 'ADMINISTRATIVA', 'Paula', 'STROPPOLO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(55, 'meelinasulasguzman@gmail.com', 'LA PLATA', 'ADMINISTRATIVA', 'Jacqueline Melina', 'SULAS', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(56, 'alfonsovicinanza@yahoo.com.ar', 'LA PLATA', 'ABOGADO', 'Alfonso', 'VICINANZAS', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(57, 'laura_logriego@yahoo.com.ar', 'LANUS', 'ABOGADA', 'Laura', 'LOGRIEGO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(58, 'ramonaruizdiaz@hotmail.com', 'LANUS', 'TRABAJADORA SOCIAL', 'Ramona', 'RUIZ DIAZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(59, 'mvtemudio@hotmail.com', 'LANUS', 'PSICÓLOGA', 'María Victoria', 'TEMUDIO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(60, 'malearrieta76@hotmail.com', 'LOMAS Z.', 'ADMINISTRATIVA', 'María Alejandra', 'ARRIETA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(61, 'ana_liagallo@yahoo.com.ar', 'LOMAS Z.', 'PSICÓLOGA', 'Analía', 'GALLO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(62, 'galvanvirginia@yahoo.com.ar', 'LOMAS Z.', 'TRABAJADORA SOCIAL', 'Virginia', 'GALVAN', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(63, 'nataliajofre22@gmail.com', 'LOMAS Z.', 'ABOGADA', 'Natalia', 'JOFRE', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(64, 'ordoñez.sol85@gmail.com', 'LOS TOLDOS', 'TRABAJADORA SOCIAL', 'Mariciel', 'ORDOÑEZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(65, 'lia_sanchez8@yahoo.com.ar', 'LOS TOLDOS', 'PSICÓLOGA', 'LIA', 'SANCHEZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(66, 'cpvgralviamonte@hotmail.com', 'LOS TOLDOS', 'PSICÓLOGA', 'María Belén', 'TAGLIAFERRO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(67, 'natalia_cascardo@hotmail.com', 'MAR DEL PLATA', 'PSICÓLOGA', 'Natalia', 'CASCARDO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(68, 'monidimauro@hotmail.com', 'MAR DEL PLATA', 'ADMINISTRATIVA', 'Mónica', 'DI MAURO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(69, 'patriciohorn@hotmail.com', 'MAR DEL PLATA', 'ABOGADO', 'Patricio', 'HORN', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(70, 'joseluismartins@hotmail.com', 'MAR DEL PLATA', 'ABOGADO', ' José Luis', 'MARTINS', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(71, 'luz_22_mm@hotmail.com', 'MAR DEL PLATA', 'TRABAJADORA SOCIAL', 'Luz', 'MUÑIZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(72, 'florencianovello@yahoo.com.ar', 'MAR DEL PLATA', 'PSICÓLOGA', 'Florencia', 'NOVELLO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(73, 'catalinaespil@hotmail.com', 'MERCEDES', 'PSICÓLOGA', 'Catalina', 'ESPIL', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(74, 'pia.frattini@hotmail.com', 'MERCEDES', 'TRABAJADORA SOCIAL', 'María Pía', 'FRATTINI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(75, 'valeriamanfria@gmail.com', 'MERECEDES', 'ABOGADA', 'Valeria', 'MANFRIA MASSA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(76, 'sb.gonzalo@hotmail.com', 'MORENO', 'ABOGADO', 'Jorge Gonzalo', 'SESSAREGO B.', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(77, 'german.landgraf@gmail.com', 'MORENO', 'ABOGADO', 'Germán', 'LANDGRAF', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(78, 'valtasan0910@gmail.com', 'MORENO', 'PSICÓLOGA', 'VALERIA', 'SANCHEZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(79, 'gomezmiguelangel12@yahoo.com.ar', 'MORON', 'TRABAJADOR SOCIAL', 'Miguel Angel', 'GOMEZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(80, 'jessin23@hotmail.com', 'MORON', 'ABOGADA', 'Yésica', 'IZARRIAGA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(81, 'dralucero@live.com', 'MORON', 'ABOGADA', 'Viviana', 'LUCERO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(82, 'isabel_men@hotmail.com', 'MORON', 'PSICÓLOGA', 'Isabel', 'MENGHINI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(83, 'malenap_@hotmail.com', 'MORON', 'ADMINISTRATIVA', 'Malena', 'PEREZ SOTO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(84, 'fantemanuel2@gmail.com', 'PERGAMINO', 'TRABAJADOR SOCIAL', 'EMANUEL', 'FANTE', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(85, 'cecimarquiselli@hotmail.com', 'PERGAMINO', 'PSICÓLOGA', 'Cecilia', 'MARQUISELLI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(86, 'valentinapiccinimanfredini@gmail.com', 'PERGAMINO', 'ABOGADA', 'Valentina', 'PICCINI M.', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(87, 'dra.diazcecilia@gmail.com', 'PILAR', 'ABOGADA', 'Cecilia', 'DIAZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(88, 'barbara.ramallo.1980@outlook.com', 'PILAR', 'TRABAJADORA SOCIAL', 'Bárbara Mariela', 'RAMALLO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(89, 'mariana_sv3@hotmail.com', 'PILAR', 'PSICÓLOGA', 'Mariana', 'SEMENZATO V.', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(90, 'estudiojuridicodona@gmail.com', 'PINAMAR', 'ABOGADA', 'María José', 'DOÑA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(91, 'matutaur2@hotmail.com', 'PINAMAR', 'PSICÓLOGA', 'Matilde', 'PAGGI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(92, 'RIVEROMARIAJ@GMAIL.COM', 'PINAMAR', 'PSICÓLOGA', 'María José', 'RIVERO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(93, 'alejandracaceres07@yahoo.com>', 'QUILMES', 'TRABAJADORA SOCIAL', 'Alejandra', 'CACERES', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(94, 'palacios669@hotmail.com', 'QUILMES', 'ADMINISTRATIVA', 'CAROLINA', 'PALACIOS', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(95, 'rivarolamarinag@gmail.com', 'QUILMES', 'ABOGADA', 'Marina', 'RIVAROLA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(96, 'carolinavenosa@gmail.com', 'QUILMES', 'PSICÓLOGA', 'Carolina', 'VENOSA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(97, 'campiflorencia@hotmail.com', 'SAN FERNANDO', 'ABOGADA', 'Florencia', 'CAMPI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(98, 'midaverio@hotmail.com', 'SAN FERNANDO', 'ADMINISTRATIVA', 'María Inés', 'DAVERIO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(99, 'jupa_8@hotmail.com', 'SAN FERNANDO', 'PSICÓLOGA', 'María Julia', 'PALAVICINI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(100, 'veronicasoriano@yahoo.com', 'SAN FERNANDO', 'ADMINISTRATIVA', 'Verónica', 'SORIANO', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(101, 'carobusquier@yahoo.com.ar', 'SAN MARTIN', 'PSICÓLOGA', 'Carolina', 'BUSQUIER', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(102, 'daianabrendacordoba@yahoo.com.ar', 'SAN MARTIN', 'ABOGADA', 'Daiana', 'CORDOBA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(103, 'estudiodt@gmail.com', 'SAN MARTIN', 'ABOGADO', 'Diego', 'DALLA TORRE', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(104, 'loremagista@gmail.com', 'SAN MARTIN', 'ADMINISTRATIVA', 'Lorena', 'MAGISTA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(105, 'alcuazm@hotmail.com', 'TANDIL', 'ABOGADA', 'Micaela', 'ALCUAZ', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(106, 'casilvana@hotmail.com', 'TANDIL', 'PSICÓLOGA', 'Silvana', 'CERDA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(107, 'alicia_rubilar@hotmail.com', 'TANDIL', 'TRABAJADORA SOCIAL', 'Alicia', 'RUBILAR', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(108, 'verocracea@yahoo.com', 'VICENTE LOPEZ', 'PSICÓLOGA', 'Verónica', 'ATTALA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(109, 'lutipirovani@hotmail.com', 'VICENTE LOPEZ', 'ABOGADA', 'Lucía', 'PIROVANI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(110, 'pablo.porubsky@gmail.com', 'VICENTE LOPEZ', 'ABOGADO', 'Pablo', 'PORUBSKY', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(111, 'nataliacribelli@hotmail.com.a', 'ZARATE', 'PSICÓLOGA', 'Natalia', 'CRIBELLI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(112, 'l.fraccarolli@live.com', 'ZARATE', 'ABOGADA', 'Lucía', 'FRACCAROLLI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(113, 'minuccisol@gmail.com', 'BAHIA BLANCA', 'TRABAJADORA SOCIAL', 'Solange', 'MINUCCI', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(114, 'ignacioklena@hotmail.com', 'LA PLATA', 'ABOGADO', 'Ignacio ', 'KLENA', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(115, '<', 'SAN ISIDRO', 'ABOGADA', 'Maria Emilia', 'MATHE', NULL, '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', NULL, NULL, NULL),
(116, 'xul27@hotmail.com', 'LA PLATA', 'DIRECTORA', 'LUCKY', 'SANCHEZ', '2019-05-27 15:57:00', '$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy', '2AbbcaAptdzad09e2WNyDseGxEbIlAkznsct4wRzasMKV8QTv1MQYED9zSew', NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
