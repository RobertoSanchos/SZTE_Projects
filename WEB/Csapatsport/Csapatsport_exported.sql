-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Dec 09. 12:08
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `csapatsport`
--
CREATE DATABASE IF NOT EXISTS `csapatsport` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `csapatsport`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapat`
--

DROP TABLE IF EXISTS `csapat`;
CREATE TABLE `csapat` (
  `nev` varchar(50) NOT NULL,
  `varos` varchar(50) NOT NULL,
  `alapitaseve` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `csapat`
--

INSERT INTO `csapat` (`nev`, `varos`, `alapitaseve`) VALUES
('Betolakodók', 'Miskolc', 2001),
('Sarki medvék', 'Makó', 2002),
('Táncoló talpak', 'Budapest', 2000),
('Vaskarmok', 'Dunaújváros', 2001),
('Vörös rókák', 'Debrecen', 2003);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

DROP TABLE IF EXISTS `felhasznalo`;
CREATE TABLE `felhasznalo` (
  `felhasznalonev` varchar(50) NOT NULL,
  `jelszo` varchar(50) NOT NULL,
  `nev` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`felhasznalonev`, `jelszo`, `nev`) VALUES
('admin', '25d55ad283aa400af464c76d713c07ad', 'Admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `merkozes`
--

DROP TABLE IF EXISTS `merkozes`;
CREATE TABLE `merkozes` (
  `csapatnev1` varchar(50) NOT NULL,
  `csapatnev2` varchar(50) NOT NULL,
  `helyszin` varchar(50) NOT NULL,
  `datum` datetime NOT NULL,
  `eredmeny` varchar(50) DEFAULT 'Nincs rögzítve'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `merkozes`
--

INSERT INTO `merkozes` (`csapatnev1`, `csapatnev2`, `helyszin`, `datum`, `eredmeny`) VALUES
('Táncoló talpak', 'Vaskarmok', 'Budapest', '2011-11-06 19:30:00', '3 : 5'),
('Táncoló talpak', 'Vörös rókák', 'Budapest', '2012-10-30 14:00:00', '4 : 5'),
('Vörös rókák', 'Betolakodók', 'Debrecen', '2013-10-20 20:00:00', '2 : 2'),
('Vörös rókák', 'Sarki medvék', 'Debrecen', '2013-11-02 16:00:00', '1 : 1'),
('Vaskarmok', 'Vörös rókák', 'Dunaújváros', '2011-12-13 13:00:00', '4 : 1'),
('Sarki medvék', 'Betolakodók', 'Makó', '2012-10-06 18:00:00', '2 : 3'),
('Betolakodók', 'Táncoló talpak', 'Miskolc', '2011-12-05 19:30:00', '4 : 3'),
('Betolakodók', 'Vaskarmok', 'Miskolc', '2012-12-10 15:00:00', '0 : 3');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `poszt`
--

DROP TABLE IF EXISTS `poszt`;
CREATE TABLE `poszt` (
  `id` int(1) NOT NULL,
  `nev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `poszt`
--

INSERT INTO `poszt` (`id`, `nev`) VALUES
(1, 'kapus'),
(2, 'jobbhátvéd'),
(3, 'balhátvéd'),
(4, 'jobbszélső'),
(5, 'középcsatár'),
(6, 'balszélső');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `nev` varchar(50) NOT NULL,
  `szuletesidatum` date NOT NULL,
  `allampolgarsag` varchar(50) NOT NULL,
  `csapatnev` varchar(50) NOT NULL,
  `posztid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `tag`
--

INSERT INTO `tag` (`nev`, `szuletesidatum`, `allampolgarsag`, `csapatnev`, `posztid`) VALUES
('Antal Dániel', '1991-05-15', 'Magyar', 'Betolakodók', 2),
('Bler Jean', '1990-01-11', 'Francia', 'Vörös rókák', 2),
('Budai Sándor', '1993-04-14', 'Magyar', 'Vörös rókák', 5),
('Elias Kleine', '1989-11-11', 'Német', 'Vörös rókák', 4),
('Enzo Plür', '1992-06-10', 'Francia', 'Vaskarmok', 2),
('Gellért Ferenc', '1991-11-03', 'Magyar', 'Betolakodók', 1),
('George Sebastian', '1991-10-11', 'Angol', 'Vaskarmok', 1),
('Gera Tamás', '1993-07-01', 'Magyar', 'Sarki medvék', 5),
('Jhonny Mathew', '1991-09-01', 'Amerikai', 'Sarki medvék', 4),
('Joseph Schmith', '1992-03-01', 'Német', 'Sarki medvék', 6),
('Kiss Árpád', '1992-04-15', 'Magyar', 'Vörös rókák', 3),
('Kiss Máté', '1991-03-20', 'Magyar', 'Vaskarmok', 4),
('Kovács István', '1990-09-19', 'Magyar', 'Táncoló talpak', 6),
('Kovács János', '1990-08-26', 'Magyar', 'Vaskarmok', 6),
('Lajkó Fülöp', '1990-12-01', 'Magyar', 'Betolakodók', 6),
('Méreg István', '1991-09-07', 'Magyar', 'Sarki medvék', 3),
('Méreg Tamás', '1993-12-12', 'Magyar', 'Táncoló talpak', 3),
('Miska Lajos', '1991-05-05', 'Magyar', 'Táncoló talpak', 2),
('Nagy Alex', '1992-09-09', 'Magyar', 'Táncoló talpak', 5),
('Nagy András', '1990-10-11', 'Magyar', 'Sarki medvék', 1),
('Nagy Iván', '1990-12-07', 'Magyar', 'Vörös rókák', 6),
('Papp Sándor', '1992-11-09', 'Magyar', 'Betolakodók', 4),
('Rácz Bence', '1991-09-07', 'Magyar', 'Vaskarmok', 3),
('Russel Depp', '1991-10-11', 'Amerikai', 'Táncoló talpak', 4),
('Serbán Szilárd', '1991-01-11', 'Magyar', 'Vörös rókák', 1),
('Steven Kurt', '1992-01-29', 'Amerikai', 'Betolakodók', 5),
('Suhajda Bence', '1994-05-19', 'Magyar', 'Vaskarmok', 5),
('Szabó Bence', '1992-06-10', 'Magyar', 'Sarki medvék', 2),
('Szekeres János', '1993-08-07', 'Magyar', 'Betolakodók', 3),
('Szél Áron', '1992-01-29', 'Magyar', 'Táncoló talpak', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csapat`
--
ALTER TABLE `csapat`
  ADD PRIMARY KEY (`nev`);

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`felhasznalonev`);

--
-- A tábla indexei `merkozes`
--
ALTER TABLE `merkozes`
  ADD PRIMARY KEY (`helyszin`,`datum`),
  ADD KEY `csapatnev1` (`csapatnev1`),
  ADD KEY `csapatnev2` (`csapatnev2`);

--
-- A tábla indexei `poszt`
--
ALTER TABLE `poszt`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`nev`,`szuletesidatum`),
  ADD KEY `csapatnev` (`csapatnev`),
  ADD KEY `posztid` (`posztid`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `merkozes`
--
ALTER TABLE `merkozes`
  ADD CONSTRAINT `merkozes_ibfk_1` FOREIGN KEY (`csapatnev1`) REFERENCES `csapat` (`nev`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `merkozes_ibfk_2` FOREIGN KEY (`csapatnev2`) REFERENCES `csapat` (`nev`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`csapatnev`) REFERENCES `csapat` (`nev`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_ibfk_2` FOREIGN KEY (`posztid`) REFERENCES `poszt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
