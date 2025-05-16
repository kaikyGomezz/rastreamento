<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
  $tipo = $_POST['tipo'];

  $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nome, $email, $senha, $tipo);

  if ($stmt->execute()) {
    echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Erro ao cadastrar: {$stmt->error}'); window.location.href='registro.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
</head>
<body style="background:#000;color:white;padding:20px;font-family:sans-serif;">
  <h2>Criar Conta</h2>
  <form method="POST" action="registro.php">
    <input type="text" name="nome" placeholder="Nome completo" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <select name="tipo" required>
      <option value="admin">Administrador</option>
      <option value="motorista">Motorista</option>
    </select><br>
    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>
