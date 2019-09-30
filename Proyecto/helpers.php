<?php
function old($dato){ //Para permanencia de algunos datos de formulario; en conjunción con isset(...) y un if ternario en nuestro caso, puedo permitir que los datos correctos queden y los incorrectos desaparezcan
    if(isset($_POST[$dato])){
        return $_POST[$dato];
    }
}

function dd($dato){
    echo "<pre>";
        var_dump($dato);
    echo "</pre>";
}
