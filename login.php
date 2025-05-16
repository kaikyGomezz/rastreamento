<?php
session_start();
include('conexao.php');

$tipo = $_GET['tipo'] ?? 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ? AND tipo = ?");
  $stmt->bind_param("ss", $email, $tipo);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($senha, $usuario['senha'])) {
      $_SESSION['usuario'] = $usuario;
      if ($usuario['tipo'] === 'admin') {
        header('Location: admin/index.php');
      } else {
        header('Location: motorista/checkin.php');
      }
      exit();
    }
  }

  echo "<script>alert('Usuário ou senha incorretos!'); window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h2>Login - <?= ucfirst($tipo) ?></h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <button type="submit">Entrar</button>
  </form>
</body>
</html>
