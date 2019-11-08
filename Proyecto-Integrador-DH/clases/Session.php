<?php
class Session{

  function guardarSesion($email,$db){
    session_start();
    $datosSession=Consulta::read('*','usuarios',$db,' email = '."'".$email."'");
     foreach ($datosSession[0] as $dato => $valor) {
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
