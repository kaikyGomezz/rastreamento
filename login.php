<?php
$tipo = $_GET['tipo'] ?? 'admin';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css"> <!-- Certifique-se que style.css está na raiz -->
</head>
<body>
  <div class="form-container">
    <h1>Login - <?= ucfirst($tipo) ?></h1>
    <form method="post" action="autenticar.php">
      <input type="hidden" name="tipo" value="<?= $tipo ?>">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <p>Não tem conta? <a href="registro.php?tipo=<?= $tipo ?>">Criar agora</a></p>
    <a href="index.php">← Voltar para o início</a>
  </div>
</body>
</html>
