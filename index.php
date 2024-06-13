<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";
require_once "controladores/gestorArticulos.php";
require_once "controladores/gestorGaleria.php";
require_once "controladores/gestorSlide.php";

require_once "controladores/gestorInstructoresControlador.php";

require_once "backoffice/controladores/usuarios.controlador.php";
require_once "backoffice/modelos/usuarios.modelo.php";
require_once "modelos/gestorArticulos.php";
require_once "modelos/gestorGaleria.php";
require_once "modelos/gestorSlide.php";

require_once "modelos/gestorInstructoresModelo.php";

// https://github.com/PHPMailer/PHPMailer
require_once "backoffice/extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();