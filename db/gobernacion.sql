-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2025 a las 00:19:48
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
-- Base de datos: `gobernacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1748285611),
('m250526_185125_create_pacientes_table', 1748285614),
('m250526_185218_create_paciente_reportes_table', 1748285614),
('m250526_195417_add_pertenece_column_to_pacientes_table', 1748289365),
('m250526_195535_add_pertenece_column_to_paciente_reportes_table', 1748289365),
('m250526_200035_create_users_table', 1748289686),
('m250526_205957_add_profile_fields_to_users_table', 1748293231);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `tipo_identificacion` varchar(20) NOT NULL,
  `identificacion` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `municipio_residencia` varchar(100) DEFAULT NULL,
  `pais_origen` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pertenece` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `tipo_identificacion`, `identificacion`, `edad`, `telefono`, `direccion`, `municipio_residencia`, `pais_origen`, `created_at`, `updated_at`, `pertenece`) VALUES
(1, 'oscar gomez', 'CC', '84091548', 43, '3017683510', 'calle 36 #23b-45', 'Riohacha', 'COL', '2025-05-26 19:47:46', '2025-05-26 19:47:46', NULL),
(3, 'carlos ucros', 'CC', '2342234', 32, '21435', 'calle 36 #23b-45', 'Manaure', 'COL', '2025-05-26 20:50:42', '2025-05-26 20:50:42', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_reportes`
--

CREATE TABLE `paciente_reportes` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `fecha_reporte` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_notificacion_sivigila` date DEFAULT NULL,
  `ips_urgencia` varchar(150) DEFAULT NULL,
  `pertenencia_etnica` varchar(100) DEFAULT NULL,
  `eps` varchar(100) DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `evolucion_seguimiento` text DEFAULT NULL,
  `escala_alerta_temprana` varchar(50) DEFAULT NULL,
  `teleapoyo_hosp_padrino` varchar(10) DEFAULT NULL,
  `hospital_padrino` varchar(100) DEFAULT NULL,
  `respuesta_hosp_padrino` varchar(100) DEFAULT NULL,
  `requiere_remision` varchar(10) DEFAULT NULL,
  `hora_remision` time DEFAULT NULL,
  `entidad_remitida` varchar(150) DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `motivo_egreso` varchar(255) DEFAULT NULL,
  `responsable_reporte` varchar(150) DEFAULT NULL,
  `telefono_reporta` varchar(50) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pertenece` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `access_token` varchar(100) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'gestor',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `empresa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `auth_key`, `access_token`, `role`, `created_at`, `updated_at`, `nombre`, `telefono`, `direccion`, `email`, `empresa`) VALUES
(5, 'admin', '$2y$13$pN/jfDO4.lD3PGULefn4Y.rRfL2GIqHYcHAAubNWDpV7SXXWeJYxe', 'E0FHbTaqZwVKWZdEXkaW6SE3mMZv2ssR', 'fRoNIq8QkdTRbUCT2uhJGv0vO6o__UEo1A9VXy1UH4ZpPwghQeHKGWYWZx1JZHr0HZmQ7yEdsHAVAqPxos64uJ8uG1zols6eevLs', 'administrador', '2025-05-26 21:54:35', '2025-05-26 22:01:24', 'oscar gomez', '31232434', 'tal', 'ogringenieria@gmail.com', 'nueva eps'),
(6, 'gestor', '$2y$13$hx/.V6FWmCXQrcUGW.w/Ve8pYIRqXe28Lytcb5rSN2kB92lQqPBXu', 'Y13kmJt7XMIL5JsFp6Np2Cpa3m7IAXby', 'qDNokSW4SJVHuysawwUuzSUxVfVSsZYlTXE3pJ9KIOz3SqUUkLp_sX_KrvIPFSODqJOsQpfxc3j8B0SnuZ537UBxOuBu5qcAt-9D', 'gestor', '2025-05-26 22:05:38', '2025-05-26 22:14:28', 'gestor uno', '31232434', 'tal', 'gestoruno@gmail.com', 'nueva eps'),
(7, 'gestordos', '$2y$13$6Trj4mcNH/6UcREoSXgcSeJvW/ALe5T1drP3M7qk/qaFEKbo4ymae', 'vbTYr7uL8eiojMFPFU6UeveSoDtl9xM0', 'CdbId6wVanTlMSbVX0gabKixWnYzIrI9HqKDrfngNu6JWrxv4VrWweDnAPkiZoAiXesnyO8kjU-OlMUHaf8PGeTvLKvhdM8YNmWL', 'gestor', '2025-05-26 22:15:17', '2025-05-26 22:15:48', 'gestordos', '31232434', 'tal', 'gestordos@gmail.com', 'nueva eps');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacion` (`identificacion`);

--
-- Indices de la tabla `paciente_reportes`
--
ALTER TABLE `paciente_reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-paciente_reportes-paciente_id` (`paciente_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente_reportes`
--
ALTER TABLE `paciente_reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paciente_reportes`
--
ALTER TABLE `paciente_reportes`
  ADD CONSTRAINT `fk-paciente_reportes-paciente_id` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
