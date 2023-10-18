-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 05:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kudtent`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idKorisnika` int(11) NOT NULL,
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sekcija` enum('IzvodjackiAnsambl','Orkestar','SkolaFolklora','PevackaGrupa') NOT NULL,
  `Lozinka` varchar(50) NOT NULL,
  `Clanarina` enum('Placena','NijePlacena','','') NOT NULL,
  `Prisustvo` enum('Prisustvovao','NijePrisustvovao','','') NOT NULL,
  `Privilegije` enum('Admin','Korisnik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idKorisnika`, `Ime`, `Prezime`, `Email`, `Sekcija`, `Lozinka`, `Clanarina`, `Prisustvo`, `Privilegije`) VALUES
(3, 'Kristina', 'Gagic', 'kristina34117@its.edu.rs', 'IzvodjackiAnsambl', 'eebb288ea1a9761364670c66010e9e2f83af807a', 'Placena', 'Prisustvovao', 'Admin'),
(7, 'Iva', 'Ivoc', 'iva@gmail.com', 'Orkestar', 'a784918c534090a746772c000b86bf04afb230be', 'Placena', 'Prisustvovao', 'Korisnik'),
(9, 'Marija', 'Maric', 'marija@gmail.com', 'IzvodjackiAnsambl', 'ac7d32e3c0f61ebc7dfd1ee010f24537314eec2e', 'Placena', 'Prisustvovao', 'Admin'),
(43, 'Filip', 'Filipovic', 'filip@gmail.com', 'Orkestar', '9abd26972392983f68ce66568af222e914a9bab7', 'NijePlacena', 'Prisustvovao', 'Korisnik'),
(60, 'Korisnik', 'Korisnik', 'korisnik@gmail.com', 'Orkestar', '839668c37e87c47170afbde3eb9b4c8ce4f52308', 'Placena', 'Prisustvovao', 'Korisnik'),
(61, 'Admin', 'Admin', 'admin@gmail.com', 'IzvodjackiAnsambl', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Placena', 'Prisustvovao', 'Admin'),
(65, 'Pera', 'Peric', 'pera@gmail.com', 'SkolaFolklora', 'be105a6ee5530d17d9f234baa85ac846b463edd6', 'NijePlacena', 'NijePrisustvovao', 'Korisnik'),
(67, 'Filip', 'Sinik', 'sinik@gmail.com', 'Orkestar', 'c885174ab47ff1072237f39a091e3c89cdc8557c', 'NijePlacena', 'Prisustvovao', 'Korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idKorisnika`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idKorisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
