<?php
class Session{
//quedo a medias, hacelo juan
  function guardarSesion($usuario){
    session_start();
    foreach ($usuario as $dato => $valor) {
      $_SESSION[$dato]= $valor;
    }
    return $_SESSION;
  }

}
 ?>
