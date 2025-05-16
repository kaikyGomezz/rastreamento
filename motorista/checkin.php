<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Check-in do Motorista</title>
  <link rel="stylesheet" href="../style.css" />
  <style>
    .autocomplete-suggestions {
      background: white;
      color: black;
      border: 1px solid #ccc;
      max-height: 150px;
      overflow-y: auto;
      position: absolute;
      width: 100%;
      z-index: 9999;
    }

    .autocomplete-suggestion {
      padding: 8px 10px;
      cursor: pointer;
    }

    .autocomplete-suggestion:hover {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Check-in do Motorista</h2>
    <form action="salvar_checkin.php" method="post" autocomplete="off">
      <label>Placa do Cavalo:</label>
      <input type="text" name="placa_cavalo" required />

      <label>Placa da Carreta:</label>
      <input type="text" name="placa_carreta" required />

      <label>Status:</label>
      <input type="text" name="status" required />

      <label>Localização atual (nome da cidade):</label>
      <input type="text" name="localizacao" required />

      <label>Destino:</label>
      <input type="text" name="destino" id="destino" required />
      <div id="sugestoes" class="autocomplete-suggestions"></div>

      <button type="submit">Enviar Check-in</button>
    </form>
    <a class="voltar" href="../index.php">← Voltar</a>
  </div>

  <script>
    const destinoInput = document.getElementById('destino');
    const sugestoes = document.getElementById('sugestoes');

    destinoInput.addEventListener('input', function () {
      const valor = this.value;
      if (valor.length < 3) {
        sugestoes.innerHTML = '';
        return;
      }

      fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(valor)}`)
        .then(response => response.json())
        .then(data => {
          sugestoes.innerHTML = '';
          data.slice(0, 5).forEach(item => {
            const div = document.createElement('div');
            div.className = 'autocomplete-suggestion';
            div.textContent = item.display_name;
            div.onclick = () => {
              destinoInput.value = item.display_name;
              sugestoes.innerHTML = '';
            };
            sugestoes.appendChild(div);
          });
        });
    });

    document.addEventListener('click', (e) => {
      if (!sugestoes.contains(e.target) && e.target !== destinoInput) {
        sugestoes.innerHTML = '';
      }
    });
  </script>
</body>
</html>
