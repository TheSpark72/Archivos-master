
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login | Upqroo</title>
    <!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link rel="website icon" href="./img/anime.png">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" action="">
    <img class="mb-4" src="./img/logo.jpg" alt="" width="200" height="70">
    <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>
      <?php
      include "./config/connection.php";
      include "./controllers/login_register.php";
      ?>
    <div class="form-floating">
      <input type="test" class="form-control" id="floatingInput" placeholder="name@example.com" name="usuario">
      <label for="floatingInput">Correo</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <br>
    <input name="btnregistro" class="btn13" type="submit" value="Iniciar Sesión">
    <p class="mt-5 mb-3 text-muted">&copy; Furanshisuko, Inc 2021-2022</p>
  </form>
</main>


    
  </body>
</html>
