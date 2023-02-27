<?php 

session_start();

?>

<?php 

	require '../modelos/modelo-inicio.php';

    $obj = new inicio();

    if (isset($_POST['btniniciar'])) {
        $usuario = $_POST['txtusuario'];
        $contrasena = $_POST['txtcontrasena'];
    	$datos = $obj->sesion($usuario, $contrasena );

    	if (@$datos[0][0]>0) {
    		echo "<script>alert('Bienvenido')</script>";
    		$_SESSION['id_usuario'] = $datos[0][0];
    		$_SESSION['Nombre'] = $datos[0][1].''.$datos[0][2];
    		$_SESSION['Usuario'] = $datos[0][3];
    		$_SESSION['Privilegio'] = $datos[0][4];

    		echo '<script>window.location = "../index.php"; </script>';
    	}
    	else{
    		echo "<script>alert('Correo incorrecto o Contraseña incorrecta')</script>";
    	}
    }
    require '../vistas/vista-inicio-sesion.php';

	?>