<hr />
<br />
<br />
<div class="panel panel-primary">
    <div class="panel-heading">NOTICIAS</div>
    <div class="panel-body">
        <?php
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


        $tabla = $_SESSION['carrera'];

        if ($tabla == 'Sistemas') {
            $tab = strtolower($tabla);
            $tabla_noticia = $tab;
        }
        /* if($_SESSION['carrera'] == 'Sistemas'){
          $tabla_noticia = $_SESSION['carrera'];
          }if($_SESSION['carrera'] == 'Sistemas'){
          $tabla_noticia = $_SESSION['carrera'];
          }if($_SESSION['carrera'] == 'Sistemas'){
          $tabla_noticia = $_SESSION['carrera'];
          } */


        $query = "SELECT noticia FROM $tab";
        $consulta = $conexion->prepare($query);
        $consulta->execute();
        
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
           echo $fila['noticia'];
           echo "<br />";
           echo "<hr />";
        }
        
        ?>
    </div>

</div>