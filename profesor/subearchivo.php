<?php

$carrera = $_POST['seleccionCarrera'];

$ruta = "../archivos/$carrera/";



//datos del arhivo 
$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];


$archivo = fopen("$ruta/link.dat", "a+") or die("Error");
fputs($archivo,$nombre_archivo . "\n");
fclose($archivo);



//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "jpeg") ) && ($tamano_archivo < 10000000))) {
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf o .jpg<br><li>se permiten archivos de 10 Mb máximo.</td></tr></table>";
} else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $ruta . $nombre_archivo)) {
        echo "El archivo ha sido cargado correctamente.";
        header("location:panel_inicio.php");
    } else {
        echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
    }
}
?>