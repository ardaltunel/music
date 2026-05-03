<?php
include '../cdn.ardaltunel.com/ardaltunel.php';
require_once 'auth.php';
require_admin();

$select_songs = $conn->prepare(
    'SELECT songs.*, users.name AS uploader
     FROM songs
     LEFT JOIN users ON users.id = songs.user_id
     ORDER BY CASE songs.status WHEN \'pending\' THEN 1 WHEN \'approved\' THEN 2 ELSE 3 END, songs.id DESC'
);
$select_songs->execute();
$songs = $select_songs->fetchAll();

$status_labels = [
    'pending' => 'Onay Bekliyor',
    'approved' => 'Onaylandı',
    'hidden' => 'Gizlendi',
];
?>

<?= $Doctype ?><?= $Lang ?>
<head>
    <title>Admin - Arda Altunel Music</title>
    <?= $Meta ?><?= $GoogleTag ?><?= $GoogleAdSanse ?><?= $MetaIcons ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="<?= $DomainUrlFullPath ?>/css/style.css">
</head>
<body>
<header class="site-header">
    <a href="/" class="brand">Music Admin</a>
    <nav class="top-nav">
        <a href="upload.php"><i class="fas fa-cloud-arrow-up"></i><span>Müzik Yükle</span></a>
        <a href="logout.php"><i class="fas fa-right-from-bracket"></i><span>Çıkış</span></a>
    </nav>
</header>

<section class="admin-panel">
    <div class="page-title">
        <h1>Şarkı Yönetimi</h1>
        <p>Onay bekleyen şarkılar sitede görünmez. Onaylananlar yayına alınır, gizlenenler yayından kalkar.</p>
    </div>

    <div class="admin-list">
        <?php foreach ($songs as $song) : ?>
            <article class="admin-song">
                <img src="<?= $song['album'] ? 'uploaded_album/' . e($song['album']) : 'images/disc.png' ?>" alt="">
                <div class="admin-song-main">
                    <strong><?= e($song['name']) ?></strong>
                    <span><?= e($song['artist'] ?: 'Sanatçı belirtilmedi') ?></span>
                    <small>Yükleyen: <?= e($song['uploader'] ?: 'Eski kayıt') ?></small>
                </div>
                <span class="status status-<?= e($song['status']) ?>"><?= e($status_labels[$song['status']] ?? $song['status']) ?></span>
                <div class="admin-actions">
                    <?php if ($song['status'] !== 'approved') : ?>
                        <form action="admin-action.php" method="POST"><?= csrf_field() ?><input type="hidden" name="id" value="<?= (int) $song['id'] ?>"><input type="hidden" name="action" value="approve"><button type="submit" title="Onayla"><i class="fas fa-check"></i></button></form>
                    <?php endif; ?>
                    <?php if ($song['status'] !== 'hidden') : ?>
                        <form action="admin-action.php" method="POST"><?= csrf_field() ?><input type="hidden" name="id" value="<?= (int) $song['id'] ?>"><input type="hidden" name="action" value="hide"><button type="submit" title="Yayından kaldır"><i class="fas fa-eye-slash"></i></button></form>
                    <?php endif; ?>
                    <form action="delete.php" method="POST" onsubmit="return confirm('Bu şarkı kalıcı olarak silinsin mi?');"><?= csrf_field() ?><input type="hidden" name="id" value="<?= (int) $song['id'] ?>"><button type="submit" class="danger" title="Sil"><i class="fas fa-trash"></i></button></form>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>
