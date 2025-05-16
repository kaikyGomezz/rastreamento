<?php
include('../conexao.php');
$result = $mysqli->query("SELECT * FROM caminhoes");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    body {
      background-color: #000;
      color: white;
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .caminhao {
      margin-bottom: 30px;
      background-color: #111;
      padding: 20px;
      border-radius: 10px;
    }
    .map {
      height: 250px;
      margin-top: 10px;
      border-radius: 10px;
    }
    .voltar {
      display: inline-block;
      margin-bottom: 20px;
      padding: 8px 16px;
      background-color: #444;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    button {
      background: #444;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      margin-right: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<a href="../index.php" class="voltar">← Voltar</a>
<h1>Painel do Administrador</h1>

<?php while ($row = $result->fetch_assoc()): ?>
  <div class="caminhao">
    <strong><?= htmlspecialchars($row['placa_cavalo']) ?> | <?= htmlspecialchars($row['placa_carreta']) ?></strong>
    <p>Status: <?= htmlspecialchars($row['status']) ?></p>
    <p>Localização: <?= htmlspecialchars($row['localizacao']) ?></p>
    <p>Destino: <?= htmlspecialchars($row['destino']) ?></p>
    <p>Atualizado em: <?= htmlspecialchars($row['atualizado_em']) ?></p>
    <div id="map<?= $row['id'] ?>" class="map"></div>

    <form method="get" action="editar.php" style="display:inline;">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <button title="Editar">✏️</button>
    </form>

    <form method="post" action="excluir.php" style="display:inline;">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <button onclick="return confirm('Tem certeza que deseja excluir?')" title="Excluir">🗑️</button>
    </form>

    <script>
      var map = L.map('map<?= $row['id'] ?>').setView([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>], 6);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).addTo(map).bindPopup('Localização atual');
    </script>
  </div>
<?php endwhile; ?>

</body>
</html>
