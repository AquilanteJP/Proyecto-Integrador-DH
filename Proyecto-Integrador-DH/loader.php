<?php
require_once("clases/Usuario.php");
require_once("clases/Post.php");
require_once("clases/Estudiante.php");
require_once("clases/Docente.php");
require_once("clases/NoDocente.php");
require_once("./clases/Validador.php");
require_once('./clases/toDo.php');
require_once('clases/Armador.php');
require_once('clases/baseDatos.php');
require_once('./clases/crud.php');
/*$juan = new Estudiante("Juan","Stroman","male","juangrum@gmail.com","skere");
var_dump($juan);
$juan->postear(1,"posteo","contenido");
*/
//$noDocente = new NoDocente("Juan","Stroman","male","juangrum@gmail.com","skere");
//$noDocente->agregarseToDo("Juan", "postenado fuerte");

$validador = new Validador;
$armador = new Armador;
$db = baseDatos::conexion("mysql:host=localhost;dbname=co_at_home_db;port=3306;charset=utf8mb4","root","quepanicono ?");
$consulta = new Consulta;
?>
