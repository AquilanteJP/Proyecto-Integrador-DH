<?php
require_once("controladores/functions.php");
$_POST['email'] = "juanstroman@gmail.com";
$_POST['password'] ="juangrum0$";
  $verificarContra=buscarUsuario($_POST['email']);
  $usuarioFInal=validarContraseña($_POST['password'],$verificarContra);
  guardarSesion($usuarioFInal);
  $usuarioSession = header("location:profile.php");

 ?>
