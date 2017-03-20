<?php

$dni = $_POST['dni'];
$pass = $_POST['pass'];

class Validar_Persona {

    private $persona;
    private $con;

    public function __construct() {
        require ("conexion.php");
        $this->con = Conexion_Base::Conectar();
        $this->persona = array();
    }

    public function Validar() {

        global $dni;
        global $pass;

        $sql = "SELECT * FROM alumnos WHERE dni = :DNI and password = :PASS";
        
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(":DNI", $dni);
        $consulta->bindParam(":PASS", $pass);
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        //CONSULTA INNER JOIN PARA SELECCIONAR LA CARRERA DEL ALUMNO
        $sql2 = "SELECT carreras.nombre FROM carreras INNER JOIN alumnos ON carreras.id_carrera = alumnos.id_carrera";
        $consulta2 = $this->con->prepare($sql2);
        //$consulta2->bindParam(":RE", $resultado['id_carrera']);
        $consulta2->execute();
        
        $resultado2 = $consulta2->fetch(PDO::FETCH_ASSOC);
        
        
        
        if ($resultado['dni'] == $dni and $resultado['password'] == $pass) {
            session_start();
            $_SESSION['dni'] = $resultado['dni'];
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['apellido'] = $resultado['apellido'];
            $_SESSION['legajo'] = $resultado['legajo'];
            $_SESSION['correo'] = $resultado['correo'];
            $_SESSION['carrera'] = $resultado2['nombre'];
            $_SESSION['rol'] = $resultado['rol'];
           // $this->persona[0] = $resultado['dni'];
           // $this->persona[2] = $resultado['nombre'];
           // $this->persona[3] = $resultado['apellido'];
           // $this->persona[4] = $resultado['legajo'];
           // $this->persona[5] = $resultado['correo'];
           // $this->persona[6] = $resultado['carrera'];
        }

        //return $this->persona;
    }

}
?>

