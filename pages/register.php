<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (registerUser($pdo, $email, $password, $confirmPassword, $errors)) {
        header('Location: ' . BASE_URL . 'pages/login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/index.css" />
</head>
<body>
<div class="container">
    <h2>Inscription</h2>
    <?php if ($errors): ?>
        <div class="error">
            <?php foreach($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <input type="email" name="email" placeholder="Email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
        <input type="password" name="password" placeholder="Mot de passe" required />
        <input type="password" name="confirm_password" placeholder="Confirmez le mot de passe" required />
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="<?= BASE_URL ?>pages/login.php">Connexion</a></p>
</div>
</body>
</html>
