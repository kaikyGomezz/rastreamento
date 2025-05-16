<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Sistema de Rastreamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      z-index: -2;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }

    .center-box {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 20px;
    }

    .option-button {
      padding: 15px 30px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid #fff;
      color: #fff;
      font-size: 18px;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s;
      width: 250px;
      text-align: center;
    }

    .option-button:hover {
      background-color: #00b894;
      color: #000;
    }

    .login-box {
      display: none;
      flex-direction: column;
      background-color: rgba(0, 0, 0, 0.75);
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
      width: 90%;
      max-width: 400px;
      color: white;
      animation: slideIn 0.6s ease-in-out forwards;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 26px;
    }

    .login-box input {
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      width: 100%;
    }

    .login-box .remember {
      display: flex;
      justify-content: space-between;
      font-size: 13px;
      color: #ccc;
      margin-bottom: 15px;
    }

    .login-box button {
      padding: 12px;
      margin-top: 10px;
      border: none;
      border-radius: 8px;
      background-color: #00b894;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-box button:hover {
      background-color: #019270;
    }

    .login-box .link {
      margin-top: 15px;
      font-size: 13px;
      text-align: center;
    }

    .login-box .link a {
      color: #00b894;
      text-decoration: none;
    }

    @keyframes slideIn {
      0% {
        opacity: 0;
        transform: translateY(50px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <!-- Vídeo de fundo -->
  <video autoplay muted loop id="bgVideo">
    <source src="https://cdn.coverr.co/videos/coverr-driving-on-a-highway-0663/1080p.mp4" type="video/mp4">
    Seu navegador não suporta vídeos HTML5.
  </video>

  <div class="overlay"></div>

  <div class="center-box" id="choiceBox">
    <div class="option-button" onclick="showLogin('admin')">Sou Administrador</div>
    <div class="option-button" onclick="showLogin('motorista')">Sou Motorista</div>
  </div>

  <div class="center-box" id="loginContainer" style="display:none;">
    <div class="login-box" id="loginBox">
      <h2>Login</h2>
      <form id="loginForm" method="POST">
        <input type="text" placeholder="Usuário" required>
        <input type="password" placeholder="Senha" required>
        <div class="remember">
          <label><input type="checkbox"> Lembrar me</label>
          <a href="#">Esqueceu a senha?</a>
        </div>
        <button type="submit" id="btnLogin">Entrar</button>
        <div class="link">
          Não tem uma conta? <a href="#">Criar conta</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    let destino = '';

    function showLogin(tipo) {
      destino = tipo === 'admin' ? 'admin/index.php' : 'motorista/checkin.php';
      document.getElementById('choiceBox').style.display = 'none';
      document.getElementById('loginContainer').style.display = 'flex';
    }

    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      window.location.href = destino;
    });
  </script>

</body>
</html>
