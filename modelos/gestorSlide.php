<?php

require_once "backoffice/modelos/conexion.php";

class SlideModels{

	static public function seleccionarSlideModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ruta, titulo, descripcion FROM $tabla ORDER BY orden ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}