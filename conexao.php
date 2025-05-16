<?php
$host = 'switchyard.proxy.rlwy.net';
$usuario = 'root';
$senha = 'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES';
$banco = 'railway';
$porta = 40399;

// Conectar ao banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $banco, $porta);
if ($mysqli->connect_error) {
    die('Erro de conexão: ' . $mysqli->connect_error);
}

// Verifica a ação: login ou registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'registrar') {
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $tipo = $_POST['tipo'];

        $stmt = $mysqli->prepare("INSERT INTO usuarios (email, senha, tipo) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $senha, $tipo);
        if ($stmt->execute()) {
            echo "<script>alert('Conta criada com sucesso!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Erro ao criar conta: " . $stmt->error . "'); history.back();</script>";
        }
        exit;
    }

    if ($acao === 'login') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];

        $stmt = $mysqli->prepare("SELECT senha FROM usuarios WHERE email = ? AND tipo = ?");
        $stmt->bind_param("ss", $email, $tipo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($senha_hash);
            $stmt->fetch();

            if (password_verify($senha, $senha_hash)) {
                if ($tipo === 'admin') {
                    header("Location: admin/index.php");
                } else {
                    header("Location: motorista/checkin.php");
                }
                exit;
            }
        }

        echo "<script>alert('Email ou senha incorretos!'); history.back();</script>";
        exit;
    }
}
?>
