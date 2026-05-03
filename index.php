<?php
include '../cdn.ardaltunel.com/ardaltunel.php';
require_once 'auth.php';

$select_songs = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' ORDER BY id DESC");
$select_songs->execute();
$songs = $select_songs->fetchAll();
?>

<?= $Doctype ?><?= $Lang ?>
<head>
    <title>Music App - Arda Altunel</title>
    <?= $Meta ?><?= $GoogleTag ?><?= $GoogleAdSanse ?><?= $MetaIcons ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="<?= $DomainUrlFullPath ?>/css/style.css">
</head>
<body>

<header class="site-header">
    <a href="/" class="brand">Music</a>
    <nav class="top-nav">
        <a href="upload.php"><i class="fas fa-cloud-arrow-up"></i><span>Müzik Yükle</span></a>
        <?php if (is_admin()) : ?>
            <a href="admin.php"><i class="fas fa-shield-halved"></i><span>Admin</span></a>
        <?php endif; ?>
        <?php if (is_logged_in()) : ?>
            <span class="user-chip"><?= e(current_user()['name']) ?></span>
            <a href="logout.php"><i class="fas fa-right-from-bracket"></i><span>Çıkış</span></a>
        <?php else : ?>
            <a href="login.php"><i class="fas fa-right-to-bracket"></i><span>Giriş</span></a>
        <?php endif; ?>
    </nav>
</header>

<section class="playlist">
    <div class="page-title">
        <h1>Music Playlist</h1>
        <p>Topluluğun eklediği ve admin tarafından onaylanan şarkılar.</p>
    </div>

    <section class="search__bar">
        <form class="container search__bar-container" action="search.php" method="GET">
            <i class="fas fa-search"></i>
            <input type="search" name="search" placeholder="Şarkı veya sanatçı ara">
            <button type="submit" name="submit">Ara</button>
        </form>
    </section>

    <div class="box-container">
        <?php foreach ($songs as $song) : ?>
            <article class="box">
                <img src="<?= $song['album'] ? 'uploaded_album/' . e($song['album']) : 'images/disc.png' ?>" alt="" class="album">
                <div class="name"><?= e($song['name']) ?></div>
                <div class="artist"><?= e($song['artist']) ?></div>
                <div class="flex">
                    <button class="play" data-src="uploaded_music/<?= e($song['music']) ?>" data-id="<?= (int) $song['id'] ?>">
                        <i class="fas fa-play"></i><span>Oynat</span>
                    </button>
                    <a href="uploaded_music/<?= e($song['music']) ?>" download>
                        <i class="fas fa-download"></i><span>İndir</span>
                    </a>
                </div>
            </article>
        <?php endforeach; ?>

        <article class="box more-btn">
            <a href="upload.php" class="btn">Müzik Yükle</a>
        </article>
    </div>
</section>

<div class="music-player" id="myModal">
    <i class="fas fa-times" id="close"></i>
    <div class="main-box">
        <button class="player-arrow" id="prev_song_button" data-id=""><i class="fa fa-angle-left" aria-hidden="true"></i></button>
        <div class="box box-custom">
            <img src="" class="album" alt="">
            <div class="name"></div>
            <div class="artist"></div>
            <audio src="" controls class="music" id="myAudio"></audio>
        </div>
        <button class="player-arrow" id="next_song_button" data-id=""><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
