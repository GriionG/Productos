<?php

require '../bd/conexion_bd.php';

class inicio extends BD_PDO
{
	      public function sesion($usuario, $contrasena)
	      {
	      	$datos = $this->Ejecutar_Instruccion("Select * from usuarios where usuario='$usuario' and contrasena='$contrasena'" );
	      	return $datos;
	      }
}

?>