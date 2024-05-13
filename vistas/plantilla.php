<?php

session_start();
$ruta = ControladorRuta::ctrRuta(); 

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Dojo - Creative HTML Template">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">

    <script src="vistas/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script><link rel="shortcut icon" href="vistas/img/demo-content/logo1.png" >
    <link rel="apple-touch-icon" href="vistas/img/favicon.png">

    <title>Shinobu Academy</title>

    <link rel="stylesheet" type="text/css" href="vistas/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/style.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/motive.css">


    <script src="vistas/js/modernizr.custom.js"></script>
</head>

<body class="cssAnimate ct-onepage">


<div class="ct-menuMobile">
    <ul class="ct-menuMobile-navbar">
        <li class="onepage"><a href="#home">Home</a></li>
        <li class="onepage"><a href="#testimonials">Testimonials</a></li>
        <li class="onepage"><a href="#trainers">Trainers</a></li>
        <li class="onepage"><a href="#calendars">Calendar</a></li>
        <li class="onepage"><a href="#callToAction">Call To Action</a></li>
        <li class="onepage"><a href="#services">Services</a></li>
        <li class="onepage"><a href="#gallery">Gallery</a></li>
        <li class="onepage"><a href="#map">Map</a></li>
    </ul>
</div>

<div class="navbar-block navbar-right toggleButton">
    <div class="navbar-block-inner">
        <div id="nav-icon" class="nav-icon--right">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>


<div id="ct-js-wrapper" class="ct-pageWrapper">
<?php 

if(isset($_GET["pagina"])){

	/*=============================================
	Validar correo electrónico
	=============================================*/

	$item = "email_encriptado";
	$valor = $_GET["pagina"];

	$validarCorreo = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

	if($validarCorreo["email_encriptado"] == $_GET["pagina"]){
		$id = $validarCorreo["id_usuario"];
		$item = "verificacion";
		$valor = 1;

		$respuesta = ControladorUsuarios::ctrActualizarUsuario($id, $item, $valor);

		if($respuesta == "ok"){

			echo'<script>

					swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡Su cuenta ha sido verificada, ya puede ingresar al sistema!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    window.location = "'.$ruta.'ingreso"
							  } 
					});

				</script>';

			return;

		}
	
	}
	

	if( $_GET["pagina"] == "inicio"){

		include "paginas/inicio.php";

	}

	if( $_GET["pagina"] == "ingreso"){

		if(isset($_POST["idioma"])){

			if($_POST["idioma"] == "es"){

				include "paginas/ingreso.php";
			
			}else{

				include "paginas/ingreso_en.php";
			}

		}else{

			include "paginas/ingreso.php";
		
		}

	}

	if( $_GET["pagina"] == "registro"){

		if(isset($_POST["idioma"])){

			if($_POST["idioma"] == "es"){

				include "paginas/registro.php";
			
			}else{

				include "paginas/registro_en.php";
			}

		}else{

			include "paginas/registro.php";
		
		}

	}

}else{

	include "paginas/inicio.php";

}



 ?>
</div>

<a href="#" class="ct-js-btnScrollUp"><span><i class="fa fa-angle-up"></i></span></a>

<!-- JavaScripts -->

<script id="googleMap" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry"></script>
<script src="vistas/js/dojo.min.js"></script>
<script src="vistas/js/main.js"></script>
<script src="vistas/js/onepager/jquery.pagescroller.lite.js"></script>
<script src="vistas/js/onepager/init.js"></script>
<script src="vistas/js/zoom.js"></script>
<!-- switcher -->
<script src="vistas/js/demo.js"></script>

<div id="fullScreenContainer"></div>
<!-- end switcher -->



</body>
</html>




