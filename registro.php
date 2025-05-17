<?php
$tipo = $_GET['tipo'] ?? 'admin';
$titulo = $tipo === 'motorista' ? 'Criar Conta - Motorista' : 'Criar Conta - Admin';
$login_link = "login.php?tipo=$tipo";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?= $titulo ?></title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #121212;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: rgba(0, 0, 0, 0.7);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
      width: 300px;
      text-align: center;
    }
    input[type="email"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
    }
    button {
      background-color: #00cc66;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    a {
      color: #00cc66;
      display: block;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2><?= $titulo ?></h2>
    <form action="registro_submit.php" method="post">
      <input type="hidden" name="tipo" value="<?= $tipo ?>">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Criar Conta</button>
    </form>
    <a href="<?= $login_link ?>">Já tem uma conta? Faça login</a>
    <a href="index.php">&larr; Voltar para o início</a>
  </div>
</body>
</html>
