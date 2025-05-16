<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      overflow: hidden;
    }

    video#bgVideo {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      z-index: -1;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 0;
    }

    .container {
      position: relative;
      z-index: 1;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
      width: 90%;
      max-width: 400px;
      text-align: center;
      color: white;
    }

    .login-box h2 {
      font-size: 28px;
      margin-bottom: 25px;
    }

    .login-box input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      font-size: 14px;
    }

    .login-box .remember {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 13px;
      margin: 10px 0;
      color: #ccc;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      margin-top: 12px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 15px;
      background-color: #00b894;
      color: white;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-box button:hover {
      background-color: #019270;
    }

    .login-box .link {
      margin-top: 20px;
      font-size: 13px;
      color: #ccc;
    }

    .login-box .link a {
      color: #00b894;
      text-decoration: none;
    }

    .login-box .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- Vídeo de fundo -->
  <video autoplay muted loop id="bgVideo">
    <source src="https://cdn.coverr.co/videos/coverr-driving-on-a-highway-0663/1080p.mp4" type="video/mp4">
    Seu navegador não suporta vídeos em HTML5.
  </video>

  <div class="overlay"></div>

  <div class="container">
    <div class="login-box">
      <h2>Login</h2>
      <form>
        <input type="text" placeholder="Usuário" required>
        <input type="password" placeholder="Senha" required>
        <div class="remember">
          <label><input type="checkbox"> Lembrar me</label>
          <a href="#">Esqueceu a senha?</a>
        </div>
        <button formaction="admin/index.php">Sou Administrador</button>
        <button formaction="motorista/checkin.php">Sou Motorista</button>
        <div class="link">
          Não tem uma conta? <a href="#">Criar conta</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
