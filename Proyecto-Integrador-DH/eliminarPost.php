<?php
require_once('loader.php');
require_once('helpers.php');
if(isset($_POST["id"])){
        $id = $_POST["id"];
        $sesion->guardarSesionManual('borrarPost',true); //Marcado en $_SESSION para que figure notificacion de borrado exitosa al volver a inicio.php
        $consulta->delete('posts',$id,$db);
}
header('location:inicio.php');
