<?php
include("../conexao.php");

if (!isset($_GET["id"])) {
  die("ID não informado.");
}

$id = intval($_GET["id"]);

$sql = "DELETE FROM caminhoes WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Caminhão excluído com sucesso!'); window.location.href='index.php';</script>";
} else {
  echo "Erro ao excluir: " . $conn->error;
}

$conn->close();
?>
