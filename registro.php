<?php
$tipo = $_GET['tipo'] ?? 'admin';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Criar Conta - <?= ucfirst($tipo) ?></title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #fff;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
      width: 300px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 6px;
    }

    button {
      background-color: #00c853;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    button:hover {
      background-color: #00b34a;
    }

    a {
      color: #00c0ff;
      text-decoration: none;
      display: block;
      margin-top: 15px;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Criar Conta - <?= ucfirst($tipo) ?></h2>
    <form method="POST" action="salvar_usuario.php">
      <input type="hidden" name="tipo" value="<?= $tipo ?>">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Criar Conta</button>
    </form>
    <a href="login.php?tipo=<?= $tipo ?>">Já tem uma conta? Faça login</a>
    <a href="index.php">← Voltar para o início</a>
  </div>
</body>
</html>
