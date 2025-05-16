<?php
session_start();
$mysqli = new mysqli('switchyard.proxy.rlwy.net', 'root', 'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES', 'railway', 40399);

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo = $_POST['tipo'] ?? '';

if (empty($email) || empty($senha)) {
    die("Preencha todos os campos.");
}

$stmt = $mysqli->prepare("SELECT id, senha FROM usuarios WHERE email = ? AND tipo = ?");
$stmt->bind_param("ss", $email, $tipo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $senha_hash);
    $stmt->fetch();

    if (password_verify($senha, $senha_hash)) {
        $_SESSION['usuario_id'] = $id;
        $_SESSION['usuario_tipo'] = $tipo;

        if ($tipo === 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: motorista/checkin.php");
        }
        exit();
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}

$stmt->close();
$mysqli->close();
