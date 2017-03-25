<?php

session_start();
$passActual = $_POST['pass_actual'];
$passNueva = $_POST['pass_nueva'];
$dni = $_SESSION['dni'];

$pass_codd = password_hash($passNueva, PASSWORD_DEFAULT);

require("conexion.php");

$query = "SELECT dni, password FROM profesor WHERE dni = '$dni'";
$consulta = $conexionProfesor->prepare($query);

$consulta->execute();

$resultado = $consulta->fetch(PDO::FETCH_ASSOC);


$ver_pass = password_verify($passActual, $resultado['password']);

if ($ver_pass) {

    $query2 = "UPDATE profesor SET password = '$pass_codd' WHERE dni = :DNI";
    $consulta2 = $conexionProfesor->prepare($query2);
    $consulta2->bindParam(":DNI", $dni);
    $consulta2->execute();

    header("location:panel_inicio.php?var=7");
} else {
    header("location:panel_inicio.php?error=9");
}
?>
