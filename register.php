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

    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
        $message[] = 'Lütfen geçerli bilgiler girin. Şifre en az 6 karakter olmalı.';
    } elseif ($password !== $password_confirm) {
        $message[] = 'Şifreler eşleşmiyor.';
    } else {
        $select_user = $conn->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $select_user->execute([$email]);

        if ($select_user->fetch()) {
            $message[] = 'Bu e-posta ile kayıtlı bir kullanıcı var.';
        } else {
            $role = 'user';
            $insert_user = $conn->prepare('INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)');
            $insert_user->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $role]);

            $_SESSION['user'] = [
                'id'    => (int) $conn->lastInsertId(),
                'name'  => $name,
                'email' => $email,
                'role'  => $role,
            ];

            header('Location: index.php');
            exit;
        }
    }
}
?>

<?= $Doctype ?><?= $Lang ?>
<head>
    <title>Kayıt Ol - Arda Altunel Music</title>
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
        <p>Ad Soyad <span>*</span></p>
        <input type="text" name="name" placeholder="Adınız" required maxlength="100" class="box">
        <p>E-posta <span>*</span></p>
        <input type="email" name="email" placeholder="E-posta adresiniz" required maxlength="150" class="box">
        <p>Şifre <span>*</span></p>
        <div class="password-field">
            <input type="password" name="password" placeholder="En az 6 karakter" required minlength="6" class="box">
            <button type="button" class="toggle-password" aria-label="Şifreyi göster"><i class="fas fa-eye"></i></button>
        </div>
        <p>Şifre Tekrar <span>*</span></p>
        <div class="password-field">
            <input type="password" name="password_confirm" placeholder="Şifrenizi tekrar girin" required minlength="6" class="box">
            <button type="button" class="toggle-password" aria-label="Şifreyi göster"><i class="fas fa-eye"></i></button>
        </div>
        <input type="submit" value="Kayıt Ol" class="btn">
        <a href="login.php" class="option-btn">Giriş Yap</a>
    </form>
</section>
<script src="js/script.js"></script>
</body>
</html>
