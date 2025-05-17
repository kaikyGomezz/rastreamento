<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Escolha seu Perfil</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('https://scontent.fcpq3-1.fna.fbcdn.net/v/t39.30808-6/487221821_2437647449903738_3788404538221358532_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=0EefW5zgc-4Q7kNvwGjJUG1&_nc_oc=AdneRu545cPEHjsBLrtNuJWRWbd4JxK64-SXp_qjDIseUQDsHYmlsQ2TSRvIaoJM0RnV8qqNZ32ahHn7GDxgRP2H&_nc_zt=23&_nc_ht=scontent.fcpq3-1.fna&_nc_gid=ogWNc0AhOqY7JC1C0bN9Ow&oh=00_AfJeX5XXDXtl_0KvaBMMDQxYDc1OjEJUGj93b0yj6SHDCA&oe=682D747B') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 40px;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 0 15px rgba(0,0,0,0.8);
    }

    .container h1 {
      color: #fff;
      font-size: 32px;
      margin-bottom: 30px;
    }

    .btn {
      display: block;
      width: 200px;
      margin: 15px auto;
      padding: 15px;
      font-size: 18px;
      background-color: #1abc9c;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      color: white;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background-color: #16a085;
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
