-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lut 2019, 17:25
-- Wersja serwera: 10.1.33-MariaDB
-- Wersja PHP: 7.2.6
CREATE DATABASE 'hotel';
USE 'hotel';
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
SET dbname = "hotel";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hotel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id` int(11) NOT NULL,
  `pokoj` varchar(25) NOT NULL,
  `dni` int(2) NOT NULL,
  `osoby` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `pokoj`, `dni`, `osoby`) VALUES
(21, 'apartament', 45, 5),
(25, 'kameralny', 2, 2),
(26, 'sredniak', 3, 4);

--
-- Struktura tabeli dla tabeli `gosc`
--
CREATE TABLE `gosc` (
	`id_goscia` INT(25) NOT NULL AUTO_INCREMENT,
	`imie` TEXT(25),
	`nazwisko` TEXT(25),
	`ilosc_gosci` INT(2),
	`ilosc_dni` INT(3),
	`id_pokoju` INT,
	PRIMARY KEY (`id_goscia`)
);
--
-- Struktura tabeli dla tabeli `pokoj`
--
CREATE TABLE `pokoj` (
	`id_pokoju` INT(25) NOT NULL AUTO_INCREMENT,
	`liczba_lozek` INT(2),
	`lazienka` BIT(1),
	`kuchnia` BIT(1),
	`id_goscia` INT(25),
	PRIMARY KEY (`id_pokoju`)
);
--
-- Struktura tabeli dla tabeli `uslugi_dodatkowe`
--
CREATE TABLE `uslugi_dodatkowe` (
	`taxi_do_hotelu` BIT(1),
	`wynajem_samochodu` BIT(1),
	`dodatkowe_reczniki` BIT(1),
	`id_goscia` INT(25),
	PRIMARY KEY (`taxi_do_hotelu`)
);
--
-- Struktura tabeli dla tabeli `users`
--
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
