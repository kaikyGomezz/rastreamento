<?php
$mysqli = new mysqli("switchyard.proxy.rlwy.net", "root", "UqRvkxHRiwvqDDoAEADLNXdmskmVaiES", "railway", 40399);

if ($mysqli->connect_errno) {
    die("Falha ao conectar: " . $mysqli->connect_error);
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo = $_POST['tipo'] ?? '';

if ($email && $senha && $tipo) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO usuarios (email, senha, tipo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $senha_hash, $tipo);
    
    if ($stmt->execute()) {
        header("Location: login.php?tipo=" . $tipo);
        exit;
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }
} else {
    echo "Preencha todos os campos.";
}
?>
