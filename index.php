<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sistema de Rastreamento</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body, html {
      height: 100%;
      overflow: hidden;
    }

    video#bgVideo {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
      filter: brightness(0.3);
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    .container {
      position: relative;
      z-index: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      text-align: center;
      color: #fff;
      width: 300px;
    }

    .login-box h2 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    .login-box a {
      display: block;
      background: #00aaff;
      color: #fff;
      padding: 12px;
      margin: 10px 0;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .login-box a:hover {
      background: #0077aa;
    }
  </style>
</head>
<body>
  <video autoplay muted loop id="bgVideo">
    <source src="https://cdn.pixabay.com/video/2023/05/26/167083-828485727_large.mp4" type="video/mp4">
    Seu navegador não suporta vídeo.
  </video>

  <div class="overlay"></div>

  <div class="container">
    <div class="login-box">
      <h2>Escolha seu Perfil</h2>
      <a href="admin/login.php"><i class="fas fa-user-shield"></i> Sou Administrador</a>
      <a href="motorista/login.php"><i class="fas fa-truck"></i> Sou Motorista</a>
    </div>
  </div>
</body>
</html>
