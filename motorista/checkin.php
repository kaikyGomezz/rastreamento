<?php
include('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $placa_cavalo = $_POST['placa_cavalo'];
  $placa_carreta = $_POST['placa_carreta'];
  $status = $_POST['status'];
  $localizacao = $_POST['localizacao'];
  $destino = $_POST['destino'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  $stmt = $mysqli->prepare("INSERT INTO caminhoes (placa_cavalo, placa_carreta, status, localizacao, destino, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssd", $placa_cavalo, $placa_carreta, $status, $localizacao, $destino, $latitude, $longitude);
  $stmt->execute();

  echo "<script>alert('Check-in enviado com sucesso!'); window.location.href='../index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check-in do Motorista</title>
</head>
<body style="background:#000;color:white;padding:20px;font-family:sans-serif;">
  <h2>Check-in do Motorista</h2>
  <form method="POST">
    <label>Placa do Cavalo:</label><br>
    <input type="text" name="placa_cavalo" required><br>
    <label>Placa da Carreta:</label><br>
    <input type="text" name="placa_carreta" required><br>
    <label>Status:</label><br>
    <select name="status" required>
      <option value="Na garagem">Na garagem</option>
      <option value="No posto">No posto</option>
      <option value="Viajando">Viajando</option>
    </select><br>
    <label>Localização:</label><br>
    <input type="text" name="localizacao" required><br>
    <label>Destino:</label><br>
    <input type="text" name="destino" required><br>
    <label>Latitude:</label><br>
    <input type="text" name="latitude" required><br>
    <label>Longitude:</label><br>
    <input type="text" name="longitude" required><br><br>
    <button type="submit">Enviar Check-in</button>
  </form>
  <br>
  <a href="../index.php" style="color:#1db954;text-decoration:none;">← Voltar</a>
</body>
</html>
