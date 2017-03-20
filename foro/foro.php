<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['nombre'])) {
    echo "INICIA SESION";
    header("location:../index.php?error=1");
} else {
    //session_start();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Campus Virtual</title>
        <link rel="stylesheet" href="../estilos/estilos.css"  />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-30858985-1']);
            _gaq.push(['_trackPageview']);
            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
    <body>

        <?php include("../header.php"); ?>


        <div class="row">
            <div class="col-md-2">
                <?php include("../barra_navegacion.php"); ?>
            </div>
            <div class="col-md-8">
                <h3><span class="label label-default">Foro De Sistemas</span></h3>
                <br />
                <a href='../foro/formulario.php'>Nuevo Tema</a>
                <br />
                <br />

                <?php
                include("../foro/conexion.php");

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }

                $sql = "SELECT * FROM foroSistemas WHERE id = $id ORDER BY fecha DESC";

                $con = $conexion->prepare($sql);
                $con->execute();

                echo "<table class='table table-bordered'>";
                echo "<tr>";
                echo "<td>";
                echo "<strong>TITULO</strong>";
                echo "</td>";
                echo "<td>";
                echo "<strong>AUTOR</strong>";
                echo "</td>";
                echo "<td>";
                echo "<strong>MENSAJE</strong>";
                echo "</td>";
                echo "</tr>";

                while ($resultado = $con->fetch(PDO::FETCH_ASSOC)) {

                    $id = $resultado['id'];
                    $titulo = $resultado['titulo'];
                    $autor = $resultado['autor'];
                    $mensaje = $resultado['mensaje'];
                    $fecha = $resultado['fecha'];
                    $respuestas = $resultado['respuestas'];


                    echo "<tr>";
                    //echo "<td><a href='../foro/foro.php?id=$id'>ver</a></td>";
                    echo "<td>$titulo</td>";
                    echo "<td>" . $autor . "</td>";
                    echo "<td>$mensaje</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br /><br /><a href='../foro/formulario.php?id&respuestas=$respuestas&identificador=$id'><strong>Responder</strong></a><br />";

                echo "<hr />";
                echo "<br /><h5><span class='label label-default'>Respuestas</span></h5><br /><br />";
                $sql2 = "SELECT * FROM  foroSistemas WHERE identificador = '$id' ORDER BY fecha DESC";
                $con2 = $conexion->prepare($sql2);
                $con2->execute();





                while ($fila2 = $con2->fetch(PDO::FETCH_ASSOC)) {
                    $id = $fila2['id'];
                    $titulo = $fila2['titulo'];
                    $autor = $fila2['autor'];
                    $mensaje = $fila2['mensaje'];
                    $fecha = $fila2['fecha'];
                    $respuestas = $fila2['respuestas'];
                    echo "<div class='bg-primary'>";
                    echo "<tr><td>$titulo</tr></td>";
                    echo "<table class='table'>";
                    echo "<tr><td><strong>Autor :</strong> $autor</td></tr>";
                    echo "<tr><td>$mensaje</td></tr>";
                    echo "</table>";
                    echo "</div>";

                    //echo "<br /><br /><a href='../foro/formulario.php?id&respuestas=$respuestas&identificador=$id'><strong>Responder</strong></a><br />";
                }
                ?>

                <br />
                <br />

            </div>
            <div class="col-md-2">
                <strong>VACIO</strong>
            </div>
        </div>

        <?php include("../footer.php") ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
