<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* CSS direto no arquivo para garantir que funcione */
    body {
      background: #111;
      color: white;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: rgba(255, 255, 255, 0.05);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
      width: 300px;
      text-align: center;
    }
    .form-container h1 {
      margin-bottom: 20px;
      font-size: 24px;
    }
    .form-container input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 5px;
      background: #222;
      color: white;
    }
    .form-container button {
      width: 100%;
      padding: 10px;
      background-color: #00c853;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
    .form-container a {
      color: #00c853;
      text-decoration: none;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h1>Login - Admin</h1>
    <form method="post" action="autenticar.php">
      <input type="hidden" name="tipo" value="admin">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <p>Não tem conta? <a href="registro.php?tipo=admin">Criar agora</a></p>
    <a href="index.php">← Voltar para o início</a>
  </div>
</body>
</html>
