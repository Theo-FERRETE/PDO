<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "pages/login.php");
    exit;
}

// Récupération des utilisateurs
$stmt = $pdo->query("SELECT email, created_at FROM utilisateurs ORDER BY created_at DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/index.css">
</head>
<body>
    <div class="container">       
        <h3>Utilisateurs inscrits :</h3>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <?= htmlspecialchars($user['email']) ?> — inscrit le <?= htmlspecialchars($user['created_at']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
         <div class="logout">
            <a href="<?= BASE_URL ?>pages/logout.php">Déconnexion</a>
        </div>
    </div>
</body>
</html>
