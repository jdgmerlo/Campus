<?php
require("../Modelo/materias_modelo.php");

$cantMaterias = new Materias();
$mat = $cantMaterias->getMaterias();

require("../Vista/materias_vista.php");

?>