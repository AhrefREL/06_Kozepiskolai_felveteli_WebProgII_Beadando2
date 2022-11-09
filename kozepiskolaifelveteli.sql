-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Nov 09. 22:00
-- Kiszolgáló verziója: 10.1.32-MariaDB
-- PHP verzió: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kozepiskolaifelveteli`
--
CREATE DATABASE IF NOT EXISTS `kozepiskolaifelveteli` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `kozepiskolaifelveteli`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `csaladNev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `keresztNev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `felhasznalonev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `jogosultsag` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `csaladNev`, `keresztNev`, `felhasznalonev`, `jelszo`, `jogosultsag`) VALUES
(1, 'Kiss', 'István', 'teszt', 'b11706e6af3767100de36d6bfe55ce502399d8aa', '_1_'),
(2, 'Nagy', 'László', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '__1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jelentkezes`
--

CREATE TABLE `jelentkezes` (
  `id` int(10) NOT NULL,
  `jelentkezoid` int(10) NOT NULL,
  `kepzesid` int(10) NOT NULL,
  `sorrend` int(10) NOT NULL,
  `szerzett` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jelentkezes`
--

INSERT INTO `jelentkezes` (`id`, `jelentkezoid`, `kepzesid`, `sorrend`, `szerzett`) VALUES
(1, 212, 2, 1, 152),
(2, 353, 5, 2, 123),
(3, 278, 3, 1, 154),
(4, 191, 4, 1, 187),
(5, 102, 6, 1, 197),
(9, 126, 1, 1, 150);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jelentkezo`
--

CREATE TABLE `jelentkezo` (
  `id` int(30) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `nem` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jelentkezo`
--

INSERT INTO `jelentkezo` (`id`, `nev`, `nem`) VALUES
(1, 'Skvar Tamás', 'f'),
(2, 'Tatár István', 'f'),
(3, 'Siket Karen', 'l'),
(5, 'Dombovári Petra', 'l'),
(6, 'Rém Elek', 'f'),
(8, 'Sebő Tas', 'f'),
(9, 'Szendrődi Csaba', 'f'),
(10, 'Berger Péter', 'f'),
(11, 'Csonka Anna', 'l'),
(13, 'Kovács Ágnes', 'l'),
(14, 'Szőke Mátyás', 'f'),
(15, 'Kiss Zsófia', 'l'),
(16, 'Bakos Kata Judit', 'l'),
(17, 'Bodnár Anna Katalin', 'l'),
(18, 'Keszthelyi Zsolt', 'f'),
(19, 'Kiss Lajos', 'f'),
(20, 'Szabó Orsolya Virág', 'l'),
(21, 'Vég Kálmán', 'f'),
(22, 'Hirzer Zsolt', 'f'),
(23, 'Kincses Zoltán', 'f'),
(24, 'Zentay Réka', 'l'),
(25, 'Kovai Róbert', 'f'),
(26, 'Koch Róbert', 'f'),
(27, 'Szilágyi István', 'f'),
(28, 'Horváth Pál', 'f'),
(29, 'Duma Árpád', 'f'),
(30, 'Nemes Gerda', 'l'),
(31, 'Zsolnai Péter', 'f'),
(32, 'Illés Nóra', 'l'),
(33, 'Fődi Anna', 'l'),
(34, 'Szűcs Lóránt', 'f'),
(35, 'Borsos Anett', 'l'),
(36, 'Sarlós Róbert', 'f'),
(37, 'Hoffmann Bettina', 'l'),
(38, 'Farkas Ildikó', 'l'),
(39, 'Gál Brigitta', 'l'),
(40, 'Szabó Izabella Diána', 'l'),
(41, 'Dudás Krisztián', 'f'),
(42, 'Csordás Kálmán', 'f'),
(43, 'Tóth Alexandra', 'l'),
(45, 'Dorogi Nóra Gréta', 'l'),
(46, 'Nemes Petra', 'l'),
(47, 'Schulcz Imola', 'l'),
(48, 'Senkey Tamás', 'f'),
(49, 'Nyers Sándor', 'f'),
(50, 'Szekeres József', 'f'),
(51, 'Berényi Zsolt', 'f'),
(52, 'Bánfalvi Ramóna', 'l'),
(53, 'Rácz Lili', 'l'),
(54, 'Botos Noémi', 'l'),
(55, 'Kasznár Judit', 'l'),
(57, 'Kerekes Lili', 'l'),
(58, 'Kis Barbara Emma', 'l'),
(60, 'Nagy Eszter', 'l'),
(61, 'Benkő Kata Enikő', 'l'),
(62, 'Urbán Roland', 'f'),
(63, 'Samu Blanka', 'l'),
(64, 'Pálinkás Anna', 'l'),
(65, 'Falch Emil', 'f'),
(66, 'Teleki Kálmán', 'f'),
(67, 'Sima Dezső', 'f'),
(68, 'Rudas Ádám', 'f'),
(69, 'Forrai Laura', 'l'),
(70, 'Irinyi Katalin Ida', 'l'),
(71, 'Hódi Vivien', 'l'),
(72, 'Máté Oszkár', 'f'),
(73, 'Püski Kata', 'l'),
(74, 'Mészáros Anita Réka', 'l'),
(75, 'Kis Nóra Judit', 'l'),
(76, 'Nyári Judit', 'l'),
(77, 'Balog Orsolya', 'l'),
(78, 'Zombori Adrienn', 'l'),
(79, 'Tóti Albert', 'f'),
(81, 'Petres Zoltán', 'f'),
(83, 'Rovó Petra', 'l'),
(85, 'Fogó Róbert', 'f'),
(86, 'Juhász Imre', 'f'),
(88, 'Tanács Lilla', 'l'),
(89, 'Kiss Sándor', 'f'),
(90, 'Kovács Vivien', 'l'),
(91, 'Kun Anna', 'l'),
(92, 'Pályi Balázs', 'f'),
(93, 'Kristóf Petra', 'l'),
(94, 'Gábor Zita', 'l'),
(95, 'Lakatos Zita Ildikó', 'l'),
(96, 'Garadnai Zoltán', 'f'),
(97, 'Bognár Ágnes', 'l'),
(98, 'Dobi Brigitta Krisztina', 'l'),
(99, 'Dócz Károly', 'f'),
(100, 'Halász Norbert', 'f'),
(101, 'Szántó Lilla', 'l'),
(102, 'Dóka Csenge', 'l'),
(103, 'Szántó Mónika', 'l'),
(104, 'Vidács László', 'f'),
(105, 'Kardos Norbert', 'f'),
(106, 'Dancs Zsófia Edit', 'l'),
(107, 'Spák Tamás', 'f'),
(108, 'Varga Mátyás', 'f'),
(109, 'Bózsó Boglárka', 'l'),
(110, 'Márkus Anna', 'l'),
(111, 'Lengyel Anna', 'l'),
(112, 'Boldizsár Nóra Kata', 'l'),
(113, 'Kővágó Andrea Kata', 'l'),
(114, 'Nagy Lili Lujza', 'l'),
(115, 'Forgó Elza', 'l'),
(116, 'Vincze Adél', 'l'),
(117, 'Tóth Kálmán', 'f'),
(118, 'Balla Fanni', 'l'),
(119, 'Juhász Cintia', 'l'),
(120, 'Borisz Norbert', 'f'),
(121, 'Wollek Ottó', 'f'),
(122, 'Kárpáti Annamária', 'l'),
(123, 'Sebők Franciska', 'l'),
(124, 'Jónás Nikolett', 'l'),
(125, 'Kiss-Szabó Péter', 'f'),
(126, 'Kármán Luca', 'l'),
(127, 'Csontos Imre', 'f'),
(128, 'Kovács Lili', 'l'),
(129, 'Bodosi Béla', 'f'),
(130, 'Réti Beáta', 'l'),
(131, 'Bálint Laura', 'l'),
(132, 'Bodrogi Gergely', 'f'),
(133, 'Bata Ágnes', 'l'),
(134, 'Veres Annamária', 'l'),
(135, 'Sipos Lilla', 'l'),
(136, 'Oláh Sztella', 'l'),
(137, 'Gyömbér Ágnes', 'l'),
(138, 'Juhász Viktória', 'l'),
(139, 'Fodor Nikolett', 'l'),
(140, 'Kiss Orsolya', 'l'),
(141, 'Ördög Fanni Zsófia', 'l'),
(142, 'Kosztolányi András', 'f'),
(143, 'Sebők Flóra', 'l'),
(144, 'Kószó Petra', 'l'),
(145, 'Guttmann Gábor', 'f'),
(146, 'Mészáros Stella', 'l'),
(147, 'Hegedűs Réka', 'l'),
(148, 'Kurucz Rebeka Judit', 'l'),
(149, 'Béla Kitti', 'l'),
(150, 'Kovács Győző', 'f'),
(151, 'Molnár Gergely', 'f'),
(152, 'Szabó Viktória', 'l'),
(153, 'Sós Imre', 'f'),
(154, 'Kiss Rea', 'l'),
(155, 'Bíró Alexandra Éva', 'l'),
(156, 'Terjéki Zsuzsanna Emese', 'l'),
(157, 'Kipall Ede', 'f'),
(158, 'Lovai László', 'f'),
(159, 'Kuti Zoltán', 'f'),
(160, 'Moli Hugó', 'f'),
(161, 'Zombori Lili', 'l'),
(162, 'Tomma Árpád', 'f'),
(163, 'Nagy Tímea', 'l'),
(164, 'Hegyközi Tünde Dóra', 'l'),
(165, 'Kockás Tamás', 'f'),
(166, 'Borbás Ferenc', 'f'),
(167, 'Holzi Ervin', 'f'),
(168, 'Varga Éva', 'l'),
(169, 'Tóth Zita', 'l'),
(170, 'Sipos Réka', 'l'),
(171, 'Mezőlaki Gabriella', 'l'),
(172, 'Szednicsek Jenő', 'f'),
(173, 'Weiler Endre', 'f'),
(174, 'Maróti Gabriella Márta', 'l'),
(175, 'Molnár Balázs', 'f'),
(176, 'Szentei Igor', 'f'),
(177, 'Kovács István', 'f'),
(178, 'Farkas Betti', 'l'),
(179, 'Károly Gusztáv', 'f'),
(180, 'Jován Máté', 'f'),
(182, 'Fekete Zsolt', 'f'),
(183, 'Péter Tamás', 'f'),
(184, 'Schaff József', 'f'),
(185, 'Zádori Kata Mária', 'l'),
(186, 'Máté Georgina', 'l'),
(187, 'Varga Nikolett', 'l'),
(188, 'Rákos Pál', 'f'),
(189, 'Pászti Szimonetta', 'l'),
(190, 'Solti Pál', 'f'),
(191, 'Csonka Zita', 'l'),
(192, 'Takács Ágota', 'l'),
(193, 'Marsi Nóra', 'l'),
(194, 'Bányai Balázs', 'f'),
(195, 'Varga Petra', 'l'),
(196, 'Bencsik Áron', 'f'),
(197, 'Farkas Lilla', 'l'),
(198, 'Hajdú Kitti Ildikó', 'l'),
(199, 'Herédi Gabriella', 'l'),
(200, 'Bajnai Zsuzsanna', 'l'),
(201, 'Budai Tamás', 'f'),
(202, 'Keresztes Zsolt', 'f'),
(203, 'Kopasz Klaudia', 'l'),
(204, 'Kiss Stella', 'l'),
(205, 'Horváth Rita', 'l'),
(206, 'Erdélyi Dóra', 'l'),
(207, 'Mészáros Emília', 'l'),
(208, 'Pusztai Géza', 'f'),
(209, 'Mach Mózes', 'f'),
(210, 'Bertók Katalin', 'l'),
(211, 'Balog Tibor', 'f'),
(212, 'Nógrádi Alexandra', 'l'),
(213, 'Varga Stella Gréta', 'l'),
(214, 'Herceg Natália', 'l'),
(216, 'Benedek Anna', 'l'),
(217, 'Ladányi Renáta', 'l'),
(218, 'Makra Csenge Kata', 'l'),
(219, 'Bárány Noémi', 'l'),
(220, 'Török Éva', 'l'),
(221, 'Hódi Katalin', 'l'),
(222, 'Urbán Zsófia Katalin', 'l'),
(223, 'Ádám Éva', 'l'),
(224, 'Németh Rebeka Anna', 'l'),
(225, 'Bodor Flóra', 'l'),
(227, 'Kaltenbrunner Norbert', 'f'),
(228, 'Ébner Dezső', 'f'),
(229, 'Gyulai Zsófia', 'l'),
(230, 'Horváth Dorina', 'l'),
(231, 'Müller Péter', 'f'),
(232, 'Zombori Ákos', 'f'),
(233, 'Karlsen Ottó', 'f'),
(234, 'Nemes Elek', 'f'),
(235, 'Füst Szabolcs', 'f'),
(236, 'Nagy Gábor', 'f'),
(237, 'Vastag Luca', 'l'),
(238, 'Bozóki Patrícia', 'l'),
(239, 'Gyetvai Zsolt', 'f'),
(240, 'Csáki Kata', 'l'),
(241, 'Sebők Ildikó', 'l'),
(242, 'Sütő Péter', 'f'),
(243, 'Kalmár Gábor', 'f'),
(244, 'Vass Réka', 'l'),
(245, 'Váradi Nóra', 'l'),
(246, 'Fábián Nóra', 'l'),
(247, 'Nagy Eta', 'l'),
(248, 'Tárkány Csilla', 'l'),
(249, 'Varga Alexandra', 'l'),
(250, 'Varga Emese', 'l'),
(251, 'Végh Anna Lili', 'l'),
(252, 'Tan József', 'f'),
(253, 'Koródy Tamás', 'f'),
(254, 'Püspök Anna', 'l'),
(255, 'Nagy Anna Magdolna', 'l'),
(256, 'Szűcs Fanni Lívia', 'l'),
(257, 'Csanády Virág Sarolta', 'l'),
(258, 'Török Patrícia', 'l'),
(259, 'Molnár Dorottya', 'l'),
(260, 'Csizmadia Mónika', 'l'),
(261, 'Kereki Pál', 'f'),
(263, 'Török Réka Zsófia', 'l'),
(264, 'Erdélyi Réka', 'l'),
(265, 'Kozmann György', 'f'),
(266, 'Csom Olivér', 'f'),
(267, 'Fábián Eszter Aliz', 'l'),
(268, 'Kőszegi Bernadett', 'l'),
(269, 'Márton Katalin', 'l'),
(270, 'Bóna Borbála Éva', 'l'),
(271, 'Somi József', 'f'),
(272, 'Benkő Melinda', 'l'),
(273, 'Papp Brigitta', 'l'),
(274, 'Som Lajos', 'f'),
(275, 'Hámori Frigyes', 'f'),
(276, 'Németh Zoltán', 'f'),
(277, 'Leander Jácint', 'f'),
(278, 'Fehér Zoltán', 'f'),
(279, 'Bereczki Gerda', 'l'),
(280, 'Sebők Géza', 'f'),
(281, 'Molnár Réka Evelin', 'l'),
(282, 'Tiszai Dóra', 'l'),
(283, 'Tóth Lilla Brigitta', 'l'),
(284, 'Csapó Gábor', 'f'),
(285, 'Nyári Anna', 'l'),
(286, 'Takács Veronika', 'l'),
(287, 'Vajna Sára Réka', 'l'),
(288, 'Földesi Kata', 'l'),
(289, 'Lehóczki Bernadett', 'l'),
(290, 'Baranyi Noémi Lilla', 'l'),
(291, 'Horányi Lilla Krisztina', 'l'),
(292, 'Nyakas Dénes', 'f'),
(293, 'Ormos Zoltán', 'f'),
(294, 'Somogyi Orsolya', 'l'),
(296, 'Szilasi Eszter Dalma', 'l'),
(298, 'Lisztes Imre', 'f'),
(299, 'Esztergályos Gábor', 'f'),
(300, 'Török Ildikó', 'l'),
(301, 'Kovács Anikó', 'l'),
(302, 'Kovács Imre', 'f'),
(303, 'Sár Gábor', 'f'),
(304, 'Blum Ottó', 'f'),
(305, 'Tóth Zoltán', 'f'),
(306, 'Presszer Hugó', 'f'),
(307, 'Bitó Helga', 'l'),
(308, 'Bitó Réka Emese', 'l'),
(309, 'Dábity Ottó', 'f'),
(310, 'Nik Ferenc', 'f'),
(311, 'Berta Alexandra', 'l'),
(312, 'Kincses Blanka', 'l'),
(313, 'Alsó Emil', 'f'),
(314, 'Szántó Zsuzsanna', 'l'),
(315, 'Garai Nóra', 'l'),
(316, 'Gyurcsik Zsófia Kata', 'l'),
(317, 'Budavári Bence', 'f'),
(318, 'Magyari Ivana', 'l'),
(319, 'Kecskés László', 'f'),
(320, 'Nagy Orsolya', 'l'),
(321, 'Nagy Tibor', 'f'),
(322, 'Fazekas Tamás', 'f'),
(323, 'Deme Noémi', 'l'),
(324, 'Zombori Anna', 'l'),
(325, 'Kremp Gusztáv', 'f'),
(326, 'Molnár Anna', 'l'),
(327, 'Szósz György', 'f'),
(328, 'Bordás Gábor', 'f'),
(329, 'Tóth Tímea Kitti', 'l'),
(330, 'Takács Kata', 'l'),
(331, 'Szabó Kitti', 'l'),
(333, 'Dombi Ákos', 'f'),
(334, 'Pribai Zoltán', 'f'),
(335, 'Hrisztov Temir', 'f'),
(336, 'Solymosi Ödön', 'f'),
(337, 'Izsó Gusztáv', 'f'),
(338, 'Stofin József', 'f'),
(339, 'Lajos Lajos', 'f'),
(341, 'Kiss Blanka', 'l'),
(342, 'Bog Aladár', 'f'),
(343, 'Béres Réka Sarolt', 'l'),
(344, 'Császár Mónika Krisztina', 'l'),
(345, 'Szűcs Miklós', 'f'),
(346, 'Kószó Annamária', 'l'),
(348, 'Sági Anikó', 'l'),
(349, 'Gyulai Zsófia Julianna', 'l'),
(350, 'Kisó Ábel', 'f'),
(351, 'Kovács Zoltán', 'f'),
(352, 'Korsós Kálmán', 'f'),
(353, 'Bedő Anna', 'l'),
(354, 'Kelemen Enikő', 'l'),
(355, 'Pálfi Evelin', 'l'),
(356, 'Csíbor Tamás', 'f'),
(357, 'Zólyomi Kristóf', 'f'),
(358, 'Vlad Igor', 'f'),
(359, 'Papp Vanessza', 'l'),
(360, 'Nagy Réka', 'l'),
(361, 'Kertész Nándor', 'f'),
(362, 'Szűcs Melinda', 'l'),
(363, 'Farkas Noémi Eszter', 'l'),
(364, 'Erdélyi Eszter', 'l'),
(365, 'Várkonyi Rita', 'l'),
(366, 'Kautzky Alfonz', 'f'),
(367, 'Horváth Viola', 'l'),
(368, 'Seprenyi Johanna Ágnes', 'l'),
(369, 'Gyapjas Viktória', 'l'),
(370, 'Kertész Lili Barbara', 'l'),
(371, 'Nyilas Gábor', 'f'),
(372, 'Kiss Georgina', 'l'),
(373, 'Haraszti Zita Zsófia', 'l'),
(374, 'Késmárky Péter', 'f'),
(375, 'Szalma Sándor', 'f'),
(376, 'Kása Blanka', 'l'),
(377, 'Kovács Fanni', 'l'),
(378, 'Boldog Eszter', 'l'),
(379, 'Rómer Flórián', 'f'),
(380, 'Németh Edit', 'l'),
(381, 'Polgár István', 'f'),
(382, 'Molnár Mónika', 'l'),
(383, 'Szabó Boglárka Gyöngyi', 'l');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepzes`
--

CREATE TABLE `kepzes` (
  `id` int(10) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `felveheto` int(10) NOT NULL,
  `minimum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kepzes`
--

INSERT INTO `kepzes` (`id`, `nev`, `felveheto`, `minimum`) VALUES
(1, 'francia', 16, 140),
(2, 'angol', 30, 150),
(3, 'matematika', 16, 160),
(4, 'informatika', 16, 150),
(5, 'k?rnyezetv?delmi', 16, 130),
(6, 'k?zgazdas?gi', 30, 130);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menuk`
--

CREATE TABLE `menuk` (
  `id` int(10) NOT NULL,
  `slug` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `oldalcim` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `szuloId` int(10) NOT NULL,
  `jogosultsag` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `menuk`
--

INSERT INTO `menuk` (`id`, `slug`, `oldalcim`, `szuloId`, `jogosultsag`) VALUES
(1, 'nyitolap', 'Nyitólap', 0, '111'),
(2, 'felveteli', 'Felvételi', 0, '011'),
(3, 'restful-api', 'Restful API', 0, '111'),
(4, 'pdf-keszito-szolgaltatas', 'PDF készítő szolgáltatás', 0, '011'),
(7, 'belepes', 'Belépés', 0, '100'),
(8, 'regisztracio', 'Regisztráció', 0, '100'),
(9, 'kilepes', 'Kijelentkezés', 0, '011'),
(10, 'admin', 'Admin', 0, '001');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `jelentkezes`
--
ALTER TABLE `jelentkezes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jelentkezoid` (`jelentkezoid`),
  ADD UNIQUE KEY `kepzesid` (`kepzesid`);

--
-- A tábla indexei `jelentkezo`
--
ALTER TABLE `jelentkezo`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kepzes`
--
ALTER TABLE `kepzes`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `menuk`
--
ALTER TABLE `menuk`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `jelentkezes`
--
ALTER TABLE `jelentkezes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `jelentkezo`
--
ALTER TABLE `jelentkezo`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT a táblához `kepzes`
--
ALTER TABLE `kepzes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `menuk`
--
ALTER TABLE `menuk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `jelentkezes`
--
ALTER TABLE `jelentkezes`
  ADD CONSTRAINT `jelentkezes_ibfk_1` FOREIGN KEY (`kepzesid`) REFERENCES `kepzes` (`id`),
  ADD CONSTRAINT `jelentkezes_ibfk_2` FOREIGN KEY (`jelentkezoid`) REFERENCES `jelentkezo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
