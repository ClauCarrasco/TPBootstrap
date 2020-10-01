<?php

class control_eje4  {



    public function verificarEdad($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $edad = $datos['edad'];
        $direccion = $datos['direccion'];
        $texto ="";
        if ($edad >=18)
            $texto =  "Hola yo soy ".$nombre.", ".$apellido." y soy mayor de edad;";
        else
            $texto = "Hola yo soy ".$nombre.", ".$apellido." y NO soy mayor de edad;";
        // print_r($datos);

        //print_r($_FILES);

            $dir = "UNC/PWD2020/TPBootstrap/uploads/";

            if ($_FILES["archivo"]["error"] <= 0)
            {
                $texto= $texto . "Nombre: " . $_FILES['archivo']['name'] . "<br />";
                $texto= $texto . "Tipo: " . $_FILES['archivo']['type'] . "<br />";
                $texto= $texto . "Tamaño: " . ($_FILES['archivo']["size"] / 1024) . " kB<br />";
                $texto= $texto . "Carpeta temporal: " . $_FILES['archivo']['tmp_name']." <br />";


                $handle = fopen($_FILES['archivo']['tmp_name'], "r");
                $contenido = fread($handle, filesize($_FILES['archivo']['tmp_name']));
                fclose($handle);


                $texto= $texto . $contenido;

                // Intentamos copiar el archivo al servidor.
                if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name']))
                {
                    $texto= $texto ."ERROR: no se pudo cargar el archivo ";
                }
                else
                {
                    $texto= $texto . "El archivo ".$_FILES["archivo"]["name"]." se ha copiado con Éxito <br />";




                }
             }
             else
                echo "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";

        return $texto;

    }

}
?>