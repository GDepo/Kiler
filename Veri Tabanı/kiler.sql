-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Eki 2020, 22:30:18
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kiler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adet` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urun_adi`, `adet`) VALUES
(1, 'Ekmek', 23),
(2, 'Tuz', 300),
(3, 'Salça', 46),
(4, 'Yağ', 133),
(5, 'Kuru Fasulye', 49),
(6, 'Kıyma', 78),
(7, 'Mantı', 30),
(8, 'Yoğurt', 36),
(9, 'Pirinç', 50),
(10, 'Makarna', 75),
(11, 'Et Suyu', 55);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemekler`
--

CREATE TABLE `yemekler` (
  `id` int(11) NOT NULL,
  `urunadi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `malz1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `malz2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `malz3` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `malz4` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `yemekler`
--

INSERT INTO `yemekler` (`id`, `urunadi`, `malz1`, `malz2`, `malz3`, `malz4`) VALUES
(1, 'Mantı', 'Yoğurt', 'Salça', 'Yağ', 'Mantı'),
(2, 'Köfte', 'Kıyma', 'Yağ', 'Ekmek', 'Tuz'),
(3, 'Makarna', 'Makarna', 'Yağ', 'Salça', 'Tuz'),
(4, 'Kuru Fasulye', 'Kuru Fasulye', 'Yağ', 'Tuz', 'Salça'),
(5, 'Pilav', 'Pirinç', 'Yağ', 'Tuz', 'Et Suyu');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yemekler`
--
ALTER TABLE `yemekler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `yemekler`
--
ALTER TABLE `yemekler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
