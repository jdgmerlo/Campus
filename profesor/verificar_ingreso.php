<?php

$dni = $_POST['dni'];
$pass = $_POST['pass'];

include("conexion.php");

$sql = "SELECT * FROM profesor WHERE dni = '$dni' and password = '$pass' ";

$resultado = $conexionProfesor->prepare($sql);
$resultado->execute();

$fila = $resultado->fetch(PDO::FETCH_ASSOC);

if ($dni == $fila['dni'] && $pass == $fila['password']) {
    session_start();
    $_SESSION['dni'] = $fila['dni'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['apellido'] = $fila['apellido'];
    $_SESSION['correo'] = $fila['correo'];
    $_SESSION['rol'] = $fila['rol'];

    header("location:panel_inicio.php");
} else {
    header("location:../index.php?errorP=1");
}
?>