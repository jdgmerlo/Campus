<?php

class MisDatos {

    private $con;

    public function __construct() {
        require("conexion.php");
        $this->con = Conexion_Base::Conectar();
    }

    public function getDatos() {
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td><strong>D.N.I: </td></strong>";
        echo "<td>" . $_SESSION['dni'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Nombre: </strong></td>";
        echo "<td>" . $_SESSION['nombre'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Apellido: </strong></td>";
        echo "<td>" . $_SESSION['apellido'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Legajo: </strong></td>";
        echo "<td>" . $_SESSION['legajo'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Correo: </strong></td>";
        echo "<td>" . $_SESSION['correo'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Carrera: </strong></td>";
        echo "<td>" . $_SESSION['carrera'] . "</td>";
        echo "</tr>";
        echo "</table>";
    }

}

?>