<?php 

	require 'modelos/modelo.php';

	$obj = new Prod();

	if (isset($_POST['btnregistrar'])) 
{

		$nombre = $_POST['txtnombre'];
		$cantidad = $_POST['txtcantidad'];
		$proveedor = $_POST['lstproveedores'];

	if ($_POST['btnregistrar']=='Insertar'){
		$obj->Insertar($nombre,$cantidad, $proveedor);
		
    }
	elseif($_POST['btnregistrar']=='Guardar'){
		$idproducto = $_POST['txtid'];
        $prod_mod = $obj->Modificar($nombre,$cantidad, $proveedor, $idproducto);
		
	}

}

	elseif (isset($_GET['ideliminar'])) {

		$id = $_GET['ideliminar'];
		$prod_mod = $obj->Eliminar($id);
	}

	elseif (isset($_GET['idmodificar'])) {

		$id = $_GET['idmodificar'];
		$prod_mod = $obj->ModificarBuscar($id);
	}

	if (isset($_POST['btncerrar']))
	{

            session_start();

         session_destroy();

        header("Location: index.php");
		
	}
	
	if (isset($_POST['btnbuscar'])) 
	{
		$buscar = $_POST['txtbuscar'];
		$result = $obj->Buscar($buscar);
		$datos = $obj->Tabla_gen($result);
	}
	else
	{
		$result = $obj->Buscar_todo();
		$datos = $obj->Tabla_gen($result);
	}

	
	@$datos_buscar = $obj->Ejecutar_Instruccion("select productos.Id_producto,productos.Nombre,productos.Cantidad,concat (proveedores.Nombres,' ',proveedores.Apellido_p,' ',proveedores.Apellido_m) as proveedores FROM productos INNER JOIN proveedores ON productos.id_proveedor=proveedores.id_proveedor WHERE productos.Nombre LIKE '%$buscar%'");

	$datos_proveedores = $obj->listado("Select id_proveedor, concat(Nombres,' ',Apellido_p,' ',Apellido_m) as Nombre from proveedores","Select id_proveedor from productos where id_producto='".@$_GET['idmodificar']."'");

	


	require 'vistas/vista.php';


?>



	
