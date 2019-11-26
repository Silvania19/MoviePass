-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2019 a las 02:48:16
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moviepass`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cinemas`
--

CREATE TABLE `cinemas` (
  `idCinema` int(11) NOT NULL,
  `idCine` int(11) DEFAULT NULL,
  `nameCinema` varchar(20) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cinemas`
--

INSERT INTO `cinemas` (`idCinema`, `idCine`, `nameCinema`, `capacity`, `price`) VALUES
(1, 1, 'sala 1', 40, 100),
(2, 1, 'sala 2', 20, 150),
(3, 2, 'sala 1', 50, 75),
(4, 2, 'sala 2', 20, 120),
(5, 3, 'sala 1', 20, 150),
(6, 3, 'sala 2', 25, 150),
(7, NULL, 'sala 3', 40, 150),
(8, NULL, '', 0, 0),
(10, 2, 'sala 3', 30, 150),
(11, 5, 'sala 1', 15, 150),
(12, 5, 'sala 2', 15, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cines`
--

CREATE TABLE `cines` (
  `idCine` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `idUserAdministrator` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cines`
--

INSERT INTO `cines` (`idCine`, `name`, `idUserAdministrator`, `address`) VALUES
(1, 'abblassador', 1, 'rivadavia 2209 mar del plata'),
(2, 'Gallegos', 1, ' Mar del plata gascon 3445'),
(3, 'Aldrey', 1, 'mar del plata la rawson 2344'),
(5, 'sil cine', 1, 'mar del plata rivadavia 2344');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `idGenre` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `idMovie` int(11) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `originalTitle` varchar(60) DEFAULT NULL,
  `originalLenguage` varchar(60) DEFAULT NULL,
  `overview` varchar(60) DEFAULT NULL,
  `posterPath` varchar(60) DEFAULT NULL,
  `releaseDate` date DEFAULT NULL,
  `idGenres` int(11) DEFAULT NULL,
  `backdropPath` varchar(60) DEFAULT NULL,
  `popularity` int(11) DEFAULT NULL,
  `voteCount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pays`
--

CREATE TABLE `pays` (
  `idPay` int(11) NOT NULL,
  `wayToPay` varchar(20) DEFAULT NULL,
  `idPurchase` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `numberAcount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pays`
--

INSERT INTO `pays` (`idPay`, `wayToPay`, `idPurchase`, `fecha`, `numberAcount`) VALUES
(1, 'master', 1, '2019-11-23 09:15:35', 1234567532),
(2, 'master', 1, '2019-11-23 09:15:35', 1234567532),
(3, 'master', 2, '2019-11-23 09:15:35', 1234567532),
(4, 'visa', 3, '2019-11-23 09:21:20', 1234567532),
(5, 'visa', 3, '2019-11-23 09:32:59', 1234567532),
(6, 'visa', 3, '2019-11-23 09:36:01', 1234567532),
(7, 'visa', 3, '2019-11-23 09:36:59', 1234567532),
(8, 'visa', 3, '2019-11-23 09:39:03', 1234567532),
(9, 'visa', 3, '2019-11-23 09:39:42', 1234567532),
(10, 'visa', 3, '2019-11-23 09:40:20', 1234567532),
(11, 'visa', 3, '2019-11-23 09:41:24', 1234567532),
(12, 'visa', 3, '2019-11-23 09:42:32', 1234567532),
(13, 'visa', 3, '2019-11-23 09:43:22', 1234567532),
(14, 'visa', 3, '2019-11-23 09:43:42', 1234567532),
(15, 'visa', 3, '2019-11-23 09:44:59', 1234567532),
(16, 'visa', 3, '2019-11-23 09:46:47', 1234567532),
(17, 'visa', 3, '2019-11-23 09:47:31', 1234567532),
(18, 'visa', 3, '2019-11-23 09:48:23', 1234567532),
(19, 'visa', 3, '2019-11-23 09:49:03', 1234567532),
(20, 'visa', 3, '2019-11-23 09:49:29', 1234567532),
(21, 'visa', 3, '2019-11-23 09:59:47', 1234567532),
(22, 'visa', 3, '2019-11-23 10:00:16', 1234567532),
(23, 'visa', 3, '2019-11-23 10:04:10', 1234567532),
(24, 'visa', 3, '2019-11-23 10:05:04', 1234567532),
(25, 'visa', 3, '2019-11-23 10:06:06', 1234567532),
(26, 'visa', 3, '2019-11-23 10:07:26', 1234567532),
(27, 'visa', 3, '2019-11-23 10:09:03', 1234567532),
(28, 'visa', 3, '2019-11-23 10:11:20', 1234567532),
(29, 'visa', 3, '2019-11-23 10:16:35', 1234567532),
(30, 'visa', 3, '2019-11-23 10:26:25', 1234567532),
(31, 'master', 4, '2019-11-25 01:54:48', 1234567532),
(32, 'master', 4, '2019-11-25 01:55:42', 1234567532),
(33, 'master', 4, '2019-11-25 01:56:25', 1234567532),
(34, 'master', 4, '2019-11-25 01:56:47', 1234567532),
(35, 'visa', 5, '2019-11-25 03:43:20', 12334),
(36, 'visa', 5, '2019-11-25 03:44:35', 12334),
(37, 'master', 6, '2019-11-25 02:36:18', 1234567532),
(38, 'master', 7, '2019-11-25 02:47:14', 1234567532);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projections`
--

CREATE TABLE `projections` (
  `idProjection` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `idMovie` int(11) DEFAULT NULL,
  `idCine` int(11) DEFAULT NULL,
  `idCinema` int(11) DEFAULT NULL,
  `duration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projections`
--

INSERT INTO `projections` (`idProjection`, `date`, `hour`, `idMovie`, `idCine`, `idCinema`, `duration`) VALUES
(1, '2019-11-30', '13:00:00', 290859, 1, 1, NULL),
(2, '2019-11-30', '13:00:00', 458897, 2, 4, NULL),
(4, '2019-11-26', '16:00:00', 474350, 3, 5, NULL),
(5, '2019-11-29', '16:00:00', 475557, 3, 5, NULL),
(8, '2019-11-27', '13:00:00', 423204, 3, 5, NULL),
(26, '2019-11-30', '13:00:00', 453405, 1, 2, NULL),
(29, '2019-11-29', '13:00:00', 640882, 5, 11, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `idPurchase` int(11) NOT NULL,
  `discount` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `quantityTickets` int(11) DEFAULT NULL,
  `idProjection` int(11) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`idPurchase`, `discount`, `amount`, `quantityTickets`, `idProjection`, `time`, `idUser`, `state`) VALUES
(1, 0, 300, 2, 4, '2019-11-23', 2, 0),
(2, 0, 150, 1, 8, '2019-11-23', 2, 0),
(3, 0, 120, 1, 2, '2019-11-23', 3, 0),
(4, 0, 150, 1, 4, '2019-11-25', 4, 0),
(5, 0, 120, 1, 2, '2019-11-25', 4, 0),
(6, 0, 150, 1, 5, '2019-11-25', 4, 0),
(7, 0, 100, 1, 1, '2019-11-25', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `idTicket` int(11) NOT NULL,
  `numberTicket` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `qr` varchar(50) DEFAULT NULL,
  `idProjection` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`idTicket`, `numberTicket`, `price`, `idUser`, `qr`, `idProjection`) VALUES
(1, 78037, 150, 2, 'temp/78037.png', 4),
(2, 10912, 150, 2, 'temp/10912.png', 4),
(3, 159, 150, 2, 'temp/159.png', 8),
(30, 63569, 120, 3, 'temp/63569.png', 2),
(31, 1412, 150, 4, 'temp/1412.png', 4),
(32, 927, 150, 4, 'temp/927.png', 4),
(33, 13347, 150, 4, 'temp/13347.png', 4),
(34, 79044, 150, 4, 'temp/79044.png', 4),
(35, 88193, 120, 4, 'temp/88193.png', 2),
(36, 63725, 120, 4, 'temp/63725.png', 2),
(37, 91171, 150, 4, 'temp/91171.png', 5),
(38, 40039, 100, 4, 'temp/40039.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `name`, `lastName`, `password`, `dni`, `email`, `idRol`) VALUES
(1, 'silvania', 'ortega', 'magia', 95123457, 'sil@ortega', 2),
(2, 'rodrigo', 'rodriguez', 'rodri', 95183967, 'rodri@rodri', 1),
(3, 'jimena', 'ortega', 'lajime', 2234455, 'jime@jime', 1),
(4, 'Flore', 'juarez', 'ojos', 42345676, 'florencia.juarez.159@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`idCinema`),
  ADD KEY `idCine` (`idCine`);

--
-- Indices de la tabla `cines`
--
ALTER TABLE `cines`
  ADD PRIMARY KEY (`idCine`),
  ADD KEY `idUserAdministrator` (`idUserAdministrator`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`idGenre`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`idMovie`),
  ADD KEY `idGenres` (`idGenres`);

--
-- Indices de la tabla `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPay`),
  ADD KEY `idPurchase` (`idPurchase`);

--
-- Indices de la tabla `projections`
--
ALTER TABLE `projections`
  ADD PRIMARY KEY (`idProjection`),
  ADD KEY `idCine` (`idCine`),
  ADD KEY `idCinema` (`idCinema`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`idPurchase`),
  ADD KEY `idProjection` (`idProjection`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `idProjection` (`idProjection`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `idCinema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cines`
--
ALTER TABLE `cines`
  MODIFY `idCine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pays`
--
ALTER TABLE `pays`
  MODIFY `idPay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `projections`
--
ALTER TABLE `projections`
  MODIFY `idProjection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `idPurchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cinemas`
--
ALTER TABLE `cinemas`
  ADD CONSTRAINT `cinemas_ibfk_1` FOREIGN KEY (`idCine`) REFERENCES `cines` (`idCine`);

--
-- Filtros para la tabla `cines`
--
ALTER TABLE `cines`
  ADD CONSTRAINT `cines_ibfk_1` FOREIGN KEY (`idUserAdministrator`) REFERENCES `users` (`idUser`);

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`idGenres`) REFERENCES `genres` (`idGenre`);

--
-- Filtros para la tabla `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`idPurchase`) REFERENCES `purchases` (`idPurchase`);

--
-- Filtros para la tabla `projections`
--
ALTER TABLE `projections`
  ADD CONSTRAINT `projections_ibfk_1` FOREIGN KEY (`idCine`) REFERENCES `cines` (`idCine`),
  ADD CONSTRAINT `projections_ibfk_2` FOREIGN KEY (`idCinema`) REFERENCES `cinemas` (`idCinema`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`idProjection`) REFERENCES `projections` (`idProjection`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`idProjection`) REFERENCES `projections` (`idProjection`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
