-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 08:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trojes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoriaproducto`
--

CREATE TABLE `categoriaproducto` (
  `id_categoria_producto` int(11) NOT NULL,
  `nombre_categoria_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoriaproducto`
--

INSERT INTO `categoriaproducto` (`id_categoria_producto`, `nombre_categoria_producto`) VALUES
(1, 'Alimentos y Bebidas'),
(2, 'Electrónica'),
(3, 'Ropa y Calzado'),
(4, 'Hogar y Cocina'),
(5, 'Muebles'),
(6, 'Herramientas y Equipos'),
(7, 'Deportes y Aire Libre'),
(8, 'Libros y Papelería'),
(9, 'Salud y Belleza'),
(10, 'Mascotas'),
(11, 'Automotriz'),
(12, 'Juguetes y Juegos'),
(13, 'Agricultura y Ganadería'),
(14, 'Construcción'),
(15, 'Servicios');

-- --------------------------------------------------------

--
-- Table structure for table `categoriaservicio`
--

CREATE TABLE `categoriaservicio` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoriaservicio`
--

INSERT INTO `categoriaservicio` (`id_categoria`, `nombre_categoria`) VALUES
(11, 'Servicios Agricolas y Ganaderos'),
(1, 'Servicios Basicos'),
(4, 'Servicios Comerciales'),
(13, 'Servicios de Alojamiento'),
(8, 'Servicios de Recreacion y Entretenimiento'),
(6, 'Servicios de Reparacion y Mantenimiento'),
(3, 'Servicios de Salud'),
(7, 'Servicios de Seguridad y Proteccion'),
(5, 'Servicios de Transporte'),
(2, 'Servicios Educativos'),
(10, 'Servicios Financieros'),
(15, 'Servicios Funerarios'),
(14, 'Servicios Industriales'),
(12, 'Servicios Publicos y Gubernamentales'),
(9, 'Servicios Religiosos');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `id_categoria_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registralugar`
--

CREATE TABLE `registralugar` (
  `id_lugar` int(11) NOT NULL,
  `nombre_lugar` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  `enlace` varchar(255) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'administrador'),
(2, 'corriente');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_servicio`, `descripcion`, `id_categoria`) VALUES
(1, 'Agua potable', 'Suministro de agua potable', 1),
(2, 'Electricidad', 'Provisión de electricidad', 1),
(3, 'Alcantarillado y tratamiento de aguas residuales', 'Sistema de alcantarillado y tratamiento de aguas', 1),
(4, 'Recolección de basura', 'Servicio de recolección de desechos', 1),
(5, 'Gas', 'Suministro de gas para uso doméstico e industrial', 1),
(6, 'Telefonía e internet', 'Servicios de telecomunicaciones', 1),
(7, 'Escuelas primarias', 'Educación básica para niños', 2),
(8, 'Escuelas secundarias', 'Educación secundaria', 2),
(9, 'Colegios técnicos', 'Formación técnica profesional', 2),
(10, 'Centros de educación para adultos', 'Programas educativos para adultos', 2),
(11, 'Bibliotecas públicas', 'Acceso a libros y recursos educativos', 2),
(12, 'Clínicas de atención primaria', 'Servicios médicos básicos', 3),
(13, 'Farmacias', 'Venta de medicamentos y productos de salud', 3),
(14, 'Consultorios médicos y dentales', 'Consultas médicas y odontológicas', 3),
(15, 'Centros de salud comunitarios', 'Atención médica integral en la comunidad', 3),
(16, 'Veterinarias', 'Atención médica para animales', 3),
(17, 'Tiendas de abarrotes', 'Venta de productos de uso diario', 4),
(18, 'Panaderías', 'Venta de pan y productos de repostería', 4),
(19, 'Carnicerías', 'Venta de carne y productos cárnicos', 4),
(20, 'Mercados locales', 'Espacios para la venta de productos frescos', 4),
(21, 'Supermercados', 'Tiendas de autoservicio grandes', 4),
(22, 'Comedores populares y restaurantes', 'Servicio de alimentos', 4),
(23, 'Tiendas de ropa y calzado', 'Venta de prendas y calzado', 4),
(24, 'Estaciones de autobuses', 'Puntos de partida y llegada de autobuses', 5),
(25, 'Taxis', 'Servicio de transporte privado', 5),
(26, 'Estaciones de servicio', 'Gasolineras y mantenimiento de vehículos', 5),
(27, 'Talleres mecánicos', 'Reparación y mantenimiento de vehículos', 5),
(28, 'Lavado de autos', 'Servicios de limpieza de vehículos', 5),
(29, 'Talleres de soldadura', 'Servicios de soldadura y metalurgia', 5),
(30, 'Reparación de bicicletas y motocicletas', 'Servicios de reparación para bicicletas y motos', 5),
(31, 'Talleres de soldadura', 'Servicios de soldadura para diversas aplicaciones', 6),
(32, 'Talleres de mecánica automotriz', 'Reparación de vehículos', 6),
(33, 'Servicios de plomería', 'Reparación y mantenimiento de sistemas de plomería', 6),
(34, 'Electricistas', 'Servicios de electricidad y mantenimiento', 6),
(35, 'Reparación de electrodomésticos', 'Reparación de dispositivos y electrodomésticos', 6),
(36, 'Carpintería', 'Servicios de carpintería y madera', 6),
(37, 'Estación de policía', 'Seguridad y vigilancia en la comunidad', 7),
(38, 'Cuerpo de bomberos', 'Servicios de emergencia y rescate', 7),
(39, 'Seguridad privada', 'Servicios de vigilancia privada', 7),
(40, 'Protección civil', 'Servicios de protección y emergencias', 7),
(41, 'Parques y áreas recreativas', 'Espacios para el esparcimiento', 8),
(42, 'Cancha de fútbol o baloncesto', 'Instalaciones deportivas para el público', 8),
(43, 'Centros comunitarios', 'Espacios para actividades comunitarias', 8),
(44, 'Gimnasios locales', 'Centros para hacer ejercicio y mantenerse en forma', 8),
(45, 'Plazas públicas', 'Espacios para eventos y reuniones', 8),
(46, 'Eventos comunitarios', 'Ferias, festivales y mercados', 8),
(47, 'Iglesias', 'Lugares de culto y espiritualidad', 9),
(48, 'Templos o lugares de culto', 'Espacios religiosos de diversas creencias', 9),
(49, 'Centros comunitarios religiosos', 'Espacios para actividades religiosas y comunitarias', 9),
(50, 'Bancos', 'Instituciones financieras', 10),
(51, 'Cajeros automáticos', 'Puntos de acceso a servicios bancarios', 10),
(52, 'Cooperativas de crédito', 'Organizaciones de ahorro y crédito', 10),
(53, 'Cajas populares', 'Instituciones de financiamiento comunitario', 10),
(54, 'Casas de empeño', 'Servicios de préstamo mediante garantía', 10),
(55, 'Tiendas de insumos agrícolas', 'Venta de productos agrícolas', 11),
(56, 'Servicios de veterinaria para ganado', 'Atención veterinaria para animales de granja', 11),
(57, 'Molinos de granos', 'Procesamiento de granos', 11),
(58, 'Almacenes de semillas y fertilizantes', 'Venta de insumos agrícolas', 11),
(59, 'Asesoramiento agrícola', 'Orientación sobre prácticas agrícolas', 11),
(60, 'Ayuntamiento o alcaldía', 'Administración del gobierno local', 12),
(61, 'Juzgados municipales', 'Servicios judiciales y legales', 12),
(62, 'Oficinas de correos', 'Servicios postales y de mensajería', 12),
(63, 'Registro civil', 'Registro de eventos vitales', 12),
(64, 'Centros de votación', 'Lugares para ejercer el derecho al voto', 12),
(65, 'Estación de policía municipal', 'Seguridad pública a nivel municipal', 12),
(66, 'Hoteles y hostales', 'Opciones de hospedaje para visitantes', 13),
(67, 'Casas de huéspedes', 'Alojamiento en casas particulares', 13),
(68, 'Cabañas rurales', 'Opciones de hospedaje en áreas rurales', 13),
(69, 'Fábricas o talleres de manufactura', 'Producción industrial', 14),
(70, 'Servicios de minería', 'Servicios relacionados con la minería', 14),
(71, 'Almacenes industriales', 'Almacenamiento de productos industriales', 14),
(72, 'Funerarias', 'Servicios funerarios y de inhumación', 15),
(73, 'Cementerios', 'Lugares de descanso eterno', 15),
(74, 'Servicios de cremación', 'Opciones de cremación de restos humanos', 15);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `contrasena`, `id_rol`) VALUES
(1, 'Tony', 'Allonzo', 'toaftony86@gmail.com', 'Trojes86??', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD PRIMARY KEY (`id_categoria_producto`);

--
-- Indexes for table `categoriaservicio`
--
ALTER TABLE `categoriaservicio`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_lugar` (`id_lugar`),
  ADD KEY `id_categoria_producto` (`id_categoria_producto`);

--
-- Indexes for table `registralugar`
--
ALTER TABLE `registralugar`
  ADD PRIMARY KEY (`id_lugar`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  MODIFY `id_categoria_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categoriaservicio`
--
ALTER TABLE `categoriaservicio`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registralugar`
--
ALTER TABLE `registralugar`
  MODIFY `id_lugar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_lugar`) REFERENCES `registralugar` (`id_lugar`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_categoria_producto`) REFERENCES `categoriaproducto` (`id_categoria_producto`) ON DELETE CASCADE;

--
-- Constraints for table `registralugar`
--
ALTER TABLE `registralugar`
  ADD CONSTRAINT `registralugar_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `registralugar_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoriaservicio` (`id_categoria`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
