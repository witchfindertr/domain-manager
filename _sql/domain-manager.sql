-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Eyl 2016, 14:33:54
-- Sunucu sürümü: 10.1.16-MariaDB
-- PHP Sürümü: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `domain-manager`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `domain_list`
--

CREATE TABLE `domain_list` (
  `domain_id` int(11) NOT NULL,
  `domain_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `domain_ext` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `domain_company` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `domain_creation` int(11) NOT NULL,
  `domain_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `domain_list`
--

INSERT INTO `domain_list` (`domain_id`, `domain_link`, `domain_ext`, `domain_company`, `domain_creation`, `domain_status`) VALUES
(8, 'ismailaga', '.com', 'Name.com', 1362006001, 1),
(9, 'abdullahcetinkaya', '.com', 'Name.com', 947458801, 1),
(10, 'ucankedi', '.com', 'Godaddy.com', 621468001, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `domain_list`
--
ALTER TABLE `domain_list`
  ADD UNIQUE KEY `domain_id` (`domain_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `domain_list`
--
ALTER TABLE `domain_list`
  MODIFY `domain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
