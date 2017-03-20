<!DOCTYPE html>
<?php
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


                <form class="form-horizontal" method="post" action="../Modelo/modificar_datos_modelo.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="correo" id="inputEmail3" value="<?php echo $_SESSION['correo'] ?>">
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Carrera</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="carrera" id="inputPassword3" value="<?php echo $_SESSION['carrera'] ?>">
                        </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Guardar</button>
                        </div>
                    </div>
                </form>

                <!--CAMBIAR CONTRASEÑA-->


                <form class="form-horizontal" method="post" action="../Modelo/modificar_pass_modelo.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pass_actual" required="required" id="inputEmail3" placeholder="Contraseña Actual">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pass_nueva" required="required" id="inputPassword3" placeholder="Contraseña Nueva">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Guardar</button>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_GET['error']) == 2) {
                    echo " <h4><span class='label label-danger'>La Contraseña Actual Es Incorrecta</span></h4>";
                }
                ?>
                <!--FIN CAMBIAR CONTRASEÑA-->



            </div>
            <div class="col-md-2">
                <strong>VACIO</strong>
            </div>
        </div>

<?php include("../footer.php") ?>
       <!-- <script>
            alert('Los Datos Se Modificaran En La Próxima Sesion!!!');
        </script>-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
