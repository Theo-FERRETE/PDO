<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controller/loginController.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/index.css" />
</head>
<body>
<div class="container">
    <h2>Connexion</h2>
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
        <button type="submit">Connexion</button>
    </form>
    <p>Déjà inscrit ? <a href="<?= BASE_URL ?>pages/register.php">Inscrire</a></p>
</div>
</body>
</html>


