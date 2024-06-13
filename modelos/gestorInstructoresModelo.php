<?php

require_once "backoffice/modelos/conexion.php";

class InstructoresModel{

	static public function seleccionarInstructoresModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, ruta FROM $tabla ORDER BY orden ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}