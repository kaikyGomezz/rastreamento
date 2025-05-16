<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Check-in do Motorista</title>
  <style>
    body {
      background-color: #0f0f0f;
      color: white;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .container {
      max-width: 500px;
      margin: auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      margin-top: 12px;
      display: block;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: none;
      border-radius: 6px;
      font-size: 15px;
    }

    button {
      width: 100%;
      margin-top: 20px;
      padding: 12px;
      font-size: 16px;
      background-color: #00cec9;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
    }

    .voltar {
      display: block;
      margin-top: 20px;
      text-align: center;
      color: #aaa;
    }

    .autocomplete-suggestions {
      background: white;
      color: black;
      border-radius: 4px;
      padding: 6px;
      position: absolute;
      width: 100%;
      z-index: 10;
    }

    .autocomplete-suggestion {
      padding: 5px;
      cursor: pointer;
    }

    .autocomplete-suggestion:hover {
      background: #eee;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Check-in do Motorista</h2>
    <form action="salvar_checkin.php" method="post" onsubmit="return preencherCoord()">
      <label>Placa do Cavalo:</label>
      <input type="text" name="placa_cavalo" required />

      <label>Placa da Carreta:</label>
      <input type="text" name="placa_carreta" required />

      <label>Status:</label>
      <select name="status" required>
        <option value="Na garagem">Na garagem</option>
        <option value="Parado">Parado</option>
        <option value="Viajando">Viajando</option>
      </select>

      <label>Localização (cidade atual):</label>
      <input type="text" name="localizacao" required />

      <label>Destino:</label>
      <input type="text" name="destino" id="destino" required />
      <div id="sugestoes" class="autocomplete-suggestions"></div>

      <input type="hidden" name="latitude" id="latitude" />
      <input type="hidden" name="longitude" id="longitude" />

      <button type="submit">Enviar Check-in</button>
    </form>
    <a class="voltar" href="../index.php">← Voltar</a>
  </div>

  <script>
    const destinoInput = document.getElementById("destino");
    const sugestoes = document.getElementById("sugestoes");

    destinoInput.addEventListener("input", function () {
      const valor = this.value;
      if (valor.length < 3) {
        sugestoes.innerHTML = "";
        return;
      }

      fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(valor)}`)
        .then((res) => res.json())
        .then((data) => {
          sugestoes.innerHTML = "";
          data.slice(0, 5).forEach((item) => {
            const div = document.createElement("div");
            div.className = "autocomplete-suggestion";
            div.textContent = item.display_name;
            div.onclick = () => {
              destinoInput.value = item.display_name;
              document.getElementById("latitude").value = item.lat;
              document.getElementById("longitude").value = item.lon;
              sugestoes.innerHTML = "";
            };
            sugestoes.appendChild(div);
          });
        });
    });

    function preencherCoord() {
      if (!document.getElementById("latitude").value) {
        alert("Selecione um destino válido da lista.");
        return false;
      }
      return true;
    }

    document.addEventListener("click", (e) => {
      if (!sugestoes.contains(e.target) && e.target !== destinoInput) {
        sugestoes.innerHTML = "";
      }
    });
  </script>
</body>
</html>
