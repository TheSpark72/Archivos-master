<?php
$host = "189.203.249.18/File_Fco/";//189.203.249.18
$carpe = "Archivos/";
$servidor = "localhost";
$usuario = "root";
$contrasena = "Sistemas2022";//Sistemas2022
$nombre_bd = "gestion_archivos";

$conexion = new mysqli($servidor,$usuario,$contrasena,$nombre_bd);
$conexion->set_charset("utf8");

try{
    $bd = new PDO('mysql:host='.$servidor.';dbname='.$nombre_bd,$usuario,$contrasena,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
}catch(Exception $e){
    echo "Problema en la conexion de la base de datos".$e->getMessage();
}
?>