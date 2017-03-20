<?php

class Materias {

    private $con;
    private $materias;

    public function __construct() {
        require("conexion.php");
        $this->con = Conexion_Base::Conectar();
        $this->materias = array();
    }

    public function getMaterias() {

        $sql = "SELECT DISTINCT materias.nombre, materias.estado, materias.anio FROM materias INNER JOIN alumnos ON alumnos.id_carrera = materias.id_carrera";

        $consulta = $this->con->prepare($sql);
        $consulta->execute();

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->materias[] = $filas;
        }

        return $this->materias;
    }

}

?>