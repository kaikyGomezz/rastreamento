<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Rastreamento</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      color: white;
      overflow: hidden;
    }

    video#bgVideo {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
      object-fit: cover;
      filter: brightness(0.4);
    }

    .overlay {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .overlay h1 {
      font-size: 2.5em;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px black;
    }

    .card {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card a {
      display: block;
      background-color: #1db954;
      color: white;
      text-decoration: none;
      margin: 10px 0;
      padding: 12px 24px;
      border-radius: 10px;
      transition: background 0.3s;
      width: 200px;
      text-align: center;
      font-weight: bold;
    }

    .card a:hover {
      background-color: #17a44b;
    }
  </style>
</head>
<body>
  <video autoplay muted loop id="bgVideo">
    <source src="https://cdn.coverr.co/videos/coverr-truck-on-the-highway-9755/1080p.mp4" type="video/mp4">
    Seu navegador não suporta vídeo em HTML5.
  </video>

  <div class="overlay">
    <h1>Escolha seu Perfil</h1>
    <div class="card">
      <a href="login.php?tipo=admin">Sou Administrador</a>
      <a href="login.php?tipo=motorista">Sou Motorista</a>
    </div>
  </div>
</body>
</html>
