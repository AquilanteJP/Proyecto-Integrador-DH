<?php
require_once("clases/Usuario.php");
require_once("clases/Post.php");
require_once("clases/Estudiante.php");
require_once("clases/Docente.php");
require_once("clases/NoDocente.php");
require_once("clases/Validador.php");
require_once("clases/toDo.php");
require_once("clases/Armador.php");
require_once("clases/baseDatos.php");
require_once("clases/CRUD.php");
require_once("clases/Session.php");

/*$juan = new Estudiante("Juan","Stroman","male","juangrum@gmail.com","skere");
var_dump($juan);
$juan->postear(1,"posteo","contenido");
*/
//$noDocente = new NoDocente("Juan","Stroman","male","juangrum@gmail.com","skere");
//$noDocente->agregarseToDo("Juan", "postenado fuerte");

$validador = new Validador;
$armador = new Armador;
$db = baseDatos::conexion("mysql:host=localhost;dbname=proyectodh;port=3306;charset=utf8mb4","root","");
$consulta = new Consulta;
$sesion = new Session;
$userTest = new Estudiante("Juan","Stroman","Felipe@gmail.com","19-05-1998","male","skere","skere","estudiante");

// $post=$userTest->postear("titulo","contenido");
// var_dump($post);
// $newPost=$userTest->postear($id,$_POST["titulo"],$_POST["post"]);
// var_dump($newPost);
// <?php $losPosts=$consulta->read("*","posts",$db,"order by id desc");

?>
