<?php
require_once "config.php";
header("Content-Type: application/json; charset=utf-8");

try {
    if (!csrf_valido()) {
        echo json_encode(['ok' => false, 'error' => 'Sesión expirada, recarga la página.']);
        exit;
    }
    if (limite_alcanzado('agregar_carrito', 40, 30)) {
        echo json_encode(['ok' => false, 'error' => 'Vas muy rápido, espera un momento.']);
        exit;
    }

    $id = (int)($_POST['id'] ?? 0);
    if ($id <= 0) {
        echo json_encode(['ok' => false]);
        exit;
    }

    $stmt = $pdo->prepare("SELECT id, stock FROM productos WHERE id=? AND disponible=1");
    $stmt->execute([$id]);
    $producto = $stmt->fetch();

    if (!$producto) {
        echo json_encode(['ok' => false]);
        exit;
    }
    if ($producto['stock'] !== null && (int)$producto['stock'] <= 0) {
        echo json_encode(['ok' => false, 'error' => 'Ya no hay existencias de este producto.']);
        exit;
    }

    if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];
    $_SESSION['carrito'][$id] = ($_SESSION['carrito'][$id] ?? 0) + 1;

    $totalItems = array_sum($_SESSION['carrito']);
    echo json_encode(['ok' => true, 'cantidad' => $totalItems]);

} catch (PDOException $e) {

    echo json_encode(['ok' => false, 'error' => 'Error de base de datos: ' . $e->getMessage()]);
}