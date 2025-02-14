<?php
$config = require __DIR__ . '/../config.php';

$host = $config['DB_HOST'];
$dbname = $config['DB_NAME'];
$username = $config['DB_USER'];
$password = $config['DB_PASS'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    respond(["error" => "Database connection failed"], 500);
}

// Función de autenticación
function authenticate() {
    $headers = getallheaders();
    if (!isset($headers['Authorization']) || $headers['Authorization'] !== 'Bearer dicet_token') {
        respond(["error" => "Unauthorized access"], 401);
    }
}

// Función para manejar respuestas
function respond($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}
?>
