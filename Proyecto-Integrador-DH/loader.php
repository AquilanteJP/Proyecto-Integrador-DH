<?php
require_once("clases/Usuario.php");
require_once("clases/Post.php");
require_once("clases/Estudiante.php");
require_once("clases/Docente.php");
require_once("clases/NoDocente.php");
require_once("clases/Validador.php");
require_once("clases/ToDo.php");
require_once("clases/Armador.php");
require_once("clases/BaseDatos.php");
require_once("clases/CRUD.php");
require_once("clases/Session.php");

$validador = new Validador;
$armador = new Armador;
$db = baseDatos::conexion("mysql:host=localhost;dbname=db_proyecto;port=3306;charset=utf8mb4","root","root"); //SE CAMBIO EL PUERTO DE 3306 A 3307
$consulta = new Consulta;
$sesion = new Session;
session_start();
?>
