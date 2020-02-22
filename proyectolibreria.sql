-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-02-2020 a las 19:05:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectolibreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL,
  `nombreAutor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `nombreAutor`) VALUES
(1, 'Gabriel García Márquez'),
(2, 'Pablo Coelho'),
(3, 'Antoine de Saint-Exupéry'),
(4, 'Pablo Coelho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`, `estado`, `descripcion`) VALUES
(7, 'Novela', 1, 'Descripcion de pruebas novela'),
(8, 'Literatura Infantil', 1, 'Descripcion de prubas jejeje'),
(9, 'Nueva Categorias Redvers', 1, 'Nueva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `fechaComentario` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `valoracion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `fechaComentario`, `comentario`, `valoracion`, `estado`, `idLibro`, `idUsuario`) VALUES
(29, '2020-02-03', '1', 3, 1, 5, 1),
(33, '2020-02-15', 'TESTTT', 5, 1, 4, 1),
(46, '2020-02-09', 'wweewewe', 1, 1, 4, 1),
(47, '2020-02-09', 'wweewewe', 1, 1, 4, 1),
(52, '2020-02-15', 'ieryiuwyiur', 4, 1, 4, 1),
(54, '2020-02-13', '3rwerwer', 1, 1, 3, 1),
(57, '2020-02-15', 'weqeqwe', 1, 1, 3, 1),
(84, '2020-02-08', 'wewee', 1, 1, 5, 1),
(85, '2020-02-21', 'NUEVO comentario', 5, 1, 3, 1),
(86, '2020-01-31', 'Comentario hecho por el usuario 3', 1, 1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `idEditorial` int(11) NOT NULL,
  `nombreEditorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`idEditorial`, `nombreEditorial`) VALUES
(1, 'Editorial de Pruebas'),
(2, 'Reynal & Hitchcock'),
(3, 'Colombia Editores'),
(4, 'Editorial ABC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagen` int(11) NOT NULL,
  `nombreImagen` varchar(100) NOT NULL,
  `urlImagen` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `orden` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idImagen`, `nombreImagen`, `urlImagen`, `estado`, `orden`, `idLibro`) VALUES
(3, 'Principito Adicional', 'principito_adicional.png', 1, 3, 3),
(8, 'Imagen Secundaria', 'principito_reverso.png', 1, 2, 3),
(17, 'Principal', 'imagenLibro_1.png', 1, 1, 5),
(18, 'Secundario', 'imagenLibro_2.png', 1, 2, 5),
(19, 'Tercera Imagen', 'imagenLibro_3.png', 1, 3, 5),
(20, 'Cuarta Foto del Libro', 'imagenLibro_4.png', 1, 4, 5),
(24, 'NNombre_', 'imagenLibro_4.png', 0, 1, 3),
(25, 'Prueba', 'imagenLibro_4.png', 0, 1, 3),
(26, 'Prueba 2', 'imagenLibro_4.png', 0, 1, 3),
(28, 'Imagen Inaactiva', 'usuario_4.png', 0, 2, 3),
(29, 'Imagen nueva', 'usuario_6.png', 0, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `nombreLibro` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `estado` int(11) NOT NULL,
  `idEditorial` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `nombreLibro`, `descripcion`, `fechaPublicacion`, `precio`, `estado`, `idEditorial`, `idAutor`, `idCategoria`) VALUES
(3, 'Cien años de Soledad', 'Esta es la breve descripción del libro de Cien Años de Soledad.', '1967-01-01 00:00:00', '67800', 1, 3, 1, 7),
(4, 'El Principito', 'Esta es la descripción del libro El Principito.', '1943-04-06 00:00:00', '45900', 1, 2, 3, 8),
(5, 'El Poder de los 5 hábitos', 'Los hábitos empiezan sin que nos demos cuenta, se instalan inadvertidamente y para cuando queremos librarnos de ellos se han convertido en rutinas inamovibles. A veces surgen de un gesto cotidiano, como la sensación de relax que sentimos al llegar a casa y encender la tele. En ocasiones, se trata de hábitos inducidos, como usar dentífrico para cepillarse los dientes o utilizar ambientador.', '2018-02-02 00:00:00', '78999', 1, 1, 4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `nombres`, `apellidos`, `contrasena`, `estado`, `idRol`) VALUES
(1, 'rescobar', 'Redvers', 'Escobar Vaquer', 'holared', 1, 1),
(2, 'pmorales', 'Paula', 'Morales', 'holapaula', 1, 1),
(3, 'bpineros', 'Bryan', 'Pineros', 'holabryan', 1, 1),
(4, 'agarcia', 'Andrés', 'García', 'holanadres', 1, 1),
(5, 'jrivera', 'Julian', 'Rivera', 'holajulian', 1, 1),
(6, 'redvers', 'Redvers', 'Escobar', 'Hola55', 1, 1),
(7, 'redvers', 'Redvers', 'Escobar', 'Hola55', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idEditorial` (`idEditorial`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`idEditorial`) REFERENCES `editoriales` (`idEditorial`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `autores` (`idAutor`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
