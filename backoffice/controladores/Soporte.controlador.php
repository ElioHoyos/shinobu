<?php
class ControladorSoporte {
    private $model;
    public function __construct()
    {
        require_once "modelos/Soporte.modelo.php";
        $this->model = new ModeloSoporte();
    }
    public function ctrMostrarSoportes() {
        return ModeloSoporte::mdlMostrarSoportes();
    }
    public function delete($id){
        echo "Eliminando registro con ID: " . $id; 
        if ($this->model->delete($id)) {
            echo "Registro eliminado correctamente"; 
            header("Location: index.php");
        } else {
            echo "Error al eliminar el registro"; 
            header("Location: show.php?id=".$id);
        }
        exit(); 
    }
    public function obtenerCantidadSoportes() {
        $resultados = ModeloSoporte::mdlMostrarSoportes();
        $cantidad = count($resultados);
        return $cantidad;
    }
}
?>
