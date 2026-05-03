<?php

require_once 'connect.php';

if (!isset($_GET['song_id'])) {
    http_response_code(400);
    exit;
}

$song_id = (int) $_GET['song_id'];
$search = trim($_GET['search'] ?? '');

if ($search !== '') {
    $prev_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' AND id > ? AND (artist LIKE ? OR name LIKE ?) ORDER BY id ASC LIMIT 1");
    $term = '%' . $search . '%';
    $prev_song->execute([$song_id, $term, $term]);
} else {
    $prev_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' AND id > ? ORDER BY id ASC LIMIT 1");
    $prev_song->execute([$song_id]);
}

$prev_song_info = $prev_song->fetch(PDO::FETCH_ASSOC);

if (!$prev_song_info) {
    if ($search !== '') {
        $prev_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' AND (artist LIKE ? OR name LIKE ?) ORDER BY id ASC LIMIT 1");
        $prev_song->execute([$term, $term]);
    } else {
        $prev_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' ORDER BY id ASC LIMIT 1");
        $prev_song->execute();
    }

    $prev_song_info = $prev_song->fetch(PDO::FETCH_ASSOC);
}

if (!$prev_song_info) {
    http_response_code(404);
    exit;
}

echo json_encode($prev_song_info);

?>
