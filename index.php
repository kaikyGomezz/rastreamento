<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Escolha seu Perfil</title>
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('https://lh3.googleusercontent.com/p/AF1QipMBDzOw51G6BcLXmJHRgnGZu0gt0MvofihF7aT2=s680-w680-h510-rw');
      background-size: cover;
      background-position: center;
      font-family: 'Rubik Glitch', cursive;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      color: black;
    }

    h1 {
      font-size: 3em;
      margin-bottom: 40px;
      color: black;
      background-color: rgba(255,255,255,0.6);
      padding: 10px 20px;
      border-radius: 10px;
    }

    .perfil-container {
      display: flex;
      gap: 40px;
    }

    .perfil {
      background-color: rgba(0, 0, 0, 0.8);
      color: white;
      text-align: center;
      padding: 40px;
      border-radius: 15px;
      width: 200px;
      cursor: pointer;
      text-decoration: none;
      font-size: 18px;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .perfil:hover {
      transform: scale(1.05);
      background-color: rgba(0, 0, 0, 1);
    }
  </style>
</head>
<body>

  <h1>Escolha seu Perfil</h1>

  <div class="perfil-container">
    <a href="admin/index.php" class="perfil">Sou Administrador</a>
    <a href="motorista/checkin.php" class="perfil">Sou Motorista</a>
  </div>

</body>
</html>


