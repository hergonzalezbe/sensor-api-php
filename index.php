<?php
require_once __DIR__ . '/src/db.php';
require_once __DIR__ . '/src/Sensor.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));

// Autenticación en cada solicitud
authenticate();

try {
    if ($method === 'GET' && $request[0] === 'sensors') {
        respond(getAllSensors());
    } elseif ($method === 'POST' && $request[0] === 'sensors') {
        $data = json_decode(file_get_contents("php://input"), true);
        respond(addSensor($data));
    } elseif ($method === 'POST' && $request[0] === 'data') {
        $data = json_decode(file_get_contents("php://input"), true);
        respond(addSensorReading($data));
    } elseif ($method === 'GET' && $request[0] === 'data' && isset($request[1]) && is_numeric($request[1])) {
        respond(getSensorData(intval($request[1])));
    } else {
        respond(["error" => "Invalid route"], 404);
    }
} catch (Exception $e) {
    respond(["error" => "Server error: " . $e->getMessage()], 500);
}
?>
