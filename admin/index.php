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
      margin: 40px auto;
      padding: 20px;
    }

    .card-caminhao {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 0 8px rgba(0,0,0,0.3);
    }

    .info-caminhao {
      flex: 1 1 300px;
    }

    .foto-caminhao {
      flex: 1 1 250px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .foto-caminhao img {
      max-width: 100%;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.4);
    }

    .mapa {
      width: 100%;
      height: 250px;
      border-radius: 10px;
      margin-top: 10px;
      border: 2px solid #00cec9;
    }

    .botoes-acoes {
      margin-top: 15px;
      display: flex;
      gap: 10px;
    }

    .botoes-acoes a {
      padding: 8px 14px;
      text-decoration: none;
      background-color: #00cec9;
      color: white;
      border-radius: 6px;
      font-size: 14px;
    }

    .botoes-acoes a.excluir {
      background-color: #d63031;
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
      .card-caminhao {
        flex-direction: column;
      }

      .foto-caminhao {
        justify-content: flex-start;
      }
    }
  </style>
</head>
<body>
  <div class="painel-container">
    <h2 style="text-align:center;">Painel do Administrador</h2>

    <?php while($linha = $resultado->fetch_assoc()): ?>
      <div class="card-caminhao">
        <div class="info-caminhao">
          <h3>🚛 <?php echo $linha['placa_cavalo'] . " | Carreta: " . $linha['placa_carreta']; ?></h3>
          <p><strong>Status:</strong> <?php echo $linha['status']; ?></p>
          <p><strong>Localização:</strong> <?php echo $linha['localizacao']; ?></p>
          <p><strong>Destino:</strong> <?php echo $linha['destino']; ?></p>
          <p><strong>Atualizado em:</strong> <?php echo date("d/m/Y H:i", strtotime($linha['atualizado_em'])); ?></p>
          <div class="mapa" id="mapa_<?php echo $linha['id']; ?>"></div>

          <div class="botoes-acoes">
            <a href="editar.php?id=<?php echo $linha['id']; ?>">Editar</a>
            <a class="excluir" href="excluir.php?id=<?php echo $linha['id']; ?>" onclick="return confirm('Deseja realmente excluir este caminhão?');">Excluir</a>
          </div>
        </div>
        <div class="foto-caminhao">
          <img src="https://cdn.pixabay.com/photo/2016/06/15/15/58/truck-1453932_1280.png" alt="Caminhão">
        </div>
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
        .bindPopup("<?php echo $linha['placa_cavalo']; ?>");
    <?php endwhile; ?>
  </script>
</body>
</html>
