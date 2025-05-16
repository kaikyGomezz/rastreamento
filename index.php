<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Rastreamento</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body.index {
      background: url('https://lh3.googleusercontent.com/p/AF1QipMBDzOw51G6BcLXmJHRgnGZu0gt0MvofihF7aT2=s680-w680-h510-rw') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
      color: #fff;
      text-align: center;
    }

    .container {
      margin-top: 20%;
    }

    .opcoes {
      margin-top: 20px;
    }

    .botao {
      display: inline-block;
      margin: 10px;
      padding: 20px 40px;
      background: rgba(0, 0, 0, 0.6);
      color: white;
      text-decoration: none;
      border-radius: 10px;
      font-size: 20px;
      transition: background 0.3s;
    }

    .botao:hover {
      background: rgba(0, 0, 0, 0.8);
    }
  </style>
</head>
<body class="index">
  <div class="container">
    <h1>Sistema de Rastreamento</h1>
    <div class="opcoes">
      <a href="motorista/checkin.php" class="botao">Sou Motorista</a>
      <a href="admin/index.php" class="botao">Sou Administrador</a>
    </div>
  </div>
</body>
</html>
