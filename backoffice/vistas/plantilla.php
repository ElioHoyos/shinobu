<?php 

session_start();

$ruta = ControladorGeneral::ctrRuta();
$valorSuscripcion = ControladorGeneral::ctrValorSuscripcion();
$patrocinador = ControladorGeneral::ctrPatrocinador();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>

		window.location = "'.$ruta.'ingreso";

	</script>';

	return;

}

$item = "id_usuario";
$valor = $_SESSION["id"];

$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

?>


<!DOCTYPE html>

<html>

<head>

  	<meta charset="utf-8">

  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

  	<title>Academy Shinobo</title>

  	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--=====================================
	Vínculos CSS
	======================================-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

 	<!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  	<!-- Theme style -->
  	<link rel="stylesheet" href="vistas/css/plugins/adminlte.min.css">

  	<!-- overlayScrollbars -->
  	<link rel="stylesheet" href="vistas/css/plugins/OverlayScrollbars.min.css">

  	<!-- jdSlider -->
	<link rel="stylesheet" href="vistas/css/plugins/jdSlider.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="vistas/css/plugins/select2.min.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap.min.css">

  	<!-- estilo personalizado -->
  	<link rel="stylesheet" href="vistas/css/style.css">

	
	<link rel="stylesheet" href="vistas/layout/css/style.css">
	<!-- <link rel="stylesheet" href="vistas/layout/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="vistas/layout/css/font-awesome.min.css">
	<link rel="stylesheet" href="vistas/layout/css/fonts.css">
	<link rel="stylesheet" href="vistas/layout/css/Fancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="vistas/layout/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="vistas/layout/css/jquery-ui.min.css">

  	<!--=====================================
	Vínculos JS
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- AdminLTE App -->
	<script src="vistas/js/plugins/adminlte.min.js"></script>

	<!-- overlayScrollbars -->
	<script src="vistas/js/plugins/jquery.overlayScrollbars.min.js"></script>

	<!-- jdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="vistas/js/plugins/jdSlider.js"></script>

	<!-- Select2 -->	
	<!-- https://github.com/select2/select2 -->
	<script src="vistas/js/plugins/select2.full.min.js"></script>

	<!-- InputMask -->	
	<!-- https://github.com/RobinHerbots/Inputmask -->
	<script src="vistas/js/plugins/jquery.inputmask.js"></script>

	<!-- jSignature -->
	<!-- https://www.jqueryscript.net/other/Signature-Field-Plugin-jQuery-jSignature.html -->
	<script src="vistas/js/plugins/jSignature.js"></script>
	<script src="vistas/js/plugins/jSignature.CompressorSVG.js"></script>

	<!-- SWEET ALERT 2 -->	
	<!-- https://sweetalert2.github.io/ -->
	<script src="vistas/js/plugins/sweetalert2.all.js"></script>
	
	<!-- DataTables 
	https://datatables.net/-->
  	<script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
  	<script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="vistas/js/plugins/dataTables.responsive.min.js"></script>
  	<script src="vistas/js/plugins/responsive.bootstrap.min.js"></script>	




</head>

<body class="hold-transition sidebar-mini sidebar-collapse">

<div class="wrapper">

<?php 

include "paginas/modulos/header.php";

include "paginas/modulos/menu.php";

/*=============================================
Páginas del sitio
=============================================*/

if(isset($_GET["pagina"])){

	if( $_GET["pagina"] == "inicio" ||
		$_GET["pagina"] == "perfil" ||
		$_GET["pagina"] == "usuarios" ||
		$_GET["pagina"] == "noticias" ||
		$_GET["pagina"] == "galerias" ||
		$_GET["pagina"] == "slide" ||
		$_GET["pagina"] == "intructores" ||
		$_GET["pagina"] == "ingresos-uninivel" ||
		$_GET["pagina"] == "ingresos-binaria" ||
		$_GET["pagina"] == "ingresos-matriz" ||
		$_GET["pagina"] == "plan-compensacion" ||
		$_GET["pagina"] == "soporte" ||
		$_GET["pagina"] == "salir"){

		include "paginas/".$_GET["pagina"].".php";

	}

	else if( $_GET["pagina"] == "cuerpo-activo" ||
		$_GET["pagina"] == "mente-sana" ||
		$_GET["pagina"] == "espiritu-libre"){

		include "paginas/academia.php";
	}

	else{

		include "paginas/error404.php";
	}

}else{

	include "paginas/inicio.php";
}

include "paginas/modulos/footer.php";

?>
</div>


<script src="vistas/js/inicio.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/gestorSlide.js"></script>
<script src="vistas/js/gestorArticulos.js"></script>
<script src="vistas/js/instructores.js"></script>
<script src="vistas/js/gestorGaleria.js"></script>
<script src="vistas/layout/js/script.js"></script>
<script src="vistas/layout/js/jquery-2.2.0.min.js"></script>
<script src="vistas/layout/js/bootstrap.min.js"></script>
<script src="vistas/layout/js/jquery.fancybox.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


</body>

</html>