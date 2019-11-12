<?php
//RECORDAR QUE TODOS LOS USUARIOS MENOS LOS ADMIN INSTANCIAN ESTE OBJETO//
class Post {

  protected $id;
  protected $userId; //usuario que lo posteo
  protected $titulo;
  protected $contenido;
  protected $like;

  public function __construct($usuarioId, $titulo, $contenido){
    $this->userId = $usuarioId;
    $this->titulo = $titulo;
    $this->contenido = $contenido;
    $this->like = 0;
  }
  
  public function getTitulo(){
    return $this->titulo;
  }

  public function setTitulo($titulo){
    $this->titulo = $titulo;
  }

  public function getContenido(){
    return $this->contenido;
  }

  public function setContenido($contenido){
    $this->contenido = $contenido;
  }

  public function getUserId(){
    return $this->userId;
  }

  public function setUserId($userId){
    $this->userId = $userId;
  }
}
/* ------TEST------ se crea un post y se prueba la funcion de sumar megustas
$post = new Post ("prueba","contenido");
var_dump($post);
echo "<br>";
$post->meGusta();
var_dump($post);
*/
