<?php
$mysqli = new mysqli('switchyard.proxy.rlwy.net', 'root', 'UqRvkxHRiwvqDDoAEADLNXdmskmVaiES', 'railway', 40399);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $destino = $_POST['destino'];

    $stmt = $mysqli->prepare("UPDATE caminhoes SET status = ?, destino = ? WHERE id = ?");
    $stmt->bind_param("ssi", $status, $destino, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
} else {
    $id = $_GET['id'];
    $res = $mysqli->query("SELECT * FROM caminhoes WHERE id = $id");
    $row = $res->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Caminhão</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Editar Caminhão</h1>
  <form method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <label>Status:</label>
    <select name="status" required>
      <option <?= $row['status'] == 'Na garagem' ? 'selected' : '' ?>>Na garagem</option>
      <option <?= $row['status'] == 'No posto' ? 'selected' : '' ?>>No posto</option>
      <option <?= $row['status'] == 'Viajando' ? 'selected' : '' ?>>Viajando</option>
    </select>

    <label>Destino:</label>
    <input type="text" name="destino" value="<?= htmlspecialchars($row['destino']) ?>" required>

    <button type="submit">Salvar Alterações</button>
  </form>
  <a href="index.php">← Voltar</a>
</body>
</html>
