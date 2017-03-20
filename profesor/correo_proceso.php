<?php
session_start();
$correo = $_POST['correo'];

require("conexion.php");

$query = "UPDATE profesor SET correo = :CORREO WHERE dni = :DNI";

$consulta = $conexionProfesor->prepare($query);
$consulta->bindParam(":CORREO",$correo);
$consulta->bindParam(":DNI", $_SESSION['dni']);
$consulta->execute();
    
    
header("location:panel_inicio.php");


?>