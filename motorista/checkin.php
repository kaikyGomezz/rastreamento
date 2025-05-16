<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Check-in do Motorista</title>
  <link rel="stylesheet" href="../style.css" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom right, #0f2027, #203a43, #2c5364);
      color: #fff;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 60px auto;
      background-color: rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
      font-size: 14px;
    }

    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: none;
      margin-top: 5px;
      font-size: 15px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #00b894;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
    }

    button:hover {
      background-color: #019270;
    }

    .voltar {
      display: block;
      margin-top: 25px;
      text-align: center;
      color: #ccc;
      font-size: 14px;
      text-decoration: none;
    }

    .voltar:hover {
      color: #fff;
    }
  </style>
  <script>
    function preencherLocalizacao() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function (pos) {
            document.getElementById('latitude').value = pos.coords.latitude;
            document.getElementById('longitude').value = pos.coords.longitude;
          },
          function (erro) {
            alert("Erro ao obter localização: " + erro.message);
          }
        );
      } else {
        alert("Geolocalização não suportada no seu navegador.");
      }
    }

    window.onload = preencherLocalizacao;
  </script>
</head>
<body>
  <div class="container">
    <h2>Check-in do Motorista</h2>
    <form action="salvar_checkin.php" method="post">
      <label>Placa do Cavalo:</label>
      <input type="text" name="placa_cavalo" required />

      <label>Placa da Carreta:</label>
      <input type="text" name="placa_carreta" required />

      <label>Status:</label>
      <input type="text" name="status" placeholder="Ex: Viajando, Na garagem..." required />

      <label>Localização (nome da cidade):</label>
      <input type="text" name="localizacao" required />

      <label>Destino:</label>
      <input type="text" name="destino" required />

      <input type="hidden" name="latitude" id="latitude" required />
      <input type="hidden" name="longitude" id="longitude" required />

      <button type="submit">Enviar Check-in</button>
    </form>

    <a class="voltar" href="../index.php">← Voltar</a>
  </div>
</body>
</html>
