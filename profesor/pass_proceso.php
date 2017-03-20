<?php
session_start();
$passActual = $_POST['pass_actual'];
$passNueva = $_POST['pass_nueva'];

require("conexion.php");

$query = "SELECT password FROM profesor WHERE dni = :DNI";
$consulta = $conexionProfesor->prepare($query);
$consulta->bindParam(":DNI", $_SESSION['dni']);
$consulta->execute();

$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

if ($resultado['password'] == $passActual) {

    $query2 = "UPDATE profesor SET password = :PASS";
    $consulta2 = $conexionProfesor->prepare($query2);
    $consulta2->bindParam(":PASS", $passNueva);
    $consulta2->execute();

    header("location:panel_inicio.php?var=7");
} else {
    header("location:panel_inicio.php?error=9");
}
?>
