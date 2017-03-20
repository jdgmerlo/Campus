<?php

$db_name = "root";
$db_pass = "";

try {

    $conexionProfesor = new PDO("mysql:host=localhost;dbname=campus", $db_name, $db_pass);
    $conexionProfesor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexionProfesor->exec("SET CHARACTER SET UTF8");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}


?>
