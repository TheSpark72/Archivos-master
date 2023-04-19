<?php   

  include "../config/connection.php";
  include "../controllers/dbtable.php";

    $codigo = $_GET['Codigo'];

    $sentencia = $bd -> prepare("SELECT * FROM Usuarios WHERE id = ?;");
    $sentencia ->execute([$codigo]);
    $personal = $sentencia -> fetch(PDO::FETCH_OBJ);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ADMINISTRADOR | UPQROO</title>
    <link rel="website icon" href="../img/anime.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="../css/s_registro.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main1.css">
    <link rel="stylesheet" href="../css/style.css">
    

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="./Admin.php">UPQROO</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="navbar-nav">
    <div class="nav-item text-nowrap">
      
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./Admin.php" >
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ACTUALIZAR </h1>
      </div>
<div class="content2">
            <div class="tile">
            <h3 class="tile-title text-center">REGISTRO DE ARCHIVOS</h3>
            <div class="tile-body">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data" >
                      <div class="form-group row">
                  <label class="control-label col-md-3">ID</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="id" readonly required value="<?php echo $personal->id;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Docente</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Docente" placeholder="Introduzca el nombre del docente" required value="<?php echo $personal->docente;?>" >
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Usuario</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Usuario" placeholder="Introduzca el usuario del docente" required value="<?php echo $personal->usuario;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Contraseña</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Password" placeholder="Introduzca la contraseña del usuario" required value="<?php echo $personal->contrasena;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Directorio</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Directorio" placeholder="Introduzca el directorio del docente" required value="<?php echo $personal->directorio;?>">
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-md-offset-6">
                  <button name="boton" type="submit" class="btn14" value="Actualizar">Actualizar</button>
                </div>
              </div>
              </form>
                    
</div>
          </div>
</div>


                    <script src="../js/bootstrap.bundle.min.js"></script>

    <!--tabla-->
      

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
       $(document).ready(function() {
         $('#mitabla2').DataTable( {
          language: {
              url: 'http://cdn.datatables.net/plug-ins/1.13.1/i18n/es-MX.json'
          }
      } );
  } );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>