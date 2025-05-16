<?php
$host = "seu_host_aqui";
$user = "seu_usuario";
$password = "sua_senha";
$database = "seu_banco";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM caminhoes ORDER BY atualizado_em DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    body {
      background: #121212;
      color: white;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .caminhao {
      background: #1e1e1e;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 25px;
      box-shadow: 0 0 8px rgba(0,0,0,0.4);
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .info {
      flex: 1;
      min-width: 250px;
    }

    .mapa {
      width: 300px;
      height: 200px;
      flex-shrink: 0;
    }

    .foto-caminhao img {
      width: 150px;
      border-radius: 8px;
      object-fit: cover;
    }

    button {
      margin-top: 10px;
      padding: 8px 16px;
      background: #0a84ff;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
    }

    button.excluir {
      background: #ff3b30;
      margin-left: 10px;
    }

    @media (max-width: 768px) {
      .mapa, .foto-caminhao img {
        width: 100%;
      }
      .caminhao {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <h1>Painel do Administrador</h1>

  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="caminhao">
      <div class="info">
        <strong>🚚 <?= htmlspecialchars($row['placa_cavalo']) ?> | Carreta: <?= htmlspecialchars($row['placa_carreta']) ?></strong><br>
        <strong>Status:</strong> <?= htmlspecialchars($row['status']) ?><br>
        <strong>Localização:</strong> <?= htmlspecialchars($row['localizacao']) ?><br>
        <strong>Destino:</strong> <?= htmlspecialchars($row['destino']) ?><br>
        <strong>Atualizado em:</strong> <?= date("d/m/Y H:i", strtotime($row['atualizado_em'])) ?><br>

        <form action="editar.php" method="get" style="display:inline;">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <button type="submit">Editar</button>
        </form>

        <form action="excluir.php" method="post" style="display:inline;">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <button type="submit" class="excluir">Excluir</button>
        </form>
      </div>

      <div id="mapa<?= $row['id'] ?>" class="mapa"></div>

      <div class="foto-caminhao">
        <img src="https://raw.githubusercontent.com/kaiquebroz/truck-images/main/truck1.jpg" alt="Carreta ilustrativa">
      </div>
    </div>
  <?php endwhile; ?>

  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    <?php
    $result->data_seek(0); // volta ao início do resultado
    while ($row = $result->fetch_assoc()):
      if ($row['latitude'] && $row['longitude']):
    ?>
      const map<?= $row['id'] ?> = L.map('mapa<?= $row['id'] ?>').setView([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>], 12);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
      }).addTo(map<?= $row['id'] ?>);
      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).addTo(map<?= $row['id'] ?>);
    <?php endif; endwhile; ?>
  </script>
</body>
</html>
