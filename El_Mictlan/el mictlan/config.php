<?php

const MODO_DESARROLLO = true;

if (MODO_DESARROLLO) {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
    ini_set('error_log', __DIR__ . '/errores.log');
    error_reporting(E_ALL);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$db   = "elmictlan";
$user = "root";
$pass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    if (MODO_DESARROLLO) {
        die("Error de conexión con MySQL: " . $e->getMessage());
    }
    error_log("Fallo de conexión a MySQL: " . $e->getMessage());
    die("En este momento no podemos conectarnos. Intenta de nuevo en unos minutos.");
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function csrf_campo(): string {
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
}

function csrf_valido(): bool {
    $recibido = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    return hash_equals($_SESSION['csrf_token'], $recibido);
}

function limite_alcanzado(string $clave, int $maximo, int $segundos): bool {
    $ahora = time();
    $registro = $_SESSION['limite_' . $clave] ?? ['inicio' => $ahora, 'conteo' => 0];

    if ($ahora - $registro['inicio'] > $segundos) {
        $registro = ['inicio' => $ahora, 'conteo' => 0];
    }

    $registro['conteo']++;
    $_SESSION['limite_' . $clave] = $registro;

    return $registro['conteo'] > $maximo;
}