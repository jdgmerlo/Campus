<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Campus Virtual</title>
        <link rel="stylesheet" href="estilos/estilos.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
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
        <div id="contenedor-principal">
            <header>
                <div id="cabecera-principal">
                    <div class="row" >
                        <div class="col-lg-12">
                            <p class="lead"><small>Zapiola 1420 - Libertad -Merlo - Bs. As. - C.P: 1716  - Tel: (0220)-4942076</small></p>
                            <p class="lead"><small>-2017-</small></p>
                        </div>
                    </div>
                </div>
            </header>
            <br />
            <hr />
            <br />

            <div id="logo">
                <image src="imagenes/escudo.jpg" />
            </div>


            <div id="cartel_bienvenida">
                <h2><span class="label label-default">Plataforma Interactiva</span></h2>
                <br />
                <span class="glyphicon glyphicon-menu-down"></span>
            </div>
            <br />
            <br />
            <div class="row">
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="index.php">Inicio</a></li>
                        <li class="list-group-item"><a href="info.php">Informaci&oacute;n</a></li>
                    </ul>
                </div>

                <div class="col-md-8">
                    <?php
                    if (isset($_GET['error']) == 1) {
                        echo " <h4><span class='label label-danger'>Ingreso Incorrecto. Verifique los Datos</span></h4>";
                    }
                    ?>
                    <?php
                    if (isset($_GET['errorP']) == 1) {
                        echo " <h4><span class='label label-danger'>Ingreso Incorrecto. Verifique los Datos</span></h4>";
                    }
                    ?>
                    <span class="label label-default">Ingreso</span>
                    <br />
                    <br />
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapseTwo">
                                        Profesor
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">

                                    <!--INGRESO-->

                                    <br />
                                    <br />
                                    <div id="ingreso-profesor">
                                        <form class="form-horizontal" method="post" action="Profesor/verificar_ingreso.php">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="inputEmail3" placeholder="D.N.I" name="dni">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="guardar_pass_profesor" value="1" disabled="disabled"> Recordarme
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Alumno
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">

                                    <!--INGRESO-->

                                    <br />
                                    <br />
                                    <div id="ingreso-alumno">
                                        <form class="form-horizontal" method="post" action="Controlador/ingreso_controlador.php">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="inputEmail3" placeholder="D.N.I" name="dni">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-5">
                                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="guardar_pass_alumno" value="1" disabled="disabled"> Recordarme
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="recuperar_pass_panel.php"><small>¿Olvidaste la contrase&ntilde;a?</small></a>
                    <?php
                    if (isset($_GET['correo_error']) == 1) {
                        echo " <h4><span class='label label-danger'>Ingreso Incorrecto. Verifique los Datos / D.N.I no Encontrado</span></h4>";
                    }
                    ?>
                    <br />

                </div>

                <div class="col-md-2">
                    <strong>Enlaces:</strong>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="http://www.isft177.edu.ar/">ISFT 177</a></li>
                        <li class="list-group-item"><a href="http://www.progresar.anses.gob.ar/">PROG.R.ES.AR.</a></li>
                        <li class="list-group-item"><a href="http://www.abc.gov.ar/">Buenos Aires Provincia</a></li>
                        <li class="list-group-item"><a href="http://www.google.com.ar/">Google</a></li>
                    </ul>
                </div>
            </div>


            <?php include("footer.php") ?>

        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>