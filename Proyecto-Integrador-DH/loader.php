<?php
require_once("clases/Usuario.php");
require_once("clases/Post.php");
require_once("clases/Estudiante.php");
require_once("clases/Docente.php");
require_once("clases/NoDocente.php");
require_once("./clases/Validador.php");
require_once('./clases/toDo.php');
require_once('clases/Armador.php');
/*$juan = new Estudiante("Juan","Stroman","male","juangrum@gmail.com","skere");
var_dump($juan);
$juan->postear(1,"posteo","contenido");
*/
//$noDocente = new NoDocente("Juan","Stroman","male","juangrum@gmail.com","skere");
//$noDocente->agregarseToDo("Juan", "postenado fuerte");

$validador = new Validador;
$armador = new Armador;

?>
