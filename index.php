<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login do Sistema</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Vídeo de fundo -->
<video autoplay loop muted playsinline id="background-video">
  <source src="video.mp4" type="video/mp4">
  Seu navegador não suporta vídeos em HTML5.
</video>

<div class="login-container">
  <h1>Bem-vindo</h1>
  <form action="login.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    
    <select name="tipo" required>
      <option value="admin">Administrador</option>
      <option value="motorista">Motorista</option>
    </select>

    <button type="submit">Entrar</button>
  </form>
  <a href="registro.php" class="criar-conta">Criar conta</a>
</div>

</body>
</html>
