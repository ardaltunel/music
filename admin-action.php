<?php
require_once 'auth.php';
require_admin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin.php');
    exit;
}

verify_csrf();

$id = (int) ($_POST['id'] ?? 0);
$action = $_POST['action'] ?? '';

$status_by_action = [
    'approve' => 'approved',
    'hide'    => 'hidden',
    'pending' => 'pending',
];

if ($id > 0 && isset($status_by_action[$action])) {
    $update_song = $conn->prepare('UPDATE songs SET status = ? WHERE id = ?');
    $update_song->execute([$status_by_action[$action], $id]);
}

header('Location: admin.php');
exit;

?>
