<?php
include("../conexao.php");

if (!isset($_GET["id"])) {
  die("ID do caminhão não informado.");
}

$id = intval($_GET["id"]);
$resultado = $conn->query("SELECT * FROM caminhoes WHERE id = $id");

if ($resultado->num_rows === 0) {
  die("Caminhão não encontrado.");
}

$dados = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $placa_cavalo = $_POST["placa_cavalo"];
  $placa_carreta = $_POST["placa_carreta"];
  $status = $_POST["status"];
  $localizacao = $_POST["localizacao"];
  $destino = $_POST["destino"];

  $sql = "UPDATE caminhoes SET 
            placa_cavalo = '$placa_cavalo', 
            placa_carreta = '$placa_carreta', 
            status = '$status', 
            localizacao = '$localizacao', 
            destino = '$destino' 
          WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Informações atualizadas com sucesso!'); window.location.href='index.php';</script>";
  } else {
    echo "Erro ao atualizar: " . $conn->error;
  }

  $conn->close();
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Caminhão</title>
  <link rel="stylesheet" href="../style.css" />
  <style>
    .container {
      max-width: 500px;
      margin: 60px auto;
      background-color: rgba(255, 255, 255, 0.05);
      padding: 30px;
      border-radius: 12px;
      color: white;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-top: 4px;
      border-radius: 6px;
      border: none;
      font-size: 15px;
    }

    button {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background-color: #00cec9;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    a {
      display: block;
      margin-top: 20px;
      text-align: center;
      color: #ccc;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Editar Caminhão</h2>
    <form method="post">
      <label>Placa do Cavalo:</label>
      <input type="text" name="placa_cavalo" value="<?php echo $dados['placa_cavalo']; ?>" required />

      <label>Placa da Carreta:</label>
      <input type="text" name="placa_carreta" value="<?php echo $dados['placa_carreta']; ?>" required />

      <label>Status:</label>
      <input type="text" name="status" value="<?php echo $dados['status']; ?>" required />

      <label>Localização:</label>
      <input type="text" name="localizacao" value="<?php echo $dados['localizacao']; ?>" required />

      <label>Destino:</label>
      <input type="text" name="destino" value="<?php echo $dados['destino']; ?>" required />

      <button type="submit">Salvar Alterações</button>
    </form>
    <a href="index.php">← Voltar</a>
  </div>
</body>
</html>
