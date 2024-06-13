<?php
require_once "../controladores/conexion.php";

class Guardar extends Conexion {
    public function registro() {
        // Validar y convertir la fecha
        $userInputDate = $_POST["fechaNac"];
        $formats = ['d-m-Y', 'd/m/Y', 'm-d-Y', 'm/d/Y', 'Y-m-d'];
        $validDate = null;

        foreach ($formats as $format) {
            $date = DateTime::createFromFormat($format, $userInputDate);
            if ($date && $date->format($format) === $userInputDate) {
                $validDate = $date->format('Y-m-d');
                break;
            }
        }

        // Verificar si la fecha es válida
        if (!$validDate) {
            return "error";
        }
        $guard = Conexion::conectar()->prepare("INSERT INTO soporte(nombres, telefono, tipo, fechaNac, Documento, genero, Nivel, mensaje, estado) VALUES (:nombres, :telefono, :tipo, :fechaNac, :Documento, :genero, :Nivel, :mensaje, 1)");
        $guard->bindParam(":nombres", $_POST["nombres"], PDO::PARAM_STR);
        $guard->bindParam(":telefono", $_POST["telefono"], PDO::PARAM_STR);
        $guard->bindParam(":tipo", $_POST["tipo"], PDO::PARAM_STR);
        $guard->bindParam(":fechaNac", $validDate, PDO::PARAM_STR); 
        $guard->bindParam(":Documento", $_POST["Documento"], PDO::PARAM_STR);
        $guard->bindParam(":genero", $_POST["genero"], PDO::PARAM_STR);
        $guard->bindParam(":Nivel", $_POST["Nivel"], PDO::PARAM_STR);
        $guard->bindParam(":mensaje", $_POST["mensaje"], PDO::PARAM_STR); 

        if ($guard->execute()) {
            return "success";
        } else {
            return "error";
        }
    }
}

$hola = new Guardar;
$resultado = $hola->registro();

if ($resultado === "success") {
    header('Location: ../index.php?enviar=ok');
} else {
    header('Location: ../index.php?enviar=error');
}
exit;
?>
