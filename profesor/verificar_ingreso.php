<?php

$dni = $_POST['dni'];
$pass = $_POST['pass'];



include("conexion.php");

//$sql = "SELECT * FROM profesor WHERE dni = '$dni' and password = '$pass' ";
$sql = "SELECT * FROM profesor WHERE dni = '$dni'";

$resultado = $conexionProfesor->prepare($sql);
$resultado->execute();

$fila = $resultado->fetch(PDO::FETCH_ASSOC);

$verificacion_pass = password_verify($pass, $fila['password']);


if ($verificacion_pass) {

    if ($dni == $fila['dni']) {
        session_start();
        $_SESSION['dni'] = $fila['dni'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellido'] = $fila['apellido'];
        $_SESSION['correo'] = $fila['correo'];
        $_SESSION['rol'] = $fila['rol'];
        $_SESSION['id_profesor'] = $fila['id_profesor'];

        header("location:panel_inicio.php");
    }
} else {
    header("location:../index.php?errorP=1");
}
?>