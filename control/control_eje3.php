<?php

class control_eje3  {

    public function verInformacion($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $edad = $datos['edad'];
        $direccion = $datos['direccion'];
        $texto = "Hola yo soy ".$nombre.", ".$apellido." tengo ".$edad." y vivo en ".$direccion;
        // print_r($datos);
        return $texto;
    }



}
?>