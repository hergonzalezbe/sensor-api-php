<?php
require_once __DIR__ . '/db.php';

// Obtener todos los sensores
function getAllSensors() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM sensors WHERE active = 1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Agregar un sensor
function addSensor($data) {
    global $pdo;
    if (!isset($data['name'], $data['location'], $data['type'])) {
        return ["error" => "Missing required fields"];
    }

    $stmt = $pdo->prepare("INSERT INTO sensors (name, location, type) VALUES (:name, :location, :type)");
    $stmt->execute($data);
    return ["message" => "Sensor successfully registered"];
}

// Agregar una lectura de sensor
function addSensorReading($data) {
    global $pdo;
    if (!isset($data['sensor_id'], $data['value'])) {
        return ["error" => "Missing required fields"];
    }

    $stmt = $pdo->prepare("INSERT INTO data (sensor_id, value) VALUES (:sensor_id, :value)");
    $stmt->execute($data);
    return ["message" => "Data successfully recorded"];
}

// Obtener datos de un sensor
function getSensorData($sensor_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM data WHERE sensor_id = ? ORDER BY timestamp DESC");
    $stmt->execute([$sensor_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
