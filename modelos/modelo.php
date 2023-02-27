<?php 

session_start();

@$_SESSION['Privilegio'];

?>

<?php

require 'bd/conexion_bd.php';

class Prod extends BD_PDO
{
        function Insertar($nombre, $cantidad, $proveedor)
        {
            $this->Ejecutar_Instruccion("Insert into productos(Nombre,Cantidad,id_proveedor) values ('$nombre','$cantidad','$proveedor')");
        }

        function Buscar($buscar){
            $result = $this->Ejecutar_Instruccion("select productos.Id_producto,productos.Nombre,productos.Cantidad,concat (proveedores.Nombres,' ',proveedores.Apellido_p,' ',proveedores.Apellido_m) as proveedores FROM productos INNER JOIN proveedores ON productos.id_proveedor=proveedores.id_proveedor WHERE productos.Nombre LIKE '%$buscar%'");
            return $result;
        }

        function Buscar_todo()
        {
            $result = $this ->Ejecutar_Instruccion("Select productos.id_producto,productos.Nombre,productos.Cantidad,concat(proveedores.Nombres,' ',proveedores.Apellido_p,' ',proveedores.Apellido_m) as Nombre_prov from productos INNER JOIN proveedores ON productos.id_proveedor=proveedores.id_proveedor;");
            return $result;
        }
                function Eliminar($id)
        {
            $this->Ejecutar_Instruccion("Delete from productos where id_producto = '$id' ");
        }

         function Modificar( $nombre, $cantidad, $proveedor, $idproducto)
        {
            $this->Ejecutar_Instruccion("Update productos set Nombre='$nombre', Cantidad='$cantidad', id_proveedor='$proveedor' where id_producto='$idproducto'");
        }
        function ModificarBuscar($id)
        {
            $result = $this->Ejecutar_Instruccion("Select * from productos where id_producto = '$id' ");
            return $result;
        }
          public function proveedor($id)
          {
            $datos_proveedores = $this->Ejecutar_Instruccion("Select id_proveedor, concat(Nombres,' ',Apellido_p,' ',Apellido_m) as Nombre from Proveedores","Select id_proveedor from productos where id_producto='".$_GET['idmodificar']."'");
            return $datos_proveedores;
          }
        function Tabla_gen($result)
	{
		$tabla="";
		foreach ($result as $renglon) 
		{
			$tabla.="<tr>";
			$tabla.='<td>'.$renglon[0].'</td>';
			$tabla.='<td>'.$renglon[1].'</td>';
			$tabla.='<td>'.$renglon[2].'</td>';
            $tabla.='<td>'.$renglon[3].'</td>';
            
           
			$tabla.='<td><input type="button" id="btneliminar" class="btn btn-danger" name="btneliminar" value="Eliminar"  onclick="javascript: eliminar('.$renglon[0].');"></td>';
			$tabla.='<td><input type="button" id="btnmodificar"  class="btn btn-info" name="btnmodificar" value="Modificar" onclick="javascript: modificar('.$renglon[0].');"></td>
		
            </tr>';
	

             }
		return $tabla;
    }
}
 
?>