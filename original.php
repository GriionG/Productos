<?php 

session_start();

@$_SESSION['Privilegio'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Index</title>

		<!-- icono de la pagina-->
		<link rel="icon" type="image/x-icon" href="img/logo_tl.ico" />

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style1.css"/>

<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

<link type="text/css" rel="stylesheet" href="css/style1.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js%22%3E"></script>

			<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min/js"></script>

	<script>
		
		function eliminar(id){
			if (confirm("¿Estas seguro de eliminar el registro?")) {

				window.location = "index.php?ideliminar=" + id;

			}
		}

		function modificar(id){
			window.location = "index.php?idmodificar=" + id;
		}

		function cerrar_sesion()
		{
			if (confirm("¿Estas seguro de cerrar la sesion")) {
				window.location = "cerrar_sesion.php"
			}
		}
function validar()
	{
		var nombre = document.getElementById("txtnombre").value;
		var cantidad = document.getElementById("txtcantidad").value;
		var proveedor = document.getElementById("lstproveedores").value;

		if (nombre.trim().length<1) 
		{
			alert("El nombre del producto esta vacio");
			return false;
		}

		if (nombre.trim().length != nombre.length) 
		{
			alert("Tienes espacios de mas en el nombre");
			return false;
		}

		if (cantidad.trim().length<1) 
		{
			alert("La cantidad del producto esta vacia");
			return false;
		}

		if (proveedor.trim().length<1) 
		{
			alert("El proveedor esta vacios, seleccione alguno");
			return false;
		}


		return true;
	}

	    function verificar_producto(id) 
	    {
	    	$.getJSON("validaciones/verificar_producto.php?p=" + id).done(function(datos)
	    	{
	    		if (datos[0][0]>0) 
	    		{
                  alert("Producto ya existe, verifique");
	    		}
	    	});
	    } 

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

	</script>

</head>
<body>

	<?php 

	require 'bd/conexion_bd.php';

	$obj = new BD_PDO();

	if (isset($_POST['btnregistrar'])) 
{

		$nombre = $_POST['txtnombre'];
		$cantidad = $_POST['txtcantidad'];
		$proveedor = $_POST['lstproveedores'];
		$categorias = $_POST['lstcategoria'];

	if ($_POST['btnregistrar']=='Insertar'){
		$obj->Ejecutar_Instruccion("Insert into productos(Nombre,Cantidad,id_proveedor) values ('$nombre','$cantidad','$proveedor')");
		echo '<script>window.location = "index.php"; </script>';
	
    }
	elseif($_POST['btnregistrar']=='Guardar'){
		$idproducto = $_POST['txtid'];
        $obj->Ejecutar_Instruccion("Update productos set Nombre='$nombre', Cantidad='$cantidad', id_proveedor='$proveedor' where id_producto='$idproducto'");
	}

}

	elseif (isset($_GET['ideliminar'])) {

		$id = $_GET['ideliminar'];
		$obj->Ejecutar_Instruccion("Delete from productos where id_producto = '$id' ");
	}

	elseif (isset($_GET['idmodificar'])) {

		$id = $_GET['idmodificar'];
		$prod_mod = $obj->Ejecutar_Instruccion("Select * from productos where id_producto = '$id' ");
	}

	@$buscar = $_POST['txtbuscar'];
	$datos_buscar= $obj->Ejecutar_Instruccion("select productos.Id_producto,productos.Nombre,productos.Cantidad,concat (proveedores.Nombres,' ',proveedores.Apellido_p,' ',proveedores.Apellido_m) as proveedores FROM productos INNER JOIN proveedores ON productos.id_proveedor=proveedores.id_proveedor WHERE productos.Nombre LIKE '%$buscar%'");

	@$datos_proveedores = $obj->listado("Select id_proveedor, concat(Nombres,' ',Apellido_p,' ',Apellido_m) as Nombre from Proveedores","Select id_proveedor from productos where id_producto='".$_GET['idmodificar']."'");

	?>

<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container-fluid">
					<ul class="header-links pull-left">
					</ul>
					<ul class="header-links pull-right">
						<li><a href="inicio_de_sesion.php"><i class=" "></i> inicio de sesion</a></li>
						<li><a onclick="javascript: cerrar_sesion();" href="#"><i class="" ></i> Cerrar sesion</a></li>
					
				</div>
			</div>
			<!-- /TOP HEADER -->
		</header>
	<?php 
    
    if (@$_SESSION['Privilegio']=='Admin') 

    {

	?>

	

	<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Productos</h3>
					</div>
				</div>
				
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

<!-- SECTION -->
		<div class="section " >
			<!-- container -->
			<div class="container ">
				<!-- row -->
				<div class="row datos-cent">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Insertar Productos</h3>
								<br><br>

	<form action="index.php" method="post" id="frminsertar" onsubmit="return validar()" name="frminsertar" >
		
		<input type="hidden" id="txtid" name="txtid"  class="input" placeholder="Numero" value="<?php echo @$prod_mod[0][0] ?>">
		<div class="form-group">
		Nombre 
		<input type="text" id="txtnombre" name="txtnombre" class="input" placeholder="Nombre"  maxlength="30" minlength="4"onblur="javascript: verificar_producto(this.value)" value="<?php echo @$prod_mod[0][1] ?>">
		</div> 
		<div class="form-group">
		Cantidad 
		<input type="text" id="txtcantidad" name="txtcantidad" class="input" placeholder="Cantidad" maxlength="7" minlength="1"  onkeypress="return check(event)" value="<?php echo @$prod_mod[0][2] ?>">
		</div>
		 <div class="form-group">
		 Proveedor 
		<select name="lstproveedores" id="lstproveedores" class="input">
			
			<option value="">Seleccione Proveedor</option>
			<?php echo $datos_proveedores; ?>
		</select>
		</div>
		 <div class="form-group">
		 Categorias 
		<select name="lstcategoria" id="lstcategoria" class="input">
			
			<option value="">Seleccione Categoria</option>
			<?php echo $datos_proveedores; ?>
		</select>
		</div>
			<div class="container-fluid datos-cent">
		<input type="submit" id="btnregistrar" name="btnregistrar" class="btn btn-success" value="<?php 
	    if (isset($_GET['idmodificar'])){
	    	echo 'Guardar';
	       }
	    else {
	    	echo 'Insertar';
	    }?>">
	</div>

	</form>
</div>
</div>
</div>
</div>
</div>
</div>

	<?php } ?>



		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->

						<!-- Billing Details --> 
						<div class="col-md-6">
							<div class="header-search">
								<h1>Listado de Productos</h1>
<br><br>
	<form action="index.php" id="frmbuscar" name="frmbuscar" method="post">
    	<input type="text" id="txtbuscar" name="txtbuscar" placeholder="Buscar Producto" class="input">    
    	<input type="submit" id="btnbuscar" name="btnbuscar" value="Buscar" class="btn btn-primary">

    	</form>
    </div>
</div>
</div>
</div>

<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row datos-cent">

					<div class="col-md-12">
						<!-- Billing Details -->  

	<table border="1" class="table table-striped">
		<tr>
			<td>Num</td>
			<td>Nombre</td>
			<td>Cantidad</td>
			<td>Proveedor</td>
		</tr>

		<?php foreach ($datos_buscar as $renglon) { ?>
		<tr>
			<td> <?php echo $renglon[0]; ?> </td>
			<td> <?php echo $renglon[1]; ?> </td>
			<td> <?php echo $renglon[2]; ?> </td>
			<td> <?php echo $renglon[3]; ?> </td>
				<?php 
    if (@$_SESSION['Privilegio']=='Admin') 
    {
	?>

			<td><input type="button" id="btneliminar" name="btneliminar" class="btn btn-danger" value="Eliminar" onclick="javascript: eliminar('<?php echo $renglon[0];  ?>');"></td>
			<td><input type="button" id="btnmodificar" name="btnmodificar" class="btn btn-info" value="Modificar" onclick="javascript: modificar('<?php echo $renglon[0];  ?>');"></td>
		<?php } ?>

		</tr>
		<?php } ?>


	</table>
	</div>
                     <!-- /Billing Details -->
   				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
</body>
</html>