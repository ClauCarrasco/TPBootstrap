<?php
$Titulo = " Mi amor por los tigres";
include_once("estructura/cabeceraBT.php");
include_once("../control/control_ejeTigres.php");
include_once("../configuracion.php");
?>
<?php
$obj = new control_ejeTigres();
$arreglo = $obj->obtenerArchivos();


?>
    <h1 class="h2"> Mi amor por los tigres</h1>
    <div class="row">
        <div class="col-sm-12 mb-3">

            <a class="btn btn-secondary" href="NuevaEspecie.php" role="button">Nueva Especie »</a>
        </div>

    </div>
    <form  id="ejeArchivos" name="ejeArchivos" method="POST" action="accionEjeArchivos.php">

        <div class="row mb-3">
            <?php
            foreach ($arreglo as $archivo)
            {
                if (strlen($archivo)>2 && strpos($archivo, "txt")<=0  && strpos($archivo, "pdf")<=0)
                {
                    echo "<div class='col-lg-2 col-md-3 col-sm-4  mb-3'>";
                    echo "<img alt='$archivo' class='' src='../uploads/$archivo'  width='100%' height='80%'>";
                    echo "<input type='submit' name='Seleccion:$archivo' id='Seleccion:$archivo' class='btn btn-secondary btn-block btn-sm' value='Ver Detalles »'></input>";
                    echo "</div>";
                }
            }

            ?>
        </div>
    </form >





<?php

include_once("estructura/pieBT.php");
?>
