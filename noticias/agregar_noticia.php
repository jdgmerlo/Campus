<?php
session_start();
$noticia = $_POST['mensaje'];
$carrera = $_GET['carrera'];
$carr = strtolower($carrera);
$id = $_SESSION['id_profesor'];


$db_name = "root";
$db_pass = "";

try {

    $conexion = new PDO("mysql:host=localhost;dbname=campus", $db_name, $db_pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}

$query = "INSERT INTO sistemas (noticia, id_profesor) VALUES (:NOTICIA, :ID)";
$con = $conexion->prepare($query);
$con->bindParam(":NOTICIA",$noticia);
$con->bindParam(":ID", $id);
$con->execute();

header("location:panel_principal_profesor.php");
?>