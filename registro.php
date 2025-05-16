<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Criar Conta</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Criar Conta</h2>
    <form action="conexao.php" method="POST">
      <input type="hidden" name="acao" value="registrar">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <select name="tipo" required>
        <option value="">Selecione o tipo</option>
        <option value="admin">Administrador</option>
        <option value="motorista">Motorista</option>
      </select>
      <button type="submit">Registrar</button>
    </form>
    <a href="index.php">← Voltar para o início</a>
  </div>
</body>
</html>
