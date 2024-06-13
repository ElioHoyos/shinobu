<?php

require_once "../controladores/gestorInstructoresControlador.php";
require_once "../modelos/gestorInstructoresModel.php";


#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL ARTICULO
	#----------------------------------------------------------
	
	public $imagenTemporal;

	public function gestorInstructorAjax(){

		$datos = $this->imagenTemporal;

		$respuesta = GestorInstructor::mostrarImagenController($datos);

		echo $respuesta;

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenArticulos;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){	

		$datos = array("ordenArticulos" => $this->actualizarOrdenArticulos,
			           "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorInstructor::actualizarInstructorController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorInstructorAjax();

}

if(isset($_POST["actualizarOrdenArticulos"])){

	$b = new Ajax();
	$b -> actualizarOrdenArticulos = $_POST["actualizarOrdenArticulos"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}