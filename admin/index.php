<?php
$host = "switchyard.proxy.rlwy.net";
$port = 40399;
$user = "root";
$pass = "UqRvkxHRiwvqDDoAEADLNXdmskmVaiES";
$db = "railway";

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM caminhoes ORDER BY atualizado_em DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    body {
      background: #101010;
      color: #fff;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .container {
      max-height: 90vh;
      overflow-y: auto;
      padding-right: 10px;
    }

    .card {
      background: #1f1f1f;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .info {
      flex: 1 1 300px;
    }

    .mapa {
      width: 100%;
      height: 250px;
      margin-top: 10px;
      border-radius: 8px;
      border: 2px solid #00cec9;
    }

    .imagem {
      flex: 1 1 200px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .imagem img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    a.voltar {
      display: block;
      text-align: center;
      margin-top: 40px;
      color: #ccc;
      text-decoration: none;
    }

    a.voltar:hover {
      color: white;
    }

    @media (max-width: 768px) {
      .card {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <h1>Painel do Administrador</h1>

  <div class="container">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card">
        <div class="info">
          <strong>Placa Cavalo:</strong> <?= htmlspecialchars($row["placa_cavalo"]) ?><br>
          <strong>Carreta:</strong> <?= htmlspecialchars($row["placa_carreta"]) ?><br>
          <strong>Status:</strong> <?= htmlspecialchars($row["status"]) ?><br>
          <strong>Localização:</strong> <?= htmlspecialchars($row["localizacao"]) ?><br>
          <strong>Destino:</strong> <?= htmlspecialchars($row["destino"]) ?><br>
          <strong>Atualizado em:</strong> <?= date("d/m/Y H:i", strtotime($row["atualizado_em"])) ?><br>

          <div id="map<?= $row["id"] ?>" class="mapa"></div>
        </div>

        <div class="imagem">
          <img src="https://raw.githubusercontent.com/kaiquebroz/truck-images/main/truck1.jpg" alt="Caminhão">
        </div>
      </div>

      <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
      <script>
        const map<?= $row["id"] ?> = L.map('map<?= $row["id"] ?>').setView([<?= $row["latitude"] ?>, <?= $row["longitude"] ?>], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap'
        }).addTo(map<?= $row["id"] ?>);
        L.marker([<?= $row["latitude"] ?>, <?= $row["longitude"] ?>]).addTo(map<?= $row["id"] ?>)
          .bindPopup("<?= $row["placa_cavalo"] ?>").openPopup();
      </script>
    <?php endwhile; ?>
  </div>

  <a href="../index.php" class="voltar">← Voltar</a>
</body>
</html>
