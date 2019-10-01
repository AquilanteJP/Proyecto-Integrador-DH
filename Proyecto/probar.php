<?php
require_once("controladores/functions.php");
$_POST['email'] = "juanstroman@gmail.com";
$_POST['password'] ="juangrum0$";
  $usuario=buscarEmail($_POST['email']);
  validarContraseña($usuario);
 ?>
