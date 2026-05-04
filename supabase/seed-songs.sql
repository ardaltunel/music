-- Optional seed for the existing static songs.
-- Run schema.sql first, then run this file in Supabase SQL Editor.

insert into public.songs (id, user_id, name, artist, album_url, music_url, status, created_at)
values
(28, null, 'Beni Vur', 'Eda Baba', 'uploaded_album/ab67616d0000b273147ba0cbad3aa78e82039b62.jpeg', 'uploaded_music/Eda Baba - Beni Vur.mp3', 'approved', '2026-05-03 14:03:20'),
(27, null, 'Bi Tek Ben Anlarim', 'Köfn', 'uploaded_album/unnamed.jpeg', 'uploaded_music/KOÌˆFN - Bi Tek Ben AnlarÄ±m - (Official Video).mp3', 'approved', '2026-05-03 14:03:20'),
(26, null, 'Yokluğunda', 'Leyla The Band', 'uploaded_album/5d235a8d24009f09525b20fc1b0f047e.640x640x1.jpg', 'uploaded_music/YoklugÌ†unda (Leyla The Band).mp3', 'approved', '2026-05-03 14:03:20'),
(25, null, 'Ay Tenli Kadın', 'Ufuk Beydemir', 'uploaded_album/artworks-000494116521-alnago-t500x500.jpeg', 'uploaded_music/Ufuk Beydemir - Ay Tenli KadÄ±n.mp3', 'approved', '2026-05-03 14:03:20'),
(24, null, 'Gökyüzünü Tutamam', 'Can Koç', 'uploaded_album/ab67616d0000b273183337eef9318285b10d6164.jpeg', 'uploaded_music/GoÌˆkyuÌˆzuÌˆnuÌˆ Tutamam.mp3', 'approved', '2026-05-03 14:03:20'),
(23, null, 'Bir Derdim Var', 'Mor ve Ötesi', 'uploaded_album/mqdefault.jpeg', 'uploaded_music/Bir Derdim Var.mp3', 'approved', '2026-05-03 14:03:20'),
(22, null, 'Değmesin Ellerimiz', 'Model', 'uploaded_album/2aad4d47cc7cb816525862dc5f19ccff.1000x1000x1.png', 'uploaded_music/biz hicÌ§ beceremedik, sevmeyi de terk etmeyi de..mp3', 'approved', '2026-05-03 14:03:20'),
(21, null, 'Arnavut Kaldırımı', 'Demet Sağıroğlu', 'uploaded_album/s-50a7468337adeceb913a047dc6bdc542fcb2caaa.webp', 'uploaded_music/Demet SagÌ†Ä±rogÌ†lu - Arnavut KaldÄ±rÄ±mÄ±.mp3', 'approved', '2026-05-03 14:03:20'),
(20, null, 'Pembe Mezarlık', 'Model', 'uploaded_album/x1080.jpeg', 'uploaded_music/Model - Pembe MezarlÄ±k.mp3', 'approved', '2026-05-03 14:03:20'),
(19, null, 'Kendime Yalan Söyledim', 'Seksendört', 'uploaded_album/sddefault.jpeg', 'uploaded_music/SeksendoÌˆrt - Kendime Yalan SoÌˆyledim.mp3', 'approved', '2026-05-03 14:03:20'),
(18, null, 'Her Akşam Votka Rakı', 'Mary Jane', 'uploaded_album/maxresdefault.jpeg', 'uploaded_music/Mary Jane - Her AksÌ§am Votka RakÄ± SÌ§arap - Akustik Cover (SoÌˆzleri).mp3', 'approved', '2026-05-03 14:03:20'),
(17, null, 'Nah Neh Nah', 'Vaya Con Dios', 'uploaded_album/VAYA-CON-DIOS-1282679367.jpeg', 'uploaded_music/Nah Neh Nah.mp3', 'approved', '2026-05-03 14:03:20'),
(16, null, 'Unchain My Heart', 'Joe Cocker', 'uploaded_album/joe-cocker---unchain-my-heart-ikinci-el-016f.jpeg', 'uploaded_music/Unchain My Heart.mp3', 'approved', '2026-05-03 14:03:20'),
(12, null, 'D.H.S', 'melfete', 'uploaded_album/dhs.jpg', 'uploaded_music/melfete-dhs-official-video.mp3', 'approved', '2026-05-03 14:03:20'),
(11, null, 'İSTANBUL FLOW', 'Amentu', 'uploaded_album/ist.jfif', 'uploaded_music/amentu-istanbul-flowprod-cvn.mp3', 'approved', '2026-05-03 14:03:20'),
(10, null, 'Zenti', 'EX', 'uploaded_album/zenti.jpg', 'uploaded_music/zenti.mp3', 'approved', '2026-05-03 14:03:20'),
(9, null, 'ÇALKALA', 'ELMUSTO', 'uploaded_album/calkalaelmustoo.png', 'uploaded_music/elmusto-calkala.mp3', 'approved', '2026-05-03 14:03:20'),
(8, null, 'ANORMAL', 'ALIZADE', 'uploaded_album/anormal.jpg', 'uploaded_music/alizade-anormal-official-video.mp3', 'approved', '2026-05-03 14:03:20'),
(7, null, 'Kalbin bana kaldı', 'ALIZADE & BEGE', 'uploaded_album/kalbinbana.jpg', 'uploaded_music/alizade-bege-kalbin-bana-kaldi-lyric-video.mp3', 'approved', '2026-05-03 14:03:20'),
(6, null, 'FLEX SO HARD RMX', 'SUMMER CEM & UZI', 'uploaded_album/flexsohard.jfif', 'uploaded_music/summer-cem-uzi-flex-so-hard-rmx-official-video-prod-by-miksu-macloud.mp3', 'approved', '2026-05-03 14:03:20'),
(5, null, 'Herkes Gibisin', 'Semicenk', 'uploaded_album/herkesgibisin.jfif', 'uploaded_music/semicenk-herkes-gibisin.mp3', 'approved', '2026-05-03 14:03:20'),
(4, null, 'OnlyFans', 'Lil Zey', 'uploaded_album/onlyfans.jpg', 'uploaded_music/lil-zey-onlyfans-official-music-video.mp3', 'approved', '2026-05-03 14:03:20'),
(3, null, 'Sayısal Loto', 'ELMUSTO', 'uploaded_album/sayÄ±salloto.jpg', 'uploaded_music/elmusto-sayisal-loto-prodby-yns.mp3', 'approved', '2026-05-03 14:03:20'),
(2, null, 'Hakim Bey', 'KADR', 'uploaded_album/13193931771497000145_mq.jpg', 'uploaded_music/kadr-hakim-bey.mp3', 'approved', '2026-05-03 14:03:20'),
(1, null, 'ARAB GHETTO', 'Amentu', 'uploaded_album/arab-getto.jpg', 'uploaded_music/amentu-arab-ghettoprod-paisabeatz.mp3', 'approved', '2026-05-03 14:03:20')
on conflict (id) do update
set name = excluded.name,
    artist = excluded.artist,
    album_url = excluded.album_url,
    music_url = excluded.music_url,
    status = excluded.status;

select setval(pg_get_serial_sequence('public.songs', 'id'), (select coalesce(max(id), 0) from public.songs));
