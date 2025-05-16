<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sistema de Rastreamento</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('https://lh3.googleusercontent.com/p/AF1QipMBDzOw51G6BcLXmJHRgnGZu0gt0MvofihF7aT2=s1280') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', sans-serif;
    }

    .home-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
      color: white;
      background-color: rgba(0,0,0,0.6);
      padding: 20px;
    }

    .card-opcao {
      background-color: rgba(255, 255, 255, 0.1);
      border: 2px solid #00cec9;
      border-radius: 16px;
      padding: 40px 20px;
      margin: 20px;
      width: 80%;
      max-width: 400px;
      text-decoration: none;
      color: white;
      font-size: 22px;
      font-weight: bold;
      transition: transform 0.2s ease-in-out, background-color 0.2s;
    }

    .card-opcao:hover {
      background-color: rgba(0, 206, 201, 0.4);
      transform: scale(1.03);
    }

    @media screen and (max-width: 600px) {
      .card-opcao {
        font-size: 18px;
        padding: 30px 15px;
      }
    }
  </style>
</head>
<body>
  <div class="home-container">
    <h1>Bem-vindo ao Sistema de Rastreamento</h1>
    <a href="admin/" class="card-opcao">Sou Administrador</a>
    <a href="motorista/checkin.php" class="card-opcao">Sou Motorista</a>
  </div>
</body>
</html>
