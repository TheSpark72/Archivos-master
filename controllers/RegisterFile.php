<?php
  //almacenamiento de los datos de usuario
  $id = $_SESSION['id'];
  $Docente = $_SESSION['docente'];
  $usuario = $_SESSION['usuario'];
  $contrasena = $_SESSION['contrasena'];
  $directorio = $_SESSION['directorio'];
  $carpeta = $_SESSION['carpeta'];
  //seleccion de archivos del usuario
  $sentencia = $bd -> query("select * from $directorio where usuario = '$usuario'");//Nombre de la tabla de la base de datos
  $Document = $sentencia->fetchAll(PDO::FETCH_OBJ);
  //almacenamiento de datos enviados para la bd
  $Name = (isset($_POST['NameFile']))?$_POST['NameFile']:" ";
  $directori0 = (isset($_POST['directorio']))?$_POST['directorio']:" ";
  $File = (isset($_FILES['Document']['name']))?$_FILES['Document']['name']:" ";

  $ano = (isset($_POST['ano']))?$_POST['ano']:" ";
  $mes = (isset($_POST['mes']))?$_POST['mes']:" ";
  $local = $ano."/".$mes;
  $Accion = (isset($_POST['boton']))?$_POST['boton']:" ";

  switch($Accion){
    case "Registrar":
        $PreResul = $bd->prepare("INSERT INTO $directorio (nombre_archivo,archivo,usuario,ubicacion) VALUES (?,?,?,?);");

        $Fecha = new DateTime();
        $NewFile = ($File!="")?$Fecha->getTimestamp()."_".$_FILES["Document"]["name"]:"No_Existe_ocumento";

        $FileNew = $_FILES['Document']['tmp_name'];

        if($FileNew!=""){
            move_uploaded_file($FileNew,"./Archivos/"."$directori0"."/".$NewFile);
            $archivoup = "Archivos/"."$directori0"."/".$NewFile;
        }

        $Resul = $PreResul ->execute([$Name,$File,$usuario,$archivoup]);
        header('location: records.php?msg=true');
      break;

     case "actualizar":
        $actu = $bd ->prepare("UPDATE usuarios SET carpeta = ? WHERE usuario = '$usuario';");
        $resultado = $actu->execute([$local]);

        if($Resul === TRUE){
            header('Location: records.php?mensaje=Algo_Fallo');      
        }else{
            header('Location: records.php?mensaje=Se_la_Carpeta');
            exit();
        }
         break;
    }
  ?>