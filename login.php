<?php
include '../cdn.ardaltunel.com/ardaltunel.php';
require_once 'auth.php';

$message = [];

if (is_logged_in()) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $select_user = $conn->prepare('SELECT id, name, email, password, role FROM users WHERE email = ? LIMIT 1');
    $select_user->execute([$email]);
    $user = $select_user->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'id'    => (int) $user['id'],
            'name'  => $user['name'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ];
        header('Location: index.php');
        exit;
    }

    $message[] = 'E-posta veya şifre hatalı.';
}
?>

<?= $Doctype ?><?= $Lang ?>
<head>
    <title>Giriş Yap - Arda Altunel Music</title>
    <?= $Meta ?><?= $GoogleTag ?><?= $GoogleAdSanse ?><?= $MetaIcons ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="<?= $DomainUrlFullPath ?>/css/style.css">
</head>
<body>
<?php foreach ($message as $item) : ?>
    <div class="message"><span><?= e($item) ?></span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>
<?php endforeach; ?>

<section class="form-container auth-page">
    <h3 class="heading"><a href="/">Music</a></h3>
    <form action="" method="POST">
        <?= csrf_field() ?>
        <p>E-posta <span>*</span></p>
        <input type="email" name="email" placeholder="E-posta adresiniz" required maxlength="150" class="box">
        <p>Şifre <span>*</span></p>
        <div class="password-field">
            <input type="password" name="password" placeholder="Şifreniz" required class="box">
            <button type="button" class="toggle-password" aria-label="Şifreyi göster"><i class="fas fa-eye"></i></button>
        </div>
        <input type="submit" value="Giriş Yap" class="btn">
        <a href="register.php" class="option-btn">Hesap Oluştur</a>
    </form>
</section>
<script src="js/script.js"></script>
</body>
</html>
