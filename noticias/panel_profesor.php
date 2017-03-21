<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['nombre'])) {
    echo "INICIA SESION";
    header("location:../index.php?errorP=1");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Campus Virtual</title>
        <link rel="stylesheet" href="../estilos/estilos.css"  type="text/css"/>
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

                <hr />
                <br />
                <br />
                
                <br />
                <br />
                <div class="panel panel-primary">
                    <div class="panel-heading">NOTICIAS</div>
                    <div class="panel-body">

                        <?php
                        $carrera = $_POST['seleccionCarrera'];

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

                        $query = "SELECT * FROM $carrera";
                        $con = $conexion->prepare($query);
                        $con->execute();



                        while ($fila = $con->fetch(PDO::FETCH_ASSOC)) {

                            if (!empty($fila['noticia'])) {
                                echo $fila['noticia'];
                            }

                            if ($fila['id_profesor'] == $_SESSION['id_profesor']) {
                                $id = $fila['id_noticia'];
                                echo "<a href='eliminar_noticia.php?id=$id&carrera=$carrera'> &nbsp;&nbsp;&nbsp;&nbsp; Eliminar</a>";
                            }
                            echo "<br />";
                            echo "<hr />";
                        }
                        ?>
                    </div>

                </div>
                <a href="nueva_noticia.php?carrera=<?php echo $carrera ?>"><h2><span class="label label-info">Nueva Noticia</span></h2></a>
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



