<?php
$Titulo = " Nueva especie";
include_once("estructura/cabeceraBT.php");
include_once("../configuracion.php");
?>
<?php

?>
    <h1 class="h2"> Nueva especie de Tigre</h1>

    <form  id="ejeArchivos" name="ejeArchivos" method="POST" action="accionSubeArchivos.php" enctype="multipart/form-data">

        <div class="row mb-3">
            <div class="col-sm-12 ">
            <div class="form-group has-feedback">
                <label for="imagen" class="control-label">Imagen:</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="imagen" name ="imagen" accept="image/*" required>
                </div>
                <small class="text-muted">Imagenes GIF, PNG o JPEG - No superiores a 300 KB</small>
                <span class="form-control-feedback" aria-hidden="true"></span>

            </div>
                </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12 ">
            <div class="form-group has-feedback">
                <label for="texto" class="control-label">Archivo Texto:</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="texto" name ="texto">

                </div>
                <small class="text-muted">Archivo PDF - No superiores a 400 KB</small>
                <span class="form-control-feedback" aria-hidden="true"></span>

            </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12 ">
            <div class="form-group has-feedback">
                <label for="observaciones" class="control-label">Observaciones:</label>
                <div class="input-group">
                    <textarea type="text" class="form-control" id="observaciones" name ="observaciones" required></textarea>
                </div>
                <span class="form-control-feedback" aria-hidden="true"></span>

            </div>
            </div>
        </div>



        <div class="row">

    <div class="col-md-12">
        <!--             <div class="col-md-12 mb-3">-->
        <input id="btn_eje4"  class="btn btn-primary btn-block" name="btn_eje4" type="submit" value="Enviar">
    </div>
</div>


</form >



<?php

include_once("estructura/pieBT.php");
?>
