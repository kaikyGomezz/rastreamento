<?php
$tipo = $_GET['tipo'] ?? 'admin';
$titulo = $tipo === 'motorista' ? 'Criar Conta - Motorista' : 'Criar Conta - Admin';
$acao = 'salvar_registro.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?= $titulo ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-box">
    <h2><?= $titulo ?></h2>
    <form action="<?= $acao ?>" method="POST">
      <input type="hidden" name="tipo" value="<?= $tipo ?>">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Criar Conta</button>
    </form>
    <p>
      Já tem uma conta? <a href="login.php?tipo=<?= $tipo ?>">Faça login</a><br>
      <a href="index.php">&larr; Voltar para o início</a>
    </p>
  </div>
</body>
</html>
