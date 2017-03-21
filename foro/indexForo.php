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
                <?php
                include("../foro/conexion.php");


                $tamanio_paginas = 10;


                if (isset($_GET['pagina'])) {
                    if ($_GET['pagina'] == 1) {
                        header("location:indexForo.php");
                    } else {
                        $pagina = $_GET['pagina'];
                    }
                } else {
                    $pagina = 1;
                }


                $empezar_desde = ($pagina - 1) * $tamanio_paginas;

                $sql_total = "SELECT * FROM foroSistemas WHERE identificador = 0 ORDER BY fecha DESC";

                $consulta = $conexion->prepare($sql_total);
                $consulta->execute();

                $num_filas = $consulta->rowCount();
                $total_paginas = ceil($num_filas / $tamanio_paginas);

                $sql_limite = "SELECT * FROM foroSistemas WHERE identificador = 0 ORDER BY fecha DESC LIMIT $empezar_desde, $tamanio_paginas";
                $consulta = $conexion->prepare($sql_limite);
                $consulta->execute();

                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>";
                echo "</th>";
                echo "<th>";
                echo "<strong>TEMA</strong>";
                echo "</th>";
                echo "<th>";
                echo "<strong>FECHA</strong>";
                echo "</th>";
                echo "<th>";
                echo "<strong>RESPUESTA</strong>";
                echo "</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $id = $fila['id'];
                    $titulo = $fila['titulo'];
                    $fecha = $fila['fecha'];
                    $respuestas = $fila['respuestas'];

                    echo "<tr>";
                    echo "<td><a href='../foro/foro.php?id=$id'>ver</a></td>";
                    echo "<td>$titulo</td>";
                    //echo "<td>" . date("d-m-y,$fecha") . "</td>";
                    echo "<td>$fecha</td>";
                    echo "<td>$respuestas</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
                </table>
                <br />
                <?php
                echo "<nav aria-label = 'Page navigation'>";
                echo "<ul class = 'pagination'>";
                echo "<li>";

                echo "<span aria-hidden = 'true'>&laquo;";
                echo "</span>";
                echo "</a>";
                echo "</li>";
                for ($i = 1; $i <= $total_paginas; $i++) {
                    //echo "<a href='indexForo.php?pagina=" . $i . "'>" . $i . "</a>";
                    echo "<li><a href = 'indexForo.php?pagina=" . $i . "'>" . $i . "</a></li>";
                }
                echo "<li>";

                echo "<span aria-hidden = 'true'>&raquo;";
                echo "</span>";
                echo "</a>";
                echo "</li>";
                echo "</ul>";
                echo "</nav>";
                ?>
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
