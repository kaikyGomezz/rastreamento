<?php
$mysqli = new mysqli('switchyard.proxy.rlwy.net', 'root', 'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES', 'railway', 40399);

$placa_cavalo = $_POST['placa_cavalo'];
$placa_carreta = $_POST['placa_carreta'];
$status = $_POST['status'];
$localizacao = $_POST['localizacao'];
$destino = $_POST['destino'];

// Para simplificação: valores fixos de latitude/longitude
$latitude = -23.5505;  // Exemplo: São Paulo
$longitude = -46.6333;

$destino_lat = -20.4697;  // Exemplo: Campo Grande
$destino_lon = -54.6201;

$stmt = $mysqli->prepare("INSERT INTO caminhoes (placa_cavalo, placa_carreta, status, localizacao, destino, latitude, longitude, destino_lat, destino_lon) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssddd", $placa_cavalo, $placa_carreta, $status, $localizacao, $destino, $latitude, $longitude, $destino_lat, $destino_lon);
$stmt->execute();

header("Location: ../index.php");
?>
