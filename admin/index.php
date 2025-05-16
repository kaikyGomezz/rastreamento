<?php
include("../conexao.php");
$resultado = $conn->query("SELECT * FROM caminhoes ORDER BY atualizado_em DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    .painel-container {
      max-width: 1200px;
      margin: 50px auto;
      padding: 20px;
    }

    .card-caminhao {
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 0 8px rgba(0,0,0,0.3);
    }

    .card-caminhao h3 {
      margin-top: 0;
    }

    .mapa {
      width: 100%;
      height: 300px;
      border-radius: 10px;
      margin-top: 10px;
      border: 2px solid #00cec9;
    }

    .botao-voltar {
      display: block;
      text-align: center;
      margin-top: 40px;
      font-size: 15px;
      color: #ccc;
      text-decoration: none;
    }

    .botao-voltar:hover {
      color: white;
    }

    @media screen and (max-width: 768px) {
      .mapa {
        height: 250px;
      }
    }
  </style>
</head>
<body>
  <div class="painel-container">
    <h2 style="text-align:center;">Painel do Administrador</h2>

    <?php while($linha = $resultado->fetch_assoc()): ?>
      <div class="card-caminhao">
        <h3>🚛 <?php echo $linha['placa_cavalo'] . " | Carreta: " . $linha['placa_carreta']; ?></h3>
        <p><strong>Status:</strong> <?php echo $linha['status']; ?></p>
        <p><strong>Localização:</strong> <?php echo $linha['localizacao']; ?></p>
        <p><strong>Destino:</strong> <?php echo $linha['destino']; ?></p>
        <p><strong>Atualizado em:</strong> <?php echo date("d/m/Y H:i", strtotime($linha['atualizado_em'])); ?></p>
        <div class="mapa" id="mapa_<?php echo $linha['id']; ?>"></div>
      </div>
    <?php endwhile; ?>

    <a class="botao-voltar" href="../index.php">← Voltar</a>
  </div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    <?php
    $resultado->data_seek(0);
    while ($linha = $resultado->fetch_assoc()):
      $lat = $linha['latitude'];
      $lng = $linha['longitude'];
      $id = $linha['id'];
    ?>
      var mapa_<?php echo $id; ?> = L.map('mapa_<?php echo $id; ?>').setView([<?php echo $lat; ?>, <?php echo $lng; ?>], 14);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(mapa_<?php echo $id; ?>);
      L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>]).addTo(mapa_<?php echo $id; ?>)
        .bindPopup("<?php echo $linha['placa_cavalo']; ?>")
        .openPopup();
    <?php endwhile; ?>
  </script>
</body>
</html>
