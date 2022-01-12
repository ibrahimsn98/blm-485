-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: db
-- Üretim Zamanı: 12 Oca 2022, 16:13:47
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `movies`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `genres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `image`, `genres`) VALUES
(2, 'Demir Adam 2 (2010)', 'Serinin ikinci filmin de milyarder mucit Tony Stark’ın zırhlı Süper Kahraman Iron Man olduğu tüm dünya tarafından bilinmektedir. Teknolojisini orduyla paylaşması için hükümetten, basından ve halktan baskı gören Tony, bilginin yanlış ellere geçmesinden korktuğu için Iron Man zırhının sırrını açıklamak istemez. Yanında Pepper Potts, ve James “Rhodey” Rhodes ile birlikte, Tony yeni ittifaklar kurar ve yeni büyük güçlerle yüzleşir.', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1NHEyFPxKnsLdMuDVPy6AI7GRmE.jpg', 'Action'),
(10, 'Blade Runner: Black Lotus', 'Los Angeles 2032. A young woman wakes up with no memories, and possessing deadly skills. The only clues to her mystery are a locked data device and a tattoo of a black lotus. Putting together the pieces, she must hunt down the people responsible for her brutal and bloody past to find the truth of her lost identity.', 'https://www.themoviedb.org/t/p/w1280/zHQJkDZ4OjqJnp4vtphxOQ7GIh6.jpg', 'Action, Fantasy'),
(11, 'Hellbound (2021)', 'Doğaüstü varlıkların insanları kanlı bir şekilde cezalandırarak cehenneme mahkûm ettiği bir ortam, ilahi adalet temelinde kurulan dinî bir gruba zemin hazırlar.', 'https://www.themoviedb.org/t/p/w1280/sgTu75c5PJsRHDMSna0ha8bhYWn.jpg', 'Dram, Guilty'),
(12, 'Zaman Çarkı (2021)', 'Beş genç köylünün hayatları, garip ve güçlü bir kadının gelmesiyle sonsuza dek değişir. Kadın, içlerinden birinin Işık ve Karanlık arasındaki dengeyi sonsuza dek değiştirme gücüyle, kadim bir kehanetten geldiğini söyler. Karanlık Varlık hapisten kaçıp Son Savaş başlamadan evvel, dünyanın kaderi konusunda ya o yabancıya ya da kendilerine güveneceklerdir.', 'https://www.themoviedb.org/t/p/w1280/mpgDeLhl8HbhI03XLB7iKO6M6JE.jpg', 'Action, Dram');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(5, 'test', 'asdasd@gmail.com', '7815696ecbf1c96e6894b779456d330e', 0),
(6, 'ibrahim', 'ibrahimsn98@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'ibrahim', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `watches`
--

CREATE TABLE `watches` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `watches`
--

INSERT INTO `watches` (`id`, `user_id`, `movie_id`) VALUES
(1, 1, 2),
(9, 3, 4),
(10, 3, 2),
(11, 1, 3),
(12, 4, 2),
(13, 5, 4),
(14, 6, 2),
(15, 6, 10),
(16, 6, 12);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `watches`
--
ALTER TABLE `watches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
