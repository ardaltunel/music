<?php
include '../cdn.ardaltunel.com/ardaltunel.php';
require_once 'auth.php';

$search = trim($_GET['search'] ?? '');
$posts = [];

if ($search !== '') {
    $select_songs = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' AND (artist LIKE ? OR name LIKE ?) ORDER BY id DESC");
    $term = '%' . $search . '%';
    $select_songs->execute([$term, $term]);
    $posts = $select_songs->fetchAll();
}
?>

<?= $Doctype ?><?= $Lang ?>
<head>
    <title>Arama - Arda Altunel Music</title>
    <?= $Meta ?><?= $GoogleTag ?><?= $GoogleAdSanse ?><?= $MetaIcons ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="<?= $DomainUrlFullPath ?>/css/style.css">
</head>
<body>
<header class="site-header">
    <a href="/" class="brand">Music</a>
    <nav class="top-nav">
        <a href="upload.php"><i class="fas fa-cloud-arrow-up"></i><span>Müzik Yükle</span></a>
        <?php if (is_admin()) : ?><a href="admin.php"><i class="fas fa-shield-halved"></i><span>Admin</span></a><?php endif; ?>
        <?php if (is_logged_in()) : ?><a href="logout.php"><i class="fas fa-right-from-bracket"></i><span>Çıkış</span></a><?php else : ?><a href="login.php"><i class="fas fa-right-to-bracket"></i><span>Giriş</span></a><?php endif; ?>
    </nav>
</header>

<section class="playlist">
    <div class="page-title">
        <h1><?= $posts ? 'Arama Sonuçları' : 'Sonuç Bulunamadı' ?></h1>
        <p><?= e($search) ?></p>
    </div>

    <section class="search__bar">
        <form class="container search__bar-container" action="search.php" method="GET">
            <i class="fas fa-search"></i>
            <input type="search" name="search" value="<?= e($search) ?>" placeholder="Şarkı veya sanatçı ara">
            <button type="submit" name="submit">Ara</button>
        </form>
    </section>

    <div class="box-container">
        <?php foreach ($posts as $post) : ?>
            <article class="box">
                <img src="<?= $post['album'] ? 'uploaded_album/' . e($post['album']) : 'images/disc.png' ?>" alt="" class="album">
                <div class="name"><?= e($post['name']) ?></div>
                <div class="artist"><?= e($post['artist']) ?></div>
                <div class="flex">
                    <button class="play" data-src="uploaded_music/<?= e($post['music']) ?>" data-id="<?= (int) $post['id'] ?>">
                        <i class="fas fa-play"></i><span>Oynat</span>
                    </button>
                    <a href="uploaded_music/<?= e($post['music']) ?>" download><i class="fas fa-download"></i><span>İndir</span></a>
                </div>
            </article>
        <?php endforeach; ?>

        <article class="box more-btn">
            <a href="upload.php" class="btn">Müzik Yükle</a>
            <a href="/" class="option-btn">Ana Sayfaya Dön</a>
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
<script>
    window.currentSearch = <?= json_encode($search) ?>;
</script>
<script src="js/script.js"></script>
</body>
</html>
