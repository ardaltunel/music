<?php

require_once 'connect.php';

if (!isset($_GET['song_id'])) {
    http_response_code(400);
    exit;
}

$song_id = (int) $_GET['song_id'];
$search = trim($_GET['search'] ?? '');

if ($search !== '') {
    $next_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' AND id < ? AND (artist LIKE ? OR name LIKE ?) ORDER BY id DESC LIMIT 1");
    $term = '%' . $search . '%';
    $next_song->execute([$song_id, $term, $term]);
} else {
    $next_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' AND id < ? ORDER BY id DESC LIMIT 1");
    $next_song->execute([$song_id]);
}

$next_song_info = $next_song->fetch(PDO::FETCH_ASSOC);

if (!$next_song_info) {
    if ($search !== '') {
        $next_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' AND (artist LIKE ? OR name LIKE ?) ORDER BY id DESC LIMIT 1");
        $next_song->execute([$term, $term]);
    } else {
        $next_song = $conn->prepare("SELECT * FROM songs WHERE status = 'approved' ORDER BY id DESC LIMIT 1");
        $next_song->execute();
    }

    $next_song_info = $next_song->fetch(PDO::FETCH_ASSOC);
}

if (!$next_song_info) {
    http_response_code(404);
    exit;
}

echo json_encode($next_song_info);

?>
