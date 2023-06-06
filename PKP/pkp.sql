-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Cze 2023, 16:58
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pkp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `ID` int(11) NOT NULL,
  `Nazwisko` text NOT NULL,
  `Pociag` text NOT NULL,
  `Data_wpisu` date NOT NULL,
  `Numer_pociagu` int(11) NOT NULL,
  `odjazd` date NOT NULL,
  `Szac_czas` varchar(5) NOT NULL,
  `opoznienie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`ID`, `Nazwisko`, `Pociag`, `Data_wpisu`, `Numer_pociagu`, `odjazd`, `Szac_czas`, `opoznienie`) VALUES
(6, 'Szyc', 'Intercity', '2023-05-15', 13, '2023-06-11', '12:15', 11),
(7, 'Walaszek', 'Intercity', '2023-02-02', 4, '2023-03-24', '12:30', 4),
(8, 'Kowalski', 'Intercity', '2023-05-24', 632, '2023-06-25', '15:00', 0),
(17, 'Szyc', 'Chrobry', '2023-05-24', 515, '2023-05-03', '15:50', 16),
(18, 'Nowak', 'Intercity', '2023-05-30', 532, '2023-06-04', '15:00', 3),
(19, 'Szyc', 'Chrobry', '2023-05-30', 285, '2023-06-04', '12:15', 0),
(20, 'Szyc', 'Intercity', '2023-05-30', 52, '2023-05-30', '15:00', 6),
(21, 'Kowalski', 'Intercity', '2023-05-30', 51, '2023-05-30', '17:15', 25),
(22, 'Walaszek', 'Chrobry', '2023-05-30', 284, '2023-05-31', '10:15', 45),
(23, 'Nowak', 'Intercity', '2023-06-02', 26, '2023-06-02', '12:15', 25),
(24, 'Szyc', 'Chrobry', '2023-06-02', 621, '2023-06-02', '15:00', 55);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `ID` int(11) NOT NULL,
  `Imie` text NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`ID`, `Imie`, `haslo`) VALUES
(0, 'admin', 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane`
--
ALTER TABLE `dane`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

ALTER TABLE `uzytkownik`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
