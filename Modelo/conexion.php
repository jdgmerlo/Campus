<?php

class Conexion_Base extends PDO {

    public static function Conectar() {

        try {
            $con = new PDO("mysql:host=localhost;dbname=campus", "root", "");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec("SET CHARACTER SET UTF8");
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo $ex->getLine();
        }
        return $con;
    }

}
?>

