<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Check-in do Motorista</title>
  <link rel="stylesheet" href="../style.css" />
  <style>
    .autocomplete-sugestoes {
      border: 1px solid #ccc;
      background-color: white;
      position: absolute;
      z-index: 9999;
      width: 100%;
      max-height: 200px;
      overflow-y: auto;
    }

    .autocomplete-sugestoes div {
      padding: 10px;
      cursor: pointer;
      border-bottom: 1px solid #eee;
    }

    .autocomplete-sugestoes div:hover {
      background-color: #f0f0f0;
    }
  </style>
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

      <label>Localização (cidade atual):</label>
      <input type="text" name="localizacao" required />

      <label>Destino (com sugestões):</label>
      <input type="text" name="destino" id="destino" autocomplete="off" required />
      <div id="sugestoes" class="autocomplete-sugestoes"></div>

      <button type="submit">Enviar Check-in</button>
    </form>
    <a class="voltar" href="../index.php">← Voltar</a>
  </div>

  <script>
    const destinoInput = document.getElementById('destino');
    const sugestoesBox = document.getElementById('sugestoes');

    destinoInput.addEventListener('input', async () => {
      const valor = destinoInput.value.trim();
      sugestoesBox.innerHTML = '';
      if (valor.length < 3) return;

      const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(valor)}&addressdetails=1&limit=5`;

      const resposta = await fetch(url, {
        headers: { "User-Agent": "rastreamento-app" }
      });
      const dados = await resposta.json();

      dados.forEach(item => {
        const div = document.createElement('div');
        div.textContent = item.display_name;
        div.onclick = () => {
          destinoInput.value = item.display_name;
          sugestoesBox.innerHTML = '';
        };
        sugestoesBox.appendChild(div);
      });
    });

    document.addEventListener('click', function (e) {
      if (!sugestoesBox.contains(e.target) && e.target !== destinoInput) {
        sugestoesBox.innerHTML = '';
      }
    });
  </script>
</body>
</html>
