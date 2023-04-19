<?php
    //Storage of user data
    session_start();

    if (!empty($_POST["btnregistro"])) {//When you press the login button, the validation function will be executed.
        if($_POST){
            if(($_POST['usuario']=="administrador")&&($_POST['password']=="Upqroo22")){
                $_SESSION['id1'] = 1;
                $_SESSION['nombre1']="Administrativo";
                $_SESSION['area1'] = "Sistemas";
                header("location: ./Archivos/Admin.php");
            }else{
                if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {//if username and password are correct then it will store the user data in the following variables
                    $usuario = $_POST["usuario"];
                    $password = $_POST["password"];
                    $sql = $conexion->query("select * from usuarios where usuario='$usuario' and contrasena='$password'");
                    if ( $datos = $sql->fetch_object()) {
                        $_SESSION['id'] = $datos->id;
                        $_SESSION['imagenes'] = $datos->imagenes;
                        $_SESSION['docente'] = $datos->docente;
                        $_SESSION['usuario'] = $datos->usuario;
                        $_SESSION['contrasena'] = $datos->contrasena;
                        $_SESSION['directorio'] = $datos->directorio;
                        $_SESSION['carpeta'] = $datos->carpeta;
        
                        header('location: records.php');
                    }else{echo "<div class='alert alert-danger'>Acceso denegado</div>";
        
                    }
                } else {
                    echo "campos vacios";
                }
                
            }
            }
        }
        
       

?>