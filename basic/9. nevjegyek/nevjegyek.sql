-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2024. Feb 04. 20:01
-- Kiszolgáló verziója: 8.2.0
-- PHP verzió: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kezdo`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nevjegyek`
--

DROP TABLE IF EXISTS `nevjegyek`;
CREATE TABLE IF NOT EXISTS `nevjegyek` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nev` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `vegnev` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobil` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `nevjegyek`
--

INSERT INTO `nevjegyek` (`id`, `nev`, `vegnev`, `mobil`, `email`) VALUES
(1, 'nev-1', 'cegnev-1', '(70) 123-4567', 'nev.cegnev@gmail.com'),
(2, 'Gipsz Jakab', 'Vodafone', '(70) 589-1432', 'gipsz.jakab@gmail.com'),
(3, 'Molnar Agnes', 'Vizmu', '(20) 123-4567', 'molnar.agnes@freemail.hu'),
(4, 'horvat Ilona', 'Knorr', '(30) 259-7564', 'horvath.ilona@citromail.hu'),
(5, 'Kiss Mihaly', 'Magyar Posta', '(30) 896-4534', 'kiss.mihaly@heyhp.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
