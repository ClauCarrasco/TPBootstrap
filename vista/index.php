<?php
$Titulo = " Ejercicio 4";
include_once("estructura/cabecera.php");
?>


<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >
    <p>
        Crear una página php que contenga un formulario HTML como el que se indica en la imagen (darle formato con CSS), enviar estos datos por el método Post a otra página php que los reciba y muestre por pantalla un mensaje como el siguiente: “Hola, yo soy nombre , apellido tengo edad años y vivo en dirección”, usando la información recibida.
        Cambiar el método Post por Get y analizar las diferencias
    </p>

    <!---->
    <form  id="eje4" name="eje4" method="GET" action="accion.php">
        <!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->

        <p>Nombre: <input type="text" name="nombre" size="100" placeholder="Escriba sus nombre completo" ></p>
        <p>Apellido: <input type="text" name="apellido" size="100" placeholder="Escriba todos sus apellidos"></p>
        <p>Edad: <input type="number" name="edad" min="1" placeholder="Escriba su edad, debe ser mayor a 1" ></p>
        <p>Direccion: <textarea name="direccion" id="direccion" rows="2" cols="100" placeholder="Escriba su direccion completa"></textarea></p>


        <input id="btn_eje4"  name="btn_eje4" type="submit" value="Enviar">

    </form >


</div>


</body>
<?php

include_once("estructura/pie.php");
?>


