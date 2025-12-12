-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2025 a las 10:16:14
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
-- Base de datos: `incregym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `duracion_min` int(11) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `aforo_max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre`, `duracion_min`, `color`, `aforo_max`) VALUES
(1, 'HIIT', 60, '#e53935', 20),
(2, 'Bike', 30, '#1e88e5', 20),
(3, 'GAP', 30, '#fdd835', 20),
(4, 'Core', 30, '#8e24aa', 20),
(5, 'Crossfit', 60, '#6d4c41', 20),
(6, 'Stretching', 30, '#43a047', 20),
(7, 'Fitness juvenil', 60, '#00acc1', 20),
(8, 'Pilates', 30, '#5e35b1', 20),
(9, 'Zumba', 60, '#fb8c00', 20),
(10, 'Body box', 60, '#c62828', 20),
(11, 'Body flex', 60, '#3949ab', 20),
(12, 'Yoga', 60, '#00897b', 20),
(13, 'Recuperación funcional', 60, '#7cb342', 20),
(14, 'Embarazadas', 60, '#ec407a', 20),
(15, 'Fit Power', 60, '#ffb300', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aforo`
--

CREATE TABLE `aforo` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` char(5) NOT NULL,
  `zona_cardio` int(11) DEFAULT 0,
  `zona_maquinas` int(11) DEFAULT 0,
  `zona_peso_libre` int(11) DEFAULT 0,
  `empleado_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aforo`
--

INSERT INTO `aforo` (`id`, `fecha`, `hora`, `zona_cardio`, `zona_maquinas`, `zona_peso_libre`, `empleado_id`, `created_at`, `updated_at`) VALUES
(3, '2025-12-09', '08:00', 25, 25, 18, 3, '2025-12-09 01:41:11', '2025-12-09 01:41:11'),
(68, '2025-12-08', '08:00', 25, 35, 5, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(69, '2025-12-08', '09:00', 89, 5, 25, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(70, '2025-12-08', '10:00', 25, 35, 40, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(71, '2025-12-08', '11:00', 26, 36, 41, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(72, '2025-12-08', '12:00', 2, 2, 2, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(73, '2025-12-08', '13:00', 15, 15, 1, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(74, '2025-12-08', '14:00', 5, 5, 5, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(75, '2025-12-08', '15:00', 1, 1, 1, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(76, '2025-12-08', '16:00', 1, 1, 1, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(77, '2025-12-08', '17:00', 1, 1, 2, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(78, '2025-12-08', '18:00', 2, 3, 3, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(79, '2025-12-08', '19:00', 2, 5, 5, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(80, '2025-12-08', '20:00', 2, 5, 8, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(81, '2025-12-08', '21:00', 8, 4, 2, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(82, '2025-12-08', '22:00', 25, 5, 25, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(83, '2025-12-08', '23:00', 0, 8, 9, 3, '2025-12-09 01:44:05', '2025-12-09 01:44:05'),
(105, '2025-12-10', '08:00', 88, 8, 2, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(106, '2025-12-10', '09:00', 25, 35, 40, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(107, '2025-12-10', '10:00', 26, 36, 41, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(108, '2025-12-10', '11:00', 0, 1, 2, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(109, '2025-12-10', '12:00', 20, 25, 21, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(110, '2025-12-10', '13:00', 30, 25, 21, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(111, '2025-12-10', '14:00', 25, 25, 25, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(112, '2025-12-10', '15:00', 24, 30, 30, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(113, '2025-12-10', '16:00', 36, 36, 36, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(114, '2025-12-10', '17:00', 25, 30, 35, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(115, '2025-12-10', '18:00', 25, 30, 35, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(116, '2025-12-10', '19:00', 25, 21, 32, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(117, '2025-12-10', '20:00', 4, 25, 25, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(118, '2025-12-10', '21:00', 14, 14, 15, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(119, '2025-12-10', '22:00', 35, 25, 25, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(120, '2025-12-10', '23:00', 12, 14, 19, 1, '2025-12-10 23:44:18', '2025-12-10 23:44:18'),
(121, '2025-12-11', '08:00', 2, 1, 4, 1, '2025-12-10 23:44:35', '2025-12-10 23:44:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id` int(11) NOT NULL,
  `rutina_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `series` varchar(50) NOT NULL,
  `descanso` varchar(50) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id`, `rutina_id`, `nombre`, `imagen`, `series`, `descanso`, `video`) VALUES
(180, 35, 'Press banca', 'https://i.ytimg.com/vi/rT7DgCr-3pg/maxresdefault.jpg', '4x10', '90 seg', ''),
(181, 35, 'Sentadilla con barra', 'public/img/ejercicios/1765473220_Captura de pantalla 2025-12-11 181315.png', '4x8', '120 seg', ''),
(182, 35, 'Peso muerto', 'https://i.ytimg.com/vi/op9kVnSso6Q/maxresdefault.jpg', '3x6', '150 seg', ''),
(183, 35, 'Dominadas', 'https://i.ytimg.com/vi/eGo4IYlbE5g/maxresdefault.jpg', '3x8', '90 seg', ''),
(184, 35, 'Press militar con Barra', 'public/img/ejercicios/1765488900_Captura de pantalla 2025-12-11 223344.png', '3x10', '60 seg', ''),
(185, 35, 'Fondos en paralelas', 'public/img/ejercicios/1765473134_Captura de pantalla 2025-12-11 181151.png', '3x10', '75 seg', ''),
(186, 35, 'Remo con barra', 'https://i.ytimg.com/vi/kBWAon7ItDw/maxresdefault.jpg', '4x8', '90 seg', ''),
(187, 36, 'Press militar mancuernas', 'https://i.ytimg.com/vi/B-aVuyhvLHU/maxresdefault.jpg', '3x12', '60 seg', 'https://www.youtube.com/shorts/R0f2Of6Sl2A'),
(188, 36, 'Zancadas caminando', 'https://i.ytimg.com/vi/QOVaHwm-Q6U/maxresdefault.jpg', '3x15', '60 seg', 'https://www.youtube.com/shorts/isqPvmo5dvc'),
(189, 36, 'Remo en polea', 'public/img/ejercicios/1765473401_Captura de pantalla 2025-12-11 181453.png', '3x12', '60 seg', 'https://www.youtube.com/shorts/soxtqUNRt6E'),
(190, 36, 'Curl bíceps barra', 'public/img/ejercicios/1765473401_Captura de pantalla 2025-12-11 181615.png', '3x12', '45 seg', 'https://www.youtube.com/shorts/ojMiS9BclK0'),
(191, 36, 'Extensión tríceps polea', 'https://i.ytimg.com/vi/2-LAMcpzODU/maxresdefault.jpg', '3x12', '45 seg', 'https://www.youtube.com/shorts/X7pe4Laknis'),
(192, 36, 'Elevaciones laterales', 'public/img/ejercicios/1765473825_Captura de pantalla 2025-12-11 182319.png', '3x15', '45 seg', 'https://www.youtube.com/shorts/rv44DZhCO1g'),
(193, 36, 'Crunch abdominal', 'https://i.ytimg.com/vi/Xyd_fa5zoEU/maxresdefault.jpg', '3x20', '30 seg', 'https://www.youtube.com/shorts/U2Pxw_PLfXc'),
(194, 37, 'Saltos pliométricos al cajón', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182505.png', '5x5', '90 seg', 'https://www.youtube.com/shorts/Hlyi9CCksrw'),
(195, 37, 'Sprints 40m', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182546.png', '6 reps', '120 seg', 'https://www.youtube.com/shorts/I-mQy77zWMs'),
(196, 37, 'Salto lateral explosivo', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182701.png', '4x10', '60 seg', 'https://www.youtube.com/shorts/k-VrB9tyv4Q'),
(197, 37, 'Skipping alto', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182749.png', '4x30 seg', '45 seg', 'https://www.youtube.com/shorts/hI3CO9admoc'),
(198, 37, 'Saltos en profundidad', 'public/img/ejercicios/1765474314_Captura de pantalla 2025-12-11 182936.png', '4x6', '90 seg', 'https://www.youtube.com/watch?v=9pJhsS933a8'),
(199, 37, 'Aceleraciones cortas', 'public/img/ejercicios/1765474314_Captura de pantalla 2025-12-11 183029.png', '6x20m', '60 seg', 'https://www.youtube.com/shorts/1F3bP-iAFy4'),
(200, 37, 'Saltos con rodillas al pecho', 'public/img/ejercicios/1765474314_Captura de pantalla 2025-12-11 183139.png', '4x12', '60 seg', 'https://www.youtube.com/watch?v=_flxD23Cql4'),
(201, 38, 'Burpees', 'https://i.ytimg.com/vi/TU8QYVW0gDU/maxresdefault.jpg', '3x15', '45 seg', 'https://www.youtube.com/shorts/EkK3oVBA__Q'),
(202, 38, 'Plancha dinámica', 'https://i.ytimg.com/vi/pSHjTRCQxIw/maxresdefault.jpg', '3x40 seg', '45 seg', 'https://www.youtube.com/shorts/RyGg5HE-JUA'),
(203, 38, 'Jumping jacks', 'https://i.ytimg.com/vi/c4DAnQ6DtF8/maxresdefault.jpg', '3x50', '30 seg', 'https://www.youtube.com/shorts/vjKGK90UJHQ'),
(204, 38, 'Mountain climbers', 'https://i.ytimg.com/vi/cnyTQDSE884/maxresdefault.jpg', '3x40 seg', '30 seg', 'https://www.youtube.com/shorts/Fb79R7IUwYE'),
(205, 38, 'Sentadilla con salto', 'https://i.ytimg.com/vi/aclHkVaku9U/maxresdefault.jpg', '3x20', '45 seg', 'https://www.youtube.com/watch?v=IiHH0EWo8-k'),
(206, 38, 'Estiramiento full body', 'https://i.ytimg.com/vi/Eml2xnoLpYE/maxresdefault.jpg', '10 min', '--', 'https://www.youtube.com/shorts/VtC3fzjDBho'),
(207, 38, 'Salto cuerda', 'public/img/ejercicios/1765474384_Captura de pantalla 2025-12-11 183250.png', '3x2 min', '45 seg', 'https://www.youtube.com/shorts/jqtzzVesUOo'),
(208, 39, 'Sentadilla con salto', 'https://i.ytimg.com/vi/aclHkVaku9U/maxresdefault.jpg', '3x12', '60 seg', 'https://www.youtube.com/shorts/9hi65bciMdA'),
(209, 39, 'Fondos en banco', 'https://i.ytimg.com/vi/0326dy_-CzM/maxresdefault.jpg', '3x10', '60 seg', 'https://www.youtube.com/shorts/wN_9d37DO4M'),
(210, 39, 'Puente de glúteo', 'public/img/ejercicios/1765474472_Captura de pantalla 2025-12-11 183356.png', '3x12', '45 seg', 'https://www.youtube.com/shorts/52nTrd9g5hw'),
(211, 39, 'Elevaciones laterales', 'public/img/ejercicios/1765474472_Captura de pantalla 2025-12-11 182319.png', '3x12', '45 seg', 'https://www.youtube.com/shorts/rv44DZhCO1g'),
(212, 39, 'Remo mancuerna', 'https://i.ytimg.com/vi/kBWAon7ItDw/maxresdefault.jpg', '3x12', '45 seg', 'https://www.youtube.com/shorts/vCP--OPYg84'),
(213, 39, 'Crunch', 'https://i.ytimg.com/vi/Xyd_fa5zoEU/maxresdefault.jpg', '3x15', '45 seg', 'https://www.youtube.com/shorts/8NMGT13hvwM'),
(214, 39, 'Plancha', 'https://i.ytimg.com/vi/pSHjTRCQxIw/maxresdefault.jpg', '3x30 seg', '30 seg', 'https://www.youtube.com/shorts/OY1Arkll11Q'),
(215, 40, 'Wall balls', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 203640.png', '3x15', '60 seg', 'https://www.youtube.com/shorts/RIoMKywzu4k'),
(216, 40, 'Empuje de trineo', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 203813.png', '3x20m', '120 seg', 'https://www.youtube.com/shorts/8DUJXnsQ8E4'),
(217, 40, 'Farmer walks', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 203926.png', '3x40m', '90 seg', 'https://www.youtube.com/shorts/HDoNIkik8r8'),
(218, 40, 'Burpee broad jump', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 021038.png', '3x10', '90 seg', 'https://www.youtube.com/watch?v=4JjCzeWN_Z4'),
(219, 40, 'Remoergómetro 500m', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 204314.png', '3 rondas', '2 min', 'https://www.youtube.com/shorts/-gKLSU5H6vw'),
(220, 40, 'Kettlebell swings', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 204501.png', '3x20', '60 seg', 'https://www.youtube.com/shorts/moK1eINw7NY'),
(221, 40, 'Carrera 1km', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 183029.png', '1', '--', 'https://www.youtube.com/shorts/P0M6HUHnU7o'),
(222, 41, 'Sentarse y levantarse', 'public/img/ejercicios/1765483384_Captura de pantalla 2025-12-11 204805.png', '3x10', '60 seg', 'https://www.youtube.com/shorts/cxbzaayoen8'),
(223, 41, 'Elevación de talones', 'public/img/ejercicios/1765483384_Captura de pantalla 2025-12-11 204943.png', '3x12', '60 seg', 'https://www.youtube.com/shorts/JhDqNv2DoAU'),
(224, 41, 'Marcha ligera en sitio', 'public/img/ejercicios/1765483384_Captura de pantalla 2025-12-11 182749.png', '3x1 min', '45 seg', 'https://www.youtube.com/shorts/QWgnNAGFrdM'),
(225, 41, 'Rotación suave de hombros', 'public/img/ejercicios/1765483384_Captura de pantalla 2025-12-11 205556.png', '3x15', '30 seg', 'https://www.youtube.com/shorts/308hAf6SMwQ'),
(226, 41, 'Estiramiento de cuello', 'public/img/ejercicios/1765483384_Captura de pantalla 2025-12-11 205957.png', '3x30 seg', '20 seg', 'https://www.youtube.com/shorts/iA_8q5PWAp0'),
(227, 41, 'Respiración diafragmática', 'public/img/ejercicios/1765483384_Captura de pantalla 2025-12-11 210143.png', '5 min', '--', 'https://www.youtube.com/shorts/ZQUdemLljwM'),
(228, 41, 'Estiramiento suave general', 'public/img/ejercicios/1765483384_Captura de pantalla 2025-12-11 210235.png', '10 min', '--', 'https://www.youtube.com/shorts/VtC3fzjDBho'),
(286, 49, 'Press militar mancuernas', 'https://i.ytimg.com/vi/B-aVuyhvLHU/maxresdefault.jpg', '3x12', '60 seg', 'https://www.youtube.com/shorts/R0f2Of6Sl2A'),
(287, 49, 'Zancadas caminando', 'https://i.ytimg.com/vi/QOVaHwm-Q6U/maxresdefault.jpg', '3x15', '60 seg', 'https://www.youtube.com/shorts/isqPvmo5dvc'),
(288, 49, 'Remo en polea', 'public/img/ejercicios/1765473401_Captura de pantalla 2025-12-11 181453.png', '3x12', '60 seg', 'https://www.youtube.com/shorts/soxtqUNRt6E'),
(289, 49, 'Curl bíceps barra', 'public/img/ejercicios/1765473401_Captura de pantalla 2025-12-11 181615.png', '3x12', '45 seg', 'https://www.youtube.com/shorts/ojMiS9BclK0'),
(290, 49, 'Extensión tríceps polea', 'https://i.ytimg.com/vi/2-LAMcpzODU/maxresdefault.jpg', '3x12', '45 seg', 'https://www.youtube.com/shorts/X7pe4Laknis'),
(291, 49, 'Elevaciones laterales', 'public/img/ejercicios/1765473825_Captura de pantalla 2025-12-11 182319.png', '3x15', '45 seg', 'https://www.youtube.com/shorts/rv44DZhCO1g'),
(292, 49, 'Crunch abdominal', 'https://i.ytimg.com/vi/Xyd_fa5zoEU/maxresdefault.jpg', '3x20', '30 seg', 'https://www.youtube.com/shorts/U2Pxw_PLfXc'),
(293, 50, 'Wall balls', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 203640.png', '3x15', '60 seg', 'https://www.youtube.com/shorts/RIoMKywzu4k'),
(294, 50, 'Empuje de trineo', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 203813.png', '3x20m', '120 seg', 'https://www.youtube.com/shorts/8DUJXnsQ8E4'),
(295, 50, 'Farmer walks', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 203926.png', '3x40m', '90 seg', 'https://www.youtube.com/shorts/HDoNIkik8r8'),
(296, 50, 'Burpee broad jump', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 021038.png', '3x10', '90 seg', 'https://www.youtube.com/watch?v=4JjCzeWN_Z4'),
(297, 50, 'Remoergómetro 500m', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 204314.png', '3 rondas', '2 min', 'https://www.youtube.com/shorts/-gKLSU5H6vw'),
(298, 50, 'Kettlebell swings', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 204501.png', '3x20', '60 seg', 'https://www.youtube.com/shorts/moK1eINw7NY'),
(299, 50, 'Carrera 1km', 'public/img/ejercicios/1765482408_Captura de pantalla 2025-12-11 183029.png', '1', '--', 'https://www.youtube.com/shorts/P0M6HUHnU7o'),
(300, 51, 'Press banca', 'https://i.ytimg.com/vi/rT7DgCr-3pg/maxresdefault.jpg', '4x10', '90 seg', ''),
(301, 51, 'Sentadilla con barra', 'public/img/ejercicios/1765473220_Captura de pantalla 2025-12-11 181315.png', '4x8', '120 seg', ''),
(302, 51, 'Peso muerto', 'https://i.ytimg.com/vi/op9kVnSso6Q/maxresdefault.jpg', '3x6', '150 seg', ''),
(303, 51, 'Dominadas', 'https://i.ytimg.com/vi/eGo4IYlbE5g/maxresdefault.jpg', '3x8', '90 seg', ''),
(304, 51, 'Press militar con Barra', 'public/img/ejercicios/1765488900_Captura de pantalla 2025-12-11 223344.png', '3x10', '60 seg', ''),
(305, 51, 'Fondos en paralelas', 'public/img/ejercicios/1765473134_Captura de pantalla 2025-12-11 181151.png', '3x10', '75 seg', ''),
(306, 51, 'Remo con barra', 'https://i.ytimg.com/vi/kBWAon7ItDw/maxresdefault.jpg', '4x8', '90 seg', ''),
(307, 52, 'Saltos pliométricos al cajón', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182505.png', '5x5', '90 seg', 'https://www.youtube.com/shorts/Hlyi9CCksrw'),
(308, 52, 'Sprints 40m', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182546.png', '6 reps', '120 seg', 'https://www.youtube.com/shorts/I-mQy77zWMs'),
(309, 52, 'Salto lateral explosivo', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182701.png', '4x10', '60 seg', 'https://www.youtube.com/shorts/k-VrB9tyv4Q'),
(310, 52, 'Skipping alto', 'public/img/ejercicios/1765474313_Captura de pantalla 2025-12-11 182749.png', '4x30 seg', '45 seg', 'https://www.youtube.com/shorts/hI3CO9admoc'),
(311, 52, 'Saltos en profundidad', 'public/img/ejercicios/1765474314_Captura de pantalla 2025-12-11 182936.png', '4x6', '90 seg', 'https://www.youtube.com/watch?v=9pJhsS933a8'),
(312, 52, 'Aceleraciones cortas', 'public/img/ejercicios/1765474314_Captura de pantalla 2025-12-11 183029.png', '6x20m', '60 seg', 'https://www.youtube.com/shorts/1F3bP-iAFy4'),
(313, 52, 'Saltos con rodillas al pecho', 'public/img/ejercicios/1765474314_Captura de pantalla 2025-12-11 183139.png', '4x12', '60 seg', 'https://www.youtube.com/watch?v=_flxD23Cql4'),
(314, 53, 'Press militar mancuernas', 'https://i.ytimg.com/vi/B-aVuyhvLHU/maxresdefault.jpg', '3x12', '60 seg', 'https://www.youtube.com/shorts/R0f2Of6Sl2A'),
(315, 53, 'Zancadas caminando', 'https://i.ytimg.com/vi/QOVaHwm-Q6U/maxresdefault.jpg', '3x15', '60 seg', 'https://www.youtube.com/shorts/isqPvmo5dvc'),
(316, 53, 'Remo en polea', 'public/img/ejercicios/1765473401_Captura de pantalla 2025-12-11 181453.png', '3x12', '60 seg', 'https://www.youtube.com/shorts/soxtqUNRt6E'),
(317, 53, 'Curl bíceps barra', 'public/img/ejercicios/1765473401_Captura de pantalla 2025-12-11 181615.png', '3x12', '45 seg', 'https://www.youtube.com/shorts/ojMiS9BclK0'),
(318, 53, 'Extensión tríceps polea', 'https://i.ytimg.com/vi/2-LAMcpzODU/maxresdefault.jpg', '3x12', '45 seg', 'https://www.youtube.com/shorts/X7pe4Laknis'),
(319, 53, 'Elevaciones laterales', 'public/img/ejercicios/1765473825_Captura de pantalla 2025-12-11 182319.png', '3x15', '45 seg', 'https://www.youtube.com/shorts/rv44DZhCO1g'),
(320, 53, 'Crunch abdominal', 'https://i.ytimg.com/vi/Xyd_fa5zoEU/maxresdefault.jpg', '3x20', '30 seg', 'https://www.youtube.com/shorts/U2Pxw_PLfXc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('empleado','admin') DEFAULT 'empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `dni`, `telefono`, `email`, `foto`, `usuario`, `password`, `rol`) VALUES
(1, 'Santiago', 'Torres', 'Y8888888Q', '645654654', 'Santiago.torres01@outlook.es', 'empleado_1.png', 'san.torres', '$2y$10$/IbjOk201FuCM1OSRZ0oKeaEDLNCuGvHyEqziGad695Zxc4P.XduG', 'empleado'),
(2, 'Eva', 'Naveira', '12345678A', '999555888', 'eva@fw.com', 'empleado_2.png', 'eva.naveira', '$2y$10$/IbjOk201FuCM1OSRZ0oKeaEDLNCuGvHyEqziGad695Zxc4P.XduG', 'empleado'),
(3, 'Fernando', 'Prado', '45454545A', '666555444', 'fer@fw.com', 'empleado_3.png', 'fer.prado', '$2y$10$/IbjOk201FuCM1OSRZ0oKeaEDLNCuGvHyEqziGad695Zxc4P.XduG', 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `dia_semana` enum('lunes','martes','miercoles','jueves','viernes','sabado') NOT NULL,
  `hora` time NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `actividad_id` int(11) NOT NULL,
  `apuntados` int(11) DEFAULT 0,
  `estado` enum('pendiente','realizada','cancelada') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `dia_semana`, `hora`, `empleado_id`, `actividad_id`, `apuntados`, `estado`) VALUES
(1, 'lunes', '10:00:00', 3, 1, 17, 'realizada'),
(2, 'lunes', '11:00:00', 3, 2, 0, 'cancelada'),
(3, 'lunes', '12:00:00', 3, 3, 0, 'cancelada'),
(4, 'lunes', '18:00:00', 2, 15, 0, 'pendiente'),
(5, 'lunes', '19:00:00', 2, 8, 0, 'pendiente'),
(6, 'lunes', '20:00:00', 2, 2, 18, 'realizada'),
(7, 'martes', '10:00:00', 3, 4, 30, 'realizada'),
(8, 'martes', '11:00:00', 3, 5, 0, 'cancelada'),
(9, 'martes', '12:00:00', 3, 6, 6, 'realizada'),
(10, 'martes', '17:00:00', 2, 7, 0, 'pendiente'),
(11, 'martes', '18:00:00', 2, 2, 0, 'pendiente'),
(12, 'martes', '19:00:00', 2, 3, 0, 'pendiente'),
(13, 'martes', '20:00:00', 2, 6, 0, 'pendiente'),
(14, 'miercoles', '10:00:00', 2, 2, 18, 'realizada'),
(15, 'miercoles', '11:00:00', 2, 9, 0, 'cancelada'),
(16, 'miercoles', '12:00:00', 2, 3, 20, 'realizada'),
(17, 'miercoles', '18:00:00', 1, 5, 15, 'realizada'),
(18, 'miercoles', '19:00:00', 1, 9, 18, 'realizada'),
(19, 'miercoles', '20:00:00', 1, 4, 16, 'realizada'),
(20, 'jueves', '10:00:00', 2, 13, 20, 'realizada'),
(21, 'jueves', '11:00:00', 2, 14, 4, 'cancelada'),
(22, 'jueves', '12:00:00', 2, 2, 20, 'realizada'),
(23, 'jueves', '17:00:00', 1, 7, 3, 'realizada'),
(24, 'jueves', '18:00:00', 1, 10, 20, 'realizada'),
(25, 'jueves', '19:00:00', 1, 8, 18, 'realizada'),
(26, 'jueves', '20:00:00', 1, 1, 10, 'realizada'),
(27, 'viernes', '10:00:00', 1, 11, 3, 'cancelada'),
(28, 'viernes', '11:00:00', 1, 8, 0, 'pendiente'),
(29, 'viernes', '12:00:00', 1, 10, 20, 'realizada'),
(30, 'viernes', '18:00:00', 3, 9, 0, 'pendiente'),
(31, 'viernes', '19:00:00', 3, 3, 0, 'pendiente'),
(32, 'viernes', '20:00:00', 3, 12, 0, 'pendiente'),
(33, 'sabado', '10:00:00', 1, 4, 0, 'pendiente'),
(34, 'sabado', '11:00:00', 1, 5, 0, 'pendiente'),
(35, 'sabado', '12:00:00', 1, 6, 0, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `objetivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id`, `nombre`, `objetivo`) VALUES
(35, 'Mr Increíble: Hipertrofia / Aumento de masa muscul', '💪 Mr Increíble: Hipertrofia / Aumento de masa muscular'),
(36, 'Frozono: Tonificación', '❄️ Frozono: Tonificación'),
(37, 'Dash: Atletas (pliometria, potencia)', '⚡ Dash: Atletas (pliometría, potencia)'),
(38, 'Elastic Girl: Pérdida de grasa +Flexibilidad', '🔥 Elastic Girl: Pérdida de grasa + Flexibilidad'),
(39, 'Violeta: Adolescentes principiantes', '🟣 Violeta: Adolescentes principiantes'),
(40, 'Jack Jack: HYROX / CROSSFIT / IRONMAN', '🏋️ Jack Jack: HYROX / CROSSFIT / IRONMAN'),
(41, 'Edna Moda: Recuperación funcional / +65', '🧓 Edna Moda: Recuperación funcional / +65'),
(49, 'juan', '❄️ Frozono: Tonificación'),
(50, 'Fernando', '🏋️ Jack Jack: HYROX / CROSSFIT / IRONMAN'),
(51, 'jaja', '💪 Mr Increíble: Hipertrofia / Aumento de masa muscular'),
(52, 's', '⚡ Dash: Atletas (pliometría, potencia)'),
(53, 'juan', '❄️ Frozono: Tonificación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina_ejercicios`
--

CREATE TABLE `rutina_ejercicios` (
  `id` int(11) NOT NULL,
  `id_rutina` int(11) NOT NULL,
  `id_ejercicio` int(11) NOT NULL,
  `dia` int(2) NOT NULL,
  `series` varchar(20) DEFAULT NULL,
  `repeticiones` varchar(20) DEFAULT NULL,
  `descanso` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(12) NOT NULL,
  `edad` int(11) NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `patologias` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `dni`, `edad`, `objetivo`, `email`, `patologias`) VALUES
(15, 'poroto', 'cubero', '546546545', 22, '💪 Mr Increíble: Hipertrofia / Aumento de masa muscular', 'poroto@cubero.com', 'tobillo'),
(16, 'juan', 'calvo', 'calvo5454', 300, '❄️ Frozono: Tonificación', 'calvo@calvo.com', 'calvo'),
(19, 'lorena', 'rodriguez', '56456465a', 25, '🧓 Edna Moda: Recuperación funcional / +65', 'lore@lore.com', 'muchas'),
(21, 'juan', 'pepito', 'x8888888q', 16, '⚡ Dash: Atletas (pliometría, potencia)', 'pepito@com.com', 's'),
(22, 'albert', 'jaja', 'y65666666', 18, '🔥 Elastic Girl: Pérdida de grasa + Flexibilidad', 'Santiago.torres01@outlook.es', 'sk'),
(23, 'asd', 'sdda', 'asdsdsdas', 42, '🟣 Violeta: Adolescentes principiantes', 'darwin@gmi.lc', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_backup`
--

CREATE TABLE `usuarios_backup` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(12) NOT NULL,
  `edad` int(11) NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `patologias` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_backup`
--

INSERT INTO `usuarios_backup` (`id`, `nombre`, `apellidos`, `dni`, `edad`, `objetivo`, `email`, `patologias`) VALUES
(0, 'javier', 'aldo', '566666666', 25, '🏋️ Jack Jack: HYROX / CROSSFIT / IRONMAN', 'Santiago.torres01@outlook.es', 'si'),
(1, 'Santiago', 'Torres', 'y65666666', 25, '⚡ Dash: Atletas (pliometría, potencia)', 'Santiago.torres01@outlook.es', ''),
(2, 'jenny', 'requena', '888888888', 95, '❄️ Frozono: Tonificación', 'Santiago.torres01@outlook.es', ''),
(3, 'elena', 'casas', 'lkajslkdh', 28, '❄️ Frozono: Tonificación', 'elenacasas36@gmail.com', 'menisco y ligamento cruzado anterior de pierna izquierda'),
(4, 'Santiago', 'Torres', 'y65666666', 18, '⚡ Dash: Atletas (pliometría, potencia)', 'Santiago.torres01@outlook.es', ''),
(5, 'juan', 'asd', 'asdasdasd', 55, '🧓 Edna Moda: Recuperación funcional / +65', 'asdas@k.vv', 'asdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_rutinas`
--

CREATE TABLE `usuarios_rutinas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `rutina_id` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_rutinas`
--

INSERT INTO `usuarios_rutinas` (`id`, `usuario_id`, `rutina_id`, `fecha_asignacion`) VALUES
(18, 19, 41, '2025-12-09 20:48:01'),
(19, 16, 36, '2025-12-10 11:48:06'),
(27, 21, 39, '2025-12-10 15:56:01'),
(30, 22, 38, '2025-12-11 22:46:22'),
(32, 15, 35, '2025-12-12 04:00:30'),
(33, 23, 36, '2025-12-12 08:18:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aforo`
--
ALTER TABLE `aforo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aforo_fecha_hora` (`fecha`,`hora`),
  ADD KEY `fk_aforo_empleado` (`empleado_id`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutina_id` (`rutina_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hor_empleado` (`empleado_id`),
  ADD KEY `fk_hor_actividad` (`actividad_id`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutina_ejercicios`
--
ALTER TABLE `rutina_ejercicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rutina` (`id_rutina`),
  ADD KEY `fk_ejercicio` (`id_ejercicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_backup`
--
ALTER TABLE `usuarios_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_rutinas`
--
ALTER TABLE `usuarios_rutinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario` (`usuario_id`),
  ADD KEY `fk_rutina` (`rutina_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `aforo`
--
ALTER TABLE `aforo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `rutina_ejercicios`
--
ALTER TABLE `rutina_ejercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios_rutinas`
--
ALTER TABLE `usuarios_rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aforo`
--
ALTER TABLE `aforo`
  ADD CONSTRAINT `fk_aforo_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_ibfk_1` FOREIGN KEY (`rutina_id`) REFERENCES `rutinas` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_hor_actividad` FOREIGN KEY (`actividad_id`) REFERENCES `actividades` (`id`),
  ADD CONSTRAINT `fk_hor_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `rutina_ejercicios`
--
ALTER TABLE `rutina_ejercicios`
  ADD CONSTRAINT `rutina_ejercicios_ibfk_1` FOREIGN KEY (`id_rutina`) REFERENCES `rutinas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rutina_ejercicios_ibfk_2` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios_rutinas`
--
ALTER TABLE `usuarios_rutinas`
  ADD CONSTRAINT `fk_rutina` FOREIGN KEY (`rutina_id`) REFERENCES `rutinas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
