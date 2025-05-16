<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Check-in do Motorista</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>Check-in do Motorista</h1>

<form action="salvar_checkin.php" method="POST">
  <label>Placa do Cavalo:</label>
  <input type="text" name="placa_cavalo" required>

  <label>Placa da Carreta:</label>
  <input type="text" name="placa_carreta" required>

  <label>Status:</label>
  <select name="status" required>
    <option>Na garagem</option>
    <option>No posto</option>
    <option>Viajando</option>
  </select>

  <label>Localização (cidade atual):</label>
  <input type="text" id="localizacao" name="localizacao" required>

  <label>Destino:</label>
  <input type="text" id="destino" name="destino" required>

  <button type="submit">Enviar Check-in</button>
</form>

<a href="../index.php">← Voltar</a>

<script>
  document.getElementById('destino').addEventListener('input', function() {
    fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + this.value)
      .then(res => res.json())
      .then(data => {
        if(data.length > 0){
          this.value = data[0].display_name;
        }
      });
  });
</script>

</body>
</html>
