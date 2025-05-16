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
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .caminhao {
      background-color: #111;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.6);
    }

    .map {
      width: 100%;
      height: 300px;
      margin-top: 15px;
      border-radius: 8px;
    }

    .botao-voltar {
      background-color: #444;
      color: white;
      padding: 8px 16px;
      text-decoration: none;
      border-radius: 6px;
      margin-bottom: 20px;
      display: inline-block;
    }

    button {
      background-color: transparent;
      border: none;
      cursor: pointer;
      font-size: 18px;
      margin-right: 8px;
      color: white;
    }

    button:hover {
      color: #ccc;
    }
  </style>
</head>
<body>

<a href="../index.php" class="botao-voltar">← Voltar</a>
<h1>Painel do Administrador</h1>

<?php while($row = $result->fetch_assoc()): ?>
  <div class="caminhao">
    <strong><?= htmlspecialchars($row['placa_cavalo']) ?> | <?= htmlspecialchars($row['placa_carreta']) ?></strong>
    <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
    <p><strong>Localização:</strong> <?= htmlspecialchars($row['localizacao']) ?></p>
    <p><strong>Destino:</strong> <?= htmlspecialchars($row['destino']) ?></p>
    <p><strong>Atualizado em:</strong> <?= htmlspecialchars($row['atualizado_em']) ?></p>

    <div id="map<?= $row['id'] ?>" class="map"></div>

    <form method="get" action="editar.php" style="display:inline;">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <button type="submit" title="Editar">✏️</button>
    </form>

    <form method="post" action="excluir.php" style="display:inline;">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" title="Excluir">🗑️</button>
    </form>
  </div>

  <script>
    var map = L.map('map<?= $row['id'] ?>').setView([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).addTo(map).bindPopup('Localização atual');
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
