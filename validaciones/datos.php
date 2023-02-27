<?php 

require '../bd/conexion_bd.php';

$obj = new BD_PDO();


$resp_cons = $obj->Ejecutar_Instruccion("Select * from usuarios where Usuario = '{$_GET['id_usuario']}'");

//var_dump($resp_cons);

echo json_encode($resp_cons);

 ?>