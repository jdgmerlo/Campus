<?php
session_start();
$pass_actual = $_POST['pass_actual'];
$pass_nueva = $_POST['pass_nueva'];
$dni = $_SESSION['dni'];

class Modificar_Pass{
    
    private $conexion;
    
    
    
    public function __construct() {
        require("conexion.php");
        $this->conexion = Conexion_Base::Conectar();
    }


    public function Cambiar_pass(){
        
        global $pass_actual;
        global $pass_nueva;
        global $dni;
        
        
        
        $query1= "SELECT password FROM alumnos WHERE dni = '$dni'";
        $consulta = $this->conexion->prepare($query1);
        $consulta->execute();
        
        
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);


        if($resultado['password'] == $pass_actual){
          
            
            
            $query2 = "UPDATE alumnos SET password = '$pass_nueva' WHERE dni = :DNI";
            $consulta2 = $this->conexion->prepare($query2);
            $consulta2->bindParam(":DNI", $_SESSION['dni']);
            $consulta2->execute();
            header("location:../Controlador/modificar_pass_controlador.php");
            
        }
        else{
           
            header("location:../Controlador/modificar_datos_controlador.php?error=2");
        }
        
        
        
    }
    
    
}

$cambiar = new Modificar_Pass;

$nueva = $cambiar->Cambiar_pass();


?>