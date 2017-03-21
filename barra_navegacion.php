<?php

if ($_SESSION['rol'] == 'alumno') {
   
    ?>
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><a href="../Controlador/mis_datos_controlador.php">Mis Datos</a></li>
        <li role="presentation"><a href="../foro/indexForo.php">Foro</a></li>
        <!--<li role="presentation"><a href="../archivos/#/archivo_sistemas.php">Archivos</a></li>-->
        <li role="presentation"><a href="../Controlador/materias_controlador.php">Materias</a></li>
        <li role="presentation"><a href="../noticias/<?php echo $_SESSION['carrera'] ?>.php">Noticias</a></li>
       <!-- <li role="presentation"><a href="#">Enviar Mensaje</a></li>-->
        <!--<li role="presentation"><a href="#">Estadistica</a></li>-->
        <li role="presentation"><a href="../Controlador/cerrar_sesion.php">Cerrar Sesion</a></li>
    </ul>
    <?php
} elseif ($_SESSION['rol'] == 'profesor') {
    ?>

    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><a href="../profesor/mis_datos.php">Mis Datos</a></li>
        <li role="presentation"><a href="../foro/indexForo.php">Foro</a></li>
        <li role="presentation"><a href="../noticias/panel_principal_profesor.php">Noticias</a></li>
        <li role="presentation"><a href="../profesor/panel_subir_archivo.php">Subir Archivo</a></li>
        <!--<li role="presentation"><a href="#">Estadistica</a></li>-->
        <li role="presentation"><a href="../Controlador/cerrar_sesion.php">Cerrar Sesion</a></li>
    </ul>

    <?php
}
?>