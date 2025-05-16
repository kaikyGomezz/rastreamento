<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Check-in do Motorista</title>
  <link rel="stylesheet" href="../style.css">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }

    form {
      background-color: #1a1a1a;
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0,0,0,0.7);
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: none;
      border-radius: 5px;
      background-color: #fff;
      color: #000;
    }

    button {
      margin-top: 20px;
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #00cc66;
      color: white;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #00b359;
    }

    .botao-voltar {
      background-color: #444;
      color: white;
      padding: 8px 16px;
      text-decoration: none;
      border-radius: 6px;
      margin-top: 20px;
      display: inline-block;
    }
  </style>
</head>
<body>

<form action="salvar_checkin.php" method="POST">
  <h2>Check-in do Motorista</h2>

  <label>Placa do Cavalo:</label>
  <input type="text" name="placa_cavalo" required>

  <label>Placa da Carreta:</label>
  <input type="text" name="placa_carreta" required>

  <label>Status:</label>
  <select name="status" required>
    <option value="Na garagem">Na garagem</option>
    <option value="No posto">No posto</option>
    <option value="Viajando">Viajando</option>
  </select>

  <label>Localização (cidade atual):</label>
  <input type="text" name="localizacao" required>

  <label>Destino:</label>
  <input type="text" name="destino" required>

  <button type="submit">Enviar Check-in</button>
</form>

<a href="../index.php" class="botao-voltar">← Voltar</a>

</body>
</html>
