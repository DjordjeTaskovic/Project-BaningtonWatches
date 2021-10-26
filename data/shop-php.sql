-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 03:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id_anketa` int(11) NOT NULL,
  `ime` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tema` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `poruka` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `ime`, `tema`, `poruka`) VALUES
(1, 'Nikoal Spasojevic', 'Povracaj Novca', 'povracaj Novca'),
(2, ':ime', ':tema', ':poruka'),
(3, 'Nikola Spasic', 'Povracaj Novca', 'aaaaaaaaaaaa'),
(4, 'Menko Ris', 'Nova Porudzbina', 'Hteo bih da narucim novi proizvod.'),
(5, 'Petar Strugar', 'Bussiness Stuf', 'aaaaaaaaaa'),
(6, 'Petar', 'Bussiness', 'aaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `baner`
--

CREATE TABLE `baner` (
  `id_baner` int(11) NOT NULL,
  `naslov` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `banneropis` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `id_slika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baner`
--

INSERT INTO `baner` (`id_baner`, `naslov`, `banneropis`, `id_slika`) VALUES
(1, 'Accessories', 'Explore our Collection', 15),
(2, 'Luxury Wear', 'Become Elegant', 16),
(3, 'Unique Design', 'Show our Colors ', 17),
(4, 'Custom Models', 'Magnificent work', 18);

-- --------------------------------------------------------

--
-- Table structure for table `boja`
--

CREATE TABLE `boja` (
  `id_boja` int(11) NOT NULL,
  `nazivboje` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `boja`
--

INSERT INTO `boja` (`id_boja`, `nazivboje`) VALUES
(1, 'bronze'),
(2, 'black'),
(3, 'red'),
(4, 'blue'),
(5, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id_kontakt` int(11) NOT NULL,
  `ime` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `broj` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `poruka` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id_kontakt`, `ime`, `email`, `broj`, `poruka`) VALUES
(1, 'Nikoal Spasojevic', 'devia.shop@edu.rs', '11122224444', 'neko je ispisao text ovde.'),
(2, 'Merlow Nic', 'devian.shop@gmail.com', '(+63) 555 1212', 'Here is the text.'),
(3, 'Merlow Nic', 'ourcompanyinc@gmail.com', '(+63) 555 1212', 'aaaaaa'),
(4, 'Nikola Spasic', 'nesto@gmail.com', '0664823145', 'aaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnik` int(11) NOT NULL,
  `korisnik_ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datumrodjenja` date NOT NULL,
  `datum_upisa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_uloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `korisnik_ime`, `email`, `adresa`, `password`, `datumrodjenja`, `datum_upisa`, `id_uloga`) VALUES
(1, 'Nikola Spasic', 'nesto@gmail.com', 'Nasticeva 111 Beograd', '8c7029ffac2fc0821cbd6d6bc21c3ddd', '2021-03-19', '2021-03-01 18:19:37', 2),
(2, 'Menko Ris', 'nesto@gmail.com', 'Nasticeva 111 Beograd', 'b2b641d2c13f700c1c3bcc10b2e30eee', '2021-03-04', '2021-03-02 11:07:39', 2),
(3, 'Djordje Taskovic', 'djordje.taskovic.188.18@ict.edu.rs', '111 NI Beograd', '9d24c6d08493b9f1c5535565e905089b', '1999-09-02', '2021-03-02 13:58:44', 1),
(4, 'Petar Petrovic', 'petar99@gmail.com', 'Nasticeva 111 Beograd', 'd2bc8d5c8df029a3090e3fad7967a209', '2021-03-02', '2021-03-08 13:05:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `id_navigacija` int(11) NOT NULL,
  `link` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`id_navigacija`, `link`, `text`) VALUES
(1, 'index.php', 'Home'),
(2, 'products.php', 'Products'),
(3, 'index.php#bestsellers', 'Best Sellers'),
(4, 'index.php#news-section', 'Our News'),
(5, 'index.php#sale-section', 'Upcoming Sale'),
(6, 'author.php', 'Author '),
(7, 'index.php#contact-section', 'Contact');

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

CREATE TABLE `pol` (
  `id_pol` int(11) NOT NULL,
  `nazivpola` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pol`
--

INSERT INTO `pol` (`id_pol`, `nazivpola`) VALUES
(1, 'Men'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

CREATE TABLE `porudzbine` (
  `id_porudzbina` int(11) NOT NULL,
  `id_proizvod` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kolicina` int(11) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `ukupnacena` decimal(10,2) NOT NULL,
  `nazivproizvoda` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nazivtipa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porudzbine`
--

INSERT INTO `porudzbine` (`id_porudzbina`, `id_proizvod`, `id_korisnik`, `datum`, `kolicina`, `cena`, `ukupnacena`, `nazivproizvoda`, `nazivtipa`, `slika`) VALUES
(1, 8, 2, '2021-03-07 16:14:09', 1, '78.99', '78.99', 'Stainless Steel Chronograph Watch, Silver', 'Quartz Watch', 'img/products/p8.png'),
(2, 3, 1, '2021-03-07 16:35:18', 1, '137.00', '137.00', 'Fossil Men\'s Coachman Quartz', 'Luxury Watch', 'img/products/p3.png'),
(3, 3, 1, '2021-03-07 18:09:16', 1, '137.00', '137.00', 'Fossil Men\'s Coachman Quartz', 'Luxury Watch', 'img/products/p3.png'),
(4, 2, 1, '2021-03-07 18:09:16', 1, '82.70', '82.70', 'Townsman Stainless Steel and Leather Watch', 'Analog Watch', 'img/products/p2.png'),
(5, 3, 1, '2021-03-07 18:14:55', 2, '137.00', '274.00', 'Fossil Men\'s Coachman Quartz', 'Luxury Watch', 'img/products/p3.png'),
(6, 4, 1, '2021-03-07 18:14:55', 1, '117.00', '117.00', 'Machine Stainless Steel Quartz Watch', 'Quartz Watch', 'img/products/p4.png');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id_proizvod` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cena` decimal(10,2) NOT NULL,
  `dostupnost` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `id_boja` int(11) NOT NULL,
  `id_pol` int(11) NOT NULL,
  `id_tip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id_proizvod`, `naziv`, `opis`, `datum`, `cena`, `dostupnost`, `id_boja`, `id_pol`, `id_tip`) VALUES
(1, 'Michael Kors Slim Stainless Steel Quartz Watch', 'Featuring a 44 millimeter case size, 22 millimeter band size, hardened scratch-resistant mineral crystal glass, 3 hand quartz movement, imported\r\nRound sunray dial; Slim profile 12 millimeter case. black plated bracelet with a brushed and polished finish. Bracelet strap with deployment closure.', '2021-02-22 15:54:44', '129.00', 'In Stock', 1, 1, 3),
(2, 'Townsman Stainless Steel and Leather Watch', 'Townsman has a clean, symmetrical style and elevated construction. Elegantly vaulted hands, beveled indices and a shapely case make this timepiece a classic for decades to come.\nCase size: 44 millimeter; Band size: 22 millimeter; Quartz/Chrono movement; Hardened mineral crystal lens;', '2021-02-22 16:02:55', '80.90', 'Un-Available', 2, 1, 2),
(3, 'Fossil Men\'s Coachman Quartz', 'Built to outlast (fleeting) trends, Coachman\'s ageless style and effortless wearability is a superlative investment fit for any occasion.\r\nCase size: 44 millimeter; Band size: 22 millimeter; Quartz/Chrono movement; Hardened mineral', '2021-02-22 16:05:07', '137.00', 'In Stock', 4, 2, 4),
(4, 'Machine Stainless Steel Quartz Watch', 'Built to outlast (fleeting) trends, Coachman\\\'s ageless style and effortless wearability is a superlative investment fit for any occasion.\\r\\nCase size: 44 millimeter; Band size: 22 millimeter; Quartz/Chrono movement; Hardened mineral', '2021-02-22 16:08:15', '117.00', 'In Stock', 5, 1, 3),
(5, 'Nate Stainless Steel Quartz Chronograph Watch', 'American creativity and ingenuity. Bringing new life into the watch and leathers industry by making quality, fashionable accessories that are both fun and accessible.\r\nFor a bold, oversized look that\'s certain to be noticed, choose Nate!', '2021-02-22 16:11:33', '139.00', 'Un-Available', 2, 1, 4),
(6, 'Stainless Steel Chronograph Watch, Silver', 'Stainless steel case 45mm diameter x 12.5mm thick; Silver dial; Luminous hands\r\nJapanese quartz movement, VD53 Caliber; Assembled in Japan; SR920SW battery included; Watch weight: 195 grams', '2021-02-22 16:11:33', '89.00', 'Un-Available', 2, 1, 2),
(7, 'Women Jacqueline Stainless Steel and Leather', 'Inspired by American creativity and ingenuity. Bringing new life into the watch and leathers industry by making quality, fashionable accessories that are both fun and accessible.\r\nWe designed Jacqueline with our finest and most luxe materials to create a watch that is feminine with a classic twist.', '2021-02-22 16:15:14', '78.99', 'In Stock', 3, 2, 4),
(8, 'Women Moinica Stainless Steel Quattz Watch', 'Inspired by American creativity and ingenuity. Bringing new life into the watch and leathers industry by making quality, fashionable accessories that are both fun and accessible.\r\nWe designed Jacqueline with our finest and most luxe materials to create a watch that is feminine with a classic twist.', '2021-02-22 16:15:14', '78.99', 'In Stock', 1, 2, 3),
(9, 'Grant Stainless Steel Quartz Chronograph Watch', 'The Grant collection is always in style thanks to its time-honored design. This season we\'re updating it with modern roman numeral markers and materials like stainless steel and soft leathe . The result? A watch you\'ll wear for years to come.\r\nCase size: 44MM; Band size: 22MM; Quartz/Chrono movement;', '2021-02-22 16:18:38', '129.00', 'In Stock', 2, 2, 2),
(10, 'Women Rose Mary  Luxury Watch', 'The Rose Colection is always in style thanks to its time-honored design. This season we\'re updating it with modern roman numeral markers and materials like stainless steel and soft leathe . The result? A watch you\'ll wear for years to come.\r\nCase size: 44MM; Band size: 22MM; Quartz/Chrono movement;', '2021-02-22 16:18:38', '95.99', 'In Stock', 3, 2, 4),
(11, 'Fossil Men\'s Smart Watch', 'Fossil Men\'s Smart Watch is always in style thanks to its time-honored design. This season we\'re updating it with modern roman numeral markers and materials like stainless steel and soft leathe . The result? A watch you\'ll wear for years to come.\r\nCase size: 44MM; Band size: 22MM; Quartz/Chrono movement;', '2021-02-22 16:20:29', '149.00', 'In Stock', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `id_slika` int(11) NOT NULL,
  `link` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id_slika`, `link`, `text`) VALUES
(1, 'p1.png', 'proizvod1'),
(2, 'p2.png                   ', 'proizvod2'),
(3, 'p3.png', 'proizvod3'),
(4, 'p4.png', 'proizvod4'),
(5, 'p5.png', 'proizvod5'),
(6, 'p6.png', 'proizvod6'),
(7, 'p7.png', 'proizvod7'),
(8, 'p8.png', 'proizvod8'),
(9, 'p9.png', 'proizvod9'),
(10, 'p10.png', 'proizvod10'),
(11, 'p11.png', 'proizvod11'),
(12, 'news1.jpg', 'firstnews'),
(13, 'news2.jpg', 'secnews'),
(14, 'news3.jpg', 'treenews'),
(15, 'banner1.png', 'banner1'),
(16, 'banner2.png', 'banner2'),
(17, 'banner3.png', 'banner3'),
(18, 'banner4.png', 'banner4'),
(20, 'get.png', 'admin-inserted-slika');

-- --------------------------------------------------------

--
-- Table structure for table `slika_proizvod`
--

CREATE TABLE `slika_proizvod` (
  `id_sp` int(11) NOT NULL,
  `id_proizvod` int(11) NOT NULL,
  `id_slika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slika_proizvod`
--

INSERT INTO `slika_proizvod` (`id_sp`, `id_proizvod`, `id_slika`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE `tip` (
  `id_tip` int(11) NOT NULL,
  `nazivtipa` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`id_tip`, `nazivtipa`) VALUES
(1, 'Smart Watch'),
(2, 'Analog Watch'),
(3, 'Quartz Watch'),
(4, 'Luxury Watch');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `id_vesti` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `id_slika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`id_vesti`, `naziv`, `opis`, `id_slika`) VALUES
(1, 'Popular Selling Items This Year', 'Custom watches with complimentary engraving at a our newest store. Engraving is available at participating U.S. and Canadian full-priced and outlets.', 12),
(2, 'Ongoing Celebration Of Sale', 'The observance of a holiday or celeb-day, as by solemnities. A social gathering for entertainment and fun; a party.', 13),
(3, 'Team Employment Program', 'Full-Time Employees. These employees normally work a 30- to 40-hour week or 130 hours in a calendar month by IRS standards. ...', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_anketa`);

--
-- Indexes for table `baner`
--
ALTER TABLE `baner`
  ADD PRIMARY KEY (`id_baner`),
  ADD KEY `id_slika` (`id_slika`);

--
-- Indexes for table `boja`
--
ALTER TABLE `boja`
  ADD PRIMARY KEY (`id_boja`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id_kontakt`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`id_navigacija`);

--
-- Indexes for table `pol`
--
ALTER TABLE `pol`
  ADD PRIMARY KEY (`id_pol`);

--
-- Indexes for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD PRIMARY KEY (`id_porudzbina`),
  ADD KEY `id_porizvod` (`id_proizvod`),
  ADD KEY `id_korisnik` (`id_korisnik`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id_proizvod`),
  ADD KEY `id_boja` (`id_boja`),
  ADD KEY `id_pol` (`id_pol`),
  ADD KEY `id_tip` (`id_tip`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`id_slika`);

--
-- Indexes for table `slika_proizvod`
--
ALTER TABLE `slika_proizvod`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_proizvod` (`id_proizvod`),
  ADD KEY `id_slika` (`id_slika`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`id_tip`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`id_vesti`),
  ADD KEY `id_slika` (`id_slika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_anketa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `baner`
--
ALTER TABLE `baner`
  MODIFY `id_baner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boja`
--
ALTER TABLE `boja`
  MODIFY `id_boja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id_kontakt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `navigacija`
--
ALTER TABLE `navigacija`
  MODIFY `id_navigacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pol`
--
ALTER TABLE `pol`
  MODIFY `id_pol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `porudzbine`
--
ALTER TABLE `porudzbine`
  MODIFY `id_porudzbina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id_proizvod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `id_slika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slika_proizvod`
--
ALTER TABLE `slika_proizvod`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tip`
--
ALTER TABLE `tip`
  MODIFY `id_tip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `id_vesti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baner`
--
ALTER TABLE `baner`
  ADD CONSTRAINT `baner_ibfk_1` FOREIGN KEY (`id_slika`) REFERENCES `slika` (`id_slika`);

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id_uloga`);

--
-- Constraints for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD CONSTRAINT `porudzbine_ibfk_1` FOREIGN KEY (`id_proizvod`) REFERENCES `proizvod` (`id_proizvod`),
  ADD CONSTRAINT `porudzbine_ibfk_2` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnici` (`id_korisnik`);

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`id_boja`) REFERENCES `boja` (`id_boja`),
  ADD CONSTRAINT `proizvod_ibfk_2` FOREIGN KEY (`id_tip`) REFERENCES `tip` (`id_tip`),
  ADD CONSTRAINT `proizvod_ibfk_3` FOREIGN KEY (`id_pol`) REFERENCES `pol` (`id_pol`);

--
-- Constraints for table `slika_proizvod`
--
ALTER TABLE `slika_proizvod`
  ADD CONSTRAINT `slika_proizvod_ibfk_1` FOREIGN KEY (`id_proizvod`) REFERENCES `proizvod` (`id_proizvod`) ON DELETE CASCADE,
  ADD CONSTRAINT `slika_proizvod_ibfk_2` FOREIGN KEY (`id_slika`) REFERENCES `slika` (`id_slika`);

--
-- Constraints for table `vesti`
--
ALTER TABLE `vesti`
  ADD CONSTRAINT `vesti_ibfk_1` FOREIGN KEY (`id_slika`) REFERENCES `slika` (`id_slika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
