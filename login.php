<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
  $stmt->bind_param("s", $email);
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
