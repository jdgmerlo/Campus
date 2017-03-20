<?php

session_start();
$correo = $_POST['correo'];

class Modificar {

    private $con;

    public function __construct() {
        require("conexion.php");
        $this->con = Conexion_Base::Conectar();
    }

    public function Mod() {

        
        global $correo;

        $sql = "UPDATE alumnos SET correo = :CORREO WHERE dni = :DNI";

        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(":CORREO", $correo);
        $consulta->bindParam(":DNI", $_SESSION['dni']);
        $consulta->execute();
    }

}

$mod = new Modificar();
$mod->Mod();
header("location:../Controlador/mis_datos_controlador.php");
?>

