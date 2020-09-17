<?php
$Titulo = " Ejercicio 4";
include_once("estructura/cabeceraBT.php");
include_once("../control/control_eje3.php");
include_once("../control/control_eje4.php");
include_once("../configuracion.php");
?>
     <?php
      $datos = data_submitted();
        $obj = new control_eje4();
        $respuesta = $obj->verificarEdad($datos);

        $obj2 = new control_eje3();
        $respuesta2= $obj2->verInformacion($datos);


        ?>

        <div class="alert alert-primary" role="alert">
            <?php echo $respuesta ?>
        </div>

        <div class="alert alert-success" role="alert">
            <?php echo $respuesta2 ?>
        </div>

    <div class="alert alert-danger" role="alert">
        <?php echo $respuesta2 ?>
    </div>

    <div class="alert alert-warning" role="alert">
        <?php echo $respuesta2 ?>
    </div>

    <div class="alert alert-info" role="alert">
        <?php echo $respuesta2 ?>
    </div>

    </div>


    </body>
<?php

include_once("estructura/pieBT.php");
?>