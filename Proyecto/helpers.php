<?php
//Este archivo representa, la disposición de un conjunto de pequeñas funciones que vamos a estar usando a lo largo de nuestra aplicación
function old($dato){
    if(isset($_POST[$dato])){
        return $_POST[$dato];
    }
}

function dd($dato){
    echo "<pre>";
        var_dump($dato);
    echo "</pre>";
}
