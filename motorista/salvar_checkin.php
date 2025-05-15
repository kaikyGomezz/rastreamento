<?php
include '../conexao.php';

$placa_cavalo = $_POST['placa_cavalo'];
$placa_carreta = $_POST['placa_carreta'];
$status = $_POST['status'];
$destino = $_POST['destino'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$localizacao = "Lat: $latitude, Lon: $longitude";

$sql = "INSERT INTO caminhoes (placa_cavalo, placa_carreta, status, localizacao, destino, latitude, longitude)
        VALUES ('$placa_cavalo', '$placa_carreta', '$status', '$localizacao', '$destino', $latitude, $longitude)";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Check-in enviado com sucesso!'); window.location.href = '../index.php';</script>";
} else {
  echo "Erro: " . $conn->error;
}

$conn->close();
?>