<?php

include("PHPMailer/class.phpmailer.php");
include("PHPMailer/class.smtp.php");

$dni = $_POST['dni'];


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
    $passR = $fila['password'];
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
    $mail->msgHTML("La Contraseña Actual Es: $passR");

    $mail->AddAddress($fila['correo'], "Destinatario");
    $mail->IsHTML(true);

    if (!$mail->Send()) {
        echo "Error: " . $mail->ErrorInfo;
    } else {
        header("location:index.php");
        die();
    }
} else {
    header("location:index.php?correo_error=1");
}
?>