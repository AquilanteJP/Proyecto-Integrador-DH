<?php
session_start();
require_once("controladores/functions.php");
/*$_POST['email'] = "juanstroman@gmail.com";
$_POST['password'] ="juangrum0$";
$_POST['recuerdame'] = "on";
if($_POST){

 $erroresLogIn = validarLogIn($_POST);
 if(count($erroresLogIn)==0){
   $usuarioEncontrado=buscarUsuario($_POST['email']);
   $usuarioValidado=validarContraseña($_POST['password'],$usuarioEncontrado);
   if ($usuarioValidado!=null){ //Verifica que el usuario haya pasado la verificacion
     guardarSesion($usuarioValidado);
     recuerdame($_POST, $usuarioEncontrado);*/
     var_dump($_COOKIE['firstName']);
     /*exit;
     header("location:profile.php");
    } else {
     echo "<br> Validacion no pasada"; //Solo para señalar mas claramente que no se paso, después esto se borra
    }
  }
}
  /*$verificarContra=buscarUsuario($_COOKIE['email']);
  $usuarioFInal=validarContraseña($_COOKIE['password'],$verificarContra);
  guardarSesion($usuarioFInal);
  recuerdame($_POST, $_SESSION);
  var_dump($_COOKIE);
*/
 ?>
