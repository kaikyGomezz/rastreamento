<?php
include('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  $stmt = $mysqli->prepare("DELETE FROM caminhoes WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

header('Location: index.php');
exit();
