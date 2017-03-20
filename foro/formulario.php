<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['nombre'])) {
    echo "INICIA SESION";
    header("location:../index.php?error=1");
} else {
    //  session_start();
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

                <?php
                if (isset($_GET["respuestas"]))
                    $respuestas = $_GET['respuestas'];
                else
                    $respuestas = 0;
                if (isset($_GET["identificador"]))
                    $identificador = $_GET['identificador'];
                else
                    $identificador = 0;
                ?>


                <form class="form-horizontal" method="post" action="../foro/agregar.php">
                    <input type="hidden" name="identificador" value="<?php echo $identificador; ?>">
                    <input type="hidden" name="respuestas" value="<?php echo $respuestas; ?>">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Autor</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="autor" id="inputEmail3" readonly="readonly" value="<?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="titulo" required="required" id="inputPassword3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Mensaje</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="mensaje" id="inputPassword3" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="submit" class="btn btn-default">Enviar Mensaje</button>
                        </div>
                    </div>
                </form>

                <h5><span class='label label-danger'>* Si ingresa una respuesta coloque RE:  en el t&iacute;tulo.</span></h5>

            </div>
            <div class="col-md-2">
                <strong>VACIO</strong>
            </div>
        </div>

        <?php include("../footer.php") ?>
        <script>
            alert('Los Datos Se Modificaran En La Próxima Sesion!!!');
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>