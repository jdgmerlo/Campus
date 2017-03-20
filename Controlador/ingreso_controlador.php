<?php
require ("../Modelo/validar_persona_modelo.php");

$resultado = new Validar_Persona();

$r = $resultado->Validar();

require("../Vista/alumno_panel_vista.php");

?>