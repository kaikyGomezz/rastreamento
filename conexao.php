<?php
$host = "switchyard.proxy.rlwy.net";
$usuario = "root";
$senha = "UqRvkxHRiwvqDDoAEADLNXdmskmVaiES";
$banco = "railway";
$porta = 40399;

$conn = new mysqli($host, $usuario, $senha, $banco, $porta);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

