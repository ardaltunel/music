<?php
include '../cdn.ardaltunel.com/ardaltunel.php';
require_once 'auth.php';
require_login();

$message = [];

function unique_upload_name($original_name)
{
    $extension = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
    $safe_extension = preg_replace('/[^a-z0-9]/', '', $extension);
    return bin2hex(random_bytes(12)) . ($safe_extension ? '.' . $safe_extension : '');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $name   = trim($_POST['name'] ?? '');
    $artist = trim($_POST['artist'] ?? '');
    $album = '';
    $music = '';

    if ($name === '') {
        $message[] = 'Müzik adı zorunludur.';
    }

    if (!empty($_FILES['album']['name'])) {
        $album_extension = strtolower(pathinfo($_FILES['album']['name'], PATHINFO_EXTENSION));
        if ($_FILES['album']['size'] > 2 * 1024 * 1024) {
            $message[] = 'Albüm görseli en fazla 2 MB olabilir.';
        } elseif (!in_array($album_extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'jfif'], true)) {
            $message[] = 'Albüm görseli jpg, png, gif veya webp formatında olmalı.';
        } else {
            $album = unique_upload_name($_FILES['album']['name']);
        }
    }

    if (empty($_FILES['music']['name']) || $_FILES['music']['error'] !== UPLOAD_ERR_OK) {
        $message[] = 'Müzik dosyası seçmelisiniz.';
    } elseif ($_FILES['music']['size'] > 100 * 1024 * 1024) {
        $message[] = 'Müzik dosyası en fazla 100 MB olabilir.';
    } else {
        $music_extension = strtolower(pathinfo($_FILES['music']['name'], PATHINFO_EXTENSION));
        if (!in_array($music_extension, ['mp3', 'wav', 'ogg', 'm4a', 'aac', 'flac'], true)) {
            $message[] = 'Müzik dosyası mp3, wav, ogg, m4a, aac veya flac formatında olmalı.';
        } else {
            $music = unique_upload_name($_FILES['music']['name']);
        }
    }

    if (!$message) {
        $status = is_admin() ? 'approved' : 'pending';
        $upload_music = $conn->prepare('INSERT INTO songs (user_id, name, artist, album, music, status) VALUES (?, ?, ?, ?, ?, ?)');
        $upload_music->execute([current_user()['id'], $name, $artist, $album, $music, $status]);
        if ($album !== '') {
            move_uploaded_file($_FILES['album']['tmp_name'], 'uploaded_album/' . $album);
        }
        move_uploaded_file($_FILES['music']['tmp_name'], 'uploaded_music/' . $music);
        $message[] = is_admin()
            ? 'Müzik yüklendi ve yayına alındı.'
            : 'Müzik yüklendi. Admin onayından sonra sitede görünecek.';
    }
}
?>

<?= $Doctype ?><?= $Lang ?>
<head>
    <title>Müzik Yükle - Arda Altunel</title>
    <?= $Meta ?><?= $GoogleTag ?><?= $GoogleAdSanse ?><?= $MetaIcons ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="<?= $DomainUrlFullPath ?>/css/style.css">
</head>
<body>
<header class="site-header">
    <a href="/" class="brand">Music</a>
    <nav class="top-nav">
        <?php if (is_admin()) : ?><a href="admin.php"><i class="fas fa-shield-halved"></i><span>Admin</span></a><?php endif; ?>
        <a href="logout.php"><i class="fas fa-right-from-bracket"></i><span>Çıkış</span></a>
    </nav>
</header>

<?php foreach ($message as $item) : ?>
    <div class="message"><span><?= e($item) ?></span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>
<?php endforeach; ?>

<section class="form-container">
    <h3 class="heading"><a href="/">Müzik Yükle</a></h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <p>Müzik Adı <span>*</span></p>
        <input type="text" name="name" placeholder="Müziğin adını girin" required maxlength="100" class="box">
        <p>Sanatçı Adı</p>
        <input type="text" name="artist" placeholder="Sanatçının adını girin" maxlength="100" class="box">
        <p>Müzik Seç <span>*</span></p>
        <input type="file" name="music" class="box" required accept="audio/*">
        <p>Albüm Fotoğrafı Seç</p>
        <input type="file" name="album" class="box" accept="image/*">
        <input type="submit" value="<?= is_admin() ? 'Yükle ve Yayına Al' : 'Onaya Gönder' ?>" class="btn">
        <a href="/" class="option-btn">Ana Sayfaya Dön</a>
    </form>
</section>
</body>
</html>
