<?php
session_start();
$pass_actual = $_POST['pass_actual'];
$pass_nueva = $_POST['pass_nueva'];
$dni = $_SESSION['dni'];

$pas_codificada = password_hash($pass_nueva, PASSWORD_DEFAULT);


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
        global $pas_codificada;
        
        
        
        $query1= "SELECT password FROM alumnos WHERE dni = '$dni'";
        $consulta = $this->conexion->prepare($query1);
        $consulta->execute();
        
        
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        $verifica_pass = password_verify($pass_actual, $resultado['password']);
        
        if($verifica_pass){
         
            $query2 = "UPDATE alumnos SET password = '$pas_codificada' WHERE dni = :DNI";
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