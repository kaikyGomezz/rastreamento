<?php
$tipo = $_GET['tipo'] ?? 'admin';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <link rel="stylesheet" href="style.css"> <!-- Certifique-se que style.css está na raiz -->
</head>
<body>
  <div class="form-container">
    <h1>Cadastro - <?= ucfirst($tipo) ?></h1>
    <form method="post" action="salvar_usuario.php">
      <input type="hidden" name="tipo" value="<?= $tipo ?>">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php?tipo=<?= $tipo ?>">← Já tem conta? Entrar</a>
    <br>
    <a href="index.php">← Voltar para o início</a>
  </div>
</body>
</html>
