<?php
require_once __DIR__ . '/config.php';

$envPath = file_exists(__DIR__ . '/../.env.local') 
    ? __DIR__ . '/../.env.local' 
    : __DIR__ . '/../.env';

if (!file_exists($envPath)) {
    die('.env.local ou .env manquant.');
}

$env = parse_ini_file($envPath);

$host = $env['DB_HOST'] ?? 'localhost';
$db   = $env['DB_NAME'] ?? 'pdo_example';
$user = $env['DB_USER'] ?? 'root';
$pass = $env['DB_PASS'] ?? '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}


