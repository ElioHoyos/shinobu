<?php

class GestorSlide{

	#MOSTRAR IMAGEN SLIDE AJAX
	#------------------------------------------------------------

	static public function mostrarImagenController($datos){

		#getimagesize - Obtiene el tamaño de una imagen

		#LIST(): Al igual que array(), no es realmente una función, es un constructor del lenguaje. list() se utiliza para asignar una lista de variables en una sola operación.

		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
		
		if($ancho < 1600 || $alto < 600){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);

			$ruta = "../vistas/img/slide/slide".$aleatorio.".jpg";

			#imagecreatefromjpeg — Crea una nueva imagen a partir de un fichero o de una URL

			$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

			#imagecrop() — Recorta una imagen usando las coordenadas, el tamaño, x, y, ancho y alto dados

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>600]);

			#imagejpeg() — Exportar la imagen al navegador o a un fichero

			imagejpeg($destino, $ruta);

			GestorSlideModel::subirImagenSlideModel($ruta, "slide");

			$respuesta = GestorSlideModel::mostrarImagenSlideModel($ruta, "slide");

			$enviarDatos = array("ruta"=>$respuesta["ruta"],
				                 "titulo"=>$respuesta["titulo"],
				                 "descripcion"=>$respuesta["descripcion"]);

			echo json_encode($enviarDatos);
		}

	}

	#MOSTRAR IMAGENES EN LA VISTA
	#------------------------------------------------------------

	static public function mostrarImagenVistaController(){

		$respuesta = GestorSLideModel::mostrarImagenVistaModel("slide");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueSlide"><span class="fa fa-times eliminarSlide" ruta="'.$item["ruta"].'"></span><img src="vis'.substr($item["ruta"], 6).'" class="handleImg"></li>';

		}

	}

	#MOSTRAR IMAGENES EN EL EDITOR
	#------------------------------------------------------------

	static public function editorSlideController(){

		$respuesta = GestorSLideModel::mostrarImagenVistaModel("slide");

		foreach($respuesta as $row => $item){

			echo '<li id="item'.$item["id"].'">
					<span class="fa fa-pencil editarSlide" style="background:blue"></span>
					<img src="vis'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["descripcion"].'</p>
				</li>';

		}

	}

	#ELIMINAR ITEM DEL SLIDE
	#-----------------------------------------------------------
	static public function eliminarSlideController($datos){

		$respuesta = GestorSlideModel::eliminarSlideModel($datos, "slide");

		unlink($datos["rutaSlide"]);

		echo $respuesta;

	}

	#ACTUALIZAR ITEM DEL SLIDE
	#-----------------------------------------------------------

	static public function actualizarSlideController($datos){

		GestorSlideModel::actualizarSlideModel($datos, "slide");
		$respuesta = GestorSlideModel::seleccionarActualizacionSlideModel($datos, "slide");

		$enviarDatos = array("titulo"=>$respuesta["titulo"],
			                 "descripcion"=>$respuesta["descripcion"]);
		
		echo json_encode($enviarDatos);
	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	static public function actualizarOrdenController($datos){

		GestorSlideModel::actualizarOrdenModel($datos, "slide");

		$respuesta = GestorSlideModel::seleccionarOrdenModel("slide");

		foreach($respuesta as $row => $item){

			echo'<li id="item'.$item["id"].'">
			     <span class="fa fa-pencil editarSlide" style="background:blue"></span>
			     <img src="vis'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
			     <h1>'.$item["titulo"].'</h1>
			     <p>'.$item["descripcion"].'</p>
			     </li>';

		}




	}

}