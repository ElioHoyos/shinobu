<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/general.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/gestorArticulos.php";
require_once "controladores/gestorGaleria.php";
require_once "controladores/gestorSlide.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/gestorArticulos.php";
require_once "modelos/gestorGaleria.php";
require_once "modelos/gestorSlide.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();