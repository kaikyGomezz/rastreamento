<?php
$mysqli = new mysqli('switchyard.proxy.rlwy.net', 'root', 'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES', 'railway', 40399);

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo = $_POST['tipo'] ?? 'admin';

if (empty($email) || empty($senha)) {
    die("Preencha todos os campos.");
}

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $mysqli->prepare("INSERT INTO usuarios (email, senha, tipo) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $senhaCriptografada, $tipo);

if ($stmt->execute()) {
    header("Location: login.php?tipo=" . $tipo);
    exit();
} else {
    echo "Erro ao criar conta: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
