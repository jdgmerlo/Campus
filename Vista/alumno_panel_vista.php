<!DOCTYPE html>
<?php
//session_start();
if (empty($_SESSION['nombre'])) {
    echo "INICIA SESION";
    header("location:../index.php?error=1");
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


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script>
            $(document).ready(function ()
            {
                $("#mostrarmodal").modal("show");
            });
        </script>

    </head>
    <body>

        <?php include("../header.php"); ?>


        <div class="row">
            <div class="col-md-2">
                <?php include("../barra_navegacion.php"); ?>
            </div>
            <div class="col-md-8">



            </div>
            <div class="col-md-2">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Descarga de Archivos</button>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <br />
                            <h3><span class="label label-danger">Descarga de Archivos</span></h3>
                            <br /><br />
                            <?php
                            //session_start();
                            $aux = $_SESSION['carrera'];
                            $archivo = fopen("../archivos/Sistemas/link.dat", "r") or die("Error");

                            $a = $_SESSION['carrera'];
                            echo "<table class='table table-striped'>";
                            while (!feof($archivo)) {
                                $linea = fgets($archivo);
                                $datos = explode(".", $linea);

                                if ($linea != "") {
                                    $nombre = $datos[0];

                                    echo "<tr>";
                                    echo "<td><a href='../archivos/$a/$linea' download='$nombre'>" . $nombre . "</a><br /></td>";
                                    echo "<tr>";
                                }
                            }

                            echo "</table>";
                            fclose($archivo);
                            echo "<br />";
                            echo "<br />";
                            echo "<br />";
                            ?>  
                        </div>
                    </div>
                </div>

            </div>
        </div>

       <?php include("../footer.php") ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
