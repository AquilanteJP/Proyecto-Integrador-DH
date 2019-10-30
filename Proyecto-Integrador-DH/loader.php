<?php
require_once("clases/Usuario.php");
require_once("clases/Post.php");
require_once("clases/Estudiante.php");
require_once("clases/Docente.php");
require_once("clases/NoDocente.php");

$juan = new Estudiante("Juan","Stroman","male","juangrum@gmail.com","skere");
var_dump($juan);
$juan->postear(1,"posteo","contenido");


?>
