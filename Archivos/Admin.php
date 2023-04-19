<?php
  include "../config/connection.php";
  include "../controllers/dbtable.php";
    $msg = null;//mensaje para el usuario
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
      <a class="nav-link px-3" href="../controllers/closet_session.php">Cerrar Sesión</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" >
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard
       <button type="button" class="mt-5 mx-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Nueva Directorio</button>
       <button type="button" class="mt-5 mx-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal3">Nueva Carpeta</button>
       <button type="button" class="mt-5 mx-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal2">Nueva Usuario</button></h1>
      </div>

                     <div class="container conten" style="color:black;">
               <table  class="table" id="mitabla2">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Docente</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Directorio</th>
                    <th>Carpeta</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody style="font-family: arial;">
                <?php
                  foreach($Document as $dato){
                  ?>
                  <tr>
                  <td><?php echo $dato->id;?></td>
                  <td><?php echo $dato->imagenes;?></td>
                  <td><?php echo $dato->docente;?></td>
                  <td><?php echo $dato->usuario;?></td>
                  <td><?php echo $dato->contrasena;?></td>
                  <td><?php echo $dato->directorio;?></td>
                  <td><?php echo $dato->carpeta;?></td>
                  <td><a href="./modal_update.php?Codigo=<?php echo $dato->id; ?>"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal4" value="<?php echo $dato->id;?>">Actualizar</button></a></td>
                  <td><a href="./delete.php?Codigo=<?php echo $dato->id; ?>"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#miModal4" value="<?php echo $dato->id;?>">Eliminar</button></a></td>

                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              </div>

             <!--Modal de registro de usuarios-->
                <div  class="modal fade" id="miModal2" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                  <div style="background-color: #142c44c7; color:#fff;" class="modal-content">
                    <div class="modal-header">
                      <h4>Nuevo Usuario</h4>
                      <button  type="button" class="btn-close" data-bs-dismiss="modal" arial-label="close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data" >
                <div class="form-group row">
                  <label class="control-label col-md-3">Usuario</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Docente" placeholder="Introduzca el nombre del usuario" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Correo</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Usuario" placeholder="Introduzca el usuario del docente" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Contraseña</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Password" placeholder="Introduzca la contraseña del usuario" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Directorio</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="Directorio" placeholder="Introduzca el directorio del docente" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Carpeta</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="car" placeholder="Asigne una carpeta temporal" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Imagen</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="Imagen" required>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-md-offset-6">
                  <button name="boton" type="submit" class="btn14" value="Registrar">Registrar</button>
                </div>
              </div>
              </form>
                    </div>
                  </div>

                </div>
                </div> 
              <!--modal Departamento o area de sql-->
                <div  class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle2" data-bs-backdrop="static">
                <div  class="modal-dialog modal-lg">
                  <div style="background-color: #142c44c7;" class="modal-content">
                    <div class="modal-header">
                      <h4>Nuevo Area</h4>
                      <button style="color:#fff;" type="button" class="btn-close" data-bs-dismiss="modal" arial-label="close"></button>
                    </div>
                    <div class="modal-body">
                          <form class="form" method="POST"  enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">

                          <div class="form-floating">
                          <input type="test" class="form-control textc" style="background-color: #24303c; color: #fff" id="carpetasql"  name="carpetasql" required>
                            <label for="floatingInput" class="lb">Nombre de la carpeta</label>
                          </div><br>
                          
                          <div class="d-grid">
                              <input type="hidden" name="oculto" value="1">
                              <input type="submit" name="boton" class="button" value="Crear">
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
               </div>
                <!--modal carpetas-->
                <div  class="modal fade" id="miModal3" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle3" data-bs-backdrop="static">
                <div  class="modal-dialog modal-lg">
                  <div style="background-color: #142c44c7;" class="modal-content">
                    <div class="modal-header">
                      <h4 style="color:#fff">Nuevo Carpeta</h4>
                      <button style="color:#fff;" type="button" class="btn-close" data-bs-dismiss="modal" arial-label="close"></button>
                    </div>
                    <div class="modal-body">
                          <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="form-group row">
                  <label style="color:#fff" class="control-label col-md-3">Año</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="namecar1" placeholder="Introduzca el año de la carpeta" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color:#fff" class="control-label col-md-3">Trimestre</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="namecar2" placeholder="Introduzca el trimestre de la carpeta" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color:#fff" class="control-label col-md-3">Ubicación</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="ubica" placeholder="La Ubicación del archivo" required>
                  </div>
                </div>
                          
                          <div class="row">
                <div class="col-md-12 col-md-offset-6">
                  <input type="hidden" name="oculto">
                  <button name="boton" type="submit" class="btn14" value="carpeta">Crear</button>
                </div>
              </div>
              </form>
                    </div>
                  </div>
                </div>
               </div>
               <!--modal Actualizar Datos del Usuario-->


    </main>
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






