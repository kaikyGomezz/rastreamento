<?php
include("../conexao.php");

$placa_cavalo = $_POST["placa_cavalo"];
$placa_carreta = $_POST["placa_carreta"];
$status = $_POST["status"];
$localizacao = $_POST["localizacao"];
$destino = $_POST["destino"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];

// Validação simples
if (!$placa_cavalo || !$placa_carreta || !$status || !$localizacao || !$destino || !$latitude || !$longitude) {
    die("Erro: todos os campos são obrigatórios.");
}

$sql = "INSERT INTO caminhoes (placa_cavalo, placa_carreta, status, localizacao, destino, latitude, longitude)
        VALUES ('$placa_cavalo', '$placa_carreta', '$status', '$localizacao', '$destino', $latitude, $longitude)";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center; font-family:sans-serif;'>Check-in realizado com sucesso! ✅</h2>";
    echo "<p style='text-align:center;'><a href='checkin.php'>Voltar</a></p>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
