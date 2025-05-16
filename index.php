<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sistema de Rastreamento</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .inicio-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
    }

    .inicio-container h1 {
      font-size: 28px;
      margin-bottom: 40px;
    }

    .inicio-container a {
      display: inline-block;
      margin: 12px;
      padding: 14px 28px;
      border-radius: 8px;
      background-color: #00b894;
      color: white;
      font-size: 16px;
      text-decoration: none;
      transition: background-color 0.2s ease-in-out;
    }

    .inicio-container a:hover {
      background-color: #019270;
    }

    @media screen and (max-width: 600px) {
      .inicio-container h1 {
        font-size: 22px;
      }

      .inicio-container a {
        padding: 12px 24px;
        font-size: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="inicio-container">
    <h1>Bem-vindo ao Sistema de Rastreamento</h1>
    <a href="admin/">Sou Administrador</a>
    <a href="motorista/checkin.php">Sou Motorista</a>
  </div>
</body>
</html>
