<?php 
  include "../config/connection.php";
 $codigo = $_GET['Codigo'];



$sentencia = $bd ->prepare("DELETE  FROM Usuarios WHERE id = ?;");
$Resul = $sentencia ->execute([$codigo]);

if($Resul === TRUE){
    header("Location: Admin.php?mensaje=Usuario_Eliminado");
}else{
    header("Location: Admin.php?mensaje=Error");
    exit();
}

?>