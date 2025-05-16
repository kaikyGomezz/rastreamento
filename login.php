<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <form action="conexao.php" method="POST">
      <input type="hidden" name="acao" value="login">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <select name="tipo" required>
        <option value="">Selecione o tipo</option>
        <option value="admin">Administrador</option>
        <option value="motorista">Motorista</option>
      </select>
      <button type="submit">Entrar</button>
    </form>
    <a href="registro.php">Não tem conta? Criar agora</a>
    <br>
    <a href="index.php">← Voltar para o início</a>
  </div>
</body>
</html>
