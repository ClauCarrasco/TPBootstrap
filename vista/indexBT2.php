<?php
$Titulo = " Ejercicio 4";
include_once("estructura/cabeceraBT.php");
?>

<p>
    Crear una página php que contenga un formulario HTML como el que se indica en la imagen (darle formato con CSS), enviar estos datos por el método Post a otra página php que los reciba y muestre por pantalla un mensaje como el siguiente: “Hola, yo soy nombre , apellido tengo edad años y vivo en dirección”, usando la información recibida.
    Cambiar el método Post por Get y analizar las diferencias
</p>

<!---->
<form  id="eje4" name="eje4" method="GET" action="accionBT.php"  data-toggle="validator" >
    <!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->
    <div class="row">

        <div class="col-md-6 mb-3">
            <label for="nombre" class="control-label">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" placeholder="Escriba sus nombre completo" required
                   type="text" >
            <div class="invalid-feedback">

            </div>


        </div>
        <div class="col-md-6 mb-3">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Escriba todos sus apellidos" required>
            <div class="invalid-feedback">

            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" name="edad" id="edad" placeholder="Su edad" value="" min="0" max="150" required>
            <div class="invalid-feedback">
                Debe ingresar la edad
            </div>

        </div>

        <div class="col-md-12 mb-3">
            <label for="direccion">Direccion:</label>
            <textarea  class="form-control text-wrap" name="direccion" id="direccion" placeholder="Escriba su direccion completa"  required>
            </textarea>
            <div class="invalid-feedback">
                Debe ingresar la direccion
            </div>

        </div>

        <div class="form-group has-feedback">
            <label for="inputTwitter" class="control-label">Twitter</label>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" pattern="^[_A-z0-9]{1,}" maxlength="15" class="form-control" id="inputTwitter" name ="inputTwitter"
                       placeholder="1000hz" required>
            </div>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        </div>


    </div>
     <div class="row">
         <div class="col-md-8 mb-3">
         </div>
         <div class="">
<!--             <div class="col-md-12 mb-3">-->
            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
         </div>
    </div>
</form >


</div>


</body>
<?php

include_once("estructura/pieBT.php");
?>
