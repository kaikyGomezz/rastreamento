
<?php
include '../conexao.php';
$sql = "SELECT * FROM caminhoes ORDER BY atualizado_em DESC";
$resultado = $conn->query($sql);
$caminhoes = [];

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $caminhoes[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body>
  <header>
    <h1>Painel do Administrador</h1>
    <p>Visualização em tempo real dos caminhões</p>
  </header>
  <main class="container">
    <?php foreach ($caminhoes as $index => $c): ?>
      <div class="caminhao-card">
        <h2><?= $c['placa_cavalo'] ?> / <?= $c['placa_carreta'] ?></h2>
        <p>Status: <?= $c['status'] ?></p>
        <p>Destino: <?= $c['destino'] ?></p>
        <p>Atualizado em: <?= $c['atualizado_em'] ?></p>
        <div id="map<?= $index ?>" class="mapa"></div>
        <script>
          const map<?= $index ?> = L.map('map<?= $index ?>').setView([<?= $c['latitude'] ?>, <?= $c['longitude'] ?>], 12);
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © OpenStreetMap contributors'
          }).addTo(map<?= $index ?>);
          L.marker([<?= $c['latitude'] ?>, <?= $c['longitude'] ?>]).addTo(map<?= $index ?>)
            .bindPopup('<?= $c['placa_cavalo'] ?> - <?= $c['status'] ?>').openPopup();
        </script>
      </div>
    <?php endforeach; ?>

    <a class="btn-voltar" href="../index.php">Voltar</a>
  </main>
  <footer>
    <p>Administrador © 2025</p>
  </footer>
</body>
</html>
