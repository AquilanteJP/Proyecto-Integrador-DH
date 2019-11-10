<?php
class Session{

  function verifSesion(){
    if(empty($_SESSION)){
      header("location:logIn.php");
    }
  }

  function guardarSesionManual($dato,$valor){
    $_SESSION[$dato] = $valor;
  }

  function guardarSesion($email,$db){
    $datosSession=Consulta::read('*','usuarios',$db,' email = '."'".$email."'");
     foreach ($datosSession[0] as $dato => $valor) {
      $_SESSION[$dato]= $valor;
     }

     return $_SESSION;
  }

  function recuerdame($dato, $db){ //Si se checkea recuerdame (que se guarda en $_POST), setea un cookie para cada dato del usuario perviamente encontrado mediante buscar usuario
    if(isset($dato['recuerdame']) ){
      $datosCookie=Consulta::read('*','usuarios',$db,' email = '."'".$email."'");
      foreach ($datosCookie[0] as $key => $value) {
          setcookie($key,$value,time()+3600);
      }
    } else {
        return null;
      }
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
