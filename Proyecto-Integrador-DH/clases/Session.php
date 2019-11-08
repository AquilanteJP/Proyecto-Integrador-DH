<?php
class Session{

  function guardarSesion($usuario){
    session_start();
    foreach ($usuario as $dato => $valor) {
      $_SESSION[$dato]= $valor;
    }
    return $_SESSION;
  }

  function logout(){
    session_start();
    session_destroy();
    foreach ($_COOKIE as $key => $value) {
      setcookie($key,$value,time()-3600);
    }
    header("location:logIn.php");
  }

}
 ?>
