<?php
$Titulo = " Ejercicio 4";
include_once("estructura/cabeceraBT.php");
include_once("../control/control_ejeTigres.php");
include_once("../configuracion.php");
?>
     <?php
      $datos = data_submitted();
      $obj = new control_ejeTigres();
      $mensaje = $obj->subirArchivo($datos);

    ?>


    <div class="row  mb-3">

        <div class="col-sm-12 ">
            <?php
            if ($mensaje=="")
                echo "<div class='alert alert-success' role='alert'>$mensaje</div>";

            else
                echo "<div class='alert alert-danger' role='alert'>$mensaje</div>";

            ?>
            <a class='btn btn-secondary' href='indexBT4.php' role='button'>Volver a la Lista »</a>
        </div>


    </div>


<?php

include_once("estructura/pieBT.php");
?>