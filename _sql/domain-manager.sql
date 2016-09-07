-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Eyl 2016, 10:49:52
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
  `domain_ns1` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `domain_ns2` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `domain_ns3` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `domain_ip1` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `domain_ip2` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `domain_ip3` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `domain_update_date` int(11) NOT NULL,
  `domain_expiration_date` int(11) NOT NULL,
  `domain_creation_date` int(11) NOT NULL,
  `domain_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
  MODIFY `domain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
