<?php
require_once 'auth.php';
require_admin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin.php');
    exit;
}

verify_csrf();

$id = (int) ($_POST['id'] ?? 0);
$select_song = $conn->prepare('SELECT album, music FROM songs WHERE id = ? LIMIT 1');
$select_song->execute([$id]);
$song = $select_song->fetch();

if ($song) {
    $delete_song = $conn->prepare('DELETE FROM songs WHERE id = ?');
    $delete_song->execute([$id]);

    foreach (['uploaded_album/' . $song['album'], 'uploaded_music/' . $song['music']] as $path) {
        if (is_file($path)) {
            unlink($path);
        }
    }
}

header('Location: admin.php');
exit;

?>
