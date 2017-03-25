<?php

include("PHPMailer/class.phpmailer.php");
include("PHPMailer/class.smtp.php");

$dni = $_POST['dni'];
$rol = $_POST['rol'];

$generador_pass = rand(0000, 9999);
$pass_codificada = password_hash($generador_pass, PASSWORD_DEFAULT);

try {
    $conexion = new PDO("mysql:host=localhost;dbname=campus", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}


$sql = "SELECT dni,correo, password FROM alumnos WHERE dni = '$dni'";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$fila = $consulta->fetch(PDO::FETCH_ASSOC);

$dniRecuperado = $fila['dni'];

if ($dniRecuperado == $dni) {
    // $passR = $fila['password'];
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl"; //ssl
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; //465
    $mail->Username = "jdgmerlo@gmail.com";
    $mail->Password = "cristorey777";

    $mail->From = "cr.ezequiel24@gmail.com";
    $mail->FromName = "Plataforma Interactiva";
    $mail->Subject = "Recuperar Contraseña";
//$mail->AltBody = "Para Completar Su Registro Debe Acceder Al Siguiente Enlace.";
    $mail->msgHTML("La Contraseña Actual Es: $generador_pass , Para Mas Seguridad Modificala Al Ingresar A Tu Cuenta. ");

    $mail->AddAddress($fila['correo'], "Destinatario");
    $mail->IsHTML(true);


    $sql2 = "UPDATE $rol SET password = '$pass_codificada' WHERE dni = $dni ";
    $agregar = $conexion->prepare($sql2);
    $agregar->execute();


    if (!$mail->Send()) {
        echo "Error: " . $mail->ErrorInfo;
    } else {
        header("location:index.php?cambioPass=1");
        die();
    }
} else {
    header("location:index.php?correo_error=1");
}
?>