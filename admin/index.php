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

    .mapa {
      width: 100%;
      height: 300px;
      margin-top: 10px;
      border-radius: 10px;
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
  </style>
</head>
<body>
  <div class="painel-container">
    <h2 style="text-align:center;">Painel do Administrador</h2>

    <?php while($linha = $resultado->fetch_assoc()): ?>
      <div class="card-caminhao">
        <h3>🚛 <?php echo $linha['placa_cavalo']; ?> | Carreta: <?php echo $linha['placa_carreta']; ?></h3>
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
    async function buscarDestino(endereco) {
      const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(endereco)}`;
      const resposta = await fetch(url, {
        headers: { "User-Agent": "rastreamento-app" }
      });
      const dados = await resposta.json();
      if (dados.length > 0) {
        return [parseFloat(dados[0].lat), parseFloat(dados[0].lon)];
      }
      return null;
    }

    async function initMap(id, origemLat, origemLng, destinoTexto) {
      const mapa = L.map(`mapa_${id}`).setView([origemLat, origemLng], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(mapa);

      const origem = L.marker([origemLat, origemLng]).addTo(mapa)
        .bindPopup("Local atual").openPopup();

      const destinoCoords = await buscarDestino(destinoTexto);
      if (destinoCoords) {
        const destino = L.marker(destinoCoords, { icon: L.icon({
          iconUrl: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
          iconSize: [25, 25],
          iconAnchor: [12, 24],
          popupAnchor: [0, -20]
        })}).addTo(mapa)
          .bindPopup("Destino");

        const linha = L.polyline([ [origemLat, origemLng], destinoCoords ], {
          color: "orange",
          weight: 3,
          dashArray: '5, 10'
        }).addTo(mapa);

        mapa.fitBounds(linha.getBounds(), { padding: [30, 30] });
      }
    }

    <?php
    $resultado->data_seek(0);
    while ($linha = $resultado->fetch_assoc()):
      $id = $linha['id'];
      $lat = $linha['latitude'];
      $lng = $linha['longitude'];
      $destino = addslashes($linha['destino']);
    ?>
    initMap(<?php echo $id; ?>, <?php echo $lat; ?>, <?php echo $lng; ?>, "<?php echo $destino; ?>");
    <?php endwhile; ?>
  </script>
</body>
</html>
