-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 06:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `klasa`
--

CREATE TABLE `klasa` (
  `idKlasa` int(11) NOT NULL,
  `Nazwa` varchar(45) DEFAULT NULL,
  `Foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klasa`
--

INSERT INTO `klasa` (`idKlasa`, `Nazwa`, `Foto`) VALUES
(1, 'A', NULL),
(2, 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klienci`
--

CREATE TABLE `klienci` (
  `idKlienci` int(11) NOT NULL,
  `Imie` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Nr_Telefonu` int(9) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Haslo` varchar(255) DEFAULT NULL,
  `Znizka` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`idKlienci`, `Imie`, `Nazwisko`, `Nr_Telefonu`, `Email`, `Haslo`, `Znizka`) VALUES
(2, 'Patryk', 'Kowalski', 123456789, 'patryk@interia.pl', '$2y$10$xgpVyBkYlJOEjBYBdIELfeM40euJT/XcJwhQnnHp6tJgwMD..aNXq', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obowiazki`
--

CREATE TABLE `obowiazki` (
  `idObowiazki` int(11) NOT NULL,
  `Nazwa` varchar(45) DEFAULT NULL,
  `Opis` longtext DEFAULT NULL,
  `Pracownicy_idPracownicy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `obowiazki_has_samochody`
--

CREATE TABLE `obowiazki_has_samochody` (
  `Obowiazki_idObowiazki` int(11) NOT NULL,
  `Obowiazki_Pracownicy_idPracownicy` int(11) NOT NULL,
  `Samochody_idSamochody` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pracownicy`
--

CREATE TABLE `pracownicy` (
  `idPracownicy` int(11) NOT NULL,
  `Imie` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Stanowisko` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Haslo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `samochody`
--

CREATE TABLE `samochody` (
  `idSamochody` int(11) NOT NULL,
  `Rocznik` int(4) DEFAULT NULL,
  `Marka` varchar(45) DEFAULT NULL,
  `Kolor` varchar(45) DEFAULT NULL,
  `Model` varchar(45) DEFAULT NULL,
  `Rejestracja` varchar(45) DEFAULT NULL,
  `Pojemnosc_Silnika` varchar(45) DEFAULT NULL,
  `Moc_Silnika` varchar(45) DEFAULT NULL,
  `Skrzynia_Automat` tinyint(4) DEFAULT NULL,
  `Cena` double DEFAULT NULL,
  `Opis` longtext DEFAULT NULL,
  `Klimatyzacja` tinyint(4) DEFAULT NULL,
  `Drzwi` int(1) DEFAULT NULL,
  `Osoby` int(1) DEFAULT NULL,
  `Foto` varchar(45) DEFAULT NULL,
  `Paliwo` varchar(45) DEFAULT NULL,
  `Nadwozie` varchar(45) DEFAULT NULL,
  `Klasa_idKlasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `samochody`
--

INSERT INTO `samochody` (`idSamochody`, `Rocznik`, `Marka`, `Kolor`, `Model`, `Rejestracja`, `Pojemnosc_Silnika`, `Moc_Silnika`, `Skrzynia_Automat`, `Cena`, `Opis`, `Klimatyzacja`, `Drzwi`, `Osoby`, `Foto`, `Paliwo`, `Nadwozie`, `Klasa_idKlasa`) VALUES
(1, 2005, 'Saab', 'Czarny', '93', 'SRC 4C18', '8 Litrów', '250 KM', 0, 50, 'super dobry fajny najlepszy', 1, 5, 5, 'saab_93.jpg', 'benzyna', 'sedan', 1),
(2, 2018, 'Audi', 'Czarny', 'A7', 'SRC 3E96', '8 Litrów', '250 KM', 0, 50, 'super dobry fajny najlepszy', 1, 5, 5, 'audi_a7.jpg', 'benzyna', 'sedan', 1),
(3, 2015, 'BMW', 'niebieski', 'X3', 'SRC 0V5J', '5 Litrów', '220 KM', 1, 46, 'też całkiem dobry', 1, 5, 5, 'bmw_x3.jpg', 'benzyna', 'SUV', 1),
(4, 2009, 'Volkswagen', 'srebrny', 'Golf 5', 'SRC 0V4J', '5 Litrów', '100 KM', 0, 20, 'sprawny dobry, tani idealny', 1, 5, 5, 'vw_golf5.jpg', 'diesel', 'hatchback', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zamowienia`
--

CREATE TABLE `zamowienia` (
  `idZamowienia` int(11) NOT NULL,
  `Data_Zlozenia` date DEFAULT NULL,
  `Data_Wydania` date DEFAULT NULL,
  `Data_Odebrania` date DEFAULT NULL,
  `Ilosc_Dob` int(3) DEFAULT NULL,
  `Klienci_idKlienci` int(11) NOT NULL,
  `Samochody_idSamochody` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`idZamowienia`, `Data_Zlozenia`, `Data_Wydania`, `Data_Odebrania`, `Ilosc_Dob`, `Klienci_idKlienci`, `Samochody_idSamochody`) VALUES
(30, '2020-11-04', '2020-11-15', '2020-11-18', 3, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`idKlasa`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`idKlienci`);

--
-- Indexes for table `obowiazki`
--
ALTER TABLE `obowiazki`
  ADD PRIMARY KEY (`idObowiazki`,`Pracownicy_idPracownicy`),
  ADD KEY `fk_Obowiazki_Pracownicy1` (`Pracownicy_idPracownicy`);

--
-- Indexes for table `obowiazki_has_samochody`
--
ALTER TABLE `obowiazki_has_samochody`
  ADD PRIMARY KEY (`Obowiazki_idObowiazki`,`Obowiazki_Pracownicy_idPracownicy`,`Samochody_idSamochody`),
  ADD KEY `fk_Obowiazki_has_Samochody_Samochody1` (`Samochody_idSamochody`);

--
-- Indexes for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`idPracownicy`);

--
-- Indexes for table `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`idSamochody`,`Klasa_idKlasa`),
  ADD KEY `fk_Samochody_Klasa1` (`Klasa_idKlasa`);

--
-- Indexes for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`idZamowienia`,`Klienci_idKlienci`,`Samochody_idSamochody`),
  ADD KEY `fk_Zamowienia_Klienci` (`Klienci_idKlienci`),
  ADD KEY `fk_Zamowienia_Samochody1` (`Samochody_idSamochody`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klasa`
--
ALTER TABLE `klasa`
  MODIFY `idKlasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `idKlienci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obowiazki`
--
ALTER TABLE `obowiazki`
  MODIFY `idObowiazki` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `idPracownicy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `samochody`
--
ALTER TABLE `samochody`
  MODIFY `idSamochody` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idZamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obowiazki`
--
ALTER TABLE `obowiazki`
  ADD CONSTRAINT `fk_Obowiazki_Pracownicy1` FOREIGN KEY (`Pracownicy_idPracownicy`) REFERENCES `pracownicy` (`idPracownicy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `obowiazki_has_samochody`
--
ALTER TABLE `obowiazki_has_samochody`
  ADD CONSTRAINT `fk_Obowiazki_has_Samochody_Obowiazki1` FOREIGN KEY (`Obowiazki_idObowiazki`,`Obowiazki_Pracownicy_idPracownicy`) REFERENCES `obowiazki` (`idObowiazki`, `Pracownicy_idPracownicy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Obowiazki_has_Samochody_Samochody1` FOREIGN KEY (`Samochody_idSamochody`) REFERENCES `samochody` (`idSamochody`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `samochody`
--
ALTER TABLE `samochody`
  ADD CONSTRAINT `fk_Samochody_Klasa1` FOREIGN KEY (`Klasa_idKlasa`) REFERENCES `klasa` (`idKlasa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `fk_Zamowienia_Klienci` FOREIGN KEY (`Klienci_idKlienci`) REFERENCES `klienci` (`idKlienci`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Zamowienia_Samochody1` FOREIGN KEY (`Samochody_idSamochody`) REFERENCES `samochody` (`idSamochody`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
