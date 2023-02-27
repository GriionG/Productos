<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Inicio de Sesion</title>

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
        <link type="text/css" rel="stylesheet" href="../css/style1.css"/>

<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js%22%3E"></script>

            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //fonts -->
    <!-- Font-Awesome-File -->
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" media="all">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min/js"></script>

<script>
      function validar()
    {
        var usuario = document.getElementById("txtusuario").value;
        var pass = document.getElementById("txtcontrasena").value;

        if (usuario.trim().length<1) 
        {
            alert("El Correo Del Usuario Esta Vacio");
            return false;
        }

        if (nombre.trim().length != nombre.length) 
        {
            alert("Tienes espacios de mas en el nombre");
            return false;
        }

        if (pass.trim().length<1) 
        {
            alert("La Contraseña Del Usuario Esta Vacia");
            return false;
        }


        return true;
    }

function validateEmail(){
                
    // Get our input reference.
    var emailField = document.getElementById('txtusuario');
    
    // Define our regular expression.
    var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    // Using test we can check if the text match the pattern
    if( validEmail.test(emailField.value) ){
        return true;
    }else{
        alert('El correo es invalido');
        return false;
    }
} 

function validaPass(){
    var pass = document.getElementById('txtcontrasena');

    var  validPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/  ;

    if( validPass.test(pass.value) ){
        return true;
    }else if (pass.length < 8) {
        alert('La contraseña debe de tener al menos 8 caracteres');
        return false;
    }else{
        alert('La contraseña debe de tener al menos una mayuscula, una minuscula, un numero y al menos 8 caracteres');
        return false;
    }

}

function mostrar(){
    var pass = document.getElementById('txtcontrasena');
    if (pass.type==="password") {
        pass.type="text";
    }else{
        pass.type="password";
    }
}

</script>
	
    <header>
            <!-- TOP HEADER -->
            <div id="top-header">
                <div class="container-fluid">
                    <ul class="header-links pull-left">
                    </ul>
                    <ul class="header-links pull-right">
                        <li><a href="../index.php"><i class=" "></i> Inicio</a></li>
                </div>
            </div>
            <!-- /TOP HEADER -->
        </header>

        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="breadcrumb-header">Inicio de Sesion</h3>
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
                                <h3 class="title">Usuario</h3>
                                <br><br>

     <form action="../controladores/controlador-inicio.php" method="post" onsubmit="return validar()">
        <div class="form-group">
     	<input type="email" name="txtusuario" id="txtusuario" class="input" maxlength="50" minlength="4" placeholder="Correo" onblur="javascript: validateEmail(this.value)">
     </div>
     <div class="form-group">
     	<input type="password" name="txtcontrasena" id="txtcontrasena" class="input" maxlength="50" minlength="4" placeholder="Contraseña">
        <input type="checkbox" name="cajita" onclick="mostrar()"> Ver Contraseña
        <br><br>
        <a href="../registro.php"><label for="tab-1">No tienes cuenta?</a></label>
     </div>
     <div class="container-fluid datos-cent">
     	<input type="submit" name="btniniciar" id="btniniciar" class="btn btn-success" value="Iniciar">
     </div>
     	
     </form>
 </div>
</div>
</div>
</div>
</div>
</body>
</html>