<?php
  session_start();
  if (empty($_SESSION['id1'])) {
    header('location: ../index.php');
  }
  $dominio = $_SERVER["HTTP_HOST"];
?>
<?php 


$sentencia = $bd -> query("select * from usuarios");//Nombre de la tabla de la base de datos
$Document = $sentencia->fetchAll(PDO::FETCH_OBJ);

  $dbtable = (isset($_POST['carpetasql']))?$_POST['carpetasql']:" ";
  $Accion = (isset($_POST['boton']))?$_POST['boton']:" ";//Almacena la acción a realizar
  //usuario
  $id = (isset($_POST['id']))?$_POST['id']:" ";
  $Docente = (isset($_POST['Docente']))?$_POST['Docente']:" ";
  $Usuario = (isset($_POST['Usuario']))?$_POST['Usuario']:" ";
  $Password = (isset($_POST['Password']))?$_POST['Password']:" ";
  $Directorio = (isset($_POST['Directorio']))?$_POST['Directorio']:" ";
  $Car = (isset($_POST['car']))?$_POST['car']:" ";
  $Imagen = (isset($_POST['Imagen']))?$_POST['Imagen']:" ";
  

  switch($Accion){
    case "Crear":
      //Creación de las carpetas y tablas de las areas o departamentos.
      if (isset($_POST["oculto"])) {
        $carpeta = htmlspecialchars($_POST["carpetasql"]);
         $directorio = $carpeta;
    if (!is_dir($directorio)) {
      $crear = mkdir($directorio, 0777, true);
      if($crear){
        $msg = "Directorio $directorio creado correctamente";
      }else{
        $msg = "Ha ocurrido un error al crear el directorio";
      }
    }else{
      $msg = "La carpeta que intenta crear la existe";
    }
  }
  
  $sql = "CREATE TABLE IF NOT EXISTS $dbtable (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(350) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archivo` varchar(500) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `ubicacion` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
)";
  
  if($conexion->query($sql) === true){
    echo "La carpeta se creo correctamente...";
  }else{
    echo "La carpeta no se pudo crear..";
  }
  break;
  case "Registrar":
    $PreResul = $bd->prepare("INSERT INTO usuarios(imagenes,docente,usuario,contrasena,directorio,carpeta) VALUES (?,?,?,?,?,?);");
    $Fecha = new DateTime();
        $NewFile = ($Imagen!="")?$Fecha->getTimestamp()."_".$_FILES["Imagen"]["name"]:"R.png";

        $FileNew = $_FILES['Imagen']['tmp_name'];

        if($FileNew!=""){
            move_uploaded_file($FileNew,"../img/".$NewFile);
        }

      $Resul = $PreResul ->execute([$NewFile,$Docente,$Usuario,$Password,$Directorio,$Car]);
      header('location: Admin.php?msg=Se_registro_el_docente');
    break;
    case "carpeta":
    $anoc = (isset($_POST['namecar1']))?$_POST['namecar1']:" ";
    $mesc = (isset($_POST['namecar2']))?$_POST['namecar2']:" ";

    $sql1 = $conexion->query("select * from year5 where ano='$anoc'");
     if ( $datos = $sql1->fetch_object()) {
      
        }else{
          $PResulA = $bd->prepare("INSERT INTO year5(ano) VALUES (?);");
          $ResulA = $PResulA ->execute([$anoc]);
         }
   $sql2 = $conexion->query("select * from trimestre where trimestre='$mesc'");
     if ( $datos = $sql2->fetch_object()) {
      
        }else{
          $PResulM = $bd->prepare("INSERT INTO trimestre(trimestre) VALUES (?);");
          $ResulM = $PResulM ->execute([$mesc]);
         }
    
        if (isset($_POST["oculto"])) {
        $carpeta1 = htmlspecialchars($_POST["namecar1"]);
        $carpeta2 = htmlspecialchars($_POST["namecar2"]);
        $ubica = htmlspecialchars($_POST["ubica"]);
         $directorio = $ubica."/".$carpeta1."/".$carpeta2;
        if (!is_dir($directorio)) {
          $crear = mkdir($directorio, 0777, true);
          if($crear){
            $msg = "Directorio $directorio creado correctamente";
            header('location: Admin.php?msg=Exito');
          }else{
            $msg = "Ha ocurrido un error al crear el directorio";
          }
        }else{
          $msg = "La carpeta que intenta crear la existe";
        }
      }
      
    break;
    case "Actualizar":

    $actu = $bd ->prepare("UPDATE usuarios SET docente = ?, usuario = ?, contrasena = ?, directorio = ? WHERE id = '$id';");
        $resultado = $actu->execute([$Docente,$Usuario,$Password,$Directorio]);

        if($Resul === TRUE){
            header('Location: Admin.php?mensaje=Algo_Fallo');      
        }else{
            header('Location: Admin.php?mensaje=Se_Actualizaron_Los_Datos_Del_Usuario');
            exit();
        }
    break;


}

?>