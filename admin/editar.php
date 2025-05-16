<?php
include('../conexao.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = $mysqli->prepare("SELECT * FROM caminhoes WHERE id = ?");
  $consulta->bind_param("i", $id);
  $consulta->execute();
  $resultado = $consulta->get_result();
  $caminhao = $resultado->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $placa_cavalo = $_POST['placa_cavalo'];
  $placa_carreta = $_POST['placa_carreta'];
  $status = $_POST['status'];
  $localizacao = $_POST['localizacao'];
  $destino = $_POST['destino'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  $stmt = $mysqli->prepare("UPDATE caminhoes SET placa_cavalo=?, placa_carreta=?, status=?, localizacao=?, destino=?, latitude=?, longitude=? WHERE id=?");
  $stmt->bind_param("ssssssdi", $placa_cavalo, $placa_carreta, $status, $localizacao, $destino, $latitude, $longitude, $id);
  $stmt->execute();

  echo "<script>alert('Atualizado com sucesso!'); window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Caminhão</title>
</head>
<body style="background:#000;color:white;padding:20px;font-family:sans-serif;">
  <h2>Editar Caminhão</h2>
  <form method="POST">
    <input type="hidden" name="id" value="<?= $caminhao['id'] ?>">
    <input type="text" name="placa_cavalo" value="<?= $caminhao['placa_cavalo'] ?>" required><br>
    <input type="text" name="placa_carreta" value="<?= $caminhao['placa_carreta'] ?>" required><br>
    <select name="status">
      <option value="Na garagem" <?= $caminhao['status']=='Na garagem'?'selected':'' ?>>Na garagem</option>
      <option value="No posto" <?= $caminhao['status']=='No posto'?'selected':'' ?>>No posto</option>
      <option value="Viajando" <?= $caminhao['status']=='Viajando'?'selected':'' ?>>Viajando</option>
    </select><br>
    <input type="text" name="localizacao" value="<?= $caminhao['localizacao'] ?>" required><br>
    <input type="text" name="destino" value="<?= $caminhao['destino'] ?>" required><br>
    <input type="text" name="latitude" value="<?= $caminhao['latitude'] ?>" required><br>
    <input type="text" name="longitude" value="<?= $caminhao['longitude'] ?>" required><br>
    <button type="submit">Salvar</button>
  </form>
  <br>
  <a href="index.php" style="color:#1db954;text-decoration:none;">← Voltar</a>
</body>
</html>
