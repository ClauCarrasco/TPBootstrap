<?php
class control_ejeTigres
{

    public function subirArchivo($datos)
    {
        $observaciones = $datos['observaciones'];

        $nombreArchivoImagen=$_FILES['imagen']['name'];
        $nombreArchivoTexto=$_FILES['texto']['name'];

        /*convierto imagen1.jpg    imagen1_OBS.txt*/
        $nombreArchivoObservaciones=substr($nombreArchivoImagen,0, strlen($nombreArchivoImagen)-4)."_OBS.txt";


        $dir = "../uploads/";

        $error="";
        $todoOK=true;

        /*Primero subamos la imagen*/
        /*Veamos si se pudo subir a la carpeta temporal*/
        if ($_FILES["imagen"]["error"] <= 0)
        {
            $todoOK=true;
            $error="";
        }
        else
        {
            $todoOK=false;
            $error= "ERROR: no se pudo cargar el archivo de imagen. No se pudo acceder al archivo Temporal";
        }

        //El control del tipo ya lo tengo en el formulario, asi que no lo voy a controlar acá.
        //Si, voy a controlar el tema del tamaño

        if ($todoOK && $_FILES['imagen']["size"] / 1024 >300)
        {
            $error= "ERROR: El archivo ".$nombreArchivoImagen." supera los 300 KB.";
            $todoOK=false;
        }



        /*-------------------------------------------------------------------------*/
        /*Ahora vamos con el PDF!
        Puede que no venga PDF, porque no es un dato obligatorio
        vamos a chequearlo*/
        if ( $nombreArchivoTexto!="") {
            if ($todoOK && $_FILES["texto"]["error"] <= 0) {
                $todoOK = true;
                $error = "";
            } else {
                $todoOK = false;
                $error = "ERROR: no se pudo cargar el archivo de imagen. No se pudo acceder al archivo Temporal";
            }

            $tipo=strpos(strtoupper($_FILES['texto']["type"]), "PDF");

            //El control del tipo .
            if ($todoOK && !$tipo) {

                $error = "ERROR: El archivo seleccionado no es un PDF";
                $todoOK = false;
            }

            //Ahora, voy a controlar el tema del tamaño

            if ($todoOK && $_FILES['texto']["size"] / 1024 > 400) {
                $error = "ERROR: El archivo " . $nombreArchivoTexto . " supera los 400 KB.";
                $todoOK = false;
            }


        }

        //RECIEN ACA PUEDO PROBAR DE COPIAR EL ARCHIVO
        // Intentamos copiar el archivo al servidor.
        if ($todoOK && !copy($_FILES['imagen']['tmp_name'], $dir.$nombreArchivoImagen))
        {
            $texto= "ERROR: no se pudo cargar el archivo de imagen.";
            $todoOK=false;
        }

        // Intentamos copiar el archivo al servidor.
        if ( $nombreArchivoTexto!="") {
            if ($todoOK && !copy($_FILES['texto']['tmp_name'], $dir . $nombreArchivoTexto)) {
                $error = "ERROR: no se pudo cargar el archivo de texto.";
                $todoOK = false;
            }
        }


        /*Ahora vamos a ver si hay alguna observación, vamos a crear un nuevo archivo*/
        if ($todoOK && $observaciones!="")
        {
            $fArchivoaCrear=fopen($dir.$nombreArchivoObservaciones, "w");
            fwrite($fArchivoaCrear, $observaciones);
            fclose($fArchivoaCrear);
        }

        if ($todoOK)
            $texto="La nueva especie se ha ingresado correctamente!";
        else
            $texto=$error;

        return $texto;

    }

    public function obtenerArchivos()
    {
        $directorio = "../uploads/";
        $archivos = scandir($directorio, 1);
        return $archivos;
    }

    public function obtenerInfoDeArchivo($datos)
    {
        $directorio = "../uploads/";

        foreach ($datos as $clave=>$valor)
            $nombreArchivo= str_replace("Seleccion:", '', $clave);

        $nombreArchivo= str_replace("_", '.', $nombreArchivo);
        $nombreArchivoFull= $directorio.$nombreArchivo;
        $nombreArchivoObservaciones=substr($nombreArchivo,0,strlen($nombreArchivo) -4)."_OBS.txt";
        $nombreArchivoPDF=substr($nombreArchivo,0,strlen($nombreArchivo) -4).".pdf";

        $datosStat = stat($nombreArchivoFull);

        //stat devuelve un arreglo con datos del archivo.
        //si da error devuelve null
        //pero voy a crear un arreglo propio con los datos que a mi me interesan nada mas
        //y con claves más entendibles


        $finfo = new finfo(FILEINFO_MIME); // Devuelve el tipo mime

        /*Voy a devolver las observaciones en el arreglo
        Se que las observaciones se guardan en un archivo .txt que tiene en el nombre el sufijo "OBS*/

        $observaciones="";
        if (file_exists ($directorio.$nombreArchivoObservaciones ))
        {
            $fArchivoOBS = fopen($directorio . $nombreArchivoObservaciones, "r");
            $observaciones = fread($fArchivoOBS, filesize($directorio . $nombreArchivoObservaciones));
            fclose($fArchivoOBS);

        }

        /*Y ahora voy a ver si hay un PDF, si hay, voy a devolver true*/
        $hayArchivo=file_exists ($directorio.$nombreArchivoPDF );

        $datosArch= [
            "Tamanio" => $datosStat[7],
            "UltimoAcceso" => $datosStat[8],
            "Enlaces" => $datosStat[3],
            "UltimaModificacion" => $datosStat[9],
            "Tipo"=>$finfo->file($nombreArchivoFull),
            "NombreArchivo"=>$nombreArchivo,
            "Observaciones"=>$observaciones,
            "HayArchivodeTexto"=>$hayArchivo,
            "ArchivoTexto"=>$nombreArchivoPDF

        ];

        //finfo_close($finfo);

        return $datosArch;
    }




}