<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Check-in do Motorista</title>
  <link rel="stylesheet" href="../style.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #0f0f0f, #1c1c1c);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #111;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,255,0,0.3);
      width: 90%;
      max-width: 500px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #00ff99;
    }

    label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      color: #ccc;
    }

    input, select {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      outline: none;
      font-size: 16px;
      margin-bottom: 10px;
    }

    button {
      background-color: #00ff88;
      border: none;
      color: black;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #00cc66;
    }

    .voltar {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #00ff88;
      text-decoration: none;
    }

    .voltar:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Check-in do Motorista</h1>
    <form action="salvar_checkin.php" method="POST">
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

    <a href="../index.php" class="voltar">← Voltar</a>
  </div>

</body>
</html>
