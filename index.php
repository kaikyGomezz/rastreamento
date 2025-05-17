<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Escolha seu Perfil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('https://scontent.fcpq3-1.fna.fbcdn.net/v/t39.30808-6/487221821_2437647449903738_3788404538221358532_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=0EefW5zgc-4Q7kNvwGjJUG1&_nc_oc=AdneRu545cPEHjsBLrtNuJWRWbd4JxK64-SXp_qjDIseUQDsHYmlsQ2TSRvIaoJM0RnV8qqNZ32ahHn7GDxgRP2H&_nc_zt=23&_nc_ht=scontent.fcpq3-1.fna&_nc_gid=ogWNc0AhOqY7JC1C0bN9Ow&oh=00_AfJeX5XXDXtl_0KvaBMMDQxYDc1OjEJUGj93b0yj6SHDCA&oe=682D747B') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.65);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
      text-align: center;
      max-width: 400px;
      width: 90%;
    }

    h1 {
      color: #fff;
      margin-bottom: 30px;
      font-size: 28px;
    }

    .btn {
      width: 100%;
      padding: 15px;
      margin: 10px 0;
      font-size: 18px;
      background-color: #1abc9c;
      color: #fff;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background-color: #16a085;
    }

    @media (max-width: 768px) {
      body {
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center top;
        background-attachment: scroll;
      }

      h1 {
        font-size: 22px;
      }

      .btn {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Escolha seu Perfil</h1>
    <a href="login.php?tipo=motorista"><button class="btn">Sou Motorista</button></a>
    <a href="login.php?tipo=admin"><button class="btn">Sou Administrador</button></a>
  </div>
</body>
</html>
