<?php

require_once "conexion.php";

class ModeloSoporte {
    static public function mdlMostrarSoportes() {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM soporte");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id){
        echo "ID a eliminar: " . $id; 
        $stmt = Conexion::conectar()->prepare("DELETE FROM soporte WHERE id_soporte = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        echo "Resultado de la eliminación: " . ($result ? "Éxito" : "Fallo"); 
        return $result;
    }  

}
