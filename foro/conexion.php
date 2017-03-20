<?php

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
?>
