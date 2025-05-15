
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Check-in do Motorista</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <header><h1>Check-in de Localização</h1></header>
  <main class="container">
    <form action="salvar_checkin.php" method="POST" class="caminhao-card" onsubmit="setLocation(event)">
      <label>Placa do Cavalo:</label>
      <input type="text" name="placa_cavalo" required>
      <label>Placa da Carreta:</label>
      <input type="text" name="placa_carreta" required>
      <label>Status:</label>
      <select name="status">
        <option value="Viajando">Viajando</option>
        <option value="Na Garagem">Na Garagem</option>
      </select>
      <label>Destino:</label>
      <input type="text" name="destino" required>
      <input type="hidden" name="latitude" id="lat">
      <input type="hidden" name="longitude" id="lon">
      <button class="btn-voltar" type="submit">Enviar Check-in</button>
    </form>
    <p id="status" style="text-align:center;margin-top:10px;"></p>
    <a class="btn-voltar" href="../index.php">Voltar</a>
  </main>
  <footer><p>Motorista © 2025</p></footer>
  <script>
    function setLocation(event) {
      event.preventDefault();
      const status = document.getElementById('status');
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(pos => {
          document.getElementById('lat').value = pos.coords.latitude;
          document.getElementById('lon').value = pos.coords.longitude;
          event.target.submit();
        }, err => {
          status.innerText = "Erro ao obter localização.";
        });
      } else {
        status.innerText = "Geolocalização não suportada.";
      }
    }
  </script>
</body>
</html>
