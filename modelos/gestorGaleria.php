<?php

require_once "backoffice/modelos/conexion.php";

class GaleriaModels{

	public static function seleccionarGaleriaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ruta FROM $tabla ORDER BY orden ASC");
	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
}