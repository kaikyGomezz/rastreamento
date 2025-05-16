<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rastreamento de Caminhões</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('https://images.unsplash.com/photo-1603627999343-9c3fc4d9388e') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.6);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      color: white;
      text-align: center;
    }

    .btn-opcao {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 30px;
      margin: 20px;
      border-radius: 12px;
      font-size: 22px;
      color: white;
      text-decoration: none;
      width: 300px;
      transition: 0.3s;
      box-shadow: 0 4px 10px rgba(0,0,0,0.4);
    }

    .btn-opcao:hover {
      background-color: rgba(0, 206, 201, 0.4);
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Sistema de Rastreamento</h1>
    <a href="motorista/checkin.php" class="btn-opcao">Sou Motorista</a>
    <a href="admin/index.php" class="btn-opcao">Sou Administrador</a>
  </div>
</body>
</html>
