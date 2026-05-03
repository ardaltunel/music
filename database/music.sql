-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 03 May 2026, 17:41:44
-- Sunucu sürümü: 10.6.19-MariaDB
-- PHP Sürümü: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ardaltun_music`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `songs`
--

CREATE TABLE `songs` (
  `id` int(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `music` varchar(100) NOT NULL,
  `status` enum('pending','approved','hidden') NOT NULL DEFAULT 'approved',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `songs`
--

INSERT INTO `songs` (`id`, `user_id`, `name`, `artist`, `album`, `music`, `status`, `created_at`) VALUES
(1, NULL, 'ARAB GHETTO', 'Amentu', 'arab-getto.jpg', 'amentu-arab-ghettoprod-paisabeatz.mp3', 'approved', '2026-05-03 14:03:20'),
(2, NULL, 'Hakim Bey', 'KADR', '13193931771497000145_mq.jpg', 'kadr-hakim-bey.mp3', 'approved', '2026-05-03 14:03:20'),
(3, NULL, 'Sayısal Loto', 'ELMUSTO', 'sayısalloto.jpg', 'elmusto-sayisal-loto-prodby-yns.mp3', 'approved', '2026-05-03 14:03:20'),
(4, NULL, 'OnlyFans', 'Lil Zey', 'onlyfans.jpg', 'lil-zey-onlyfans-official-music-video.mp3', 'approved', '2026-05-03 14:03:20'),
(5, NULL, 'Herkes Gibisin', 'Semicenk', 'herkesgibisin.jfif', 'semicenk-herkes-gibisin.mp3', 'approved', '2026-05-03 14:03:20'),
(6, NULL, 'FLEX SO HARD RMX', 'SUMMER CEM & UZI', 'flexsohard.jfif', 'summer-cem-uzi-flex-so-hard-rmx-official-video-prod-by-miksu-macloud.mp3', 'approved', '2026-05-03 14:03:20'),
(7, NULL, 'Kalbin bana kaldı', 'ALIZADE & BEGE', 'kalbinbana.jpg', 'alizade-bege-kalbin-bana-kaldi-lyric-video.mp3', 'approved', '2026-05-03 14:03:20'),
(8, NULL, 'ANORMAL', 'ALIZADE', 'anormal.jpg', 'alizade-anormal-official-video.mp3', 'approved', '2026-05-03 14:03:20'),
(9, NULL, 'ÇALKALA', 'ELMUSTO', 'calkalaelmustoo.png', 'elmusto-calkala.mp3', 'approved', '2026-05-03 14:03:20'),
(10, NULL, 'Zenti', 'EX', 'zenti.jpg', 'zenti.mp3', 'approved', '2026-05-03 14:03:20'),
(11, NULL, 'İSTANBUL FLOW', 'Amentu', 'ist.jfif', 'amentu-istanbul-flowprod-cvn.mp3', 'approved', '2026-05-03 14:03:20'),
(12, NULL, 'D.H.S', 'melfete', 'dhs.jpg', 'melfete-dhs-official-video.mp3', 'approved', '2026-05-03 14:03:20'),
(16, NULL, 'Unchain My Heart', 'Joe Cocker', 'joe-cocker---unchain-my-heart-ikinci-el-016f.jpeg', 'Unchain My Heart.mp3', 'approved', '2026-05-03 14:03:20'),
(17, NULL, 'Nah Neh Nah', 'Vaya Con Dios', 'VAYA-CON-DIOS-1282679367.jpeg', 'Nah Neh Nah.mp3', 'approved', '2026-05-03 14:03:20'),
(18, NULL, 'Her Akşam Votka Rakı', 'Mary Jane', 'maxresdefault.jpeg', 'Mary Jane - Her Akşam Votka Rakı Şarap - Akustik Cover (Sözleri).mp3', 'approved', '2026-05-03 14:03:20'),
(19, NULL, 'Kendime Yalan Söyledim', 'Seksendört', 'sddefault.jpeg', 'Seksendört - Kendime Yalan Söyledim.mp3', 'approved', '2026-05-03 14:03:20'),
(20, NULL, 'Pembe Mezarlık', 'Model', 'x1080.jpeg', 'Model - Pembe Mezarlık.mp3', 'approved', '2026-05-03 14:03:20'),
(21, NULL, 'Arnavut Kaldırımı', 'Demet Sağıroğlu', 's-50a7468337adeceb913a047dc6bdc542fcb2caaa.webp', 'Demet Sağıroğlu - Arnavut Kaldırımı.mp3', 'approved', '2026-05-03 14:03:20'),
(22, NULL, 'Değmesin Ellerimiz', 'Model', '2aad4d47cc7cb816525862dc5f19ccff.1000x1000x1.png', 'biz hiç beceremedik, sevmeyi de terk etmeyi de..mp3', 'approved', '2026-05-03 14:03:20'),
(23, NULL, 'Bir Derdim Var', 'Mor ve Ötesi', 'mqdefault.jpeg', 'Bir Derdim Var.mp3', 'approved', '2026-05-03 14:03:20'),
(24, NULL, 'Gökyüzünü Tutamam', 'Can Koç', 'ab67616d0000b273183337eef9318285b10d6164.jpeg', 'Gökyüzünü Tutamam.mp3', 'approved', '2026-05-03 14:03:20'),
(25, NULL, 'Ay Tenli Kadın', 'Ufuk Beydemir', 'artworks-000494116521-alnago-t500x500.jpeg', 'Ufuk Beydemir - Ay Tenli Kadın.mp3', 'approved', '2026-05-03 14:03:20'),
(26, NULL, 'Yokluğunda', 'Leyla The Band', '5d235a8d24009f09525b20fc1b0f047e.640x640x1.jpg', 'Yokluğunda (Leyla The Band).mp3', 'approved', '2026-05-03 14:03:20'),
(27, NULL, 'Bi Tek Ben Anlarim', 'Köfn', 'unnamed.jpeg', 'KÖFN - Bi Tek Ben Anlarım - (Official Video).mp3', 'approved', '2026-05-03 14:03:20'),
(28, NULL, 'Beni Vur', 'Eda Baba', 'ab67616d0000b273147ba0cbad3aa78e82039b62.jpeg', 'Eda Baba - Beni Vur.mp3', 'approved', '2026-05-03 14:03:20'),
(39, 1, 'BBS', 'KAVAK', 'e2b3af7a5415b04c69cf6ac5.jpg', '4323f312747abcd26f824b1a.mp3', 'approved', '2026-05-03 14:16:38'),
(40, 1, '56', 'KAVAK', 'a1ac12140d5af0362266b4f0.png', '365ae524a8c2cdfc9ad527db.mp3', 'approved', '2026-05-03 14:25:02'),
(41, 2, 'cümlelerim', 'TUANA', '7c29c70af8c7b854c404f644.png', '82df47fad214022cbef3f5df.mp3', 'approved', '2026-05-03 14:38:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Arda Altunel', 'arifardaaltunel@gmail.com', '$2y$10$8.HA4lAav5HsXJkgqJpriOGlsEbnIQ6K0jNWJODHhTvsO2M1fi7YW', 'admin', '2026-05-03 14:06:20'),
(2, 'Tuana Kaya', 'tuanakaya@gmail.com', '$2y$10$iGv8KrHTAU7SFRbMrcSRTeL3PGzfENe3VF92SgEef1Z4hzlQYyy.W', 'user', '2026-05-03 14:13:17');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_user_id_index` (`user_id`),
  ADD KEY `songs_status_index` (`status`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
