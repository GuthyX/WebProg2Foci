-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Máj 14. 11:44
-- Kiszolgáló verziója: 10.1.37-MariaDB
-- PHP verzió: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webprog2zh`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `nev` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `stadion` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `megalakulas` date NOT NULL,
  `edzo` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `liga` varchar(250) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `clubs`
--

INSERT INTO `clubs` (`id`, `nev`, `stadion`, `megalakulas`, `edzo`, `liga`) VALUES
(3, 'FC Barcelona', 'Camp Nou', '1899-11-29', 'Quique Setién', 'LaLiga'),
(4, 'Real Madrid', '1902-03-06', '0000-00-00', 'Estadio Santiago Bernabéu', 'LaLiga'),
(5, 'FC Bayern München', '1900-02-27', '0000-00-00', 'Allianz Arena', 'Bundesliga');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `hazai` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `vendeg` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `datum` date NOT NULL,
  `eredmeny` varchar(11) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `permission` int(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`) VALUES
(2, 'adss', 'asd', 'fsa@ad.hu', '66ceeafde8453dda201978b2b497b9c85d4b6da5', 2),
(3, 'Adrian', 'Guti', 'guti@gmail.com', '66ceeafde8453dda201978b2b497b9c85d4b6da5', 2),
(4, 'geri', 'bori', 'h@h.hu', '66ceeafde8453dda201978b2b497b9c85d4b6da5', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
