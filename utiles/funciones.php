<?php

function data_submitted() {
    $_AAux= array();
    if (!empty($_POST))
        $_AAux =$_POST;
    else
        if(!empty($_GET)) {
            $_AAux =$_GET;
        }
    if (count($_AAux)){
        foreach ($_AAux as $indice => $valor) {
            if ($valor=="")
                $_AAux[$indice] = 'null'	;
        }
    }
    return $_AAux;

}


spl_autoload_register(function ($clase) {
    echo "Cargamos la clase  ".$clase."<br>" ;
    $directorys = array(
        $GLOBALS['ROOT'].'../modelo/',
        $GLOBALS['ROOT'].'../control/',
    );
    // print_r($directorys) ;
    foreach($directorys as $directory){
        if(file_exists($directory.$clase . '.php')){
            // echo "se incluyo".$directory.$class_name . '.php';
            require_once($directory.$clase . '.php');
            return;
        }
    }


});

?>
