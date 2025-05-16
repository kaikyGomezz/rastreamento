<?php
$mysqli = new mysqli('switchyard.proxy.rlwy.net', 'root', 'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES', 'railway', 40399);
$result = $mysqli->query("SELECT * FROM caminhoes");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
  <h1>Painel do Administrador</h1>

  <?php while($row = $result->fetch_assoc()): ?>
    <div class="caminhao">
      <strong><?= htmlspecialchars($row['placa_cavalo']) ?> | Carreta: <?= htmlspecialchars($row['placa_carreta']) ?></strong>
      <p>Status: <?= htmlspecialchars($row['status']) ?></p>
      <p>Localização: <?= htmlspecialchars($row['localizacao']) ?></p>
      <p>Destino: <?= htmlspecialchars($row['destino']) ?></p>
      <p>Atualizado em: <?= htmlspecialchars($row['atualizado_em']) ?></p>
      
      <div id="map<?= $row['id'] ?>" class="map"></div>
    </div>

    <script>
      var map = L.map('map<?= $row['id'] ?>').setView([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>], 6);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).addTo(map).bindPopup('Localização atual').openPopup();
      L.marker([<?= $row['destino_lat'] ?>, <?= $row['destino_lon'] ?>]).addTo(map).bindPopup('Destino');
      var latlngs = [
        [<?= $row['latitude'] ?>, <?= $row['longitude'] ?>],
        [<?= $row['destino_lat'] ?>, <?= $row['destino_lon'] ?>]
      ];
      L.polyline(latlngs, {color: 'blue'}).addTo(map);
    </script>
  <?php endwhile; ?>
</body>
</html>
